-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 09:33 AM
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
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `appoint_Date` date NOT NULL,
  `appoint_time` time NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `doctor` int(11) NOT NULL,
  `message` text NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `appoint_Date`, `appoint_time`, `specialization`, `doctor`, `message`, `apply_date`, `remark`, `status`, `update_date`, `phone`) VALUES
(1, 'Ali', 'ali@gmail.com', '2024-09-13', '15:10:00', '13', 1, 'Im Ali and im your patient', '2024-09-13 06:35:36', 'Your appointment is Approved...', 'Approved', '0000-00-00 00:00:00', '23762876289'),
(2, 'Muhammad', 'm@123gmail.com', '2024-09-17', '15:59:00', '6', 1, 'Muhammad', '2024-09-13 06:55:19', '', '', NULL, '123456789'),
(3, 'Abdullah', 'ab@gmail.com', '2024-09-16', '12:59:00', '10', 2, 'abdullah asjdkfhkasasdfkhkjh\r\n\r\n', '2024-09-13 06:59:31', '', '', NULL, '98792423477'),
(4, 'Habibullah', 'habi@gmail.com', '2024-09-21', '07:57:00', '13', 1, 'asdadasnh oiah  asifhas nfhaf faosifhshio', '2024-09-13 09:57:25', '', '', NULL, '26384234762');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `specialization` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`id`, `name`, `email`, `phone`, `specialization`, `password`, `date`) VALUES
(1, 'Muhammad Muneeb1', 'muhammadmuneeb1800@gmail.com1', '4276863232', '13', '202cb962ac59075b964b07152d234b70', '2024-09-12 16:24:45'),
(2, 'Muhammad Hamza', 'hamza@gmail.com', '0308364427', '2', '202cb962ac59075b964b07152d234b70', '2024-09-12 14:53:11'),
(3, 'Muhammad Hammad', 'hammad@gmail.com', '785637868', '1', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:38:16'),
(4, 'Muhammad Shoaib', 'shoaib@gmail.com', '3534756756', '2', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:38:52'),
(5, 'Muhammad Talha', 'talha@gmail.com', '3845789789', '3', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:39:18'),
(6, 'Muhammad Shahroz', 'shahroz@gmail.com', '2468929384', '4', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:40:03'),
(7, 'Asad', 'asad@gmail.com', '1538693443', '5', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:42:18'),
(8, 'Abdullah', 'abdullah@gmail.com', '1235836578', '6', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:42:59'),
(9, 'Ali', 'ali@gmail.com', '2352778867', '7', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:43:24'),
(10, 'Hashir', 'hashir@gmail.com', '3423548725', '8', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:44:17'),
(11, 'Khan sab', 'sab@gmail.com', '7686359632', '9', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:45:05'),
(12, 'rajpoot', 'rajpoot@gmail.com', '1234567890', '10', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:45:36'),
(13, 'Haseeb', 'haseeb@gmail.com', '8758755555', '11', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:46:20'),
(14, 'Hina', 'hina@gmail.com', '9836498395', '12', '202cb962ac59075b964b07152d234b70', '2024-09-13 09:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id` int(11) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`id`, `specialization`, `date`) VALUES
(1, 'Orthopedics', '2024-09-12 14:34:09'),
(2, 'Internal Medicine', '2024-09-12 14:34:36'),
(3, 'Obstetrics and Gynecology', '2024-09-12 14:35:04'),
(4, 'Dermatology', '2024-09-12 14:35:15'),
(5, 'Pediatrics', '2024-09-12 14:35:30'),
(6, 'Radiology', '2024-09-12 14:35:42'),
(7, 'General Surgery', '2024-09-12 14:35:54'),
(8, 'Ophthalmology', '2024-09-12 14:36:07'),
(9, 'Family Medicine', '2024-09-12 14:36:20'),
(10, 'Chest Medicine', '2024-09-12 14:36:39'),
(11, 'Anesthesia', '2024-09-12 14:36:53'),
(12, 'Pathology', '2024-09-12 14:37:11'),
(13, 'ENT', '2024-09-12 14:37:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
