-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 02:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ziekmeldingen`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `aid` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`aid`, `name`, `password`) VALUES
(1, 'Dean', '$2y$10$B/vxXzu6BlakVTMombnOaOdzhzsT.vwToNMnPGK.GmJS0dCoBrHYG'),
(6, 'user', '$2y$10$wWKyGeyknH3li7PGpvPqj.Uwjp/12Jc2U3Z9icayFEwY3dwBg7Xqq'),
(8, 'luciano', '$2y$10$TClukaPsUcqS5UzuGd3QaeIhr0YF/Jrk/TjrAJI9f/vFXx9v1MTeq'),
(9, 'dean', '$2y$10$swxDrBF9qI0QDZjjvnOMkuDBOYhxtP0aPQ18EcxkUMLDwMQu87VJS');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `sid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `profilepicture` varchar(300) NOT NULL,
  `dateofbirth` date NOT NULL DEFAULT current_timestamp(),
  `present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`sid`, `name`, `profilepicture`, `dateofbirth`, `present`) VALUES
(1, 'Dean Sandvos', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTj0hdRhcjRNBp5I2J_UCpFdP2vOW7z3KGobA&usqp=CAU', '2005-08-22', 1),
(3, 'Jan Broos', 'https://www.dmarge.com/wp-content/uploads/2021/01/dwayne-the-rock-.jpg', '2006-05-12', 1),
(4, 'Tijmen Meeus', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/drake-1571996979.jpg?crop=1.00xw:0.721xh;0,0.0254xh&resize=640:*', '2004-06-16', 1),
(5, 'Rio Wichers', 'https://cdn.discordapp.com/attachments/905831987443535912/988373503780732958/unknown.png', '0000-00-00', 1),
(6, 'Raul Remesal van Merode', 'https://starbyface.com/ImgBase/testPhoto/min/test1.jpg', '2000-10-16', 1),
(7, 'Dylano Valentijn', 'https://assets.reedpopcdn.com/twitch-announces-deal-to-broadcast-exclusive-content-from-some-of-disneys-top-youtubers-1516350904525.jpg/BROK/thumbnail/1600x900/quality/100/twitch-announces-deal-to-broadcast-exclusive-content-from-some-of-disneys-top-youtubers-1516350904525.jpg', '2003-10-08', 1),
(9, 'Tom Henning', 'https://m.media-amazon.com/images/M/MV5BNTY1YjU2MDAtODIyMS00NGI4LTgyNGUtOGIxYTVkYmQ1ZDE1XkEyXkFqcGdeQXVyNTA3MTU2MjE@._V1_.jpg', '2002-06-09', 1),
(10, 'Chadi Bouhalil', 'https://seisecurity.com/wp-content/uploads/2020/12/shoplifter-in-the-electronic-store-666x333-1.jpg', '2003-04-20', 1),
(11, 'Luciano Kannekens', 'https://i0.wp.com/www.alphr.com/wp-content/uploads/2022/03/How-Much-Money-Do-the-Top-YouTubers-Make_7.png?resize=690%2C688&ssl=1', '2005-06-02', 1),
(12, 'Tycho Boeren', 'https://i.pinimg.com/474x/0a/c1/f5/0ac1f5a5e026ace966a485387ac005fa.jpg', '2005-04-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration_logs`
--

CREATE TABLE `registration_logs` (
  `lid` int(6) NOT NULL,
  `sid` int(6) NOT NULL,
  `absent_date` date NOT NULL,
  `present_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `registration_logs`
--
ALTER TABLE `registration_logs`
  ADD PRIMARY KEY (`lid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `aid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registration_logs`
--
ALTER TABLE `registration_logs`
  MODIFY `lid` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
