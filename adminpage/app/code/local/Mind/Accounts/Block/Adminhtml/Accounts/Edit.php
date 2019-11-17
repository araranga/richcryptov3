<?php

class Mind_Accounts_Block_Adminhtml_Accounts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'accounts';
        $this->_controller = 'adminhtml_accounts';
        
        $this->_updateButton('save', 'label', Mage::helper('accounts')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('accounts')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('accounts_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'accounts_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'accounts_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('accounts_data') && Mage::registry('accounts_data')->getId() ) {
            return Mage::helper('accounts')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('accounts_data')->getTitle()));
        } else {
            return Mage::helper('accounts')->__('Add Item');
        }
    }
}