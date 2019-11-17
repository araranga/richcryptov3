<?php
class Mind_Cmsmanager_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/cmsmanager?id=15 
    	 *  or
    	 * http://site.com/cmsmanager/id/15 	
    	 */
    	/* 
		$id = $this->getRequest()->getParam('id');

  		if($id != null && $id != '')	{
			$cmsmanager = Mage::getModel('cmsmanager/cmsmanager')->load($id)->getData();
		} else {
			$cmsmanager = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($cmsmanager == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$cmsmanagerTable = $resource->getTableName('cmsmanager');
			
			$select = $read->select()
			   ->from($cmsmanagerTable,array('id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$cmsmanager = $read->fetchRow($select);
		}
		Mage::register('cmsmanager', $cmsmanager);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}