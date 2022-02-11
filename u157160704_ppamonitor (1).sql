-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2021 at 12:39 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u157160704_ppamonitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `apprehension`
--

CREATE TABLE `apprehension` (
  `id` int(11) NOT NULL,
  `date_apprehended` date DEFAULT NULL,
  `appre_officer` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respondent` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conveyance` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cutting_imple` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` decimal(10,2) DEFAULT NULL,
  `estimatedvalue` decimal(10,2) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apprehension`
--

INSERT INTO `apprehension` (`id`, `date_apprehended`, `appre_officer`, `location`, `respondent`, `conveyance`, `cutting_imple`, `species`, `volume`, `estimatedvalue`, `office_id`, `encoded_by`, `updated_at`, `created_at`) VALUES
(2, '2021-07-15', 'Jaylord', 'Baganga', 'Jaylord', '1', '1', '1', '1.00', '1.00', 8, 6, '2021-07-15 03:39:43', '2021-07-15 03:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `casesfiled`
--

CREATE TABLE `casesfiled` (
  `id` int(11) NOT NULL,
  `respondent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `violation` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docketnum` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_filed` date DEFAULT NULL,
  `rtcbranch` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chainsawinventory`
--

CREATE TABLE `chainsawinventory` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateacquired` date DEFAULT NULL,
  `serialnum` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateregistered` date DEFAULT NULL,
  `expirationdate` date DEFAULT NULL,
  `brand` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horsepower` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guidebarlength` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `or_num` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cr_num` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chainsawinventory`
--

INSERT INTO `chainsawinventory` (`id`, `name`, `address`, `dateacquired`, `serialnum`, `dateregistered`, `expirationdate`, `brand`, `model`, `horsepower`, `color`, `guidebarlength`, `or_num`, `cr_num`, `purpose`, `filename`, `filepath`, `encoded_by`, `created_at`, `updated_at`) VALUES
(3, 'Juan Dela Cruz', 'Govt Center, Brgy Dahican, City of Mati, Davao Oriental', '2021-03-18', '111-222-333-444', '2021-03-22', '2022-03-23', 'Makita', 'R40HP', '40', 'Red', '30 Inches', '123345', '123432', 'Cutting of Trees', 'C-MS-382.jpg', '/chainsawinventory/C-MS-382.jpg', 6, '2021-05-25 09:06:51', '2021-05-25 09:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `claimsandconflict`
--

CREATE TABLE `claimsandconflict` (
  `id` int(11) NOT NULL,
  `parties` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cswreport_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cswreport_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lotsurveynum` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modedesposition` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personincharge` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuttingpermit_geotag`
--

CREATE TABLE `cuttingpermit_geotag` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cutting_permits`
--

CREATE TABLE `cutting_permits` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permit_type` int(11) DEFAULT NULL,
  `date_award` date DEFAULT NULL,
  `map_filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cutting_permitnum` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `certification_fee` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fla`
--

CREATE TABLE `fla` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_award` date DEFAULT NULL,
  `map_filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approvedfladocs_filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approvedfladocs_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rentalfee` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expirationdate` date DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fla`
--

INSERT INTO `fla` (`id`, `applicant_name`, `area`, `location`, `status`, `date_award`, `map_filename`, `map_filepath`, `approvedfladocs_filename`, `approvedfladocs_filepath`, `rentalfee`, `term`, `expirationdate`, `office_id`, `updated_at`, `created_at`, `encoded_by`) VALUES
(3, 'Juan Dela Cruz', '12', 'Manay, Davao Oriental', '1', '2021-09-16', '1631779081.map1.PNG', '/flaMaps/1631779081.map1.PNG', '1631779081.map2.PNG', '/flaDocs/1631779081.map2.PNG', '1000', '5 yrs', '2026-09-16', 8, '2021-09-16 07:58:01', '2021-09-16 07:40:06', 6),
(4, 'John Dela Cross', '10', 'Manay, Davao Oriental', '1', '2021-09-16', '1631778877.map3.PNG', '/flaMaps/1631778877.map3.PNG', '1631778877.sample2.jpg', '/flaDocs/1631778877.sample2.jpg', '1000', '2 yrs', '2023-09-16', 8, '2021-09-16 07:54:37', '2021-09-16 07:54:19', 6);

-- --------------------------------------------------------

--
-- Table structure for table `flagt`
--

CREATE TABLE `flagt` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_award` date DEFAULT NULL,
  `map_filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rentalfee` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expirationdate` date DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flagt_geotag`
--

CREATE TABLE `flagt_geotag` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fla_geotag`
--

CREATE TABLE `fla_geotag` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lawin_patroller`
--

CREATE TABLE `lawin_patroller` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawin_patroller`
--

INSERT INTO `lawin_patroller` (`id`, `fullname`, `position`, `office_id`, `filename`, `filepath`, `encoded_by`, `created_at`, `updated_at`) VALUES
(14, 'Bong Revilla', 'Senador ng Pilipinas', 8, '1621933459.800px-Ramon_Bong_Revilla.jpg', 'LawinPatrollersPhoto/1621933459.800px-Ramon_Bong_Revilla.jpg', 6, '2021-05-15 14:30:58', '2021-05-25 09:04:19'),
(15, 'Carl Bear P Añides', 'Job Order', 9, '1633503431.Carl Bear P Añides.jpg', 'LawinPatrollersPhoto/1633503431.Carl Bear P Añides.jpg', 6, '2021-10-06 06:57:11', '2021-10-06 06:57:11'),
(16, 'JOHN REYMART P BENANING', 'Job Order', 10, '1633503458.JOHN REYMART P BENANING.jpg', 'LawinPatrollersPhoto/1633503458.JOHN REYMART P BENANING.jpg', 6, '2021-10-06 06:57:38', '2021-10-06 06:57:38'),
(17, 'Jouseff Darrel Jay B Jubane', 'Job Order', 11, '1633503481.Jouseff Darrel Jay B Jubane.jpg', 'LawinPatrollersPhoto/1633503481.Jouseff Darrel Jay B Jubane.jpg', 6, '2021-10-06 06:58:01', '2021-10-06 06:58:01'),
(18, 'Michael A Lumontad', 'Job Order', 12, '1633503595.Michael A Lumontad.jpg', 'LawinPatrollersPhoto/1633503595.Michael A Lumontad.jpg', 6, '2021-10-06 06:59:55', '2021-10-06 06:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `lumberdonation`
--

CREATE TABLE `lumberdonation` (
  `id` int(11) NOT NULL,
  `appre_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_donated` date DEFAULT NULL,
  `volumedonated` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidder` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lumberdonation`
--

INSERT INTO `lumberdonation` (`id`, `appre_id`, `date_donated`, `volumedonated`, `bidder`, `purpose`, `office_id`, `encoded_by`, `created_at`, `updated_at`) VALUES
(5, '2', '2021-07-15', '23', NULL, 'Office use', 8, 6, '2021-07-15 03:40:17', '2021-07-15 03:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monitoringstation`
--

CREATE TABLE `monitoringstation` (
  `id` int(11) NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personnelassigned` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(360) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitoringstation`
--

INSERT INTO `monitoringstation` (`id`, `location`, `personnelassigned`, `office_id`, `filename`, `file_path`, `encoded_by`, `created_at`, `updated_at`) VALUES
(13, 'Baganga', 'Bong Revilla', 8, '1626320464.800px-Ramon_Bong_Revilla.jpg', 'monitoringstations/1626320464.800px-Ramon_Bong_Revilla.jpg', 6, '2021-07-15 03:41:04', '2021-07-15 03:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `officename` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officeaddress` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `officename`, `officeaddress`) VALUES
(8, 'PENRO Mati', 'DENR PENRO Building, Govt. Center, Brgy Dahican, City of Mati, Davao Oriental'),
(9, 'CENRO Baganga', 'Brgy. Lambajon, Baganga, Davao Oriental'),
(10, 'CENRO Manay', 'San Ignacio, Manay, Davao Oriental'),
(11, 'CENRO Mati', 'Magsaysay IV, Mati, Davao Oriental'),
(12, 'CENRO Lupon', 'Poblacion, Lupon, Davao Oriental');

-- --------------------------------------------------------

--
-- Table structure for table `otherpermits`
--

CREATE TABLE `otherpermits` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permitnum` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuttingpermitnum` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `certification_fee` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insreport_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insreport_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otherpermits_geotag`
--

CREATE TABLE `otherpermits_geotag` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('clintmichaelcleofe@gmail.com', '$2y$10$tPeIqZf1kLcKaYRnrpj6Qe2mlECLuekV0f2bUfQ6Hp7BGy3t5GQ8K', '2021-07-15 02:52:38'),
('bandio.al@gmail.com', '$2y$10$9w4ITG1iZDKnHjCZuug0vOPLh9aYeLCS1tv8ff0l9yax0Y9BxcgBi', '2021-09-14 00:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `patentprocessingissuance`
--

CREATE TABLE `patentprocessingissuance` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_num` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateapplied` date DEFAULT NULL,
  `dateissued` date DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lotnsurveynum` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modeofdisposition` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patentnum` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datesurveyapproved` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patentprocessingissuance`
--

INSERT INTO `patentprocessingissuance` (`id`, `name`, `application_filename`, `application_filepath`, `application_num`, `area`, `dateapplied`, `dateissued`, `location`, `lotnsurveynum`, `modeofdisposition`, `patentnum`, `status`, `title_filename`, `title_filepath`, `datesurveyapproved`, `office_id`, `encoded_by`, `created_at`, `updated_at`) VALUES
(4, 'Juan Dela Cruz', '1621311453.Marvin S Maldo.jpg', '/applicationForms/1621311453.Marvin S Maldo.jpg', '111-222-33345', '10 has', '2021-02-24', '2021-05-11', 'Brgy Dahican, City of Mati, Davao Oriental', '111-23323-45', 'RFPA', '1234321', 'Approved', '1621311453.Recson B Engalgado.jpg', '/titles/1621311453.Recson B Engalgado.jpg', '2021-05-11', '8', 6, '2021-05-11 02:06:18', '2021-09-27 05:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `patent_geotag`
--

CREATE TABLE `patent_geotag` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patent_geotag`
--

INSERT INTO `patent_geotag` (`id`, `filename`, `filepath`, `f_id`, `created_at`, `updated_at`) VALUES
(36, '1620702809.1.PNG', 'patent_geotag/4/1620702809.1.PNG', 4, '2021-05-11 03:13:29', '2021-05-11 03:13:29'),
(37, '1620702809.chainsaw 1.jpg', 'patent_geotag/4/1620702809.chainsaw 1.jpg', 4, '2021-05-11 03:13:29', '2021-05-11 03:13:29'),
(38, '1620702809.chainsaw 2.png', 'patent_geotag/4/1620702809.chainsaw 2.png', 4, '2021-05-11 03:13:29', '2021-05-11 03:13:29'),
(39, '1620702809.denr logo.png', 'patent_geotag/4/1620702809.denr logo.png', 4, '2021-05-11 03:13:29', '2021-05-11 03:13:29'),
(40, '1620702809.map1.PNG', 'patent_geotag/4/1620702809.map1.PNG', 4, '2021-05-11 03:13:29', '2021-05-11 03:13:29'),
(41, '1620702809.map2.PNG', 'patent_geotag/4/1620702809.map2.PNG', 4, '2021-05-11 03:13:29', '2021-05-11 03:13:29'),
(42, '1620702809.map3.PNG', 'patent_geotag/4/1620702809.map3.PNG', 4, '2021-05-11 03:13:29', '2021-05-11 03:13:29'),
(43, '1620702809.roleta.PNG', 'patent_geotag/4/1620702809.roleta.PNG', 4, '2021-05-11 03:13:30', '2021-05-11 03:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `patrolassignment`
--

CREATE TABLE `patrolassignment` (
  `id` int(11) NOT NULL,
  `patroller_id` int(11) NOT NULL,
  `patrolteam_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `encoded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patrolassignment`
--

INSERT INTO `patrolassignment` (`id`, `patroller_id`, `patrolteam_id`, `created_at`, `updated_at`, `encoded_by`) VALUES
(1, 14, 2, '2021-10-14 02:53:44', '2021-10-14 02:53:44', 6),
(2, 15, 2, '2021-10-14 02:54:50', '2021-10-14 02:54:50', 6),
(3, 16, 1, '2021-10-14 02:55:03', '2021-10-14 02:55:03', 6),
(4, 17, 1, '2021-10-14 02:55:12', '2021-10-14 02:55:12', 6),
(5, 14, 1, '2021-10-17 13:03:15', '2021-10-17 13:03:15', 6);

-- --------------------------------------------------------

--
-- Table structure for table `patrolteams`
--

CREATE TABLE `patrolteams` (
  `id` int(11) NOT NULL,
  `team_sector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_office` int(11) NOT NULL,
  `quarter` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `encoded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patrolteams`
--

INSERT INTO `patrolteams` (`id`, `team_sector`, `team_office`, `quarter`, `year`, `created_at`, `updated_at`, `encoded_by`) VALUES
(1, 'Mati', 8, '1st', '2021', '2021-10-13 04:01:22', '2021-10-13 04:01:22', 6),
(2, 'Taragonna', 8, '1st', '2021', '2021-10-13 04:06:46', '2021-10-13 04:06:46', 6),
(3, 'Manay', 8, '1st', '2021', '2021-10-13 05:51:04', '2021-10-13 05:57:58', 6);

-- --------------------------------------------------------

--
-- Table structure for table `permit_type`
--

CREATE TABLE `permit_type` (
  `id` int(11) NOT NULL,
  `permittype` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permit_type`
--

INSERT INTO `permit_type` (`id`, `permittype`, `created_at`, `updated_at`) VALUES
(5, 'Tree Cutting Permit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sapa`
--

CREATE TABLE `sapa` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_award` date DEFAULT NULL,
  `map_filename` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filename` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rentalfee` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expirydate` date DEFAULT NULL,
  `office_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoded_by` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sapa`
--

INSERT INTO `sapa` (`id`, `applicant_name`, `area`, `location`, `status`, `date_award`, `map_filename`, `map_filepath`, `approveddocs_filename`, `approveddocs_filepath`, `rentalfee`, `term`, `expirydate`, `office_id`, `encoded_by`, `created_at`, `updated_at`) VALUES
(5, 'Juan Dela Cruz', '23', 'Manay, Davao Oriental', '3', '2021-09-16', '1631776747.map2.PNG', '/sapaMaps/1631776747.map2.PNG', '1631776747.sample1.jpg', '/sapaDocs/1631776747.sample1.jpg', '500', '5 yrs', '2026-09-16', '8', '6', '2021-09-16 07:19:07', '2021-09-16 07:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `sapa_geotag`
--

CREATE TABLE `sapa_geotag` (
  `id` int(11) NOT NULL,
  `filename` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('msdt1xyR6uXuFyIRbjk8GJPeazrlRARGSAqkLmUH', NULL, '68.183.35.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVnlWR2l1WnUxZUVPTElYbjhZZjRUcjRRaGMyRUY2cTFCYkR5U0dIUiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9wZW5yb21hdGlzeXN0ZW1zLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwczovL3BlbnJvbWF0aXN5c3RlbXMuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1635888581),
('ncDuy6cUCCWlYQuE115wnsOSKtc2E7uMymRODvWU', NULL, '176.113.43.215', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaUJmS2p4Y2s5UDhjUmgzTGhHTHlXQXVuekIzWjNUT0JpRk0xOXFMOCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly93d3cucGVucm9tYXRpc3lzdGVtcy5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly93d3cucGVucm9tYXRpc3lzdGVtcy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1635878673),
('NN4hnIllrKLa2K8eQUBv5A0ta704mio87nzNmY2t', NULL, '34.87.46.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMTY3MmZxR3ozam1QcjhjcGkzR0p4QjZKdGt1OUVBTXlkSkZud2QzSCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9wZW5yb21hdGlzeXN0ZW1zLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwczovL3BlbnJvbWF0aXN5c3RlbXMuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1635893929),
('RlGw3vh3OJEqOxXJsqUkbtyHwNB6fmepSZlUbXIy', NULL, '89.104.110.120', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTFCekkxQmNoak02Z0s5MWV0TXFrSDRjV21RU0FFb1lHT3RUMEFIWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vd3d3LnBlbnJvbWF0aXN5c3RlbXMuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1635878675),
('WkJ88KAOcEoD6iF4uM3P07DXgyRNenrM3bpiHiLS', NULL, '45.90.61.221', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1kwclBCeHY4MElud1Fhb3oxbmwwa0V2aGJoYXlmYzkwWlg4T3NzcCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly93d3cucGVucm9tYXRpc3lzdGVtcy5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly93d3cucGVucm9tYXRpc3lzdGVtcy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1635878673);

-- --------------------------------------------------------

--
-- Table structure for table `status_tbl`
--

CREATE TABLE `status_tbl` (
  `id` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_tbl`
--

INSERT INTO `status_tbl` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Approved', '2021-09-16 11:19:36', '2021-09-16 11:19:36'),
(2, 'Pending', '2021-09-16 11:18:43', '2021-09-16 11:18:43'),
(3, 'Cancelled', '2021-09-16 11:20:02', '2021-09-16 11:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acctype` int(11) NOT NULL DEFAULT 209,
  `office_id` int(11) DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `acctype`, `office_id`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(6, 'Albert Neil D Bandiola', 'bandio.al@gmail.com', NULL, '$2y$10$KWCtewchXpZKxwiC4fDBBeG1gExmYcZAFgoSdJepVg1Z8aoHbLC8S', 165, 8, NULL, NULL, NULL, NULL, NULL, '2021-04-21 06:33:13', '2021-04-21 06:33:13'),
(7, 'Jovy S. Abaniel', 'abanieljovy@gmail.com', NULL, '$2y$10$MF5EaDB5xhSmFFUqe89CR.U.G12vjdcdZdLkuODygnwYJo78mhPzy', 209, 8, NULL, NULL, NULL, NULL, NULL, '2021-04-21 06:50:05', '2021-04-21 06:50:05'),
(8, 'Alberto N. Bandiola', 'anbforester@yahoo.com', NULL, '$2y$10$RYjWG7PD/kCTmon9YSwpWuHU6OF9VsbznqT65fqgiSkWF.9PVfPue', 209, 8, NULL, NULL, NULL, NULL, NULL, '2021-04-21 21:58:19', '2021-04-21 21:58:19'),
(11, 'Rowan Sikorsky', 'jcbandiolas94@gmail.com', NULL, '$2y$10$vf9mJhqrwUf/3aE3/ctmS.KnAn8GznXaXsIsU435yAUA9SWDOoU0O', 209, 8, NULL, NULL, NULL, NULL, NULL, '2021-05-08 13:44:27', '2021-05-08 13:44:27'),
(12, 'Clint Michael B. Cleofe', 'clintmichaelcleofe@gmail.com', NULL, '$2y$10$NN1j3Q6M3R4YD1WXPuXJq.UrhkKha00F.elnGSo5FDb3wGFF0Gnva', 209, 8, NULL, NULL, NULL, NULL, NULL, '2021-06-09 02:16:57', '2021-06-09 02:16:57'),
(13, 'Milan N. Jerusalem', 'skylan24@gmail.com', NULL, '$2y$10$tNEhN7Ur/K6hGU.Ty6YWS.irNQwqi98TUprMOPJBOF6Is15oIvJJu', 209, 8, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:41:36', '2021-07-15 02:41:36'),
(14, 'Marydin G. Dalogdog', 'dindalogdog@gmail.com', NULL, '$2y$10$wUrC4VQ/eSN/Pa50oLDMX.0UQPvRSIb3nnRfBKmUpIuQKwhO7a4z.', 209, 12, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:42:27', '2021-07-15 02:42:27'),
(15, 'Lowela M. Blanco', 'mblancolowela@gmail.com', NULL, '$2y$10$Ab4Fj20js0kHHRPSixdbMeaINLI.5O9rkpHVJZjwxXtAyENBK1OG.', 209, 8, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:42:59', '2021-07-15 02:42:59'),
(16, 'Shaira Mae Pagayawan', 'smppagayawan.xi@gmail.com', NULL, '$2y$10$gbc3vdkTnWRXiugfX78Mn.6r8lWiEN.1zsAOKSrcfZa2vrB9VOZji', 209, 8, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:51:50', '2021-07-15 02:51:50'),
(17, 'DIANA ROSE MASANGUID', 'dianarose.masanguid11@gmail.com', NULL, '$2y$10$WzS39xl9eo6AYJHxIhlJAeqL3XrVQJ5efc8NCA/y2U3dcmLZ0KUrq', 209, 10, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:53:21', '2021-07-15 02:53:21'),
(18, 'CENRO LUPON', 'cenrolupon@denr.gov.ph', NULL, '$2y$10$MdgEtZjsDYAQYeAGRUuIxu66G12ud4rviQ7axCMbpXO/pINoeH5ae', 209, 12, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:54:53', '2021-07-15 02:54:53'),
(19, 'Clint Michael B. Cleofe', 'nepenthes.alfredoi@gmail.com', NULL, '$2y$10$N6fcR.9vZXlYK.7ul4gjoeWgEAZ8rPHm8oxaZAsI1vW.xtEEstQVC', 209, 8, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:55:15', '2021-07-15 02:55:15'),
(20, 'Christine Mae Calunsod', 'cenromati@denr.gov.ph', NULL, '$2y$10$0kIGWAh1yqnOGFe61iLeJ.aLxHG16Ui1ymmFtVzDGCjxZKOnB9jbG', 209, 11, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:55:16', '2021-07-15 02:55:16'),
(21, 'CENRO Baganga', 'cenrobaganga@denr.gov.ph', NULL, '$2y$10$7aI18z6yEtEXBdM8ig/ZZ.I1cWJD8Rq8bTF35RTyTtbYvax7h90hO', 209, 9, NULL, NULL, NULL, NULL, NULL, '2021-07-15 02:58:02', '2021-07-15 02:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `wildliferegistration`
--

CREATE TABLE `wildliferegistration` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numberofwildlife` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regnumber` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspectionreport_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspectionreport_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateissued` date DEFAULT NULL,
  `certification_fee` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wildliferegistration_geotag`
--

CREATE TABLE `wildliferegistration_geotag` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wildlifetransportpermit`
--

CREATE TABLE `wildlifetransportpermit` (
  `id` int(11) NOT NULL,
  `applicant_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proofacquisition_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proofacquisition_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approveddocs_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numberofwildlife` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspectionreport_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspectionreport_filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permitnumber` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateissued` date DEFAULT NULL,
  `certification_fee` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `encoded_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wildlifetransportpermit_geotag`
--

CREATE TABLE `wildlifetransportpermit_geotag` (
  `id` int(11) NOT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filepath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apprehension`
--
ALTER TABLE `apprehension`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casesfiled`
--
ALTER TABLE `casesfiled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chainsawinventory`
--
ALTER TABLE `chainsawinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claimsandconflict`
--
ALTER TABLE `claimsandconflict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuttingpermit_geotag`
--
ALTER TABLE `cuttingpermit_geotag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cutting_permits`
--
ALTER TABLE `cutting_permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fla`
--
ALTER TABLE `fla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flagt`
--
ALTER TABLE `flagt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flagt_geotag`
--
ALTER TABLE `flagt_geotag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fla_geotag`
--
ALTER TABLE `fla_geotag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawin_patroller`
--
ALTER TABLE `lawin_patroller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lumberdonation`
--
ALTER TABLE `lumberdonation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoringstation`
--
ALTER TABLE `monitoringstation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherpermits`
--
ALTER TABLE `otherpermits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherpermits_geotag`
--
ALTER TABLE `otherpermits_geotag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patentprocessingissuance`
--
ALTER TABLE `patentprocessingissuance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patent_geotag`
--
ALTER TABLE `patent_geotag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrolassignment`
--
ALTER TABLE `patrolassignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patrolteams`
--
ALTER TABLE `patrolteams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permit_type`
--
ALTER TABLE `permit_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sapa`
--
ALTER TABLE `sapa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sapa_geotag`
--
ALTER TABLE `sapa_geotag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `status_tbl`
--
ALTER TABLE `status_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wildliferegistration`
--
ALTER TABLE `wildliferegistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wildliferegistration_geotag`
--
ALTER TABLE `wildliferegistration_geotag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wildlifetransportpermit`
--
ALTER TABLE `wildlifetransportpermit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wildlifetransportpermit_geotag`
--
ALTER TABLE `wildlifetransportpermit_geotag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apprehension`
--
ALTER TABLE `apprehension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `casesfiled`
--
ALTER TABLE `casesfiled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chainsawinventory`
--
ALTER TABLE `chainsawinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `claimsandconflict`
--
ALTER TABLE `claimsandconflict`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cuttingpermit_geotag`
--
ALTER TABLE `cuttingpermit_geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cutting_permits`
--
ALTER TABLE `cutting_permits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fla`
--
ALTER TABLE `fla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flagt`
--
ALTER TABLE `flagt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flagt_geotag`
--
ALTER TABLE `flagt_geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fla_geotag`
--
ALTER TABLE `fla_geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lawin_patroller`
--
ALTER TABLE `lawin_patroller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lumberdonation`
--
ALTER TABLE `lumberdonation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `monitoringstation`
--
ALTER TABLE `monitoringstation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `otherpermits`
--
ALTER TABLE `otherpermits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otherpermits_geotag`
--
ALTER TABLE `otherpermits_geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patentprocessingissuance`
--
ALTER TABLE `patentprocessingissuance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patent_geotag`
--
ALTER TABLE `patent_geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `patrolassignment`
--
ALTER TABLE `patrolassignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patrolteams`
--
ALTER TABLE `patrolteams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permit_type`
--
ALTER TABLE `permit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sapa`
--
ALTER TABLE `sapa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sapa_geotag`
--
ALTER TABLE `sapa_geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status_tbl`
--
ALTER TABLE `status_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wildliferegistration`
--
ALTER TABLE `wildliferegistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wildliferegistration_geotag`
--
ALTER TABLE `wildliferegistration_geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wildlifetransportpermit`
--
ALTER TABLE `wildlifetransportpermit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wildlifetransportpermit_geotag`
--
ALTER TABLE `wildlifetransportpermit_geotag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
