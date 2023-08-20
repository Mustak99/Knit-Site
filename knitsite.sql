-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 08:37 AM
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
-- Database: `knitsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(30) DEFAULT NULL,
  `admin_login_id` varchar(10) NOT NULL,
  `admin_password` char(32) NOT NULL,
  `admin_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_email`, `admin_login_id`, `admin_password`, `admin_address`) VALUES
('Mustak', 'Mustak217@gmail.com', 'admin', 'e2857ec944d0f521ff193b5e29578954', 'unn,tirupati nagar ,surat');

-- --------------------------------------------------------

--
-- Table structure for table `customerregistration`
--

CREATE TABLE `customerregistration` (
  `UserId` int(11) NOT NULL,
  `UserFirstName` varchar(30) NOT NULL,
  `UserMiddleName` varchar(30) NOT NULL,
  `UserLastName` varchar(30) NOT NULL,
  `MobileNumber` char(10) NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` char(32) NOT NULL,
  `ConfirmPassword` char(32) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerregistration`
--

INSERT INTO `customerregistration` (`UserId`, `UserFirstName`, `UserMiddleName`, `UserLastName`, `MobileNumber`, `EmailAddress`, `UserName`, `Password`, `ConfirmPassword`, `Address`, `Pincode`, `Gender`, `CreationDate`, `status`) VALUES
(8, 'Harshil', 'A', 'Modawala', '9867859458', 'harshil21@gmail.com', 'harshil_12', '3282f5fc264311b828830a83b15e7e59', '3282f5fc264311b828830a83b15e7e59', 'surat', 394210, 'M', '2023-02-16 06:06:35', '0'),
(9, 'Yagnesh', 'H', 'Kapadiya', '9924266822', 'Yagnesh12@gmail.com', 'yagnesh_12', '969f672a1769e786494a9106ba012c6a', '969f672a1769e786494a9106ba012c6a', 'surat', 394210, 'M', '2023-02-16 10:56:08', '1'),
(10, 'Irfan', 'H', 'Shaikh', '9035223772', 'irfanshaikh217@gmail.com', 'irfan_12', 'e279dcdb8b6b368bc9ad010b773456df', 'e279dcdb8b6b368bc9ad010b773456df', 'Unn', 394210, 'M', '2023-03-22 03:42:13', '1'),
(11, 'Firoza', 'Hanif', 'Shaikh', '9098347573', 'firoza12@gmail.com', 'firoza_12', 'e2857ec944d0f521ff193b5e29578954', 'e2857ec944d0f521ff193b5e29578954', '12,unn,surat', 294210, 'F', '2023-03-22 04:41:59', '1'),
(12, 'Mustak', 'H', 'Shaikh', '9510611840', 'mustakshaikh217@gmail.com', 'Mustak_13', 'ec0df3dfb087fd0696075eba6fd24f5e', 'ec0df3dfb087fd0696075eba6fd24f5e', 'Unn', 394210, 'M', '2023-03-25 12:50:54', '1'),
(13, 'Mustak', 'H', 'Shaikh', '6355052382', 'm1ustakshaikh217@gmail.com', 'bca21_122', '0ec7fd2434da652505ba10d9a7faba2c', '0ec7fd2434da652505ba10d9a7faba2c', 'Unn', 394210, 'M', '2023-04-12 04:24:03', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sellerregistration`
--

CREATE TABLE `sellerregistration` (
  `SellerId` int(11) NOT NULL,
  `SellerFirstName` varchar(30) NOT NULL,
  `SellerMiddleName` varchar(30) NOT NULL,
  `SellerLastName` varchar(30) NOT NULL,
  `MobileNumber` char(10) NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Password` char(32) NOT NULL,
  `ConfirmPassword` char(32) NOT NULL,
  `BusinessLocation` varchar(50) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `BusinessType` varchar(20) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `businessdoc` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellerregistration`
--

INSERT INTO `sellerregistration` (`SellerId`, `SellerFirstName`, `SellerMiddleName`, `SellerLastName`, `MobileNumber`, `EmailAddress`, `UserName`, `Password`, `ConfirmPassword`, `BusinessLocation`, `Pincode`, `BusinessType`, `CreationDate`, `status`, `businessdoc`) VALUES
(8, 'Shamim', 'H', 'Shaikh', '992423822', 'Shaimim12@gmail.com', 'Shamim_12', 'e2857ec944d0f521ff193b5e29578954', 'e2857ec944d0f521ff193b5e29578954', 'katargam', 394210, 'electronic', '2023-02-16 07:10:06', '1', NULL),
(9, 'Yagnesh', 'A', 'Kapadiya', '9923234366', 'Yagnesh122@gmail.com', 'yagnesh_122', 'd9d009c4f775599ef8537b6f3de9049c', 'd9d009c4f775599ef8537b6f3de9049c', 'surat', 394210, 'electronic', '2023-02-16 07:12:05', '1', NULL),
(10, 'Mustak', 'H', 'Shaikh', '9924266822', 'mustak211@gmail.com', 'mustak_11', 'ce610c56cd594483c6bf332fec13f32a', 'ce610c56cd594483c6bf332fec13f32a', 'unnsurat', 394210, 'electronic', '2023-03-05 08:21:18', '1', NULL),
(11, 'Harshil', 'H', 'Modawala', '9242663222', 'harshil2111@gmail.com', 'harshil_12', '1705c8c440e7b429e4d7336bcf7dee90', '1705c8c440e7b429e4d7336bcf7dee90', 'unnsurat', 394210, 'footwear', '2023-03-21 06:30:03', '1', NULL),
(13, 'Mustak', 'H', 'Shaikh', '6355052282', 'mustakshaikh217@gmail.com', 'bca21_068', 'f25ac465ea089afea9717cc3f73820e6', 'f25ac465ea089afea9717cc3f73820e6', 'Unn', 394210, 'electronic', '2023-03-25 07:08:53', '1', 'CS4009Project.pdf'),
(14, 'Harshil', 'Ashokbhai', 'Modawala', '9898959598', 'h@gmail.com', 'harshil0303', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', 'Surat', 395001, 'electronic', '2023-04-18 09:01:43', '1', 'Document(sem 4).pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_login_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `customerregistration`
--
ALTER TABLE `customerregistration`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `sellerregistration`
--
ALTER TABLE `sellerregistration`
  ADD PRIMARY KEY (`SellerId`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerregistration`
--
ALTER TABLE `customerregistration`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sellerregistration`
--
ALTER TABLE `sellerregistration`
  MODIFY `SellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES customerregistration(UserId),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

