<?php

class Mind_Socialmanager_Model_Mysql4_Socialmanager extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the social_id refers to the key field in your database table.
        $this->_init('socialmanager/socialmanager', 'social_id');
    }
}