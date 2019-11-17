<?php

class Mind_Socialmanager_Block_Adminhtml_Socialmanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('socialmanager_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('socialmanager')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('socialmanager')->__('Item Information'),
          'title'     => Mage::helper('socialmanager')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('socialmanager/adminhtml_socialmanager_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}