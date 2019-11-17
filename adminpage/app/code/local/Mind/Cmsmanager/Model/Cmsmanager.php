<?php

class Mind_Cmsmanager_Model_Cmsmanager extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('cmsmanager/cmsmanager');
    }
}