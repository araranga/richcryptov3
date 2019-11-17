<?php
class Mind_Actiologs_Block_Adminhtml_Actionlogs_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("actiologs_form", array("legend"=>Mage::helper("actiologs")->__("Item information")));

				
						$fieldset->addField("actiondata", "text", array(
						"label" => Mage::helper("actiologs")->__("actiondata"),
						"name" => "actiondata",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getActionlogsData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getActionlogsData());
					Mage::getSingleton("adminhtml/session")->setActionlogsData(null);
				}
				elseif(Mage::registry("actionlogs_data")) {
				    $form->setValues(Mage::registry("actionlogs_data")->getData());
				}
				return parent::_prepareForm();
		}
}
