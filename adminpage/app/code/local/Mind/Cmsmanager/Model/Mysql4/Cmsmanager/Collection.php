<?php

class Mind_Cmsmanager_Model_Mysql4_Cmsmanager_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('cmsmanager/cmsmanager');
    }
}