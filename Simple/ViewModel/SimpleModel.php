<?php

namespace Perspective\Simple\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;

class SimpleModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
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
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
    ) {
        $this->_productRepository = $productRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
    }
    public function getProducts($name,$price1,$price2)
    {
        if (is_null($name && $price1 && $price2)) {
            return null;
        }
        else{
        $this->_searchCriteriaBuilder->addFilter(
            ProductInterface::NAME,
            $name,
            'like',
            ProductInterface::PRICE,
            $price1,
            'lt',
            $price2,
            'gt'
        );
        }
        $searchCriteria = $this->_searchCriteriaBuilder->create();
        $searchCriteria->setPageSize(6);
        $productCollection = $this->_productRepository->getList($searchCriteria);
        return $productCollection->getItems();
    }
}
