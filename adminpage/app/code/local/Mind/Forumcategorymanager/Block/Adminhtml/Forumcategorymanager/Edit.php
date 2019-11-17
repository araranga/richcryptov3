<?php

class Mind_Forumcategorymanager_Block_Adminhtml_Forumcategorymanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'forumcategorymanager';
        $this->_controller = 'adminhtml_forumcategorymanager';
        
        $this->_updateButton('save', 'label', Mage::helper('forumcategorymanager')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('forumcategorymanager')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('forumcategorymanager_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'forumcategorymanager_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'forumcategorymanager_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('forumcategorymanager_data') && Mage::registry('forumcategorymanager_data')->getId() ) {
            return Mage::helper('forumcategorymanager')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('forumcategorymanager_data')->getTitle()));
        } else {
            return Mage::helper('forumcategorymanager')->__('Add Item');
        }
    }
}