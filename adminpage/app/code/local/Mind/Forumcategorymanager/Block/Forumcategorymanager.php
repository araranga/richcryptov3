<?php
class Mind_Forumcategorymanager_Block_Forumcategorymanager extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getForumcategorymanager()     
     { 
        if (!$this->hasData('forumcategorymanager')) {
            $this->setData('forumcategorymanager', Mage::registry('forumcategorymanager'));
        }
        return $this->getData('forumcategorymanager');
        
    }
}