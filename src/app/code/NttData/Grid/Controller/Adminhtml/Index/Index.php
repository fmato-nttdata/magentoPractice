<?php

namespace NttData\Grid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

class Index extends Action implements HttpGetActionInterface{

    public function execute(){
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('NttData_Grid::business');
        $resultPage->getConfig()->getTitle()->prepend(__('Admin Grid employees'));
        return $resultPage;
    }

    protected function _isAllowed(){
        return true;
    }

}