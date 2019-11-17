<?php

class Mind_Withdrawhistory_Block_Adminhtml_Withdrawhistory_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('withdrawhistoryGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('withdrawhistory/withdrawhistory')->getCollection();
      $collection->getSelect()->join(array('t2' => "tbl_accounts"),'main_table.accounts_id = t2.accounts_id',array('t2.lastname','t2.firstname','t2.email'));
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('transnum', array(
          'header'    => Mage::helper('withdrawhistory')->__('Trans #'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'transnum',
      ));
      $this->addColumn('user', 
          array(
              'header'    => Mage::helper('withdrawhistory')->__('User'),
              'sortable'     => true,
              'index'        => array('firstname', 'lastname','email'),
              'type'         => 'concat',
              'separator'    => ' ',
              'filter_index' => "CONCAT(t2.firstname,' ', t2.lastname,t2.email)",
              'width'        => '140px',
          )
      );
      $this->addColumn('amount', array(
          'header'    => Mage::helper('withdrawhistory')->__('Amount'),
          'align'     =>'left',
          'index'     => 'amount',
      ));
	  
      $this->addColumn('summary', array(
          'header'    => Mage::helper('withdrawhistory')->__('Summary'),
          'align'     =>'left',
          'index'     => 'summary',
		  'renderer'=>'withdrawhistory/adminhtml_withdrawhistory_renderer_summary',
      ));	  
      $this->addColumn('claimtype', array(
          'header'    => Mage::helper('withdrawhistory')->__('Claim Type'),
          'align'     =>'left',
          'index'     => 'claimtype',
      ));      
      $this->addColumn('history', array(
          'header'    => Mage::helper('withdrawhistory')->__('Date'),
          'align'     =>'left',
          'index'     => 'history',
          'type' => 'datetime',

      ));

      $this->addColumn('claim_status', array(
          'header'    => Mage::helper('withdrawhistory')->__('Claim Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'claim_status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Claimed',
              0 => 'On Process',
          ),
      ));
	  
		
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('withdrawhistory');


        $statuses = Mage::getSingleton('withdrawhistory/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('claim_status', array(
             'label'=> Mage::helper('withdrawhistory')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'claim_status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('withdrawhistory')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      #return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}