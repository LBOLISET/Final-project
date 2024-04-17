-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2024 at 03:11 PM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lboliset_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lamora_staff`
--

CREATE TABLE `lamora_staff` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `employment_status` enum('full-time','part-time','contract','temporary') NOT NULL,
  `start_date` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `staff_id` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emergency_contact_name` varchar(100) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `emergency_contact_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lamora_staff`
--

INSERT INTO `lamora_staff` (`id`, `firstname`, `lastname`, `gender`, `dob`, `nationality`, `email`, `phone`, `address`, `job_title`, `employment_status`, `start_date`, `department`, `supervisor`, `staff_id`, `password`, `emergency_contact_name`, `relationship`, `emergency_contact_phone`) VALUES
(1, 'john', 'doe', 'male', '1998-04-15', 'hispanic', 'john.doe@gmail.com', '1234567890', 'Some St', 'spa worker', 'part-time', '2024-04-15', 'Spa', 'Rakesh', 'ST001', 'John@1234', 'john wife', 'wife', '2345678901'),
(2, 'anne', 'hathway', 'female', '1997-04-15', 'American', 'anne.hathway@gmail.com', '3412569870', 'Anne Hathway address', 'cleaning lady', 'full-time', '2024-04-02', 'Cleaning', 'Mounika', 'ST002', 'Anne@1234', 'anne husband', 'husband', '1235674890');

-- --------------------------------------------------------

--
-- Table structure for table `lamora_user`
--

CREATE TABLE `lamora_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lamora_user`
--

INSERT INTO `lamora_user` (`id`, `firstname`, `lastname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `zipcode`, `dob`, `username`, `user_password`) VALUES
(1, 'lakshmi', 'mounika', 'lboliset@iu.edu', '3174917625', '319 N West St', '', 'Indianapolis', 'Indiana', 'US', '46202', '2000-01-21', 'lboliset', 'Gana@1971'),
(2, 'sudha', 'rani', 'sundha@gmail.com', '3174917655', '319 N West St', '', 'Indianapolis', 'Indiana', 'US', '46201', '2000-09-12', 'syeruva', 'Yeruva@123'),
(3, 'mounika', 'lakshmi', 'lakshmi@gmail.com', '317491860', '356 N West st', 'apt 450', 'Indianapolis', 'Indiana', 'US', '46505', '1999-09-12', 'lucky2000', 'Lucky@2000'),
(4, 'neha', 'koetharapu', 'neha@gmail.com', '3174918765', '402 W New York St', 'Apt 256', 'Indianapolis', 'Indiana', 'US', '46202', '1997-11-08', 'nekowth', 'Neha@1997'),
(5, 'pavan', 'mahesh', 'pavanmahesh414@gmail.com', '7569710436', 'H.No 15-21-68/ G1, Samata Towers', 'Balajinagar, Kukatpally', 'Hyderabad', 'Telangana', 'India', '500072', '2002-08-19', 'pavan mahesh', 'Mahesh@2002'),
(6, 'rama', 'lakshmi', 'ramalakshmi@gmail.com', '9989965676', 'H.No: 15-21-68/ G1, Samata towers', '', 'Hyderabad', 'Telanagana', 'India', '500072', '1975-09-07', 'ramalakshmi', 'Rama@1975'),
(7, 'Ganapati', 'Rao', 'gana@gmail.com', '9989931513', 'H.NO:15-21-68/ G1', '', 'Hyderabad', 'Telangana', 'India', '500072', '1971-09-08', 'gana', 'Gana@1971'),
(8, 'laasya', 'tummala', 'otummala@iu.edu', '3174917659', '319 N West St', 'apt 417', 'indianapolis', 'Indiana', 'US', '46202', '2000-12-08', 'otummala', 'Tummala@2000'),
(9, 'rakesh', 'reddy', 'rakesh@gmail.com', '3176784562', '402 W New York St', '', 'Indianapolis', 'Indiana', 'US', '46202', '1999-08-12', 'Rakesh', 'Rakesh@123'),
(10, 'aruna', 'simha', 'aru@gmail.com', '3175392556', '319 N west St', '', 'Indianapolis', 'Indiana', 'US', '46202', '1997-04-10', 'aruna', 'Aruna@123'),
(11, 'vijay', 'pulavarti', 'vijay@gmail.com', '1234567890', '356 N West st', '', 'Indianapolis', 'Indiana', 'US', '46202', '1999-08-22', 'spulavar', 'Vijay@123'),
(12, 'yash', 'sagiraju', 'yash@gmail.com', '9876543210', '105 W New York St', '', 'Indianapolis', 'Indiana', 'US', '46201', '1998-04-14', 'ysagiraju', 'Yash@123'),
(13, 'satya', 'tangudu', 'tangudu@gmail.com', '2314567890', '567 W Michigan St', '', 'Indianapolis', 'Indiana', 'US', '34256', '1997-04-02', 'satya', 'Satya@123');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `request_id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `maintenance_issue` text NOT NULL,
  `maintenance_status` enum('open','in progress','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`request_id`, `room_number`, `maintenance_issue`, `maintenance_status`) VALUES
(1, 101, 'Broken faucet in the bathroom', 'open'),
(3, 303, 'Faulty electrical outlet in the kitchen', 'closed'),
(4, 102, 'maintenance', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `dob`) VALUES
(1, 'rakesh', 'Rakesh@123', 'Rakesh Reddy', 'Yennam', 'ryennam@gmail.com', '4846409199', '2000-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `username`, `first_name`, `last_name`, `room_type`, `check_in_date`, `check_out_date`) VALUES
(3, 'alice_jones', 'Alice', 'Jones', 'Suite', '2024-07-20', '2024-07-25'),
(4, 'bob_white', 'Bob', 'White', 'Single', '2024-08-15', '2024-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `Rooms`
--

CREATE TABLE `Rooms` (
  `RoomID` int(11) NOT NULL,
  `RoomNumber` varchar(20) NOT NULL,
  `RoomType` varchar(50) NOT NULL,
  `RoomSize (sq.ft)` int(11) DEFAULT NULL COMMENT 'Room Size (sq.ft)',
  `Occupancy` int(11) NOT NULL,
  `BedConfiguration` varchar(100) NOT NULL,
  `ViewType` varchar(50) DEFAULT NULL,
  `Amenities` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Availability` enum('available','booked','under maintenance') DEFAULT 'available',
  `AvailableFrom` date DEFAULT NULL,
  `AvailableTo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Rooms`
--

INSERT INTO `Rooms` (`RoomID`, `RoomNumber`, `RoomType`, `RoomSize (sq.ft)`, `Occupancy`, `BedConfiguration`, `ViewType`, `Amenities`, `Price`, `Availability`, `AvailableFrom`, `AvailableTo`) VALUES
(1, '101', 'Standard', 250, 2, '1 Single', 'City View', 'Air Conditioning, TV', '50.00', 'available', '2024-04-17', '2024-04-21'),
(2, '102', 'Standard', 250, 2, '1 Single', 'City View', 'Air Conditioning, TV', '50.00', 'available', NULL, NULL),
(3, '103', 'Deluxe', 350, 3, '1 Queen', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '100.00', 'available', NULL, NULL),
(4, '104', 'Suite', 500, 4, '2 Double', 'Ocean View', 'Air Conditioning, TV, Mini-bar, Jacuzzi', '200.00', 'available', NULL, NULL),
(5, '105', 'Standard', 250, 2, '1 Single', 'Garden View', 'Air Conditioning, TV', '55.00', 'available', NULL, NULL),
(6, '106', 'Deluxe', 350, 3, '1 Queen', 'City View', 'Air Conditioning, TV, Mini-bar', '105.00', 'available', NULL, NULL),
(7, '107', 'Standard', 250, 2, '1 Single', 'Garden View', 'Air Conditioning, TV', '55.00', 'booked', NULL, NULL),
(8, '108', 'Suite', 500, 4, '2 Double', 'Ocean View', 'Air Conditioning, TV, Mini-bar, Jacuzzi', '205.00', 'booked', NULL, NULL),
(9, '109', 'Standard', 250, 2, '1 Single', 'City View', 'Air Conditioning, TV', '50.00', 'available', NULL, NULL),
(10, '110', 'Deluxe', 350, 3, '1 Queen', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '100.00', 'under maintenance', NULL, NULL),
(11, '111', 'Standard', 250, 2, '1 Single', 'Garden View', 'Air Conditioning, TV', '55.00', 'available', NULL, NULL),
(12, '112', 'Deluxe', 350, 3, '1 Queen', 'City View', 'Air Conditioning, TV, Mini-bar', '105.00', 'available', NULL, NULL),
(13, '113', 'Standard', 250, 2, '1 Single', 'Garden View', 'Air Conditioning, TV', '55.00', 'booked', NULL, NULL),
(14, '114', 'Suite', 500, 4, '2 Double', 'Ocean View', 'Air Conditioning, TV, Mini-bar, Jacuzzi', '200.00', 'booked', NULL, NULL),
(15, '115', 'Standard', 250, 2, '1 Single', 'City View', 'Air Conditioning, TV', '50.00', 'available', NULL, NULL),
(16, '116', 'Deluxe', 350, 3, '1 Queen', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '100.00', 'available', NULL, NULL),
(17, '117', 'Standard', 250, 2, '1 Single', 'Garden View', 'Air Conditioning, TV', '55.00', 'under maintenance', NULL, NULL),
(18, '118', 'Suite', 500, 4, '2 Double', 'Ocean View', 'Air Conditioning, TV, Mini-bar, Jacuzzi', '205.00', 'available', NULL, NULL),
(19, '119', 'Standard', 250, 2, '1 Single', 'City View', 'Air Conditioning, TV', '50.00', 'available', NULL, NULL),
(20, '120', 'Deluxe', 350, 3, '1 Queen', 'City View', 'Air Conditioning, TV, Mini-bar', '105.00', 'available', NULL, NULL),
(21, '121', 'Standard', 250, 2, '1 Single', 'Garden View', 'Air Conditioning, TV', '55.00', 'booked', NULL, NULL),
(22, '122', 'Deluxe', 350, 3, '1 Queen', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '100.00', 'booked', NULL, NULL),
(23, '123', 'Standard', 250, 2, '1 Single', 'City View', 'Air Conditioning, TV', '50.00', 'available', NULL, NULL),
(24, '124', 'Suite', 500, 4, '2 Double', 'Garden View', 'Air Conditioning, TV, Mini-bar, Jacuzzi', '200.00', 'available', NULL, NULL),
(25, '125', 'Standard', 250, 2, '1 Single', 'Ocean View', 'Air Conditioning, TV', '55.00', 'available', NULL, NULL),
(26, '126', 'Deluxe', 350, 3, '1 Queen', 'City View', 'Air Conditioning, TV, Mini-bar', '105.00', 'under maintenance', NULL, NULL),
(27, '127', 'Standard', 250, 2, '1 Single', 'Garden View', 'Air Conditioning, TV', '55.00', 'available', NULL, NULL),
(28, '128', 'Suite', 500, 4, '2 Double', 'Ocean View', 'Air Conditioning, TV, Mini-bar, Jacuzzi', '205.00', 'available', NULL, NULL),
(29, '129', 'Standard', 250, 2, '1 Single', 'City View', 'Air Conditioning, TV', '50.00', 'booked', NULL, NULL),
(30, '130', 'Deluxe', 350, 3, '1 Queen', 'Garden View', 'Air Conditioning, TV, Mini-bar', '100.00', 'available', NULL, NULL),
(31, '131', 'Standard', 300, 2, 'Double', 'Ocean View', 'Air Conditioning, TV', '150.00', 'available', '2024-05-01', '2024-05-10'),
(32, '132', 'Deluxe', 450, 3, 'King-size', 'Garden View', 'Air Conditioning, Mini-bar', '250.00', 'booked', '2024-04-20', '2024-04-25'),
(33, '133', 'Suite', 600, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '400.00', 'available', '2024-05-15', '2024-05-25'),
(34, '134', 'Standard', 320, 2, 'Single', 'City View', 'Air Conditioning', '160.00', 'available', '2024-04-22', '2024-04-27'),
(35, '135', 'Deluxe', 500, 3, 'Double', 'Mountain View', 'Air Conditioning, TV', '270.00', 'under maintenance', '2024-04-18', '2024-04-21'),
(36, '136', 'Suite', 650, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '420.00', 'available', '2024-05-05', '2024-05-10'),
(37, '137', 'Standard', 310, 2, 'Double', 'City View', 'Air Conditioning', '155.00', 'available', '2024-05-02', '2024-05-07'),
(38, '138', 'Deluxe', 470, 3, 'King-size', 'Garden View', 'Air Conditioning, Mini-bar', '260.00', 'booked', '2024-04-30', '2024-05-05'),
(39, '139', 'Suite', 620, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '410.00', 'available', '2024-05-12', '2024-05-22'),
(40, '140', 'Standard', 330, 2, 'Single', 'City View', 'Air Conditioning', '165.00', 'available', '2024-04-25', '2024-04-30'),
(41, '141', 'Deluxe', 480, 3, 'Double', 'Mountain View', 'Air Conditioning, TV', '275.00', 'available', '2024-04-28', '2024-05-03'),
(42, '142', 'Suite', 630, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '425.00', 'available', '2024-05-15', '2024-05-25'),
(43, '143', 'Standard', 340, 2, 'Double', 'City View', 'Air Conditioning', '170.00', 'booked', '2024-04-20', '2024-04-25'),
(44, '144', 'Deluxe', 490, 3, 'King-size', 'Garden View', 'Air Conditioning, Mini-bar', '280.00', 'available', '2024-04-22', '2024-04-27'),
(45, '145', 'Suite', 640, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '430.00', 'available', '2024-05-05', '2024-05-10'),
(46, '146', 'Standard', 350, 2, 'Single', 'City View', 'Air Conditioning', '175.00', 'available', '2024-05-02', '2024-05-07'),
(47, '147', 'Deluxe', 500, 3, 'Double', 'Mountain View', 'Air Conditioning, TV', '285.00', 'booked', '2024-04-30', '2024-05-05'),
(48, '148', 'Suite', 650, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '435.00', 'available', '2024-05-12', '2024-05-22'),
(49, '149', 'Standard', 360, 2, 'Double', 'City View', 'Air Conditioning', '200.00', 'available', '2024-05-31', '2024-04-30'),
(50, '150', 'Deluxe', 510, 3, 'King-size', 'Garden View', 'Air Conditioning, Mini-bar', '150.00', 'available', '2024-04-23', '2024-04-26'),
(51, '151', 'Suite', 660, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '440.00', 'available', '2024-05-15', '2024-05-25'),
(52, '152', 'Standard', 370, 2, 'Single', 'City View', 'Air Conditioning', '185.00', 'available', '2024-04-20', '2024-04-25'),
(53, '153', 'Deluxe', 520, 3, 'Double', 'Mountain View', 'Air Conditioning, TV', '295.00', 'booked', '2024-04-22', '2024-04-27'),
(54, '154', 'Suite', 670, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '445.00', 'available', '2024-05-05', '2024-05-10'),
(55, '155', 'Standard', 380, 2, 'Double', 'City View', 'Air Conditioning', '190.00', 'available', '2024-05-02', '2024-05-07'),
(56, '156', 'Deluxe', 530, 3, 'King-size', 'Garden View', 'Air Conditioning, Mini-bar', '300.00', 'available', '2024-04-30', '2024-05-05'),
(57, '157', 'Suite', 680, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '450.00', 'available', '2024-05-12', '2024-05-22'),
(58, '158', 'Standard', 390, 2, 'Single', 'City View', 'Air Conditioning', '195.00', 'available', '2024-04-25', '2024-04-30'),
(59, '159', 'Deluxe', 540, 3, 'Double', 'Mountain View', 'Air Conditioning, TV', '305.00', 'booked', '2024-04-28', '2024-05-03'),
(60, '160', 'Suite', 690, 4, 'King-size + Single', 'Ocean View', 'Air Conditioning, TV, Mini-bar', '455.00', 'available', '2024-05-15', '2024-05-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lamora_staff`
--
ALTER TABLE `lamora_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `staff_id` (`staff_id`);

--
-- Indexes for table `lamora_user`
--
ALTER TABLE `lamora_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `Rooms`
--
ALTER TABLE `Rooms`
  ADD PRIMARY KEY (`RoomID`),
  ADD UNIQUE KEY `RoomNumber` (`RoomNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lamora_staff`
--
ALTER TABLE `lamora_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lamora_user`
--
ALTER TABLE `lamora_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Rooms`
--
ALTER TABLE `Rooms`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
