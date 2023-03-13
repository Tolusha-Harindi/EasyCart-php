-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2021 at 08:39 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easycartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `avishkabank`
--

DROP TABLE IF EXISTS `avishkabank`;
CREATE TABLE IF NOT EXISTS `avishkabank` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `taskId` int(10) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avishkabank`
--

INSERT INTO `avishkabank` (`id`, `taskId`, `total`, `date`) VALUES
(1, 1, '25.50', '2021-02-04 12:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `avishkatasks`
--

DROP TABLE IF EXISTS `avishkatasks`;
CREATE TABLE IF NOT EXISTS `avishkatasks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` int(10) NOT NULL,
  `productId` int(10) NOT NULL,
  `seller` varchar(100) NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `harshabank`
--

DROP TABLE IF EXISTS `harshabank`;
CREATE TABLE IF NOT EXISTS `harshabank` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `taskId` int(10) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harshabank`
--

INSERT INTO `harshabank` (`id`, `taskId`, `total`, `date`) VALUES
(2, 2, '1487.50', '2021-02-04 13:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `harshatasks`
--

DROP TABLE IF EXISTS `harshatasks`;
CREATE TABLE IF NOT EXISTS `harshatasks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` int(10) NOT NULL,
  `productId` int(10) NOT NULL,
  `seller` varchar(100) NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hirubank`
--

DROP TABLE IF EXISTS `hirubank`;
CREATE TABLE IF NOT EXISTS `hirubank` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `taskId` int(10) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hirutasks`
--

DROP TABLE IF EXISTS `hirutasks`;
CREATE TABLE IF NOT EXISTS `hirutasks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` int(10) NOT NULL,
  `productId` int(10) NOT NULL,
  `seller` varchar(100) NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isuru`
--

DROP TABLE IF EXISTS `isuru`;
CREATE TABLE IF NOT EXISTS `isuru` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isuru`
--

INSERT INTO `isuru` (`id`, `seller`, `productId`, `itemname`, `category`, `quantity`, `rate`, `total`, `date`) VALUES
(6, 'Thavindu', 9, 'Surgical', 'HealthCare', 3, '300.00', '900.00', '2021-02-04 16:41:25'),
(5, 'Tolusha', 5, 'Side', 'Sleepwear', 1, '800.00', '800.00', '2021-02-04 16:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `isuruacc`
--

DROP TABLE IF EXISTS `isuruacc`;
CREATE TABLE IF NOT EXISTS `isuruacc` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isuruacc`
--

INSERT INTO `isuruacc` (`id`, `buyer`, `productId`, `itemname`, `category`, `quantity`, `rate`, `total`, `date`) VALUES
(1, 'Thavindu', 2, 'Duffel', 'Travelaccessories', 2, '8000.00', '13600.00', '2021-02-04 12:35:21'),
(2, 'Thavindu', 4, 'Travel', 'Travelaccessories', 1, '2500.00', '2125.00', '2021-02-04 13:49:24'),
(3, 'Thavindu', 4, 'Travel', 'Travelaccessories', 1, '2500.00', '2125.00', '2021-02-04 14:14:06'),
(4, 'Thavindu', 4, 'Travel', 'Travelaccessories', 1, '2500.00', '2125.00', '2021-02-04 14:27:43'),
(5, 'Thavindu', 4, 'Travel', 'Travelaccessories', 1, '2500.00', '2125.00', '2021-02-04 14:28:16'),
(6, 'Tolusha', 3, 'Microfiber', 'Travelaccessories', 5, '5000.00', '21250.00', '2021-02-14 13:08:15'),
(7, 'Tolusha', 3, 'Microfiber', 'Travelaccessories', 5, '5000.00', '21250.00', '2021-02-14 13:08:21'),
(8, 'Tolusha', 3, 'Microfiber', 'Travelaccessories', 5, '5000.00', '21250.00', '2021-02-14 13:08:38'),
(9, 'Tolusha', 1, 'Travel', 'Travelaccessories', 2, '500.00', '850.00', '2021-02-14 13:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `kavindu`
--

DROP TABLE IF EXISTS `kavindu`;
CREATE TABLE IF NOT EXISTS `kavindu` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kavinduacc`
--

DROP TABLE IF EXISTS `kavinduacc`;
CREATE TABLE IF NOT EXISTS `kavinduacc` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `productId` int(50) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `buyer` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'In Progress',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pirunabank`
--

DROP TABLE IF EXISTS `pirunabank`;
CREATE TABLE IF NOT EXISTS `pirunabank` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `taskId` int(10) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pirunabank`
--

INSERT INTO `pirunabank` (`id`, `taskId`, `total`, `date`) VALUES
(2, 2, '42.50', '2021-02-14 13:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `pirunatasks`
--

DROP TABLE IF EXISTS `pirunatasks`;
CREATE TABLE IF NOT EXISTS `pirunatasks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` int(10) NOT NULL,
  `productId` int(10) NOT NULL,
  `seller` varchar(100) NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(50,2) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `likes` int(100) NOT NULL DEFAULT '0',
  `category` enum('Shapewear','Travelaccessories','Healthyandbeautyproducts','Sleepwear','Smartwatches','HealthCare','SkinCare','HobbiesandCraft','LampsandShades','MobileAccessories','Petproducts','Finejewelry','all') NOT NULL DEFAULT 'all',
  `imagename` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `seller`, `likes`, `category`, `imagename`) VALUES
(1, 'Travel Bottle', 'Travel bottle 1Liter', '500.00', 'Isuru', 0, 'Travelaccessories', 'travelbottle.jpg'),
(2, 'Duffel Bag', 'This travel bag can carry up to 15kg ', '8000.00', 'Isuru', 0, 'Travelaccessories', 'duffiebag.jpg'),
(3, 'Microfiber Towel', 'Made of Microfiber-3 pallets', '5000.00', 'Isuru', 0, 'Travelaccessories', 'microfibertowel.jpg'),
(4, 'Travel Pillow', 'Hundai travel pillow', '2500.00', 'Isuru', 0, 'Travelaccessories', 'travelpillow.jpg'),
(5, 'Side Seamless Flannel Pajama', 'Made of cotton, Size-L', '800.00', 'Tolusha', 0, 'Sleepwear', 'sideseamlessflannelpajama.jpg'),
(6, 'Kids Pijama', 'Kids pijamas, Size-SM', '500.00', 'Tolusha', 0, 'Sleepwear', 'kidspijama.jpg'),
(7, 'Catessy Sticks', 'Only for kittens', '1000.00', 'Tolusha', 0, 'Petproducts', 'catessysticks.jpg'),
(8, 'Hemp Honey', 'Fertilized hemp honey 1Liter', '2500.00', 'Tolusha', 0, 'Shapewear', 'hemphoney.jpg'),
(9, 'Surgical Gloves', 'Best protection for Covid-19', '300.00', 'Thavindu', 0, 'HealthCare', 'surgicalgloves.jpg'),
(10, 'Sewing Table', 'Imported from America', '10000.00', 'Thavindu', 0, 'HobbiesandCraft', 'sewingtable.jpg'),
(11, 'Wall Lamp', 'Original FLUGBO wall lamp', '6000.00', 'Thavindu', 0, 'LampsandShades', 'flugbowalllamp.jpg'),
(12, 'Oxygenating Cream', 'For healing skin wounds', '6000.00', 'Thavindu', 0, 'SkinCare', 'oxygenatingcream.jpg'),
(13, 'Heavy Supplements', 'ZMA body supplements 5Kg', '12000.00', 'Thilina', 0, 'Healthyandbeautyproducts', 'zmasupplement.jpg'),
(14, 'D20 Smart Watch', 'Waterproof & more special features', '9000.00', 'Thilina', 0, 'Smartwatches', 'd20smartwatch.jpg'),
(15, 'Type-C USB Cable', 'Original Baseus Cafule Modal', '2000.00', 'Thilina', 0, 'MobileAccessories', 'baseuscafuletypectable.jpg'),
(16, 'Zero1 Bracelet', 'Made with Sterline Silver', '35000.00', 'Thilina', 0, 'Finejewelry', 'zero1bracelet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thavindu`
--

DROP TABLE IF EXISTS `thavindu`;
CREATE TABLE IF NOT EXISTS `thavindu` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thavinduacc`
--

DROP TABLE IF EXISTS `thavinduacc`;
CREATE TABLE IF NOT EXISTS `thavinduacc` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thavinduacc`
--

INSERT INTO `thavinduacc` (`id`, `buyer`, `productId`, `itemname`, `category`, `quantity`, `rate`, `total`, `date`) VALUES
(2, 'Isuru', 9, 'Surgical', 'HealthCare', 2, '300.00', '510.00', '2021-02-04 12:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `thilina`
--

DROP TABLE IF EXISTS `thilina`;
CREATE TABLE IF NOT EXISTS `thilina` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thilinaacc`
--

DROP TABLE IF EXISTS `thilinaacc`;
CREATE TABLE IF NOT EXISTS `thilinaacc` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thilinaacc`
--

INSERT INTO `thilinaacc` (`id`, `buyer`, `productId`, `itemname`, `category`, `quantity`, `rate`, `total`, `date`) VALUES
(3, 'Tolusha', 16, 'Zero1', 'Finejewelry', 1, '35000.00', '29750.00', '2021-02-04 13:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `tolusha`
--

DROP TABLE IF EXISTS `tolusha`;
CREATE TABLE IF NOT EXISTS `tolusha` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tolusha`
--

INSERT INTO `tolusha` (`id`, `seller`, `productId`, `itemname`, `category`, `quantity`, `rate`, `total`, `date`) VALUES
(3, 'Isuru', 1, 'Travel', 'Travelaccessories', 2, '500.00', '1000.00', '2021-02-14 13:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `tolushaacc`
--

DROP TABLE IF EXISTS `tolushaacc`;
CREATE TABLE IF NOT EXISTS `tolushaacc` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer` varchar(100) NOT NULL,
  `productId` int(10) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `rate` decimal(50,2) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `pid` int(50) NOT NULL,
  `buyer` varchar(50) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `amount` decimal(50,2) NOT NULL,
  `taxrate` decimal(50,2) NOT NULL,
  `tax` decimal(50,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `pid`, `buyer`, `seller`, `amount`, `taxrate`, `tax`, `date`) VALUES
(1, 1, 'Tolusha', 'Isuru', '1000.00', '0.15', '150.00', '2021-02-14 13:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`, `reg_date`, `admin`) VALUES
(1, 'ucsc', 'ucsc@ucsc.ucsc', 'ucsc', 'd32934b31349d77e70957e057b1bcd28', '2021-02-04 06:07:56', 1),
(11, 'Avishka Hettiarachchi', 'avishka@gmail.com', 'Avishka', '3290362a5b0a992e808810b06cac69be', '2021-02-04 12:16:46', 2),
(3, 'Piruna Hewamadduma', 'piruna@gmail.com', 'Piruna', '9b38f8b374fa455bef87c0fab5c72161', '2021-02-04 06:13:57', 2),
(4, 'Yasith Samaradivakara', 'yasith@gmail.com', 'Yasith', '98ebdd8ea4492c87b04e5004c9f7d877', '2021-02-04 06:14:32', 2),
(5, 'Harsha Abeywickrama', 'harsha@gmail.com', 'Harsha', '1ed898f606e45758aec56e8ed6213ce9', '2021-02-04 06:15:11', 2),
(6, 'Isuru Harischandra', 'isuru@gmail.com', 'Isuru', '031332fce0afa6cb6d3a88d5bf9cc68b', '2021-02-14 13:30:55', 0),
(7, 'Tolusha Harindi', 'tolusha@gmail.com', 'Tolusha', '7c830274919f144ab6e5d8de0fa25b5a', '2021-02-04 06:16:30', 0),
(8, 'Thavindu  Ushan', 'thavindu@gmail.com', 'Thavindu', 'ae96ec7f236356ad913a2f2b50f1690b', '2021-02-04 06:17:12', 0),
(10, 'Thilina Peduruhewa', 'thilina@gmail.com', 'Thilina', 'f2e925a27762084715b77373ddc813e6', '2021-02-04 06:19:35', 0),
(13, 'Bhanuji Malith', 'bhanuji@gmail.com', 'Bhanuji', 'b2de3fd75ae0a864a17a8e31d6c097f6', '2021-02-04 15:38:02', 2),
(14, 'Kavindu Galagedara', 'kavindu@gmail.com', 'Kavindu', '791c801108eec3d5d4697c8368369e74', '2021-02-04 15:38:48', 0),
(21, 'Hiru', 'hiru@gmail.com', 'Hiru', '5062916758adc525a482f0e6b60eca73', '2021-02-17 06:58:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `yasithbank`
--

DROP TABLE IF EXISTS `yasithbank`;
CREATE TABLE IF NOT EXISTS `yasithbank` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `taskId` int(10) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yasithbank`
--

INSERT INTO `yasithbank` (`id`, `taskId`, `total`, `date`) VALUES
(2, 2, '680.00', '2021-02-04 12:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `yasithtasks`
--

DROP TABLE IF EXISTS `yasithtasks`;
CREATE TABLE IF NOT EXISTS `yasithtasks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` int(10) NOT NULL,
  `productId` int(10) NOT NULL,
  `seller` varchar(100) NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `total` decimal(50,2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
