-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2020 at 07:13 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dbinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fullname`, `username`, `email`, `password`, `address`, `create_at`, `update_at`) VALUES
(1, 'スンダル・マチャマシ', 'admin', 'sundar.machamasi@sysystem.co.jp', '$2y$12$QJBtyJlGwsfK6FfUIoDcQO/eUBi.efLn5mD1njry47EBEoXk5LS9e', '千葉県市川市伊勢宿1-7山辺ハイツ102', '2020-10-16 04:12:33', NULL),
(2, 'Shreeram Twanabasu', 'shreeram', 'twanabasu.shreeram@sysystem.co.jp', '$2y$12$b4Dl61w/rilzFaPfUAvs3.eMriKGChAi9gip4QqImQ2idY2xHS6r2', 'Chiba ken, Ichikawashi kantori 5-8 kakemama 103', '2020-10-16 04:14:33', NULL),
(3, 'Unimax Machamasi', 'unimaxmacha', 'unimaxmacha@gmail.com', '$2y$12$4wBDqPR6zWl86QkNzTCJQO.73F/4jJr/P7Lpw3bdhQWo.hAyDrEyW', 'Golmadi-6, Bhaktapur, Nepal', '2020-10-16 04:22:43', NULL),
(4, 'Akurur', 'akurur', 'testpass@gmail.com', '$2y$12$EEp.5dm15BfYrEmHCgu0ZOSSawVeClLTN8wZvaMGaLI6Hr.68oftW', 'test', '2020-10-16 13:37:48', NULL),
(5, 'スリラム・トナバス', 'twanabasu.shreeram', 'twanabasushree@hotmail.com', '$2y$12$1Se3lAFFIM6CjZVoUvT4VeXN4w9Bsn5DucgIEi6jY3eQ1BoHvxhaS', 'ネパール、バクタプール', '2020-10-16 13:39:33', NULL),
(6, '高田・文人', 'test', 'takada.fumito@yahoo.com', '$2y$12$e1zZ0zXM3nKsPodhwV7gKOPsuu4I/Zi2aCuQC6gsmdpzdrBCLhlqy', '佐賀県佐賀市欠真間11-2ハピネスハイム202', '2020-10-16 15:27:20', NULL),
(7, '佐々木', 'sasaki', 'sasaki@yahoo.com', '$2y$12$UdHEBIiEM.0PLipeb8JNPe603VF2SWMN3ttRL5obBViG/gSOsF8Vy', '東京九', '2020-10-16 16:08:37', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
