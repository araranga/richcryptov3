<?php

class Mind_Exitbonushistory_Block_Adminhtml_Exitbonushistory_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('exitbonushistoryGrid');
      $this->setDefaultSort('package_id,position');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }
  function getrate()
  {
      $codeq = mysql_query_cheat("SELECT rate_name,rate_id,rate_start FROM tbl_rate WHERE activated='1'");
      while($ccc=mysqli_fetch_array_cheat($codeq))
      {
      $crate[$ccc['rate_id']] = $ccc['rate_name']." - ".$ccc['rate_start'];
      }    
      return $crate;
  }  
  protected function _prepareCollection()
  {
      $collection = Mage::getModel('exitbonushistory/exitbonushistory')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('exitbonushistory_id', array(
          'header'    => Mage::helper('exitbonushistory')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'id',
      ));
      $this->addColumn('accounts_id', array(
          'header'    => Mage::helper('withdrawhistory')->__('User'),
          'align'     =>'left',
          'index'     => 'accounts_id',
      'renderer'=>'withdrawhistory/adminhtml_withdrawhistory_renderer_getuser',
      ));  
      $this->addColumn('package_summary', array(
          'header'    => Mage::helper('exitbonushistory')->__('Package Summary'),
          'align'     =>'left',
          'index'     => 'package_summary',    
      ));
      $this->addColumn('maturity_date', array(
          'header'    => Mage::helper('exitbonushistory')->__('Payout Date'),
          'align'     =>'left',
          'index'     => 'maturity_date',
      ));
	

      $this->addColumn('status', array(
          'header'    => Mage::helper('withdrawhistory')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Paid',
              0 => 'Not Paid',
          ),
      ));  

		$this->addExportType('*/*/exportCsv', Mage::helper('exitbonushistory')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('exitbonushistory')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('exitbonushistory_id');
        $this->getMassactionBlock()->setFormFieldName('exitbonushistory');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('exitbonushistory')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('exitbonushistory')->__('Are you sure?')
        ));

          // $statuses = Mage::getSingleton('exitbonushistory/paid')->getOptionArray();
          // array_unshift($statuses, array('label'=>'', 'value'=>''));
          // $this->getMassactionBlock()->addItem('status', array(
          //      'label'=> Mage::helper('exitbonushistory')->__('Change status'),
          //      'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
          //      'additional' => array(
          //             'visibility' => array(
          //                  'name' => 'status',
          //                  'type' => 'select',
          //                  'class' => 'required-entry',
          //                  'label' => Mage::helper('exitbonushistory')->__('Status'),
          //                  'values' => $statuses
          //              )
          //      )
          // ));

        $this->getMassactionBlock()->addItem('payout', array(
             'label'=> Mage::helper('exitbonushistory')->__('Payout'),
             'url'  => $this->getUrl('*/*/massPayout', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'payout',
                         'type' => 'hidden',
                         'class' => '',
                         'label' => Mage::helper('exitbonushistory')->__('Status'),
                     )
             )
        ));

        return $this;
    }

  public function getRowUrl($row)
  {
    return '#';
      #return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}