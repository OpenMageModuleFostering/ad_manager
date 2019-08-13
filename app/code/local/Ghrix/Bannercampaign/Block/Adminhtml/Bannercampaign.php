<?php


class Ghrix_Bannercampaign_Block_Adminhtml_Bannercampaign extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_bannercampaign";
	$this->_blockGroup = "bannercampaign";
	$this->_headerText = Mage::helper("bannercampaign")->__("Bannercampaign Manager");
	$this->_addButtonLabel = Mage::helper("bannercampaign")->__("Add New Item");
	parent::__construct();
	
	}

}