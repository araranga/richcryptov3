<?php
class Mind_Exitbonusmanager_Block_Adminhtml_Exitbonusmanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_exitbonusmanager';
    $this->_blockGroup = 'exitbonusmanager';
    $this->_headerText = Mage::helper('exitbonusmanager')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('exitbonusmanager')->__('Add Item');
    parent::__construct();
  }
}