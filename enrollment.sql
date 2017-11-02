-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 10:36 PM
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
(2, 'Patrick Marlowee Oliva'),
(3, 'Luis Cadiz'),
(4, 'Sheil Hidalgo'),
(5, 'Johnbert Estroga'),
(6, 'Therese Ybanez'),
(7, 'Kurt Candillas'),
(8, 'Alexander Suan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

CREATE TABLE `tbl_grade` (
  `grade_id` int(11) NOT NULL,
  `grade` double NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification`, `student_email`, `date_sent`) VALUES
(1, 'Jantinn Erezo submitted 2 subjects for evaluation', 'erezojantinn@gmail.com', '2017-11-02 20:05:32');

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
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `schedule_day`, `semester`, `school_year`, `start_time`, `end_time`, `subject_id`, `room`, `faculty_id`) VALUES
(3, 'MTH', 1, '2017-2018', '13:00:00', '15:00:00', 6, 'Complab', 3),
(4, 'TF', 1, '2017-2018', '13:00:00', '14:30:00', 5, 'Complab', 2),
(5, 'MTH', 1, '2017-2018', '09:00:00', '10:30:00', 1, 'Room 307', 8);

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
('angelmaepablico@gmail.com', 'AngelPablicoBkcqDlaCR82017', 'noimage.jpg', 'Pablico', 'Angel', 'Mae', 2, 1, 'Female', 'Roman Catholic', 'Filipino', '2017-11-22', 'Cagayan de Oro City', 'Single', 'Cagayan de Oro City', 'Cagayan de Oro City', 'Misamis Oriental', 'PH', 9000, NULL, 'christy', 'tes', 'test', 'test', 'set', 1, 0, '2017-11-01'),
('erezojantinn@gmail.com', 'JantinnErezounPBAl02RK2017', 'noimage.jpg', 'Erezo', 'Jantinn', 'Cuanag', 2, 1, 'Male', 'Roman Catholic', 'Filipino', '2017-11-13', 'Cagayan de Oro City', 'Single', 'Cagayan de Oro City', 'Cagayan de Oro City', 'Misamis Oriental', 'PH', 9000, NULL, 'Gray-em Erezo', 'Brother', 'Balulang Elementary School', 'Hinawanan National High School', 'Lourdes College', 1, 0, '2017-10-31'),
('lynleemaeherrera5@gmail.com', 'Lyn Lee MaeHerreraFPtL1vakF02017', 'noimage.jpg', 'Herrera', 'Lyn Lee Mae', 'Herrera', 2, 1, 'Female', 'Roman Catholic', 'Filipino', '2017-11-21', 'Cagayan de Oro City', 'Single', 'Cagayan de Oro City', 'Cagayan de Oro City', 'Misamis Oriental', 'PH', 9000, NULL, 'Christy Joy', 'Mother', 'Balulang Elementary School', 'Hinawanan National High School', 'Lourdes College', 1, 0, '2017-11-01'),
('nfoxtails@gmail.com', 'JamesBelisariodcpGJCBzuu2017', 'noimage.jpg', 'Belisario', 'James', 'Herrera', 2, 1, 'Male', 'Roman Catholic', 'Filipino', '2017-11-01', 'Cagayan de Oro City', 'Single', 'Cagayan de Oro City', 'Cagayan de Oro City', 'Misamis Oriental', 'PH', 9000, NULL, 'Cecilia Erezo', 'test', 'test', 'test', 'set', 1, 0, '2017-11-01'),
('qlouelven@gmail.com', 'LouelvenQuerolVSsHwuTTsl2017', 'noimage.jpg', 'Querol', 'Louelven', 'Querol', 2, 1, 'Male', 'Roman Catholic', 'Filipino', '2017-11-22', 'Cagayan de Oro City', 'Single', 'Cagayan de Oro City', 'Cagayan de Oro City', 'Misamis Oriental', 'PH', 9000, NULL, 'test', 'set', 'set', 'set', 'set', 1, 0, '2017-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studsubjects`
--

CREATE TABLE `tbl_studsubjects` (
  `studsubject_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `passed` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `pre_req` varchar(20) NOT NULL,
  `availability` int(2) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` int(1) NOT NULL,
  `year_level` int(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`subject_id`, `subject`, `descriptive`, `lec`, `lab`, `credit_units`, `total_hours`, `pre_req`, `availability`, `course_id`, `semester`, `year_level`, `status`) VALUES
(1, 'RS 1', 'Scrip. & Old Test. Salvation History', '3', '0', '3', 3, 'None', 45, 4, 1, 1, 1),
(2, 'Engl 1', 'Study and Thinking Skills', '3', '0', '3', 3, 'None', 45, 4, 1, 1, 1),
(3, 'Fil 1', 'Kuminakasyon sa Akademikong Filipino', '3', '0', '3', 3, 'None', 45, 4, 1, 1, 1),
(4, 'Hist 1', 'Phil History w/Politics & Government', '3', '0', '3', 3, 'None', 45, 4, 1, 1, 1),
(5, 'IT101', 'IT Fundamentals', '3', '0', '3', 3, 'None', 45, 2, 1, 1, 1),
(6, 'IT102', 'Programming 1', '2', '1', '3', 5, 'None', 45, 2, 1, 1, 1),
(7, 'NSTP', 'Natl Service Training Program', '3', '0', '3', 3, 'None', 45, 4, 1, 1, 1),
(8, 'RS 2', 'Christology', '3', '0', '3', 3, '', 45, 4, 2, 1, 1),
(9, 'English 2', 'Communications for IT', '3', '0', '3', 3, '', 45, 4, 2, 1, 1),
(10, 'Filipino 2', 'Pagbasa at Pagsulat tungo sa Pananaliksik', '3', '0', '3', 3, '', 45, 4, 2, 1, 1),
(11, 'Math 1', 'College Algebra', '3', '0', '3', 3, '', 45, 4, 2, 1, 1),
(12, 'IT103', 'Programming 2', '2', '1', '3', 5, '', 45, 2, 2, 1, 1),
(13, 'IT104', 'Professional Ethics for IT', '3', '0', '3', 3, '', 45, 2, 2, 1, 1),
(14, 'Philo 1', 'Logic', '3', '0', '3', 3, '', 45, 4, 2, 1, 1),
(15, 'PE 2', 'Rhythmic Activities', '2', '0', '2', 2, '', 45, 4, 2, 1, 1),
(16, 'NSTP 2', 'National Service Training Prog', '3', '0', '3', 3, '', 45, 4, 2, 1, 1),
(23, 'RS 3', 'Church and Sacraments', '3', '0', '3', 3, 'Theo 2', 45, 4, 1, 2, 1),
(24, 'English 3', 'Speech and Oral Communications', '3', '0', '3', 3, 'Engl 2', 45, 4, 1, 2, 1),
(25, 'Acctg 1', 'Accounting Principles', '3', '0', '3', 3, 'Math 1', 45, 4, 1, 2, 1),
(26, 'IT201', 'Data Structures and Algorithms', '3', '0', '3', 3, 'IT103', 45, 2, 1, 2, 1),
(27, 'IT202', 'Computer Organization', '2', '1', '3', 5, 'IT103', 45, 2, 1, 2, 1),
(28, 'IT203', 'Object Oriented Programming', '2', '1', '3', 5, 'IT103', 45, 2, 1, 2, 1),
(29, 'Physics 1', 'College Physics 1', '2', '3', '5', 5, 'Math 1', 45, 2, 1, 2, 1),
(30, 'PE 3', 'Individual/Dual Sports', '2', '0', '2', 2, 'PE 2', 45, 4, 1, 2, 1),
(38, 'RS 4', 'Christian Morality', '3', '0', '3', 3, 'Theo 3', 45, 4, 2, 2, 1),
(39, 'IT204', 'Database Management 1', '2', '1', '3', 5, 'IT203', 45, 2, 2, 2, 1),
(40, 'IT205', 'Operating Systems Application', '3', '0', '3', 3, 'IT203', 45, 2, 2, 2, 1),
(41, 'IT206', 'Network Administration and Technology', '2', '1', '3', 5, 'IT203', 45, 2, 2, 2, 1),
(42, 'IT207', 'Discrete Math/Structures', '3', '0', '3', 3, 'IT201,IT203', 45, 2, 2, 2, 1),
(43, 'Physics 2', 'College Physics 2', '2', '3', '5', 5, 'Physics 1', 45, 2, 2, 2, 1),
(44, 'Math 2', 'Trigonometry', '3', '0', '3', 3, 'Math 1', 45, 4, 2, 2, 1),
(45, 'PE 4', 'Team Sports', '2', '0', '2', 2, 'PE 3', 45, 4, 2, 2, 1),
(53, 'Human 1', 'Art, Man and Society', '3', '0', '3', 3, 'None', 45, 4, 3, 2, 1),
(54, 'Econ 1', 'Principles of Economics  w/LR Tax', '3', '0', '3', 3, 'None', 45, 4, 3, 2, 1),
(55, 'Socio 1', 'Society and Culture w/ Family Planning', '3', '0', '3', 3, 'None', 45, 4, 3, 2, 1),
(56, 'Socsci 7', 'Life and Works of Rizal', '3', '0', '3', 3, 'None', 45, 4, 3, 2, 1),
(57, 'IT208', 'IT Elective 1', '2', '1', '5', 5, '2nd year standing', 45, 2, 3, 2, 1),
(59, 'IT301', 'Web Development', '2', '1', '3', 5, 'IT,204, IT205', 45, 2, 3, 1, 3),
(60, 'IT302', 'System Analysis and Design', '3', '0', '3', 3, 'IT204, IT205', 45, 2, 3, 1, 3),
(61, 'IT303', 'Database Management 2', '2', '1', '3', 5, 'IT204', 45, 2, 3, 1, 3),
(62, 'Math 3', 'Probability and Statistics', '3', '0', '3', 3, 'Math 1-2', 45, 4, 3, 1, 3),
(63, 'Math 4', 'Analytic Geometry', '3', '0', '3', 3, 'Math 1-2', 45, 4, 3, 1, 3),
(64, 'Natsci 1', 'Biological Siences', '3', '0', '3', 3, 'None', 45, 4, 3, 1, 3),
(65, 'Mgnt 1', 'Business Organization and Management', '3', '0', '3', 3, 'None', 45, 4, 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subreq`
--

CREATE TABLE `tbl_subreq` (
  `request_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `evaluated` int(1) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subreq`
--

INSERT INTO `tbl_subreq` (`request_id`, `schedule_id`, `student_email`, `evaluated`, `request_date`) VALUES
(3, 3, 'erezojantinn@gmail.com', 0, '2017-11-02 20:06:13'),
(4, 4, 'erezojantinn@gmail.com', 0, '2017-11-02 20:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `name`, `img`, `user_type`, `course_id`) VALUES
('loweeoliva21017', 'loweeoliva21017', 'Patrick Marlowee Oliva', 'noimage.png', 2, 2),
('registrar1', 'registrar1', 'Angel Locsin', 'default.png', 1, 4);

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
-- Indexes for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  ADD PRIMARY KEY (`grade_id`);

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
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_studsubjects`
--
ALTER TABLE `tbl_studsubjects`
  MODIFY `studsubject_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `tbl_subreq`
--
ALTER TABLE `tbl_subreq`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
