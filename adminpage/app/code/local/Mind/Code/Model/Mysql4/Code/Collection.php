<?php

class Mind_Code_Model_Mysql4_Code_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('code/code');
    }
}