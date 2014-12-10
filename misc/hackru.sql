-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2014 at 10:24 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackru`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `id` int(11) NOT NULL,
  `weight_percent` decimal(10,2) NOT NULL,
  `assessment_type` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `weight_percent`, `assessment_type`, `course_id`) VALUES
(1, 0.30, 'Midterm', 1),
(2, 0.70, 'Assignment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`) VALUES
(1, 'Databases');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Kirisanth', 'S', 'test2@gmail.com', ''),
(2, 'Kevin', 'D', 'test@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_assessment_grade`
--

CREATE TABLE IF NOT EXISTS `user_assessment_grade` (
  `assessment_id` int(11) NOT NULL,
  `mark` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `assessment_id` (`assessment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_assessment_grade`
--

INSERT INTO `user_assessment_grade` (`assessment_id`, `mark`, `user_id`) VALUES
(1, 0.70, 1),
(2, 0.60, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_assessment_grade`
--
ALTER TABLE `user_assessment_grade`
  ADD CONSTRAINT `user_assessment_grade_ibfk_1` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_assessment_grade_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
