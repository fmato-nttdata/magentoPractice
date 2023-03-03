<?php

namespace NttData\Grid\Controller\Adminhtml\Employees;

use NttData\Grid\Model\GridFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Save extends Action{

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        GridFactory $GridFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->GridFactory = $GridFactory;
        parent::__construct($context);
    }
    public function execute(){
        $data = $this->getRequest()->getPostValue();
        $resultPageFactory = $this->resultRedirectFactory->create();

        /* NOTE: check that the select is empty and we set a null */
        if(empty($data['emes_typeProgrammer'])){
            $data['emes_typeProgrammer'] = null;
        }

        if(empty($data['emes_typeDesigner'])){
            $data['emes_typeDesigner'] = null;
        }

        try {
            if ($data) {                
                $model = $this->GridFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }
        return $resultPageFactory->setPath('nttdata_grid/index/index');
    }

    public function _isAllowed(){
        return $this->_authorization->isAllowed('NttData_Grid::save');
    }
}
