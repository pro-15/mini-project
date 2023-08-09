DROP TABLE IF EXISTS `dept`;
CREATE TABLE IF NOT EXISTS `dept` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dept` varchar(30) NOT NULL,
  `dmg` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=3;


INSERT INTO `dept` (`id`, `dept`, `dmg`) VALUES
(1, 'Otolaryngologist', '0d20e6111416a2dd7f6191d8d0cf6157_f00cd392d567ab9.png'),
(2, 'Orthopedics', '21ff2d49071bf0081eb930805077061a_af744b3ff48ea4f.png');


DROP TABLE IF EXISTS `doc`;
CREATE TABLE IF NOT EXISTS `doc` (
  `did` int NOT NULL AUTO_INCREMENT,
  `dname` varchar(30) NOT NULL,
  `dage` int NOT NULL,
  `dphon` char(10) NOT NULL,
  PRIMARY KEY (`did`)
) AUTO_INCREMENT=3;


INSERT INTO `doc` (`did`, `dname`, `dage`, `dphon`) VALUES
(1, 'Abhidev', 25, '1234567890'),
(2, 'Thomaskutty', 46, '9495748822');