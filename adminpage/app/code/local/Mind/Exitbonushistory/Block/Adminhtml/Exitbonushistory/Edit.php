<?php

class Mind_Exitbonushistory_Block_Adminhtml_Exitbonushistory_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'exitbonushistory';
        $this->_controller = 'adminhtml_exitbonushistory';
        
        $this->_updateButton('save', 'label', Mage::helper('exitbonushistory')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('exitbonushistory')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('exitbonushistory_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'exitbonushistory_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'exitbonushistory_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('exitbonushistory_data') && Mage::registry('exitbonushistory_data')->getId() ) {
            return Mage::helper('exitbonushistory')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('exitbonushistory_data')->getPackageSummary()));
        } else {
            return Mage::helper('exitbonushistory')->__('Add Item');
        }
    }
}