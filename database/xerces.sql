-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 06:08 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xerces`
--

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `title`, `content`, `type`) VALUES
(2, 'test-sagar', '<p>saas</p>', 2),
(3, 'nm', '<p>nm,n,m</p>', 3);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `type`, `name`, `image`, `content`) VALUES
(1, 1, 'Test', 'apple_iphone.jpg', '<p>This is tst an it will be fine This is tst an it will be fine This is tst an it will be fine This is tst an it will be fine<br />\r\nThis is tst an it will be fine This is tst an it will be fine This is tst an it will be fine This is tst an it will be fine</p>\r\n\r\n<p>&nbsp;</p>'),
(2, 1, 'test', '3147_7.jpeg', 'test'),
(3, 2, 'Ketan', '17960_9.jpg', 'This i s ketan');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`, `type`) VALUES
(2, 'jhghj', 'avatar_blank_jpg.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `type`, `name`, `image`, `content`) VALUES
(1, 2, 'Portfolio 1', '1.jpeg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `content`, `type`) VALUES
(1, 'hgfgh', 'fghgh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `page_type` int(11) NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `page_type`, `image`, `content`, `type`) VALUES
(1, 1, 'armenia_aragats.jpg', '<p>sghjgashdgsjaghjdgashjas</p>', 1),
(2, 1, 'avatar_blank_jpg.png', '<p>fghfghfghfcvxcvxvvvvvvvvvvvvvvv</p>', 2),
(3, 1, '11.png', '<p>ghgfghfgh</p>', 3),
(4, 1, 'contact1.jpg', '<p>gfhfgfhfh</p>', 4),
(5, 2, '', 'fgfghfghfh', 1),
(6, 2, '', '<p>dfgdshjgsahjdghasgdshgdsajgdshgashfgdfg</p>', 2),
(7, 2, '', '<p>ramani</p>', 3),
(8, 2, '', '<p>sagar</p>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `usr_id` int(11) UNSIGNED NOT NULL,
  `usr_first_name` varchar(30) NOT NULL,
  `usr_last_name` varchar(30) NOT NULL,
  `usr_email` varchar(40) NOT NULL,
  `usr_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`usr_id`, `usr_first_name`, `usr_last_name`, `usr_email`, `usr_password`) VALUES
(2, 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
(8, 'sagar', 'ramani', 'sagarr@webplanex.com', '21232f297a57a5a743894a0e4a801fc3'),
(9, 'sagar', 'ramani', 'sagar@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'sagar', 'ramani', 'saifu@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(11, 'abc', 'asw', 'asd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'gdf', 'asw', 'sarfarj@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'sa', 'sas', 'sar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'sa', 'sas', 'qwe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'sarfaraj', 'makvana', 'sarfarajm@webplanex.com', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'Sarfaraj', 'Makvana', 'sarfaraj_makvana@yahoo.com', ''),
(18, 'xcvcx', 'xcv', 'admicxvn@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_image` text NOT NULL,
  `content` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `client_name`, `client_image`, `content`, `type`) VALUES
(4, 'test', 'Sazu-Beach_Hyogo.jpg', '<p>hjkhjaskhjaskhjdk</p>', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `usr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
