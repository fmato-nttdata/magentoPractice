<?php
namespace NttData\Practice\Block\Test;
class ProductList extends \Magento\Framework\View\Element\Template{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
    )
    {    
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context);
    }
    
    
    public function getProductCollectionByCategories($ids){
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setOrder('name', 'DESC');
        $collection->setPageSize(10);
        $collection->setCurPage(1);
        return $collection;
    }

    public function getInfoClass(){
        $dato = get_class($this);
        return $dato;
    }
}