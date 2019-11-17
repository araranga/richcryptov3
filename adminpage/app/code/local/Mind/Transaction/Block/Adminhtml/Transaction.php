<?php


class Mind_Transaction_Block_Adminhtml_Transaction extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_transaction";
	$this->_blockGroup = "transaction";
	$this->_headerText = Mage::helper("transaction")->__("Transaction Manager");
	$this->_addButtonLabel = Mage::helper("transaction")->__("Add New Item");
	parent::__construct();
	
	}

}