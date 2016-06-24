-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql207.byethost7.com
-- Generation Time: Jun 12, 2016 at 01:26 AM
-- Server version: 5.6.30-76.3
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
-- Table structure for table `degree`
--

CREATE TABLE IF NOT EXISTS `degree` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `degreeName` varchar(100) NOT NULL,
  `degreeImage` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `degreeName`, `degreeImage`) VALUES
(2, '0', '0'),
(1, '0', '0'),
(3, '0', '0'),
(4, '0', '0'),
(5, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `EducationID` int(20) NOT NULL AUTO_INCREMENT,
  `Education` varchar(100) NOT NULL,
  `Image` varchar(200) NOT NULL,
  PRIMARY KEY (`EducationID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`EducationID`, `Education`, `Image`) VALUES
(1, 'Doctorate(Ph.D.)', 'Doctorate.jpg'),
(2, 'Masters (Or Professional Degree)', 'Masters.jpg'),
(3, 'Bachelors', 'Bachelors.jpg'),
(4, 'Associate', 'Associate.jpg'),
(5, 'Secondary / High School', 'SecondaryHighSchool.jpg'),
(6, 'Junior Secondary / Junior High / Middle School', 'JuniorMiddleSchool.jpg'),
(7, 'Elementary / Primary School', 'ElementaryPrimarySchool.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `ExperienceID` int(20) NOT NULL AUTO_INCREMENT,
  `Experience` varchar(150) NOT NULL,
  `Image` varchar(250) NOT NULL,
  PRIMARY KEY (`ExperienceID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`ExperienceID`, `Experience`, `Image`) VALUES
(1, '0-5', '5.jpg'),
(2, '6-10', '10.jpg'),
(3, '11-15', '15.jpg'),
(4, '16-20', '20.jpg'),
(5, '21-25', '25.jpg'),
(6, '25+', 'n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(20) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_by_id` int(20) NOT NULL DEFAULT '0',
  `created_by_user_role` char(2) DEFAULT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `description`, `image`, `created_by_id`, `created_by_user_role`, `created_date`) VALUES
(57, 'test-subhasis', ' tgergegdgsgesgqwg', '57.png', 23, 'GM', '2016-06-11'),
(58, 'subhasis-3', ' hadsfcdwvswvs', '58.png', 23, 'GM', '2016-06-11'),
(56, 'test-subho', ' bdgbdf', '56.png', 23, 'GM', '2016-06-11'),
(55, 'test', ' venice', '', 22, 'GM', '2016-06-05'),
(54, 'Fun', ' Carnival', '', 22, 'GM', '2016-06-05'),
(53, 'Fun', ' Friends', '', 22, 'GM', '2016-06-05'),
(52, 'Development', 'Engineering team ', '52.jpg', 22, 'GM', '2016-06-05'),
(51, 'Development Team', 'This is the text entered in the Description Field during the Group Registration.', '51.jpg', 20, 'GM', '2016-06-05');

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
  `gm_phone` bigint(40) NOT NULL,
  `gm_email` varchar(100) NOT NULL,
  `gm_password` varchar(200) NOT NULL,
  `gm_image` varchar(100) NOT NULL,
  `gm_group_id` int(20) NOT NULL DEFAULT '0',
  `gm_logged_in` char(1) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'N' COMMENT 'Registration Completed through Mail?',
  `group_ids` varchar(264) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `group_member`
--

INSERT INTO `group_member` (`gm_id`, `gm_name`, `gm_phone`, `gm_email`, `gm_password`, `gm_image`, `gm_group_id`, `gm_logged_in`, `status`, `group_ids`) VALUES
(23, 'Test Member', 1234567890, 'dassamtest2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '23.jpg', 0, 'Y', 'Y', '52'),
(20, 'Satish Dhote', 9836520001, 'satishdhote@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '20.jpg', 0, 'Y', 'Y', '52'),
(22, 'farook afsari', 14086051501, 'farookafsari@gmail.com', '28437d8d8dfbaf0a8cb409394710d951', '22.jpg', 0, 'N', 'Y', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `RateId` int(20) NOT NULL AUTO_INCREMENT,
  `rate` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`RateId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`RateId`, `rate`, `image`) VALUES
(1, '1-5', '5.jpg'),
(2, '6-10', '10.jpg'),
(3, '11-15', '15.jpg'),
(4, '16-20', '20.jpg'),
(5, '21-25', '25.jpg'),
(6, '26-30', '30.jpg'),
(7, '31-35', '35.jpg'),
(8, '36-40', '40.jpg'),
(9, '41-45', '45.jpg'),
(10, '46-50', '50.jpg'),
(11, '51-55', '55.jpg'),
(12, '56-60', '60.jpg'),
(13, '61-65', '65.jpg'),
(14, '66-70', '70.jpg'),
(15, '71-75', '75.jpg'),
(16, '76-80', '80.jpg'),
(17, '81-85', '85.jpg'),
(18, '86-90', '90.jpg'),
(19, '91-95', '95.jpg'),
(20, '100+', '100.jpg');

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
  `sp_year_of_experience` varchar(50) NOT NULL COMMENT 'experience id from experience table',
  `sp_rate_type1` varchar(50) NOT NULL DEFAULT '0',
  `sp_rate_type2` varchar(50) NOT NULL DEFAULT '0',
  `sp_rate_type3` varchar(50) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `sp_language_id` int(20) NOT NULL,
  `sp_logged_in` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`sp_id`),
  UNIQUE KEY `sp_email` (`sp_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`sp_id`, `sp_name`, `sp_sex`, `sp_address`, `sp_city`, `sp_pincode`, `sp_country`, `sp_phone`, `sp_email`, `sp_password`, `sp_image`, `sp_specialisation_id`, `sp_sub_specialisation_id`, `sp_year_of_experience`, `sp_rate_type1`, `sp_rate_type2`, `sp_rate_type3`, `degree`, `sp_language_id`, `sp_logged_in`) VALUES
(31, 'Satish Dhote', 'M', 'Address1', 'Kolkata', '700020', 'India', '9836520001', 'satishdhote@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '31.jpg', 0, 0, '10', '10', '20', '10', '1', 0, 'N'),
(32, 'jhgvbkj', 'M', 'gg', 'g', 'uy6876', 'kgugugu', '876767687687', 'asas@awef.fj', '827ccb0eea8a706c4c34a16891f84e7b', '32.jpg', 0, 0, '3', '23', '232', '23', 'qwe', 0, 'N'),
(33, 'sam', 'M', 'Dummy', 'kolkata', '700105', 'India', '7894561230', 'dassamtest22@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '33.jpg', 0, 0, '1', '20', '30', '20', '5', 0, 'N'),
(34, 'samba', 'M', 'kol', 'kolkata', '700105', 'India', '0987654321', 'dassamtest2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '34.jpg', 5, 18, '5', '20', '30', '20', '5', 3, 'N');

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
  `sr_logged_in` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`sr_id`),
  UNIQUE KEY `sr_email` (`sr_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `service_requestor`
--

INSERT INTO `service_requestor` (`sr_id`, `sr_name`, `sr_sex`, `sr_address`, `sr_city`, `sr_pincode`, `sr_country`, `sr_phone`, `sr_email`, `sr_password`, `sr_image`, `sr_logged_in`) VALUES
(69, 'asdasdjb', 'M', 'ljbd', 'lhbl', 2147483647, 'lknbg', 2147483647, 'test@test.com', '827ccb0eea8a706c4c34a16891f84e7b', '69.jpg', 'Y'),
(70, 'sdgjbk', 'M', 'jbk', 'kbkjb', 57858758, 'jbkj', 2147483647, 'test2@test2.com', '827ccb0eea8a706c4c34a16891f84e7b', '70.jpg', 'N'),
(71, 'ywewef', 'M', 'yfff', 'uyfy', 0, 'yf', 2147483647, '6@vjh.sfdg', '827ccb0eea8a706c4c34a16891f84e7b', '71.jpg', 'N'),
(68, 'dassam', 'M', 'hjdfsj', 'hjvhj', 7, 'jkgkj', 2147483647, 'dassamtest2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '68.jpg', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `sp_language`
--

CREATE TABLE IF NOT EXISTS `sp_language` (
  `language_id` varchar(10) DEFAULT NULL,
  `languages` varchar(50) DEFAULT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sp_language`
--

INSERT INTO `sp_language` (`language_id`, `languages`, `images`) VALUES
('5', 'Chinese', 'Chinese.jpg'),
('3', 'French', 'French.jpg'),
('4', 'Greek', 'Greek.jpg'),
('2', 'Spanish', 'Spanish.jpg'),
('1', 'English', 'English.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sp_specialisation`
--

CREATE TABLE IF NOT EXISTS `sp_specialisation` (
  `specialisation_id` int(1) DEFAULT NULL,
  `specialisation` varchar(50) DEFAULT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sp_specialisation`
--

INSERT INTO `sp_specialisation` (`specialisation_id`, `specialisation`, `images`) VALUES
(1, 'Computers', 'Computers.jpg'),
(2, 'Engineering', 'Engineering.jpg'),
(3, 'Legal', 'Legal.jpg'),
(4, 'Medical', 'Medical.jpg'),
(5, 'Coach', 'Coach.jpg'),
(6, 'Tutor', 'Tutor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sp_specialisation2`
--

CREATE TABLE IF NOT EXISTS `sp_specialisation2` (
  `specialisation_id` int(11) NOT NULL AUTO_INCREMENT,
  `specialisation` varchar(100) NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`specialisation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sp_specialisation2`
--

INSERT INTO `sp_specialisation2` (`specialisation_id`, `specialisation`, `images`) VALUES
(1, 'Medical', 'Medical.jpg'),
(2, 'Legal', 'Legal.jpg'),
(3, 'Coach', 'Coach.jpg'),
(4, 'Tutor', 'Tutor.jpg'),
(5, 'Computer', 'Computer.jpg'),
(6, 'Engineering', 'Engineering.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sp_sub_specialisation`
--

CREATE TABLE IF NOT EXISTS `sp_sub_specialisation` (
  `sub_specialisation_id` int(2) DEFAULT NULL,
  `sub_specialisation` varchar(21) DEFAULT NULL,
  `specialisation_id` int(1) DEFAULT NULL,
  `SubSpImages` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sp_sub_specialisation`
--

INSERT INTO `sp_sub_specialisation` (`sub_specialisation_id`, `sub_specialisation`, `specialisation_id`, `SubSpImages`) VALUES
(29, 'Trusts Planning', 3, 'TrustsPlanning.jpg'),
(28, 'Pulmonary', 4, 'Pulmonary.jpg'),
(27, 'Physics', 6, 'Physics.jpg'),
(26, 'Orthopaedic', 4, 'Orthopaedic.jpg'),
(23, 'Networking', 1, 'Networking.jpg'),
(25, 'Opthalmology', 4, 'Opthalmology.jpg'),
(24, 'Neurological', 4, 'Neurological.jpg'),
(22, 'Mechanical Engineerin', 2, 'MechanicalEngineering.jpg'),
(21, 'Mathematics', 6, 'Mathematics.jpg'),
(20, 'Literature', 6, 'Literature.jpg'),
(19, 'Immigration Law', 3, 'ImmigrationLaw.jpg'),
(18, 'IceHockey', 5, 'IceHockey.jpg'),
(17, 'Hardware', 1, 'Hardware.jpg'),
(16, 'Football', 5, 'Football.jpg'),
(15, 'Environmental Science', 6, 'EnvironmentalScience.jpg'),
(13, 'Divorce Law', 3, 'DivorceLaw.jpg'),
(14, 'Electrical', 2, 'Electrical.jpg'),
(12, 'Dental', 4, 'Dental.jpg'),
(11, 'Database', 1, 'Database.jpg'),
(10, 'Criminal Law', 3, 'CriminalLaw.jpg'),
(8, 'Civil', 2, 'Civil.jpg'),
(9, 'Corporate law', 3, 'Corporatelaw.jpg'),
(7, 'Chemistry', 6, 'Chemistry.jpg'),
(6, 'Cardiac', 4, 'Cardiac.jpg'),
(5, 'BasketBall', 5, 'BasketBall.jpg'),
(4, 'Baseball', 5, 'Baseball.jpg'),
(3, 'Athletic', 5, 'Athletic.jpg'),
(2, 'App Programming', 1, 'AppProgramming.jpg'),
(1, 'Aeronautical', 2, 'Aeronautical.jpg'),
(30, 'Web Designing', 1, 'WebDesigning.jpg');

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
