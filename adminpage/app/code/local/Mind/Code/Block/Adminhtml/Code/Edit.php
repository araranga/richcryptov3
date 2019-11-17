<?php

class Mind_Code_Block_Adminhtml_Code_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'code';
        $this->_controller = 'adminhtml_code';
        
        $this->_updateButton('save', 'label', Mage::helper('code')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('code')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('code_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'code_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'code_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('code_data') && Mage::registry('code_data')->getId() ) {
            return Mage::helper('code')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('code_data')->getTitle()));
        } else {
            return Mage::helper('code')->__('Add Item');
        }
    }
}