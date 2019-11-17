<?php
	
class Mind_Transaction_Block_Adminhtml_Transaction_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "transaction";
				$this->_controller = "adminhtml_transaction";
				$this->_updateButton("save", "label", Mage::helper("transaction")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("transaction")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("transaction")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("transaction_data") && Mage::registry("transaction_data")->getId() ){

				    return Mage::helper("transaction")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("transaction_data")->getId()));

				} 
				else{

				     return Mage::helper("transaction")->__("Add Item");

				}
		}
}