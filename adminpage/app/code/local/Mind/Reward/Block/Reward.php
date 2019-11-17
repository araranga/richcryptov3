<?php
class Mind_Reward_Block_Reward extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getReward()     
     { 
        if (!$this->hasData('reward')) {
            $this->setData('reward', Mage::registry('reward'));
        }
        return $this->getData('reward');
        
    }
}