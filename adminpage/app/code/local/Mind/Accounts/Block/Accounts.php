<?php
class Mind_Accounts_Block_Accounts extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getAccounts()     
     { 
        if (!$this->hasData('accounts')) {
            $this->setData('accounts', Mage::registry('accounts'));
        }
        return $this->getData('accounts');
        
    }
}