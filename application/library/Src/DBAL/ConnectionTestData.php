<?php

namespace Src\DBAL;

class ConnectionTestData {

	public static function creatTalesSql(){
		return "CREATE TABLE IF NOT EXISTS `user` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `username` varchar(128) NOT NULL,
			  `password` varchar(64) NOT NULL,
			  `email` varchar(64) NOT NULL,
			  `point` int(11) NOT NULL DEFAULT '0',
			  `locked` tinyint(3) unsigned NOT NULL DEFAULT '0',
			  `mobile` varchar(32) NOT NULL,
			  `loginedIp` varchar(255) NOT NULL,
			  `loginedTime` int(11) NOT NULL DEFAULT '0',
			  `createdIp` varchar(255) NOT NULL,
			  `createdTime` int(11) NOT NULL,
			  PRIMARY KEY (`id`),
			  UNIQUE KEY `username` (`username`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;"
	}

	public static function insertSql() {
		
	}

}