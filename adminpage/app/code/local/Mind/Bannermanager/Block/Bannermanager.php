<?php
class Mind_Bannermanager_Block_Bannermanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getBannermanager()     
     { 
        if (!$this->hasData('bannermanager')) {
            $this->setData('bannermanager', Mage::registry('bannermanager'));
        }
        return $this->getData('bannermanager');
        
    }
}