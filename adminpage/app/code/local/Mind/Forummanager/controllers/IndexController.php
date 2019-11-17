<?php
class Mind_Forummanager_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/forummanager?id=15 
    	 *  or
    	 * http://site.com/forummanager/id/15 	
    	 */
    	/* 
		$id = $this->getRequest()->getParam('id');

  		if($id != null && $id != '')	{
			$forummanager = Mage::getModel('forummanager/forummanager')->load($id)->getData();
		} else {
			$forummanager = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($forummanager == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$forummanagerTable = $resource->getTableName('forummanager');
			
			$select = $read->select()
			   ->from($forummanagerTable,array('id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$forummanager = $read->fetchRow($select);
		}
		Mage::register('forummanager', $forummanager);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}