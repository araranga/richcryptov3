<?php

class Mind_Exitbonusmanager_Block_Adminhtml_Exitbonusmanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  function getrate()
  {
      $codeq = mysql_query_cheat("SELECT rate_name,rate_id,rate_start FROM tbl_rate WHERE activated='1'");
      while($ccc=mysqli_fetch_array_cheat($codeq))
      {
      $crate[$ccc['rate_id']] = $ccc['rate_name']." - ".$ccc['rate_start'];
      }    
      return $crate;
  }	
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('exitbonusmanager_form', array('legend'=>Mage::helper('exitbonusmanager')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('exitbonusmanager')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));
      $fieldset->addField('exit_number', 'select', array(
          'label'     => Mage::helper('exitbonusmanager')->__('Exit Number'),
          'name'      => 'exit_number',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('exitbonusmanager')->__('1st Exit'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('exitbonusmanager')->__('2nd exit'),
              ),
              array(
                  'value'     => 3,
                  'label'     => Mage::helper('exitbonusmanager')->__('3rd exit'),
              ),
              array(
                  'value'     => 4,
                  'label'     => Mage::helper('exitbonusmanager')->__('4th exit'),
              ),
              array(
                  'value'     => 5,
                  'label'     => Mage::helper('exitbonusmanager')->__('5th exit'),
              ),			  
          ),
      ));
      $fieldset->addField('rate_id', 'select', array(
          'label'     => Mage::helper('exitbonusmanager')->__('Package/Complan'),
          'name'      => 'rate_id',
		  'values'    => $this->getrate(),
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getExitbonusmanagerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getExitbonusmanagerData());
          Mage::getSingleton('adminhtml/session')->setExitbonusmanagerData(null);
      } elseif ( Mage::registry('exitbonusmanager_data') ) {
          $form->setValues(Mage::registry('exitbonusmanager_data')->getData());
      }
      return parent::_prepareForm();
  }
}