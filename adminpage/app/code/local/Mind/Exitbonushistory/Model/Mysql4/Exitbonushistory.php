<?php

class Mind_Exitbonushistory_Model_Mysql4_Exitbonushistory extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the exitbonushistory_id refers to the key field in your database table.
        $this->_init('exitbonushistory/exitbonushistory', 'id');
    }
}