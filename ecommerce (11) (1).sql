-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2021 at 05:35 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `name`, `password`) VALUES
(1, 'mohamed', '13579'),
(2, 'alaa', '97531'),
(4, 'arafat', '123');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `name`, `email`, `phone`, `address`, `password`) VALUES
(1, ' ahmed', 'ahmed@gmail.com', '11386524', 'maadi nasr st. ', '442'),
(4, 'sama', 'sama@gmail.com', '112347327', ' giza dokki st.', '8786'),
(5, ' daniel', 'daniel@gmail.com', '10232164', ' helwan reyad st.', '9788'),
(9, ' samir', 'samir@gmail.com', '129416224', '6 october ', '223'),
(11, ' shahd', 'shahd@gmail.com', '10006425', ' sheikh zayed', '436'),
(12, ' sandy', 'sandy@gmail.com', '1234325', 'elharam st. ', '567'),
(14, 'Ahmed Arafat', 'ahmedxarafat0101@gmail.com', '01013769931', 'Haram', '123');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `name`) VALUES
(1, 'Accounting'),
(2, 'Delivery'),
(3, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `depID` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `name`, `salary`, `depID`, `phone`, `email`) VALUES
(1, 'ahmed  ', 5000, 1, 1002300230, 'ahmed@gmail.com'),
(2, 'malak', 3000, 3, 101230546, 'malak@gmail.com'),
(3, 'yara', 3000, 3, 1000519977, 'yara@gmail.com'),
(4, 'marwan', 4000, 2, 10123673, 'marwan@gmail.com'),
(5, 'andrew', 4000, 2, 1007830888, 'andrew@gmail.com'),
(6, 'sara', 5000, 1, 11267339, 'sara@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `email`, `details`) VALUES
(1, 'shahd@gmail.com', 'The product is perfect'),
(3, 'ahmed@gmail.com', 'delivery was on time');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_customer`, `id_product`, `price`, `payment_method`) VALUES
(6, 14, 7, 30, 'cash'),
(7, 14, 7, 30, 'Visa'),
(8, 14, 7, 30, 'Vodafone Cash'),
(9, 14, 1, 40, 'Visa'),
(10, 14, 3, 30, 'Cash'),
(16, 1, 7, 30, 'visa'),
(17, 1, 13, 30, 'cash'),
(18, 11, 1, 40, 'cash'),
(19, 11, 1, 40, 'cash'),
(20, 14, 1, 40, 'visa'),
(21, 9, 2, 30, 'visa'),
(22, 9, 2, 30, 'visa'),
(23, 9, 2, 30, 'visa'),
(24, 9, 1, 40, 'visa'),
(25, 12, 11, 30, 'visa'),
(26, 12, 22, 40, 'visa'),
(27, 12, 51, 40, 'visa');

-- --------------------------------------------------------

--
-- Table structure for table `partnershipcompany`
--

CREATE TABLE `partnershipcompany` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partnershipcompany`
--

INSERT INTO `partnershipcompany` (`ID`, `name`) VALUES
(1, 'تويا للنشر و التوزيع'),
(2, 'دار دون للنشر و التوزيع'),
(3, 'عصير الكتب للنشر و التوزيع'),
(4, 'دار الشروق للنشر و التوزيع'),
(5, 'دار الرسم بالكلمات للنشر و التوزيع'),
(6, 'دار نهضة مصر للنشر و التوزيع'),
(7, 'اكتب للنشر و التوزيع\r\n'),
(8, 'كيان للنشر و التوزيع');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `image` varchar(4000) NOT NULL,
  `quantity` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `author`, `sectionID`, `companyID`, `image`, `quantity`) VALUES
(1, 'حور', 40, 'محمود بكري', 1, 1, '7or.jpg', '53'),
(2, 'مالك', 30, 'محمود بكري', 1, 5, 'malek.jpg', '80'),
(3, 'نصف ميت', 30, 'حسن الجندي', 2, 7, 'nsf meet.jpg', '70'),
(4, 'ارض زيكولا', 30, 'عمرو عبدالحميد', 3, 3, 'ard zekola.jpg', '44'),
(5, 'اماريتا', 55, 'عمرو عبدالحميد', 3, 3, 'amreta.jpg', '29'),
(6, 'الفيل الازرق', 30, 'احمد مراد', 2, 4, 'elfell alazr2.jpg', '67'),
(7, 'ابتسم فأنت ميت', 30, 'حسن الجندي', 2, 7, 'abtsm fa ant meet.jpg', '40'),
(8, 'سوف أحكي عنك', 60, 'أحمد المهني', 1, 2, 'swf a7ke 3nk.jpg', '36'),
(9, 'عيش اللحظة', 40, 'مصطفي حسني', 8, 1, '3esh ell7za.jpg', '40'),
(10, 'معرض الكتاب', 30, 'عبدالرحمن جاويش', 4, 1, 'm3rd elktab.jpg', '30'),
(11, 'اكتشفت زوجي في الاتوبيس', 30, 'دعاء عبدالرحمن', 8, 4, 'aktshaft zwgey f elotobes.jpg', '57'),
(12, 'تراب الماس', 30, 'احمد مراد', 3, 8, 'trab el mas.jpg', '94'),
(13, 'انستا حياة', 40, 'محمد صادق', 8, 4, 'ansta el7ya.jpg', '25'),
(14, 'هيبتا', 30, 'محمد صادق', 1, 4, 'hebta.jpg', '75'),
(15, 'الوصية', 40, 'حسام هيكل', 8, 2, 'elwseya.jpg', '63'),
(16, 'فاميليا', 30, 'نورهان ابوبكر', 8, 4, 'famelya.jpg', '76'),
(17, 'ان تبقي', 40, 'خولة حمدي', 3, 8, 'an tb2a.jpg', '28'),
(18, 'احتياج', 30, 'محمود بكري', 1, 5, 'a7tyag.jpg', '48'),
(19, 'إلي ما لا نهاية', 60, 'ساندرا سراج', 3, 2, 'ela ma la nhya.jpg', '89'),
(20, 'في قلبي انثي عبرية', 30, 'خولة حمدي', 1, 8, 'f 2lpi ontha 3brya.jpg', '90'),
(21, 'ما وراء الاوهام', 40, 'الفيلسوف الالماني ايريك فروم', 6, 1, 'ma wra2 elawham.jpg', '20'),
(22, 'أثر العلم في المجتمع', 40, 'الفيلسوف البريطاني برتراند راسل', 6, 1, 'ather el 3lm f elmogtma3.jpeg', '35'),
(23, 'فلسفة العلم', 40, 'الفيلسوف الامريكي أليكس روزنبرغ', 6, 1, 'flsafa el3lm.png', '75'),
(24, 'مجلة ميكي', 50, 'Disney', 7, 6, 'mickey.jpg', '86'),
(25, 'ويني', 50, 'Disney', 7, 6, 'weeny.jpg', '24'),
(26, 'مجلة ماجد', 50, 'احمد عمر', 7, 6, 'magala maged.jpg', '37'),
(27, 'اميرات', 50, 'Disney', 7, 6, 'amreta.png', '65'),
(28, 'ارواح و اشباح', 50, 'طه حسين', 2, 8, 'arwa7 washba7.jpg', '97'),
(29, 'الأيام', 50, 'طه حسين', 8, 8, 'alayam.jpg', '39'),
(30, 'بين القصرين', 50, 'نجيب محفوظ', 8, 8, 'ben al2sren.jpg', '46'),
(31, 'السكرية', 50, 'نجيب محفوظ', 8, 8, 'elskrya.jpg', '37'),
(32, 'قصر الشوق', 50, 'نجيب محفوظ', 8, 8, '2sr elshoke.jpg', '47'),
(33, 'الذين هبطوا من السماء', 50, 'أنيس منصور', 4, 8, 'alzen hbto mn elsma2.jpg', '76'),
(34, 'المعذبون في الأرض', 50, 'طه حسين', 4, 8, 'elmo3zbon f elard.jpg', '36'),
(49, 'نادر فوده', 40, 'احمد يونس', 2, 4, 'nader foda.jpg', '28'),
(50, 'نادر فوده ٢', 40, 'احمد يونس', 2, 4, 'nader foda 2.jpg', '47'),
(51, 'نادر فوده ٣ ', 40, 'احمد يونس', 2, 4, 'nader foda 3.webp', '36'),
(52, 'نادر فوده ٤ ', 40, 'احمد يونس', 2, 4, 'nader foda 4.jpg', '57'),
(53, 'نادر فوده ٥ ', 40, 'احمد يونس', 2, 4, 'nader foda 5.jpg', '85'),
(54, 'خبايا', 60, 'احمد يونس', 2, 4, '5baya.jpg', '39'),
(55, 'قواعد جارتين', 40, 'عمرو عبد الحميد', 3, 3, '2wa3d garten.webp', '48'),
(56, 'دقات الشامو ', 40, 'عمرو عبد الحميد', 3, 3, 'd2at elshamo.png', '45'),
(57, 'أمواج أكما', 40, 'عمرو عبد الحميد', 3, 3, 'amwag kma.jpg', '97'),
(58, 'الي الله', 50, 'امير منير', 10, 4, 'ela allah.png', '38'),
(59, 'فاتتني صلاة', 50, 'اسلام جمال', 10, 4, 'fattney sala.jpg', '35'),
(60, 'إذما', 40, 'محمد صادق', 1, 4, 'ezma.jpg', '25');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`ID`, `name`) VALUES
(1, 'رومانسي'),
(2, 'رعب'),
(3, 'خيال'),
(4, 'غموض و تشويق'),
(6, 'فلسفة'),
(7, 'مجلات اطفال'),
(8, 'اجتماعية'),
(10, 'دينية');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `depID` (`depID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `partnershipcompany`
--
ALTER TABLE `partnershipcompany`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `sectionID` (`sectionID`),
  ADD KEY `companyID` (`companyID`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `partnershipcompany`
--
ALTER TABLE `partnershipcompany`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
