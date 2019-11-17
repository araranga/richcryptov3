<?php

class Mind_Cmsmanager_Model_Mysql4_Cmsmanager extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the id refers to the key field in your database table.
        $this->_init('cmsmanager/cmsmanager', 'id');
    }
}