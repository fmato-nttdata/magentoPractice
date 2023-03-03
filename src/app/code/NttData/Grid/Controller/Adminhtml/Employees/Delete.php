<?php
namespace NttData\Grid\Controller\Adminhtml\Employees;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use NttData\Grid\Model\GridFactory;

class Delete extends Action{
    public $gridFactory;
    
    public function __construct(Context $context, GridFactory $gridFactory) {
        $this->gridFactory = $gridFactory;
        parent::__construct($context);
    }

    public function execute(){
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        try {
            $gridModel = $this->gridFactory->create();
            $gridModel->load($id);
            $gridModel->delete();
            $this->messageManager->addSuccessMessage(__('You deleted the employees.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('nttdata_grid/index/index');
    }

    public function _isAllowed(){
        return $this->_authorization->isAllowed('NttData_Grid::delete');
    }
}