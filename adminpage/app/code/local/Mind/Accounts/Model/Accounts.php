<?php

class Mind_Accounts_Model_Accounts extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('accounts/accounts');
    }
}