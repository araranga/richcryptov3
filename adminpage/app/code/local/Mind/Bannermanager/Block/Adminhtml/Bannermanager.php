<?php
class Mind_Bannermanager_Block_Adminhtml_Bannermanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_bannermanager';
    $this->_blockGroup = 'bannermanager';
    $this->_headerText = Mage::helper('bannermanager')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('bannermanager')->__('Add Item');
    parent::__construct();
  }
}