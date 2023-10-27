-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 10:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(6, 13, 98, 1, 2000.00, '2023-10-27 07:03:09'),
(7, 13, 101, 1, 10.00, '2023-10-27 07:03:10'),
(8, 13, 102, 1, 10.00, '2023-10-27 07:03:13');

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `status`) VALUES
(1, 15, '2023-10-06 17:14:01', 'Pending'),
(2, 12, '2023-10-06 18:23:39', 'Pending'),
(3, 15, '2023-10-06 21:18:21', 'Pending'),
(4, 15, '2023-10-07 15:14:27', 'Pending'),
(5, 15, '2023-10-20 16:53:04', 'Pending'),
(6, 14, '2023-10-20 16:53:27', 'Pending'),
(7, 12, '2023-10-20 16:53:44', 'Pending'),
(8, 10, '2023-10-20 16:53:57', 'Pending'),
(9, 15, '2023-10-20 16:58:35', 'Pending'),
(10, 15, '2023-10-20 16:58:47', 'Pending');

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
(1, 1, 98, 1, 2000.00),
(2, 2, 98, 1, 2000.00),
(3, 3, 97, 5, 10000.00),
(4, 4, 101, 5, 10.00),
(5, 5, 96, 1, 10.00),
(6, 6, 97, 1, 10.00),
(7, 7, 98, 1, 10.00),
(8, 8, 101, 1, 10.00),
(9, 9, 96, 1, 10.00),
(10, 10, 96, 1, 10.00);

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
(96, 'Shirt', 'White', 2000.00, 'Zara', 'Mens', 'uploads/65203501701ae.jpg', '2023-10-06 16:25:37', 1, 19, 10),
(97, 'Top', 'Nice', 1500.00, 'Zudio', 'Womens', 'uploads/652035299ddbb.jpg', '2023-10-06 16:26:17', 1, 19, 5),
(98, 'Jacket', 'Blue', 2000.00, 'Jade Blue', 'Childrens', 'uploads/65203553c63c2.jpg', '2023-10-06 16:26:59', 1, 19, 17),
(101, 'rthb', 'rgbt', 10.00, 'rtg', 'Mens', 'uploads/6521768658e4a.jpg', '2023-10-07 15:17:26', 1, 13, 10),
(102, 'vdvx', 'dbb', 10.00, 'dbv', 'Mens', 'uploads/653299a3eb421.jpg', '2023-10-20 15:15:47', 1, 19, 10),
(103, 'ygdvf', 'ngh', 10.00, 'fdb', 'Mens', 'uploads/65329be319817.jpg', '2023-10-20 15:25:23', 1, 19, 10);

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
(96, 96, 'XS'),
(97, 96, 'M'),
(98, 96, 'L'),
(109, 101, 'M'),
(129, 102, 'XS'),
(130, 97, 'XL'),
(137, 98, 'XXL'),
(138, 103, 'XS'),
(139, 103, 'M'),
(140, 103, 'XL');

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customerregistration`
--
ALTER TABLE `customerregistration`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

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
