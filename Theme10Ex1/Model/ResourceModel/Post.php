<?php

namespace Perspective\Theme10Ex1\Model\ResourceModel;

class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(

        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {

        parent::__construct($context);
    }

    protected function _construct()
    {

        $this->_init('perspective_review_post', 'post_id');
    }
}
