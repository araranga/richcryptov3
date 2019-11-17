<?php
class Mind_Rate_Block_Rate extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getRate()     
     { 
        if (!$this->hasData('rate')) {
            $this->setData('rate', Mage::registry('rate'));
        }
        return $this->getData('rate');
        
    }
}