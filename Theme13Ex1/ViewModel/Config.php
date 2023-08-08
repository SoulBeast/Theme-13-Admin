<?php

namespace Perspective\Theme13Ex1\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\View\Element\Template\Context;
use Perspective\Theme13Ex1\Helper\Data;

class Config implements ArgumentInterface
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * @var \Magento\Framework\Registry
     */
    private $_registry;

    /**
     * @var \Magento\CatalogInventory\Model\Stock\StockItemRepository
     */
    private $_stockItemRepository;

    /**
     * @var \Magento\Directory\Model\CurrencyFactory
     */
    private $_currencyFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $_storeManager;

    public function __construct(
        Context $context,
        Data $helper,
        \Magento\Framework\Registry $registry,
        \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
        \Magento\Directory\Model\CurrencyFactory $currencyFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->helper = $helper;
        $this->_registry = $registry;
        $this->_stockItemRepository = $stockItemRepository;
        $this->_currencyFactory = $currencyFactory;
        $this->_storeManager = $storeManager;
    }

    ############### Ex 13.1 ###############
    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    public function isEnabledUAH()
    {
        return $this->helper->isEnabledUAH();
    }

    public function isEnabledUSD()
    {
        return $this->helper->isEnabledUSD();
    }

    public function isEnabledEURO()
    {
        return $this->helper->isEnabledEURO();
    }

    //### ### Get info ### ###//

    public function getUAH()
    {
        return $this->helper->getUAH();
    }

    public function getUSD()
    {
        return $this->helper->getUSD();
    }

    public function getEURO()
    {
        return $this->helper->getEURO();
    }

    //### ### CurrentProduct ### ###//

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }

    public function getCurrentCategory()
    {
        return $this->_registry->registry('current_category');
    }

    public function getStockItem($productId)
    {
        return $this->_stockItemRepository->get($productId);
    }
    ######################################

    ###### Ex 13.1 additional task #######
    public function convertPrice($price, $currencyCodeFrom, $currencyCodeTo)
    {
        $rate = $this->_currencyFactory->create()
            ->load($currencyCodeFrom)
            ->getAnyRate($currencyCodeTo);

        $convertedPrice = $price * $rate;

        return $convertedPrice;
    }
    ######################################
}
