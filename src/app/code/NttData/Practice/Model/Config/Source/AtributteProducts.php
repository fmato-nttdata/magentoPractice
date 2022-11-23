<?php
namespace NttData\Practice\Model\Config\Source;
use \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory;
/**
 * Config products source
 */

class AtributteProducts implements \Magento\Framework\Option\ArrayInterface{
    /**
     * Product attribute
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory $collectionFactory
     */

    protected $_collectionFactory;

    public function __construct(CollectionFactory $collectionFactory){
        $this -> _collectionFactory = $collectionFactory;
    }

    /**
     * @param boolean $empty
     * return array
     */

    public function toOptionArray($empty = true){
        $collection = $this -> _collectionFactory -> create();
        $options = [];
        if ($empty) {
            $options[] = ['label' => __(' Please select a attributes'), 'value' => ''];
        }
        foreach ($collection as $attributes) {
            $options[] = ['label' => $attributes->getName(), 'value' => $attributes->getName()];
        }

        return $options;
    }
}