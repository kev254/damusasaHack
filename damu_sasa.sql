-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2023 at 12:16 PM
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
-- Database: `damu_sasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `MedicalHistory`
--

CREATE TABLE `MedicalHistory` (
  `history_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `history_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

CREATE TABLE `Patients` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `checkin_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Patients`
--

INSERT INTO `Patients` (`patient_id`, `name`, `age`, `gender`, `contact`, `location`, `created_at`, `updated_at`, `checkin_status`) VALUES
(1, 'Harper Black', 60, 'Male', 'Aute ut quo labore q', 'Sit veniam ut non e', '2023-05-25 09:00:39', '2023-05-25 09:00:39', '1'),
(2, 'Barrett Schultz', 85, 'Male', 'Laborum quis veritat', 'Voluptate recusandae', '2023-05-25 09:00:46', '2023-05-25 09:00:46', 'Nisi harum dolorem m'),
(3, 'Beck Holden', 58, 'Male', 'Enim et incidunt be', 'Ea eiusmod ratione r', '2023-05-25 09:01:43', '2023-05-25 09:01:43', 'Sed adipisci et offi'),
(4, 'May Sandoval', 44, 'Male', 'Eum dolore in cumque', 'Mollitia necessitati', '2023-05-25 09:02:48', '2023-05-25 09:02:48', '1'),
(5, 'Harper Black', 60, 'Male', 'Aute ut quo labore q', 'Sit veniam ut non e', '2023-05-25 09:22:53', '2023-05-25 09:22:53', '1'),
(6, 'Armand Crosby', 52, 'Male', 'Ex ea molestiae null', 'Esse consequuntur no', '2023-05-25 09:45:02', '2023-05-25 09:45:02', '1'),
(7, 'Maisie Stephenson', 76, 'Female', 'Cillum a doloribus c', 'Eum sunt nobis ad ea', '2023-05-25 09:46:08', '2023-05-25 09:46:08', '1'),
(8, 'Myles Hines', 15, 'Male', 'Voluptatem laborum ', 'Dolorem eos ut possi', '2023-05-25 09:46:37', '2023-05-25 09:46:37', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'wanaq', 'Pa$$w0rd!', 'zylyxynefo@mailinator.com', 'receptionist'),
(2, 'didar', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'pibemedo@mailinator.com', '2'),
(3, 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad', 'admin@admin.com', '1'),
(4, 'jydewunef', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'rifak@mailinator.com', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MedicalHistory`
--
ALTER TABLE `MedicalHistory`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Patients`
--
ALTER TABLE `Patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
