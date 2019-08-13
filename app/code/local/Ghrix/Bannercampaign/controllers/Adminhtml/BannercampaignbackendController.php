<?php
class Ghrix_Bannercampaign_Adminhtml_BannercampaignbackendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("bannercampaign"));
	   $this->renderLayout();
    }
}