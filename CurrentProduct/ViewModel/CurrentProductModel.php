<?php
namespace Perspective\CurrentProduct\ViewModel;

class CurrentProductModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Catalog\Helper\Data
     */
    private $_helperData;

    public function __construct(
        \Magento\Catalog\Helper\Data $helperData
    )
    {
        $this->_helperData = $helperData;
        
    }

    public function getCurrentProduct()
    {
    return $this->_helperData->getProduct();
    }

    public function getCurrentCategory()
    {
    return $this->_helperData->getCategory();
    }
}
