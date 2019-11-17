<?php

class Mind_Socialmanager_Model_Socialmanager extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('socialmanager/socialmanager');
    }
}