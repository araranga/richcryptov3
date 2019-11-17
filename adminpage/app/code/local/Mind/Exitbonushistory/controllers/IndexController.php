<?php
class Mind_Exitbonushistory_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/exitbonushistory?id=15 
    	 *  or
    	 * http://site.com/exitbonushistory/id/15 	
    	 */
    	/* 
		$exitbonushistory_id = $this->getRequest()->getParam('id');

  		if($exitbonushistory_id != null && $exitbonushistory_id != '')	{
			$exitbonushistory = Mage::getModel('exitbonushistory/exitbonushistory')->load($exitbonushistory_id)->getData();
		} else {
			$exitbonushistory = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($exitbonushistory == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$exitbonushistoryTable = $resource->getTableName('exitbonushistory');
			
			$select = $read->select()
			   ->from($exitbonushistoryTable,array('exitbonushistory_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$exitbonushistory = $read->fetchRow($select);
		}
		Mage::register('exitbonushistory', $exitbonushistory);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}