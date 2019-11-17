<?php

class Mind_Forummanager_Block_Adminhtml_Forummanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  function getusers()
  {
    $codeq = mysql_query_cheat("SELECT * FROM tbl_accounts");
    while($sss = mysqli_fetch_array_cheat($codeq))
    {
     $codes[$sss['accounts_id']] = $sss['firstname']." ".$sss['lastname']." / ".$sss['email'];
    
    }
    return $codes;    

  }
  function getforumcat()
  {
    $array = array();
    $q = mysql_query_cheat("SELECT * FROM tbl_forumcategorymanager WHERE activated='1'");
    while($row=mysqli_fetch_array_cheat($q))
    {
      $array[$row['forumcategorymanager_id']] = $row['forumcategorymanager_name'];
    }
    return $array;
  }  
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('forummanager_form', array('legend'=>Mage::helper('forummanager')->__('Item information')));
     
    $fieldset->addField('forummanager_title', 'text', array( 
    'label' => Mage::helper('accounts')->__('Title'), 
    'class' => 'required-entry', 
    'required' => true, 
    'name' => 'forummanager_title', 
    ));


    $fieldset->addField('forummanager_content', 'editor', array( 
    'label' => Mage::helper('accounts')->__('Content'), 
    'class' => 'required-entry', 
    'required' => true, 
    'wysiwyg' => true,
    'name' => 'forummanager_content', 
    ));


    $fieldset->addField('forummanager_teaser', 'textarea', array( 
    'label' => Mage::helper('accounts')->__('Teaser'), 
    'class' => 'required-entry', 
    'required' => true, 
    'name' => 'forummanager_teaser', 
    ));


    $fieldset->addField('forummanager_parent', 'select', array( 
    'label' => Mage::helper('accounts')->__('Owner'), 
    'class' => 'required-entry', 
    'required' => true, 
    'name' => 'forummanager_parent',
    'onchange' => "",
    'values' => $this->getusers(), 
    ));
    $fieldset->addField('forummanager_category', 'select', array( 
    'label' => Mage::helper('accounts')->__('Category'), 
    'class' => 'required-entry', 
    'required' => true, 
    'name' => 'forummanager_category',
    'onchange' => "",
    'values' => $this->getforumcat(), 
    ));

     




      if ( Mage::getSingleton('adminhtml/session')->getForummanagerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getForummanagerData());
          Mage::getSingleton('adminhtml/session')->setForummanagerData(null);
      } elseif ( Mage::registry('forummanager_data') ) {
          $form->setValues(Mage::registry('forummanager_data')->getData());
      }
      return parent::_prepareForm();
  }
}