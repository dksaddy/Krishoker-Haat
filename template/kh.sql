-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 09:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_post_likes`
--

CREATE TABLE `article_post_likes` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `liked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product_price`, `quantity`, `timestamp`) VALUES
(14, 4, 3, 770, 11, '2024-04-17 19:36:51');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_post`
--

INSERT INTO `community_post` (`blog_id`, `user_id`, `title`, `content`, `image`, `timestamp`, `likes`, `dislike`) VALUES
(7, 4, 'First post', 'First postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postFirst postv', 'image/community_post/ginger-root-still-life-1296x728-header.avif', '2024-04-12 16:44:55', 2, 0),
(10, 4, 'First post', 'lobongo', 'image/community_post/WhatsApp Image 2024-02-23 at 04.46.59_86a1a8cf.jpg', '2024-04-12 16:49:06', 3, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_post_comments`
--

INSERT INTO `community_post_comments` (`comment_id`, `user_id`, `blog_id`, `comment_text`, `timestamp`) VALUES
(8, 4, 7, 'nope\r\n', '2024-04-10 10:12:52'),
(9, 4, 7, 'gewhgdsvc\r\n', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `community_post_likes`
--

CREATE TABLE `community_post_likes` (
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `liked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_post_likes`
--

INSERT INTO `community_post_likes` (`user_id`, `blog_id`, `liked`) VALUES
(4, 7, 1),
(13, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `favourite_seller`
--

CREATE TABLE `favourite_seller` (
  `f_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `category`, `price`, `user_id`, `image`, `quantity`, `description`, `timestamp`) VALUES
(15, 'Korolla', 'Vegetable', 70, 4, 'image/Product/download (2).jpeg', 155, 'wghdfsxhgjbfkshcfxzujb csxjzftudgjbvcx gfrtcsgxnzb ghdhsrcxfzghnbvdcxtz ', '2024-04-18 01:46:09');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `phone_number` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `user_type` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profile_picture` varchar(500) NOT NULL,
  `curr_balance` double NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `phone_number`, `email`, `address`, `user_type`, `password`, `profile_picture`, `curr_balance`, `timestamp`) VALUES
(3, '', '01766972626', '', '', '', '$2y$10$E5cP/IpiOICL0qNQ0aBuZeZLvrbaZI1PR5nX6xbDZul/yZdqcfTdC', '', 0, '2024-04-03 17:55:09'),
(4, 'Maruph', '01321098082', 'smmaruph.bhbd2001@gmail.com', 'NatunBazar,Vatara,Dhaka', 'Customer', '$2y$10$XEpX9H9IpAtGLmz.ihqc5.ur8fx.WnV0zF5gDV92x5Yx50ctvyCa2', 'image/image.jpg', 10000, '2024-04-12 23:10:30'),
(5, '', '01321098083', '', '', '', '$2y$10$n2yRtUJFaDJh6/iAuIZ.K.cKSJc/AjcQy/hPx4AiWUC4xtKRwemm.', '', 0, '2024-04-05 20:26:19'),
(6, '', '01321098084', '', '', '', '$2y$10$Yw7FEI9sijgHqskfVGcTj.O9UigSRNLt44Cv7n9L3Th/ahwbYlt0u', '', 0, '2024-04-05 20:26:59'),
(7, '', '01866649720', '', '', '', '$2y$10$sSmZ9IcWmh/Fyy0bnm.pTevDQbUnstzMNoZiC37J465y8xcnfh0pS', '', 0, '2024-04-05 20:37:09'),
(8, '', '01712379617', '', '', '', '$2y$10$X3Oat8o/QdKaPmSDbFwa8.YDRCLwKRWSA3ImsqGt595jfLRHBsXCC', '', 0, '2024-04-05 21:44:20'),
(9, '', '01766972627', '', '', '', '$2y$10$o6rFMPZ/p.z4WXfqmlSN.ObgYbWQb2Qfi0L0.YoAkqtGLqjDnruQu', '', 0, '2024-04-05 22:29:07'),
(10, '', '01766972630', '', '', 'farmer', '$2y$10$NFoD7Jq6tZMAgr1LyL1WH.IlGBkZlqzmHjeyWCdESumottzIyVchi', '', 0, '2024-04-05 22:53:01'),
(11, '', '01766972640', '', '', 'customer', '$2y$10$V0OsuDrbJ4EHNF3v5/tav.nYma5HdPVrEcNl/ZosKZvWYhMeOOcxu', '', 0, '2024-04-05 22:57:16'),
(12, '', '01766972641', '', '', 'customer', '$2y$10$pcdbqYOdjhei.Em6MtiQsOTVT8eXbchTrFMLl2WvPaBcRz9wdai.G', '', 0, '2024-04-05 22:58:35'),
(13, '', '01719595420', '', '', 'farmer', '$2y$10$ueDWleJs1QZNSs0/MxllH.4Ca/2lLT8foBiK3jcs6LmKpoIjm/IJi', '', 0, '2024-04-09 23:04:23'),
(14, '', '01987654323', '', '', 'customer', '$2y$10$c6eODVtSNFqxNCHsj3jUYuvzp2.TytnBIZQyFgVatSyqe6Hq2xtXO', '', 0, '2024-04-09 23:59:08'),
(15, '', '', '', '', 'farmer', '$2y$10$eOOdzsvXtMoF8ZH20Z7XCenzRtEkCwQC4UeIs.rUU6QwmgQ/Bjyme', '', 0, '2024-04-10 00:00:45');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `community_post_comments`
--
ALTER TABLE `community_post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `community_post_likes`
--
ALTER TABLE `community_post_likes`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
