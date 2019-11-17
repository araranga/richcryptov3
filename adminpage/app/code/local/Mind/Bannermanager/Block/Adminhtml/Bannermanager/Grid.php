<?php

class Mind_Bannermanager_Block_Adminhtml_Bannermanager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('bannermanagerGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('bannermanager/bannermanager')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('id', array(
          'header'    => Mage::helper('bannermanager')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'id',
      ));

      $this->addColumn('bannermanager_title', array(
          'header'    => Mage::helper('bannermanager')->__('Title'),
          'align'     =>'left',
          'index'     => 'bannermanager_title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('bannermanager')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */



	  
      return parent::_prepareColumns();
  }


  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}