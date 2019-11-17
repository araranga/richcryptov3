<?php

class Mind_Exitbonusmanager_Model_Mysql4_Exitbonusmanager_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('exitbonusmanager/exitbonusmanager');
    }
}