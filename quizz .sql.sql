-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 02:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'np1646122@gmail.com', 'xyzwqwer');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5b141d712647f', '5b141d71485b9'),
('5b141d718f873', '5b141d71978be'),
('5b141d71ddb46', '5b141d71e5f43'),
('5b141d721a738', '5b141d7222884'),
('5b141d7260b7d', '5b141d7268b9a'),
('5b141d72a6fa1', '5b141d72aefcb'),
('5b141d72d7a1c', '5b141d72dfa7b'),
('5b141d731429b', '5b141d731c234'),
('5b141d7345176', '5b141d734cd1b'),
('5b141d737ddfc', '5b141d73858df'),
('5b1422651fdde', '5b1422654ab51'),
('5b14226574ed5', '5b1422657d052'),
('5b142265b5d08', '5b142265c09fa'),
('5b1422661d93f', '5b14226635e0d'),
('5b14226663cf4', '5b1422666bf2b'),
('5b1422669481b', '5b1422669c8dc'),
('5b142266c525c', '5b142266cd353'),
('5b14226711d91', '5b14226719fb7'),
('5b1422674286d', '5b1422674aa01'),
('5b1422677371f', '5b1422677b3e9');

-- --------------------------------------------------------

--
-- Table structure for table `doubt`
--

CREATE TABLE `doubt` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `query` varchar(200) NOT NULL,
  `reply` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doubt`
--

INSERT INTO `doubt` (`name`, `email`, `subject`, `query`, `reply`) VALUES
('neha', 'poiu@gmail.com', 'cpp', 'heelooo', 'yes'),
('iv', 'pd22122001@gmail.com', 'php', 'php why?', 'imp');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `email` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`email`, `title`, `file_name`, `file_type`, `file_size`, `file_path`, `created_at`) VALUES
('poiu@gmail.com', 'xsaok', 'que..1.jpeg', 'image/jpeg', 93146, 'upload/que..1.jpeg', '2023-05-14 10:41:25'),
('poiu@gmail.com', 'php', 'crud (2).php', 'application/octet-stream', 3070, 'upload/crud (2).php', '2023-05-14 14:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `right`, `wrong`, `date`) VALUES
('np1646122@gmail.com', '5b141b8009cf0', 27, 10, 8, 2, '2018-06-03 16:56:00'),
('nehay123@gmail.com', '5b141b8009cf0', 22, 10, 8, 2, '2018-06-03 16:59:06'),
('dishap8@gmail.com', '5b141f1e8399e', 26, 10, 9, 1, '2018-06-03 17:17:26'),
('abcs@gmail.com', '5b141f1e8399e', 26, 10, 9, 1, '2023-05-06 05:11:31'),
('abcs@gmail.com', '5b141f1e8399e', 26, 10, 9, 1, '2023-05-06 05:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `email` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`email`, `title`, `file_name`, `file_type`, `file_size`, `file_path`, `created_at`) VALUES
('', 'cpp', 'que..1.jpeg', 'image/jpeg', 93146, 'upload/que..1.jpeg', '2023-05-14 10:09:50'),
('', 'php', 'crud (2).php', 'application/octet-stream', 3070, 'upload/crud (2).php', '2023-05-14 10:22:49'),
('', 'cp', 'que..1.jpeg', 'image/jpeg', 93146, 'upload/que..1.jpeg', '2023-05-14 10:24:19'),
('', 'cpp', 'que..1.jpeg', 'image/jpeg', 93146, 'upload/que..1.jpeg', '2023-05-14 10:35:45'),
('', 'cpp', 'que..1.jpeg', 'image/jpeg', 93146, 'upload/que..1.jpeg', '2023-05-14 10:40:45'),
('', 'cpp', 'que..1.jpeg', 'image/jpeg', 93146, 'upload/que..1.jpeg', '2023-05-14 10:41:03'),
('', 'cpp.....', 'que..1.jpeg', 'image/jpeg', 93146, 'upload/que..1.jpeg', '2023-05-14 14:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5b141d712647f', 'Personal Home Page', '5b141d71485b9'),
('5b141d712647f', 'Private Home Page', '5b141d71485dc'),
('5b141d712647f', 'Pretext Hypertext Processor', '5b141d71485e0'),
('5b141d712647f', 'Preprocessor Home Page', '5b141d71485e4'),
('5b141d718f873', 'turns domain names into IP addreddesses', '5b141d71978be'),
('5b141d718f873', 'IP truns in to domains name', '5b141d71978cc'),
('5b141d718f873', 'all above', '5b141d71978d1'),
('5b141d718f873', 'not any option is correct ', '5b141d71978d4'),
('5b141d71ddb46', '.html', '5b141d71e5f2b'),
('5b141d71ddb46', '.ph', '5b141d71e5f3c'),
('5b141d71ddb46', '.php', '5b141d71e5f43'),
('5b141d71ddb46', '.xml', '5b141d71e5f48'),
('5b141d721a738', 'for loop', '5b141d7222820'),
('5b141d721a738', 'do-while loop', '5b141d722282f'),
('5b141d721a738', 'foreach loop', '5b141d7222880'),
('5b141d721a738', 'All of the above', '5b141d7222884'),
('5b141d7260b7d', 'echo (â€œHello Worldâ€);', '5b141d7268b8a'),
('5b141d7260b7d', 'print (â€œHello Worldâ€);', '5b141d7268b95'),
('5b141d7260b7d', 'printf (â€œHello Worldâ€);', '5b141d7268b98'),
('5b141d7260b7d', 'All of the above', '5b141d7268b9a'),
('5b141d72a6fa1', 'file()', '5b141d72aefcb'),
('5b141d72a6fa1', 'arr_file()', '5b141d72aefd8'),
('5b141d72a6fa1', 'arrfile()', '5b141d72aefdc'),
('5b141d72a6fa1', 'file_arr()', '5b141d72aefe0'),
('5b141d72d7a1c', 'Magic Function', '5b141d72dfa7b'),
('5b141d72d7a1c', 'Inbuilt Function', '5b141d72dfa85'),
('5b141d72d7a1c', 'Default Function', '5b141d72dfa88'),
('5b141d72d7a1c', 'User Defined Function', '5b141d72dfa8b'),
('5b141d731429b', 'CREATE TABLE table_name (column_name column_type);', '5b141d731c234'),
('5b141d731429b', 'CREATE table_name (column_type column_name);', '5b141d731c242'),
('5b141d731429b', 'CREATE table_name (column_name column_type);', '5b141d731c248'),
('5b141d731429b', 'CREATE TABLE table_name (column_type column_name);', '5b141d731c24b'),
('5b141d7345176', 'get_array() and get_row()', '5b141d734cd10'),
('5b141d7345176', 'fetch_array() and fetch_row()', '5b141d734cd1b'),
('5b141d7345176', 'get_array() and get_column()', '5b141d734cd1d'),
('5b141d7345176', 'fetch_array() and fetch_column()', '5b141d734cd20'),
('5b141d737ddfc', 'explode()', '5b141d73858d0'),
('5b141d737ddfc', 'implode()', '5b141d73858df'),
('5b141d737ddfc', 'concat()', '5b141d73858e3'),
('5b141d737ddfc', 'concatenate()', '5b141d73858e8'),
('5b1422651fdde', '32 bits', '5b1422654ab3a'),
('5b1422651fdde', '128 bytes', '5b1422654ab48'),
('5b1422651fdde', '64 bits', '5b1422654ab4d'),
('5b1422651fdde', 'compiler depends', '5b1422654ab51'),
('5b14226574ed5', 'reuseability', '5b1422657d052'),
('5b14226574ed5', 'abstrac', '5b1422657d05f'),
('5b14226574ed5', 'data-hiding', '5b1422657d064'),
('5b14226574ed5', 'all above', '5b1422657d069'),
('5b142265b5d08', 'constructore', '5b142265c09e3'),
('5b142265b5d08', 'destrucotre', '5b142265c09f5'),
('5b142265b5d08', 'A & B both', '5b142265c09fa'),
('5b142265b5d08', 'all functions', '5b142265c09ff'),
('5b1422661d93f', 'activation recoerd', '5b14226635df5'),
('5b1422661d93f', 'stack', '5b14226635e04'),
('5b1422661d93f', 'heap', '5b14226635e09'),
('5b1422661d93f', 'not any', '5b14226635e0d'),
('5b14226663cf4', 'referance', '5b1422666bf2b'),
('5b14226663cf4', 'pointer', '5b1422666bf39'),
('5b14226663cf4', 'address', '5b1422666bf3e'),
('5b14226663cf4', 'all above', '5b1422666bf42'),
('5b1422669481b', 'c programing language', '5b1422669c8dc'),
('5b1422669481b', 'java', '5b1422669c8ea'),
('5b1422669481b', 'python', '5b1422669c8ef'),
('5b1422669481b', 'rust', '5b1422669c8f3'),
('5b142266c525c', 'no', '5b142266cd353'),
('5b142266c525c', 'yes', '5b142266cd361'),
('5b142266c525c', 'dont know', '5b142266cd365'),
('5b142266c525c', 'not any option is correct', '5b142266cd369'),
('5b14226711d91', 'try', '5b14226719fa0'),
('5b14226711d91', 'catch', '5b14226719fb1'),
('5b14226711d91', 'A & B both', '5b14226719fb7'),
('5b14226711d91', 'throw', '5b14226719fbb'),
('5b1422674286d', '_var', '5b1422674a9ee'),
('5b1422674286d', '1num', '5b1422674aa01'),
('5b1422674286d', 'MU_qwe', '5b1422674aa06'),
('5b1422674286d', 'num1', '5b1422674aa0b'),
('5b1422677371f', 'new', '5b1422677b3e9'),
('5b1422677371f', 'vectore', '5b1422677b3f7'),
('5b1422677371f', 'delete', '5b1422677b3fc'),
('5b1422677371f', 'create', '5b1422677b400');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5b141b8009cf0', '5b141d712647f', 'What does PHP stand for?', 4, 1),
('5b141b8009cf0', '5b141d718f873', 'What Is The Prurpose of DNS?', 4, 2),
('5b141b8009cf0', '5b141d71ddb46', 'PHP files have a default file extension of.', 4, 3),
('5b141b8009cf0', '5b141d721a738', 'Which of the looping statements is/are supported by PHP?', 4, 4),
('5b141b8009cf0', '5b141d7260b7d', 'Which of the following PHP statements will output Hello World on the screen?', 4, 5),
('5b141b8009cf0', '5b141d72a6fa1', 'Which one of the following function is capable of reading a file into an array?', 4, 6),
('5b141b8009cf0', '5b141d72d7a1c', 'A function in PHP which starts with __ (double underscore) is know as..', 4, 7),
('5b141b8009cf0', '5b141d731429b', 'Which one of the following statements is used to create a table?', 4, 8),
('5b141b8009cf0', '5b141d7345176', 'Which of the methods are used to manage result sets using both associative and indexed arrays?', 4, 9),
('5b141b8009cf0', '5b141d737ddfc', 'Which one of the following functions can be used to concatenate array elements to form a single delimited string?', 4, 10),
('5b141f1e8399e', '5b1422651fdde', 'Size of Int in Cpp?', 4, 1),
('5b141f1e8399e', '5b14226574ed5', 'INheritance MEANS?', 4, 2),
('5b141f1e8399e', '5b142265b5d08', 'Which have NO Return Type?', 4, 3),
('5b141f1e8399e', '5b1422661d93f', 'Vectores Elements Are Store in?', 4, 4),
('5b141f1e8399e', '5b14226663cf4', 'Copy Construcotre Have ______ As  Argument?', 4, 5),
('5b141f1e8399e', '5b1422669481b', 'CPP Compiler Written in?', 4, 6),
('5b141f1e8399e', '5b142266c525c', 'All Namespace Have Name ? ', 4, 7),
('5b141f1e8399e', '5b14226711d91', 'Which of the following have block?', 4, 8),
('5b141f1e8399e', '5b1422674286d', '- Choose the invalid identifier from the below', 4, 9),
('5b141f1e8399e', '5b1422677371f', 'which keyword use to create dynamic memory ', 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `right` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `right`, `wrong`, `total`, `date`) VALUES
('5b141b8009cf0', 'Php & Mysqli', 3, 1, 10, '2018-06-03 16:46:56'),
('5b141f1e8399e', 'CPP', 3, 1, 10, '2023-05-06 13:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('priyanka@gmail.com', 22, '2018-06-03 16:59:06'),
('abcs@gmail.com', 26, '2023-05-06 05:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `study_content`
--

CREATE TABLE `study_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study_content`
--

INSERT INTO `study_content` (`id`, `title`, `content`) VALUES
(1, 'cpp', 'cpp is oop lan.'),
(2, 'cpp', 'cpp is oop'),
(3, 'cpp', 'cpp is opp\r\n'),
(4, 'cpp', 'cpp is opp\r\n'),
(5, 'cedw', 'few'),
(6, 'cd', 'cde'),
(7, 'cpp', 'cpp opp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `college`, `email`, `password`) VALUES
('abcd', 'qwertyuiop', 'abcs@gmail.com', '12345'),
('iv', '12345', 'pd22122001@gmail.com', '12345'),
('poiu', 'poiu', 'poiu@gmail.com', 'poiu'),
('Priyanka Pattnaik', 'National Institute of Science and Technology, Berhampur', 'priyanka@gmail.com', 'pinka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `study_content`
--
ALTER TABLE `study_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `study_content`
--
ALTER TABLE `study_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
