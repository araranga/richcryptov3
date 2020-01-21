<?php


class Mind_Customorders_Block_Adminhtml_Cprods extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_cprods";
	$this->_blockGroup = "customorders";
	$this->_headerText = Mage::helper("customorders")->__("Cprods Manager");
	$this->_addButtonLabel = Mage::helper("customorders")->__("Add New Item");
	parent::__construct();
	
	}

}