<?php

class Mind_Forummanager_Block_Adminhtml_Forummanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'forummanager';
        $this->_controller = 'adminhtml_forummanager';
        
        $this->_updateButton('save', 'label', Mage::helper('forummanager')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('forummanager')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('forummanager_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'forummanager_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'forummanager_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('forummanager_data') && Mage::registry('forummanager_data')->getId() ) {
            return Mage::helper('forummanager')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('forummanager_data')->getTitle()));
        } else {
            return Mage::helper('forummanager')->__('Add Item');
        }
    }
}