-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table sales.addcart
CREATE TABLE IF NOT EXISTS `addcart` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `c_model` varchar(50) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `c_model` (`c_model`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sales.addcart: ~7 rows (approximately)
/*!40000 ALTER TABLE `addcart` DISABLE KEYS */;
REPLACE INTO `addcart` (`id`, `username`, `quantity`, `c_model`) VALUES
	(9, '@enoria', '1', 'Xiaomi Mi 11 '),
	(8, '@enoria', '4', 'Samsung Galaxy A52 '),
	(8, '@enoria', '4', 'Samsung Galaxy A52 '),
	(9, '@glayy', '2', 'Xiaomi Mi 11 '),
	(8, '@glayy', '1', 'Samsung Galaxy A52 '),
	(11, 'tedted29', '1', 'OPPO A15s '),
	(11, '@tedted', '1', 'OPPO A15s ');
/*!40000 ALTER TABLE `addcart` ENABLE KEYS */;

-- Dumping structure for table sales.place_order
CREATE TABLE IF NOT EXISTS `place_order` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sales.place_order: ~0 rows (approximately)
/*!40000 ALTER TABLE `place_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `place_order` ENABLE KEYS */;

-- Dumping structure for table sales.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) NOT NULL,
  `model` varchar(350) NOT NULL,
  `specs` varchar(500) NOT NULL,
  `p_quantity` varchar(500) NOT NULL,
  `picture` varchar(55) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Dumping data for table sales.products: ~33 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
REPLACE INTO `products` (`id`, `brand`, `model`, `specs`, `p_quantity`, `picture`, `price`) VALUES
	(7, 'Nokia', 'Nokia 5.4 ', '6.39-inch HD+ display, 48MP + 5MP + 2MP + 2MP , 662 chi', '12', 'images/nokia(5.4).png', 23000),
	(11, 'OPPO', 'OPPO A15s ', '6.52-inch HD+ display, 13MP + 2MP + 2MP triple rear cameras, 64GB of expandable storage, 4GB of RAM, Android 10 OS, 4230mAh battery ', '8', 'images/OPPO A15s.jpg', 7999),
	(12, 'OPPO', 'OPPO Reno5 4G ', '64MP + 8MP + 2MP + 2MP quad rear cameras 2.3GHz octa-core CPU, 8GB of RAM, Android 11 OS 128GB of expandable storage A 4,310mAh', '9', 'images/OPPO Reno5 4G.jpg', 18990),
	(13, 'OPPO', 'OPPO Reno5 5G ', '64MP + 8MP + 2MP + 2MP quad rear cameras 2.4GHz octa-core CPU, 8GB of RAM, Android 11 OS 128GB of internal storage 4,300mAh ', '13', 'images/OPPO Reno5 5G.jpg', 23990),
	(14, 'Lenovo ', 'Lenovo K12 Pro ', '6.8-inch HD+ display, 64MP + 2MP + 2MP triple rear cameras a single 16MP punch-hole selfie camera 4GB of RAM and Android 10 128GB of expandable storage 6,000mAh ', '7', 'images/Lenovo K12 Pro.jpg', 7990),
	(15, 'Xiaomi', 'Xiaomi Redmi 9T ', '6.53-inch FHD+ display, 48MP + 8MP + 2MP + 2MP quad rear cameras a single 8MP selfie camera on a small notch 4GB or 6GB of RAM, Android 10 OS 128GB of expandable storage 6,000mAh', '9', 'images/Xiaomi Redmi 9T.jpg', 6990),
	(16, 'MyPhone', 'MyPhone myWX2 Pro ', '6.08-inch HD+ display, 13 Megapixel rear camera 8 Megapixel selfie camera 3GB of RAM and Android 10 32GB of expandable storage 3,000mAh', '12', 'images/MyPhone myWX2 Pro.jpg', 3999),
	(17, 'MyPhone', 'MyPhone myWX2 ', '.08-inch HD+ display, 13 Megapixel rear camera and 8 Megapixel selfie camera 1.4GHz quad-core CPU, 2GB of RAM, and Android 10  3,000mAh ', '9', 'images/MyPhone myWX2.jpg', 3699),
	(18, 'Samsung', 'Samsung Galaxy S21 Ultra 5G ', '6.8-inch Quad HD+ Dynamic AMOLED 2X display with a 120Hz  108MP main camera, 12MP ultra-wide camera, 10MP 10x periscope telephoto camera, and 10MP 3x telephoto camera single 40MP selfie camera 2.9GHz CPU, up to 16GB of RAM, and Android 11 256GB or 512GB of storage 5,000mAh ', '14', 'images/Samsung Galaxy S21 Ultra 5G.jpg', 79990),
	(19, 'Samsung ', 'Samsung Galaxy S21+ 5G ', '6.7-inch Full HD+ Dynamic AMOLED 2X display with a 120Hz adaptive refresh rate, 12MP + 12MP + 64MP triple rear camera single 10MP autofocus selfie camera 2.9GHz octa-core CPU, 8GB of RAM, Android 11 OS, and One UI 3.1 software 256GB of internal storage 4,800mAh ', '2', 'images/Samsung Galaxy S21+ 5G.jpg', 57990),
	(22, 'SAMSUNG', 'SAMSUNG Galaxy A02S ', '6.5-inch HD+ display, 13MP + 2MP + 2MP triple rear cameras 5MP selfie camera 4GB of RAM and an Android 10 64GB of expandable storage 5,000mAh ', '13', 'images/SAMSUNG Galaxy A02S.jpg', 6990),
	(23, 'Cherry Mobile', 'Cherry Mobile Flare Y20 ', '8MP + 2MP dual rear cameras single 5MP selfie camera 1.6GHz octa-core processor with 2GB of RAM and Android 10 3,000mAh ', '14', 'images/Cherry Mobile Flare Y20.jpg', 3299),
	(24, 'Cherry Mobile', 'Cherry Mobile Aqua Infinity ', '6.52-inch HD+ TrueView display, 12MP + 20MP + 2MP + 2MP quad rear cameras, single 8MP selfie camera 8GB of RAM and Android 10 4,000mAh ', '12', 'images/Cherry Mobile Aqua Infinity.jpg', 7999),
	(25, 'Cherry Mobile', 'Cherry Mobile Aqua S9 ', '13MP + 5MP + 2MP + 2MP quad rear 8MP selfie camera 4GB of RAM and Android 10 5,000mAh 64GB of expandable storage', '3', 'images/Cherry Mobile Aqua S9.jpg', 3999),
	(26, 'TECNO ', 'TECNO Spark 6 ', ' 6.8-inch HD+ display, 16MP quad-camera setup, and a single 8MP punch-hole selfie camera, with 4GB of RAM, Android 10 OS 128GB of expandable storage 5,000mAh ', '1', 'images/TECNO Spark 6.jpg', 6490),
	(27, 'vivo ', 'vivo Y20i 2021 ', '6.51-inch HD+ display and 8MP selfie camera with 4GB of RAM and an updated FunTouchOS 11 software 64GB of expandable storage 5,000mAh ', '5', 'images/vivo Y20i 2021.jpg', 7499),
	(28, 'Samsung ', 'Samsung Galaxy A42 5G ', '48MP + 8MP + 5MP + 5MP quad rear cameras, and a single 20MP selfie camera 6GB of RAM, Android 10 OS, 128GB of expandable storage A 5,000mAh ', '6', 'images/Samsung Galaxy A42 5G.jpg', 19990),
	(29, 'realme', 'realme X50 Pro 5G ', '64MP + 12MP + 8MP + 2MP quad rear cameras, and 32MP + 8MP dual punch-hole selfie cameras 12GB of RAM, realme UI, 4,200mAh 256GB of internal storage', '8', 'images/realme X50 Pro 5G.jpg', 20000),
	(30, 'Huawei', 'Huawei Mate 40 Pro ', '50MP + 20MP + 12MP triple rear camera setup with up to 50x zoom 13MP punch-hole selfie camera with 8GB of RAM, Android 10 OS, and EMUI 11 4,400mAh 256GB of internal storage', '9', 'images/Huawei Mate 40 Pro.jpg', 55999),
	(31, 'Nokia', 'Nokia 3.4 ', '13MP + 5MP + 2MP triple rear cameras, and an 8MP selfie camera 4GB of RAM, and Android 10 A 4,000mAh 64GB of expandable storage', '3', 'images/Nokia 3.4.jpg', 7990),
	(32, 'Cherry Mobile', 'Cherry Mobile Aqua S9 Max ', '6.53-inch FHD+ display, 48MP + 8MP + 2MP + 2MP quad rear cameras, and a single 32MP selfie camera 4GB of RAM, Android 10 OS 128GB of expandable storage 5130mAh', '1', 'images/Cherry Mobile Aqua S9 Max.jpg', 9999),
	(33, 'TECNO ', 'TECNO Spark 6 Go ', '6.52-inch HD+ display, 13MP dual rear camera setup, and a single 8MP selfie camera 2GB of RAM, and Android 10 Go Edition 32GB of expandable storage 5,000mAh ', '2', 'images/TECNO Spark 6 Go.jpg', 3990),
	(34, 'MyPhone', 'MyPhone myWX1 Lite ', '5.45-inch Waterdrop display, 2 Megapixel rear camera,8GB of expandable storage 1GB of RAM and Android 10 2,200mAh ', '4', 'images/MyPhone myWX1 Lite.jpg', 2099),
	(35, 'iPhone ', 'iPhone 12 ', 'a 6.1-inch Super Retina XDR OLED display, 12MP + 12MP dual rear cameras, and a 12MP selfie camera 4GB of RAM and iOS 14 256GB of internal storage 2,815mAh ', '8', 'images/iPhone 12.jpg', 49990),
	(36, 'iPhone ', 'iPhone 12 mini ', '12MP + 12MP dual rear cameras and 12MP selfie camera as the regular iPhone 12 4GB RAM, and iOS 14 256GB of internal storage 2,227mAh ', '9', 'images/iPhone 12 mini.jpg', 46990),
	(37, 'iPhone', 'iPhone 12 Pro ', '12MP quad rear cameras with a LiDAR depth scanner, and a 12MP selfie camera 6GB of RAM and iOS 14 512GB of internal storage 2,815mAh ', '10', 'images/iPhone 12 Pro.jpg', 62990),
	(38, 'iPhone ', 'iPhone 12 Pro Max ', '12MP quad rear cameras with LiDAR scanner and up to 12x zoom, and a 12MP notch selfie camera with 6GB of RAM and iOS 14 operating system 512GB of internal storage 3867mAh ', '11', 'images/iPhone 12 Pro Max.jpg', 68990),
	(39, 'realme', 'realme narzo 20 ', '6.5-inch HD+ display, 48MP + 8MP + 2MP triple rear camera setup, and a single 8MP selfie camera 4GB of RAM, Android 10 OS 64GB of expandable storage 6,000mAh ', '13', 'images/realme narzo 20.jpg', 7990),
	(40, 'OPPO', 'OPPO A53 ', '6.5-inch HD+ display with a 90Hz screen refresh rate, 16MP punch-hole selfie camera, and a 13MP + 2MP + 2MP triple rear camera 4GB of RAM, Android 10 OS 64GB of expandable storage 5,000mAh ', '7', 'images/OPPO A53.jpg', 8990),
	(41, 'MyPhone', 'MyPhone myWX1 Plus ', '5.71-inch HD+ display with a waterdrop notch, 13MP rear camera, an 8MP selfie camera with 2GB of RAM and Android 10 16GB of expandable storage 3,000mAh ', '2', 'images/MyPhone myWX1 Plus.jpg', 3099);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table sales.purchase_history
CREATE TABLE IF NOT EXISTS `purchase_history` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

-- Dumping data for table sales.purchase_history: ~6 rows (approximately)
/*!40000 ALTER TABLE `purchase_history` DISABLE KEYS */;
REPLACE INTO `purchase_history` (`id`, `firstname`, `lastname`, `mobile`, `address`, `picture`, `model`, `price`, `quantity`, `total`, `payment_mode`, `date`) VALUES
	(79, 'glayy', 'eliver', '09955710868', 'c', 'images/OPPO Reno5 4G.jpg', 'OPPO Reno5 4G ', '18', '1', '18990', 'COD', '2021-05-13'),
	(80, 'glayy', 'eliver', '09955710868', 'carabalan', 'images/OPPO A53.jpg', 'OPPO A53 ', '8', '1', '8990', 'COD', '2021-05-13'),
	(81, 'glayy', 'eliver', '09955710868', 'himamaylan', 'images/realme narzo 20.jpg', 'realme narzo 20 ', '7', '1', '17000', 'gCash', '2021-05-13'),
	(82, 'tedted', 'enoria', '09955710868', 'isabela', 'images/MyPhone myWX1 Plus.jpg', 'MyPhone myWX1 Plus ', '3', '1', '3990', 'gCash', '2021-05-13'),
	(83, 'glayy', 'eliver', '09955710868', 'secret place', 'images/nokia(5.4).png', 'Nokia 5.4 ', '23', '1', '23000', 'COD', '2021-05-13'),
	(84, 'mica', 'eliver', '09955710868', 'hacienda', 'images/Samsung Galaxy S21+ 5G.jpg', 'Samsung Galaxy S21+ 5G ', '57,990.00', '1', '57990', 'COD', '2022-03-11'),
	(85, 'glayy', 'eliver', '09955710868', 'carabalan', 'images/nokia(5.4).png', 'Nokia 5.4 ', '23,000.00', '1', '23,000.00', 'COD', '2021-05-14'),
	(86, 'glayy', 'eliver', '09955710868', 'hey', 'images/realme narzo 20.jpg', 'realme narzo 20 ', '7,990.00', '1', '7,990.00', 'gCash', '2021-05-18');
/*!40000 ALTER TABLE `purchase_history` ENABLE KEYS */;

-- Dumping structure for table sales.tblregister
CREATE TABLE IF NOT EXISTS `tblregister` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `mobile` varchar(55) NOT NULL,
  `username` varchar(100) NOT NULL,
  `u_pass` varchar(55) NOT NULL,
  `user_type` varchar(55) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table sales.tblregister: ~3 rows (approximately)
/*!40000 ALTER TABLE `tblregister` DISABLE KEYS */;
REPLACE INTO `tblregister` (`id`, `firstname`, `lastname`, `mobile`, `username`, `u_pass`, `user_type`, `image`) VALUES
	(26, 'a', 'b', '98798787787', 'c', 'd', 'admin', ''),
	(27, 'tedmar', 'enoria', '8768768', '@enoria', '13', 'user', ''),
	(28, 'ygkuyg', 'ugkuyg', '', 'a', '1', 'admin', ''),
	(29, 'glayy', 'eliver', '09955710868', '@glayy', '13', 'user', '');
/*!40000 ALTER TABLE `tblregister` ENABLE KEYS */;

-- Dumping structure for table sales.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table sales.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
	(1, 'ted', 'teddy@tedted', 'admin', 'c51ce410c124a10e0db5e4b97fc2af39'),
	(7, 'glayy', 'g@glayy', 'user', 'c51ce410c124a10e0db5e4b97fc2af39'),
	(8, 'sadasd', 'asdasd', '', '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
