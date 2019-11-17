<?php

class Mind_Withdrawhistory_Model_Withdrawhistory extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('withdrawhistory/withdrawhistory');
    }
}