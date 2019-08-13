<?php
class Ghrix_Campaignmanager_Model_Mysql4_Campaignmanager extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("campaignmanager/campaignmanager", "id");
    }
}