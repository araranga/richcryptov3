<?php

class Mind_Exitbonusmanager_Block_Adminhtml_Exitbonusmanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'exitbonusmanager';
        $this->_controller = 'adminhtml_exitbonusmanager';
        
        $this->_updateButton('save', 'label', Mage::helper('exitbonusmanager')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('exitbonusmanager')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('exitbonusmanager_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'exitbonusmanager_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'exitbonusmanager_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('exitbonusmanager_data') && Mage::registry('exitbonusmanager_data')->getId() ) {
            return Mage::helper('exitbonusmanager')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('exitbonusmanager_data')->getTitle()));
        } else {
            return Mage::helper('exitbonusmanager')->__('Add Item');
        }
    }
}