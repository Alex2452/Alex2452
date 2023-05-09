-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2015 at 10:11 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Comment` varchar(2000) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `Name`, `Email`, `Comment`, `Gender`) VALUES
(1, 'Abiyote', 'Abi@yahoo.com', 'the firts message', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `dep`
--

CREATE TABLE IF NOT EXISTS `dep` (
  `Dep_id` int(8) NOT NULL,
  `Department` varchar(67) NOT NULL,
  `Facultiy` varchar(87) NOT NULL,
  PRIMARY KEY (`Dep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`Dep_id`, `Department`, `Facultiy`) VALUES
(13, 'History', 'Social'),
(77, 'nbv,', 'gjhkm'),
(192, 'HO', 'HO');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DepartmentID` int(11) NOT NULL AUTO_INCREMENT,
  `Department` varchar(100) NOT NULL,
  `Facultyname` varchar(100) NOT NULL,
  PRIMARY KEY (`DepartmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `department`
--


-- --------------------------------------------------------

--
-- Table structure for table `empcomment`
--

CREATE TABLE IF NOT EXISTS `empcomment` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `comment` varchar(50000) NOT NULL,
  `sex` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `empcomment`
--

INSERT INTO `empcomment` (`id`, `Name`, `comment`, `sex`) VALUES
(1, 'Abebe', 'this is the first comment', 'female'),
(5, 'Aschalew', 'this is the second comment', 'male'),
(6, 'Kebede', 'this is the third  comment', 'male'),
(9, 'Alexo', 'This comment of 4th', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `emp_register`
--

CREATE TABLE IF NOT EXISTS `emp_register` (
  `emp_id` int(5) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Age` varchar(5) NOT NULL,
  `Birthyear` int(5) NOT NULL,
  `Educationstatus` varchar(50) NOT NULL,
  `Dayofemployement` int(5) NOT NULL,
  `Monthofemployement` varchar(20) NOT NULL,
  `Yearofemployement` int(5) NOT NULL,
  `Typeofemployement` varchar(50) NOT NULL,
  `Marriagestatus` varchar(50) NOT NULL,
  `Typeofemployee` varchar(50) NOT NULL,
  `Sex` varchar(7) NOT NULL,
  `salary` float NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_register`
--

INSERT INTO `emp_register` (`emp_id`, `Fname`, `Mname`, `Lname`, `Department`, `Age`, `Birthyear`, `Educationstatus`, `Dayofemployement`, `Monthofemployement`, `Yearofemployement`, `Typeofemployement`, `Marriagestatus`, `Typeofemployee`, `Sex`, `salary`) VALUES
(0, 'Alem', 'Bedasa', 'dger', 'CSIT', '23', 2001, 'Degree', 16, 'May', 1999, '', 'married', 'Regular', 'Male', 4789),
(1, 'abebe', 'deme', 'Awgich', 'CSIT', '27', 2006, 'Masters', 14, '9', 2008, '', 'single', 'Regular', 'Male', 974),
(3, 'muktar', 'kedir', 'mele', 'csit', '25', 1997, 'Nurse', 19, '5', 2011, '', 'single', 'overtime', 'Female', 1777),
(4, 'Asnake', 'titahun', 'kebe', 'ho', '44', 2014, 'Nurse', 19, '5', 2009, '', 'single', 'Regular', 'Male', 4576),
(6, 'muktar', 'gemch', 'lema', 'officer', '34', 2011, 'Nurse', 19, '7', 2007, '', 'married', 'Regular', 'Female', 8000),
(8, 'abebe', 'titahun', 'rytgfghgh', 'it', '27', 1996, 'Masters', 20, '6', 2010, '', 'single', 'overtime', 'Male', 8000),
(76, 'abebee', 'titahun', 'Awgich', 'Bio', '44', 2002, 'Docter', 8, '5', 1999, '', 'married', 'Regular', 'Male', 1567);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `message` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `message`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Title` varchar(100) NOT NULL,
  `News` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `Date`, `Title`, `News`) VALUES
(4, '0000-00-00', 'Job', 'This is the first news .............'),
(5, '2000-02-02', 'job', 'this is the first title.........');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `emp_id` int(8) NOT NULL,
  `Firstname` varchar(60) NOT NULL,
  `Lastname` varchar(60) NOT NULL,
  `age` int(2) NOT NULL,
  `email` varchar(60) NOT NULL,
  `Role` varchar(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`emp_id`, `Firstname`, `Lastname`, `age`, `email`, `Role`, `Username`, `Password`) VALUES
(14, 'Alexo', 'Demeke', 23, 'alex@yahoo.com', 'Administrator', 'Admin', 'Admin'),
(26, 'Burkitu', 'Elias', 24, 'burkitu@yahoo.com', 'Personnel', 'per', 'per'),
(32, 'Alem', 'bedasa', 24, 'alem@yahoo.com', 'Employee', 'Alem', '123456'),
(56, 'Jemal', 'Kemal', 26, 'Jem123@yahoo.com', 'Employee', 'emp', 'emp'),
(100, 'Alemayehu', 'Demeke', 24, 'awgich107@gmail.com', 'Personnel', 'Awgich', '1234123'),
(556, 'kidist', 'wene', 23, 'kit@yahoo.com', 'Administrator', 'kide', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Departement` varchar(50) NOT NULL,
  `Academic_rank` varchar(200) NOT NULL,
  `Fieldofspecialization` varchar(80) NOT NULL,
  `Numberof_staff` int(6) NOT NULL,
  `gender` varchar(4) NOT NULL,
  `Registrationstartdate` date NOT NULL,
  `registrationenddate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `Departement`, `Academic_rank`, `Fieldofspecialization`, `Numberof_staff`, `gender`, `Registrationstartdate`, `registrationenddate`) VALUES
(11, 'csit', 'lecture', 'Bsc in math', 6, 'F/M', '2007-10-15', '2007-10-26');
