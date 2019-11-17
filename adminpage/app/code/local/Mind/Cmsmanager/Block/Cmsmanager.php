<?php
class Mind_Cmsmanager_Block_Cmsmanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCmsmanager()     
     { 
        if (!$this->hasData('cmsmanager')) {
            $this->setData('cmsmanager', Mage::registry('cmsmanager'));
        }
        return $this->getData('cmsmanager');
        
    }
}