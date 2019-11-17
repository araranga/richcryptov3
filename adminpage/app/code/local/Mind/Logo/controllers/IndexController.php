<?php
class Mind_Logo_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/logo?id=15 
    	 *  or
    	 * http://site.com/logo/id/15 	
    	 */
    	/* 
		$logo_id = $this->getRequest()->getParam('id');

  		if($logo_id != null && $logo_id != '')	{
			$logo = Mage::getModel('logo/logo')->load($logo_id)->getData();
		} else {
			$logo = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($logo == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$logoTable = $resource->getTableName('logo');
			
			$select = $read->select()
			   ->from($logoTable,array('logo_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$logo = $read->fetchRow($select);
		}
		Mage::register('logo', $logo);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}