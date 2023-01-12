<?php
namespace NttData\Grid\Model\ResourceModel\Programmer;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NttData\Grid\Model\Programmer as Model;
use NttData\Grid\Model\ResourceModel\Programmer as ResourceModel;

class Collection extends AbstractCollection{
    protected function _construct(){
        $this->_init(Model::class, ResourceModel::class);
    }
}