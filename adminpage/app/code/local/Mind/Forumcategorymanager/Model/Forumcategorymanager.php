<?php

class Mind_Forumcategorymanager_Model_Forumcategorymanager extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('forumcategorymanager/forumcategorymanager');
    }
}