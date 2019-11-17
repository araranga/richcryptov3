<?php
class Mind_Exitbonusmanager_Block_Exitbonusmanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getExitbonusmanager()     
     { 
        if (!$this->hasData('exitbonusmanager')) {
            $this->setData('exitbonusmanager', Mage::registry('exitbonusmanager'));
        }
        return $this->getData('exitbonusmanager');
        
    }
}