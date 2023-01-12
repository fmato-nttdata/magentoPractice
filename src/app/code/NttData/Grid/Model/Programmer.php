<?php

namespace NttData\Grid\Model;

use Magento\Framework\Model\AbstractModel;
use NttData\Grid\Model\ResourceModel\Programmer as ResourceModel;

class Programmer extends AbstractModel{
    protected function _construct(){
        $this->_init(ResourceModel::class);
    }
}