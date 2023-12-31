-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 08:07 PM
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
('Mustak', 'Mustak217@gmail.com', 'admin', 'fc2a30cf9f5fe16b87284e3cf5207f37', 'unn,tirupati nagar ,surat');

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
(14, 'Yagnesh', 'M', 'kapdiya', '9510611804', 'yagnesh@217gmail.com', 'bca21_112', 'bf310423f16aa8b1f5a0d2b4fdfaaaf0', 'Unn,surat', 394210, 'M', '2023-08-20 06:56:53', '1'),
(15, 'Harshil', 'A', 'Modawala', '9313353158', 'hmodawala@gmail.com', 'harshil1611', 'b96339d5463a9a822340e317c749da51', 'Nanpura/Surat,India-', 395001, 'M', '2023-08-22 05:30:02', '1');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `license_number` varchar(20) NOT NULL,
  `issuing_state` varchar(255) NOT NULL,
  `expiration_date` date NOT NULL,
  `vehicle_type` varchar(20) NOT NULL,
  `password` char(32) DEFAULT NULL,
  `login_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`id`, `full_name`, `phone_number`, `email`, `street_address`, `city`, `state`, `zip_code`, `date_of_birth`, `gender`, `license_number`, `issuing_state`, `expiration_date`, `vehicle_type`, `password`, `login_status`) VALUES
(5, 'Harshil', '9876543210', 'h@gmail.com', 'Nanpura', 'Surat', 'Gujarat', '395001', '2003-11-16', 'Male', '565458', 'Gujarat', '2030-06-10', 'Motorcycle', '28eade5f3fc1e899a88884ec135f3351', 0),
(6, 'Vasnsh', '9876543211', 'h@gmail.com', 'Nanpura', 'Surat', 'Gujarat', '395001', '2003-11-16', 'Male', '565451', 'Gujarat', '2030-06-10', 'Car', '28eade5f3fc1e899a88884ec135f3351', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_finances`
--

CREATE TABLE `delivery_boy_finances` (
  `id` int(11) NOT NULL,
  `delivery_boy_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `earning_amount` decimal(10,2) DEFAULT NULL,
  `floating_cash` decimal(10,2) DEFAULT NULL,
  `last_transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_boy_finances`
--

INSERT INTO `delivery_boy_finances` (`id`, `delivery_boy_id`, `order_id`, `earning_amount`, `floating_cash`, `last_transaction_date`) VALUES
(1, 5, 5, '30.00', '30.00', '2023-12-04 17:48:10'),
(2, 5, 14, '30.00', '30.00', '2023-12-05 17:48:49'),
(3, 5, 5, '30.00', '30.00', '2023-12-06 18:07:51'),
(4, 5, 14, '30.00', '30.00', '2023-12-07 18:07:54'),
(5, 5, 3, '30.00', '30.00', '2023-12-08 18:10:34'),
(6, 6, 1, '30.00', '30.00', '2023-12-08 18:35:52'),
(7, 5, 5, '30.00', '30.00', '2023-12-09 18:49:25'),
(8, 5, 3, '30.00', '30.00', '2023-12-05 18:49:37'),
(9, 5, 14, '30.00', '30.00', '2023-12-07 19:42:30'),
(10, 5, 16, '30.00', '30.00', '2023-12-08 17:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_order`
--

CREATE TABLE `delivery_boy_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_boy_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'in-progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_boy_order`
--

INSERT INTO `delivery_boy_order` (`id`, `order_id`, `delivery_boy_id`, `status`) VALUES
(1, 5, 5, 'done'),
(8, 14, 5, 'in-progress'),
(9, 3, 5, 'done'),
(11, 16, 5, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `reject_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `status`, `reject_reason`) VALUES
(1, 13, '2023-11-26 04:09:52', 'Complete', NULL),
(2, 15, '2023-11-27 04:16:25', 'Pending', NULL),
(3, 8, '2023-11-28 04:18:02', 'Complete', NULL),
(4, 9, '2023-11-29 04:18:16', 'Dispatch', NULL),
(5, 10, '2023-11-30 04:18:29', 'Complete', NULL),
(6, 11, '2023-12-01 04:18:43', 'Pending', NULL),
(7, 12, '2023-12-02 04:18:52', 'Reject', 'Not Available.'),
(8, 13, '2023-12-03 04:19:02', 'Pending', NULL),
(9, 14, '2023-12-04 04:19:20', 'Pending', NULL),
(10, 15, '2023-12-05 04:19:51', 'Dispatch', NULL),
(11, 15, '2023-12-06 04:20:04', 'Dispatch', NULL),
(12, 12, '2023-12-07 04:20:17', 'Dispatch', NULL),
(13, 15, '2023-12-08 04:20:30', 'Reject', 'Product not available'),
(14, 15, '2023-12-09 04:20:40', 'Dispatch', NULL),
(16, 13, '2023-12-08 17:40:35', 'Complete', NULL);

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

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `total_price`) VALUES
(1, 1, 104, 1, '1000.00'),
(2, 2, 105, 1, '500.00'),
(3, 3, 106, 2, '1000.00'),
(4, 4, 107, 1, '1500.00'),
(5, 5, 108, 2, '4000.00'),
(6, 6, 109, 1, '3000.00'),
(7, 7, 110, 1, '1500.00'),
(8, 8, 111, 1, '2000.00'),
(9, 9, 112, 1, '3000.00'),
(10, 10, 113, 2, '3000.00'),
(11, 11, 114, 1, '2000.00'),
(12, 12, 115, 1, '2000.00'),
(13, 13, 107, 1, '1500.00'),
(14, 14, 113, 1, '1500.00'),
(15, 16, 116, 1, '1111.00');

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
(104, 'T Shirt', 'White Colour', '1000.00', 'Zara', 'Womens', 'uploads/653c85bf94891.jpg', '2023-10-28 03:53:35', 1, 19, 99),
(105, 'T Shirt', 'Blue Colour', '500.00', 'Zudio', 'Childrens', 'uploads/653c85fa9c477.jpg', '2023-10-28 03:54:34', 1, 19, 48),
(106, 'Top', 'Printed', '500.00', 'Zudio', 'Childrens', 'uploads/653c8623c2676.jpg', '2023-10-28 03:55:15', 1, 19, 48),
(107, 'Jacket', 'Blue Colour', '1500.00', 'Zara', 'Childrens', 'uploads/653c86695b32f.jpg', '2023-10-28 03:56:25', 1, 19, 94),
(108, 'Suit', 'Black Colour', '2000.00', 'Woodland', 'Mens', 'uploads/653c86aab6b1f.jpg', '2023-10-28 03:57:30', 1, 19, 100),
(109, 'Jacket', 'Blue Black Colour', '3000.00', 'Zara', 'Mens', 'uploads/653c86d8e86f4.jpg', '2023-10-28 03:58:16', 1, 19, 74),
(110, 'Shirt', 'White Colour', '1500.00', 'Zudio', 'Mens', 'uploads/653c86fe2f4ce.jpg', '2023-10-28 03:58:54', 1, 19, 50),
(111, 'T Shirt', 'Printed', '2000.00', 'Zudio', 'Mens', 'uploads/653c873318906.jpg', '2023-10-28 03:59:47', 1, 19, 49),
(112, 'Coat', 'Black Colour', '3000.00', 'Zara', 'Womens', 'uploads/653c876788863.jpg', '2023-10-28 04:00:39', 1, 19, 49),
(113, 'Top', 'White Colour', '1500.00', 'Zudio', 'Womens', 'uploads/653c878b5f15d.jpg', '2023-10-28 04:01:15', 1, 19, 26),
(114, 'One Piece', 'Black Colour', '2000.00', 'Zara', 'Womens', 'uploads/653c87cb9682d.jpg', '2023-10-28 04:02:19', 1, 19, 47),
(115, 'Top', 'Grey Colour', '2000.00', 'Zudio', 'Womens', 'uploads/653c87fa3cbc2.jpg', '2023-10-28 04:03:06', 1, 19, 49);

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
(153, 107, 'XS'),
(154, 107, 'S'),
(155, 107, 'M'),
(158, 109, 'L'),
(159, 109, 'XL'),
(160, 110, 'M'),
(161, 110, 'L'),
(162, 110, 'XL'),
(163, 110, 'XXL'),
(164, 111, 'L'),
(165, 111, 'XXL'),
(166, 112, 'L'),
(167, 112, 'XL'),
(170, 114, 'M'),
(171, 114, 'L'),
(172, 114, 'XL'),
(173, 115, 'XL'),
(174, 115, 'XXL'),
(175, 108, 'L'),
(176, 108, 'XL'),
(180, 106, 'M'),
(181, 104, 'S'),
(182, 104, 'M'),
(183, 105, 'XS'),
(184, 105, 'M'),
(185, 113, 'L'),
(186, 113, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `refund_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `refund_amount` decimal(10,2) NOT NULL,
  `refund_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`refund_id`, `order_id`, `customer_id`, `refund_amount`, `refund_date`) VALUES
(1, 5, 10, '4000.00', '2023-10-31 19:09:50'),
(2, 14, 15, '3000.00', '2023-10-31 19:12:33'),
(3, 2, 15, '500.00', '2023-12-08 17:47:24');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerregistration`
--
ALTER TABLE `customerregistration`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy_finances`
--
ALTER TABLE `delivery_boy_finances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_boy_id` (`delivery_boy_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `delivery_boy_order`
--
ALTER TABLE `delivery_boy_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `delivery_boy_id` (`delivery_boy_id`);

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
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refund_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customerregistration`
--
ALTER TABLE `customerregistration`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_boy_finances`
--
ALTER TABLE `delivery_boy_finances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `delivery_boy_order`
--
ALTER TABLE `delivery_boy_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sellerregistration`
--
ALTER TABLE `sellerregistration`
  MODIFY `SellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_boy_finances`
--
ALTER TABLE `delivery_boy_finances`
  ADD CONSTRAINT `delivery_boy_finances_ibfk_1` FOREIGN KEY (`delivery_boy_id`) REFERENCES `delivery_boys` (`id`),
  ADD CONSTRAINT `delivery_boy_finances_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `delivery_boy_order`
--
ALTER TABLE `delivery_boy_order`
  ADD CONSTRAINT `delivery_boy_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `delivery_boy_order_ibfk_2` FOREIGN KEY (`delivery_boy_id`) REFERENCES `delivery_boys` (`id`);

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

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `refunds_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customerregistration` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
