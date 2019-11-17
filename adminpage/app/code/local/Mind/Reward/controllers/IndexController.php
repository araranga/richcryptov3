<?php
class Mind_Reward_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/reward?id=15 
    	 *  or
    	 * http://site.com/reward/id/15 	
    	 */
    	/* 
		$id = $this->getRequest()->getParam('id');

  		if($id != null && $id != '')	{
			$reward = Mage::getModel('reward/reward')->load($id)->getData();
		} else {
			$reward = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($reward == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$rewardTable = $resource->getTableName('reward');
			
			$select = $read->select()
			   ->from($rewardTable,array('id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$reward = $read->fetchRow($select);
		}
		Mage::register('reward', $reward);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}