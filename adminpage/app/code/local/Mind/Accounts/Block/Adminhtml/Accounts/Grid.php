<?php
$_GET['tbl'] = "accounts";
class Mind_Accounts_Block_Adminhtml_Accounts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('accountsGrid');
      $this->setDefaultSort('accounts_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('accounts/accounts')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('accounts_id', array(
          'header'    => Mage::helper('accounts')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'accounts_id',
      ));
      $this->addColumn('username', array(
          'header'    => Mage::helper('accounts')->__('Username'),
          'align'     =>'left',
          'index'     => 'username',
      ));
      $this->addColumn('firstname', array(
          'header'    => Mage::helper('accounts')->__('Firstname'),
          'align'     =>'left',
          'index'     => 'firstname',
      ));
      $this->addColumn('lastname', array(
          'header'    => Mage::helper('accounts')->__('Lastname'),
          'align'     =>'left',
          'index'     => 'lastname',
      ));
      $this->addColumn('balance', array(
          'header'    => Mage::helper('accounts')->__('Balance BTC'),
          'align'     =>'left',
          'index'     => 'balance',
      ));

      $this->addColumn('balance_pesos', array(
          'header'    => Mage::helper('accounts')->__('Balance USD'),
          'align'     =>'left',
          'index'     => 'balance_pesos',
      ));

      $this->addColumn('balance_wallet', array(
          'header'    => Mage::helper('accounts')->__('Balance E-wallet'),
          'align'     =>'left',
          'index'     => 'balance_wallet',
      ));





/*

      $this->addColumn('activated', array(
          'header'    => Mage::helper('accounts')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'activated',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
*/     
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('accounts')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('accounts')->__('Edit'),
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