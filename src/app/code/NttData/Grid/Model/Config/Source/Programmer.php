<?php

namespace NttData\Grid\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use NttData\Grid\Model\ResourceModel\Programmer\CollectionFactory as CollectionProgrammer; /* NOTE: retrieves the data form the database using a collection */
/**
 * Config products source
 */

class Programmer implements ArrayInterface{
    /**
     * Data programmer
     *
     * @var CollectionProgrammer $CollectionProgrammer
     */

    protected $_collectionProgrammer;

    public function __construct(CollectionProgrammer $collectionProgrammer){
        $this -> _collectionProgrammer = $collectionProgrammer;
    }

    /**
     * @param boolean $empty
     * return array
     */

    public function toOptionArray($empty = true){
        $collection = $this -> _collectionProgrammer -> create();
        $options = [];
        if ($empty) {
            $options[] = ['label' => __(' Please select a typeProgrammer'), 'value' => ''];
        }
        foreach ($collection as $typeProgrammer) {
            $options[] = ['label' => $typeProgrammer['prer_name'],'value' => $typeProgrammer['id_programmer']];
        }
        return $options;
    }
}