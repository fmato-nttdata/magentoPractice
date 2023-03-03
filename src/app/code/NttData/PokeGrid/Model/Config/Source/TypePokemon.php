<?php
namespace NttData\PokeGrid\Model\Config\Source;

use NttData\PokeGrid\Helper\DataHelper;
use Magento\Framework\Option\ArrayInterface;

class TypePokemon implements ArrayInterface{
    /**
     * @var DataHelper
     */
    private $dataHelper;

    /**
     * TypePokemon constructor.
     * @param DataHelper $dataHelper
     */
    public function __construct(
        DataHelper $dataHelper
    ) {
        $this->dataHelper = $dataHelper;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray(){
        $options = [];
        $types = $this->dataHelper->getTypeOptions();
        foreach ($types as $type) {
            $options[] = [
                'value' => $type,
                'label' => $type,
            ];
        }
        return $options;
    }
}
