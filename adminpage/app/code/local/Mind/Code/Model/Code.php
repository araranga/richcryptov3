<?php

class Mind_Code_Model_Code extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('code/code');
    }
}