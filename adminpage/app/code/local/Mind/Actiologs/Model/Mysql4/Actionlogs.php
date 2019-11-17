<?php
class Mind_Actiologs_Model_Mysql4_Actionlogs extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("actiologs/actionlogs", "id");
    }
}