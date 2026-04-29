-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2025 at 12:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_vehicles`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `lastname`, `firstname`, `phone`, `email`, `password`) VALUES
(1, 'entrina', 'jemeleyn', '123456', 'jemelyn@gmail.com', '@admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_img` varchar(255) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `price_day` int(255) NOT NULL,
  `car_status` varchar(255) NOT NULL,
  `car_plate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_img`, `car_name`, `car_model`, `price_day`, `car_status`, `car_plate`) VALUES
(20, 'car-2.jpg', 'CAR 1', 'CAR 001', 2500, 'Reserved', ''),
(26, 'car-5.jpg', 'CAR 3', 'CAR 003', 3000, 'Available', ''),
(28, 'Yaris Cross 2025_ Novo SUV da Toyota chega em busca de espaço.jpg', 'Toyota', 'SUV', 3000, 'Reserved', '1234567'),
(29, 'Get Your Own HONDA BRV Car On Easy Installment _ AD-BY-U.jpg', 'Honda', 'Civic', 3500, 'Available', '09876'),
(33, 'DieWhorez.jpg', 'Mercedes', 'CAR 005', 3000, 'Reserved', '765432');

-- --------------------------------------------------------

--
-- Table structure for table `car_brand`
--

CREATE TABLE `car_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_brand`
--

INSERT INTO `car_brand` (`brand_id`, `brand_name`, `manager_id`) VALUES
(5, 'honda', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE `car_model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `no_seats` int(255) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `car_img` varchar(255) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price_day` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`model_id`, `model_name`, `color`, `no_seats`, `brand_id`, `car_img`, `plate_no`, `status`, `price_day`) VALUES
(7, 'CAR 1', '#000000', 4, 5, '4x4 Car Rentals in Iceland _ Best Prices & Selection _ Guide to Iceland.jpg', '1234567', 'Available', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `last_name`, `first_name`, `phone`, `email`, `password`) VALUES
(1, 'ortillano', '1234567890', '923718631278', 'ortillano@gmail.com', '123456'),
(4, 'Calawigan', 'asdad', '1231', 'sadasd@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rental_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rental_days` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `car_id` int(11) NOT NULL,
  `return_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `valid_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `manager_id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`manager_id`, `lastname`, `firstname`, `address`, `email`, `password`, `admin_id`) VALUES
(4, 'jem1', 'jem1', 'jem@gmail.com', 'jem@gmail.com', '@jem123', 3),
(5, 'HAAAAAAKK', 'HATDO', 'SSSS@GMAIL.COM', 'SSSS@GMAIL.COM', '12345', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rentals`
--

CREATE TABLE `tbl_rentals` (
  `rental_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `rental_days` int(11) NOT NULL,
  `pickup_date` varchar(255) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `return_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `valid_ID` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `mode_payment` varchar(255) NOT NULL,
  `amount_receive` int(255) NOT NULL,
  `reference_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `lastname`, `firstname`, `phone`, `email`, `password`, `admin_id`) VALUES
(9, 'asghdfagh', 'faghfshdgf', '34567', 'gfadgfasda@gmail.com', '23456', 1),
(11, 'Calawigan', 'dgasd', '1234567', 'faghsdfasgd@gmail.com', '23456789', 1),
(13, 'Ecube', 'Kate', '16787654', 'ecube@gmail.com', '12345', 1),
(14, 'jenalyn', 'entrina', '12345678', 'jenalyn@gmail.com', 'jenalyn', 1),
(15, 'David', 'Blessie', '1234567', 'david@gmail.com', 'david123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `lastname`, `firstname`, `phone`, `address`, `email`, `password`) VALUES
(13, 'Entrina', 'Jemelyn', '09511060016', 'Igbaras, Iloilo', 'emca1.entrina.ui@phinmaed.com', '$2y$10$w/rTbD2Pjgzaf1AVWOneRu.x4PSr0L6KgkfzNUpxFujQ4vQnuBsaq'),
(15, 'Entrina', 'Jemelyn', '09123456789', 'Igbaras, Iloilo', 'awa@1.com', '1234'),
(16, 'Entrina', 'Jemelyn', '09123456789', 'Igbaras, Iloilo', 'awa@2.com', '12341'),
(17, 'bond', 'james', '0912233456', 'iloilo', 'james@gmail.com', '123123'),
(18, 'Carale', 'Mary', '1234567456', 'carles', 'carale@gmail.com', 'maryann'),
(19, 'elloran', 'joy', '1234567890', 'Iloilo', 'elloran@gmail.com', 'elloran'),
(20, 'carpe', 'jena', '12345', 'laguna', 'jena@gmail.com', 'jenalyn'),
(21, 'david', 'blessie', '123456', 'iloilo', 'david@gmail.com', '12345678'),
(22, 'Calawigan', 'james', '0912233456', 'iloilo', 'calawiganjames@gmail.com', 'password'),
(23, 'Layno ', 'Jull', '123456789', 'cabatwan', 'layno@gmail.com', '09876');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_brand`
--
ALTER TABLE `car_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`model_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `tbl_rentals`
--
ALTER TABLE `tbl_rentals`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `car_brand`
--
ALTER TABLE `car_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car_model`
--
ALTER TABLE `car_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rentals`
--
ALTER TABLE `tbl_rentals`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_model`
--
ALTER TABLE `car_model`
  ADD CONSTRAINT `car_model_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `car_brand` (`brand_id`);

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
