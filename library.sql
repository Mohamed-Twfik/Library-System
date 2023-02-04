-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 04:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `auther_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `submission_date` datetime NOT NULL,
  `edition_date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `librarian_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`number`, `title`, `auther_name`, `description`, `submission_date`, `edition_date`, `image`, `librarian_email`) VALUES
(47, 'In Search of Lost Time', 'Marcel Proust', 'Book is usefull to save time in day', '2022-09-27 00:24:35', '2022-09-27 00:24:35', '3.jpg', 'mohamedmahmoud@example.com'),
(48, 'Ulysses', 'James Joyce', 'This is very usefull book to learn how order your day', '2022-09-27 00:26:44', '2022-09-27 00:26:44', '8.jpg', 'mohand999@example.com'),
(49, 'Don Quixote', 'Miguel de Cervantes', 'This is Example To Book Description', '2022-09-27 00:28:10', '2022-09-27 00:28:10', '6.jpg', 'mohand999@example.com'),
(50, 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'This is example to book description', '2022-09-27 00:29:16', '2022-09-27 00:29:16', '9.jpg', 'mohamedmahmoud@example.com'),
(57, 'one piece', 'Oda', 'one pieceone pieceone pieceone pieceone piece', '2022-10-10 22:15:42', '2022-10-10 22:17:36', 'backiee-34694.jpg', 'mohamedtwfik910@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`email`, `password`, `name`) VALUES
('mohamedmahmoud@example.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'Mohamed Mahmoud'),
('mohamedtwfik910@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'Mohamed Twfik'),
('mohand999@example.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'Mohand Hossam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`number`),
  ADD KEY `librarian_email` (`librarian_email`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`librarian_email`) REFERENCES `librarians` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
