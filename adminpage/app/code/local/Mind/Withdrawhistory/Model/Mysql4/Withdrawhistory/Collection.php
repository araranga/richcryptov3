<?php

class Mind_Withdrawhistory_Model_Mysql4_Withdrawhistory_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('withdrawhistory/withdrawhistory');
    }
}