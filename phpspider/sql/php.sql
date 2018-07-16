-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-07-13 11:04:56
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- 表的结构 `function_category`
--

CREATE TABLE `function_category` (
  `id` smallint(6) NOT NULL,
  `name` varchar(120) NOT NULL,
  `uri` varchar(120) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `parent` smallint(6) NOT NULL,
  `createTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `function_list`
--

CREATE TABLE `function_list` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `uri` varchar(120) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `php_function`
--

CREATE TABLE `php_function` (
  `id` int(11) NOT NULL,
  `category` smallint(6) NOT NULL,
  `name` varchar(120) NOT NULL,
  `uri` varchar(120) NOT NULL,
  `refnamediv` text NOT NULL,
  `description` text,
  `parameters` text,
  `returnvalues` text,
  `examples` text,
  `notes` text,
  `seealso` text,
  `createTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `function_category`
--
ALTER TABLE `function_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uri` (`uri`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `function_list`
--
ALTER TABLE `function_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `php_function`
--
ALTER TABLE `php_function`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category` (`category`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `function_category`
--
ALTER TABLE `function_category`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;
--
-- 使用表AUTO_INCREMENT `function_list`
--
ALTER TABLE `function_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10827;
--
-- 使用表AUTO_INCREMENT `php_function`
--
ALTER TABLE `php_function`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4698;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
