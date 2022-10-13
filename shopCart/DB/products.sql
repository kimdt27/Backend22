CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `product_code` (`code`)
)

INSERT INTO `products` (`ID`, `name`, `code`, `image`, `price`) VALUES
(1, 'Reading duck', 'DS0021', 'img/duck1.jpg', 25.00),
(2, 'Blue relaxed duck', 'DS0022', 'img/duck2.jpg', 75.00),
(3, 'Sporty duck', 'DS0023', 'img/duck3.jpg', 150.00),
(4, 'Weifu duck', 'DS0024', 'img/duck4.jpg', 80.00),
(5, 'Tennis duck', 'DS0025', 'img/duck5.jpg', 30.00);
