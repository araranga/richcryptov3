<?php

class Mind_Socialmanager_Block_Adminhtml_Socialmanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('socialmanager_form', array('legend'=>Mage::helper('socialmanager')->__('Item information')));
     
      $fieldset->addField('facebook', 'text', array(
          'label'     => Mage::helper('socialmanager')->__('Facebook'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'facebook',
      ));

       $fieldset->addField('rss', 'text', array(
          'label'     => Mage::helper('socialmanager')->__('RSS'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'rss',
      ));

      $fieldset->addField('twitter', 'text', array(
          'label'     => Mage::helper('socialmanager')->__('Twitter'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'twitter',
      ));

      $fieldset->addField('youtube', 'text', array(
          'label'     => Mage::helper('socialmanager')->__('Youtube'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'youtube',
      ));

      $fieldset->addField('google', 'text', array(
          'label'     => Mage::helper('socialmanager')->__('Google'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'google',
      ));

      $fieldset->addField('linkeind', 'text', array(
          'label'     => Mage::helper('socialmanager')->__('Linkedin'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'linkeind',
      ));
    
      if ( Mage::getSingleton('adminhtml/session')->getSocialmanagerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSocialmanagerData());
          Mage::getSingleton('adminhtml/session')->setSocialmanagerData(null);
      } elseif ( Mage::registry('socialmanager_data') ) {
          $form->setValues(Mage::registry('socialmanager_data')->getData());
      }
      return parent::_prepareForm();
  }
}