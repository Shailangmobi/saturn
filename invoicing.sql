-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2017 at 12:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_state` varchar(250) NOT NULL,
  `company_address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `cin` varchar(250) NOT NULL,
  `gistin` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `company_name`, `company_state`, `company_address`, `phone`, `cin`, `gistin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Customer', 'dasd', 'asdas', 'asd', 'asdas', 'asd', '1245781312', 'asdasdasd', 1, '2017-08-18 15:18:29', '2017-08-19 15:27:23'),
(2, 'My Company ', 'MyCompany@gmail.com ', 'Company Name ', 'State', 'address', '1458754215', '15424545o1a5s', '557875AAdas54da8DS', 1, '2017-08-18 15:20:35', '2017-08-18 16:08:27'),
(3, 'My Company ', 'MyCompany@gmail.com ', 'Company Name ', 'State', 'address', '1458754215', '15424545o1a5s', '557875AAdas54da8DS', 1, '2017-08-18 15:21:27', '2017-08-18 16:08:34'),
(4, 'shailang', 'shailang.k@mobisofttech.co.in', 'Company X', 'State Xs', 'address X', '1112223331', '1112223331', '1112223331', 1, '2017-08-18 18:16:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

CREATE TABLE `company_master` (
  `id` int(250) NOT NULL,
  `owner_id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_state` varchar(250) NOT NULL,
  `company_address` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `cin` varchar(250) NOT NULL,
  `gistin` varchar(250) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `account_no` varchar(250) NOT NULL,
  `ifsc_code` varchar(250) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_master`
--

INSERT INTO `company_master` (`id`, `owner_id`, `name`, `email`, `company_name`, `company_state`, `company_address`, `phone`, `cin`, `gistin`, `bank_name`, `account_no`, `ifsc_code`, `account_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'MM', 'support@mobisofttech.co.in', 'Mobisoft Technology India Pvt Ltd', 'Maharashtra', 'Office no H004,P Level , Tower no.3 CBD Belapur Railway Complex Sec-11 , Belapur Navi Mumbai -400614', '8108004545', '', '27AAHCM1232C11ZZ', 'ICICI BANK', '1234567894512', 'ICICI0000151', 'ACC SAVING', 1, '2017-08-19 14:35:10', '2017-08-19 14:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `company_owner_details`
--

CREATE TABLE `company_owner_details` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(250) NOT NULL,
  `gstin` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `invoice` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `product` varchar(250) NOT NULL,
  `place_of_supply` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `sub_total` varchar(250) NOT NULL,
  `cgst` varchar(250) NOT NULL,
  `igst` varchar(250) NOT NULL,
  `sgst` varchar(250) NOT NULL,
  `total_tax` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `customer_id` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `gstin`, `name`, `company_name`, `address`, `invoice`, `amount`, `product`, `place_of_supply`, `date`, `sub_total`, `cgst`, `igst`, `sgst`, `total_tax`, `total_amount`, `user_id`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(42, '1112223331', 'shailang', 'Company X', 'address X', 'IN-17', '500', 'Bulk SMS- Promotional', 'Maharashtra', '2017-08-19', '900', '41', '0', '41', '82', '982', 21, '4', 1, '2017-08-19 12:52:31', '0000-00-00 00:00:00'),
(43, '1112223331', 'shailang', 'Company X', 'address X', 'IN-17', '400', 'Bulk SMS- Promotional', 'Maharashtra', '2017-08-19', '900', '41', '0', '41', '82', '982', 21, '4', 1, '2017-08-19 12:52:31', '0000-00-00 00:00:00'),
(44, '1112223331', 'shailang', 'Company X', 'address X', 'IN-17', '0', 'Bulk SMS- Transactinal', 'Maharashtra', '2017-08-19', '900', '41', '0', '41', '82', '982', 21, '4', 1, '2017-08-19 12:52:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_count`
--

CREATE TABLE `invoice_count` (
  `id` int(250) NOT NULL,
  `count` int(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_count`
--

INSERT INTO `invoice_count` (`id`, `count`, `created_at`, `updated_at`) VALUES
(1, 18, '2017-08-17 00:06:02', '2017-08-19 12:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `id` int(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_sac` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`id`, `product_name`, `product_code`, `product_sac`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bulk SMS- Promotional', '1', '998413', 1, '2017-08-19 12:55:26', '0000-00-00 00:00:00'),
(2, 'Bulk SMS- Transactinal', '2', '998413', 1, '2017-08-19 12:55:26', '0000-00-00 00:00:00'),
(3, 'Website Development', '3', '998413', 1, '2017-08-19 12:56:41', '0000-00-00 00:00:00'),
(4, 'Whatsapp', '4', '998413', 1, '2017-08-19 12:56:41', '0000-00-00 00:00:00'),
(5, 'Email', '5', '998413', 1, '2017-08-19 12:56:55', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_master`
--
ALTER TABLE `company_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_owner_details`
--
ALTER TABLE `company_owner_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_count`
--
ALTER TABLE `invoice_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company_owner_details`
--
ALTER TABLE `company_owner_details`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `invoice_count`
--
ALTER TABLE `invoice_count`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
