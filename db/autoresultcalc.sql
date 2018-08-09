-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 08:16 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoresultcalc`
--

-- --------------------------------------------------------

--
-- Table structure for table `adata`
--

CREATE TABLE `adata` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `rank` varchar(40) NOT NULL,
  `pin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adata`
--

INSERT INTO `adata` (`id`, `name`, `rank`, `pin`) VALUES
(1, 'Mr Akindele', 'Senior Lecturer', '123451'),
(2, 'Mr Alade', 'Senior Lecturer', '123452'),
(3, 'Mr Akinfisan', 'Senior Lecturer', '121450'),
(4, 'Mr Otedola', 'Senior Lecturer', '821459'),
(5, 'Mr Faniyi', 'Senior Lecturer', '191050'),
(6, 'Mr Ogunsakin', 'Senior Lecturer', '141755'),
(7, 'Alade', 'Junior Lecturer', 'alade');

-- --------------------------------------------------------

--
-- Table structure for table `cgpa`
--

CREATE TABLE `cgpa` (
  `id` int(11) NOT NULL,
  `fromi` varchar(10) NOT NULL,
  `toi` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgpa`
--

INSERT INTO `cgpa` (`id`, `fromi`, `toi`, `name`) VALUES
(1, '3.5', '4.0', 'DISTINCTION'),
(2, '3.0', '3.49', 'UPPER CREDIT'),
(3, '2.50', '2.99', 'LOWER CREDIT'),
(4, '2.00', '2.49', 'PASS'),
(5, '1.75', '1.99', 'PROBATION'),
(6, '1.50', '1.74', 'WARNING'),
(7, '0.00', '1.49', 'WITHDRAW');

-- --------------------------------------------------------

--
-- Table structure for table `cos_assoc`
--

CREATE TABLE `cos_assoc` (
  `id` int(11) NOT NULL,
  `cos_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `exam` int(11) NOT NULL,
  `ca` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `cur_sem` int(11) NOT NULL,
  `cur_lev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `lev_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(40) NOT NULL,
  `unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `lev_id`, `sem_id`, `name`, `code`, `unit`) VALUES
(19, 3, 2, 'Electrical electronics science 2', 'ECC 125', 3),
(21, 3, 2, 'workshop tools and practice', 'MEC 123', 2),
(22, 3, 2, 'thermodynamics 1', 'MEC 122', 3),
(23, 3, 2, 'safety', 'MEC 125', 3),
(25, 3, 2, 'calculus', 'mth 211', 2),
(26, 3, 2, 'agricultural science', 'AGR 201', 0),
(27, 3, 2, 'material science', 'MEC 126', 3),
(33, 3, 1, 'logic and linear algebra', 'mth 111', 2),
(34, 3, 1, 'elementary prob. theory', 'sta 112', 2),
(35, 3, 1, 'INTRODUCTION TO programming', 'com 113', 3),
(36, 3, 1, 'introduction to  entrepreneurship', 'eed 128', 2),
(37, 3, 1, 'GENERAL AGRICULTURE', 'agr 001', 0),
(38, 3, 1, 'introduction to computing', 'com 101', 3),
(39, 3, 1, 'introduction to digital electronics', 'com 112', 3),
(40, 3, 1, 'citizenship education 1', 'gns 127', 2),
(41, 3, 1, 'descriptive statistics', 'sta 111', 2),
(42, 3, 1, 'technical english', 'otm 112', 3),
(44, 3, 1, 'functions and geometry', 'mth 112', 2),
(45, 3, 2, 'telecommunication', 'cte 206', 3),
(46, 3, 2, 'dynamics', 'met 124', 3),
(47, 4, 1, 'hello1', 'h1', 3),
(48, 4, 1, 'hello1', 'h2', 3),
(49, 4, 1, 'hello3', 'h3', 3),
(50, 4, 1, 'hello4', 'h4', 3),
(51, 2, 1, 'VB', 'COM 121', 3),
(52, 2, 1, 'VNB', 'COM 342', 5);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`, `point`) VALUES
(1, 'A', 4),
(2, 'AB', 4),
(3, 'B', 3),
(4, 'BC', 3),
(5, 'C', 3),
(6, 'CD', 3),
(7, 'D', 2),
(8, 'DE', 2),
(9, 'E', 2),
(10, 'EF', 1),
(11, 'F', 0);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `lenam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `lenam`) VALUES
(1, 'HND2'),
(2, 'HND1'),
(3, 'ND1'),
(4, 'ND2'),
(5, 'PT1'),
(6, 'PT2'),
(7, 'PT3');

-- --------------------------------------------------------

--
-- Table structure for table `markrange`
--

CREATE TABLE `markrange` (
  `id` int(11) NOT NULL,
  `fromi` int(11) NOT NULL,
  `toi` int(11) NOT NULL,
  `eq_grade` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markrange`
--

INSERT INTO `markrange` (`id`, `fromi`, `toi`, `eq_grade`) VALUES
(1, 0, 29, 'F'),
(2, 30, 34, 'EF'),
(3, 35, 39, 'E'),
(4, 40, 44, 'DE'),
(5, 45, 49, 'D'),
(6, 50, 54, 'CD'),
(7, 55, 59, 'C'),
(8, 60, 64, 'BC'),
(9, 65, 69, 'B'),
(10, 70, 74, 'AB'),
(11, 75, 100, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `sdata`
--

CREATE TABLE `sdata` (
  `id` int(11) NOT NULL,
  `student_id` text NOT NULL,
  `course_id` varchar(40) NOT NULL,
  `title` varchar(50) NOT NULL,
  `score` varchar(40) NOT NULL,
  `grade` varchar(40) NOT NULL,
  `unit` varchar(40) NOT NULL,
  `cur_sem` varchar(40) NOT NULL,
  `cur_lev` int(11) NOT NULL,
  `scoregrade` varchar(50) NOT NULL,
  `exam` int(11) NOT NULL,
  `ca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdata`
--

INSERT INTO `sdata` (`id`, `student_id`, `course_id`, `title`, `score`, `grade`, `unit`, `cur_sem`, `cur_lev`, `scoregrade`, `exam`, `ca`) VALUES
(1, '11', '33', 'LOGIC AND LINEAR ALGEBRA', '69', 'B', '2', '1', 3, '6', 45, 24),
(2, '11', '34', 'ELEMENTARY PROB. THEORY', '60', 'BC', '2', '1', 3, '6', 26, 34),
(3, '11', '35', 'INTRODUCTION TO PROGRAMMING', '92', 'A', '3', '1', 3, '12', 56, 36),
(4, '11', '36', 'INTRODUCTION TO  ENTREPRENEURSHIP', '75', 'A', '2', '1', 3, '8', 60, 15),
(5, '11', '37', 'GENERAL AGRICULTURE', '74', 'AB', '0', '1', 3, '0', 45, 29),
(6, '11', '38', 'INTRODUCTION TO COMPUTING', '68', 'B', '3', '1', 3, '9', 34, 34),
(7, '11', '39', 'INTRODUCTION TO DIGITAL ELECTRONICS', '60', 'BC', '3', '1', 3, '9', 40, 20),
(8, '11', '40', 'CITIZENSHIP EDUCATION 1', '66', 'B', '2', '1', 3, '6', 26, 40),
(9, '11', '41', 'DESCRIPTIVE STATISTICS', '52', 'CD', '2', '1', 3, '6', 34, 18),
(10, '11', '42', 'TECHNICAL ENGLISH', '55', 'C', '3', '1', 3, '9', 40, 15),
(11, '11', '44', 'FUNCTIONS AND GEOMETRY', '70', 'AB', '2', '1', 3, '8', 45, 25),
(12, '14', '33', 'LOGIC AND LINEAR ALGEBRA', '65', 'B', '2', '1', 3, '6', 45, 20),
(13, '14', '34', 'ELEMENTARY PROB. THEORY', '65', 'B', '2', '1', 3, '6', 45, 20),
(14, '14', '35', 'INTRODUCTION TO PROGRAMMING', '82', 'A', '3', '1', 3, '12', 54, 28),
(15, '14', '36', 'INTRODUCTION TO  ENTREPRENEURSHIP', '70', 'AB', '2', '1', 3, '8', 50, 20),
(16, '14', '37', 'GENERAL AGRICULTURE', '65', 'B', '0', '1', 3, '0', 25, 40),
(17, '14', '38', 'INTRODUCTION TO COMPUTING', '90', 'A', '3', '1', 3, '12', 55, 35),
(18, '14', '39', 'INTRODUCTION TO DIGITAL ELECTRONICS', '65', 'B', '3', '1', 3, '9', 45, 20),
(19, '14', '40', 'CITIZENSHIP EDUCATION 1', '90', 'A', '2', '1', 3, '8', 56, 34),
(20, '14', '41', 'DESCRIPTIVE STATISTICS', '90', 'A', '2', '1', 3, '8', 56, 34),
(21, '14', '42', 'TECHNICAL ENGLISH', '70', 'AB', '3', '1', 3, '12', 40, 30),
(22, '14', '44', 'FUNCTIONS AND GEOMETRY', '94', 'A', '2', '1', 3, '8', 54, 40),
(23, '24', '33', 'LOGIC AND LINEAR ALGEBRA', '79', 'A', '2', '1', 3, '8', 45, 34),
(24, '24', '34', 'ELEMENTARY PROB. THEORY', '80', 'A', '2', '1', 3, '8', 45, 35),
(25, '24', '35', 'INTRODUCTION TO PROGRAMMING', '0', 'e', '3', '1', 3, '0', 0, 0),
(26, '24', '36', 'INTRODUCTION TO  ENTREPRENEURSHIP', '0', 'e', '2', '1', 3, '0', 0, 0),
(27, '24', '37', 'GENERAL AGRICULTURE', '0', 'e', '0', '1', 3, '0', 0, 0),
(28, '24', '38', 'INTRODUCTION TO COMPUTING', '0', 'e', '3', '1', 3, '0', 0, 0),
(29, '24', '39', 'INTRODUCTION TO DIGITAL ELECTRONICS', '0', 'e', '3', '1', 3, '0', 0, 0),
(30, '24', '40', 'CITIZENSHIP EDUCATION 1', '0', 'e', '2', '1', 3, '0', 0, 0),
(31, '24', '41', 'DESCRIPTIVE STATISTICS', '0', 'e', '2', '1', 3, '0', 0, 0),
(32, '24', '42', 'TECHNICAL ENGLISH', '0', 'e', '3', '1', 3, '0', 0, 0),
(33, '24', '44', 'FUNCTIONS AND GEOMETRY', '0', 'e', '2', '1', 3, '0', 0, 0),
(129, '25', '33', 'LOGIC AND LINEAR ALGEBRA', '48', 'D', '2', '1', 3, '4', 25, 23),
(130, '25', '34', 'ELEMENTARY PROB. THEORY', '85', 'A', '2', '1', 3, '8', 40, 45),
(131, '25', '35', 'INTRODUCTION TO PROGRAMMING', '41', 'DE', '3', '1', 3, '6', 23, 18),
(132, '25', '36', 'INTRODUCTION TO  ENTREPRENEURSHIP', '44', 'DE', '2', '1', 3, '4', 10, 34),
(133, '25', '37', 'GENERAL AGRICULTURE', '87', 'A', '0', '1', 3, '0', 56, 31),
(134, '25', '38', 'INTRODUCTION TO COMPUTING', '83', 'A', '3', '1', 3, '12', 60, 23),
(135, '25', '39', 'INTRODUCTION TO DIGITAL ELECTRONICS', '68', 'B', '3', '1', 3, '9', 45, 23),
(136, '25', '40', 'CITIZENSHIP EDUCATION 1', '58', 'C', '2', '1', 3, '6', 34, 24),
(137, '25', '41', 'DESCRIPTIVE STATISTICS', '46', 'D', '2', '1', 3, '4', 34, 12),
(138, '25', '42', 'TECHNICAL ENGLISH', '62', 'BC', '3', '1', 3, '9', 51, 11),
(139, '25', '44', 'FUNCTIONS AND GEOMETRY', '74', 'AB', '2', '1', 3, '8', 51, 23),
(140, '27', '33', 'LOGIC AND LINEAR ALGEBRA', '46', 'D', '2', '1', 3, '4', 34, 12),
(141, '27', '34', 'ELEMENTARY PROB. THEORY', '90', 'A', '2', '1', 3, '8', 56, 34),
(142, '27', '35', 'INTRODUCTION TO PROGRAMMING', '56', 'C', '3', '1', 3, '9', 30, 26),
(143, '27', '36', 'INTRODUCTION TO  ENTREPRENEURSHIP', '52', 'CD', '2', '1', 3, '6', 35, 17),
(144, '27', '37', 'GENERAL AGRICULTURE', '90', 'A', '0', '1', 3, '0', 50, 40),
(145, '27', '38', 'INTRODUCTION TO COMPUTING', '64', 'BC', '3', '1', 3, '9', 45, 19),
(146, '27', '39', 'INTRODUCTION TO DIGITAL ELECTRONICS', '69', 'B', '3', '1', 3, '9', 29, 40),
(147, '27', '40', 'CITIZENSHIP EDUCATION 1', '73', 'AB', '2', '1', 3, '8', 50, 23),
(148, '27', '41', 'DESCRIPTIVE STATISTICS', '54', 'CD', '2', '1', 3, '6', 34, 20),
(149, '27', '42', 'TECHNICAL ENGLISH', '84', 'A', '3', '1', 3, '12', 50, 34),
(150, '27', '44', 'FUNCTIONS AND GEOMETRY', '54', 'CD', '2', '1', 3, '6', 34, 20),
(151, '31', '33', 'LOGIC AND LINEAR ALGEBRA', '73', 'AB', '2', '1', 3, '8', 50, 23),
(152, '31', '34', 'ELEMENTARY PROB. THEORY', '60', 'BC', '2', '1', 3, '6', 50, 10),
(153, '31', '35', 'INTRODUCTION TO PROGRAMMING', '90', 'A', '3', '1', 3, '12', 56, 34),
(154, '31', '36', 'INTRODUCTION TO  ENTREPRENEURSHIP', '84', 'A', '2', '1', 3, '8', 50, 34),
(155, '31', '37', 'GENERAL AGRICULTURE', '43', 'DE', '0', '1', 3, '0', 23, 20),
(156, '31', '38', 'INTRODUCTION TO COMPUTING', '76', 'A', '3', '1', 3, '12', 56, 20),
(157, '31', '39', 'INTRODUCTION TO DIGITAL ELECTRONICS', '57', 'C', '3', '1', 3, '9', 34, 23),
(158, '31', '40', 'CITIZENSHIP EDUCATION 1', '73', 'AB', '2', '1', 3, '8', 50, 23),
(159, '31', '41', 'DESCRIPTIVE STATISTICS', '57', 'C', '2', '1', 3, '6', 34, 23),
(160, '31', '42', 'TECHNICAL ENGLISH', '68', 'B', '3', '1', 3, '9', 34, 34),
(161, '31', '44', 'FUNCTIONS AND GEOMETRY', '44', 'DE', '2', '1', 3, '4', 34, 10),
(162, '11', '19', 'ELECTRICAL ELECTRONICS SCIENCE 2', '68', 'B', '3', '2', 3, '9', 34, 34),
(163, '11', '21', 'WORKSHOP TOOLS AND PRACTICE', '66', 'B', '2', '2', 3, '6', 56, 10),
(164, '11', '22', 'THERMODYNAMICS 1', '73', 'AB', '3', '2', 3, '12', 50, 23),
(165, '11', '23', 'SAFETY', '60', 'BC', '3', '2', 3, '9', 50, 10),
(166, '11', '25', 'CALCULUS', '65', 'B', '2', '2', 3, '6', 45, 20),
(167, '11', '26', 'AGRICULTURAL SCIENCE', '60', 'BC', '0', '2', 3, '0', 32, 28),
(168, '11', '27', 'MATERIAL SCIENCE', '59', 'C', '3', '2', 3, '9', 40, 19),
(169, '11', '45', 'TELECOMMUNICATION', '55', 'C', '3', '2', 3, '9', 25, 30),
(170, '11', '46', 'DYNAMICS', '62', 'BC', '3', '2', 3, '9', 34, 28),
(171, '14', '19', 'ELECTRICAL ELECTRONICS SCIENCE 2', '76', 'A', '3', '2', 3, '12', 56, 20),
(172, '14', '21', 'WORKSHOP TOOLS AND PRACTICE', '73', 'AB', '2', '2', 3, '8', 50, 23),
(173, '14', '22', 'THERMODYNAMICS 1', '43', 'DE', '3', '2', 3, '6', 23, 20),
(174, '14', '23', 'SAFETY', '70', 'AB', '3', '2', 3, '12', 50, 20),
(175, '14', '25', 'CALCULUS', '90', 'A', '2', '2', 3, '8', 56, 34),
(176, '14', '26', 'AGRICULTURAL SCIENCE', '70', 'AB', '0', '2', 3, '0', 50, 20),
(177, '14', '27', 'MATERIAL SCIENCE', '79', 'A', '3', '2', 3, '12', 56, 23),
(178, '14', '45', 'TELECOMMUNICATION', '43', 'DE', '3', '2', 3, '6', 23, 20),
(179, '14', '46', 'DYNAMICS', '34', 'EF', '3', '2', 3, '3', 0, 34),
(180, '24', '19', 'ELECTRICAL ELECTRONICS SCIENCE 2', '70', 'AB', '3', '2', 3, '12', 60, 10),
(181, '24', '21', 'WORKSHOP TOOLS AND PRACTICE', '79', 'A', '2', '2', 3, '8', 56, 23),
(182, '24', '22', 'THERMODYNAMICS 1', '84', 'A', '3', '2', 3, '12', 50, 34),
(183, '24', '23', 'SAFETY', '76', 'A', '3', '2', 3, '12', 56, 20),
(184, '24', '25', 'CALCULUS', '57', 'C', '2', '2', 3, '6', 34, 23),
(185, '24', '26', 'AGRICULTURAL SCIENCE', '68', 'B', '0', '2', 3, '0', 45, 23),
(186, '24', '27', 'MATERIAL SCIENCE', '68', 'B', '3', '2', 3, '9', 34, 34),
(187, '24', '45', 'TELECOMMUNICATION', '71', 'AB', '3', '2', 3, '12', 43, 28),
(188, '24', '46', 'DYNAMICS', '60', 'BC', '3', '2', 3, '9', 45, 15),
(189, '31', '19', 'ELECTRICAL ELECTRONICS SCIENCE 2', '73', 'AB', '3', '2', 3, '12', 50, 23),
(190, '31', '21', 'WORKSHOP TOOLS AND PRACTICE', '84', 'A', '2', '2', 3, '8', 50, 34),
(191, '31', '22', 'THERMODYNAMICS 1', '73', 'AB', '3', '2', 3, '12', 50, 23),
(192, '31', '23', 'SAFETY', '66', 'B', '3', '2', 3, '9', 56, 10),
(193, '31', '25', 'CALCULUS', '37', 'E', '2', '2', 3, '4', 20, 17),
(194, '31', '26', 'AGRICULTURAL SCIENCE', '68', 'B', '0', '2', 3, '0', 45, 23),
(195, '31', '27', 'MATERIAL SCIENCE', '68', 'B', '3', '2', 3, '9', 34, 34),
(196, '31', '45', 'TELECOMMUNICATION', '57', 'C', '3', '2', 3, '9', 34, 23),
(197, '31', '46', 'DYNAMICS', '54', 'CD', '3', '2', 3, '9', 34, 20),
(198, '27', '19', 'ELECTRICAL ELECTRONICS SCIENCE 2', '73', 'AB', '3', '2', 3, '12', 50, 23),
(199, '27', '21', 'WORKSHOP TOOLS AND PRACTICE', '68', 'B', '2', '2', 3, '6', 45, 23),
(200, '27', '22', 'THERMODYNAMICS 1', '68', 'B', '3', '2', 3, '9', 34, 34),
(201, '27', '23', 'SAFETY', '56', 'C', '3', '2', 3, '9', 50, 6),
(202, '27', '25', 'CALCULUS', '34', 'EF', '2', '2', 3, '2', 34, 0),
(203, '27', '26', 'AGRICULTURAL SCIENCE', '79', 'A', '0', '2', 3, '0', 45, 34),
(204, '27', '27', 'MATERIAL SCIENCE', '90', 'A', '3', '2', 3, '12', 56, 34),
(205, '27', '45', 'TELECOMMUNICATION', '70', 'AB', '3', '2', 3, '12', 50, 20),
(206, '27', '46', 'DYNAMICS', '57', 'C', '3', '2', 3, '9', 34, 23),
(207, '25', '19', 'ELECTRICAL ELECTRONICS SCIENCE 2', '79', 'A', '3', '2', 3, '12', 45, 34),
(208, '25', '21', 'WORKSHOP TOOLS AND PRACTICE', '68', 'B', '2', '2', 3, '6', 34, 34),
(209, '25', '22', 'THERMODYNAMICS 1', '39', 'E', '3', '2', 3, '6', 19, 20),
(210, '25', '23', 'SAFETY', '79', 'A', '3', '2', 3, '12', 56, 23),
(211, '25', '25', 'CALCULUS', '68', 'B', '2', '2', 3, '6', 45, 23),
(212, '25', '26', 'AGRICULTURAL SCIENCE', '54', 'CD', '0', '2', 3, '0', 14, 40),
(213, '25', '27', 'MATERIAL SCIENCE', '46', 'D', '3', '2', 3, '6', 23, 23),
(214, '25', '45', 'TELECOMMUNICATION', '84', 'A', '3', '2', 3, '12', 50, 34),
(215, '25', '46', 'DYNAMICS', '60', 'BC', '3', '2', 3, '9', 50, 10),
(216, '2', '47', 'HELLO1', '82', 'A', '3', '1', 4, '12', 79, 3),
(217, '2', '48', 'HELLO1', '82', 'A', '3', '1', 4, '12', 79, 3),
(218, '2', '49', 'HELLO3', '58', 'C', '3', '1', 4, '9', 3, 55),
(219, '2', '50', 'HELLO4', '55', 'C', '3', '1', 4, '9', 45, 10),
(220, '1', '51', 'VB', '57', 'C', '3', '1', 2, '9', 45, 12),
(221, '1', '52', 'VNB', '65', 'B', '5', '1', 2, '15', 45, 20);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `sem` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `sem`) VALUES
(1, 'FIRST SEMESTER'),
(2, 'SECOND SEMESTER');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `fullname` text NOT NULL,
  `sex` text NOT NULL,
  `status` text NOT NULL,
  `matricno` text NOT NULL,
  `sem_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `id` bigint(20) NOT NULL,
  `level` varchar(8) NOT NULL,
  `cgpa` varchar(20) NOT NULL,
  `acas` varchar(50) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`fullname`, `sex`, `status`, `matricno`, `sem_id`, `photo`, `id`, `level`, `cgpa`, `acas`, `session`) VALUES
('Babatunde kilani samuel', 'M', 'Food and Science', 'SO6/CTE/2013/145', 1, 'MSO5FST2012581.jpg', 1, 'HND1', '0', '', ''),
('Arowosewa Babatunde samuel', 'M', 'Computer Science', 'SO6/CTE/2013/289', 1, 'MSO5COM2012517.jpg', 2, 'ND2', '3.25', 'UPPER CREDIT', ''),
('Arowosewa Kilani Desmond', 'M', 'Computer Science', 'SO6/CTE/2013/309', 1, 'MSO5COM2012512.jpg', 3, 'ND2', '0', '', ''),
('Akinbulma timileyin Desmond', 'M', 'Computer Science', 'SO6/CTE/2013/158', 1, 'MSO5COM2012509.jpg', 4, 'ND2', '0', '', ''),
('Babatunde Desmond N.', 'M', 'Computer Science', 'SO6/CTE/2013/370', 1, 'MSO5COM2012537.jpg', 5, 'ND2', '0', '', ''),
('Babatunde Bayo M.', 'M', 'Computer Science', 'SO6/CTE/2013/310', 1, 'MSO5COM2012475.jpg', 6, 'ND2', '0', '', ''),
('Akintan Desmond D.', 'M', 'Computer Science', 'SO6/CTE/2013/373', 1, 'MSO5COM2012542.jpg', 7, 'ND2', '0', '', ''),
('Olu Desmond D.', 'M', 'Computer Science', 'SO6/CTE/2013/318', 1, 'MSO5COM2012585.jpg', 9, 'ND2', '0', '', ''),
('Akinbulma Ayo D.', 'M', 'Computer Science', 'SO6/CTE/2013/378', 1, 'MSO5COM2012466.jpg', 10, 'ND2', '0', '', ''),
('Akin Joy J.', 'M', 'Computer Science', 'SO6/CTE/2013/383', 1, 'MSO5COM2012557.jpg', 11, 'ND2', '3.22', 'UPPER CREDIT', '2013/2014'),
('Akin Paul J.', 'M', 'Computer Science', 'SO6/CTE/2013/253', 1, 'MSO5COM2012528.jpg', 12, 'ND2', '0', '', ''),
('Paul John J.', 'M', 'Computer Science', 'SO6/CTE/2013/245', 1, 'MSO5COM2012542.jpg', 13, 'ND2', '0', '', ''),
('Pascal John J.', 'M', 'Computer Science', 'SO6/CTE/2013/181', 1, 'MSO5COM2012569.jpg', 14, 'ND2', '3.39', 'UPPER CREDIT', '2013/2014'),
('Omiwale Joseph J.', 'M', 'Computer Science', 'SO6/CTE/2013/215', 1, 'MSO5COM2012520.jpg', 15, 'ND2', '0', '', ''),
('Joseph Goodness S.', 'M', 'Computer Science', 'SO6/CTE/2013/156', 1, 'MSO5COM2012490.jpg', 16, 'ND2', '0', '', ''),
('Samuel Josephine J.', 'F', 'Mathematics and Statistics', 'SO6/CTE/2013/254', 1, 'FSO5MTH2012716.jpg', 17, 'HND1', '0', '', ''),
('Akintan Grace J.', 'F', 'Mathematics and Statistics', 'SO6/CTE/2013/163', 1, 'FSO5MTH2012742.jpg', 18, 'HND2', '0', '', ''),
('Akintan Bola A.', 'F', 'Mathematics and Statistics', 'SO6/CTE/2013/200', 1, 'FSO5MTH2012764.jpg', 19, 'HND1', '0', '', ''),
('Akinyemi Joy M.', 'F', 'Mathematics and Statistics', 'SO6/CTE/2013/101', 1, 'FSO5MTH2012679.jpg', 20, 'HND2', '0', '', ''),
('AkinyeLE Joyce k.', 'F', 'Mathematics and Statistics', 'SO6/CTE/2013/297', 1, 'FSO5MTH2012712.jpg', 21, 'HND1', '0', '', ''),
('Jimoh Pelumi M.', 'M', 'Mass Communication', 'SO6/CTE/2013/314', 1, 'MSO5MAC2012988.jpg', 22, 'ND2', '0', '', ''),
('Gani Bashiru L.', 'M', 'Mass Communication', 'SO6/CTE/2013/215', 1, 'MSO5MAC20121281.jpg', 23, 'ND2', '0', '', ''),
('Jimoh Lamidi L.', 'M', 'Mass Communication', 'SO6/CTE/2013/305', 1, 'MSO5MAC20121328.jpg', 24, 'ND2', '2.09', 'PASS', '2013/2014'),
('Salah Sharafat T.', 'M', 'Mass Communication', 'SO6/CTE/2013/178', 1, 'MSO5MAC20121147.jpg', 25, 'ND2', '3.02', 'UPPER CREDIT', '2013/2014'),
('Gani Tajudeen L.', 'M', 'Mass Communication', 'SO6/CTE/2013/172', 1, 'MSO5MAC20121201.jpg', 26, 'ND2', '0', '', ''),
('Jimoh Tajudeen T.', 'M', 'Mass Communication', 'SO6/CTE/2013/288', 1, 'MSO5MAC2012528.jpg', 27, 'ND2', '3.22', 'UPPER CREDIT', '2013/2014'),
('Akindutire Alade L.', 'M', 'Mass Communication', 'SO6/CTE/2013/230', 1, 'MSO5MAC2012771.jpg', 28, 'ND2', '0', '', ''),
('Orimolade Goodness I.', 'M', 'Mass Communication', 'SO6/CTE/2013/149', 1, 'MSO5MAC2012850.jpg', 29, 'ND2', '0', '', ''),
('Orimolade Isreal T.', 'M', 'Mass Communication', 'SO6/CTE/2013/331', 1, 'MSO5MAC2012801.jpg', 30, 'ND2', '0', '', ''),
('Akintade Tola K.', 'M', 'Mass Communication', 'SO6/CTE/2013/297', 1, 'MSO5MAC2012520.jpg', 31, 'ND2', '3.35', 'UPPER CREDIT', '2013/2014'),
('Akindutire Isreal M.', 'M', 'Banking and Finance', 'SO6/CTE/2013/394', 1, 'MSO1BFN20123118.jpg', 32, 'HND1', '0', '', ''),
('Akintade Folayemi L.', 'M', 'Banking and Finance', 'SO6/CTE/2013/315', 1, 'MSO1BFN20122839.jpg', 33, 'HND2', '0', '', ''),
('Zachariah Sunday R.', 'M', 'Banking and Finance', 'SO6/CTE/2013/329', 1, 'MSO1BFN20122687.jpg', 34, 'HND1', '0', '', ''),
('Rolins Zachariah S.', 'M', 'Banking and Finance', 'SO6/CTE/2013/270', 1, 'MSO1BFN20122805.jpg', 35, 'HND2', '0', '', ''),
('Aknbuluma Rolins Z.', 'M', 'Banking and Finance', 'SO6/CTE/2013/261', 1, 'MSO1BFN20123103.jpg', 36, 'HND1', '0', '', ''),
('Akintan Zachariah S.', 'M', 'Banking and Finance', 'SO6/CTE/2013/328', 1, 'MSO1BFN20122577.jpg', 37, 'HND2', '0', '', ''),
('Fawehmi John S.', 'M', 'Banking and Finance', 'SO6/CTE/2013/157', 1, 'MSO1BFN20122895.jpg', 38, 'HND1', '0', '', ''),
('Ganiyat Monirat V.', 'F', 'Computer Engineering', 'SO6/CTE/2013/386', 1, 'FSO6CTE2012395.jpg', 39, 'HND2', '0', '', ''),
('Suleman Monirat V.', 'F', 'Computer Engineering', 'SO6/CTE/2013/349', 1, 'FSO6CTE2012396.jpg', 40, 'HND2', '0', '', ''),
('Akinde Vivian C.', 'F', 'Computer Engineering', 'SO6/CTE/2013/291', 1, 'FSO6CTE2012399.jpg', 41, 'HND1', '0', '', ''),
('Jegede Toyin B.', 'F', 'Computer Engineering', 'SO6/CTE/2013/258', 1, 'FSO6CTE2012409.jpg', 42, 'ND2', '0', '', ''),
('Akin tunde R.', 'M', 'Mechanical Engineering', 'SO6/CTE/2013/372', 1, 'MSO6MEC2012424.jpg', 43, 'HND2', '0', '', ''),
('Akindele Bayo I.', 'M', 'Mechanical Engineering', 'SO6/CTE/2013/121', 1, 'MSO6MEC2012404.jpg', 44, 'HND1', '0', '', ''),
('Akindele Goodness I.', 'M', 'Mechanical Engineering', 'SO6/CTE/2013/157', 1, 'MSO6MEC2012465.jpg', 45, 'HND1', '0', '', ''),
('Alade Isreal B.', 'M', 'Mechanical Engineering', 'SO6/CTE/2013/137', 1, 'MSO6MEC2012489.jpg', 46, 'HND1', '0', '', ''),
('Origadade Dare A.', 'M', 'Architechture', 'SO6/CTE/2013/180', 1, 'MSO3ARC2012721.jpg', 47, 'HND2', '0', '', ''),
('Bunmi Sunday D.', 'M', 'Architechture', 'SO6/CTE/2013/291', 1, 'MSO3ARC2012739.jpg', 48, 'HND1', '0', '', ''),
('Asa Dare A.', 'M', 'Architechture', 'SO6/CTE/2013/105', 1, 'MSO3ARC2012713.jpg', 49, 'HND1', '0', '', ''),
('Maloma Tunde G.', 'M', 'URP', 'SO6/CTE/2013/296', 1, 'MSO3URP2012678.jpg', 50, 'HND1', '0', '', ''),
('Maloma John G.', 'M', 'URP', 'SO6/CTE/2013/130', 1, 'MSO3URP2012666.jpg', 51, 'HND2', '0', '', ''),
('Adefela George M.', 'M', 'Estate Management', 'SO6/CTE/2013/245', 1, 'MSO3EST2012612.jpg', 52, 'ND2', '0', '', ''),
('Akinlo Segun I.', 'M', 'Estate Management', 'SO6/CTE/2013/147', 1, 'MSO3EST2012610.jpg', 53, 'ND2', '0', '', ''),
('Demola Dare D.', 'M', 'Electrical Engineering', 'SO6/CTE/2013/259', 1, 'MSO6EET2012762.jpg', 54, 'HND2', '0', '', ''),
('Balogun Kehinde S.', 'M', 'Electrical Engineering', 'SO6/CTE/2013/112', 1, 'MSO6EET2012759.jpg', 55, 'HND2', '0', '', ''),
('Eniola Seun T.', 'M', 'Electrical Engineering', 'SO6/CTE/2013/111', 1, 'MSO6EET2012760.jpg', 56, 'HND1', '0', '', ''),
('Abiola Eniola T.', 'M', 'Electrical Engineering', 'SO6/CTE/2013/273', 1, 'MSO6EET2012799.jpg', 57, 'HND2', '0', '', ''),
('Kareem Kabiru F.', 'M', 'Electrical Engineering', 'SO6/CTE/2013/355', 1, 'MSO6EET2012786.jpg', 58, 'HND1', '0', '', ''),
('Falonipe Christain G.', 'M', 'Electrical Engineering', 'SO6/CTE/2013/192', 1, 'MSO6EET2012784.jpg', 59, 'HND2', '0', '', ''),
('Segun Christain G.', 'M', 'Electrical Engineering', 'SO6/CTE/2013/144', 1, 'MSO6EET2012771.jpg', 60, 'HND1', '0', '', ''),
('Raymond Collins D.', 'M', 'Electrical Engineering', 'SO6/CTE/2013/173', 1, 'MSO6EET2012766.jpg', 61, 'HND2', '0', '', ''),
('Atiwaye kehinde', 'F', 'Computer Science', 'SO6/CTE/2013/162', 1, 'FSO5COM2012600.jpg', 62, 'HND1', '0', '', ''),
('Akinde Samson L.', 'M', 'Computer Science', 'SO6/CTE/2013/286', 1, 'MSO5COM2012601.jpg', 63, 'ND2', '0', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adata`
--
ALTER TABLE `adata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cgpa`
--
ALTER TABLE `cgpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cos_assoc`
--
ALTER TABLE `cos_assoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markrange`
--
ALTER TABLE `markrange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdata`
--
ALTER TABLE `sdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adata`
--
ALTER TABLE `adata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cgpa`
--
ALTER TABLE `cgpa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cos_assoc`
--
ALTER TABLE `cos_assoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `markrange`
--
ALTER TABLE `markrange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sdata`
--
ALTER TABLE `sdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
