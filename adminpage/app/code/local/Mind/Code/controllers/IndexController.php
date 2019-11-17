<?php
class Mind_Code_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/code?id=15 
    	 *  or
    	 * http://site.com/code/id/15 	
    	 */
    	/* 
		$code_id = $this->getRequest()->getParam('id');

  		if($code_id != null && $code_id != '')	{
			$code = Mage::getModel('code/code')->load($code_id)->getData();
		} else {
			$code = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($code == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$codeTable = $resource->getTableName('code');
			
			$select = $read->select()
			   ->from($codeTable,array('code_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$code = $read->fetchRow($select);
		}
		Mage::register('code', $code);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}