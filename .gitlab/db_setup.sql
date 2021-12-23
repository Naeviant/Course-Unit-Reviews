-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Server version: 8.0.25
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `CUR_Agreements`
--

CREATE TABLE `CUR_Agreements` (
  `ReviewID` int NOT NULL,
  `Username` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Type` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `CUR_CourseUnits`
--

CREATE TABLE `CUR_CourseUnits` (
  `Year` int NOT NULL,
  `Code` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Credits` int NOT NULL,
  `Level` tinyint NOT NULL,
  `Length` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Lead` int NOT NULL,
  `ExamPercentage` int NOT NULL,
  `CourseworkPercentage` int NOT NULL,
  `LectureHours` int NOT NULL,
  `WorkshopHours` int NOT NULL,
  `TutorialHours` int NOT NULL,
  `IndependentHours` int NOT NULL,
  `Optional` tinyint(1) NOT NULL,
  `ExamHours` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CUR_CourseUnits`
--

INSERT INTO `CUR_CourseUnits` (`Year`, `Code`, `Name`, `Credits`, `Level`, `Length`, `Lead`, `ExamPercentage`, `CourseworkPercentage`, `LectureHours`, `WorkshopHours`, `TutorialHours`, `IndependentHours`, `Optional`, `ExamHours`) VALUES
(2020, 'COMP10120', 'First Year Team Project', 20, 1, 'Full Year', 1, 0, 100, 22, 41, 23, 114, 0, 0),
(2020, 'COMP11120', 'Mathematical Techniques for Computer Science', 20, 1, 'Full Year', 6, 80, 20, 22, 22, 0, 152, 0, 4),
(2020, 'COMP11212', 'Fundamentals of Computation', 10, 1, 'Semester 2', 17, 80, 20, 11, 11, 0, 76, 0, 2),
(2020, 'COMP12111', 'Fundamentals of Computer Engineering', 10, 1, 'Semester 1', 10, 50, 50, 11, 0, 0, 87, 0, 2),
(2020, 'COMP13212', 'Data Science', 10, 1, 'Semester 2', 18, 80, 20, 22, 12, 0, 66, 0, 3),
(2020, 'COMP15111', 'Fundamentals of Computer Architecture', 10, 1, 'Semester 1', 15, 50, 50, 44, 15, 0, 39, 0, 2),
(2020, 'COMP15212', 'Operating Systems', 10, 1, 'Semester 2', 20, 80, 20, 40, 20, 0, 40, 0, 2),
(2020, 'COMP16321', 'Introduction to Programming 1', 20, 1, 'Semester 1', 16, 50, 50, 22, 24, 0, 154, 0, 2),
(2020, 'COMP16412', 'Introduction to Programming 2', 10, 1, 'Semester 2', 21, 50, 50, 12, 36, 0, 52, 0, 2),
(2020, 'COMP21111', 'Logic and Modelling', 10, 2, 'Semester 1', 38, 50, 50, 24, 9, 0, 65, 1, 2),
(2020, 'COMP22111', 'Processor Microarchitecture', 10, 2, 'Semester 1', 10, 50, 50, 11, 0, 0, 87, 1, 2),
(2020, 'COMP22712', 'Microcontrollers', 10, 2, 'Semester 2', 42, 0, 100, 0, 24, 0, 76, 1, 0),
(2020, 'COMP23111', 'Database Systems', 10, 2, 'Semester 1', 16, 50, 50, 11, 15, 0, 72, 1, 2),
(2020, 'COMP23311', 'Software Engineering 1', 10, 2, 'Semester 1', 5, 30, 70, 1, 64, 0, 35, 0, 2),
(2020, 'COMP23412', 'Software Engineering 2', 10, 2, 'Semester 2', 21, 30, 70, 0, 22, 0, 78, 0, 2),
(2020, 'COMP24011', 'Introduction to AI', 10, 2, 'Semester 1', 36, 80, 20, 22, 8, 0, 70, 1, 2),
(2020, 'COMP24112', 'Machine Learning', 10, 2, 'Semester 2', 45, 30, 70, 22, 12, 0, 64, 1, 2),
(2020, 'COMP24412', 'Knowledge Based AI', 10, 2, 'Semester 2', 30, 30, 70, 22, 10, 0, 77, 1, 2),
(2020, 'COMP25212', 'System Architecture', 10, 2, 'Semester 2', 43, 50, 50, 22, 12, 0, 64, 1, 2),
(2020, 'COMP26020', 'Programming Languages & Paradigms', 20, 2, 'Full Year', 26, 80, 20, 44, 20, 0, 136, 0, 2),
(2020, 'COMP26120', 'Algorithms and Data Structures', 20, 2, 'Full Year', 30, 50, 50, 22, 44, 0, 130, 0, 4),
(2020, 'COMP27112', 'Introduction to Visual Computing', 10, 2, 'Semester 2', 44, 70, 30, 24, 10, 0, 64, 1, 2),
(2020, 'COMP28112', 'Distributed Systems', 10, 2, 'Semester 2', 35, 0, 100, 24, 12, 0, 62, 1, 0),
(2020, 'COMP30040', 'Third Year Project Laboratory', 40, 3, 'Full Year', 44, 0, 100, 6, 0, 20, 372, 0, 1),
(2020, 'COMP32211', 'Implementing System-on-Chip Designs', 10, 3, 'Semester 1', 14, 50, 50, 12, 12, 0, 74, 1, 2),
(2020, 'COMP32412', 'The Internet of Things: Architectures and Applications', 10, 3, 'Semester 2', 53, 100, 0, 20, 6, 0, 74, 1, 2),
(2020, 'COMP33511', 'User Experience', 10, 3, 'Semester 1', 46, 0, 100, 11, 11, 0, 78, 1, 0),
(2020, 'COMP34212', 'Cognitive Robotics', 10, 3, 'Semester 2', 54, 70, 30, 24, 8, 0, 66, 1, 2),
(2020, 'COMP35112', 'Chip Multiprocessors', 10, 3, 'Semester 2', 29, 70, 30, 24, 0, 0, 76, 1, 2),
(2020, 'COMP36111', 'Algorithms and Complexity', 10, 3, 'Semester 1', 36, 80, 20, 22, 0, 0, 78, 1, 2),
(2020, 'COMP36212', 'Mathematical Systems and Computation', 10, 3, 'Semester 2', 43, 0, 100, 24, 0, 0, 75, 1, 1),
(2020, 'COMP37111', 'Advanced Computer Graphics', 10, 3, 'Semester 1', 20, 70, 30, 11, 0, 0, 89, 1, 2),
(2020, 'COMP37212', 'Computer Vision', 10, 3, 'Semester 2', 4, 70, 30, 23, 0, 0, 77, 1, 2),
(2021, 'COMP10120', 'First Year Team Project', 20, 1, 'Full Year', 1, 0, 100, 22, 41, 23, 114, 0, 0),
(2021, 'COMP11120', 'Mathematical Techniques for Computer Science', 20, 1, 'Full Year', 6, 80, 20, 22, 22, 0, 152, 0, 4),
(2021, 'COMP11212', 'Fundamentals of Computation', 10, 1, 'Semester 2', 17, 80, 20, 11, 11, 0, 76, 0, 2),
(2021, 'COMP12111', 'Fundamentals of Computer Engineering', 10, 1, 'Semester 1', 10, 50, 50, 11, 0, 0, 87, 0, 2),
(2021, 'COMP13212', 'Data Science', 10, 1, 'Semester 2', 18, 80, 20, 22, 12, 0, 66, 0, 3),
(2021, 'COMP15111', 'Fundamentals of Computer Architecture', 10, 1, 'Semester 1', 15, 50, 50, 44, 15, 0, 39, 0, 2),
(2021, 'COMP15212', 'Operating Systems', 10, 1, 'Semester 2', 20, 80, 20, 40, 20, 0, 40, 0, 2),
(2021, 'COMP16321', 'Introduction to Programming 1', 20, 1, 'Semester 1', 16, 50, 50, 22, 24, 0, 154, 0, 2),
(2021, 'COMP16412', 'Introduction to Programming 2', 10, 1, 'Semester 2', 21, 50, 50, 12, 36, 0, 52, 0, 2),
(2021, 'COMP21111', 'Logic and Modelling', 10, 2, 'Semester 1', 38, 50, 50, 24, 9, 0, 65, 1, 2),
(2021, 'COMP22111', 'Processor Microarchitecture', 10, 2, 'Semester 1', 10, 50, 50, 11, 0, 0, 87, 1, 2),
(2021, 'COMP22712', 'Microcontrollers', 10, 2, 'Semester 2', 41, 0, 100, 0, 24, 0, 76, 1, 0),
(2021, 'COMP23111', 'Database Systems', 10, 2, 'Semester 1', 16, 50, 50, 11, 15, 0, 72, 1, 2),
(2021, 'COMP23311', 'Software Engineering 1', 10, 2, 'Semester 1', 5, 30, 70, 1, 64, 0, 35, 0, 2),
(2021, 'COMP23412', 'Software Engineering 2', 10, 2, 'Semester 2', 21, 30, 70, 0, 22, 0, 78, 0, 2),
(2021, 'COMP24011', 'Introduction to AI', 10, 2, 'Semester 1', 36, 80, 20, 22, 8, 0, 70, 1, 2),
(2021, 'COMP24112', 'Machine Learning', 10, 2, 'Semester 2', 45, 30, 70, 22, 12, 0, 64, 1, 2),
(2021, 'COMP24412', 'Knowledge Based AI', 10, 2, 'Semester 2', 24, 30, 70, 22, 10, 0, 77, 1, 2),
(2021, 'COMP25212', 'System Architecture', 10, 2, 'Semester 2', 43, 50, 50, 22, 12, 0, 64, 1, 2),
(2021, 'COMP26020', 'Programming Languages & Paradigms', 20, 2, 'Full Year', 26, 80, 20, 44, 20, 0, 136, 0, 2),
(2021, 'COMP26120', 'Algorithms and Data Structures', 20, 2, 'Full Year', 32, 50, 50, 22, 44, 0, 130, 0, 4),
(2021, 'COMP27112', 'Introduction to Visual Computing', 10, 2, 'Semester 2', 44, 70, 30, 24, 10, 0, 64, 1, 2),
(2021, 'COMP28112', 'Distributed Systems', 10, 2, 'Semester 2', 35, 0, 100, 24, 12, 0, 62, 1, 0),
(2021, 'COMP2CARS', 'Careers', 0, 2, 'Full Year', 5, 0, 0, 7, 0, 4, 0, 0, 0),
(2021, 'COMP30040', 'Third Year Project Laboratory', 40, 3, 'Full Year', 44, 0, 100, 6, 0, 20, 372, 0, 1),
(2021, 'COMP31311', 'Giving Meaning to Programs', 10, 3, 'Semester 1', 6, 80, 20, 11, 0, 0, 89, 1, 2),
(2021, 'COMP32211', 'Implementing System-on-Chip Designs', 10, 3, 'Semester 1', 14, 50, 50, 12, 12, 0, 74, 1, 2),
(2021, 'COMP32412', 'The Internet of Things: Architectures and Applications', 10, 3, 'Semester 2', 53, 100, 0, 20, 6, 0, 74, 1, 2),
(2021, 'COMP33312', 'Agile Software Pipelines', 10, 3, 'Semester 2', 19, 100, 0, 0, 22, 0, 76, 1, 2),
(2021, 'COMP33511', 'User Experience', 10, 3, 'Semester 1', 46, 0, 100, 11, 11, 0, 78, 1, 0),
(2021, 'COMP34111', 'AI and Games', 10, 3, 'Semester 1', 18, 50, 50, 12, 18, 0, 70, 1, 2),
(2021, 'COMP34212', 'Cognitive Robotics', 10, 3, 'Semester 2', 54, 70, 30, 24, 8, 0, 66, 1, 2),
(2021, 'COMP34612', 'Computational Game Theory', 10, 3, 'Semester 2', 47, 50, 50, 12, 16, 0, 72, 1, 2),
(2021, 'COMP34711', 'Natural Language Processing', 10, 3, 'Semester 1', 45, 50, 50, 22, 10, 0, 68, 1, 2),
(2021, 'COMP34812', 'Natural Language Understanding', 10, 3, 'Semester 2', 37, 50, 50, 20, 10, 0, 70, 1, 2),
(2021, 'COMP35112', 'Chip Multiprocessors', 10, 3, 'Semester 2', 29, 70, 30, 24, 0, 0, 76, 1, 2),
(2021, 'COMP36111', 'Algorithms and Complexity', 10, 3, 'Semester 1', 36, 80, 20, 22, 0, 0, 78, 1, 2),
(2021, 'COMP36212', 'Mathematical Systems and Computation', 10, 3, 'Semester 2', 43, 0, 100, 24, 0, 0, 75, 1, 1),
(2021, 'COMP37111', 'Advanced Computer Graphics', 10, 3, 'Semester 1', 20, 70, 30, 11, 0, 0, 89, 1, 2),
(2021, 'COMP37212', 'Computer Vision', 10, 3, 'Semester 2', 4, 70, 30, 23, 0, 0, 77, 1, 2),
(2021, 'COMP38311', 'Advanced Distributed Systems', 10, 3, 'Semester 1', 26, 100, 0, 0, 11, 0, 89, 1, 2),
(2021, 'COMP38412', 'Cyber Security', 10, 3, 'Semester 2', 51, 100, 0, 22, 0, 0, 78, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `CUR_Prereqs`
--

CREATE TABLE `CUR_Prereqs` (
  `Year` int NOT NULL,
  `PrereqOf` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `PrereqTo` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CUR_Prereqs`
--

INSERT INTO `CUR_Prereqs` (`Year`, `PrereqOf`, `PrereqTo`) VALUES
(2020, 'COMP11120', 'COMP11212'),
(2020, 'COMP11120', 'COMP21111'),
(2020, 'COMP11120', 'COMP24011'),
(2020, 'COMP11120', 'COMP36111'),
(2020, 'COMP11120', 'COMP36212'),
(2020, 'COMP11120', 'COMP37212'),
(2021, 'COMP11120', 'COMP11212'),
(2021, 'COMP11120', 'COMP21111'),
(2021, 'COMP11120', 'COMP24011'),
(2021, 'COMP11120', 'COMP31311'),
(2021, 'COMP11120', 'COMP34111'),
(2021, 'COMP11120', 'COMP34612'),
(2021, 'COMP11120', 'COMP36111'),
(2021, 'COMP11120', 'COMP36212'),
(2021, 'COMP11120', 'COMP37212'),
(2020, 'COMP11212', 'COMP36111'),
(2021, 'COMP11212', 'COMP36111'),
(2020, 'COMP12111', 'COMP22111'),
(2021, 'COMP12111', 'COMP22111'),
(2020, 'COMP13212', 'COMP24011'),
(2021, 'COMP13212', 'COMP24011'),
(2021, 'COMP13212', 'COMP34111'),
(2021, 'COMP13212', 'COMP34612'),
(2020, 'COMP15111', 'COMP22712'),
(2020, 'COMP15111', 'COMP25212'),
(2021, 'COMP15111', 'COMP22712'),
(2021, 'COMP15111', 'COMP25212'),
(2021, 'COMP15111', 'COMP38412'),
(2020, 'COMP15212', 'COMP28112'),
(2021, 'COMP15212', 'COMP28112'),
(2020, 'COMP16321', 'COMP16412'),
(2020, 'COMP16321', 'COMP23311'),
(2020, 'COMP16321', 'COMP26020'),
(2020, 'COMP16321', 'COMP26120'),
(2021, 'COMP16321', 'COMP16412'),
(2021, 'COMP16321', 'COMP23311'),
(2021, 'COMP16321', 'COMP26020'),
(2021, 'COMP16321', 'COMP26120'),
(2020, 'COMP16412', 'COMP16321'),
(2020, 'COMP16412', 'COMP23311'),
(2020, 'COMP16412', 'COMP26020'),
(2020, 'COMP16412', 'COMP26120'),
(2020, 'COMP16412', 'COMP28112'),
(2021, 'COMP16412', 'COMP16321'),
(2021, 'COMP16412', 'COMP23311'),
(2021, 'COMP16412', 'COMP26020'),
(2021, 'COMP16412', 'COMP26120'),
(2021, 'COMP16412', 'COMP28112'),
(2020, 'COMP22111', 'COMP32211'),
(2021, 'COMP22111', 'COMP32211'),
(2021, 'COMP23111', 'COMP38311'),
(2020, 'COMP23311', 'COMP23412'),
(2020, 'COMP23311', 'COMP33511'),
(2021, 'COMP23311', 'COMP23412'),
(2021, 'COMP23311', 'COMP33312'),
(2021, 'COMP23311', 'COMP33511'),
(2020, 'COMP23412', 'COMP33511'),
(2021, 'COMP23412', 'COMP33312'),
(2021, 'COMP23412', 'COMP33511'),
(2020, 'COMP24011', 'COMP24412'),
(2021, 'COMP24011', 'COMP24412'),
(2021, 'COMP24112', 'COMP34612'),
(2020, 'COMP25212', 'COMP35112'),
(2021, 'COMP25212', 'COMP35112'),
(2020, 'COMP26120', 'COMP36111'),
(2021, 'COMP26120', 'COMP36111'),
(2020, 'COMP27112', 'COMP37111'),
(2020, 'COMP27112', 'COMP37212'),
(2021, 'COMP27112', 'COMP37111'),
(2021, 'COMP27112', 'COMP37212'),
(2020, 'COMP28112', 'COMP32412'),
(2021, 'COMP28112', 'COMP32412'),
(2021, 'COMP28112', 'COMP38311'),
(2021, 'COMP28112', 'COMP38412'),
(2021, 'COMP34111', 'COMP34612'),
(2021, 'COMP34711', 'COMP34812');

-- --------------------------------------------------------

--
-- Table structure for table `CUR_Reviewer`
--

CREATE TABLE `CUR_Reviewer` (
  `Username` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `CUR_Reviews`
--

CREATE TABLE `CUR_Reviews` (
  `ID` int NOT NULL,
  `Year` int NOT NULL,
  `CourseUnit` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `ReviewerUsername` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ExamRating` tinyint DEFAULT NULL,
  `ExamNotes` text COLLATE utf8_unicode_ci,
  `CourseworkRating` tinyint DEFAULT NULL,
  `CourseworkNotes` text COLLATE utf8_unicode_ci,
  `LecturesRating` int DEFAULT NULL,
  `LecturesNotes` text COLLATE utf8_unicode_ci,
  `WorkshopsRating` int DEFAULT NULL,
  `WorkshopsNotes` text COLLATE utf8_unicode_ci,
  `TutorialsRating` tinyint DEFAULT NULL,
  `TutorialsNotes` text COLLATE utf8_unicode_ci,
  `OtherNotes` text COLLATE utf8_unicode_ci,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `CUR_Staff`
--

CREATE TABLE `CUR_Staff` (
  `ID` int NOT NULL,
  `FirstName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CUR_Staff`
--

INSERT INTO `CUR_Staff` (`ID`, `FirstName`, `LastName`) VALUES
(1, 'Uli', 'Sattler'),
(2, 'Stewart', 'Blakeway'),
(3, 'Daniel', 'Dresner'),
(4, 'Aphrodite', 'Galata'),
(5, 'Duncan', 'Hull'),
(6, 'Andrea', 'Schalk'),
(7, 'Clare', 'Dixon'),
(8, 'Joe', 'Razavi'),
(9, 'Renate', 'Schmidt'),
(10, 'Paul', 'Nutter'),
(11, 'Ainur', 'Begalinova'),
(12, 'Christoforos', 'Moutafis'),
(13, 'Jeff', 'Pepper'),
(14, 'Ahmed', 'Saeed'),
(15, 'Christos', 'Kotselidis'),
(16, 'Gareth', 'Henshall'),
(17, 'Sean', 'Bechhofer'),
(18, 'Jonathan', 'Shapiro'),
(19, 'Anas', 'Elhag'),
(20, 'Stephen', 'Pettifer'),
(21, 'Markel', 'Vigo'),
(22, 'Sarah', 'Clinch'),
(23, 'Nikolaos', 'Konstantinou'),
(24, 'Viktor', 'Schlegel'),
(25, 'Tom', 'Thomson'),
(26, 'Rizos', 'Sakellariou'),
(27, 'Richard', 'Banach'),
(28, 'Peter', 'Lammich'),
(29, 'Pierre', 'Olivier'),
(30, 'Giles', 'Reger'),
(31, 'Lucas', 'Cordeiro'),
(32, 'Louise', 'Dennis'),
(33, 'Thomas', 'Carroll'),
(34, 'Suzanne', 'Embury'),
(35, 'Sandra', 'Sampaio'),
(36, 'Ian', 'Pratt-Hartmann'),
(37, 'Riza', 'Batista-Navarro'),
(38, 'Kostantin', 'Korovin'),
(39, 'Robert', 'Haines'),
(40, 'Mustafa', 'Mustafa'),
(41, 'Jim', 'Garside'),
(42, 'Dirk', 'Koch'),
(43, 'Oliver', 'Rhodes'),
(44, 'Tim', 'Morris'),
(45, 'Tingting', 'Mu'),
(46, 'Simon', 'Harper'),
(47, 'Xiao-Jun', 'Zeng'),
(48, 'Goran', 'Nenadic'),
(49, 'Norman', 'Paton'),
(50, 'Pavlos', 'Petoumenos'),
(51, 'Ning', 'Zhang'),
(52, 'Terence', 'Morley'),
(53, 'Vasilis', 'Pavlidis'),
(54, 'Angelo', 'Cangelosi');

-- --------------------------------------------------------

--
-- Table structure for table `CUR_Teaches`
--

CREATE TABLE `CUR_Teaches` (
  `Staff` int NOT NULL,
  `Year` int NOT NULL,
  `CourseUnit` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CUR_Teaches`
--

INSERT INTO `CUR_Teaches` (`Staff`, `Year`, `CourseUnit`) VALUES
(1, 2020, 'COMP10120'),
(1, 2021, 'COMP10120'),
(2, 2020, 'COMP10120'),
(2, 2021, 'COMP10120'),
(3, 2020, 'COMP10120'),
(3, 2021, 'COMP10120'),
(4, 2020, 'COMP10120'),
(4, 2021, 'COMP10120'),
(5, 2020, 'COMP10120'),
(5, 2021, 'COMP10120'),
(6, 2020, 'COMP11120'),
(6, 2021, 'COMP11120'),
(7, 2020, 'COMP11120'),
(7, 2021, 'COMP11120'),
(8, 2020, 'COMP11120'),
(8, 2021, 'COMP11120'),
(9, 2020, 'COMP11120'),
(9, 2021, 'COMP11120'),
(16, 2020, 'COMP11212'),
(16, 2021, 'COMP11212'),
(17, 2020, 'COMP11212'),
(17, 2021, 'COMP11212'),
(10, 2020, 'COMP12111'),
(10, 2021, 'COMP12111'),
(11, 2021, 'COMP12111'),
(12, 2020, 'COMP12111'),
(12, 2021, 'COMP12111'),
(13, 2020, 'COMP12111'),
(13, 2021, 'COMP12111'),
(14, 2020, 'COMP12111'),
(14, 2021, 'COMP12111'),
(25, 2020, 'COMP12111'),
(2, 2020, 'COMP13212'),
(11, 2021, 'COMP13212'),
(18, 2020, 'COMP13212'),
(18, 2021, 'COMP13212'),
(19, 2020, 'COMP13212'),
(19, 2021, 'COMP13212'),
(14, 2020, 'COMP15111'),
(14, 2021, 'COMP15111'),
(15, 2020, 'COMP15111'),
(15, 2021, 'COMP15111'),
(17, 2020, 'COMP15212'),
(17, 2021, 'COMP15212'),
(20, 2020, 'COMP15212'),
(20, 2021, 'COMP15212'),
(2, 2020, 'COMP16321'),
(2, 2021, 'COMP16321'),
(16, 2020, 'COMP16321'),
(16, 2021, 'COMP16321'),
(21, 2020, 'COMP16412'),
(21, 2021, 'COMP16412'),
(22, 2020, 'COMP16412'),
(23, 2020, 'COMP16412'),
(24, 2020, 'COMP16412'),
(24, 2021, 'COMP16412'),
(38, 2020, 'COMP21111'),
(38, 2021, 'COMP21111'),
(10, 2020, 'COMP22111'),
(10, 2021, 'COMP22111'),
(12, 2020, 'COMP22111'),
(12, 2021, 'COMP22111'),
(13, 2020, 'COMP22111'),
(13, 2021, 'COMP22111'),
(11, 2020, 'COMP22712'),
(11, 2021, 'COMP22712'),
(13, 2020, 'COMP22712'),
(13, 2021, 'COMP22712'),
(41, 2021, 'COMP22712'),
(42, 2020, 'COMP22712'),
(42, 2021, 'COMP22712'),
(2, 2020, 'COMP23111'),
(2, 2021, 'COMP23111'),
(16, 2020, 'COMP23111'),
(16, 2021, 'COMP23111'),
(5, 2020, 'COMP23311'),
(5, 2021, 'COMP23311'),
(19, 2020, 'COMP23311'),
(19, 2021, 'COMP23311'),
(23, 2020, 'COMP23311'),
(24, 2020, 'COMP23311'),
(33, 2021, 'COMP23311'),
(34, 2021, 'COMP23311'),
(35, 2020, 'COMP23311'),
(35, 2021, 'COMP23311'),
(21, 2020, 'COMP23412'),
(21, 2021, 'COMP23412'),
(23, 2020, 'COMP23412'),
(24, 2020, 'COMP23412'),
(33, 2021, 'COMP23412'),
(39, 2020, 'COMP23412'),
(39, 2021, 'COMP23412'),
(40, 2020, 'COMP23412'),
(40, 2021, 'COMP23412'),
(36, 2020, 'COMP24011'),
(36, 2021, 'COMP24011'),
(37, 2020, 'COMP24011'),
(37, 2021, 'COMP24011'),
(11, 2020, 'COMP24112'),
(11, 2021, 'COMP24112'),
(45, 2020, 'COMP24112'),
(45, 2021, 'COMP24112'),
(8, 2021, 'COMP24412'),
(24, 2020, 'COMP24412'),
(24, 2021, 'COMP24412'),
(30, 2020, 'COMP24412'),
(41, 2020, 'COMP25212'),
(41, 2021, 'COMP25212'),
(43, 2020, 'COMP25212'),
(43, 2021, 'COMP25212'),
(8, 2020, 'COMP26020'),
(8, 2021, 'COMP26020'),
(26, 2020, 'COMP26020'),
(26, 2021, 'COMP26020'),
(27, 2020, 'COMP26020'),
(28, 2020, 'COMP26020'),
(29, 2020, 'COMP26020'),
(29, 2021, 'COMP26020'),
(11, 2020, 'COMP26120'),
(23, 2020, 'COMP26120'),
(25, 2021, 'COMP26120'),
(28, 2020, 'COMP26120'),
(30, 2020, 'COMP26120'),
(31, 2020, 'COMP26120'),
(31, 2021, 'COMP26120'),
(32, 2020, 'COMP26120'),
(32, 2021, 'COMP26120'),
(44, 2020, 'COMP27112'),
(44, 2021, 'COMP27112'),
(14, 2020, 'COMP28112'),
(14, 2021, 'COMP28112'),
(35, 2020, 'COMP28112'),
(35, 2021, 'COMP28112'),
(5, 2021, 'COMP2CARS'),
(44, 2020, 'COMP30040'),
(44, 2021, 'COMP30040'),
(6, 2021, 'COMP31311'),
(8, 2021, 'COMP31311'),
(14, 2020, 'COMP32211'),
(14, 2021, 'COMP32211'),
(41, 2020, 'COMP32211'),
(41, 2021, 'COMP32211'),
(14, 2020, 'COMP32412'),
(14, 2021, 'COMP32412'),
(53, 2020, 'COMP32412'),
(53, 2021, 'COMP32412'),
(19, 2021, 'COMP33312'),
(33, 2021, 'COMP33312'),
(34, 2021, 'COMP33312'),
(46, 2020, 'COMP33511'),
(46, 2021, 'COMP33511'),
(18, 2020, 'COMP34111'),
(18, 2021, 'COMP34111'),
(47, 2020, 'COMP34111'),
(47, 2021, 'COMP34111'),
(54, 2020, 'COMP34212'),
(54, 2021, 'COMP34212'),
(18, 2021, 'COMP34612'),
(47, 2021, 'COMP34612'),
(45, 2021, 'COMP34711'),
(48, 2021, 'COMP34711'),
(24, 2021, 'COMP34812'),
(37, 2021, 'COMP34812'),
(29, 2020, 'COMP35112'),
(29, 2021, 'COMP35112'),
(50, 2020, 'COMP35112'),
(50, 2021, 'COMP35112'),
(36, 2020, 'COMP36111'),
(36, 2021, 'COMP36111'),
(43, 2020, 'COMP36212'),
(43, 2021, 'COMP36212'),
(20, 2020, 'COMP37111'),
(20, 2021, 'COMP37111'),
(44, 2020, 'COMP37111'),
(44, 2021, 'COMP37111'),
(4, 2020, 'COMP37212'),
(4, 2021, 'COMP37212'),
(52, 2020, 'COMP37212'),
(26, 2021, 'COMP38311'),
(49, 2021, 'COMP38311'),
(51, 2021, 'COMP38412');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUR_Agreements`
--
ALTER TABLE `CUR_Agreements`
  ADD PRIMARY KEY (`ReviewID`,`Username`),
  ADD KEY `AgreementUsername` (`Username`);

--
-- Indexes for table `CUR_CourseUnits`
--
ALTER TABLE `CUR_CourseUnits`
  ADD PRIMARY KEY (`Year`,`Code`),
  ADD KEY `Lead` (`Lead`),
  ADD KEY `Code` (`Code`);

--
-- Indexes for table `CUR_Prereqs`
--
ALTER TABLE `CUR_Prereqs`
  ADD PRIMARY KEY (`Year`,`PrereqOf`,`PrereqTo`),
  ADD KEY `PrereqOf` (`PrereqOf`),
  ADD KEY `PrereqTo` (`PrereqTo`);

--
-- Indexes for table `CUR_Reviewer`
--
ALTER TABLE `CUR_Reviewer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `CUR_Reviews`
--
ALTER TABLE `CUR_Reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CUR_Staff`
--
ALTER TABLE `CUR_Staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CUR_Teaches`
--
ALTER TABLE `CUR_Teaches`
  ADD PRIMARY KEY (`Staff`,`Year`,`CourseUnit`),
  ADD KEY `StaffTeachesUnit` (`CourseUnit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CUR_Reviews`
--
ALTER TABLE `CUR_Reviews`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CUR_Staff`
--
ALTER TABLE `CUR_Staff`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CUR_Agreements`
--
ALTER TABLE `CUR_Agreements`
  ADD CONSTRAINT `AgreementReviewID` FOREIGN KEY (`ReviewID`) REFERENCES `CUR_Reviews` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `AgreementUsername` FOREIGN KEY (`Username`) REFERENCES `CUR_Reviewer` (`Username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

--
-- Constraints for table `CUR_CourseUnits`
--
ALTER TABLE `CUR_CourseUnits`
  ADD CONSTRAINT `CourseUnitLead` FOREIGN KEY (`Lead`) REFERENCES `CUR_Staff` (`ID`);

--
-- Constraints for table `CUR_Teaches`
--
ALTER TABLE `CUR_Teaches`
  ADD CONSTRAINT `StaffTeachesID` FOREIGN KEY (`Staff`) REFERENCES `CUR_Staff` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `StaffTeachesUnit` FOREIGN KEY (`CourseUnit`) REFERENCES `CUR_CourseUnits` (`Code`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;
