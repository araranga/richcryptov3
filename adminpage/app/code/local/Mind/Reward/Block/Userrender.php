<?php
class Mind_Reward_Block_Userrender extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

		public function render(Varien_Object $row)
		{
			
		$value =  $row->getData($this->getColumn()->getIndex());
		$qx = mysqli_fetch_array_cheat(mysql_query_cheat("SELECT * FROM tbl_accounts WHERE accounts_id='$value'"));
		return "Username:".$qx['username']."<br>Name:".$qx['firstname']." ".$qx['lastname']."<br>Email:".$qx['email'];
		}	
	
}
?>