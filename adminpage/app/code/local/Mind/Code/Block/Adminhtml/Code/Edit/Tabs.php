<?php

class Mind_Code_Block_Adminhtml_Code_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('code_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('code')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('code')->__('Item Information'),
          'title'     => Mage::helper('code')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('code/adminhtml_code_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}