<?php
namespace Perspective\Theme7Ex1\ViewModel;

class Theme7Ex1Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    private $_modelSession;

    /**
     * @var \Magento\Sales\Model\Order
     */
    private $_order;

    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    private $_orderFactory;

    public function __construct(
        \Magento\Checkout\Model\Session $modelSession,
        \Magento\Sales\Model\Order $order,
        \Magento\Sales\Model\OrderFactory $orderFactory
    )
    {
        $this->_modelSession = $modelSession;
        $this->_order = $order;
        $this->_orderFactory = $orderFactory;
        
    }

    public function getOrderBySession()
    {
        return $this->_modelSession->getLastRealOrder();
    }
}
