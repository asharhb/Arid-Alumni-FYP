-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 09:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aridalumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `number` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `number`) VALUES
(4, 'ahmadnawaz@gmail.com', 'admin', 'Ahmad Nawaz', '03096393109'),
(5, 'asharbhatti105@gmail.com', 'admin', 'Ashar habib', '03096393108');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `FullName` varchar(225) NOT NULL,
  `RegistrationNo` varchar(225) NOT NULL,
  `CNIC_img` varchar(225) NOT NULL,
  `Session` varchar(225) NOT NULL,
  `CNIC_no` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `PhoneNumber` varchar(225) NOT NULL,
  `Passoutyear` varchar(225) NOT NULL,
  `DepartmentofGraduation` varchar(225) NOT NULL,
  `CurrentEmployementStatus` varchar(225) NOT NULL,
  `Designation` varchar(225) NOT NULL,
  `OrganizationName` varchar(225) NOT NULL,
  `OfficeEmail` varchar(225) NOT NULL,
  `OfficePhNo` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `FullName`, `RegistrationNo`, `CNIC_img`, `Session`, `CNIC_no`, `Email`, `gender`, `PhoneNumber`, `Passoutyear`, `DepartmentofGraduation`, `CurrentEmployementStatus`, `Designation`, `OrganizationName`, `OfficeEmail`, `OfficePhNo`, `Password`, `status`, `date`) VALUES
(25, 'Ashar Habib', '20-Arid-69', 'files/65a0b75783749_Admin Usecase.drawio.png', '2020-2024', '36502-1161289-3', 'asharbhatti105@gmail.com', 'Male', '03096393108', '2024', 'BSCS', 'Software Engineer', 'Developer', 'Naeluxus Technologies', 'naeluxustechnologies@gmail.com', '04044663925', 'ashar@#2555', 0, '2024-01-08'),
(26, 'Zahid Iqbal', '20-Arid-85', 'files/659c593ed407d_10.jpg', '2020-2024', '36502-1161289-4', 'mhrzahid@gmail.com', 'Male', '03096393110', '2024', 'BSCS', 'Android Developer', 'Developer', 'TechStep', 'techstep@gmail.com', '03009692589', 'zahid@#2580', 0, '2024-01-08'),
(28, 'Musab Fareed', '20-Arid-82', 'files/659c5eeb08e70_10.jpg', '2020-2024', '36502-1161289-6', 'musabfareed@gmail.com', 'Male', '03007540902', '2024', 'BSCS', 'Software Engineer', 'Developer', 'Naeluxus Technologies', 'naelexus@gmail.com', '04044663925', 'musab@#4321', 0, '2024-01-08'),
(29, 'Salman Ali', '20-Arid-77', 'files/659dd2d7671fa_10.jpg', '2023-2027', '36503-1162896-5', 'salmanali@gmail.com', 'Male', '03009690365', '2022', 'BS-SE', 'Android Developer', 'Developer', 'Naeluxus Technologies', 'naeluxustechnologies@gmail.com', '04044663925', 'salman@#6789', 1, '2024-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `CandidateName` varchar(225) NOT NULL,
  `UploadResume` varchar(225) NOT NULL,
  `CandiadateContactNo` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `CoverLetter` longtext NOT NULL,
  `user_id` varchar(224) NOT NULL,
  `user_type` varchar(224) NOT NULL,
  `job_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `CandidateName`, `UploadResume`, `CandiadateContactNo`, `gender`, `Email`, `CoverLetter`, `user_id`, `user_type`, `job_id`) VALUES
(9, 'Ashar Habib', 'files/65a0f9c5e01cd_10.jpg', '03096393108', 'Male', 'asharbhatti105@gmail.com', 'asharhabib', '25', 'alumni', '11');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(5000) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(15, 'Ahmad Nawaz', 'ahmadnawaz@gmail.com', 'Good Initiative', 'Awesome Web for us.'),
(16, 'Ariba Khan', 'aribakhan@gmail.com', 'Nice User Interface', 'I like your web it\'s awesome');

-- --------------------------------------------------------

--
-- Table structure for table `disscusion`
--

CREATE TABLE `disscusion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qus` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disscusion`
--

INSERT INTO `disscusion` (`id`, `name`, `qus`, `date`) VALUES
(6, 'Musab Farid', 'What is Information Security ?', '2024-01-11 07:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `disscussionreply`
--

CREATE TABLE `disscussionreply` (
  `id` int(11) NOT NULL,
  `disscussion_id` varchar(225) NOT NULL,
  `name` longtext NOT NULL,
  `mssg` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disscussionreply`
--

INSERT INTO `disscussionreply` (`id`, `disscussion_id`, `name`, `mssg`, `date`) VALUES
(8, '8', 'Zahid Iqbal', 'hi', '2024-01-11 07:41:18'),
(22, '6', 'Ashar Habib', 'InfoSec', '2024-01-12 08:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` longtext NOT NULL,
  `post` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `msg`, `post`, `img`, `status`) VALUES
(6, 'Ahmad Nawaz', 'I am very happy with the service provided by this institute. Now i have got the job as web developer.', 'Student', 'files/659c560b30339_testimonial-1.jpg', 0),
(8, 'Zahid Iqbal', 'I had a great time in my life, working on projects, attending events and lectures, even studying for exams.', 'Alumni', 'files/659c57e6078ba_testimonial-2.jpg', 0),
(9, 'Farid Masood Khan', 'I had a great time in my life, working on projects, attending events and lectures, even studying for exams.', 'Student', 'files/659c5c088b77a_testimonial-4.jpg', 0),
(10, 'Syed Tayyab', 'Studying in my first year, I developed and improved on many vital skills such as teamworking, communication.', 'Student', 'files/659c5f3526f55_testimonial-3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(225) NOT NULL,
  `Company` varchar(225) NOT NULL,
  `JobLocation` varchar(225) NOT NULL,
  `JobTitle` varchar(225) NOT NULL,
  `Qualification` varchar(225) NOT NULL,
  `Description` longtext NOT NULL,
  `KeySkill` varchar(225) NOT NULL,
  `Package` varchar(225) NOT NULL,
  `ExperienceRequired` varchar(225) NOT NULL,
  `NoofVacancy` varchar(225) NOT NULL,
  `ReferralEmail` varchar(225) NOT NULL,
  `LastDateToApply` varchar(225) NOT NULL,
  `phonenumber` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `user_id`, `user_type`, `Company`, `JobLocation`, `JobTitle`, `Qualification`, `Description`, `KeySkill`, `Package`, `ExperienceRequired`, `NoofVacancy`, `ReferralEmail`, `LastDateToApply`, `phonenumber`, `date`, `status`) VALUES
(10, 25, 'alumni', 'Matex Labz', 'Lahore', 'UI / Ux Designer', 'Graduation', 'Software house is looking for a web developer.', 'Figma', '100K', '1 Year', '3', 'matexlabz@gmail.com', '2024-01-30', '040-4462233', '2024-01-08', 0),
(11, 25, 'alumni', 'TechEmpire', 'Islamabad', 'Android Developer', 'BSIT', 'We need an Android developer.', 'Android Development', '50k', '1.5 Years', '4', 'techempire@gmail.com', '2024-01-27', '040-4462235', '2024-01-08', 0),
(13, 25, 'alumni', 'Matex Labz', 'sahiwal', 'Web Developer', 'bsit', 'Software house is looking for a web developer.', 'react', 'Laborum id pariatur', '2 years', '3', 'kipulypeku@mailinator.com', '2024-01-24', '040-4462232', '2024-01-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `our_record`
--

CREATE TABLE `our_record` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `grad_year` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `des` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `name`, `grad_year`, `department`, `des`, `img`, `status`) VALUES
(2, 'Zain Ur Rehman', '2021', 'Computer Science', 'I distinctly remember the day I entered Arid. Back then, I was an ordinary and mediocre student. It was Arid\'s vision and my mentors\' motivation that poured me with stimulation for work and helped me setting goals in my life. Four years later, I achieved those! It is Barani\'s Outcome Based Study which turned an ordinary student like me into a field specialist. Today, I am serving as Software Engineer in House Survival Valley, a prestigious organisation. Tomorrow, I will achieve beyond my goals.', 'files/659c4bc4bf372_zain.png', 0),
(4, 'Zeeshan Javeed', '2018', 'Computer Science', 'I founded One Wood Solution, after graduating from Arid University. Ever since then, I never looked back and became a successful entrepreneur. I credit my Alma Matter for it. Barani Institute of Sciences provides Outcome Based Education, offering practical exposure to the studies. As curriculum, we covered all the aspects and nuances of entrepreneurship, meaningful traits, tips for success and of course practical approach required in the field. It is their guidance, motivation and exposure, which enabled me to enter the market right after degree. It is still helping me shaping my business venture.', 'files/659c4c52e6176_zeeshan.png', 0),
(6, 'Ahsan Ghaffar', ' 2018', 'MCS', 'I express my gratitude to the Arid University and the Department of Computer Sciences for ensuring various opportunities and for encouragement to gain knowledge through the Outcome-Based Education (OBE). It helped me to understand my internal potential and to build a career in field specific job. Currently I am serving as a Software Quality Assurance Manager at Innova dels Technologies, a UK based firm developing eCommerce and Salesforce Commerce Cloud.', 'files/659c4d5f35ff9_ahsan ghaffar.png', 0),
(9, 'Ijaz Ahmad', '2017', 'M.SC MATHEMATICS', 'Being a part of Education Department, Punjab, I wholeheartedly announce that Arid University offered me the experience, motivation, supervision, the opportunity of learn & to seek employment. at that time, I focused narrowly on pure mathematics. The vision of my Alma Matter, and supervision of my teachers helped me to think ahead. I expended interest in this field, started seeing mathematics as a walk of life rather than study of numbers and achieved a Gold Medal. Later, I surpassed the chosen career and opted a job in prestigious sector of education. Now I\'m serving my country with all my heart.', 'files/659c4ee2bf03a_ijaz.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `FullName` varchar(225) NOT NULL,
  `RegistrationNo` varchar(225) NOT NULL,
  `CNIC_img` varchar(225) NOT NULL,
  `Session` varchar(225) NOT NULL,
  `CNIC_no` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `PhoneNumber` varchar(225) NOT NULL,
  `Department` varchar(225) NOT NULL,
  `Gender` varchar(225) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `FullName`, `RegistrationNo`, `CNIC_img`, `Session`, `CNIC_no`, `Email`, `PhoneNumber`, `Department`, `Gender`, `Password`, `status`, `date`) VALUES
(7, 'Ahmad Nawaz', '20-Arid-67', 'files/659bf7303ca31_10.jpg', '2020-2024', '36502-1161289-4', 'ahmadnawaz@gmail.com', '03096393109', 'BSCS', 'Male', 'ahmad@#3033', 0, '2024-01-08'),
(8, 'Farid Masood', '20-Arid-78', 'files/659c5b3eb41c7_header.jpg', '2020-2024', '36502-1161289-2', 'faridmasood@gmail.com', '03096393110', 'Bscs', 'Male', 'farid@#1234', 0, '2024-01-08'),
(9, 'Abdullah Habib', '20-Arid-86', 'files/659dd01aaacae_10.jpg', '2021-2025', '36502-1161289-6', 'abdullahbhatti125@gmail.com', '03106072201', 'BS MLT', 'Male', 'abdullah@#5678', 2, '2024-01-10'),
(10, 'Rehan Sami', '20-Arid-66', 'files/659dd16bb92f0_10.jpg', '2016-2020', '36501-1125368-9', 'rehansami@gmail.com', '03096393115', 'BBA Hons', 'Male', 'rehan@#8765', 1, '2024-01-10'),
(11, 'Imran Khan', '20-Arid-72', 'files/659dd21d2275d_10.jpg', '2019-2023', '36501-6698256-6', 'imrankhan@gmail.com', '03029636805', 'BSCS', '', 'imran@#9876', 1, '2024-01-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disscusion`
--
ALTER TABLE `disscusion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disscussionreply`
--
ALTER TABLE `disscussionreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_record`
--
ALTER TABLE `our_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `disscusion`
--
ALTER TABLE `disscusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `disscussionreply`
--
ALTER TABLE `disscussionreply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `our_record`
--
ALTER TABLE `our_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
