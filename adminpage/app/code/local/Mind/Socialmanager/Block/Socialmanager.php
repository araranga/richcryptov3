<?php
class Mind_Socialmanager_Block_Socialmanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getSocialmanager()     
     { 
        if (!$this->hasData('socialmanager')) {
            $this->setData('socialmanager', Mage::registry('socialmanager'));
        }
        return $this->getData('socialmanager');
        
    }
}