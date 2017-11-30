-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 01:55 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`country_code`, `country_name`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Ivory Coast'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DS', 'American Samoa'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('FX', 'France, Metropolitan'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GK', 'Guernsey'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard and Mc Donald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia (Hrvatska)'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran (Islamic Republic of)'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea, Democratic People\'s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People\'s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libyan Arab Jamahiriya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova, Republic of'),
('ME', 'Montenegro'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macau'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'St. Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestine'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'St. Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen Islands'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TP', 'East Timor'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan'),
('TY', 'Mayotte'),
('TZ', 'Tanzania, United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States minor outlying islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Vatican City State'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands (British)'),
('VI', 'Virgin Islands (U.S.)'),
('VN', 'Vietnam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna Islands'),
('WS', 'Samoa'),
('XK', 'Kosovo'),
('YE', 'Yemen'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZR', 'Zaire'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course`, `description`) VALUES
(1, 'BSA', 'Bachelor of Science in Accountancy'),
(2, 'BSIT', 'Bachelor of Science in Information Technology'),
(3, 'BSBA', 'Bachelor of Science in Business Administration'),
(4, 'Universal', 'Course subjects can be taken by other courses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `faculty_name`) VALUES
(2, 'Patrick Marlowe Oliva'),
(3, 'Luis Cadiz'),
(5, 'Johnbert Estroga'),
(7, 'Kurt Candillas'),
(8, 'Alexander Suan'),
(9, 'Loveth Mae Angcos'),
(11, 'Delia Pahang'),
(12, 'Rhandy Oyao'),
(13, 'Anthony Dagang'),
(14, 'Babes Reyes'),
(16, 'Rhea Ganas'),
(17, 'Noel Pit'),
(18, 'Rose Mary Cardenas'),
(19, 'Temporada'),
(20, 'Marilou Magadan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `sent_from` varchar(255) NOT NULL,
  `sent_to` varchar(255) NOT NULL,
  `type` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification`, `sent_from`, `sent_to`, `type`, `status`, `date_sent`) VALUES
(43, 'You\'re enrollment request is confirmed, you are now successfully enrolled.', 'lynleemae.herrera', 'angelmaepablico@gmail.com', 1, 0, '2017-11-21 19:59:42'),
(45, 'Subjects you requested for enrollment evaluated successfully and already submitted to registrar for confirmation.', 'loweoliva21017', 'grapesrosalem@gmail.com', 1, 0, '2017-11-21 20:03:29'),
(46, 'di ka gwapo', 'loweoliva21017', 'grapesrosalem@gmail.com', 1, 0, '2017-11-21 20:03:42'),
(47, 'di ka gwapo lagi', 'lynleemae.herrera', 'grapesrosalem@gmail.com', 1, 0, '2017-11-21 20:05:12'),
(49, 'Subjects you requested for enrollment evaluated successfully and already submitted to registrar for confirmation.', 'loweoliva21017', 'qlouelven@gmail.com', 1, 0, '2017-11-21 21:25:44'),
(51, 'Subjects you requested for enrollment evaluated successfully and already submitted to registrar for confirmation.', 'loweoliva21017', 'grapesrosalem@gmail.com', 1, 0, '2017-11-23 05:24:13'),
(53, 'Subjects you requested for enrollment evaluated successfully and already submitted to registrar for confirmation.', 'loweoliva21017', 'angelmaepablico@gmail.com', 1, 0, '2017-11-23 05:31:06'),
(54, 'You\'re enrollment request is confirmed, you are now successfully enrolled.', 'lynleemae.herrera', 'angelmaepablico@gmail.com', 1, 0, '2017-11-23 05:33:23'),
(56, 'Subjects you requested for enrollment evaluated successfully and already submitted to registrar for confirmation.', 'loweoliva21017', 'angelmaepablico@gmail.com', 1, 0, '2017-11-25 12:50:24'),
(57, 'You\'re enrollment request is confirmed, you are now successfully enrolled.', 'lynleemae.herrera', 'angelmaepablico@gmail.com', 1, 0, '2017-11-25 12:52:15'),
(58, 'Angel Pablico submitted 1 subjects for evaluation', 'angelmaepablico@gmail.com', 'loweoliva21017', 2, 0, '2017-11-25 12:55:25'),
(59, 'Angel Pablico submitted 1 subjects for evaluation', 'angelmaepablico@gmail.com', 'loweoliva21017', 2, 0, '2017-11-25 16:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_day` varchar(50) NOT NULL,
  `semester` int(1) NOT NULL,
  `school_year` varchar(9) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject_id` int(11) NOT NULL,
  `room` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `slots` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `schedule_day`, `semester`, `school_year`, `start_time`, `end_time`, `subject_id`, `room`, `faculty_id`, `slots`, `status`) VALUES
(1, 'MTH', 1, '2017-2018', '07:30:00', '09:00:00', 14, '201', 8, 43, 1),
(3, 'MTH', 2, '2017-2018', '09:00:00', '10:30:00', 12, 'Complab 1', 3, 44, 1),
(4, 'WED', 2, '2017-2018', '08:00:00', '10:00:00', 15, 'PE ROOM', 2, 43, 1),
(5, 'TF', 2, '2017-2018', '09:00:00', '10:30:00', 8, '206', 2, 39, 1),
(6, 'TF', 2, '2017-2018', '10:30:00', '12:00:00', 10, '204', 18, 44, 1),
(7, 'TF', 2, '2017-2018', '13:00:00', '14:30:00', 9, '201', 17, 45, 1),
(9, 'SAT', 2, '2017-2018', '08:00:00', '11:00:00', 16, '305', 2, 45, 1),
(10, 'MTH', 2, '2017-2018', '09:00:00', '10:30:00', 42, 'Complab', 2, 45, 1),
(11, 'MTH', 2, '2017-2018', '13:00:00', '14:30:00', 57, 'Complab', 14, 44, 1),
(12, 'MTH', 2, '2017-2018', '17:30:00', '20:30:00', 118, 'Complab', 5, 44, 1),
(13, 'TF', 2, '2017-2018', '09:00:00', '10:30:00', 119, 'Complab', 2, 44, 1),
(14, 'MTH', 2, '2017-2018', '13:01:00', '15:00:00', 45, 'PE ROOM', 2, 45, 1),
(15, 'TF', 2, '2017-2018', '13:00:00', '14:30:00', 117, '308', 7, 45, 1),
(16, 'TF', 2, '2017-2018', '14:30:00', '16:00:00', 38, '306', 2, 45, 1),
(17, 'TF', 2, '2017-2018', '17:30:00', '19:00:00', 41, 'Complab', 5, 44, 1),
(18, 'MTH', 2, '2017-2018', '10:30:00', '12:00:00', 43, 'Physics Lab', 11, 44, 1),
(19, 'MTH', 2, '2017-2018', '16:00:00', '17:30:00', 137, 'Complab', 2, 45, 1),
(20, 'WED', 2, '2017-2018', '17:00:00', '20:00:00', 138, 'Complab', 5, 45, 1),
(21, 'TF', 2, '2017-2018', '09:00:00', '10:30:00', 116, 'Complab 1', 14, 41, 1),
(22, 'TF', 2, '2017-2018', '10:30:00', '12:00:00', 139, 'Complab 2', 2, 45, 1),
(23, 'TF', 2, '2017-2018', '13:00:00', '15:30:00', 121, 'Complab', 5, 45, 1),
(24, 'SAT', 2, '2017-2018', '08:00:00', '17:00:00', 136, 'Colab 1', 3, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `semester` int(1) NOT NULL,
  `description` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`semester`, `description`, `status`) VALUES
(1, 'First semester', 0),
(2, 'Second semester', 1),
(3, 'Summer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_level` int(1) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `guardian` varchar(255) NOT NULL,
  `guardian_relationship` varchar(255) NOT NULL,
  `basic_education` varchar(255) NOT NULL,
  `secondary_education` varchar(255) NOT NULL,
  `college_education` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `enrolled` tinyint(1) NOT NULL,
  `date_enrolled` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`email`, `password`, `img`, `lastname`, `firstname`, `middlename`, `course_id`, `year_level`, `gender`, `religion`, `nationality`, `date_of_birth`, `place_of_birth`, `civil_status`, `home_address`, `city`, `province`, `country_code`, `zipcode`, `phone`, `guardian`, `guardian_relationship`, `basic_education`, `secondary_education`, `college_education`, `confirmed`, `enrolled`, `date_enrolled`) VALUES
('angelmaepablico@gmail.com', 'AngelPablicoBkcqDlaCR82017', 'noimage.jpg', 'Pablico', 'Angel', 'Mae', 2, 1, 'Female', 'Roman Catholic', 'Filipino', '2017-11-22', 'Cagayan de Oro City', 'Single', 'Cagayan de Oro City', 'Cagayan de Oro City', 'Misamis Oriental', 'PH', 9000, NULL, 'christy', 'tes', 'test', 'test', 'set', 1, 1, '2017-11-01'),
('grapesrosalem@gmail.com', 'GrapesRosalemvEdzi2017', 'noimage.jpg', 'Rosalem', 'Grapes', 'Nantes', 2, 1, 'Male', 'Roman Catholic', 'Filipino', '2017-11-09', 'CDO', 'Single', 'Patag', 'Cagayan De Oro City', 'Misamis Oriental', 'PH', 9000, '09121212132', 'Lyn Herrera', 'Slave', 'Gusa High School', 'Lourdes Basic Ed', 'Lourdes College', 1, 0, '2017-11-21'),
('lynleemaeherrera5@gmail.com', 'Lyn LeeHerrerak3t6U2017', 'noimage.jpg', 'Herrera', 'Lyn Lee', 'Herrera', 3, 1, 'Female', 'Catholic', 'Philippines', '2017-11-03', 'cagayan de oro city', 'Single', 'Purok 4B gusa', 'cagayan de oro city', 'Gusa', 'AR', 9000, '09058461780', 'Jocelyn Y. Herrera', 'Mother', 'Gusa', 'Cugman', 'Lourd', 1, 0, '2017-11-21'),
('qlouelven@gmail.com', 'LouelvenQuerolVSsHwuTTsl2017', 'noimage.jpg', 'Querol', 'Louelven', 'Querol', 2, 1, 'Male', 'Roman Catholic', 'Filipino', '2017-11-22', 'Cagayan de Oro City', 'Single', 'Cagayan de Oro City', 'Cagayan de Oro City', 'Misamis Oriental', 'PH', 9000, NULL, 'test', 'set', 'set', 'set', 'set', 1, 0, '2017-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studsubjects`
--

CREATE TABLE `tbl_studsubjects` (
  `studsubject_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studsubjects`
--

INSERT INTO `tbl_studsubjects` (`studsubject_id`, `schedule_id`, `student_email`, `date_added`) VALUES
(1, 5, 'angelmaepablico@gmail.com', '2017-11-25 12:52:14'),
(2, 13, 'angelmaepablico@gmail.com', '2017-11-25 12:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `descriptive` varchar(255) NOT NULL,
  `lec` varchar(20) NOT NULL,
  `lab` varchar(20) NOT NULL,
  `credit_units` varchar(20) NOT NULL,
  `total_hours` double NOT NULL,
  `pre_req` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` int(1) NOT NULL,
  `year_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subject_id`, `subject`, `descriptive`, `lec`, `lab`, `credit_units`, `total_hours`, `pre_req`, `course_id`, `semester`, `year_level`) VALUES
(1, 'RS 1', 'Scrip. & Old Test. Salvation History', '3', '0', '3', 3, 'None', 4, 1, 1),
(4, 'Hist 1', 'Phil History w/Politics & Government', '3', '0', '3', 3, 'None', 4, 1, 1),
(5, 'IT101', 'IT Fundamentals', '2', '1', '3', 5, 'None', 2, 1, 1),
(7, 'NSTP 1', 'Natl Service Training Program', '3', '0', '3', 3, 'None', 4, 1, 1),
(8, 'RS 2', 'Christology', '3', '0', '3', 3, 'RS 1', 4, 2, 1),
(9, 'Engl 2', 'Writing in the Discipline', '3', '0', '3', 3, 'Engl 1', 4, 2, 1),
(10, 'Fil 2', 'Pagbasa at Pagsulat tungo sa Pananaliksik', '3', '0', '3', 3, 'Fil 1', 4, 2, 1),
(11, 'Math 1', 'College Algebra', '3', '0', '3', 3, '', 4, 2, 1),
(12, 'IT103', 'Programming 2', '2', '1', '3', 5, 'IT102', 2, 2, 1),
(14, 'Philo 1', 'Logic', '3', '0', '3', 3, 'None', 4, 1, 1),
(15, 'PE 2', 'Rhythmic Activities', '2', '0', '2', 2, 'PE 1', 4, 2, 1),
(16, 'NSTP 2', 'Natl Service Training Program', '3', '0', '3', 3, 'NSTP 1', 4, 1, 1),
(23, 'RS 3', 'Church and Sacraments', '3', '0', '3', 3, 'RS 2', 4, 1, 2),
(24, 'Engl 3', 'Speech and Oral Communications', '3', '0', '3', 3, 'Engl 2', 4, 1, 2),
(25, 'Acctg 1', 'Accounting Principles', '3', '0', '3', 3, 'Math 2', 4, 1, 4),
(30, 'PE 3', 'Individual/Dual Sports', '2', '0', '2', 2, 'PE 2', 4, 1, 2),
(38, 'RS 4', 'Christian Morality', '3', '0', '3', 3, 'RS 3', 4, 2, 2),
(39, 'IT204', 'Fund. of Information Management', '2', '1', '3', 5, '2nd yr Standing', 2, 1, 2),
(40, 'IT205', 'Introduction to Computing', '2', '1', '3', 5, '2nd yr Standing', 2, 1, 2),
(41, 'IT206', 'Fundamentals of Networking', '2', '1', '3', 5, '2nd yr Standing', 2, 2, 2),
(42, 'IT207', 'Fundamentals of Database Systems', '2', '1', '3', 5, 'IT204', 2, 2, 2),
(43, 'Physics 2', 'College Physics 2', '2', '3', '5', 5, 'Physics 1', 2, 2, 2),
(44, 'Math 2', 'College Algebra', '3', '0', '3', 3, 'None', 4, 2, 2),
(45, 'PE 4', 'Team Sports', '2', '0', '2', 2, 'PE 3', 4, 2, 2),
(53, 'Human 1', 'Art, Man and Society', '3', '0', '3', 3, 'None', 4, 3, 1),
(54, 'Econ 1', 'Principles of Economics  w/LR Tax', '3', '0', '3', 3, 'None', 4, 3, 2),
(55, 'Socio 1', 'Society and Culture w/ Family Planning', '3', '0', '3', 3, 'None', 4, 3, 2),
(56, 'Soc Sci 7', 'Life and Works of Rizal', '3', '0', '3', 3, 'None', 4, 2, 2),
(57, 'IT208', 'Intangible Technologies', '3', '0', '3', 3, 'IT202', 2, 2, 2),
(59, 'IT301', 'Web Development', '2', '1', '3', 5, 'IT208 & IT209', 2, 1, 3),
(60, 'IT302', 'Fund. of System Integration & Arch.', '3', '0', '3', 3, '3rd yr Standing', 2, 1, 3),
(61, 'IT303', 'Advanced Database Systems', '2', '1', '3', 5, 'IT207', 2, 1, 3),
(62, 'Math 6', 'Probability and Statistics', '3', '0', '3', 3, 'Math 2', 4, 2, 3),
(63, 'Math 4', 'Analytic Geometry', '3', '0', '3', 3, 'Math 1-2', 4, 3, 1),
(64, 'Natsci 1', 'Biological Siences', '3', '0', '3', 3, 'None', 4, 3, 1),
(65, 'Mgnt 1', 'Business Organization and Management', '3', '0', '3', 3, 'None', 4, 3, 1),
(66, 'Edited 2', 'asdsa', '3', '1', '3', 5, 'Comp 1', 1, 1, 1),
(68, 'Acctg 3&4', 'Fund. Of Acctg - Part 2', '6', '0', '6', 6, 'Acctg1&2', 1, 2, 1),
(69, 'Comp 1', 'Fundamentals of Software & Application', '0', '3', '3', 3, '', 1, 3, 1),
(70, 'Acctg 5A', 'Financial Acctg & Reporting 1', '6', '0', '6', 6, 'Acctg1-4', 1, 1, 2),
(71, 'Acctg 5B', 'Financial Acctg & Reporting 2', '6', '0', '6', 6, 'Acctg1-5A', 1, 2, 2),
(72, 'Comp 2', 'Fundamentals of Prog. & Database Theory and Apps', '0', '3', '3', 3, 'Comp 1', 1, 3, 2),
(73, 'Acctg 5C', 'Financial Acctg & Reporting 3', '3', '0', '3', 3, '', 1, 1, 3),
(74, 'Acctg 6', 'Cost Acctg & Mgnt', '6', '0', '6', 6, '', 1, 1, 3),
(75, 'Mgnt 6', 'Social Resp. & Good Gov.', '3', '0', '3', 3, 'Mgnt 1', 1, 1, 3),
(76, 'Bus4', 'Production Operation Mgnt', '3', '0', '3', 3, 'Mgnt 1', 1, 1, 3),
(77, 'FM 1', 'Financial Manamgent I', '3', '0', '3', 3, '', 1, 1, 3),
(78, 'Comp 3', 'IT Concepts & Systems Analysis Design & Devt.', '0', '3', '3', 3, 'Comp 2', 1, 1, 3),
(79, 'Tax 2', 'Transfer & Business Tax', '3', '0', '3', 3, 'Tax 1', 1, 2, 3),
(80, 'Law 2', 'Law on Business Organization', '3', '0', '3', 3, 'Law 1', 1, 2, 3),
(81, 'Math 20', 'Math of Investment', '3', '0', '3', 3, 'Math 1-2', 1, 2, 3),
(82, 'Acctg 7A', 'Advance Fin Acctg/Fin Reptg. 1', '6', '0', '6', 6, 'Acctg 1-6', 1, 2, 3),
(83, 'Acctg 8A', 'Assurance Principles, Prof Ethics & Good Govt', '6', '0', '6', 6, 'Acctg 1-6', 1, 2, 3),
(84, 'Acctg 9A', 'Management Acctg Part 1', '3', '0', '3', 3, 'Acctg 1-6', 1, 2, 3),
(85, 'Econ 3', 'Macroeconomics Theory & Practice', '3', '0', '3', 3, 'Econ1-2', 1, 2, 3),
(86, 'Engl 5', 'Business Communication', '3', '0', '3', 3, 'Engl 4', 4, 1, 3),
(87, 'Law 3', 'Negotiable Instruments', '3', '0', '3', 3, 'Law 1-2', 1, 1, 4),
(88, 'Acctg 7B', 'Advance Fin Acctng/Fin Reptg 2', '6', '0', '6', 6, 'Acctg1-7A', 1, 1, 4),
(89, 'Acctg 8B', 'Applied Auditing', '6', '0', '6', 6, 'Acctg1-8A', 1, 1, 4),
(90, 'Acctg 9B', 'Management Acctg Part 2', '3', '0', '3', 3, 'Acctg1-9A', 1, 1, 4),
(91, 'Acctg 10', 'Acctg Information Systems', '3', '0', '3', 3, 'Acctg1-9A', 1, 1, 4),
(92, 'Acctg 11A', 'Accounting Review Part 1', '3', '0', '3', 3, 'Acctg1-9A', 1, 1, 4),
(93, 'FM 2', 'Financial Management II', '3', '0', '3', 3, 'FM 1', 1, 1, 4),
(94, 'Bus 7', 'Business Policy & Strategy', '3', '0', '3', 3, '', 1, 1, 4),
(95, 'Acctg 9C', 'Management Consultancy', '3', '0', '3', 3, 'Acctg1-9B', 1, 2, 4),
(96, 'Acctg 11B', 'Accounting Review Part 2', '3', '0', '3', 3, 'Acctg 11A', 1, 2, 4),
(97, 'Acctg 12', 'Accounting Research', '3', '0', '3', 3, 'Acctg 11A', 1, 2, 4),
(98, 'Acctg 13', 'Auditing in CIS Environment', '0', '3', '3', 3, 'A1-10,C1-2', 1, 2, 4),
(99, 'Acctg 14', 'Acctg - Govt. Non-Profit Ent., Special Ind.', '3', '0', '3', 3, 'Acctg1-9B', 1, 2, 4),
(100, 'Acctg 15', 'Accounting Synthesis', '3', '0', '3', 3, 'Acctg1-9B', 1, 2, 4),
(101, 'Acctg 16', 'Accounting Thesis', '1', '0', '1', 1, 'Acctg1-9B', 1, 2, 4),
(102, 'Law 4', 'Sales, Agency, Labor & Other Commercial Laws', '3', '0', '3', 3, 'Law1-3', 1, 2, 4),
(103, 'Math 23', 'Quantitative Tech. in Business', '3', '0', '3', 3, 'Math1-2', 1, 2, 4),
(107, 'Engl 1', 'Study & Thinking Skills', '3', '0', '3', 3, 'None', 4, 1, 1),
(109, 'Fil 1', 'Komuniskayon sa Akademikong Filipino', '3', '0', '3', 3, 'None', 4, 1, 1),
(111, 'IT102', 'Programming 1', '2', '1', '3', 5, 'None', 2, 1, 1),
(112, 'IT201', 'Data Structures & Algorithm', '3', '0', '3', 3, 'IT103', 2, 1, 2),
(113, 'IT202', 'Tangible Technologies', '2', '1', '3', 5, '2nd yr Standing', 2, 1, 2),
(114, 'IT203', 'Object-Oriented Programming', '2', '1', '3', 5, 'IT103', 2, 1, 2),
(116, 'IT306', 'Capstone Project 1', '3', '0', '3', 3, 'IT 301, IT 303, & IT 304', 2, 2, 3),
(117, 'Engl 4', 'Literature of the Philippines', '3', '0', '3', 3, 'Engl 3', 4, 2, 2),
(118, 'IT209', 'Human Computer Interaction', '2', '1', '3', 5, '2nd yr Standing', 2, 2, 2),
(119, 'IT210', 'Event Driven Programming', '2', '1', '3', 5, 'IT203', 2, 2, 2),
(120, 'IT304', 'Advanced Networking', '2', '1', '3', 5, 'IIT206', 2, 1, 3),
(121, 'IT305', 'Multimedia System', '2', '1', '3', 5, '3rd yr Standing', 2, 1, 3),
(122, 'Psych 1', 'General Psychology', '3', '0', '3', 3, 'None', 4, 2, 3),
(123, 'IT307', 'Fund. Info. Assurance & Security', '3', '0', '3', 3, '3rd yr Standing', 2, 2, 3),
(124, 'IT308', 'Web Systems and Technologies', '2', '1', '3', 5, 'IT301', 2, 2, 3),
(125, 'IT309', 'Application Dev\'t & Emerging Technology', '2', '1', '3', 5, '3rd yr Standing', 2, 2, 3),
(126, 'IT310', 'Mobile Application Development', '2', '1', '3', 5, '3rd yr Standing', 2, 2, 3),
(127, 'Physics 1', 'College Physics 1', '2', '1', '3', 5, 'Math 6', 2, 2, 3),
(128, 'IT311', 'Social and Professional Issues', '3', '0', '3', 3, '3rd yr Standing', 2, 3, 3),
(129, 'IT312', 'Adv. Info. Assurance & Security', '2', '1', '3', 5, 'IT307', 2, 3, 3),
(130, 'IT313', 'Integrative Prog. & Technologies', '2', '1', '3', 5, '3rd yr Standing', 2, 3, 3),
(131, 'IT401', 'Capstone Project 2', '2', '1', '3', 5, 'IT306', 2, 1, 4),
(132, 'IT402', 'System Admin & Maintainance', '2', '1', '3', 5, '4th yr Standing', 2, 1, 4),
(133, 'IT403', 'Adv. System Integration & Arch.', '2', '1', '3', 5, 'IT302', 2, 1, 4),
(134, 'Math 7', 'Trigonometry', '3', '0', '3', 3, 'Math 6', 2, 1, 4),
(135, 'Bio 1', 'Biology 1', '3', '0', '3', 3, 'None', 4, 1, 4),
(136, 'IT404', 'Practicum (486 hrs.)', '9', '0', '9', 9, '4th yr Standing', 2, 2, 4),
(137, 'IT Elect 3', 'Game Development', '2', '1', '3', 5, 'IT Elect 2', 2, 2, 3),
(138, 'IT Free Elect 1', 'Ethical Hacking', '2', '1', '3', 5, 'None', 2, 2, 3),
(139, 'Fieldtrip', 'Fieldtrip', '3', '0', '3', 3, 'None', 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subreq`
--

CREATE TABLE `tbl_subreq` (
  `request_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `evaluated` int(1) NOT NULL,
  `standing` int(1) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subreq`
--

INSERT INTO `tbl_subreq` (`request_id`, `schedule_id`, `student_email`, `evaluated`, `standing`, `request_date`) VALUES
(9, 3, 'qlouelven@gmail.com', 1, 1, '2017-11-22 05:25:44'),
(10, 18, 'qlouelven@gmail.com', 1, 1, '2017-11-22 05:25:44'),
(11, 6, 'qlouelven@gmail.com', 1, 1, '2017-11-22 05:25:44'),
(12, 24, 'grapesrosalem@gmail.com', 1, 1, '2017-11-23 13:24:13'),
(18, 11, 'angelmaepablico@gmail.com', 0, 0, '2017-11-25 16:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `name`, `user_type`, `course_id`) VALUES
('hghg', 'ghg', 'hghg', 2, 3),
('loweoliva21017', 'loweoliva21017', 'Patrick Marlowe Oliva', 2, 2),
('lynleemae.herrera', 'lynleemae.herrera', 'lyn lee', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`country_code`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`semester`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_studsubjects`
--
ALTER TABLE `tbl_studsubjects`
  ADD PRIMARY KEY (`studsubject_id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_subreq`
--
ALTER TABLE `tbl_subreq`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `semester` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_studsubjects`
--
ALTER TABLE `tbl_studsubjects`
  MODIFY `studsubject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `tbl_subreq`
--
ALTER TABLE `tbl_subreq`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
