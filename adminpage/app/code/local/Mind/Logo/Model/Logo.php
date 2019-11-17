<?php

class Mind_Logo_Model_Logo extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('logo/logo');
    }
}