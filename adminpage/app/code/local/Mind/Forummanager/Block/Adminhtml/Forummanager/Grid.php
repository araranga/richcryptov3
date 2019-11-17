<?php

class Mind_Forummanager_Block_Adminhtml_Forummanager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('forummanagerGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }
  public function getforumcat()
  {
    $array = array();
    $q = mysql_query_cheat("SELECT * FROM tbl_forumcategorymanager WHERE activated='1'");
    while($row=mysqli_fetch_array_cheat($q))
    {
      $array[$row['forumcategorymanager_id']] = $row['forumcategorymanager_name'];
    }
    return $array;
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('forummanager/forummanager')->getCollection();
      $collection->getSelect()->join(array('t2' => "tbl_accounts"),'main_table.forummanager_parent = t2.accounts_id',array('t2.lastname','t2.firstname','t2.email'));
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('id', array(
          'header'    => Mage::helper('forummanager')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'id',
      ));

      $this->addColumn('forummanager_title', array(
          'header'    => Mage::helper('forummanager')->__('Title'),
          'align'     =>'left',
          'index'     => 'forummanager_title',
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


     $this->addColumn('forummanager_category', array(
          'header'    => Mage::helper('forummanager')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'forummanager_category',
          'type'      => 'options',
          'options'   =>  $this->getforumcat(),
      ));


      $this->addColumn('activated', array(
          'header'    => Mage::helper('forummanager')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'activated',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              0 => 'Disabled',
          ),
      ));
	  

	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('forummanager');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('forummanager')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('forummanager')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('forummanager/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('forummanager')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('forummanager')->__('Status'),
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