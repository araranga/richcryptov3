<?php
class Mind_Transaction_Block_Adminhtml_Transaction_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("transaction_form", array("legend"=>Mage::helper("transaction")->__("Item information")));

				
						$fieldset->addField("transaction_key", "text", array(
						"label" => Mage::helper("transaction")->__("Key"),
						"name" => "transaction_key",
						));
					
						$fieldset->addField("transaction_userid", "text", array(
						"label" => Mage::helper("transaction")->__("Userid"),
						"name" => "transaction_userid",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getTransactionData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getTransactionData());
					Mage::getSingleton("adminhtml/session")->setTransactionData(null);
				} 
				elseif(Mage::registry("transaction_data")) {
				    $form->setValues(Mage::registry("transaction_data")->getData());
				}
				return parent::_prepareForm();
		}
}
