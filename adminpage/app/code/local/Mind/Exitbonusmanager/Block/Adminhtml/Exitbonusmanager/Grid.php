<?php

class Mind_Exitbonusmanager_Block_Adminhtml_Exitbonusmanager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  function getrate()
  {
      $codeq = mysql_query_cheat("SELECT rate_name,rate_id,rate_start FROM tbl_rate WHERE activated='1'");
      while($ccc=mysqli_fetch_array_cheat($codeq))
      {
      $crate[$ccc['rate_id']] = $ccc['rate_name']." - ".$ccc['rate_start'];
      }    
      return $crate;
  }  
	
  public function __construct()
  {
      parent::__construct();
      $this->setId('exitbonusmanagerGrid');
      $this->setDefaultSort('exitbonusmanager_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('exitbonusmanager/exitbonusmanager')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('exitbonusmanager_id', array(
          'header'    => Mage::helper('exitbonusmanager')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'exitbonusmanager_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('exitbonusmanager')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('exitbonusmanager')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('rate_id', array(
          'header'    => Mage::helper('exitbonusmanager')->__('Rate Type'),
          'align'     => 'left',
          
          'index'     => 'rate_id',
          'type'      => 'options',
          'options'   => $this->getrate(),
      ));
	  
      $this->addColumn('exit_number', array(
          'header'    => Mage::helper('exitbonusmanager')->__('Exit Number'),
          'align'     =>'left',
          'index'     => 'exit_number',
		  'width'     => '80px',
      ));	  
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('exitbonusmanager')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('exitbonusmanager')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('exitbonusmanager')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('exitbonusmanager')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('exitbonusmanager_id');
        $this->getMassactionBlock()->setFormFieldName('exitbonusmanager');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('exitbonusmanager')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('exitbonusmanager')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('exitbonusmanager/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('exitbonusmanager')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('exitbonusmanager')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}