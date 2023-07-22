<?php
namespace Perspective\TutorialProductPage\ViewModel;

class TutorialProductPageModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /** @var \Mozok\Mymodule\Helper\Custom  */
    protected $_customHelper;

    /**
     * @var \Magento\Catalog\Block\Product\View
     */
    private $_view;

    public function __construct(
        \Perspective\TutorialProductPage\Helper\Custom $customHelper,
        \Magento\Catalog\Block\Product\View $view
    ) {
        $this->_customHelper = $customHelper;
        $this->_view = $view;
    }

    /**
     * Get any value for our template
     *
     * @return string
     */
    public function getAnyCustomValue()
    {
        $currentProduct = $this->_view->getProduct();
        $customValue = "Any Value : ";
        return $customValue . $currentProduct->getFinalPrice();
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        $currentProduct = $this->_view->getProduct();
        return $this->_customHelper->validateProductBySku($currentProduct->getSku());
    }
}
