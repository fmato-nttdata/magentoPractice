<?php
namespace NttData\Grid\Model\ResourceModel\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NttData\Grid\Model\Grid as Model;
use NttData\Grid\Model\ResourceModel\Grid as ResourceModel;

class Collection extends AbstractCollection{
    protected function _construct(){
        $this->_init(Model::class, ResourceModel::class);
    }
}