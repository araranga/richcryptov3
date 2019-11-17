<?php
class Mind_Socialmanager_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/socialmanager?id=15 
    	 *  or
    	 * http://site.com/socialmanager/id/15 	
    	 */
    	/* 
		$social_id = $this->getRequest()->getParam('id');

  		if($social_id != null && $social_id != '')	{
			$socialmanager = Mage::getModel('socialmanager/socialmanager')->load($social_id)->getData();
		} else {
			$socialmanager = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($socialmanager == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$socialmanagerTable = $resource->getTableName('socialmanager');
			
			$select = $read->select()
			   ->from($socialmanagerTable,array('social_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$socialmanager = $read->fetchRow($select);
		}
		Mage::register('socialmanager', $socialmanager);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}