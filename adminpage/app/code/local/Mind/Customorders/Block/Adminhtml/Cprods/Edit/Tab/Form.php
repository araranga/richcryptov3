<?php
class Mind_Customorders_Block_Adminhtml_Cprods_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("customorders_form", array("legend"=>Mage::helper("customorders")->__("Item information")));

				
						$fieldset->addField("name", "text", array(
						"label" => Mage::helper("customorders")->__("Name"),
						"class" => "required-entry",
						"required" => true,
						"name" => "name",
						));
					
						$fieldset->addField("price", "text", array(
						"label" => Mage::helper("customorders")->__("Price"),
						"class" => "required-entry",
						"required" => true,
						"name" => "price",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getCprodsData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCprodsData());
					Mage::getSingleton("adminhtml/session")->setCprodsData(null);
				}
				elseif(Mage::registry("cprods_data")) {
				    $form->setValues(Mage::registry("cprods_data")->getData());
				}
				return parent::_prepareForm();
		}
}
