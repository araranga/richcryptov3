<?php

class Mind_Cmsmanager_Block_Adminhtml_Cmsmanager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('cmsmanagerGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('cmsmanager/cmsmanager')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('id', array(
          'header'    => Mage::helper('cmsmanager')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'id',
      ));

      $this->addColumn('cmsmanager_title', array(
          'header'    => Mage::helper('cmsmanager')->__('Title'),
          'align'     =>'left',
          'index'     => 'cmsmanager_title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('cmsmanager')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('cmsmanager')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('cmsmanager')->__('Edit'),
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