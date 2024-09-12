-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2023 at 06:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`) VALUES
(1, 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `condition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `make`, `model`, `condition`) VALUES
(1, 'testmake', 'testmodel', 'bad'),
(2, 'car2', 'car2model', 'good'),
(3, 'car3', 'car3model', 'better'),
(4, 'test4make', 'test4model', 'better'),
(5, 'car5', 'car5', 'bad');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `phone_number`, `password`) VALUES
('1', 'Aparna Bathula', 'aparna.bathula@okstate.edu', '4052691923', 'test'),
('10', 'tester', 'tester@gmail.com', '63478843', 'tester'),
('2', 'test', 'test@gmail.com', '4052691927', '1234'),
('3', 'test1', 'test@gmail.com', '34325325', '1234'),
('9', 'admin', 'admin@gmail.com', '75837985', 'admin');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `CustomerRegistrationTrigger` AFTER INSERT ON `customer` FOR EACH ROW BEGIN
    INSERT INTO CustomerRegistrationLog (customer_id, event_description, event_timestamp)
    VALUES (NEW.customer_id, 'Customer Registered', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `CustomerRegistrationLog`
--

CREATE TABLE `CustomerRegistrationLog` (
  `log_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `event_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `customer_id`, `car_id`) VALUES
(653883, 1, 1),
(65396, 2, 3),
(653991, 2, 5),
(0, 10, 1),
(65388000, 10, 1);

--
-- Triggers `reservation`
--
DELIMITER $$
CREATE TRIGGER `ReservationTrigger` AFTER INSERT ON `reservation` FOR EACH ROW BEGIN
    INSERT INTO ReservationLog (reservation_id, car_id, customer_id, event_description, event_timestamp)
    VALUES (NEW.reservation_id, NEW.car_id, NEW.customer_id, 'Reservation Created', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservationdetails`
-- (See below for the actual view)
--
CREATE TABLE `reservationdetails` (
`reservation_id` int(11)
,`customer_name` varchar(255)
,`make` varchar(255)
,`model` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `ReservationLog`
--

CREATE TABLE `ReservationLog` (
  `log_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `event_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `reservationdetails`
--
DROP TABLE IF EXISTS `reservationdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reservationdetails`  AS SELECT `r`.`reservation_id` AS `reservation_id`, `c`.`name` AS `customer_name`, `ca`.`make` AS `make`, `ca`.`model` AS `model` FROM ((`reservation` `r` join `customer` `c` on(`r`.`customer_id` = `c`.`customer_id`)) join `car` `ca` on(`r`.`car_id` = `ca`.`car_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `CustomerRegistrationLog`
--
-- ALTER TABLE `CustomerRegistrationLog`
--   ADD PRIMARY KEY (`log_id`);
-- DELIMITER //
-- CREATE PROCEDURE BookCar(IN customer_id INT, IN car_id INT, OUT reservation_id INT)
-- BEGIN
--     DECLARE car_available INT;
--     
--     -- Check if the car is available
--     SELECT COUNT(*) INTO car_available FROM reservation WHERE car_id = car_id;
--     
--     IF car_available = 0 THEN
--         -- Car is available, create a reservation
--         INSERT INTO reservation (car_id, customer_id) VALUES (car_id, customer_id);
--         SET reservation_id = LAST_INSERT_ID();
--     ELSE
--         -- Car is not available
--         SET reservation_id = -1;
--     END IF;
-- END;
//
DELIMITER ;

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_id` (`customer_id`,`car_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `ReservationLog`
--
ALTER TABLE `ReservationLog`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CustomerRegistrationLog`
--
ALTER TABLE `CustomerRegistrationLog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ReservationLog`
--
ALTER TABLE `ReservationLog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
