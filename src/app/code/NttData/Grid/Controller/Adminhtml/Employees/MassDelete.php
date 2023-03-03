<?php
namespace NttData\Grid\Controller\Adminhtml\Employees;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use NttData\Grid\Model\ResourceModel\Grid\CollectionFactory;
use NttData\Grid\Model\GridFactory;

class MassDelete extends Action{
    public $collectionFactory;
    public $filter;
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        GridFactory $blogFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->blogFactory = $blogFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());

            $count = 0;
            foreach ($collection as $model) {
                $model = $this->blogFactory->create()->load($model->getId_employees());
                $model->delete();
                $count++;
            }
            $this->messageManager->addSuccessMessage(__('You deleted the employees.', $count));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('nttdata_grid/index/index');
    }

    public function _isAllowed(){
        return $this->_authorization->isAllowed('NttData_Grid::delete');
    }
}