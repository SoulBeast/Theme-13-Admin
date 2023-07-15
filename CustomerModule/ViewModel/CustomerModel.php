<?php
namespace Perspective\CustomerModule\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SearchCriteriaBuilderFactory;
use Magento\Customer\Api\Data\CustomerInterface;

class CustomerModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
     /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
    */
    private $_productRepository;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private $_searchCriteriaBuilder;
    /**
     * @var \Magento\Backend\Block\Template\Context
     */
    private $_templateContext;

    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    private $_customerFactory;

    /**
     * @var \Magento\Customer\Api\Data\CustomerInterface
     */
    private $_customer;

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    private $_customerRepository;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilderFactory
     */
    private $_searchCriteriaBuilderFactory;

    /**
     * @var \Magento\Framework\Api\SortOrderBuilder
     */
    private $_sortOrderBuilder;

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Backend\Block\Template\Context $templateContext,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Api\Data\CustomerInterface $customer,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Api\SearchCriteriaBuilderFactory $searchCriteriaBuilderFactory,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
    )
    {
        $this->_productRepository = $productRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_templateContext = $templateContext;
        $this->_customerFactory = $customerFactory;        
        $this->_customer = $customer;
        $this->_customerRepository = $customerRepository;
        $this->_searchCriteriaBuilderFactory = $searchCriteriaBuilderFactory;
        $this->_sortOrderBuilder = $sortOrderBuilder;
    }

    public function getCustomerCollection() 
    {
    $collection = $this->_customerFactory->create()->getCollection()
    ->load();

    return $collection;
    }

    public function getCustomer()
    {
        $collection = $this->_customerFactory->create()->getCollection()
        ->load();
        $searchCriteriaBuilder = $this->_searchCriteriaBuilderFactory->create();

        $searchCriteriaBuilder->addFilter(
            CustomerInterface::EMAIL,
            "%@gmail.com",
            'like'
        );
        $sortOrder = $this->_sortOrderBuilder
            ->setField('lastname')  //FIELD_NAME
            ->setDirection(SortOrder::SORT_ASC) // SORT_TYPE
            ->create();         
        $searchCriteriaBuilder->addSortOrder($sortOrder);

        $searchCriteria = $searchCriteriaBuilder->create();
        $customerCollection = $this->_customerRepository->getList($searchCriteria);
        
        return $customerCollection->getItems();
    }
}