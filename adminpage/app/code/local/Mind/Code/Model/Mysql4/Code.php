<?php

class Mind_Code_Model_Mysql4_Code extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the code_id refers to the key field in your database table.
        $this->_init('code/code', 'code_id');
    }
}