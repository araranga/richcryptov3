<?php

class Mind_Bannermanager_Block_Adminhtml_Bannermanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('bannermanager_form', array('legend'=>Mage::helper('bannermanager')->__('Item information')));
     
      $fieldset->addField('bannermanager_title', 'text', array(
          'label'     => Mage::helper('bannermanager')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'bannermanager_title',
      ));

      $fieldset->addField('bannermanager_image_large', 'image', array(
          'label'     => Mage::helper('bannermanager')->__('File'),
          'required'  => false,
          'name'      => 'bannermanager_image_large',
	  ));
		
      $fieldset->addField('bannermanager_content', 'editor', array(
          'name'      => 'bannermanager_content',
          'label'     => Mage::helper('bannermanager')->__('Content'),
          'title'     => Mage::helper('bannermanager')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => true,
          'required'  => true,
      ));
      $fieldset->addField('event', 'text', array(
          'label'     => Mage::helper('bannermanager')->__('Event ID'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'event',
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getBannermanagerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getBannermanagerData());
          Mage::getSingleton('adminhtml/session')->setBannermanagerData(null);
      } elseif ( Mage::registry('bannermanager_data') ) {
          $form->setValues(Mage::registry('bannermanager_data')->getData());
      }
      return parent::_prepareForm();
  }
}