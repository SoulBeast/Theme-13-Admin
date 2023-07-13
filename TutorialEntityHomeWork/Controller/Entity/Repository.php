<?php

namespace Perspective\TutorialEntityHomeWork\Controller\Entity;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Repository implements HttpGetActionInterface
{
    protected $context;
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->context = $context;
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}

