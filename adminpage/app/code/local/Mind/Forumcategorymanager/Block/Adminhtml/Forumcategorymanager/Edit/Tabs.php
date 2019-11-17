<?php

class Mind_Forumcategorymanager_Block_Adminhtml_Forumcategorymanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('forumcategorymanager_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('forumcategorymanager')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('forumcategorymanager')->__('Item Information'),
          'title'     => Mage::helper('forumcategorymanager')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('forumcategorymanager/adminhtml_forumcategorymanager_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}