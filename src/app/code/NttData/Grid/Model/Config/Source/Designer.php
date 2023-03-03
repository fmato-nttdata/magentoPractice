<?php

namespace NttData\Grid\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use NttData\Grid\Model\ResourceModel\Designer\CollectionFactory as CollectionDesigner;
/**
 * Config products source
 */

class Designer implements ArrayInterface{
    /**
     * Data designer
     *
     * @var CollectionDesigner $collectionDesigner
     */

    protected $_collectionDesigner;

    public function __construct(CollectionDesigner $collectionDesigner){
        $this -> _collectionDesigner = $collectionDesigner;
    }

    /**
     * @param boolean $empty
     * return array
     */

    public function toOptionArray($empty = true){
        $collection = $this -> _collectionDesigner -> create();
        $options = [];
        if ($empty) {
            $options[] = ['label' => __(' Please select a typeDesigner'), 'value' => ''];
        }
        foreach ($collection as $typeDesigner) {
            $options[] = ['label' => $typeDesigner['deer_name'],'value' => $typeDesigner['id_designer']];
        }
        return $options;
    }
}