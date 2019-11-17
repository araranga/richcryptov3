<?php

class Mind_Forumcategorymanager_Block_Adminhtml_Forumcategorymanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('forumcategorymanager_form', array('legend'=>Mage::helper('forumcategorymanager')->__('Item information')));
     
      $fieldset->addField('forumcategorymanager_name', 'text', array(
          'label'     => Mage::helper('forumcategorymanager')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'forumcategorymanager_name',
      ));

  
     
      if ( Mage::getSingleton('adminhtml/session')->getForumcategorymanagerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getForumcategorymanagerData());
          Mage::getSingleton('adminhtml/session')->setForumcategorymanagerData(null);
      } elseif ( Mage::registry('forumcategorymanager_data') ) {
          $form->setValues(Mage::registry('forumcategorymanager_data')->getData());
      }
      return parent::_prepareForm();
  }
}