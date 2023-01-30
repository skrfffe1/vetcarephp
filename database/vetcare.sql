-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 03:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `appoinment_date` date NOT NULL,
  `appointment_time` text NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `provincial_Add` varchar(100) NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `pet_name` varchar(100) NOT NULL,
  `reason_of_appointment` varchar(100) NOT NULL,
  `status_sched` varchar(100) NOT NULL,
  `other_reasons` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_id`, `owner_name`, `appoinment_date`, `appointment_time`, `email_address`, `provincial_Add`, `contact_num`, `pet_name`, `reason_of_appointment`, `status_sched`, `other_reasons`) VALUES
(38, 'Ampatin, Danil Jeus P.', '2022-10-03', '13:56', 'djampatin@gmail.com', 'Brgy.81 Marasbaras Tacloban City', '09773135843', 'Julius', 'Vaccination', 'In Process', 'ada'),
(50, 'Libut, Jeminah Mae M.', '2022-10-09', '19:00', 'Jeminah@gmail.com', 'Brgy.81 Marasbaras Tacloban City', '09773135843', 'Drax', 'Pet Surgery', 'In Process', 'inflamation'),
(51, 'Ampatin, Marilyn P.', '2022-10-09', '08:29', 'marilyn@gmail.com', 'Brgy.81 Marasbaras Tacloban City', '09773135843', 'Trix', 'Vaccination', 'Booked', 'Allergy'),
(52, 'Bondalo, Trixia Ann A.', '2022-10-09', '07:30', 'Trixia@gmail,com', 'Brgy.81 Marasbaras Tacloban City', '09773135843', 'Shizu', 'Pet Surgery', 'In Process', 'Eye surgery'),
(53, 'Ampatin, Andrick O.', '2022-10-11', '08:06', 'Andrick@gmail.com', 'Brgy.81 Marasbaras Tacloban City', '09685175363', 'Dracor', 'Vaccination', 'Completed', 'Allergy');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `consult_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `examination` varchar(200) NOT NULL,
  `test` varchar(200) NOT NULL,
  `d_diagnosis` varchar(200) NOT NULL,
  `c_diagnosis` varchar(200) NOT NULL,
  `treatment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`consult_id`, `p_name`, `l_name`, `examination`, `test`, `d_diagnosis`, `c_diagnosis`, `treatment`) VALUES
(1, 'Ricky', 'Holmes', 'wow', 'goods', 'all goods', 'wtf', 'ez'),
(2, 'Ricky2', 'Holmes2', 'qweweqweq', 'eqwewqeqwewq', 'wqeqwewq', 'qweqwew', 'qeqweqewq'),
(6, 'wdaw', 'awdaaw', 'adwaadwdawwadwadwa d wawa wagdi abytdyu taudt waut duaw vuyd vauy adwa', 'aawdwa', 'wadwa', 'wdawdwa', 'wadwa'),
(7, 'wadawdwa', 'wdadwa', 'wdadwadwadwadwadwadwa wawdwa awd gwayjgd ajygbtabi udbau duya bdwa dagbdagwudbyugdab ydu gauybg dy awb dayud ayug dyugayuwgd ayuwdyu awyugd yuag yugduya wbyugd abgyudbwyuabyudyu agbwudy uawfd aiyfgyag', 'wadwadwad', 'wadwadwa', 'wadwad', 'wadwa');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `to_id`, `messages`, `status`) VALUES
(26, 26, 'Your Appointment Has been Booked. Thank you for Trusting us.', 0),
(27, 26, 'Your Appointment Has Been Cancelled. Sorry for the Inconvenience.', 0),
(28, 26, 'Your Appointment has been confirmed. Thank you for choosing our services.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type_of_user` varchar(100) NOT NULL DEFAULT 'user',
  `email` varchar(100) NOT NULL,
  `num` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `type_of_user`, `email`, `num`) VALUES
(13, 'Rose Ann Palamos', 'admin', 'admin123', 'Admin', 'rosaspalamos@gmail.com', '09508682832'),
(18, 'Danil Jeus Ampatin', 'receptionist', 'receptionist123', 'Receptionist', 'linadsuej@gmail.com', '09610567363'),
(19, 'Edgar Lobio Bohol', 'Doctor', 'doctor123', 'Doctor', 'edgarbohol@gmail.com', '09488437359'),
(26, 'Danil Jeus Ampatin', 'Patient', 'patient123', 'Patient', 'djampatin@gmail.com', '09773135843'),
(28, 'poppy', 'poppy', 'poppy123', 'Patient', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`consult_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `consult_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
