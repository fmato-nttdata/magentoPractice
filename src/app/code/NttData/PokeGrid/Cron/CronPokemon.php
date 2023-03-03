<?php

namespace NttData\PokeGrid\Cron;

use NttData\PokeGrid\Logger\Test;
use NttData\PokeGrid\Helper\DataHelper;
use NttData\PokeGrid\Model\PokemonFactory;
use NttData\PokeGrid\Model\ResourceModel\Pokemon\CollectionFactory;

class CronPokemon {
    /**
     * @var Test
     */
    protected $logFacu;

    /**
     * @var DataHelper
     */
    protected $dataHelper;

    /**
     * @var PokemonFactory
     */
    protected $pokemonFactory;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    public function __construct(
        DataHelper $dataHelper,
        PokemonFactory $pokemonFactory,
        CollectionFactory $collectionFactory,
        Test $logFacu
    ) {
        $this->dataHelper = $dataHelper;
        $this->pokemonFactory = $pokemonFactory;
        $this->collectionFactory = $collectionFactory; // usar para comprobar si hay datos en la base de datos
        $this->logFacu = $logFacu;
    }

    public function execute(){
        //NOTE: es para comprobar si hay registros en la tabla y configurar el offset que nos traera nuevos datos de la api
        $baseInfo = $this->collectionFactory->create();
        $id = array();
        
        foreach($baseInfo as $pokemon){
            $id[] = $pokemon['id'];
        }
        if(!empty($id)){
            $endId = end($id);
            $intValue = intval($endId);
            $offset = $intValue;
        }else{
            $offset = 0;
        }

        $urlMain = 'https://pokeapi.co/api/v2/pokemon';
        $limit = 5;
        $pokemons = $this->dataHelper->getDataInfo($urlMain. '/?limit=' .$limit. '&offset=' .$offset, 'GET');
        foreach ($pokemons['results'] as $pokemon) {
            $urlInfo = $pokemon['url'];
            $name = $pokemon['name'];

            $dataType = array();
            $dataGeneration = array();
            $locationArea = array();
            $regionData = array();
            $region = array();

            // URL para obtener los datos especificos del pokemon
            $pokemonInfo = $this->dataHelper->getDataInfo($urlInfo, 'GET');

            //NOTE: obtenemos los tipos que tiene ese pokemon
            $arrayType = $pokemonInfo['types'];
            foreach($arrayType as $type){
                $dataType[] = $type['type']['name'];
            }
            $typePokemon = implode(',',$dataType);

            //NOTE: obtenemos las generaciones de ese pokemon
            $arrayGeneration = $pokemonInfo['sprites']['versions'];
            $dataGeneration = array_keys($arrayGeneration);
            $generationPokemon = implode(',', $dataGeneration);

            //NOTE: obtenemos la region del pokemon
            $urlPokemonRegion1 = $pokemonInfo['location_area_encounters'];
            $areaEncounters = $this->dataHelper->getDataInfo($urlPokemonRegion1, 'GET');
            foreach($areaEncounters as $value){
                $urlPokemonRegion2 = $value['location_area']['url'];
                $locationArea[] = $this->dataHelper->getDataInfo($urlPokemonRegion2, 'GET');
            }
            foreach($locationArea as $value){
                $urlPokemonRegion3 = $value['location']['url'];
                $regionData[] = $this->dataHelper->getDataInfo($urlPokemonRegion3, 'GET');
            }
            foreach($regionData as $value){
                $region[] = $value['region']['name'];
            }

            if(empty($region)){
                $regionPokemon = '';
            }else{
                $arraySinDuplicados = array_unique($region);
                $regionPokemon = implode(',',$arraySinDuplicados);
            }
            
            //NOTE: guardamos los datos ya seteados para ser guardados en la base de datos
            $newPokemon = $this->pokemonFactory->create();
            $newPokemon->addData([
                'name_pokemon' => $name,
                'type' => $typePokemon,
                'region' => $regionPokemon,
                'generation' => $generationPokemon
            ]);
            $newPokemon->save();

            $this->logFacu->info('Datos del nuevo Pokémon: ' . json_encode($newPokemon->getData()));
            
        }
    }
}
