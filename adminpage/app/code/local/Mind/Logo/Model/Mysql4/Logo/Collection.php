<?php

class Mind_Logo_Model_Mysql4_Logo_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('logo/logo');
    }
}