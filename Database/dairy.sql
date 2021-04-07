-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 12:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `name`, `email`, `mobile`, `address`, `timestamp`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin@gmail.com', '9874563210', 'Wadala', '2021-04-07 10:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign_client`
--

CREATE TABLE `tbl_assign_client` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assign_client`
--

INSERT INTO `tbl_assign_client` (`id`, `staff_id`, `client_id`, `timestamp`) VALUES
(1, 2, 2, '2021-03-30 17:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(250) NOT NULL,
  `milk_type` int(11) NOT NULL,
  `rate` double NOT NULL,
  `client_type` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `name`, `mobile`, `password`, `email`, `address`, `milk_type`, `rate`, `client_type`, `timestamp`) VALUES
(1, 'Rajesh', '9874563210', '12345', 'test@gmail.com', 'wadala', 2, 35, 'Local', '2021-03-26 15:46:25'),
(2, 'Radheshyam', '0123654789', '12345', 'a@gmail.com', 'sanagam nagar', 2, 55, 'Wholesaler', '2021-03-26 15:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_payment`
--

CREATE TABLE `tbl_client_payment` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `amount` double NOT NULL,
  `remark` varchar(250) NOT NULL,
  `date_time` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client_payment`
--

INSERT INTO `tbl_client_payment` (`id`, `client_id`, `payment_type`, `amount`, `remark`, `date_time`, `timestamp`) VALUES
(4, 1, 'UPI', 40, 'qwe', '2021-03-30', '2021-03-30 06:00:13'),
(5, 1, 'Cash', 10, 'tst', '2021-03-30', '2021-03-30 06:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `details` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milk_delivered`
--

CREATE TABLE `tbl_milk_delivered` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `date_time` date NOT NULL,
  `remark` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_milk_delivered`
--

INSERT INTO `tbl_milk_delivered` (`id`, `staff_id`, `client_id`, `quantity`, `date_time`, `remark`, `timestamp`) VALUES
(6, 2, 1, 10, '2021-04-07', 'testijfgjnsx cnhkudajsb', '2021-04-07 08:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milk_handover`
--

CREATE TABLE `tbl_milk_handover` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `remark` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_milk_handover`
--

INSERT INTO `tbl_milk_handover` (`id`, `staff_id`, `quantity`, `date`, `remark`, `timestamp`) VALUES
(1, 2, 100, '2021-04-06', 'qsfdxcdcx dfsaxz', '2021-04-06 09:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milk_loss`
--

CREATE TABLE `tbl_milk_loss` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `date_time` datetime NOT NULL,
  `remark` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_milk_loss`
--

INSERT INTO `tbl_milk_loss` (`id`, `staff_id`, `quantity`, `date_time`, `remark`, `timestamp`) VALUES
(2, 2, 1, '2021-04-07 00:00:00', 'sdfgdcsxzm,xcndc ', '2021-04-07 08:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milk_provider`
--

CREATE TABLE `tbl_milk_provider` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(250) NOT NULL,
  `milk_type` int(11) NOT NULL,
  `rate` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_milk_provider`
--

INSERT INTO `tbl_milk_provider` (`id`, `name`, `mobile`, `password`, `email`, `address`, `milk_type`, `rate`, `timestamp`) VALUES
(1, 'shubham', '9874563210', '12345', 'test@gmail.com', 'wadala', 1, 30, '2021-03-25 10:07:20'),
(2, 'Akash', '9874563211', '12345', 'test@gmail.com', 'Wadala', 1, 40, '2021-03-26 08:46:33'),
(4, 'Rakesh', '9874563212', '12345', 'test@gmail.com', 'Wadala', 2, 40, '2021-03-26 09:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milk_provider_amount`
--

CREATE TABLE `tbl_milk_provider_amount` (
  `id` int(11) NOT NULL,
  `milk_provider_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `last_updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_milk_provider_amount`
--

INSERT INTO `tbl_milk_provider_amount` (`id`, `milk_provider_id`, `total_amount`, `last_updated_date`) VALUES
(3, 1, 150, '2021-03-26 19:04:50'),
(4, 2, 80, '2021-03-26 19:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milk_provider_payment`
--

CREATE TABLE `tbl_milk_provider_payment` (
  `id` int(11) NOT NULL,
  `milk_provider_id` int(11) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `amount` double NOT NULL,
  `date_time` date NOT NULL,
  `remark` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milk_type`
--

CREATE TABLE `tbl_milk_type` (
  `id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_milk_type`
--

INSERT INTO `tbl_milk_type` (`id`, `type`, `timestamp`) VALUES
(1, 'Cow', '2021-03-25 10:07:11'),
(2, 'Buffalo', '2021-03-25 10:07:11'),
(3, 'Butter', '2021-04-01 11:28:17'),
(4, 'Paneer', '2021-04-01 12:03:12'),
(5, 'Buffalo Ghee', '2021-04-01 12:03:30'),
(7, 'Other ', '2021-04-01 12:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `order_fill_date` date NOT NULL,
  `remark` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `client_id`, `quantity`, `order_fill_date`, `remark`, `timestamp`) VALUES
(1, 1, 15, '2021-03-28', 'try', '2021-03-27 06:44:58'),
(3, 1, 10, '0000-00-00', 'dfgnjbhcdkvnfndc', '2021-04-07 09:58:26'),
(4, 1, 5, '2021-04-07', 'sadfhjgfdx', '2021-04-07 09:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recieved_milk`
--

CREATE TABLE `tbl_recieved_milk` (
  `id` int(11) NOT NULL,
  `milk_provider_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `date_time` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_recieved_milk`
--

INSERT INTO `tbl_recieved_milk` (`id`, `milk_provider_id`, `quantity`, `date_time`, `timestamp`) VALUES
(12, 1, 5, '2021-03-26', '2021-03-27 05:48:50'),
(13, 2, 2, '2021-03-19', '2021-03-27 05:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id`, `password`, `name`, `email`, `mobile`, `address`, `timestamp`) VALUES
(2, '12345', 'Manish Yadav', 'manishyadav7208@gmail.com', '9874563210', 'wadala', '2021-03-25 09:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_salary`
--

CREATE TABLE `tbl_staff_salary` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_client_amount`
--

CREATE TABLE `tbl_total_client_amount` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `last_updated_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_total_client_amount`
--

INSERT INTO `tbl_total_client_amount` (`id`, `client_id`, `total_amount`, `last_updated_date`) VALUES
(1, 1, 660, '0000-00-00'),
(2, 2, 660, '2021-03-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assign_client`
--
ALTER TABLE `tbl_assign_client`
  ADD PRIMARY KEY (`staff_id`,`client_id`),
  ADD KEY `client_id_fr_key_milk11` (`client_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milk_type_fr_key` (`milk_type`);

--
-- Indexes for table `tbl_client_payment`
--
ALTER TABLE `tbl_client_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id_fr_key_pay` (`client_id`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_milk_delivered`
--
ALTER TABLE `tbl_milk_delivered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id_fr_key_milk` (`client_id`),
  ADD KEY `staff_id_foreign_key_delivered` (`staff_id`);

--
-- Indexes for table `tbl_milk_handover`
--
ALTER TABLE `tbl_milk_handover`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id_fr_key123` (`staff_id`);

--
-- Indexes for table `tbl_milk_loss`
--
ALTER TABLE `tbl_milk_loss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_milk_provider`
--
ALTER TABLE `tbl_milk_provider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milk_type_fr_key2` (`milk_type`);

--
-- Indexes for table `tbl_milk_provider_amount`
--
ALTER TABLE `tbl_milk_provider_amount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milk_provider_id_fr_key_amount` (`milk_provider_id`);

--
-- Indexes for table `tbl_milk_provider_payment`
--
ALTER TABLE `tbl_milk_provider_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milk_provider_id_fr_payment` (`milk_provider_id`);

--
-- Indexes for table `tbl_milk_type`
--
ALTER TABLE `tbl_milk_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id_fr_key_or` (`client_id`);

--
-- Indexes for table `tbl_recieved_milk`
--
ALTER TABLE `tbl_recieved_milk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `milk_provider_id_fr_key` (`milk_provider_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staff_salary`
--
ALTER TABLE `tbl_staff_salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id_fr_key_sal` (`staff_id`);

--
-- Indexes for table `tbl_total_client_amount`
--
ALTER TABLE `tbl_total_client_amount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id_fr_key_amount` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_assign_client`
--
ALTER TABLE `tbl_assign_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_client_payment`
--
ALTER TABLE `tbl_client_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_milk_delivered`
--
ALTER TABLE `tbl_milk_delivered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_milk_handover`
--
ALTER TABLE `tbl_milk_handover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_milk_loss`
--
ALTER TABLE `tbl_milk_loss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_milk_provider`
--
ALTER TABLE `tbl_milk_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_milk_provider_amount`
--
ALTER TABLE `tbl_milk_provider_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_milk_provider_payment`
--
ALTER TABLE `tbl_milk_provider_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_milk_type`
--
ALTER TABLE `tbl_milk_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_recieved_milk`
--
ALTER TABLE `tbl_recieved_milk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_staff_salary`
--
ALTER TABLE `tbl_staff_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_total_client_amount`
--
ALTER TABLE `tbl_total_client_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assign_client`
--
ALTER TABLE `tbl_assign_client`
  ADD CONSTRAINT `client_id_fr_key_milk11` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_id_fr_key11` FOREIGN KEY (`staff_id`) REFERENCES `tbl_staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD CONSTRAINT `milk_type_fr_key` FOREIGN KEY (`milk_type`) REFERENCES `tbl_milk_type` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_client_payment`
--
ALTER TABLE `tbl_client_payment`
  ADD CONSTRAINT `client_id_fr_key_pay` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_milk_delivered`
--
ALTER TABLE `tbl_milk_delivered`
  ADD CONSTRAINT `client_id_fr_key_milk` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_id_foreign_key_delivered` FOREIGN KEY (`staff_id`) REFERENCES `tbl_milk_handover` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_milk_handover`
--
ALTER TABLE `tbl_milk_handover`
  ADD CONSTRAINT `staff_id_fr_key123` FOREIGN KEY (`staff_id`) REFERENCES `tbl_staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_milk_provider`
--
ALTER TABLE `tbl_milk_provider`
  ADD CONSTRAINT `milk_type_fr_key2` FOREIGN KEY (`milk_type`) REFERENCES `tbl_milk_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_milk_provider_amount`
--
ALTER TABLE `tbl_milk_provider_amount`
  ADD CONSTRAINT `milk_provider_id_fr_key_amount` FOREIGN KEY (`milk_provider_id`) REFERENCES `tbl_milk_provider` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_milk_provider_payment`
--
ALTER TABLE `tbl_milk_provider_payment`
  ADD CONSTRAINT `milk_provider_id_fr_payment` FOREIGN KEY (`milk_provider_id`) REFERENCES `tbl_milk_provider` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `client_id_fr_key_or` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_recieved_milk`
--
ALTER TABLE `tbl_recieved_milk`
  ADD CONSTRAINT `milk_provider_id_fr_key` FOREIGN KEY (`milk_provider_id`) REFERENCES `tbl_milk_provider` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_staff_salary`
--
ALTER TABLE `tbl_staff_salary`
  ADD CONSTRAINT `staff_id_fr_key_sal` FOREIGN KEY (`staff_id`) REFERENCES `tbl_staff` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_total_client_amount`
--
ALTER TABLE `tbl_total_client_amount`
  ADD CONSTRAINT `client_id_fr_key_amount` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
