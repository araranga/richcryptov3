<?php
class Mind_Code_Block_Code extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCode()     
     { 
        if (!$this->hasData('code')) {
            $this->setData('code', Mage::registry('code'));
        }
        return $this->getData('code');
        
    }
}