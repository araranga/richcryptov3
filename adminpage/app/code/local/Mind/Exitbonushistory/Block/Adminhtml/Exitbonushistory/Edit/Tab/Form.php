<?php

class Mind_Exitbonushistory_Block_Adminhtml_Exitbonushistory_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('exitbonushistory_form', array('legend'=>Mage::helper('exitbonushistory')->__('Item information')));
     
     /*
        6 - monthly
        7 - accumulative
     */

     $data = Mage::registry('exitbonushistory_data')->getData();
     $package_id = $data['package_id'];


      $fieldset->addField('funding_provided', 'text', array(
          'label'     => Mage::helper('exitbonushistory')->__('Bitcoin Margin Funding Provided'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'funding_provided',
      ));

      $fieldset->addField('funding_date', 'text', array(
          'label'     => Mage::helper('exitbonushistory')->__('Margin Funding Date'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'funding_date',
          'type' => 'date',
      ));


     if($package_id==6){


      $fieldset->addField('monthy_profit', 'text', array(
          'label'     => Mage::helper('exitbonushistory')->__('Monthly Profit'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'monthy_profit',
      ));

      $fieldset->addField('capital_release', 'text', array(
          'label'     => Mage::helper('exitbonushistory')->__('Capital Release'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'capital_release',
      ));

     }else{


      $fieldset->addField('accumulated_profit', 'text', array(
          'label'     => Mage::helper('exitbonushistory')->__('Accumulated Profit'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'accumulated_profit',
      ));

      $fieldset->addField('accumulated_profit_release', 'text', array(
          'label'     => Mage::helper('exitbonushistory')->__('Total  Accumulated Release'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'accumulated_profit_release',
      ));

      $fieldset->addField('percentage_growth', 'text', array(
          'label'     => Mage::helper('exitbonushistory')->__('Percentage Growth Per Month'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'percentage_growth',
      ));


      $fieldset->addField('total_clients', 'text', array(
          'label'     => Mage::helper('exitbonushistory')->__('Total  Clients Enrolled'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'total_clients',
      ));


     }


		
      if ( Mage::getSingleton('adminhtml/session')->getExitbonushistoryData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getExitbonushistoryData());
          Mage::getSingleton('adminhtml/session')->setExitbonushistoryData(null);
      } elseif ( Mage::registry('exitbonushistory_data') ) {
          $form->setValues(Mage::registry('exitbonushistory_data')->getData());
      }
      return parent::_prepareForm();
  }
}