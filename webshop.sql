-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2015 at 11:22 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE IF NOT EXISTS `bloggers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bloggers`
--

INSERT INTO `bloggers` (`id`, `username`, `password`) VALUES
(1, 'BlogUser', '1234'),
(2, 'wout', '$2y$10$PL.D6CmN2qKMHy4i9sqI1.l6XtSUnY1R81VX9Q3TcY6CwrcIApC0y');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `visitor_name` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_post` (`post_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `content`, `visitor_name`, `date_created`) VALUES
(1, 18, 'test', 'w00t', '2015-05-25 22:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `street`, `house_number`, `zip`, `city`) VALUES
(1, 'wout', '', '', '', ''),
(2, 'asdkfhj', 'dsakfhj', '', 'kdjh', 'dskf'),
(3, 'asdkfhj', 'dsakfhj', '', 'kdjh', 'dskf'),
(4, 'ersfgsdfgsdg', 'sdfg', 'dsfg', 'dsfg', 'dsfg'),
(5, 'Wout', 'Luttenbergweg', '8', '1234aa', 'Amsterdam'),
(6, 'Wout', 'Luttenbergweg', '8', '1234aa', 'Amsterdam'),
(7, 'sgdfg', 'sdfg', '', '', ''),
(8, 'W00t', 'teest', '4', '1234aa', 'groningen'),
(9, 'sdfgsdfgsdf', '', '', '', ''),
(10, 'sdfgsdfg', '', '', '', ''),
(11, 'sdfgsdfg', '', '', '', ''),
(12, 'asdfadsf', '', '', '', ''),
(13, 'Wout', '', '', '', ''),
(14, 'wout', '', '', '', ''),
(15, 'wout', '', '', '', ''),
(16, 'Wout', '', '', '', ''),
(17, 'Wout', 'dkhsdfk', 'lldkfg', 'sddfgkh', 'dfkjhsgdf');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `date_created`) VALUES
(1, 2, 1, '2015-05-26 16:05:07'),
(2, 2, 1, '2015-05-26 16:05:17'),
(3, 2, 1, '2015-05-26 16:05:43'),
(4, 4, 1, '2015-05-26 17:05:58'),
(5, 3, 1, '2015-05-26 17:05:07'),
(6, 2, 1, '2015-05-26 17:05:00'),
(7, 2, 1, '2015-05-27 10:05:59'),
(8, 2, 1, '2015-05-27 13:05:13'),
(9, 2, 1, '2015-05-27 14:05:24'),
(10, 2, 1, '2015-05-27 14:05:52'),
(11, 2, 1, '2015-05-27 14:05:50'),
(12, 19, 1, '2015-05-29 16:05:40'),
(13, 19, 1, '2015-05-29 17:05:07'),
(14, 19, 1, '2015-05-29 18:05:18'),
(15, 20, 1, '2015-06-01 09:06:48'),
(16, 20, 1, '2015-06-01 10:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogger_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` blob NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_post_blogger` (`blogger_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `blogger_id`, `title`, `content`, `date_created`, `date_edited`) VALUES
(1, 1, 'First Post', 0x4469742069732065656e206e696574207a6f206c616e67206265726963687421, '2015-05-20 11:05:43', NULL),
(4, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 11:05:44', NULL),
(5, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 11:05:03', NULL),
(6, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 11:05:53', NULL),
(7, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 11:05:15', NULL),
(8, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 11:05:00', NULL),
(10, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 13:05:45', NULL),
(11, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 13:05:07', NULL),
(12, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 13:05:40', NULL),
(13, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 13:05:03', NULL),
(14, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 13:05:50', NULL),
(15, 1, 'First Postsgthb', 0x4469742069732065656e206e696574207a6f206c616e672062657269636874737468627372677421, '2015-05-20 14:05:25', NULL),
(16, 2, 'dgsdfg', 0x736466677364666773646667, '2015-05-25 21:05:15', NULL),
(17, 2, 'dgsdfg', 0x736466677364666773646667, '2015-05-25 21:05:26', NULL),
(18, 2, 'sdfgsdfgfds', 0x64736673646667647366, '2015-05-25 22:05:13', NULL),
(19, 2, 'Test', 0x6d6f69, '2015-05-25 22:05:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productbrands`
--

CREATE TABLE IF NOT EXISTS `productbrands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE IF NOT EXISTS `productcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `productcategoryname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `color` varchar(11) NOT NULL,
  `description` varchar(2083) NOT NULL,
  `imageurl` varchar(2083) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `color`, `description`, `imageurl`) VALUES
(2, 'Small boat', 100, 15, 'Red', 'Nice red boat.', 'product_2.1.png'),
(16, 'Mooie dinges', 10, 100, 'red', 'test', 'contact.png'),
(18, 'sd', 123, 0, '', 'sdfg', 'van-aarle-maatwerk-tuinhuisje-tuinschuurtje-met-zadeldak.jpg'),
(19, 'Fantastische boxershort', 10, 100, 'Zwart / ant', 'Voor tijdens die zakenbespreking onder het driedelig pak en voor de brakke zondag onder de badjas: met de brede elastieken band, in combinatie met het tijdloze antraciet is de boxershort van Mannenrantsoen geschikt voor elke gelegenheid en voor elke man.', 'boxer_def.jpg'),
(20, 'Tuinhuisje', 100, 50, 'Beige', 'Fantastiche kwaliteit', 'van-aarle-maatwerk-tuinhuisje-tuinschuurtje-met-zadeldak.jpg'),
(21, 'Tuinhuisje', 100, 2, 'Bruin', 'Mooi!', 'van-aarle-maatwerk-tuinhuisje-tuinschuurtje-met-zadeldak.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`blogger_id`) REFERENCES `bloggers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
