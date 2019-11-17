<?php

class Mind_Forummanager_Block_Adminhtml_Forummanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('forummanager_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('forummanager')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('forummanager')->__('Item Information'),
          'title'     => Mage::helper('forummanager')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('forummanager/adminhtml_forummanager_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}