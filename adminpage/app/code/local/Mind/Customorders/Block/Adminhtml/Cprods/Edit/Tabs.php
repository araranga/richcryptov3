<?php
class Mind_Customorders_Block_Adminhtml_Cprods_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("cprods_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("customorders")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("customorders")->__("Item Information"),
				"title" => Mage::helper("customorders")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("customorders/adminhtml_cprods_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
