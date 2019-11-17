<?php

class Mind_Tableone_Block_Adminhtml_Tableone_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('tableoneGrid');
      $this->setDefaultSort('accounts_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('tableone/tableone')->getCollection();
	  $collection->addFieldToFilter("curtbl", array("neq" => ''));
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('username', array(
          'header'    => Mage::helper('tableone')->__('Username'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'username',	  
      ));	
      $this->addColumn('firstname', array(
          'header'    => Mage::helper('tableone')->__('Firstname'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'firstname',	  
      ));
      $this->addColumn('lastname', array(
          'header'    => Mage::helper('tableone')->__('Lastname'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'lastname',	  
      ));	  
      $this->addColumn('curtbl', array(
          'header'    => Mage::helper('reward')->__('Table Rewarded'),
          'align'     =>'left',
          'index'     => 'curtbl',
		  'renderer'  => 'Mind_Reward_Block_Tablerender2',
		  'filter' => false,
      ));

      $this->addColumn('date_payout', array(
          'header'    => Mage::helper('tableone')->__('Date Payout'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'date_payout',
		  'type' => 'datetime'
      ));
		$this->addExportType('*/*/exportCsv', Mage::helper('tableone')->__('CSV'));	  
      return parent::_prepareColumns();
  }

  

  public function getRowUrl($row)
  {
      #return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}