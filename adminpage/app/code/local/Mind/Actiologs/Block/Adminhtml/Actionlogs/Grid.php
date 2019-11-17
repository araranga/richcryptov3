<?php

class Mind_Actiologs_Block_Adminhtml_Actionlogs_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("actionlogsGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("actiologs/actionlogs")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("actiologs")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
           
				$this->addColumn("username", array(
				"header" => Mage::helper("actiologs")->__("Username"),
				"index" => "username",
				));

				$this->addColumn("logdata", array(
				"header" => Mage::helper("actiologs")->__("Log Data"),
				"index" => "logdata",
				));

				$this->addColumn("history", array(
				"header" => Mage::helper("actiologs")->__("Datetime"),
				"index" => "history",
				));

			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return '#';
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_actionlogs', array(
					 'label'=> Mage::helper('actiologs')->__('Remove Actionlogs'),
					 'url'  => $this->getUrl('*/adminhtml_actionlogs/massRemove'),
					 'confirm' => Mage::helper('actiologs')->__('Are you sure?')
				));
			return $this;
		}
			

}