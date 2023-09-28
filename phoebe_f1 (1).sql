-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2023 at 08:50 AM
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
(1, 'Max', 'Verstappen', '1997-09-30', 'Dutch', 'Max first joined formula 1 in 2015 in Torro Rosso (now called Alpha Tauri) before he switched to Red Bull in 2016 where he has stayed ever since. In 2021, he won his first ever world championship and in 2022 he claimed the championship in Japan. He is currently on track to get his 3rd world championship this year in 2023.'),
(2, 'Sergio', 'Perez', '1990-01-26', 'Mexican', 'Checo joined formula 1 in 2011 driving for Sauber. In 2020 he won his first race at the bahrain grand prix, this caught the eye of Redbull who he signed with in 2021 and has been ever since.'),
(3, 'Lewis', 'Hamilton', '1985-01-07', 'British', 'Lewis joined formula 1 in 2007 with McLaren where he won his first few races. The following year he won his first of many world championships. In 2013 he moved to mercedes where he has been ever since. His last title win was in 2020  as he lost the battle at the end of the 2021 season with max. '),
(4, 'George', 'Russell', '1998-02-15', 'British', 'George joined formula 1 in 2019 with williams after winning the formula 2 championship the previos year. He was able to get a few points before catching the eye of mercedes in the mid 2021 seson before signing with the team in 2022 where he has been ever since and getting his first win at the 2022 sao paulo grand prix which was that last win for mercedes'),
(5, 'Charles', 'Leclerc', '1997-10-16', 'Monegauqe', 'Charles joined formula 1 in 2018 with Alfa Romeo after wining formula 2 in 2017. He then signed with ferrari in 2019 where he has been ever since. '),
(6, 'Carlos', 'Sainz', '1994-09-01', 'Spanish', 'Carlos joined formula 1 in 2015 with Torro Rosso (now called Alpha Tauri). He moved around a few teams befroe signing with Ferrari in 2021 and getting his first win at the 2022 silverstone grand prix.'),
(7, 'Lando', 'Norris', '1999-11-13', 'British', 'Lando joined formula 1 in 2019 with mclaren. He has been there ever since and scored his first pole position at the sochi grand prix in 2020 and has been doing well in the 2023 season with the upgrades done to the McLaren car.'),
(8, 'Oscar', 'Piastri', '2001-04-06', 'Australian', 'Oscar joined formula 1 in the 2023 season with McLaren. He won formula 2 in 2021 and then went to alpine as their reserve driver for a year. He is currently doing well in his rookie season.'),
(9, 'Nyck', 'De Vries', '1995-02-06', 'Dutch', 'Nyck joined formula 1 with Alpha Tauri in 2023. He was able to secure a seat after replacing alex albon in a williams in monza in 2022 due to alex needing to get his appendix removed. He was able to get points in his debut and signed with Alpha Tauri for 2023. Unfortunately, as he was underperforming and not getting any points in the season as the team\'s number one driver he was replaced mid season by daniel riccardo. \r\n'),
(10, 'Yuki', 'Tsunoda', '2000-05-11', 'Japanese', 'Yuki joined formula 1 in 2021 with Alpha Tauri where he is still now. He has been doing well the past couple years with a highest finish of 4th. '),
(11, 'Fernando', 'Alonso', '1981-07-29', 'Spanish', 'Fernando joined formula 1 with Minardi in 2001. He then moved to Renault in being a test driver in 2002 before being promoted to a driver in 2003 where he stayed until the end of the 2006 after gaining two world championships in 2005 and 2006. He then moved to Mclaren in 2007 before leaving after the 2008 season and went back to Renault for th 2009 season. In 2010 he moved to Ferrari for four years until the end of the 1014 season. AFter this he moved back to McLaren from 2015 to 2-18 until he left. He then returned to Alpine in 2021 where he stayed until the end of the 2022 season before removing to Aston Martin where he signed a multi year deal. '),
(12, 'Lance', 'Stroll', '1998-10-29', 'Canadian', 'Lance joined formula 1 with Williams in 2017 where he stayed until he signed with racing point in 2019 where he stayed for two years. He has since moved to Aston martin for the 2021 season where he currently remains.'),
(13, 'Valtteri', 'Bottas', '1989-08-28', 'Finnish', 'Valteri joined formula 1 with Williams in 2013 where he stayed for 3 years before he moved to Mercedes in 2017 replacing Nico Rosberg who left after winning his championship title. He got all of his race wins during his time at mercedes. He then joined Alfa Romeo in 2022 where he is currently. '),
(14, 'Guanyu', 'Zhou', '1999-05-30', 'Chinese', 'Zhou joined formula 1 with alfa romeo in 2022 where he is currently and doing ok in his second season.'),
(15, 'Pierre', 'Gasly', '1996-02-07', 'French', 'Pierre joined formula 1 with Toro Rosso (now Alpha Tauri) in 2017 after winning formula 2 in 2016. He had moved to red bull to a stage before getting replaced mid season and going back to Alpha Tauri where he stayed until 2023 where he switched to Alpine. '),
(16, 'Esteban', 'Ocon', '1996-09-17', 'French', 'Esteban joined formula 1 with Renualt in 2016 after replacing a driver in a race. He then signed with force india for a few year before signing with Alpine in 2021 where he got his first win at the hungarian grand prix.'),
(17, 'Nico', 'Hülkenberg', '1992-10-05', 'German', 'Nico joined formula 1 with Williams in 2010 where he got a pole position for the team. He then moved to force india for the 2012 season then switched to Sauber for the 2014 season before returning to force india in 2014. He then went to Renault for the 2017 season until the 2020 season. He then replaced Sebastian Vettle at the start of the 2022 season in Aston Martin after positive covid tests. And is now driving for Haas in the 2023 season. '),
(18, 'Kevin', 'Magnussen', '1987-08-19', 'Danish', 'Kevin joined formula 1 with McLaren in 2014 and on his debut got a second place finish. He then moved to Renault for a year before moving to Haas in 2017 where he stayed till the end of 2020 due to being replaced by new and upcoming talent. He then returned to Haas in the 2020 season where he currently is.'),
(19, 'Alex', 'Albon', '1996-03-23', 'Brithish/Thai', 'Alex joined formula 1 in 2019 with Toro Rosso (now Alpha Tauri) and midway through the season he was promoted to the second red bull seat alongside max verstappen where he took his first podium. He was then demoted to the reserve driver for the team in 2021 before returning to Williams in 2022 where he currently remains with his highest position being 7th this year. '),
(20, 'Logan ', 'Sargeant', '2000-12-31', 'American', 'Logan joined formula 1 in 2023 with Williams for his rookie season. He has had an average season so far with his highest finish being 11th. '),
(21, 'Daniel', 'Riccardo', '1989-07-01', 'Australian', 'Daniel joined formula 1 with HRT in 2011, he then moved to Toro Rosso (now Alpha Tauri) in 2012. The following year he was promoted to redbull where he won 7 of his races. He moved to Renault for the 2019 and 2020 seasons before moving to McLaren for the 2021 and 2022 seasons. He was bought out of his mclaren contract which was supposed to last till the end of 2023  as mclaren wanted to bring in the rookie, oscar piastri so was left without a seat for the 2023 season. After rookie, nyck de vries was under performing in Alpha Tauri, he was bought in to replace him mid season as their driver but unfortunately broke his hand during practice in netherlands. '),
(22, 'Liam', 'Lawson', '2002-02-11', 'New Zealand', 'Liam joined formula 1 in 2023 with Alpha Tauri. He joined as a replacement after daniel riccardo broke his hand during practice in netherlands and managed to get his first points  two races later at the singapore grand prix. ');

-- --------------------------------------------------------

--
-- Table structure for table `Driver`
--

CREATE TABLE `Driver` (
  `DriverID` int NOT NULL COMMENT 'their driver number',
  `BioID` int NOT NULL COMMENT 'FK from Bio table',
  `TeamID` int DEFAULT NULL COMMENT 'FK from teams table',
  `Poles` int UNSIGNED NOT NULL COMMENT 'how many pole positions thy have',
  `Wins` int UNSIGNED NOT NULL COMMENT 'how many wins they have',
  `Championships` int UNSIGNED NOT NULL COMMENT 'How many championships they have',
  `Image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'image name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Driver`
--

INSERT INTO `Driver` (`DriverID`, `BioID`, `TeamID`, `Poles`, `Wins`, `Championships`, `Image`) VALUES
(1, 1, 1, 28, 47, 2, 'max_verstappen.jpg'),
(2, 20, 10, 0, 0, 0, 'logan_sargent.jpg'),
(3, 21, 7, 3, 8, 0, 'daniel_riccardo.jpg'),
(4, 7, 4, 1, 0, 0, 'lando_norris.jpg'),
(10, 15, 5, 0, 1, 0, 'pierre_gasly.jpg'),
(11, 2, 1, 3, 6, 0, 'sergio_perez.jpg'),
(14, 11, 9, 22, 32, 2, 'fernanando_alonso.jpg'),
(16, 5, 2, 20, 5, 0, 'charles_leclerc.jpg'),
(18, 12, 9, 1, 0, 0, 'lance_stroll.jpg'),
(20, 18, 8, 1, 0, 0, 'kevin_magnussen.jpg'),
(21, 9, 7, 0, 0, 0, 'nyck_devries.jpg'),
(22, 10, 7, 0, 0, 0, 'yuki_tsundoa.jpg'),
(23, 19, 10, 0, 0, 0, 'alex_albon.jpg'),
(24, 14, 6, 0, 0, 0, 'zhou_guanyu.jpg'),
(27, 17, 8, 1, 0, 0, 'nico_hulkenberg.jpg'),
(31, 16, 5, 0, 1, 0, 'esteban_ocon.jpg'),
(40, 22, 7, 0, 0, 0, 'liamlawson.jpg'),
(44, 3, 3, 104, 103, 7, 'lewis_hamilton.jpg'),
(55, 6, 2, 5, 2, 0, 'carlos_sainz.jpg'),
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
  `TeamName` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'team name',
  `TPFname` varchar(20) NOT NULL COMMENT 'the team principles first name',
  `TPLname` varchar(20) NOT NULL COMMENT 'team principles last name',
  `Location` varchar(40) NOT NULL COMMENT 'Location of headquarters',
  `Image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`TeamID`, `TeamName`, `TPFname`, `TPLname`, `Location`, `Image`) VALUES
(1, 'Red Bull Racing', 'Christian', 'Horner', 'Milton Keys, United Kingdom', 'redbull.jpg'),
(2, 'Scuderia Ferrari', 'Frédéric ', 'Vasseur', 'Maranello, Italy', 'ferrari (2).jpg'),
(3, 'Mercedes-AMG PETRONAS F1 Team', 'Toto', 'Wolff', 'Brackley, United Kingdom', 'mercedes.jpg'),
(4, 'McLaren Formula 1 Team', 'Andrea', 'Stella', 'Woking, United Kingdom', 'mclaren.jpg'),
(5, 'BWT Alpine F1 Team', 'Bruno', 'Famin', 'Enstone, United Kingdom', 'alpine.jpg'),
(6, 'Alfa Romeo F1 Team Stake', 'Alessandro', 'Alunni Bravi', 'Hinwil, Switzerland', 'alfaromeo.jpg'),
(7, 'Alpha Tauri', 'Franz', 'Tost', 'Faenza, Italy', 'alphatauri.jpg'),
(8, 'MoneyGram Haas F1 Team', 'Guenther', 'Steiner', 'Kannapolis, United States', 'haas.jpg'),
(9, 'Aston Martin Aramco Cognizant F1 Team', 'Mike', 'Krack', 'Silverstone, United Kingdom', 'astonmartin.jpg'),
(10, 'Williams Racing', 'James', 'Vowles', 'Grove, United Kingdom', 'williams.jpg');

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
  `N_Laps` int UNSIGNED NOT NULL COMMENT 'laps in race',
  `First_GP` year NOT NULL COMMENT 'year of first Grand Prix',
  `LR_Time` char(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Fastest time set in the race',
  `DriverID` int DEFAULT NULL COMMENT 'DriverID of driver who set the fastest lap if they are still on the grid',
  `Corners` int UNSIGNED NOT NULL COMMENT 'Number of corners in a lap',
  `Drs_zones` int UNSIGNED NOT NULL COMMENT 'Number of drs detection points on the track',
  `TrackImage` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'file name for image',
  `CircuitImage` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Track`
--

INSERT INTO `Track` (`TrackID`, `TrackName`, `Location`, `Circuit_Length`, `Total_distance`, `N_Laps`, `First_GP`, `LR_Time`, `DriverID`, `Corners`, `Drs_zones`, `TrackImage`, `CircuitImage`) VALUES
(1, 'Bahrain International Circuit', 'Sakhir, Bahrain', 5.421, 308.238, 57, 2004, '1:33.996', 24, 15, 3, 'bahrain.jpg', 'bahrain_track.jpg'),
(2, 'Jeddah Corniche Circuit', 'Jeddah, Saudi Arabia', 6.174, 308.450, 50, 2021, '1:30.734', 44, 27, 3, 'jeddah.jpg', 'jeddah_circuit.jpg'),
(3, 'Albert Park Circuit', 'Melbourne, Australia', 5.278, 306.124, 58, 1996, '1:20.235', 11, 14, 4, 'australia.jpg', 'aus_circuit.jpg'),
(4, 'Baku City Circuit', 'Azerbaijan', 6.003, 306.049, 51, 2016, '1:43.009', 16, 20, 2, 'baku.jpg', 'baku_circuit.jpg'),
(5, 'Miami International Autodrome', 'Miami, United States of America', 5.412, 308.326, 57, 2022, '1:29.708', 1, 19, 3, 'miami.jpg', 'miami_circuit.jpg'),
(6, 'Autodromo Enzo e Dino Ferrari', 'Imola, Italy', 4.909, 309.049, 63, 1980, '1:15.484', 44, 19, 1, 'emiliaromanga.jpg', 'imola_circuit.jpg'),
(7, 'Circuit de Monaco', 'Monaco', 3.337, 260.286, 78, 1950, '1:12.909', 44, 19, 1, 'monaco.jpg', 'monaco_circuit.jpg'),
(8, 'Circuit do Barcelona-Catalunya', 'Barcelona, Spain', 4.675, 308.424, 66, 1991, '1:16.330', 1, 14, 2, 'spain.jpg', 'spain_circuit.jpg'),
(9, 'Circuit Gilles-Villeneuve', 'Montreal, Canada', 4.361, 305.270, 70, 1978, '1:13.078', 77, 14, 3, 'canada.jpg', 'canada_circuit.jpg'),
(10, 'Red Bull Ring', 'Spielberg, Austria', 4.381, 306.452, 71, 1970, '1:05.619', 55, 10, 3, 'redbullring.jpg', 'austria_circuit.jpg'),
(11, 'Silverstone Circuit', 'Silverstone, England', 5.819, 306.198, 52, 1950, '1:27.097', 1, 18, 2, 'silverstone.jpg', 'silverstone_circuit.jpg'),
(12, 'Hungaroring', 'Hungary', 4.381, 306.630, 70, 1986, '1:16:627', 44, 14, 2, 'hungary.jpg', 'hungary_circuit.jpg'),
(13, 'Circuit de Spa-Francorchamps', 'Belgium', 7.004, 308.052, 44, 1950, '1:46.286', 77, 19, 2, 'spa.jpg', 'spa_circuit.jpg'),
(14, 'Circuit Park Zandvoort', 'Zandvoort, Netherlands', 4.295, 305.587, 72, 1952, '1:11.097', 44, 14, 2, 'netherlands.jpg', 'zandvort_circuit.jpg'),
(15, 'Autodromo Nazionale Monza', 'Monza, Italy', 5.793, 306.720, 53, 1950, '1:25.072', 81, 11, 2, 'monza.jpg', 'monza_circuit.jpg'),
(16, 'Marina Bay Street Circuit', 'Marina Bay, Singapore', 5.063, 308.706, 61, 2008, '1:35.76', 44, 19, 3, 'singapore.jpg', 'singapore_circuit.jpg'),
(17, 'Suzuka International Racing Course', 'Suzuka, Japan', 5.807, 307.471, 53, 1987, '01:30:01', 44, 18, 1, 'suzuka.jpg', 'suzuka_circuit.jpg'),
(18, 'Losail International Circuit', 'Doha, Qatar', 5.830, 306.660, 57, 2021, '01:23:00', 1, 16, 1, 'quatar.jpg', 'qatar_circuit.jpg'),
(19, 'Circuit of the Americas', 'Texas, United States of America', 5.513, 308.405, 56, 2012, '01:36:00', 16, 20, 2, 'america.jpg', 'texas_circuit.jpg'),
(20, 'Autódromo Hermanos Rodríguez', 'Mexico', 4.340, 305.354, 71, 1963, '01:17:01', 77, 17, 3, 'mexico.jpg', 'mexico_circuit.jpg'),
(21, 'Autódromo José Carlos Pace', 'São Paulo, Brazil', 4.309, 305.879, 71, 1973, '01:10:01', 77, 15, 2, 'brazil.jpg', 'brazil_circuit.jpg'),
(22, 'Los Vegas Grand Prix', 'Los Vegas, United States of America', 6.120, 305.880, 50, 2023, NULL, NULL, 17, 0, 'LA.jpg', 'lv_circuit.jpg'),
(23, 'Yas Marina Circuit', 'Abu Dhabi', 5.281, 305.183, 58, 2009, '01:26:00', 1, 16, 2, 'abudahbi.jpg', 'abudahbi_circuit.jpg');

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
  ADD UNIQUE KEY `TrackID` (`TrackID`),
  ADD KEY `DriverID` (`DriverID`);

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
  MODIFY `BioID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `Race`
--
ALTER TABLE `Race`
  MODIFY `RaceID` int NOT NULL AUTO_INCREMENT COMMENT 'primary key for the race table', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Team`
--
ALTER TABLE `Team`
  MODIFY `TeamID` int NOT NULL AUTO_INCREMENT COMMENT 'primary key for driver table', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Track`
--
ALTER TABLE `Track`
  MODIFY `TrackID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Constraints for table `Track`
--
ALTER TABLE `Track`
  ADD CONSTRAINT `Track_ibfk_1` FOREIGN KEY (`DriverID`) REFERENCES `Driver` (`DriverID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
