<?php
namespace NttData\Practice\Block\Test;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ProductList extends \Magento\Framework\View\Element\Template{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;
    protected $_storeManager;
    protected $_helper;

    public function __construct(\Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \NttData\Practice\Helper\Data $helper,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,       
        array $data = []){
        $this->_helper = $helper;
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }
    
    
    public function getProductCollectionByCategories($ids){
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->addAttributeToFilter('description', array('like' => '%'.$this->_helper->getDisplayDropdown().'%'));
        $collection->setOrder('name', $this->_helper->getDisplayOrder());
        $collection->setPageSize($this->_helper->getDisplayLimit());
        $collection->setCurPage(1);
        return $collection;
    }

    //**********************************************************************************************

    public function getInfoClass(){
        $infoClass = get_class($this);
        return $infoClass;
    }

    public function isEnabled(){ //NOTE: return boolean
        return $this->_helper->isEnabled();
    }

    public function getIdAttribute(){
        return $this->_helper->getDisplayDropdown();

    }
}