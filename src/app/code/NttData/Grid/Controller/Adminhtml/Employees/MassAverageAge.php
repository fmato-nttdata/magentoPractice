<?php
namespace NttData\Grid\Controller\Adminhtml\Employees;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use NttData\Grid\Model\GridFactory;
use NttData\Grid\Model\ResourceModel\Grid\CollectionFactory;

class MassAverageAge extends Action{
    public $collectionFactory;
    public $filter;
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        GridFactory $gridFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->gridFactory = $gridFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());

            $count = 0;
            $age = 0;
            foreach ($collection as $model) {
                $age += $model['emes_age'];
                $count++;
            }
            $averageAge = round($age / $count, 2);
            $this->messageManager->addSuccessMessage(__('Average age '. $averageAge));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('nttdata_grid/index/index');
    }

    public function _isAllowed(){
        return $this->_authorization->isAllowed('NttData_Grid::averageAge');
    }
}