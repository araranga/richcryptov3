<?php
class Mind_Rate_Block_Adminhtml_Rate extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_rate';
    $this->_blockGroup = 'rate';
    $this->_headerText = Mage::helper('rate')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('rate')->__('Add Item');
    parent::__construct();
  }
}