<?php
class Mind_Reward_Block_Tablerender extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

		public function render(Varien_Object $row)
		{
		$value =  $row->getData($this->getColumn()->getIndex());
		if($value=='')
		{
			$exp = explode("_",$value);
			$query2 = mysql_query_cheat("SELECT * FROM tbl_rate WHERE rate_id='".$exp[0]."'");
			$row2 = mysqli_fetch_array_cheat($query2);					
			return $row2['rate_name']." - Table Level 1 - On Going";
		}
		else
		{
			$exp = explode("_",$value);
			$query2 = mysql_query_cheat("SELECT * FROM tbl_rate WHERE rate_id='".$exp[0]."'");
			$row2 = mysqli_fetch_array_cheat($query2);			
			return $row2['rate_name']."- Table Level ".$exp[1];
			
		}
		 
		}	
	
}
?>