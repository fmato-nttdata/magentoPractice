<?php

namespace NttData\PokeGrid\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action{
    protected $collectionFactory;

    public function __construct(Context $context){
        parent::__construct($context);
    }

    public function execute(){
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('NttData_PokeGrid::pokemon');
        $resultPage->getConfig()->getTitle()->prepend(__('Admin Grid pokemon'));
        return $resultPage;
    }
}