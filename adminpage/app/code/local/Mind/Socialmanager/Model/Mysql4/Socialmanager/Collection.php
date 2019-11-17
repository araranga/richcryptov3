<?php

class Mind_Socialmanager_Model_Mysql4_Socialmanager_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('socialmanager/socialmanager');
    }
}