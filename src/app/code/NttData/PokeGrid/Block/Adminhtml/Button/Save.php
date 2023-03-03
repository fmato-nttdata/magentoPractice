<?php

namespace NttData\PokeGrid\Block\Adminhtml\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class Save extends Generic implements ButtonProviderInterface{
    public function getButtonData(){
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'pokemon_form.pokemon_form',
                                'actionName' => 'save',
                                'params' => [
                                    false,
                                ],
                            ],
                        ],
                    ],
                ],
            ]
            /* ,'class_name' => Container::SPLIT_BUTTON, */
            /* 'options' => $this->getOptions(), */
        ];
    }

    /* NOTE: function that gives data saving options */
    /* protected function getOptions(){
        $options[] = [
            'id_hard' => 'save_and_new',
            'label' => __('Save & New'),
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'employees_add.employees_add',
                                'actionName' => 'save',
                                'params' => [
                                    true,
                                    [
                                        'back' => 'add',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $options[] = [
            'id_hard' => 'save_and_close',
            'label' => __('Save & Close'),
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'employees_add.employees_add',
                                'actionName' => 'save',
                                'params' => [
                                    true,
                                    [
                                        'back' => 'close',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        return $options;
    } */
}