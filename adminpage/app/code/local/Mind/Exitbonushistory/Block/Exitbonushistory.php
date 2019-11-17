<?php
class Mind_Exitbonushistory_Block_Exitbonushistory extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getExitbonushistory()     
     { 
        if (!$this->hasData('exitbonushistory')) {
            $this->setData('exitbonushistory', Mage::registry('exitbonushistory'));
        }
        return $this->getData('exitbonushistory');
        
    }
}