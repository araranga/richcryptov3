<?php

class Mind_Reward_Block_Adminhtml_Reward_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'reward';
        $this->_controller = 'adminhtml_reward';
        
        $this->_updateButton('save', 'label', Mage::helper('reward')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('reward')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('reward_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'reward_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'reward_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('reward_data') && Mage::registry('reward_data')->getId() ) {
            return Mage::helper('reward')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('reward_data')->getTitle()));
        } else {
            return Mage::helper('reward')->__('Add Item');
        }
    }
}