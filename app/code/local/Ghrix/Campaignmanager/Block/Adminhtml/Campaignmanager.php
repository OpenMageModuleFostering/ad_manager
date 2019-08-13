<?php


class Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_campaignmanager";
	$this->_blockGroup = "campaignmanager";
	$this->_headerText = Mage::helper("campaignmanager")->__("Campaignmanager Manager");
	$this->_addButtonLabel = Mage::helper("campaignmanager")->__("Add New Item");
	parent::__construct();
	
	}

}