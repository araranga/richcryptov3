<?php

class Mind_Accounts_Block_Adminhtml_Accounts_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('accounts_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('accounts')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('accounts')->__('Item Information'),
          'title'     => Mage::helper('accounts')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('accounts/adminhtml_accounts_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}