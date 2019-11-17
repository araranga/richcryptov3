<?php

class Mind_Code_Block_Adminhtml_Code_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('codeGrid');
      $this->setDefaultSort('code_id');
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
      $collection = Mage::getModel('code/code')->getCollection();
      if($_GET['a']!=2)
      {
        $collection->getSelect()->join(array('t2' => "tbl_accounts"),'main_table.code_value = t2.code_id',array('t2.lastname','t2.firstname','t2.email'));
      }
      
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {



      $this->addColumn('code_id', array(
          'header'    => Mage::helper('code')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'code_id',
      ));

      if($_GET['a']!=2)
      {  
      $this->addColumn('firstname', array(
          'header'    => Mage::helper('code')->__('First'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'firstname',
      ));
       $this->addColumn('lastname', array(
          'header'    => Mage::helper('code')->__('Last'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'lastname',
      ));
        $this->addColumn('email', array(
          'header'    => Mage::helper('code')->__('Email'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'email',
      ));     
      }

      $this->addColumn('code_package', array(
          'header'    => Mage::helper('code')->__('Package'),
          'align'     =>'left',
          'index'     => 'code_package',
          'type'      => 'options',
          'options'   => $this->getrate(),
      ));       
      $this->addColumn('code_value', array(
          'header'    => Mage::helper('code')->__('Code Value'),
          'align'     =>'left',
          'index'     => 'code_value',
      )); 
      $this->addColumn('code_pin', array(
          'header'    => Mage::helper('code')->__('Code Pin'),
          'align'     =>'left',
          'index'     => 'code_pin',
      ));
  
      $this->addColumn('activated', array(
          'header'    => Mage::helper('code')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'activated',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('code')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('code')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('code')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('code')->__('XML'));
	  
      return parent::_prepareColumns();
  }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}