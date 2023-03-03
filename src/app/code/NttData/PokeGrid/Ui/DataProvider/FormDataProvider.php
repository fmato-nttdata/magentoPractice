<?php
namespace NttData\PokeGrid\Ui\DataProvider;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use NttData\PokeGrid\Model\ResourceModel\Pokemon\CollectionFactory;

class FormDataProvider extends AbstractDataProvider
{
    protected $collection;
    protected $dataPersistor;
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $pokemon) {
            $this->loadedData[$pokemon->getId()] = $pokemon->getData();
        }
        $data = $this->dataPersistor->get('id');
        if (!empty($data)) {
            $pokemon = $this->collection->getNewEmptyItem();
            $pokemon->setData($data);
            $this->loadedData[$pokemon->getId()] = $pokemon->getData();
            $this->dataPersistor->clear('id');
        }
        return $this->loadedData;
    }
}
