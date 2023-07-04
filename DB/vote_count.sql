-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:63943
-- Generation Time: Jun 20, 2023 at 06:23 PM
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
-- Database: `vote_count`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `passport_picture` text DEFAULT NULL,
  `position_on_ballot` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `fullname`, `category`, `passport_picture`, `position_on_ballot`) VALUES
(50, 'APPIAH ENOCH', '74', '4f1gb36cff47g4b927cfg1d6876f3c7a11111-ADOMAKO-removebg-preview.png', 1),
(51, 'APPIAH ENOCH2', '74', '2efefe52c2d12dd5652bd765656fb18411111-MIGUEL-removebg-preview.png', 3),
(52, 'APPIAH ENOCH3', '74', '9bb8bg977c79g98354b68f99ff7edagd11111-SAMUEL-removebg-preview.png', 2),
(54, 'LYDIA ABUGIRI2', '73', 'e6fcaf6gg2e3812gd3c1eebg7451781a11111-benice.JPG', 10),
(55, 'LYDIA ABUGIRI3', '73', 'a1fbdbdabfac82f9g87e571f11e6467f11111-joyce.JPG', 3),
(57, 'OSEI OWUSU', '76', 'c1515ca9dd44953917c2914g6762322411111-TTI.jpg', 3),
(58, 'danso abiam', '76', '38ba14g6cag7312dcecf6gb33745857e11111-etertertert.PNG', 6),
(59, 'OSEI OWUSU3', '76', 'gg3b11e7c6d55e117b1ag4ef24a952ag11111-DD (2).JPG', 8),
(60, 'OSEI OWUSU3', '76', 'fce79c5528bb95cefagdgba44ee472a911111-african3.png', 1),
(61, 'danso diso', '74', '2gd5b31g7ae412b658g669gbgc79951611111-FGFGFGF.PNG', 4),
(62, 'ANOMAA BA', '73', '46a51edfdb4b3gba9141fcea2b492d2d11111-dsfsdfsdfds.PNG', 10),
(63, 'ANOMAA BA', '73', '6ac4ee8e9a633a7a51e35b52f223281b11111-dsfsdfsdfds.PNG', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `candidate_category`
-- (See below for the actual view)
--
CREATE TABLE `candidate_category` (
`candidate_id` int(11)
,`candidate_name` varchar(255)
,`img_url` text
,`category_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `has_voted`
--

CREATE TABLE `has_voted` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `has_voted`
--

INSERT INTO `has_voted` (`id`, `user_id`, `recdate`) VALUES
(20, 'ZXMACPUM', '2023-06-20 14:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL,
  `_category` text NOT NULL,
  `recdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_position_on_ballot` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `_category`, `recdate`, `category_position_on_ballot`) VALUES
(73, 'SENIOR GIRLS PREFECT', '2023-06-19 07:29:21', 3),
(74, 'INFOTESS PREZ', '2023-06-19 07:29:45', 1),
(76, 'SENIOR BOYS PREFECT', '2023-06-19 15:20:44', 2);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(6) UNSIGNED NOT NULL,
  `candidate_id` int(6) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `candidate_id`, `timestamp`) VALUES
(40, 63, '2023-06-20 13:56:15'),
(41, 60, '2023-06-20 13:56:15'),
(42, 55, '2023-06-20 13:57:38'),
(43, 54, '2023-06-20 13:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `voting_codes`
--

CREATE TABLE `voting_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `recdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voting_codes`
--

INSERT INTO `voting_codes` (`id`, `code`, `recdate`) VALUES
(231, 'ZXMACPUM', '2023-06-20 11:37:11'),
(232, 'YK32C5Z7', '2023-06-20 11:37:11'),
(233, 'HT3QRXWL', '2023-06-20 11:37:11'),
(234, 'KEZVZ5HC', '2023-06-20 11:37:11'),
(235, 'LH9G6NPT', '2023-06-20 11:37:11'),
(236, 'PVXHKHMJ', '2023-06-20 11:37:11'),
(237, 'T33R9CN7', '2023-06-20 11:37:11'),
(238, '9BL6TXVH', '2023-06-20 11:37:11'),
(239, 'TEUXUSPV', '2023-06-20 11:37:11'),
(240, 'SFVEBUGU', '2023-06-20 11:37:11'),
(241, 'L8KZQ57V', '2023-06-20 11:39:03'),
(242, '5AF4MF9Y', '2023-06-20 11:39:03'),
(243, 'FQMBNR2S', '2023-06-20 11:39:03'),
(244, 'JZVCDSP3', '2023-06-20 11:39:03'),
(245, 'VK5G8PKM', '2023-06-20 11:39:03'),
(246, 'Q8PYWWH2', '2023-06-20 11:39:03'),
(247, 'XAAXJJPW', '2023-06-20 11:39:03'),
(248, 'MDS38QLP', '2023-06-20 11:39:03'),
(249, 'D2RJXPVR', '2023-06-20 11:39:03'),
(250, 'SLMVMFCS', '2023-06-20 11:39:03');

-- --------------------------------------------------------

--
-- Structure for view `candidate_category`
--
DROP TABLE IF EXISTS `candidate_category`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `candidate_category`  AS SELECT `c`.`id` AS `candidate_id`, `c`.`fullname` AS `candidate_name`, `c`.`passport_picture` AS `img_url`, `uc`.`_category` AS `category_name` FROM (`candidates` `c` join `user_category` `uc` on(`c`.`category` = `uc`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `has_voted`
--
ALTER TABLE `has_voted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `voting_codes`
--
ALTER TABLE `voting_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `has_voted`
--
ALTER TABLE `has_voted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `voting_codes`
--
ALTER TABLE `voting_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
