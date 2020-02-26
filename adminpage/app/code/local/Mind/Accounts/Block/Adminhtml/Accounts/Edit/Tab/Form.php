<?php
$_GET['tbl'] = "accounts";
class Mind_Accounts_Block_Adminhtml_Accounts_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  function getcodes()
  {
    $codeq = mysql_query_cheat("SELECT * FROM tbl_code as a JOIN tbl_rate as b  WHERE a.activated='1' AND b.rate_id=a.code_package");
    while($sss = mysqli_fetch_array_cheat($codeq))
    {
    $counterx = mysql_num_rows(mysql_query_cheat("SELECT * FROM tbl_accounts WHERE code_id='".$sss['code_value']."'"));
    if($counterx==0)
    {
    $codes[$sss['code_value']] = $sss['code_value']." / ".$sss['code_pin']." - ".$sss['rate_name']." - ".$sss['rate_start'];
    }
    }
    return $codes;    

  }

  function getbypass()
  {
    $codes = array();
    $codes['yes'] = "Yes - Bypass Countdown";
    $codes['no'] = "No - Dont Bypass";
    return $codes;
  }
  function getgender()
  {
    $codes = array();
    $codes['male'] = "Male";
    $codes['female'] = "Female";
    return $codes;
  }

  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('accounts_form', array('legend'=>Mage::helper('accounts')->__('Item information')));
     

$fieldset->addField('username', 'text', array( 
'label' => Mage::helper('accounts')->__('Username'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'username', 
));




$fieldset->addField('password', 'text', array( 
'label' => Mage::helper('accounts')->__('Password'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'password', 
));


$fieldset->addField('firstname', 'text', array( 
'label' => Mage::helper('accounts')->__('Firstname'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'firstname', 
));


$fieldset->addField('lastname', 'text', array( 
'label' => Mage::helper('accounts')->__('Lastname'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'lastname', 
));


$fieldset->addField('birthdate', 'text', array( 
'label' => Mage::helper('accounts')->__('Birthdate'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'birthdate',
'type' => 'date', 
));


$fieldset->addField('gender', 'select', array( 
'label' => Mage::helper('accounts')->__('Gender'), 
'class'     => 'required-entry',
'required'  => true,
'name'      => 'gender',
'values' => $this->getgender(),
));


$fieldset->addField('occupation', 'text', array( 
'label' => Mage::helper('accounts')->__('Occupation'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'occupation', 
));


$fieldset->addField('civilstatus', 'text', array( 
'label' => Mage::helper('accounts')->__('Civilstatus'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'civilstatus', 
));


$fieldset->addField('address', 'text', array( 
'label' => Mage::helper('accounts')->__('Address'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'address', 
));


$fieldset->addField('mobile', 'text', array( 
'label' => Mage::helper('accounts')->__('Mobile'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'mobile', 
));


$fieldset->addField('telno', 'text', array( 
'label' => Mage::helper('accounts')->__('Telno'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'telno', 
));


$fieldset->addField('email', 'text', array( 
'label' => Mage::helper('accounts')->__('Email'), 
'class' => 'required-entry validate-email', 
'required' => true, 
'name' => 'email', 
));

$fieldset->addField('refer', 'text', array( 
'label' => Mage::helper('accounts')->__('Referrer Username'), 
'class' => 'required-entry', 
'required' => true, 
'name' => 'refer', 
));


$fieldset->addField('bypass', 'select', array( 
'label' => Mage::helper('accounts')->__('Bypass Countdown'), 
'class'     => 'required-entry',
'required'  => true,
'name'      => 'bypass',
'values' => $this->getbypass(),
));










$fieldset->addField('date_created', 'date',array(
'name'      =>    'date_created', /* should match with your table column name where the data should be inserted */
'time'      =>    true,
'class'     => 'required-entry',
'required'  => true,        
'format'    =>    'yyyy-MM-dd HH:mm:ss',
'label'     =>    Mage::helper('accounts')->__('Date Created'),
'image'     =>    $this->getSkinUrl('images/grid-cal.gif')
      ));

    $fieldset->addField('balance', 'text', array( 
    'label' => Mage::helper('accounts')->__('Balance BTC'), 
    'class' => 'required-entry', 
    'name' => 'balance', 
    ));
    $fieldset->addField('balance_pesos', 'text', array( 
    'label' => Mage::helper('accounts')->__('Balance USD'), 
    'class' => 'required-entry', 
    'name' => 'balance_pesos', 
    ));
    $fieldset->addField('balance_wallet', 'text', array( 
    'label' => Mage::helper('accounts')->__('Balance E-wallet'), 
    'class' => 'required-entry', 
    'name' => 'balance_wallet', 
    ));

     
      if ( Mage::getSingleton('adminhtml/session')->getAccountsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getAccountsData());
          Mage::getSingleton('adminhtml/session')->setAccountsData(null);
      } elseif ( Mage::registry('accounts_data') ) {
          $form->setValues(Mage::registry('accounts_data')->getData());
      }
      return parent::_prepareForm();
  }
}

