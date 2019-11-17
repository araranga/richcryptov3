<?php

class Mind_Transaction_Block_Adminhtml_Transaction_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("transactionGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("transaction/transaction")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("transaction")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("transaction_key", array(
				"header" => Mage::helper("transaction")->__("Key"),
				"index" => "transaction_key",
				));
				$this->addColumn("transaction_userid", array(
				"header" => Mage::helper("transaction")->__("Userid"),
				"index" => "transaction_userid",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_transaction', array(
					 'label'=> Mage::helper('transaction')->__('Remove Transaction'),
					 'url'  => $this->getUrl('*/adminhtml_transaction/massRemove'),
					 'confirm' => Mage::helper('transaction')->__('Are you sure?')
				));
			return $this;
		}
			

}