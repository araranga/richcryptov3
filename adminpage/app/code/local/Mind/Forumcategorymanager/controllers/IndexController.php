<?php
class Mind_Forumcategorymanager_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/forumcategorymanager?id=15 
    	 *  or
    	 * http://site.com/forumcategorymanager/id/15 	
    	 */
    	/* 
		$forumcategorymanager_id = $this->getRequest()->getParam('id');

  		if($forumcategorymanager_id != null && $forumcategorymanager_id != '')	{
			$forumcategorymanager = Mage::getModel('forumcategorymanager/forumcategorymanager')->load($forumcategorymanager_id)->getData();
		} else {
			$forumcategorymanager = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($forumcategorymanager == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$forumcategorymanagerTable = $resource->getTableName('forumcategorymanager');
			
			$select = $read->select()
			   ->from($forumcategorymanagerTable,array('forumcategorymanager_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$forumcategorymanager = $read->fetchRow($select);
		}
		Mage::register('forumcategorymanager', $forumcategorymanager);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}