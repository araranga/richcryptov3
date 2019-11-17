<?php
class Mind_Tableone_Block_Tableone extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getTableone()     
     { 
        if (!$this->hasData('tableone')) {
            $this->setData('tableone', Mage::registry('tableone'));
        }
        return $this->getData('tableone');
        
    }
}