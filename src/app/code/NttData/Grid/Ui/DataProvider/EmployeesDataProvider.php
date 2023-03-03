<?php

namespace NttData\Grid\Ui\DataProvider;

use NttData\Grid\Model\ResourceModel\Grid\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

class EmployeesDataProvider extends AbstractDataProvider
{
    protected $collection;
    protected $dataPersistor;
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $gridCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
        ){
        $this->collection = $gridCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }

    public function getData(){
        if(isset($this->loadedData)){
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach( $items as $item){
            $this->loadedData[$item->getId()] = $item->getData();
        }

        $data = $this->dataPersistor->get('id');
        if(!empty($data)){
            $employee = $this->collection->getNewEmptyItem();
            $employee->setData($data);
            $this->loadedData[$employee->getId()] = $employee->getData();
            $this->dataPersistor->clear('id');
        }

        return $this->loadedData;
    }
}