<?php

class Mind_Tableone_Model_Mysql4_Tableone extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the tableone_id refers to the key field in your database table.
        $this->_init('tableone/tableone', 'accounts_id');
    }
}