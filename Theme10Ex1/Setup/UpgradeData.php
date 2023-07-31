<?php

namespace Perspective\Theme10Ex1\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Customer\Api\Data\CustomerInterface;

class UpgradeData implements UpgradeDataInterface
{

    protected $_postFactory;

    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    private $_customerFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilderFactory
     */
    private $_searchCriteriaBuilderFactory;

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    private $_customerRepository;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $_productRepository;

    /**
     * @var \Magento\Review\Model\ResourceModel\Review\Collection
     */
    private $_collectionReview;



    public function __construct(\Perspective\Theme10Ex1\Model\PostFactory $postFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Framework\Api\SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Review\Model\ResourceModel\Review\Collection $collectionReview,

        )
    {

        $this->_postFactory = $postFactory;
        $this->_customerFactory = $customerFactory;
        $this->_searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
        $this->_customerRepository = $customerRepository;
        $this->_productRepository = $productRepository;
        $this->_collectionReview = $collectionReview;

    }

    public function getProduct()
    {
        $sku = "24-UG06";
        return $this->_productRepository->get($sku);
    }

    public function getCustomer()
    {
        $collection = $this->_customerFactory->create()->getCollection()
        ->load();
        $searchCriteriaBuilder = $this->_searchCriteriaBuilderFactory->create();

        $searchCriteriaBuilder->addFilter(
            CustomerInterface::EMAIL,
            "roni_cost@example.com",
            'like'
        );

        $searchCriteria = $searchCriteriaBuilder->create();
        $customerCollection = $this->_customerRepository->getList($searchCriteria);
        
        return $customerCollection->getItems();
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerCollection = $this->getCustomer();
        $productID = $this->getProduct();

        $id= $this->getProduct()->getId(); // product id
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $product = $objectManager->create("Magento\Catalog\Model\Product")->load($id);
        $rating = $objectManager->get("Magento\Review\Model\ResourceModel\Review\CollectionFactory");
        $collection = $rating->create()
        ->addStatusFilter(
            \Magento\Review\Model\Review::STATUS_APPROVED
        )->addEntityFilter(
            'product',
             $id
        )->setDateOrder();

        $getReview = "";
        foreach ($collection AS $getReviewCollection) {
                    $getReviewTemp = $getReviewCollection->getData("detail");
                    $getReview = $getReviewTemp . $getReview;
                 }

        if ($customerCollection && count($customerCollection) > 0) {
            foreach ($customerCollection AS $customer) {
               $customerName = $customer->getFirstname();
               $customerEmail = $customer->getEmail();
            }
        }

        if (version_compare($context->getVersion(), '1.5.0', '<')) {
        $data = [
            'IDProd' => $productID->getId(),
            'TextRev' => $getReview,
            'Name'=> $customerName,
            'Email'=> $customerEmail,
        ];
        $post = $this->_postFactory->create();
        $post->addData($data)->save();
        }
    }
}