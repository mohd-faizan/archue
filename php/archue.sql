-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 02:50 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archue`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `architect`
--

CREATE TABLE `architect` (
  `architect_id` int(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `budget` varchar(100) NOT NULL,
  `specification` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `locat` varchar(100) NOT NULL,
  `requirement` varchar(100) NOT NULL,
  `arc_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `architect`
--

INSERT INTO `architect` (`architect_id`, `service`, `project_type`, `area`, `budget`, `specification`, `email`, `phone`, `locat`, `requirement`, `arc_date`) VALUES
(1, 'Design Only', 'dfasfadsf', 'asfasf', 'asf', 'asfsaf', 'ab@gmail.com', '2345678765', 'locatio', 'asfasfasf', 'Sun Jun 24 2018 18:00:50 GMT+0530 (India Standard Time)'),
(2, 'Design Only', 'dfasfadsf', 'asfasf', 'asf', 'asfsaf', 'ab@gmail.com', '2345678765', 'locatio', 'asfasfasf', 'Sun Jun 24 2018 18:07:36 GMT+0530 (India Standard Time)');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(100) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `blog_file` varchar(100) NOT NULL,
  `html_content` text NOT NULL,
  `blog_date` date NOT NULL,
  `blog_time` time NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `heading`, `category`, `blog_file`, `html_content`, `blog_date`, `blog_time`, `user_id`) VALUES
(1, 'name', 'Catogory 2', 'banner2.jpg', '<h2>This is heading</h2><div>this is paragraph<i><b><a href=\"http://www.google.com\"> google.com</a>&nbsp;</b></i></div><div><i><b>how are yiou</b></i></div>', '2018-06-13', '15:40:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `competitor_id` int(100) NOT NULL,
  `competition_heading` varchar(100) NOT NULL,
  `competition_category` varchar(100) NOT NULL,
  `competitor_name` varchar(100) NOT NULL,
  `competitor_content` text NOT NULL,
  `competitor_file` varchar(100) NOT NULL,
  `competitor_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`competitor_id`, `competition_heading`, `competition_category`, `competitor_name`, `competitor_content`, `competitor_file`, `competitor_date`) VALUES
(1, 'ddf', 'Catogory 1', 'dsfdsf', 'dfdsfdsf', 'contactback.png', '2018-06-20 15:11:55'),
(2, 'afad', 'Catogory 1', 'afasf', 'asfasfasf', 'service2.jpg', '2018-06-20 15:15:04'),
(3, 'sadfsf', 'Catogory 1', 'sfsf', 'safsaf<b>safsaf</b>', 'indexformback.jpg', '2018-06-20 15:15:36'),
(4, 'dfgdg', 'Select Category', 'dgdg', 'dgdsgsdg<b>gdsgdsgsdg</b>', 'service6.jpg', '2018-06-20 15:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `dessertation`
--

CREATE TABLE `dessertation` (
  `dessertation_id` int(100) NOT NULL,
  `dessertation_name` varchar(100) NOT NULL,
  `dessertation_place` varchar(100) NOT NULL,
  `dessertation_college` varchar(100) NOT NULL,
  `dessertation_year` varchar(100) NOT NULL,
  `dessertation_file` varchar(100) NOT NULL,
  `desseration_date` date NOT NULL,
  `dessertation_time` time NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dessertation`
--

INSERT INTO `dessertation` (`dessertation_id`, `dessertation_name`, `dessertation_place`, `dessertation_college`, `dessertation_year`, `dessertation_file`, `desseration_date`, `dessertation_time`, `user_id`) VALUES
(1, 'sadaad/das', 'ada', 'dad', 'ada', 'myfile.docx', '0000-00-00', '00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_category` varchar(100) NOT NULL,
  `eventor_name` varchar(100) NOT NULL,
  `event_file` varchar(100) NOT NULL,
  `event_content` text NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_category`, `eventor_name`, `event_file`, `event_content`, `event_date`) VALUES
(1, 'event name', 'Catogory 1', 'YOUR NAME', 'indeximg3.jpg', 'THI SI S', '2018-06-19 19:10:16'),
(2, 'event name', 'Catogory 1', 'YOUR NAME', 'indeximg3.jpg', 'THI SI S', '2018-06-19 19:11:38'),
(3, 'event name', 'Catogory 3', 'YOUR NAME', 'indeximg3.jpg', 'EAAGETET', '2018-06-19 19:12:03'),
(4, 'event name', 'Catogory 2', 'name', 'indexformback.jpg', 'This is good', '2018-06-20 11:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(100) NOT NULL,
  `job_heading` varchar(100) NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `job_provider_name` varchar(100) NOT NULL,
  `job_content` text NOT NULL,
  `job_file` varchar(100) NOT NULL,
  `job_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_heading`, `job_category`, `job_provider_name`, `job_content`, `job_file`, `job_date`) VALUES
(1, 'add', 'Catogory 1', 'adfadsf', 'dafdfsafadf', 'service2.jpg', '2018-06-20 12:54:30'),
(2, 'ass', 'Catogory 1', 'asf', 'dsfasf', 'indexformback.jpg', '2018-06-20 12:59:46'),
(3, 'ass', 'Catogory 1', 'asf', 'dsfasf', 'indexformback.jpg', '2018-06-20 13:00:01'),
(4, 'afadsf', 'Catogory 1', 'afasf', 'safasfasdfa', 'indeximg3.jpg', '2018-06-20 13:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `budget` varchar(100) NOT NULL,
  `specification` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `locat` varchar(100) NOT NULL,
  `requirement` text NOT NULL,
  `mat_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `product_name`, `area`, `budget`, `specification`, `email`, `phone`, `locat`, `requirement`, `mat_date`) VALUES
(1, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'fdgdfgf', 'Sun Jun 24 2018 17:05:23 GMT+0530 (India Standard Time)'),
(2, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'fdgdfgf', 'Sun Jun 24 2018 17:06:17 GMT+0530 (India Standard Time)'),
(3, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'fdgdfgf', 'Sun Jun 24 2018 17:10:23 GMT+0530 (India Standard Time)'),
(4, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'afsffasdf', 'Sun Jun 24 2018 17:10:43 GMT+0530 (India Standard Time)'),
(5, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'dsagdsgsdfg', 'Sun Jun 24 2018 17:11:44 GMT+0530 (India Standard Time)'),
(6, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'dsagdsgsdfg', 'Sun Jun 24 2018 17:12:11 GMT+0530 (India Standard Time)'),
(7, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'ddsdsa', 'Sun Jun 24 2018 17:12:53 GMT+0530 (India Standard Time)'),
(8, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'ssdsfsf', 'Sun Jun 24 2018 17:47:26 GMT+0530 (India Standard Time)'),
(9, 'door', 'fsfs', 'ededfd', 'no specsificatrion', 'ab@gmail.com', '2345678765', 'locatio', 'sfsdasf', 'Sun Jun 24 2018 18:10:16 GMT+0530 (India Standard Time)');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(100) NOT NULL,
  `portfolio_name` varchar(100) NOT NULL,
  `portfolio_place` varchar(100) NOT NULL,
  `portfolio_college` varchar(50) NOT NULL,
  `portfolio_year` varchar(50) NOT NULL,
  `portfolio_file` varchar(50) NOT NULL,
  `portfolio_date` date NOT NULL,
  `portfolio_time` time NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `portfolio_name`, `portfolio_place`, `portfolio_college`, `portfolio_year`, `portfolio_file`, `portfolio_date`, `portfolio_time`, `user_id`) VALUES
(1, 'dad/www', 'dad', 'ada', 'adad', 'faq_question_&_interview_questions_passed.docx', '0000-00-00', '00:00:00', 2),
(2, 'wrw', 'rwr', 'wrw', 'rwr', 'faq_question_&_interview_questions_passed.docx', '0000-00-00', '00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(100) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `project_year` varchar(50) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `site_image` varchar(100) NOT NULL,
  `site_image_desc` text NOT NULL,
  `floor_image` varchar(100) NOT NULL,
  `floor_image_desc` text NOT NULL,
  `elevation_image` varchar(100) NOT NULL,
  `elevation_image_desc` text NOT NULL,
  `section_image` varchar(100) NOT NULL,
  `section_image_desc` text NOT NULL,
  `view3d_img` varchar(100) NOT NULL,
  `project_desc` text NOT NULL,
  `project_date` date NOT NULL,
  `project_time` datetime NOT NULL,
  `project_approve` int(11) NOT NULL DEFAULT '0',
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `location`, `institute`, `area`, `project_year`, `project_type`, `site_image`, `site_image_desc`, `floor_image`, `floor_image_desc`, `elevation_image`, `elevation_image_desc`, `section_image`, `section_image_desc`, `view3d_img`, `project_desc`, `project_date`, `project_time`, `project_approve`, `user_id`) VALUES
(1, 'project/name', 'location', 'institute', 'area', 'projct year', 'Adaptive Reuse', 'backimgform.jpg,banner.jpg', 'site image', 'bannerhelp.jpg,enjoy.jpg', 'floor images', 'city.jpg,hotel1.jpg', 'elevation image', 'subhotel1.jpg,subhotel2.jpg', 'section image', 'subhotel1.jpg,subhotel2.jpg', 'project description', '2018-05-09', '2018-05-10 18:05:50', 1, 1),
(2, 'projetcc name', 'location', 'institute', 'area', 'project year', 'Building Services design', 'aol.jpg,aol1.jpg', 'site images', 'aol3.jpg,aol7.jpg', 'floor images', 'contactus.jpg,outlook.jpg', 'elevation images', 'profile.jpg,profile3.jpg', 'section images', 'profile.jpg,profile3.jpg', 'project description', '2018-05-09', '2018-05-10 18:09:04', 1, 1),
(3, 'project name', 'location', 'institute', 'area', 'project year', 'Adaptive Reuse', 'imgiv.jpg,imgii.jpg', 'site image', 'imgviii.jpg,imgx.jpg', 'floor image', 'imgxiv.jpg,imgxii.jpg', 'elevation image', 'imgiii.jpg,imgvii.jpg', 'sectioj image', 'imgiii.jpg,imgvii.jpg', 'project description', '2018-05-10', '2018-05-10 13:20:21', 1, 1),
(4, 'project name 5', 'location', 'insitute', 'area', 'project year', 'Building Services design', 'imgvii.jpg', 'site imaages 1', 'imgi.jpg', 'flor images 1', 'imgxii.jpg', 'elevation images 2', 'imgxii.jpg', 'section images 2', 'imgxii.jpg', 'project descritptin', '2018-05-27', '2018-05-27 10:35:51', 1, 2),
(5, 'project2', 'location 2', 'institute', 'area', 'project year', 'Building Services design', 'imgi.jpg', 'site image 3', 'imgviii.jpg', 'floor image 4', 'imgx.jpg', 'elevain image 4', 'Tulips.jpg', 'section image 4', 'Tulips.jpg', 'project descritpion', '2018-05-27', '2018-05-27 11:28:18', 1, 2),
(6, 'project 4', 'location 4', 'institute', 'area', 'project year', 'Adaptive Reuse', 'imgxii.jpg', 'site image 4', 'imgxiv.jpg', 'floor image 4', 'imgvii.jpg', 'elevation image 4', 'Tulips.jpg', 'section image5', 'Tulips.jpg', 'project year', '2018-05-27', '2018-05-27 11:39:35', 1, 2),
(7, 'project name 4', 'location 4', 'institute', 'area', 'project year', 'Building Services design', 'imgiv.jpg', 'site plan image', 'imgv.jpg', 'floor image1', 'imgviii.jpg', 'elevaion image 6', 'imgxii.jpg', 'section image', 'imgxii.jpg', 'project description', '2018-05-27', '2018-05-27 11:42:41', 1, 2),
(8, 'project name 7', 'loxcation 7', 'institute 7', 'area 7', 'project year 7', 'Adaptive Reuse', 'imgxii.jpg,imgxiv.jpg', 'site image 7', 'imgvii.jpg', 'fllor image 7', 'imgviii.jpg', 'elevation image 7', 'imgxiii.jpg', 'section image 71', 'imgxiii.jpg', 'project descriptuion 7', '2018-05-27', '2018-05-27 11:50:47', 1, 2),
(9, 'project 6', 'loation 6', 'institute 6', 'area 6', 'project year', 'Adaptive Reuse', 'imgvi.jpg', 'site image 6', 'imgv.jpg', 'floor image1', 'imgx.jpg', 'elevation image 1', 'imgxii.jpg', 'section image 5', 'imgxii.jpg', 'project description', '2018-05-27', '2018-05-27 11:54:57', 1, 2),
(10, 'project 4', 'location 4', 'institute 5', 'area 7', 'project name 1', 'Adaptive Reuse', 'imgiii.jpg', 'site image 2', 'imgviii.jpg', 'floor image', 'imgviii.jpg', 'elevation image', 'imgxiii.jpg', 'section image', 'imgxiii.jpg', 'projecct description', '2018-05-27', '2018-05-27 11:57:21', 1, 2),
(11, 'project', 'location', 'institute', 'area', 'project year', 'Adaptive Reuse', 'imgxiv.jpg', 'site image', 'imgxii.jpg', 'floor images', 'imgiv.jpg', 'elevatio images', 'imgv.jpg', 'sectionimages ', 'imgv.jpg', 'project desacription', '2018-05-29', '2018-05-29 12:40:50', 1, 2),
(12, 'project name', 'location', 'institute', 'area', 'project', 'Adaptive Reuse', 'imgi.jpg', 'site images', 'imgvii.jpg', 'fllor images', 'imgxii.jpg', 'elevation i9mages', 'imgxi.jpg', 'section images ', 'imgxi.jpg', 'projct descritpion', '2018-05-29', '2018-05-29 12:51:47', 1, 2),
(13, 'proe', 'loc', 'inst', 'are', 'project ye', 'Adaptive Reuse', 'imgi.jpg', 'site image`', 'imgii.jpg', 'floor image', 'imgvi.jpg', 'elevation imahe', 'imgviii.jpg', 'setion imasge', 'imgviii.jpg', 'project desc', '2018-05-29', '2018-05-29 13:02:09', 1, 2),
(14, 'new projectq', 'new location', 'institute', 'area', 'project year', 'Adaptive Reuse', 'abc.jpg', 'site images', 'bg-img.jpg', 'floor images', 'sofa8.jpg', 'elevation images', 'imgiv.jpg', 'secction images ', 'imgiv.jpg', 'project descritption', '2018-06-30', '2018-06-30 12:40:57', 1, 1),
(15, 'project name', 'location', 'institute', 'area', 'projct year', 'Adaptive Reuse', 'din4.jpg', 'site plane', 'imgxi.jpg', 'floor inmages q', 'bannerhelp.jpg', 'elevation images q', 'slide1.jpg', 'section images ', 'slide1.jpg', 'project descritption', '2018-07-01', '2018-07-01 15:00:11', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_upload_feedback`
--

CREATE TABLE `project_upload_feedback` (
  `pro_feed_id` int(100) NOT NULL,
  `stars` int(50) NOT NULL,
  `feedback` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_upload_feedback`
--

INSERT INTO `project_upload_feedback` (`pro_feed_id`, `stars`, `feedback`, `user_id`) VALUES
(1, 3, 'this is feedback', 2),
(2, 3, 'feedback', 2),
(3, 3, 'feedback', 2),
(4, 4, 'wwr', 2),
(5, 4, 'feedback', 2),
(6, 3, 'good', 2),
(7, 3, 'googd feedback', 1),
(8, 5, 'feedback', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `thesis_id` int(100) NOT NULL,
  `thesis_name` varchar(100) NOT NULL,
  `thesis_title` varchar(100) NOT NULL,
  `thesis_location` varchar(100) NOT NULL,
  `thesis_area` varchar(100) NOT NULL,
  `thesis_year` varchar(100) NOT NULL,
  `thesis_ins` varchar(100) NOT NULL,
  `thesis_guide` varchar(100) NOT NULL,
  `thesis_proj_type` varchar(100) NOT NULL,
  `thesis_date` datetime NOT NULL,
  `thesis_approve` int(11) NOT NULL DEFAULT '0',
  `casestudy` varchar(100) NOT NULL,
  `conceptsheet` varchar(100) NOT NULL,
  `siteplan` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `elevation` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`thesis_id`, `thesis_name`, `thesis_title`, `thesis_location`, `thesis_area`, `thesis_year`, `thesis_ins`, `thesis_guide`, `thesis_proj_type`, `thesis_date`, `thesis_approve`, `casestudy`, `conceptsheet`, `siteplan`, `plan`, `elevation`, `user_id`) VALUES
(2, 'asfs', 'fsf', 'fs', 'fasfs', 'fsf', 'asfasf', 'saf', 'Residential', '2018-06-13 15:30:54', 0, 'banner_1_2.jpg,banner2.jpg', 'banner2.jpg', 'banner3.jpg,banner2.jpg', 'banner3.jpg', 'banner2.jpg', 1),
(3, 'namnne', 'title', 'location', 'area', 'thesis report', 'institute', 'thesis repoirt', 'Commercial', '2018-06-13 15:31:56', 0, 'banner2.jpg', 'banner3.jpg,banner_1_2.jpg', 'banner3.jpg', 'banner_1_2.jpg', 'banner2.jpg,banner_1_2.jpg', 1),
(4, 'namnne', 'title', 'location', 'area', 'thesis report', 'institute', 'thesis repoirt', 'Commercial', '2018-06-13 15:32:26', 1, 'banner2.jpg', 'banner3.jpg,banner_1_2.jpg', 'banner3.jpg', 'banner_1_2.jpg', 'banner2.jpg,banner_1_2.jpg', 1),
(6, 'name', 'title', 'location', 'area', 'thesis', 'institute', 'theis s', 'Adaptive Reuse', '2018-06-19 10:31:46', 1, 'comcast.jpg', 'outlook.jpg', 'conback.jpg', 'profile.jpg', 'aol3.jpg', 1),
(7, 'nhame', 'title', 'location', 'title', 'thesis', 'insititteoo', 'thesis', 'Adaptive Reuse', '2018-06-19 10:33:20', 1, 'aol5.jpg', 'aol3.jpg', 'aol2.jpg', 'profile.jpg', 'profile3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thesis_report`
--

CREATE TABLE `thesis_report` (
  `thesis_report_id` int(100) NOT NULL,
  `thesis_report_name` varchar(100) NOT NULL,
  `thesis_report_place` varchar(100) NOT NULL,
  `thesis_report_college` varchar(100) NOT NULL,
  `thesis_report_year` varchar(100) NOT NULL,
  `thesis_report_file` varchar(100) NOT NULL,
  `thesis_report_date` date NOT NULL,
  `thesis_report_time` time NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thesis_report`
--

INSERT INTO `thesis_report` (`thesis_report_id`, `thesis_report_name`, `thesis_report_place`, `thesis_report_college`, `thesis_report_year`, `thesis_report_file`, `thesis_report_date`, `thesis_report_time`, `user_id`) VALUES
(2, 'safsf', 'safs', 'asf', 'undefined', 'file.pdf', '2018-06-01', '11:49:37', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileno` varchar(50) DEFAULT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'India',
  `city` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_interest` varchar(50) NOT NULL DEFAULT 'false',
  `email_me` varchar(50) NOT NULL DEFAULT 'false',
  `company_name` varchar(100) DEFAULT 'No Available',
  `website` varchar(100) DEFAULT NULL,
  `profile` varchar(50) NOT NULL DEFAULT 'default-user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `mobileno`, `country`, `city`, `profession`, `password`, `is_interest`, `email_me`, `company_name`, `website`, `profile`) VALUES
(1, 'Mohd', 'ab@gmail.com', '9643027184', 'India', 'new delhi', 'student', '1234567', 'false', 'true', 'not  available', '', '3.png'),
(2, 'Mr. james', 'abc@gmail.com', '5487963214', 'delhi', 'delhi', 'Architect', '1234567', 'false', 'true', 'not available', '', 'default-user.png'),
(3, 'afdf', 'ab@gmail.com', '', '', '', 'wrwqr', '123', '', '', 'dfd', 'fd', 'default-user.png'),
(4, 'afdf', 'ab@gmail.com', '', '', '', 'wrwqr', '123', '', '', 'dfd', 'fd', 'default-user.png'),
(5, 'fasdf', 'ab@gmail.com', '', '', '', 'adsfa', 'qwe', '', '', 'adfdaf', 'afsf', 'default-user.png'),
(6, 'sdgdsg', 'ab@gmail.com', '', '', '', 'wrwqr', '123', '', '', 'dgsd', 'sgsdg', 'default-user.png'),
(7, 'sdgdsg', 'ab@gmail.com', '', '', '', 'wrwqr', '123', '', '', 'dgsd', 'sgsdg', 'default-user.png'),
(8, 'sdgdsg', 'ab@gmail.com', '', '', '', 'wrwqr', '123', '', '', 'dgsd', 'sgsdg', 'default-user.png'),
(9, 'etgfd', 'ab@gmail.com', '', '', '', 'wrwqr', '123', '', '', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(10, 'name', 'ab@gmail.com', NULL, 'India', '', 'type', '1234', 'false', 'false', 'name of organization', 'webaite', 'default-user.png'),
(11, 'jammy', 'ab@gmail.com', NULL, 'India', '', 'type', '1234', 'false', 'false', 'orgainzation', 'website', 'default-user.png'),
(12, 'jammy', 'ab@gmail.com', NULL, 'India', '', 'TYPE', '1234', 'false', 'false', 'name', 'webiste', 'default-user.png'),
(13, 'jam', 'ab@gmail.com', NULL, 'India', '', 'type', '1234', 'false', 'false', 'organzation', 'website', 'default-user.png'),
(14, 'testing', 'ab@gmail.com', NULL, 'India', '', 'wrwqr', '1234567', 'false', 'false', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(15, 'testing', 'ab@gmail.com', NULL, 'India', '', 'testing', '1234', 'false', 'false', 'testing organization', 'testing', 'default-user.png'),
(16, 'testing', 'ab@gmail.com', NULL, 'India', '', 'jsfdj', '9456123', 'false', 'false', 'j', 'hjshfj', 'default-user.png'),
(17, 'testing', 'ab@gmail.com', NULL, 'India', '', 'wrwqr', '147', 'false', 'false', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(18, 'aeer', 'ab@gmail.com', NULL, 'India', '', 'wrwqr', '1111111', 'false', 'false', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(19, 'testing', 'wampinfotech17@gmail.com', NULL, 'India', '', 'wrwqr', '741852', 'false', 'false', 'orgainzation', 'afsf', 'default-user.png'),
(20, 'testing', 'abc@gmail.com', NULL, 'India', '', 'type', '741852', 'false', 'false', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(21, 'testing', 'abc@gmail.com', NULL, 'India', '', 'wrwqr', '4561237', 'false', 'false', 'orgainzation', 'wqrwqr', 'default-user.png'),
(22, 'testing', 'abc@gmail.com', NULL, 'India', '', 'wrwqr', '4561237', 'false', 'false', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(23, 'testing', 'abc@gmail.com', NULL, 'India', '', 'wrwqr', '7456123', 'false', 'false', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(24, 'sfsf', 'ab@gmail.com', NULL, 'India', '', 'wrwqr', '7456123', 'false', 'false', 'dfasdf', 'wqrwqr', 'default-user.png'),
(25, 'testing', 'abc@gmail.com', NULL, 'India', '', 'type', '7456123', 'false', 'false', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(26, 'testing', 'abc@gmail.com', NULL, 'India', '', 'wrwqr', '7456123', 'false', 'false', 'ewqrqw', 'wqrwqr', 'default-user.png'),
(27, 'testing', 'ab@gmail.com', NULL, 'India', '', 'wrwqr', '7456123', 'false', 'false', 'ewqrqw', 'afsf', 'default-user.png'),
(28, 'faizan', 'ab@gmail.com', NULL, 'India', '', 'type', '1234567', 'false', 'false', 'ewqrqw', 'afsf', 'default-user.png'),
(29, 'testing', 'abc@gmail.com', NULL, 'India', '', 'wrwqr', '7456123', 'false', 'false', 'orgainzation', 'wqrwqr', 'default-user.png'),
(30, 'Mohd Faizan', 'ba@gmail.com', NULL, 'India', '', 'type', '123456', 'false', 'false', 'Organization', 'website', 'default-user.png'),
(31, 'Mohd Faizan', 'ab@gmail.com', NULL, 'India', '', 'wrwqr', '1234', 'false', 'false', 'orgainzation', 'testing', 'default-user.png'),
(32, 'Mohd Faizan', 'abc@gmail.com', NULL, 'India', '', 'type', '1234567', 'false', 'false', 'organization', 'website', 'default-user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `architect`
--
ALTER TABLE `architect`
  ADD PRIMARY KEY (`architect_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`competitor_id`);

--
-- Indexes for table `dessertation`
--
ALTER TABLE `dessertation`
  ADD PRIMARY KEY (`dessertation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project_upload_feedback`
--
ALTER TABLE `project_upload_feedback`
  ADD PRIMARY KEY (`pro_feed_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`thesis_id`);

--
-- Indexes for table `thesis_report`
--
ALTER TABLE `thesis_report`
  ADD PRIMARY KEY (`thesis_report_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `architect`
--
ALTER TABLE `architect`
  MODIFY `architect_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `competitor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dessertation`
--
ALTER TABLE `dessertation`
  MODIFY `dessertation_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project_upload_feedback`
--
ALTER TABLE `project_upload_feedback`
  MODIFY `pro_feed_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `thesis_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thesis_report`
--
ALTER TABLE `thesis_report`
  MODIFY `thesis_report_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `dessertation`
--
ALTER TABLE `dessertation`
  ADD CONSTRAINT `dessertation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `project_upload_feedback`
--
ALTER TABLE `project_upload_feedback`
  ADD CONSTRAINT `project_upload_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `thesis_report`
--
ALTER TABLE `thesis_report`
  ADD CONSTRAINT `thesis_report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `approvedProject` ON SCHEDULE EVERY 1 HOUR STARTS '2018-06-01 15:52:28' ENDS '2022-10-12 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE projects set project_approve = 1  WHERE floor((time_to_sec(timediff(NOW(),project_time))/3600)>72)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
