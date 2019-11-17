<?php

class Mind_Cmsmanager_Block_Adminhtml_Cmsmanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('cmsmanager_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('cmsmanager')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('cmsmanager')->__('Item Information'),
          'title'     => Mage::helper('cmsmanager')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('cmsmanager/adminhtml_cmsmanager_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}