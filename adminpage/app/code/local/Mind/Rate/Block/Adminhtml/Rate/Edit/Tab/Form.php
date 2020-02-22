<?php

class Mind_Rate_Block_Adminhtml_Rate_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('rate_form', array('legend'=>Mage::helper('rate')->__('Item information')));
     
      $fieldset->addField('rate_name', 'text', array(
          'label'     => Mage::helper('rate')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'rate_name',
      ));
      $fieldset->addField('rate_start', 'text', array(
          'label'     => Mage::helper('rate')->__('Minimum Funding'),
          'class'     => 'required-entry validate-number',
          'required'  => true,
          'name'      => 'rate_start',
      ));

      $fieldset->addField('rate_end', 'text', array(
          'label'     => Mage::helper('rate')->__('Maximum Funding'),
          'class'     => 'required-entry validate-number',
          'required'  => true,
          'name'      => 'rate_end',
      ));


      $fieldset->addField('cost_block', 'text', array(
          'label'     => Mage::helper('rate')->__('Amount per entry (Table)'),
          'class'     => 'required-entry validate-number',
          'required'  => true,
          'name'      => 'cost_block',
      ));


      $fieldset->addField('cost_block_end', 'text', array(
          'label'     => Mage::helper('rate')->__('Amount Bonus when payout. (Table)'),
          'class'     => 'required-entry validate-number',
          'required'  => true,
          'name'      => 'cost_block_end',
      ));

      // $fieldset->addField('cycle2', 'text', array(
      //     'label'     => Mage::helper('rate')->__('Percent of maturity(Cycle 2)'),
      //     'class'     => 'required-entry validate-number',
      //     'required'  => true,
      //     'name'      => 'cycle2',
      // ));



      // $fieldset->addField('cycle3', 'text', array(
      //     'label'     => Mage::helper('rate')->__('Percent of maturity(Cycle 3)'),
      //     'class'     => 'required-entry validate-number',
      //     'required'  => true,
      //     'name'      => 'cycle3',
      // ));


      $fieldset->addField('prod_type', 'select', array(
          'label'     => Mage::helper('rate')->__('Rate Type'),
          'name'      => 'prod_type',
          'values'    => array(
              array(
                  'value'     => 0,
                  'label'     => Mage::helper('rate')->__('Courses'),
              ),

              array(
                  'value'     => 1,
                  'label'     => Mage::helper('rate')->__('Product'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('rate')->__('Table Investment'),
              ),


          ),
      ));





      $fieldset->addField('content_data', 'editor', array(
          'label'     => Mage::helper('rate')->__('Trading Courses'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'content_data',
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => true,
      ));


      $fieldset->addField('activated', 'select', array(
          'label'     => Mage::helper('rate')->__('Status'),
          'name'      => 'activated',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('rate')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('rate')->__('Disabled'),
              ),
          ),
      ));
      $fieldset->addField('rate_bet', 'select', array(
          'label'     => Mage::helper('rate')->__('Activated'),
          'name'      => 'activated',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('rate')->__('Yes'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('rate')->__('No'),
              ),
          ),
      ));
          
     
      if ( Mage::getSingleton('adminhtml/session')->getRateData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getRateData());
          Mage::getSingleton('adminhtml/session')->setRateData(null);
      } elseif ( Mage::registry('rate_data') ) {
          $form->setValues(Mage::registry('rate_data')->getData());
      }
      return parent::_prepareForm();
  }
}