<?php

namespace NttData\PokeGrid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pokemon extends AbstractDb{

    private const TABLE_NAME = 'pokemon';
    private const PRIMARY_ID = 'id';

    protected function _construct(){
        $this->_init(self::TABLE_NAME, self::PRIMARY_ID);/* ANCHOR: name table - id */
    }
}