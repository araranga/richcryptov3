<?php
class Mind_Code_Block_Adminhtml_Code extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_code';
    $this->_blockGroup = 'code';
    $this->_headerText = Mage::helper('code')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('code')->__('Add Item');
    parent::__construct();
  }
}