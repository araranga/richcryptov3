<?php
class Mind_Socialmanager_Block_Adminhtml_Socialmanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_socialmanager';
    $this->_blockGroup = 'socialmanager';
    $this->_headerText = Mage::helper('socialmanager')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('socialmanager')->__('Add Item');
    parent::__construct();
  }
}