<?php
/*
$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('forummanager')};
CREATE TABLE {$this->getTable('forummanager')} (
  `id` int(11) unsigned NOT NULL auto_increment,
  `base_model` varchar(255) NOT NULL default '',
  `doors_name` varchar(255) NOT NULL default '',
  `filename` varchar(255) NOT NULL default '',
  `doors_description` text NOT NULL default '',
  `set_default_doors` smallint(6) NOT NULL default '2',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 
*/