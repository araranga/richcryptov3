<?php
class Mind_Accounts_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/accounts?id=15 
    	 *  or
    	 * http://site.com/accounts/id/15 	
    	 */
    	/* 
		$accounts_id = $this->getRequest()->getParam('id');

  		if($accounts_id != null && $accounts_id != '')	{
			$accounts = Mage::getModel('accounts/accounts')->load($accounts_id)->getData();
		} else {
			$accounts = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($accounts == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$accountsTable = $resource->getTableName('accounts');
			
			$select = $read->select()
			   ->from($accountsTable,array('accounts_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$accounts = $read->fetchRow($select);
		}
		Mage::register('accounts', $accounts);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}