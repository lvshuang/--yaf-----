CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `point` int(11) DEFAULT '0',
  `locked` tinyint(3) unsigned DEFAULT '0',
  `mobile` varchar(32) DEFAULT NULL,
  `loginedIp` varchar(255) DEFAULT NULL,
  `loginedTime` int(11) DEFAULT '0',
  `createdIp` varchar(255) DEFAULT NULL,
  `createdTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `point`, `locked`, `mobile`, `loginedIp`, `loginedTime`, `createdIp`, `createdTime`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'lvshuang1201@gmail.com', 0, 0, NULL, NULL, 0, NULL, NULL);
