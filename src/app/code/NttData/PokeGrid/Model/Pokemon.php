<?php

namespace NttData\PokeGrid\Model;

use Magento\Framework\Model\AbstractModel;
use NttData\PokeGrid\Model\ResourceModel\Pokemon as ResourceModel;

class Pokemon extends AbstractModel{

    protected function _construct(){
        $this->_init(ResourceModel::class);
    }
}