<?php

class Mind_Socialmanager_Block_Adminhtml_Socialmanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'socialmanager';
        $this->_controller = 'adminhtml_socialmanager';
        
        $this->_updateButton('save', 'label', Mage::helper('socialmanager')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('socialmanager')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('socialmanager_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'socialmanager_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'socialmanager_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('socialmanager_data') && Mage::registry('socialmanager_data')->getId() ) {
            return Mage::helper('socialmanager')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('socialmanager_data')->getTitle()));
        } else {
            return Mage::helper('socialmanager')->__('Add Item');
        }
    }
}