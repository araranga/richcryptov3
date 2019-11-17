<?php
class Mind_Forumcategorymanager_Block_Adminhtml_Forumcategorymanager extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_forumcategorymanager';
    $this->_blockGroup = 'forumcategorymanager';
    $this->_headerText = Mage::helper('forumcategorymanager')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('forumcategorymanager')->__('Add Item');
    parent::__construct();
  }
}