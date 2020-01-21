<?php

class Mind_Customorders_Block_Adminhtml_Corders_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("cordersGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("customorders/corders")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("customorders")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("quote", array(
				"header" => Mage::helper("customorders")->__("Order Details"),
				"index" => "quote",
				));
                
				$this->addColumn("dateorder", array(
				"header" => Mage::helper("customorders")->__("Date"),
				"index" => "dateorder",
				'type' => 'datetime'
				));
				$this->addColumn("status", array(
				"header" => Mage::helper("customorders")->__("Status"),
				"index" => "status",
				));


				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			return $this->getUrl("*/*/loadorder", array("id" => $row->getId()));
		}


		

}