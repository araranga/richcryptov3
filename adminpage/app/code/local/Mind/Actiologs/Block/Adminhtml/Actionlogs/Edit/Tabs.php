<?php
class Mind_Actiologs_Block_Adminhtml_Actionlogs_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("actionlogs_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("actiologs")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("actiologs")->__("Item Information"),
				"title" => Mage::helper("actiologs")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("actiologs/adminhtml_actionlogs_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
