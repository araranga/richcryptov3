<?php

class Mind_Tableone_Block_Adminhtml_Tableone_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('tableone_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('tableone')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('tableone')->__('Item Information'),
          'title'     => Mage::helper('tableone')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('tableone/adminhtml_tableone_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}