-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2017 at 05:52 PM
-- Server version: 5.7.17-0ubuntu0.16.04.2
-- PHP Version: 5.6.30-10+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SOS`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangers`
--

CREATE TABLE `dangers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `location` geometry DEFAULT NULL,
  `radius` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dangers`
--

INSERT INTO `dangers` (`id`, `title`, `content`, `location`, `radius`, `created_at`, `updated_at`) VALUES
(1, 'danger1', 'test test', NULL, 0, '2017-04-15 15:49:00', '2017-04-15 15:49:00'),
(2, 'danger1', 'danger danger danger', NULL, 0, '2017-04-15 18:36:38', '2017-04-15 18:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `type` int(1) DEFAULT NULL COMMENT 'call: 1 message: 2',
  `del_flag` int(1) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `send_flag` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `title`, `content`, `type`, `del_flag`, `user_id`, `send_flag`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, NULL, NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \n', NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \nUser message: test test test test', NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \nUser message: test test test test', NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \nUser message: test response message', NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \nUser message: test response message', NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \nUser message: test response message', NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \nUser message: test response message', NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \n', NULL, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, NULL, 'GSMAT : 20 \nMessage : your user at longitude: 99.5555 and lattitude: 222.999 \n', NULL, 0, 20, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, NULL, 'GSMAT : 21 \nMessage : your user at longitude: 22 and lattitude: 222.999 \n', NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, NULL, NULL, NULL, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, NULL, 'GSMAT : 21 \nMessage : your user at longitude: 22 and lattitude: 222.999 \n', 1, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, NULL, 'GSMAT : 21 \nMessage : your user at longitude: 22 and lattitude: 222.999 \n', 1, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, NULL, 'GSMAT : 21 \nMessage : your user at longitude: 22 and lattitude: 222.999 \n', 1, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, NULL, 'GSMAT : 21 \nMessage : your user at longitude: 22 and lattitude: 222.999 \nUser message: test test test test', 2, 0, 21, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, NULL, 'GSMAT : 18 \nMessage : your user at longitude: 44 and lattitude: 223 \nUser message: test test test test', 2, 0, 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, NULL, 'GSMAT : 11 \nMessage : your user at longitude: 22 and lattitude: 222.999 \n', 1, 0, 11, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, NULL, 'GSMAT : 11 \nMessage : your user at longitude: 22 and lattitude: 222.999 \n', 1, 0, 11, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, NULL, 'GSMAT : 11 \nMessage : your user at longitude: 22 and lattitude: 222.999 \n', 1, 0, 11, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, NULL, 'GSMAT : 11 \nMessage : your user at longitude: 222.999 and lattitude: 22 \n', 1, 0, 11, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `publish_flag` int(1) NOT NULL DEFAULT '0' COMMENT 'publish: 0 unpublish: 1',
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `updated_at`, `publish_flag`, `url`) VALUES
(1, 'new', 'qwerasdfzxcv', '2017-04-15 18:44:45', '2017-04-15 18:44:45', 0, ''),
(2, 'new', 'qwerasdfzxcv', '2017-04-15 18:44:46', '2017-04-15 18:44:46', 0, ''),
(3, 'new', 'qwerasdfzxcv', '2017-04-15 18:44:47', '2017-04-15 18:44:47', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `schema_migrations`
--

CREATE TABLE `schema_migrations` (
  `version` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schema_migrations`
--

INSERT INTO `schema_migrations` (`version`) VALUES
('20170415131306'),
('20170415134948'),
('20170415150812');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `del_flag` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `location` geometry DEFAULT NULL,
  `device_token` varchar(255) NOT NULL,
  `os` int(1) NOT NULL COMMENT 'IOS: 0 Android:1',
  `gsmatcode` varchar(255) NOT NULL,
  `env_flag` int(1) NOT NULL COMMENT 'production:0 sandbox: 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `token`, `device_id`, `email`, `del_flag`, `created_at`, `updated_at`, `location`, `device_token`, `os`, `gsmatcode`, `env_flag`) VALUES
(11, 'nguyen13323', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$vUmp8MpCAIiXHNssGgjJZeS1LEEgya63JtKqXUNvK41u4HFIMO0oK', 'xxxxxxx', 'baby12232@yahoo.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '\0\0\0\0\0\0\0áŸŒ˜ﬂk@\0\0\0\0\0\06@', '$2y$10$Etd4zJ4/Cb6GjICrQGuzS.fwFypxaPD.kuqTlI3FSB4GsmHKtOK4e', 0, '', 0),
(12, 'ducanh', 'e19d5cd5af0378da05f63f891c7467af', '$2y$10$wvmjTDFpLlLb3vyFrJUc9.jwOv3g7oDVtnPsCXAZ82yw02CmtFgh.', '', 'anhduc@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', 0, '', 0),
(13, 'ducanh1', 'e19d5cd5af0378da05f63f891c7467af', '$2y$10$v23BH19pxR7YvoDFUcKaj.jBvke1aP0wqX2Xp3uVmfgYHjSRZiDCi', '', 'anhduc1@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', 0, '', 0),
(14, 'ducanh2', '25d55ad283aa400af464c76d713c07ad', '$2y$10$OW4R4MnBsUje7Kij8qTnP.O1hiGnrSrpIIxUEpYiqEmt10I89MwUu', '', 'anhduc2@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', 0, '', 0),
(15, 'ducanh3', '25d55ad283aa400af464c76d713c07ad', '$2y$10$dzhIhygEYXfOZWu6AMBNVuCdDnxCNqS.A/nxSHCt/b5GKJS.oxvhu', '', 'anhduc3@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', 0, '', 0),
(16, 'test', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$KwEnhjcPaqIqX.bbb4s4uewqqfe7.mQbB7hvw79wHZyfez7pjG4.a', '', 'nguyen112@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', 0, '', 0),
(17, 'nguyen221', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$LfD/dhXwTU.FhMCe4hjceeAyVXmK8Pv8ztLXzGIec9jeYGoKuGHuG', 'xxxxxxx', 'tes@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'zzzzzzzz', 0, '', 0),
(18, 'test1', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$U7tmBpxEDPOR4B08iY7t0egG.KFrFCKjv4NJISGcxLL2./I32qFzy', 'xxxxxxx', 'test1@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '\0\0\0\0\0\0\0\0\0\0\0\0\0F@\0\0\0\0\0‡k@', 'zzzzzzzz', 0, '', 0),
(19, 'test3', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$UPnOXxn94HMsFVDtOrioSOrVATt8q/Awk0z9VMnABfVuEYJOk7.5u', 'xxxxxxx', 'test3@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'zzzzzzzz', 0, '', 0),
(20, 'test4', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$5EVPmPHDWPdpdeQwvQMmgOatEnv.tfq7HXrW9IzOaji4VgAcA80ZW', 'xxxxxxx', 'test4@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '\0\0\0\0\0\0\0d;ﬂOç„X@áŸŒ˜ﬂk@', '$2y$10$Etd4zJ4/Cb6GjICrQGuzS.fwFypxaPD.kuqTlI3FSB4GsmHKtOK4e', 0, '', 0),
(21, 'nguyen221', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$mfA4Zxku2djrAmZxQuJJe.MUnGmQ4arOI.D1XPDEnnc7r9c7iMafG', 'xxxxxxx', 'baby1212232@yahoo.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '\0\0\0\0\0\0\0\0\0\0\0\0\06@áŸŒ˜ﬂk@', '$2y$10$Etd4zJ4/Cb6GjICrQGuzS.fwFypxaPD.kuqTlI3FSB4GsmHKtOK4e', 1, '', 0),
(22, 'nguyen', 'e10adc3949ba59abbe56e057f20f883e', '$2y$10$e9R43KQqLjMNOoWoSf..cOiz.lrFhfihvPjA/F2JF/0szfjf2uXLy', 'xxxxxxx', 'test6@gmail.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '$2y$10$Etd4zJ4/Cb6GjICrQGuzS.fwFypxaPD.kuqTlI3FSB4GsmHKtOK4e', 1, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dangers`
--
ALTER TABLE `dangers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schema_migrations`
--
ALTER TABLE `schema_migrations`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dangers`
--
ALTER TABLE `dangers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
