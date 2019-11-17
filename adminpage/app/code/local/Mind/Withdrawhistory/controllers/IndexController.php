<?php
class Mind_Withdrawhistory_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/withdrawhistory?id=15 
    	 *  or
    	 * http://site.com/withdrawhistory/id/15 	
    	 */
    	/* 
		$id = $this->getRequest()->getParam('id');

  		if($id != null && $id != '')	{
			$withdrawhistory = Mage::getModel('withdrawhistory/withdrawhistory')->load($id)->getData();
		} else {
			$withdrawhistory = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($withdrawhistory == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$withdrawhistoryTable = $resource->getTableName('withdrawhistory');
			
			$select = $read->select()
			   ->from($withdrawhistoryTable,array('id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$withdrawhistory = $read->fetchRow($select);
		}
		Mage::register('withdrawhistory', $withdrawhistory);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}