-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2023 at 05:01 AM
-- Server version: 8.0.34-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phoebe_f1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bio`
--

CREATE TABLE `Bio` (
  `BioID` int NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Nationality` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Bio`
--

INSERT INTO `Bio` (`BioID`, `Fname`, `Lname`, `DOB`, `Nationality`, `Description`) VALUES
(1, 'Max', 'Verstappen', '1997-09-30', 'Dutch', ''),
(2, 'Sergio', 'Perez', '1990-01-26', 'Mexican', ''),
(3, 'Lewis', 'Hamilton', '1985-01-07', 'British', ''),
(4, 'George', 'Russell', '1998-02-15', 'British', ''),
(5, 'Charles', 'Leclerc', '1997-10-16', 'Monegauqe', ''),
(6, 'Carlos', 'Sainz', '1994-09-01', 'Spanish', ''),
(7, 'Lando', 'Norris', '1999-11-13', 'British', ''),
(8, 'Oscar', 'Piastri', '2001-04-06', 'Australian', ''),
(9, 'Nyck', 'De Vries', '1995-02-06', 'Dutch', 'Got his f1 seat after filling in for alex albon at the italian grand prix in 2022 but then underperformed so he lost his seat mid 2023 season'),
(10, 'Yuki', 'Tsunoda', '2000-05-11', 'Japanese', 'hes vibing'),
(11, 'Fernando', 'Alsonso', '1981-07-29', 'Spanish', 'hes did very well at the start of th 2023 season now hes just chilling'),
(12, 'Lance', 'Stroll', '1998-10-29', 'Canadian', 'hes lving off daddies money and team'),
(13, 'Valteri', 'Bottas', '1989-08-28', 'Finnish', 'he won many races for mercedes but then got shipped off to alpha romero where he is chilling'),
(14, 'Guanyu', 'Zhou', '1999-05-30', 'Chinese', ''),
(15, 'Pierre', 'Gasly', '1996-02-07', 'French', ''),
(16, 'Esteban', 'Ocon', '1996-09-17', 'French', ''),
(17, 'Nico', 'Hulkenberg', '1992-10-05', 'German', 'hes jst vibing'),
(18, 'Kevin', 'Magnussen', '1987-08-19', 'Danish', 'he gt his first pole in 2022 brazil sprint race'),
(19, 'Alex', 'Albon', '1996-03-23', 'Brithish/Thai', 'hes doing welll in a williams (better than george russell ever did)'),
(20, 'Logan ', 'Sargent', '2000-12-31', 'American', 'hes doing ok'),
(21, 'Daniel', 'Riccardo', '1989-07-01', 'Australian', 'he lost his seat at mclaren due to rookie oscar piastri joinging mclaren so he was left without a seat for the 2023 season. He joined redbull as a 3rd driver that they used for media duties who was also the reserve driver but was then called up to alpha tauri when rookie nyck devries under perofmed'),
(22, 'Liam', 'Lawson', '2002-02-11', 'New Zealand', 'his 3rd race ever is singapore wherre he gtoi his frst points'),
(29, 'Charles', 'leclerc', '1997-09-30', 'Dutch', '');

-- --------------------------------------------------------

--
-- Table structure for table `Driver`
--

CREATE TABLE `Driver` (
  `DriverID` int NOT NULL COMMENT 'their driver number',
  `BioID` int NOT NULL COMMENT 'FK from Bio table',
  `TeamID` int DEFAULT NULL COMMENT 'FK from teams table',
  `Poles` int NOT NULL COMMENT 'how many pole positions thy have',
  `Wins` int NOT NULL COMMENT 'how many wins they have',
  `Championships` int NOT NULL COMMENT 'How many championships they have',
  `Image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'image name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Driver`
--

INSERT INTO `Driver` (`DriverID`, `BioID`, `TeamID`, `Poles`, `Wins`, `Championships`, `Image`) VALUES
(1, 1, 1, 44, 27, 2, 'max_verstappen.jpg'),
(2, 20, 10, 0, 0, 0, 'logan_sargent.jpg'),
(3, 21, 7, 3, 8, 0, 'daniel_riccardo.jpg'),
(4, 7, 4, 1, 0, 0, 'lando_norris.jpg'),
(10, 15, 5, 0, 1, 0, 'pierre_gasly.jpg'),
(11, 2, 1, 3, 6, 0, 'sergio_perez.jpg'),
(14, 11, 9, 22, 32, 2, 'fernanando_alonso.jpg'),
(16, 5, 2, 19, 5, 0, 'charles_leclerc.jpg'),
(18, 12, 9, 1, 0, 0, 'lance_stroll.jpg'),
(20, 18, 8, 1, 0, 0, 'kevin_magnussen.jpg'),
(21, 9, 7, 0, 0, 0, NULL),
(22, 10, 7, 0, 0, 0, 'yuki_tsundoa.jpg'),
(23, 19, 10, 0, 0, 0, 'alex_albon.jpg'),
(24, 14, 6, 0, 0, 0, 'zhou_guanyu.jpg'),
(27, 17, 8, 1, 0, 0, 'nico_hulkenberg.jpg'),
(31, 16, 5, 0, 1, 0, 'esteban_ocon.jpg'),
(40, 22, 7, 0, 0, 0, 'liamlawson.jpg'),
(44, 3, 3, 104, 103, 7, 'lewis_hamilton.jpg'),
(55, 6, 2, 3, 1, 0, 'carlos_sainz.jpg'),
(63, 4, 3, 1, 1, 0, 'george_russell.jpg'),
(77, 13, 6, 20, 10, 0, 'valtteri_bottas.jpg'),
(81, 8, 4, 0, 0, 0, 'oscar_piastri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Race`
--

CREATE TABLE `Race` (
  `RaceID` int NOT NULL COMMENT 'primary key for the race table',
  `RaceName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'name of the race ',
  `DateTime` datetime NOT NULL COMMENT 'time and date that the race is',
  `TrackID` int NOT NULL COMMENT 'fk to the rack tabel',
  `DriverID` int DEFAULT NULL COMMENT 'fk for the winner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Race`
--

INSERT INTO `Race` (`RaceID`, `RaceName`, `DateTime`, `TrackID`, `DriverID`) VALUES
(1, 'FORMULA 1 GULF AIR BAHRAIN GRAND PRIX 2023', '2023-03-06 04:00:00', 1, 1),
(2, 'FORMULA 1 STC SAUDI ARABIAN GRAND PRIX 2023', '2023-03-20 06:00:00', 2, 11),
(3, 'FORMULA 1 ROLEX AUSTRALIAN GRAND PRIX 2023', '2023-04-02 17:00:00', 3, 1),
(4, 'FORMULA 1 AZERBAIJAN GRAND PRIX 2023', '2023-04-30 11:00:00', 4, 11),
(5, 'FORMULA 1 CRYPTO.COM MIAMI GRAND PRIX 2023', '2023-05-08 07:30:00', 5, 1),
(6, 'FORMULA 1 QATAR AIRWAYS GRAN PREMIO DEL MADE IN ITALY E DELL\'EMILIA-ROMAGNA 2023', '2023-05-22 01:00:00', 6, NULL),
(7, 'FORMULA 1 GRAND PRIX DE MONACO 2023', '2023-05-29 02:00:00', 7, 1),
(8, 'FORMULA 1 AWS GRAN PREMIO DE ESPANA 2023', '2023-06-05 01:00:00', 8, 1),
(9, 'FORMULA 1 PIRELLI GRAND PRIX DU CANADA 2023', '2023-06-19 06:00:00', 9, 1),
(10, 'FORMULA 1 ROLEX GROSSER PREIS VON OSTERREICH', '2023-07-03 01:00:00', 10, 1),
(11, 'FORMULA 1 ARAMCO BRITISH GRAND PRIX 2023', '2023-07-10 02:00:00', 11, 1),
(12, 'FORMULA 1 QATAR AIRWAYS HUNGARIAN GRAND PRIX 2023', '2023-07-24 01:00:00', 12, 1),
(13, 'FORMULA 1 MSC CRUISES BELGIAN GRAND PRIX 2023', '2023-07-31 01:00:00', 13, 1),
(14, 'FORMULA 1 HEINEKEN DUTCH GRAND PRIX 2023', '2023-08-28 01:00:00', 14, 1),
(15, 'FORMILA 1 PIRELLI GRAN PREMIO D\'ITALIA 2023', '2023-09-04 01:00:00', 15, 1),
(16, 'FORMULA 1 SINGAPORE AIRLINES SINGAPORE GRAND PRIX 2023', '2023-09-18 00:00:00', 16, NULL),
(17, 'FORMULA 1 LENOVO JAPANESE GRAND PRIX 2023', '2023-09-24 18:00:00', 17, NULL),
(18, 'FORMULA 1 QATAR AIRWAYS QATAR GRAND PRIX 2023', '2023-10-09 06:00:00', 18, NULL),
(19, 'FORMULA 1 LENOVO UNITED STATES GRAND PRIX 2023', '2023-10-23 08:00:00', 19, NULL),
(20, 'FORMULA 1 GRAN PREMIO DE LA CIUDAD DE MEXICO 2023', '2023-10-30 09:00:00', 20, NULL),
(21, 'FORMULA 1 ROLEX GRANDE PREMIO DE SAO PAULO 2023', '2023-11-06 06:00:00', 21, NULL),
(22, 'FORMULA 1 HEINEKEN SILVER LAS VEGAS GRAND PRIX 2023', '2023-11-19 19:00:00', 22, NULL),
(23, 'FORMULA 1 ETHIHAD AIRWAYS ABU DHABI GRAND PRIX 2023', '2023-11-27 02:00:00', 23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE `Team` (
  `TeamID` int NOT NULL COMMENT 'primary key for driver table',
  `TeamName` varchar(20) NOT NULL COMMENT 'team name',
  `TPFname` varchar(20) NOT NULL COMMENT 'the team principles first name',
  `TPLname` varchar(20) NOT NULL COMMENT 'team principles last name',
  `Location` varchar(40) NOT NULL COMMENT 'Location of headquarters',
  `Image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`TeamID`, `TeamName`, `TPFname`, `TPLname`, `Location`, `Image`) VALUES
(1, 'Red Bull Racing', 'Christian', 'Horner', 'Milton Keys', 'redbull.jpg'),
(2, 'Ferrari', 'Mattia', 'Binotto', 'Maranello, Italy', 'ferrari (2).jpg'),
(3, 'Mercedes', 'Toto', 'Wolff', 'Brackley', 'mercedes.jpg'),
(4, 'Mclaren', 'Andreas', 'Seidl', 'Woking, England', 'mclaren.jpg'),
(5, 'Alpine', 'Otmar', 'Szafnauer', 'Enstone', 'alpine.jpg'),
(6, 'Alfa Romeo', 'Frederic', 'Vasseur', 'Hinwil, Switzerland', 'alfaromeo.jpg'),
(7, 'Alpha Tauri', 'Franz', 'Tost', 'Faenza, Italy', 'alphatauri.jpg'),
(8, 'Haas F1 Team', 'Guenther', 'Steiner', 'Kannapolis, North Carolina', 'haas.jpg'),
(9, 'Aston Martin', 'Mike', 'Krack', 'Silverstone', 'astonmartin.jpg'),
(10, 'Williams', 'Jost', 'Capito', 'Grove, Oxfordshire', 'williams.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Track`
--

CREATE TABLE `Track` (
  `TrackID` int NOT NULL,
  `TrackName` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'name of track',
  `Location` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'what country track is in',
  `Circuit_Length` float(4,3) NOT NULL COMMENT 'Length in km in one lap',
  `Total_distance` float(6,3) NOT NULL COMMENT 'length for entire race',
  `N_Laps` int NOT NULL COMMENT 'laps in race',
  `First_GP` year NOT NULL COMMENT 'year of first Grand Prix',
  `LR_Time` time DEFAULT NULL COMMENT 'Fastest time set in the race',
  `DriverID` int DEFAULT NULL COMMENT 'DriverID of driver who set the fastest lap if they are still on the grid',
  `Corners` int NOT NULL COMMENT 'Number of corners in a lap',
  `Drs_zones` int NOT NULL COMMENT 'Number of drs detection points on the track',
  `TrackImage` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'file name for image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Track`
--

INSERT INTO `Track` (`TrackID`, `TrackName`, `Location`, `Circuit_Length`, `Total_distance`, `N_Laps`, `First_GP`, `LR_Time`, `DriverID`, `Corners`, `Drs_zones`, `TrackImage`) VALUES
(1, 'Bahrain International Circuit', 'Sakhir', 5.421, 308.238, 57, 2004, '01:31:00', NULL, 15, 3, 'bahrain.jpg'),
(2, 'Jeddah Corniche Circuit', 'Saudi Arabia', 6.174, 308.450, 50, 2021, '01:30:01', 44, 27, 3, 'jeddah.jpg'),
(3, 'Albert Park Circuit', 'Australia', 5.278, 306.124, 58, 1996, '01:20:00', 16, 14, 2, 'australia.jpg'),
(4, 'Baku City Circuit', 'Azerbaijan', 6.003, 306.049, 51, 2016, '01:43:00', 16, 20, 2, 'baku.jpg'),
(5, 'Miami International Autodrome', 'America', 5.412, 308.326, 57, 2022, '01:31:00', 1, 19, 3, 'miami.jpg'),
(6, 'Autodromo Enzo e Dino Ferrari', 'Italy', 4.909, 309.049, 63, 1980, '01:15:00', 44, 19, 1, 'emiliaromanga.jpg'),
(7, 'Circuit de Monaco', 'Monaco', 3.337, 260.286, 78, 1950, '01:12:01', 44, 19, 1, 'monaco.jpg'),
(8, 'Circuit do Barcelona-Catalunya', 'Spain', 4.675, 308.424, 66, 1991, '01:18:00', 1, 16, 2, 'spain.jpg'),
(9, 'Circuit Gilles-Villeneuve', 'Canada', 4.361, 305.270, 70, 1978, '01:13:00', 77, 14, 2, 'canada.jpg'),
(10, 'Red Bull Ring', 'Austria', 4.381, 306.452, 71, 1970, '01:05:01', 55, 10, 3, 'redbullring.jpg'),
(11, 'Silverstone Circuit', 'England', 5.819, 306.198, 52, 1950, '01:27:00', 1, 18, 2, 'silverstone.jpg'),
(12, 'Hungaroring', 'Hungary', 4.381, 306.630, 70, 1986, '01:16:01', 44, 14, 3, 'hungary.jpg'),
(13, 'Circuit de Spa-Francorchamps', 'Belgium', 7.004, 308.052, 44, 1950, '01:46:00', 77, 19, 2, 'spa.jpg'),
(14, 'Circuit Park Zandvoort', 'Netherlands', 4.295, 307.587, 72, 1952, '01:11:00', 44, 14, 2, 'netherlands.jpg'),
(15, 'Autodromo Nazionale Monza', 'Italy', 4.793, 306.720, 53, 1950, '01:21:00', NULL, 11, 2, 'monza.jpg'),
(16, 'Marina Bay Street Circuit', 'Singapore', 5.063, 308.706, 61, 2008, '01:41:01', 20, 23, 3, 'singapore.jpg'),
(17, 'Suzuka International Racing Course', 'Japan', 5.807, 307.471, 53, 1987, '01:30:01', 44, 18, 1, 'suzuka.jpg'),
(18, 'Lusail International Circuit', 'Losail', 5.830, 306.660, 57, 2021, '01:23:00', 1, 16, 1, 'quatar.jpg'),
(19, 'Circuit of the Americas', 'America', 5.513, 308.405, 56, 2012, '01:36:00', 16, 20, 2, 'america.jpg'),
(20, 'Autódromo Hermanos Rodríguez', 'Mexico', 4.340, 305.354, 71, 1963, '01:17:01', 77, 17, 3, 'mexico.jpg'),
(21, 'Autódromo José Carlos Pace', 'Brazil', 4.309, 305.879, 71, 1973, '01:10:01', 77, 15, 2, 'brazil.jpg'),
(22, 'HEINEKEN SILVER LAS VEGAS GRAND PRIX', 'America', 6.120, 305.880, 50, 2023, NULL, NULL, 17, 0, 'LA.jpg'),
(23, 'Yas Marina Circuit', 'Abu Dhabi', 5.281, 305.183, 58, 2009, '01:26:00', 1, 16, 2, 'abudahbi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int NOT NULL,
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rank` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `Rank`) VALUES
(1, 'Admin', '$2y$10$rSmATxAYNA8aW9wqzN/0EO5CAxcc8H9336FJYa9oNXbdvz9SQP5rm', 'admin'),
(2, 'Redbull', '$2y$10$kONs38rjQmkUEKWgN3IRt.wo966cB253zjECtYQKqxeZJlzZtRzpy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bio`
--
ALTER TABLE `Bio`
  ADD PRIMARY KEY (`BioID`);

--
-- Indexes for table `Driver`
--
ALTER TABLE `Driver`
  ADD UNIQUE KEY `DriverID` (`DriverID`),
  ADD KEY `BioID` (`BioID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indexes for table `Race`
--
ALTER TABLE `Race`
  ADD PRIMARY KEY (`RaceID`),
  ADD KEY `RaceName` (`RaceName`),
  ADD KEY `TrackID` (`TrackID`),
  ADD KEY `DriverID` (`DriverID`);

--
-- Indexes for table `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`TeamID`);

--
-- Indexes for table `Track`
--
ALTER TABLE `Track`
  ADD UNIQUE KEY `TrackID` (`TrackID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bio`
--
ALTER TABLE `Bio`
  MODIFY `BioID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Race`
--
ALTER TABLE `Race`
  MODIFY `RaceID` int NOT NULL AUTO_INCREMENT COMMENT 'primary key for the race table', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Team`
--
ALTER TABLE `Team`
  MODIFY `TeamID` int NOT NULL AUTO_INCREMENT COMMENT 'primary key for driver table', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Track`
--
ALTER TABLE `Track`
  MODIFY `TrackID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Driver`
--
ALTER TABLE `Driver`
  ADD CONSTRAINT `Driver_ibfk_1` FOREIGN KEY (`BioID`) REFERENCES `Bio` (`BioID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Driver_ibfk_2` FOREIGN KEY (`TeamID`) REFERENCES `Team` (`TeamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Race`
--
ALTER TABLE `Race`
  ADD CONSTRAINT `Race_ibfk_1` FOREIGN KEY (`TrackID`) REFERENCES `Track` (`TrackID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Race_ibfk_2` FOREIGN KEY (`DriverID`) REFERENCES `Driver` (`DriverID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
