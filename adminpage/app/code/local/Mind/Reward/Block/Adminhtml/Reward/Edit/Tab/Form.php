<?php

class Mind_Reward_Block_Adminhtml_Reward_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('reward_form', array('legend'=>Mage::helper('reward')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('reward')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('reward')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('reward')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('reward')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('reward')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('reward')->__('Content'),
          'title'     => Mage::helper('reward')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getRewardData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getRewardData());
          Mage::getSingleton('adminhtml/session')->setRewardData(null);
      } elseif ( Mage::registry('reward_data') ) {
          $form->setValues(Mage::registry('reward_data')->getData());
      }
      return parent::_prepareForm();
  }
}