<?php
namespace Perspective\Theme10Ex1\ViewModel;

use Magento\Customer\Api\Data\CustomerInterface;

class Theme10Ex1Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Perspective\Theme10Ex1\Model\PostFactory
     */
    private $_postFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilderFactory
     */
    private $_searchCriteriaBuilderFactory;

    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    private $_customerFactory;

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    private $_customerRepository;

    /**
     * @var \Magento\Review\Model\ResourceModel\Review\CollectionFactory
     */
    private $_reviewCollectionFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $_storeManager;

    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;

    /**
     * @var \Magento\Catalog\Model\CategoryRepository
     */
    private $_categoryRepository;

    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    private $_productFactory;

    public function __construct(
        \Perspective\Theme10Ex1\Model\PostFactory $postFactory,
        \Magento\Framework\Api\SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Review\Model\ResourceModel\Review\CollectionFactory $reviewCollectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository,
        \Magento\Catalog\Model\ProductFactory $productFactory
    ) 
    {

        $this->_postFactory = $postFactory;
        $this->_searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
        $this->_customerFactory = $customerFactory;
        $this->_customerRepository = $customerRepository;
        $this->_reviewCollectionFactory = $reviewCollectionFactory;
        $this->_storeManager = $storeManager;
        $this->_registry = $registry;
        $this->_categoryRepository = $categoryRepository;
        $this->_productFactory = $productFactory;
    }

    ############### Ex 3.1 ###############
    public function getPostCollection()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();

        return $collection;
    }
    ######################################

    ############### Ex 3.2 ###############
/*     public function getGucsotmerReview()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        $collection->addFieldToFilter('email', array('like' => 'roni_cost@example.com'));

        return $collection;
    } */
    ######################################

    ############### Ex 3.3 ###############
    public function getProductImages($productId) {
        $_product = $this->_productFactory->create()->load($productId);
        $productImages = $_product->getMediaGalleryImages();
        return $productImages;
    }
    ######################################
}