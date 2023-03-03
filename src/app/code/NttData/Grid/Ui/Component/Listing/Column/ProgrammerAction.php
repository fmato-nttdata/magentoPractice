<?php
namespace NttData\Grid\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use NttData\Grid\Model\ResourceModel\Programmer\CollectionFactory;

class ProgrammerAction extends Column{
    protected $_programmerFactory;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        CollectionFactory $programmerFactory,
        array $components = [],
        array $data = []
    ) {
        $this->_programmerFactory = $programmerFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource){
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['emes_typeProgrammer'])) {/* ANCHOR: true */
                    $data = $this->_programmerFactory->create(); /* ANCHOR create collection programmer */
                    $designer = $data->getData(); /* ANCHOR:  get the data from your database*/
                    foreach ($designer as $option) {
                        if ($item['emes_typeProgrammer'] == $option['id_programmer']) {
                            $item['emes_typeProgrammer'] = $option['prer_name'];
                        }
                    }
                }

                if(is_null($item['emes_typeProgrammer'])){
                    $item['emes_typeProgrammer'] = 'undefined';
                }
            }
        }
        return $dataSource;
    }
}