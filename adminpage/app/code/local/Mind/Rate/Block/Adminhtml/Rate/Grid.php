<?php

class Mind_Rate_Block_Adminhtml_Rate_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('rateGrid');
      $this->setDefaultSort('rate_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('rate/rate')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('rate_id', array(
          'header'    => Mage::helper('rate')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'rate_id',
      ));

      $this->addColumn('rate_name', array(
          'header'    => Mage::helper('rate')->__('Title'),
          'align'     =>'left',
          'index'     => 'rate_name',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('rate')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('activated', array(
          'header'    => Mage::helper('rate')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'activated',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
      $this->addColumn('rate_bet', array(
          'header'    => Mage::helper('rate')->__('Betting is on going?'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'activated',
          'type'      => 'options',
          'options'   => array(
              1 => 'Yes',
              2 => 'No',
          ),
      ));	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('rate')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('rate')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
	  
      return parent::_prepareColumns();
  }


  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}