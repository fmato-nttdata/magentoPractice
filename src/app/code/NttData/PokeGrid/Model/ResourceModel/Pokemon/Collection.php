<?php
namespace NttData\PokeGrid\Model\ResourceModel\Pokemon;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NttData\PokeGrid\Model\Pokemon as Model;
use NttData\PokeGrid\Model\ResourceModel\Pokemon as ResourceModel;

class Collection extends AbstractCollection{
    protected function _construct(){
        $this->_init(Model::class, ResourceModel::class);
    }
}