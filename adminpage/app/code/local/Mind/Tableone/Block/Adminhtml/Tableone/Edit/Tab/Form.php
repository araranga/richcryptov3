<?php

class Mind_Tableone_Block_Adminhtml_Tableone_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('tableone_form', array('legend'=>Mage::helper('tableone')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('tableone')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('tableone')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('tableone')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('tableone')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('tableone')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('tableone')->__('Content'),
          'title'     => Mage::helper('tableone')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getTableoneData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getTableoneData());
          Mage::getSingleton('adminhtml/session')->setTableoneData(null);
      } elseif ( Mage::registry('tableone_data') ) {
          $form->setValues(Mage::registry('tableone_data')->getData());
      }
      return parent::_prepareForm();
  }
}