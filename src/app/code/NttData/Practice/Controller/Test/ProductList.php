<?php
namespace NttData\Practice\Controller\Test;

class ProductList extends \Magento\Framework\App\Action\Action{
	protected $_pageFactory;
	private $_storeManager;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Store\Model\StoreManagerInterface $storeManager
		){
		$this->_pageFactory = $pageFactory;
		$this->_storeManager = $storeManager;
		return parent::__construct($context);
	}

	public function execute(){
		$idStore = $this->_storeManager->getStore()->getId();
		date_default_timezone_set('America/New_York'); //ANCHOR: Horario default
        if ($idStore == 2) {
            date_default_timezone_set('America/Argentina/Buenos_Aires');
        }
		$date = date('H:i A');
		$this->pageFactory = $this->_pageFactory->create();
		$this->pageFactory->getConfig()->getTitle()->set(__('Now being %1 I am learning translations',$date));
		return $this->pageFactory;
	}
}
