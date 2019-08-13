<?php
class Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("campaignmanager_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("campaignmanager")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("campaignmanager")->__("Item Information"),
				"title" => Mage::helper("campaignmanager")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("campaignmanager/adminhtml_campaignmanager_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
