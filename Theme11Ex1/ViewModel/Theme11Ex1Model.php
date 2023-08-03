<?php
namespace Perspective\Theme11Ex1\ViewModel;

use Perspective\Theme11Ex1\Model\ConsultationdetailsFactory;

class Theme11Ex1Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    private $_consultationDetailsFactory;

    public function __construct(
        ConsultationdetailsFactory $consultationDetailsFactory
    ) {
        $this->_consultationDetailsFactory = $consultationDetailsFactory;
    }

    public function getPostCollection()
    {
        $post = $this->_consultationDetailsFactory->create();
        $collection = $post->getCollection();

        return $collection;
    }
}
