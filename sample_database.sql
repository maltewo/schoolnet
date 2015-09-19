-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.3
-- Generation Time: Sep 19, 2015 at 10:59 PM
-- Server version: 5.6.19
-- PHP Version: 4.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db418933_13`
--

-- --------------------------------------------------------

--
-- Table structure for table `ANSWERS`
--

CREATE TABLE `ANSWERS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TEXT` longtext NOT NULL,
  `EXERCISE` int(11) NOT NULL,
  `OWNER` int(11) NOT NULL,
  `GROUP` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ANSWERS`
--


-- --------------------------------------------------------

--
-- Table structure for table `EXERCISES`
--

CREATE TABLE `EXERCISES` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` tinytext NOT NULL,
  `TEXT` longtext NOT NULL,
  `GROUP` int(11) NOT NULL,
  `OWNER` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `EXERCISES`
--

INSERT INTO `EXERCISES` (`ID`, `TITLE`, `TEXT`, `GROUP`, `OWNER`) VALUES
(1, 'Aufgabe 1', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 4, 0),
(2, 'Aufgabe 2', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `GROUPS`
--

CREATE TABLE `GROUPS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GROUP` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `GROUPS`
--

INSERT INTO `GROUPS` (`ID`, `GROUP`) VALUES
(3, 'Klasse 9B'),
(4, 'Klasse 9A'),
(5, 'Klasse 9C'),
(6, 'Lehrer');

-- --------------------------------------------------------

--
-- Table structure for table `ROLES`
--

CREATE TABLE `ROLES` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ROLES`
--

INSERT INTO `ROLES` (`ID`, `ROLE`) VALUES
(2, 'Admin'),
(3, 'Lehrer'),
(4, 'Schüler');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `ID` int(11) NOT NULL,
  `USERNAME` tinytext NOT NULL,
  `PASSWORD` char(40) NOT NULL,
  `ROLE` int(11) NOT NULL,
  `GROUP` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`ID`, `USERNAME`, `PASSWORD`, `ROLE`, `GROUP`) VALUES
(0, 'Beispiellehrer', '8b57c0ac5ab97255eb962a144f891e846cfc8a48', 3, 6),
(3, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2, 4);
