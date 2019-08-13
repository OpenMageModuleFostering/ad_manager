<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table bannercampaign(id int not null auto_increment,
 title varchar(100),
 positon varchar(100),
 content varchar(100),
 photo varchar(100),
 width varchar(100),
 height varchar(100),
 country varchar(100),
 startfrom varchar(100),
 startto varchar(100),
 whichday varchar(100),
 enable varchar(100),
 primary key(id));

SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 