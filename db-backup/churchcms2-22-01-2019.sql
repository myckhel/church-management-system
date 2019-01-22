-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 10:26 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchcms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` enum('Mr','Mrs','Miss','Dr (Mrs)','Dr','Prof','Chief','Chief (Mrs)','Engr','Surveyor','HRH','Elder','Oba','Olori') COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('worker','senior pastor','pastor','elder','usher','member','chorister','technician','instrumentalist','deacon','deaconess','evangelist','minister','protocol','hod') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` enum('married','single') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wedding_anniversary` date NOT NULL DEFAULT '1990-02-02',
  `member_since` date NOT NULL DEFAULT '1990-02-02',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_status` enum('old','new') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'old',
  `relative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `branch_id`, `title`, `firstname`, `lastname`, `email`, `dob`, `phone`, `occupation`, `position`, `address`, `address2`, `state`, `city`, `country`, `postal`, `sex`, `marital_status`, `wedding_anniversary`, `member_since`, `photo`, `member_status`, `relative`, `created_at`, `updated_at`) VALUES
(3, '345', 'Mr', 'Oni', 'Aleogbin', 'iamblizzyy@gmail.ca', '1991-02-01', '08149090022', 'Doctor', 'senior pastor', 'Zion city estate, FUTA Rd, Akure, Nigeria', 'Zion city estate, FUTA Rd, Akure, Nigeria', 'Ondo', '', 'Nigeria', '', 'male', 'married', '1991-02-01', '1991-02-01', '1530864614.jpg', 'old', NULL, '2018-07-06 07:10:14', '2018-07-06 07:10:14'),
(4, '345', 'Mr', 'Oni', 'Gbenga', 'iamblizzyy@gmail.com', '1991-02-01', '8149090022', 'Doctor', 'senior pastor', 'Zion city estate, FUTA Rd, Akure, Nigeria', 'Zion city estate, FUTA Rd, Akure, Nigeria', 'Ondo', '', 'Nigeria', '', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"3\",\"relationship\":\"brother\"}]', '2018-07-06 07:11:18', '2018-07-06 07:11:18'),
(5, '1007', 'Mr', 'Adekunle', 'Alugbin', 'alugbin96@gmail.com', '1991-02-01', '08105507172', 'Doctor', 'senior pastor', 'No 6 remoye', 'No 6 remoye', 'Lagos', '', NULL, '', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-07-09 16:37:45', '2018-07-09 16:37:45'),
(6, '1009', 'Mrs', 'Aderonke', 'Ajiboye', 'ajiboyefavour31@gmail.com', '1991-02-01', '08101597010', 'Retired', 'usher', 'Ganikale court, Boladale', 'Oshodi Lagos', 'lagos state', '', 'NIgeria', '', 'female', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-07-09 17:58:51', '2018-07-09 17:58:51'),
(7, '1009', 'Dr', 'Leonard', 'Oshiyemi', 'loshiyemi@gmail.com', '1991-02-01', '08115789252', 'Engineer', 'pastor', '163, broad street, first floor, lagos', '123, badore, lagos', 'Lagos', '', 'NIgeria', '', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-07-09 18:15:25', '2018-07-09 18:15:25'),
(8, '1009', 'Dr', 'Jake', 'Jones', 'james@gmail.com', '1991-02-01', '08105507172', 'Doctor', 'pastor', '125 James Bond Road, Ikoyi', NULL, 'Lagos', '', 'NIgeria', '', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-07-09 18:20:49', '2018-07-09 18:20:49'),
(9, '1009', 'Dr (Mrs)', 'Adejoke', 'Ajiboye', 'jesutofunmi@gmail.com', '1991-02-01', '08167303168', 'Doctor', 'chorister', '4, broadway, lekki', NULL, 'lagos', '', NULL, '', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-07-09 18:26:04', '2018-07-09 18:26:04'),
(11, '487', 'Surveyor', 'Leonard', 'Oshiyemi', 'lloshiyemi@gmail.com', '1991-02-01', '08115789252', 'Doctor', 'senior pastor', '15 Teddy Road', '15 Teddy Road', 'MA', '', 'United States', '', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-07-19 19:58:39', '2018-07-19 19:58:39'),
(12, '487', 'Chief (Mrs)', 'Josephine', 'London', 'jlondon@ymail.com', '1991-02-01', '6672311625', 'Lecturer', 'chorister', '1145 Admiralty Way', NULL, 'Lagos State', '', 'NIGERIA', '', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"11\",\"relationship\":\"father\"}]', '2018-07-19 20:38:36', '2018-07-19 20:38:36'),
(13, '487', 'Olori', 'Amaka', 'Duke', 'amaka@gmail.com', '1991-02-01', '6672311625', 'Business Person', 'usher', '6009 Genesys Road', NULL, 'Oyo State', '', 'NIGERIA', '', 'female', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-07-19 20:57:49', '2018-07-19 20:57:49'),
(24, '500', 'Mr', 'Leonard', 'Oshiyemi', 'leonard.oshyemi@gmail.com', '1991-02-01', '6672311625', 'Doctor', 'senior pastor', '15 Teddy Road', '15 Teddy Road', 'MA', '', 'United States', '', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-06 05:38:40', '2018-08-06 05:38:40'),
(26, '500', 'Mrs', 'Joke', 'Oshiyemi', 'kingkyle3001@gmail.com', '1991-02-01', '6672311625', 'Doctor', 'senior pastor', '15 Teddy Road', '15 Teddy Road', 'MA', '', 'United States', '', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"24\",\"relationship\":\"husband\"}]', '2018-08-06 05:40:47', '2018-08-06 05:40:47'),
(28, '600', 'Mr', 'Leonard', 'Oshiyemi', 'loshiyemi@gmail.com2', '1991-02-01', '6672311625', 'Doctor', 'senior pastor', '15 Teddy Road', '15 Teddy Road', 'MA', '', 'United States', '', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-06 06:03:02', '2018-08-06 06:03:02'),
(29, '600', 'Mr', 'kyle', 'Oshiyemi', 'kingkyle300@gmail.com1', '1991-02-01', '6672311625', 'Doctor', 'senior pastor', '15 Teddy Road', '15 Teddy Road', 'MA', '', 'United States', '', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"28\",\"relationship\":\"father\"}]', '2018-08-06 06:04:36', '2018-08-06 06:04:36'),
(30, '600', 'Miss', 'Bibire', 'Oshiyemi', 'mrkilltheshow@gmail.com2', '1991-02-01', '6672311625', 'Doctor', 'senior pastor', '15 Teddy Road', '15 Teddy Road', 'MA', '', 'United States', '', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"29\",\"relationship\":\"brother\"}]', '2018-08-06 06:05:48', '2018-08-06 06:05:48'),
(31, '101225', 'Mr', 'Michael', 'Ishola', 'myckhel123@gmail.com', '1991-02-01', '08110000606', 'Doctor', 'worker', 'ikate', NULL, 'lagos', 'nigriea', 'nigriea', '101225', 'male', 'single', '1991-02-01', '1991-02-03', '1533747775.jpg', 'new', NULL, '2015-08-09 00:02:55', '2019-01-21 14:09:28'),
(32, '600', 'Chief (Mrs)', 'Alake', 'Oladipupo', 'kingkyle3003@gmail.com', '1991-02-01', '6672311625', 'Lecturer', 'deaconess', '15 Teddy Road', '15 Teddy Road', 'MA', 'Worcester', 'United States', '01603', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"28\",\"relationship\":\"wife\"}]', '2018-08-09 00:14:24', '2018-08-09 00:14:24'),
(33, '45555', 'Mr', 'michael', 'ishola', 'classipa.ng@gmail.com', '1991-02-01', '090793881188', 'Business Person', 'pastor', 'ajah 2', 'ajah 3', 'lagos', 'lagos', 'nigeria', '101225', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-13 16:12:48', '2018-08-13 16:12:48'),
(34, '45555', 'Mr', 'emeka', 'uche', 'jambguru101@gmail.com', '1991-02-01', '08067542131', 'Surveyor', 'pastor', 'ikeja 1', 'ikeja 2', 'lagos', 'lagos', 'nigeria', '101225', 'female', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-13 16:14:03', '2018-08-13 16:14:03'),
(35, '45555', 'Olori', 'Jane', 'Money-Jane', 'money-jane@hotmail.com', '1991-02-01', '07039344380', 'Retired', 'pastor', '13485 Jane Street', NULL, 'Manitoba', 'Winnipeg', 'Canada', '13132123', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-14 16:55:14', '2018-08-14 16:55:14'),
(36, '45555', 'Miss', 'Favour', 'Ajiboye', 'Ajiboye31@gmail.com', '1991-02-01', '08101597010', 'Professor', 'senior pastor', 'Ikeja', 'Lagos Island', 'Lagos', 'Lagos', 'Nigeria', '101245', 'female', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"33\",\"relationship\":\"sister\"}]', '2018-08-15 09:20:49', '2018-08-15 09:20:49'),
(37, '101142', 'Chief (Mrs)', 'John', 'James', 'john@email.com', '1991-02-01', '0814454565', 'Engineer', 'chorister', 'ajah', 'lekki', 'lagos', 'lagos', 'nigeria', '101225', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-15 12:16:11', '2018-08-15 12:16:11'),
(39, '101225', 'Mr', 'sarah', 'esther', 'esther@gmail.com', '1991-02-01', '08110000231', 'Business Person', 'worker', 'lekki', 'lagos', 'lagos', 'lagos', 'nigeria', '1001225', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-17 09:24:27', '2018-08-17 09:24:27'),
(40, '101225', 'Mr', 'james', 'kenth', 'james@yahoo.com', '1991-02-01', '08012454455', 'Doctor', 'senior pastor', 'ajah', 'ajah', 'lagos', 'lagos', 'nigeria', '101225', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-17 11:02:17', '2018-08-17 11:02:17'),
(41, '101142', 'Mrs', 'Doris', 'Chapman', 'chapman76@hotmail.com', '1991-02-01', '08103245131', 'Retired', 'evangelist', '1231 Government District', NULL, 'GB', 'Liverpool', 'United Kingdom', '132031', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"37\",\"relationship\":\"brother\"}]', '2018-08-17 14:03:39', '2018-08-17 14:03:39'),
(42, '45555', 'Mr', 'ezekiel', 'olamide', 'eze@gmail.com', '1991-02-01', '07055546480', 'Trader', 'instrumentalist', 'aja', 'ajah', 'lagos', 'lagos', 'Nigeria', NULL, 'female', 'married', '1991-02-01', '1991-02-01', '1535716592.png', 'old', NULL, '2018-08-31 10:56:32', '2018-08-31 10:56:32'),
(43, '45555', 'Dr', 'uj iuu', 'uiuugu', 'ags@email.com', '1991-02-01', '08146666054', 'Professor', 'technician', 'adrress', '1234', 'lagos', 'lagos', 'Nigeria', NULL, 'female', 'married', '1991-02-01', '1991-02-01', '1535716960.png', 'old', NULL, '2018-08-31 11:02:40', '2018-08-31 11:02:40'),
(44, '45555', 'Mr', 'kbnoiio', 'iioboiboi', 'iio@email.com', '1991-02-01', '05887777987', 'Doctor', 'senior pastor', 'ddd', NULL, 'ffef', 'fefe', 'Nigeria', 'eedf', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-31 13:56:59', '2018-08-31 13:56:59'),
(45, '45555', 'Mr', 'biobiob', 'ioboi', 'ii@ii.com', '1991-02-01', '08446666054', 'Doctor', 'senior pastor', 'vuu', 'u', 'ivv', 'uviu', 'Nigeria', 'uviuviuvu', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-08-31 13:59:23', '2018-08-31 13:59:23'),
(49, '45555', 'Mr', 'boboi', 'ib', 'iob@hmail.com', '1991-02-01', '08778899098', 'Doctor', 'senior pastor', 'uuiuiu', NULL, 'uiuigui', 'iui', 'United States', 'uiiui', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2018-08-31 14:11:58', '2018-08-31 14:11:58'),
(51, '45555', 'Mr', 'bobb', 'bu', 'bb@w.com', '1991-02-01', '088844545456', 'Professor', 'senior pastor', 'vvuvvu', 'u', 'vuvu', 'v', 'Nigeria', 'vuvu', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2018-08-31 14:22:19', '2018-08-31 14:22:19'),
(52, '45555', 'Chief', 'Jickson', 'Hannah', 'jj@gmail.com', '1991-02-01', '0815464584', 'Doctor', 'deacon', 'lekki phase 1', NULL, 'lagos', 'lagos', 'Nigeria', '101225', 'female', 'married', '1991-02-01', '1991-02-01', '1535736022.jpg', 'old', NULL, '2018-08-31 16:20:22', '2018-08-31 16:20:22'),
(53, '45555', 'Chief (Mrs)', 'john', 'okekachi', 'johnok@gmail.com', '1991-02-01', '07066454541', 'Pharmacist', 'instrumentalist', 'aah', NULL, 'lagos', 'lagos', 'Nigeria', '101225', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2016-09-06 12:41:18', '2018-09-06 12:41:18'),
(54, '101225', 'Mr', 'Leon', 'Leon', 'loshiyemi@hoffenheimtechnologies.com', '1991-02-01', '6672311625', 'Doctor', 'senior pastor', '15 Teddy Road', '15 Teddy Road', 'MA', 'Worcester', 'United States', '01603', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-09-20 16:55:03', '2018-09-20 16:55:03'),
(55, '422', 'Engr', 'Jeremy', 'Duke', 'jeremy@gmail.com', '1991-02-01', '9022222282', 'Doctor', 'senior pastor', '5675 ISLINGTON AVENUE', NULL, 'Ontario', 'Etobicoke', 'Canada', 'M5C2K2', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-09-21 10:51:38', '2018-09-21 10:51:38'),
(56, '422', 'Chief (Mrs)', 'Stephanie', 'Duke', 'stepduke@gmail.com', '1991-02-01', '90222222810', 'Doctor', 'pastor', '4575 ISLINGTON AVENUE', NULL, 'Ontario', 'Etobicoke', 'Canada', 'M5C2K2', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"55\",\"relationship\":\"husband\"}]', '2018-09-21 10:54:42', '2018-09-21 10:54:42'),
(57, 'LMS-101226', 'Mr', 'Member 1 fname', 'Member 1 lname', 'member1@gmail.com', '1991-02-01', '08110000060', 'Surveyor', 'pastor', 'Lekki Epe Express Way', NULL, 'Lagos', 'Lagos', 'Nigeria', NULL, 'male', 'married', '1991-02-01', '1991-02-01', '1537533510.png', 'old', NULL, '2018-09-21 11:38:30', '2018-09-21 11:38:30'),
(58, 'LMS-101226', 'Miss', 'Member 2 fname', 'Member 2 lname', 'member2@gmail.com', '1991-02-01', '08110000505', 'Pharmacist', 'member', 'Jakande Estate', NULL, 'Lagos', 'Lagos', 'Nigeria', NULL, 'female', 'single', '1991-02-01', '1991-02-01', '1537533647.png', 'old', NULL, '2018-09-21 11:40:47', '2018-09-21 11:40:47'),
(59, 'LMS-101225', 'Mr', 'michael', 'ishola', 'm@email.com', '1991-02-01', '08110000606', 'Doctor', 'senior pastor', 'ajah', NULL, 'lagos', 'lagos', 'Nigeria', '101225', 'male', 'married', '1991-02-01', '1991-02-01', '1540199773.png', 'old', NULL, '2018-10-22 08:16:13', '2018-10-22 08:16:13'),
(60, 'LMS-101225', 'Mr', 'junior', 'ishola', 'my@email.com', '1991-02-01', '08110000601', 'Doctor', 'senior pastor', 'ajah', NULL, 'lagos', 'lagos', 'Nigeria', '101225', 'female', 'married', '1991-02-01', '1991-02-01', '1540201081.jpeg', 'old', '[{\"id\":\"59\",\"relationship\":\"sister\"}]', '2018-10-22 08:38:01', '2018-10-22 08:38:01'),
(61, '45555', 'Mr', 'egerg', 'etget', 'myckhel1@hotmail.com', '1991-02-01', '46544465456', 'Doctor', 'senior pastor', 'ggui', 'g', 'yuygug', 'yuguyg', 'Guyana', 'yugguy', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-12-07 08:26:03', '2018-12-10 16:00:42'),
(62, '45555', 'Mr', 'ergr', 'reg', 'rg@f.h', '1991-02-01', '56575', 'Doctor', 'senior pastor', 'hthrth', NULL, 'trhh', 'rthhrt', 'Reunion', 'rthrth', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2018-12-07 08:28:03', '2018-12-07 08:28:03'),
(65, '45555', 'Mr', 'rr', 'rere', 'rr@f.c', '1991-02-01', '5444', 'Business Person', 'chorister', 'wgfr', NULL, 'reger', 'rgrg', 'Angola', 'ewfgwrg', 'female', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'new', '[{\"id\":\"53\",\"relationship\":\"relative\"}]', '2018-12-07 09:24:17', '2018-12-07 09:24:17'),
(66, '45555', 'Mr', 'gregre', 'ergreg', 'rr@jhf.com', '1991-02-01', '4884888', 'Pharmacist', 'instrumentalist', 'regeg', NULL, 'rgrge', 'regrg', 'Argentina', 'regreg', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', '[{\"id\":\"36\",\"relationship\":\"sister\"}]', '2018-12-07 09:25:26', '2018-12-07 09:25:26'),
(67, '45555', 'Mr', 'gfi', 'gugiugi', 'uyy@ljf.com', '1991-02-01', '0844060665654', 'Lecturer', 'technician', 'jboki egofg', NULL, 'yuf fuy', 'yuffyuf', 'United States', 'uy fifyugi', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2018-12-07 09:48:34', '2018-12-07 09:48:34'),
(68, '45555', 'Mr', 'ambode', 'alhaja', 'ambode@alhaja.com', '1991-02-01', '07056484654', 'Lecturer', 'elder', 'john d baptist', NULL, 'lagos', 'lagos', 'Nigeria', '101254', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'old', '[{\"id\":\"33\",\"relationship\":\"brother\"}]', '2018-12-10 07:34:53', '2018-12-10 07:34:53'),
(69, '45555', 'Mr', 'Fifty', 'Nifty', 'fifty@nifty.com', '1991-02-01', '09064845454', 'Trader', 'minister', 'john akerelere', NULL, 'lagos', 'lagos', 'Nigeria', '231544', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', '[{\"id\":\"33\",\"relationship\":\"father\"}]', '2018-12-10 07:51:24', '2018-12-10 07:51:24'),
(70, '45555', 'Mr', 'biguiob', 'ugiogbiog', 'b@j.com', '1991-02-01', '07056455489', 'Professor', 'worker', 'uigui h uig ug ioew', 'hioh ooi', 'lagos', 'lagos', 'Nigeria', '101224', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'new', '[{\"id\":\"33\",\"relationship\":\"father\"}]', '2018-12-12 10:18:34', '2018-12-12 10:18:34'),
(71, '45555', 'Mr', 'ohiohbio', 'iiighi', 'ddf@df.con', '1991-02-01', '07155464584', 'Pharmacist', 'instrumentalist', 'hiofop foepwhf e', NULL, 'lagos', 'lagos', 'Nigeria', '1012445', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'new', '[{\"id\":\"33\",\"relationship\":\"father\"}]', '2018-12-12 12:29:04', '2018-12-12 12:29:04'),
(72, '45555', 'Mr', 'mihi', 'ugguig', 'fe@df.com', '1991-02-01', '085455456655', 'Trader', 'worker', 'ujkh jhigiugoi r', NULL, 'lagos', 'lagos', 'Nigeria', '101112', 'male', 'married', '1991-02-01', '1991-02-01', '1540201081.jpeg', 'new', NULL, '2018-12-13 09:12:31', '2018-12-13 09:12:31'),
(73, '101225', 'Mr', 'Myckhel', 'Ishola', 'myckhel1@gmail.com', '1991-02-01', '08110000646', 'Pharmacist', 'technician', 'ajah', NULL, 'Lagos', 'Lagos', 'Nigeria', '101245', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', '[{\"id\":\"31\",\"relationship\":\"brother\"}]', '2018-12-20 12:35:07', '2018-12-20 12:35:07'),
(74, '101225', 'Mr', 'vuiuiguifiu', 'fgifi', 'uifui@igi.con', '1991-02-01', '00545554544', 'Lecturer', 'usher', 'biuguigu', NULL, 'LAga', 'lGOA', 'Niger', '01221124', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2018-12-20 12:36:38', '2018-12-20 12:36:38'),
(75, '101225', 'Mr', 'Janet', 'Akinjole', 'akinjole@gmail.com', '1991-02-01', '08074600651', 'Lecturer', 'member', 'ajah', NULL, 'lagos', 'lagos', 'Nigeria', '101235', 'male', 'married', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-16 13:54:07', '2019-01-16 13:54:07'),
(76, '101225', 'Mr', 'g4g', '45g4g', 'rge@rg.vom', '1991-02-01', '014122221', 'Business Person', 'member', 'd fbf', NULL, 'lagos', 'lagos', 'Nigeria', '5455', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-16 14:06:17', '2019-01-16 14:06:17'),
(77, '101225', 'Miss', 'efrf', 'ger', 'df@dwgfr.com', '1991-02-01', '054455554', 'Doctor', 'senior pastor', 'sfewf', NULL, 'lagos', 'lagos', 'Nigeria', '5338', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-16 14:17:14', '2019-01-16 14:17:14'),
(78, '101225', 'Mr', 'grihiu', 'ihiuihg', 's@df.com', '1991-02-01', '0111222454', 'Doctor', 'senior pastor', 'dfd', NULL, 'lagos', 'lagos', 'Nigeria', '101211', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-16 14:20:13', '2019-01-16 14:20:13'),
(79, '101225', 'Mr', 'dfrf', 'yuyfy', 'fg@ghr', '1991-02-01', '65765773', 'Doctor', 'senior pastor', 'trhrth', NULL, 'rthrh', 'rthh', 'Reunion', 'trhrh', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-16 14:57:34', '2019-01-16 14:57:34'),
(80, '101225', 'Mr', 'jytjyt', 'ytjj', 'tyjty@hj', '1991-02-01', '22545544', 'Doctor', 'senior pastor', 'yrjyj', NULL, 'ytjytj', 'ytjyj', 'Yemen', 'yjyj', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-16 15:02:40', '2019-01-16 15:02:40'),
(81, '101225', 'Mr', 'regerg', 'geg', 'erg@ghtr', '1991-02-01', '6475866768', 'Doctor', 'senior pastor', 'ytjhty', NULL, 'tyjty', 'tyjyt', 'Taiwan, Province of China', 'ytytj', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-16 15:57:47', '2019-01-16 15:57:47'),
(82, '101225', 'Mr', 'ewfwf', 'ewfwe', 'ewewf@grh', '1991-02-01', '45756878', 'Doctor', 'senior pastor', 'wrgerg', NULL, 'reg', 'regrg', 'Gabon', 'regre', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-16 16:00:05', '2019-01-16 16:00:05'),
(83, '101225', 'Mr', 'ewfewf', 'wef', 'wef@rh', '1991-02-01', '56765765', 'Doctor', 'senior pastor', 'fdg', NULL, 'reg', 'reg', 'Eritrea', 'regrg', 'male', 'single', '1991-02-01', '1991-02-01', '1547658220.jpg', 'new', NULL, '2019-01-16 16:03:39', '2019-01-16 16:03:40'),
(84, '101225', 'Mr', 'thtrh', 'rthrth', 'trh@th.com', '1991-02-01', '6767688', 'Doctor', 'senior pastor', 'jytjt', NULL, 'ytjj', 'ytjtyj', 'Yemen', 'jtytyj', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:06:41', '2019-01-17 11:06:41'),
(85, '101225', 'Mr', 'ergerg', 'regeg', 'erg@ghr.vrg', '1991-02-01', '675677886', 'Doctor', 'senior pastor', 'trhtrh', NULL, 'trh', 'trh', 'Haiti', 'rth', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:11:57', '2019-01-17 11:11:57'),
(86, '101225', 'Mr', 'ergerg', 'regrg', 'reg@fn.tr', '1991-02-01', '656757686', 'Doctor', 'senior pastor', 'thrth', NULL, 'rhh', 'rthrh', 'Reunion', 'trhrh', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:14:19', '2019-01-17 11:14:19'),
(87, '101225', 'Mr', 'rwgerg', 'erge', 'rgerg@j.trh', '1991-02-01', '77688787', 'Doctor', 'senior pastor', 'rthrth', NULL, 'trhrt', 'trhhrt', 'Reunion', 'rthrth', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2019-01-17 11:16:03', '2019-01-17 11:16:03'),
(88, '101225', 'Mr', 'referf', 'rfre', 'ref@tgt.h', '1991-02-01', '5676', 'Doctor', 'senior pastor', 'tfwefwef', NULL, 'trh', 'trhrth', 'Trinidad and Tobago', 'trhrt', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:23:39', '2019-01-17 11:23:39'),
(89, '101225', 'Mr', 'ergreg', 'erg', 'reg@gh.tr', '1991-02-01', '565777676', 'Doctor', 'senior pastor', 'trhrth', NULL, 'trh', 'trhtrh', 'Angola', 'rthrth', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'old', NULL, '2019-01-17 11:27:51', '2019-01-17 11:27:51'),
(90, '101225', 'Mr', 'thrth', 'trhrth', 'rth@hnt.rth', '1991-02-01', '65578', 'Doctor', 'senior pastor', 'trhrth', NULL, 'trhht', 'trhh', 'Trinidad and Tobago', 'rthrththr', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:31:44', '2019-01-17 11:31:44'),
(91, '101225', 'Mr', 'rgerg', 'regreg', 'eger@yjt.ytj', '1991-02-01', '7889999889', 'Doctor', 'senior pastor', 'rthyh', NULL, 'rthrth', 'rthrth', 'Reunion', 'rthrth', 'male', 'single', '1991-02-01', '1991-02-01', '1547728568.jpeg', 'new', NULL, '2019-01-17 11:36:06', '2019-01-17 11:36:08'),
(92, '101225', 'Mr', 'uykuyk', 'kuik', 'uik@k.uu', '1991-02-01', '87787997', 'Doctor', 'senior pastor', 'yuk', NULL, 'yukyk', 'uykyuk', 'Yemen', 'uykuyk', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:46:30', '2019-01-17 11:46:30'),
(93, '101225', 'Mr', 'trhtrh', 'trh', 'trh@t.j', '1991-02-01', '66787789', 'Doctor', 'senior pastor', 'trh', NULL, 'tyj', 'tyj', 'Yemen', 'tyj', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:47:49', '2019-01-17 11:47:49'),
(94, '101225', 'Mr', 'regerg', 'reg', 'reg@yj.tj', '1991-02-01', '65777667', 'Doctor', 'senior pastor', 'ytjtyj', NULL, 'tyj', 'tyjtj', 'Yemen', 'ytjtyj', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:49:45', '2019-01-17 11:49:45'),
(95, '101225', 'Mr', 'regerg', 'reg', 'reg@yj.tjer', '1991-02-01', '657776674', 'Doctor', 'senior pastor', 'ytjtyj', NULL, 'tyj', 'tyjtj', 'Yemen', 'ytjtyj', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:50:39', '2019-01-17 11:50:39'),
(96, '101225', 'Mr', 'regerg', 'reg', 'reg@yj.tjerr', '1991-02-01', '6577766743', 'Doctor', 'senior pastor', 'ytjtyj', NULL, 'tyj', 'tyjtj', 'Yemen', 'ytjtyj', 'male', 'single', '1991-02-01', '1991-02-01', 'profile.png', 'new', NULL, '2019-01-17 11:52:00', '2019-01-17 11:52:00'),
(97, '101225', 'Mr', 'regerg', 'reg', 'reg@yj.tjerre', '1991-02-01', '65777667436', 'Doctor', 'senior pastor', 'ytjtyj', NULL, 'tyj', 'tyjtj', 'Yemen', 'ytjtyj', 'male', 'single', '1991-02-01', '1991-02-01', '1547730093.jpg', 'new', NULL, '2019-01-17 12:01:32', '2019-01-17 12:01:33'),
(98, '101225', 'Mr', 'regerg', 'reg', 'reg@yj.tjerreg', '1991-02-01', '657776674364', 'Doctor', 'senior pastor', 'ytjtyj', NULL, 'tyj', 'tyjtj', 'Yemen', 'ytjtyj', 'male', 'single', '1991-02-01', '1991-02-01', '1547730857.jpg', 'new', NULL, '2019-01-17 12:14:16', '2019-01-17 12:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isadmin` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `branchname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchcode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` int(5) NOT NULL DEFAULT '158',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isadmin`, `branchname`, `branchcode`, `email`, `country`, `city`, `state`, `currency`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'false', 'JESUS PARISH', '345', 'iamblizzyy@gmail.comm', '', '', '', 158, 'Zion city estate, FUTA Rd, Akure, Nigeria', '$2y$10$rRrLHmPHFVdqXqNAxeFc8e5fbskwnkM2zzoAGpM1.x7CHoUAtZ5Wa', '6YYxkznWjf4wksP9WNrp4HNLgmquk150YmXeIvtNtdMibd6WmRAgKWSrxk5f', '2018-07-05 10:46:21', '2018-07-05 10:46:21'),
(2, 'true', 'JESUS COURT', '346', 'onigbenga@yahoo.ca', '', '', '', 158, 'Zion city estate, FUTA Rd, Akure, Nigeria', '$2y$10$6KHyGNA00jHwc/3evJ3X2eIuMUld4Na42oc9CzMpiNw9LXGZjzrVy', '7co7QzSyE0OW546uoRy5sLwxJKlBjyoh2uZuhm0jTe2CR485qjNNcc0QGbHS', '2018-07-05 12:26:50', '2018-07-05 12:26:50'),
(3, 'false', 'LIVING WATERS CHURCH OF GOD', '02', 'lekkibranch@livingwater.com', '', '', '', 158, 'Lekki, Lagos', '$2y$10$sZp0cxiqG.hjaWZ8HWnoUuX5ec82TYoy/0FHtiAmF9IlYoKisQRYW', 'GnY6NBSCSEX3krOKsMHBKVNuDAbBeMawHOxQyPVqLUSQX4w6PyNo0zm8dLP5', '2018-07-05 15:36:52', '2018-07-05 15:36:52'),
(4, 'false', 'LIVING WATERS CHURCH OF GOD, ABUJA', '03', 'lekkibranch2@livingwater.com', '', '', '', 158, 'Maitama, Abuja', '$2y$10$BdVt1NY5XpILbtgGHkz/6OLdenI67lUYaYZtG8vrlc4tE.YUe8QBC', NULL, '2018-07-05 15:44:31', '2018-07-05 15:44:31'),
(5, 'false', 'Wonder Branch', '1007', 'alugbin96@gmail.com', '', '', '', 158, 'No 6 remoye', '$2y$10$LZBNqBGTHEtC5Xp23FAQhe7kO480SuHPcIvRjF50e273RgYs9MiTS', NULL, '2018-07-09 16:33:54', '2018-07-09 16:33:54'),
(6, 'false', 'favours land', '1009', 'ajiboyefavour31@gmail.com', '', '', '', 158, 'No 6, owutedo street, ile epo alhaji bus stop, egbeda, lagos', '$2y$10$szZ1cHfybq8Kc5Xqa7mSBek.tkp9o7rHcT1nn7fjyJfFNjiM/oXhq', NULL, '2018-07-09 17:37:53', '2018-07-09 17:37:53'),
(7, 'false', 'NEW BRANCH', '487', 'hoffenhiemtech@gmail.com', '', '', '', 158, '15 Teddy Road', '$2y$10$0zMVXPv3ZX1etxJiyVs68eoCCF/AFd6oF1Ha6A0LkpIsbWtavF8b6', 'Ah4FsHxxWujJ9sHHCRgCNm2qYc8UCXzYZEeOdRwvtCBoa0ikSVAz6AVW00id', '2018-07-19 19:48:38', '2018-07-19 19:48:38'),
(11, 'false', 'HOUSE OF GOLIATH', '500', 'leonard.oshyemi@gmail.com', '', '', '', 158, '57 Clifton Road', '$2y$10$tdZlDDHQpyBjlb/Y8C11UuBgKxwzpsY1CwSepdZH3A9ZFFA70xZY.', 'Cqa5cOxiIb8u4lF9U17FQN1iJ2EJcM7anUmJ7nvkggkvgKnD0Ph9AW2B4Raj', '2018-08-06 05:36:41', '2018-08-06 05:36:41'),
(12, 'false', 'House of Solomon', '600', 'mrkilltheshow@gmail.com', '', '', '', 158, '15 Teddy Road', '$2y$10$uIxdVc82a8kyHUqefmP9..8SeRHwDYAiY.NPN/qs0QftmGtbSrMJS', 'LT03psjzo9Az3XGk60hoOvMxkWxcVdigg2KhLughIFwqdvNCURH8ZgmQuXu4', '2018-08-06 05:51:17', '2018-08-06 05:51:17'),
(13, 'true', 'Ace', '101225', 'myckhel1@hotmail.com', '', '', '', 158, 'eko akete', '$2y$10$f4zR.QDOPnBvv6ySwi.94.5rISeD6DhHWI0yFNk1FZDb1rveMPM4K', 'd9EskJ3M8L4uAnbeLamCm5lI1M1xE9ziSp2SYOz8QidkmjAlqFc2vfqVEnaZ', '2018-08-06 22:20:01', '2018-08-06 22:20:01'),
(14, 'false', 'New Goliath Church of God', '700', 'goliathchurch@gmail.com', '', '', '', 158, '123 Ishola-Sanni Avenue, Lagos, Nigeria', '$2y$10$GaTcmX9IrrzKHuJlrfV7luoEOVoh1n2XDf250j1BBymuH.kVJ2WVC', '5EThP5ZEMxDIgWaq4sPVgfVU2lZvgLJosqIy4stMOnxMAVtLxDSfxBpuq3j8', '2018-08-09 16:43:11', '2018-08-09 16:43:11'),
(23, 'false', 'Branch 2', '101142', 'myckhel123@gmail.com', '', '', '', 158, 'ajah branch', '$2y$10$BRdn9sT7cMi3cm0mGTb9auOtjvBep7kyDfvP5VXklwvze5p1jk4lK', 'yOov3aKd3BRywsMtGUBN0ijnh7Cm2hg9HJI8lG12k6Biu9lwSWqx1un8C1Nk', '2018-08-13 15:36:22', '2018-08-13 15:36:22'),
(24, 'false', 'Branch 3', '45555', 'myckhel1@gmail.com', '', '', '', 158, 'ajah', '$2y$10$0ofyfMHM8rErB9tFrvqXZ.M9RQ.6WAVLLh6g1NmpUepZMq1Zn3/52', '1Bl2xecQdb2ZN18Iv8IwUz9cg6g2EX7iojnJSjs0ZF0u4p1301kTAzCTWHkl', '2018-08-13 16:09:59', '2018-08-13 16:09:59'),
(25, 'false', 'Branch Fourteen', '14', 'branch14@gmail.com', '', '', '', 158, '142 Branch 14 Road, Lekki Ajah Lagos', '$2y$10$fPp8ge09ZcCtXVoXkOyACODNLPtA1T2ZN0tq.pwQrd1qy74KX8M2e', NULL, '2018-08-14 18:03:17', '2018-08-14 18:03:17'),
(27, 'false', 'ds sf', 'ef ewe', 'myckhel1122@hotmail.com', 'nigeria', 'dsfdsfdsf', 'dh', 158, 'hd d', '$2y$10$qtijld5wjqffRW111.OO9.8OOzX7RV5I/m2BzYVXIqH6dNlKHGxgq', NULL, '2018-09-14 17:19:07', '2018-09-14 17:19:07'),
(28, 'false', 'new', '120339', 'gmai@gmail.com', 'nigeria', 'lagos', 'lagos', 158, 'ajah', '$2y$10$2kt/zGE2BRCj..CP7I.j6.ZwUUopMc/nkiC/7TkMfIqEzzFusebrK', NULL, '2018-09-17 10:15:51', '2018-09-17 10:15:51'),
(29, 'false', 'jjd', '135464', '6jd@gmail.com', 'United States', 'lagos', 'lagos', 62, 'ajah', '$2y$10$C8XvBXv5MiDGvRPbJppCfeTRsW3zgnqaGdrSlEYlre2HPut.Fd1I2', NULL, '2018-09-17 10:17:50', '2018-09-17 10:17:50'),
(30, 'false', 'aaaa', 'aaar', 'aaa@gmail.com', 'United States', 'ikeja', 'Lagos', 62, 'ajsh', '$2y$10$zv5jpJvegb8ZSMjbTYeAF.MU3U6PweBvBh.9XHYtHQSjtaRkwzfRa', NULL, '2018-09-18 06:54:14', '2018-09-18 06:54:14'),
(31, 'false', 'bbb', 'bbbb', 'mac@gemail.com', 'Spain', 'ikeja', 'Lagos', 152, 'ajah', '$2y$10$9PynqPlOnhqZtF.d9pyw5uiBd71eWABuTqe.zOzhGVPUdIBTenBhG', NULL, '2018-09-18 06:56:29', '2018-09-18 06:56:29'),
(32, 'true', 'Demo Head Branch', 'LMS-101225', 'demoadmin@gmail.com', 'nigeria', 'Lagos', 'Lagos', 158, 'City Of Praise Plaza', '$2y$10$U89BtOB00ogdCMUjr2Qa.OA4Xh.dRTwX8K2N4LpRhv17g7vnYQr3S', 'wb0vbicxrScdEXoe3aSKIIQmuXOXo5bTaBQPtJ2ptEeNcSElDGCQL2QRmMey', '2018-09-21 09:56:50', '2018-09-21 09:56:50'),
(33, 'false', 'Demo Branch', 'LMS-101226', 'demo@gmail.com', 'nigeria', 'Lagos', 'Lagos', 158, 'Marshy Hill Estate', '$2y$10$G3eR.wzFmLo4kQ6hDFeGM.6EugrlozsTV6KEl3DIgeNs18g/hObA2', 'of13w7ZGQI9taIaPXCqzTe96C2oYOqI7IpKjQmKGIrqTR20AdQyIUAIVPQMW', '2018-09-21 09:57:49', '2018-09-21 09:57:49'),
(34, 'false', 'HOUSE OF ESTHER', '422', 'houseofesther@gmail.com', 'Canada', 'TORONTO', 'Ontario', 38, '15 Teddy Road', '$2y$10$h4X5xEXgXE.yyh.I7ppvmuOx3a4yrbitIUqfcd1p6wyGdak3ukovy', 'c5PC53nSPmwhqjlFOkvgrOqZ6DbjL8rEuYoXbKEdCZy6R7KHgBIkZv0iet3L', '2018-09-21 10:46:25', '2018-09-21 10:46:25'),
(35, 'false', 'error', '120 256', 'm@error.com', 'nigeria', 'lagos', 'lagos', 158, 'ajah', '$2y$10$iY/umg06Yqjr.qtq5y4Kiueb4EIJoCOAKJFCQiXyHrarbHVCDT1MG', 'DaOE1Rd2VVHpoUG04mj5LF5Vx5Js7ilLOe8pi6bohEXbwEutbFdxKSDIxqgL', '2018-10-22 09:20:55', '2018-10-22 09:20:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`),
  ADD KEY `branch_id_index` (`branch_id`);
ALTER TABLE `members` ADD FULLTEXT KEY `FullText` (`firstname`,`lastname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `branchcode` (`branchcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `users` (`branchcode`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
