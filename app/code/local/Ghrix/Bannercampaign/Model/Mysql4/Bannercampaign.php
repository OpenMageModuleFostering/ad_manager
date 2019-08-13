<?php
class Ghrix_Bannercampaign_Model_Mysql4_Bannercampaign extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("bannercampaign/bannercampaign", "id");
    }
}