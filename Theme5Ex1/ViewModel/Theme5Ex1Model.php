<?php
namespace Perspective\Theme5Ex1\ViewModel;

class Theme5Ex1Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory
     */
    private $_collectionFactory;

    /**
     * @var  \Magento\Catalog\Model\ProductRepository
     */
    private $_productRepository;

    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    private $_productcollectionFactory;

    /**
     * @var \Magento\Catalog\Model\Product\Attribute\Source\Status
     */
    private $_productStatus;

    /**
     * @var \Magento\Catalog\Model\Product\Visibility
     */
    private $_productVisibility;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productcollectionFactory,
        \Magento\Catalog\Model\Product\Attribute\Source\Status $status,
        \Magento\Catalog\Model\Product\Visibility $visibility
    )
    {
        $this->_collectionFactory = $collectionFactory;
        $this->_productRepository = $productRepository;
        $this->_registry = $registry;
        $this->_productcollectionFactory = $productcollectionFactory;
        $this->_productStatus = $status;
        $this->_productVisibility = $visibility;
        
    }

    ############## Ex 1.1 ##############
/*     public function getCategoryCollection($isActive = true, $level = false, $sortBy = false, $pageSize = false)
    {
        $collection = $this->_collectionFactory->create();
        $collection->addAttributeToSelect('*');        
        
        // select only active categories
        if ($isActive) {
            $collection->addIsActiveFilter();
        }
                
        // select categories of certain level
        if ($level) {
            $collection->addLevelFilter($level);
        }
        
        // sort categories by some value
        if ($sortBy) {
            $collection->addOrderField($sortBy);
        }
        
        // select certain number of categories
        if ($pageSize) {
            $collection->setPageSize($pageSize); 
        }    
        
        return $collection;
    }
    
    public function getProductById($id)
    {        
        return $this->_productRepository->getById($id);
    }
    
    public function getCurrentProduct()
    {        
        return $this->_registry->registry('current_product');
    } */
    #######################################

    ############## Ex 1.2 ##############
/*     public function getAllActiveCatalogRule()
    {
        $catalogActiveRule = $this->_collectionFactory->create()->addFieldToFilter('is_active', 1);

        return $catalogActiveRule;
    }

    public function getProductById($id)
    {        
        return $this->_productRepository->getById($id);
    } */
    #######################################

    ############## Ex 1.3 ##############
/*     public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productcollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        return $collection;
    } */
    #######################################

    ############## Ex 1.4 ##############
    public function getProductCollection()
    {
        $collection = $this->_productcollectionFactory->create();
        $collection->addAttributeToSelect('*'); 
        $collection->addAttributeToFilter('status', ['in' => $this->_productStatus->getVisibleStatusIds()]);
        $collection->setVisibility($this->_productVisibility->getVisibleInSiteIds());
        return $collection;
    }
    #######################################
}
