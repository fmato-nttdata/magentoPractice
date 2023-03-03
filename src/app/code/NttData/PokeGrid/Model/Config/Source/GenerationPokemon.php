<?php
namespace NttData\PokeGrid\Model\Config\Source;

use NttData\PokeGrid\Helper\DataHelper;
use Magento\Framework\Option\ArrayInterface;

class GenerationPokemon implements ArrayInterface{
    /**
     * @var DataHelper
     */
    private $dataHelper;

    /**
     * GeneracionPokemon constructor.
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
        $generations = $this->dataHelper->getGenerationOptions();
        foreach ($generations as $generation) {
            $options[] = [
                'value' => $generation,
                'label' => $generation,
            ];
        }
        return $options;
    }
}
