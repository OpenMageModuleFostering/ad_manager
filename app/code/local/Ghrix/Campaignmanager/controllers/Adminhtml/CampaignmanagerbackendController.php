<?php
class Ghrix_Campaignmanager_Adminhtml_CampaignmanagerbackendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Campaignmanager"));
	   $this->renderLayout();
    }
}