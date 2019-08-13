<?php

class Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("campaignmanagerGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("campaignmanager/campaignmanager")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("campaignmanager")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("title", array(
				"header" => Mage::helper("campaignmanager")->__("title"),
				"index" => "title",
				));
				$this->addColumn("content", array(
				"header" => Mage::helper("campaignmanager")->__("content"),
				"index" => "content",
				));
				$this->addColumn("positon", array(
				"header" => Mage::helper("campaignmanager")->__("positon"),
				"index" => "positon",
				));
				$this->addColumn("width", array(
				"header" => Mage::helper("campaignmanager")->__("width"),
				"index" => "width",
				));
				$this->addColumn("height", array(
				"header" => Mage::helper("campaignmanager")->__("height"),
				"index" => "height",
				));
						$this->addColumn('country', array(
						'header' => Mage::helper('campaignmanager')->__('country'),
						'index' => 'country',
						'type' => 'options',
						'options'=>Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Grid::getOptionArray7(),				
						));
						
					$this->addColumn('startfrom', array(
						'header'    => Mage::helper('campaignmanager')->__('startfrom'),
						'index'     => 'startfrom',
						'type'      => 'datetime',
					));
					$this->addColumn('startto', array(
						'header'    => Mage::helper('campaignmanager')->__('startto'),
						'index'     => 'startto',
						'type'      => 'datetime',
					));
				$this->addColumn("enable", array(
				"header" => Mage::helper("campaignmanager")->__("enable"),
				"index" => "enable",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_campaignmanager', array(
					 'label'=> Mage::helper('campaignmanager')->__('Remove Campaignmanager'),
					 'url'  => $this->getUrl('*/adminhtml_campaignmanager/massRemove'),
					 'confirm' => Mage::helper('campaignmanager')->__('Are you sure?')
				));
			return $this;
		}
			
		static public function getOptionArray7()
		{
            $data_array=array(); 
			$data_array[0]='india';
			$data_array[1]='us';
            return($data_array);
		}
		static public function getValueArray7()
		{
            $data_array=array();
			foreach(Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Grid::getOptionArray7() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		
		static public function getOptionArray10()
		{
            $data_array=array(); 
			$data_array[0]='weekday';
			$data_array[1]='weekend';
			$data_array[2]='monday';
			$data_array[3]='tuesday';
			$data_array[4]='wednesday';
			$data_array[5]='thursday';
			$data_array[6]='friday';
			$data_array[7]='saturday';
			$data_array[8]='sunday';
            return($data_array);
		}
		static public function getValueArray10()
		{
            $data_array=array();
			foreach(Ghrix_Campaignmanager_Block_Adminhtml_Campaignmanager_Grid::getOptionArray10() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}