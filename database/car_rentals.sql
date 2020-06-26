-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 03:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'First Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(255) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `capacity` varchar(3) NOT NULL,
  `doors` varchar(2) NOT NULL,
  `air_condition` varchar(30) NOT NULL,
  `transmission` varchar(10) NOT NULL,
  `price` int(20) NOT NULL,
  `image_url` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_name`, `car_model`, `capacity`, `doors`, `air_condition`, `transmission`, `price`, `image_url`) VALUES
(1, 'Honda', 'G5', '5', '4', 'NIL', 'automatic', 34, './cars_images/about-img5e77b7dc5bfa31.67473486.jpg'),
(2, 'Mercedes', '70', '3', '3', 'Dual', 'automatic', 3241, './cars_images/b25e779daae32cb3.81089895.jpg'),
(3, 'Toyota', 'Deluxe', '5', '4', 'None', 'manual', 20, './cars_images/header-bg5e77b74d751520.63825673.jpg'),
(4, 'Mitsubishi', 'Space Wagon', '8', '4', 'Dual', 'automatic', 90, './cars_images/about-img5e77b7dc5bfa31.67473486.jpg'),
(5, 'Honda', 'Tortoise Car', '2', '2', 'None', 'manual', 20, './cars_images/b25e77b80c4707c1.49315531.jpg'),
(6, 'Audi', 'X1', '5', '4', 'Mono', 'automatic', 200, './cars_images/about-img5e77b844ee4640.45707602.jpg'),
(7, 'Toyota', 'Venza', '5', '4', 'Dual', 'automatic', 400, './cars_images/car5e77b8d4b91408.40912566.jpg'),
(8, 'Mustang', 'G1990', '2', '2', 'Dual', 'manual', 3000, './cars_images/image_35e9f012cc81bc0.64635422.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_messages`
--

CREATE TABLE `contact_us_messages` (
  `id` int(255) NOT NULL,
  `senders_name` varchar(50) NOT NULL,
  `senders_email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us_messages`
--

INSERT INTO `contact_us_messages` (`id`, `senders_name`, `senders_email`, `phone_number`, `message`, `date`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', '0909347473', 'I would love to book an appointment with your CEO, how do i go about it please?\r\n', '23-03-2020');

-- --------------------------------------------------------

--
-- Table structure for table `rent_outs`
--

CREATE TABLE `rent_outs` (
  `id` int(255) NOT NULL,
  `renters_name` varchar(50) NOT NULL,
  `renters_email` varchar(50) NOT NULL,
  `renters_phone_number` varchar(20) NOT NULL,
  `rent_date` varchar(15) NOT NULL,
  `pick_up_date` varchar(20) NOT NULL,
  `return_date` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `car_id` int(255) NOT NULL,
  `delivery_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent_outs`
--

INSERT INTO `rent_outs` (`id`, `renters_name`, `renters_email`, `renters_phone_number`, `rent_date`, `pick_up_date`, `return_date`, `password`, `car_id`, `delivery_status`) VALUES
(1, 'Brad Pitt', 'bradpitt@gmail.com', '09023212342', '03-03-2020', '03-03-2020', '03-04-2020', 'rentone', 2, 'arrived'),
(2, 'John Doe', 'johndoe@gmail.com', '0702434242', '09-12-2020', '09-12-2020', '15-12-2020', 'renttwo', 6, 'arriving'),
(6, 'Khalid Amari', 'khalid@gmail.com', '07073473674', '04-21-2020', '2020-04-22', '2020-04-29', 'rentfour', 8, 'arriving');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(255) NOT NULL,
  `senders_name` varchar(100) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `number_of_stars` int(1) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `senders_name`, `sender_email`, `number_of_stars`, `review`, `date`) VALUES
(1, 'Carlos Slim', 'carlosslim@gmail.com', 3, 'Aweome Service, i think.', '23-03-2020'),
(2, 'Keanu Reeves', 'keanureeves@gmail.com', 2, 'I rented a car with a bad engine.\r\n', '23-03-2020'),
(3, 'Harvey Specter', 'harveyspecter@gmail.com', 4, 'I love how they care about the faults we cause in their cars and how they try not to blame the user.\r\n', '23-03-2020'),
(4, 'Brad Pitt', 'bradpitt@gmail.com', 5, 'Oh I love the customer service', '23-03-2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_messages`
--
ALTER TABLE `contact_us_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_outs`
--
ALTER TABLE `rent_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact_us_messages`
--
ALTER TABLE `contact_us_messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rent_outs`
--
ALTER TABLE `rent_outs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
