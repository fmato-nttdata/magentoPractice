<?php

namespace NttData\Grid\Model;

use Magento\Framework\Model\AbstractModel;
use NttData\Grid\Model\ResourceModel\Grid as ResourceModel;

class Grid extends AbstractModel{
    protected function _construct(){
        $this->_init(ResourceModel::class);
    }
}