<?php
namespace NttData\PokeGrid\Model\Config\Source;

use NttData\PokeGrid\Helper\DataHelper;
use Magento\Framework\Option\ArrayInterface;

class RegionPokemon implements ArrayInterface{
    /**
     * @var DataHelper
     */
    private $dataHelper;

    /**
     * RegionPokemon constructor.
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
        $regions = $this->dataHelper->getRegionOptions();
        foreach ($regions as $region) {
            $options[] = [
                'value' => $region,
                'label' => $region,
            ];
        }
        return $options;
    }
}
