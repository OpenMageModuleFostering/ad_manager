<?php

class Ghrix_Campaignmanager_Adminhtml_CampaignmanagerController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("campaignmanager/campaignmanager")->_addBreadcrumb(Mage::helper("adminhtml")->__("Campaignmanager  Manager"),Mage::helper("adminhtml")->__("Campaignmanager Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Campaignmanager"));
			    $this->_title($this->__("Manager Campaignmanager"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Campaignmanager"));
				$this->_title($this->__("Campaignmanager"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("campaignmanager/campaignmanager")->load($id);
				if ($model->getId()) {
					Mage::register("campaignmanager_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("campaignmanager/campaignmanager");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Campaignmanager Manager"), Mage::helper("adminhtml")->__("Campaignmanager Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Campaignmanager Description"), Mage::helper("adminhtml")->__("Campaignmanager Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("campaignmanager/adminhtml_campaignmanager_edit"))->_addLeft($this->getLayout()->createBlock("campaignmanager/adminhtml_campaignmanager_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("campaignmanager")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Campaignmanager"));
		$this->_title($this->__("Campaignmanager"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("campaignmanager/campaignmanager")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("campaignmanager_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("campaignmanager/campaignmanager");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Campaignmanager Manager"), Mage::helper("adminhtml")->__("Campaignmanager Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Campaignmanager Description"), Mage::helper("adminhtml")->__("Campaignmanager Description"));


		$this->_addContent($this->getLayout()->createBlock("campaignmanager/adminhtml_campaignmanager_edit"))->_addLeft($this->getLayout()->createBlock("campaignmanager/adminhtml_campaignmanager_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						
					$post_data['whichday']=implode(',',$post_data['whichday']);
				 //save image
		try{

if((bool)$post_data['photo']['delete']==1) {

	        $post_data['photo']='';

}
else {

	unset($post_data['photo']);

	if (isset($_FILES)){

		if ($_FILES['photo']['name']) {

			if($this->getRequest()->getParam("id")){
				$model = Mage::getModel("campaignmanager/campaignmanager")->load($this->getRequest()->getParam("id"));
				if($model->getData('photo')){
						$io = new Varien_Io_File();
						$io->rm(Mage::getBaseDir('media').DS.implode(DS,explode('/',$model->getData('photo'))));	
				}
			}
						$path = Mage::getBaseDir('media') . DS . 'campaignmanager' . DS .'campaignmanager'.DS;
						$uploader = new Varien_File_Uploader('photo');
						$uploader->setAllowedExtensions(array('jpg','png','gif'));
						$uploader->setAllowRenameFiles(false);
						$uploader->setFilesDispersion(false);
						$destFile = $path.$_FILES['photo']['name'];
						$filename = $uploader->getNewFileName($destFile);
						$uploader->save($path, $filename);

						$post_data['photo']='campaignmanager/campaignmanager/'.$filename;
		}
    }
}

        } catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
        }
//save image


						$model = Mage::getModel("campaignmanager/campaignmanager")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Campaignmanager was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setCampaignmanagerData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setCampaignmanagerData($this->getRequest()->getPost());
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
						$model = Mage::getModel("campaignmanager/campaignmanager");
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

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("campaignmanager/campaignmanager");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'campaignmanager.csv';
			$grid       = $this->getLayout()->createBlock('campaignmanager/adminhtml_campaignmanager_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'campaignmanager.xml';
			$grid       = $this->getLayout()->createBlock('campaignmanager/adminhtml_campaignmanager_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
