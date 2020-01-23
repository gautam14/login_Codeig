-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2020 at 07:10 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.3.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CI_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'Test', 'test', 'This is an test post for checking the functionality.'),
(2, 'Teen Fake News Poll on After School', 'teen-fake-news-poll-on-after-school', 'After School, the largest teen-focused social network, surveyed its users on the issue of fake news. Over several days, tens of thousands of high school students in all 50 states participated in the poll.'),
(3, 'How to prepare for CCPA with a data catalog', 'webinar-ccpa-prepare-data-catalog', 'The California Consumer Privacy Act (CCPA) takes effect in a few weeks. Several states have already strengthened their privacy regulations. Are you prepared?\r\n\r\nCCPA and other privacy regulations (like GDPR) introduce a host of new business challenges. Siloed data and disconnected processes make it incredibly difficult for data and analytics leaders to work toward compliance. \r\n\r\nData catalogs are a critical first step: they create a more complete, aligned understanding of what personal data exists in your organization today and how it’s used. As a result, you can act on a clear, informed data strategy. ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`) VALUES
(4, 'Tutorial', 'In this tutorial you will learn about jQuery Datatables plugin to create interactive and feature rich HTML tables with dynamic data. We will create Live Datatables to add, update and delete records with PHP and MySQL. We will handle to refresh Datatables when any record updated or delete from table.'),
(5, 'Tempdata', 'CodeIgniter also supports “tempdata”, or session data with a specific expiration time. After the value expires, or the session expires or is deleted, the value is automatically removed.\r\n\r\nSimilarly to flashdata, tempdata variables are regular session vars that are marked in a specific way under the ‘__ci_vars’ key (again, don’t touch that one).'),
(6, 'Note', 'This must be the last session-related operation that you do during the same request. All session data (including flashdata and tempdata) will be destroyed permanently and functions will be unusable during the same request after you destroy the session.'),
(7, 'Javascript sourced data', 'At times you will wish to be able to create a table from dynamic information passed directly to DataTables, rather than having it read from the document. This is achieved using the data option in the initialisation object, passing in an array of data to be used (like all other DataTables handled data, this can be arrays or objects using the columns.data option).'),
(8, 'Table tag', 'A table must be available on the page for DataTables to use. This examples shows an empty table element being initialising as a DataTable with a set of data from a Javascript array. The columns in the table are dynamically created based on the columns.title configuration option.'),
(10, 'Advanced initialisation', 'The configuration options offered by DataTables extend much further than the options shown in the basic initialisation of this documentation. Through combinations of the options available and the use of callbacks, DataTables is completely customisable and will fit into exactly what you need for your table display.');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `office` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `date` date NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `name`, `position`, `office`, `age`, `date`, `salary`) VALUES
(2, 'Sushil', 'Admin', 'US', 23, '2020-01-04', 120000),
(11, 'Dheeraj', 'Admin', 'UK', 36, '2020-01-03', 230000),
(13, 'Sourabh', 'Designer', 'Chandigarh', 29, '2019-01-30', 500000),
(15, 'Anuj', 'TL', 'India', 28, '2018-12-05', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_age`, `user_mobile`) VALUES
(1, 'sham', 'sham@gmail.com', '1234', 34, '3327843312'),
(2, 'Ehte', 'ehte@gmail.com', '123', 23, '7837687647'),
(3, 'ben', 'support@design.com', '123456789', 29, '9896989600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD KEY `id` (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
