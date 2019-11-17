<?php

class Mind_Tableone_Model_Tableone extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('tableone/tableone');
    }
}