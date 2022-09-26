-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2022 at 06:25 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestseox_Musiqhertz`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_mutliple_release`
--

CREATE TABLE `create_mutliple_release` (
  `id` int(32) NOT NULL,
  `track_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `song_name` varchar(255) DEFAULT NULL,
  `upc` varchar(100) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `p_line` varchar(100) DEFAULT NULL,
  `sub_genre` varchar(100) DEFAULT NULL,
  `c_line` varchar(100) DEFAULT NULL,
  `production_year` varchar(100) DEFAULT NULL,
  `production_catalogue` varchar(100) DEFAULT NULL,
  `release_date` varchar(50) DEFAULT NULL,
  `label_name` varchar(100) DEFAULT NULL,
  `primaryartist` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `composer` varchar(100) DEFAULT NULL,
  `thumbimgfile` varchar(255) DEFAULT NULL,
  `exclusive_date` varchar(50) DEFAULT NULL,
  `preorder_date` varchar(50) DEFAULT NULL,
  `deloyment` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `name_of_owner` varchar(70) DEFAULT NULL,
  `pan_card` varchar(70) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL,
  `gst` varchar(70) DEFAULT NULL,
  `phone_no` varchar(70) DEFAULT NULL,
  `aadhar_number` varchar(70) DEFAULT NULL,
  `royality_information` varchar(70) DEFAULT NULL,
  `userid` int(50) DEFAULT NULL,
  `status` int(32) DEFAULT NULL,
  `isdeleted` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_mutliple_release`
--

INSERT INTO `create_mutliple_release` (`id`, `track_id`, `date`, `title`, `song_name`, `upc`, `genre`, `p_line`, `sub_genre`, `c_line`, `production_year`, `production_catalogue`, `release_date`, `label_name`, `primaryartist`, `author`, `composer`, `thumbimgfile`, `exclusive_date`, `preorder_date`, `deloyment`, `country`, `name_of_owner`, `pan_card`, `address`, `gst`, `phone_no`, `aadhar_number`, `royality_information`, `userid`, `status`, `isdeleted`) VALUES
(25, 'gdkgks63288e4083e81', '2022-09-19', 'gdkgks', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0),
(26, 'Anarkali632de11a0f73b', '2022-09-23', 'Anarkali', 'Anarkali', '', 'R&B and soul', 'Doopaadoo', 'R&B', 'Doopaadoo', '2022', '101', '2022-10-07', 'Doopaadoo', 'Hariharan,Vandana Srinivas,', 'Dhamayandhi,', 'ved shanker,', '632de319d5e82.jpeg', '', '', 'worldwide', 'worldwide', 'Mithran', 'BJSPB0381B', 'no 205 vgn temple town 13 sivan kovil street,thiruverkadu', '', '9500191182', '802230994617', '', 33, 1, 0),
(27, 'rangama632df41136f17', '2022-09-23', 'rangama', 'desingu', '', 'Blues', 'doopaadoo', 'blues', 'doopaadoo', '2022', '1', '2022-09-24', 'doopaadoo', 'haricharan,ved,', 'shamer,', 'shanker,', '632df4f6da37d.png', '2022-09-24', '2022-09-23', 'worldwide', 'worldwide', 'mithran', 'bjspb0381b', 'bgn temlpe town', '', '9500191182', '802230994617', '', 34, 1, 0),
(28, 'rangama632df41ccff20', '2022-09-23', 'rangama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kyc_document`
--

CREATE TABLE `kyc_document` (
  `id` int(20) NOT NULL,
  `user_refid` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankaccountnumber` varchar(50) NOT NULL,
  `ifsccode` varchar(50) NOT NULL,
  `idproof` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `isdeleted` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyc_document`
--

INSERT INTO `kyc_document` (`id`, `user_refid`, `name`, `bankname`, `bankaccountnumber`, `ifsccode`, `idproof`, `status`, `isdeleted`) VALUES
(7, 1, 'manivannan', 'sbi', '342324', 'sbi1234', '2.jpg', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(50) NOT NULL,
  `user_id` bigint(50) NOT NULL,
  `razorpay_id` varchar(100) NOT NULL,
  `amount` bigint(50) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `razorpay_id`, `amount`, `status`) VALUES
(4, 1, 'pay_JvKLqlalTUPIqz', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `songreleases`
--

CREATE TABLE `songreleases` (
  `id` int(30) NOT NULL,
  `track_id` varchar(30) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `song_url` varchar(255) NOT NULL,
  `primary_track_type` varchar(50) NOT NULL,
  `secondary_track_type` varchar(50) NOT NULL,
  `instrumental` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `primary_artist` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `composer` varchar(255) NOT NULL,
  `arranger` varchar(50) NOT NULL,
  `producer` varchar(50) NOT NULL,
  `p_line` varchar(50) NOT NULL,
  `production_year` varchar(30) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `ask_to_generate_an_irsc` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `subgenre` varchar(50) NOT NULL,
  `secondary_genre` varchar(50) NOT NULL,
  `parental_advisory` varchar(50) NOT NULL,
  `track_title_language` varchar(50) NOT NULL,
  `lyrics_language` varchar(50) NOT NULL,
  `lyrics` varchar(50) NOT NULL,
  `status` bigint(30) NOT NULL,
  `isdeleted` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songreleases`
--

INSERT INTO `songreleases` (`id`, `track_id`, `song_name`, `song_url`, `primary_track_type`, `secondary_track_type`, `instrumental`, `title`, `primary_artist`, `author`, `composer`, `arranger`, `producer`, `p_line`, `production_year`, `publisher`, `ask_to_generate_an_irsc`, `genre`, `subgenre`, `secondary_genre`, `parental_advisory`, `track_title_language`, `lyrics_language`, `lyrics`, `status`, `isdeleted`) VALUES
(19, 'Anarkali632de11a0f73b', '', 'song-632de41e65710.mp3', 'Music', '1', 'No', 'Anarkali', 'Haricharan,Vandana Srinivas,,', 'Dhamayandhi,,', 'ved shanker,,', 'nil', 'doopaadoo', 'doopaadoo', '2022', 'MusiqHertz', 'Yes', 'Easy listening', '', '', 'No', 'English', 'Tamil', '', 0, 0),
(20, 'rangama632df41136f17', '', 'song-632df52b46fe5.mp3', 'Music', '1', 'No', 'rangama', 'haricharan,ved,', 'shamer,', 'shanker,', '', 'doopaadoo productions', '', '', 'MusiqHertz', 'Yes', 'Blues', '', '', 'No', 'English', 'tamil', 'tamil in 1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(25) NOT NULL,
  `role` text NOT NULL,
  `phone` bigint(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `profileimg` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `verify` bigint(20) NOT NULL,
  `isdeleted` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `username`, `password`, `name`, `role`, `phone`, `email`, `profileimg`, `status`, `verify`, `isdeleted`) VALUES
(1, 'manivannan', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 'manivannan', 'admin', 987654321, 'manivannansb1988@gmail.com', '1403613576.png', 'Online now', 1, 0),
(33, 'test', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 'test', 'admin', 9876654321, 'test@gmail.com', 'profile-img-default.jpg', 'Online now', 1, 0),
(34, 'mithtag', 'c52a49fefc526d365aad917be0e0e2a112835261', 'mithran', 'user', 9500191182, 'mithtag@gmail.com', 'profile-img-default.jpg', 'Offline now', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_mutliple_release`
--
ALTER TABLE `create_mutliple_release`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_document`
--
ALTER TABLE `kyc_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songreleases`
--
ALTER TABLE `songreleases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_mutliple_release`
--
ALTER TABLE `create_mutliple_release`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kyc_document`
--
ALTER TABLE `kyc_document`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `songreleases`
--
ALTER TABLE `songreleases`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
