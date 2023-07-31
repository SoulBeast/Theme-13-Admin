<?php
namespace Perspective\Theme7Ex4\ViewModel;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Backend\Model\Session\Quote as BackendModelSession;

class Theme7Ex4Model extends AbstractHelper implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected $backendModelSession;

    public function __construct(
        Context $context,
        BackendModelSession $backendModelSession
    )
    {
        $this->backendModelSession = $backendModelSession;
        parent::__construct($context);
    }

    public function setBackendQuote(){
        $customerId = 1;
        $quoteId = 111;
    
        $this->backendModelSession->setCustomerId($customerId);
        $this->backendModelSession->setQuoteId($quoteId);
        $this->backendModelSession->setStoreId(1);
    }
    
    public function getBackendQuote(){
    $quote = $this->backendModelSession->getQuote();
    return $quote;
    }
}
