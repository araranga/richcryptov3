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

				$this->addColumn("referrer", array(
				"header" => Mage::helper("customorders")->__("Referrer"),
				"index" => "referrer",
				));


				$this->addColumn("referrer2", array(
				"header" => Mage::helper("customorders")->__("Products"),
				"index" => "referrer",
				'renderer'  => 'Mind_Reward_Block_Prods',
				'filter' => false,

				));


                
				$this->addColumn("comission", array(
				"header" => Mage::helper("customorders")->__("Comission"),
				"index" => "comission",
				));
                




				$this->addColumn("status", array(
				"header" => Mage::helper("customorders")->__("Status"),
				"index" => "status",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			return $this->getUrl("*/*/loadorder", array("id" => $row->getId()));
		}

		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_cprods', array(
					 'label'=> Mage::helper('customorders')->__('Remove Cprods'),
					 'url'  => $this->getUrl('*/adminhtml_cprods/massRemove'),
					 'confirm' => Mage::helper('customorders')->__('Are you sure?')
				));
			return $this;
		}
		

}