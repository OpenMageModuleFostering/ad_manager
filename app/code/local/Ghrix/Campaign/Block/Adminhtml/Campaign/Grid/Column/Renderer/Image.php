<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2014 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Coupon codes grid "Used" column renderer
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Ghrix_Campaign_Block_Adminhtml_Campaign_Grid_Column_Renderer_Image
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Text
{
    public function render(Varien_Object $row)
    {
		$currentruleid = $this->getRequest()->getParam('id');
		$value = (int)$row->getData('id');
		$read = Mage::getSingleton('core/resource')->getConnection('core_read');	
		$write = Mage::getSingleton("core/resource")->getConnection("core_write");	
		$query = "SELECT * FROM campaign
		WHERE id ='$value' ";  
		$result = $read->query($query);
		$affected_rows = $result->rowCount();	
		$getstartdate= '';
		if($affected_rows > 0){
			$e = 1;
		$getstartdate1 = $result->fetchAll();
		$getstartdate = $getstartdate1[0]['photo'];
		}
		//return print_r(Mage::getModel('adminhtml/system_config_source_country')->toOptionArray());
		return "<img width ='50' height ='50'src = '".Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).$getstartdate."'>"
				;
    }
}
