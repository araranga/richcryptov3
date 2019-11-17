<?php

class Mind_Forummanager_Model_Mysql4_Forummanager_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('forummanager/forummanager');
    }
}