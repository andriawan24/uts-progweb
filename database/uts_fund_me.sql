-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2022 at 12:46 PM
-- Server version: 10.6.7-MariaDB
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_fund_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_users`
--

CREATE TABLE `log_users` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `business_proposal_url` varchar(255) NOT NULL,
  `goals` varchar(255) NOT NULL,
  `goal_amount` int(11) NOT NULL,
  `current_amount` int(11) NOT NULL DEFAULT 0,
  `deadline` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `short_description`, `description`, `business_proposal_url`, `goals`, `goal_amount`, `current_amount`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'Project Pertama', 'Ini Deskripsi Project', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam a gravida lorem. Praesent id sodales enim. Sed accumsan, sapien eget scelerisque consequat, diam augue tincidunt augue, in tincidunt dolor enim a turpis. Integer ultrices quam eget ligula convallis viverra. In vitae tincidunt est. Nulla egestas eros nec dolor pretium, vel tincidunt nulla ornare. Curabitur interdum metus eget massa elementum pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam scelerisque blandit dolor id eleifend. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nProin ultrices metus quis mollis fringilla. Suspendisse potenti. Nulla nulla leo, suscipit nec efficitur nec, ullamcorper eget tortor. Aliquam commodo bibendum lorem ac facilisis. Nunc sit amet odio eu sem scelerisque ullamcorper. Vivamus egestas dignissim efficitur. Morbi non ipsum et tortor varius hendrerit quis non tellus. Suspendisse felis nisl, auctor sit amet ullamcorper eu, tempus id velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam congue malesuada ante, ut efficitur quam facilisis vitae. Maecenas at scelerisque nisl, vel accumsan tellus.', '', 'Be Clever,Be rich, Get rich', 200000, 50000, '2022-05-30 22:00:00', '2022-05-22 18:55:50', '2022-05-22 18:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `projects_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('pending','paid','cancelled','failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('l','p') NOT NULL COMMENT 'l = Laki-laki, p = Perempuan',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_users`
--
ALTER TABLE `log_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_users`
--
ALTER TABLE `log_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
