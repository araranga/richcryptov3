<?php

class Mind_Accounts_Model_Mysql4_Accounts extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the accounts_id refers to the key field in your database table.
        $this->_init('accounts/accounts', 'accounts_id');
    }
}