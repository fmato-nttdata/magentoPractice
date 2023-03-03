<?php

namespace NttData\Grid\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class TypeEmployees implements ArrayInterface{
    public function toOptionArray(){

        return [
            ['value' => 'Designer', 'label' => __('Designer')],
            ['value' => 'Programmer', 'label' => __('Programmer')]
        ];
    }
}
