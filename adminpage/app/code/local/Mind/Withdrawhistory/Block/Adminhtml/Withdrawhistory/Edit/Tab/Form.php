<?php

class Mind_Withdrawhistory_Block_Adminhtml_Withdrawhistory_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('withdrawhistory_form', array('legend'=>Mage::helper('withdrawhistory')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('withdrawhistory')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('withdrawhistory')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('withdrawhistory')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('withdrawhistory')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('withdrawhistory')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('withdrawhistory')->__('Content'),
          'title'     => Mage::helper('withdrawhistory')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getWithdrawhistoryData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getWithdrawhistoryData());
          Mage::getSingleton('adminhtml/session')->setWithdrawhistoryData(null);
      } elseif ( Mage::registry('withdrawhistory_data') ) {
          $form->setValues(Mage::registry('withdrawhistory_data')->getData());
      }
      return parent::_prepareForm();
  }
}