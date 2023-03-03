<?php

namespace NttData\Grid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Grid extends AbstractDb{

    private const TABLE_NAME = 'employees';
    private const PRIMARY_ID = 'id_employees';

    protected function _construct(){
        $this->_init(self::TABLE_NAME, self::PRIMARY_ID);/* ANCHOR: name table - id */
    }
}