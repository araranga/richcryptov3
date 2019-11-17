<?php

class Mind_Exitbonusmanager_Model_Mysql4_Exitbonusmanager extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the exitbonusmanager_id refers to the key field in your database table.
        $this->_init('exitbonusmanager/exitbonusmanager', 'exitbonusmanager_id');
    }
}