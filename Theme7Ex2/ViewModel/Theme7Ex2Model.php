<?php
namespace Perspective\Theme7Ex2\ViewModel;

class Theme7Ex2Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    private $_checkoutSession;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession
    )
    {
        $this->_checkoutSession = $checkoutSession;
        
    }

    public function getCheckoutSession()
    {
        return $this->_checkoutSession->getQuote();
    }
}
