<?php
class Mind_Forummanager_Block_Adminhtml_Forummanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_forummanager';
    $this->_blockGroup = 'forummanager';
    $this->_headerText = Mage::helper('forummanager')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('forummanager')->__('Add Item');
    parent::__construct();
  }
}