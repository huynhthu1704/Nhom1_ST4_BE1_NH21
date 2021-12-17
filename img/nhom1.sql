-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 10:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pwd`) VALUES
(1, 'ngocthu', '57e12e44ca320a67be8ec53eacee7499');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cus_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `join_day` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `cus_address`, `city`, `zip_code`, `phone_number`, `gender`, `birthday`, `join_day`, `username`, `pwd`) VALUES
(1, 'Thư', 'Huỳnh', 'huynhthingocthu@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', '123456788', 'Nữ', '1991-11-06 15:49:05', '2021-11-27 21:49:33', 'ngocthu', '57e12e44ca320a67be8ec53eacee7499'),
(2, 'Trí', 'Nguyễn Thành Đức', 'nguyenthanhductri@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', '123456789', 'Nam', '2001-09-14 17:39:27', '2021-12-15 17:40:39', 'ductri', 'ductri');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `dis_id` int(11) NOT NULL,
  `dis_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dis_percent` float NOT NULL,
  `dis_active` tinyint(1) NOT NULL,
  `dis_created_at` datetime DEFAULT current_timestamp(),
  `start_day` datetime DEFAULT NULL,
  `end_day` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`dis_id`, `dis_name`, `dis_percent`, `dis_active`, `dis_created_at`, `start_day`, `end_day`) VALUES
(1, 'NO DISCOUNT', 0, 1, '2021-12-01 15:02:40', '2021-12-01 06:00:00', '2021-12-31 20:00:00'),
(2, 'MERRY CHRISTMAS', 10, 1, '2021-12-01 15:03:33', '2021-12-20 06:00:00', '2021-12-31 20:00:00'),
(3, 'THE NEW YEAR 2022', 15, 1, '2021-12-01 15:05:00', '2021-12-01 06:00:00', '2022-01-10 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Xiaomi'),
(2, 'Apple'),
(3, 'SamSung'),
(4, 'Acer'),
(5, 'LG'),
(6, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `shipping_fee` float NOT NULL,
  `total` float NOT NULL,
  `phone_number` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `note` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `first_name`, `last_name`, `email`, `order_address`, `city`, `zip_code`, `quantity`, `sub_total`, `shipping_fee`, `total`, `phone_number`, `customer_id`, `order_date`, `note`) VALUES
(11, 'Thư', 'Huỳnh', 'huynhthingocthu@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', 82, 786389000, 0, 786389000, '123456788', 1, '2021-12-15 17:40:49', ''),
(12, 'Thư', 'Huỳnh', 'huynhthingocthu@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', 82, 786389000, 0, 786389000, '123456788', 1, '2021-12-15 17:46:55', ''),
(13, 'Thư', 'Huỳnh', 'huynhthingocthu@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', 82, 786389000, 0, 786389000, '123456788', 1, '2021-12-15 17:47:16', ''),
(14, 'Thư', 'Huỳnh', 'huynhthingocthu@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', 82, 786389000, 0, 786389000, '123456788', 1, '2021-12-15 17:57:46', ''),
(15, 'Thư', 'Huỳnh', 'huynhthingocthu@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', 82, 786389000, 0, 786389000, '123456788', 1, '2021-12-15 17:59:42', ''),
(16, 'Thư', 'Huỳnh', 'huynhthingocthu@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', 82, 786389000, 0, 786389000, '123456788', 1, '2021-12-15 18:00:43', ''),
(17, 'Thư', 'Huỳnh', 'huynhthingocthu@gmail.com', 'Thủ Đức', 'TP.HCM', '700000', 47, 1107630000, 0, 1107630000, '123456788', 1, '2021-12-16 04:58:16', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `name`, `image`, `price`, `qty`) VALUES
(1, 11, 38, 'Samsung Galaxy Z Flip3 5G 128GB', 'samsung-galaxy-z-flip3-black-org.jpg', 23990000, 23),
(2, 11, 32, 'HP Neverstop Laser 1000w Black and White Laser Printer (4RY23A)', 'may-in-hp-neverstop-laser-1000w-4ry23a-trang-1-org.jpg', 3390000, 56),
(3, 11, 22, 'Laptop Acer Swift 3 SF313 53 518Y i5 1135G7/16GB/512GB ', 'acer-swift-3-sf313-53-518y-i5-nxa4jsv003-1-org.jpg', 22999000, 1),
(4, 11, 34, 'HP 107w WiFi Black & White Laser Printer (4ZB78A)', 'laser-trang-den-hp-107w-wifi-4zb78a-1-org.jpg', 2790000, 1),
(5, 11, 37, 'IPhone 12 mini 64GB', 'iphone-12-mini-den-1-1-org.jpg', 18990000, 1),
(6, 12, 38, 'Samsung Galaxy Z Flip3 5G 128GB', 'samsung-galaxy-z-flip3-black-org.jpg', 23990000, 23),
(7, 12, 32, 'HP Neverstop Laser 1000w Black and White Laser Printer (4RY23A)', 'may-in-hp-neverstop-laser-1000w-4ry23a-trang-1-org.jpg', 3390000, 56),
(8, 12, 22, 'Laptop Acer Swift 3 SF313 53 518Y i5 1135G7/16GB/512GB ', 'acer-swift-3-sf313-53-518y-i5-nxa4jsv003-1-org.jpg', 22999000, 1),
(9, 12, 34, 'HP 107w WiFi Black & White Laser Printer (4ZB78A)', 'laser-trang-den-hp-107w-wifi-4zb78a-1-org.jpg', 2790000, 1),
(10, 12, 37, 'IPhone 12 mini 64GB', 'iphone-12-mini-den-1-1-org.jpg', 18990000, 1),
(11, 14, 38, 'Samsung Galaxy Z Flip3 5G 128GB', 'samsung-galaxy-z-flip3-black-org.jpg', 23990000, 23),
(12, 14, 32, 'HP Neverstop Laser 1000w Black and White Laser Printer (4RY23A)', 'may-in-hp-neverstop-laser-1000w-4ry23a-trang-1-org.jpg', 3390000, 56),
(13, 14, 22, 'Laptop Acer Swift 3 SF313 53 518Y i5 1135G7/16GB/512GB ', 'acer-swift-3-sf313-53-518y-i5-nxa4jsv003-1-org.jpg', 22999000, 1),
(14, 14, 34, 'HP 107w WiFi Black & White Laser Printer (4ZB78A)', 'laser-trang-den-hp-107w-wifi-4zb78a-1-org.jpg', 2790000, 1),
(15, 14, 37, 'IPhone 12 mini 64GB', 'iphone-12-mini-den-1-1-org.jpg', 18990000, 1),
(16, 15, 38, 'Samsung Galaxy Z Flip3 5G 128GB', 'samsung-galaxy-z-flip3-black-org.jpg', 23990000, 23),
(17, 15, 32, 'HP Neverstop Laser 1000w Black and White Laser Printer (4RY23A)', 'may-in-hp-neverstop-laser-1000w-4ry23a-trang-1-org.jpg', 3390000, 56),
(18, 15, 22, 'Laptop Acer Swift 3 SF313 53 518Y i5 1135G7/16GB/512GB ', 'acer-swift-3-sf313-53-518y-i5-nxa4jsv003-1-org.jpg', 22999000, 1),
(19, 15, 34, 'HP 107w WiFi Black & White Laser Printer (4ZB78A)', 'laser-trang-den-hp-107w-wifi-4zb78a-1-org.jpg', 2790000, 1),
(20, 15, 37, 'IPhone 12 mini 64GB', 'iphone-12-mini-den-1-1-org.jpg', 18990000, 1),
(21, 16, 38, 'Samsung Galaxy Z Flip3 5G 128GB', 'samsung-galaxy-z-flip3-black-org.jpg', 23990000, 23),
(22, 16, 32, 'HP Neverstop Laser 1000w Black and White Laser Printer (4RY23A)', 'may-in-hp-neverstop-laser-1000w-4ry23a-trang-1-org.jpg', 3390000, 56),
(23, 16, 22, 'Laptop Acer Swift 3 SF313 53 518Y i5 1135G7/16GB/512GB ', 'acer-swift-3-sf313-53-518y-i5-nxa4jsv003-1-org.jpg', 22999000, 1),
(24, 16, 34, 'HP 107w WiFi Black & White Laser Printer (4ZB78A)', 'laser-trang-den-hp-107w-wifi-4zb78a-1-org.jpg', 2790000, 1),
(25, 16, 37, 'IPhone 12 mini 64GB', 'iphone-12-mini-den-1-1-org.jpg', 18990000, 1),
(26, 17, 44, 'Samsung Galaxy A72', 'samsung-a72-xanh-1.jpg', 11490000, 1),
(27, 17, 31, 'HP Neverstop 1000a Single Function Laser Printer (4RY22A)', 'may-in-laser-hp-neverstop-1000a-4ry21a-600x600.jpg', 3090000, 1),
(28, 17, 36, 'Laptop HP Gaming VICTUS 16 e0175AX R5 5600H/8GB/512GB/4GB RTX3050/144Hz/Win10 ', 'hp-gaming-victus-16-e0175ax-r5-4r0u8pa-1-org.jpg', 24290000, 45);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pro_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discount_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `quantity`, `pro_image`, `description`, `feature`, `created_at`, `discount_id`) VALUES
(1, 'Xiaomi Mi Watch Lite', 1, 3, 1490000, 0, 'Xiaomi Mi Watch Lite.jpg', 'This smart watch owns a large 1.4-inch screen, vivid colors on a TFT panel. This screen has automatic brightness, changing brightness according to the ambient light to always be pleasing to the eye and save battery. You can operate directly on the extremely sensitive touch screen. The beautiful large screen of the Xiaomi Mi Watch Lite will provide all the information you need.', 1, '2021-10-20 09:46:34', 1),
(2, 'Xiaomi Redmi 9A', 1, 1, 2190000, 0, 'Xiaomi Redmi 9A.jpg', 'Xiaomi Redmi 9A has HD + resolution, with trendy screen design and large size. Contains a 5000mAh battery, so it is capable of extending usage time and super durable battery quality. edmi 9A is equipped with a Media chip. Tek Helio G25 8-core greatly increases the processing level of the machine. 2.0 GHz speed combined with 2GB RAM, 32GB internal memory. Users can expand the memory via a MicroSD external memory card with a storage capacity of up to 512G.', 1, '2021-12-14 09:46:44', 2),
(3, 'Smart TV Xiaomi Mi TV3s 60inch', 1, 4, 20000000, 50, 'XiaomiMiTV3s.jpg', ' 4K resolution, IPS panel. 1-year warranty, 30 days replacement.\r\nExcellent color reproduction, HDR technology. Ultra-thin, luxurious accents for your living room.', 0, '2021-09-15 10:58:09', 3),
(4, 'Xiaomi Mi Band 6 Smart Watch', 1, 3, 1110000, 7, 'XiaomiBand6.jpg', 'For the first time on a Mi Band, you will enjoy an edge-to-edge screen measuring up to 1.56 inches, giving a display area up to 50% larger than the previous generation but still very compact. AMOLED technology screen, pixel density of 326ppi displays sharp, vivid colors, clear even under sunlight. This screen is also evenly curved at the edges, very aesthetically pleasing and enhancing the viewing experience. Easily check messages, notifications, calls and other useful information on Mi Band 6. ', 0, '2021-09-23 09:37:28', 2),
(5, 'Xiaomi Amazfit GTS 2 mini smart watch', 1, 3, 2190000, 2, 'Amazfit-GTS-2-Mini-den.jpg', 'At almost half the price of the GTS 2, the Amazfit GTS 2 Mini has the same updated sensors as on the GTS 2. Most importantly, the BioTracker PPG 2 sensor self-developed by Huami is also equipped on the watch, it is responsible for continuous heart rate monitoring as well as SpO2 or blood oxygen monitoring features. Moreover, Amazfit GTS 2 Mini also has GPS so you won\'t have to carry your phone while running.', 1, '2021-12-14 09:37:41', 0),
(6, 'IPhone 6 64GB', 2, 1, 3290000, 5, 'iphone6s-gold-select-2015.jpg', 'The versions of the iPhone 6 have rounded edges, so when holding the device for a long time, it will not hurt because of the need to touch the hand, especially with the large-sized smartphone, this will make you love it more. Although the resolution is only 8 MP, the aperture is F2.2, but what the iPhone 6 camera does is very good, the machine for the focus and touch speed is very fast, the colors are captured very well. iPhone 6 uses 1.4GHz A8 processor for 30% faster task processing, 25% more energy saving than A7 chip on iPhone 5S (1.3GHz), for gaming with configuration heavy will also be very easy. iPhone 6 uses iOS 9 operating system with many interesting features, you can refer to it here. ', 0, '2021-09-15 09:38:06', 2),
(7, 'IPhone 11 128GB  ', 2, 1, 19000000, 9, 'iphone-11-do-1-1-org.jpg', 'Colors to match your personality - 6 eye-catching colors to choose from. Smooth, stable performance - A13 chip, 4GB RAM. Capture full frame - Dual camera supports wide angle, Night Mode. Peace of mind - IP68 waterproof, dustproof, Gorilla Glass ', 0, '2021-09-04 09:38:21', 2),
(8, 'IPhone 12 128GB ', 2, 1, 28000000, 6, 'iphone-12-xanh-duong-1-org.jpg', 'Powerful, super-fast with A14 chip, 4GB RAM, high speed 5G network.\r\nBrilliant, sharp, high brightness - Premium OLED display, Super Retina XDR with HDR10 support, Dolby Vision\r\nImpressive night photography - Night Mode for 2 cameras, Deep Fusion algorithm, Smart HDR 3. Outstanding durability - IP68 waterproof, dustproof, Ceramic Shield back panel', 0, '2021-12-14 09:38:31', 3),
(9, 'Xiaomi Mi 11 5G', 1, 1, 16990000, 8, 'xiaomi-mi-11-xanhduong-1-org.jpg', 'Waterfall screen, delicate curved edge\r\nXiaomi Mi 11 has a modern design with sharp edges and 4 curved corners, not only comfortable to hold, users will also feel the impressive thinness of this smartphone. 108 MP camera for ultimate night photography. Mi 11 is equipped with a 3-camera system with a 108MP main camera, the other 2 secondary lenses offer a variety of shooting styles including a 13MP ultra-wide-angle camera and a 5MP macro camera.', 0, '2021-12-14 09:38:55', 0),
(10, 'iPad Pro M1 12.9-inch WiFi Cellular 128GB(2021)', 2, 5, 35290000, 0, 'ipad-pro-m1-129-inch-wifi-cellular-128gb-2021-xam-1-org.jpg', 'Apple M1 8-core warrior chip\r\nA high-class product is often judged from the inside, and in the iPad Pro M1 12.9 inch 2021 you can completely trust the Apple M1 chip that was once equipped on the MacBook M1. The powerful chipset is almost decisive for all machine operations to become more rhythmic and responsive.\r\n12.9-inch screen expands excellent viewing\r\nThe Liquid Retina XDR screen equipped on iPad Pro 12.9 2021 supports P3, True Tone, ProMotion wide color gamut, giving users stunning display experiences, brilliant and surprisingly realistic images.', 0, '2021-09-07 10:38:15', 0),
(11, 'iPad Air 4 Wifi Cellular Tablet 256GB (2020)', 2, 5, 24790000, 55, 'ipad-air-4-rose-gold-1020x680-org.jpg', 'Colorful, light like Air\r\nMarking a new era of color on iPad lines, Apple added extremely striking and bold colors on the iPad Air 4 2020.\r\n4K movie recording, limitless creativity\r\nThe 12 MP camera on the back of the iPad Air 4 integrates 4K video recording, the best recording standard in the tablet world today (as of September 2020), delivering sharp, detailed footage.', 1, '2021-12-14 09:39:36', 0),
(12, 'Apple Watch S6 LTE with 44mm steel bezel', 2, 3, 18691000, 34, 'apple-watch-s6-lte-44mm-vien-thep-day-thep-vang-cont-1-org.jpg', 'watchOS 7.0 operating system with many new features updated. Owning the new operator WatchOS 7 with a smart interface and tailored to different users, are the distinctive features of the watch edition. The current variable sensor support. Supported with SpO2 blood oxygen measurement and ECG electrocardiogram, these are two parameters that very few companies have equipped their watches with until now, and the publisher equips the watch. to help users better monitor their health.', 0, '2021-09-16 09:39:46', 0),
(13, 'Smart Tivi QLED 4K 43 inch Samsung QA43Q65A ', 3, 4, 16900000, 12, 'QLED-4k-43inch-Samsung-QA43Q65A.jpg', 'Slim, harmonious AirSlim design\r\nSmart TV QLED 4K 43 inch Samsung QA43Q65A is brought up with a 3-sided borderless design to eliminate the feeling of limited images, the TV stand has a beautiful and stable L-shaped shape. Samsung 43 inch TV is suitable for medium spaces such as bedrooms, living rooms,...\r\nStunning images with 4K . resolution\r\nSamsung TVs with 4K resolution bring clear, sharp images to every detail with more than 8 million pixels.', 0, '2021-12-14 09:39:55', 0),
(14, 'Smart Tivi Samsung 4K Crystal UHD 60 inch UA60AU8100 ', 3, 4, 21400000, 0, 'Samsung4k-Crystal-UHD60inch.jpg', 'Slim, delicate, beautiful for modern space\r\nSmart TV Samsung 4K 60 inch UA60AU8100 design Airslim elegant 3-sided borderless screen, adding sophistication to the space used. Samsung 60 inch TV screen size is suitable for family living room, bedroom, small meeting room. 4X sharper images than Full HD with 4K . Ultra HD resolution\r\nEvery detail is displayed clearly and crisply, providing an enjoyable and satisfying viewing experience for users.', 0, '2021-12-14 10:58:22', 0),
(15, 'Samsung Galaxy A52 (8GB/128GB)', 3, 1, 9290000, 76, 'samsung-galaxy-a52-den-1-org.jpg', 'Young and colorful appearance\r\nUnlike current phones, the Galaxy A52 has a more elegant square design, but the edges still have a curvature to provide a comfortable grip when using.\r\nSet of 4 cameras capture every detail\r\nGalaxy A52 satisfies all your photography needs with a cluster of 4 multi-style cameras including: 64MP OIS ultra-sharp camera, 12MP ultra-wide-angle camera, 5MP macro camera and 5MP depth camera.', 0, '2021-10-04 09:40:19', 0),
(16, 'Samsung Galaxy Z Fold3 5G 256GB', 3, 1, 40990000, 32, 'samsung-galaxy-z-fold-3-silver-gc-org.jpg', 'Outstanding performance with Snapdragon 888. With users\' attention to top performance and entertainment, Galaxy Z Fold3 is a real warrior with Snapdragon 888 dragon chip. This is dedicated performance for gaming and smooth handling of tasks. Heavy graphics, giving you a really great experience. Work and play more fully. Despite using 2 large screens, the Galaxy Z Fold3 5G is still equipped with a large 4400 mAh battery for pretty good use in a day with tasks.', 0, '2021-12-14 09:40:29', 0),
(17, 'Samsung Galaxy Watch 4 LTE Classic 42mm', 3, 3, 9490000, 35, 'samsung-galaxy-watch-4-lte-classic-42mm-thumb-1-1-600x600.jpg', 'Exynos W920 processor for significantly improved performance\r\nThe watch uses the new Exynos W920 chip with 20% faster CPU, 50% more RAM and 10 times faster GPU than the previous generation (Galaxy Watch 3\'s Exynos 9110 chip). With this improvement, Galaxy Watch 4 LTE Classic will give users a great experience in scrolling, surfing, and multitasking better, giving you satisfaction when using, without worrying about annoying shakes.', 0, '2021-09-24 09:40:38', 0),
(18, 'Tablet Samsung Galaxy Tab S7 FE', 3, 5, 12790000, 67, 'samsung-galaxy-tab-s7-fe-green-1-org.jpg', 'Powerful performance\r\nPowering the Tab S7 FE is the 8-core Snapdragon 750G chip, manufactured on the 8 nm process with a new generation Kryo 570 core, providing extremely stable performance to meet the different needs of users. People like playing games, editing videos, working, reading newspapers,... all are smooth.\r\nLarge screen for comfortable experience\r\nThe back and frame are finished from metal, flat design on both front and back, 4 soft curved edges, thin screen border, optimizing display area, providing a simple but full look attractive.', 0, '2021-12-14 09:40:50', 0),
(19, 'Samsung Galaxy Tab S6 Lite Tablet', 3, 5, 9090000, 25, 'samsung-galaxy-tab-s6-lite-xanh-1-org.jpg', 'Big screen for work and entertainment\r\nGalaxy Tab S6 Lite owns a large 10.4-inch screen with a resolution of 1200 x 2000 Pixels, providing a wide and sharp display quality that meets the needs of users from meeting, working to entertainment. gaming.\r\nBe more productive with the S Pen\r\nJust like its predecessor, the Galaxy Tab S6 Lite is also equipped with the legendary S-Pen that allows users to quickly jot down whims and smart gadgets.', 0, '2021-10-22 09:40:59', 0),
(20, 'Tablet Samsung Galaxy Tab S7', 3, 5, 15990000, 73, 'samsung-galaxy-tab-s7-xanh-duong-1-org.jpg', 'High-end design, many angular lines\r\nTab S7 has a familiar design when it is finished with metal material, the edges are slightly curved, the bezel around the screen has also been made thinner, giving it a luxurious and modern feel.\r\nLarge screen, true color display\r\nGalaxy Tab S7 is equipped with an 11-inch screen with a resolution of 2560 x 1600 pixels, using an LTPS IPS panel, a 16:10 image ratio and a 120 Hz refresh rate. Bringing a vivid visual experience, giving users great entertainment moments.', 0, '2021-12-14 09:41:09', 0),
(21, 'Laptop Acer Aspire 3 A315 56 502X i5 (1035G1 4GB/256GB/15.6FHD/Win 10) (No.00745025)\r\n', 4, 2, 13999000, 0, 'laptop-acer-aspire-3-a315-56-502x-i5-1035g1-15-6-inch-nx-hs5sv-00f-2.jpg', 'Powerful with 10th Gen Intel Core i5 processor\r\nCompared to competitors in the same segment, Acer Aspire 3 A315 56 502X has a clear strength in configuration when equipped with Intel Core i5 1035G1 chip. This is the 10th generation Ice Lake processor, with 4 cores and 8 threads, manufactured on an advanced, powerful 10nm process and more energy efficient. Your work will be handled smoothly and smoothly thanks to the excellent configuration.\r\nSpeed ​​from SSD hard drive\r\nThe Acer Aspire 3 A315-56 502X is available with 4GB of DDR4 RAM and 256GB of SSD. SSD drives bring a lot of benefits when it comes to helping your laptop boot up, launch applications and copy data extremely quickly. And yet, SSD durability is also much better than traditional HDD, and works very smoothly. Besides, Acer Aspire 3 also uses DDR4 RAM standard, improving multitasking efficiency, running smoothly even in heavy files.', 0, '2021-12-14 10:38:26', 2),
(22, 'Laptop Acer Swift 3 SF313 53 518Y i5 1135G7/16GB/512GB ', 4, 2, 22999000, 0, 'acer-swift-3-sf313-53-518y-i5-nxa4jsv003-1-org.jpg', 'Powerful Power, Main Service\r\nAcer notebook owns stable power with Intel Core i5 Tiger Lake 1135G7 configuration with 4-core 8-thread structure clocked at 2.4 GHz and up to 4.2 GHz thanks to Turbo Boost providing processing power Quickly and accurately manage office operations from basic to advanced while still saving energy.\r\nLive image, professional audio\r\nUmbala 13.5 inch with QHD paste (2256 x 1504) delivers extreme picture quality, sharp in every detail. Swift 3 SF313 but is the page a background IPS for angle view up to 178 mode for user people are doing the seconds and decals of the best.', 0, '2021-12-16 02:22:31', 0),
(23, 'Laptop Gaming Acer Nitro 5 AN515-56-51N4 NH.QBZSV.002', 4, 2, 21990000, 62, 'laptop-gaming-acer-nitro-5-an515-i5-11300h-vga-gtx1650-10-ksp.jpg', 'Smooth 15.6-inch FHD 144Hz screen\r\nAcer Nitro 5 laptop AN515-56-51N4 has the typical design of Acer\'s Nitro gaming laptop line. The sturdy monolithic design, aggressive black outer shell, specialized cooling system, and RGB LED keyboard contribute to a unique gaming laptop for true gamers.\r\nConquer the game with Intel Core i5-11300H CPU and GeForce GTX 1650 VGA\r\nDesigned to fight every thrilling game, Acer Nitro 5 AN515-56-51N4 NH.QBZSV.002 laptop is equipped with the \"invincible\" duo of Intel and NVIDIA to bring outstanding power to the machine.', 0, '2021-09-18 09:41:34', 0),
(24, 'Laptop Acer Aspire 3 A315-58-3939 NX.ADDSV.001', 4, 2, 12090000, 72, 'laptop-acer-aspire-3-a315-58-3939-1.jpg', 'Slim design, standard keyboard, sharp screen\r\nAcer Aspire 3 laptop A315-58-3939 possesses a fairly compact design with a weight of only about 1.7kg, so that the machine has high flexibility, suitable for users who often have to move like students - students. Laptop with standard keyboard design, has its own number pad for fast and comfortable typing.\r\nStable performance in the price range with PCIE SSDs and 11th generation Intel chips\r\nAcer Aspire 3 laptop A315-58-3939 is equipped with good configuration with 11th generation Intel chip, 4GB RAM capacity and 256GB PCIe NVMe SSD hard drive. As a result, the device provides fast data transmission and smooth operation in basic tasks such as watching movies, surfing the web.', 0, '2021-12-14 09:41:44', 0),
(25, 'Laptop Acer Swift 5 SF514-55T-51NZ NX.HX9SV.002', 4, 2, 22990000, 53, 'laptop-acer-swift-5-sf514-55t-51nz-1.jpg', 'Possessing a classy copper color, a powerful processor and different unique features, the Acer Swift 5 SF514-55T-51NZ laptop has made a strong impression in the hearts of users. Join us to learn more about the special features of the ACer Swift laptop below!\r\nNew modern Intel Core i5 EVO processor, 8GB Ram, large storage capacity\r\nThis Acer Swift 5 laptop is integrated with Intel\'s EVO Core i5 processor, so it has a huge power source. Combined with 8GB Ram, it significantly increases data processing performance, super-fast multitasking ability.', 0, '2021-12-14 09:41:56', 0),
(26, 'Laptop LG Gram 17 2021 i7 1165G7/16GB/1TB SSD/Win10 (17Z90P-G.AH78A5) ', 5, 2, 54890000, 42, 'lg-gram-17-i7-17z90pgah78a5-3-600x600.jpg', 'The LG Gram 17 2021 i7 laptop (17Z90P-G.AH78A5) possesses a powerful configuration in an extremely thin and light body, an impressive screen and military-standard durability. LG Gram 17 is a good value for money choice for business people and office workers.\r\nPowerful performance from Intel Gen 11 1165G7 . chip\r\nThe laptop is equipped with the 11th generation Intel Core i7 Tiger Lake chip with integrated Intel Iris Xe Graphics, for fast working speed, good handling of heavy applications, increased work efficiency, smooth gameplay, smooth streaming. . The chip\'s average clock is around 2.80 GHz and maximum is 4.7 GHz thanks to Turbo Boost.', 1, '2021-09-12 09:42:07', 2),
(27, 'Laptop LG Gram 14 2021 i7 1165G7/16GB/512GB/Win 10 (14Z90P-G.AH75A5) ', 5, 2, 47890000, 24, 'lg-gram-14-i7-14z90pgah75a5-1-1-org.jpg', 'Powerful, mobile is what LG Gram 14 2021 i7 laptop (14Z90P-G.AH75A5) brings to users. With only a thin and light body less than 1 kg, but possessing formidable power from the 11th generation Intel chip and many other modern features, LG Gram is the ideal laptop for business people, office people and furniture. semi-specialist.\r\nImpressively thin and light - approx 1 kg\r\nLG Gram brings a thin and light design like its own name. With durable and luxurious Nano Carbon - Magnesium alloy material, the body is only 16.8 mm thin and weighs 0.999 kg, an impressive figure for laptops in the same segment.', 0, '2021-09-04 09:42:16', 0),
(28, 'Smart Tivi LG 4K 43 inch 43UP7800PTB ', 5, 4, 15900000, 51, 'led-lg-43up7800ptb637695436754251152.jpg', 'Design in a minimalist, elegant style\r\nSmart TV LG 4K 43 inch 43UP7800PTB is noted for its minimalistic delicate design combining screen borders to highlight the elegance, harmony and suit all different interior styles. The property\'s V-shaped legs make it easy to stand on any surface, and the stand can be removed easily to install on the wall.\r\n\r\nLG 43 inch TV will be compatible with rooms that are not too large, such as bedrooms, offices or living rooms of small apartments.', 0, '2021-12-14 09:42:35', 0),
(29, 'Smart Tivi NanoCell LG 4K 50 inch 50NANO75TPA', 5, 4, 21900000, 98, 'vi-vn-nanocell-lg-50nano75tpa-1.jpg', 'Exquisite design, beautiful, creating accents for the room\r\n LG NanoCell TV has a modern design with 3 ultra-thin screen edges for a more vivid display frame, the outer shell of the TV is covered with luxurious dark gray color, easy to coordinate with any design style. . The upside-down V-shaped stand makes it neat when placed on the shelf but still ensures certainty.\r\nDisplay sharp images in 4K . resolution\r\nThe screen has a resolution of 4K with 8.3 million pixels, helping to convey images with outstanding definition even in tiny details, and the image colors are also more realistic.', 0, '2021-09-07 09:42:46', 0),
(30, 'Smart Tivi NanoCell LG 4K 55 inch 55NANO86TPA', 5, 4, 27900000, 84, 'vi-vn-nanocell-lg-55nano86tpa.jpg', 'Exquisite design, bringing artistic breath into the decoration space\r\nSmart TV NanoCell LG 4K 55 inch 55NANO86TPA has slim lines, minimalist black color and extremely thin screen border for a larger display ratio, creating a feeling of images overflowing from the monotonous border. Whether you put this TV on a shelf or hang it on the wall, its aesthetics are extremely high.\r\nClear color expression, high color accuracy ratio with NanoCell . technology\r\nThis technology uses nano-particles to filter and refine colors to help images have clear colors, closest to natural colors so that content reaches your eyes in the most vibrant and true way.', 0, '2021-09-11 09:43:03', 0),
(31, 'HP Neverstop 1000a Single Function Laser Printer (4RY22A)', 6, 6, 3090000, 33, 'may-in-laser-hp-neverstop-1000a-4ry21a-600x600.jpg', 'Solid design, easy to decorate in many corners of the room\r\nThe outer shell of the printer is covered with a neutral gray-white color, easily integrating into the interior design of homes and businesses.\r\nPowerful print speed of 20 ppm\r\nOnly integrated 1-sided printing function, but the black and white laser printer offers amazing printing efficiency, with a print capacity of up to 25,000 pages/month, first page print time of 7.8 seconds, helping you prepare documents. for the whole office in a convenient short time, catching up with all the time limits set by the boss.', 0, '2021-12-15 21:58:16', 0),
(32, 'HP Neverstop Laser 1000w Black and White Laser Printer (4RY23A)', 6, 6, 3390000, -224, 'may-in-hp-neverstop-laser-1000w-4ry23a-trang-1-org.jpg', 'Exquisite, elegant design, increasing modernity for any space\r\nThe HP Neverstop Laser 1000w (4RY23A) printer has a neutral gray-white color, simple and neat design, perfectly in harmony with different interior designs including family bedroom space, office at home. home, company, factory, restaurant... Products are easy to install and use.\r\nPrint 1-sided with super-fast print speeds\r\nThe printer only has 1-sided function but achieves extremely high printing speed, up to 20 pages per minute, maximum print capacity of 12,000 pages per month, first page printing time only 7.8 seconds, paper feeder has capacity 150 sheets, paper tray has printed 100 sheets, meeting all printing needs of users, especially in case of urgent printing, continuous printing to keep up with the work schedule.', 0, '2021-12-15 11:00:43', 0),
(33, 'HP Ink Tank 115 (2LB19A) Color Inkjet Printer', 6, 6, 2290000, 0, 'may-in-phun-mau-hp-ink-tank-115-2lb19a-1-1-org.jpg', 'Stylish, optimal design, noble black color\r\nThe HP Ink Tank 115 (2LB19A) color inkjet printer is delicately designed, equipped with a transparent ink tank on the side of the machine for you to easily observe and add ink. Products placed neatly in any position in the home, office, suitable for personal use.\r\nReliable quality with resolutions up to 1200 x 4800 dpi\r\nBold, sharp, borderless prints for flyers, brochures, photos and other documents right in your office.\r\nFast print speed\r\nThe color inkjet printer with black and white printing speed of 8 ppm, color printing at 5 ppm, first page printing in 14 seconds provides a stable and powerful printing solution for all users.', 0, '2021-12-14 11:06:56', 0),
(34, 'HP 107w WiFi Black & White Laser Printer (4ZB78A)', 6, 6, 2790000, 27, 'laser-trang-den-hp-107w-wifi-4zb78a-1-org.jpg', 'Simple and neat design\r\nThe HP 107w WiFi Black and White Laser Printer (4ZB78A) has a sturdy structure, the parts are tightly linked, the flat bottom ensures steady placement on the desk, shelf. The minimalist, luxurious white-black color scheme creates a high-end look for any living space.\r\nPrint quickly with a print speed of 20 ppm\r\nSet up your HP printer to print up to 10,000 pages per month, print the first page in 8.3 seconds with 1-sided printing, flexible wifi printing, helping you prepare documents for agile work, meeting your needs. maximum usage requirements.', 0, '2021-12-15 11:00:43', 0),
(35, 'HP Ink Tank 415 WiFi All-in-One Printer Scan Copy Ink Tank 415 WiFi (Z4B53A)', 6, 6, 3390000, 87, 'may-in-phun-mau-da-nang-in-scan-copy-hp-ink-tank-4-1-1-org.jpg', 'Slim lines, luxurious design honor any interior space\r\nThe HP Ink Tank 415 WiFi All-in-One Color Inkjet Printer Scan Copy HP Ink Tank 415 WiFi (Z4B53A) has a modern, compact design of only about 4.67 kg, optimizing space and bringing many conveniences when used with the ink cartridges located separately at the bottom. side of the body. The ink cartridge part is made transparent, it is easy to monitor the amount of ink inside, and timely pump when the ink runs out.\r\nMany functions make it easier to handle office work\r\nWith functions for 1-sided printing, copy, scan, wifi printing, and manual 2-sided printing (supporting the right driver), color inkjet printers give you a variety of document handling solutions to work with. more effective.', 0, '2021-10-06 09:44:12', 0),
(36, 'Laptop HP Gaming VICTUS 16 e0175AX R5 5600H/8GB/512GB/4GB RTX3050/144Hz/Win10 ', 6, 2, 24290000, 0, 'hp-gaming-victus-16-e0175ax-r5-4r0u8pa-1-org.jpg', 'HP Gaming VICTUS 16 e0175AX R5 (4R0U8PA) được HP đưa vào phân khúc laptop gaming với cấu hình mạnh mẽ từ bộ vi xử lý Ryzen 5 nhà AMD, thiết kế lại rất thanh lịch, sang trọng, phù hợp cho mọi nhu cầu sử dụng, chắc chắn mang đến ít nhiều sự hài lòng cho người dùng ngay từ lần đầu trải nghiệm.\r\nLaptop gaming thiết kế đơn giản, phong cách sang trọng\r\nDù được chọn vào phân khúc gaming nhưng HP Gaming VICTUS 16 không mang vẻ ngoài hầm hố thường có mà lại được thiết kế với các chi tiết hoàn thiện rất tinh tế, tối giản, nhấn nhá bằng logo gaming ở mặt lưng, tông màu đen tạo nên nét sang trọng cho tổng thể sản phẩm.\r\nĐa nhiệm mượt mà, chinh phục mọi tác vụ\r\nLaptop HP Gaming mang sức mạnh ấn tượng nhờ được trang bị chip AMD Ryzen 5 dòng 5600H cấu trúc 6 nhân 12 luồng, có tốc độ xử lý trung bình 3.3 GHz và tối đa 4.2 GHz nhờ chế độ Turbo Boost, đa nhiệm thật mượt mà.', 0, '2021-12-15 21:58:16', 0),
(37, 'IPhone 12 mini 64GB', 2, 1, 18990000, 62, 'iphone-12-mini-den-1-1-org.jpg', 'Compact, high-end appearance. Although it looks like the iPhone 12 mini is at a disadvantage in size compared to its seniors iPhone 12, iPhone 12 Pro and iPhone 12 Pro Max. The phone with a 5.4\" OLED screen weighing only 135g is extremely compact, convenient, easy to hold in the hand while still carrying the most advanced technology. Outstanding, unlimited power, iPhone 12 mini is equipped with the most powerful 6-core A14 Bionic processor leading in today\'s smartphone chip lines (November 11, 2020). iPhone 12 Mini is ready to compete with any \"big brother\".', 0, '2021-12-15 11:00:43', 0),
(38, 'Samsung Galaxy Z Flip3 5G 128GB', 3, 1, 23990000, -92, 'samsung-galaxy-z-flip3-black-org.jpg', 'Super durable, high-end design. Samsung Galaxy Z Flip3 possesses a unique clamshell folding design style, which is not only a technology product but also an extremely luxurious fashion accessory. Super sharp, smooth folding screen with 120 Hz refresh rate. The main screen is the part that makes the biggest impression on Z Flip3 5G when it owns a 6.7-inch Dynamic AMOLED 2X panel, supports HDR10+ and high resolution. 1200 nits high for perfect visibility. Impressive performance with powerful Snapdragon chip. Galaxy Z Filp3 is applied Snapdragon 888 chip to help users comfortably experience smooth in daily tasks or heaviest graphics games.', 1, '2021-12-15 11:00:43', 0),
(39, 'Xiaomi Redmi Note 10', 1, 1, 5100000, 32, 'xiaomi-redmi-note-10_1.jpg', 'Superior cinematic experience - Sharp 6.43-inch AMOLED screen, 360-degree light sensor, eye protection certification\r\nPerformance beyond the price range - Powerful octa-core Snapdragon 678, 2.2 . UFS memory\r\nFully charged in just over 60 minutes - Impressive 33W fast charger\r\nVivid, Quality Sound - Powerful Dual Speakers, Supports High Quality Hi-Res Audio\r\nCapture memorable, authentic moments - AI-integrated 48MP quad camera', 1, '2021-09-21 09:44:42', 0),
(40, 'Laptop HP Pavilion 15-EG0004TX 2D9B7PA', 6, 2, 18490000, 74, 'laptop-hp-pavilion-15-eg0004tx-i5-1135g7-15-6-inch-2d9b7pa-1.jpg', 'HP Pavilion 15-eg0004TX 2D9B7PA Laptop - Work more conveniently and easily\r\nAs a favorite laptop among office workers and students, the HP Pavilion 15-eg0004TX 2D9B7PA laptop not only benefits on the go, but also helps get the job done with ease. that effect.', 0, '2021-10-01 13:33:33', 0),
(41, 'Laptop HP 15s fq2602TU', 6, 2, 15790000, 21, 'laptop-hp-15s-fq2602tu-ị-1135g7-15-6inch-4b6d3pa-1.jpg', 'With a modern, luxurious design and outstanding Intel Gen 11 configuration, HP 15s fq2602TU i5 (4B6D3PA) will be the ideal companion for you, meeting well for studying, working and basic entertainment. daily. Simple styling, elegant', 0, '2021-09-13 13:33:41', 0),
(42, 'Laptop HP Envy 13 aq1022TU', 6, 2, 22690000, 55, 'laptop_hp_envy_13_aq1022tu_8qn69pa_1.jpg', 'The new generation Intel Core i5 processor combined with 8 GB RAM and Windows 10 operating system gives the machine strong performance, fast processing of all office tasks (such as Microsoft Office suite), smooth graphics on the desktop. Popular applications help you confidently handle work and entertainment every day.', 0, '2021-10-03 13:33:49', 0),
(43, 'Xiaomi POCO X3 Pro NFC 8GB-256GB', 1, 1, 7690000, 31, 'xiaomi-poco-x3-pro-xanh-1.jpg', 'Xiaomi POCO X3 Pro NFC is a collection of all the features a gamer needs on a smartphone. Super smooth screen, great battery phone, super fast charging, studio quality sound and an incredible configuration, there\'s so much more waiting for you.', 0, '2021-10-19 13:33:58', 0),
(44, 'Samsung Galaxy A72', 3, 1, 11490000, 31, 'samsung-a72-xanh-1.jpg', 'Galaxy A72 attracts users at first sight with its soft, sleek curves. The cluster of 4 rear cameras is housed in the familiar rectangular module with LED flash, the color of the module and the back is designed in the same color to help the overall become more synchronized and harmonious.', 0, '2021-12-15 21:58:16', 0),
(45, 'Samsung Galaxy Note 20 Ultra 5G', 3, 1, 21500000, 12, 'samsung-galaxy-note-20.jpg', 'As a product with a large screen size, Samsung has equipped the Galaxy Note 20 Ultra 5G with powerful data connection technology and a monolithic design. Helps to keep the components inside the phone firmly fixed to ensure that everything inside is always safe. Not only that, the aluminum frame creates extremely luxurious and eye-catching contours when looking at it.', 0, '2021-09-19 13:34:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `protypes`
--

CREATE TABLE `protypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Smartphone'),
(2, 'Laptop'),
(3, 'Smartwatch'),
(4, 'TV'),
(5, 'Tablet'),
(6, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session_cart`
--

CREATE TABLE `session_cart` (
  `session_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session_cart`
--

INSERT INTO `session_cart` (`session_id`, `customer_id`, `time`) VALUES
(3, 1, '2021-12-15 12:31:55'),
(4, 1, '2021-12-15 12:40:41'),
(5, 1, '2021-12-15 17:39:00'),
(6, 1, '2021-12-15 17:56:41'),
(7, 1, '2021-12-15 18:00:47'),
(8, 1, '2021-12-15 18:02:26'),
(9, 1, '2021-12-15 18:04:07'),
(10, 1, '2021-12-15 18:04:46'),
(11, 1, '2021-12-16 04:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `session_cart_detail`
--

CREATE TABLE `session_cart_detail` (
  `ss_detail_id` int(11) NOT NULL,
  `ss_cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session_cart_detail`
--

INSERT INTO `session_cart_detail` (`ss_detail_id`, `ss_cart_id`, `product_id`, `qty`) VALUES
(7, 3, 32, 1),
(8, 3, 37, 1),
(9, 4, 32, 1),
(10, 4, 37, 2),
(11, 4, 34, 1),
(12, 5, 38, 23),
(13, 5, 32, 56),
(14, 5, 22, 1),
(15, 5, 34, 1),
(16, 5, 37, 1),
(17, 6, 38, 23),
(18, 6, 32, 56),
(19, 6, 22, 1),
(20, 6, 34, 1),
(21, 6, 37, 1),
(22, 10, 44, 1),
(23, 10, 36, 1),
(24, 10, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session_wishlist`
--

CREATE TABLE `session_wishlist` (
  `ss_wishlist_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session_wishlist`
--

INSERT INTO `session_wishlist` (`ss_wishlist_id`, `customer_id`, `time`) VALUES
(1, 1, '2021-12-15 12:19:57'),
(2, 1, '2021-12-15 12:30:00'),
(3, 1, '2021-12-15 12:40:41'),
(4, 1, '2021-12-15 17:39:00'),
(5, 1, '2021-12-15 17:42:12'),
(6, 1, '2021-12-15 17:47:26'),
(7, 1, '2021-12-15 17:56:42'),
(8, 1, '2021-12-15 17:57:50'),
(9, 1, '2021-12-15 17:59:47'),
(10, 1, '2021-12-15 18:00:47'),
(11, 1, '2021-12-15 18:04:07'),
(12, 1, '2021-12-15 18:04:46'),
(13, 1, '2021-12-16 04:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `session_wishlist_detail`
--

CREATE TABLE `session_wishlist_detail` (
  `ss_wl_detail_id` int(11) NOT NULL,
  `ss_wishlist_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session_wishlist_detail`
--

INSERT INTO `session_wishlist_detail` (`ss_wl_detail_id`, `ss_wishlist_id`, `product_id`) VALUES
(1, 1, 6),
(2, 1, 7),
(3, 1, 8),
(4, 2, 22),
(5, 2, 38),
(6, 2, 32),
(7, 3, 11),
(8, 3, 38),
(9, 3, 39),
(10, 3, 26),
(11, 4, 11),
(12, 4, 26),
(13, 4, 35),
(14, 4, 39),
(15, 4, 38),
(16, 4, 37),
(17, 4, 34),
(18, 4, 25),
(19, 5, 11),
(20, 5, 26),
(21, 5, 35),
(22, 5, 39),
(23, 5, 38),
(24, 5, 37),
(25, 5, 34),
(26, 5, 25),
(27, 6, 11),
(28, 6, 26),
(29, 6, 35),
(30, 6, 39),
(31, 6, 38),
(32, 6, 37),
(33, 6, 34),
(34, 6, 25),
(35, 7, 11),
(36, 7, 26),
(37, 7, 35),
(38, 7, 39),
(39, 7, 38),
(40, 7, 37),
(41, 7, 34),
(42, 7, 25),
(43, 8, 11),
(44, 8, 26),
(45, 8, 35),
(46, 8, 39),
(47, 8, 38),
(48, 8, 37),
(49, 8, 34),
(50, 8, 25),
(51, 9, 11),
(52, 9, 26),
(53, 9, 35),
(54, 9, 39),
(55, 9, 38),
(56, 9, 37),
(57, 9, 34),
(58, 9, 25),
(59, 10, 11),
(60, 10, 26),
(61, 10, 35),
(62, 10, 39),
(63, 10, 38),
(64, 10, 37),
(65, 10, 34),
(66, 10, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `promotion_type` (`dis_percent`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_id_2` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manu_id` (`manu_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Indexes for table `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `session_cart`
--
ALTER TABLE `session_cart`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `session_cart_detail`
--
ALTER TABLE `session_cart_detail`
  ADD PRIMARY KEY (`ss_detail_id`),
  ADD KEY `ss_cart_id` (`ss_cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `ss_cart_id_2` (`ss_cart_id`),
  ADD KEY `product_id_2` (`product_id`);

--
-- Indexes for table `session_wishlist`
--
ALTER TABLE `session_wishlist`
  ADD PRIMARY KEY (`ss_wishlist_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `session_wishlist_detail`
--
ALTER TABLE `session_wishlist_detail`
  ADD PRIMARY KEY (`ss_wl_detail_id`),
  ADD KEY `ss_wl_detail_id` (`ss_wl_detail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `ss_wishlist_id` (`ss_wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session_cart`
--
ALTER TABLE `session_cart`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `session_cart_detail`
--
ALTER TABLE `session_cart_detail`
  MODIFY `ss_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `session_wishlist`
--
ALTER TABLE `session_wishlist`
  MODIFY `ss_wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `session_wishlist_detail`
--
ALTER TABLE `session_wishlist_detail`
  MODIFY `ss_wl_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_cart`
--
ALTER TABLE `session_cart`
  ADD CONSTRAINT `session_cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_cart_detail`
--
ALTER TABLE `session_cart_detail`
  ADD CONSTRAINT `session_cart_detail_ibfk_1` FOREIGN KEY (`ss_cart_id`) REFERENCES `session_cart` (`session_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_wishlist`
--
ALTER TABLE `session_wishlist`
  ADD CONSTRAINT `session_wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_wishlist_detail`
--
ALTER TABLE `session_wishlist_detail`
  ADD CONSTRAINT `session_wishlist_detail_ibfk_1` FOREIGN KEY (`ss_wishlist_id`) REFERENCES `session_wishlist` (`ss_wishlist_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
