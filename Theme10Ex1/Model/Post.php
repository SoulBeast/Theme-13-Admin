<?php

namespace Perspective\Theme10Ex1\Model;

class Post extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Perspective\Theme10Ex1\Model\ResourceModel\Post');
    }
}
