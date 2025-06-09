-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 07:20 PM
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
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(7) NOT NULL,
  `A_USERNAME` varchar(50) NOT NULL,
  `A_PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `A_USERNAME`, `A_PASSWORD`) VALUES
(4567000, 'admin', 'password'),


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(6) NOT NULL,
  `C_FNAME` varchar(30) NOT NULL,
  `C_LNAME` varchar(30) DEFAULT NULL,
  `C_AGE` int(11) NOT NULL,
  `C_SEX` varchar(6) NOT NULL,
  `C_PHNO` varchar(11) NOT NULL,
  `C_MAIL` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_FNAME`, `C_LNAME`, `C_AGE`, `C_SEX`, `C_PHNO`, `C_MAIL`) VALUES
(987001, 'Aisha', 'Khan', 25, 'Female', '3311234567', 'aisha.khan@gmail.com'),
(987002, 'Fatima', 'Ali', 23, 'Female', '3321234568', 'fatima.ali@gmail.com'),
(987003, 'Maryam', 'Sheikh', 30, 'Female', '3331234569', 'maryam.sheikh@gmail.com'),
(987004, 'Zainab', 'Hassan', 28, 'Female', '3341234570', 'zainab.hassan@gmail.com'),
(987005, 'Yasmin', 'Qureshi', 26, 'Female', '3351234571', 'yasmin.qureshi@gmail.com'),
(987006, 'Bilal', 'Ahmed', 27, 'Male', '3361234572', 'bilal.ahmed@gmail.com'),
(987007, 'Hamza', 'Malik', 24, 'Male', '3371234573', 'hamza.malik@gmail.com'),
(987008, 'Ahmed', 'Chaudhry', 35, 'Male', '3381234574', 'ahmed.chaudhry@gmail.com'),
(987009, 'Usman', 'Iqbal', 29, 'Male', '3391234575', 'usman.iqbal@gmail.com'),
(987010, 'Ali', 'Raza', 31, 'Male', '3401234576', 'ali.raza@gmail.com'),
(987011, 'Hassan', 'Syed', 22, 'Male', '3411234577', 'hassan.syed@gmail.com'),
(987012, 'Ibrahim', 'Farooq', 34, 'Male', '3421234578', 'ibrahim.farooq@gmail.com'),
(987013, 'Amir', 'Khan', 28, 'Male', '3431234579', 'amir.khan@gmail.com'),
(987014, 'Sarah', 'Zafar', 27, 'Female', '3441234580', 'sarah.zafar@gmail.com'),
(987015, 'Nadia', 'Shah', 26, 'Female', '3451234581', 'nadia.shah@gmail.com'),
(987016, 'Sana', 'Javed', 25, 'Female', '3461234582', 'sana.javed@gmail.com'),
(987017, 'Ayesha', 'Noor', 23, 'Female', '3471234583', 'ayesha.noor@gmail.com'),
(987018, 'Rehan', 'Tariq', 29, 'Male', '3481234584', 'rehan.tariq@gmail.com'),
(987019, 'Zaid', 'Ansari', 32, 'Male', '3491234585', 'zaid.ansari@gmail.com'),
(987020, 'Khadija', 'Hameed', 24, 'Female', '3501234586', 'khadija.hameed@gmail.com'),
(987021, 'Waleeja', 'Ali', 22, 'Female', '3332156471', 'meow@gmail.com'),
(987022, 'Haleema', 'Saadia', 23, 'Female', '3218764542', 'haleema@gmail.com'),
(987023, 'Rafia', 'Saeed', 20, 'Female', '3452617896', 'rafia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_ID` int(7) NOT NULL,
  `E_FNAME` varchar(30) NOT NULL,
  `E_LNAME` varchar(30) DEFAULT NULL,
  `BDATE` date NOT NULL,
  `E_AGE` int(11) NOT NULL,
  `E_SEX` varchar(6) NOT NULL,
  `E_TYPE` varchar(20) NOT NULL,
  `E_JDATE` date NOT NULL,
  `E_SAL` decimal(8,2) NOT NULL,
  `E_PHNO` varchar(11) NOT NULL,
  `E_MAIL` varchar(40) DEFAULT NULL,
  `E_ADD` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_ID`, `E_FNAME`, `E_LNAME`, `BDATE`, `E_AGE`, `E_SEX`, `E_TYPE`, `E_JDATE`, `E_SAL`, `E_PHNO`, `E_MAIL`, `E_ADD`) VALUES
(4567001, 'Ayesha', 'Ali', '1990-01-15', 34, 'Female', 'Pharmacist', '2015-04-12', 18500.00, '03111234567', 'ayesha.ali@pharmacia.com', 'Karachi'),
(4567002, 'Haris', 'Malik', '1987-08-24', 37, 'Male', 'Manager', '2010-03-10', 15000.00, '03214567890', 'hamza.malik@pharmacia.com', 'Lahore'),
(4567003, 'Fatima', 'Sheikh', '1993-05-20', 31, 'Female', 'Pharmacist', '2018-07-15', 9500.00, '03331234678', 'fatima.sheikh@pharmacia.com', 'Islamabad'),
(4567004, 'Bilal', 'Shah', '1985-12-14', 39, 'Male', 'Manager', '2009-11-25', 17500.00, '03441234567', 'bilal.ahmed@pharmacia.com', 'Karachi'),
(4567005, 'Zainab', 'Hassan', '1992-03-11', 32, 'Female', 'Pharmacist', '2016-05-22', 9000.00, '03561234567', 'zainab.hassan@pharmacia.com', 'Faisalabad'),
(4567006, 'Usman', 'Raza', '1986-10-30', 38, 'Male', 'Manager', '2011-02-01', 16000.00, '03124567890', 'usman.raza@pharmacia.com', 'Rawalpindi'),
(4567007, 'Maryam', 'Zafar', '1991-07-19', 33, 'Female', 'Pharmacist', '2014-09-05', 37000.00, '03314567891', 'maryam.zafar@pharmacia.com', 'Multan'),
(4567008, 'Rehan', 'Farooq', '1988-11-22', 36, 'Male', 'Manager', '2013-06-17', 15500.00, '03454567892', 'rehan.farooq@pharmacia.com', 'Peshawar'),
(4567009, 'Nadia', 'Shah', '1994-04-03', 30, 'Female', 'Pharmacist', '2019-10-12', 10200.00, '03214567893', 'nadia.shah@pharmacia.com', 'Quetta'),
(4567010, 'Ali', 'Ansari', '1984-09-09', 40, 'Male', 'Manager', '2008-08-20', 18000.00, '03164567894', 'ali.ansari@pharmacia.com', 'Hyderabad'),
(4567011, 'Khadija', 'Saeed', '2004-10-08', 20, 'Female', 'admin', '2024-12-04', 28000.00, '02316656712', 'khadija.saeed@gmail.com', '90 Q1 Johar Town, Lahore'),
(4567012, 'Hamza', 'Ahmad', '2002-01-23', 22, 'Male', 'admin', '2024-11-04', 47000.00, '03334542121', 'hamza@gmail.com', '65 J Valencia Town Lahore'),
(4567013, 'Areeba', 'Tanveer', '2004-06-20', 20, 'Female', 'admin', '2024-10-08', 35000.00, '01233454631', 'areeba@gmail.com', '23 F Bahria Town Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `meds`
--

CREATE TABLE `meds` (
  `MED_ID` int(6) NOT NULL,
  `MED_NAME` varchar(50) NOT NULL,
  `BRAND_NAME` varchar(255) NOT NULL,
  `MED_QTY` int(11) NOT NULL,
  `CATEGORY` varchar(20) NOT NULL,
  `MED_PRICE` decimal(6,2) NOT NULL,
  `LOCATION_RACK` int(30) NOT NULL,
  `USEDFOR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meds`
--

INSERT INTO `meds` (`MED_ID`, `MED_NAME`, `BRAND_NAME`, `MED_QTY`, `CATEGORY`, `MED_PRICE`, `LOCATION_RACK`, `USEDFOR`) VALUES
(123001, 'Dolo 650 MG', 'Micro Labs', 500, 'Tablet', 1.00, 2, 'Pain Relief'),
(123002, 'Panadol Cold & Flu', 'GSK (GlaxoSmithKline)', 1000, 'Tablet', 2.50, 1, 'Cold and Flu'),
(123003, 'Livogen', 'M S Reddy’s Laboratories', 200, 'Suppository', 10.00, 1, 'Iron Supplement'),
(123004, 'Gelusil', 'Pfizer', 500, 'Tablet', 1.25, 3, 'Antacid'),
(123005, 'Cyclopam', 'Abbott Laboratories', 100, 'Tablet', 6.00, 2, 'Antispasmodic'),
(123006, 'Benadryl 200 ML', 'Johnson & Johnson', 300, 'Syrup', 50.00, 6, 'Cough and Cold'),
(123007, 'Lopamide', 'Johnson & Johnson', 600, 'Capsule', 5.00, 8, 'Diarrhea Relief'),
(123008, 'Vitamic C', 'Himalaya', 150, 'Tablet', 3.00, 7, 'Vitamin C Supplement'),
(123009, 'Omeprazole', 'Dr. Reddy’s Laboratories', 390, 'Capsule', 4.00, 4, 'Acid Reflux'),
(123010, 'Nitroglycerin', 'Bayer', 345, 'Tablet', 15.00, 1, 'Heart Disease'),
(123011, 'Augmentin 250 ML', 'GSK (GlaxoSmithKline)', 800, 'Syrup', 80.00, 5, 'Antibiotic'),
(123012, 'Cetirizine', 'Dr. Reddy’s Laboratories', 250, 'Tablet', 1.25, 1, 'Allergy Relief'),
(123013, 'Aspirin', 'Bayer', 500, 'Tablet', 0.50, 9, 'Pain Relief'),
(123014, 'Nexium', 'AstraZeneca', 700, 'Capsule', 8.00, 8, 'Acid Reflux'),
(123015, 'Zyrtec', 'Johnson & Johnson', 440, 'Tablet', 2.00, 1, 'Allergy Relief'),
(123016, 'Augmentin 500 mg', 'GSK (GlaxoSmithKline)', 550, 'Tablet', 10.00, 7, 'Antibiotic'),
(123017, 'Lipitor', 'Pfizer', 980, 'Tablet', 5.50, 1, 'Cholesterol'),
(123018, 'Metformin', 'Bristol-Myers Squibb', 271, 'Tablet', 3.00, 5, 'Diabetes'),
(123019, 'Paracetamol', 'Cadila Healthcare', 600, 'Tablet', 0.20, 1, 'Pain Relief'),
(123020, 'Prednisolone', 'M S Reddy’s Laboratories', 750, 'Tablet', 2.50, 3, 'Anti-inflammatory'),
(123021, 'Ranitidine', 'Sanofi', 350, 'Tablet', 4.00, 1, 'Acid Reflux'),
(123022, 'Lisinopril', 'Novartis', 880, 'Tablet', 6.00, 4, 'Blood Pressure'),
(123023, 'Ciprofloxacin', 'Bayer', 20, 'Tablet', 7.50, 2, 'Antibiotic'),
(123024, 'Gaviscon', 'Reckitt Benckiser', 250, 'Liquid', 2.00, 1, 'Acid Reflux'),
(123025, 'Amoxicillin', 'Mylan Pharmaceuticals', 200, 'Capsule', 6.50, 1, 'Antibiotic'),
(123026, 'Calcium Carbonate', 'Torrent Pharmaceuticals', 150, 'Tablet', 3.50, 8, 'Supplement'),
(123027, 'Oxycodone', 'Endo Pharmaceuticals', 180, 'Tablet', 10.00, 1, 'Pain Relief'),
(123028, 'Ibuprofen', 'Johnson & Johnson', 220, 'Tablet', 0.80, 1, 'Pain Relief'),
(123029, 'Lorazepam', 'Pfizer', 47, 'Tablet', 5.00, 1, 'Anti-anxiety'),
(123030, 'Fluoxetine', 'Eli Lilly and Co.', 250, 'Capsule', 7.00, 1, 'Anti-depressant'),
(123031, 'Lisinopril', 'Novartis', 100, 'Tablet', 6.00, 1, 'Blood Pressure'),
(123032, 'Valium', 'Roche', 350, 'Tablet', 6.50, 1, 'Anti-anxiety'),
(123033, 'Cough Syrup', 'Herbalife', 270, 'Syrup', 5.00, 1, 'Cough Relief'),
(123034, 'Tamsulosin', 'Boehringer Ingelheim', 400, 'Capsule', 9.00, 1, 'Prostate Health'),
(123035, 'Diazepam', 'AbbVie', 450, 'Tablet', 4.50, 1, 'Anti-anxiety'),
(123036, 'Omeprazole', 'AstraZeneca', 500, 'Capsule', 4.00, 1, 'Acid Reflux'),
(123037, 'Simvastatin', 'Merck', 280, 'Tablet', 3.50, 1, 'Cholesterol'),
(123038, 'Sildenafil', 'Pfizer', 320, 'Tablet', 10.00, 1, 'Erectile Dysfunction'),
(123039, 'Sertraline', 'Zoloft', 360, 'Capsule', 5.50, 1, 'Anti-depressant'),
(123040, 'Levothyroxine', 'Eli Lilly', 150, 'Tablet', 8.00, 1, 'Thyroid'),
(123041, 'Alprazolam', 'Pfizer', 220, 'Tablet', 7.00, 1, 'Anti-anxiety'),
(123042, 'Methylprednisolone', 'Pfizer', 140, 'Tablet', 9.00, 1, 'Anti-inflammatory'),
(123043, 'Clindamycin', 'Bayer', 260, 'Capsule', 8.00, 1, 'Antibiotic'),
(123044, 'Doxycycline', 'Pfizer', 33, 'Capsule', 5.50, 1, 'Antibiotic'),
(123045, 'Enalapril', 'Novartis', 410, 'Tablet', 3.00, 1, 'Blood Pressure'),
(123046, 'Furosemide', 'Sanofi', 190, 'Tablet', 1.50, 1, 'Diuretic'),
(123047, 'Fluticasone', 'GlaxoSmithKline', 230, 'Inhaler', 15.00, 1, 'Asthma'),
(123048, 'Loratadine', 'Bayer', 2, 'Tablet', 2.50, 1, 'Allergy Relief'),
(123049, 'Loperamide', 'Johnson & Johnson', 270, 'Capsule', 3.00, 1, 'Diarrhea Relief'),
(123050, 'Diphenhydramine', 'Johnson & Johnson', 350, 'Tablet', 1.25, 1, 'Allergy Relief'),
(123051, 'Prednisone', 'M S Reddy’s Laboratories', 25, 'Tablet', 5.00, 1, 'Anti-inflammatory'),
(123052, 'Azithromycin', 'Pfizer', 300, 'Tablet', 6.00, 1, 'Antibiotic'),
(123053, 'Alendronate', 'Merck', 200, 'Tablet', 12.00, 1, 'Osteoporosis'),
(123054, 'Metoprolol', 'AstraZeneca', 400, 'Tablet', 4.00, 1, 'Blood Pressure'),
(123055, 'Tadalafil', 'Eli Lilly', 350, 'Tablet', 7.50, 1, 'Erectile Dysfunction'),
(123056, 'Glyburide', 'Sanofi', 275, 'Tablet', 6.50, 1, 'Diabetes'),
(123057, 'Hydrocodone', 'Endo Pharmaceuticals', 325, 'Capsule', 12.00, 1, 'Pain Relief'),
(123058, 'Propranolol', 'AstraZeneca', 220, 'Tablet', 4.00, 1, 'Blood Pressure'),
(123059, 'Carvedilol', 'Novartis', 280, 'Tablet', 6.00, 1, 'Blood Pressure'),
(123060, 'Methotrexate', 'Pfizer', 360, 'Tablet', 10.00, 1, 'Cancer');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `P_ID` int(4) NOT NULL,
  `SUP_ID` int(3) NOT NULL,
  `MED_ID` int(6) NOT NULL,
  `P_QTY` int(11) NOT NULL,
  `P_COST` decimal(8,2) NOT NULL,
  `PUR_DATE` date NOT NULL,
  `MFG_DATE` date NOT NULL,
  `EXP_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`P_ID`, `SUP_ID`, `MED_ID`, `P_QTY`, `P_COST`, `PUR_DATE`, `MFG_DATE`, `EXP_DATE`) VALUES
(1001, 125, 123001, 500, 45.00, '2020-01-02', '2019-01-05', '2025-04-24'),
(1002, 123, 123002, 1000, 100.00, '2024-02-10', '2025-01-01', '2025-09-25'),
(1003, 130, 123003, 200, 300.00, '2024-03-15', '2023-12-01', '2025-11-30'),
(1004, 125, 123004, 500, 700.00, '2024-03-20', '2024-01-01', '2026-01-01'),
(1005, 126, 123005, 100, 120.00, '2024-04-01', '2024-02-01', '2026-02-01'),
(1006, 130, 123006, 300, 450.00, '2024-04-10', '2023-11-15', '2025-11-15'),
(1007, 124, 123007, 600, 900.00, '2024-04-15', '2024-03-01', '2026-03-01'),
(1008, 127, 123008, 150, 225.00, '2024-05-01', '2023-10-01', '2025-10-01'),
(1009, 123, 123009, 400, 600.00, '2024-05-10', '2024-01-20', '2026-01-20'),
(1010, 136, 123010, 350, 525.00, '2024-05-20', '2024-02-15', '2026-02-15'),
(1011, 124, 123011, 800, 1000.00, '2024-06-01', '2023-12-10', '2025-12-10'),
(1012, 130, 123012, 250, 375.00, '2024-06-15', '2024-03-05', '2026-03-05'),
(1013, 124, 123013, 500, 750.00, '2024-06-20', '2023-11-01', '2025-11-01'),
(1014, 135, 123014, 700, 1050.00, '2024-07-01', '2023-09-15', '2025-09-15'),
(1015, 126, 123015, 450, 675.00, '2024-07-10', '2024-01-10', '2026-01-10'),
(1016, 127, 123016, 550, 825.00, '2024-07-20', '2024-02-01', '2026-02-01'),
(1017, 128, 123017, 1000, 2000.00, '2024-08-01', '2024-03-15', '2026-03-15'),
(1018, 129, 123018, 300, 450.00, '2024-08-10', '2023-12-01', '2025-12-01'),
(1019, 132, 123019, 600, 900.00, '2024-08-20', '2023-10-15', '2025-10-15'),
(1020, 131, 123020, 750, 1150.00, '2024-09-01', '2023-11-20', '2025-11-20'),
(1021, 122, 123021, 350, 550.00, '2024-09-10', '2024-01-05', '2026-01-05'),
(1022, 123, 123022, 900, 1500.00, '2024-09-20', '2023-12-25', '2025-12-25'),
(1023, 124, 123023, 20, 80.00, '2021-01-22', '2020-12-05', '2025-10-18'),
(1024, 132, 123024, 250, 100.00, '2020-04-02', '2020-05-06', '2024-12-31'),
(1025, 137, 123025, 200, 120.00, '2020-02-01', '2019-08-02', '2025-11-29'),
(1026, 123, 123026, 150, 90.00, '2020-03-01', '2019-09-02', '2025-12-01'),
(1027, 132, 123027, 180, 10.00, '2020-04-05', '2019-10-15', '2026-01-15'),
(1028, 135, 123028, 220, 132.00, '2020-05-10', '2019-11-20', '2026-02-28'),
(1029, 126, 123029, 47, 180.00, '2020-06-15', '2019-12-05', '2026-03-30'),
(1030, 127, 123030, 250, 150.00, '2020-07-20', '2020-01-10', '2026-04-15'),
(1031, 128, 123031, 100, 60.00, '2020-08-25', '2020-02-20', '2026-05-01'),
(1032, 124, 123032, 350, 210.00, '2020-09-01', '2020-03-01', '2026-06-12'),
(1033, 125, 123033, 270, 1620.00, '2020-10-10', '2020-04-15', '2026-07-20'),
(1034, 126, 123034, 400, 240.00, '2020-11-20', '2020-05-20', '2026-08-25'),
(1035, 127, 123035, 450, 270.00, '2020-12-01', '2020-06-10', '2026-09-10'),
(1036, 123, 123036, 500, 300.00, '2021-01-05', '2020-07-01', '2026-10-15'),
(1037, 124, 123037, 280, 168.00, '2021-02-10', '2020-08-20', '2026-11-20'),
(1038, 125, 123038, 320, 192.00, '2021-03-15', '2020-09-15', '2027-01-01'),
(1039, 126, 123039, 360, 216.00, '2021-04-20', '2020-10-10', '2027-02-05'),
(1040, 127, 123040, 150, 90.00, '2021-05-25', '2020-11-20', '2027-03-10'),
(1041, 123, 123041, 220, 132.00, '2021-06-30', '2020-12-10', '2027-04-01'),
(1042, 134, 123042, 140, 84.00, '2021-07-01', '2021-01-15', '2027-05-20'),
(1043, 125, 123043, 260, 156.00, '2021-08-15', '2021-02-10', '2027-06-30'),
(1044, 126, 123044, 33, 198.00, '2021-09-20', '2021-03-05', '2027-08-01'),
(1045, 127, 123045, 410, 246.00, '2021-10-10', '2021-04-20', '2027-09-15'),
(1046, 123, 123046, 190, 1140.00, '2021-11-01', '2021-05-10', '2027-10-25'),
(1047, 134, 123047, 230, 1380.00, '2021-12-15', '2021-06-15', '2027-11-30'),
(1048, 125, 123048, 2, 120.00, '2022-01-20', '2021-07-20', '2028-01-10'),
(1049, 136, 123049, 270, 162.00, '2022-02-28', '2021-08-10', '2028-02-28'),
(1050, 137, 123050, 350, 210.00, '2022-03-15', '2021-09-15', '2028-03-31'),
(1051, 123, 123051, 25, 150.00, '2022-04-01', '2021-10-01', '2028-04-10'),
(1052, 134, 123052, 300, 1800.00, '2022-05-15', '2021-11-05', '2028-05-20'),
(1053, 125, 123053, 200, 120.00, '2022-06-20', '2021-12-15', '2028-06-25'),
(1054, 136, 123054, 400, 240.00, '2022-07-30', '2022-01-20', '2028-07-30'),
(1055, 137, 123055, 350, 210.00, '2022-08-10', '2022-02-10', '2028-08-15'),
(1056, 123, 123056, 275, 160.00, '2022-09-15', '2022-03-05', '2028-09-20'),
(1057, 134, 123057, 325, 195.00, '2022-10-01', '2022-04-10', '2028-10-30'),
(1058, 125, 123058, 220, 132.00, '2022-11-10', '2022-05-15', '2028-12-01'),
(1059, 126, 123059, 280, 168.00, '2022-12-20', '2022-06-25', '2029-01-15'),
(1060, 137, 123060, 360, 216.00, '2023-01-15', '2022-07-10', '2029-03-05');

--
-- Triggers `purchase`
--
DELIMITER $$
CREATE TRIGGER `QTYDELETE` AFTER DELETE ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-old.P_QTY WHERE meds.MED_ID=old.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `QTYINSERT` AFTER INSERT ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY+new.P_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `QTYUPDATE` AFTER UPDATE ON `purchase` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-old.P_QTY WHERE meds.MED_ID=new.MED_ID;
UPDATE meds SET MED_QTY=MED_QTY+new.P_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SALE_ID` int(11) NOT NULL,
  `C_ID` int(6) NOT NULL,
  `S_DATE` date DEFAULT NULL,
  `S_TIME` time DEFAULT NULL,
  `TOTAL_AMT` decimal(8,2) DEFAULT NULL,
  `E_ID` int(7) NOT NULL,
  `tax` decimal(5,2) DEFAULT 16.00,
  `discount` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SALE_ID`, `C_ID`, `S_DATE`, `S_TIME`, `TOTAL_AMT`, `E_ID`, `tax`, `discount`) VALUES
(1, 987001, '2020-08-15', '13:23:03', 208.80, 4567000, 16.00, 0.00),
(2, 987002, '2020-04-16', '14:15:45', 1287.50, 4567001, 16.00, 0.00),
(3, 987003, '2022-01-17', '15:20:10', 139.20, 4567002, 16.00, 0.00),
(4, 987004, '2021-11-18', '16:30:22', 92.80, 4567003, 16.00, 0.00),
(5, 987005, '2024-10-19', '17:45:33', 52.20, 4567004, 16.00, 0.00),
(6, 987006, '2022-03-20', '12:10:00', 162.50, 4567005, 16.00, 0.00),
(7, 987007, '2020-04-21', '11:05:45', 696.00, 4567006, 16.00, 0.00),
(8, 987008, '2020-02-22', '10:55:22', 40.60, 4567007, 16.00, 0.00),
(9, 987009, '2024-04-23', '09:45:00', 1.16, 4567008, 16.00, 0.00),
(10, 987010, '2020-06-24', '08:30:10', 290.00, 4567009, 16.00, 0.00),
(11, 987011, '2023-08-25', '13:15:45', 626.40, 4567010, 16.00, 0.00),
(12, 987012, '2020-12-26', '14:50:00', 133.40, 4567001, 16.00, 0.00),
(13, 987013, '2021-03-27', '15:30:30', 493.00, 4567002, 16.00, 0.00),
(14, 987014, '2020-04-28', '16:20:15', 336.40, 4567003, 16.00, 0.00),
(15, 987015, '2021-05-29', '17:05:50', 185.60, 4567004, 16.00, 0.00),
(16, 987016, '2020-04-30', '18:00:00', 7.54, 4567005, 16.00, 0.00),
(17, 987017, '2022-05-01', '12:45:10', 391.50, 4567006, 16.00, 0.00),
(18, 987018, '2020-05-02', '13:20:00', 348.00, 4567007, 16.00, 0.00),
(19, 987019, '2022-06-03', '14:10:05', 122.96, 4567008, 16.00, 0.00),
(20, 987020, '2020-09-04', '15:15:15', 626.40, 4567009, 16.00, 0.00),
(21, 987021, '2024-09-05', '16:45:45', 63.80, 4567010, 16.00, 0.00),
(22, 987022, '2020-04-21', '20:19:31', 118.32, 4567000, 16.00, 0.00),
(23, 987023, '2024-06-15', '11:23:53', 18.56, 4567005, 16.00, 0.00),
(24, 987024, '2024-09-14', '18:20:00', 46.40, 4567007, 16.00, 0.00),
(25, 987025, '2023-09-21', '15:24:43', 348.00, 4567004, 16.00, 0.00),
(26, 987026, '2021-03-11', '10:24:43', 301.60, 4567003, 16.00, 0.00),
(27, 987027, '2022-04-24', '00:25:54', 92.80, 4567002, 16.00, 0.00),
(28, 987128, '2020-04-24', '00:47:47', 243.60, 4567001, 16.00, 0.00),
(29, 987029, '2024-12-19', '07:22:41', 162.40, 4567010, 16.00, 0.00),
(35, 987021, '2025-01-01', '20:46:22', 90.44, 4567000, 12.00, 5.00),
(36, 987018, '2025-01-01', '20:47:03', 63.84, 4567000, 12.00, 5.00),
(37, 987014, '2025-01-01', '20:47:58', 118.32, 4567000, 16.00, 0.00),
(38, 987022, '2025-01-01', '23:47:25', 118.80, 4567000, 20.00, 10.00),
(39, 987023, '2025-01-01', '23:56:47', 87.40, 4567000, 15.00, 5.00),
(40, 987021, '2025-01-02', '13:28:51', 17.40, 4567000, 16.00, 0.00);

--
-- Triggers `sales`
--
DELIMITER $$
CREATE TRIGGER `SALE_ID_DELETE` BEFORE DELETE ON `sales` FOR EACH ROW BEGIN
DELETE from sales_items WHERE sales_items.SALE_ID=old.SALE_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `SALE_ID` int(11) NOT NULL,
  `MED_ID` int(6) NOT NULL,
  `SALE_QTY` int(11) NOT NULL,
  `TOT_PRICE` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`SALE_ID`, `MED_ID`, `SALE_QTY`, `TOT_PRICE`) VALUES
(1, 123001, 20, 20.00),
(1, 123011, 2, 160.00),
(2, 123003, 75, 750.00),
(2, 123005, 60, 360.00),
(3, 123008, 40, 120.00),
(4, 123011, 1, 80.00),
(5, 123001, 45, 45.00),
(6, 123006, 2, 100.00),
(6, 123009, 10, 40.00),
(7, 123001, 100, 100.00),
(7, 123003, 50, 500.00),
(8, 123001, 10, 10.00),
(8, 123002, 10, 25.00),
(9, 3014, 3, 24.00),
(9, 123013, 2, 1.00),
(10, 123004, 20, 25.00),
(10, 123010, 15, 225.00),
(11, 123003, 30, 300.00),
(11, 123005, 40, 240.00),
(12, 123008, 25, 75.00),
(12, 123009, 10, 40.00),
(13, 123006, 8, 400.00),
(13, 123007, 5, 25.00),
(14, 123001, 50, 50.00),
(14, 123011, 3, 240.00),
(15, 123054, 40, 160.00),
(16, 123032, 1, 6.50),
(17, 123055, 45, 337.50),
(18, 123006, 6, 300.00),
(19, 123009, 10, 40.00),
(19, 123031, 11, 66.00),
(20, 123060, 54, 540.00),
(21, 123044, 10, 55.00),
(22, 123025, 15, 97.50),
(22, 123035, 1, 4.50),
(23, 123014, 2, 16.00),
(24, 123009, 10, 40.00),
(25, 123038, 30, 300.00),
(26, 123033, 52, 260.00),
(27, 123011, 10, 80.00),
(28, 123033, 35, 175.00),
(28, 123051, 7, 35.00),
(29, 123006, 2, 100.00),
(29, 123009, 10, 40.00),
(35, 123017, 10, 55.00),
(35, 123018, 10, 30.00),
(36, 123022, 10, 60.00),
(37, 123010, 5, 75.00),
(37, 123018, 9, 27.00),
(38, 123009, 10, 40.00),
(38, 123017, 10, 55.00),
(38, 123018, 5, 15.00),
(39, 123015, 10, 20.00),
(39, 123022, 10, 60.00),
(40, 123018, 5, 15.00);

--
-- Triggers `sales_items`
--
DELIMITER $$
CREATE TRIGGER `SALEDELETE` AFTER DELETE ON `sales_items` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY+old.SALE_QTY WHERE meds.MED_ID=old.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `SALEINSERT` AFTER INSERT ON `sales_items` FOR EACH ROW BEGIN
UPDATE meds SET MED_QTY=MED_QTY-new.SALE_QTY WHERE meds.MED_ID=new.MED_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SUP_ID` int(6) NOT NULL,
  `SUP_NAME` varchar(25) NOT NULL,
  `SUP_ADD` varchar(30) NOT NULL,
  `SUP_PHNO` varchar(11) NOT NULL,
  `SUP_MAIL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SUP_ID`, `SUP_NAME`, `SUP_ADD`, `SUP_PHNO`, `SUP_MAIL`) VALUES
(123, 'PakPharma Solutions', 'Karachi, Sindh, Pakistan', '02133445566', 'contact@pakpharmasolutions.com'),
(124, 'MedSup Pakistan', 'Lahore, Punjab, Pakistan', '04233445577', 'info@medsup.pk'),
(125, 'HealthCare Distributors', 'Islamabad, Capital Territory, ', '05176543210', 'distributors@healthcare.com'),
(126, 'Lifeline Pharma', 'Rawalpindi, Punjab, Pakistan', '05123456789', 'lifeline@lifelinepharma.com'),
(127, 'PharmaNet Pakistan', 'Karachi, Sindh, Pakistan', '02187654321', 'support@pharmanet.pk'),
(128, 'PakMedic Solutions', 'Faisalabad, Punjab, Pakistan', '04123456790', 'info@pakmedic.com'),
(129, 'HealthLink Pharma', 'Multan, Punjab, Pakistan', '06123456789', 'contact@healthlink.pk'),
(130, 'MedPak Suppliers', 'Peshawar, Khyber Pakhtunkhwa, ', '09123456789', 'sales@medpak.com'),
(131, 'PrimeMed Pharmaceuticals', 'Quetta, Balochistan, Pakistan', '08123456788', 'contact@primemedpharma.com'),
(132, 'CureMed Distribution', 'Sialkot, Punjab, Pakistan', '05223456788', 'info@curemed.com'),
(133, 'Hope Pharma Co.', 'Karachi, Sindh, Pakistan', '02198765432', 'hope@hopepharmaco.com'),
(134, 'TrustMed Suppliers', 'Lahore, Punjab, Pakistan', '04212345678', 'trustmed@trustmedsuppliers.com'),
(135, 'MedGlobal Pakistan', 'Islamabad, Capital Territory, ', '05134567890', 'global@medglobal.com'),
(136, 'CureLink Pharmaceuticals', 'Sukkur, Sindh, Pakistan', '07123456789', 'info@curelinkpharma.com'),
(137, 'MedPrime Co.', 'Faisalabad, Punjab, Pakistan', '04165432100', 'contact@medprime.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_USERNAME`),
  ADD KEY `admin_ibfk_1` (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `meds`
--
ALTER TABLE `meds`
  ADD PRIMARY KEY (`MED_ID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`P_ID`,`MED_ID`),
  ADD KEY `purchase_ibfk_1` (`SUP_ID`),
  ADD KEY `purchase_ibfk_2` (`MED_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALE_ID`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`SALE_ID`,`MED_ID`),
  ADD KEY `sales_items_ibfk_2` (`MED_ID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SUP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987024;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4567014;

--
-- AUTO_INCREMENT for table `meds`
--
ALTER TABLE `meds`
  MODIFY `MED_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123114;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `P_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1061;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SALE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SUP_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
