<?php
class Ghrix_Campaign_Block_Adminhtml_Campaign_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("campaign_form", array("legend"=>Mage::helper("campaign")->__("Item information")));

				
						$fieldset->addField("title", "text", array(
						"label" => Mage::helper("campaign")->__("title"),
						"name" => "title",
						'class' => 'required-entry',
						));
					
						$fieldset->addField("content", "textarea", array(
						"label" => Mage::helper("campaign")->__("content"),
						"name" => "content",
						));
					
						$fieldset->addField("positon", "text", array(
						"label" => Mage::helper("campaign")->__("positon"),
						"name" => "positon",
						'class' => 'required-entry',
						));
									
						$fieldset->addField('photo', 'image', array(
						'label' => Mage::helper('campaign')->__('photo'),
						'name' => 'photo',
						'class' => 'required-entry',
						'note' => '(*.jpg, *.png, *.gif)',
						));
						$fieldset->addField("width", "text", array(
						"label" => Mage::helper("campaign")->__("width"),
						"name" => "width",
						));
					
						$fieldset->addField("height", "text", array(
						"label" => Mage::helper("campaign")->__("height"),
						"name" => "height",
						));
									
						 $fieldset->addField('country', 'multiselect', array(
						'label'     => Mage::helper('campaign')->__('country'),
						'values'   => Mage::getModel('directory/country')->getResourceCollection()->loadByStore()->toOptionArray(),
						'name' => 'country',
						));
						$dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
							Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
						);

						$fieldset->addField('startfrom', 'date', array(
						'label'        => Mage::helper('campaign')->__('startfrom'),
						'class' => 'required-entry',
						'name'         => 'startfrom',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => 'yyyy-M-d h:mm a'
						));


						$fieldset->addField('startto', 'date', array(
						'label'        => Mage::helper('campaign')->__('startto'),
						'class' => 'required-entry',
						'name'         => 'startto',
						'time' => true,
						'image'        => $this->getSkinUrl('images/grid-cal.gif'),
						'format'       => 'yyyy-M-d h:mm a'
						));				
						 $fieldset->addField('whichday', 'multiselect', array(
						'label'     => Mage::helper('campaign')->__('whichday'),
						'values'   => Ghrix_Campaign_Block_Adminhtml_Campaign_Grid::getValueArray10(),
						'name' => 'whichday',
						));
						
						$fieldset->addField("pos", "text", array(
						"label" => Mage::helper("campaign")->__("sort order"),
						"name" => "pos",
						));
						
		
						$fieldset->addField("enable", "select", array(
						"label" => Mage::helper("campaign")->__("enable"),
						"name" => "enable",
						"values"=>  Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(),
						));

				if (Mage::getSingleton("adminhtml/session")->getCampaignData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCampaignData());
					Mage::getSingleton("adminhtml/session")->setCampaignData(null);
				} 
				elseif(Mage::registry("campaign_data")) {
				    $form->setValues(Mage::registry("campaign_data")->getData());
				}
				return parent::_prepareForm();
		}
}
