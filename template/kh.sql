-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 11:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `article_image` varchar(500) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
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
  `order_type` varchar(255) NOT NULL DEFAULT 'individual',
  `group_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product_price`, `quantity`, `order_type`, `group_id`, `timestamp`) VALUES
(38, 21, 25, 140, 4, 'group', 0, '2024-04-24 07:37:07'),
(43, 21, 25, 140, 4, 'individual', 0, '2024-04-24 12:45:58'),
(44, 21, 25, 175, 5, 'individual', 0, '2024-04-24 12:49:55'),
(45, 21, 25, 35, 1, 'individual', 0, '2024-04-24 13:47:58'),
(50, 22, 25, 70, 2, 'group', 39, '2024-04-27 16:48:29'),
(51, 22, 26, 400, 2, 'group', 40, '2024-04-27 19:11:21'),
(52, 22, 27, 2000, 10, 'group', 43, '2024-04-28 12:26:32'),
(53, 24, 27, 400, 2, 'group', 43, '2024-04-29 09:23:44'),
(54, 24, 32, 60, 2, 'group', 45, '2024-04-30 12:03:53'),
(55, 22, 25, 35, 1, 'individual', 0, '2024-05-03 21:17:02'),
(56, 22, 29, 280, 7, 'individual', 0, '2024-05-03 21:17:19'),
(57, 22, 30, 2150, 50, 'individual', 0, '2024-05-03 21:19:37');

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
-- Table structure for table `group_order_table`
--

CREATE TABLE `group_order_table` (
  `order_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_order_table`
--

INSERT INTO `group_order_table` (`order_id`, `group_id`, `seller_id`, `product_id`, `quantity`, `payment_method`, `delivery_status`, `timestamp`) VALUES
(1, 36, 20, 25, 1, 'bkash', 'pending', '2024-05-03 16:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `group_purchase`
--

CREATE TABLE `group_purchase` (
  `group_id` int(11) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `contributors` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `group_wallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_purchase`
--

INSERT INTO `group_purchase` (`group_id`, `leader_id`, `product_id`, `title`, `content`, `p_image`, `post_status`, `timestamp`, `contributors`, `quantity`, `group_wallet`) VALUES
(35, 21, 25, 'আম​', 'আম খেতে মজা লাগে', 'image/community_post/Mangos_-_single_and_halved.jpg', 'Pending', '2024-04-23 23:44:58', 0, 5, 0),
(36, 22, 25, 'আম​', 'আম খেতে মজা লাগে', 'image/community_post/Mangos_-_single_and_halved.jpg', 'pending', '2024-04-25 07:09:30', 0, 0, 35),
(37, 23, 25, 'আম​', 'আম খেতে মজা লাগে', 'image/community_post/Mangos_-_single_and_halved.jpg', 'pending', '2024-04-25 07:41:43', 0, 7, 0),
(38, 22, 25, 'আম​', 'আম খেতে মজা লাগে taina?', 'image/Product/Mangos_-_single_and_halved.jpg', 'pending', '2024-04-26 18:04:30', 0, 8, 0),
(39, 22, 25, 'আম​', 'আম খেতে মজা লাগে................................', 'image/Product/Mangos_-_single_and_halved.jpg', 'pending', '2024-04-27 22:48:20', 1, 8, 0),
(40, 22, 26, 'কাঁঠাল', 'কাঁঠাল কাঁচা ও পাকা উভয় অবস্থাতেই খাওয়া যায়। বসন্তকাল থেকে গ্রীষ্মকাল পর্যন্ত কাঁচা কাঁঠাল কান্দা বা ইচোড়’ সবজি হিসেবে খাওয়া হয়। পাকা ফল বেশ পুষ্টিকর, কিন্তু এর গন্ধ অনেকের কাছে ততটা আকর্ষণীয় নয়। তবু মৃদু অম্লযুক্ত সুমিষ্ট স্বাদ ও স্বল্পমূল্যের জন্য অনেকে পছন্দ করেন। কাঁঠালের আঁটি তরকারির সাথে রান্না করে খাওয়া হয় অথবা পুড়িয়ে বাদামের মত খাওয়া যায়। এর একটি সুবিধে হল, আঁটি অনেকদিন ঘরে রেখে দেয়া যায়। পাকা ফলের কোষ সাধারণত খাওয়া হয়, এই কোষ নিঙড়ে রস বের করে তা শুকিয়ে আমসত্বের মত ‘কাঁঠালসত্ব’ও তৈরি করা যায়। এমনটি থাইল্যান্ডে এখন কাঁঠালের চিপস্ তৈরি করা হচ্ছে। কোষ খাওয়ার পর যে খোসা ও ভুতরো ( অমরা ) থাকে তা গবাদি পশুর একটি উত্তম খাদ্য। ভুতরো বা ছোবড়ায় যথেষ্ট পরিমাণে পেকটিন থাকায় তা থেকে জেলি তৈরি করা যায়। এমন কি শাঁস বা পাল্প থেকে কাঁচা মধু আহরণ করার কথাও জানা গেছে। কাঁঠাল গাছের পাতা গবাদি পশুর একটি মজাদার খাদ্য। গাছ থেকে তৈরি হয় মুল্যবান আসবাবপত্র। কাঁঠাল ফল ও গাছের আঁঠালো কষ কাঠ বা বিভিন্ন পাত্রের ছিদ্র বন্ধ করার কাজে ব্যবহৃত হয়।\r\n\r\n\r\nকাঁঠাল\r\nসূক্ষ্ম আনারস- বা কলা ', 'image/Product/Jack_fruit.jpeg', 'pending', '2024-04-28 01:10:49', 1, 8, 0),
(41, 24, 26, 'কাঁঠাল', 'কাঁঠাল কাঁচা ও পাকা উভয় অবস্থাতেই খাওয়া যায়। বসন্তকাল থেকে গ্রীষ্মকাল পর্যন্ত কাঁচা কাঁঠাল কান্দা বা ইচোড়’ সবজি হিসেবে খাওয়া হয়। পাকা ফল বেশ পুষ্টিকর, কিন্তু এর গন্ধ অনেকের কাছে ততটা আকর্ষণীয় নয়। তবু মৃদু অম্লযুক্ত সুমিষ্ট স্বাদ ও স্বল্পমূল্যের জন্য অনেকে পছন্দ করেন। কাঁঠালের আঁটি তরকারির সাথে রান্না করে খাওয়া হয় অথবা পুড়িয়ে বাদামের মত খাওয়া যায়। এর একটি সুবিধে হল, আঁটি অনেকদিন ঘরে রেখে দেয়া যায়। পাকা ফলের কোষ সাধারণত খাওয়া হয়, এই কোষ নিঙড়ে রস বের করে তা শুকিয়ে আমসত্বের মত ‘কাঁঠালসত্ব’ও তৈরি করা যায়। এমনটি থাইল্যান্ডে এখন কাঁঠালের চিপস্ তৈরি করা হচ্ছে। কোষ খাওয়ার পর যে খোসা ও ভুতরো ( অমরা ) থাকে তা গবাদি পশুর একটি উত্তম খাদ্য। ভুতরো বা ছোবড়ায় যথেষ্ট পরিমাণে পেকটিন থাকায় তা থেকে জেলি তৈরি করা যায়। এমন কি শাঁস বা পাল্প থেকে কাঁচা মধু আহরণ করার কথাও জানা গেছে। কাঁঠাল গাছের পাতা গবাদি পশুর একটি মজাদার খাদ্য। গাছ থেকে তৈরি হয় মুল্যবান আসবাবপত্র। কাঁঠাল ফল ও গাছের আঁঠালো কষ কাঠ বা বিভিন্ন পাত্রের ছিদ্র বন্ধ করার কাজে ব্যবহৃত হয়।\r\n\r\n\r\nকাঁঠাল\r\nসূক্ষ্ম আনারস- বা কলা ', 'image/Product/Jack_fruit.jpeg', 'pending', '2024-04-28 01:19:38', 0, 3, 0),
(42, 22, 27, 'কমলা', 'একটি কমলালেবুতে ৮৫% পানি, ১৩% কার্বোহাইড্রেট, এবং সামান্য পরিমাণে চর্বি এবং প্রোটিন (টেবিল) থাকে। মাইক্রোনিউট্রিয়েন্টগুলির মধ্যে, কেবলমাত্র ভিটামিন সি প্রসঙ্গত ১০০ গ্রাম পরিবেশনে উল্লেখযোগ্য পরিমাণে ( দৈনিক প্রয়োজনীয়তার ৩২%) থাকে, অন্যান্য সব পুষ্টি উপাদান কম পরিমাণে থাকে।\r\n\r\n', 'image/Product/komla-1-20211118155334.jpg', 'pending', '2024-04-28 17:37:22', 0, 11, 0),
(43, 22, 27, 'কমলা', 'একটি কমলালেবুতে ৮৫% পানি, ১৩% কার্বোহাইড্রেট, এবং সামান্য পরিমাণে চর্বি এবং প্রোটিন (টেবিল) থাকে। মাইক্রোনিউট্রিয়েন্টগুলির মধ্যে, কেবলমাত্র ভিটামিন সি প্রসঙ্গত ১০০ গ্রাম পরিবেশনে উল্লেখযোগ্য পরিমাণে ( দৈনিক প্রয়োজনীয়তার ৩২%) থাকে, অন্যান্য সব পুষ্টি উপাদান কম পরিমাণে থাকে।\r\n\r\n', 'image/Product/komla-1-20211118155334.jpg', 'pending', '2024-04-28 18:26:23', 2, 18, 0),
(44, 22, 25, 'আম​', 'Hgduychjbjbycdg', 'image/Product/Mangos_-_single_and_halved.jpg', 'pending', '2024-04-29 23:43:35', 0, 10, 0),
(45, 24, 32, 'চীনাবাদাম', 'বাদাম খাওয়ার উপকারিতা:\r\n\r\n১. হাড়ের স্বাস্থ্যের উন্নতি ঘটে: বেশ কিছু গবেষণায় দেখা গেছে বাদামে উপস্থিত ফসফরাস শরীরে প্রবেশ করার পর এমন কিছু কাজ করে যার প্রভাবে হাড়ের ক্ষমতা বৃদ্ধি পেতে শুরু করে। তাই তো প্রতিদিন এক বাটি করে বাদাম খাওয়া শুরু করলে জীবনে কোনও দিন কোনও হাড়ের রোগে আক্রান্ত হওয়ার আশঙ্কা থাকে না।\r\n\r\n২. মস্তিষ্কের শক্তি বৃদ্ধি পায়: আমেরিকার অ্যান্ড্রস ইউনিভার্সিটির গবেষকদের করা এক পরীক্ষায় দেখা গেছে বাদামে এমন কিছু উপাদান রয়েছে, যা কগনিটিভ পাওয়া, সহজ কথায় বললে মস্তিষ্কের ক্ষমতা বৃদ্ধি করতে বিশেষ ভূমিকা পালন করে থাকে। তাই তো পরীক্ষার আগে ছাত্র-ছাত্রীদের নিয়ম করে বাদাম খাওয়ার পরামর্শ দেওয়া হয়ে থাকে।\r\n\r\n৩. ক্যান্সারের মতো রোগ দূরে থাকে: বাদামে উপস্থিত অ্যান্টিঅক্সিডেন্ট ক্যান্সার রোগকে প্রতিরোধ করার পাশাপাশি রোগ প্রতিরোধ ক্ষমতার উন্নতি ঘটানোর মধ্যে দিয়ে নানাবিধ সংক্রমণকে দূরে রাখতেও বিশেষ ভূমিকা পালন করে থাকে। এখানেই শেষ নয়, অ্যান্টিঅক্সিডেন্ট আরও নানা উপকারে লেগে থাকে। যেমন, অ্যাক্সিডেটিভ ট্রেস কমিয়ে কোষেদের ক্ষত রোধ করে, সেই সঙ্গে ত্বকের এবং শরীরের বয়স কমাতেও সাহায্য করে থাকে।\r\n\r\n৪. পুষ্টির ঘাটতি দূর হয়: মধ্যপ্রাচ্য থেকে এসে এদেশে ঝাঁকিয়ে বাসা এই প্রকৃতিক উপাদনটির শরীরে রয়েছে প্রায় ৩.৫ গ্রাম ফাইবার, ৬ গ্রাম প্রোটিন, ১৪ গ্রাম ফ্যাট সহ ভিটামিন ই, ম্যাঙ্গানিজ, ভিটামিন বি২, ফসফরাস এবং ম্যাগনেসিয়াম। এই সবকটি উপাদানই শরীরকে সুস্থ রাখতে বিশেষ প্রয়োজনে লাগে। কিছু কিছু ক্ষেত্রে তো একাধিক ক্রনিক রোগকে দূরে রাখতেও এই উপাদানগুলি সাহায্য করে। প্রসঙ্গত, এক মুঠো বাদাম খেলে শরীরে মাত্র ১৬১ ক্যালরি প্রবেশ করে। ফলে এই খাবারটি খেলে ওজন বেড়ে যাওয়ার কোনও ভয় থাকে না।\r\n\r\n৫. রোগ প্রতিরোধ ক্ষমতার উন্নতি ঘটায়: এটি হল এমন একটি উপাদান যা ক্যান্সার রোগকে প্রতিরোধ করার পাশাপাশি রোগ প্রতিরোধ ক্ষমতার উন্নতি ঘটানোর মধ্যে দিয়ে নানাবিধ সংক্রমণকে দূরে রাখতেও বিশেষ ভূমিকা পালন করে থাকে। এখানেই শেষ নয়, অ্যান্টিঅক্সিডেন্ট আরও নানা উপকারে লেগে থাকে। যেমন, অ্যাক্সিডেটিভ ট্রেস কমিয়ে কোষেদের ক্ষত রোধ করে, সেই সঙ্গে ত্বকের এবং শরীরের বয়স কমাতেও সাহায্য করে থাকে।\r\n\r\n৬. খারাপ কোলেস্টেরলের মাত্রা কমে: গত কয়েক দশকের পরিসংখ্যান ঘাঁটলে দেখতে পাবেন কীভাবে অনিয়ন্ত্রিত কোলেস্টেরলের কারণে হার্টের রোগে আক্রান্তের হার বৃদ্ধি পয়েছে। তাই এই বিষয়ে সাবধান থাকাটা জরুরি। শরীরে যাতে কোনও ভাবেই বাজে কোলেস্টেরলের মাত্রা বৃদ্ধি না পায় সেদিকে খেয়াল রাখতে হবে। আর এই কাজটি করবেন কীভাবে? খুব সহজ! প্রতিদিনের ডায়েটে বাদামের অন্তর্ভুক্তি ঘটান, তাহলেই দেখবেন হার্টের স্বাস্থ্য নিয়ে আর চিন্তায় থাকতে হবে না। আসলে বাদামে উপস্থিত বেশ কিছু কার্যকরি উপাদান শরীরে অন্দরে ভাল কোলেস্টরলের মাত্রা বাড়িয়ে দেয়। ফলে স্বাভাবিকভাবেই খারাপ কোলেস্টরলের মাত্রা কমতে শুরু করে। সেই সঙ্গে কমে হার্টের রোগে আক্রান্ত হওয়ার আশঙ্কাও।\r\n\r\n৭. রক্তচাপ নিয়ন্ত্রণে থাকে: শুধু ডায়াবেটিস নয়, বাদামে উপস্থিত ম্যাগনেসিয়াম রক্তচাপ নিয়ন্ত্রণেও বিশেষ ভূমিকা পালন করে থাকে। একাধিক কেস স্টাডি করে দেখা গেছে শরীরে এই খনিজটির ঘাটতি দেখা দিলে অল্প সময়ের মধ্যেই ব্লাড প্রেসার মারাত্মক বেড়ে যাওয়ার মতো ঘটনা ঘটতে পারে। আর বেশি দিন যদি রক্ত চাপ নিয়ন্ত্রণের বাইরে থাকে, তাহলে হঠাৎ করে স্ট্রোক, হার্ট অ্যাটাক এবং কিডনির সমস্যা দেখা দেওয়ার আশঙ্কা বৃদ্ধি পায়। তাই দেহে যাতে কোনও সময় ম্যাগনেসিয়ামের ঘাটতি দেখা না দেয়, সেদিকে খেয়াল রাখা একান্ত প্রয়োজন।\r\n\r\n৮. ওজন নিয়ন্ত্রণে চলে আসে: বাদাম খাওয়ার পর ক্ষিদে একেবারে কমে যায়। ফলে মাত্রাতিরিক্ত খাবার খাওয়ার প্রবণতা হ্রাস পায়। সেই সঙ্গে শরীরে প্রয়োজন অতিরিক্ত ক্যালরি জমে ওজন বৃদ্ধির সম্ভাবনাও কমে।\r\n\r\n৯. রক্তে শর্করার মাত্রা নিয়ন্ত্রণে থাকে: বাদামে থাকা ম্যাগনেসিয়াম রক্তে উপস্থিত শর্করার মাত্রাকে নিয়ন্ত্রণে রাখতে সাহায্য করে। সেই কারণেই তো ডায়াবেটিকদের নিয়মিত বাদাম খাওয়ার পরামর্শ দিয়ে থাকেন চিকিৎসকেরা। প্রসঙ্গত, সম্প্রতি প্রকাশিত এক গবেষণায় দেখা গেছে নিয়মিত বাদাম খাওয়ার অভ্যাস করলে টাইপ-২ ডায়াবেটিসে আক্রান্ত হওয়ার আশঙ্কা প্রায় ২৫-৩৮ শতাংশ কমে যায়। তাই যাদের পরিবারে এই মারণ রোগের ইতিহাস রয়েছে, তারা সময় থাকতে বাদামকে কাজে লাগাতে শুরু করে দিন। দেখবেন উপকার মিলবে।\r\n\r\n১০. কোষেদের ক্ষমতা বৃদ্ধি পায়: বাদামে উপস্থিত প্রচুর মাত্রায় ভিটামিন ই শরীরের প্রতিটি কোণায় ছড়িয়ে থাকা কোষেদের কর্মক্ষমতার বৃদ্ধি ঘটানোর সঙ্গে সঙ্গে তাদের শরীরে যাতে কোনও ভাবে ক্ষতের সৃষ্টি না হয়, সেদিকেও খেয়াল রাখে। ফলে বয়স বাড়লেও শরীরের উপর তার কোনও প্রভাব পরে না।\r\n\r\n১১. হজম ক্ষমতার উন্নতি ঘটে: বেশ কিছু গবেষণায় দেখা গেছে নিয়মিত জলে ভেজানো কাজুবাদাম খেলে দেহের অন্দরে বিশেষ কিছু এনজাইমের ক্ষরণ বেড়ে যায়, যার প্রভাবে হজম ক্ষমতার উন্নতি ঘটতে শুরু করে। সেই সঙ্গে গ্যাস-অম্বলের প্রকোপও কমে যায়। এবার বুঝেছেন তো খাদ্যরসিক বাঙালি, আমাদের কেন প্রতিদিন একমুঠো করে বাদাম খাওয়া উচিত!', 'image/Product/badam.jpg', 'pending', '2024-04-30 18:03:42', 1, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_purchase_comments`
--

CREATE TABLE `group_purchase_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_purchase_comments`
--

INSERT INTO `group_purchase_comments` (`comment_id`, `user_id`, `group_id`, `comment_text`, `timestamp`) VALUES
(14, 22, 0, 'is it a good product?', '2024-04-25 15:53:56'),
(15, 22, 0, 'hi', '2024-04-25 16:05:52'),
(16, 22, 0, 'hiiii buddy', '2024-04-25 16:11:28'),
(18, 22, 37, 'It\'s 6 PM', '2024-04-26 11:49:02'),
(19, 22, 38, 'hiii', '2024-04-26 12:58:21'),
(21, 22, 36, 'ki vai loiben naki\r\n', '2024-04-28 11:27:28'),
(22, 22, 45, 'hi', '2024-05-02 17:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `group_purchase_contributor`
--

CREATE TABLE `group_purchase_contributor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `bid` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_purchase_contributor`
--

INSERT INTO `group_purchase_contributor` (`id`, `user_id`, `group_id`, `bid`, `quantity`, `order_status`, `timestamp`, `price`) VALUES
(115, 22, 39, 1, 2, 'pending', '2024-04-27 16:48:29', 70),
(116, 22, 40, 1, 2, 'pending', '2024-04-27 19:11:21', 400),
(117, 22, 43, 1, 10, 'pending', '2024-04-28 12:26:32', 2000),
(118, 24, 43, 1, 2, 'pending', '2024-04-29 09:23:44', 400),
(119, 24, 45, 1, 2, 'pending', '2024-04-30 12:03:53', 60);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `delivery_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `buyer_id`, `seller_id`, `product_id`, `quantity`, `delivery_status`, `payment_method`, `timestamp`) VALUES
(24, 21, 20, 25, 5, 'pending', 'wallet', '2024-04-23 17:59:11'),
(25, 21, 20, 25, 6, 'pending', 'wallet', '2024-04-24 11:18:36'),
(26, 21, 20, 25, 3, 'pending', 'wallet', '2024-04-24 11:22:52'),
(27, 21, 20, 25, 3, 'pending', 'wallet', '2024-04-24 12:25:14'),
(28, 21, 20, 25, 3, 'pending', 'cod', '2024-04-24 12:46:08');

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
  `description` mediumtext DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_name`, `category`, `price`, `user_id`, `image`, `quantity`, `description`, `timestamp`) VALUES
(25, 'আম​', 'Fruits', 35, 20, 'image/Product/Mangos_-_single_and_halved.jpg', 120, 'আম খেতে মজা লাগে', '2024-04-23 23:41:22'),
(26, 'কাঁঠাল', 'Fruits', 200, 20, 'image/Product/Jack_fruit.jpeg', 100, 'কাঁঠাল কাঁচা ও পাকা উভয় অবস্থাতেই খাওয়া যায়। বসন্তকাল থেকে গ্রীষ্মকাল পর্যন্ত কাঁচা কাঁঠাল কান্দা বা ইচোড়’ সবজি হিসেবে খাওয়া হয়। পাকা ফল বেশ পুষ্টিকর, কিন্তু এর গন্ধ অনেকের কাছে ততটা আকর্ষণীয় নয়। তবু মৃদু অম্লযুক্ত সুমিষ্ট স্বাদ ও স্বল্পমূল্যের জন্য অনেকে পছন্দ করেন। কাঁঠালের আঁটি তরকারির সাথে রান্না করে খাওয়া হয় অথবা পুড়িয়ে বাদামের মত খাওয়া যায়। এর একটি সুবিধে হল, আঁটি অনেকদিন ঘরে রেখে দেয়া যায়। পাকা ফলের কোষ সাধারণত খাওয়া হয়, এই কোষ নিঙড়ে রস বের করে তা শুকিয়ে আমসত্বের মত ‘কাঁঠালসত্ব’ও তৈরি করা যায়। এমনটি থাইল্যান্ডে এখন কাঁঠালের চিপস্ তৈরি করা হচ্ছে। কোষ খাওয়ার পর যে খোসা ও ভুতরো ( অমরা ) থাকে তা গবাদি পশুর একটি উত্তম খাদ্য। ভুতরো বা ছোবড়ায় যথেষ্ট পরিমাণে পেকটিন থাকায় তা থেকে জেলি তৈরি করা যায়। এমন কি শাঁস বা পাল্প থেকে কাঁচা মধু আহরণ করার কথাও জানা গেছে। কাঁঠাল গাছের পাতা গবাদি পশুর একটি মজাদার খাদ্য। গাছ থেকে তৈরি হয় মুল্যবান আসবাবপত্র। কাঁঠাল ফল ও গাছের আঁঠালো কষ কাঠ বা বিভিন্ন পাত্রের ছিদ্র বন্ধ করার কাজে ব্যবহৃত হয়।\r\n\r\n\r\nকাঁঠাল\r\nসূক্ষ্ম আনারস- বা কলা ', '2024-04-28 01:09:55'),
(27, 'কমলা', 'Fruits', 200, 25, 'image/Product/komla-1-20211118155334.jpg', 50, 'একটি কমলালেবুতে ৮৫% পানি, ১৩% কার্বোহাইড্রেট, এবং সামান্য পরিমাণে চর্বি এবং প্রোটিন (টেবিল) থাকে। মাইক্রোনিউট্রিয়েন্টগুলির মধ্যে, কেবলমাত্র ভিটামিন সি প্রসঙ্গত ১০০ গ্রাম পরিবেশনে উল্লেখযোগ্য পরিমাণে ( দৈনিক প্রয়োজনীয়তার ৩২%) থাকে, অন্যান্য সব পুষ্টি উপাদান কম পরিমাণে থাকে।\r\n\r\n', '2024-04-28 01:38:06'),
(29, 'কাঁচা আম', 'Fruits', 40, 26, 'image/Product/Mango.jpg', 50, 'আম সবচেয়ে সুস্বাদু ফলগুলির মধ্যে অন্যতম, এ কারণে আমকে বলা হয় ‘ফলের রাজা’। বিভিন্ন জাতের আমের স্বাদ ও গন্ধ বিভিন্ন রকম। টাটকা পাকা অবস্থায় আম সবচেয়ে উপাদেয়। পাকা আমের খোসা ছাড়িয়ে শাঁস ছোট ছোট টুকরায় বা কেটে অথবা অবিকল অবস্থায় খাওয়া হয়। তরকারি বা ডালে বাড়তি স্বাদ আনার জন্যও কাঁচা আম ব্যবহূত হয়। কাঁচা ও পাকা উভয় প্রকার আম দিয়ে জ্যাম, জেলি, স্কোয়াশ, চাটনি, আচারসহ বিভিন্ন ধরনের খাদ্য তৈরি করা হয়।', '2024-04-28 23:09:20'),
(30, 'মিনিকেট চাল', 'Grain Product', 43, 26, 'image/Product/OIP.jpeg', 300, 'চালের ধরন: মিনিকেট\r\nপ্রাকৃতিকভাবে সুগন্ধযুক্ত চাল\r\nসাদা এবং অতিরিক্ত দীর্ঘ\r\nবাংলাদেশে প্রক্রিয়াজাত।\r\nমিনিকেট চালের উপকারিতা\r\nমিনিকেট ভাতের অনেক ধরণের স্বাস্থ্য উপকারিতা রয়েছে। ভাত হজম করা সহজ। পেটের কোনো সমস্যা সৃষ্টি করে না। এই ভাতে বিভিন্ন খাদ্যগুণ রয়েছে। কিছু সুবিধা নীচে তালিকাভুক্ত করা হয়েছে:\r\n● এতে রয়েছে ফাইবার যা হজমের সমস্যা কমায়।\r\n● মিনিকেটে রয়েছে প্রাকৃতিক তেল।\r\n● ভিটামিন বি, থায়ামিন এবং অ্যান্টি-অক্সিডেন্টে রয়েছে।\r\n● ভিটামিন বি সমৃদ্ধ ১।\r\n● ভিটামিন বি 3 এবং বি 6 এর একটি শালীন পরিমাণ রয়েছে।\r\n● থাইরয়েড সমস্যায় সহায়ক\r\n● এতে থাকা ম্যাগনেসিয়াম পেটের জন্য ভালো।', '2024-04-28 23:17:10'),
(31, 'খাঁটি ঘি', 'Grain Product', 500, 26, 'image/Product/ghee.jpeg', 250, 'খাঁটি ঘি\r\nঘি এর কদর ভারতীয় উপমহাদেশের সর্বত্র। বাংলার বহু রান্নায়, মূলত গুরুপাক খাবারে ঘি ব্যবহৃত হয়ে খাদ্যরসিক বাঙ্গালির রসনার তৃপ্তি ঘটিয়ে আসছে। পোলাও, বিরিয়ানিতে ঘি একটি অত্যাবশ্যক উপকরণ। এছাড়াও নানান রকম ভর্তা ও ভাজিতেও ঘি তার চমৎকার গন্ধের জন্যে সমাদৃত। পঞ্জাবের রেস্তোরা গুলোতে সেখানকার ঐতিহ্যবাহী খাবার তৈরিতে ঘি এর বিপুল ব্যবহার হয়। আবার নান ও রুটি সেঁকার পর এর ওপর ঘি এর প্রলেপ দেওয়া হয়। বিভিন্ন রকম মিষ্টান্ন, হালুয়া, লাড্ডু ইত্যাদি প্রস্তুতিতে ঘি ব্যবহৃত হয়।', '2024-04-28 23:21:43'),
(32, 'চীনাবাদাম', 'Grain Product', 30, 26, 'image/Product/badam.jpg', 150, 'বাদাম খাওয়ার উপকারিতা:\r\n\r\n১. হাড়ের স্বাস্থ্যের উন্নতি ঘটে: বেশ কিছু গবেষণায় দেখা গেছে বাদামে উপস্থিত ফসফরাস শরীরে প্রবেশ করার পর এমন কিছু কাজ করে যার প্রভাবে হাড়ের ক্ষমতা বৃদ্ধি পেতে শুরু করে। তাই তো প্রতিদিন এক বাটি করে বাদাম খাওয়া শুরু করলে জীবনে কোনও দিন কোনও হাড়ের রোগে আক্রান্ত হওয়ার আশঙ্কা থাকে না।\r\n\r\n২. মস্তিষ্কের শক্তি বৃদ্ধি পায়: আমেরিকার অ্যান্ড্রস ইউনিভার্সিটির গবেষকদের করা এক পরীক্ষায় দেখা গেছে বাদামে এমন কিছু উপাদান রয়েছে, যা কগনিটিভ পাওয়া, সহজ কথায় বললে মস্তিষ্কের ক্ষমতা বৃদ্ধি করতে বিশেষ ভূমিকা পালন করে থাকে। তাই তো পরীক্ষার আগে ছাত্র-ছাত্রীদের নিয়ম করে বাদাম খাওয়ার পরামর্শ দেওয়া হয়ে থাকে।\r\n\r\n৩. ক্যান্সারের মতো রোগ দূরে থাকে: বাদামে উপস্থিত অ্যান্টিঅক্সিডেন্ট ক্যান্সার রোগকে প্রতিরোধ করার পাশাপাশি রোগ প্রতিরোধ ক্ষমতার উন্নতি ঘটানোর মধ্যে দিয়ে নানাবিধ সংক্রমণকে দূরে রাখতেও বিশেষ ভূমিকা পালন করে থাকে। এখানেই শেষ নয়, অ্যান্টিঅক্সিডেন্ট আরও নানা উপকারে লেগে থাকে। যেমন, অ্যাক্সিডেটিভ ট্রেস কমিয়ে কোষেদের ক্ষত রোধ করে, সেই সঙ্গে ত্বকের এবং শরীরের বয়স কমাতেও সাহায্য করে থাকে।\r\n\r\n৪. পুষ্টির ঘাটতি দূর হয়: মধ্যপ্রাচ্য থেকে এসে এদেশে ঝাঁকিয়ে বাসা এই প্রকৃতিক উপাদনটির শরীরে রয়েছে প্রায় ৩.৫ গ্রাম ফাইবার, ৬ গ্রাম প্রোটিন, ১৪ গ্রাম ফ্যাট সহ ভিটামিন ই, ম্যাঙ্গানিজ, ভিটামিন বি২, ফসফরাস এবং ম্যাগনেসিয়াম। এই সবকটি উপাদানই শরীরকে সুস্থ রাখতে বিশেষ প্রয়োজনে লাগে। কিছু কিছু ক্ষেত্রে তো একাধিক ক্রনিক রোগকে দূরে রাখতেও এই উপাদানগুলি সাহায্য করে। প্রসঙ্গত, এক মুঠো বাদাম খেলে শরীরে মাত্র ১৬১ ক্যালরি প্রবেশ করে। ফলে এই খাবারটি খেলে ওজন বেড়ে যাওয়ার কোনও ভয় থাকে না।\r\n\r\n৫. রোগ প্রতিরোধ ক্ষমতার উন্নতি ঘটায়: এটি হল এমন একটি উপাদান যা ক্যান্সার রোগকে প্রতিরোধ করার পাশাপাশি রোগ প্রতিরোধ ক্ষমতার উন্নতি ঘটানোর মধ্যে দিয়ে নানাবিধ সংক্রমণকে দূরে রাখতেও বিশেষ ভূমিকা পালন করে থাকে। এখানেই শেষ নয়, অ্যান্টিঅক্সিডেন্ট আরও নানা উপকারে লেগে থাকে। যেমন, অ্যাক্সিডেটিভ ট্রেস কমিয়ে কোষেদের ক্ষত রোধ করে, সেই সঙ্গে ত্বকের এবং শরীরের বয়স কমাতেও সাহায্য করে থাকে।\r\n\r\n৬. খারাপ কোলেস্টেরলের মাত্রা কমে: গত কয়েক দশকের পরিসংখ্যান ঘাঁটলে দেখতে পাবেন কীভাবে অনিয়ন্ত্রিত কোলেস্টেরলের কারণে হার্টের রোগে আক্রান্তের হার বৃদ্ধি পয়েছে। তাই এই বিষয়ে সাবধান থাকাটা জরুরি। শরীরে যাতে কোনও ভাবেই বাজে কোলেস্টেরলের মাত্রা বৃদ্ধি না পায় সেদিকে খেয়াল রাখতে হবে। আর এই কাজটি করবেন কীভাবে? খুব সহজ! প্রতিদিনের ডায়েটে বাদামের অন্তর্ভুক্তি ঘটান, তাহলেই দেখবেন হার্টের স্বাস্থ্য নিয়ে আর চিন্তায় থাকতে হবে না। আসলে বাদামে উপস্থিত বেশ কিছু কার্যকরি উপাদান শরীরে অন্দরে ভাল কোলেস্টরলের মাত্রা বাড়িয়ে দেয়। ফলে স্বাভাবিকভাবেই খারাপ কোলেস্টরলের মাত্রা কমতে শুরু করে। সেই সঙ্গে কমে হার্টের রোগে আক্রান্ত হওয়ার আশঙ্কাও।\r\n\r\n৭. রক্তচাপ নিয়ন্ত্রণে থাকে: শুধু ডায়াবেটিস নয়, বাদামে উপস্থিত ম্যাগনেসিয়াম রক্তচাপ নিয়ন্ত্রণেও বিশেষ ভূমিকা পালন করে থাকে। একাধিক কেস স্টাডি করে দেখা গেছে শরীরে এই খনিজটির ঘাটতি দেখা দিলে অল্প সময়ের মধ্যেই ব্লাড প্রেসার মারাত্মক বেড়ে যাওয়ার মতো ঘটনা ঘটতে পারে। আর বেশি দিন যদি রক্ত চাপ নিয়ন্ত্রণের বাইরে থাকে, তাহলে হঠাৎ করে স্ট্রোক, হার্ট অ্যাটাক এবং কিডনির সমস্যা দেখা দেওয়ার আশঙ্কা বৃদ্ধি পায়। তাই দেহে যাতে কোনও সময় ম্যাগনেসিয়ামের ঘাটতি দেখা না দেয়, সেদিকে খেয়াল রাখা একান্ত প্রয়োজন।\r\n\r\n৮. ওজন নিয়ন্ত্রণে চলে আসে: বাদাম খাওয়ার পর ক্ষিদে একেবারে কমে যায়। ফলে মাত্রাতিরিক্ত খাবার খাওয়ার প্রবণতা হ্রাস পায়। সেই সঙ্গে শরীরে প্রয়োজন অতিরিক্ত ক্যালরি জমে ওজন বৃদ্ধির সম্ভাবনাও কমে।\r\n\r\n৯. রক্তে শর্করার মাত্রা নিয়ন্ত্রণে থাকে: বাদামে থাকা ম্যাগনেসিয়াম রক্তে উপস্থিত শর্করার মাত্রাকে নিয়ন্ত্রণে রাখতে সাহায্য করে। সেই কারণেই তো ডায়াবেটিকদের নিয়মিত বাদাম খাওয়ার পরামর্শ দিয়ে থাকেন চিকিৎসকেরা। প্রসঙ্গত, সম্প্রতি প্রকাশিত এক গবেষণায় দেখা গেছে নিয়মিত বাদাম খাওয়ার অভ্যাস করলে টাইপ-২ ডায়াবেটিসে আক্রান্ত হওয়ার আশঙ্কা প্রায় ২৫-৩৮ শতাংশ কমে যায়। তাই যাদের পরিবারে এই মারণ রোগের ইতিহাস রয়েছে, তারা সময় থাকতে বাদামকে কাজে লাগাতে শুরু করে দিন। দেখবেন উপকার মিলবে।\r\n\r\n১০. কোষেদের ক্ষমতা বৃদ্ধি পায়: বাদামে উপস্থিত প্রচুর মাত্রায় ভিটামিন ই শরীরের প্রতিটি কোণায় ছড়িয়ে থাকা কোষেদের কর্মক্ষমতার বৃদ্ধি ঘটানোর সঙ্গে সঙ্গে তাদের শরীরে যাতে কোনও ভাবে ক্ষতের সৃষ্টি না হয়, সেদিকেও খেয়াল রাখে। ফলে বয়স বাড়লেও শরীরের উপর তার কোনও প্রভাব পরে না।\r\n\r\n১১. হজম ক্ষমতার উন্নতি ঘটে: বেশ কিছু গবেষণায় দেখা গেছে নিয়মিত জলে ভেজানো কাজুবাদাম খেলে দেহের অন্দরে বিশেষ কিছু এনজাইমের ক্ষরণ বেড়ে যায়, যার প্রভাবে হজম ক্ষমতার উন্নতি ঘটতে শুরু করে। সেই সঙ্গে গ্যাস-অম্বলের প্রকোপও কমে যায়। এবার বুঝেছেন তো খাদ্যরসিক বাঙালি, আমাদের কেন প্রতিদিন একমুঠো করে বাদাম খাওয়া উচিত!', '2024-04-28 23:26:54');

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
  `district` varchar(255) NOT NULL,
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

INSERT INTO `user` (`user_id`, `name`, `phone_number`, `email`, `district`, `address`, `user_type`, `password`, `profile_picture`, `curr_balance`, `timestamp`) VALUES
(20, ' Sadik', '01866757235', 'lol@gmail.com', 'Bogura', 'Lalmatia', 'farmer', '$2y$10$BAvc09/fdLtu8MyvfEilX.hBJGgTS2WmcaI8H2DTNeC7kh3.XziGi', 'image/profile_picture/pro_pic.jpg', 1000, '2024-04-24 16:52:01'),
(21, ' Saddy Mann', '01875368551', 'saddy@gmail.com', 'Dhaka', 'Miu Miu City', 'customer', '$2y$10$5rS7Y1zSV1mGtQitbzay1.sGyyZa0eBm2DQ6wHNlfpM1ASVXOX4Ee', 'image/profile_picture/person.jpg', 1195, '2024-04-24 18:25:14'),
(22, '   S.M. Maruph', '01766972626', 'smmarph.bhbd2001@gmail.com', 'Bhola', 'Bhola', 'customer', '$2y$10$FCeWwQLbk81Sfv9qx0vSxeAcrzfDHOUJOr2gmZDcar7DVsB2OM6IW', 'image/profile_picture/138299098_2835154513421196_2427720257165028376_n.jpg', 0, '2024-04-30 00:49:41'),
(23, '', '01712379617', '', 'Bhola', '', 'customer', '$2y$10$tgmU34WY00FQDXCj0vLL6OGkCEMjn21IyCreHecSIMOMvETsIIBmG', '', 0, '2024-04-25 07:40:54'),
(24, ' Provat', '01321098082', 'pk@gmail.com', 'Chandpur', 'Chandpur.', 'customer', '$2y$10$QeEl4wX89BC27fViUogZ9OTw5XGOBl75RSe657f6liXvU1y5KHtES', 'image/profile_picture/person.jpg', 0, '2024-04-28 01:19:22'),
(25, ' Rafsan', '01719595420', 'rafsan123@gmail.com', 'Noakhali', 'Maijdi ,Noakhali', 'farmer', '$2y$10$hAbRMxa/uXL6Sd8mhexciuq6sYdgqR8i7W2N2BvSWxNdUjOGmgJZa', 'image/profile_picture/Screenshot 2024-04-24 200154.png', 0, '2024-04-28 01:39:35'),
(26, ' Md.Sohag', '01727038351', 'sohag@gmail.com', 'Bhola', 'Bhola', 'farmer', '$2y$10$SEscmHl1KFt/ZPPpTuBx/e7ER/O9WId1JY3skO2iF6G8QHfODNWHC', 'image/profile_picture/person.jpg', 0, '2024-04-28 23:02:24');

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
-- Indexes for table `favourite_seller`
--
ALTER TABLE `favourite_seller`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `group_order_table`
--
ALTER TABLE `group_order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `group_purchase`
--
ALTER TABLE `group_purchase`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_purchase_comments`
--
ALTER TABLE `group_purchase_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `group_purchase_contributor`
--
ALTER TABLE `group_purchase_contributor`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `favourite_seller`
--
ALTER TABLE `favourite_seller`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_order_table`
--
ALTER TABLE `group_order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_purchase`
--
ALTER TABLE `group_purchase`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `group_purchase_comments`
--
ALTER TABLE `group_purchase_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `group_purchase_contributor`
--
ALTER TABLE `group_purchase_contributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
