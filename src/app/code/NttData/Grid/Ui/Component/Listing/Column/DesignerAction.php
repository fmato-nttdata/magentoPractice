<?php
namespace NttData\Grid\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use NttData\Grid\Model\ResourceModel\Designer\CollectionFactory;

class DesignerAction extends Column{

    protected $_designerFactory;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        CollectionFactory $designerFactory,
        array $components = [],
        array $data = []
    ) {
        $this->_designerFactory = $designerFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource){
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['emes_typeDesigner'])) {/* ANCHOR: true */
                    $data = $this->_designerFactory->create(); /* ANCHOR create collection designer */
                    $designer = $data->getData(); /* ANCHOR:  get the data from your database*/
                    foreach ($designer as $option) {
                        if ($item['emes_typeDesigner'] == $option['id_designer']) {
                            $item['emes_typeDesigner'] = $option['deer_name'];
                        }
                    }
                }

                if(is_null($item['emes_typeDesigner'])){
                    $item['emes_typeDesigner'] = 'undefined';
                }
            }
        }
        return $dataSource;
    }
}