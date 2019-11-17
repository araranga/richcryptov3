<?php

class Mind_Reward_Block_Adminhtml_Reward_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('reward_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('reward')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('reward')->__('Item Information'),
          'title'     => Mage::helper('reward')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('reward/adminhtml_reward_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}