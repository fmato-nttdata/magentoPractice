<?php
namespace NttData\Grid\Model\ResourceModel\Designer;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NttData\Grid\Model\Designer as Model;
use NttData\Grid\Model\ResourceModel\Designer as ResourceModel;

class Collection extends AbstractCollection{
    protected function _construct(){
        $this->_init(Model::class, ResourceModel::class);
    }
}