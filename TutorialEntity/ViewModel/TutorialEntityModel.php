<?php
namespace Perspective\TutorialEntity\ViewModel;

class TutorialEntityModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    public function sayHello()
    {
        return __('Learn Magento 2 ViewModel Layout');
    }
}
