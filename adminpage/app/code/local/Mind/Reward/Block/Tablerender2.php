<?php
class Mind_Reward_Block_Tablerender2 extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

		public function render(Varien_Object $row)
		{
		$value =  $row->getData($this->getColumn()->getIndex());
			$exp = explode("_",$value);
			$query2 = mysql_query_cheat("SELECT * FROM tbl_rate WHERE rate_id='".$exp[0]."'");
			$row2 = mysqli_fetch_array_cheat($query2);			
			return $row2['rate_name'];				 
		}	
	
}
?>