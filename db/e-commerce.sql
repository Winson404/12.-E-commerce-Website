-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 05:56 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Admin',
  `verification_code` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `dob`, `age`, `address`, `email`, `contact`, `password`, `image`, `date_registered`, `user_type`, `verification_code`) VALUES
(1, 'Admin', 'Admin', 'Admin', '', 'Male', '2022-04-06', 23, 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'sonerwin12@gmail.com', '09359428963', '0192023a7bbd73250516f069df18b500', 'minimalism-1644666519306-6515.jpg', '2022-04-17', 'Admin', '380300');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`cart_Id` int(11) NOT NULL,
  `cart_product_Id` int(11) NOT NULL,
  `cart_user_Id` int(11) NOT NULL,
  `cart_quantity` varchar(255) NOT NULL DEFAULT '1',
  `cart_total` varchar(255) NOT NULL,
  `cart_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `checkout` varchar(100) NOT NULL DEFAULT 'Not confirmed',
  `receivingStatus` varchar(255) NOT NULL DEFAULT 'On process',
  `archive` int(11) NOT NULL DEFAULT '0' COMMENT '0=Visible, 1=Hidden',
  `date_added` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_Id`, `cart_product_Id`, `cart_user_Id`, `cart_quantity`, `cart_total`, `cart_status`, `checkout`, `receivingStatus`, `archive`, `date_added`) VALUES
(18, 1, 2, '1', '2500', 'Confirmed', 'Confirmed', 'Received', 1, '2023-01-08'),
(19, 3, 2, '3', '6000', 'Confirmed', 'Confirmed', 'Received', 1, '2023-01-08'),
(20, 3, 2, '1', '2000', 'Confirmed', 'Confirmed', 'Received', 1, '2023-01-08'),
(21, 5, 2, '1', '5000', 'Confirmed', 'Confirmed', 'Received', 1, '2023-01-08'),
(22, 6, 2, '1', '5000', 'Confirmed', 'Confirmed', 'Received', 1, '2023-01-08'),
(23, 7, 2, '1', '2000', 'Confirmed', 'Confirmed', 'On process', 0, ''),
(24, 9, 2, '1', '3000', 'Confirmed', 'Confirmed', 'On process', 0, '2023-01-08'),
(25, 8, 2, '1', '3000', 'Confirmed', 'Confirmed', 'On process', 0, '2023-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cat_Id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_Id`, `cat_name`, `cat_description`, `date_created`) VALUES
(2, 'Pants', 'Pants Sample description', '2022-06-28'),
(3, 'Perfume', 'Perfume Sample Description', '2022-06-28'),
(4, 'Electric Fan', 'Electric Fan Sample Description', '2022-06-28'),
(5, 'Watch', 'Watch Sample Description', '2022-06-28'),
(6, 'Shoes', 'Shoes Sample Description', '2022-06-28'),
(8, 'T-Shirts', 'T-Shirts Sample Description', '2022-06-30'),
(9, 'Bags', 'Bags Sample Description', '2022-06-30'),
(12, 'Shorts', 'Shorts Sample Description', '2022-07-18'),
(13, 'Dress for Women', 'Dress for Women Sample Description', '2022-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `hot_item`
--

CREATE TABLE IF NOT EXISTS `hot_item` (
`hot_item_Id` int(11) NOT NULL,
  `hot_product_Id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hot_item`
--

INSERT INTO `hot_item` (`hot_item_Id`, `hot_product_Id`) VALUES
(1, 8),
(2, 15),
(3, 22),
(4, 23);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_Id` int(11) NOT NULL,
  `product_cat_Id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_stock` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_Id`, `product_cat_Id`, `product_name`, `product_description`, `product_price`, `product_stock`, `product_image`) VALUES
(1, 2, 'Jeans for Women', 'High Quality Jeans', '2500', '54', 'istockphoto-470227304-612x612.jpg'),
(3, 5, 'Chronograph watch', 'Silver and Black', '2000', '489', 'photo-1622434641406-a158123450f9.jpg'),
(4, 9, 'Sling bag', 'Brown Leather Sling Bag', '1500', '93', 'photo-1600857062241-98e5dba7f214.jpg'),
(5, 6, 'Nike sneaker', 'Yellow Textile', '5000', '2997', 'photo-1549298916-b41d501d3772.jpg'),
(6, 3, 'Gold Perfume', 'Perfume Bottle', '5000', '8', 'photo-1592945403244-b3fbafd7f539.jpg'),
(7, 4, 'Desk fan', 'White and Black', '2000', '6', 'photo-1618941716939-553df3c6c278.jpg'),
(8, 9, 'Bag for Women', 'High Quality Bag', '3000', '148', 'photo-1584917865442-de89df76afd3.jpg'),
(9, 4, 'Stand fan', 'White Stand fan', '3000', '17', 'photo-1601084195907-44baaa49dabd.jpg'),
(10, 4, 'Mini fan', 'Gray and White', '700', '29', 'photo-1564510182791-29645da7fac4.jpg'),
(11, 4, 'Fan on Wooden Table', 'Gray fan', '1000', '20', 'photo-1559536207-e64933d5798b.jpg'),
(12, 5, 'Tissot Chronograph ', 'Round Silver Colored Watch', '5000', '5', 'photo-1522312346375-d1a52e2b99b3.jpg'),
(13, 5, 'Omega watch', 'High Quality watch', '1300', '29', 'photo-1523170335258-f5ed11844a49.jpg'),
(14, 6, 'Nike Athletic Shoe', 'White and Red Nike Shoe', '3000', '40', 'photo-1600185365926-3a2ce3cdb9eb.jpg'),
(15, 9, 'High Quality Bag for Women', 'Brown Leather Handbag', '4500', '49', 'photo-1590874103328-eac38a683ce7.jpg'),
(16, 2, 'Blue DenimJeans', 'Blue DenimJeans for Women', '3000', '10', 'photo-1584370848010-d7fe6bc767ec.jpg'),
(19, 9, 'Black Gucci Leather Bag', 'High Quality Gucci Bag', '5000', '25', 'photo-1548036328-c9fa89d128fa.jpg'),
(20, 2, 'Denim Jeans', 'White Texttiles', '1200', '15', 'photo-1624378439575-d8705ad7ae80.jpg'),
(21, 6, 'Red Nike Sneaker', 'Sneaker shoe', '3000', '12', 'photo-1542291026-7eec264c27ff.jpg'),
(22, 3, 'Blue De Chanel Perfume', 'Perfume Bottle', '1500', '29', 'photo-1523293182086-7651a899d37f.jpg'),
(23, 3, 'N5 Chanel EAU', 'Spray bottle', '2000', '15', 'photo-1541643600914-78b084683601.jpg'),
(24, 6, 'Green and Black Nike Shoe', 'Athletic Shoe', '1600', '20', 'photo-1606107557195-0e29a4b5b4aa.jpg'),
(25, 8, 'Neck T-shirt', 'Black shirt', '500', '30', 'photo-1618354691373-d851c5c3a990.jpg'),
(26, 8, 'Bone design black shirt', 'High Quality Shirt', '400', '30', 'photo-1503341504253-dff4815485f1.jpg'),
(27, 12, 'Denim shorts', 'Short on white surface', '600', '2', 'photo-1591195853828-11db59a44f6b.jpg'),
(28, 13, 'Sleeveless dress', 'Hanged dress for women', '1900', '3', 'photo-1585052201332-b8c0ce30972f.jpg'),
(29, 3, 'fdsfs', 'fdsfsdf', '32', '3', 'minimalism-1644666519306-6515.jpg'),
(30, 3, 'fdsf', 'sfsfs', '23', '23', '6207ad7e34af5.jpg'),
(31, 2, 'Kris Philip', 'gfhfg', '34', '3', 'wp4813161-simple-minimalist-wallpapers.jpg'),
(32, 2, 'fgfdgdgdgfd', 'gdfgdfgd', '4', '45', 'minimalism-1644666519306-6515.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_Id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `verification_code` varchar(20) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `fname`, `mname`, `lname`, `suffix`, `gender`, `dob`, `age`, `address`, `email`, `contact`, `password`, `image`, `verification_code`, `date_registered`) VALUES
(2, 'Jolina', 'Sarceda', 'Alburo', '', 'Female', '2022-07-22', 1, 'Tabogon, Cebu', 'sonerwin12@gmail.comd', '09752226739', '0192023a7bbd73250516f069df18b500', 'daniel-lincoln-NR705beN_CU-unsplash.jpg', '211090', '2022-07-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cart_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cat_Id`);

--
-- Indexes for table `hot_item`
--
ALTER TABLE `hot_item`
 ADD PRIMARY KEY (`hot_item_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `cart_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cat_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `hot_item`
--
ALTER TABLE `hot_item`
MODIFY `hot_item_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
