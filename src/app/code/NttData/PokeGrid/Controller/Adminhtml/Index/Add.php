<?php

namespace NttData\PokeGrid\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\App\Action;

class Add extends Action{
    public function execute(){
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Add new pokemon'));
        return $resultPage;
    }
}