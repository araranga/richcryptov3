<?php
class Mind_Withdrawhistory_Block_Adminhtml_Withdrawhistory extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_withdrawhistory';
    $this->_blockGroup = 'withdrawhistory';
    $this->_headerText = Mage::helper('withdrawhistory')->__('Item Manager');

	//$this->_addButton('add_new1', array(
	// 'label'   => Mage::helper('catalog')->__('Export Pickup'),
	// 'onclick' => "setLocation('{$this->getUrl('*/*/csvs/r/pickup')}')",
	// 'class'   => 'print'
	// ));
	
	// $this->_addButton('add_new2', array(
	// 'label'   => Mage::helper('catalog')->__('Export Bank'),
	// 'onclick' => "setLocation('{$this->getUrl('*/*/csvs/r/bank')}')",
	// 'class'   => 'print'
	// ));
	// $this->_addButton('add_new3', array(
	// 'label'   => Mage::helper('catalog')->__('Export Remit'),
	// 'onclick' => "setLocation('{$this->getUrl('*/*/csvs/r/remit')}')",
	// 'class'   => 'print'
	// ));
	// $this->_addButton('add_new4', array(
	// 'label'   => Mage::helper('catalog')->__('Export Smart Padala'),
	// 'onclick' => "setLocation('{$this->getUrl('*/*/csvs/r/smartpadala')}')",
	// 'class'   => 'print'
	// ));	
    
   // $this->_addButtonLabel = Mage::helper('withdrawhistory')->__('Add Item');
    parent::__construct();




	



  }
}