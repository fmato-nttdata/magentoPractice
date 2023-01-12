<?php

namespace NttData\Grid\Model;

use Magento\Framework\Model\AbstractModel;
use NttData\Grid\Model\ResourceModel\Designer as ResourceModel;

class Designer extends AbstractModel{
    protected function _construct(){
        $this->_init(ResourceModel::class);
    }
}