<?php
class Mind_Reward_Block_Prods extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

		public function render(Varien_Object $row)
		{
			$collection = Mage::getModel("customorders/cprods")->getCollection();
			$products = array();
			foreach($collection as $prod){
				 $products[$prod->getId()] = $prod->getData();
			}
			$p = json_decode($row->getItems(),true);

			$data = array();

			foreach($p as $d){
				$data[] = $products[$d['name']]['name'] ." Qty :(".$d['qty'].")";
			}


		return implode("<br>", $data);
		 
		}	
	
}
?>