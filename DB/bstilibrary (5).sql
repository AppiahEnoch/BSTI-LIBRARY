-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:63943
-- Generation Time: Aug 23, 2023 at 05:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bstilibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `material_number` int(11) DEFAULT NULL,
  `material_type` varchar(50) DEFAULT NULL,
  `shelfno` int(11) NOT NULL,
  `uniqueid` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image_url` text DEFAULT NULL,
  `recdate` timestamp NULL DEFAULT current_timestamp(),
  `cellnumber` int(11) DEFAULT NULL,
  `materialdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `book`
--
DELIMITER $$
CREATE TRIGGER `update_current_cell` AFTER INSERT ON `book` FOR EACH ROW BEGIN
    DECLARE shelf_capacity INT;
    DECLARE books_in_cell INT;

    -- Get shelf capacity
    SELECT capacity INTO shelf_capacity 
    FROM shelf 
    WHERE shelfnumber = NEW.shelfno;

    -- Get current number of books in the cell
    SELECT COUNT(*) INTO books_in_cell 
    FROM book 
    WHERE shelfno = NEW.shelfno AND cellnumber = NEW.cellnumber;

    -- Check if the current cell is full
    IF books_in_cell >= shelf_capacity THEN
        -- If it is, increase the current cell number in the shelf table
        UPDATE shelf 
        SET currentcell = currentcell + 1 
        WHERE shelfnumber = NEW.shelfno;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `book_shelf_view`
-- (See below for the actual view)
--
CREATE TABLE `book_shelf_view` (
`id` int(11)
,`material_number` int(11)
,`material_type` varchar(50)
,`shelfno` int(11)
,`uniqueid` varchar(50)
,`title` text
,`author` varchar(50)
,`description` text
,`image_url` text
,`recdate` timestamp
,`cellnumber` int(11)
,`materialdate` timestamp
,`capacity` int(11)
,`currentcell` int(11)
,`shelfnumber` int(11)
,`class1` varchar(255)
,`class2` varchar(255)
,`shelf_description` text
);

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id` int(11) NOT NULL,
  `material_type` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `file_url` text NOT NULL,
  `recdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regcode`
--

CREATE TABLE `regcode` (
  `mobile` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `user_level` varchar(2) NOT NULL,
  `code` varchar(30) NOT NULL,
  `recdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `sourcetable` varchar(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `sourcetable`, `user_id`, `resource_id`, `review_text`, `rating`) VALUES
(1, 'ebook', 5, 23, 'great!', 3),
(2, 'ebook', 5, 22, 'uuuuu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `id` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `currentcell` int(11) DEFAULT 1,
  `shelfnumber` int(11) NOT NULL,
  `class1` varchar(255) NOT NULL,
  `class2` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `recdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user0`
--

CREATE TABLE `user0` (
  `user0_id` int(11) NOT NULL,
  `user0_name` varchar(50) DEFAULT NULL,
  `user0_password` varchar(50) DEFAULT NULL,
  `user0_recdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `user0_email` text NOT NULL,
  `user0_mobile` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user0`
--

INSERT INTO `user0` (`user0_id`, `user0_name`, `user0_password`, `user0_recdate`, `user0_email`, `user0_mobile`) VALUES
(1, '1', '12345678', '2023-05-30 13:33:09', 'prignutt@gmail.com', '0547266635');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `user1_id` int(11) NOT NULL,
  `user1_name` varchar(50) DEFAULT NULL,
  `user1_password` varchar(50) DEFAULT NULL,
  `user1_recdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `user1_email` text DEFAULT NULL,
  `user1_mobile` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `registration_date` date NOT NULL,
  `favorite_category` varchar(255) DEFAULT NULL,
  `recent_book` varchar(255) DEFAULT NULL,
  `passport_picture_url` text DEFAULT NULL,
  `record_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_dob`, `registration_date`, `favorite_category`, `recent_book`, `passport_picture_url`, `record_date`) VALUES
(1, 'Appiah Enoch', '12345678905666', '12345678909999', '2022-08-11', '2023-01-01', 'FFFFFFFFFFFFFFFFFFF', '', '../passport_picture/b88993087d06fcc84c905c42c7aec6e57154ced2b68e87b35eg9.png', '2023-08-11 18:18:00'),
(4, 'HENRY OSEI', 'prignutt@gmail.com', '0549822202', '1990-02-02', '0000-00-00', 'Science Fiction', 'Dune', '../passport_picture/2a659d6b2bd7a21a37d0e515cce1f7acc42gcee624ge6f2f4gf5.JPG', '2023-08-11 22:34:48');

-- --------------------------------------------------------

--
-- Structure for view `book_shelf_view`
--
DROP TABLE IF EXISTS `book_shelf_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `book_shelf_view`  AS SELECT `book`.`id` AS `id`, `book`.`material_number` AS `material_number`, `book`.`material_type` AS `material_type`, `book`.`shelfno` AS `shelfno`, `book`.`uniqueid` AS `uniqueid`, `book`.`title` AS `title`, `book`.`author` AS `author`, `book`.`description` AS `description`, `book`.`image_url` AS `image_url`, `book`.`recdate` AS `recdate`, `book`.`cellnumber` AS `cellnumber`, `book`.`materialdate` AS `materialdate`, `shelf`.`capacity` AS `capacity`, `shelf`.`currentcell` AS `currentcell`, `shelf`.`shelfnumber` AS `shelfnumber`, `shelf`.`class1` AS `class1`, `shelf`.`class2` AS `class2`, `shelf`.`description` AS `shelf_description` FROM (`book` left join `shelf` on(`book`.`shelfno` = `shelf`.`shelfnumber`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regcode`
--
ALTER TABLE `regcode`
  ADD PRIMARY KEY (`mobile`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user0`
--
ALTER TABLE `user0`
  ADD PRIMARY KEY (`user0_id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`user1_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user0`
--
ALTER TABLE `user0`
  MODIFY `user0_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `user1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
