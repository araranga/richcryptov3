<?php

class Mind_Actiologs_Block_Adminhtml_Actionlogs_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "actiologs";
				$this->_controller = "adminhtml_actionlogs";
				$this->_updateButton("save", "label", Mage::helper("actiologs")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("actiologs")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("actiologs")->__("Save And Continue Edit"),
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
				if( Mage::registry("actionlogs_data") && Mage::registry("actionlogs_data")->getId() ){

				    return Mage::helper("actiologs")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("actionlogs_data")->getId()));

				}
				else{

				     return Mage::helper("actiologs")->__("Add Item");

				}
		}
}