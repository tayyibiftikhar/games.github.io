-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 23, 2019 at 04:20 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `a_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q_id` bigint(20) NOT NULL,
  `a_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `a_thumb` varchar(255) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `q_id`, `a_text`, `a_thumb`) VALUES
(1, 47, 'Yes', 'IMG_5d5a746fd52aa.jpg'),
(2, 47, 'No', 'IMG_5d5a74795364b.jpg'),
(3, 42, 'Singer', 'IMG_5d5a752cc9c82.png'),
(4, 42, 'Doctor', 'IMG_5d5a75a2b56d9.jpg'),
(5, 42, 'Engineer', 'IMG_5d5a75f531e06.jpg'),
(6, 42, 'Teacher', 'IMG_5d5a7690c2c8b.jpg'),
(7, 42, 'Actor', 'IMG_5d5a76e8da6b8.jpg'),
(8, 44, 'Yes', 'IMG_5d5a781d79cf6.jpg'),
(9, 44, 'No', 'IMG_5d5a7889188f5.jpg'),
(10, 35, 'Love', 'IMG_5d5a78fb2673b.jpg'),
(11, 35, 'Money', 'IMG_5d5a7965c4b04.jpg'),
(12, 40, 'Friends', 'IMG_5d5a79bf6d427.jpg'),
(13, 40, 'Soulmate', 'IMG_5d5a7a13b9e4d.jpg'),
(14, 40, 'Family', 'IMG_5d5a7b65347cf.jpg'),
(15, 40, 'Alone', 'IMG_5d5a7bb18fc1c.jpg'),
(16, 41, 'Online Shopping', 'IMG_5d5a7c0e82b46.jpg'),
(17, 41, 'Traditional', 'IMG_5d5a7c56c99c9.jpg'),
(18, 45, 'Facebook', 'IMG_5d5a7ced99480.jpg'),
(19, 45, 'Instagram', 'IMG_5d5a7d2f6834c.jpg'),
(20, 45, 'Tiktok', 'IMG_5d5a7d93185b1.jpg'),
(21, 26, 'Chocolate', 'IMG_5d5a7dff4e46f.jpg'),
(22, 26, 'Vanilla', 'IMG_5d5a7e5c4ba7e.jpg'),
(23, 26, 'Strawberry', 'IMG_5d5a7ea1b0b9a.jpg'),
(24, 26, 'Butterscotch', 'IMG_5d5a7feb8bd9f.jpg'),
(25, 37, 'Veg', 'IMG_5d5a811bbd4d5.jpg'),
(26, 37, 'Non veg', 'IMG_5d5a8162c3d63.jpg'),
(27, 46, 'Funny', 'IMG_5d5a81bb35fe6.jpg'),
(28, 46, 'Kind', 'IMG_5d5a83609de19.jpg'),
(29, 46, 'Serious', 'IMG_5d5a83e0658c3.jpg'),
(30, 46, 'Friendly', 'IMG_5d5a845dd1176.jpg'),
(31, 13, 'Yes', 'IMG_5d5a87f242c8c.jpg'),
(32, 13, 'No', 'IMG_5d5a87ffefb10.jpg'),
(33, 14, 'Sleeping', 'IMG_5d5a8a958ee1d.jpg'),
(34, 14, 'Listening music', 'IMG_5d5a8af4a7933.jpg'),
(35, 14, 'Reading', 'IMG_5d5a8b35055c5.jpg'),
(36, 14, 'Dancing', 'IMG_5d5a8b7f1fce9.jpg'),
(37, 14, 'Go for a drive', 'IMG_5d5a8bb9b663b.jpg'),
(38, 15, 'Travel', 'IMG_5d5acde430df8.jpg'),
(39, 15, 'Spend quality time ', 'IMG_5d5ace1010bd2.jpg'),
(40, 15, 'Get a hobby', 'IMG_5d5aceb2a6b36.jpg'),
(41, 15, 'Volunteer', 'IMG_5d5acefa41e10.jpg'),
(42, 16, 'Pen caps', 'IMG_5d5acf6d014cc.jpg'),
(43, 16, 'Keys', 'IMG_5d5acfb4ef90f.jpg'),
(44, 16, 'Headphones', 'IMG_5d5ad0049dda1.jpg'),
(45, 16, 'Umbrella', 'IMG_5d5ad04954234.jpg'),
(46, 16, 'Password', 'IMG_5d5ad0904027f.jpg'),
(47, 17, 'Yes', 'IMG_5d5ad0b140ec7.jpg'),
(48, 17, 'No', 'IMG_5d5ad0bbcd300.jpg'),
(49, 18, 'Comparison', 'IMG_5d5ad13063a48.jpg'),
(50, 18, 'Temper', 'IMG_5d5ad1857e9f8.jpg'),
(51, 18, 'Careless', 'IMG_5d5ad1f421bdb.jpg'),
(52, 18, ' Appearance', 'IMG_5d5ad2544c685.jpg'),
(53, 20, 'Yes', 'IMG_5d5ad28835164.jpg'),
(54, 20, 'No', 'IMG_5d5ad2914c77e.jpg'),
(55, 21, 'School Days', 'IMG_5d5ad32940e10.jpg'),
(56, 21, 'Malgudi Days', 'IMG_5d5ad35b52ce6.jpg'),
(57, 21, 'Shaktimaan', 'IMG_5d5ad3a119fd8.jpg'),
(58, 22, 'Manali', 'IMG_5d5ae1c726d17.jpg'),
(59, 22, 'Shimla', 'IMG_5d5ad4c7b3c9f.jpg'),
(60, 22, 'Ladakh', 'IMG_5d5ad4ee89d3f.jpg'),
(61, 22, 'Nainital', 'IMG_5d5ad5225878f.jpg'),
(62, 23, 'Reading', 'IMG_5d5ad57ed2457.jpg'),
(63, 23, 'Writing', 'IMG_5d5ad5c8de9ea.jpg'),
(64, 23, 'Sewing', 'IMG_5d5ad5f9666e1.jpg'),
(65, 23, 'Walking', 'IMG_5d5ad638acba2.jpg'),
(66, 23, 'Gardening', 'IMG_5d5ad68f69cfb.jpg'),
(67, 23, 'Drawing', 'IMG_5d5ad6e01d7ad.jpg'),
(68, 24, 'Math', 'IMG_5d5ad73611b7e.jpg'),
(69, 24, 'Science', 'IMG_5d5ad782f0420.jpg'),
(70, 24, 'Geography', 'IMG_5d5ad7f1336db.jpg'),
(71, 24, 'History', 'IMG_5d5ad83118297.jpg'),
(72, 25, 'Engineer', 'IMG_5d5ad87312bd0.jpg'),
(73, 25, 'Doctor', 'IMG_5d5ad8a01011d.jpg'),
(74, 25, 'Coal Miner', 'IMG_5d5ad8f39f01e.jpg'),
(75, 25, 'Fish Market', 'IMG_5d5ad93a15e3a.jpg'),
(76, 25, 'Carcass Removal', 'IMG_5d5ad9bc46573.jpg'),
(77, 34, 'Winter', 'IMG_5d5adc7a7fcb1.jpg'),
(78, 34, 'Summer', 'IMG_5d5adcb0eddd4.jpg'),
(79, 34, 'Rainy', 'IMG_5d5adce56210c.jpg'),
(80, 34, 'Autumn', 'IMG_5d5add34a5dd9.jpg'),
(81, 38, 'Tea', 'IMG_5d5addbc99e4d.jpg'),
(82, 38, 'Coffee', 'IMG_5d5ade1d03476.jpg'),
(83, 38, 'Juice', 'IMG_5d5ade5fc3735.jpg'),
(84, 38, 'Milk', 'IMG_5d5ade9dabed2.jpg'),
(85, 38, 'Alcohol', 'IMG_5d5adee04581e.jpg'),
(86, 38, 'Water', 'IMG_5d5adf0f73646.jpg'),
(87, 39, 'Cold Coffee', 'IMG_5d5adfb11dc4b.jpg'),
(88, 39, 'Tea', 'IMG_5d5adfc4a96ff.jpg'),
(89, 39, 'Hot coffee', 'IMG_5d5adfd9b4f38.jpg'),
(90, 39, 'Cold Drink', 'IMG_5d5ae01a32a27.jpg'),
(91, 43, 'Selfie', 'IMG_5d5ae0a2ba037.jpg'),
(92, 43, 'Pose', 'IMG_5d5ae0fc456ef.jpg'),
(93, 48, 'Single', 'IMG_5d5b7203ddcc7.jpg'),
(94, 48, 'Committed', 'IMG_5d5b726bdf492.jpg'),
(95, 48, 'Married', 'IMG_5d5b72ea71f1c.jpg'),
(96, 48, 'One sided', 'IMG_5d5b73834956f.jpg'),
(97, 28, 'Football', 'IMG_5d5b741db3390.jpg'),
(98, 28, 'Cricket', 'IMG_5d5b745cdc193.jpg'),
(99, 28, 'Hockey', 'IMG_5d5b749f4c9e8.jpg'),
(100, 28, 'Tennis', 'IMG_5d5b750b5e03b.jpg'),
(101, 36, 'Horror', 'IMG_5d5b7587c3537.jpg'),
(102, 36, 'Action', 'IMG_5d5b75e4170ca.jpg'),
(103, 36, 'Comedy', 'IMG_5d5b765ed0e8b.jpg'),
(104, 36, 'Romantic', 'IMG_5d5b76db882b0.jpg'),
(105, 31, 'Rock', 'IMG_5d5b77553cf7d.jpg'),
(106, 31, 'Heavy Metal', 'IMG_5d5b77a0cccec.jpg'),
(107, 31, 'Hip Hop', 'IMG_5d5b780094a8c.jpg'),
(108, 31, 'Folk', 'IMG_5d5b7863e70a0.jpg'),
(109, 31, 'Pop', 'IMG_5d5b78beed241.jpg'),
(110, 30, 'Cat', 'IMG_5d5b7ac15b9f8.jpg'),
(111, 30, 'Dog', 'IMG_5d5b7b08cde81.jpg'),
(112, 30, 'Neither', 'IMG_5d5b7b7b1e98e.jpg'),
(113, 29, 'Beach', 'IMG_5d5b7bded55cd.jpg'),
(114, 29, 'Mountain', 'IMG_5d5b7c165ae9b.jpg'),
(115, 19, 'Simple Marriage', 'IMG_5d5b7de5555a7.jpg'),
(116, 19, 'Registry marriage', 'IMG_5d5b7e6b87d1b.jpg'),
(117, 19, 'At Mandir', 'IMG_5d5b7f43d80ff.jpg'),
(118, 45, 'WhatsApp', 'IMG_5d5cea8099fb6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

DROP TABLE IF EXISTS `challenge`;
CREATE TABLE IF NOT EXISTS `challenge` (
  `c_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quiz_uid` varchar(255) NOT NULL,
  `c_score` int(11) NOT NULL,
  `c_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `challenge` (`quiz_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `q_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `q_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `q_ctitle` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `q_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_title`, `q_ctitle`, `q_status`) VALUES
(13, 'Have you ever sent an inappropriate text to your mom or dad by accident?', '', 1),
(14, 'What is one thing/activity that makes you relax?', '', 1),
(15, 'What is something you look forward to doing when you retire?', '', 1),
(16, 'What is one thing you are always losing?', '', 1),
(17, 'Have you ever lied about being sick so you could stay home from work or school?', '', 1),
(18, 'What is the one thing you dislike about yourself?', '', 1),
(19, 'Which type of wedding do you like?', '', 1),
(20, 'Have you ever cheated on a test?', '', 1),
(21, 'What was your favorite childhood television show?', '', 1),
(22, 'Where is your favorite vacation spot?', '', 1),
(23, 'What is your favorite thing to do with your leisure time?', '', 1),
(24, 'What was your favorite subject in school?', '', 1),
(25, 'What is one job you would never want to do?', '', 1),
(26, 'What is your favorite ice cream flavor?', '', 1),
(27, 'What is your favorite food?', '', 0),
(28, 'What is your favorite sport?', '', 1),
(29, 'Do you prefer the beach or the mountains?', '', 1),
(30, 'Do you prefer cats, dogs, or neither?', '', 1),
(31, 'What is your favorite music genre?', '', 1),
(32, 'What is your favorite vegetable?', '', 0),
(33, 'What is your favorite fruit?', '', 0),
(34, 'What season is your favorite?', '', 1),
(35, 'What is more important to you?', '', 1),
(36, 'What your favorite movie genre?', '', 1),
(37, 'Do you like veg or non-veg?', '', 1),
(38, 'What is your favorite drink?', '', 1),
(39, 'Which one you drink most?', '', 1),
(40, 'If you get an opportunity for an adventurous journey, who would you prefer?', '', 1),
(41, 'Which type of shopping do you like?', '', 1),
(42, 'What did you wanted to be when you were a kid?', '', 1),
(43, 'How do you like to click pictures?', '', 1),
(44, 'Do have rings in hands?', '', 1),
(45, 'What do you use the most?', '', 1),
(46, 'Which of these describe your character?', '', 1),
(47, 'Do you wear glasses?', '', 1),
(48, 'Which life is best?', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quiz_uid` varchar(255) NOT NULL,
  `quiz_performer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quiz_data` text NOT NULL,
  `quiz_view` bigint(20) NOT NULL,
  `quiz_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`quiz_id`),
  UNIQUE KEY `quiz_uid` (`quiz_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_short_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_wishing_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_og_image` varchar(255) NOT NULL,
  `site_user_can_del` int(11) NOT NULL DEFAULT '0',
  `site_about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_privacy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_custom_header` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_custom_footer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_ad_ver` text NOT NULL,
  `site_ad_100` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `site_title`, `site_short_title`, `site_wishing_web`, `site_description`, `site_og_image`, `site_user_can_del`, `site_about`, `site_privacy`, `site_contact`, `site_custom_header`, `site_custom_footer`, `site_ad_ver`, `site_ad_100`) VALUES
(1, 'Dare Quiz 2019', 'Dare Quiz', '', 'has sent you Super Dare of 2019 👸🤴. Take this Challenge NOW 🤯👇👇👇👇🤯', 'IMG_5d5e3cbc9e2fc.jpg', 1, 'These types of games are a great hit on Whatsapp. It is a real fun and its craze can be seen on WhatsApp. It is the best way by which you can judge a person’s character. Every dare message has options whose answers are known to you beforehand. You can send this dare message to your friends and ask them to choose one option. After they choose one option, just send them answers and your friend has to do accordingly.', '<p>At %WEBSITE%, accessible from %WEBURL%, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by %WEBSITE% and how we use it.</p><h3>Log Files</h3><p>	%WEBSITE% follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p><h3>Cookies and Web Beacons</h3><p>	Like any other website, %WEBSITE% uses \'cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.</p><h3>Google DoubleClick DART Cookie</h3><p>	Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL ', 'If you have any query regarding ideas or suggestions please email us at youremail@gmail.com', '', '', '<script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script> <!-- dare-ad1-ver --> <ins class=\"adsbygoogle\"      style=\"display:block\"      data-ad-client=\"ca-pub-6886192576567563\"      data-ad-slot=\"5983467611\"      data-ad-format=\"auto\"      data-full-width-responsive=\"true\"></ins> <script>      (adsbygoogle = window.adsbygoogle || []).push({}); </script>', '<script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script> <!-- dare-ad2-320 --> <ins class=\"adsbygoogle\"      style=\"display:inline-block;width:320px;height:100px\"      data-ad-client=\"ca-pub-6886192576567563\"      data-ad-slot=\"3441898906\"></ins> <script>      (adsbygoogle = window.adsbygoogle || []).push({}); </script>');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenge`
--
ALTER TABLE `challenge`
  ADD CONSTRAINT `challenge_ibfk_1` FOREIGN KEY (`quiz_uid`) REFERENCES `quiz` (`quiz_uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
