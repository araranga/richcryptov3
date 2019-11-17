<?php
class Mind_Forummanager_Block_Forummanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getForummanager()     
     { 
        if (!$this->hasData('forummanager')) {
            $this->setData('forummanager', Mage::registry('forummanager'));
        }
        return $this->getData('forummanager');
        
    }
}