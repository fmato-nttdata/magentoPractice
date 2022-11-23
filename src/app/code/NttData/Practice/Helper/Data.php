<?php

namespace NttData\Practice\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Backend\Block\Template\Context;

class Data extends AbstractHelper{
    // NOTE: estas son constantes que hacen referencia a los id del system.xml de este modulo
    const IS_ENABLED = 'practice_section/practice_group/pracFi_enabled';
    const DISPLAY_LIMIT = 'practice_section/practice_group/pracFi_number';
    const DISPLAY_DROPDOWN = 'practice_section/practice_group/pracFi_attributte';
    const DISPLAY_ORDER = 'practice_section/practice_group/pracFi_order';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * Data constructor
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig){
            $this->_scopeConfig = $scopeConfig;
            parent::__construct($context);
    }

    /**
     * @return $isEnabled
     */
    public function isEnabled(){
        $isEnabled = $this->_scopeConfig->getValue(self::IS_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $isEnabled;
    }

    /**
     * @return $displayText
     */
    public function getDisplayLimit(){
        $displayText = $this->_scopeConfig->getValue(self::DISPLAY_LIMIT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $displayText;
    }

    /**
     * @return $displayDropdown
     */
    public function getDisplayDropdown(){
        $displayDropdown = $this->_scopeConfig->getValue(self::DISPLAY_DROPDOWN, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $displayDropdown;
    }

    /**
     * @return $displayOrder
     */
    public function getDisplayOrder(){
        $displayOrder = $this->_scopeConfig->getValue(self::DISPLAY_ORDER, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $displayOrder;
    }
}