<?php

class Mind_Forummanager_Model_Forummanager extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('forummanager/forummanager');
    }
}