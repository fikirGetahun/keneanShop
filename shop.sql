-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2022 at 08:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `type` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `address` varchar(50) DEFAULT NULL,
  `phone` int(12) DEFAULT 0,
  `for` varchar(10) DEFAULT NULL,
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
(8, '0', 45, 'gelan condominyem', 931575704, 'Choose...', 'TOYOTA Vitz', '', 147, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(12, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 2, ''),
(13, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(14, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(15, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
(16, '0', 0, '', 0, 'Choose...', '', '', 89, '', 'E', 'ACTIV', '', '', '0000-00-00 00:00:00', 0, ''),
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
(34, '0', 0, '', 0, ' ', '1lk', '', 89, '', '../uploads/adPostsPhoto/bae1948b566edd31622eacdfc70d889d.png,../uploads/adPostsPhoto/92082fd28c9d4dd3b19c43797b008a98.jpg', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 1, ''),
(35, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 1, ''),
(36, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 4, ''),
(37, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(38, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 1, ''),
(39, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(40, '0', 0, '', 0, ' ', '', '', 89, '', '', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 1, ''),
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
(55, '0', 0, '', 0, ' ', 'vbbbbbbbvbvbvbvqq121', '', 89, '', '../uploads/adPostsPhoto/f48ac80f685852caf983341840f1fbfe.png,../uploads/adPostsPhoto/43b0de7b2dc8b5897465bc92cf5ad2f5.jpg', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(56, '0', 0, '', 0, ' ', 'mikyzxzx12', '', 89, '', '../uploads/adPostsPhoto/72d8ccbaec13a7f351f04400c0dca0aa.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(57, '0', 45, '', 0, ' ', '', '', 89, '', '../uploads/adPostsPhoto/5177736355454127b457d3b943f90438.jpg', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 0, ''),
(58, '0', 45, 'editedcv', 931575704, 'men', 'TOYOTA Vitz big disc', 'ACTIVE', 89, 'sdfsdxcv', '../uploads/adPostsPhoto/0c6d70f301ea51ae5e3c52b2758a5005.jpg', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 5, ''),
(63, 'Cloth and Shoe', 44, 'Debre Markos', 0, ' ', 'zx', 'NOT', 158, 'xzxzxzx', './uploads/adPostsPhoto/718d25b4b97c2286275d0fe083982653.jpg,./uploads/adPostsPhoto/7ba595dd07d992d71a3fa518244245a3.png', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 4, ''),
(65, 'ccc', 0, 'Addis Ababa', 0, ' ', 'time is gold', 'NOT', 158, '', './uploads/adPostsPhoto/59456d1a9a35b272cd6e554a27b2a1ec.png', 'ACTIV', '', 'NO', '0000-00-00 00:00:00', 2, ''),
(66, '  Cloth and Shoe', 0, 'Arba Minchi', 0, 'women', 'adds testxx', 'NOT', 158, '', './uploads/adPostsPhoto/7aa2070fc70a847eab00116673628383.png', 'ACTIV', 'YES', 'NO', '0000-00-00 00:00:00', 0, ''),
(67, 'asdf', 0, 'Bahari Dar', 0, ' ', 'ad testing pls', 'NOT', 158, '', './uploads/adPostsPhoto/816161062f070b2d59932c741923a8ba.png', 'ACTIV', '', 'NO', '2022-01-11 09:50:13', 4, ''),
(68, 'Jewlery', 45, 'Debre Markos', 931575704, ' ', 'werk', 'NOT', 158, 'afd', './uploads/adPostsPhoto/e5538ea9a916046251fa1c1ef605f866.png,./uploads/adPostsPhoto/38bb8819c56bb471767dcae64b439f27.png', 'ACTIV', '', 'YES', '2022-01-20 10:07:10', 4, ''),
(69, 'Jewlery', 45, 'Bahari Dar', 931575704, ' ', 'mishet tape', 'NOT', 158, 'sdf', './uploads/adPostsPhoto/29091b92aaa6db53be819160a665bd44.png,./uploads/adPostsPhoto/534a8ce9ee33af5c6a682ad19576d326.png,./uploads/adPostsPhoto/799659feca40f413a2595b1807b94d00.png', 'ACTIV', '', 'NO', '2022-01-20 10:10:36', 8, ''),
(70, 'Jewlery', 45000, 'Addis Ababa', 931575704, ' ', 'yemishet kelebet', 'NOT', 165, 'yehe yemishit kelebet silhone gizu', './uploads/adPostsPhoto/b34489572ab1daa4cc687e49a4b2cc3a.png,./uploads/adPostsPhoto/0148afd9529be970e7f8405f04cb36cb.png', 'ACTIV', '', 'YES', '2022-01-22 09:49:33', 16, ''),
(71, 'Jewlery', 45, 'gelan condominyem', 931575704, ' ', 'real userx', 'ACTIVE', 95, 'xx', './uploads/adPostsPhoto/3026a3aee3dc99b7d90b322f2144e77b.png,./uploads/adPostsPhoto/0dfdc6eb72eef77494ea508aafb6c227.png', 'ACTIV', '', 'YES', '2022-01-26 08:01:22', 3, ',158'),
(72, 'Cloth and Shoe', 200, 'Addis Ababa', 931575704, 'both', 'T shirt', 'ACTIVE', 89, 'mirt yemailek orginal t shirt new gizugn', './uploads/adPostsPhoto/a838b8cc04941470658cc40adf01ecc5.png,./uploads/adPostsPhoto/9ed0a392a0b59ddba9437fff7b767d66.png,./uploads/adPostsPhoto/8470c62bd1ac199f3282c235bb0d99cc.png', 'ACTIV', '', 'YES', '2022-01-27 11:30:55', 5, ''),
(73, 'Cloth and Shoe', 2000, 'Addis Ababa', 931575704, 'men', 'chama nike', 'NOT', 166, 'yeteshete eka', './uploads/adPostsPhoto/663ae37cce8f8e97dc6fa305d5f867ea.jpg', 'ACTIV', '', 'YES', '2022-01-29 14:13:02', 10, ''),
(74, 'Jewlery', 500, 'Addis Ababa', 931575704, 'Female', 'Miky Big Discount po', 'ACTIVE', 89, '// to choose random table to fetch data off// to choose random table to fetch data off', './uploads/adPostsPhoto/90f3b9a191fd05523672ececc4ce5839.jpg,./uploads/adPostsPhoto/83e8757842b8734f7a1dbb90efdf2a84.jpg', 'ACTIV', '', 'YES', '2022-02-10 09:53:25', 12, ''),
(75, 'Furniture ', 44, 'Addis Ababa', 987654321, ' ', 'chala felagio', 'ACTIVE', 89, 'adsfafd', './uploads/adPostsPhoto/daf9165565c2cdad407a8b392a115273.jpg,./uploads/adPostsPhoto/125aef4ce9241670bd07821cc3a0e6b6.jpg', 'ACTIV', '', 'YES', '2022-02-16 08:00:13', 0, ''),
(76, 'Furniture ', 44, 'Addis Ababa', 987654321, ' ', 'chala felagio', 'ACTIVE', 89, 'adsfafd', './uploads/adPostsPhoto/6086191035dfdfda6ded02d6e02c8741.jpg,./uploads/adPostsPhoto/0cc00ecfd9fd787dce326381edb04e82.jpg', 'ACTIV', '', 'YES', '2022-02-16 08:00:15', 2, ''),
(77, 'Furniture ', 44, 'Addis Ababa', 13, ' ', 'SAMSUNG', 'ACTIVE', 165, 'sdf', './uploads/adPostsPhoto/45b88070d4766886b00c333f8ffe3228.jpg,./uploads/adPostsPhoto/cd9c5a2cdf5b8ed64c6cbd468f71c804.jpg', 'ACTIV', '', 'Off', '2022-02-16 08:40:48', 5, ''),
(78, 'Furniture ', 44, 'Addis Ababa', 13, ' ', 'SAMSUNG', 'ACTIVE', 165, 'sdf', './uploads/adPostsPhoto/2c389de5a450a37f3ae1bc66e1f5bb6f.jpg,./uploads/adPostsPhoto/628ae9ebe5f47ca0a2be24a2e726141c.jpg', 'ACTIV', '', 'Off', '2022-02-16 08:40:48', 1, ''),
(79, 'Category', 0, 'Addis Ababa', 0, ' ', 'kermo', 'ACTIVE', 89, '', './uploads/adPostsPhoto/89a9a7cffe496a33d88b8301326e4c25.jpg', 'ACTIV', '', 'Off', '2022-02-16 08:43:10', 4, ''),
(80, 'Category', 0, 'Addis Ababa', 0, ' ', 'kermo', 'ACTIVE', 89, '', './uploads/adPostsPhoto/22ae968ce6594227f46927e303be1952.jpg', 'ACTIV', '', 'Off', '2022-02-16 08:43:10', 0, ''),
(83, 'Category', 0, 'Addis Ababa', 987654321, ' ', 'z', 'ACTIVE', 89, '', './uploads/adPostsPhoto/4cb08e66016826bfc01fe7990f86edc5.jpg', 'ACTIV', '', 'Off', '2022-02-16 09:45:02', 5, ''),
(84, 'Category', 0, 'Addis Ababa', 987654321, ' ', 'z', 'ACTIVE', 89, '', './uploads/adPostsPhoto/f982cb1c8c9361c3f7cd64caa34789cd.jpg', 'ACTIV', '', 'Off', '2022-02-16 09:45:02', 1, ''),
(85, 'Category', 0, 'Addis Ababa', 987654321, ' ', 'kenean', 'ACTIVE', 89, '', './uploads/adPostsPhoto/8e7ee018c5df4419f9672a68969b167f.jpg', 'ACTIV', '', 'Off', '2022-02-16 10:11:09', 1, ''),
(86, 'Category', 0, 'Addis Ababa', 987654321, ' ', 'kenean', 'ACTIVE', 89, '', './uploads/adPostsPhoto/5b5d50522493c89f52efd48e3a82e5be.jpg', 'ACTIV', '', 'Off', '2022-02-16 10:11:09', 0, ''),
(87, 'Cloth and Shoe', 0, 'All', 98776767, 'Female', 'mikiiki', 'ACTIVE', 89, '', './uploads/adPostsPhoto/4ab1e2eac21efc05f6c5d84e4c249c94.jpg', 'ACTIV', '', 'Off', '2022-02-17 12:30:32', 2, ''),
(88, 'Cloth and Shoe', 0, 'All', 98776767, 'Female', 'mikiiki', 'ACTIVE', 89, '', './uploads/adPostsPhoto/d075acd8ebd636259bf117317d00d86c.jpg', 'ACTIV', '', 'Off', '2022-02-17 12:30:33', 0, ''),
(89, 'Category', 0, 'Addis Ababa', 987654321, ' ', 'new big discount', 'ACTIVE', 89, '', './uploads/adPostsPhoto/ebdc3e4afb2f55ce604eb0143fb0b230.jpg', 'ACTIV', '', 'Off', '2022-02-17 12:42:08', 1, ''),
(90, 'Category', 0, 'Addis Ababa', 987654321, ' ', 'new big discount', 'ACTIVE', 89, '', './uploads/adPostsPhoto/cac53769026a89c00ef77412195265c5.jpg', 'ACTIV', '', 'Off', '2022-02-17 12:42:08', 0, ''),
(91, 'Category', 0, 'Addis Ababa', 931575704, ' ', 'SAMSUNG', 'NOT', 166, '', './uploads/adPostsPhoto/60512c976975035f340a90077c5dab83.jpg', 'ACTIV', '', 'Off', '2022-02-23 09:05:25', 1, ''),
(92, 'Category', 0, 'Addis Ababa', 931575704, ' ', '', 'NOT', 166, '', './uploads/adPostsPhoto/095061363eb7ad6c133dccd4ee15ed0b.jpg', 'ACTIV', '', 'Off', '2022-02-23 10:07:02', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `adcategory`
--

CREATE TABLE `adcategory` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `tableName` varchar(20) NOT NULL,
  `subcityKey` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adcategory`
--

INSERT INTO `adcategory` (`id`, `category`, `tableName`, `subcityKey`) VALUES
(53, 'Cloth and Shoe', 'ad', ''),
(58, 'OTHER', 'ad', ''),
(62, 'Asela', 'CITY', ''),
(63, 'Ambo', 'CITY', ''),
(64, 'Aksum', 'CITY', ''),
(65, 'Bahari Dar', 'CITY', ''),
(66, 'Dessie', 'CITY', ''),
(67, 'D/Zeyit', 'CITY', ''),
(68, 'D/Tabor', 'CITY', ''),
(69, 'D/Markos', 'CITY', ''),
(70, 'D/Dewa', 'CITY', ''),
(71, 'Addis Ababa', 'CITY', ''),
(72, 'Adama', 'CITY', ''),
(73, 'Arba Minchi', 'CITY', ''),
(74, 'Jimma', 'CITY', ''),
(75, 'Gonder', 'CITY', ''),
(76, 'Harar', 'CITY', ''),
(77, 'Nekemit', 'CITY', ''),
(78, 'Mekele', 'CITY', ''),
(79, 'Injibara', 'CITY', ''),
(80, 'Weldiya', 'CITY', ''),
(81, 'Welkit', 'CITY', ''),
(111, 'Jewlery', 'ad', ''),
(113, 'Computer and Laptop', 'electronics', ''),
(114, 'Kera', 'SUBCITY', 'Addis Ababa'),
(115, 'Bole', 'SUBCITY', 'Addis Ababa'),
(116, '4 Kilo', 'SUBCITY', 'Addis Ababa'),
(119, 'ICT', 'vacancy', ''),
(120, 'OTHER', 'car', ''),
(122, 'Apartama', 'housesell', ''),
(123, 'Toyota', 'car', ''),
(124, 'BMW', 'car', ''),
(125, 'Van', 'car', ''),
(126, 'Lada', 'car', ''),
(127, 'Dolfin', 'car', ''),
(128, 'Pick Up', 'car', ''),
(129, 'Lory', 'car', ''),
(130, 'Jaguar Taxi', 'car', ''),
(131, 'Mobile', 'electronics', ''),
(132, 'Tv', 'electronics', ''),
(133, 'Kitchen Accessory ', 'electronics', ''),
(135, 'Zombi', 'car', ''),
(136, 'Dormitory', 'housesell', ''),
(137, 'Condominium', 'housesell', ''),
(139, 'Commercial Office', 'housesell', ''),
(140, 'Residential House', 'housesell', ''),
(141, 'Shop', 'housesell', ''),
(142, 'Full Compound House', 'housesell', ''),
(143, 'Furniture ', 'ad', ''),
(145, 'Engineering ', 'vacancy', ''),
(146, 'Arada', 'SUBCITY', 'Addis Ababa'),
(147, 'Addis Ketema', 'SUBCITY', 'Addis Ababa'),
(148, 'Akaky Kaliti', 'SUBCITY', 'Addis Ababa'),
(149, 'Gullele', 'SUBCITY', 'Addis Ababa'),
(150, 'Kirkos', 'SUBCITY', 'Addis Ababa'),
(151, 'Kolfe Keranio', 'SUBCITY', 'Addis Ababa'),
(152, 'Lideta', 'SUBCITY', 'Addis Ababa'),
(153, 'Nifas Silk-Lafto', 'SUBCITY', 'Addis Ababa'),
(154, 'Yeka', 'SUBCITY', 'Addis Ababa'),
(155, 'Arada', 'SUBCITY', 'Gonder'),
(156, 'Azezo', 'SUBCITY', 'Gonder'),
(157, 'Fasil', 'SUBCITY', 'Gonder'),
(158, 'Maraki', 'SUBCITY', 'Gonder'),
(159, 'Jantekel', 'SUBCITY', 'Gonder'),
(160, 'Tseda', 'SUBCITY', 'Gonder'),
(161, 'Zobel', 'SUBCITY', 'Gonder'),
(162, 'Belay Zeleke', 'SUBCITY', 'Bahari Dar'),
(163, 'Fasilo', 'SUBCITY', 'Bahari Dar'),
(164, 'Menilk', 'SUBCITY', 'Bahari Dar'),
(165, 'Tewodros', 'SUBCITY', 'Bahari Dar'),
(166, 'Gish Abay', 'SUBCITY', 'Bahari Dar'),
(167, 'Tana', 'SUBCITY', 'Bahari Dar'),
(168, 'Hawasa', 'CITY', ''),
(169, '', '', ''),
(170, 'Tula', 'SUBCITY', 'Hawasa'),
(171, 'Msirak', 'SUBCITY', 'Hawasa'),
(172, 'Menehariya', 'SUBCITY', 'Hawasa'),
(173, 'Mehal Ketema', 'SUBCITY', 'Hawasa'),
(174, 'Bahal Adarash', 'SUBCITY', 'Hawasa'),
(175, 'Adiss Ketema', 'SUBCITY', 'Hawasa'),
(176, 'Tabor', 'SUBCITY', 'Hawasa'),
(177, 'Hayik Dar', 'SUBCITY', 'Hawasa'),
(178, '', '', ''),
(179, 'Ayider', 'SUBCITY', 'Mekele'),
(180, 'Hawelti', 'SUBCITY', 'Mekele'),
(181, 'Adi Haqi', 'SUBCITY', 'Mekele'),
(182, 'Hadnet', 'SUBCITY', 'Mekele'),
(183, 'Kedama', 'SUBCITY', 'Mekele'),
(184, 'Quiha', 'SUBCITY', 'Mekele'),
(185, 'Semien', 'SUBCITY', 'Mekele'),
(186, 'Arada', 'SUBCITY', 'Dessie'),
(187, 'Banba Wuha', 'SUBCITY', 'Dessie'),
(188, 'Hotie', 'SUBCITY', 'Dessie'),
(189, 'Menafesha', 'SUBCITY', 'Dessie'),
(190, 'Segno Gebeya', 'SUBCITY', 'Dessie'),
(191, 'All', 'CITY', ''),
(192, '', '', ''),
(194, 'ww', 'ad', ''),
(195, 'ww', 'electronics', ''),
(196, 'ww', 'car', ''),
(197, 'ww', 'housesell', ''),
(198, 'Haymi', 'vacancy', ''),
(213, 'silver', 'pkg', 'bla blabla,300');

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
(5, 'It Works', 'What is lOREM?', '2022-01-04 19:34:58', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n\r\nTranslations: Can you help translate this site into a foreign language ? Please email us with details if you can help.\r\nThere is a set of mock banners available here in three colours and in a range of standard banner sizes:\r\nBannersBannersBanners\r\nDonate: If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support.\r\nDonate Bitcoin: 16UQLq1HZ3CNwhvgrarV6pMoA2CDjb4tyF\r\nNodeJS Python Interface GTK Lipsum Rails .NET Groovy\r\n\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 B', '', 159, './uploads/blogPhoto/e4066579bd269448b27a4f4a683e85e2.png,./uploads/blogPhoto/cd6bfa3f7cab860e885582cfac53bee4.png,./uploads/blogPhoto/b14c4e2cdbc814c0227d74fa700ebece.png'),
(6, 'Ethiopia we Love You', 'Ethiopian condition right now', '2022-01-21 13:29:38', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'\r\n\r\nTranslations: Can you help translate this site into a foreign language ? Please email us with details if you can help.\r\nThere is a set of mock banners available here in three colours and in a range of standard banner sizes:\r\nBannersBannersBanners\r\nDonate: If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill. There is no minimum donation, any sum is appreciated - click here to donate using PayPal. Thank you for your support.\r\nDonate Bitcoin: 16UQLq1HZ3CNwhvgrarV6pMoA2CDjb4tyF\r\nNodeJS Python Interface GTK Lipsum Rails .NET Groovy\r\n\r\nThe standard Lorem Ipsum passage, used since the 1500s\r\n\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\n1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one w', '', 89, './uploads/blogPhoto/1ec0698df63a74e975b48e2b8d155b29.jpg,./uploads/blogPhoto/31e06582e34d8b6fea98f00532c74c1c.png,./uploads/blogPhoto/c09b87b63e374828d7f1d6cfc3d6639c.png,./uploads/blogPhoto/4512ee8f091b7f579df0a4a302c0130e.png'),
(7, 'Dont wory be happy', 'Hey Life is Good', '2022-02-15 12:20:55', 'asdfsdfsdfsdfasdf asfsa asf', '', 0, './uploads/blogPhoto/e6c1d4cf532e818103b2248e3a15cc39.jpg,./uploads/blogPhoto/f55532150b182be8255851d84e9216aa.jpg,./uploads/blogPhoto/ffdbb19e5add3725588f4f7cd80f3717.jpg,./uploads/blogPhoto/d13b02dea81f06bedd399830fff4f8d7.jpg'),
(8, 'Dont wory be happy', 'Hey Life is Good', '2022-02-15 12:20:56', 'asdfsdfsdfsdfasdf asfsa asf', '', 0, './uploads/blogPhoto/8da8e0ae4954f5bfca615b6c8f817c3d.jpg,./uploads/blogPhoto/96c1d45a88f94acfa215c3c7a5f771fb.jpg,./uploads/blogPhoto/f6e2903a658c885ce732f07f4b40ddc2.jpg,./uploads/blogPhoto/a828af8045fc1ecec82ee245b3744179.jpg');

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
  `status` varchar(4) NOT NULL,
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
  `whyRent` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `title`, `type`, `ownerBroker`, `address`, `status`, `fuleKind`, `transmission`, `km`, `bodyStatus`, `posterId`, `fixidOrN`, `photoPath1`, `price`, `info`, `forRentOrSell`, `postStatus`, `postedDate`, `edited`, `view`, `fav`, `forWho`, `rentStatus`, `whyRent`, `phone`) VALUES
(4, '', '0', '', '', 'Cho', '0', '', '', '', 89, '0', '../uploads/carPostsPhoto/ad46900big.png', 0, '', '0', 'ACTIV', '2021-12-15 08:30:14', '', 73, '', '', '', '', 0),
(5, 'wwwww', 'nigga', '', '', 'NEW', 'Benzene', '', '', '', 89, 'Fixed', '', 111111, '    wwwwwww    ', 'For Sell', 'ACTIV', '2021-12-15 12:44:42', '', 76, '', '', '', '', 0),
(6, 'workkk', '0', '', '', 'Cho', '0', '', '', '', 89, '0', ' ', 0, '', '0', 'ACTIV', '2021-12-15 13:02:03', '', 71, '', '', '', '', 0),
(7, 'leba', 'c', '', '', 'NEW', 'Benzene', '', '', '', 89, 'Fixed', '', 33, ' sdfsdf ', 'For Rent', 'ACTIV', '2021-12-16 12:19:24', '', 73, '', '', '', '', 0),
(8, 'ooooooooooo', 'Choose...', '', '', 'Cho', 'Choose...', '', '', '', 89, 'Choose...', '../uploads/carPostsPhoto/ad16404DSC_0720.jpg', 0, ' vvvvvvvvvvvvvvvvv ', 'Choose...', 'ACTIV', '2021-12-17 15:02:21', '', 73, '', '', '', '', 0),
(9, 'TOYOTA Vitz new', 'zz', '', '', 'NEW', 'Choose...', '', '', '', 89, 'Choose...', '', 0, '  vvvvvvvvvv  ', 'Choose...', 'ACTIV', '2021-12-17 15:05:03', '', 73, '', '', '', '', 0),
(10, 'edited', 'c', '', '', 'NEW', 'Benzene', '', '', '', 89, 'Fixed', '', 12, '', 'For Rent', 'ACTIV', '2021-12-17 15:16:54', '', 81, '', '', '', '', 0),
(11, 'zxzxzx', 'zz', '', '', 'NEW', 'Benzene', '', '', '', 89, 'Negotiatable', '../uploads/carPostsPhoto/ad7706Prime bridge_Logo-07.png', 1212, 'zxzxzxzx', 'For Sell', 'ACTIV', '2021-12-17 15:18:26', '', 71, '', '', '', '', 0),
(12, 'SAMSUNGccccccccccccccc', 'nigga', 'Broker', '', 'NEW', 'Benzene', 'manual', 'z', 'z', 89, 'Fixed', '', 1, 'z', 'For Rent', 'ACTIV', '2021-12-22 00:44:31', '', 70, '', '', '', '', 0),
(13, 'SAMSUNG', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', 'asfdsfda', 'asfdasfd', 89, 'Choose...', '', 3, 'sfdsfd', 'Choose...', 'ACTIV', '2021-12-22 02:54:28', '', 72, '', '', '', '', 0),
(14, '', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '../uploads/CarPostsPhoto/fd28715aaa43d52f02e9bc7767e7b569.jpg,../uploa', 0, '', 'Choose...', 'ACTIV', '2021-12-23 10:42:54', '', 70, '', '', '', '', 0),
(15, 'vnbn', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '', 0, '  ', 'Choose...', 'ACTIV', '2021-12-26 09:37:34', '', 71, '', '', '', '', 0),
(16, 'pppppppppppp', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '', 0, '  ', 'Choose...', 'ACTIV', '2021-12-26 09:53:22', '', 70, '', '', '', '', 0),
(17, 'vm', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '', 0, '', 'Choose...', 'ACTIV', '2021-12-26 10:12:39', '', 71, '', '', '', '', 0),
(18, 'TOYOTA Vitz', 'TOYOTA', 'Broker', '', 'NEW', 'Benzene', 'manual', '3435', 'sgdf', 89, 'Negotiatable', '../uploads/CarPostsPhoto/395fc9ffff76d13b18abbf4f57845b53.png,../uploads/CarPostsPhoto/ba120e6908b1414f99eb6abd56d1b6d5.png,../uploads/CarPostsPhoto/8233a2fd586c2aa42a9fee744a7384ee.png', 35, 'sdf', 'For Rent', 'ACTIV', '2021-12-29 06:47:25', '', 73, '', '', '', '', 0),
(22, 'edited', 'Choose...', 'Owner', '', 'Cho', 'Choose...', 'automatic', '', '', 89, 'Choose...', '/uploads/CarPostsPhoto/7622804a9ba8c408f27b1aed0f00c5a5.png,/uploads/CarPostsPhoto/da9b0767b1f6e18ba72279e13a1b5fd5.png', 0, '', 'Choose...', 'ACTIV', '2021-12-30 12:25:36', '', 72, '', '', '', '', 0),
(26, 'TOYOTA Vitzcoooooooooooooooppp`````11212', 'TOYOTA', 'Owner Or B', '', 'OLD', 'fule Type', 'Transmission', 'XCV1111111111111', 'XVCqw11111111111', 158, 'Negotiatable', './uploads/CarPostsPhoto/3f4798a326ea1e6061d31682314c6d0c.png,./uploads/CarPostsPhoto/2f27f1b637e72d75d1acfa4c672a2a97.png,./uploads/CarPostsPhoto/ad0f956b60c03a585be98d06eec712a1.png', 2147483647, '           wwwwwwwwwwwwwwwwwwwwwwwwww     ', 'Rent or sell', 'ACTIV', '2022-01-02 13:07:51', '', 34, '', '', '', '', 0),
(29, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/e4fb4a2fb09fdac86fa7bbacebff9d3f.png,./uploads/CarPostsPhoto/a2cc07424cc6163b23e38a415d54936c.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:12:04', '', 0, '', '', '', '', 0),
(30, 'TOYOTA Vitz', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/3e0548b56ecca4eb89099fb1c3bb85b0.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:15:06', '', 1, '', '', '', '', 0),
(31, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/d34231c5cbf5cfb6c355651f045a529f.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:17:03', '', 3, '', '', '', '', 0),
(32, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/b1441b01a3169b04977d07609d83241d.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:21:17', '', 0, '', '', '', '', 0),
(33, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/e4771d25a1832ca3f6611e8a7aafbd20.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:22:22', '', 0, '', '', '', '', 0),
(34, 'sadf', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/38057ec80859122f18c1103ddace66e8.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-05 12:26:37', '', 0, '', '', '', '', 0),
(35, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/d20d62deef65d567b8b88ddb25668eaa.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:27:07', '', 0, '', '', '', '', 0),
(36, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/473881e5685061e1ae10b56860b3f2e6.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-05 12:31:17', '', 0, '', 'Private', 'Car Only', 'GG', 0),
(37, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/897981335c21e264531dbff7eefb5294.png', 0, '', 'For Rent', 'ACTIV', '2022-01-05 12:31:59', '', 0, '', 'Private', 'With Driver', 'GG', 0),
(38, 'esti', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/1e5430e3d0d74257b601fd16831a6e5c.jpg', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:47:33', '', 1, '', ' ', ' ', ' ', 0),
(39, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/be809328b6850667aa64389601acd0eb.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:49:11', '', 0, '', ' ', ' ', ' ', 0),
(40, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/45fa33acdcedf5672f8781db2dbb06db.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:50:41', '', 0, '', ' ', ' ', ' ', 0),
(41, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/6a8e7f03abaa3ea0eff99d4c5aa2289a.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:53:00', '', 0, '', ' ', ' ', ' ', 0),
(42, '', 'Type', 'Owner Or B', '', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/ca660ed3a8f91c7ea6040c9c48202908.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 18:54:20', '', 0, '', ' ', ' ', ' ', 0),
(45, '', 'Type', 'Owner Or B', 'Aksum', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/fe27d84f1422e1ff130f8244df6aa98e.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 19:05:28', '', 0, '', ' ', ' ', ' ', 0),
(46, '', 'Type', 'Owner Or B', 'Mekele', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/017fb781b127caed0cf76e1a3e9adca6.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 19:06:58', '', 0, '', ' ', ' ', ' ', 0),
(47, 'test', 'OTHER', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/922fda3d63b24dc697c25d1e40263d32.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 21:58:10', '', 0, '', ' ', ' ', ' ', 0),
(48, 'gggg', 'ISUZU', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/5884ec87e39941d46d23525ca81ad3a0.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 21:59:28', '', 2, '', ' ', ' ', ' ', 0),
(49, 'fff', ' ', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/3465e7a9d1c9dabe77177a9165c01f30.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 21:59:37', '', 1, '', ' ', ' ', ' ', 0),
(50, 'vvgg', 'ISUZU', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/20eafb61a9d69bb5e7a521b67ecc6b2c.png', 0, '', 'Rent or sell', 'ACTIV', '2022-01-09 22:00:27', '', 0, '', ' ', ' ', ' ', 0),
(51, 'car post xzx', ' ', 'Owner Or B', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/eb48d8d1a2e253e2a4777277e83020c1.jpg', 0, '         x       ', 'Rent or sell', 'ACTIV', '2022-01-11 07:17:27', '', 3, '', ' ', ' ', ' ', 0),
(52, 'for rent test car ya b', ' ', 'Owner Or B', 'Addis Ababa', 'OLD', 'fule Type', 'Transmission', '', '', 158, 'Price type', './uploads/CarPostsPhoto/cee42ce5698d971be63dd16e7ac0e5d7.png', 0, '    aaa  ', 'For Rent', 'ACTIV', '2022-01-11 08:02:11', '', 4, '', 'Private', 'Car Only', 'nigga', 0),
(54, 'photo', ' ', 'Broker', 'Asela', 'NEW', 'Benzene', 'manual', 'sfdf', 'sdf', 159, 'Fixed', './uploads/CarPostsPhoto/1e1b55bea57dee85ee5778d7071a5d29.jpg', 22, 'sadfas', 'For Rent', 'ACTIV', '2022-01-17 19:20:44', '', 21, '', ' ', ' ', ' ', 0),
(55, 'TOYOTA Vitz', 'OTHER', 'Owner', 'Ambo', 'NEW', 'Benzene', 'Transmission', '', '', 158, 'Negotiatable', './uploads/CarPostsPhoto/273f031c31d4333ab8628323ab822ce2.jpg,./uploads/CarPostsPhoto/e4d18bee046988573bae450bc0410ad8.png,./uploads/CarPostsPhoto/c80b20318a14b35d9008380dd05a759a.png', 23, 'afsd', 'For Sell', 'ACTIV', '2022-01-20 08:46:51', '', 36, ',158', ' ', ' ', ' ', 0),
(56, '', 'OTHER', 'Owner', 'Addis Ababa', 'NEW', 'Benzene', 'automatic', '3435', 'dfg', 158, 'Fixed', './uploads/CarPostsPhoto/77d86d9c63913a57cfa049af96748017.png,./uploads/CarPostsPhoto/e9b643abad7a4f7f1710a1b1c12d0818.png', 23, 'adfs', 'For Sell', 'ACTIV', '2022-01-20 08:48:27', '', 32, '', ' ', ' ', ' ', 0),
(57, 'car for sell', 'Toyota', 'Broker', 'Deri Dewa', 'New', 'Diesel', 'Transmission', '', '', 158, 'Fixed', './uploads/CarPostsPhoto/1a951bd734565a71d198a6c9d1148bd4.png,./uploads/CarPostsPhoto/b2fa4f1b9d741cc0bcf85f97ed42a4b3.png', 23, 'sdfa', 'For Sell', 'ACTIV', '2022-01-20 08:49:37', '', 22, '', ' ', ' ', ' ', 0),
(58, 'yemisht mekina edited', ' ', 'Broker', 'Addis Ababa', 'New', 'fule Type', 'Transmission', '', '', 158, 'Fixed', './uploads/CarPostsPhoto/7c380e83fa8d54ef260e65eb720200db.jpg,./uploads/CarPostsPhoto/3d1552f9a3cb55a768e6936151a4b8ac.png,./uploads/CarPostsPhoto/8370159cb999fdc6bdfad99fd670aa22.png', 0, ' this is the discription that the user enters  ', 'For Rent', 'ACTIV', '2022-01-21 12:39:39', '', 4, ',158', 'Private Company', 'With Driver', '', 0),
(60, 'jaguar yabede taxi', 'Jaguar Taxi', 'Owner', 'Addis Ababa', '2000', '', 'Transmission', '3255673', 'Very Good', 165, 'Price type', './uploads/CarPostsPhoto/53edc0ffe51fc1cd523a5bacef96e36c.jpg,./uploads/CarPostsPhoto/d9a669d707e20206976546a8c6f607de.jpg,./uploads/CarPostsPhoto/5a76b731f90314c03cb608ed59fa66b5.jpg', 500000, ' its the description of the taxi  ', 'For Rent', 'ACTIV', '2022-02-09 10:47:15', '', 1, '', '', 'Car Only', '  ', 0),
(61, 'bitch car', 'Model', 'Broker', 'Addis Ababa', 'Yea ', '', 'Transmission', '', ' ', 165, 'Price type', './uploads/CarPostsPhoto/3224d2570373bfd8b9a4939d2215898e.jpg', 0, '  ', 'Broker', 'ACTIV', '2022-02-09 10:51:03', '', 2, '', ' ', ' ', ' ', 0),
(62, 'mom', 'BMW', 'Owner', 'Bahari Dar', '2000', 'Diesel', 'manual', '222', 'Slightly Good', 167, 'Negotiatable', './uploads/CarPostsPhoto/1b53d06a00ff1b56c65e92e79932cee0.jpg', 1231213, 'momom', 'For Rent', 'ACTIV', '2022-02-14 14:40:21', '', 7, '', 'Govormental Offices', 'With Driver', 'mommmm', 0);

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
(6, 'TOYOTA Vitz', '/uploads/charityPhoto/353100b8ca838971ba6ce076bbe33c2f.png', '', '', 0, 89, '2021-12-30 12:28:20', 'ACTIVE', '', 0, '158'),
(7, '', './uploads/charityPhoto/da00d9b772cfa41457be38d4abff4d27.png', '', '', 0, 89, '2021-12-30 12:28:52', 'ACTIVE', '', 0, ''),
(8, '', '../uploads/charityPhoto/02bf242f31a2c2bac3d1eef1c4e20095.png,../uploads/charityPhoto/f8d81ff68952672712ad1b56edb89786.png', '', '', 0, 89, '2021-12-30 12:44:28', 'ACTIVE', '', 1, '0'),
(10, 'charity post test x', './uploads/charityPhoto/dbce27e80a4edaf6da8aef311adf0bee.jpg', 'X', 'Harar', 931575704, 158, '2022-01-12 07:17:35', 'ACTIVE', 'EDITED', 6, ''),
(11, 'testing charity', './uploads/charityPhoto/d8e65c6f983888b0d8ba4af9292e2071.jpg', 'ds', 'Addis Ababa', 931575704, 166, '2022-01-26 08:26:32', 'ACTIVE', '', 8, ''),
(12, 'wiz charity z', './uploads/charityPhoto/cb832e129e0cda82677b9b72a63b6881.jpg', 'this is the details of the charity', 'Ambo', 98754353, 165, '2022-02-07 09:11:52', 'ACTIVE', 'EDITED', 14, ''),
(13, '', './uploads/charityPhoto/e121dd218a0b2d6d6d29bea484635dc4.jpg', '', 'Addis Ababa', 931575704, 166, '2022-02-23 10:07:02', 'ACTIVE', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
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
  `view` int(11) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`id`, `type`, `status`, `postStatus`, `postedDate`, `posterId`, `title`, `address`, `price`, `info`, `photoPath1`, `ram`, `processor`, `size`, `storage`, `core`, `fav`, `edited`, `view`, `phone`) VALUES
(9, 'Computer Laptop', 'OLD', 'ACTIVE', '2021-12-22 02:23:06', 89, 'test', 'gelan condominyem', 0, '`electronics`', '../uploads/electronicsPhoto/elc58071Prime bridge_Logo-11.png', '34broooooo', 'asfdbroooooo yo', '34', 'broooooo you winn', 'broooooo y', ',159', '', 68, 0),
(10, 'Choose...', 'NEW', 'ACTIVE', '2021-12-23 10:40:10', 89, '', '', 0, '', '', ' ', ' ', ' ', ' ', ' ', '', '', 2, 0),
(12, 'Choose...', 'NEW', 'ACTIVE', '2021-12-23 10:40:49', 89, '', '', 0, '', '', ' ', ' ', ' ', ' ', ' ', '', '', 0, 0),
(13, 'Choose...', 'NEW', 'ACTIVE', '2021-12-23 10:42:00', 89, '', '', 0, '', '../uploads/CarPostsPhoto/2a7588f257e189546eddd4a4ce66d182.jpg,../uploa', ' ', ' ', ' ', ' ', ' ', ',159', '', 0, 0),
(14, 'Choose...', 'NEW', 'ACTIVE', '2021-12-24 07:31:40', 89, '', '', 0, '', '../uploads/CarPostsPhoto/f17a6f9c664dc55775808d570e32c508.jpg,../uploads/CarPostsPhoto/3e715e8fce38f7e55adbe4fa379a4763.png,../uploads/CarPostsPhoto/df8d41fa1535657b67e0798d5ca8093e.jpg', ' ', ' ', ' ', ' ', ' ', ',159', '', 0, 0),
(15, 'Choose...', 'NEW', 'ACTIVE', '2021-12-24 09:08:04', 89, '', '', 0, '', '', ' ', ' ', ' ', ' ', ' ', ',159', '', 1, 0),
(16, 'Choose...', 'NEW', 'ACTIVE', '2021-12-24 20:37:36', 89, 'file test 3', '', 0, '', '', ' ', ' ', ' ', ' ', ' ', '', '', 1, 0),
(17, 'Choose...', 'NEW', 'ACTIVE', '2021-12-26 09:36:29', 89, 'bn', '', 0, '', '../uploads/CarPostsPhoto/344da1eb15afcc94a5e602c12d678fd3.png,../uploads/CarPostsPhoto/ec356de066d98ab0760829b869304a47.png', ' ', ' ', ' ', ' ', ' ', '', '', 1, 0),
(19, 'Choose...', 'NEW', 'ACTIVE', '2021-12-30 13:33:54', 89, 'test', '', 0, '', '../uploads/CarPostsPhoto/371669ba70f1359fa5128bfefc1ea354.png,../uploads/CarPostsPhoto/df98f5ee63b3549eb154dcb14fd2b55b.png', ' ', ' ', ' ', ' ', ' ', '', '', 2, 0),
(20, 'Choose...', 'NEW', 'ACTIVE', '2021-12-30 13:36:35', 89, '', '', 0, '', '/uploads/CarPostsPhoto/d214ab4bc60ce9662447c90357faf3ca.png,/uploads/CarPostsPhoto/82972ea51adbc3787abea9a7d9928003.png', ' ', ' ', ' ', ' ', ' ', ',159', '', 0, 0),
(21, 'Electronics Typ', 'NEW', 'ACTIVE', '2022-01-09 19:42:09', 158, '', 'Aksum', 0, '', './uploads/CarPostsPhoto/82f438d459c83048e27394ac2278ed66.png', ' ', ' ', ' ', ' ', ' ', '', '', 5, 0),
(22, ' ', 'NEW', 'ACTIVE', '2022-01-10 09:26:20', 158, 'vvvvvvvvv123', 'Addis Ababa', 0, '', './uploads/CarPostsPhoto/06b66be7510ada6453a20f57b5d39758.png', ' ', ' ', ' ', ' ', ' ', '', '', 8, 0),
(23, ' ', 'NEW', 'ACTIVE', '2022-01-10 09:27:45', 158, 'eski sira', 'Addis Ababa', 0, '', './uploads/CarPostsPhoto/2cbd7060c9c726cdf2a2104cb7601b1a.png,./uploads/CarPostsPhoto/d3220a980a62bde93c96e0e224d1e9cb.png', ' ', ' ', ' ', ' ', ' ', '', '', 5, 0),
(25, 'Computer and La', 'NEW', 'ACTIVE', '2022-01-11 15:01:09', 158, 'electronics x', 'Nekemit', 45, 'asfdafs', './uploads/electronicsPhoto/e38975a5825d3d6f155237628ecaa0de.png,./uploads/electronicsPhoto/4d577c41f0d9d462727017f95565472f.png', '34', 'core i 5', '34', '340', '3', ',158', 'YES', 6, 0),
(26, 'Tv', 'OLD', 'ACTIVE', '2022-01-20 10:12:56', 158, 'Speaker', 'Addis Ababa', 500, 'adfs', './uploads/CarPostsPhoto/e32a3507112b7345f4210ff30c90b4fb.png,./uploads/CarPostsPhoto/2905ab6da92e9af607687a2952e9d66b.png', ' ', ' ', ' ', ' ', ' ', ',158,158,158', '', 18, 0),
(27, 'Computer and Laptop', 'NEW', 'ACTIVE', '2022-01-24 12:49:18', 166, 'my Laptop', 'Addis Ababa', 15000, 'wht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht herer', './uploads/electronicsPhoto/99ef07123cf8a323bb1d40a98b0cf308.jpg', '6', 'core i 5', '16', '500', '3', '', 'YES', 10, 0),
(28, 'Computer and Laptop', 'OLD', 'ACTIVE', '2022-01-25 08:50:32', 158, 'HP Laptop', 'Addis Ababa', 16000, 'be tiru condition lay yale arif laptop', './uploads/CarPostsPhoto/7b77f4dc1bdb996bd499553b5baef453.png,./uploads/CarPostsPhoto/bc7b6cce797653ef698220fce34785c3.png', '8', 'amd', '17', '500', 'none', ',166', 'YES', 22, 0),
(29, 'Electronics Category', 'NEW', 'ACTIVE', '2022-02-07 10:39:03', 165, 'asdf', 'Addis Ababa', 0, '', './uploads/CarPostsPhoto/220f2e284fb3c63400cc02de2d050514.png,./uploads/CarPostsPhoto/5dfbfa831183ac90ff934b8d757ab895.png', ' ', ' ', ' ', ' ', ' ', '', '', 13, 0),
(30, 'Computer and Laptop', 'MED', 'ACTIVE', '2022-02-07 10:41:08', 165, 'Lenavo laptop wiz', 'Addis Ababa', 20000, 'please buy this laptop', './uploads/electronicsPhoto/012de242cdeef169328f31a453cfa1af.jpg,./uploads/electronicsPhoto/7d16c0e4f752e3fb015dc01335dbe8bd.jpg', 's', 's', '34', 's', 's', '', 'YES', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `google_in`
--

CREATE TABLE `google_in` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `fav` longtext NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotelhouse`
--

INSERT INTO `hotelhouse` (`id`, `name`, `sex`, `age`, `religion`, `field`, `address`, `type`, `price`, `experience`, `bidingPerson`, `currentAddress`, `agentInfo`, `photoPath1`, `posterId`, `edited`, `postedDate`, `hotelOrHouse`, `view`, `fav`, `phone`) VALUES
(1, 'carCategory', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'NO', ' ', ' gfd', '../uploads/homeWorker/6a6202eb48d88a927e54f213020b9a8b.png', 89, 'EDITED', '2021-12-24 13:50:42', 'HOUSE', 1, '', 0),
(2, 'bitch please', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '  ', '  ', '../uploads/homeWorker/c1f885bd35b38683124479dc36e047ff.png', 89, 'EDITED', '2021-12-24 14:27:55', 'HOTEL', 0, '', 0),
(3, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', 'xcv', '', 89, '', '2021-12-24 14:30:04', '', 0, '', 0),
(4, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', '', '', 89, '', '2021-12-24 14:30:48', 'HOTEL', 0, '', 0),
(5, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', '', '', 89, '', '2021-12-24 14:31:53', '', 0, '', 0),
(6, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', '', '', 89, '', '2021-12-24 14:32:17', 'HOTEL', 0, '', 0),
(7, '', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'YES', '', 'asdf', '../uploads/homeWorker/57247fbf52554539899aaf350b91242e.png', 89, '', '2021-12-24 14:33:37', '', 0, '', 0),
(8, 'bitch', 'Choose.', 0, ' ', ' ', '', 'Choose...', 0, '', 'NO', ' ', ' cvxdg', '', 89, 'EDITED', '2021-12-24 14:36:43', 'HOUSE', 0, '', 0),
(9, 'Fikir Getahun', 'Male', 34, ' ', ' ', 'gelan condominy', 'Choose...', 45, 'adfs', 'NO', 'gelan condominyem', 'fads', '../uploads/homeWorker/4cff9211bb954122ffd241bcb0359fed.png', 89, '', '2021-12-24 14:40:48', 'HOUSE', 0, '', 0),
(10, 'Bethelhem Mesfin Legesse', 'Choose.', 0, ' ', '', 'asfdsdf', 'Choose...', 0, '', 'YES', 'asfdsdf', '', '../uploads/homeWorker/cf991cf63d26e8640bee9542030cf656.png', 89, '', '2021-12-24 14:55:36', 'HOTEL', 1, '', 0),
(11, 'Bethelhem Mesfin Legesse', 'Choose.', 345, '34', ' ', 'asfdsdf', 'Choose...', 345, 'rtw', 'YES', 'asfdsdf', '', '../uploads/homeWorker/fae9396bed2f90321e08ca72688c2ed5.jpg', 89, '', '2021-12-26 13:24:29', 'HOUSE', 0, '', 0),
(15, 'HOTEL POST', 'Female', 0, ' ', ' ', 'Amboxx', 'Full Day', 0, '', 'NO', '   ', '   df', './uploads/homeWorker/42b986231d731130bcf176be86259c4d.png', 158, 'EDITED', '2022-01-12 08:41:58', 'HOTEL', 2, '', 0),
(16, 'house keeper testxxx', 'Choose.', 2, 'dssd', ' ', 'Welkit', '<br />\r\n<b>Noti', 45, 'x', 'NO', ' ', ' x', './uploads/homeWorker/664140e3181abeb3fc9a813947dc61bf.png', 158, 'EDITED', '2022-01-12 08:58:05', 'HOUSE', 0, '', 0),
(17, 'adcategory', 'Gender', 0, ' ', '', 'Addis Ababa', 'Work Type', 0, '', 'YES', ' Addis Ababa', ' sd', './uploads/homeWorker/58698469c77536f55be88e5d955d0808.png', 165, 'EDITED', '2022-02-07 08:46:29', 'HOTEL', 1, '', 0),
(18, 'Gemuchis Gelana ', 'Male', 34, 'Orthodox', ' ', 'Addis Ababa', 'Full Day', 5000, 'I HAVE GOOD ', 'YES', '    Addis Ababa', '    sdf', './uploads/homeWorker/2ef0817ffacfc403d5e9b3f3e30bf66b.jpg', 165, 'EDITED', '2022-02-09 12:48:06', 'HOUSE', 1, '', 0),
(19, 'Fikir SFG Getahun cx', 'Male', 34, ' ', 'waiter', 'Addis Ababa', '<br ></option>\r', 34, 'df', 'NO', ' Gonder', ' dfdg', './uploads/homeWorker/9e50a5cf2e3fecbb1b08db685a7cb2bc.jpg', 166, 'EDITED', '2022-02-17 10:31:11', 'HOTEL', 0, '', 0),
(20, 'Fikir Getahun', 'Male', 34, 'Orthodox', ' ', 'Harar', 'Half Day', 34, 'sdf', 'YES', 'Dessie', 'sdf', './uploads/homeWorker/500fb27e0af65602e8dbd5747d6b2817.jpg', 166, '', '2022-02-17 10:42:30', 'HOUSE', 0, '', 0);

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
  `title` varchar(50) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `houseOrLand` varchar(10) DEFAULT NULL,
  `ownerBroker` varchar(15) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `subCity` varchar(20) DEFAULT NULL,
  `wereda` varchar(15) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `bedRoomNo` int(11) DEFAULT 0,
  `bathRoomNo` int(11) DEFAULT 0,
  `cost` int(11) NOT NULL DEFAULT 0,
  `initial` int(11) DEFAULT NULL,
  `fixedOrN` varchar(10) DEFAULT NULL,
  `forRentOrSell` varchar(15) DEFAULT NULL,
  `info` varchar(1000) DEFAULT NULL,
  `posterId` int(11) DEFAULT NULL,
  `photoPath1` text DEFAULT NULL,
  `postedDate` datetime DEFAULT NULL,
  `postStatus` varchar(10) DEFAULT NULL,
  `edited` varchar(10) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `fav` longtext DEFAULT NULL,
  `spArea` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housesell`
--

INSERT INTO `housesell` (`id`, `title`, `type`, `houseOrLand`, `ownerBroker`, `city`, `subCity`, `wereda`, `area`, `bedRoomNo`, `bathRoomNo`, `cost`, `initial`, `fixedOrN`, `forRentOrSell`, `info`, `posterId`, `photoPath1`, `postedDate`, `postStatus`, `edited`, `view`, `fav`, `spArea`, `phone`) VALUES
(1, '', 'ww', ' ', '', 'Choose...', 'Choose...', 'rert', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, ' ', '2021-12-15 11:15:26', 'ACTIVE', '', 2, '', '', 0),
(2, '', 'ww', 'LAND', '', 'women', 'women', 'rert', 0, 123, 0, 0, 0, '123', 'Fixed', 'rwer', 89, '../uploads/houseOrLandPhotos/ad27898big.png', '2021-12-15 11:16:13', 'ACTIVE', '', 1, '', '', 0),
(3, '', 'ww', ' ', '', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, ' ', '2021-12-15 11:18:29', 'ACTIVE', '', 0, '', '', 0),
(4, '', 'ww', ' ', '', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, ' ', '2021-12-15 11:22:13', 'ACTIVE', '', 0, '', '', 0),
(5, '', 'women', 'HOUSE', '', 'men', 'bababaabbaba', 'dsfg', 0, 243, 234, 243, 0, '234', 'Fixed', 'dgdsg', 89, 'E', '2021-12-15 11:23:50', 'ACTIVE', '', 0, '', '', 0),
(6, ' ', 'ww', '  ', ' ', 'Choose...', 'Choose...', ' ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '../uploads/electronicsPhoto/ad80730DSC_0720.jpg', '2021-12-23 18:34:10', 'ACTIVE', 'YES', 0, '', '', 0),
(7, '', 'ww', ' ', '', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, 'E', '2021-12-15 11:34:45', 'ACTIVE', '', 0, '', '', 0),
(8, ' ', 'ww', '  ', ' ', 'Choose...', 'Choose...', ' ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '../uploads/electronicsPhoto/ad64404DSC_0720.jpg', '2021-12-23 18:35:55', 'ACTIVE', 'YES', 0, '', '', 0),
(9, 'work', 'ww', ' ', '', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, ' ', '2021-12-15 12:58:36', 'ACTIVE', '', 1, '', '', 0),
(10, 'TOYOTA Vitz       ', 'women', 'HOUSE     ', '', 'women', 'women', 'xxx       ', 1212, 1212212, 333, 444, 0, 'Negotiatab', 'Negotiatable', 'xxxxx       ', 89, '../uploads/houseOrLandPhotos/ad40800pp.png', '2021-12-15 20:09:10', 'ACTIVE', '', 0, '', '', 0),
(11, 'SAMSUNG ', 'dgdg', 'HOUSE ', ' ', 'Choose...', 'Choose...', '4f ', 0, 0, 0, 0, 0, '34', 'Negotiatable', 'gfgfhf ', 89, '../uploads/houseOrLandPhotos/ad74727big.png', '2021-12-23 13:39:01', 'ACTIVE', 'YES', 0, '', '', 0),
(12, 'miky  ', 'ww', '   ', 'Broker  ', 'Choose...', 'Choose...', '  ', 0, 0, 0, 0, 0, '', 'Choose...', '  ', 89, '../uploads/houseOrLandPhotos/ad87584Screenshot (8).png', '2021-12-23 18:34:51', 'ACTIVE', 'YES', 0, '', '', 0),
(13, ' ', 'ww', '  ', 'Owner ', 'Choose...', 'Choose...', ' ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '../uploads/houseOrLandPhotos/bb2e7c4b6efbef7d7a19e4408f179de5.jpg,../uploads/houseOrLandPhotos/bb2e7c4b6efbef7d7a19e4408f179de5.jpg,../uploads/houseOrLandPhotos/bb2e7c4b6efbef7d7a19e4408f179de5.jpg', '2021-12-23 17:55:08', 'ACTIVE', 'YES', 0, '', '', 0),
(14, 'f Test', 'ww', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-23 18:58:55', 'ACTIVE', '', 0, '', '', 0),
(15, 'qwwwwww', 'ww', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-23 19:32:03', 'ACTIVE', '', 2, '', '', 0),
(16, 'zxzxzxzx ', 'ww', '  ', 'Owner ', 'Choose...', 'Choose...', 'zzzzzzzzzaz ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '../uploads/houseOrLandPhotos/9cbdbed49c502288784591b91963e6d3.png,../uploads/houseOrLandPhotos/f24b62440241e8d2fdc4dba46108fb03.png,../uploads/houseOrLandPhotos/2cc31dc4efddb4c9d72f30f56d42cb52.png', '2021-12-24 07:28:21', 'ACTIVE', 'YES', 0, '', '', 0),
(17, 'xxxxxxxxxxxxxxxxxxxxxxxxx', 'ww', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 07:35:23', 'ACTIVE', '', 0, '', '', 0),
(18, 'aqaqaq  2222', 'ww', '   ', 'Owner  ', 'Choose...', 'Choose...', '  ', 0, 0, 0, 0, 0, '', 'Choose...', '  ', 89, '../uploads/houseOrLandPhotos/90b794be5392f6f5284dcff44f6ed5f2.png,../uploads/houseOrLandPhotos/bb9130b7480e93444be67e1c0c753ae5.png,../uploads/houseOrLandPhotos/3f67fc4827175b77961c004d50d1040a.png', '2021-12-24 20:16:12', 'ACTIVE', 'YES', 0, '', '', 0),
(19, '12w', 'ww', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 10:04:37', 'ACTIVE', '', 0, '', '', 0),
(20, '13', 'ww', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 10:06:42', 'ACTIVE', '', 0, '', '', 0),
(21, '14', 'ww', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 10:07:08', 'ACTIVE', '', 1, '', '', 0),
(22, 'q12q ', 'ww', '  ', 'Owner ', 'Choose...', 'Choose...', ' ', 0, 0, 0, 0, 0, '', 'Choose...', ' ', 89, '', '2021-12-26 09:32:05', 'ACTIVE', 'YES', 0, '', '', 0),
(23, 'q13q', 'ww', ' ', 'Owner', 'Choose...', 'Choose...', '', 0, 0, 0, 0, 0, '', 'Choose...', '', 89, '', '2021-12-24 19:08:23', 'ACTIVE', '', 0, '', '', 0),
(39, 'TOYOTA Vitz', 'ww', 'LAND', 'Owner', 'Address', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '', 158, './uploads/houseOrLandPhotos/ada36344feddc49da3944ceb5d6c5c05.png', '2022-01-05 13:02:28', 'ACTIVE', '', 0, '', '', 0),
(40, '', 'Choose...', 'HOUSE', 'Owner', 'Ambo', 'Choose...', '', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '', 158, './uploads/houseOrLandPhotos/58bd9e0920f1dad2258c4c05dec9d8fa.png', '2022-01-09 20:02:49', 'ACTIVE', '', 0, '', '', 0),
(41, ' ', 'ww', 'LAND ', 'Owner ', 'Arba Minchi', 'Kera', ' ', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', ' ', 159, './uploads/houseOrLandPhotos/c10f731dfa5774372a1fb8c60ff394b7.jpg', '2022-01-10 14:51:01', 'ACTIVE', 'YES', 1, '', '', 0),
(42, 'housexxx  ', ' ', 'LAND', 'Owner   ', '', '   ', '   ', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '  c ', 158, './uploads/houseOrLandPhotos/0e3a45c6c31871759856f638bc6e91df.png', '2022-02-17 09:25:42', 'ACTIVE', 'YES', 0, '', '', 0),
(43, 'THIS IS HOUSE  x ', 'Choose...', 'HOUSE', 'Owner   ', 'Gondar', 'Bole', '   ', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '   sf', 158, './uploads/houseOrLandPhotos/634b07658762e28f9347bf203db5aed0.png,./uploads/houseOrLandPhotos/be6db29760eb99b5d36e1d0b15f08e7b.png,./uploads/houseOrLandPhotos/d20327fa41bfb411128e191b56f2bd09.png', '2022-01-11 14:22:27', 'ACTIVE', 'YES', 0, '', '', 0),
(44, 'land testing x ', 'ww', 'LAND', 'Owner  ', 'Aksum', 'Kera', '  ', 0, 0, 0, 0, 0, 'Negotiatab', 'Choose...', '  x', 158, './uploads/houseOrLandPhotos/255531f5f09adb088c49eeedc320fc7e.jpg,./uploads/houseOrLandPhotos/a4e07b628a39b860a730f8c91e32f45f.png', '2022-01-11 14:30:18', 'ACTIVE', 'YES', 1, '', '', 0),
(45, 'land in land', 'ww', 'LAND', 'Owner', 'Ambo', 'Kera', '', 0, 0, 0, 0, 0, 'Choose...', 'Choose...', '', 158, './uploads/houseOrLandPhotos/25a74cb9009f9a3cc2b73d25d24d0dc7.png', '2022-01-12 08:17:55', 'ACTIVE', '', 0, '', '', 0),
(47, 'new title', 'dgdg', 'HOUSE', 'Broker ', 'Aksum', 'Kera ', '4f ', 0, 0, 0, 4545, 0, 'Choose...', 'For Rent', ' afsd', 158, './uploads/houseOrLandPhotos/d65c784a58d39c6927ea825043d58917.png,./uploads/houseOrLandPhotos/bafa57975c2ec35d294cbbf2b0baabb6.png', '2022-01-19 21:31:44', 'ACTIVE', 'YES', 0, '', '', 0),
(48, 'adsf', 'dgdg', 'HOUSE', 'Owner', 'Addis Ababa', ' ', '', 0, 0, 0, 0, 0, 'Choose...', 'For Rent', '', 158, './uploads/houseOrLandPhotos/1d2b2f96abe63766441337651890830d.png,./uploads/houseOrLandPhotos/3607a21de3b06622f11e36fd271c4709.png', '2022-01-19 21:30:24', 'ACTIVE', '', 0, '', '', 0),
(49, 'real user', 'Choose...', 'HOUSE', 'Owner', 'Addis Ababa', 'Bole', '', 0, 0, 0, 0, 0, 'Negotiatab', 'For Rent', '', 158, './uploads/houseOrLandPhotos/e30777f76ff56aed5c3c359b99f91162.png,./uploads/houseOrLandPhotos/97d4807d8138c7f1b08a2f6bf67e53b6.png', '2022-01-19 21:30:53', 'ACTIVE', '', 1, '', '', 0),
(50, 'next page', 'Choose...', 'HOUSE', 'Owner', 'Addis Ababa', ' ', '', 34, 34, 34, 3333, 0, 'Negotiatab', 'For Rent', 'asfd', 158, './uploads/houseOrLandPhotos/a2286887b879ca6a812bfa5fa43a92f2.png,./uploads/houseOrLandPhotos/a68f8b7c7adb6473e72bf9cb7d8775da.png,./uploads/houseOrLandPhotos/ffb93628ca1b91974dd06a15927b1011.png', '2022-01-19 21:33:07', 'ACTIVE', '', 2, '', '', 0),
(51, 'house seelll', 'Choose...', 'HOUSE', 'Owner', 'Debre Zeyit', 'Kera', '', 33333, 3, 0, 0, 0, 'Choose...', 'For Sell', '', 158, './uploads/houseOrLandPhotos/98ef211d91064d76eb11e09e20981a6f.png,./uploads/houseOrLandPhotos/b2dac20a5be766d18986bf19ed739a25.png', '2022-01-19 21:35:46', 'ACTIVE', '', 7, ',165', '', 0),
(52, 'Miky test', 'apartama', 'HOUSE', 'Owner', 'Addis Ababa', '4 Kilo', 'nifas silk', 23, 23, 2, 300000, 0, 'Negotiatab', 'For Rent', 'this is discription', 158, './uploads/houseOrLandPhotos/7f38558aa8579d80d42ac777a05c8f02.jpg,./uploads/houseOrLandPhotos/4dbd2636e2e423eead9c25e33521a139.png', '2022-01-21 12:57:22', 'ACTIVE', '', 2, '', '', 0),
(53, 'chala house   ', 'Commercial Office', 'HOUSE', 'Owner   ', 'Addis Ababa', 'Bole', '', 0, 0, 0, 0, 0, 'Choose...', 'For Rent', 'adfs   ', 166, './uploads/houseOrLandPhotos/4215cce21005d6f9405d6cfb6912222a.jpg', '2022-02-23 10:01:25', 'ACTIVE', 'YES', 2, '', '', 0),
(54, 'new tester', 'Commercial Office', 'HOUSE', 'Owner', 'Mekele', '4 Kilo', '', 4, 4, 4, 44444444, 0, 'Negotiatab', 'For Sell', 'a sample description', 165, './uploads/houseOrLandPhotos/0f7078176ca642620e3661ad70e48a15.png,./uploads/houseOrLandPhotos/24c20d17350870afb16c7e04dbd4618d.png', '2022-01-25 13:30:42', 'ACTIVE', '', 19, '', '', 0),
(55, 'bet ye haymanot bet', 'Dormitory', 'HOUSE', 'Owner', 'Weldiya', '4 Kilo', '4', 40, 3, 2, 1000000, 0, 'Fixed', 'For Rent', 'ye rase bet new eshi ye kebele minamin aydelem', 158, './uploads/houseOrLandPhotos/90b686963e6254bf59a22614db983cb4.png,./uploads/houseOrLandPhotos/c6eed3398e21952a303d5650629d53da.png,./uploads/houseOrLandPhotos/08cfb307e64c1acfd2435d21b8312c37.png', '2022-01-25 13:52:04', 'ACTIVE', '', 6, '', '', 0),
(56, 'yene meret new  gh  ', ' korokonch', 'LAND', 'Owner    ', 'Addis Ababa', 'null', '5', 2223, 0, 0, 10000000, 0, 'Negotiatab', 'For Sell', 'sdaf asdf dsfda    ', 165, './uploads/houseOrLandPhotos/bcd6b43735defe7b594af32fdf4a95a4.jpg,./uploads/houseOrLandPhotos/9848be42fc5006114a75ccfc6740209e.jpg', '2022-02-18 07:11:15', 'ACTIVE', 'YES', 1, '', ' ', 0),
(57, 'yenesu meret', ' ', 'LAND', 'Owner', 'Addis Ababa', '4 Kilo', '4', 452435, 0, 0, 40066788, 0, 'Fixed', 'For Sell', 'this is my discription of the page', 165, './uploads/houseOrLandPhotos/20771ff21d967b577571901442f73271.jpg,./uploads/houseOrLandPhotos/55fcc29b7aa3557652e5d24f4ec08128.jpg', '2022-02-09 11:17:08', 'ACTIVE', '', 1, '', '', 0),
(58, 'bole lay ', ' ', 'LAND', 'Owner', 'Addis Ababa', 'Bole', '4', 459348, 0, 0, 1000000, 0, 'Negotiatab', 'For Rent', 'this is best land', 165, './uploads/houseOrLandPhotos/526e7f68abb8b7f061342b4eda0c25eb.jpg,./uploads/houseOrLandPhotos/85e2ba1dba4153b88c966ca75038a04c.jpg', '2022-02-09 11:18:47', 'ACTIVE', '', 0, '', '', 0),
(59, 'mirt meret', ' ', 'LAND', 'Owner', 'Addis Ababa', 'Lideta', '4', 353567, 0, 0, 5454, 0, 'Fixed', 'For Rent', 'wow', 165, './uploads/houseOrLandPhotos/9a0713e9bb638ef360ce1736d7d0306a.jpg,./uploads/houseOrLandPhotos/9b26c3f595a59c90e6c72675b1ef8729.jpg', '2022-02-09 11:20:14', 'ACTIVE', '', 0, '', '', 0),
(60, 'mikii9ii', ' ', 'LAND', 'Owner', 'Addis Ababa', 'Arada', '4', 35346, 0, 0, 435345, 0, 'Fixed', 'For Rent', 'wow', 165, './uploads/houseOrLandPhotos/bbfa51f66bdda3c9a9f976a5dbc129f8.jpg,./uploads/houseOrLandPhotos/a5dae028365d811e5038084d83fcf547.jpg', '2022-02-09 11:21:21', 'ACTIVE', '', 0, '', '', 0),
(61, '', 'House Type', 'HOUSE', 'Owner', 'Addis Ababa', 'Sub City', 'Wereda/Kebele', 0, 0, 0, 0, 0, 'Price type', 'For Sell', 'Type Additional Info!  ', 165, './uploads/houseOrLandPhotos/7c13f588767b85733257073200eeaec3.jpg', '2022-02-09 14:57:36', 'ACTIVE', '', 12, '', 'zz', 0),
(62, '', 'Commercial Office', 'HOUSE', 'Owner', 'Addis Ababa', 'Addis Ketema', '8', 47, 3, 2, 500000, 0, 'Fixed', 'For Sell', 'Type Additional Info!   sdfsdf ', 89, './uploads/houseOrLandPhotos/584d8a367b079ec0c8852dc2b9624fd6.jpg,./uploads/houseOrLandPhotos/2a5a303edae8c6defd648002ee830c94.jpg', '2022-02-10 10:06:07', 'ACTIVE', '', 1, '', 'Leba sefer', 0),
(63, 'land mas', ' ', 'LAND', 'Owner', 'Bahari Dar', 'Fasilo', '14', 334453, 0, 0, 353535, 0, 'Fixed', 'For Sell', 'afds', 165, './uploads/houseOrLandPhotos/77e893b06ac3409057a55e69979a2104.jpg,./uploads/houseOrLandPhotos/34ceeb982c40fa0af2107ab4356435f3.jpg', '2022-02-10 12:40:52', 'ACTIVE', '', 9, '', ' ', 0),
(64, '', ' ', 'LAND', 'Owner', 'Nekemit', 'x ', 'Wereda/Kebele', 0, 0, 0, 0, 0, 'Price type', 'For Sell', '', 165, './uploads/houseOrLandPhotos/5ca78e6ad372c214e0c358b94c51a404.jpg', '2022-02-10 13:02:43', 'ACTIVE', '', 2, '', ' ', 0),
(65, '', 'Apartama', 'HOUSE', 'Owner', 'D/Zeyit', 'null', 'Wereda/Kebele', 343, 3, 8, 3434, 0, 'Fixed', 'For Rent', 'Type Additional Info!   safd', 165, './uploads/houseOrLandPhotos/5bd1b160206217db0dfdf8143109a5b1.jpg,./uploads/houseOrLandPhotos/5fc5b6ccc45d53fd026ebddeaedfa5a3.jpg', '2022-02-10 13:04:20', 'ACTIVE', '', 3, '', 'leba sefeer', 0),
(66, '  ', 'Commercial Office', 'HOUSE', 'Owner  ', 'Bahari Dar', 'Fasilo', '12', 4, 2, 1, 445, 0, 'Fixed', 'For Sell', 'Type Additionwerrweal Info!    ', 166, './uploads/houseOrLandPhotos/b39c2b5c994930404e92859711db8bb9.jpg', '2022-02-17 10:55:16', 'ACTIVE', 'YES', 3, '', 'leba sefeer', 0),
(67, 'real user', ' ', 'LAND', 'Broker', 'Jimma', 'null', '16', 4, 0, 0, 4, 0, 'Fixed', 'For Sell', 'f', 166, './uploads/houseOrLandPhotos/81a445c2cca93f18090533d6b6fb116d.jpg', '2022-02-17 10:06:02', 'ACTIVE', '', 0, '', ' ', 0),
(69, '', 'Commercial Office', 'HOUSE', 'Owner', 'Addis Ababa', 'Bole', '03', 34, 3, 3, 34, NULL, 'Price type', 'For Rent', 'Type Additional Info!  ', 166, './uploads/houseOrLandPhotos/dcbec5b39a26f65f6abbdce9f4511393.jpg', '2022-02-28 10:11:14', 'ACTIVE', NULL, 1, NULL, 'sdf', NULL),
(70, 'aa', ' ', 'LAND', 'Owner', 'Bahari Dar', 'Fasilo', '13', 34, 0, 0, 34, NULL, 'Fixed', 'For Rent', 'sdf', 166, './uploads/houseOrLandPhotos/61bf5c8a171cf82a6906b185cdfa6c8f.jpg', '2022-02-28 11:44:50', 'ACTIVE', NULL, NULL, NULL, ' ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(23, 'device-smartphone-futuristic-technology-background-hi-tech-development-coding-concept-new-hud-style-mockup-173059433.jpg', '2021-11-03 13:06:52', '1'),
(24, 'Aksum-Obelisks.jpg', '2021-11-03 13:06:56', '1'),
(25, 'depositphotos_52722631-stock-photo-3d-white-people-new-technologies.jpg', '2021-11-03 13:06:56', '1'),
(26, 'device-smartphone-futuristic-technology-background-hi-tech-development-coding-concept-new-hud-style-mockup-173059433.jpg', '2021-11-03 13:06:56', '1'),
(27, 'Aksum-Obelisks.jpg', '2021-11-03 13:08:56', '1'),
(28, 'depositphotos_52722631-stock-photo-3d-white-people-new-technologies.jpg', '2021-11-03 13:08:56', '1'),
(33, '3.jpg', '2021-11-03 13:20:37', '1'),
(34, '3.jpg', '2021-11-03 13:21:20', '1'),
(35, 'Tiya-UNESCO-world-heritage-site-Ethiopia.jpg', '2021-11-03 13:22:17', '1');

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
(9, 'zx', 'Female', '  asd  ', './uploads/homeTutor/95f162b2b0e4357dfe93c1a5d231c6ee.png', '9-12', 'Horly', 0, 158, 'Debre Zeyit', 931575704, '', 'sad', '2022-01-12 08:30:10', 'EDITED', 2, ''),
(10, 'Mikyas Kebede', 'Male', 'degree in computer engineering ', './uploads/homeTutor/734eff6cf18a2ed0b3583a99f665ad3b.png', '9-10', 'Horly', 100, 158, 'Addis Ababa', 931575704, 'i am agent', 'i am human', '2022-01-21 13:22:54', '', 3, ''),
(11, 'Bethelhem Mesfin Legesse', 'Male', '    asdf', './uploads/homeTutor/b0d91cd5bb3fc00ee04456df8769e269.jpg', '10-11', 'Dayly', 54, 165, 'Gonder', 931575704, 'sdf', 'sdf', '2022-02-07 09:00:14', 'EDITED', 0, ''),
(12, 'Bethelhem Mesfin Legesse', 'Female', 'asdf', './uploads/homeTutor/d1c35523b02c6a3bc8c9960206adc1e3.jpg', '9-10', 'Hourly', 34, 166, 'Harar', 931575704, 'asdf', 'asdfsadf', '2022-02-17 10:22:01', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `mambership`
--

CREATE TABLE `mambership` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `subcity` varchar(30) NOT NULL,
  `wereda` varchar(15) NOT NULL,
  `phone1` int(11) NOT NULL,
  `phone2` int(11) NOT NULL,
  `what_does_initiate` varchar(500) NOT NULL,
  `do_you_have_other_job` varchar(10) NOT NULL,
  `photoPath1` text NOT NULL,
  `broker_before` varchar(10) NOT NULL,
  `business_license` varchar(16) NOT NULL,
  `commission_type` text NOT NULL,
  `question` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `postedDate` datetime NOT NULL,
  `approved` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mambership`
--

INSERT INTO `mambership` (`id`, `name`, `city`, `subcity`, `wereda`, `phone1`, `phone2`, `what_does_initiate`, `do_you_have_other_job`, `photoPath1`, `broker_before`, `business_license`, `commission_type`, `question`, `userId`, `postedDate`, `approved`) VALUES
(1, 'Abebe kebede', 'Addis Ababa', '', ' asfd', 931575704, 0, 'sdf', 'asdf', 'Array', 'YES', 'NO', '0', 'd', 165, '0000-00-00 00:00:00', ''),
(2, 'Abebe kebede', 'Addis Ababa', '', ' asfd', 931575704, 0, 'sdf', 'asdf', '', 'YES', 'NO', '0', 'd', 165, '0000-00-00 00:00:00', 'YES'),
(3, 'Abebe kebede', 'Addis Ababa', '', ' ', 931575704, 0, '', '', '', 'YES', 'NO', '0', 'd', 165, '0000-00-00 00:00:00', 'YES'),
(4, 'Abebe kebede', 'Addis Ababa', '', ' ', 931575704, 0, '', '', '', 'YES', 'NO', '0', 'd', 165, '0000-00-00 00:00:00', 'YES'),
(5, 'Abebe kebede', 'Addis Ababa', '', ' ', 931575704, 0, '', '', '', 'YES', 'NO', '0', '', 165, '0000-00-00 00:00:00', 'YES'),
(6, 'Abebe kebede', 'Addis Ababa', '', ' ', 931575704, 0, '', '', './uploads/members/1addf0a89a6d372d87acb8bf25d4cfaa.png', 'YES', 'NO', '0', '', 165, '0000-00-00 00:00:00', 'YES'),
(7, 'Abebe kebede', 'Addis Ababa', '', ' ', 931575704, 0, '', '', './uploads/members/2badcb4bde75c6352f6dfb0c49d15df1.png', 'YES', 'NO', '0', '', 165, '0000-00-00 00:00:00', 'YES'),
(8, 'Bethelhem Mesfin Legesse', 'Addis Ababa', '', 'asfdsdf', 931575704, 931575704, 'sdg', 'df', './uploads/members/95441daec9755ff052d6a066509abddc.jpg', 'YES', 'NO', 'House_and_land_Selling,NO,House_Renting,Car_Selling,Other_Work', 'dg', 165, '0000-00-00 00:00:00', ''),
(11, 'adfs asfdasfdsaf', 'Hawasa', '', ' 5', 931575704, 931575704, 'gfgf', 'dfdfg', './uploads/members/195be947df26574b116e032faad107f6.jpg', 'YES', 'NO', 'House_and_land_Selling,Real_Estate_Renting_and_Selling,Car_Selling', 'dfgdf', 167, '0000-00-00 00:00:00', 'YES'),
(13, 'agent sew', 'Addis Ababa', '', ' ', 0, 0, '', '', './uploads/members/68387b417c4ff4888f31c758e557e4cd.jpg', 'YES', 'NO', 'House_and_land_Selling,Real_Estate_Renting_and_Selling,Car_Selling', '', 169, '0000-00-00 00:00:00', 'YES');

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
  `postedDate` datetime NOT NULL,
  `seen` varchar(10) NOT NULL,
  `msgOrder` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `tableName`, `postId`, `user1`, `user2`, `msg`, `postedDate`, `seen`, `msgOrder`) VALUES
(1, 'car', 56, 165, 158, 'h', '2022-01-24 07:39:58', '0', ''),
(2, 'car', 57, 165, 158, 'hey how are you', '2022-01-24 07:41:33', '0', ''),
(3, 'car', 57, 165, 158, 'WHAT\r\n', '2022-01-24 07:44:39', '0', ''),
(5, 'car', 55, 166, 158, 'TOYOTA VITZ FUCK U', '2022-01-24 08:18:32', '0', ''),
(6, 'car', 59, 166, 165, 'HET', '2022-01-24 08:20:41', '0', ''),
(7, 'car', 5, 165, 89, 'tenefa', '2022-01-24 09:29:38', '0', ''),
(8, 'car', 59, 165, 166, 'endet neh', '2022-01-24 11:53:44', '0', ''),
(9, 'car', 59, 166, 165, 'alehulik bro endet neh?', '2022-01-24 11:54:11', '0', ''),
(11, 'car', 55, 165, 158, 'leba eshi', '2022-01-24 12:06:30', '0', ''),
(12, 'electronics', 22, 165, 158, 'bitch better have my money', '2022-01-24 12:22:12', '0', ''),
(13, 'electronics', 19, 158, 89, 'jj', '2022-01-24 12:27:55', '0', ''),
(14, 'car', 55, 158, 165, 'ante cccc', '2022-01-24 12:29:30', '0', ''),
(15, 'electronics', 27, 158, 166, 'embiyo', '2022-01-24 12:56:57', '0', ''),
(16, 'housesell', 53, 158, 166, 'chalas house  is', '2022-01-24 12:58:51', '0', ''),
(17, 'ad', 67, 166, 158, 'hey bitch', '2022-01-24 14:42:27', '0', ''),
(18, 'ad', 67, 158, 166, 'eh ante rasik eshi bro', '2022-01-24 14:43:55', '0', ''),
(19, 'ad', 67, 166, 158, 'aman new bro', '2022-01-24 14:44:15', '0', ''),
(20, 'housesell', 53, 158, 166, 'hey\r\n', '2022-01-24 14:46:58', '0', ''),
(21, 'ad', 67, 158, 166, 'test', '2022-01-24 14:47:48', '0', ''),
(22, 'electronics', 27, 166, 158, 'eshiyooo', '2022-01-24 14:50:57', '0', ''),
(23, 'electronics', 26, 165, 158, 'yet sefer nek', '2022-01-25 08:47:56', '0', ''),
(24, 'electronics', 28, 165, 158, 'yet sefer neh?', '2022-01-25 08:59:27', '0', ''),
(25, 'electronics', 28, 158, 165, '4kilo feligek new?', '2022-01-25 09:01:17', '0', ''),
(26, 'electronics', 28, 165, 158, 'wagaw aykenism?', '2022-01-25 09:01:46', '0', ''),
(27, 'car', 57, 166, 158, 'yet sefer nek? wagaw aykenism wy?', '2022-01-25 14:28:17', '0', ''),
(28, 'car', 57, 158, 166, 'ezi sefer negn', '2022-01-25 14:29:07', '0', ''),
(29, 'car', 57, 166, 158, 'ante deneze yet yalkuh?', '2022-01-25 14:29:28', '0', ''),
(30, 'ad', 71, 166, 95, 'g', '2022-01-26 09:08:46', '0', ''),
(31, 'ad', 72, 165, 89, 'hey kenislign', '2022-01-27 11:31:27', '0', ''),
(32, 'ad', 59, 166, 151, 'kinash', '2022-01-29 14:14:08', '0', ''),
(33, 'ad', 74, 165, 89, 'yet sefer nek\r\n', '2022-02-10 09:58:47', '0', ''),
(34, 'electronics', 29, 167, 165, 'sint new', '2022-02-14 14:04:46', '0', ''),
(35, 'ad', 74, 167, 89, 'hello', '2022-02-14 14:10:50', '0', ''),
(36, 'ad', 74, 167, 89, 'http://localhost/shop2/Account.php?message=true&inner=true&tb=ad&reciver=89&post=74', '2022-02-14 14:59:13', '0', ''),
(37, 'car', 5, 89, 165, 'safd', '2022-02-15 08:00:07', '0', ''),
(38, 'car', 5, 89, 2, 'localhost/shop2/Account.php?message=true&inner=true&tb=car&reciver=2&post=5&forwarded=true', '2022-02-16 07:47:32', '0', ''),
(39, 'ad', 74, 166, 89, 'hey wagaw aykenism?', '2022-02-16 07:51:01', '0', ''),
(40, 'ad', 74, 89, 165, 'localhost/shop2/Account.php?message=true&inner=true&tb=ad&reciver=165&post=74&forwarded=true', '2022-02-16 07:52:05', '0', ''),
(41, 'ad', 74, 89, 165, 'anagrwe adis sew felagi nw', '2022-02-16 07:52:24', '0', ''),
(42, 'ad', 76, 166, 89, 'hj', '2022-02-16 08:01:15', '0', ''),
(43, 'ad', 76, 89, 165, 'localhost/shop2/Account.php?message=true&inner=true&tb=ad&reciver=165&post=76&forwarded=true', '2022-02-16 08:02:01', '0', ''),
(44, 'ad', 76, 89, 165, 'addis', '2022-02-16 08:02:08', '0', ''),
(45, 'ad', 79, 166, 89, 'himi', '2022-02-16 08:44:47', '0', ''),
(46, 'ad', 79, 89, 165, 'localhost/shop2/Account.php?message=true&inner=true&tb=ad&reciver=166&post=79', '2022-02-16 08:45:37', '0', ''),
(47, 'ad', 79, 89, 165, 'anagrew', '2022-02-16 08:47:02', '0', ''),
(48, 'ad', 79, 158, 89, 'nom', '2022-02-16 09:07:53', '0', ''),
(49, 'ad', 79, 89, 165, 'localhost/shop2/Account.php?message=true&inner=true&tb=ad&reciver=158&post=79 ', '2022-02-16 09:08:19', '0', ''),
(50, 'ad', 83, 168, 89, 'hey i need this', '2022-02-16 09:48:28', '0', ''),
(51, 'ad', 83, 89, 165, './Account.php?message=true&inner=true&tb=ad&reciver=168&post=83,send ', '2022-02-16 09:51:15', '0', ''),
(52, 'ad', 83, 165, 89, 'hy', '2022-02-16 10:10:37', '0', ''),
(53, 'ad', 85, 166, 89, 'hello', '2022-02-16 10:11:45', '0', ''),
(54, 'ad', 85, 89, 165, './Account.php?message=true&inner=true&tb=ad&reciver=166&post=85,send ', '2022-02-16 10:12:52', '0', ''),
(55, 'ad', 85, 89, 165, 'anaggrew', '2022-02-16 10:13:31', '0', ''),
(56, 'ad', 85, 165, 166, 'hello', '2022-02-16 10:39:45', '1', ''),
(57, 'electronics', 30, 89, 165, 'DFS', '2022-02-16 11:09:07', 'SEEN', ''),
(58, 'electronics', 30, 89, 165, 'helllow ', '2022-02-16 13:20:37', 'SEEN', ''),
(59, 'electronics', 30, 89, 165, 'mindinew esu eh?', '2022-02-16 13:20:48', 'SEEN', ''),
(60, 'electronics', 30, 89, 165, 'aasdf', '2022-02-16 13:56:25', 'SEEN', ''),
(61, 'electronics', 30, 89, 165, 'aasdfasdf', '2022-02-16 13:56:28', 'SEEN', ''),
(62, 'housesell', 63, 89, 165, 'eshis', '2022-02-16 13:58:04', 'SEEN', ''),
(63, 'housesell', 64, 89, 165, 'sadf', '2022-02-16 13:58:30', 'SEEN', ''),
(64, 'housesell', 64, 89, 165, 'sadfasdf', '2022-02-16 14:00:39', 'SEEN', ''),
(65, 'housesell', 64, 89, 165, 'sadfasdfsdafsdaf', '2022-02-16 14:00:43', 'SEEN', ''),
(66, 'ad', 87, 166, 89, 'kinash alew?', '2022-02-17 12:31:29', 'SEEN', ''),
(67, 'ad', 87, 89, 165, './Account.php?message=true&inner=true&tb=ad&reciver=166&post=87,send ', '2022-02-17 12:36:28', 'SEEN', ''),
(68, 'ad', 87, 89, 165, 'yihen sowye anagrew clinent', '2022-02-17 12:36:42', 'SEEN', ''),
(69, 'ad', 89, 170, 89, 'hey ', '2022-02-17 12:43:44', 'SEEN', ''),
(70, 'ad', 89, 89, 170, 'selam new', '2022-02-17 12:51:46', 'new', ''),
(71, 'ad', 89, 89, 169, './Account.php?message=true&inner=true&tb=ad&reciver=170&post=89,send ', '2022-02-17 12:52:12', 'SEEN', ''),
(72, 'ad', 89, 89, 169, 'hhubgvg7v7vb\r\n', '2022-02-17 12:52:31', 'SEEN', ''),
(73, 'ad', 69, 165, 158, 'het\r\n', '2022-02-21 14:21:36', 'new', ''),
(74, 'ad', 70, 166, 165, 'cv', '2022-02-23 10:16:16', 'SEEN', ''),
(75, 'ad', 70, 165, 166, 'k', '2022-02-23 10:17:11', 'SEEN', ''),
(76, 'ad', 67, 166, 158, 'sdf', '2022-02-25 09:31:46', 'new', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `realestate`
--

CREATE TABLE `realestate` (
  `id` int(11) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `subCity` varchar(50) DEFAULT NULL,
  `wereda` int(11) NOT NULL DEFAULT 0,
  `phone` int(11) NOT NULL DEFAULT 0,
  `email` varchar(30) DEFAULT NULL,
  `area` int(11) NOT NULL DEFAULT 0,
  `floor` varchar(5) DEFAULT '0',
  `forRentOrSell` varchar(10) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `priceType` varchar(30) DEFAULT NULL,
  `photoPath1` text DEFAULT NULL,
  `info` text DEFAULT NULL,
  `postedDate` datetime DEFAULT NULL,
  `posterId` int(11) NOT NULL,
  `selectKey` varchar(10) DEFAULT NULL,
  `fav` text NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT 'NOT',
  `payBank` varchar(25) DEFAULT NULL,
  `transId` varchar(50) DEFAULT NULL,
  `filled` varchar(10) NOT NULL DEFAULT 'NOT',
  `pkg` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realestate`
--

INSERT INTO `realestate` (`id`, `type`, `title`, `company`, `city`, `subCity`, `wereda`, `phone`, `email`, `area`, `floor`, `forRentOrSell`, `price`, `priceType`, `photoPath1`, `info`, `postedDate`, `posterId`, `selectKey`, `fav`, `status`, `payBank`, `transId`, `filled`, `pkg`) VALUES
(1, ' ', 'real user', '', ' ', ' ', 0, 931575704, '0', 0, '0', NULL, 0, 'Price type', './uploads/realEstate/1bf583f6dd9a869f5f02b77dd1dbd933.jpg', '', '2022-02-12 08:11:34', 165, NULL, '0', 'NOT', NULL, '0', 'NOT', NULL),
(12, ' ', 'sdfa', 'd', 'Addis Ababa', ' ', 0, 931575704, 'g@fggfg.com', 0, '0', NULL, 34, 'Fixed', './uploads/realEstate/995c5bb1c2a7dd4f468f268b5951f75f.jpg', 'er', '2022-02-25 14:12:05', 166, 'ban', '0', 'NOT', 'CBE', '', 'YES', 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `pumber` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `pumber`, `email`, `pass`, `bdate`, `gender`, `profile`) VALUES
(4, 'kebed', 'kedddd', '0966745122', 'test@test.com', 'c4ca4238a0b923820dcc509a6f75849b', '2021-11-01', '', ''),
(5, 'w', 'w', '0966745109', 'l@test.com', 'c4ca4238a0b923820dcc509a6f75849b', '2021-12-06', 'female', ''),
(6, 'w', 'w', '0966745109', 'l@test.com', 'c4ca4238a0b923820dcc509a6f75849b', '2021-12-06', 'female', ''),
(7, 'w', 'w', '0966745109', 'l@test.com', 'c4ca4238a0b923820dcc509a6f75849b', '2021-12-06', 'female', '');

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
(24, 'new tender', 'bn', '0000-00-00', '0000-00-00', 'Arba Minchi', './uploads/tenderPhotos/45cc999aefe6304fffbb7898e1b23659.png', 0, ' z', 158, '2022-02-17 08:52:50', 'YES', 'ACTIVE', 2, '', ',158', ''),
(25, 'new tender tester', 'guramile', '2022-02-10', '2022-02-26', 'Addis Ababa', './uploads/tenderPhotos/39e46c208982a337e294fa5adc2e4474.jpg', 340000, 'this is the best day of my life period..this is the best day of my life period..this is the best day of my life period..this is the best day of my life period..this is the best day of my life period..this is the best day of my life period..this is the best day of my life period..this is the best day of my life period..this is the best day of my life period..this is the best day of my life period.. ', 166, '2022-02-02 08:40:20', '', 'ACTIVE', 12, '', '', ''),
(26, 'What is this', 'vvvvvvvvvvvvv', '2022-02-23', '2022-02-05', 'Addis Ababa', './uploads/tenderPhotos/54f074d8ff8207de504c0071c794a181.png', 1254124, ' zasdf', 166, '2022-02-17 08:51:45', 'YES', 'ACTIVE', 2, '', '', ''),
(27, 'Adam McKayâ€™s Donâ€™t Look Up captures the stupid', '', '0000-00-00', '0000-00-00', 'Addis Ababa', ' ', 0, ' ', 166, '2022-02-17 08:13:49', '', 'ACTIVE', 7, '+931575704', '', ''),
(28, 'somebody', '', '0000-00-00', '0000-00-00', 'Addis Ababa', './uploads/tenderPhotos/f301db616385d9a47749d463f97d3a55.png', 0, ' z', 166, '2022-02-17 08:49:02', 'YES', 'ACTIVE', 3, '+931575704', '', '');

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
  `phone` int(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `auth` varchar(10) DEFAULT NULL,
  `photoPath1` text DEFAULT NULL,
  `lastLogedIn` datetime DEFAULT NULL,
  `about` varchar(40) DEFAULT NULL,
  `userStatus` varchar(20) DEFAULT NULL,
  `recover` varchar(15) DEFAULT NULL,
  `postedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstName`, `lastName`, `phone`, `email`, `auth`, `photoPath1`, `lastLogedIn`, `about`, `userStatus`, `recover`, `postedDate`) VALUES
(89, 'kenean360', '$2y$10$pu2OlXgOzA.JqVycRpsCpurkIbB9EB5Eul5KEnwU0422ZzHJe8JVW', 'Kenean', 'Tech', 987654321, '', 'ADMIN', './uploads/adminPhoto/a9659big.png', '2022-02-25 11:07:30', '                sdgsgd  ', ' ', '', '0000-00-00 00:00:00'),
(95, 'fonka@gmail.com', '$2y$10$pu2OlXgOzA.JqVycRpsCpurkIbB9EB5Eul5KEnwU0422ZzHJe8JVW', 'Fikir', 'Getahun', 931575704, '', 'EDITOR', '../uploads/adminPhoto/a14131T6B0828.jpg', '2022-01-25 14:03:25', '     i love my self. self love', 'programmer', '', '0000-00-00 00:00:00'),
(147, 'vvv@gmail.com', '1234', 'new', 'new', 11, '', 'ADMIN', '../uploads/adminPhoto/a1259big.png', '2021-12-13 00:00:00', '     new     ', 'new', '', '0000-00-00 00:00:00'),
(149, 'fonka@gmail.com', '1234', 'MIki', 'Belete', 931575704, '', 'Choose...', '../uploads/adminPhoto/3DSC_0720.jpg', '2021-12-17 00:00:00', 'asdfasdf', 'programmer', '', '0000-00-00 00:00:00'),
(152, 'fonkablata@gmail.com', '$2y$10$BMZ2kDyWv0OWpo2e7ImSDuCdKSg51wPjru7VnUCtsyucfw..BwGHm', 'Bethelhem', 'Legesse', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2021-12-29 12:01:27', 'fonkablata@gmail.com', '', '', '0000-00-00 00:00:00'),
(154, 'f@gmail.com', '1234', 'Bethelhem', 'Legesse', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-02 12:26:09', '', '', '', '0000-00-00 00:00:00'),
(155, 'g@gmail.com', '$2y$10$VzTfD64pL.hvhAxOW7B3iO4Bz9xrVJhsnRhxH3yrbrVWBvqQqylp.', 'Fikir', 'Getahun', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-02 12:28:52', '', '', '', '0000-00-00 00:00:00'),
(156, 'q@gmail.com', '$2y$10$FH4SodMSxmeVrsBXu7Nx1ODuZNEPdOcqjhkuEGEQPud1235WXs1Q2', 'Fikir', 'Getahun', 0, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-02 12:32:58', '', '', '', '0000-00-00 00:00:00'),
(157, 'w@gmail.com', '$2y$10$AAZUuYSN2rgO3zx4Mis7MuqAW0rJ5CfFMqqFsFjThkTzBe6zrfF1e', 'Bethelhem', 'Legesse', 931575704, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-02 12:38:07', '', 'BAN', '', '0000-00-00 00:00:00'),
(158, 'z@gmail.com', '$2y$10$RN14wNuuKx9iGMKH9i1SCuddGPsjSjjQVmbo6BO0TWJuKqM7yfVIC', 'Fikir', 'Getahun', 931575704, '', 'USER', './uploads/adminPhoto/a445Prime bridge_Logo-11.png', '2022-01-18 09:17:35', '', ' ', 'xxx', '0000-00-00 00:00:00'),
(159, 'x@gmail.com', '$2y$10$2BHy14ezpUeEmZs3GtCSr.7nFmwTgisWZQXRYg8Vo.fMPotQRmiVC', 'Bethelhem', 'Legesse', 931575704, '', 'Choose...', './uploads/adminPhoto/13bgg.png', '2022-01-12 18:24:09', '', '', '', '0000-00-00 00:00:00'),
(160, 'wee@gmail.com', '$2y$10$EjpBHv7jZfNQl9cdaYj7x.zVy4ZdrFnO8wP0gYpJHjInojU8QELaC', 'Bethelhem', 'Legesse', 931575704, '', 'USER', './uploads/adminPhoto/f5e26ad84070212d253d61a4045cbf09big.png', '2022-01-04 21:46:15', 'wee@gmail.com', '', '', '0000-00-00 00:00:00'),
(163, 'v@gmail.com', '$2y$10$evRYTjoU7SoAAzqniEByY.xfbP6T674v2Db3Xwk0UVpdx7J620thm', 'Fikir', 'Getahun', 2147483647, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-14 08:18:52', 'Adama', '', 'qwe@123', '0000-00-00 00:00:00'),
(164, 'm@gmail.com', '$2y$10$qM58Ml39ZvfjyRhNYzqCrulLEH0jQRghrzKABp2dvCt/lb4oJe8oq', 'Test', 'Name', 0, '', 'ADMIN', './uploads/adminPhoto/5771f68dfa019c8ce3336cec8060a14app.png', '2022-01-18 09:27:01', '', '', 'qwe@123', '0000-00-00 00:00:00'),
(165, 'a@gmail.com', '$2y$10$jWfVhK1oBIDIE5tj7WFABeKZO1pUtWnBHJCdFzg6gfaFdslk3sa82', 'Fikir', 'Getahun', 987574356, '', 'USER', 'FILE_NOT_UPLOADED', '2022-01-22 09:46:18', 'Adama', '', 'xxx', '0000-00-00 00:00:00'),
(166, 'c@gmail.com', '$2y$10$mVEMIwcmTfWJ2AWIWtuNu.pH2dppXilos3U.C3ii.B3mXglGklXSm', 'Chala ', 'Roba', 931575704, '', 'USER', './uploads/adminPhoto/96a41baeaa19f88cb132d6bb288713f1vv.jpg', '2022-01-22 09:47:54', 'Adama', ' ', 'xxx', '0000-00-00 00:00:00'),
(168, 'r@gmail.com', '$2y$10$5aMuRTxuUjL/PcZXUXgpsu1j26y4EdrPOb9w/rYeUOEJRfuburGyS', 'test man', '', 0, '', 'USER', './uploads/adminPhoto/4b49da199677bd0cda985c96e882bf05kenean.png', '2022-02-16 09:47:34', 'Addis Ababa', '', 'xxx', '0000-00-00 00:00:00'),
(169, 'agent@gmail.com', '$2y$10$qe/8o6t70SpcdHq.zhx4e.ybi3U5q9XZJe7VbFGDdPHsAbObr4CgO', 'agent', 'sew', 0, '', 'USER', './uploads/adminPhoto/92726ddd8a540cd8bd28e5e8457d197a266729135_423079819451376_4747553500243777461_n.jpg', '2022-02-17 12:39:29', 'D/Tabor', '', 'xxx', '0000-00-00 00:00:00'),
(170, 'client@gmail.com', '$2y$10$XhmtOhLSbauoy0WyPaCBvOc.wB814o76HErbxeOL0Zcg/KYjdYZYi', 'client', 'sew', 0, '', 'USER', './uploads/adminPhoto/4b0c42a65cad5cab39e5fc8ee132e59b6otvxxzyta681.jpg', '2022-02-17 12:40:05', 'Harar', '', 'xxx', '0000-00-00 00:00:00');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `photo`, `user_type`, `password`, `status`) VALUES
(1, 'Mr.X', 'a@test.com', '0934567890', '', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Active'),
(2, 'Editer.X', 'e@test.com', '0966745109', 'upload/', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'Active'),
(3, 'User.X', 'u@test.com', '0966745109', 'upload/', 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'Active'),
(4, 'kenu45', 'keneansolomon543@gmail.com', '0910289422', '', 'admin', '123456789', 'Active');

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
  `deadLine` date NOT NULL,
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
(4, '\"1\"', '\"7\"', 'asfd oop', '<br /><b>Notice</b>:', '', '', '0000-00-00', 67, 4, '', '2021-12-30 12:21:17', 'YES', '', 0, 0, '', 0, '', '0000-00-00'),
(25, '0', '0', '', 'dgs', '', '', '0000-00-00', 89, 0, '', '0000-00-00 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(30, '0', '0', 'SDF', '', '', 'adsf', '2021-12-15', 89, 0, 'adf', '2021-12-11 00:00:00', '', '', 1, 0, '', 0, '', '0000-00-00'),
(33, '0', '0', 'xxxxxxxx', 'xxxxxxx', '', 'xxxxx', '0000-00-00', 89, 44, 'xxx', '2021-12-11 00:00:00', '', '', 4, 0, '', 0, '', '0000-00-00'),
(34, '0', '0', 'xxxxxxxx', 'xxxxxxx', '', 'xxxxx', '0000-00-00', 89, 44, 'xxx', '2021-12-11 00:00:00', '', '', 1, 0, '', 0, '', '0000-00-00'),
(35, '4', '0', 'uuuuuuuuu', 'uuuuuuu', '', '', '0000-00-00', 33, 44, '', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(36, '4', '2', 'xxxxxxxxx', 'sdfasdf', '', '', '0000-00-00', 1, 3, '', '2021-12-11 00:00:00', '', '', 8, 0, '', 0, '', '0000-00-00'),
(37, '0', '0', 'xxx', 'sdfasdf', '', '', '0000-00-00', 1, 3, '', '2021-12-11 00:00:00', '', '', 2, 0, '', 0, '', '0000-00-00'),
(38, '0', '0', 'ethiopia', '', '', '', '0000-00-00', 3, 0, '', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(39, '0', '0', 'bbbbbbb', 'dgs', '', '', '0000-00-00', 4, 4, '', '2021-12-11 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(42, '0', '0', 'c', '', '', '', '0000-00-00', 89, 0, '', '2021-12-11 00:00:00', '', '', 3, 0, '', 0, '', '0000-00-00'),
(45, 'ds', ' Full Time', 'sdf', 'sdfasdf', '', 'fdgdf', '0000-00-00', 89, 4, 'grf', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(46, 'ds', ' Full Time', 'sdf', 'sdfasdf', '', 'fdgdf', '0000-00-00', 89, 4, 'grf', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(47, 'ds', ' Full Time', 'sdf', 'sdfasdf', '', 'fdgdf', '0000-00-00', 89, 4, 'grf', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(48, 'ds', ' Full Time', 'sdf', 'sdfasdf', '', 'fdgdf', '0000-00-00', 89, 4, 'grf', '2021-12-16 00:00:00', '', '', 2, 0, '', 0, '', '0000-00-00'),
(49, 'Choose...', ' Choose...', '', '', 'Female', '', '0000-00-00', 89, 0, '', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(50, 'Choose...', ' Choose...', '', '', 'Female', '', '0000-00-00', 89, 0, '', '2021-12-16 00:00:00', '', '', 0, 0, '', 0, '', '0000-00-00'),
(62, '\"\"\" Choose...\"\"\"', '\"\"\"Choose...\"\"\"', 'SFDadsf', '', 'Choose', 'sfda', '0000-00-00', 158, 3, 'sadfsdaf', '2022-01-03 07:50:35', 'YES', 'ACTIVE', 0, 931575704, '', 0, '', '0000-00-00'),
(70, 'Choose...', '67', 'SFD', '', 'Choose', '', '0000-00-00', 158, 0, '', '2022-01-05 13:40:49', '', 'ACTIVE', 0, 931575704, '', 0, '', '0000-00-00'),
(71, 'Choose...', 'Choose...', '', '', 'Choose', '', '0000-00-00', 158, 0, '', '2022-01-05 13:43:24', '', 'ACTIVE', 0, 0, '', 80, '', '0000-00-00'),
(72, 'Choose...', 'Choose...', '', '', ' ', 'Address', '2022-01-21', 158, 0, '', '2022-01-05 14:03:50', '', 'ACTIVE', 0, 0, '', 70, 'Negotiatable', '2022-01-06'),
(73, 'fdfds', 'Choose...', 'zaq', '', ' ', 'Addis Ababa', '0000-00-00', 159, 0, '', '2022-01-10 12:37:11', '', 'ACTIVE', 0, 0, '', 0, ' ', '0000-00-00'),
(74, 'dgdg', '\"\"Choose...\"\"', 'job vacancy Winning', '', ' ', 'Addis Ababa', '0000-00-00', 158, 0, '', '2022-01-11 08:42:52', 'YES', 'ACTIVE', 2, 0, '', 222, ' ', '0000-00-00'),
(77, 'Engineering', '1', 'African Union', 'Secretary ', ' ', 'Addis Ababa', '0000-00-00', 166, 5, 'wht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht herer', '2022-02-01 07:52:18', 'YES', 'ACTIVE', 7, 931575704, '', 5000, ' ', '0000-00-00'),
(78, 'ICT', '\"ICT\"', 'Kenean Digital Techn', 'Sowftware Developer', 'Both', 'Addis Ababa', '0000-00-00', 166, 3, 'wht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht herervwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht hererwht the actual is happnineg ritht herer', '2022-02-01 07:45:26', 'YES', 'ACTIVE', 28, 931575704, ',165', 30000, ' ', '0000-00-00'),
(79, 'Job Type', 'Position Type', 'test', '', ' ', 'Addis Ababa', '2022-02-12', 166, 0, '', '2022-02-01 08:53:57', '', 'ACTIVE', 2, 0, '', 0, ' ', '2022-02-11'),
(80, 'Job Type', 'Position Type', 'leba', '', ' ', 'Addis Ababa', '2022-03-10', 166, 0, '', '2022-02-01 08:55:36', '', 'ACTIVE', 3, 0, '', 0, ' ', '2022-02-21'),
(81, 'Job Type', 'Position Type', 'SFD', '', ' ', 'Addis Ababa', '2025-10-29', 166, 0, '', '2022-02-01 08:58:01', '', 'ACTIVE', 4, 931575704, '', 0, ' ', '2024-06-18'),
(82, 'Job Type', 'Position Type', '', '', ' ', 'Addis Ababa', '0000-00-00', 165, 0, '', '2022-02-08 12:18:27', '', 'ACTIVE', 4, 0, '', 0, ' ', '0000-00-00'),
(83, 'Job Type', 'Position Type', 'dgdf', '', ' ', 'Addis Ababa', '0000-00-00', 89, 0, '', '2022-02-15 10:55:19', '', 'ACTIVE', 1, 0, '', 0, ' ', '0000-00-00'),
(84, 'Job Type', 'Position Type', 'dgdf', '', ' ', 'Addis Ababa', '0000-00-00', 89, 0, '', '2022-02-15 10:55:19', '', 'ACTIVE', 0, 0, '', 0, ' ', '0000-00-00'),
(85, 'Job Type', 'Position Type', 'hymi', '', ' ', 'Addis Ababa', '0000-00-00', 166, 0, '', '2022-02-15 12:17:56', '', 'ACTIVE', 0, 0, '', 0, ' ', '0000-00-00'),
(86, 'Job Type', 'Position Type', 'hymi', '', ' ', 'Addis Ababa', '0000-00-00', 166, 0, '', '2022-02-15 12:17:56', '', 'ACTIVE', 0, 0, '', 0, ' ', '0000-00-00');

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
  `fav` longtext NOT NULL,
  `workHour` varchar(20) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `weapon` varchar(5) NOT NULL,
  `bid` varchar(5) NOT NULL,
  `salary` int(11) NOT NULL,
  `info` text NOT NULL,
  `agentInfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zebegna`
--

INSERT INTO `zebegna` (`id`, `name`, `sex`, `age`, `address`, `phone`, `photoPath1`, `workStat`, `postedDate`, `edited`, `posterId`, `view`, `fav`, `workHour`, `experience`, `weapon`, `bid`, `salary`, `info`, `agentInfo`) VALUES
(1, 'carCategory v3', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:05:03', 'EDITED', 2, 0, '', '', '', '', '', 0, '', ''),
(2, 'bithch', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:06:14', 'EDITED', 2, 2, '', '', '', '', '', 0, '', ''),
(3, 'carCategory v3', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:06:52', 'EDITED', 2, 0, '', '', '', '', '', 0, '', ''),
(4, 'carCategory v3', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:07:56', 'EDITED', 2, 0, '', '', '', '', '', 0, '', ''),
(5, 'carCategory v3', 'Choose.', 0, '', 0, '', 'Choose...', '2021-12-27 08:09:19', 'EDITED', 2, 0, '', '', '', '', '', 0, '', ''),
(8, 'zzxxx', 'Male', 3, 'Arba Minchi', 931575704, './uploads/zebegnaPhoto/e4d189a65bf8817d0a279a1b55e2f569.png', 'House', '2022-01-12 08:58:54', 'EDITED', 158, 0, '', '', '', '', '', 0, '', ''),
(9, 'Fikir SFG Getahun', 'Gender', 0, 'Addis Ababa', 0, './uploads/zebegnaPhoto/00b60d76bc29005910a381ad2a198cc2.jpg', 'Work Status', '2022-02-08 13:37:00', 'EDITED', 166, 4, '', '', '', '', '', 0, '', ''),
(10, 'z', 'Gender', 0, 'Addis Ababa', 931575704, './uploads/zebegnaPhoto/a01650678777a3aa898888566dd6d0fb.jpg', 'Work Position', '2022-02-18 08:45:31', 'EDITED', 165, 0, '', '', ' ', '', '', 0, '', '');

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
-- Indexes for table `google_in`
--
ALTER TABLE `google_in`
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
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobhometutor`
--
ALTER TABLE `jobhometutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mambership`
--
ALTER TABLE `mambership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestate`
--
ALTER TABLE `realestate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `adcategory`
--
ALTER TABLE `adcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `carcategory`
--
ALTER TABLE `carcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `charity`
--
ALTER TABLE `charity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `google_in`
--
ALTER TABLE `google_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotelhouse`
--
ALTER TABLE `hotelhouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `housecategory`
--
ALTER TABLE `housecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `housesell`
--
ALTER TABLE `housesell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `jobhometutor`
--
ALTER TABLE `jobhometutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mambership`
--
ALTER TABLE `mambership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `realestate`
--
ALTER TABLE `realestate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `userpost`
--
ALTER TABLE `userpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `vacancycategory`
--
ALTER TABLE `vacancycategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zebegna`
--
ALTER TABLE `zebegna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
