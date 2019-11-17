<?php

class Mind_Withdrawhistory_Model_Status extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 0;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('withdrawhistory')->__('Claimed'),
            self::STATUS_DISABLED   => Mage::helper('withdrawhistory')->__('On Process')
        );
    }
}