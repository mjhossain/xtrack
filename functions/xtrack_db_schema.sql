

--
-- Database: `xtrack`
--
CREATE DATABASE IF NOT EXISTS `xtrack` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `xtrack`;

-- --------------------------------------------------------

--
-- Table structure for table `transctions`
--

CREATE TABLE `transctions` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `category` varchar(45) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `regDate` datetime NOT NULL DEFAULT current_timestamp(),
  `totalExpense` decimal(13,2) NOT NULL
);


