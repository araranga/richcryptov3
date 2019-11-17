<?php

class Mind_Exitbonushistory_Model_Paid extends Varien_Object
{
    const STATUS_ENABLED_A	= 1;
    const STATUS_DISABLED_A	= 0;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED_A => Mage::helper('exitbonushistory')->__('Paid'),
            self::STATUS_DISABLED_A   => Mage::helper('exitbonushistory')->__('Not Paid')
        );
    }
}