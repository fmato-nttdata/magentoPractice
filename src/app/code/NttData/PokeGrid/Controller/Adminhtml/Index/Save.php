<?php

namespace NttData\PokeGrid\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use NttData\PokeGrid\Model\PokemonFactory;

class Save extends Action{
    /**
     * @var PageFactory
     */
    protected $pokemonFactory;

    /**
     * constructor
     * 
     * @param PageFactory $resultPageFactory
     * @param Context $context
     */

    public function __construct(
        Context $context,
        PokemonFactory $pokemonFactory
    ) {
        parent::__construct($context);
        $this->pokemonFactory = $pokemonFactory;
    }

    public function execute(){
        try {
            $data = $this->getRequest()->getPostValue();
        
            $name = $data['name_pokemon'];
            $type = '';
            if (isset($data['type']) && is_array($data['type'])) {
                $type = implode(',', $data['type']);
            }
        
            $region = '';
            if (isset($data['region']) && is_array($data['region'])) {
                $region = implode(',', $data['region']);
            }
        
            $generation = '';
            if (isset($data['generation']) && is_array($data['generation'])) {
                $generation = implode(',', $data['generation']);
            }

            $pokemon = $this->pokemonFactory->create();

            $pokemon->setData('name_pokemon', $name);
            $pokemon->setData('type', $type);
            $pokemon->setData('region', $region);
            $pokemon->setData('generation', $generation);

            $pokemon->save();

            $this->messageManager->addSuccessMessage(__('Data saved successfully'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Error saving data: ' . $e->getMessage()));
        }
        $this->_redirect('nttdata_poke/index/index');

    }
}