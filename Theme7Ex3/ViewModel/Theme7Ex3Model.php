<?php
namespace Perspective\Theme7Ex3\ViewModel;

class Theme7Ex3Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    private $_checkoutSession;

    /**
     * @var \Magento\Wishlist\Model\Wishlist
     */
    private $_wishlist;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Wishlist\Model\Wishlist $wishlist
    )
    {
        $this->_checkoutSession = $checkoutSession;
        $this->_wishlist = $wishlist;
        
    }

    public function getCheckoutSession()
    {
        return $this->_checkoutSession->getQuote();
    }

    public function getWishlistByCustomerId($customerId)
    {
        $wishlist = $this->_wishlist->loadByCustomerId($customerId)->getItemCollection();
        return $wishlist;
    }
}
