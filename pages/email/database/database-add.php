CREATE TABLE `email` (
`id_email` int(11) NOT NULL AUTO_INCREMENT,
`font` varchar(45) NOT NULL,
`break` varchar(45) NOT NULL,
`email` varchar(45) NOT NULL,
`domein` varchar(45) NOT NULL,
`belong` varchar(45) NOT NULL,
`subject` varchar(45) NOT NULL,
`body` varchar(45) NOT NULL,
`start` varchar(45) NOT NULL,
`stop` varchar(45) NOT NULL,
PRIMARY KEY (`id_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;