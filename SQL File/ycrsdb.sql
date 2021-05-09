-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 01:54 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ycrsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9898898898, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-05-19 06:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `ID` int(10) NOT NULL,
  `ClassID` int(10) DEFAULT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` mediumtext DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`ID`, `ClassID`, `BookingNumber`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Address`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 5, 741767925, 'Sanchit', 'Jain', 'sanchit@gmail.com', 7987987797, 'H-908 Gulmohar Bagh New Delhi', '2020-05-20 18:30:00', 'Your request for yoga class has been approved. We will contact you soon', 'Approved', '2020-05-21 17:38:43'),
(2, 1, 122423566, 'Rajesh', 'Singha', 'raj@gmail.com', 8654798798, 'k-678, Harikesh Nagra New Delhi', '2020-05-22 07:16:41', 'Canceeled', 'Cancelled', '2020-05-23 12:53:01'),
(3, 3, 479059561, 'Anuj', 'Kumar', 'phpgurukulhelp@gmail.com', 1234567890, 'New Delhi India', '2020-05-25 10:42:29', 'You can join classes', 'Approved', '2020-05-25 10:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `ID` int(10) NOT NULL,
  `TypeofClasses` varchar(50) DEFAULT NULL,
  `YogaImages` varchar(100) DEFAULT NULL,
  `DaysTime` varchar(120) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `YogaTrainer` varchar(200) DEFAULT NULL,
  `TrainerContactnumber` bigint(10) DEFAULT NULL,
  `ProfilePics` varchar(200) DEFAULT NULL,
  `Fees` decimal(10,2) NOT NULL,
  `ClassDuration` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`ID`, `TypeofClasses`, `YogaImages`, `DaysTime`, `Description`, `YogaTrainer`, `TrainerContactnumber`, `ProfilePics`, `Fees`, `ClassDuration`, `CreationDate`) VALUES
(1, 'Artist Yoga', '973042c8a1eab4a2e1053210247206011589977683.jpg', '<b>Days &amp; Time</b><div><b>Morning Time</b></div><div><b>Mon, Wed, Fri: 6 a.m to 8 a.m</b></div>', '<b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Artistic yoga</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;is a style of modern&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">yoga</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;which includes performing&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">yoga</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;asanas in a dancing style. It is a series of movements which include asanas to stretch and strengthen your body and keep it fit and rejuvenated.&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Artistic yoga</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;postures can also be practiced for those who aim to lose weight.</span><br>', 'Mega Arora', 6446465465, 'a979e31bc5464490c8e9dc5838ab1e5e1589956995.jpg', '500.00', '45 days', '2020-05-20 06:43:15'),
(3, 'Traditional Hatha', 'eca95f4974eefc83eff19d9350dd55091589983110.jpg', '<b>Days &amp; Time</b><div><b>Evening Time</b></div><div><b>Tue &amp; Sat: 5 a.m to 9 a.m</b></div>', '<b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">Hatha Yoga</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif;\">&nbsp;tradition emphasizes on the Kriya – Asana combination as the first step supported by the sattvic food. Kriya doesn\'t necessarily mean only Shat Kriyas (six purification techniques). But every purification technique which removes the toxins from body-mind.</span><br>', 'Harish Tyagi', 9798779798, '86e53c1de06f7e5cec117fe2f91db8561589983110.jpg', '1800.00', '30 days', '2020-05-20 13:58:30'),
(4, 'Yoga Therapy', 'b9fb9d37bdf15a699bc071ce49baea531589983324.jpg', '<b>Days &amp; Timing</b><div><b>Morning<br></b><div>Mon to Sat: 6 a.m to 10 a.m</div></div><div><b>Evening</b></div><div', '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">Yoga is a group of physical, mental, and spiritual practices or disciplines which originated in ancient India. Yoga is one of the six Āstika schools of Hindu philosophical traditions. There is a broad variety of yoga schools, practices, and goals in Hinduism, Buddhism, and Jainism</span><br>', 'Rashmi Shah', 4798715197, '6cb8a58c51b91696dc8e97777881eff31590238100.jpg', '1900.00', '45 days', '2020-05-20 14:02:04'),
(5, 'Yoga Balance', '1e6ae4ada992769567b71815f124fac51589983706.jpg', '<b>Days &amp; Timing</b><div><b>Morning</b></div><div>Wed, Fri, Sun: 6:30 a.m to 10.30 a.m</div><div><b>Evening</b></div', '<span style=\"color: rgb(126, 132, 140); font-family: Montserrat, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; letter-spacing: 0.5px;\">Connecting to our base and stabilizer muscles, acknowledging our current capability, and harnessing drishti and breath are useful touch points in any balance pose or practice. But there’s more to improving balance than that. Balance is a learned skill: If we challenge our balance, it improves; if we don’t, it tends to atrophy, as commonly happens as we age. Beyond that, though, the challenges we offer our balance need to mirror those we encounter in life; stability in the varied conditions of real life requires more than what’s offered by the single-legged standing poses in yoga.</span><br>', 'Nandini', 4654646546, 'fccf17286f638ef0b94a5cb89369ceda1589983706.jpg', '5000.00', '2 Month', '2020-05-20 14:08:26'),
(6, 'Vinyasa yoga', '9e1d2bf60d8e6c6eea8784a1aaa3ec551589983971.jpg', '<b>Evening</b><div><b>Tues, Wed: 5 p.m to 8 p.m</b></div>', '<div class=\"g\" style=\"line-height: 1.2; width: 600px; font-family: arial, sans-serif; font-size: 14px; margin-top: 0px; margin-bottom: 28px; color: rgb(34, 34, 34);\"><div class=\"rc\" data-hveid=\"CAIQAA\" data-ved=\"2ahUKEwiF1P_9zsLpAhUdyDgGHQntC18QFSgAMBZ6BAgCEAA\" style=\"position: relative;\"><div class=\"s\" style=\"max-width: 48em; color: rgb(77, 81, 86); line-height: 1.58;\"><span class=\"st\" style=\"line-height: 1.58; overflow-wrap: break-word;\"><span style=\"font-weight: bold; color: rgb(95, 99, 104);\">Vinyasa</span>&nbsp;is a style of&nbsp;<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">yoga</span>&nbsp;characterized by stringing postures together so that you move from one to another, seamlessly, using breath. Commonly referred to as “<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">flow</span>”&nbsp;<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">yoga</span>, it is sometimes confused with “power&nbsp;<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">yoga</span>“.&nbsp;<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">Vinyasa</span>&nbsp;classes offer a variety of postures and no two classes are ever alike.</span></div><div><span class=\"st\" style=\"line-height: 1.58; overflow-wrap: break-word;\"><br></span></div><div data-base-uri=\"/search?bih=608&amp;biw=1366&amp;rlz=1C1CHBF_enIN852IN868&amp;hl=en&amp;sxsrf=ALeKk00b7Bt4LQXbw3ilr2UZ2sYflMHq1g:1589983735448\" id=\"ed_6\" data-ved=\"2ahUKEwiF1P_9zsLpAhUdyDgGHQntC18Q2Z0BMBZ6BAgCEAk\"></div></div></div><span id=\"fld\" style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: medium;\"></span><div class=\"g\" style=\"line-height: 1.2; width: 600px; font-family: arial, sans-serif; font-size: 14px; margin-top: 0px; margin-bottom: 28px; color: rgb(34, 34, 34);\"><div class=\"rc\" data-hveid=\"CAMQAA\" data-ved=\"2ahUKEwiF1P_9zsLpAhUdyDgGHQntC18QFSgAMBd6BAgDEAA\" style=\"position: relative;\"></div></div>', 'Meenakshi', 4464654646, '9ee1aa95fb51b1adbccbe8b41641f60d1589983971.jpg', '2000.00', '30 days', '2020-05-20 14:12:51'),
(7, 'Iyengar yoga', 'b6eab038083a0a7d2e813c5cd03bea121589984279.jpg', '<b>Morning</b><div><b>Mon to Sat: 6 a.m to 9 a.m</b></div>', '<span style=\"color: rgb(84, 83, 83); font-family: museo-sans-rounded, Helvetica, Arial, sans-serif; background-color: rgb(241, 241, 241);\">Iyengar Yoga is a purist style of yoga developed by and named after B.K.S Iyengar in the 1960s. Iyengar Yoga is a very meticulous style of yoga, placing the emphasis on precision and alignment. The practice is all about the details of your breath control (pranayama) and posture (asana) and is excellent for building strength and flexibility. Iyengar yoga is great for learning the subtleties of correct alignment for all ages and abilities.</span><br>', 'Ragunath Swami', 4798779778, '0bb4348cc97d44c2a10e98927ab8b9111589984279.jpg', '6000.00', '3 Month', '2020-05-20 14:17:59'),
(8, 'Kundalini yoga', 'e3e4764bda0c9c8ca79586c48528ea841589984828.jpg', '<b>Morning</b><div><b>Tue, Wed, Fri: 7 a.m to 9 a.m</b></div>', '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">Kundalini yoga derives from kundalini, defined in Hindu lore as energy that lies dormant at the base of the spine until it is activated and channeled upward through the chakras in the process of spiritual perfection. Kundalini is believed to be power associated with the divine feminine.</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;</span><br>', 'Om Shankar Jha', 4798767979, '762b889990abf4a5e6296eb445c56eb61589984828.jpg', '8000.00', '3 Month', '2020-05-20 14:27:08'),
(9, 'Ashtanga yoga', '880abea4685a56e6904221224dfca56c1590039098.jpg', '<b>Morning</b><div><b>Mon to Sun: 6 a.m to 9 a.m</b></div><div><b>Evening</b></div><div><b>Mon to Fri: 5 p.m to 8 p.m</b', '<span style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; font-weight: 700; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(70, 70, 70);\"><em style=\"box-sizing: inherit; font-family: inherit; font-weight: inherit; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word;\">Ashtanga yoga</em></span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">&nbsp;is a system of yoga recorded by the sage Vamana Rishi in the&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">Yoga Korunta</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">, an ancient manuscript “said to contain lists of many different groupings of&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">asanas</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">, as well as highly original teachings on&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">vinyasa, drishti, bandhas, mudras,</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">&nbsp;and philosophy” (Jois 2002 xv). Ashtanga Yoga India, The text of the&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">Yoga Korunta&nbsp;</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">“was imparted to Sri T. Krishnamacharya in the early 1900s by his Guru Rama Mohan Brahmachari, and was later passed down to Pattabhi Jois during the duration of his studies with Krishnamacharya, beginning in 1927” (“</span><a href=\"https://en.wikipedia.org/wiki/Ashtanga_Yoga\" style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; background: 0px 0px rgb(255, 255, 255); transition: all 0.3s ease 0s; color: rgb(234, 131, 28);\">Ashtanga Yoga</a><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">”). Since 1948, Pattabhi Jois has been teaching&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">Ashtanga yoga</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">&nbsp;from his yoga&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">shala</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">, the Ashtanga Yoga Research Institute (Jois 2002 xvi), according to the sacred tradition of&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">Guru Parampara</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">&nbsp;[disciplic succession] (Jois 2003 12).</span><br>', 'Sailesh Sharma', 2446797997, '5dc5e954379e919d8b477529ed0d91091590039098.jpg', '300.00', '1 Week', '2020-05-21 05:31:38'),
(10, 'Bikram yoga', 'c725dd989d6e1d214da7f0086cd0e4501590039489.jpg', '<b>Morning</b><div><b>Mon to Fri: 7 a.m to 9 a.m</b></div><div><b>Sat: 6 a.m to 10 a.m</b></div>', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">Bikram Yoga</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;is a proprietary system of&nbsp;</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">hot yoga</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;as exercise devised by&nbsp;</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">Bikram</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;Choudhury; it became popular in the early 1970s. Classes consist of a fixed sequence of 26 postures, practised in a room heated to 105 °F (41 °C) with a humidity of 40%, intended to replicate the climate of India.</span><br>', 'Jyotasana Shah', 9764796987, '926ca489c6489f810c53a241fcb384e41590039489.jpg', '2000.00', '4 Week', '2020-05-21 05:38:09'),
(11, 'Yin yoga', '21953706c9470cca90b8985cb6ca5d201590039845.jpg', '<b>Morning</b><div><b>Mon to sun :5 a.m to 8 a.m</b></div>', '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">Yin Yoga is a slow-paced style of yoga as exercise, incorporating principles of traditional Chinese medicine, with asanas that are held for longer periods of time than in other styles</span><br>', 'Kailash Kasturba', 6573198798, '2d9eb548873cf8e37f52b96419e07db91590039845.jpg', '9000.00', '12 Weeks', '2020-05-21 05:44:05'),
(12, 'Restorative yoga', 'bb9a24ea88b0128c0d1b9d8c6e37939f1590046997.png', 'dszdgtytry', 'ytrydutyu', 'gfdgfhdh', 6546798789, 'e78af50f250cbca2607f567d43c2881d1590046997.jpg', '2200.00', '2 month', '2020-05-21 07:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL,
  `ReadDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Message`, `EnquiryDate`, `IsRead`, `ReadDate`) VALUES
(1, 'ggjgjg', 'jhgjhghj', 4697987987, 'g@gmail.com', 'lkjlkjlkj', '2020-05-22 05:48:27', 1, '2020-05-22 05:48:27'),
(2, 'Guru', 'Kripa', 1879879878, 'guru@gmail.com', 'Sample Text', '2020-05-22 07:27:23', 1, '2020-05-23 12:58:03'),
(3, 'ABC', 'XYZ', 1236547890, 'test@gmail.com', 'Test query', '2020-05-25 10:43:03', 1, '2020-05-25 10:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `OpenningTime` varchar(200) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `OpenningTime`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em; margin-left: 1.655em; color: rgb(0, 0, 0); font-family: \" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: left; \">Yoga is suitable for everybody regardless of their age, fitness, religion, gender or belief system.</li><li style=\"text-align: left; \">Yoga heals physical, emotional and psychological needs to maintain good health.</li><li style=\"text-align: left; \">Yoga&nbsp; is a path to cope with stresses of life as it is very objective intelligent compared to all other cross-training.</li><li style=\"text-align: left; \">It is an ultimate mind body experience, the practitioner will develop a noticeable improvement in their practice with greater flexibility, balance and coordination.</li><li style=\"text-align: left; \">Yoga cleanses and purifies the body of all toxins. You feel very relaxed, happy and connect with the inner self, which improves your relationships, career and lifestyle.</li><li style=\"text-align: left; \">We focus on proper form and alignment, so you get the most out your workout. We customize your unique fitness class. The secret of our success is the daily routine practice.</li><li style=\"text-align: left;\">Our mission is to inspire and motivate every woman and man to practice wellness in life.</li></ul>', NULL, NULL, '', '2020-05-20 07:21:52'),
(2, 'contactus', 'Contact Us', 'D-204, Hole Town South West,Delhi-110096,India', 'info@gmail.com', 4654645646, 'Mon - Sat: 6:30am - 07:45pm', '2020-05-20 07:24:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
