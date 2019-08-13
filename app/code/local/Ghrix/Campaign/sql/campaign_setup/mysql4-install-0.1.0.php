<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table campaign(id int not null auto_increment,
 title varchar(255),
 positon varchar(255),
content varchar(9999),
 photo varchar(255),
 width varchar(255),
 height varchar(255),
 country varchar(255),
 startfrom varchar(255),
 startto varchar(255),
 whichday varchar(255),
 enable int(1),
 pos varchar(255),
 primary key(id));

SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 
