<?php


class Mind_Actiologs_Block_Adminhtml_Actionlogs extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_actionlogs";
	$this->_blockGroup = "actiologs";
	$this->_headerText = Mage::helper("actiologs")->__("Actionlogs Manager");
	$this->_addButtonLabel = Mage::helper("actiologs")->__("Add New Item");
	parent::__construct();
	
	}

}