-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3309:3309
-- Generation Time: Mar 28, 2025 at 02:58 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2025-03-09 05:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transaction`
--



-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

DROP TABLE IF EXISTS `tblbooking`;
CREATE TABLE IF NOT EXISTS `tblbooking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `BookingNumber` bigint DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `PaymentStatus` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`, `PaymentStatus`) VALUES
(25, 292853566, 'nimesh@gmail.com', 30, '2025-03-22', '2025-03-25', 'i want it', 1, '2025-03-22 10:15:24', '2025-03-22 12:54:17', ''),
(32, 150585297, 'danish@gmail.com', 21, '2025-03-25', '2025-03-28', 'i want for 5 days', 0, '2025-03-24 15:40:05', NULL, ''),
(33, 245473034, 'danish1@yahoo.com', 24, '2025-03-25', '2025-03-29', 'i', 0, '2025-03-25 15:14:19', NULL, ''),
(34, 390485006, 'danish1@yahoo.com', 12, '2025-03-25', '2025-03-31', 'i want a car', 0, '2025-03-25 15:25:23', NULL, ''),
(35, 750399413, 'user@gmail.com', 15, '2025-03-31', '2025-04-04', 'i want a car', 0, '2025-03-26 03:55:20', NULL, ''),
(36, 661703670, 'user@gmail.com', 40, '2025-03-26', '2025-03-29', 'i want it', 0, '2025-03-26 04:05:19', NULL, ''),
(37, 650869013, 'nimesh@gmail.com', 22, '2025-03-26', '2025-03-29', 'i', 1, '2025-03-26 04:58:10', '2025-03-28 05:46:14', ''),
(39, 905415983, 'nimesh@gmail.com', 28, '2025-03-28', '2025-04-01', 'i want it', 2, '2025-03-28 05:50:18', '2025-03-28 05:50:42', ''),
(40, 191115258, 'nimesh@gmail.com', 27, '2025-03-28', '2025-03-31', 'i want it', 1, '2025-03-28 08:21:06', '2025-03-28 08:21:34', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

DROP TABLE IF EXISTS `tblbrands`;
CREATE TABLE IF NOT EXISTS `tblbrands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(9, 'Mahindra', '2025-02-28 03:35:34', NULL),
(10, 'Hyundai', '2025-02-28 03:35:43', NULL),
(11, 'Honda', '2025-02-28 03:35:50', NULL),
(12, 'Audi', '2025-02-28 03:36:11', NULL),
(13, 'BMW', '2025-02-28 03:36:13', NULL),
(14, 'Mercedes', '2025-02-28 03:36:23', NULL),
(15, 'Suzuki', '2025-02-28 03:36:36', NULL),
(17, 'Lexus', '2025-03-08 07:34:10', NULL),
(20, 'BUGATTI', '2025-03-09 05:54:32', NULL),
(22, 'Skoda', '2025-03-15 12:29:19', '2025-03-23 04:41:01'),
(23, 'Isuzu', '2025-03-15 12:30:32', NULL),
(24, 'Volkswagen', '2025-03-15 12:30:59', NULL),
(25, 'Ferrari', '2025-03-15 12:31:45', NULL),
(26, 'Bentley', '2025-03-15 12:31:52', NULL),
(27, 'Rolls Royce', '2025-03-15 12:32:00', NULL),
(28, 'Volvo', '2025-03-15 12:33:31', NULL),
(29, 'Toyota', '2025-03-15 13:08:02', NULL),
(30, 'luxus', '2025-03-26 04:00:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

DROP TABLE IF EXISTS `tblcontactusinfo`;
CREATE TABLE IF NOT EXISTS `tblcontactusinfo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Address` tinytext,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'J&K Block, Laxmi Nagar', 'luxoride@gmail.com', '8000925085');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

DROP TABLE IF EXISTS `tblcontactusquery`;
CREATE TABLE IF NOT EXISTS `tblcontactusquery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Kunal ', 'kunal@gmail.com', '7977779798', 'I want to know you brach in Chandigarh?', '2024-06-04 09:34:51', 1),
(2, 'nimesh sutare', 'skdanish6304@gmial.com', '8005632564', 'SHadi ka order dena hai phone kro, mera commision rkhna', '2025-02-25 16:28:02', 1),
(7, 'nimesh', 'nimesh@gmail.com', '8511421680', 'i want best car', '2025-03-25 15:11:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

DROP TABLE IF EXISTS `tblpages`;
CREATE TABLE IF NOT EXISTS `tblpages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <A href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</A>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us ', 'aboutus', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.3333px;\">We offer a varied fleet of cars, ranging from the compact. All our vehicles have air conditioning, &nbsp;power steering, electric windows. All our vehicles are bought and maintained at official dealerships only. Automatic transmission cars are available in every booking class.&nbsp;</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\">As we are not affiliated with any specific automaker, we are able to provide a variety of vehicle makes and models for customers to rent.</span><div><span style=\"color: rgb(62, 62, 62); font-family: &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, sans-serif; font-size: 11px;\">ur mission is to be recognised as the global leader in Car Rental for companies and the public and private sector by partnering with our clients to provide the best and most efficient Cab Rental solutions and to achieve service excellence.</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\"><br></span></div>'),
(11, 'FAQs', 'faqs', '																														<h3 data-start=\"90\" data-end=\"138\" class=\"\" style=\"text-align: justify;\"><strong data-start=\"96\" data-end=\"136\">Q1: How do I book a car on LuxoRide?</strong></h3>\r\n<p data-start=\"139\" data-end=\"213\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"141\" data-end=\"158\" style=\"font-size: 1em;\">Answer:</strong></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">To book a car on </span><strong data-start=\"178\" data-end=\"190\" style=\"font-size: 1em;\">LuxoRide</strong><span style=\"font-size: 1em;\">, follow these steps:</span></div></p>\r\n<ol data-start=\"214\" data-end=\"474\">\r\n<li data-start=\"214\" data-end=\"246\" class=\"\">\r\n<p data-start=\"217\" data-end=\"246\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"217\" data-end=\"227\" style=\"font-size: 1em;\">Log in</strong><span style=\"font-size: 1em;\"> to your account.</span></div><strong data-start=\"250\" data-end=\"260\" style=\"font-size: 1em;\"><div style=\"text-align: justify;\"><strong data-start=\"250\" data-end=\"260\" style=\"font-size: 1em;\">Browse</strong><span style=\"font-size: 1em;\"> available cars and select one.</span></div></strong><strong data-start=\"297\" data-end=\"307\" style=\"font-size: 1em;\"><div style=\"text-align: justify;\"><strong data-start=\"297\" data-end=\"307\" style=\"font-size: 1em;\">Choose</strong><span style=\"font-size: 1em;\"> rental dates and pickup/drop-off locations.</span></div></strong><strong data-start=\"357\" data-end=\"377\" style=\"font-size: 1em;\"><div style=\"text-align: justify;\"><strong data-start=\"357\" data-end=\"377\" style=\"font-size: 1em;\">Make the payment</strong><span style=\"font-size: 1em;\"> and confirm the booking.</span></div></strong><strong data-start=\"408\" data-end=\"427\" style=\"font-size: 1em;\"><div style=\"text-align: justify;\"><strong data-start=\"408\" data-end=\"427\" style=\"font-size: 1em;\">Pick up the car</strong><span style=\"font-size: 1em;\"> or opt for doorstep delivery (if available).</span></div></strong></p></li>\r\n</ol>\r\n<hr data-start=\"476\" data-end=\"479\" class=\"\" style=\"text-align: justify;\">\r\n<h3 data-start=\"481\" data-end=\"537\" class=\"\" style=\"text-align: justify;\"><strong data-start=\"487\" data-end=\"535\">Q2: What documents are required for booking?</strong></h3>\r\n<p data-start=\"538\" data-end=\"736\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"540\" data-end=\"557\" style=\"font-size: 1em;\">Answer:</strong></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">You need to provide:</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">A valid </span><strong data-start=\"593\" data-end=\"612\" style=\"font-size: 1em;\">driving license</strong><span style=\"font-size: 1em;\">.</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">A&nbsp;</span><strong data-start=\"620\" data-end=\"644\" style=\"font-size: 1em;\">government-issued ID</strong><span style=\"font-size: 1em;\"> (Passport/Aadhar/Voter ID).</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">A </span><strong data-start=\"679\" data-end=\"700\" style=\"font-size: 1em;\">credit/debit card</strong><span style=\"font-size: 1em;\"> for payment and security deposit.</span></div></p>\r\n<p data-start=\"738\" data-end=\"827\" class=\"\" style=\"text-align: justify;\">(<em data-start=\"739\" data-end=\"824\">For international customers, an International Driving Permit (IDP) may be required.</em>)</p>\r\n<hr data-start=\"829\" data-end=\"832\" class=\"\" style=\"text-align: justify;\">\r\n<h3 data-start=\"834\" data-end=\"884\" class=\"\" style=\"text-align: justify;\"><strong data-start=\"840\" data-end=\"882\">Q3: Can I cancel or modify my booking?</strong></h3>\r\n<p data-start=\"885\" data-end=\"906\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"887\" data-end=\"904\" style=\"font-size: 1em;\">Answer:</strong></div><strong data-start=\"909\" data-end=\"926\" style=\"font-size: 1em;\"><div style=\"text-align: justify;\"><strong data-start=\"909\" data-end=\"926\" style=\"font-size: 1em;\">Modifications</strong><span style=\"font-size: 1em;\">: Allowed before the pickup date (subject to availability).</span></div></strong></p><ul data-start=\"907\" data-end=\"1134\">\r\n<li data-start=\"988\" data-end=\"1134\" class=\"\">\r\n<p data-start=\"990\" data-end=\"1010\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"990\" data-end=\"1007\" style=\"font-size: 1em;\">Cancellations</strong><span style=\"font-size: 1em;\">:</span></div><span style=\"font-size: 1em;\"><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">Free cancellation if done </span><strong data-start=\"1041\" data-end=\"1060\" style=\"font-size: 1em;\">24 hours before</strong><span style=\"font-size: 1em;\"> pickup.</span></div></span><span style=\"font-size: 1em;\"><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">A cancellation fee applies for last-minute cancellations.</span></div></span></p>\r\n</li>\r\n</ul>\r\n<h2 data-start=\"1141\" data-end=\"1171\" class=\"\" style=\"text-align: justify;\"><br></h2>\r\n<h3 data-start=\"1173\" data-end=\"1223\" class=\"\" style=\"text-align: justify;\"><strong data-start=\"1179\" data-end=\"1221\">Q4: What payment methods are accepted?</strong></h3>\r\n<p data-start=\"1224\" data-end=\"1362\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"1226\" data-end=\"1243\" style=\"font-size: 1em;\">Answer:</strong></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">We accept:</span></div><strong data-start=\"1262\" data-end=\"1284\"><div style=\"text-align: justify;\"><strong data-start=\"1262\" data-end=\"1284\" style=\"font-size: 1em;\">Credit/Debit Cards</strong><span style=\"font-size: 1em;\"> (Visa, Mastercard, Amex)</span></div></strong><strong data-start=\"1315\" data-end=\"1340\"><div style=\"text-align: justify;\"><strong data-start=\"1315\" data-end=\"1340\" style=\"font-size: 1em;\">UPI / Digital Wallets</strong><span style=\"font-size: 1em;\"> (Google Pay, Paytm)</span></div></strong><em data-start=\"1365\" data-end=\"1419\" style=\"font-size: 1em;\"><div style=\"text-align: justify;\"><em data-start=\"1365\" data-end=\"1419\" style=\"font-size: 1em;\">Cash payments are not accepted for security reasons.</em><span style=\"font-size: 1em;\">)</span></div></em></p><p data-start=\"1364\" data-end=\"1422\" class=\"\"><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify;\"><br></div></p><h3 data-start=\"2049\" data-end=\"2103\" class=\"\" style=\"text-align: justify;\"><strong data-start=\"2055\" data-end=\"2101\">Q5: Can someone else drive the rented car?</strong></h3><p data-start=\"1364\" data-end=\"1422\" class=\"\">\r\n\r\n</p><p data-start=\"2104\" data-end=\"2229\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"2106\" data-end=\"2123\" style=\"font-size: 1em;\">Answer:</strong></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">Only if they are listed as an </span><strong data-start=\"2156\" data-end=\"2177\" style=\"font-size: 1em;\">additional driver</strong><span style=\"font-size: 1em;\"> during booking and have provided valid documents.</span></div><div style=\"text-align: justify;\"><br></div></p><h3 data-start=\"3364\" data-end=\"3414\" class=\"\" style=\"text-align: justify;\"><strong data-start=\"3370\" data-end=\"3412\">Q6: Do you provide long-term rentals?</strong></h3><p data-start=\"2104\" data-end=\"2229\" class=\"\">\r\n</p><p data-start=\"3415\" data-end=\"3507\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"3417\" data-end=\"3434\" style=\"font-size: 1em;\">Answer:</strong></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">Yes, we offer </span><strong data-start=\"3451\" data-end=\"3482\" style=\"font-size: 1em;\">weekly/monthly rental plans</strong><span style=\"font-size: 1em;\"> with discounted rates.</span></div><div style=\"text-align: justify;\"><br></div></p><h3 data-start=\"3514\" data-end=\"3559\" class=\"\" style=\"text-align: justify;\"><strong data-start=\"3520\" data-end=\"3557\">Q7: How do I receive my invoice?</strong></h3><p data-start=\"3415\" data-end=\"3507\" class=\"\">\r\n</p><p data-start=\"3560\" data-end=\"3676\" class=\"\"><div style=\"text-align: justify;\"><strong data-start=\"3562\" data-end=\"3579\" style=\"font-size: 1em;\">Answer:</strong></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em;\">You can download your invoice from the </span><strong data-start=\"3621\" data-end=\"3638\" style=\"font-size: 1em;\">\"My Bookings\"</strong><span style=\"font-size: 1em;\"> section after completing your trip.</span></div></p>\r\n										\r\n										\r\n										');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

DROP TABLE IF EXISTS `tblsubscribers`;
CREATE TABLE IF NOT EXISTS `tblsubscribers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(5, 'kunal@gmail.com', '2024-05-31 09:35:07'),
(6, 'harsh@gmail.com', '2025-02-25 16:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

DROP TABLE IF EXISTS `tbltestimonial`;
CREATE TABLE IF NOT EXISTS `tbltestimonial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(4, 'user@gmail.com', 'Liked the service, Affordable.', '2025-03-16 09:21:37', 1),
(5, 'user@gmail.com', 'i like service', '2025-03-23 04:44:52', NULL),
(7, 'user@gmail.com', 'i like', '2025-03-23 04:49:14', 1),
(8, 'danish1@yahoo.com', 'hi', '2025-03-25 15:28:55', NULL),
(9, 'user@gmail.com', 'hi helo', '2025-03-26 03:57:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `EmailId` (`EmailId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(14, 'user', 'user@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', '8866530725', NULL, NULL, NULL, NULL, '2025-03-09 05:38:45', '2025-03-26 03:54:32'),
(15, 'nimesh sutare', 'nimesh@gmail.com', 'b786d5c5737fa6c3331eed0c71cf5f79', '8511426180', '01/08/2005', 'House no 572, Harinagar-3, Opp-BRC\r\nUdhana', 'Surat', 'India', '2025-03-17 03:44:07', '2025-03-21 19:41:36'),
(16, 'shani', 'shani@gmail.com', 'e51676fc29af8a3cff40acab1e37a2ef', '9601796017', NULL, NULL, NULL, NULL, '2025-03-21 19:29:44', '2025-03-22 07:52:00'),
(17, 'Danish', 'danish@gmail.com', '5b119a961fcb523c81c25e8f79de2380', '8000925086', NULL, NULL, NULL, NULL, '2025-03-24 15:39:23', NULL),
(18, 'danish1', 'danish1@yahoo.com', '5b119a961fcb523c81c25e8f79de2380', '8000063250', NULL, NULL, NULL, NULL, '2025-03-25 15:13:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

DROP TABLE IF EXISTS `tblvehicles`;
CREATE TABLE IF NOT EXISTS `tblvehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int DEFAULT NULL,
  `VehiclesOverview` longtext,
  `PricePerDay` int DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int DEFAULT NULL,
  `SeatingCapacity` int DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int DEFAULT NULL,
  `PowerDoorLocks` int DEFAULT NULL,
  `AntiLockBrakingSystem` int DEFAULT NULL,
  `BrakeAssist` int DEFAULT NULL,
  `PowerSteering` int DEFAULT NULL,
  `DriverAirbag` int DEFAULT NULL,
  `PassengerAirbag` int DEFAULT NULL,
  `PowerWindows` int DEFAULT NULL,
  `CDPlayer` int DEFAULT NULL,
  `CentralLocking` int DEFAULT NULL,
  `CrashSensor` int DEFAULT NULL,
  `LeatherSeats` int DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(11, 'BMW X7', 13, 'The BMW X7 is the German carmaker\'s flagship luxury SUV, available in both 6- and 7-seater layouts. It boasts a tech-loaded cabin, powerful 3-litre petrol and diesel engine options that are perfectly matched for a big SUV like this, along with BMW\'s signature handling.', 3000, 'Diesel', 2024, 7, 'x71.avif', 'x72.avif', 'X74.avif', 'X73.avif', '', 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, '2025-02-28 03:43:25', NULL),
(12, 'C63', 14, 'Mercedes-Benz C-Coupe C 63 AMG is the top model in the C-Coupe lineup and the price of C-Coupe top model is Rs. 1.41 Crore. It gives a mileage of 9.26 kmpl.', 4000, 'Petrol', 2023, 5, 'amg 631.avif', 'amg 632.avif', '633.avif', 'amg 634.avif', '', NULL, 1, 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, '2025-02-28 03:46:02', '2025-03-26 15:17:23'),
(15, 'Thar', 9, 'Mahindra Thar price for the base model starts at Rs. 11.50 Lakh and the top model price goes upto Rs. 17.60 Lakh (Avg. ex-showroom). Thar price for 17 variants is listed below.', 1500, 'Petrol', 2024, 5, 'thar1.avif', 'thar2.avif', 'thar3.avif', 'thar4.avif', '', 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, 1, '2025-03-09 05:30:28', NULL),
(16, 'Verna', 10, 'Hyundai Verna price for the base model starts at Rs. 11.07 Lakh and the top model price goes upto Rs. 17.55 Lakh (Avg. ex-showroom). Verna price for 16 variants is listed below.', 1200, 'Diesel', 2024, 6, 'verna1.avif', 'verna4.avif', 'verna2.avif', 'verna3.avif', '', 1, 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 1, '2025-03-09 05:35:19', '2025-03-09 05:36:08'),
(19, 'verna', 10, 'Hyundai Verna price for the base model starts at Rs. 11.07 Lakh and the top model price goes upto Rs. 17.55 Lakh (Avg. ex-showroom). Verna price for 16 variants is listed below.', 1500, 'Petrol', 2025, 7, 'verna1.avif', 'verna2.avif', 'verna3.avif', 'verna4.avif', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-09 06:23:14', NULL),
(20, 'XC 90', 28, 'The Volvo XC90 is available in New Delhi starting at ? 1.03 Cr. Volvo has currently offered only one variant of the XC90, priced at ? 1.03 Cr. To explore the best offers, visit your nearest Volvo showroom in New Delhi today. Compared primarily with BMW X7 price in New Delhi starting ? 1.30 Cr and BMW X5 price in New Delhi starting ? 97 Lakh. You can check the on-road price of Volvo XC90 here.', 5000, 'Petrol', 2024, 7, 'volvo xc90 1.avif', 'volvo xc90 2.avif', 'volvo xc90 3.avif', 'volvo xc90 4.avif', '', 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 1, '2025-03-15 12:58:03', '2025-03-21 09:06:21'),
(21, 'S90', 28, 'The Volvo S90 is a well-rounded luxury sedan that excels in safety, technology, and comfort. It is a great option for buyers looking for a high-end, yet practical vehicle with a focus on advanced driver assistance systems and minimalistic Swedish design. While it may not have the sporty driving dynamics of some of its German competitors, it makes up for it with its serene and comfortable driving experience, as well as a reputation for reliability and safety.', 4000, 'Petrol', 2023, 5, 'volvo s90 1.webp', 'volvo s90 2.avif', 'volvo s90 3.avif', 'volvo xc90 4.avif', '', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, '2025-03-15 13:01:51', '2025-03-21 09:07:22'),
(22, 'Virtus', 24, 'The Volkswagen Virtus is a stylish, spacious, and well-built compact sedan that stands out for its quality, performance, and safety features. It offers a comfortable ride, a feature-rich interior, and a choice of efficient engines. While it may not be the most performance-focused sedan in its class, its combination of practicality and premium features makes it an excellent choice for those seeking a reliable, well-rounded vehicle in the compact sedan segment.', 2000, 'Petrol', 2024, 5, 'virtus 1.avif', 'virtus 2.webp', 'virtus 3.webp', 'virtus 4.webp', '', 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, '2025-03-15 13:05:21', '2025-03-21 09:08:13'),
(23, 'Urban Cruiser', 29, 'The Toyota Urban Cruiser is a practical, fuel-efficient, and well-built subcompact crossover that caters to buyers seeking an affordable SUV with the reliability and after-sales service that Toyota is known for. It’s ideal for urban commuting and offers decent interior space, modern features, and a comfortable driving experience. While it’s not the most powerful vehicle in its class, its simplicity, efficiency, and Toyota’s reputation for quality make it a strong contender in the subcompact SUV market.', 1800, 'Petrol', 2024, 5, 'urban 1.avif', 'urban 2.avif', 'urban 3.avif', 'urban 4..avif', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2025-03-15 13:12:34', '2025-03-21 09:08:42'),
(24, 'Taigun', 24, 'The Volkswagen Taigun offers a compelling mix of style, performance, and quality. With its premium features, well-rounded engine options, and a focus on safety, it stands out as a strong contender in the competitive compact SUV segment. Whether you’re looking for a daily commuter or a family-friendly vehicle, the Taigun provides a good balance of comfort, performance, and practicality. While it may not be the most affordable option in its segment, it justifies its price with high-quality materials, advanced technology, and a rewarding driving experience.', 1500, 'Diesel', 2024, 5, 'taigun 1.avif', 'taigun 2.avif', 'taigun 3.avif', 'taigun 4.avif', '', 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, '2025-03-15 13:19:23', '2025-03-21 09:00:11'),
(25, 'Slavia', 22, 'The Skoda Slavia offers a compelling package for buyers looking for a stylish, comfortable, and feature-packed sedan. With its modern design, spacious interiors, strong engine performance, and high levels of safety and technology, the Slavia positions itself as a strong contender in the mid-size sedan segment. It is particularly appealing for those who prioritize driving dynamics, interior space, and build quality, along with the convenience of modern technologies.', 1800, 'Petrol', 2025, 5, 'skoda slavia 1.webp', 'skoda slavia 2.webp', 'skoda slavia 3.webp', 'skoda slavia 4.avif', '', 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, '2025-03-15 13:22:22', '2025-03-21 09:09:39'),
(26, 'Kylaq', 22, 'The Skoda Kyliaq (or next-generation Kodiaq) is set to be a well-rounded, premium SUV with a focus on comfort, space, performance, and safety. The facelifted or next-gen model is likely to build on the strengths of the current Kodiaq, adding more modern styling, enhanced tech features, and possibly a hybrid powertrain. With Skoda’s reputation for creating practical yet premium vehicles, the Kyliaq is poised to appeal to buyers looking for a family-friendly SUV with a touch of luxury, strong performance, and cutting-edge technology.', 2000, 'Diesel', 2024, 6, 'skoda kylaq 1.avif', 'skoda kylaq 2.avif', 'skoda kylaq 3.avif', 'skoda kylaq 4.avif', '', 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 0, '2025-03-15 13:25:17', '2025-03-21 09:10:09'),
(27, 'Spectre', 27, 'The Rolls-Royce Spectre represents a landmark moment for the brand, combining the luxury, craftsmanship, and performance associated with Rolls-Royce with the benefits of petrol mobility. The Spectre redefines what a luxury electric vehicle can be, offering incredible performance, exquisite craftsmanship, and cutting-edge technology all wrapped in the brand’s iconic aura of opulence and exclusivity.', 9000, 'Petrol', 2024, 4, 'rollsroyce 1.avif', 'rollsroyce 2.avif', 'rollsroyce 3.avif', 'rollsroyce 4.avif', '', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, '2025-03-15 13:28:52', '2025-03-21 09:10:51'),
(28, 'S class', 14, 'The Mercedes-Benz S-Class continues to be one of the finest examples of automotive luxury, combining state-of-the-art technology, refined performance, and unmatched comfort. Whether as a standard sedan, an AMG performance variant, or the ultra-luxurious Maybach, the S-Class remains a symbol of the highest echelon of automotive engineering and luxury. It is a car that is as much about the experience as it is about the ride, blending advanced safety systems, innovative technologies, and exquisite craftsmanship to create a truly extraordinary vehicle.\r\n\r\nWhether you\'re behind the wheel or being chauffeured in the rear seats, the S-Class continues to set the benchmark for what a luxury sedan should be', 5000, 'Petrol', 2025, 5, 'merc s class 1.avif', 'merc s class 2.avif', 'merc s class 3.avif', 'merc s class 4.avif', 'merc sclass 3.avif', 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, 1, 1, '2025-03-15 14:08:23', '2025-03-21 09:11:13'),
(29, 'E class', 14, 'The Mercedes-Benz E-Class remains one of the most well-rounded and luxurious sedans in its segment. It combines luxury, technology, and performance, while providing a variety of body styles and engine options to cater to a wide range of buyer preferences. The E-Class offers exceptional comfort and advanced safety features, making it an excellent choice for those seeking a reliable, prestigious vehicle that doesn’t compromise on daily usability.', 4000, 'Petrol', 2025, 4, 'merc e class 1.avif', 'merc e class 2.avif', 'merc e class 3.avif', 'merc e class 4.avif', '', 1, 1, 1, 0, 1, 0, 0, 1, 0, 1, 1, 0, '2025-03-15 14:12:57', '2025-03-21 09:11:37'),
(30, 'E 53 AMG', 14, 'The Mercedes-AMG E 53 offers a perfect blend of performance and luxury, making it an ideal choice for those seeking a sporty sedan without sacrificing comfort or everyday usability. It provides impressive power, excellent handling, and the signature refinement of Mercedes-Benz, all wrapped in a sophisticated, performance-oriented package. Whether you\'re looking for a thrilling driving experience or a highly advanced and luxurious vehicle for daily use, the AMG E 53 delivers on all fronts', 4000, 'Petrol', 2025, 5, 'merc amg e 53 1.avif', 'merc amg e 53 2.avif', 'merc amg e 53 3.avif', 'merc amg e 53 4.avif', '', 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 0, '2025-03-15 14:18:22', '2025-03-21 09:12:06'),
(31, 'NX', 17, 'The Lexus NX is a luxury compact crossover SUV that blends refined design, advanced technology, and strong performance. It sits in the Lexus lineup between the UX (subcompact) and RX (mid-size) SUVs. The NX is designed for those seeking a stylish, high-tech, and comfortable SUV, offering a smooth ride with a variety of powertrain options, including hybrid and plug-in hybrid models. The NX is particularly appealing for urban drivers and small families, providing a premium driving experience with the added benefit of Lexus\' renowned reliability and luxury', 3500, 'Petrol', 2024, 5, 'lexus nx 1.avif', 'lexus nx 2.avif', 'lexus nx 3.avif', 'lexus nx 4.avif', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2025-03-15 14:26:52', '2025-03-21 09:12:37'),
(32, 'LX 300', 17, 'The Lexus LX is a luxury full-size SUV that combines rugged off-road capability with high-end features and exceptional luxury. Positioned as Lexus’ flagship SUV, the LX shares its platform with the Toyota Land Cruiser, known for its legendary off-road performance, but adds a level of refinement, sophistication, and advanced technology that is expected of a luxury brand like Lexus. The LX is designed for those who seek ruggedness, spaciousness, and luxury, whether for tough off-road adventures or comfortable city driving.', 5000, 'Diesel', 2024, 7, 'lexus lx 1.avif', 'lexus lx 2.avif', 'lexus lx 3.avif', 'lexus lx 4.avif', '', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, '2025-03-15 14:30:15', '2025-03-21 09:13:16'),
(33, 'Land Cruiser 300', 29, 'The Toyota Land Cruiser 300 is the latest generation of Toyota’s legendary off-road SUV, built for those who require a combination of ruggedness, power, and luxury. The Land Cruiser 300 debuted in 2021 and replaced the Land Cruiser 200 model, which had been a symbol of Toyota’s robust off-road vehicles. The LC 300 blends Toyota’s renowned off-road capability with a more modern, luxurious feel, and advanced technology. It retains the iconic reliability and toughness expected of the Land Cruiser while offering a more refined driving experience, especially on-road.\r\n\r\nUnlike its predecessor, the LC 300 is no longer available in all markets (it has been discontinued in some regions like North America), but it remains a key model in markets like Australia, the Middle East, and parts of Africa and Asia', 6000, 'Diesel', 2022, 7, 'landcruiser 1.avif', 'landcruiser 2.avif', 'landcruiser 3.avif', 'landcruiser 4.avif', '', 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, '2025-03-15 14:32:55', '2025-03-21 09:14:49'),
(34, 'MU-X', 23, 'The Isuzu MU-X is one of the most popular mid-size SUVs produced by Isuzu, well-known in markets like Australia, Thailand, India, and other parts of Asia. The MU-X is designed to handle a combination of off-road terrain, family use, and urban driving, with a focus on reliability, spaciousness, and practicality.', 1900, 'Diesel', 2022, 6, 'isuzu 1.avif', 'isuzu 2.avif', 'isuzu 3.avif', 'isuzu 4.avif', '', 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, '2025-03-15 14:35:59', '2025-03-21 09:15:20'),
(35, 'Elevate', 11, 'The Honda Elevate is a compact SUV launched by Honda to tap into the growing SUV segment, particularly in markets like India. It was introduced in 2023 and positioned as a stylish, practical, and feature-rich vehicle in Honda\'s lineup.', 2000, 'Petrol', 2024, 5, 'honda elevate 1.webp', 'honda elevate 2.avif', 'honda elevate 3.avif', 'honda elevate 4.avif', '', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, '2025-03-15 14:39:14', '2025-03-21 09:15:43'),
(36, 'Hilux', 29, 'The Toyota Hilux is a popular pickup truck that has earned a reputation for being tough, reliable, and versatile. It has been a cornerstone in Toyota\'s global lineup, especially in markets like Australia, Southeast Asia, Africa, and the Middle East. The Hilux is often seen as a go-to choice for both commercial use (such as construction or agriculture) and personal use, especially for those who require a rugged, all-terrain vehicle.', 3000, 'Diesel', 2023, 4, 'hilux 3.avif', 'hilux 1.avif', 'hilux 2.avif', 'hilux 4.avif', '', 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, '2025-03-15 14:40:50', '2025-03-21 09:16:09'),
(37, 'G 63', 14, 'The Mercedes-Benz G-Class, commonly referred to as the G-Wagon, is one of the most iconic luxury SUVs in the world. Known for its rugged design, impressive off-road capabilities, and luxurious features, the G-Wagon has become synonymous with prestige, performance, and off-road prowess. Initially developed as a military vehicle in the late 1970s, it has evolved into a high-performance luxury vehicle that blends classic styling with modern technology and comfort.', 5001, 'Petrol', 2024, 6, 'g5801.avif', 'g5802.avif', 'g5803.avif', 'g5804.avif', '', 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 0, 0, '2025-03-15 15:03:58', '2025-03-21 09:16:37'),
(38, 'SF 90', 25, 'The Ferrari SF90 Stradale is one of Ferrari\'s most groundbreaking models, representing a significant leap in both technology and performance. As Ferrari’s flagship plug-in hybrid (PHEV) supercar, the SF90 combines the brand\'s legendary racing heritage with cutting-edge technology. It sets new standards for both speed and sophistication, and it features an electrified powertrain that provides incredible performance, efficiency, and driving dynamics.', 7000, 'Petrol', 2023, 2, 'ferrari sf90 1.avif', 'ferrari sf90 2.avif', 'ferrari sf90 3.avif', 'sf90 4.avif', '', 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 0, 1, '2025-03-15 15:07:18', '2025-03-21 09:16:57'),
(39, 'Divo', 20, 'The Bugatti Divo is a limited-edition hypercar from Bugatti, designed to be a more agile and track-focused counterpart to the already legendary Chiron. Named after Albert Divo, a French racing driver who won the Targa Florio twice for Bugatti in the 1920s, the Divo takes the performance, luxury, and engineering excellence of Bugatti to a whole new level.\r\n\r\nUnlike the Chiron, which focuses heavily on top speed and straight-line performance, the Divo is designed with a focus on handling, cornering, and lateral acceleration, making it more suited for track days and winding, high-speed roads', 11000, 'Petrol', 2024, 2, 'divo 1.avif', 'divo 2.avif', 'divo 3.avif', 'divo 4.avif', 'divo 5.avif', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2025-03-15 15:09:37', '2025-03-21 09:17:28'),
(40, 'BMW', 30, 'It is best car', 1500, 'Diesel', 2025, 7, 'bmwx51.avif', 'bmwx53.avif', 'bmwx54.avif', 'bmwx52.avif', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-26 04:03:08', NULL),
(41, 'BE 6', 9, 'It is one of the most recent new-age Mahindra EVs, which gets aggressive styling and equally potent powertrain options. It gets two battery pack options, which have a claimed range of more than 500 km. It gets a rear-axle-mounted electric motor, which facilitates rear-wheel-driven fun.', 3500, 'Electric', 2025, 5, 'be6 1.avif', 'be6 2.avif', 'be6 3.avif', 'be6 4.avif', 'be6 5.avif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-26 14:29:14', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
