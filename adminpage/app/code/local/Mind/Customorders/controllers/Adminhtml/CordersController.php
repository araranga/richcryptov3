<?php

class Mind_Customorders_Adminhtml_CordersController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('customorders/corders');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("customorders/corders")->_addBreadcrumb(Mage::helper("adminhtml")->__("Corders  Manager"),Mage::helper("adminhtml")->__("Corders Manager"));
				return $this;
		}
		public function indexAction()
		{
			    $this->_title($this->__("Customorders"));
			    $this->_title($this->__("Manager Corders"));

				$this->_initAction();
				$this->renderLayout();
		}

		public function loadorderAction()
		{
			    $this->_title($this->__("Customorders"));
			    $this->_title($this->__("Manager Corders"));

				$this->_initAction();
				$this->renderLayout();
		}



		public function editAction()
		{
			    $this->_title($this->__("Customorders"));
				$this->_title($this->__("Corders"));
			    $this->_title($this->__("Edit Item"));

				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("customorders/corders")->load($id);
				if ($model->getId()) {
					Mage::register("corders_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("customorders/corders");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Corders Manager"), Mage::helper("adminhtml")->__("Corders Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Corders Description"), Mage::helper("adminhtml")->__("Corders Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("customorders/adminhtml_corders_edit"))->_addLeft($this->getLayout()->createBlock("customorders/adminhtml_corders_edit_tabs"));
					$this->renderLayout();
				}
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("customorders")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function addnewAction(){

			    $this->_title($this->__("Customorders"));
			    $this->_title($this->__("Manager Corders"));

				$this->_initAction();
				$this->renderLayout();


		}
		public function savecorderAction(){


		if($_POST['submit']!='') {
		    if(count($_POST['items'])){
		        $_POST['items'] = json_encode($_POST['items']);

		        $postdata = array();
		        unset($_POST['submit']);

		        $_POST['quote'] = "#ORDER-".time()." for ". $_POST['name'];
		        foreach($_POST as $key=>$val) {
		            $val = addslashes($val);
		            $postdata[] = "$key='$val'";
		        }

		        $newdata = Mage::getModel("customorders/corders")->load();
		        $newdata->addData($_POST);
		        $newdata->save();
		        $id = $newdata->getId();
				$success  = 1;
		    }
		}

		$this->_redirect("*/*/loadorder",array("id"=>$id));


		}

		public function newAction()
		{
		$this->_redirect("*/*/addnew");

		}


		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("customorders/corders")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Corders was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setCordersData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setCordersData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("customorders/corders");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					}
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
}
