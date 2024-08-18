-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 02:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Lovenish', 'dhirlovenish@gmail.com', '$2y$10$Nqq/y251QX2Ccvb1Ax7hUuMqQSkG3yRLCxN2KPdetnSP3oaXVH70a');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Suzanne Collins'),
(2, 'Robert Muchamore'),
(3, ' Vikram Seth'),
(4, 'Rhonda Byrne'),
(5, 'Janice Pariat'),
(6, 'Dan Brown');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `description`, `category_id`, `cover`, `file`) VALUES
(1, 'The Hunger Games Triology', 1, 'The series consists of a trilogy that follows teenage protagonist Katniss Everdeen, with a prequel set 64 years before the original series. The Hunger Games universe is a dystopia set in Panem, a North American country consisting of the wealthy Capitol and 13 districts in varying states of poverty.', 1, '66b83af13bbb35.29733781.jpg', '66b83af13cacc9.08713610.pdf'),
(2, 'CHERUB: The Recruit Book', 2, 'The Recruit is the first novel in the CHERUB series, written by Robert Muchamore. It introduces most of the main characters, such as James Adams (formerly Choke), Lauren Adams (formerly Onions), Kyle Blueman, and Kerry Chang. It was released in the United Kingdom by Hodder Children\'s Books on 30 April 2004, and by Simon Pulse in the United States on 30 August 2005.', 2, '66b83bc04f9be0.32889611.jpg', '66b83bc04fe072.18855449.pdf'),
(3, 'The Secret', 4, 'The Secret is a 2006 self-help book by Rhonda Byrne, based on the earlier film of the same name. It is based on the belief of the pseudoscientific law of attraction, which claims that thought alone can influence objective circumstances within one\'s life. The book alleges energy as assurance of its effectiveness. ', 4, '66b83d263aa259.92647644.jpg', '66b83d263aeeb0.82805245.pdf'),
(4, 'Boats on Land', 5, 'Boats on Land is a unique way of looking at India’s northeast and its people against a larger historical canvas—the early days of the British Raj, the World Wars, conversions to Christianity, and the missionaries. This is a world in which the everyday is infused with folklore and a deep belief in the supernatural.', 5, '66b83dc3cf2e48.94887028.jpg', '66b83dc3cf9ba6.32475022.pdf'),
(5, 'Angels & Demons', 6, 'Angels & Demons is a 2000 bestselling mystery-thriller novel written by American author Dan Brown and published by Pocket Books and then by Corgi Books. The novel introduces the character Robert Langdon, who recurs as the protagonist of Brown\'s subsequent novels. Angels & Demons shares many stylistic literary elements with its sequels, such as conspiracies of secret societies, a single-day time frame, and the Catholic Church. Ancient history, architecture, and symbology are also heavily referenced throughout the book. A film adaptation was released on May 15, 2009.', 6, '66b83e5aa62f82.91336630.jpg', '66b83e5aa6e0d9.98281379.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Science Fiction'),
(2, 'Spy Fiction'),
(3, 'Romance'),
(4, 'Self-help'),
(5, 'Fiction'),
(6, 'Mystery-thriller');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
