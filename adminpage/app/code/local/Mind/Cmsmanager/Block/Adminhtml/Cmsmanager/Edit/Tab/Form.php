<?php

class Mind_Cmsmanager_Block_Adminhtml_Cmsmanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('cmsmanager_form', array('legend'=>Mage::helper('cmsmanager')->__('Item information')));
     


      $fieldset->addField('cmsmanager_title', 'text', array(
          'label'     => Mage::helper('cmsmanager')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'cmsmanager_title',
      ));


if(Mage::registry('cmsmanager_data')->getId()==41){
      $fieldset->addField('cmsmanager_content', 'text', array(
          'name'      => 'cmsmanager_content',
          'class'     => 'required-entry validate-number input-text required-entry',
          'label'     => Mage::helper('cmsmanager')->__('BTC to Peso'),
          'title'     => Mage::helper('cmsmanager')->__('BTC to Peso'),
      ));

}else{

      $fieldset->addField('cmsmanager_content', 'editor', array(
          'name'      => 'cmsmanager_content',
          'label'     => Mage::helper('cmsmanager')->__('Content'),
          'title'     => Mage::helper('cmsmanager')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => true,
          'required'  => true,
      ));

}

     
      if ( Mage::getSingleton('adminhtml/session')->getCmsmanagerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getCmsmanagerData());
          Mage::getSingleton('adminhtml/session')->setCmsmanagerData(null);
      } elseif ( Mage::registry('cmsmanager_data') ) {
          $form->setValues(Mage::registry('cmsmanager_data')->getData());
      }
      return parent::_prepareForm();
  }
}