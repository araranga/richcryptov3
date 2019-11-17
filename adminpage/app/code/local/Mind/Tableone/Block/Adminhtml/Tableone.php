<?php
class Mind_Tableone_Block_Adminhtml_Tableone extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_tableone';
    $this->_blockGroup = 'tableone';
    $this->_headerText = Mage::helper('tableone')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('tableone')->__('Add Item');
    parent::__construct();
  }
}