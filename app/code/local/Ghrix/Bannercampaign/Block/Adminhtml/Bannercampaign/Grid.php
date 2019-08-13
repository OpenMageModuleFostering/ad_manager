<?php

class Ghrix_Bannercampaign_Block_Adminhtml_Bannercampaign_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("bannercampaignGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("bannercampaign/bannercampaign")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("bannercampaign")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("title", array(
				"header" => Mage::helper("bannercampaign")->__("title"),
				"index" => "title",
				));
				$this->addColumn("content", array(
				"header" => Mage::helper("bannercampaign")->__("content"),
				"index" => "content",
				));
				$this->addColumn("positon", array(
				"header" => Mage::helper("bannercampaign")->__("positon"),
				"index" => "positon",
				));
				$this->addColumn("width", array(
				"header" => Mage::helper("bannercampaign")->__("width"),
				"index" => "width",
				));
				$this->addColumn("height", array(
				"header" => Mage::helper("bannercampaign")->__("height"),
				"index" => "height",
				));
						$this->addColumn('country', array(
						'header' => Mage::helper('bannercampaign')->__('country'),
						'index' => 'country',
						'type' => 'options',
						'options'=>Ghrix_Bannercampaign_Block_Adminhtml_Bannercampaign_Grid::getOptionArray7(),				
						));
						
					$this->addColumn('startfrom', array(
						'header'    => Mage::helper('bannercampaign')->__('startfrom'),
						'index'     => 'startfrom',
						'type'      => 'datetime',
					));
					$this->addColumn('startto', array(
						'header'    => Mage::helper('bannercampaign')->__('startto'),
						'index'     => 'startto',
						'type'      => 'datetime',
					));
				$this->addColumn("enable", array(
				"header" => Mage::helper("bannercampaign")->__("enable"),
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
			$this->getMassactionBlock()->addItem('remove_bannercampaign', array(
					 'label'=> Mage::helper('bannercampaign')->__('Remove Bannercampaign'),
					 'url'  => $this->getUrl('*/adminhtml_bannercampaign/massRemove'),
					 'confirm' => Mage::helper('bannercampaign')->__('Are you sure?')
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
			foreach(Ghrix_Bannercampaign_Block_Adminhtml_Bannercampaign_Grid::getOptionArray7() as $k=>$v){
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
			foreach(Ghrix_Bannercampaign_Block_Adminhtml_Bannercampaign_Grid::getOptionArray10() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		}
		

}