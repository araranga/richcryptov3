<?php

class Mind_Rate_Block_Adminhtml_Rate_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'rate';
        $this->_controller = 'adminhtml_rate';
        
        $this->_updateButton('save', 'label', Mage::helper('rate')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('rate')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('rate_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'rate_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'rate_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('rate_data') && Mage::registry('rate_data')->getId() ) {
            return Mage::helper('rate')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('rate_data')->getTitle()));
        } else {
            return Mage::helper('rate')->__('Add Item');
        }
    }
}