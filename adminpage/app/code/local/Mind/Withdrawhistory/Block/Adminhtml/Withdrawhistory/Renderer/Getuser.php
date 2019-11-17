<?php
	
class Mind_Withdrawhistory_Block_Adminhtml_Withdrawhistory_Renderer_Getuser extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
     public function render(Varien_Object $row)
    {       

        if($row->getAccountsId()) {    
        $accounts = Mage::getModel('accounts/accounts')->load($row->getAccountsId());      
				return nl2br($accounts->getUsername());
        }          
    }
}