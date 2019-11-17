<?php

class Mind_Bannermanager_Model_Bannermanager extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('bannermanager/bannermanager');
    }
}