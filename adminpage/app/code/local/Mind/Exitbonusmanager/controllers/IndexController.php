<?php
class Mind_Exitbonusmanager_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/exitbonusmanager?id=15 
    	 *  or
    	 * http://site.com/exitbonusmanager/id/15 	
    	 */
    	/* 
		$exitbonusmanager_id = $this->getRequest()->getParam('id');

  		if($exitbonusmanager_id != null && $exitbonusmanager_id != '')	{
			$exitbonusmanager = Mage::getModel('exitbonusmanager/exitbonusmanager')->load($exitbonusmanager_id)->getData();
		} else {
			$exitbonusmanager = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($exitbonusmanager == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$exitbonusmanagerTable = $resource->getTableName('exitbonusmanager');
			
			$select = $read->select()
			   ->from($exitbonusmanagerTable,array('exitbonusmanager_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$exitbonusmanager = $read->fetchRow($select);
		}
		Mage::register('exitbonusmanager', $exitbonusmanager);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}