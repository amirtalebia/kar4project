-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 25, 2021 at 07:19 AM
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
-- Database: `lokomotive`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `get_admin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_admin` ()  BEGIN 
SELECT * FROM admin ;
END$$

DROP PROCEDURE IF EXISTS `get_id_passenger`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_id_passenger` (IN `n_code` VARCHAR(50))  BEGIN
select passenger_id from passenger WHERE national_code=n_code;
END$$

DROP PROCEDURE IF EXISTS `get_name_lokomotive`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_name_lokomotive` (IN `id` INT)  BEGIN
SELECT lokomotive_name FROM lokomotive WHERE lokomotive_id=id;
END$$

DROP PROCEDURE IF EXISTS `get_passenger`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_passenger` ()  BEGIN
SELECT * FROM passenger;
END$$

DROP PROCEDURE IF EXISTS `get_price`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_price` (IN `id` INT)  BEGIN
SELECT ticket_price FROM ticket WHERE ticket_id=id; 
END$$

DROP PROCEDURE IF EXISTS `get_ticket`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ticket` ()  BEGIN
	SELECT *  FROM ticket;
END$$

DROP PROCEDURE IF EXISTS `get_train_id`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_train_id` ()  BEGIN
SELECT Lokomotive_id FROM lokomotive;
END$$

DROP PROCEDURE IF EXISTS `INSERT_order`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_order` (IN `t_id` INT, IN `p_id` INT)  BEGIN
INSERT into order_ticekt VALUES (null,t_id,p_id);
END$$

DROP PROCEDURE IF EXISTS `insert_passenger`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_passenger` (IN `a` INT, IN `name1` VARCHAR(50), IN `La_Name` VARCHAR(50), IN `n_code` VARCHAR(10))  BEGIN
INSERT INTO `passenger` (`passenger_id`, `Name`, `L_name`, `national_code`, `Age`) VALUES (NULL, name1 , La_name, n_code, a);
END$$

DROP PROCEDURE IF EXISTS `INSERT_ticket`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_ticket` (IN `prc` FLOAT, IN `date_1` DATE, IN `org` VARCHAR(50), IN `des1` VARCHAR(50), IN `l_id` INT, IN `num` INT)  BEGIN
INSERT INTO ticket(ticket_id,ticket_price,ticket_Date, ticket_orgin, ticket_destination, lokomotive_id, quantity)VALUES (NULL,prc, date_1,org,des1, l_id, num);
END$$

DROP PROCEDURE IF EXISTS `insert_train`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_train` (IN `id` INT, IN `name` VARCHAR(50))  BEGIN
INSERT INTO lokomotive (Lokomotive_id,Lokomotive_name) VALUES (id,name);
END$$

DROP PROCEDURE IF EXISTS `national_code`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `national_code` ()  BEGIN
SELECT national_code FROM passenger;
END$$

DROP PROCEDURE IF EXISTS `ticket_pas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ticket_pas` (IN `nation_code` VARCHAR(50))  BEGIN 
SELECT  ticket.Lokomotive_id,ticket.ticket_id,ticket_price,ticket_Date,ticket_orgin,ticket_destination  FROM ticket INNER JOIN order_ticekt ON ticket.ticket_id=order_ticekt.ticket_id INNER JOIN passenger ON order_ticekt.passenger_id= passenger.passenger_id WHERE passenger.national_code=nation_code;
END$$

DROP PROCEDURE IF EXISTS `ticket_select`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ticket_select` (IN `org` VARCHAR(50), IN `de` VARCHAR(50), IN `da` DATE)  BEGIN
SELECT * FROM ticket WHERE ticket_orgin=org AND ticket_Date=da AND ticket_destination=de;
END$$

DROP PROCEDURE IF EXISTS `UPDATE_quantity`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_quantity` (IN `num` INT, IN `id` INT)  BEGIN
UPDATE ticket set quantity=quantity-num where ticket_id=id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_password` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `admin_user_name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`, `admin_user_name`) VALUES
(1, '123', 'ali-1370'),
(2, 'qqw', 'parham-11'),
(3, '665', 'asd-r');

-- --------------------------------------------------------

--
-- Table structure for table `lokomotive`
--

DROP TABLE IF EXISTS `lokomotive`;
CREATE TABLE IF NOT EXISTS `lokomotive` (
  `Lokomotive_id` int(11) NOT NULL AUTO_INCREMENT,
  `Lokomotive_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`Lokomotive_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `lokomotive`
--

INSERT INTO `lokomotive` (`Lokomotive_id`, `Lokomotive_name`) VALUES
(1, 'فدک'),
(2, 'سیمرغ'),
(3, 'سبز'),
(4, 'رجا'),
(5, 'پنج ستاره سبز'),
(6, 'پنج ستاره سیمرغ'),
(7, 'پنج ستاره فدک'),
(8, 'پنج ستاره رجا'),
(9, 'صدف'),
(10, 'Ú†Ù‡Ø§Ø± Ø³ØªØ§Ø±Ù‡ Ù†Ú¯ÛŒÙ†');

-- --------------------------------------------------------

--
-- Table structure for table `order_ticekt`
--

DROP TABLE IF EXISTS `order_ticekt`;
CREATE TABLE IF NOT EXISTS `order_ticekt` (
  `ORDER_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  PRIMARY KEY (`ORDER_id`),
  KEY `ticket_id` (`ticket_id`),
  KEY `passenger_id` (`passenger_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `order_ticekt`
--

INSERT INTO `order_ticekt` (`ORDER_id`, `ticket_id`, `passenger_id`) VALUES
(1, 1, 3),
(2, 2, 6),
(3, 2, 8),
(4, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
CREATE TABLE IF NOT EXISTS `passenger` (
  `passenger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) COLLATE utf8_persian_ci NOT NULL,
  `L_name` varchar(25) COLLATE utf8_persian_ci NOT NULL,
  `national_code` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `Age` int(4) NOT NULL,
  PRIMARY KEY (`passenger_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `Name`, `L_name`, `national_code`, `Age`) VALUES
(1, 'علی', 'علوی', '4380413799', 21),
(5, 'سجاد', 'رحمانی', '4999234333', 21),
(4, 'سجاد', 'رحمانی', '4356565659', 21),
(6, 'سجاد', 'رحمانی', '3325465433', 21),
(8, 'احمد', 'اکبری', '4390022111', 30),
(9, 'احسان', 'سورگی', '1234567890', 21);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_price` float NOT NULL,
  `ticket_Date` date NOT NULL,
  `ticket_orgin` varchar(25) COLLATE utf8_persian_ci NOT NULL,
  `ticket_destination` varchar(25) COLLATE utf8_persian_ci NOT NULL,
  `lokomotive_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `lokomotive_id` (`lokomotive_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_price`, `ticket_Date`, `ticket_orgin`, `ticket_destination`, `lokomotive_id`, `quantity`) VALUES
(1, 300000, '2021-08-18', 'تهران', 'مشهد', 1, 195),
(2, 350000, '2021-08-18', 'تهران', 'مشهد', 2, 300),
(3, 340000, '2021-08-18', 'تهران', 'مشهد', 3, 5),
(4, 600000, '2021-08-25', 'زنجان', 'تهران', 3, 248),
(6, 200000, '2021-08-26', 'تبریز', 'مشهد', 3, 499),
(8, 300000, '2021-08-30', 'تهران', 'مشهد', 3, 250),
(9, 300000, '2021-08-30', 'تهران', 'مشهد', 3, 250),
(10, 20000, '2021-08-26', 'تهران', 'زنجان', 4, 300),
(11, 200000, '2021-08-27', 'تهران', 'بیرجند', 6, 300);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
