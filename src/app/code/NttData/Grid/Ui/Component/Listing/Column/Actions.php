<?php

namespace NttData\Grid\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column{
    protected $urlBuilder;
    private $editUrl;
    private $deleteUrl;

    const URL_EDIT = 'nttdata_grid/employees/edit';
    const URL_DELETE= 'nttdata_grid/employees/delete';

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::URL_EDIT,
        $deleteUrl = self::URL_DELETE
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        $this->deleteUrl = $deleteUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['id_employees'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl,['id'=>$item['id_employees']]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete '] = [
                        'href' => $this->urlBuilder->getUrl($this->deleteUrl,['id'=>$item['id_employees']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete employees?'),
                            'message' => __('Are you sure you want delete employee?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}