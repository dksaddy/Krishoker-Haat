-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 07:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kh`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_post`
--

CREATE TABLE `article_post` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tittle` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `timestamp` datetime NOT NULL,
  `likes` int(11) NOT NULL,
  `dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `article_post_likes`
--

CREATE TABLE `article_post_likes` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `liked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `community_post`
--

CREATE TABLE `community_post` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL,
  `likes` int(11) NOT NULL,
  `dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `community_post_comments`
--

CREATE TABLE `community_post_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `community_post_likes`
--

CREATE TABLE `community_post_likes` (
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `liked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_seller`
--

CREATE TABLE `favourite_seller` (
  `f_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `sender_type` varchar(500) NOT NULL,
  `receiver_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `category`, `price`, `user_id`, `image`) VALUES
(3, 'Papaya', 'Fruits', 70, 0, 'image\\Product\\papaya.jpg'),
(5, 'বেগুন​', 'Vegetable', 35, 0, 'image\\Product\\egg plant.jpg'),
(6, 'আলু', 'Vegetable', 20, 0, 'image\\Product\\potato.jpg'),
(7, 'Cucumber', 'Vegetable', 30, 0, 'image\\Product\\cucumber.jpg'),
(8, 'Green Grape', 'Fruits', 120, 0, 'image\\Product\\green grape.jpg'),
(9, 'Green Pea', 'Vegetable', 40, 0, 'image\\Product\\green pea.jpg'),
(10, 'Watermelon', 'Fruits', 20, 0, 'image\\Product\\watermelons.jpg'),
(11, 'Orange', 'Fruits', 80, 0, 'image\\Product\\orange.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `purchase_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `user_type` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profile_picture` varchar(500) NOT NULL,
  `curr_balance` double NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `phone_number`, `email`, `address`, `user_type`, `password`, `profile_picture`, `curr_balance`, `timestamp`) VALUES
(1, 'Md Nasir', 1325657896, 'nasir@gmail.com', 'Potuakhali', 'Customer', '123', 'image/image.jpg', 12, '2024-03-30 11:56:58'),
(2, 'Md. Rahim Mia', 1452639874, 'rahim@gmail.com', 'Pabna', 'Farmer', '456', 'image/image.jpg', 21, '2024-03-30 11:57:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_post_likes`
--
ALTER TABLE `article_post_likes`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `community_post_comments`
--
ALTER TABLE `community_post_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `community_post_likes`
--
ALTER TABLE `community_post_likes`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `favourite_seller`
--
ALTER TABLE `favourite_seller`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_post_likes`
--
ALTER TABLE `article_post_likes`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_post_comments`
--
ALTER TABLE `community_post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_post_likes`
--
ALTER TABLE `community_post_likes`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_seller`
--
ALTER TABLE `favourite_seller`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
