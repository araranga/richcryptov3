<?php

class Mind_Code_Block_Adminhtml_Code_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
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

 function RandomString()
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i <= 6; $i++) {
        $randstring .= $characters[rand(0, strlen($characters))]; 
    }
  
    return $randstring;
}
 
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('code_form', array('legend'=>Mage::helper('code')->__('Item information')));


    $fieldset->addField('code_value', 'text', array(
      'label'     => Mage::helper('code')->__('Code Value'),
      'class'     => 'required-entry',
      'required'  => true,
      'name'      => 'code_value',
      'value'     => $this->RandomString(),
    ));    
    $fieldset->addField('code_pin', 'text', array(
      'label'     => Mage::helper('code')->__('Code Pin'),
      'class'     => 'required-entry',
      'required'  => true,
      'name'      => 'code_pin',
      'value'     => $this->RandomString(),
    ));

    $fieldset->addField('code_package', 'select', array(
        'label'     => Mage::helper('code')->__('Code Package'),
        'name'      => 'code_package',
        'values'    => $this->getrate(),
    ));
      $fieldset->addField('activated', 'select', array(
          'label'     => Mage::helper('code')->__('Status'),
          'name'      => 'activated',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('code')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('code')->__('Disabled'),
              ),
          ),
      ));
     
        if($this->getRequest()->getParam('id')!='')
        {
          $form->setValues(Mage::registry('code_data')->getData());
        }
         
      
      return parent::_prepareForm();
  }
}