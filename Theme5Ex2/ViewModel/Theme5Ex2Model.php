<?php
namespace Perspective\Theme5Ex2\ViewModel;

class Theme5Ex2Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\CatalogInventory\Api\StockStateInterface
     */
    private $_stockState;

    /**
     * @var  \Magento\CatalogInventory\Model\Stock\StockItemRepository
     */
    private $_stockItemRepository;

    /**
     * @var \Magento\Catalog\Model\ProductRepository
     */
    private $_productRepository;

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $_productRepositoryInterface;

    /**
     * @var \Magento\Catalog\Helper\Image
     */
    private $_image;

    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    private $_productFactory;

    /**
     * @var \Magento\Customer\Model\CustomerFactory
     */
    private $_customerFactory;

    /**
     * @var \Magento\Sales\Model\ResourceModel\Order\CollectionFactory
     */
    private $_collectionFactoryOrder;

    /**
     * @var \Magento\Sales\Model\Order\Config
     */
    private $_configOrder;

    /**
     * @var \Magento\Customer\Model\ResourceModel\Group\Collection
     */
    private $_cutomerGroup;

    /**
     * @var \Magento\Payment\Helper\Data $helperData
     */
    private $_dataHelperData;

    /**
     * @var \Magento\Shipping\Model\Config\Source\Allmethods
     */
    private $_allmethods;

    public function __construct(
        \Magento\CatalogInventory\Api\StockStateInterface $stockState,
        \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepositoryInterface,
        \Magento\Catalog\Helper\Image $image,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $collectionFactoryOrder,
        \Magento\Sales\Model\Order\Config $configOrder,
        \Magento\Customer\Model\ResourceModel\Group\Collection $cutomerGroup,
        \Magento\Payment\Helper\Data $dataHelperData,
        \Magento\Shipping\Model\Config\Source\Allmethods $allmethods
    )
    {
        $this->_stockState = $stockState;
        $this->_stockItemRepository = $stockItemRepository;
        $this->_productRepository = $productRepository;
        $this->_productRepositoryInterface = $productRepositoryInterface;
        $this->_image = $image;
        $this->_productFactory = $productFactory;
        $this->_customerFactory = $customerFactory;
        $this->_collectionFactoryOrder = $collectionFactoryOrder;
        $this->_configOrder = $configOrder;
        $this->_cutomerGroup = $cutomerGroup;
        $this->_dataHelperData = $dataHelperData;
        $this->_allmethods = $allmethods;
        
    }

    ############## Ex 2.1 ##############
/*     public function getStockItem($productId)
    {
        return $this->_stockItemRepository->get($productId);
    }

    public function getProductById($id)
    {        
        return $this->_productRepository->getById($id);
    } */
    #######################################

    ############## Ex 2.2 ##############
/*     public function getProductImageUrl($id)
    {
        $product = $this->_productFactory->create()->load($id);
        $url = $this->_image->init($product, 'product_thumbnail_image')->getUrl();
        return $url;
    }

    public function getImageOriginalWidth($product, $imageId, $attributes = [])
    {
        return $this->_image->init($product, $imageId, $attributes)->getWidth();
    }

    public function getImageOriginalHeight($product, $imageId, $attributes = [])
    {
        return $this->_image->init($product, $imageId, $attributes)->getHeight();
    } */
    #######################################

    ############## Ex 2.3 ##############
/*     public function getCustomerCollection() 
    {
    $collection = $this->_customerFactory->create()->getCollection()
    ->load();

    return $collection;
    } */
    #######################################

    ############## Ex 2.4 ##############
/*     public function getOrderCollection()
    {
        $collection = $this->_collectionFactoryOrder->create()
        ->addAttributeToSelect('*')
        ->setOrder('total_paid','asc');
        return $collection;
    } */
    #######################################

    ############## Ex 2.5 ##############
/*     public function getCustomerGroups() {
        $customerGroups = $this->_cutomerGroup->toOptionArray();
        array_unshift($customerGroups, array('value'=>'', 'label'=>'Any'));
        return $customerGroups;
    } */
    #######################################

    ############## Ex 2.6 ##############
/*     public function getAllPaymentMethodsList() 
    {
    return $this->_dataHelperData->getPaymentMethodList();
    } */
    #######################################

    ############## Ex 2.7 ##############
    public function getAllShippingMethods()
    {
        return $this->_allmethods->toOptionArray();
    }
    #######################################
}
