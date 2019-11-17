<?php

class Mind_Forumcategorymanager_Block_Adminhtml_Forumcategorymanager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('forumcategorymanagerGrid');
      $this->setDefaultSort('forumcategorymanager_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('forumcategorymanager/forumcategorymanager')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('forumcategorymanager_id', array(
          'header'    => Mage::helper('forumcategorymanager')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'forumcategorymanager_id',
      ));

      $this->addColumn('forumcategorymanager_name', array(
          'header'    => Mage::helper('forumcategorymanager')->__('Title'),
          'align'     =>'left',
          'index'     => 'forumcategorymanager_name',
      ));


	  
      return parent::_prepareColumns();
  }


  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}