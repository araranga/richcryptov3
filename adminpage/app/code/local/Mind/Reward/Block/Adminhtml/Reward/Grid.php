<?php

class Mind_Reward_Block_Adminhtml_Reward_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('rewardGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('DESC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('reward/reward')->getCollection();
	  $collection->addFieldToFilter("done", array("eq" => 'yes'));
	   $collection->getSelect()->join(array('t2' => "tbl_accounts"),'main_table.accounts_id = t2.accounts_id',array('t2.lastname','t2.firstname','t2.username'));
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('username', array(
          'header'    => Mage::helper('reward')->__('Username'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'username',	  
      ));	
      $this->addColumn('firstname', array(
          'header'    => Mage::helper('reward')->__('Firstname'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'firstname',	  
      ));
      $this->addColumn('lastname', array(
          'header'    => Mage::helper('reward')->__('Lastname'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'lastname',	  
      ));	
      $this->addColumn('curtbl', array(
          'header'    => Mage::helper('reward')->__('Table Rewarded'),
          'align'     =>'left',
          'index'     => 'curtbl',
		  'renderer'  => 'Mind_Reward_Block_Tablerender',
		  'filter' => false,
      ));
      $this->addColumn('date_payout', array(
          'header'    => Mage::helper('reward')->__('Date Payout'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'date_payout',
		  'type' => 'datetime'
      ));	  
	  /*  
      $this->addColumn('done', array(
          'header'    => Mage::helper('reward')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'done',
          'type'      => 'options',
          'options'   => array(
              'yes' => 'Rewarded',
              'no' => 'On Progress',
          ),
      ));
	  */
		
		$this->addExportType('*/*/exportCsv', Mage::helper('reward')->__('CSV'));
	  
      return parent::_prepareColumns();
  }


  public function getRowUrl($row)
  {
      #return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}