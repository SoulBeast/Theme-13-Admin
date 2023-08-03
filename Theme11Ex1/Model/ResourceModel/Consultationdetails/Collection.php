<?php

namespace Perspective\Theme11Ex1\Model\ResourceModel\Consultationdetails;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {

        $this->_init('Perspective\Theme11Ex1\Model\Consultationdetails', 'Perspective\Theme11Ex1\Model\ResourceModel\Consultationdetails');
    }
}
