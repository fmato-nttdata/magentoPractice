<?php

namespace NttData\Grid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Programmer extends AbstractDb{
    private const TABLE_NAME = 'programmer';
    private const PRIMARY_ID = 'id_programmer';

    protected function _construct(){
        $this->_init(self::TABLE_NAME, self::PRIMARY_ID);/* ANCHOR: name table - id */
    }
}