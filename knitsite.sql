-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 11:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `price`, `created_at`) VALUES
(0, 13, 37, 3, '2000.00', '2023-09-15 01:44:50'),
(0, 13, 38, 3, '1500.00', '2023-09-15 01:44:53'),
(0, 13, 39, 3, '2000.00', '2023-09-15 01:44:55'),
(0, 13, 42, 3, '1000.00', '2023-09-15 01:44:59'),
(0, 13, 48, 1, '2000.00', '2023-09-15 01:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(2, 'Feminine', 'no', 'feminelg.png'),
(3, 'Kids', 'no', 'kidslg.jpg'),
(4, 'Others', 'yes', 'othericon.png'),
(5, 'Men', 'yes', 'malelg.png');

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
  `Address` varchar(50) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerregistration`
--

INSERT INTO `customerregistration` (`UserId`, `UserFirstName`, `UserMiddleName`, `UserLastName`, `MobileNumber`, `EmailAddress`, `UserName`, `Password`, `Address`, `Pincode`, `Gender`, `CreationDate`, `status`) VALUES
(8, 'Harshil', 'A', 'Modawala', '9867859458', 'h@gmail.com', 'harshil_12', '3282f5fc264311b828830a83b15e7e59', 'surat', 394210, 'M', '2023-02-16 06:06:35', '0'),
(9, 'Yagnesh', 'H', 'Kapadiya', '9924266822', 'Yagnesh12@gmail.com', 'yagnesh_12', '969f672a1769e786494a9106ba012c6a', 'surat', 394210, 'M', '2023-02-16 10:56:08', '1'),
(10, 'Irfan', 'H', 'Shaikh', '9035223772', 'irfanshaikh217@gmail.com', 'irfan_12', 'e279dcdb8b6b368bc9ad010b773456df', 'Unn', 394210, 'M', '2023-03-22 03:42:13', '1'),
(11, 'Firoza', 'Hanif', 'Shaikh', '9098347573', 'firoza12@gmail.com', 'firoza_12', 'e2857ec944d0f521ff193b5e29578954', '12,unn,surat', 294210, 'F', '2023-03-22 04:41:59', '1'),
(12, 'Mustak', 'H', 'Shaikh', '9510611840', 'mustakshaikh217@gmail.com', 'Mustak_13', 'ec0df3dfb087fd0696075eba6fd24f5e', 'Unn', 394210, 'M', '2023-03-25 12:50:54', '1'),
(13, 'Mustak', 'H', 'Shaikh', '6355052382', 'm1ustakshaikh217@gmail.com', 'bca21_122', '0ec7fd2434da652505ba10d9a7faba2c', '', 394210, 'M', '2023-04-12 04:24:03', '1'),
(14, 'Yagnesh', 'M', 'kapdiya', '9510611804', 'yagnies@217gmail.com', 'bca21_112', 'bf310423f16aa8b1f5a0d2b4fdfaaaf0', 'Unn,surat', 394210, 'M', '2023-08-20 06:56:53', '1'),
(15, 'Harshil', 'A', 'Modawala', '9313353158', 'hmodawala@gmail.com', 'harshil1611', 'fc2a30cf9f5fe16b87284e3cf5207f37', 'Nanpura/Surat,India-', 395001, 'M', '2023-08-22 05:30:02', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT 1,
  `SID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `brand_name`, `category`, `image_path`, `add_date`, `status`, `SID`, `quantity`) VALUES
(37, 'T Shirt', 'Blue', '2000.00', 'Zara', 'Childrens', 'uploads/64e624fd1f8d6.jpg', '2023-08-23 15:25:49', 1, 19, 100),
(38, 'Tshirt', 'Printed\r\n', '1500.00', 'Zara', 'Childrens', 'uploads/64e6252620e9d.jpg', '2023-08-23 15:26:30', 1, 19, 10),
(39, 'Jacket', 'Jeans Jacket', '2000.00', 'American', 'Childrens', 'uploads/64e6255f9c5e1.jpg', '2023-08-23 15:27:27', 1, 19, 20),
(42, 'T Shirt', 'White', '1000.00', 'Zudio', 'Childrens', 'uploads/64e6276d991af.jpg', '2023-08-23 15:36:13', 1, 19, 30),
(48, 'T Shirt', 'White', '2000.00', 'Zudio', 'Womens', 'uploads/64e62ad47c95e.jpg', '2023-08-23 15:50:44', 1, 19, 40),
(60, 'Coat', 'Black', '2000.00', 'Zara', 'Womens', 'uploads/64e639dec5441.jpg', '2023-08-23 16:54:54', 1, 19, 100),
(61, 'Top', 'Black', '1000.00', 'Zudio', 'Womens', 'uploads/64e63a7a2d94a.jpg', '2023-08-23 16:57:30', 1, 19, 10),
(62, 'Top', 'Grey', '2000.00', 'Zudio', 'Womens', 'uploads/64e63b2a4e7e9.jpg', '2023-08-23 17:00:26', 1, 19, 50),
(65, 'Shirt', 'White', '1000.00', 'Zudio', 'Mens', 'uploads/64e63ccb2c958.jpg', '2023-08-23 17:07:23', 1, 19, 100),
(66, 'Suit', 'Black', '4000.00', 'Raymond', 'Mens', 'uploads/64e63cf2e72a9.jpg', '2023-08-23 17:08:02', 1, 19, 10),
(67, 'Jacket', 'Leather', '2000.00', 'Zara', 'Mens', 'uploads/64e63d225bbf0.jpg', '2023-08-23 17:08:50', 1, 19, 100),
(68, 'T Shirt', 'White', '1500.00', 'Zudio', 'Mens', 'uploads/64e63dc71d9b4.jpg', '2023-08-23 17:11:35', 1, 19, 20),
(82, 'recffvf', 'frtv', '12.00', 'vfr', 'Mens', 'uploads/64ec2cce82575.jpg', '2023-08-28 05:12:46', 1, 19, 0),
(83, 'rgfvdf', 'cvdfv', '12.00', 'fdv', 'Mens', 'uploads/64ec2d2fcec7f.jpg', '2023-08-28 05:14:23', 1, 19, 12),
(84, 'shirt', 'blak', '1000.00', 'westside', 'Mens', 'uploads/64ec2df5ab7a3.jpg', '2023-08-28 05:17:41', 1, 19, 10),
(85, 'Shirt ', 'Black', '1000.00', 'Pantaloons', 'Mens', 'uploads/64ec340ac4641.jpg', '2023-08-28 05:43:38', 1, 19, 100),
(86, 'Jacket', 'Blue', '1000.00', 'Zudio', 'Mens', 'uploads/64ec36a22472e.jpg', '2023-08-28 05:54:42', 1, 19, 100);

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `delete_product_trigger` BEFORE DELETE ON `products` FOR EACH ROW BEGIN
  DELETE FROM cart WHERE product_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size`) VALUES
(11, 87, 'XS'),
(12, 87, 'S'),
(13, 87, 'M'),
(14, 87, 'L'),
(15, 87, 'XL'),
(16, 87, 'XXL'),
(20, 88, 'M'),
(21, 88, 'L'),
(22, 88, 'XL'),
(23, 88, 'XXL'),
(24, 89, 'XS'),
(25, 89, 'M'),
(26, 90, 'XS'),
(27, 90, 'M'),
(28, 90, 'L'),
(32, 91, 'XS'),
(33, 91, 'S'),
(34, 91, 'M'),
(35, 91, 'L'),
(36, 91, 'XL'),
(37, 91, 'XXL'),
(41, 92, 'XXL');

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

INSERT INTO `sellerregistration` (`SellerId`, `SellerFirstName`, `SellerMiddleName`, `SellerLastName`, `MobileNumber`, `EmailAddress`, `UserName`, `Password`, `BusinessLocation`, `Pincode`, `BusinessType`, `CreationDate`, `status`, `businessdoc`) VALUES
(8, 'Shamim', 'H', 'Shaikh', '992423822', 'Shaimim12@gmail.com', 'Shamim_12', 'e2857ec944d0f521ff193b5e29578954', 'katargam', 394210, 'electronic', '2023-02-16 07:10:06', '1', NULL),
(9, 'Yagnesh', 'A', 'Kapadiya', '9923234366', 'Yagnesh122@gmail.com', 'yagnesh_122', 'd9d009c4f775599ef8537b6f3de9049c', 'surat', 394210, 'electronic', '2023-02-16 07:12:05', '1', NULL),
(10, 'Mustak', 'H', 'Shaikh', '9924266822', 'mustak211@gmail.com', 'mustak_11', 'ce610c56cd594483c6bf332fec13f32a', 'unnsurat', 394210, 'electronic', '2023-03-05 08:21:18', '1', NULL),
(11, 'Harshil', 'H', 'Modawala', '9242663222', 'harshil2111@gmail.com', 'harshil_12', '1705c8c440e7b429e4d7336bcf7dee90', 'unnsurat', 394210, 'footwear', '2023-03-21 06:30:03', '1', NULL),
(13, 'Mustak', 'H', 'Shaikh', '6355052282', 'mustakshaikh217@gmail.com', 'bca21_068', 'f25ac465ea089afea9717cc3f73820e6', 'Unn', 394210, 'mens', '2023-03-25 07:08:53', '1', ''),
(19, 'Harshil', 'A', 'Modawala', '9313353158', 'hmsa@gmail.com', 'harshil0303', 'fc2a30cf9f5fe16b87284e3cf5207f37', 'Surat', 395001, 'mens', '2023-08-21 07:40:31', '1', 'Practicals.pdf');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SID` (`SID`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sellerregistration`
--
ALTER TABLE `sellerregistration`
  MODIFY `SellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customerregistration` (`UserId`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `sellerregistration` (`SellerId`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
