-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 08:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peertrading`
--
CREATE DATABASE IF NOT EXISTS `peertrading` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `peertrading`;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `sentfrom` int(11) NOT NULL,
  `sentto` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `senton` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `followid` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `followee` int(11) NOT NULL,
  `followdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `followindicator` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemdescription` varchar(500) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `picture2` varchar(1000) NOT NULL,
  `picture3` varchar(1000) NOT NULL,
  `uploaddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `itemname`, `itemdescription`, `picture`, `picture2`, `picture3`, `uploaddate`, `userid`, `views`) VALUES
(1, 'iPhone 6', 'Brand: Apple\r\nColor: White\r\nDisplay: Retina\r\nCategory: Electronics\r\nMemory: 4GB\r\nStorage: 64GB\r\nFront Camera: 8MP\r\nRear Camera: 12MP\r\n', '../img/iphone6.jpg', '../img/iphone62.jpg', '../img/iphone63.jpg', '2017-03-19 00:50:38', 1, 2),
(2, 'Android Textbook', 'Author: Mark L. Murphy\r\nCategory: Books\r\nCondition: Used\r\n', '../img/android.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 00:52:43', 1, 1),
(3, 'American Football', 'Category: Sports\r\nCondition: Used', '../img/football.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 00:54:13', 1, 1),
(4, 'Webcam', 'Brand: Logitech\r\nCategory: Electronics\r\nColor: Black\r\nQuality: 1080p\r\nCondition: New', '../img/webcam.png', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:24:26', 1, 2),
(5, 'Soccer Ball', 'Category: Sports\r\nCondition: Used\r\nColor: Black and White', '../img/soccerball.png', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 00:58:12', 2, 2),
(6, 'iPhone Charger', 'Brand: Apple\r\nCategory: Electronics\r\nCondition: Used', '../img/iphonecharger.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 00:59:24', 2, 0),
(7, 'Data Structures Book', 'Author: Dr. Noel Kalicharan\r\nCategory: Books\r\nCondition: Used', '../img/datastructuresinc.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:00:09', 2, 0),
(8, 'COMP 3000 Book', 'Title: Design and Analysis of Algorithms\r\nAuthor: Anany Levitin\r\nCategory: Books\r\nCondition: Used', '../img/comp3000.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:03:11', 3, 2),
(9, 'Computer Architecture Book ', 'Title: Computer Organization and Architecture \r\nAuthor: William Stallings\r\nCondition: Used', '../img/computerarchitecture.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:06:25', 3, 0),
(10, 'Professional Ethics and Law Notes', 'Category: Other\r\nCourse: INFO 3425\r\nSemester: Two 2016/2017', '../img/notes.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:08:20', 3, 1),
(11, 'Object Oriented Programming Book', 'Title: An Introduction to Object Oriented Programming with Java\r\nAuthor: C. Thomas Wu\r\nCategory: Books\r\nCondition: New\r\n', '../img/oop.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:10:38', 4, 0),
(12, 'Macbook Air', 'Brand: Apple\r\nCategory: Electronics\r\nMemory: 12 GB\r\nStorage: 128GB SSD\r\nProcessor: Intel Core i7, with Turbo Boost up to 3.6 GHz', '../img/macbookair.jpe', '../img/macbookair2.jpe', '../img/macbookair3.jpg', '2017-03-19 01:13:08', 4, 4),
(13, 'Safety Helmet', 'Category: Safety\r\nColor: Yellow\r\nCondition: Large', '../img/safetyhelmet.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:14:37', 4, 3),
(14, 'Lab Coat', 'Category: Safety\r\nColor: White\r\nCondition: New', '../img/labcoat.JPG', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:15:39', 4, 1),
(15, 'Networking Textbook', 'Title: Computer Networking, A Top-Down Approach\r\nAuthor: Kurose & Ross\r\nCondition: Used\r\n', '../img/networking.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:17:58', 5, 0),
(16, 'Safety Glasses', 'Category: Safety\r\nSize: fits all\r\nCondition: New', '../img/saveglasses.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:19:45', 5, 0),
(17, 'Pixel', 'Brand: Google\r\nColor: White\r\nCondition: Used\r\nMemory: 4GB\r\nCapacity: 64GB\r\nScreen size: 5.0 inches', '../img/googlepixel.png', '../img/googlepixel2.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:21:12', 5, 4),
(18, 'Wireless Mouse', 'Brand: Logitech\r\nColor: Black\r\nCondition: Used\r\nCategory: Electronics', '../img/mouse.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:22:42', 5, 1),
(19, 'HP Envy Laptop', 'Brand: Hewlett Packard\r\nColor: Silver\r\nCategory: Electronics\r\nCondition: Used\r\nMemory: 12GB\r\nStorage: 1TB\r\nProcess: Intel i7 5th Generation 3.7Ghz', '../img/hpenvy.jpg', '../img/hpenvy2.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 00:56:17', 1, 5),
(20, 'Copy Paper', 'Category: Stationery\r\nCondition: New\r\nBrand: Xerox\r\n', '../img/copypaper.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:26:23', 3, 0),
(21, 'S7 Edge', 'Brand: Samsung\r\nCategory: Electronics\r\nColor: Gold\r\nCondition: Used\r\nMemory: 4GB\r\nStorage: 128GB', '../img/samsung3.jpg', '../img/samsung2.jpg', '../img/samsung.jpg', '2017-03-19 01:28:03', 2, 8),
(22, 'Power Bank', 'Brand: EliveBuy\r\nCondition: Used\r\nColor: White\r\n10,400mAh', '../img/powerbank.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:30:38', 4, 2),
(23, 'Safety Boots', 'Category: Safety\r\nCondition: Used\r\nSize: 11\r\nBrand: Amblers Safety', '../img/safetyboots.jpg', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:31:46', 2, 2),
(24, 'Headphones', 'Brand: Beats\r\nColor: Red\r\nCategory: Electronics\r\nCondition: Used', '../img/headphones.png', '../img/../img/defaultitemimage.jpg', '../img/../img/defaultitemimage.jpg', '2017-03-19 01:33:11', 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `requester` int(11) NOT NULL,
  `item2` int(11) NOT NULL,
  `requestercontact` varchar(12) NOT NULL,
  `requestee` int(11) NOT NULL,
  `item` int(10) NOT NULL,
  `decision` tinyint(1) DEFAULT NULL,
  `timerequested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

DROP TABLE IF EXISTS `saved`;
CREATE TABLE `saved` (
  `savedid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemowner` int(11) NOT NULL,
  `saveddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `savedindicator` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

DROP TABLE IF EXISTS `trade`;
CREATE TABLE `trade` (
  `tradeid` int(11) NOT NULL,
  `requestid` int(11) NOT NULL,
  `tradedate` varchar(50) NOT NULL,
  `tradelocation` varchar(100) NOT NULL,
  `suggestedlocation` varchar(100) NOT NULL,
  `locationdecision` tinyint(1) NOT NULL,
  `requestercontact` varchar(20) NOT NULL,
  `requesteecontact` varchar(20) NOT NULL,
  `requesterfeedbackrating` decimal(11,1) NOT NULL,
  `requesterfeedbackcomment` varchar(1000) NOT NULL,
  `requesterfeedbackindicator` tinyint(1) NOT NULL DEFAULT '0',
  `requesteefeedbackrating` decimal(11,1) NOT NULL,
  `requesteefeedbackcomment` varchar(1000) NOT NULL,
  `requesteefeedbackindicator` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sQuestion` varchar(100) NOT NULL,
  `sAnswer` varchar(100) NOT NULL,
  `profilepicture` varchar(1000) DEFAULT '../img/defaultPP.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `telephone`, `password`, `sQuestion`, `sAnswer`, `profilepicture`) VALUES
(1, 'micmcm', 'Mickel', 'McMillan', 'mickelmcmillan@gmail.com', '868-378-1234', '6918950f89321712a8641620423d8c7d25951c0c', 'food', '31dda2aa971d428a60d8e2b6d35a7aec0c5a2193', '../img/defaultPP.jpg'),
(2, 'mikmon', 'Mikael', 'Montoute', 'mikaelmontoute@email.com', '868-378-1111', '16331e4442209ff309047eaec83430646490f038', 'sport', '2d27b62c597ec858f6e7b54e7e58525e6a95e6d8', '../img/defaultPP.jpg'),
(3, 'jamwin', 'Jamal', 'Winchester', 'jamalwinchester@email.com', '868-378-2222', '4e575edbd14f3eaf37744f7dea83e58eb2b0fdcc', 'food', 'bb5ad7479828c1fe7c2271d75b2a3064bc58b0b3', '../img/defaultPP.jpg'),
(4, 'kylric', 'Kyle', 'Richardson', 'kylerichardson@email.com', '868-378-3333', '164113a91b40b39076494d9c761354de7e7b53f3', 'food', '6915b14cc28d7c49e0226fb79d98502e97f6b97f', '../img/defaultPP.jpg'),
(5, 'danarj', 'Danielle', 'Arjoon', 'daniellearjoon@email.com', '868-378-4444', '56cd9a08899246b193d89fa4f9ef489c01558252', 'sport', 'bb500fcedfa3bb79ec1ebcfb3631364e5ab49dda', '../img/defaultPP.jpg'),
(6, 'cyncud', 'Ms. Cudjoe', '-Lecturer', 'cynthiacudjoe@email.com', '868-378-5555', '6d499334fac509bd32e3be765e337f2399735575', 'food', '35c4cdb50a9a6b4475da4a66d955ef2a9e1acc39', '../img/samsung.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`followid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`savedid`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`tradeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `followid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `savedid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `tradeid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
