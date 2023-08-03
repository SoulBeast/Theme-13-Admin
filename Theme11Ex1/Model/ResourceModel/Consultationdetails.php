<?php

namespace Perspective\Theme11Ex1\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Consultationdetails extends AbstractDb
{
    public function _construct()
    {

        $this->_init("consultation_table", 'consultation_id');
    }
}
