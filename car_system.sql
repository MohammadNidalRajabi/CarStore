-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 07:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_UserName` varchar(200) NOT NULL,
  `Admin_password` varchar(200) NOT NULL,
  `Admin_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_UserName`, `Admin_password`, `Admin_Id`) VALUES
('zaid', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `adslink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `adslink`) VALUES
(1, 'adsimg/d1.png'),
(2, 'adsimg/banner10.gif'),
(3, 'adsimg/banner10.gif');

-- --------------------------------------------------------

--
-- Table structure for table `cars_photo`
--

CREATE TABLE `cars_photo` (
  `Photo_Id` int(11) NOT NULL,
  `Photo_Link` varchar(500) NOT NULL,
  `Car_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars_photo`
--

INSERT INTO `cars_photo` (`Photo_Id`, `Photo_Link`, `Car_Id`) VALUES
(49, 'uploads/download (1).jpg', 89),
(50, 'uploads/download (2).jpg', 89),
(51, 'uploads/download.jpg', 89),
(52, 'https://cdn.motor1.com/images/mgl/JmVR6/s1/4x3/2019-audi-r8-onlocation.webp', 90),
(53, 'https://pmdvod-audimedia.akamaized.net/AudiMediaTV/media/s/1765642/audi_media_tv_1829614_thumb.jpg', 90),
(54, 'https://cars.usnews.com/static/images/Auto/izmo/i159614623/2022_kia_telluride_angularfront.jpg', 91),
(58, 'uploads/background.jpeg', 92);

-- --------------------------------------------------------

--
-- Table structure for table `car_post`
--

CREATE TABLE `car_post` (
  `Car_id` int(11) NOT NULL,
  `Car_Name` varchar(300) NOT NULL,
  `Model` varchar(300) NOT NULL,
  `Year` varchar(5) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Fuel_Type` varchar(300) NOT NULL,
  `Accessories` varchar(300) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Engine_Size` varchar(300) NOT NULL,
  `Transmission_Type` varchar(300) NOT NULL,
  `City` varchar(300) NOT NULL,
  `Accepted` int(1) NOT NULL DEFAULT 0,
  `cars_photo` varchar(500) NOT NULL,
  `User_id` int(11) NOT NULL,
  `car_views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_post`
--

INSERT INTO `car_post` (`Car_id`, `Car_Name`, `Model`, `Year`, `Color`, `Fuel_Type`, `Accessories`, `Price`, `Engine_Size`, `Transmission_Type`, `City`, `Accepted`, `cars_photo`, `User_id`, `car_views`) VALUES
(89, 'test', 'test', '2000', 'red', 'gasoline', 'fatht sqf', '2000', '2000', 'gear', 'Jerusalem', 1, '', 15, 24),
(90, 'audie', 'r7', '2016', 'Red', 'petrol', 'android screen', '10000', '4cc', 'autmtic', '', 1, '', 1, 12),
(91, 'kia', 'k8', '2019', 'black', 'autmatic', 'androidscreen', '5000', '46cc', 'aasd', 'hebron', 1, '', 3, 103),
(92, 'bmw', '123', '12312', '123123', 'gasoline', 'android screen', '123123', '456456', 'gear', 'Jerusalem', 0, '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `User_UserName` varchar(300) NOT NULL,
  `User_Password` varchar(300) NOT NULL,
  `User_Email` varchar(300) NOT NULL,
  `User_gender` varchar(20) NOT NULL,
  `User_phone` varchar(20) NOT NULL,
  `User_Fname` varchar(60) NOT NULL,
  `User_Lname` varchar(60) NOT NULL,
  `User_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `User_UserName`, `User_Password`, `User_Email`, `User_gender`, `User_phone`, `User_Fname`, `User_Lname`, `User_address`) VALUES
(1, 'mohammadnedal', 'testteest', 'mohammadnedal@gmail.com', 'male', '050000', 'zaid', 'katbeh', 'hara'),
(2, 'Alhabbad', '159159', 'fku@gmail.com', 'female', '0597235743', 'mohammad', 'rajbe', 'عين سارة، شارع عين خير الدين، الخليل'),
(3, 'Alhabbad', '159159', 'admin@gmail.com', 'female', '0597235743', 'mohammad', 'rajbe', 'عين سارة، شارع عين خير الدين، الخليل'),
(15, 'admin', 'adminpasss', 'admin@g.c', 'male', '05000', 'admin', 'admin', 'hebron'),
(16, 'zaidmk', 'zaidpass', 'zaidkatbeh6@gmail.com', 'male', '+970598365946', 'zaid', 'katbeh', 'hebron');

-- --------------------------------------------------------

--
-- Table structure for table `user_fav`
--

CREATE TABLE `user_fav` (
  `Car_Name` varchar(300) NOT NULL,
  `Model` varchar(300) NOT NULL,
  `Year` varchar(5) NOT NULL,
  `Color` varchar(300) NOT NULL,
  `Fuel_Type` varchar(300) NOT NULL,
  `Range_Price` varchar(300) NOT NULL,
  `Engine_Size` varchar(300) NOT NULL,
  `Transmission_Type` varchar(300) NOT NULL,
  `City` varchar(300) NOT NULL,
  `User_Fav_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_fav`
--

INSERT INTO `user_fav` (`Car_Name`, `Model`, `Year`, `Color`, `Fuel_Type`, `Range_Price`, `Engine_Size`, `Transmission_Type`, `City`, `User_Fav_Id`, `User_Id`) VALUES
('BMW', 'x3', '2019', 'Red', 'electric', '70000', '4celnder4000cc', 'autamtic', 'hara_altahta', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars_photo`
--
ALTER TABLE `cars_photo`
  ADD PRIMARY KEY (`Photo_Id`),
  ADD KEY `Car_Id` (`Car_Id`);

--
-- Indexes for table `car_post`
--
ALTER TABLE `car_post`
  ADD PRIMARY KEY (`Car_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `user_fav`
--
ALTER TABLE `user_fav`
  ADD PRIMARY KEY (`User_Fav_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars_photo`
--
ALTER TABLE `cars_photo`
  MODIFY `Photo_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `car_post`
--
ALTER TABLE `car_post`
  MODIFY `Car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_fav`
--
ALTER TABLE `user_fav`
  MODIFY `User_Fav_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars_photo`
--
ALTER TABLE `cars_photo`
  ADD CONSTRAINT `cars_photo_ibfk_1` FOREIGN KEY (`Car_Id`) REFERENCES `car_post` (`Car_id`);

--
-- Constraints for table `car_post`
--
ALTER TABLE `car_post`
  ADD CONSTRAINT `car_post_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `user_fav`
--
ALTER TABLE `user_fav`
  ADD CONSTRAINT `user_fav_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
