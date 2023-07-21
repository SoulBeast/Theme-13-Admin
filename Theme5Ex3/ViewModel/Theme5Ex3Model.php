<?php
namespace Perspective\Theme5Ex3\ViewModel;

class Theme5Ex3Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    private $_productcollectionFactory;

    /**
     * @var \Magento\Catalog\Model\CategoryFactory
     */
    private $_categoryFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productcollectionFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory
    )
    {
        $this->_productcollectionFactory = $productcollectionFactory;
        $this->_categoryFactory = $categoryFactory;
        
    }

    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productcollectionFactory->create();
        $collection->addAttributeToSelect('*')
        ->addAttributeToFilter('type_id', array('eq' => 'configurable'))
        ->addAttributeToFilter('price', array('gteq' => 50))
        ->addAttributeToFilter('price', array('lteq' => 60));
        $collection->addCategoriesFilter(['in' => $ids]);
        return $collection;
    }

    public function getCategoryName($categoryId)
    {
        $category = $this->_categoryFactory->create()->load($categoryId);
        $categoryName = $category->getName();
        return $categoryName;
    }
}
