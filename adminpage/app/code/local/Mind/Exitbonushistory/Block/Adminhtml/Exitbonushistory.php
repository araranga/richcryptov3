<?php
class Mind_Exitbonushistory_Block_Adminhtml_Exitbonushistory extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_exitbonushistory';
    $this->_blockGroup = 'exitbonushistory';
    $this->_headerText = Mage::helper('exitbonushistory')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('exitbonushistory')->__('Add Item');
    parent::__construct();
  }
}