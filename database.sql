-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 06, 2016 at 04:07 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dongdnje_hellobyte`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `nationality` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employeee_code_unique` (`code`),
  UNIQUE KEY `employeee_mail_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `code`, `name`, `birthday`, `address`, `email`, `photo`, `sex`, `telephone`, `start_date`, `nationality`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '134333', 'sasdasd', '2015-08-05', 'sssssss', 'tncdt2111k48@gmail.com', '', 'female', '0988427099', '2015-08-13', 'vn', '2015-08-12 11:26:24', '2015-08-13 15:57:31', NULL),
(5, 'ms0001', 'Dong A', '2015-08-06', ' Permanent Address', 'ssss@gmail.com', '', 'male', '', NULL, 'vn', '2015-08-16 07:43:24', '2015-08-16 07:43:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_degree`
--

CREATE TABLE IF NOT EXISTS `employee_degree` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) DEFAULT NULL,
  `degree` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employee_degree`
--

INSERT INTO `employee_degree` (`id`, `employee_id`, `degree`, `school`, `year`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 3, '1', '1', 2015, '2015-07-21 22:03:26', '2015-07-21 22:03:26', NULL),
(5, 3, '2', '2', 2016, '2015-07-21 22:03:26', '2015-07-21 22:03:26', NULL),
(6, 2, 'zend c2', 'Zend 2', 2015, '2015-07-22 09:08:16', '2015-07-22 09:08:16', NULL),
(10, 4, 'dddd', 'ddd', 2015, '2015-08-13 15:57:31', '2015-08-13 15:57:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_07_15_175115_create_employee_table', 2),
('2015_07_15_175115_create_employee_degree_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `confirmation_code`, `confirmed`, `admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 'admin', 'tncdt2k48@gmail.com', '$2y$10$VmMTHgH8p.vYJiVQ3cmVn.oUQxuIehNrh8c7wr57FAz3nIKwzuxYu', '', 1, 1, 'q9jPmvqQbn4ROU6gmXCxOt0ssUScfO5EH2DSBnIrqWQraT9yKU9mS1Tt9yit', '2015-07-13 21:13:30', '2015-12-02 09:29:15', NULL),
(5, 'Employee', 'user11', 'u1@gmail.com', '$2y$10$Y86d66qx1GA9MGUEMKz1gejbgWLT46/5PcF0aNV5N.JSYo4kY/jm2', '6zPGdMsh9EQJwqEVIunRTC1oturcSby3', 1, 2, 'xAWR7sx7JUUchFcYnFbGogdLAyBXfZEcEgzIoSHWJ9mSLspkyy5Qfam4T3C6', '2015-07-19 20:25:43', '2015-07-22 09:10:25', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
