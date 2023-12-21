-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 07:53 PM
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
-- Database: `use_sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `gig_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `gig_id`, `comment_text`, `comment_date`) VALUES
(1, 1, 'hi', '2023-12-14 19:53:44'),
(2, 1, 'hello', '2023-12-17 16:31:49'),
(3, 2, 'hello', '2023-12-17 16:32:10'),
(4, 3, 'hy pal\r\n', '2023-12-17 17:00:33'),
(5, 2, 'hello I am shanto', '2023-12-17 18:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `id` int(11) NOT NULL,
  `g_title` varchar(255) DEFAULT NULL,
  `g_details` text DEFAULT NULL,
  `g_img` varchar(255) DEFAULT NULL,
  `g_price` decimal(10,2) DEFAULT NULL,
  `g_category` varchar(50) DEFAULT NULL,
  `g_location` varchar(255) DEFAULT NULL,
  `g_creator` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gigs`
--

INSERT INTO `gigs` (`id`, `g_title`, `g_details`, `g_img`, `g_price`, `g_category`, `g_location`, `g_creator`) VALUES
(1, 'asfs', 'gsdfgdf', 'GIG-657b599b939751.79707263.png', 100.00, 'Vegitables', 'Rajshahi', ''),
(2, 'zxdfsdg', 'hxdh', 'GIG-657b59ffc80386.55327458.png', 100.00, 'Fruits', 'Dhaka', ''),
(3, 'fff', 'afafaf', 'GIG-657b5a3ccfdf06.21349621.png', 100.00, 'Fruits', 'Dhaka', '14'),
(4, 'shanto', 'for testing', '0', NULL, 'COM', NULL, '14'),
(5, 'nirob', 'hello there', 'GIG-657f2bb2f0ca78.16425221.png', NULL, 'PHY', NULL, '14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `sno` int(8) NOT NULL,
  `teachers_name` varchar(25) NOT NULL,
  `teachers_gender` varchar(10) NOT NULL,
  `teachers_address` varchar(50) NOT NULL,
  `teachers_cgpa` float NOT NULL,
  `course` varchar(25) NOT NULL,
  `course_id` varchar(25) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `phone_number` varchar(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`sno`, `teachers_name`, `teachers_gender`, `teachers_address`, `teachers_cgpa`, `course`, `course_id`, `timestamp`, `phone_number`, `uid`) VALUES
(1, 'harry', 'male', 'dhaka', 3.5, 'DSA', 'dsa101', '2023-12-11 04:36:31', '01793217055', NULL),
(2, 'zeem', 'male', 'dhka', 3.3, 'algo', 'cse311', '2023-12-11 04:53:16', '01793347055', NULL),
(5, 'sadik hasan', 'male', 'sirajganj', 3.8, 'english', 'eng101', '2023-12-11 05:53:51', '01793217455', NULL),
(8, 'Shorower Hossain', 'male', 'Basundhara R/A', 3.3, 'english', 'eng101', '2023-12-11 06:09:45', '01794517055', NULL),
(104, 'Mohima Mehjabin chowa', 'Female', 'Madani ave, Dhaka', 3.9, 'Data Structure ', 'cse101', '2023-12-11 12:06:19', '01793347999', NULL),
(105, 'Chowa mam', 'female', 'Notun Bazar', 4, 'bangla', 'ban101', '2023-12-11 13:10:47', NULL, NULL),
(108, 'dgsg', 'male', 'gxgxg', 0, 'sxdgxg', 'sgsdb', '2023-12-15 00:41:59', 'sdgsdgsg', NULL),
(110, 'shantoooo', 'male', 'sgzsdgsg', 3, 'adAgsg', '1212454', '2023-12-15 00:57:10', '01215741445', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `user_pass` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `role`, `user_pass`, `timestamp`) VALUES
(1, 'sakib@iforum.com', '', '$2y$10$c9beTmcfFT.xKuaFlFir.eFdQQ.h45wyRa4LCZdVwQi5peN1uFqX2', '2023-12-08 17:04:32'),
(2, 'admin@gmail.com', '', '$2y$10$83HTWfE8fUw41N74cFUFb.oTUoddgZDRhBHFRSLrEAAknHSLw5A7.', '2023-12-08 17:05:34'),
(3, 'test@gmail.com', '', '$2y$10$Uhrb0ITYQmruNITW7ATpdexTVA4UBe9qEk1IGsXMVeLvkRUzAv0ya', '2023-12-08 17:38:06'),
(4, 'test@this.com', '', '$2y$10$xS51VQFEHqn91ZebTa9EQOmwjb6gCF5pYM9H/y/khe.HMP5nOBLRi', '2023-12-11 03:56:54'),
(5, 'test4@gmail.com', 'student', '$2y$10$Sh9MFsRHxesJZ4xeyh2c3.WPBI4OCXWSTNdyC1noZFEeXUTXgeruG', '2023-12-11 04:04:40'),
(6, 'test6@gmail.com', 'teacher', '$2y$10$O36onEJzvkqD9fPruXtbTeaLcaBaDnby6oDW6hjy30utwub0IS.Pa', '2023-12-11 04:04:58'),
(7, 'teacher@this.com', 'teacher', '$2y$10$lehrLGJPMV/Kv9XXziqrk.KFWRzWYHEHHAL.t5DyKi6lJRTORlLEm', '2023-12-11 04:12:58'),
(8, 'student@this.com', 'student', '$2y$10$biKSh8QG4FdTcMEKlTd.Ke/Q5RuWvT9DwkVKaSEcXhk23iR4PyF8.', '2023-12-11 04:21:45'),
(9, 'asdf@student.com', 'student', '$2y$10$gK05v7JkSRgd5QGBbxno.e464JwG9lp8Y1YBm/9ICSuus4DU/6dN6', '2023-12-11 12:17:26'),
(10, 'roott@this.com', 'teacher', '$2y$10$kDsNf799PcIxkL20TOZx5Ow9q5H5O4RhjBspoTHz/64ocVHhAfEWK', '2023-12-11 12:39:00'),
(11, 'roottt@gmail.com', 'student', '$2y$10$EtAoXjMTnbRqn.voiR38Te8aV9rZbecocT7S/pwa9TNmNThAk0L7G', '2023-12-11 12:40:42'),
(12, 'chowa@gmail.com', 'teacher', '$2y$10$CLP2iXUmJ7ETrZD0h6dynO2Ms4hyBeAcnKWB85.rliE5FCRV92u3K', '2023-12-11 13:09:47'),
(13, 'jayed@gmail.com', 'teacher', '$2y$10$V2BsDgo1zO4P74CYDAm5tOjZ9JQM7/njQYB9kNU.PC6L1G8H82IUG', '2023-12-15 00:41:25'),
(14, 'sh@gmail.com', 'teacher', '$2y$10$htUDy.f4HaYNfyHDjPIAWudNZus0yi/MNLwbfQwVIazU6KiFelSHK', '2023-12-15 00:45:44'),
(15, 'sha@gmail.com', 'student', '$2y$10$IBFzXYODhtnD71H9gDkghOyml5KqAhGPTcH0C7OsNJTyxKNF0xamC', '2023-12-15 00:58:31'),
(16, 'shaaa@gmail.com', 'student', '$2y$10$zkJVyM8qhEe2XhkefzmeJu2G7JfZbJCe32NKhoT0KMcekU1SDzo1G', '2023-12-17 22:31:26'),
(17, 'row@gmail.com', 'teacher', '$2y$10$V.cl6/b844.CkoE8nEerv.LneU2bGhsKh38a3jhrADK5t76NiPmOe', '2023-12-18 00:50:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `gig_id` (`gig_id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `t_uid` FOREIGN KEY (`uid`) REFERENCES `users` (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
