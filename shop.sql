-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 01:46 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `for` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `bigDiscount` varchar(10) NOT NULL,
  `posterId` int(11) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `photoPath1` text NOT NULL,
  `postStatus` varchar(5) NOT NULL,
  `edited` varchar(10) NOT NULL,
  `shipping` varchar(3) NOT NULL,
  `postedDate` datetime NOT NULL,
  `view` int(11) NOT NULL,
  `fav` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id`, `type`, `price`, `address`, `phone`, `for`, `title`, `bigDiscount`, `posterId`, `info`, `photoPath1`, `postStatus`, `edited`, `shipping`, `postedDate`, `view`, `fav`) VALUES
(1, '0', 20000, '', 0, '', 'TOYOTA Vitz', 'ACTIVE', 0, 'very good', '', '', '', '', '0000-00-00 00:00:00', 2, ''),
(2, '0', 200000, '', 0, '', 'SAMSUNG', '', 0, 'this phone is very good . samsung phone is very god', '', '', '', '', '0000-00-00 00:00:00', 0, ''),
(3, '0', 15000, '', 0, '', 'HP laptop', '', 0, 'this lap top is very good laptop. hp laptop', '', '', '', '', '0000-00-00 00:00:00', 0, ''),
(5, '0', 15000, '', 0, '', 'Desktop Dell', '', 0, 'this this desktop computer. Dell is a desktop computer', '../uploads/carPostsPhoto/ad5302pp.png', '', '', '', '0000-00-00 00:00:00', 1, ''),
(6, '0', 15000, '', 0, '', 'Desktop Dell', '', 0, 'brooooo', '../uploads/adPostsPhoto/ad11772DSC_0720.jpg', '', 'YES', '', '0000-00-00 00:00:00', 0, ''),
(8, '0', 45, 'gelan condominyem', 931575704, 'Choose...', 'TOYOTA Vitz', '', 147, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(10, '0', 0, 'asdf', 343, 'men', 'miky', '', 89, 'sfa', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(11, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(12, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(13, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(14, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(15, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(16, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(17, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(18, '0', 0, '', 0, 'Choose...', '', '', 89, '', '../uploads/postsPhoto/ad28629DSC_0720.jpg', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(19, '0', 0, '', 0, 'Choose...', '', '', 89, '', '../uploads/postsPhoto/ad706601T6B0828.jpg', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(20, '0', 0, '', 0, 'Choose...', '', '', 89, '', '', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(21, '0', 0, '', 0, 'Choose...', '', '', 89, '', '', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(22, '0', 0, '', 0, 'Choose...', '', '', 89, '', ' ', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(23, '0', 0, '', 0, 'Choose...', '', '', 89, '', ' ', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(24, '0', 0, 'asf', 0, 'women', 'edited', '', 89, 'afsd', '../uploads/adPostsPhoto/ad82559vv.png', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(25, '0', 44, 'gelan condominyem', 931575704, 'women', 'miky', '', 89, 'asfdasfd', '../uploads/adPostsPhoto/ad22267log2.png', 'ACTIV', 'YES', '', '0000-00-00 00:00:00', 0, ''),
(26, '0', 0, '', 0, ' ', 'test 2', '', 89, '', '../uploads/adPostsPhoto/ad85831bgg.png', 'ACTIV', '', '', '0000-00-00 00:00:00', 1, ''),
(27, '0', 0, '', 0, ' ', '', '', 89, '', ' ', 'ACTIV', '', 'YES', '0000-00-00 00:00:00', 0, ''),
(28, '0', 45, 'asfdsdf', 931575704, 'women', 'edited', '', 89, 'fhfdfg', '../uploads/adPostsPhoto/ad59655bgg.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(29, '0', 0, '', 0, ' ', 'wewewewe', '', 89, 'vvvvvvvvvvvvvvvvvvvvv', '../uploads/adPostsPhoto/ad93767Screenshot (7).png', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 0, ''),
(30, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 2, ''),
(31, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 1, ''),
(32, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(33, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(34, '0', 0, '', 0, ' ', '1lk', '', 89, '', '../uploads/adPostsPhoto/bae1948b566edd31622eacdfc70d889d.png,../uploads/adPostsPhoto/92082fd28c9d4dd3b19c43797b008a98.jpg', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 0, ''),
(35, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(36, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 3, ''),
(37, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(38, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 1, ''),
(39, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(40, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(41, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(42, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(43, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 2, ''),
(44, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(45, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(46, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(47, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(48, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(49, '0', 0, '', 0, ' ', 'test for phototo', '', 89, '', '../uploads/adPostsPhoto/122cf4910736640c0997d697348011c9.png,../upload', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(50, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(51, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(52, '0', 0, '', 0, ' ', '', '', 89, '', '../uploads/adPostsPhoto/1072ce26fe06b04ccebbfe3b07495faf.png,../uploads/adPostsPhoto/aadafbed3ec321a399eee8e12af9ca83.jpg', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(53, '0', 0, '', 0, ' ', '', '', 89, '', '../uploads/adPostsPhoto/098f0789de864607adb2bcfe56b6a903.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(54, '0', 0, '', 0, ' ', '', '', 89, '', '../uploads/adPostsPhoto/8cb6290ead3ad2daf5f93d3974409d81.jpg', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(55, '0', 0, '', 0, ' ', 'vbbbbbbbvbvbvbvqq121', '', 89, '', '../uploads/adPostsPhoto/f48ac80f685852caf983341840f1fbfe.png,../uploads/adPostsPhoto/43b0de7b2dc8b5897465bc92cf5ad2f5.jpg', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(56, '0', 0, '', 0, ' ', 'mikyzxzx12', '', 89, '', '../uploads/adPostsPhoto/72d8ccbaec13a7f351f04400c0dca0aa.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(57, '0', 45, '', 0, ' ', '', '', 89, '', '../uploads/adPostsPhoto/5177736355454127b457d3b943f90438.jpg', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(58, '0', 45, 'editedcv', 931575704, 'men', 'TOYOTA Vitz big disc', 'ACTIVE', 89, 'sdfsdxcv', '../uploads/adPostsPhoto/0c6d70f301ea51ae5e3c52b2758a5005.jpg', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 5, ''),
(59, '0', 0, '', 0, ' ', 'real user', 'NOT', 151, '', '../uploads/adPostsPhoto/aabcc1fdf5795413361e02bf98a1eaf4.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 6, ''),
(60, '0', 0, '', 0, ' ', 'edited 23', 'ACTIVE', 0, '', '../uploads/adPostsPhoto/421b08c9d556d3f4cf16250e18ddab12.png,../uploads/adPostsPhoto/3aacc055cb0e93e66c9111f9bfa694ca.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 9, ''),
(61, '0', 0, '', 0, ' ', 'sdfsdf', 'NOT', 151, '', '../uploads/adPostsPhoto/750c793301086f1be5677b601f6cbcdb.png,../uploads/adPostsPhoto/cdf757b62b0317fb54205436557961fb.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 10, ''),
(63, 'Cloth and Shoe', 44, 'Debre Markos', 0, ' ', 'zx', 'NOT', 158, 'xzxzxzx', './uploads/adPostsPhoto/718d25b4b97c2286275d0fe083982653.jpg,./uploads/adPostsPhoto/7ba595dd07d992d71a3fa518244245a3.png', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 0, ''),
(65, 'ccc', 0, 'Addis Ababa', 0, ' ', 'time is gold', 'NOT', 158, '', './uploads/adPostsPhoto/59456d1a9a35b272cd6e554a27b2a1ec.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 1, ''),
(66, '  Cloth and Shoe', 0, 'Arba Minchi', 0, 'women', 'adds testxx', 'NOT', 158, '', '', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 0, ''),
(67, 'asdf', 0, 'Bahari Dar', 0, ' ', 'ad testing pls', 'NOT', 158, '', './uploads/adPostsPhoto/816161062f070b2d59932c741923a8ba.png', 'ACTIV', '', 'NO', '2022-01-11 09:50:13', 0, ''),
(68, 'Jewlery', 45, 'Debre Markos', 931575704, ' ', 'werk', 'NOT', 158, 'afd', './uploads/adPostsPhoto/e5538ea9a916046251fa1c1ef605f866.png,./uploads/adPostsPhoto/38bb8819c56bb471767dcae64b439f27.png', 'ACTIV', '', 'YES', '2022-01-20 10:07:10', 2, ''),
(69, 'Jewlery', 45, 'Bahari Dar', 931575704, ' ', 'mishet tape', 'NOT', 158, 'sdf', './uploads/adPostsPhoto/29091b92aaa6db53be819160a665bd44.png,./uploads/adPostsPhoto/534a8ce9ee33af5c6a682ad19576d326.png,./uploads/adPostsPhoto/799659feca40f413a2595b1807b94d00.png', 'ACTIV', '', 'NO', '2022-01-20 10:10:36', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `adcategory`
--

CREATE TABLE `adcategory` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `tableName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adcategory`
--

INSERT INTO `adcategory` (`id`, `category`, `tableName`) VALUES
(53, 'Cloth and Shoe', 'ad'),
(58, 'OTHER', 'ad'),
(62, 'Asela', 'CITY'),
(63, 'Ambo', 'CITY'),
(64, 'Aksum', 'CITY'),
(65, 'Bahari Dar', 'CITY'),
(66, 'Dessie', 'CITY'),
(67, 'Debre Zeyit', 'CITY'),
(68, 'Debre Tabor', 'CITY'),
(69, 'Debre Markos', 'CITY'),
(70, 'Deri Dewa', 'CITY'),
(71, 'Addis Ababa', 'CITY'),
(72, 'Adama', 'CITY'),
(73, 'Arba Minchi', 'CITY'),
(74, 'Jimma', 'CITY'),
(75, 'Gondar', 'CITY'),
(76, 'Harar', 'CITY'),
(77, 'Nekemit', 'CITY'),
(78, 'Mekele', 'CITY'),
(79, 'Injibara', 'CITY'),
(80, 'Weldiya', 'CITY'),
(81, 'Welkit', 'CITY'),
(106, 'sdfa', ''),
(107, 'sdfa', ''),
(111, 'Jewlery', 'ad'),
(113, 'Computer and Laptop', 'electronics'),
(114, 'Kera', 'SUBCITY'),
(115, 'Bole', 'SUBCITY'),
(116, '4 Kilo', 'SUBCITY'),
(119, 'ICT', 'vacancy'),
(120, 'OTHER', 'car'),
(122, 'Apartama', 'housesell'),
(123, 'Toyota', 'car'),
(124, 'BMW', 'car'),
(125, 'Van', 'car'),
(126, 'Lada', 'car'),
(127, 'Dolfin', 'car'),
(128, 'Pick Up', 'car'),
(129, 'Lory', 'car'),
(130, 'Jaguar Taxi', 'car'),
(131, 'Mobile', 'electronics'),
(132, 'Tv', 'electronics'),
(133, 'Kitchen Accessory ', 'electronics');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `frontLabel` varchar(30) NOT NULL,
  `postedDate` datetime NOT NULL,
  `content` text NOT NULL,
  `edited` varchar(7) NOT NULL,
  `posterId` int(11) NOT NULL,
  `photoPath1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `frontLabel`, `postedDate`, `content`, `edited`, `posterId`, `photoPath1`) VALUES
(1, 'real user', 'VVVVVVVVVVVV', '2022-01-04 15:06:28', 'ADFS', '', 159, './uploads/blogPhoto/272a7a4cb9147f7c94cfc5c2a5954fc8.png'),
(2, '', '', '2022-01-04 18:17:07', 'gsdgdsdg,sdsf', '', 159, './uploads/blogPhoto/be7f26ebbf5d7891067c5581a642e1bf.png'),
(3, 'What is this', 'What is lOREM?', '2022-01-04 19:26:22', 'asdfasdfasfadfsasdfafsd', '', 159, './uploads/blogPhoto/cebefde53d13b6245be9d72c32f73b85.png,./uploads/blogPhoto/2c3099e2edfa03699e63446b8ab78aaf.png,./uploads/blogPhoto/04f1bafbdf93def11e8fe228f5995b62.png,./uploads/blogPhoto/c6ee93c5eba0d3e4c03f0e6bd7817416.png'),
(4, 'TOYOTA Vitz', 'What is lOREM?', '2022-01-04 19:30:10', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from de Finibus Bonorum et Malorum by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '', 159, './uploads/blogPhoto/5052c1d899e4e00e560e80b8f309a067.png,./uploads/blogPhoto/b3c80f0a9b311e85ad104a02f8b2685a.png'),
(5, 'It Works', 'What is lOREM?', '2022-01-04 19:34:58', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n\r\nTranslations: Can you help translate this site into a foreign language ? Please email us with details if you can help.\r\nThere is a set of mock banners available here in three colours and in a range of standard banner sizes:\r\nBannersBannersBanners\r\nDonate: If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support.\r\nDonate Bitcoin: 16UQLq1HZ3CNwhvgrarV6pMoA2CDjb4tyF\r\nNodeJS Python Interface GTK Lipsum Rails .NET Groovy\r\n\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 B', '', 159, './uploads/blogPhoto/e4066579bd269448b27a4f4a683e85e2.png,./uploads/blogPhoto/cd6bfa3f7cab860e885582cfac53bee4.png,./uploads/blogPhoto/b14c4e2cdbc814c0227d74fa700ebece.png');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `type` varchar(25) NOT NULL,
  `ownerBroker` varchar(10) NOT NULL,
  `address` varchar(15) NOT NULL,
  `status` varchar(3) NOT NULL,
  `fuleKind` varchar(15) NOT NULL,
  `transmission` varchar(15) NOT NULL,
  `km` varchar(30) NOT NULL,
  `bodyStatus` varchar(30) NOT NULL,
  `posterId` int(11) NOT NULL,
  `fixidOrN` varchar(15) DEFAULT NULL,
  `photoPath1` text NOT NULL,
  `price` int(11) NOT NULL,
  `info` varchar(2000) NOT NULL,
  `forRentOrSell` varchar(15) DEFAULT NULL,
  `postStatus` varchar(5) NOT NULL,
  `postedDate` datetime NOT NULL,
  `edited` varchar(10) NOT NULL,
  `view` int(11) NOT NULL,
  `fav` longtext NOT NULL,
  `forWho` varchar(20) NOT NULL,
  `rentStatus` varchar(20) NOT NULL,
  `whyRent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `title`, `type`, `ownerBroker`, `address`, `status`, `fuleKind`, `transmission`, `km`, `bodyStatus`, `posterId`, `fixidOrN`, `photoPath1`, `price`, `info`, `forRentOrSell`, `postStatus`, `postedDate`, `edited`, `view`, `fav`, `forWho`, `rentStatus`, `whyRent`) VALUES
(1, '', '0', '', '', '', '0', '', '', '', 0, '0', ' ', 0, '', '0', 'ACTIV', '2021-12-15 08:25:59', '', 71, '', '', '', ''),
(2, '', '0', '', '', 'Cho', '0', '', '', '', 0, '0', '', 0, '', '0', 'ACTIV', '2021-12-15 08:28:14', '', 71, '', '', '', ''),
(3, '', '0', '', '', 'Cho', '0', '', '', '', 0, '0', '../uploads/carPostsPhoto/ad86800big.png', 0, '', '0', 'ACTIV', '2021-12-15 08:28:59', '', 72, '', '', '', ''),
(4, '', '0', '', '', 'Cho', '0', '', '', '', 89, '0', '../uploads/carPostsPhoto/ad46900big.png', 0, '', '0', 'ACTIV', '2021-12-15 08:30:14', '', 71, '', '', '', ''),
(5, 'wwwww', 'nigga', '', '', 'NEW', 'Benzene', '', '', '', 89, 'Fixed', '', 111111, '    wwwwwww    ', 'For Sell', 'ACTIV', '2021-12-15 12:44:42', '', 75, '', '', '', ''),
(6, 'workkk', '0', '', '', 'Cho', '0', '', '', '', 89, '0', ' ', 0, '', '0', 'ACTIV', '2021-12-15 13:02:03', '', 71, '', '', '', ''),
(7, 'leba', 'c', '', '', 'NEW', 'Benzene', '', '', '', 89, 'Fixed', '', 33, ' sdfsdf ', 'For Rent', 'ACTIV', '2021-12-16 12:19:24', '', 73, '', '', '', ''),
(8, 'ooooooooooo', 'Choose...', '', '', 'Cho', 'Choose...', '', '', '', 89, 'Choose...', '../uploads/carPostsPhoto/ad16404DSC_0720.jpg', 0, ' vvvvvvvvvvvvvvvvv ', 'Choose...', 'ACTIV', '2021-12-17 15:02:21', '', 73, '', '', '', ''),
(9, 'TOYOTA Vitz new', 'zz', '', '', 'NEW', 'Choose...', '', '', '', 89, 'Choose...', '', 0, '  vvvvvvvvvv  ', 'Choose...', 'ACTIV', '2021-12-17 15:05:03', '', 73, '', '', '', ''),
(10, 'edited', 'c', '', '', 'NEW', 'Benzene', '', '', '', 89, 'Fixed', '', 12, '', 'For Rent', 'ACTIV', '2021-12-17 15:16:54', '', 81, '', '', '', ''),
(11, 'zxzxzx', 'zz', '', '', 'NEW', 'Benzene', '', '', '', 89, 'Negotiatable', '../uploads/carPostsPhoto/ad7706Prime bridge_Logo-07.png', 1212, 'zxzxzxzx', 'For Sell', 'ACTIV', '2021-12-17 15:18:26', '', 71, ',158', '', '', ''),
(12, 'SAMSUNGccccccccccccccc', 'nigga', 'Broker', '', 'NEW', 'Benzene', 'manual', 'z', 'z', 89, 'Fixed', '', 1, 'z', 'For Rent', 'ACTIV', '2021-12-22 00:44:31', '', 70, '', '', '', ''),
(13, 'SAMSUNG', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', 'asfdsfda', 'asfdasfd', 89, 'Choose...', '', 3, 'sfdsfd', 'Choose...', 'ACTIV', '2021-12-22 02:54:28', '', 71, '', '', '', ''),
(14, '', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '../uploads/CarPostsPhoto/fd28715aaa43d52f02e9bc7767e7b569.jpg,../uploa', 0, '', 'Choose...', 'ACTIV', '2021-12-23 10:42:54', '', 70, '', '', '', ''),
(15, 'vnbn', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '', 0, '  ', 'Choose...', 'ACTIV', '2021-12-26 09:37:34', '', 71, '', '', '', ''),
(16, 'pppppppppppp', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '', 0, '  ', 'Choose...', 'ACTIV', '2021-12-26 09:53:22', '', 70, '', '', '', ''),
(17, 'vm', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '', 0, '', 'Choose...', 'ACTIV', '2021-12-26 10:12:39', '', 71, '', '', '', ''),
(18, 'TOYOTA Vitz', 'TOYOTA', 'Broker', '', 'NEW', 'Benzene', 'manual', '3435', 'sgdf', 89, 'Negotiatable', '../uploads/CarPostsPhoto/395fc9ffff76d13b18abbf4f57845b53.png,../uploads/CarPostsPhoto/ba120e6908b1414f99eb6abd56d1b6d5.png,../uploads/CarPostsPhoto/8233a2fd586c2aa42a9fee744a7384ee.png', 35, 'sdf', 'For Rent', 'ACTIV', '2021-12-29 06:47:25', '', 73, '', '', '', ''),
(19, 'real user', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 0, 'Choose...', '../uploads/CarPostsPhoto/901774a9af34cd1bd422d9a3a434d473.png,../uploads/CarPostsPhoto/50a23a8cd09ef86710b27a7495b7180f.png', 0, '', 'Choose...', 'ACTIV', '2021-12-29 12:44:26', '', 70, '', '', '', ''),
(20, 'editedxcgfgzzxxx', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 0, 'Choose...', '../uploads/CarPostsPhoto/7342ce39129dc98d1bd8206bb7955104.png,../uploads/CarPostsPhoto/a058dc148da525c5c04cb9edd4f0d8d7.png', 0, '', 'Choose...', 'ACTIV', '2021-12-29 12:56:52', '', 70, '', '', '', ''),
(21, 'TOYOTA Vitz', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 151, 'Choose...', '../uploads/CarPostsPhoto/7a8f5723bbce6e992d21debe36b83ac6.png,../uploads/CarPostsPhoto/e3c428c36be1e4706bbd664199d18d91.png', 0, '', 'Choose...', 'ACTIV', '2021-12-29 14:54:11', '', 70, '', '', '', ''),
(22, 'edited', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '/uploads/CarPostsPhoto/7622804a9ba8c408f27b1aed0f00c5a5.png,/uploads/CarPostsPhoto/da9b0767b1f6e18ba72279e13a1b5fd5.png', 0, '', 'Choose...', 'ACTIV', '2021-12-30 12:25:36', '', 72, '', '', '', ''),
(23, 'real user', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 151, 'Choose...', './uploads/CarPostsPhoto/17e73d478c5fbc686d0e1aecedc45178.png,./uploads/CarPostsPhoto/43a0bf82541c17287bb72a00b7344347.png,./uploads/CarPostsPhoto/c0a810c57dade01c0d50c9a18bd229ee.png', 0, '', 'Choose...', 'ACTIV', '2021-12-31 07:55:10', '', 103, '', '', '', ''),
(24, 'real user', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 151, 'Choose...', './uploads/CarPostsPhoto/63d9c70cf399992c7cc10a01966491c2.png,./uploads/CarPostsPhoto/c03fc5d60d1ee51ee7e08b557c38b317.png,./uploads/CarPostsPhoto/6e203c6af09f0bb96b4d41382e9f46c5.png', 0, '', 'For Rent', 'ACTIV', '2021-12-31 07:55:34', '', 81, '', '', '', ''),
(25, 'TOYOTA Vitz ', 'OTHER', 'Owner', '', 'NEW', 'Benzene', 'manual', '', '', 151, 'Choose...', './uploads/CarPostsPhoto/d701e389ab65848f196634e4474ba6c0.png,./uploads/CarPostsPhoto/7e66df9d8044a10d8958203a9b5079ea.png,./uploads/CarPostsPhoto/770d795e402f41b1564201030c98d338.png', 0, '', 'Choose...', 'ACTIV', '2022-01-01 08:18:25', '', 0, '', '', '', ''),
(26, 'TOYOTA Vitzcoooooooooooooooppp`````11212', 'TOYOTA', 'Owner Or B', '', 'OLD', 'fule Type', 'Transmission', 'XCV1111111111111', 'XVCqw11111111111', 158, 'Negotiatable', './uploads/CarPostsPhoto/3f4798a326ea1e6061d31682314c6d0c.png,./uploads/CarPostsPhoto/2f27f1b637e72d75d1acfa4c672a2a97.png,./uploads/CarPostsPhoto/ad0f956b60c03a585be98d06eec712a1.png', 2147483647, '           wwwwwwwwwwwwwwwwwwwwwwwwww     ', 'Rent or sell', 'ACTIV', '2022-01-02 13:07:51', '', 34, '', '', '', ''),
(28, 'edited', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/dbbd8fe2f01fc383120cd3234b0b3b49.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-05 12:11:25', '', 0, '', '', '', ''),
(29, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/e4fb4a2fb09fdac86fa7bbacebff9d3f.png,./uploads/CarPostsPhoto/a2cc07424cc6163b23e38a415d54936c.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:12:04', '', 0, '', '', '', ''),
(30, 'TOYOTA Vitz', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/3e0548b56ecca4eb89099fb1c3bb85b0.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:15:06', '', 1, '', '', '', ''),
(31, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/d34231c5cbf5cfb6c355651f045a529f.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:17:03', '', 2, '', '', '', ''),
(32, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/b1441b01a3169b04977d07609d83241d.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:21:17', '', 0, '', '', '', ''),
(33, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/e4771d25a1832ca3f6611e8a7aafbd20.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:22:22', '', 0, '', '', '', ''),
(34, 'sadf', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/38057ec80859122f18c1103ddace66e8.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-05 12:26:37', '', 0, '', '', '', ''),
(35, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/d20d62deef65d567b8b88ddb25668eaa.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:27:07', '', 0, '', '', '', ''),
(36, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/473881e5685061e1ae10b56860b3f2e6.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-05 12:31:17', '', 0, '', 'Private', 'Car Only', 'GG'),
(37, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/897981335c21e264531dbff7eefb5294.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:31:59', '', 0, '', 'Private', 'With Driver', 'GG'),
(38, 'esti', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/1e5430e3d0d74257b601fd16831a6e5c.jpg', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:47:33', '', 0, '', ' ', ' ', ' '),
(39, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/be809328b6850667aa64389601acd0eb.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:49:11', '', 0, '', ' ', ' ', ' '),
(40, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/45fa33acdcedf5672f8781db2dbb06db.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:50:41', '', 0, '', ' ', ' ', ' '),
(41, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/6a8e7f03abaa3ea0eff99d4c5aa2289a.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:53:00', '', 0, '', ' ', ' ', ' '),
(42, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/ca660ed3a8f91c7ea6040c9c48202908.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:54:20', '', 0, '', ' ', ' ', ' '),
(43, 'Debre Markos', '', '', '', 'Typ', 'New or old', 'Rent or sell', '', 'Transmission', 0, '158', 'Price type', 0, '', '', 'ACTIV', '2022-01-09 19:01:50', '', 0, '', 'Owner Or Broker', ' ', ' '),
(44, 'Asela', '', '', '', 'Typ', 'New or old', 'Rent or sell', '', 'Transmission', 0, '158', 'Price type', 0, '', '', 'ACTIV', '2022-01-09 19:03:38', '', 0, '', 'Owner Or Broker', ' ', ' '),
(45, '', 'Type', 'Owner Or B', 'Aksum', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/fe27d84f1422e1ff130f8244df6aa98e.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 19:05:28', '', 0, '', ' ', ' ', ' '),
(46, '', 'Type', 'Owner Or B', 'Mekele', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/017fb781b127caed0cf76e1a3e9adca6.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 19:06:58', '', 0, '', ' ', ' ', ' '),
(47, 'test', 'OTHER', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/922fda3d63b24dc697c25d1e40263d32.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 21:58:10', '', 0, '', ' ', ' ', ' '),
(48, 'gggg', 'ISUZU', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/5884ec87e39941d46d23525ca81ad3a0.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 21:59:28', '', 0, '', ' ', ' ', ' '),
(49, 'fff', ' ', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/3465e7a9d1c9dabe77177a9165c01f30.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 21:59:37', '', 1, '', ' ', ' ', ' '),
(50, 'vvgg', 'ISUZU', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/20eafb61a9d69bb5e7a521b67ecc6b2c.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 22:00:27', '', 0, '', ' ', ' ', ' '),
(51, 'car post xzx', ' ', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/eb48d8d1a2e253e2a4777277e83020c1.jpg', 0, '         x       ', 'Rent or sell', 'ACTIV', '2022-01-11 07:17:27', '', 2, '', ' ', ' ', ' '),
(52, 'for rent test car ya b', ' ', 'Owner Or B', 'Addis Ababa', 'OLD', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/cee42ce5698d971be63dd16e7ac0e5d7.png', 0, '    aaa  ', 'For Rent', 'ACTIV', '2022-01-11 08:02:11', '', 1, '', 'Private', 'Car Only', 'nigga'),
(53, 'dingay', 'BMW', 'Owner Or B', 'Debre Zeyit', 'NEW', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/a2cbeeab6003147051b05cb42db84ecf.png,./uploads/CarPostsPhoto/aa5365ed787cc9169df943f6f6c1f8c1.png,./uploads/CarPostsPhoto/73ef9aafe27d4deb6abd1105b88a19ca.png', 0, 'afds', 'For Rent', 'ACTIV', '2022-01-12 18:07:34', '', 26, '', 'Govormental Offices', 'Car Only', ''),
(54, 'photo', ' ', 'Broker', 'Asela', 'NEW', 'Benzene', 'manual', 'sfdf', 'sdf', 159, 'Fixed', './uploads/CarPostsPhoto/1e1b55bea57dee85ee5778d7071a5d29.jpg', 22, 'sadfas', 'For Rent', 'ACTIV', '2022-01-17 19:20:44', '', 19, '', ' ', ' ', ' '),
(55, 'TOYOTA Vitz', 'OTHER', 'Owner', 'Ambo', 'NEW', 'Benzene', 'Transmission', '', '', 158, 'Negotiatable', './uploads/CarPostsPhoto/273f031c31d4333ab8628323ab822ce2.jpg,./uploads/CarPostsPhoto/e4d18bee046988573bae450bc0410ad8.png,./uploads/CarPostsPhoto/c80b20318a14b35d9008380dd05a759a.png', 23, 'afsd', 'For Sell', 'ACTIV', '2022-01-20 08:46:51', '', 0, '', ' ', ' ', ' '),
(56, '', 'OTHER', 'Owner', 'Addis Ababa', 'NEW', 'Benzene', 'automatic', '3435', 'dfg', 158, 'Fixed', './uploads/CarPostsPhoto/77d86d9c63913a57cfa049af96748017.png,./uploads/CarPostsPhoto/e9b643abad7a4f7f1710a1b1c12d0818.png', 23, 'adfs', 'For Sell', 'ACTIV', '2022-01-20 08:48:27', '', 1, '', ' ', ' ', ' '),
(57, 'car for sell', 'Toyota', 'Broker', 'Deri Dewa', 'New', 'Diesel', 'Transmission', '', '', 158, 'Fixed', './uploads/CarPostsPhoto/1a951bd734565a71d198a6c9d1148bd4.png,./uploads/CarPostsPhoto/b2fa4f1b9d741cc0bcf85f97ed42a4b3.png', 23, 'sdfa', 'For Sell', 'ACTIV', '2022-01-20 08:49:37', '', 1, '', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `carcategory`
--

CREATE TABLE `carcategory` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carcategory`
--

INSERT INTO `carcategory` (`id`, `category`) VALUES
(13, 'OTHER'),
(14, 'TOYOTA'),
(15, 'BMW'),
(16, 'ISUZU'),
(18, 'van');

-- --------------------------------------------------------

--
-- Table structure for table `charity`
--

CREATE TABLE `charity` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `photoPath1` text NOT NULL,
  `info` text NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `posterId` int(11) NOT NULL,
  `postedDate` datetime NOT NULL,
  `postStatus` varchar(10) NOT NULL,
  `edited` varchar(10) NOT NULL,
  `view` int(11) NOT NULL,
  `fav` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charity`
--

INSERT INTO `charity` (`id`, `title`, `photoPath1`, `info`, `address`, `phone`, `posterId`, `postedDate`, `postStatus`, `edited`, `view`, `fav`) VALUES
(1, 'edited 23r', '../uploads/charityPhoto/f92975ad7a0eaf7f80bf2da60fa22566.png', 'dsdsd', 'gelan condominyem', 931575704, 89, '2021-12-24 09:00:03', 'ACTIVE', 'EDITED', 0, ''),
(2, 'TOYOTA oo', '../uploads/charityPhoto/5bb5405aa48f416735c2e493d1c1bde3.png', 'ssdfv', 'gelan condominyem f', 931575704, 89, '2021-12-25 09:56:24', 'ACTIVE', 'EDITED', 0, ''),
(3, 'edited', '../uploads/charityPhoto/a24669f0989dd2c9a5032d7a874a33a9.png', '', '', 0, 0, '2021-12-29 14:12:40', 'ACTIVE', '', 0, '4'),
(4, 'editedxcgfgzzxxx', '../uploads/charityPhoto/603d5564039216e28e31f5aec57ffb0a.png', '', '', 0, 0, '2021-12-29 14:13:17', 'ACTIVE', '', 1, '474,158'),
(5, 'SAMSUNG', '../uploads/charityPhoto/baa34bb243386b7610b37e5f198d20c6.png', '', '', 0, 0, '2021-12-29 14:17:02', 'ACTIVE', '', 0, '158'),
(6, 'TOYOTA Vitz', '/uploads/charityPhoto/353100b8ca838971ba6ce076bbe33c2f.png', '', '', 0, 89, '2021-12-30 12:28:20', 'ACTIVE', '', 0, '158'),
(7, '', './uploads/charityPhoto/da00d9b772cfa41457be38d4abff4d27.png', '', '', 0, 89, '2021-12-30 12:28:52', 'ACTIVE', '', 0, ''),
(8, '', '../uploads/charityPhoto/02bf242f31a2c2bac3d1eef1c4e20095.png,../uploads/charityPhoto/f8d81ff68952672712ad1b56edb89786.png', '', '', 0, 89, '2021-12-30 12:44:28', 'ACTIVE', '', 1, '0'),
(9, 'editedvb', './uploads/charityPhoto/ee5f1aaf1837ea386100f783114799a6.png', '', '', 0, 151, '2021-12-30 17:36:40', 'ACTIVE', '', 12, '0'),
(10, 'charity post test x', './uploads/charityPhoto/dbce27e80a4edaf6da8aef311adf0bee.jpg', 'X', 'Harar', 931575704, 158, '2022-01-12 07:17:35', 'ACTIVE', 'EDITED', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `status` varchar(3) NOT NULL,
  `postStatus` varchar(7) NOT NULL,
  `postedDate` datetime NOT NULL,
  `posterId` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `info` longtext NOT NULL,
  `photoPath1` text NOT NULL,
  `ram` varchar(10) NOT NULL,
  `processor` varchar(15) NOT NULL,
  `size` varchar(20) NOT NULL,
  `storage` varchar(20) NOT NULL,
  `core` varchar(10) NOT NULL,
  `fav` longtext NOT NULL,
  `edited` varchar(10) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`id`, `type`, `status`, `postStatus`, `postedDate`, `posterId`, `title`, `address`, `price`, `info`, `photoPath1`, `ram`, `processor`, `size`, `storage`, `core`, `fav`, `edited`, `view`) VALUES
(1, 'Choose...', 'NEW', 'ACTIVE', '2021-12-21 21:38:55', 0, 'asdf', '', 0, '', ' ', ' ', ' ', ' ', ' ', ' ', '', '', 8),
(3, 'Choose...', 'NEW', 'ACTIVE', '2021-12-21 22:01:35', 0, 'sfd', '', 0, '', ' ', ' ', ' ', ' ', ' ', ' ', '', '', 4),
(4, 'OTHER', 'NEW', 'ACTIVE', '2021-12-21 22:05:21', 0, 'test', 'edited', 45, 'asfdsadfsfdsadf', ' ', ' ', ' ', ' ', ' ', ' ', ',159', '', 0),
(5, 'Choose...', 'NEW', 'ACTIVE', '2021-12-21 22:05:54', 0, 'test', 'gelan condominyem', 45, 'fdssfdsdf', '../uploads/vacancyPhoto/ecafe925dfac6cda544a2e181aa8ffd3.png,../uploads/vacancyPhoto/0ef80203dc371fb0f48405cce662cc9a.png', ' ', ' ', ' ', ' ', ' ', '', '', 1),
(6, 'Computer Laptop', 'NEW', 'ACTIVE', '2021-12-21 22:08:21', 0, 'vvvvvvvvv', 'vvv', 0, 'procesasfdsor', '../uploads/electronicsPhoto/ad14557DSC_0720.jpg', ' ', ' ', ' ', ' ', ' ', '', 'YES', 8),
(7, 'Computer Laptop', 'NEW', 'ACTIVE', '2021-12-21 22:11:58', 0, 'test', 'gelan condominyem', 444, 'processor', '../uploads/electronicsPhoto/elc66070big.png', ' ', ' ', ' ', ' ', ' ', '', '', 2),
(8, 'Computer Laptop', 'NEW', 'ACTIVE', '2021-12-21 22:14:07', 0, 'broooooo you winn', 'gelan broooooo you w', 3, 'processor', '../uploads/electronicsPhoto/elc12385big.png', '34broooooo', 'asfdbroooooo yo', 'broooooo you winn', 'broooooo you winn', 'broooooo y', ',158,162', 'YES', 7),
(9, 'Computer Laptop', 'OLD', 'ACTIVE', '2021-12-22 02:23:06', 89, 'test', 'gelan condominyem', 0, '`electronics`', '../uploads/electronicsPhoto/elc58071Prime bridge_Logo-11.png', '34broooooo', 'asfdbroooooo yo', '34', 'broooooo you winn', 'broooooo y', ',159', '', 68),
(10, 'Choose...', 'NEW', 'ACTIVE', '2021-12-23 10:40:10', 89, '', '', 0, '', '', ' ', ' ', ' ', ' ', ' ', '', '', 2),
(12, 'Choose...', 'NEW', 'ACTIVE', '2021-12-23 10:40:49', 89, '', '', 0, '', '', ' ', ' ', ' ', ' ', ' ', '', '', 0),
(13, 'Choose...', 'NEW', 'ACTIVE', '2021-12-23 10:42:00', 89, '', '', 0, '', '../uploads/CarPostsPhoto/2a7588f257e189546eddd4a4ce66d182.jpg,../uploa', ' ', ' ', ' ', ' ', ' ', ',159', '', 0),
(14, 'Choose...', 'NEW', 'ACTIVE', '2021-12-24 07:31:40', 89, '', '', 0, '', '../uploads/CarPostsPhoto/f17a6f9c664dc55775808d570e32c508.jpg,../uploads/CarPostsPhoto/3e715e8fce38f7e55adbe4fa379a4763.png,../uploads/CarPostsPhoto/df8d41fa1535657b67e0798d5ca8093e.jpg', ' ', ' ', ' ', ' ', ' ', ',159', '', 0),
(15, 'Choose...', 'NEW', 'ACTIVE', '2021-12-24 09:08:04', 89, '', '', 0, '', '', ' ', ' ', ' ', ' ', ' ', ',159', '', 1),
(16, 'Choose...', 'NEW', 'ACTIVE', '2021-12-24 20:37:36', 89, 'file test 3', '', 0, '', '', ' ', ' ', ' ', ' ', ' ', '', '', 1),
(17, 'Choose...', 'NEW', 'ACTIVE', '2021-12-26 09:36:29', 89, 'bn', '', 0, '', '../uploads/CarPostsPhoto/344da1eb15afcc94a5e602c12d678fd3.png,../uploads/CarPostsPhoto/ec356de066d98ab0760829b869304a47.png', ' ', ' ', ' ', ' ', ' ', '', '', 1),
(18, 'Choose...', 'NEW', 'ACTIVE', '2021-12-29 14:54:28', 151, 'sdfsdf', '', 0, '', '../uploads/CarPostsPhoto/6a8992bfd44f386499066518d54a7928.png,../uploads/CarPostsPhoto/86cd12f40b5cd00545b79d462a9bc7c2.png', ' ', ' ', ' ', ' ', ' ', '', '', 0),
(19, 'Choose...', 'NEW', 'ACTIVE', '2021-12-30 13:33:54', 89, 'test', '', 0, '', '../uploads/CarPostsPhoto/371669ba70f1359fa5128bfefc1ea354.png,../uploads/CarPostsPhoto/df98f5ee63b3549eb154dcb14fd2b55b.png', ' ', ' ', ' ', ' ', ' ', '', '', 1),
(20, 'Choose...', 'NEW', 'ACTIVE', '2021-12-30 13:36:35', 89, '', '', 0, '', '/uploads/CarPostsPhoto/d214ab4bc60ce9662447c90357faf3ca.png,/uploads/CarPostsPhoto/82972ea51adbc3787abea9a7d9928003.png', ' ', ' ', ' ', ' ', ' ', ',159', '', 0),
(21, 'Electronics Typ', 'NEW', 'ACTIVE', '2022-01-09 19:42:09', 158, '', 'Aksum', 0, '', './uploads/CarPostsPhoto/82f438d459c83048e27394ac2278ed66.png', ' ', ' ', ' ', ' ', ' ', '', '', 3),
(22, ' ', 'NEW', 'ACTIVE', '2022-01-10 09:26:20', 158, 'vvvvvvvvv123', 'Addis Ababa', 0, '', './uploads/CarPostsPhoto/06b66be7510ada6453a20f57b5d39758.png', ' ', ' ', ' ', ' ', ' ', '', '', 5),
(23, ' ', 'NEW', 'ACTIVE', '2022-01-10 09:27:45', 158, 'eski sira', 'Addis Ababa', 0, '', './uploads/CarPostsPhoto/2cbd7060c9c726cdf2a2104cb7601b1a.png,./uploads/CarPostsPhoto/d3220a980a62bde93c96e0e224d1e9cb.png', ' ', ' ', ' ', ' ', ' ', '', '', 4),
(25, 'Computer and La', 'OLD', 'ACTIVE', '2022-01-11 15:01:09', 158, 'electronics x', 'Nekemit', 45, 'asfdafs', './uploads/electronicsPhoto/6a39750f1c448c1519168160367a39c5.png,./uploads/electronicsPhoto/af932fd72470b62c894e363f55cc1b1c.png,./uploads/electronicsPhoto/89b2d298f36ed15f5e6113ac61239070.png', '34', 'aasdf', '34', '34', 'd', '', 'YES', 3),
(26, 'Tv', 'OLD', 'ACTIVE', '2022-01-20 10:12:56', 158, 'Speaker', 'Addis Ababa', 500, 'adfs', './uploads/CarPostsPhoto/e32a3507112b7345f4210ff30c90b4fb.png,./uploads/CarPostsPhoto/2905ab6da92e9af607687a2952e9d66b.png', ' ', ' ', ' ', ' ', ' ', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hotelhouse`
--

CREATE TABLE `hotelhouse` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `age` int(2) NOT NULL,
  `religion` varchar(15) NOT NULL,
  `field` varchar(50) NOT NULL,
  `address` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `price` int(11) NOT NULL,
  `experience` text NOT NULL,
  `bidingPerson` varchar(6) NOT NULL,
  `currentAddress` text NOT NULL,
  `agentInfo` text NOT NULL,
  `photoPath1` text NOT NULL,
  `posterId` int(11) NOT NULL,
  `edited` varchar(7) NOT NULL,
  `postedDate` datetime NOT NULL,
  `hotelOrHouse` varchar(10) NOT NULL,
  `view` int(11) NOT NULL,
  `fav` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotelhouse`
--

INSERT INTO `hotelhouse` (`id`, `name`, `sex`, `age`, `religion`, `field`, `address`, `type`, `price`, `experience`, `bidingPerson`, `currentAddress`, `agentInfo`, `photoPath1`, `posterId`, `edited`, `postedDate`, `hotelOrHouse`, `view`, `fav`) VALUES
(1, 'carCategory', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'NO', ' ', ' gfd', '../uploads/homeWorker/6a6202eb48d88a927e54f213020b9a8b.png', 89, 'EDITED', '2021-12-24 13:50:42', 'HOUSE', 1, ''),
(2, 'bitch please', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '  ', '  ', '../uploads/homeWorker/c1f885bd35b38683124479dc36e047ff.png', 89, 'EDITED', '2021-12-24 14:27:55', 'HOTEL', 0, ''),
(3, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', 'xcv', '', 89, '', '2021-12-24 14:30:04', '', 0, ''),
(4, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', '', '', 89, '', '2021-12-24 14:30:48', 'HOTEL', 0, ''),
(5, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', '', '', 89, '', '2021-12-24 14:31:53', '', 0, ''),
(6, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', '', '', 89, '', '2021-12-24 14:32:17', 'HOTEL', 0, ''),
(7, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', 'asdf', '../uploads/homeWorker/57247fbf52554539899aaf350b91242e.png', 89, '', '2021-12-24 14:33:37', '', 0, ''),
(8, 'bitch', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'NO', ' ', ' cvxdg', '', 89, 'EDITED', '2021-12-24 14:36:43', 'HOUSE', 0, ''),
(9, 'Fikir Getahun', 'Male', 34, ' ', ' ', 'gelan condominy', 'Choose...', 45, 'adfs', 'NO', 'gelan condominyem', 'fads', '../uploads/homeWorker/4cff9211bb954122ffd241bcb0359fed.png', 89, '', '2021-12-24 14:40:48', 'HOUSE', 0, ''),
(10, 'Bethelhem Mesfin Legesse', 'Choose.', 0, ' ', '', 'asfdsdf', 'Choose...', 0, '', 'YES', 'asfdsdf', '', '../uploads/homeWorker/cf991cf63d26e8640bee9542030cf656.png', 89, '', '2021-12-24 14:55:36', 'HOTEL', 1, ''),
(11, 'Bethelhem Mesfin Legesse', 'Choose.', 345, '34', ' ', 'asfdsdf', 'Choose...', 345, 'rtw', 'YES', 'asfdsdf', '', '../uploads/homeWorker/fae9396bed2f90321e08ca72688c2ed5.jpg', 89, '', '2021-12-26 13:24:29', 'HOUSE', 0, ''),
(12, 'afs', 'Choose.', 0, '', ' ', '', 'Choose...', 0, '', 'YES', '', '', './uploads/homeWorker/c75ce2fecea95e337dba1a83a4381d58.png', 0, '', '2021-12-31 14:30:11', 'HOUSE', 2, ''),
(13, 'safd', 'Choose.', 0, ' ', '', '', 'Choose...', 0, '', 'YES', '', '', './uploads/homeWorker/1107b8195c538a4c02ca44c231364086.png', 0, '', '2021-12-31 14:33:24', 'HOTEL', 6, ''),
(14, 'hotel and house worker testing', 'Choose.', 0, '', ' ', 'Asela', 'Choose...', 0, '', 'YES', '', '', './uploads/homeWorker/d3b53a65ecf4986aedd47c23fc95410d.png', 0, '', '2022-01-12 07:34:56', 'HOUSE', 0, ''),
(15, 'HOTEL POST', 'Female', 0, ' ', ' ', 'Amboxx', 'Full Day', 0, '', 'NO', '   ', '   df', './uploads/homeWorker/42b986231d731130bcf176be86259c4d.png', 158, 'EDITED', '2022-01-12 08:41:58', 'HOTEL', 1, ''),
(16, 'house keeper testxxx', 'Choose.', 2, 'dssd', ' ', 'Welkit', '<br />\r\n<b>Noti', 45, 'x', 'NO', ' ', ' x', './uploads/homeWorker/664140e3181abeb3fc9a813947dc61bf.png', 158, 'EDITED', '2022-01-12 08:58:05', 'HOUSE', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `housecategory`
--

CREATE TABLE `housecategory` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housecategory`
--

INSERT INTO `housecategory` (`id`, `category`) VALUES
(15, 'vvv'),
(23, 'dgdg'),
(24, 'sfd'),
(25, 'OTHER'),
(26, 'apartama'),
(27, 'asdf'),
(28, 'dgdg');

-- --------------------------------------------------------

--
-- Table structure for table `housesell`
--

CREATE TABLE `housesell` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `houseOrLand` varchar(10) NOT NULL,
  `ownerBroker` varchar(15) NOT NULL,
  `city` varchar(20) NOT NULL,
  `subCity` varchar(20) NOT NULL,
  `wereda` varchar(15) NOT NULL,
  `area` int(11) NOT NULL,
  `bedRoomNo` int(11) NOT NULL,
  `bathRoomNo` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `initial` int(11) NOT NULL,
  `fixedOrN` varchar(10) NOT NULL,
  `forRentOrSell` varchar(15) NOT NULL,
  `info` varchar(2000) NOT NULL,
  `posterId` int(11) NOT NULL,
  `photoPath1` text NOT NULL,
  `postedDate` datetime NOT NULL,
  `postStatus` varchar(10) NOT NULL,
  `edited` varchar(10) NOT NULL,
  `view` int(11) NOT NULL,
  `fav` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housesell`
--

INSERT INTO `housesell` (`id`, `title`, `type`, `houseOrLand`, `ownerBroker`, `city`, `subCity`, `wereda`, `area`, `bedRoomNo`, `bathRoomNo`, `cost`, `initial`, `fixedOrN`, `forRentOrSell`, `info`, `posterId`, `photoPath1`, `postedDate`, `postStatus`, `edited`, `view`, `fav`) VALUES
(1, '', 'z', ' ', '', 'Choose...', 'Choose...', 'rert', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, ' ', '2021-12-15 11:15:26', 'ACTIVE', '', 2, ''),
(2, '', 'z', 'LAND', '', 'women', 'women', 'rert', 0, 123, 0, 0, 0, '123', 'Fixed', 'rwer', 89, '../uploads/houseOrLandPhotos/ad27898big.png', '2021-12-15 11:16:13', 'ACTIVE', '', 1, ''),
(3, '', 'z', ' ', '', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, ' ', '2021-12-15 11:18:29', 'ACTIVE', '', 0, ''),
(4, '', 'z', ' ', '', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, ' ', '2021-12-15 11:22:13', 'ACTIVE', '', 0, ''),
(5, '', 'women', 'HOUSE', '', 'men', 'bababaabbaba', 'dsfg', 0, 243, 234, 243, 0, '234', 'Fixed', 'dgdsg', 89, 'E', '2021-12-15 11:23:50', 'ACTIVE', '', 0, ''),
(6, ' ', 'z', '  ', ' ', 'Choose...', 'Choose...', ' ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '../uploads/electronicsPhoto/ad80730DSC_0720.jpg', '2021-12-23 18:34:10', 'ACTIVE', 'YES', 0, ''),
(7, '', 'z', ' ', '', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, 'E', '2021-12-15 11:34:45', 'ACTIVE', '', 0, ''),
(8, ' ', 'z', '  ', ' ', 'Choose...', 'Choose...', ' ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '../uploads/electronicsPhoto/ad64404DSC_0720.jpg', '2021-12-23 18:35:55', 'ACTIVE', 'YES', 0, ''),
(9, 'work', 'z', ' ', '', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, ' ', '2021-12-15 12:58:36', 'ACTIVE', '', 0, ''),
(10, 'TOYOTA Vitz       ', 'women', 'HOUSE     ', '', 'women', 'women', 'xxx       ', 1212, 1212212, 333, 444, 0, 'Negotiatab', 'Negotiatable', 'xxxxx       ', 89, '../uploads/houseOrLandPhotos/ad40800pp.png', '2021-12-15 20:09:10', 'ACTIVE', '', 0, ''),
(11, 'SAMSUNG ', 'dgdg', 'HOUSE ', ' ', 'Choose...', 'Choose...', '4f ', 0, 0, 0, 0, 0, '34', 'Negotiatable', 'gfgfhf ', 89, '../uploads/houseOrLandPhotos/ad74727big.png', '2021-12-23 13:39:01', 'ACTIVE', 'YES', 0, ''),
(12, 'miky  ', 'z', '   ', 'Broker  ', 'Choose...', 'Choose...', '  ', 0, 0, 0, 0, 0, '', 'Choose...', '  ', 89, '../uploads/houseOrLandPhotos/ad87584Screenshot (8).png', '2021-12-23 18:34:51', 'ACTIVE', 'YES', 0, ''),
(13, ' ', 'z', '  ', 'Owner ', 'Choose...', 'Choose...', ' ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '../uploads/houseOrLandPhotos/bb2e7c4b6efbef7d7a19e4408f179de5.jpg,../uploads/houseOrLandPhotos/bb2e7c4b6efbef7d7a19e4408f179de5.jpg,../uploads/houseOrLandPhotos/bb2e7c4b6efbef7d7a19e4408f179de5.jpg', '2021-12-23 17:55:08', 'ACTIVE', 'YES', 0, ''),
(14, 'f Test', 'z', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-23 18:58:55', 'ACTIVE', '', 0, ''),
(15, 'qwwwwww', 'z', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-23 19:32:03', 'ACTIVE', '', 2, ''),
(16, 'zxzxzxzx ', 'z', '  ', 'Owner ', 'Choose...', 'Choose...', 'zzzzzzzzzaz ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '../uploads/houseOrLandPhotos/9cbdbed49c502288784591b91963e6d3.png,../uploads/houseOrLandPhotos/f24b62440241e8d2fdc4dba46108fb03.png,../uploads/houseOrLandPhotos/2cc31dc4efddb4c9d72f30f56d42cb52.png', '2021-12-24 07:28:21', 'ACTIVE', 'YES', 0, ''),
(17, 'xxxxxxxxxxxxxxxxxxxxxxxxx', 'z', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 07:35:23', 'ACTIVE', '', 0, ''),
(18, 'aqaqaq  2222', 'z', '   ', 'Owner  ', 'Choose...', 'Choose...', '  ', 0, 0, 0, 0, 0, '', 'Choose...', '  ', 89, '../uploads/houseOrLandPhotos/90b794be5392f6f5284dcff44f6ed5f2.png,../uploads/houseOrLandPhotos/bb9130b7480e93444be67e1c0c753ae5.png,../uploads/houseOrLandPhotos/3f67fc4827175b77961c004d50d1040a.png', '2021-12-24 20:16:12', 'ACTIVE', 'YES', 0, ''),
(19, '12w', 'z', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 10:04:37', 'ACTIVE', '', 0, ''),
(20, '13', 'z', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 10:06:42', 'ACTIVE', '', 0, ''),
(21, '14', 'z', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 10:07:08', 'ACTIVE', '', 1, ''),
(22, 'q12q ', 'z', '  ', 'Owner ', 'Choose...', 'Choose...', ' ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '', '2021-12-26 09:32:05', 'ACTIVE', 'YES', 0, ''),
(23, 'q13q', 'z', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 19:08:23', 'ACTIVE', '', 0, ''),
(24, 'real user', 'Choose...', 'HOUSE', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 151, '../uploads/houseOrLandPhotos/2a8c44993970a17631ddf78b080caa84.png', '2021-12-29 13:45:40', 'ACTIVE', '', 0, ''),
(25, 'real user', 'Choose...', 'HOUSE', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Negotiatable', '', 151, './uploads/houseOrLandPhotos/beff118d4eadc7a7830bee62dec40ddc.png,./uploads/houseOrLandPhotos/1d81efab5b72182fc6ee603d1f6d9ba4.png', '2021-12-30 19:51:19', 'ACTIVE', '', 0, ''),
(26, '', 'Choose...', 'HOUSE', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Negotiatab', 'For Rent', 'SD', 151, './uploads/houseOrLandPhotos/808ae2f1c92b782df5a9c936717d73f9.png,./uploads/houseOrLandPhotos/3be25cd67f2ee160628ef8154cb54564.png', '2021-12-30 19:58:49', 'ACTIVE', '', 2, ''),
(27, 'TOYOTA Vitz', 'Choose...', 'HOUSE', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Fixed', 'For Rent', '', 151, './uploads/houseOrLandPhotos/98058388100d890a4c8a1e326f8a5179.png', '2021-12-30 20:00:23', 'ACTIVE', '', 4, ''),
(28, '', 'Choose...', 'HOUSE', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '', 151, './uploads/houseOrLandPhotos/60e32e1ef7fd9aef255b744747b76990.png,./uploads/houseOrLandPhotos/e1be0c9bfb78e5609c6e83cdac53a980.png', '2021-12-30 20:11:57', 'ACTIVE', '', 0, ''),
(29, 'real user', 'Choose...', ' HOUSE', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'For Sell', '', 151, './uploads/houseOrLandPhotos/f7804e9a00e334dd02f8f806fc7f2670.png,./uploads/houseOrLandPhotos/f598e0fa82d5d1c7408ae3d40d92c8be.png', '2021-12-30 20:12:25', 'ACTIVE', '', 1, ''),
(30, 'edited 23', 'z', 'HOUSE', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'For Sell', '', 151, './uploads/houseOrLandPhotos/20e50de6df2683d996031a5841a873a3.png,./uploads/houseOrLandPhotos/02ac44147053fdbb66218228474b54f1.png', '2021-12-30 20:14:02', 'ACTIVE', '', 5, ''),
(31, 'H', 'dgdg', 'HOUSE', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'For Sell', '', 151, './uploads/houseOrLandPhotos/ad68386b391d2a5c68728b350f96e862.png,./uploads/houseOrLandPhotos/6a7c09e8827d9efe0bb1645047a4cb9f.png', '2021-12-30 20:17:02', 'ACTIVE', '', 11, ''),
(32, 'TOYOTA Vitz', 'z', 'LAND', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'For Rent', '', 151, './uploads/houseOrLandPhotos/42d10602e621e15d25d4c5d5f29fa4f9.png,./uploads/houseOrLandPhotos/5356cd378d91a82f4d6cccb17dc82d86.png', '2021-12-30 20:17:58', 'ACTIVE', '', 1, ',158'),
(33, '', 'z', 'LAND', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'For Rent', '', 151, './uploads/houseOrLandPhotos/5349412d8c4606d983c01aac4fcaca18.png,./uploads/houseOrLandPhotos/d484a77a734c25a50e491287216fab61.png', '2021-12-30 20:18:30', 'ACTIVE', '', 1, ',158'),
(34, 'aqaqaq  2222', 'z', 'LAND', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'For Sell', '', 151, './uploads/houseOrLandPhotos/44797a75fa44dc7badeb9310b8ecce88.png,./uploads/houseOrLandPhotos/b6466d5fbd6e5e24ead3c46830dc4664.png', '2021-12-30 20:19:03', 'ACTIVE', '', 1, ''),
(35, 'real user', 'z', 'LAND', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '', 151, './uploads/houseOrLandPhotos/e68b7d2d51c18bcc5ce5935450b4f4e0.png', '2021-12-30 20:19:36', 'ACTIVE', '', 0, ''),
(36, '', 'z', 'LAND', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'For Sell', '', 151, './uploads/houseOrLandPhotos/116f6b90f2b98ed31386a9acb312d0f1.png,./uploads/houseOrLandPhotos/2d30f691e810ec491d08ec32c2a13d9d.png', '2021-12-30 20:20:09', 'ACTIVE', '', 1, ''),
(39, 'TOYOTA Vitz', 'z', 'LAND', 'Owner', 'Address', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '', 158, './uploads/houseOrLandPhotos/ada36344feddc49da3944ceb5d6c5c05.png', '2022-01-05 13:02:28', 'ACTIVE', '', 0, ''),
(40, '', 'Choose...', 'HOUSE', 'Owner', 'Ambo', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '', 158, './uploads/houseOrLandPhotos/58bd9e0920f1dad2258c4c05dec9d8fa.png', '2022-01-09 20:02:49', 'ACTIVE', '', 0, ''),
(41, ' ', 'z', 'LAND ', 'Owner ', 'Arba Minchi', 'Kera', ' ', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', ' ', 159, './uploads/houseOrLandPhotos/c10f731dfa5774372a1fb8c60ff394b7.jpg', '2022-01-10 14:51:01', 'ACTIVE', 'YES', 1, ''),
(42, 'housexxx', 'Choose...', '', 'Owner ', '', ' ', ' ', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', ' ', 158, './uploads/houseOrLandPhotos/0e3a45c6c31871759856f638bc6e91df.png', '2022-01-11 13:29:02', 'ACTIVE', 'YES', 0, ''),
(43, 'THIS IS HOUSE  x ', 'Choose...', 'HOUSE', 'Owner   ', 'Gondar', 'Bole', '   ', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '   sf', 158, './uploads/houseOrLandPhotos/634b07658762e28f9347bf203db5aed0.png,./uploads/houseOrLandPhotos/be6db29760eb99b5d36e1d0b15f08e7b.png,./uploads/houseOrLandPhotos/d20327fa41bfb411128e191b56f2bd09.png', '2022-01-11 14:22:27', 'ACTIVE', 'YES', 0, ''),
(44, 'land testing x ', 'z', 'LAND', 'Owner  ', 'Aksum', 'Kera', '  ', 0, 0, 0, 0, 0, 'Negotiatab', 'Choose...', '  x', 158, './uploads/houseOrLandPhotos/255531f5f09adb088c49eeedc320fc7e.jpg,./uploads/houseOrLandPhotos/a4e07b628a39b860a730f8c91e32f45f.png', '2022-01-11 14:30:18', 'ACTIVE', 'YES', 1, ''),
(45, 'land in land', 'z', 'LAND', 'Owner', 'Ambo', 'Kera', '', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '', 158, './uploads/houseOrLandPhotos/25a74cb9009f9a3cc2b73d25d24d0dc7.png', '2022-01-12 08:17:55', 'ACTIVE', '', 0, ''),
(46, 'qw', 'Choose...', 'HOUSE', 'Owner', 'Addis Ababa', 'Kera', '', 0, 0, 0, 0, 0, 'Choose...', 'For Sell', '', 162, './uploads/houseOrLandPhotos/51e20968f542108f6be5ebd229949119.png', '2022-01-14 11:55:53', 'ACTIVE', '', 8, ''),
(47, 'new title', 'dgdg', 'HOUSE', 'Broker ', 'Aksum', 'Kera ', '4f ', 0, 0, 0, 4545, 0, 'Choose...', 'For Rent', ' afsd', 158, './uploads/houseOrLandPhotos/d65c784a58d39c6927ea825043d58917.png,./uploads/houseOrLandPhotos/bafa57975c2ec35d294cbbf2b0baabb6.png', '2022-01-19 21:31:44', 'ACTIVE', 'YES', 0, ',158'),
(48, 'adsf', 'dgdg', 'HOUSE', 'Owner', 'Addis Ababa', ' ', '', 0, 0, 0, 0, 0, 'Choose...', 'For Rent', '', 158, './uploads/houseOrLandPhotos/1d2b2f96abe63766441337651890830d.png,./uploads/houseOrLandPhotos/3607a21de3b06622f11e36fd271c4709.png', '2022-01-19 21:30:24', 'ACTIVE', '', 0, ''),
(49, 'real user', 'Choose...', 'HOUSE', 'Owner', 'Addis Ababa', 'Bole', '', 0, 0, 0, 0, 0, 'Negotiatab', 'For Rent', '', 158, './uploads/houseOrLandPhotos/e30777f76ff56aed5c3c359b99f91162.png,./uploads/houseOrLandPhotos/97d4807d8138c7f1b08a2f6bf67e53b6.png', '2022-01-19 21:30:53', 'ACTIVE', '', 0, ''),
(50, 'next page', 'Choose...', 'HOUSE', 'Owner', 'Addis Ababa', ' ', '', 34, 34, 34, 3333, 0, 'Negotiatab', 'For Rent', 'asfd', 158, './uploads/houseOrLandPhotos/a2286887b879ca6a812bfa5fa43a92f2.png,./uploads/houseOrLandPhotos/a68f8b7c7adb6473e72bf9cb7d8775da.png,./uploads/houseOrLandPhotos/ffb93628ca1b91974dd06a15927b1011.png', '2022-01-19 21:33:07', 'ACTIVE', '', 0, ''),
(51, 'house seelll', 'Choose...', 'HOUSE', 'Owner', 'Debre Zeyit', 'Kera', '', 33333, 3, 0, 0, 0, 'Choose...', 'For Sell', '', 158, './uploads/houseOrLandPhotos/98ef211d91064d76eb11e09e20981a6f.png,./uploads/houseOrLandPhotos/b2dac20a5be766d18986bf19ed739a25.png', '2022-01-19 21:35:46', 'ACTIVE', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jobhometutor`
--

CREATE TABLE `jobhometutor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `eduBackground` text NOT NULL,
  `photoPath1` text NOT NULL,
  `clientRange` varchar(30) NOT NULL,
  `paymentStatus` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `posterId` int(11) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `companyInfo` text NOT NULL,
  `info` text NOT NULL,
  `postedDate` datetime NOT NULL,
  `edited` varchar(7) NOT NULL,
  `view` int(11) NOT NULL,
  `fav` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobhometutor`
--

INSERT INTO `jobhometutor` (`id`, `name`, `sex`, `eduBackground`, `photoPath1`, `clientRange`, `paymentStatus`, `Price`, `posterId`, `address`, `phone`, `companyInfo`, `info`, `postedDate`, `edited`, `view`, `fav`) VALUES
(1, 'Fikir SFG Getahun cx', 'Choose.', '  ', '../uploads/homeTutor/5be5df39453e0565e2dcb13b4f4f9a5c.png,../uploads/homeTutor/a40e7c54c95e6727356e1edc84926d90.png', '1-8', 'Choose...', 0, 89, 'F', 0, '', '', '2021-12-24 10:36:36', 'EDITED', 1, ''),
(2, 'cv', 'Female', ' adfs ', '', '1-8', 'Dayly', 0, 89, 'asfdsdf', 931575704, 'adfs', 'asdf', '2021-12-25 12:13:25', 'EDITED', 1, ''),
(3, 'zxcz', 'Male', 'fds', '../uploads/homeTutor/80850cbe96ed1a3c7268d2873c98ac42.png', '9-12', 'Horly', 500, 89, 'F', 931575704, 'asdf', 'afds', '2021-12-25 12:15:26', '', 0, ''),
(4, 'sdg', 'Choose.', '', '../uploads/homeTutor/112860920993a4ba306a175a6446e21d.png', '1-8', 'Choose...', 0, 89, '', 0, '', '', '2021-12-26 10:10:33', '', 0, ''),
(5, '', 'Choose.', '', '../uploads/homeTutor/79d6ecc200c8d8c512334b63ce64f756.png', '1-8', 'Choose...', 0, 89, '', 0, '', '', '2021-12-26 10:11:11', '', 0, ''),
(6, 'adsf', 'Male', '', './uploads/homeTutor/3a518cddc49e0416b0ae76c524ee2d7e.png', '1-8', 'Dayly', 0, 0, '', 0, '', '', '2021-12-31 14:23:08', '', 10, ''),
(7, 'Fikir SFG Getahun', 'Choose.', '', './uploads/homeTutor/3ebb98b42a7d01534b11bc8c9fe58b5a.png', '1-8', 'Choose...', 0, 0, 'F', 0, '', '', '2021-12-31 14:25:12', '', 3, ''),
(8, 'home tutore test', 'Male', 'adsf', './uploads/homeTutor/5e5a7d0bcb4f278bfd6128242a28c589.png', '9-10', 'Dayly', 0, 0, 'Harar', 931575704, 'a', 'a', '2022-01-12 07:27:10', '', 1, ''),
(9, 'zx', 'Female', '  asd  ', './uploads/homeTutor/95f162b2b0e4357dfe93c1a5d231c6ee.png', '9-12', 'Horly', 0, 158, 'Debre Zeyit', 931575704, '', 'sad', '2022-01-12 08:30:10', 'EDITED', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `tableName` varchar(15) NOT NULL,
  `postId` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `msg` text NOT NULL,
  `postedDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `startingDate` date NOT NULL,
  `deadLine` date NOT NULL,
  `address` varchar(20) NOT NULL,
  `photoPath1` text NOT NULL,
  `initialCost` int(11) NOT NULL,
  `info` varchar(500) NOT NULL,
  `posterId` int(11) NOT NULL,
  `postedDate` datetime NOT NULL,
  `edited` varchar(10) NOT NULL,
  `postStatus` varchar(10) NOT NULL,
  `view` int(11) NOT NULL,
  `phone` text NOT NULL,
  `fav` longtext NOT NULL,
  `cpo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`id`, `title`, `type`, `startingDate`, `deadLine`, `address`, `photoPath1`, `initialCost`, `info`, `posterId`, `postedDate`, `edited`, `postStatus`, `view`, `phone`, `fav`, `cpo`) VALUES
(1, 'kenean', 'ad', '2021-12-14', '0000-00-00', '                54  ', '', 3, ' https://www.facebook.com/groups/sarcasmx9/media', 0, '2021-12-18 22:04:15', 'YES', '', 0, '', '', ''),
(2, 'er', 'asfdasfdafds', '0000-00-00', '0000-00-00', '      ', '../uploads/tenderPhotos/91223c404454b2f3b2ace5751e222394.png', 0, 'ljkjj ', 0, '2021-12-24 20:24:58', 'YES', '', 0, '', '', ''),
(3, 'ererzxzx34', 'asfdasfdafds', '0000-00-00', '0000-00-00', '      zx', '../uploads/tenderPhotos/de9b68175b07fc9dddea278561581a89.png,../uploads/tenderPhotos/5dad67e74c123c7b6a177bfc33322289.png', 0, ' zx', 89, '2021-12-25 07:52:41', 'YES', '', 3, '', '', ''),
(4, 'the vac2w123123123', 'ad', '0000-00-00', '0000-00-00', '      sfdfssd', '../uploads/tenderPhotos/03a77a6f7484ea266b31fdec9720e1c0.png', 0, ' ', 89, '2021-12-25 08:53:27', 'YES', '', 2, '', '', ''),
(5, 'asdf', 'asfdasfdafds', '0000-00-00', '0000-00-00', '', '', 0, ' ', 89, '0000-00-00 00:00:00', '', '', 0, '', ',159', ''),
(6, 'adfs', 'asfdasfdafds', '0000-00-00', '0000-00-00', '', '', 0, ' ', 89, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(7, 'gjjhg', 'kanean digital', '0000-00-00', '0000-00-00', '', '', 0, ' ', 89, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(8, 'ghj', 'ad', '2021-12-14', '0000-00-00', 'asfd', '', 34, 'asfdafsd ', 89, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(9, 'ghnb', 'ad', '2021-12-14', '0000-00-00', 'asfd', '', 34, 'asfdafsd ', 89, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(10, 'ghj,', 'z', '0000-00-00', '0000-00-00', '', '', 0, ' ', 89, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(11, 'yu', 'z', '0000-00-00', '0000-00-00', '', '', 0, ' ', 89, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(12, 'rty', '', '2021-12-22', '0000-00-00', '', '', 0, ' ', 89, '0000-00-00 00:00:00', '', '', 1, '', '', ''),
(13, 'et', '', '2021-12-22', '0000-00-00', '', '', 0, ' ', 89, '0000-00-00 00:00:00', '', '', 1, '', '', ''),
(14, 'er', 'post not edited', '2021-12-08', '2021-12-09', 'vvvvvvv', '', 33434, 'cccccc', 89, '2021-12-11 00:00:00', '', '', 3, '', '', ''),
(15, 'eretr', 'vvvvvvvvvvvvv', '2022-01-06', '2021-12-09', '', '', 2147483647, ' ', 14, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(16, 'er', '', '0000-00-00', '0000-00-00', 'zzzz', '', 0, 'zzzz ', 89, '0000-00-00 00:00:00', '', '', 2, '', '', ''),
(17, 'er', '', '0000-00-00', '0000-00-00', 'zzzz', '', 0, 'zzzz ', 89, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(18, 'rrrrr', 'vvvvvvvvvvvvv', '0000-00-00', '2021-12-13', '23', '', 23, '23 ', 95, '0000-00-00 00:00:00', '', '', 3, '', '', ''),
(19, 'rrrrr', 'vvvvvvvvvvvvv', '0000-00-00', '2021-12-13', '23', '../uploads/tenderPhotos/a41367400319f35fdb9f0b317d2f28ca.png', 23, '23 ', 95, '0000-00-00 00:00:00', '', '', 0, '', '', ''),
(20, 'TOYOTA Vitz', '', '0000-00-00', '0000-00-00', '', '../uploads/tenderPhotos/3c2fc475f012525324cbf42f995f016e.png', 0, ' ', 89, '2021-12-23 11:08:21', '', 'ACTIVE', 1, '', '', ''),
(21, 'TOYOTA Vitz', '', '0000-00-00', '2022-01-05', '', './uploads/tenderPhotos/ec5cdcb9288356c2200d28703da7b532.png', 0, 'asdf ', 158, '2022-01-04 13:55:56', '', 'ACTIVE', 0, '', '', ''),
(22, '', '', '0000-00-00', '0000-00-00', 'Addis Ababa', './uploads/tenderPhotos/c8e9b523dd5ab1b4c426879b0bde80e5.png', 0, ' ', 158, '2022-01-11 08:53:19', '', 'ACTIVE', 0, '', '', ''),
(23, 'sg', '', '0000-00-00', '0000-00-00', 'Addis Ababa', ' ', 0, ' ', 158, '2022-01-11 08:59:31', '', 'ACTIVE', 0, '', '', ''),
(24, 'tender post z', 'bn', '0000-00-00', '0000-00-00', 'Addis Ababa', '', 0, ' ', 158, '2022-01-11 09:10:41', 'YES', 'ACTIVE', 0, '', ',158', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `auth` varchar(10) NOT NULL,
  `photoPath1` text NOT NULL,
  `lastLogedIn` datetime NOT NULL,
  `about` varchar(40) NOT NULL,
  `userStatus` varchar(20) NOT NULL,
  `recover` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstName`, `lastName`, `phone`, `email`, `auth`, `photoPath1`, `lastLogedIn`, `about`, `userStatus`, `recover`) VALUES
(89, 'kenean360', '$2y$10$pu2OlXgOzA.JqVycRpsCpurkIbB9EB5Eul5KEnwU0422ZzHJe8JVW', 'Kenean', 'Tech', 987654321, '', 'ADMIN', '../uploads/adminPhoto/a9659big.png', '2022-01-20 13:36:54', '                sdgsgd  ', ' ', ''),
(95, 'fonka@gmail.com', '1234', 'Fikir', 'Getahun', 931575704, '', 'EDITOR', '../uploads/adminPhoto/a14131T6B0828.jpg', '2021-12-14 00:00:00', '     i love my self. self love', 'programmer', ''),
(147, 'vvv@gmail.com', '1234', 'new', 'new', 11, '', 'ADMIN', '../uploads/adminPhoto/a1259big.png', '2021-12-13 00:00:00', '     new     ', 'new', ''),
(149, 'fonka@gmail.com', '1234', 'MIki', 'Belete', 931575704, '', 'Choose...', '../uploads/adminPhoto/3DSC_0720.jpg', '2021-12-17 00:00:00', 'asdfasdf', 'programmer', ''),
(150, '0931575704', '$2y$10$NSaIyK1ftS2R4f/sDCAFEu8YlJNXsMVTJhxO6taygvNgf9Qn0jHvC', 'Bethelhem', 'Legesse', 0, '', 'USER', 'FILE_NOT_UPLOADED', '2021-12-29 11:25:10', 'Betym199@gmail.com', '', ''),
(151, 'Betym199@gmail.com', '$2y$10$4Uv4mkrrFyJv87CP1.8EZeVsVV6Ar51QMfR4TfpkDOWLtC4PCDZDq', 'Bethelhem', 'Legesse', 931575704, '', 'USER', '../uploads/adminPhoto/5Screenshot (5).png', '2021-12-29 11:33:55', 'Betym199@gmail.com', ' ', ''),
(152, 'fonkablata@gmail.com', '$2y$10$BMZ2kDyWv0OWpo2e7ImSDuCdKSg51wPjru7VnUCtsyucfw..BwGHm', 'Bethelhem', 'Legesse', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2021-12-29 12:01:27', 'fonkablata@gmail.com', '', ''),
(153, 'fonkablata@gmail.com', '$2y$10$T5d4kqIOE5PPJwUV9FClH.kg.K7gzxa6H0xSQiiXf344zbCBoEXpu', 'firstName', '', 0, '', 'USER', 'FILE_NOT_UPLOADED', '2021-12-29 12:02:34', 'fonkablata@gmail.com', '', ''),
(154, 'f@gmail.com', '1234', 'Bethelhem', 'Legesse', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-02 12:26:09', '', '', ''),
(155, 'g@gmail.com', '$2y$10$VzTfD64pL.hvhAxOW7B3iO4Bz9xrVJhsnRhxH3yrbrVWBvqQqylp.', 'Fikir', 'Getahun', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-02 12:28:52', '', '', ''),
(156, 'q@gmail.com', '$2y$10$FH4SodMSxmeVrsBXu7Nx1ODuZNEPdOcqjhkuEGEQPud1235WXs1Q2', 'Fikir', 'Getahun', 0, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-02 12:32:58', '', '', ''),
(157, 'w@gmail.com', '$2y$10$AAZUuYSN2rgO3zx4Mis7MuqAW0rJ5CfFMqqFsFjThkTzBe6zrfF1e', 'Bethelhem', 'Legesse', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-02 12:38:07', '', 'BAN', ''),
(158, 'z@gmail.com', '$2y$10$pu2OlXgOzA.JqVycRpsCpurkIbB9EB5Eul5KEnwU0422ZzHJe8JVW', 'Fikir', 'Getahun', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-18 09:17:35', '', '', ''),
(159, 'x@gmail.com', '$2y$10$2BHy14ezpUeEmZs3GtCSr.7nFmwTgisWZQXRYg8Vo.fMPotQRmiVC', 'Bethelhem', 'Legesse', 931575704, '', 'Choose...', './uploads/adminPhoto/13bgg.png', '2022-01-12 18:24:09', '', '', ''),
(160, 'wee@gmail.com', '$2y$10$EjpBHv7jZfNQl9cdaYj7x.zVy4ZdrFnO8wP0gYpJHjInojU8QELaC', 'Bethelhem', 'Legesse', 931575704, '', 'USER', './uploads/adminPhoto/f5e26ad84070212d253d61a4045cbf09big.png', '2022-01-04 21:46:15', 'wee@gmail.com', '', ''),
(161, 't@gmail.com', '$2y$10$rbmpVIU1ZDhtfu0PUzikBuNkz55olNxJEdcSbdk6IGSNDXvmYnXOG', 'test', 'test', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-14 07:24:59', 'Deri Dewa', '', ''),
(162, 'y@gmail.com', '$2y$10$mTp8jiyqJC2IeztYF8m8iO/L0kXVaWD5wyzn5ZyyB8aPhfwdXIw/y', 'Yonasx', 'Kebede', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-14 08:17:43', 'Jimma', '', 'qwe@123'),
(163, 'v@gmail.com', '$2y$10$evRYTjoU7SoAAzqniEByY.xfbP6T674v2Db3Xwk0UVpdx7J620thm', 'Fikir', 'Getahun', 2147483647, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-14 08:18:52', 'Adama', '', 'qwe@123'),
(164, 'm@gmail.com', '$2y$10$qM58Ml39ZvfjyRhNYzqCrulLEH0jQRghrzKABp2dvCt/lb4oJe8oq', 'Test', 'Name', 0, '', 'ADMIN', './uploads/adminPhoto/5771f68dfa019c8ce3336cec8060a14app.png', '2022-01-18 09:27:01', '', '', 'qwe@123');

-- --------------------------------------------------------

--
-- Table structure for table `userpost`
--

CREATE TABLE `userpost` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `postType` varchar(20) NOT NULL,
  `fav` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `positionType` varchar(20) NOT NULL,
  `companyName` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `address` varchar(20) NOT NULL,
  `deadLine` datetime NOT NULL,
  `posterId` int(11) NOT NULL,
  `positionNum` int(5) NOT NULL,
  `info` text NOT NULL,
  `postedDate` datetime NOT NULL,
  `edited` varchar(10) NOT NULL,
  `postStatus` varchar(10) NOT NULL,
  `view` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `fav` longtext NOT NULL,
  `salary` int(11) NOT NULL,
  `salaryStatus` varchar(20) NOT NULL,
  `appStart` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `type`, `positionType`, `companyName`, `title`, `sex`, `address`, `deadLine`, `posterId`, `positionNum`, `info`, `postedDate`, `edited`, `postStatus`, `view`, `phone`, `fav`, `salary`, `salaryStatus`, `appStart`) VALUES
(3, '0', '0', 'asfd', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(4, '\"1\"', '\"7\"', 'asfd oop', '<br /><b>Notice</b>:', '', '', '0000-00-00 00:00:00', 67, 4, '', '2021-12-30 12:21:17', 'YES', '', 0, 0, '', 0, '', '0000-00-00'),
(5, 'fdfds', '2', 'kk', 'kenean digital', '', 'gelan', '2021-12-25 00:00:00', 0, 4, 'https://www.facebook.com/groups/sarcasmx9/media', '2021-12-18 22:01:35', 'YES', '', 0, 0, '', 0, '', '0000-00-00'),
(6, '0', '0', 'asfd', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(7, '0', '0', 'asfd', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 1, 0, '', 0, '', '0000-00-00'),
(8, '0', '0', 'asfd', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 3, 0, '', 0, '', '0000-00-00'),
(9, '0', '0', '', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(10, '0', '0', '', 'zxc', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, ',162', 0, '', '0000-00-00'),
(11, '0', '0', 'cx', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(12, '0', '0', 'sdf', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(13, '0', '0', 'SDF', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(14, '0', '0', 'asfd', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(15, '8', '0', '', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(16, '\"0\"', '\"0\"', 'SDF', '<br /><b>Notice</b>:', '', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-30 12:24:34', 'YES', '', 0, 0, '', 0, '', '0000-00-00'),
(17, '0', '0', 'asfd', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(18, '0', '0', 'asfd', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(19, '0', '0', 'asfd', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(20, '0', '0', 'sdf', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(21, '0', '0', 'SFD', '', '', 'SDF', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 10, 0, '', 0, '', '0000-00-00'),
(22, '0', '0', 'SFD', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(23, '0', '0', '', '', '', 'ESAYYYYY', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(24, '0', '0', 'SDF', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(25, '0', '0', '', 'dgs', '', '', '0000-00-00 00:00:00', 89, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(26, '0', '2', 'afds', 'kenean digital', '', 'afds', '0000-00-00 00:00:00', 0, 0, 'sadf', '0000-00-00 00:00:00', '', '', 2, 0, '', 0, '', '0000-00-00'),
(27, '0', '2', 'afds', 'kenean digital', '', 'afds', '0000-00-00 00:00:00', 0, 0, 'sadf', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(28, '7', '1', 'Fonka', 'Coder', '', 'Belier 4 Kilo', '2021-12-06 00:00:00', 0, 4, 'Best job', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(29, '7', '1', 'Fonka', 'Coder', '', 'Belier 4 Kilo', '2021-12-06 00:00:00', 0, 4, 'Best job', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(30, '0', '0', 'SDF', '', '', 'adsf', '2021-12-15 00:00:00', 89, 0, 'adf', '2021-12-11 00:00:00', '', '', 1, 0, '', 0, '', '0000-00-00'),
(31, '0', '0', 'un edited', 'non edieted', '', 'bole unedited', '2021-12-15 00:00:00', 0, 12345, 'aasdf', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(32, '0', '0', 'un edited', 'non edieted', '', 'bole unedited', '2021-12-15 00:00:00', 0, 12345, 'aasdf', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(33, '0', '0', 'xxxxxxxx', 'xxxxxxx', '', 'xxxxx', '0000-00-00 00:00:00', 89, 44, 'xxx', '2021-12-11 00:00:00', '', '', 4, 0, '', 0, '', '0000-00-00'),
(34, '0', '0', 'xxxxxxxx', 'xxxxxxx', '', 'xxxxx', '0000-00-00 00:00:00', 89, 44, 'xxx', '2021-12-11 00:00:00', '', '', 1, 0, '', 0, '', '0000-00-00'),
(35, '4', '0', 'uuuuuuuuu', 'uuuuuuu', '', '', '0000-00-00 00:00:00', 33, 44, '', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(36, '4', '2', 'xxxxxxxxx', 'sdfasdf', '', '', '0000-00-00 00:00:00', 1, 3, '', '2021-12-11 00:00:00', '', '', 8, 0, '', 0, '', '0000-00-00'),
(37, '0', '0', 'xxx', 'sdfasdf', '', '', '0000-00-00 00:00:00', 1, 3, '', '2021-12-11 00:00:00', '', '', 2, 0, '', 0, '', '0000-00-00'),
(38, '0', '0', 'ethiopia', '', '', '', '0000-00-00 00:00:00', 3, 0, '', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(39, '0', '0', 'bbbbbbb', 'dgs', '', '', '0000-00-00 00:00:00', 4, 4, '', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(40, '0', '0', 'cv', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(41, '0', '0', 'cv', '', '', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(42, '0', '0', 'c', '', '', '', '0000-00-00 00:00:00', 89, 0, '', '2021-12-11 00:00:00', '', '', 2, 0, '', 0, '', '0000-00-00'),
(43, '\"0\"', '\"0\"', 'midrok gggg oop', '<br /><b>Notice</b>:', '', '', '2021-12-27 00:00:00', 0, 5, '', '2021-12-30 12:20:37', 'YES', '', 0, 0, ',158,158', 0, '', '0000-00-00'),
(44, '0', '0', 'midrok', 'sdfasdf', '', 'asdfdsf', '2021-12-27 00:00:00', 0, 5, 'sadfasfd', '2021-12-14 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(45, 'ds', ' Full Time', 'sdf', 'sdfasdf', '', 'fdgdf', '0000-00-00 00:00:00', 89, 4, 'grf', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(46, 'ds', ' Full Time', 'sdf', 'sdfasdf', '', 'fdgdf', '0000-00-00 00:00:00', 89, 4, 'grf', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(47, 'ds', ' Full Time', 'sdf', 'sdfasdf', '', 'fdgdf', '0000-00-00 00:00:00', 89, 4, 'grf', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(48, 'ds', ' Full Time', 'sdf', 'sdfasdf', '', 'fdgdf', '0000-00-00 00:00:00', 89, 4, 'grf', '2021-12-16 00:00:00', '', '', 2, 0, '', 0, '', '0000-00-00'),
(49, 'Choose...', ' Choose...', '', '', 'Female', '', '0000-00-00 00:00:00', 89, 0, '', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(50, 'Choose...', ' Choose...', '', '', 'Female', '', '0000-00-00 00:00:00', 89, 0, '', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(51, 'Choose...', ' Choose...', 'zzz', '', 'Choose', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-17 15:01:13', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(52, 'Choose...', ' Choose...', 'zzz', '', 'Choose', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-17 15:01:14', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(53, 'Choose...', ' Choose...', 'zzz', '', 'Choose', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-17 15:01:13', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(54, 'Choose...', ' Choose...', 'zzz', '', 'Choose', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-17 15:01:14', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(55, 'gg', ' Part Time', 'popoopoppo', 'oppoop', 'Male', 'opopo', '0000-00-00 00:00:00', 0, 0, 'opo', '2021-12-21 23:32:21', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(56, 'gg', ' Part Time', 'popoopoppo', 'oppoop', 'Male', 'opopo', '0000-00-00 00:00:00', 0, 0, 'opo', '2021-12-21 23:32:21', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(57, 'Choose...', ' Choose...', 'cx', '', 'Choose', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-24 08:39:08', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(58, 'Choose...', ' Choose...', 'cx', '', 'Choose', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-24 08:39:08', '', 'ACTIVE', 1, 0, '', 0, '', '0000-00-00'),
(59, 'Choose...', ' Choose...', 'brrr', '', 'Choose', '', '0000-00-00 00:00:00', 0, 0, 'sdf', '2021-12-29 14:23:14', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(60, 'Choose...', ' Choose...', 'SFD', '', 'Choose', '', '0000-00-00 00:00:00', 0, 0, '', '2021-12-29 14:29:33', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(61, 'Choose...', ' Choose...', 'SFD', '', 'Choose', 'asdf', '2022-01-04 00:00:00', 151, 234, 'afds', '2021-12-31 19:55:02', '', 'ACTIVE', 1, 931575704, '', 0, '', '0000-00-00'),
(62, '\"\"\" Choose...\"\"\"', '\"\"\"Choose...\"\"\"', 'SFDadsf', '', 'Choose', 'sfda', '0000-00-00 00:00:00', 158, 3, 'sadfsdaf', '2022-01-03 07:50:35', 'YES', 'ACTIVE', 0, 931575704, '', 0, '', '0000-00-00'),
(63, '', ' Choose...', 'Choose...', '', '', '', '0000-00-00 00:00:00', 0, 158, '', '2022-01-05 13:14:03', '', 'ACTIVE', 0, 454545, '', 0, '', '0000-00-00'),
(64, '0931575704', ' Choose...', 'Choose...', 'SFD', '', '', '0000-00-00 00:00:00', 0, 158, '', '2022-01-05 13:14:53', '', 'ACTIVE', 0, 23, '', 0, '', '0000-00-00'),
(65, '', ' Choose...', 'Choose...', '', '', '', '0000-00-00 00:00:00', 0, 158, '', '2022-01-05 13:14:56', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(66, '', ' Choose...', 'Choose...', 'sdf', '', '', '0000-00-00 00:00:00', 0, 158, '', '2022-01-05 13:24:50', '', 'ACTIVE', 0, 0, '', 0, '', '0000-00-00'),
(67, '', ' Choose...', 'Choose...', '', '', '', '0000-00-00 00:00:00', 0, 158, '', '2022-01-05 13:25:04', '', 'ACTIVE', 0, 12, '', 0, '', '0000-00-00'),
(68, '', ' Choose...', 'Choose...', 'qwe', '', '', '0000-00-00 00:00:00', 0, 158, '', '2022-01-05 13:28:06', '', 'ACTIVE', 0, 123, '', 0, '', '0000-00-00'),
(69, '000', ' Choose...', 'Choose...', 'q', '', '', '0000-00-00 00:00:00', 0, 158, '', '2022-01-05 13:29:33', '', 'ACTIVE', 0, 12345, '', 0, '', '0000-00-00'),
(70, 'Choose...', '67', 'SFD', '', 'Choose', '', '0000-00-00 00:00:00', 158, 0, '', '2022-01-05 13:40:49', '', 'ACTIVE', 0, 931575704, '', 0, '', '0000-00-00'),
(71, 'Choose...', 'Choose...', '', '', 'Choose', '', '0000-00-00 00:00:00', 158, 0, '', '2022-01-05 13:43:24', '', 'ACTIVE', 0, 0, '', 80, '', '0000-00-00'),
(72, 'Choose...', 'Choose...', '', '', ' ', 'Address', '2022-01-21 00:00:00', 158, 0, '', '2022-01-05 14:03:50', '', 'ACTIVE', 0, 0, '', 70, 'Negotiatable', '2022-01-06'),
(73, 'fdfds', 'Choose...', 'zaq', '', ' ', 'Addis Ababa', '0000-00-00 00:00:00', 159, 0, '', '2022-01-10 12:37:11', '', 'ACTIVE', 0, 0, '', 0, ' ', '0000-00-00'),
(74, 'dgdg', '\"\"Choose...\"\"', 'job vacancy Winning', '', ' ', 'Addis Ababa', '0000-00-00 00:00:00', 158, 0, '', '2022-01-11 08:42:52', 'YES', 'ACTIVE', 0, 0, '', 222, ' ', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vacancycategory`
--

CREATE TABLE `vacancycategory` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancycategory`
--

INSERT INTO `vacancycategory` (`id`, `category`) VALUES
(6, 'c'),
(7, 'az'),
(9, 'OTHER'),
(10, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `zebegna`
--

CREATE TABLE `zebegna` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `age` int(3) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `photoPath1` text NOT NULL,
  `workStat` varchar(20) NOT NULL,
  `postedDate` datetime NOT NULL,
  `edited` varchar(7) NOT NULL,
  `posterId` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `fav` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zebegna`
--

INSERT INTO `zebegna` (`id`, `name`, `sex`, `age`, `address`, `phone`, `photoPath1`, `workStat`, `postedDate`, `edited`, `posterId`, `view`, `fav`) VALUES
(1, 'carCategory v3', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:05:03', 'EDITED', 2, 0, ''),
(2, 'bithch', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:06:14', 'EDITED', 2, 2, ''),
(3, 'carCategory v3', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:06:52', 'EDITED', 2, 0, ''),
(4, 'carCategory v3', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:07:56', 'EDITED', 2, 0, ''),
(5, 'carCategory v3', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:09:19', 'EDITED', 2, 0, ''),
(6, 'Fikir SFG Getahun', 'Choose.', 0, 'F', 0, './uploads/zebegnaPhoto/5f4df69b99c5d980f586ef97e6bf0890.png', 'Choose...', '2021-12-31 14:36:14', '', 0, 3, ''),
(7, 'zebegna', 'Choose.', 0, 'Arba Minchi', 0, './uploads/zebegnaPhoto/565d651caf6c3ee55cd12c68a9365476.png', 'Choose...', '2022-01-12 07:30:51', '', 0, 0, ''),
(8, 'zzxxx', 'Male', 3, 'Arba Minchi', 931575704, './uploads/zebegnaPhoto/e4d189a65bf8817d0a279a1b55e2f569.png', 'House', '2022-01-12 08:58:54', 'EDITED', 158, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adcategory`
--
ALTER TABLE `adcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carcategory`
--
ALTER TABLE `carcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charity`
--
ALTER TABLE `charity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelhouse`
--
ALTER TABLE `hotelhouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housecategory`
--
ALTER TABLE `housecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housesell`
--
ALTER TABLE `housesell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobhometutor`
--
ALTER TABLE `jobhometutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpost`
--
ALTER TABLE `userpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancycategory`
--
ALTER TABLE `vacancycategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zebegna`
--
ALTER TABLE `zebegna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `adcategory`
--
ALTER TABLE `adcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `carcategory`
--
ALTER TABLE `carcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `charity`
--
ALTER TABLE `charity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hotelhouse`
--
ALTER TABLE `hotelhouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `housecategory`
--
ALTER TABLE `housecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `housesell`
--
ALTER TABLE `housesell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `jobhometutor`
--
ALTER TABLE `jobhometutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `userpost`
--
ALTER TABLE `userpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `vacancycategory`
--
ALTER TABLE `vacancycategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zebegna`
--
ALTER TABLE `zebegna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
