<?php

class Mind_Rate_Model_Mysql4_Rate extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the rate_id refers to the key field in your database table.
        $this->_init('rate/rate', 'rate_id');
    }
}