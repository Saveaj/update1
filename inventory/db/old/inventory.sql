-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 12:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prince`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `BRANCH_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `BARANGAY` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BRANCH_ID`, `COMPANY_NAME`, `LOCATION_ID`, `PHONE_NUMBER`, `BARANGAY`) VALUES
(12, 'My Branch 1', 115, '09635877123', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`) VALUES
(1, 'Bag'),
(2, 'Cellphone'),
(3, 'Vehicle'),
(4, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`) VALUES
(11, 'A Walk in Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `GENDER` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`) VALUES
(1, 'Admin', 'Admin', 'Male', 'admin@gmail.com', '09123456789', 1, '2022-11-01', 113),
(2, 'Catherine', 'Beredo', 'Female', 'catherine@yahoo.com', '09091245761', 2, '2019-01-28', 156),
(5, 'Roxanne Leise', 'Papasin', 'Female', 'roxannepapasin@gmail.com', '09876543210', 2, '2021-01-08', 162),
(6, 'Angela', 'Verano', 'Female', 'angelaverano@gmail.com', '09123475928', 2, '2021-03-21', 163),
(7, 'Keith Dexter', 'Aguilar', 'Male', 'keithdexter@gmail.com', '09091982017', 2, '2021-01-18', 164);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL,
  `BARANGAY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`, `BARANGAY`) VALUES
(111, 'Negros Occidental', 'Bacolod City', ''),
(112, 'Negros Occidental', 'Bacolod City', ''),
(113, 'Batangas', 'Batangas', ''),
(114, 'Negros Occidental', 'Himamaylan', ''),
(115, 'Batangas', 'Batangas City', 'Bolbok'),
(116, 'Negros Occidental', 'Isabella', ''),
(126, 'Negros Occidental', 'Binalbagan', ''),
(130, 'Cebu', 'Bogo City', ''),
(131, 'Negros Occidental', 'Himamaylan', ''),
(132, 'Negros', 'Jupiter', ''),
(133, 'Aincrad', 'Floor 91', ''),
(134, 'negros', 'binalbagan', ''),
(135, 'hehe', 'tehee', ''),
(136, 'PLANET YEKOK', 'KOKEY', ''),
(137, 'Camiguin', 'Catarman', ''),
(138, 'Camiguin', 'Catarman', ''),
(139, 'Negros Occidental', 'Binalbagan', ''),
(140, 'Batangas', 'Lemery', ''),
(141, 'Capiz', 'Panay', ''),
(142, 'Camarines Norte', 'Labo', ''),
(143, 'Camarines Norte', 'Labo', ''),
(144, 'Camarines Norte', 'Labo', ''),
(145, 'Camarines Norte', 'Labo', ''),
(146, 'Capiz', 'Pilar', ''),
(147, 'Negros Occidental', 'Moises Padilla', ''),
(148, 'a', 'a', ''),
(149, '1', '1', ''),
(150, 'Negros Occidental', 'Himamaylan', ''),
(151, 'Masbate', 'Mandaon', ''),
(152, 'Aklanas', 'Madalagsasa', ''),
(153, 'Batangas', 'Mabini', ''),
(154, 'Bataan', 'Morong', ''),
(155, 'Batangas', 'Bauan', 'Poblacion'),
(156, 'Batangas', 'Bauan', ''),
(157, 'Camarines Norte', 'Labo', ''),
(158, 'Negros Occidental', 'Binalbagan', ''),
(159, 'Batangas', 'Bauan', 'Poblacion'),
(160, 'Batangas', 'Batangas', 'Bolbok'),
(161, 'Batangas', 'Batangas', 'Kumintang Ibaba'),
(162, 'Batangas', 'Batangas City', ''),
(163, 'Batangas', 'Batangas City', ''),
(164, 'Batangas', 'Batangas City', '');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`FIRST_NAME`, `LAST_NAME`, `LOCATION_ID`, `EMAIL`, `PHONE_NUMBER`) VALUES
('Prince Ly', 'Cesar', 113, 'PC@00', '09124033805'),
('Emman', 'Adventures', 116, 'emman@', '09123346576'),
('Bruce', 'Willis', 113, 'bruce@', NULL),
('Regine', 'Santos', 111, 'regine@', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(20) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `QTY_STOCK` int(50) DEFAULT NULL,
  `ON_HAND` int(250) NOT NULL,
  `PRICE` int(50) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `BRANCH_ID` int(11) DEFAULT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_CODE`, `NAME`, `DESCRIPTION`, `QTY_STOCK`, `ON_HAND`, `PRICE`, `CATEGORY_ID`, `BRANCH_ID`, `DATE_STOCK_IN`) VALUES
(17, 'Louviton', 'Louviton Bag', 'a', 104, 25, 25000, 1, 12, '2024-02-29'),
(18, 'Nmax', 'Nmax', 'a', 19, 25, 70000, 3, 12, '2024-03-01'),
(19, 'Sardines', 'Sardines', 'asd', 25, 25, 23, 4, 12, '2024-02-29'),
(21, 'sheins', 'sheins', 'sheins', 25, 25, 2500, 1, 12, '2024-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `stocklogs`
--

CREATE TABLE `stocklogs` (
  `id` bigint(20) NOT NULL,
  `product_id` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `qty` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocklogs`
--

INSERT INTO `stocklogs` (`id`, `product_id`, `type`, `qty`, `datetime`) VALUES
(1, '17', 'stock_in', 5, '2024-02-24 16:40:05'),
(2, '21', 'stock_in', 25, '2024-02-24 16:43:30'),
(3, '17', 'stock_out', 2, '2024-02-24 16:50:47'),
(4, '17', 'stock_out', 4, '2024-02-24 16:56:13'),
(5, '18', 'stock_out', 6, '2024-02-24 16:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `T_DATE` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`, `T_DATE`) VALUES
(3, 11, '2', '40,000.00', '4,285.71', '35,714.29', '4,285.71', '40,000.00', '40000', '2024-02-24 06:28 am', '022462904', '2024-02-24'),
(4, 11, '1', '75,000.00', '8,035.71', '66,964.29', '8,035.71', '75,000.00', '75,000.00', '2024-02-24 06:33 am', '022463308', '2024-02-24'),
(5, 11, '1', '75,000.00', '8,035.71', '66,964.29', '8,035.71', '75,000.00', '75,000.00', '2024-02-24 06:33 am', '022463343', '2024-02-24'),
(6, 11, '1', '15,000.00', '1,607.14', '13,392.86', '1,607.14', '15,000.00', '15,000.00', '2024-02-24 06:47 am', '022464708', '2024-02-24'),
(7, 11, '1', '50,000.00', '5,357.14', '44,642.86', '5,357.14', '50,000.00', '50,000.00', '2024-02-24 09:50 am', '022495047', '2024-02-24'),
(8, 11, '2', '520,000.00', '55,714.29', '464,285.71', '55,714.29', '520,000.00', '520,000.00', '2024-02-24 09:56 am', '022495613', '2024-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL,
  `DATE` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`, `DATE`) VALUES
(36, '022462904', 'Louviton Bag', '1', '25000', 'Catherine', 'Cashier', '2024-02-24'),
(37, '022462904', 'iphone 14 pro max', '1', '15000', 'Catherine', 'Cashier', '2024-02-24'),
(38, '022463308', 'Louviton Bag', '3', '25000', 'Catherine', 'Cashier', '2024-02-24'),
(39, '022463343', 'Louviton Bag', '3', '25000', 'Catherine', 'Cashier', '2024-02-24'),
(40, '022464708', 'iphone 14 pro max', '1', '15000', 'Catherine', 'Cashier', '2024-02-24'),
(41, '022495047', 'Louviton Bag', '2', '25000', 'Catherine', 'Cashier', '2024-02-24'),
(42, '022495613', 'Louviton Bag', '4', '25000', 'Catherine', 'Cashier', '2024-02-24'),
(43, '022495613', 'Nmax', '6', '70000', 'Catherine', 'Cashier', '2024-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`) VALUES
(1, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(7, 2, 'Cath', '1d535b9244ccf8fd8d4425c4b037812b946a7d5e', 2),
(10, 5, 'Roxanne', '3890cbdc37c19ddab74173b709a23beba91a9325', 2),
(11, 6, 'Angela', 'abae854dceb7a01ab186d14e8e024480e917af31', 2),
(12, 7, 'Dexter', 'c935745342117f46a4c2a2ac5080939a539d5072', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`BRANCH_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD UNIQUE KEY `NAME` (`NAME`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `BRANCH_ID` (`BRANCH_ID`);

--
-- Indexes for table `stocklogs`
--
ALTER TABLE `stocklogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`),
  ADD KEY `TRANS_DETAIL_ID` (`TRANS_D_ID`),
  ADD KEY `CUST_ID` (`CUST_ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`) USING BTREE;

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`),
  ADD KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stocklogs`
--
ALTER TABLE `stocklogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`JOB_ID`) REFERENCES `job` (`JOB_ID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`BRANCH_ID`) REFERENCES `branches` (`BRANCH_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`TRANS_D_ID`) REFERENCES `transaction_details` (`TRANS_D_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`TYPE_ID`) REFERENCES `type` (`TYPE_ID`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
