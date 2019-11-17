<?php

class Mind_Withdrawhistory_Block_Adminhtml_Withdrawhistory_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('withdrawhistory_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('withdrawhistory')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('withdrawhistory')->__('Item Information'),
          'title'     => Mage::helper('withdrawhistory')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('withdrawhistory/adminhtml_withdrawhistory_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}