<?php
namespace NttData\Practice\Model\Config\Source;

class OrderDirection implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Retrieve Custom Option array
     *
     * @return array
     */
    public function toOptionArray(){
        return [
            ['value' => 1, 'label' => __('ASC')],
            ['value' => 2, 'label' => __('DESC')]
        ];
    }
}