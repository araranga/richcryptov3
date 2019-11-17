<?php
class Mind_Bannermanager_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/bannermanager?id=15 
    	 *  or
    	 * http://site.com/bannermanager/id/15 	
    	 */
    	/* 
		$id = $this->getRequest()->getParam('id');

  		if($id != null && $id != '')	{
			$bannermanager = Mage::getModel('bannermanager/bannermanager')->load($id)->getData();
		} else {
			$bannermanager = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($bannermanager == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$bannermanagerTable = $resource->getTableName('bannermanager');
			
			$select = $read->select()
			   ->from($bannermanagerTable,array('id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$bannermanager = $read->fetchRow($select);
		}
		Mage::register('bannermanager', $bannermanager);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}