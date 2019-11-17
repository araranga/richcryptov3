<?php

class Mind_Cmsmanager_Block_Adminhtml_Cmsmanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'cmsmanager';
        $this->_controller = 'adminhtml_cmsmanager';
        
        $this->_updateButton('save', 'label', Mage::helper('cmsmanager')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('cmsmanager')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('cmsmanager_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'cmsmanager_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'cmsmanager_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('cmsmanager_data') && Mage::registry('cmsmanager_data')->getId() ) {
            return Mage::helper('cmsmanager')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('cmsmanager_data')->getTitle()));
        } else {
            return Mage::helper('cmsmanager')->__('Add Item');
        }
    }
}