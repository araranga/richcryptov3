<?php
class Mind_Rate_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/rate?id=15 
    	 *  or
    	 * http://site.com/rate/id/15 	
    	 */
    	/* 
		$rate_id = $this->getRequest()->getParam('id');

  		if($rate_id != null && $rate_id != '')	{
			$rate = Mage::getModel('rate/rate')->load($rate_id)->getData();
		} else {
			$rate = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($rate == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$rateTable = $resource->getTableName('rate');
			
			$select = $read->select()
			   ->from($rateTable,array('rate_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$rate = $read->fetchRow($select);
		}
		Mage::register('rate', $rate);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}