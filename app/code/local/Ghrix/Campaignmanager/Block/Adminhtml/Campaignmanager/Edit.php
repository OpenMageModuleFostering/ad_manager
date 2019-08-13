<?php
	
class Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "campaignmanager";
				$this->_controller = "adminhtml_campaignmanager";
				$this->_updateButton("save", "label", Mage::helper("campaignmanager")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("campaignmanager")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("campaignmanager")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("campaignmanager_data") && Mage::registry("campaignmanager_data")->getId() ){

				    return Mage::helper("campaignmanager")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("campaignmanager_data")->getId()));

				} 
				else{

				     return Mage::helper("campaignmanager")->__("Add Item");

				}
		}
}