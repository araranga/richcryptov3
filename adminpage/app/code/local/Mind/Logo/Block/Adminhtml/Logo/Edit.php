<?php

class Mind_Logo_Block_Adminhtml_Logo_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'logo';
        $this->_controller = 'adminhtml_logo';
        
        $this->_updateButton('save', 'label', Mage::helper('logo')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('logo')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('logo_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'logo_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'logo_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('logo_data') && Mage::registry('logo_data')->getId() ) {
            return Mage::helper('logo')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('logo_data')->getTitle()));
        } else {
            return Mage::helper('logo')->__('Add Item');
        }
    }
}