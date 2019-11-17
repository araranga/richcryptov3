<?php
class Mind_Transaction_Model_Mysql4_Transaction extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("transaction/transaction", "id");
    }
}