<?php
class Mind_Reward_Block_Adminhtml_Reward extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_reward';
    $this->_blockGroup = 'reward';
    $this->_headerText = Mage::helper('reward')->__('Item Manager');
    #$this->_addButtonLabel = Mage::helper('reward')->__('Add Item');
    parent::__construct();
	$this->_removeButton('add');
  }
}