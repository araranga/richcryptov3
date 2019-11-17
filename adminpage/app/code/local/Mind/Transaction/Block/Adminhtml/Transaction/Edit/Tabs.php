<?php
class Mind_Transaction_Block_Adminhtml_Transaction_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("transaction_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("transaction")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("transaction")->__("Item Information"),
				"title" => Mage::helper("transaction")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("transaction/adminhtml_transaction_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
