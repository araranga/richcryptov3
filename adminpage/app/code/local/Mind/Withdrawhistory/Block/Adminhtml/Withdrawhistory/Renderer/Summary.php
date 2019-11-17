<?php
	
class Mind_Withdrawhistory_Block_Adminhtml_Withdrawhistory_Renderer_Summary extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
     public function render(Varien_Object $row)
    {       

        if($row->getSummary()) {             
				return nl2br($row->getSummary());
        }          
    }
}