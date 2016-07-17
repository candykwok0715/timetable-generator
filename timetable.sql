-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2012 at 06:39 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `adminID` varchar(20) NOT NULL,
  `adminPw` varchar(32) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminID`, `adminPw`) VALUES
('admin', '062b5394c0e4a0e4ac36297ae7841e72');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `calendarDate` date NOT NULL,
  `dayOfWeek` varchar(10) DEFAULT NULL,
  `weekNo` int(11) DEFAULT NULL,
  `academicYr` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`calendarDate`),
  KEY `calendarDate` (`calendarDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calendarDate`, `dayOfWeek`, `weekNo`, `academicYr`, `semester`) VALUES
('0000-00-00', NULL, NULL, NULL, NULL),
('2011-12-12', NULL, NULL, NULL, NULL),
('2011-12-13', NULL, NULL, NULL, NULL),
('2011-12-14', NULL, NULL, NULL, NULL),
('2011-12-15', NULL, NULL, NULL, NULL),
('2012-07-01', NULL, NULL, NULL, NULL),
('2012-07-02', NULL, NULL, NULL, NULL),
('2012-07-03', NULL, NULL, NULL, NULL),
('2012-07-04', NULL, NULL, NULL, NULL),
('2012-07-08', NULL, NULL, NULL, NULL),
('2012-07-09', 'Monday', 27, '11/12', 'summer'),
('2012-07-10', 'Tuesday', 27, '11/12', 'summer'),
('2012-07-11', 'Wednesday', 27, '11/12', 'summer'),
('2012-07-12', 'Thursday', 27, '11/12', 'summer'),
('2012-07-13', 'Friday', 27, '11/12', 'summer'),
('2012-07-16', NULL, NULL, NULL, NULL),
('2012-07-22', NULL, NULL, NULL, NULL),
('2012-07-23', NULL, NULL, NULL, NULL),
('2012-07-24', NULL, NULL, NULL, NULL),
('2012-07-25', NULL, NULL, NULL, NULL),
('2012-07-26', NULL, NULL, NULL, NULL),
('2012-07-27', NULL, NULL, NULL, NULL),
('2012-07-28', NULL, NULL, NULL, NULL),
('2012-07-29', NULL, NULL, NULL, NULL),
('2012-07-30', NULL, NULL, NULL, NULL),
('2012-07-31', NULL, NULL, NULL, NULL),
('2012-08-01', NULL, NULL, NULL, NULL),
('2012-08-02', NULL, NULL, NULL, NULL),
('2012-08-05', NULL, NULL, NULL, NULL),
('2012-08-06', NULL, NULL, NULL, NULL),
('2012-08-07', NULL, NULL, NULL, NULL),
('2012-08-08', NULL, NULL, NULL, NULL),
('2012-08-12', NULL, NULL, NULL, NULL),
('2012-08-14', NULL, NULL, NULL, NULL),
('2012-08-15', NULL, NULL, NULL, NULL),
('2012-08-19', NULL, NULL, NULL, NULL),
('2012-08-21', NULL, NULL, NULL, NULL),
('2012-08-22', NULL, NULL, NULL, NULL),
('2012-08-25', NULL, NULL, NULL, NULL),
('2012-08-26', NULL, NULL, NULL, NULL),
('2012-08-28', NULL, NULL, NULL, NULL),
('2012-08-29', NULL, NULL, NULL, NULL),
('2012-08-31', NULL, NULL, NULL, NULL),
('2012-09-01', NULL, NULL, NULL, NULL),
('2012-09-02', NULL, NULL, NULL, NULL),
('2012-09-04', NULL, NULL, NULL, NULL),
('2012-09-08', NULL, NULL, NULL, NULL),
('2012-09-09', NULL, NULL, NULL, NULL),
('2012-09-11', NULL, NULL, NULL, NULL),
('2012-09-15', NULL, NULL, NULL, NULL),
('2012-09-18', NULL, NULL, NULL, NULL),
('2012-09-22', NULL, NULL, NULL, NULL),
('2012-10-01', NULL, NULL, NULL, NULL),
('2012-10-17', NULL, NULL, NULL, NULL),
('2012-10-26', NULL, NULL, NULL, NULL),
('2012-11-01', NULL, NULL, NULL, NULL),
('2013-07-12', NULL, NULL, NULL, NULL),
('2014-07-12', NULL, NULL, NULL, NULL),
('2015-07-12', NULL, NULL, NULL, NULL),
('2016-07-12', NULL, NULL, NULL, NULL),
('2017-07-12', NULL, NULL, NULL, NULL),
('2018-07-12', NULL, NULL, NULL, NULL),
('2019-07-12', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE IF NOT EXISTS `chatroom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `moduleCode` varchar(30) NOT NULL,
  `course` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `body` text,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `dt` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`id`, `date`, `time`, `moduleCode`, `course`, `year`, `name`, `body`, `dt`) VALUES
(1, '2012-07-29', '10:30:00', 'ICT4504S', '41304s', 2012, 'Cheng Hong Chi', 'sdsdfasf', '2012-07-22 19:21:03'),
(2, '2012-07-29', '10:30:00', 'ICT4504S', '41304s', 2012, 'Cheng Hong Chi', 'fdasfdsafd', '2012-07-22 19:24:56'),
(3, '2012-07-29', '10:30:00', 'ICT4504S', '41304s', 2012, 'Cheng Hong Chi', 'dfdasfasf', '2012-07-22 19:25:10'),
(81, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', 'fdsadf', '2012-07-22 21:39:36'),
(82, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', 'fsdafsa', '2012-07-22 21:39:42'),
(83, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', 'fdsaf', '2012-07-22 21:39:50'),
(84, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', '', '2012-07-22 21:42:57'),
(85, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', '', '2012-07-22 21:43:16'),
(86, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', '', '2012-07-22 21:43:39'),
(87, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', 'fsadfs', '2012-07-22 21:43:59'),
(88, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', 'dfasdf', '2012-07-22 21:44:18'),
(89, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', 'fdsafds', '2012-07-22 21:50:44'),
(90, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Cheng Hong Chi', 'hello world', '2012-07-22 22:11:11'),
(91, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Candy', 'fasdfa', '2012-07-22 22:13:04'),
(92, '2012-07-23', '09:30:00', 'ITA2322', '41303s', 2012, 'Candy', 'sdfasdfs', '2012-07-23 06:10:36'),
(93, '2012-07-23', '09:30:00', 'ITA2322', '41303s', 2012, 'Candy', 'asdfsadf', '2012-07-23 06:10:41'),
(94, '2012-07-23', '09:30:00', 'ITA2322', '41303s', 2012, 'Candy', 'sdaf', '2012-07-23 06:10:50'),
(95, '2012-07-29', '08:30:00', 'ICT4402S', '41303s', 2012, 'Candy', 'sdfsadf', '2012-07-23 06:12:03'),
(96, '2012-07-29', '08:30:00', 'ICT4402S', '41303s', 2012, 'Candy', 'sadfadf', '2012-07-23 06:12:06'),
(97, '2012-07-31', '09:00:00', 'ICT4509S', '41304s', 2012, 'Candy', 'sdfafd', '2012-07-23 06:15:26'),
(98, '2012-08-01', '08:30:00', 'ICT4402S', '41303s', 2012, 'Candy', 'dfasfd', '2012-07-23 06:16:38'),
(99, '2012-08-01', '08:30:00', 'ICT4402S', '41303s', 2012, 'Candy', 'fasdfda\r\n', '2012-07-23 06:16:49'),
(100, '2012-08-01', '08:30:00', 'ICT4402S', '41303s', 2012, 'Candy', 'sdfasdf', '2012-07-23 06:17:20'),
(101, '2012-08-01', '08:30:00', 'ICT4402S', '41303s', 2012, 'Candy', 'dfasfdsadf', '2012-07-23 06:17:26'),
(102, '2012-08-01', '08:30:00', 'ICT4402S', '41303s', 2012, 'Candy', 'dfasfd', '2012-07-23 06:18:27'),
(103, '2012-08-01', '08:30:00', 'ICT4402S', '41303s', 2012, 'Candy', 'fasdfaf', '2012-07-23 06:19:46'),
(104, '2012-08-01', '09:00:00', 'ICT4402S', '41303s', 2012, 'Candy', 'sdfasdfsaf', '2012-07-23 06:27:37'),
(105, '2012-07-23', '09:00:00', 'ICT4504S', '41304s', 2012, 'Candy', 'dfasdf', '2012-07-23 07:23:12'),
(106, '2012-07-24', '16:00:00', 'LAN3003S', '41303s', 2012, 'Candy', 'dfsaf', '2012-07-23 07:30:55'),
(107, '2012-07-24', '16:00:00', 'LAN3003S', '41303s', 2012, 'Candy', 'dfasdf', '2012-07-23 07:30:59'),
(108, '2012-07-24', '16:00:00', 'LAN3003S', '41303s', 2012, 'Candy', 'sdfsa', '2012-07-23 07:31:04'),
(109, '2012-07-24', '16:00:00', 'LAN3003S', '41303s', 2012, 'Cheng Hong Chi', 'dfsadf', '2012-07-23 07:36:36'),
(110, '2012-07-24', '16:00:00', 'LAN3003S', '41303s', 2012, 'Cheng Hong Chi', 'sdafafs\r\n', '2012-07-23 07:36:43'),
(111, '2012-07-24', '09:00:00', 'ICT4504S', '41304s', 2012, 'Cheng Hong Chi', 'fdasf', '2012-07-23 07:38:14'),
(112, '2012-07-24', '16:00:00', 'LAN3003S', '41303s', 2012, 'Cheng Hong Chi', 'fdssdfda', '2012-07-23 07:48:30'),
(113, '2012-07-24', '09:00:00', 'ICT4504S', '41304s', 2012, 'Cheng Hong Chi', 'fsdaf', '2012-07-23 08:06:00'),
(114, '2012-07-25', '09:00:00', 'ICT4402S', '41304s', 2012, 'Candy', 'fsadf', '2012-07-25 14:38:23'),
(115, '2012-07-27', '09:00:00', 'ICT4402S', '41304s', 2012, 'Candy', 'sdfasf', '2012-07-25 14:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(10) NOT NULL DEFAULT '',
  `Color` varchar(10) NOT NULL,
  `taughtBy` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `tsFrom` time NOT NULL,
  `tsEnd` time NOT NULL,
  `periodSpan` int(11) NOT NULL,
  `roomNo` varchar(5) NOT NULL,
  `course` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `remark` text,
  `createdBy` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`classID`),
  KEY `taughtBy` (`taughtBy`),
  KEY `date` (`date`),
  KEY `tsFrom` (`tsFrom`),
  KEY `tsEnd` (`tsEnd`),
  KEY `roomNo` (`roomNo`),
  KEY `createdBy` (`createdBy`),
  KEY `module` (`module`),
  KEY `classes_ibfk_9` (`year`),
  KEY `course` (`course`,`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=274 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classID`, `module`, `Color`, `taughtBy`, `date`, `tsFrom`, `tsEnd`, `periodSpan`, `roomNo`, `course`, `year`, `type`, `remark`, `createdBy`) VALUES
(272, 'ICT4504S', '#f89406', 'CHO Wai-shing', '2012-07-26', '08:30:00', '09:00:00', 1, 'A304', '41304s', 2012, 'lab', 'hi', 'normal'),
(273, 'ICT4504S', '#f89406', 'CHO Wai-shing', '2012-08-02', '08:30:00', '09:00:00', 1, 'A304', '41304s', 2012, 'lab', 'hi', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `url`, `email`, `body`, `dt`) VALUES
(1, 'David', '', 'david@gmail.com', 'hello world', '2012-07-17 10:09:19'),
(2, 'Wong', '', 'david@gmail.com', 'hello 2', '2012-07-17 10:17:30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `content`
--
CREATE TABLE IF NOT EXISTS `content` (
`course` varchar(20)
,`year` year(4)
,`name` varchar(20)
,`id` int(10) unsigned
,`date` date
,`time` time
,`moduleCode` varchar(30)
,`body` text
,`dt` timestamp
,`studentID` int(11)
,`photo` varchar(20)
,`password` varchar(35)
,`nickName` varchar(20)
,`type` varchar(20)
,`status` varchar(10)
);
-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseCode` varchar(10) NOT NULL,
  `courseYr` year(4) NOT NULL,
  `courseName` varchar(30) NOT NULL,
  PRIMARY KEY (`courseCode`,`courseYr`),
  KEY `courseCode` (`courseCode`,`courseYr`),
  KEY `courseYr` (`courseYr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseCode`, `courseYr`, `courseName`) VALUES
('41303s', 2012, 'SE'),
('41304s', 2012, 'T&N');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `lecturerID` int(11) NOT NULL AUTO_INCREMENT,
  `lecturerName` varchar(30) NOT NULL,
  PRIMARY KEY (`lecturerID`),
  KEY `lecturerName` (`lecturerName`),
  KEY `lecturerName_2` (`lecturerName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lecturerID`, `lecturerName`) VALUES
(9, 'CHIU Yiu-man'),
(7, 'CHO Wai-shing'),
(2, 'Crystal Lee'),
(8, 'HO Yau-fat'),
(6, 'LIM Cheng-siew'),
(5, 'Mike Leung'),
(1, 'WONG YIK LUNG'),
(10, 'Wynn Lee');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `moduleCode` varchar(10) NOT NULL,
  `moduleName` varchar(30) NOT NULL,
  PRIMARY KEY (`moduleCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`moduleCode`, `moduleName`) VALUES
('ICT4402S', 'Database Principle & Administr'),
('ICT4504S', 'Advanced Programming'),
('ICT4509S', 'Software Development Process'),
('ITA2322', 'Object Oriented Technology'),
('ITD4905S', 'Professionalism'),
('LAN3003S', 'Putonghua'),
('LAN3100s', 'Oral Interaction in the Workpl'),
('WPD3200S', 'Personal Effectiveness');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `roomNO` varchar(5) NOT NULL,
  `type` varchar(10) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `remark` text,
  PRIMARY KEY (`roomNO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomNO`, `type`, `capacity`, `remark`) VALUES
('A304', 'la', 0, ''),
('A305', 'lab', 0, ''),
('A306', 'lectur', 0, ''),
('A406', 'lab', 0, ''),
('B111', 'lecture', 30, ''),
('C119', 'lecture', 40, ''),
('C356', 'laabc', 50, ''),
('D125', 'Lecture', 0, ''),
('D221', 'lecture', 0, ''),
('D323b', '2', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nickName` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `course` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`studentID`),
  UNIQUE KEY `name_2` (`name`),
  KEY `name` (`name`),
  KEY `name_3` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4130416 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `photo`, `password`, `name`, `nickName`, `type`, `course`, `year`, `status`) VALUES
(1234, 'atom01.jpg', '062b5394c0e4a0e4ac36297ae7841e72', 'normal', 'unkown', 'normal', '41304s', 2012, 'verified'),
(4130415, 'bird.png', '062b5394c0e4a0e4ac36297ae7841e72', 'class representative', 'David', 'class representative', '41304s', 2012, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE IF NOT EXISTS `timeslots` (
  `timeSlotID` int(11) NOT NULL AUTO_INCREMENT,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  PRIMARY KEY (`timeSlotID`),
  KEY `startTime` (`startTime`),
  KEY `endTime` (`endTime`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`timeSlotID`, `startTime`, `endTime`) VALUES
(1, '08:30:00', '09:00:00'),
(2, '09:00:00', '09:30:00'),
(3, '09:30:00', '10:00:00'),
(4, '10:00:00', '10:30:00'),
(5, '10:30:00', '11:00:00'),
(6, '11:00:00', '11:30:00'),
(7, '11:30:00', '12:00:00'),
(8, '12:00:00', '12:30:00'),
(9, '12:30:00', '13:00:00'),
(10, '13:00:00', '13:30:00'),
(11, '13:30:00', '14:00:00'),
(12, '14:00:00', '14:30:00'),
(13, '14:30:00', '15:00:00'),
(14, '15:00:00', '15:30:00'),
(15, '15:30:00', '16:00:00'),
(16, '16:00:00', '16:30:00'),
(17, '16:30:00', '17:00:00'),
(18, '17:00:00', '17:30:00');

-- --------------------------------------------------------

--
-- Structure for view `content`
--
DROP TABLE IF EXISTS `content`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `content` AS select `chatroom`.`course` AS `course`,`chatroom`.`year` AS `year`,`chatroom`.`name` AS `name`,`chatroom`.`id` AS `id`,`chatroom`.`date` AS `date`,`chatroom`.`time` AS `time`,`chatroom`.`moduleCode` AS `moduleCode`,`chatroom`.`body` AS `body`,`chatroom`.`dt` AS `dt`,`students`.`studentID` AS `studentID`,`students`.`photo` AS `photo`,`students`.`password` AS `password`,`students`.`nickName` AS `nickName`,`students`.`type` AS `type`,`students`.`status` AS `status` from (`chatroom` join `students` on(((`chatroom`.`course` = `students`.`course`) and (`chatroom`.`year` = `students`.`year`) and (`chatroom`.`name` = `students`.`name`))));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_10` FOREIGN KEY (`module`) REFERENCES `modules` (`moduleCode`),
  ADD CONSTRAINT `classes_ibfk_11` FOREIGN KEY (`course`, `year`) REFERENCES `courses` (`courseCode`, `courseYr`),
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`taughtBy`) REFERENCES `lecturers` (`lecturerName`),
  ADD CONSTRAINT `classes_ibfk_3` FOREIGN KEY (`date`) REFERENCES `calendar` (`calendarDate`),
  ADD CONSTRAINT `classes_ibfk_4` FOREIGN KEY (`tsFrom`) REFERENCES `timeslots` (`startTime`),
  ADD CONSTRAINT `classes_ibfk_5` FOREIGN KEY (`tsEnd`) REFERENCES `timeslots` (`endTime`),
  ADD CONSTRAINT `classes_ibfk_6` FOREIGN KEY (`roomNo`) REFERENCES `rooms` (`roomNO`),
  ADD CONSTRAINT `classes_ibfk_8` FOREIGN KEY (`createdBy`) REFERENCES `students` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
