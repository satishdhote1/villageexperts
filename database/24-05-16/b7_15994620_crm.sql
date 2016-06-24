-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql207.byethost7.com
-- Generation Time: May 24, 2016 at 11:34 AM
-- Server version: 5.6.29-76.2
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b7_15994620_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `connect`
--

CREATE TABLE IF NOT EXISTS `connect` (
  `connect_id` int(11) NOT NULL AUTO_INCREMENT,
  `sr_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  PRIMARY KEY (`connect_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE IF NOT EXISTS `expertise` (
  `expertiseID` int(1) DEFAULT NULL,
  `expertise` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`expertiseID`, `expertise`) VALUES
(1, 'Computers'),
(2, 'Engineering'),
(3, 'Legal'),
(4, 'Medical'),
(5, 'Coach'),
(6, 'Tutor');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(20) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_by_id` int(20) NOT NULL,
  `created_by_user_role` char(2) DEFAULT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `description`, `image`, `created_by_id`, `created_by_user_role`, `created_date`) VALUES
(4, 'g1', 'wwwwwwwww', '4_a.jpg', 1, 'SP', '2016-05-03'),
(6, 'amit kumar', 'ok', '6_IMG_20140710_101328409.jpg', 1, 'SP', '2016-05-05'),
(7, 'rtr', 'gfg  ', 'IMG_0006.jpg', 48, 'SR', '2016-05-06'),
(8, 'ewewewew', 'fdfdfdfd  ', 'IMG_0007.jpg', 48, 'SR', '2016-05-06'),
(9, 'eagal', 'tiger  ', 'IMG_0012.jpg', 48, 'SR', '2016-05-06'),
(10, 'hfgh', 'gfgfg  ', 'IMG_0028.jpg', 48, 'SR', '2016-05-06'),
(11, 'yyyy', 'hhhhhh  ', 'IMG_0030.jpg', 48, 'SR', '2016-05-06'),
(14, 'sam-Group', 'this is sam group ', '1463687867MotorCycle.jpg', 48, 'SR', '2016-05-20'),
(15, 'satish-Group', ' this is satish group', '', 48, 'SR', '2016-05-20'),
(16, 'tesrt', ' sfgfgsdfgsd', '', 48, 'SR', '2016-05-20'),
(17, 'Flower Club', 'hfgjyhxdvh ', '1463694999IMG_0006.jpg', 48, 'SR', '2016-05-20'),
(18, 'Coconut Tree', 'desc ', '1463713342IMG_0028.jpg', 48, 'SR', '2016-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `group_connect`
--

CREATE TABLE IF NOT EXISTS `group_connect` (
  `group_connect_id` int(11) NOT NULL AUTO_INCREMENT,
  `initiator_sr_sp_id` int(11) NOT NULL,
  `group_member_id` int(11) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  PRIMARY KEY (`group_connect_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE IF NOT EXISTS `group_member` (
  `gm_id` int(20) NOT NULL AUTO_INCREMENT,
  `gm_name` varchar(100) NOT NULL,
  `gm_phone` int(20) NOT NULL,
  `gm_email` varchar(100) NOT NULL,
  `gm_password` varchar(200) NOT NULL,
  `gm_image` varchar(100) NOT NULL,
  `gm_group_id` int(20) NOT NULL,
  `gm_logged_in` char(1) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'N' COMMENT 'Registration Completed through Mail?',
  PRIMARY KEY (`gm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `group_member`
--

INSERT INTO `group_member` (`gm_id`, `gm_name`, `gm_phone`, `gm_email`, `gm_password`, `gm_image`, `gm_group_id`, `gm_logged_in`, `status`) VALUES
(2, 'amit', 3453, 'subhasish.chakraborty@brainware-india.com', '0945fc9611f55fd0e183fb8b044f1afe', 'GMimages1.jpg', 7, 'N', 'Y'),
(23, 'bcvbcvb', 214432454, 'admin@admin.com', '0945fc9611f55fd0e183fb8b044f1afe', 'GMimages2.jpg', 7, 'N', 'Y'),
(24, 'subhasish chakrabortaa', 42343243, 'amitkumard2@gmail.com', '0945fc9611f55fd0e183fb8b044f1afe', 'GMimages3.jpg', 7, 'Y', 'Y'),
(25, 'amit', 214432454, 'amnil@gmail.com', '0945fc9611f55fd0e183fb8b044f1afe', 'GMimages4.jpg', 7, 'Y', 'Y'),
(26, 'amit', 214432454, 'amnil@gmail.com', '0945fc9611f55fd0e183fb8b044f1afe', 'GMimages5.jpg', 7, 'Y', 'Y'),
(27, 'sarat', 232323232, 'qw@rdsr.com', '0945fc9611f55fd0e183fb8b044f1afe', '27_1.jpg', 6, 'Y', 'Y'),
(28, 'wwwww', 434343444, 'xx@xx.com', '0945fc9611f55fd0e183fb8b044f1afe', 'GMimages6.jpg', 7, 'N', 'Y'),
(29, 'sumit', 2147483647, 'aa@aa.com', '0945fc9611f55fd0e183fb8b044f1afe', '29_IMG_0010.jpg', 11, '', 'Y'),
(30, 'sam', 1234567890, 'sam@gmail.com', '', '1463690464MotorCycle', 7, 'N', 'Y'),
(42, 'xcv', 0, 'satishdhote@gmail.com', '', '1463697414IMG_0030.jpg', 17, 'N', 'Y'),
(41, 'test', 1245685, 'satishdhote@gmail.com', '', '1463697036IMG_0030.jpg', 17, 'N', 'Y'),
(40, 'Morning Club', 1234567890, 'sam@gmail.com', '', '1463695590IMG_0031.jpg', 17, 'N', 'Y'),
(39, 'sam', 1334567890, 'sam@gmail.com', '', '1463693672MotorCycle.jpg', 7, 'N', 'Y'),
(43, 'xdsgv', 0, 'satishdhote@gmail.com', '', '1463697518IMG_0030.jpg', 17, 'N', 'Y'),
(44, 'SD', 123456789, 'satishdhote@gmail.com', '', '1463713804IMG_0030.jpg', 18, 'N', 'Y'),
(45, 'sambaran', 2147483647, 'dassamtest2@gmail.com', '', '1463754969IMG_0031.jpg', 0, 'N', 'Y'),
(46, 'sambaran das', 1234567890, 'dassamtest@gmail.com', '', '1463756299IMG_0007.jpg', 14, 'Y', 'N'),
(47, 'sambaran Das', 123456789, 'dassamtest2@gmail.com', '', '1463756377IMG_0006.jpg', 14, 'N', 'Y'),
(48, 'test', 123467890, 'dassamtest2@gmail.com', '', '1463760132IMG_0031.jpg', 14, 'N', 'Y'),
(49, 'testttt', 1234567890, 'dassamtest2@gmail.com', '', '1463763710IMG_0028.jpg', 17, 'N', 'N'),
(50, 'eagal test', 1234567890, 'dassamtest2@gmail.com', '', '1463769830IMG_0012.jpg', 9, 'Y', 'Y'),
(51, 'satish', 2147483647, 'dassamtest2@gmail.com', '202cb962ac59075b964b07152d234b70', 'satish1463939268.jpg', 15, 'N', 'Y'),
(53, 'Satish-Test', 123456678, 'dassamtest2@gmail.com', '202cb962ac59075b964b07152d234b70', 'Satish-Test53.jpg', 15, 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `LanguageID` varchar(10) DEFAULT NULL,
  `Languages` varchar(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`LanguageID`, `Languages`) VALUES
('1', 'English'),
('2', 'Spanish'),
('3', 'French'),
('4', 'Greek'),
('5', 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE IF NOT EXISTS `service_provider` (
  `sp_id` int(20) NOT NULL AUTO_INCREMENT,
  `sp_name` varchar(20) NOT NULL,
  `sp_sex` varchar(20) NOT NULL,
  `sp_address` text NOT NULL,
  `sp_city` varchar(100) NOT NULL,
  `sp_pincode` varchar(20) NOT NULL,
  `sp_country` varchar(20) NOT NULL,
  `sp_phone` varchar(20) NOT NULL,
  `sp_email` varchar(100) NOT NULL,
  `sp_password` varchar(100) NOT NULL,
  `sp_image` varchar(100) NOT NULL,
  `sp_specialisation_id` int(20) NOT NULL,
  `sp_sub_specialisation_id` int(20) NOT NULL,
  `sp_year_of_experience` int(20) NOT NULL,
  `sp_rate_per_hour` int(20) NOT NULL,
  `sp_time_zone` varchar(200) NOT NULL,
  `sp_language_id` int(20) NOT NULL,
  `sp_logged_in` char(1) NOT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`sp_id`, `sp_name`, `sp_sex`, `sp_address`, `sp_city`, `sp_pincode`, `sp_country`, `sp_phone`, `sp_email`, `sp_password`, `sp_image`, `sp_specialisation_id`, `sp_sub_specialisation_id`, `sp_year_of_experience`, `sp_rate_per_hour`, `sp_time_zone`, `sp_language_id`, `sp_logged_in`) VALUES
(1, 'subhasish chakrabort', 'M', 'ok', 'kolkata', '6428', '', '9804261695', 'subhasish.chakrabort@gmail.com', '0945fc9611f55fd0e183fb8b044f1afe', '1_aa.jpg', 2, 2, 7, 56, 'fh', 2, 'Y'),
(2, 'gfdhf', 'M', 'jkhkjh', 'india', '789789', 'india', '98789787', 'cd@cd.com', '0945fc9611f55fd0e183fb8b044f1afe', '2_5555.jpg', 2, 2, 4, 56, 'kolkata', 2, ''),
(3, 'ewr', 'M', 'hgk', 'bh', '8767', 'ghhg', '87687', 'hjghj', '0945fc9611f55fd0e183fb8b044f1afe', '3_5555.jpg', 2, 2, 2, 767, 'hhgh', 2, ''),
(4, 'gs', 'M', 'sdgs', 'sdgs', 'sdgs', 'sdg', 'sdg', 'sdg', '202cb962ac59075b964b07152d234b70', '', 1, 1, 0, 0, 'subhasish.chakraborty@gmail.com', 1, ''),
(5, 'gs', 'M', 'sdgs', 'sdgs', 'sdgs', 'sdg', 'sdg', 'sdg', '202cb962ac59075b964b07152d234b70', '', 1, 1, 0, 0, 'subhasish.chakraborty@gmail.com', 1, ''),
(6, 'gs', 'M', 'sdgs', 'sdgs', 'sdgs', 'sdg', 'sdg', 'sam@gmail.com', '202cb962ac59075b964b07152d234b70', '', 1, 1, 0, 0, 'subhasish.chakraborty@gmail.com', 1, 'Y'),
(7, 'ad', 'M', 'asd', 'asd', 'asd', 'asd', 'asda', 'asdaaa', '202cb962ac59075b964b07152d234b70', '', 0, 0, 0, 0, '', 0, ''),
(8, 'g', 'M', 'dg', '', 'asd', '', 'asda', 'asdaaa', '202cb962ac59075b964b07152d234b70', '', 0, 0, 0, 0, '', 0, ''),
(9, 'jfj', 'M', 'jf', 'jfj', 'jf', 'jf', 'jhfjh', 'jh', '202cb962ac59075b964b07152d234b70', '', 1, 1, 0, 0, 'hggc', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `service_requestor`
--

CREATE TABLE IF NOT EXISTS `service_requestor` (
  `sr_id` int(11) NOT NULL AUTO_INCREMENT,
  `sr_name` varchar(50) NOT NULL,
  `sr_sex` varchar(20) NOT NULL,
  `sr_address` text NOT NULL,
  `sr_city` varchar(20) NOT NULL,
  `sr_pincode` int(20) NOT NULL,
  `sr_country` varchar(20) NOT NULL,
  `sr_phone` int(20) NOT NULL,
  `sr_email` varchar(100) NOT NULL,
  `sr_password` varchar(100) NOT NULL,
  `sr_image` varchar(200) NOT NULL,
  `sr_logged_in` char(1) NOT NULL,
  PRIMARY KEY (`sr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `service_requestor`
--

INSERT INTO `service_requestor` (`sr_id`, `sr_name`, `sr_sex`, `sr_address`, `sr_city`, `sr_pincode`, `sr_country`, `sr_phone`, `sr_email`, `sr_password`, `sr_image`, `sr_logged_in`) VALUES
(1, 'subhasish chakrabortaa', 'M', 'ok', 'kolkata', 6428, '', 2147483647, 'subhasish.chakrabort@gmail.com', '0945fc9611f55fd0e183fb8b044f1afe', '1_aa.jpg', 'Y'),
(41, 'bcvbcvb', 'M', 'hg', 'hgfh', 0, '', 3453, 'amnil@gmail.com', '0945fc9611f55fd0e183fb8b044f1afe', '41_a.jpg', ''),
(42, '', '', '', '', 0, '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e', '42_', 'Y'),
(43, 'fgfdgfdghdfhgkjdhfkjg', 'M', 'edf', 'rte', 4234, '', 5345435, 'c@gmail.com', '0945fc9611f55fd0e183fb8b044f1afe', '43_a.jpg', ''),
(44, 'amit', 'M', 'aa@aa.com', '', 0, '', 654464654, 'c@gmail.com', '0945fc9611f55fd0e183fb8b044f1afe', '44_', ''),
(45, 'amit', 'M', 'we', '', 0, '', 42343243, 'aa@aa.com', '0945fc9611f55fd0e183fb8b044f1afe', '45_', ''),
(46, 'www', 'M', 'www', 'www', 232323, 'wwww', 1223232, 'ww@ww.com', '0945fc9611f55fd0e183fb8b044f1afe', '46_amit.jpg', 'N'),
(47, 'sdsd', 'M', 'sdgs', 'sdg', 0, 'sdg', 0, 'sam@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'Y'),
(48, 'sam', 'M', 'Chingrighata', 'kolkata', 700105, 'India', 1234567890, 'sam2@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'Y'),
(49, 'sdfs', 'M', 'dsfs', 'dsf', 0, 'hhj', 0, 'aa@gmail.com', '202cb962ac59075b964b07152d234b70', '1463581964Untitled3.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sp_language`
--

CREATE TABLE IF NOT EXISTS `sp_language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(100) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sp_language`
--

INSERT INTO `sp_language` (`language_id`, `language`) VALUES
(1, 'spanish'),
(2, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `sp_specialisation`
--

CREATE TABLE IF NOT EXISTS `sp_specialisation` (
  `specialisation_id` int(11) NOT NULL AUTO_INCREMENT,
  `specialisation` varchar(100) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`specialisation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sp_specialisation`
--

INSERT INTO `sp_specialisation` (`specialisation_id`, `specialisation`, `images`) VALUES
(1, 'Medical', 'Medical.jpg'),
(2, 'Legal', 'lawyer.jpg'),
(3, 'Coach', 'Coach.jpg'),
(4, 'Tutor', 'Tutor.jpg'),
(5, 'Architect', 'Architect.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sp_sub_specialisation`
--

CREATE TABLE IF NOT EXISTS `sp_sub_specialisation` (
  `sub_specialisation_id` int(2) DEFAULT NULL,
  `sub_specialisation` varchar(21) DEFAULT NULL,
  `specialisation_id` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sp_sub_specialisation`
--

INSERT INTO `sp_sub_specialisation` (`sub_specialisation_id`, `sub_specialisation`, `specialisation_id`) VALUES
(1, 'Aeronautical', 2),
(2, 'App Programming', 1),
(3, 'Athletic', 5),
(4, 'Baseball', 5),
(5, 'BasketBall', 5),
(6, 'Cardiac', 4),
(7, 'Chemistry', 6),
(8, 'Civil', 2),
(9, 'Corporate law', 3),
(10, 'Criminal Law', 3),
(11, 'Database', 1),
(12, 'Dental', 4),
(13, 'Divorce Law', 3),
(14, 'Electrical', 2),
(15, 'Environmental Science', 6),
(16, 'Football', 5),
(17, 'Hardware', 1),
(18, 'IceHockey', 5),
(19, 'Immigration Law', 3),
(20, 'Literature', 6),
(21, 'Mathematics', 6),
(22, 'Mechanical', 2),
(23, 'Networking', 1),
(24, 'Neurological', 4),
(25, 'Opthalmology', 4),
(26, 'Orthopaedic', 4),
(27, 'Physics', 6),
(28, 'Pulmonary', 4),
(29, 'Trusts Planning', 3),
(30, 'Web Designing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sp_sub_specialisation-old`
--

CREATE TABLE IF NOT EXISTS `sp_sub_specialisation-old` (
  `sub_specialisation_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_specialisation` varchar(100) NOT NULL,
  `specialisation_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_specialisation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sp_sub_specialisation-old`
--

INSERT INTO `sp_sub_specialisation-old` (`sub_specialisation_id`, `sub_specialisation`, `specialisation_id`) VALUES
(1, 'Php and Mysql', 1),
(2, 'CCNA', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
