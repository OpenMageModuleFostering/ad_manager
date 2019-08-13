<?php
class Ghrix_Campaign_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
	$usercurrent_country =  $this->getLocationInfoByIp();

	 $collection = Mage::getModel("campaign/campaign")->getCollection()->addFieldToFilter("positon", 'content')
	 ->addFieldToFilter("enable", "1")
	// ->addFieldToFilter("id", "2")

	 ->addOrder('pos','DES');
	
		foreach ($collection as $collectiondta)
		{
			
			$getcountry = explode(',' , $collectiondta->getData('country'));

			if(is_array($getcountry)){
				$country = explode(',' , $collectiondta->getData('country')) ;
				}else{
					$country['0'] = $collectiondta->getData('country') ;
					}
			$imagestartfrom =  strtotime($collectiondta->getData('startfrom'));
			$imagestartto =  strtotime($collectiondta->getData('startto'));
			echo "<br/>";
			$today_day = strtolower(date( "l"));  // get current day
			$today_date = time();
			//echo "<br/>";
			
			// to get days from the ids storre in the db
			$imagewhichday = explode(',' , $collectiondta->getData('whichday'));
			$dayasarray = Ghrix_Campaign_Block_Adminhtml_Campaign_Grid::getOptionArray10(); // get defined whichdays arrays 
					$array_new = [];
					foreach($imagewhichday as $key)
					{
						if(array_key_exists($key, $dayasarray))
						{
							$array_new[$key] = $dayasarray[$key];
						}
					}
			// end to get days from the ids storre in the db
print_r($usercurrent_country);
			if(in_array($today_day ,$array_new)){
				if($today_date >= $imagestartfrom  &&  $today_date <= $imagestartto)
				{
					if(in_array($usercurrent_country , $country)) {
						print_r($usercurrent_country);

						echo $collectiondta->getData('title')."<br><img height =".$collectiondta->getData('height')."  width = ".$collectiondta->getData('width')." src = ".Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).$collectiondta->getData('photo')."><br/>".$collectiondta->getData('content')."<br/> ";
					}
				}
			}
		}
}

		public function getLocationInfoByIp(){
				$client  = @$_SERVER['HTTP_CLIENT_IP'];
				$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
				$remote  = @$_SERVER['REMOTE_ADDR'];
				$result  = array('country'=>'', 'city'=>'');
				if(filter_var($client, FILTER_VALIDATE_IP)){
					$ip = $client;
				}elseif(filter_var($forward, FILTER_VALIDATE_IP)){
					$ip = $forward;
				}else{
					$ip = $remote;
				}
				$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
				if($ip_data && $ip_data->geoplugin_countryName != null){
					$result['country'] = $ip_data->geoplugin_countryCode;
					$result['city'] = $ip_data->geoplugin_city;
				}
				return $result['country'];
		}


 }
