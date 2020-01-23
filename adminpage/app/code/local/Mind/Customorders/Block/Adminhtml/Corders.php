<?php


class Mind_Customorders_Block_Adminhtml_Corders extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_corders";
	$this->_blockGroup = "customorders";
	$this->_headerText = Mage::helper("customorders")->__("Corders Manager");
	$this->_addButtonLabel = Mage::helper("customorders")->__("Add New Item");
	parent::__construct();
	#$this->_removeButton('add');
	}

}