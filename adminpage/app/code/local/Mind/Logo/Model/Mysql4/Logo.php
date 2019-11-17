<?php

class Mind_Logo_Model_Mysql4_Logo extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the logo_id refers to the key field in your database table.
        $this->_init('logo/logo', 'logo_id');
    }
}