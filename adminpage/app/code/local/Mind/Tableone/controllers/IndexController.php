<?php
class Mind_Tableone_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/tableone?id=15 
    	 *  or
    	 * http://site.com/tableone/id/15 	
    	 */
    	/* 
		$tableone_id = $this->getRequest()->getParam('id');

  		if($tableone_id != null && $tableone_id != '')	{
			$tableone = Mage::getModel('tableone/tableone')->load($tableone_id)->getData();
		} else {
			$tableone = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($tableone == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$tableoneTable = $resource->getTableName('tableone');
			
			$select = $read->select()
			   ->from($tableoneTable,array('tableone_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$tableone = $read->fetchRow($select);
		}
		Mage::register('tableone', $tableone);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}