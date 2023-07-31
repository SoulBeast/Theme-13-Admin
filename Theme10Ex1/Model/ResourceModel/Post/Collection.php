<?php

namespace Perspective\Theme10Ex1\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {

        $this->_init('Perspective\Theme10Ex1\Model\Post', 'Perspective\Theme10Ex1\Model\ResourceModel\Post');
    }
}
