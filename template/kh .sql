-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 04:08 PM
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
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_post`
--

INSERT INTO `community_post` (`blog_id`, `user_id`, `title`, `content`, `image`, `timestamp`, `likes`, `dislike`) VALUES
(2, 4, 'user', 'user post', 'image/community_post/download (2).jpeg', '2024-04-18 04:02:40', 2, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `community_post_likes`
--

CREATE TABLE `community_post_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `liked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_post_likes`
--

INSERT INTO `community_post_likes` (`id`, `user_id`, `blog_id`, `liked`) VALUES
(15, 4, 2, 1),
(34, 16, 2, 1);

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

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `buyer_id`, `seller_id`, `product_id`, `quantity`, `status`, `payment_method`, `timestamp`) VALUES
(12, 4, 10, 16, 1, 'pending', 'COD', '2024-04-18 17:10:51'),
(13, 4, 10, 16, 5, 'pending', 'COD', '2024-04-18 17:11:50'),
(14, 4, 10, 16, 5, 'pending', 'COD', '2024-04-18 17:26:07'),
(15, 4, 10, 16, 4, 'pending', 'COD', '2024-04-18 17:26:34'),
(16, 4, 10, 16, 1, 'pending', 'COD', '2024-04-18 17:29:15'),
(17, 4, 10, 16, 1, 'pending', 'COD', '2024-04-18 17:29:53'),
(18, 4, 10, 16, 1, 'pending', 'COD', '2024-04-18 17:32:12'),
(19, 4, 10, 16, 1, 'pending', 'COD', '2024-04-18 17:32:24'),
(20, 4, 10, 16, 1, 'pending', 'COD', '2024-04-18 17:32:54'),
(21, 4, 10, 16, 9, 'pending', 'COD', '2024-04-18 17:33:13'),
(22, 4, 10, 16, 6, 'pending', 'COD', '2024-04-18 17:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
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

INSERT INTO `product` (`product_id`, `p_name`, `category`, `price`, `user_id`, `image`, `quantity`, `description`, `timestamp`) VALUES
(16, 'Korolla', 'Vegetable', 12, 10, 'image/Product/download (2).jpeg', 30, 'Tita tita', '2024-04-18 22:12:14'),
(17, 'Korola', 'Vegetable', 15, 10, 'image/Product/R.jpeg', 85, 'প্রতি ১০০ গ্রাম করলায় বিভিন্ন প্রকার পুষ্টি উপাদানের পরিমাণ-\r\n\r\nকার্বোহাইড্রেট : ৩.৭০ গ্রাম,\r\nপ্রোটিন : ১ গ্রাম,\r\nফ্যাট : ০.১৭ গ্রাম,\r\nখাদ্য আঁশ : ২.৮০ গ্রাম,\r\nনায়াসিন : ০.৪০০ মিলিগ্রাম,\r\nপ্যান্টোথেনিক এসিড : ০.২১২ মিলিগ্রাম,\r\nভিটামিন এ : ৪৭১ আই ইউ,\r\nভিটামিন সি: ৮৪ মিলিগ্রাম,\r\nসোডিয়াম ; ৫ মিলিগ্রাম,\r\nপটাশিয়াম : ২৯৬ মিলিগ্রাম,\r\nক্যালসিয়াম : ১৯ মিলিগ্রাম,\r\nকপার : ০.০৩৪ মিলিগ্রাম,\r\nআয়রন: ০.৪৩ মিলিগ্রাম,\r\nম্যাগনেসিয়াম : ১৭ মিলিগ্রাম,\r\nম্যাঙ্গানিজ: ০.০৮৯ মিলিগ্রাম,\r\nজিংক : ০.৮০ মিলিগ্রাম।\r\nউপকারিতা\r\nঅ্যালার্জি প্রতিরোধে এর রস দারুণ উপকারী। ডায়াবেটিস রোগীদের জন্যও এটি উত্তম।প্রতিদিন নিয়মিতভাবে করলার রস খেলে রক্তের শর্করা নিয়ন্ত্রণে রাখা সম্ভব। বাতের ব্যাথায় নিয়মিত করলা রস খেলে ব্যাথা আরোগ্য হয়। আর্য়ুবেদের মতে করলা কৃমিনাশক, কফনাশক ও পিত্তনাশক। করলার জীবাণু নাশক ক্ষমতাও রয়েছে। ক্ষতস্থানের উপরে পাতার রসের প্রলেপ দিলে এবং উচ্ছে গাছ সেদ্ধ জলদিয়ে ক্ষত ধুলে কয়েকদিনের মধ্যেই ক্ষত শুকিয়ে যায়। অ্যালার্জি হলে এর রস দু চা চামচ দুবেলা খেলে সেরে যাবে। চর্মরোগেও করলা বেশ উপকারী। এছাড়া ', '2024-04-19 00:22:28'),
(18, 'Uchchay ', 'Vegetable', 20, 10, 'image/Product/2-6.jpg', 100, 'প্রতি ১০০ গ্রাম কইডা বা চিচিঙ্গা বা হইডায় পুষ্টির তথ্যগুলি নিম্নরূপ:[২]\r\n\r\nক্যালোরি 86.2 কিলোক্যালরি\r\n\r\nম্যাক্রোনিউট্রিয়েন্টস: মোট ফ্যাট 3.9 গ্রাম\r\n\r\nস্যাচুরেটেড ফ্যাট 0.5 গ্রাম\r\n\r\nমোট কার্বোহাইড্রেট 12.5 গ্রাম\r\n\r\nখাদ্যতালিকাগত ফাইবার 0.6 গ্রাম\r\n\r\nপ্রোটিন 2.0 গ্রাম\r\n\r\nকোলেস্টেরল 0.0 মিলিগ্রাম\r\n\r\nসোডিয়াম 33.0 মিলিগ্রাম\r\n\r\nপটাশিয়াম 359.1 মিগ্রা\r\n\r\nমাইক্রোনিউট্রিয়েন্টস: ভিটামিন: ভিটামিন এ 9.8%\r\n\r\nভিটামিন বি৬ ১১.৩%\r\n\r\nভিটামিন সি 30.5%\r\n\r\nভিটামিন ই 1.1%\r\n\r\nখনিজ পদার্থ: ক্যালসিয়াম 5.1%\r\n\r\nম্যাগনেসিয়াম 6.7%\r\n\r\nফসফরাস 5.0%\r\n\r\nদস্তা 7.2%\r\n\r\nআয়রন 5.7%\r\n\r\nম্যাঙ্গানিজ 12.5%\r\n\r\nআয়োডিন 5.9%\r\n-\r\n-\r\n-\r\nসাধারণ নাম \"Snake gourd (সর্প লাউ)\" বা \"চিচিঙ্গা\" সংকীর্ণ, বাঁকা, দীর্ঘায়িত ফলকে বোঝায়। নরম চামড়াযুক্ত অপরিপক্ক ফল দৈর্ঘ্যে ১৫০ সেমি (৬৯ ইঞ্চি) পর্যন্ত বড় হতে পারে। এটি নরম, কোমল, কিছুটা মিউজিলিনাস মাংসবিশিষ্ট ঝিংগা এবং লাউয়ের মতো। এটি দক্ষিণ এশিয়া এবং দক্ষিণ-পূর্ব এশিয়ার রান্নায় জনপ্রিয় এবং বর্তমানে আফ্রিকার কয়েকটি বাড়ির বাগানে জন্মে। চাষের সময় কিছু,অপরিপক্ক ফলটির একটি অপ্রীতিকর গন', '2024-04-19 00:27:08'),
(19, 'Chal Kumra', 'Vegetable', 40, 10, 'image/Product/W_tougan4091.jpg', 150, 'চালকুমড়া প্রধানত সবজি হিসেবে তরকারি বা ভাজি রান্না করে খাওয়া হয়। এছাড়া মোরব্বা তৈরির জন্যও এটি জনপ্রিয়। মোরব্বার জন্য একটু বেশি পরিপক্ব চালকুমড়া দরকার হয়।\r\n\r\nচীন দেশেও এর তরকারি ও মোরব্বা তৈরির প্রচলন আছে। চালকুমড়ার মোরব্বা এবং কেক চীন ও তাইওয়ানে উৎসব উপলক্ষে খাওয়া হয়।\r\n\r\nদক্ষিণ-পূর্ব এশিয়াতে অনেক সময় চালকুমড়ার জুস বা পানীয় খাওয়া হয়; যাকে \'চালকুমড়ার চা\' বলা হয়ে থাকে।\r\n\r\nএর পাতা ও ডগা দিয়ে শাক রান্না করেও খাওয়া হয়।\r\n\r\nদক্ষিণ ভারতে চালকুমড়া ও দই-মাখন সহযোগে এক প্রকার তরল খাদ্য তৈরি করার প্রচলন আছে।', '2024-04-19 00:28:20'),
(20, 'Lau (Bottle Gourd)', 'Vegetable', 20, 10, 'image/Product/lau-bottle-gourd-1-pcs.webp', 200, '1.5 -2 kg\r\n\r\nGourd is yellowish-green in color and usually in the shape of a bottle. The vegetable has a white pulp, with white seeds embedded in the spongy flesh. 100 g of gourd contains 15 calories, 100 g for edible portion contains 1 g fat. Its water content is 96% and It is low in saturated fat, cholesterol, high in dietary fiber, Vitamin C, riboflavin, zinc, thiamine, iron, magnesium and manganese. It promotes weight loss. The vitamins, minerals and dietary fiber in gourd keep the body well-nourished and curb unnecessary appetite, especially if you drink its juice in the morning on an empty stomach.', '2024-04-19 00:33:21'),
(21, 'Green Apple', 'Fruits', 200, 10, 'image/Product/green-apple-50-gm-1-kg.webp', 150, '9pcs -10pcs\r\n\r\nGreen apples provide a huge range of health and beauty benefits, especially when compared to red apples. Green apple has some sweet and sour variety and amazing taste. Green apples possess glossy skin, along with a juicy flesh. They\'re high in fiber and help keep the digestive tract clean and healthy. Green apples are energy givers, contain both flavonoid and polyphenol, also can help prevent diarrhea. One of the major green apple benefits is the high fiber content. These high levels of fiber can help to reduce cholesterol. Green apple decreases chance of colon cancer. A 1-cup serving of green apple juice has 253 calories, with less than 1 gram of total fat. It also has 1.92 grams of protein and almost 42 grams of sugar. Because of this, a single serving of green apple juice has over 59 grams of carbohydrates', '2024-04-19 00:35:54'),
(22, 'Orange', 'Fruits', 200, 10, 'image/Product/orange-indian-50-gm-1-kg.webp', 150, '7pcs -8pcs\r\n\r\nFruit grown in warmer [climates] doesn\'t develop a deep orange color. Cold nighttime temperatures cause citrus to show deep orange color, and when the weather warms up again in late spring and early summer, the citrus tends to regreen\r\n\r\nNutritional facts/Ingredients :\"Vitamin A 4% Vitamin C 88%\r\n\r\nCalcium 4% Iron 0%\r\n\r\nVitamin D 0% Vitamin B-6 5%\r\n\r\nCobalamin 0% Magnesium 2% \"', '2024-04-19 00:38:03'),
(23, 'হাইব্রিড মিষ্টি কুমড়োর বীজ', 'Seeds', 30, 10, 'image/Product/pumpkin-growing-600x400.webp', 150, 'মিষ্টি কুমড়া বর্ষজীবী লতানো উদ্ভিদ যা ভিটামিন এ সমৃদ্ধ উৎকৃষ্ট সবজি। কচি মিষ্টি কুমড়া সবজি হিসেবে এবং পাকা ফল দীর্ঘদিন রেখে সবজি হিসেবে ব্যবহার করা যায়। মিষ্টি কুমড়ার পাতা ও কচি ডগা শাক হিসেবে বেশ সুস্বাদু। পরিপক্ক ফল শুষ্ক ঘরে সাধারণ তাপমাত্রায় প্রায় ৪-৬ মাস সংরক্ষণ করা যায়। মিষ্টি কুমড়া ডায়াবেটিস রোগ নিয়ন্ত্রণে কাজ করে।', '2024-04-19 00:50:24');

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
(4, 'Maruph', '01321098082', 'smmaruph.bhbd2001@gmail.com', 'NatunBazar,Vatara,Dhaka', 'farmer\r\n', '$2y$10$XEpX9H9IpAtGLmz.ihqc5.ur8fx.WnV0zF5gDV92x5Yx50ctvyCa2', 'image/image.jpg', 10000, '2024-04-19 00:09:12'),
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
(15, '', '', '', '', 'farmer', '$2y$10$eOOdzsvXtMoF8ZH20Z7XCenzRtEkCwQC4UeIs.rUU6QwmgQ/Bjyme', '', 0, '2024-04-10 00:00:45'),
(16, '   Md. Sagor Ahmed', '01727693689', 'chefstable@gmail.com', 'Charfassion ,Bhola,Barishal,Bangladesh.', '', '$2y$10$aeVCkdnU88nzMSyjL8TxsuL.la/WSec9LT/2gxiVcCxwWGJIWUYnS', 'image/profile_picture/provat.jpg', 0, '2024-04-18 15:51:20'),
(17, ' Maruph S. M.', '01912379617', 'smmarph.bhbd2001@gmail.com', 'Bhola', '', '$2y$10$D1rPLdLxnWt2XyjFVHjc0uRAG4PwJEMC9HrxQYNH8ExuaaTvzi/h6', 'image/profile_picture/138299098_2835154513421196_2427720257165028376_n.jpg', 0, '2024-04-19 00:07:50');

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
-- Indexes for table `community_post`
--
ALTER TABLE `community_post`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `community_post_comments`
--
ALTER TABLE `community_post_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `community_post_likes`
--
ALTER TABLE `community_post_likes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `community_post`
--
ALTER TABLE `community_post`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `community_post_comments`
--
ALTER TABLE `community_post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `community_post_likes`
--
ALTER TABLE `community_post_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
