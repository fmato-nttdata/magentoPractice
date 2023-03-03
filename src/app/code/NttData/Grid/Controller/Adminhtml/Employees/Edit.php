<?php

namespace NttData\Grid\Controller\Adminhtml\Employees;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\App\Action;

class Edit extends Action{
    public function execute(){
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Edit employees'));
        return $resultPage;
    }
}