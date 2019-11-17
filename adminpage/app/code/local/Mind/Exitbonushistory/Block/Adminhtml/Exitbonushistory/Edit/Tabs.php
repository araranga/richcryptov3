<?php

class Mind_Exitbonushistory_Block_Adminhtml_Exitbonushistory_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('exitbonushistory_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('exitbonushistory')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('exitbonushistory')->__('Item Information'),
          'title'     => Mage::helper('exitbonushistory')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('exitbonushistory/adminhtml_exitbonushistory_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}