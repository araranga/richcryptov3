<?php

class Mind_Forumcategorymanager_Model_Mysql4_Forumcategorymanager extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the forumcategorymanager_id refers to the key field in your database table.
        $this->_init('forumcategorymanager/forumcategorymanager', 'forumcategorymanager_id');
    }
}