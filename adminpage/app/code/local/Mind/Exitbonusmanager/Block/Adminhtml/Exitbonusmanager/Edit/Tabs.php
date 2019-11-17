<?php

class Mind_Exitbonusmanager_Block_Adminhtml_Exitbonusmanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('exitbonusmanager_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('exitbonusmanager')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('exitbonusmanager')->__('Item Information'),
          'title'     => Mage::helper('exitbonusmanager')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('exitbonusmanager/adminhtml_exitbonusmanager_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}