<?php
class Mind_Accounts_Block_Adminhtml_Accounts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_accounts';
    $this->_blockGroup = 'accounts';
    $this->_headerText = Mage::helper('accounts')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('accounts')->__('Add Item');


	
    parent::__construct();
  }
}