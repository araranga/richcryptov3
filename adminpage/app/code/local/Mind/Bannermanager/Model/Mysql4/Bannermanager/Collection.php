<?php

class Mind_Bannermanager_Model_Mysql4_Bannermanager_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('bannermanager/bannermanager');
    }
}