-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 07:43 PM
-- Server version: 5.6.27-0ubuntu1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lemonv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `attach_id` varchar(10) NOT NULL,
  `attach_name` varchar(30) NOT NULL,
  `attach_path` varchar(60) NOT NULL,
  `document_id` varchar(10) NOT NULL,
  `msg_id` varchar(10) NOT NULL,
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE IF NOT EXISTS `box` (
  `box_id` varchar(10) NOT NULL,
  `document_id` varchar(10) NOT NULL,
  `doc_sender_user_id` varchar(10) NOT NULL,
  `doc_receiver_user_id` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`box_id`, `document_id`, `doc_sender_user_id`, `doc_receiver_user_id`, `description`, `date`, `intranet_id`) VALUES
('08c556bc02', '08c556bc02', '08c556bc02', '08DF97', '', '2015-08-07 12:20:54', 1),
('100', '', '', '', '', '2015-08-07 12:20:54', 1),
('176f6134a6', '176f6134a6', 'DB02D4', '001', '', '2015-08-07 12:20:54', 1),
('263bbdaf45', '263bbdaf45', 'DB02D4', '08DF97', '', '2015-08-07 12:20:54', 1),
('2b55a86fa2', '2b55a86fa2', '08DF97', 'DB02D4', '', '2015-08-07 14:08:32', 1),
('452991f36d', '452991f36d', '08DF97', 'DB02D4', '', '2015-08-07 14:21:59', 1),
('4c651eff6b', '4c651eff6b', '08DF97', 'DB02D4', '', '2015-08-07 14:24:59', 1),
('4e3116ba32', '4e3116ba32', 'DB02D4', '08DF97', 'Need assistance', '2015-08-11 16:26:22', 1),
('5d5736a21f', '5d5736a21f', '7c4f86', '08DF97', 'After all working', '2015-08-07 12:20:54', 1),
('64e93e1f1f', '64e93e1f1f', '7c4f86', '08DF97', '', '2015-08-07 12:20:54', 1),
('7be32ffdda', '7be32ffdda', 'DB02D4', '08DF97', '', '2015-08-07 12:20:54', 1),
('87e07cd53e', '87e07cd53e', '08DF97', 'DB02D4', '', '2015-08-07 14:16:53', 1),
('89c583831e', '89c583831e', '7c4f86183a', '08DF97', '', '2015-08-07 12:20:54', 1),
('8f63aa997f', '8f63aa997f', '', '08DF97', '', '2015-08-07 12:20:54', 1),
('908b537c8a', '908b537c8a', 'DB02D4', '08DF97', '', '2015-08-07 12:20:54', 1),
('9586c2a951', '9586c2a951', 'DB02D4', '08DF97', '', '2015-08-07 12:20:54', 1),
('9ec307ea23', '9ec307ea23', '08DF97', 'DB02D4', '', '2015-08-07 14:24:23', 1),
('a3b6824e7f', 'a3b6824e7f', 'DB02D4', '08DF97', '', '2015-08-07 12:20:54', 1),
('a6725460a1', 'a6725460a1', 'DB02D4', '001', '', '2015-08-07 12:20:54', 1),
('a7eb473115', 'a7eb473115', '08DF97', 'DB02D4', 'Could you take me company?', '2015-08-07 14:27:31', 1),
('acc60cd935', 'acc60cd935', '', 'Array', '', '2015-08-07 12:20:54', 1),
('ad0278b20e', 'ad0278b20e', 'Array', '08DF97', '', '2015-08-07 12:20:54', 1),
('ad2eb64bf2', 'ad2eb64bf2', '08DF97', 'DB02D4', 'Be quite Quick', '2015-08-07 14:35:00', 1),
('ade807b62f', 'ade807b62f', '08DF97', 'DB02D4', '', '2015-08-07 14:15:13', 1),
('b6d06fefef', 'b6d06fefef', 'DB02D4', '08DF97', '', '2015-08-07 12:20:54', 1),
('c0fdf64fa5', 'c0fdf64fa5', '08DF97', 'DB02D4', '', '2015-08-07 14:14:26', 1),
('cadbdb806d', 'cadbdb806d', '', '', '', '2015-08-07 12:20:54', 1),
('da091a37e8', 'da091a37e8', 'DB02D4', '08DF97', '', '2015-08-07 12:20:54', 1),
('da7f856e53', 'da7f856e53', '08DF97', '08DF97', 'DHDHTDHDH', '2015-08-07 12:20:54', 1),
('eaf2691976', 'eaf2691976', '7c4f86', '08DF97', 'Please do it quickly', '2015-08-07 12:20:54', 1),
('f6b2ae1ae9', 'f6b2ae1ae9', 'DB02D4', '08DF97', '', '2015-08-07 12:20:54', 1),
('f8a6ea176a', 'f8a6ea176a', 'f8a6ea176a', '08DF97', '', '2015-08-07 19:48:39', 1),
('fc733d74d2', 'fc733d74d2', '', '08DF97', '', '2015-08-07 12:20:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` varchar(3) NOT NULL,
  `branch_name` varchar(30) NOT NULL DEFAULT 'lemon',
  `branch_location` varchar(30) NOT NULL,
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_location`, `intranet_id`) VALUES
('001', 'Main branch', 'Kigali', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `document_id` varchar(10) NOT NULL,
  `doc_type_id` varchar(3) NOT NULL COMMENT 'foreign key to doc_type',
  `document_path` varchar(60) NOT NULL,
  `client_id` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_closed` datetime DEFAULT NULL,
  `doc_status_id` varchar(3) NOT NULL DEFAULT '001',
  `closedby_user_id` varchar(10) NOT NULL,
  `observation` text,
  `branch_id` varchar(3) NOT NULL,
  `intranet_id` int(11) NOT NULL,
  `closed` varchar(1) NOT NULL DEFAULT 'n' COMMENT 'y/n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `doc_type_id`, `document_path`, `client_id`, `date_created`, `date_closed`, `doc_status_id`, `closedby_user_id`, `observation`, `branch_id`, `intranet_id`, `closed`) VALUES
('08c556bc02', '12A', 'app/data/documents/08c556bc02.nmap-security-hole', '29468', '2015-08-07 12:21:16', '2015-10-14 17:11:02', '002', '', '', '001', 1, 'n'),
('0ceb423109', '001', 'app/data/documents/0ceb423109.jpg', '08DF97', '2015-08-11 16:15:37', NULL, '001', '', NULL, '001', 1, 'n'),
('1245', '', '\\', '', '2015-08-07 12:21:16', NULL, '001', '', NULL, '', 1, 'n'),
('176f6134a6', '001', 'data/documents/176f6134a6.jpg', '2121212', '2015-08-07 12:21:16', NULL, '001', 'DB02D4', NULL, '001', 1, 'n'),
('1f2c5aeaa0', '85F', 'app/data/documents/e515b705cd.jpg', '08DF97', '2015-08-11 16:19:17', NULL, '001', '', NULL, '001', 1, 'n'),
('263bbdaf45', '001', 'data/documents/263bbdaf45.jpg', '', '2015-08-07 12:21:16', '2015-10-14 17:40:00', '002', '08DF97', '', '001', 1, 'y'),
('2b55a86fa2', '001', 'data/documents/2b55a86fa2.jpg', '29468', '2015-08-07 14:08:32', '2015-12-07 13:08:15', '0B5', '', '123', '001', 1, 'y'),
('452991f36d', '001', 'data/documents/452991f36d.jpg', '', '2015-08-07 14:21:59', '2015-08-07 19:49:41', '001', '', 'lkdbvjfb', '001', 1, 'n'),
('45527bf8fe', '001', 'data/documents/45527bf8fe.jpg', '', '2015-08-07 14:26:21', NULL, '001', '', NULL, '001', 1, 'n'),
('4c1ad58b0e', '001', 'data/documents/4c1ad58b0e.jpg', '2121212', '2015-08-07 12:21:16', NULL, '001', 'DB02D4', NULL, '001', 1, 'n'),
('4c651eff6b', '001', 'data/documents/4c651eff6b.jpg', '', '2015-08-07 14:24:59', NULL, '001', '', NULL, '001', 1, 'n'),
('4e3116ba32', '85F', 'data/documents/4e3116ba32.jpg', '38695', '2015-08-11 16:26:22', '2015-10-14 17:11:33', '001', '', '', '001', 1, 'n'),
('5d5736a21f', '001', 'app/data/documents/fae6594885.ini', '', '2015-08-07 12:21:16', NULL, '001', '7c4f86', NULL, '001', 1, 'n'),
('64e93e1f1f', '001', 'app/data/documents/64e93e1f1f.ini', '', '2015-08-07 12:21:16', NULL, '001', '7c4f86', NULL, '001', 1, 'n'),
('6672cdb759', '85F', 'app/data/documents/6672cdb759.jpg', '08DF97', '2015-08-11 16:25:06', NULL, '001', '', NULL, '001', 1, 'n'),
('7be32ffdda', '001', 'data/documents/7be32ffdda.jpg', '', '2015-08-07 12:21:16', NULL, '001', 'DB02D4', NULL, '001', 1, 'n'),
('839928dce9', '85F', 'app/data/documents/839928dce9.jpg', '08DF97', '2015-08-11 16:16:11', NULL, '001', '', NULL, '001', 1, 'n'),
('87e07cd53e', '001', 'data/documents/87e07cd53e.jpg', '', '2015-08-07 14:16:53', NULL, '001', '', NULL, '001', 1, 'n'),
('889ff9094b', '85F', 'app/data/documents/889ff9094b.jpg', '08DF97', '2015-08-11 16:19:40', NULL, '001', '', NULL, '001', 1, 'n'),
('89c583831e', '85F', 'app/data/documents/89c583831e.txt', '7c4f86183a', '2015-08-07 12:21:16', '2015-10-14 17:12:34', '001', '', '', '001', 1, 'n'),
('8f63aa997f', '001', 'app/data/documents/8f63aa997f.ini', '', '2015-08-07 12:21:16', NULL, '001', '', NULL, '001', 1, 'n'),
('908b537c8a', '001', 'data/documents/908b537c8a.jpg', '', '2015-08-07 12:21:16', '2015-11-26 14:52:12', '002', '', '', '001', 1, 'y'),
('9586c2a951', '001', 'data/documents/9586c2a951.jpg', '', '2015-08-07 12:21:16', '2015-10-14 16:56:25', '002', 'DB02D4', '', '001', 1, 'n'),
('9ec307ea23', '001', 'data/documents/9ec307ea23.jpg', '', '2015-08-07 14:24:23', NULL, '001', '', NULL, '001', 1, 'n'),
('a3b6824e7f', '001', 'data/documents/a3b6824e7f.jpg', '', '2015-08-07 12:21:16', '2015-11-26 12:48:33', '002', '08DF97', '', '001', 1, 'y'),
('a6725460a1', '001', 'data/documents/a6725460a1.jpg', '2121212', '2015-08-07 12:21:16', NULL, '001', 'DB02D4', NULL, '001', 1, 'n'),
('a6c705dbff', '85F', 'app/data/documents/a6c705dbff.jpg', '08DF97', '2015-08-11 16:17:25', NULL, '001', '', NULL, '001', 1, 'n'),
('a781b95bf4', '85F', 'app/data/documents/a781b95bf4.jpg', '08DF97', '2015-08-11 16:20:32', NULL, '001', '', NULL, '001', 1, 'n'),
('a7eb473115', '001', 'data/documents/a7eb473115.jpg', '', '2015-08-07 14:27:31', NULL, '001', '', NULL, '001', 1, 'n'),
('acc60cd935', '001', 'app/data/documents/acc60cd935.ini', '', '2015-08-07 12:21:16', NULL, '001', '', NULL, '001', 1, 'n'),
('ad0278b20e', '001', 'app/data/documents/ad0278b20e.ini', '', '2015-08-07 12:21:16', NULL, '001', 'Array', NULL, '001', 1, 'n'),
('ad2eb64bf2', '12A', 'data/documents/ad2eb64bf2.jpg', '', '2015-08-07 14:35:00', NULL, '001', '', NULL, '001', 1, 'n'),
('ade807b62f', '001', 'data/documents/ade807b62f.jpg', '29468', '2015-08-07 14:15:13', NULL, '001', '', NULL, '001', 1, 'n'),
('b6d06fefef', '001', 'data/documents/b6d06fefef.jpg', '', '2015-08-07 12:21:16', NULL, '001', 'DB02D4', NULL, '001', 1, 'n'),
('bad908a50b', '85F', 'app/data/documents/bad908a50b.jpg', '08DF97', '2015-08-11 16:17:04', NULL, '001', '', NULL, '001', 1, 'n'),
('c0fdf64fa5', '001', 'data/documents/c0fdf64fa5.jpg', '29468', '2015-08-07 14:14:26', '2015-12-07 13:11:13', '002', '', '54515', '001', 1, 'y'),
('cadbdb806d', '001', 'app/data/documents/cadbdb806d.ini', '', '2015-08-07 12:21:16', NULL, '001', '', NULL, '001', 1, 'n'),
('d9cea50da8', '85F', 'app/data/documents/d9cea50da8.jpg', '08DF97', '2015-08-11 16:19:29', NULL, '001', '', NULL, '001', 1, 'n'),
('da091a37e8', '001', 'app/data/documents/da091a37e8.ini', '', '2015-08-07 12:21:16', NULL, '001', 'DB02D4', NULL, '001', 1, 'n'),
('da7f856e53', '85F', 'app/data/documents/da7f856e53.odt', '08DF97', '2015-08-07 12:21:16', '2015-11-26 14:59:47', '0B5', '', '', '001', 1, 'y'),
('eaf2691976', '001', 'app/data/documents/eaf2691976.ini', '', '2015-08-07 12:21:16', NULL, '001', '7c4f86', NULL, '001', 1, 'n'),
('f6b2ae1ae9', '001', 'data/documents/f6b2ae1ae9.jpg', '', '2015-08-07 12:21:16', '2015-10-14 16:56:34', '0B5', 'DB02D4', '', '001', 1, 'n'),
('f8a6ea176a', '85F', 'app/data/documents/f8a6ea176a.jpg', '', '2015-08-07 19:48:39', '2015-10-14 17:00:01', '001', '', '', '001', 1, 'n'),
('fc733d74d2', '001', 'app/data/documents/fc733d74d2.ini', '', '2015-08-07 12:21:16', NULL, '001', '', NULL, '001', 1, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `document_status`
--

CREATE TABLE IF NOT EXISTS `document_status` (
  `doc_status_id` varchar(3) NOT NULL COMMENT 'all IDs have lenght 3',
  `doc_status_name` varchar(30) NOT NULL,
  `doc_status_description` text NOT NULL,
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_status`
--

INSERT INTO `document_status` (`doc_status_id`, `doc_status_name`, `doc_status_description`, `intranet_id`) VALUES
('001', 'Verification', 'The document is still under the progress', 1),
('002', 'Approved', 'Document is approved', 1),
('0B5', 'Rejected', 'Document is rejected', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_type`
--

CREATE TABLE IF NOT EXISTS `doc_type` (
  `doc_type_id` varchar(3) NOT NULL,
  `doc_type_name` varchar(30) NOT NULL,
  `doc_type_description` text NOT NULL,
  `doc_type_duration` int(11) DEFAULT NULL COMMENT 'Duration in days. NULL when duration is unlimited',
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_type`
--

INSERT INTO `doc_type` (`doc_type_id`, `doc_type_name`, `doc_type_description`, `doc_type_duration`, `intranet_id`) VALUES
('001', 'letter', 'Default document type', NULL, 1),
('12A', 'Invitation', 'Invitation to a particular event', 2, 1),
('85F', 'Special Exam', 'Special Exam', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE IF NOT EXISTS `function` (
  `function_id` int(1) NOT NULL,
  `function_name` varchar(30) NOT NULL,
  `function_description` text NOT NULL,
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`function_id`, `function_name`, `function_description`, `intranet_id`) VALUES
(1, 'administrator', 'User is the system administrator', 0),
(2, 'manager', 'User is the sytem manager', 0),
(3, 'internal', 'User works inside the intranet', 0),
(4, 'anonymous', 'User is any outsider', 0);

-- --------------------------------------------------------

--
-- Table structure for table `intranet`
--

CREATE TABLE IF NOT EXISTS `intranet` (
  `intranet_id` int(11) NOT NULL,
  `intranet_name` varchar(30) NOT NULL DEFAULT 'lemon' COMMENT 'Name of company using lemon',
  `logo_path` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intranet`
--

INSERT INTO `intranet` (`intranet_id`, `intranet_name`, `logo_path`) VALUES
(1, 'COMPANY', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msg_id` varchar(10) NOT NULL,
  `msg_sender_user_id` varchar(6) NOT NULL,
  `msg_receiver_user_id` varchar(6) NOT NULL,
  `msg_body` text NOT NULL,
  `seen` varchar(1) NOT NULL COMMENT 'y/n',
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` varchar(3) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `shared` varchar(1) NOT NULL DEFAULT 'n',
  `role_description` text NOT NULL,
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `shared`, `role_description`, `intranet_id`) VALUES
('001', 'Reception', 'y', 'Receives primarily documents sent by anonymous users', 1),
('002', 'Private', 'n', 'A user whose account is not shared', 1),
('003', 'anonymous', 'n', 'Any external user who is not part of the company', 1),
('004', 'Administrator', 'n', 'System administrator', 1),
('B26', 'HOD Computer Science', 'y', 'Head of Department of Computer science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` varchar(10) NOT NULL,
  `creator_role_id` varchar(6) NOT NULL,
  `subject` varchar(125) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `document_id` int(11) NOT NULL COMMENT 'Optional',
  `started` varchar(1) NOT NULL DEFAULT 'n' COMMENT 'y/n',
  `date_closed` date NOT NULL,
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `creator_role_id`, `subject`, `description`, `start_date`, `end_date`, `document_id`, `started`, `date_closed`, `intranet_id`) VALUES
('kdfjhvf', '', 'I love this', '', '0000-00-00', '0000-00-00', 0, 'n', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(10) NOT NULL COMMENT 'Id made of six characters',
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `img_path` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `function_id` int(1) NOT NULL DEFAULT '3' COMMENT '3 is deafult value as internal user',
  `role_id` varchar(3) DEFAULT NULL,
  `branch_id` varchar(3) NOT NULL,
  `acc_status` int(1) NOT NULL DEFAULT '1',
  `session` int(1) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `deleted` varchar(1) NOT NULL DEFAULT 'n' COMMENT 'y/n',
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `img_path`, `phone`, `function_id`, `role_id`, `branch_id`, `acc_status`, `session`, `login_time`, `logout_time`, `deleted`, `intranet_id`) VALUES
('08c556bc02', 'Eric', 'Johnson', 'asericjohnson@gmail.com', '', '', '+250786035472', 4, '003', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'n', 1),
('08DF97', 'Romalice', 'Ishimwe', 'romalice91@gmail.com', 'lemon', 'data/user_data/image08DF97.jpg', '+250787362618', 3, '001', '001', 1, 1, '2015-12-07 03:12:11', '2015-12-07 02:12:03', 'n', 1),
('123456', 'Lemon', 'Admin', 'admin@lemon.domain', '000000', '', '+250787362618', 1, '004', '001', 1, 0, '2015-07-23 04:18:06', '0000-00-00 00:00:00', 'n', 1),
('7c4f86183a', 'Romalice', 'Ishimwe', 'romalice@hexakomb.com', '', '', '+268125562514', 4, '003', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'n', 1),
('80E23C', 'Olukorede', 'Oyewoga', 'olukorede.oyewoga@upstreamsystems.com', 'lemon', '', '+256245875568', 3, '001', '001', 1, 1, '2015-12-07 02:12:33', '0000-00-00 00:00:00', 'n', 1),
('B6D0B8', 'Richard', 'Alexis', 'ndalexis04@gmail.com', '000000', '', '+250788418998', 3, '002', '001', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'n', 1),
('DB02D4', 'Kagarama Kagz', 'J. Baptist', 'kagaramaj@yahoo.fr', 'lemon', 'data/user_data/imageDB02D4.jpg', '+250782066968', 3, '001', '001', 1, 0, '2015-12-07 02:12:05', '2015-12-07 02:12:24', 'n', 1),
('f8a6ea176a', 'Jules', 'Udahemuka', 'udahegiles@gmail.com', '', '', '', 4, '003', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE IF NOT EXISTS `user_task` (
  `task_id` varchar(10) NOT NULL,
  `user_id` varchar(6) NOT NULL,
  `started` varchar(1) NOT NULL COMMENT 'y/n',
  `closed` varchar(1) NOT NULL COMMENT 'y/n',
  `intranet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `document_status`
--
ALTER TABLE `document_status`
  ADD PRIMARY KEY (`doc_status_id`),
  ADD UNIQUE KEY `status_name` (`doc_status_name`);

--
-- Indexes for table `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`doc_type_id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`function_id`),
  ADD UNIQUE KEY `function_name` (`function_name`);

--
-- Indexes for table `intranet`
--
ALTER TABLE `intranet`
  ADD PRIMARY KEY (`intranet_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `function_id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `intranet`
--
ALTER TABLE `intranet`
  MODIFY `intranet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
