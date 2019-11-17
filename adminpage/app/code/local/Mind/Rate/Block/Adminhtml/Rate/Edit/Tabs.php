<?php

class Mind_Rate_Block_Adminhtml_Rate_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('rate_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('rate')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('rate')->__('Item Information'),
          'title'     => Mage::helper('rate')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('rate/adminhtml_rate_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}