<?php
namespace NttData\PokeGrid\Helper;

use NttData\ServiceApi\Api\ApiRequest;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;

class DataHelper extends AbstractHelper{
    /**
     * @var ApiRequest
     */
    private $pokemonRequest;

    /**
     * Data constructor.
     * @param Context $context
     * @param ApiRequest $pokemonRequest
     */
    public function __construct(
        Context $context,
        ApiRequest $pokemonRequest
    ) {
        $this->pokemonRequest = $pokemonRequest;
        parent::__construct($context);
    }

    /**
     * Get options for Region Multi-Select
     *
     * @return array
     */
    public function getRegionOptions(){
        $options = [];
        $pokemonClient = new ApiRequest();
        $data = $pokemonClient->getRequestInfo(
            'https://pokeapi.co/api/v2/region',
            'GET'
        );
        $regions = json_decode($data, true);

        if (isset($regions['results'])) {
            foreach ($regions['results'] as $region) {
                $options[$region['name']] = $region['name'];
            }
        }

        return $options;
    }

    /**
     * Get options for Generation Multi-Select
     *
     * @return array
     */
    public function getGenerationOptions(){
        $options = [];
        $pokemonClient = new ApiRequest();
        $data = $pokemonClient->getRequestInfo(
            'https://pokeapi.co/api/v2/generation',
            'GET'
        );
        $generations = json_decode($data, true);

        if (isset($generations['results'])) {
            foreach ($generations['results'] as $generation) {
                $options[$generation['name']] = $generation['name'];
            }
        }

        return $options;
    }

    /**
     * Get options for Type Multi-Select
     *
     * @return array
     */
    public function getTypeOptions(){
        $options = [];
        $pokemonClient = new ApiRequest();
        $data = $pokemonClient->getRequestInfo(
            'https://pokeapi.co/api/v2/type',
            'GET'
        );
        $types = json_decode($data, true);

        if (isset($types['results'])) {
            foreach ($types['results'] as $type) {
                $options[$type['name']] = $type['name'];
            }
        }

        return $options;
    }

    public function getDataInfo($url, $request){
        $pokemonClient = new ApiRequest();
        $data = $pokemonClient->getRequestInfo(
            $url,
            $request
        );
        $pokemon = json_decode($data, true);
        return $pokemon;
    }

}
