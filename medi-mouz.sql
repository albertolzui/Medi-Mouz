-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 11:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medi-mouz`
--
CREATE DATABASE IF NOT EXISTS `medi-mouz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `medi-mouz`;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--
-- Creation: Dec 23, 2021 at 06:03 PM
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor` (
  `DocId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `fofspec` varchar(100) NOT NULL,
  `license_num` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone_num` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- MEDIA TYPES FOR TABLE `doctor`:
--   `DocId`
--       `Text_Plain`
--   `email`
--       `Text_Plain`
--   `first_name`
--       `Text_Plain`
--   `fofspec`
--       `Text_Plain`
--   `last_name`
--       `Text_Plain`
--   `license_num`
--       `Text_Plain`
--   `password`
--       `Text_Plain`
--   `phone_num`
--       `Text_Plain`
--   `username`
--       `Text_Plain`
--

--
-- RELATIONSHIPS FOR TABLE `doctor`:
--

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DocId`, `username`, `password`, `first_name`, `last_name`, `fofspec`, `license_num`, `email`, `phone_num`) VALUES
(1, 'alolz', 'overlyhyped', 'Albert', 'Olz', 'Clinical Pathology', 'NH899228', 'albert@live.com', '07038707451'),
(2, 'alolz', 'overbearing', 'Albert', 'Olz', 'Clinical Pathology', 'NH899228', 'albert@live.com', '07038707451'),
(6, 'Mich', 'biscuits', 'Michael', 'Reiter', 'Clinical Pathology', 'NG77773338', 'ab@ab.com', '07038707451'),
(7, 'emmanuelo', 'cronaldo', 'Emmanuel ', 'Olorunfemi', 'Immune Disorders', 'NP99882200', 'oluwasegun.olorunfemi@stud.th-deg.de', '09098989897'),
(8, 'Mugl', 'michaelisawesome', 'Michael', 'Reiter', 'Gynaecology', 'NH990987', 'michael@reiter.com', '4500200201');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_records_patient`
--
-- Creation: Dec 29, 2021 at 09:22 PM
--

DROP TABLE IF EXISTS `doctor_records_patient`;
CREATE TABLE `doctor_records_patient` (
  `Doc_ID` int(11) NOT NULL,
  `Pat_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- MEDIA TYPES FOR TABLE `doctor_records_patient`:
--   `Doc_ID`
--       `Text_Plain`
--

--
-- RELATIONSHIPS FOR TABLE `doctor_records_patient`:
--   `Doc_ID`
--       `doctor` -> `DocId`
--   `Pat_ID`
--       `patient` -> `Pat_Id`
--

--
-- Dumping data for table `doctor_records_patient`
--

INSERT INTO `doctor_records_patient` (`Doc_ID`, `Pat_ID`) VALUES
(1, 1),
(6, 3),
(2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--
-- Creation: Jan 18, 2022 at 03:20 PM
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `images`:
--

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `image_text`) VALUES
(1, 'me.png', 'ssssssssssssssssssssssssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--
-- Creation: Dec 29, 2021 at 09:19 AM
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `Pat_Id` int(8) NOT NULL,
  `Pat_FName` varchar(20) NOT NULL,
  `Pat_LName` varchar(20) NOT NULL,
  `Pat_Age` int(3) NOT NULL,
  `Pat_Sex` varchar(30) NOT NULL,
  `mstat` varchar(30) NOT NULL,
  `Pat_Allergies` varchar(100) NOT NULL,
  `Pat_Vac_Status` set('Partially Vaccinated','Fully Vaccinated','Not vaccinated') NOT NULL,
  `Pat_Weight` varchar(6) NOT NULL,
  `Pat_SSN` int(15) NOT NULL,
  `Pat_Ins_Nr` int(15) NOT NULL,
  `hfname` varchar(100) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `chkup` date NOT NULL DEFAULT current_timestamp(),
  `appt` time NOT NULL,
  `pnum` varchar(16) NOT NULL,
  `pocc` varchar(50) NOT NULL,
  `phadd` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hpi` varchar(2000) NOT NULL,
  `pmh` varchar(2000) NOT NULL,
  `obj` varchar(2000) NOT NULL,
  `assess` varchar(2000) NOT NULL,
  `plan` varchar(2000) NOT NULL,
  `invs` varchar(2000) NOT NULL,
  `ddx` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- MEDIA TYPES FOR TABLE `patient`:
--   `Pat_Id`
--       `Text_Plain`
--   `Pat_FName`
--       `Text_Plain`
--   `Pat_LName`
--       `Text_Plain`
--   `Pat_Age`
--       `Text_Plain`
--   `Pat_Sex`
--       `Text_Plain`
--   `Pat_Allergies`
--       `Text_Plain`
--   `Pat_Vac_Status`
--       `Text_Plain`
--   `Pat_Weight`
--       `Text_Plain`
--   `Pat_SSN`
--       `Text_Plain`
--   `Pat_Ins_Nr`
--       `Text_Plain`
--   `hfname`
--       `Text_Plain`
--   `dob`
--       `Text_Plain`
--   `chkup`
--       `Text_Plain`
--   `appt`
--       `Text_Plain`
--   `pnum`
--       `Text_Plain`
--   `pocc`
--       `Text_Plain`
--   `phadd`
--       `Text_Plain`
--   `email`
--       `Text_Plain`
--   `hpi`
--       `Text_Plain`
--   `pmh`
--       `Text_Plain`
--   `obj`
--       `Text_Plain`
--   `assess`
--       `Text_Plain`
--   `plan`
--       `Text_Plain`
--   `invs`
--       `Text_Plain`
--   `ddx`
--       `Text_Plain`
--

--
-- RELATIONSHIPS FOR TABLE `patient`:
--

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Pat_Id`, `Pat_FName`, `Pat_LName`, `Pat_Age`, `Pat_Sex`, `mstat`, `Pat_Allergies`, `Pat_Vac_Status`, `Pat_Weight`, `Pat_SSN`, `Pat_Ins_Nr`, `hfname`, `dob`, `chkup`, `appt`, `pnum`, `pocc`, `phadd`, `email`, `hpi`, `pmh`, `obj`, `assess`, `plan`, `invs`, `ddx`) VALUES
(1, 'Maika', 'Simpson', 59, 'MALE', '', 'Nut, Seaweed', 'Not vaccinated', '99kg', 2147483647, 1002003001, '', '2021-12-26', '2021-12-26', '00:00:00', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Damon', 'Mathias', 10, 'MALE', '', 'Cranberry', 'Fully Vaccinated', '100kg', 1100298347, 1922734567, '', '2021-12-26', '0000-00-00', '05:00:00', '', '', '', '', 'boll', 'ball', 'call', 'assess', 'plan', '', 'ddx'),
(11, 'Rachel', 'Rollit', 30, 'Female', 'Married', 'Castor oil', 'Fully Vaccinated', '20kg', 1002030099, 1002330010, 'Medi-Mouz', '1991-07-22', '2022-01-22', '09:18:00', '08088776654', 'Dentist', 'Irgendwo, 99', 'rachroll@get.com', 'Onset of stomach pains - 22/6/2021', 'Had an appendectomy- age 7', 'Tenderness in left upper abdomen', 'Will require an endoscopy', 'Endoscopy, Medications', 'Endoscopy', 'Stomach Ulcer');

-- --------------------------------------------------------

--
-- Table structure for table `patient_images`
--
-- Creation: Dec 29, 2021 at 10:01 PM
--

DROP TABLE IF EXISTS `patient_images`;
CREATE TABLE `patient_images` (
  `Pat_Id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `patient_images`:
--   `img_id`
--       `images` -> `id`
--   `Pat_Id`
--       `patient` -> `Pat_Id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DocId`),
  ADD KEY `DocId` (`DocId`);

--
-- Indexes for table `doctor_records_patient`
--
ALTER TABLE `doctor_records_patient`
  ADD KEY `fk_doc_drp` (`Doc_ID`),
  ADD KEY `fk_pat_drp` (`Pat_ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Pat_Id`),
  ADD KEY `Pat_Id` (`Pat_Id`);

--
-- Indexes for table `patient_images`
--
ALTER TABLE `patient_images`
  ADD KEY `fk_img_pat` (`img_id`),
  ADD KEY `fk_pat_img` (`Pat_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DocId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Pat_Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_records_patient`
--
ALTER TABLE `doctor_records_patient`
  ADD CONSTRAINT `fk_doc_drp` FOREIGN KEY (`Doc_ID`) REFERENCES `doctor` (`DocId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pat_drp` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`Pat_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_images`
--
ALTER TABLE `patient_images`
  ADD CONSTRAINT `fk_img_pat` FOREIGN KEY (`img_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pat_img` FOREIGN KEY (`Pat_Id`) REFERENCES `patient` (`Pat_Id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table doctor
--

--
-- Dumping data for table `pma__column_info`
--

INSERT INTO `pma__column_info` (`db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`, `input_transformation`, `input_transformation_options`) VALUES
('medi-mouz', 'doctor', 'DocId', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor', 'email', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor', 'first_name', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor', 'fofspec', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor', 'last_name', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor', 'license_num', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor', 'password', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor', 'phone_num', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor', 'username', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', '');

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'medi-mouz', 'doctor', '{\"sorted_col\":\"`doctor`.`DocId`  ASC\"}', '2021-12-23 18:00:49');

--
-- Metadata for table doctor_records_patient
--

--
-- Dumping data for table `pma__column_info`
--

INSERT INTO `pma__column_info` (`db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`, `input_transformation`, `input_transformation_options`) VALUES
('medi-mouz', 'doctor_records_patient', 'Doc_ID', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'doctor_records_patient', 'Pat_ID', '', '', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', '');

--
-- Metadata for table images
--

--
-- Metadata for table patient
--

--
-- Dumping data for table `pma__column_info`
--

INSERT INTO `pma__column_info` (`db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`, `input_transformation`, `input_transformation_options`) VALUES
('medi-mouz', 'patient', 'Pat_Id', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_FName', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_LName', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_Age', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_Sex', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_Allergies', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_Vac_Status', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_Weight', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_SSN', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'Pat_Ins_Nr', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'hfname', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'dob', '', 'text_plain', 'output/text_plain_dateformat.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'chkup', '', 'text_plain', 'output/text_plain_dateformat.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'appt', '', 'text_plain', 'output/text_plain_dateformat.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'pnum', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'pocc', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'phadd', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'email', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', ''),
('medi-mouz', 'patient', 'hpi', '', 'text_plain', '', '', '', ''),
('medi-mouz', 'patient', 'pmh', '', 'text_plain', '', '', '', ''),
('medi-mouz', 'patient', 'obj', '', 'text_plain', '', '', '', ''),
('medi-mouz', 'patient', 'assess', '', 'text_plain', '', '', '', ''),
('medi-mouz', 'patient', 'plan', '', 'text_plain', '', '', '', ''),
('medi-mouz', 'patient', 'invs', '', 'text_plain', '', '', '', ''),
('medi-mouz', 'patient', 'ddx', '', 'text_plain', 'output/text_plain_xml.php', '', 'Input/Text_Plain_XmlEditor.php', '');

--
-- Metadata for table patient_images
--

--
-- Metadata for database medi-mouz
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
