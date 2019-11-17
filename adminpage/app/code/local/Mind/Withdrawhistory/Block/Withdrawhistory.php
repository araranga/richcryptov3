<?php
class Mind_Withdrawhistory_Block_Withdrawhistory extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getWithdrawhistory()     
     { 
        if (!$this->hasData('withdrawhistory')) {
            $this->setData('withdrawhistory', Mage::registry('withdrawhistory'));
        }
        return $this->getData('withdrawhistory');
        
    }
}