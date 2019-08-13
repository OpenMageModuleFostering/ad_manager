<?php
class Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("campaignmanager_form", array("legend"=>Mage::helper("campaignmanager")->__("Item information")));

				
						$fieldset->addField("id", "text", array(
						"label" => Mage::helper("campaignmanager")->__("id"),					
						"class" => "required-entry",
						"required" => true,
						"name" => "id",
						));
					
						$fieldset->addField("title", "text", array(
						"label" => Mage::helper("campaignmanager")->__("title"),
						"name" => "title",
						));
					
						$fieldset->addField("content", "text", array(
						"label" => Mage::helper("campaignmanager")->__("content"),
						"name" => "content",
						));
					
						$fieldset->addField("positon", "text", array(
						"label" => Mage::helper("campaignmanager")->__("positon"),
						"name" => "positon",
						));
									
						$fieldset->addField('photo', 'image', array(
						'label' => Mage::helper('campaignmanager')->__('photo'),
						'name' => 'photo',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("width", "text", array(
						"label" => Mage::helper("campaignmanager")->__("width"),
						"name" => "width",
						));
					
						$fieldset->addField("height", "text", array(
						"label" => Mage::helper("campaignmanager")->__("height"),
						"name" => "height",
						));
									
						 $fieldset->addField('country', 'select', array(
						'label'     => Mage::helper('campaignmanager')->__('country'),
						'values'   => Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Grid::getValueArray7(),
						'name' => 'country',
						));
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('startfrom', 'date', array(
						'label'        => Mage::helper('campaignmanager')->__('startfrom'),
						'name'         => 'startfrom',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('startto', 'date', array(
						'label'        => Mage::helper('campaignmanager')->__('startto'),
						'name'         => 'startto',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => $dateFormatIso
						));				
						 $fieldset->addField('whichday', 'multiselect', array(
						'label'     => Mage::helper('campaignmanager')->__('whichday'),
						'values'   => Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Grid::getValueArray10(),
						'name' => 'whichday',
						));
						$fieldset->addField("enable", "text", array(
						"label" => Mage::helper("campaignmanager")->__("enable"),
						"name" => "enable",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getCampaignmanagerData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCampaignmanagerData());
					Mage::getSingleton("adminhtml/session")->setCampaignmanagerData(null);
				} 
				elseif(Mage::registry("campaignmanager_data")) {
				    $form->setValues(Mage::registry("campaignmanager_data")->getData());
				}
				return parent::_prepareForm();
		}
}
