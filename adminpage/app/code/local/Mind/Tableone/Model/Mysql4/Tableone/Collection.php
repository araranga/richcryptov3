<?php

class Mind_Tableone_Model_Mysql4_Tableone_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('tableone/tableone');
    }
}