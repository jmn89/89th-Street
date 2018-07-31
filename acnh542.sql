-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 08:39 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acnh542`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Tele` varchar(30) DEFAULT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10031 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Name`, `Email`, `Address`, `Tele`, `Username`, `Password`) VALUES
(10001, 'Alan Baine', 'ab@email.com', '1 Parksy Road, E1 1AB', '01332 246893', 'abaines', '6e6fdf956d04289354dcf1619e28fe77'),
(10002, 'Barry Cole', 'bc@email.com', '2 Newe Street, W2 2BC', NULL, 'bcole', '6d5779b9b85bd4f11e44c9772e0de602'),
(10003, 'Carol Daly', 'cd@email.com', '2 Newe Street, W2 2BC', '07973456789', 'cdaly', 'de1774aac52706b13a39a08ad3ca7dfe'),
(10004, 'Dean Errol', 'de@email.com', '4 Olde Street, S4 4DE', '0121432789', 'derrol', '94406f55920a2c6a7c9b68e4bbe41fb8'),
(10005, 'Emily Fain', 'ef@email.com', '5 Trowel Road, E5 5EF', '07893789345', 'efain', '5802b867241e0c83cbda61ec986dea0d'),
(10030, 'admin', 'admin@89thstreet.com', NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Manuf` varchar(50) NOT NULL,
  `Category` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Description` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Category` (`Category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10030 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Manuf`, `Category`, `Price`, `Image`, `Description`) VALUES
(10001, 'Studio One 3', 'Presonus', 1, '249.99', 'https://tinyurl.com/ybadwe25', 'Instantly familiar - yet nothing feels like it. Studio One 3 contains everything you''d expect from a modern digital audio powerhouse. Once you touch its fast, flow-oriented, drag-and-drop interface, you''ll realize Studio One 3 was built by creative people for creative music production.'),
(10002, 'Pro Tools 2018', 'Avid', 1, '499.99', 'https://tinyurl.com/ybwy263x', 'Introducing Pro Tools 2018, the latest version that comes packed with new features that enable you to work smarter, faster, and create at the speed of inspiration. With the launch of Pro Tools 2018 comes numerous new MIDI editing enhancements, including with retrospective MIDI recording, the ability to save your favorite effects chains and instruments sounds as track presets and improved mixing UI enhancements.'),
(10003, 'Cubase', 'Steinberg', 1, '299.99', 'https://tinyurl.com/yd8vaalq', 'With millions of musicians, producers and sound engineers around the world using Cubase every day, Cubase is one of the most popular digital audio workstations of our time. Due to its pristine sound quality, intuitive handling and unrivaled range of advanced tools, Cubase is not only considered by many users as the most complete DAW on the market today, but also sets the benchmark for contemporary music production software.'),
(10004, 'Logic Pro X', 'Apple', 1, '149.99', 'https://tinyurl.com/ydxp6cuy', 'Logic Pro X is Apples flagship recording studio software that offers an extensive sound library, a good mix of plug-ins and a high level of product support. Logic Pro is an affordable digital audio workstation that comes with the same features and sounds as more expensive models.'),
(10005, 'Sonar', 'Cakewalk', 1, '219.99', 'https://tinyurl.com/yax427r5', 'The creative experience only SONAR offers: advanced technology, effortless workflow, and an interface that amplifies inspiration. Whether you''re a songwriter, producer, or composer, SONAR has the instruments you need to build your production from the ground up.'),
(10006, 'Reaper', 'Reaper', 1, '99.99', 'https://tinyurl.com/yderwwo9', 'REAPERs full, flexible feature set and renowned stability have found a home wherever digital audio is used: commercial and home studios, broadcast, location recording, education, science and research, sound design, game development, and more. From mission-critical professional environments to students laptops, there is a single version of REAPER, fully featured with no artificial limitations.'),
(10007, 'Reason', 'Propellerhead', 1, '129.99', 'https://tinyurl.com/yavtr6gw', 'Reason is easy to get started with, yet as deep as you want it to be. Create, compose, mix and finish your music - Reason will help you along the journey, from inspiration to mixdown.'),
(10008, 'FL Studio 12', 'Image-Line', 1, '89.99', 'https://tinyurl.com/y97odzlr', 'FL Studio 12 is a complete software music production environment or Digital Audio Workstation (DAW). Representing more than 18 years of innovative developments it has everything you need in one package to compose, arrange, record, edit, mix and master professional quality music. FL Studio is now one of the world''s most popular DAWs and is used by the most creative artists.'),
(10009, '576 Blue Stripe', 'IGS', 2, '454.99', 'https://tinyurl.com/ycj2o8j3', 'The FET-type solution was first used for its application in the legendary UREI 1176 compressor from the 70s. The most important feature inspired by revision A is the input transformer used and pure class A output stage. The compressor is equipped with a relay bypass, 2:1 Ratio and Slam Mode accessible on the front panel.'),
(10010, '500 EQ', 'Ocean Audio', 2, '699.99', 'https://tinyurl.com/ybskkpd2', 'Some of the highlights of the 500 EQ one include classic EQ design, 4-band sweep EQ, high and low ranges switchable to peak or shelf, overlapping frequencies, balanced input and output and hand-crafted by Ocean Audio.'),
(10011, '535 Diode', 'Rupert Neve', 2, '379.99', 'https://tinyurl.com/ycxp5mj4', 'Punchy, thick and versatile, the 535 Diode Bridge Compressor captures the soul of Rupert Neve''s original 2254 compressor while providing modern updates including advanced timing control, significantly lower noise, fully stepped controls throughout, and internal parallel processing capabilities.'),
(10012, '80B EQ', 'Trident', 2, '299.99', 'https://tinyurl.com/yd6kmkjj', 'The Series 80B 500 Series EQ incorporates a classic four band equaliser which is identical to that employed in the Trident Series 80 console. It consists of frequency switchable high and low pass shelving sections, coupled with two swept low and high mid range bands and a switchable 50Hz, 12dB per octave filter.'),
(10013, '502 Preamp', 'Midas', 2, '849.99', 'https://tinyurl.com/yde6bqop', 'When used in conjunction with the LEGEND L10 or L6 500 Series Rackmount Chassis, the MICROPHONE PREAMPLIFIER 502 provides the ideal solution for users seeking the legendary MIDAS sound in a modular format that boasts upgraded, premium-quality performance.'),
(10014, 'Action 500', 'Purple Audio', 2, '329.99', 'https://tinyurl.com/y8jo3u5u', 'The Action by Purple Audio features a constant impedance 600 ohm input attenuator feeding the input transformer. This makes the input more resistant to overload by hot signals. After the input transformer, the signal is attenuated by the same gain reduction FET as in the MC77. The attenuated signal is buffered by our class A KDJ3 opamp, which feeds the output fader.'),
(10015, 'CP5 Pre', 'Big Bear Audio', 2, '359.99', 'https://tinyurl.com/ycddke5a', 'Fully compatible with the 500-series format. Stepped controls (21 positions) for easy recall and stereo operation. Anodized aluminium knobs and front panel. Phantom power, polarity, -20dB pad, and Colour switches. Mic preamp gain adjustable from +20-66dB. Ultra-transparent, low-noise preamp.'),
(10016, 'E-Series Dyn', 'SSL', 2, '824.99', 'https://tinyurl.com/yd98eo5e', 'The superb SSL 4000 E-Series VCA channel Dynamics with its unique sonic signature in a 500 Format Module. Feature packed Compressor, Expander/Gate processing with added flavour.'),
(10017, 'Maschine MK3', 'Native Instruments', 3, '249.99', 'https://tinyurl.com/yd72r9tw', 'The new MASCHINE takes the classic groovebox workflow and makes it faster and more intuitive. Optimized based on customer research, it''s packed with new features to boost your speed and increase your focus - all without breaking the workflow you love.'),
(10018, 'Kontrol S49', 'Native Instruments', 3, '449.99', 'https://tinyurl.com/ycqeytqb', 'With the latest generation of KONTROL, music-making becomes a more intuitive, hands-on experience. Perform expressively, browse and preview sounds, tweak parameters, sketch your ideas, then navigate and mix your project - all from one fully integrated centerpiece for studio and stage.'),
(10019, 'BCR2000', 'Behringer', 3, '199.99', 'https://tinyurl.com/yceltmky', 'The total-recall B-CONTROL BCR2000 USB/MIDI Controller combines the unlimited versatility of today''s audio software with the feel of real handson controls. With the BCR2000 you can move real high-resolution encoders to control many popular DAWs.'),
(10020, 'Launchpad Pro', 'Novation', 3, '89.99', 'https://tinyurl.com/y9xxkfbx', 'Launchpad Pro is the simplest and best way to create dynamic, expressive performances in Ableton Live, or any music software. The iconic Launchpad has been given a total overhaul. Enhanced with RGB LED feedback, and velocity and pressure-sensitive pads, Launchpad Pro brings limitless expression and creativity to your music.'),
(10021, 'QCon Pro', 'Icon', 3, '299.99', 'https://tinyurl.com/y9vufcbb', 'Elevate your recordings with the Icon QCon Pro control surface with motorized faders. Rather than using a keyboard and mouse, the QCon Pro offers tactile control over the most essential functions of your DAW including navigation, transport, track level, plugin parameters, recording, editing, automation, and more.'),
(10022, 'V-Mini', 'Alesis', 3, '49.99', 'https://tinyurl.com/ybghmv3j', 'The Alesis V Mini is a powerful, intuitive, and portable MIDI controller that lets you take full command of your music software. With 25 mini-size velocity-sensitive keys and Octave Up/Down buttons, you can expand the keyboard to the full melodic range and play bass lines, chords, and melodies.'),
(10023, 'LPD8', 'Akai', 3, '219.99', 'https://tinyurl.com/y9xe3e87', 'The LPD8s six UI buttons and eight assignable slim-design pots deliver a truly versatile range of performance and control options.'),
(10024, 'Advance 49', 'Akai', 3, '120.99', 'https://tinyurl.com/y9loy2ka', 'The Akai Advance Keyboard offers a unified plug-in experience giving you direct control of all your VST instruments. Seamlessly auto map all of your VST instruments in one place whilst VIP librarian software keeps all of your presets categorised. The software gives Advance Keyboard users access to any virtual instrument in their collection.');

-- --------------------------------------------------------

--
-- Table structure for table `products_Categories`
--

CREATE TABLE IF NOT EXISTS `products_Categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products_Categories`
--

INSERT INTO `products_Categories` (`ID`, `Name`) VALUES
(1, 'DAWs'),
(2, 'Outboard'),
(3, 'MIDI');

-- --------------------------------------------------------

--
-- Table structure for table `reviews542`
--

CREATE TABLE IF NOT EXISTS `reviews542` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `ProductID` int(5) NOT NULL,
  `Rating` int(1) DEFAULT NULL,
  `Review` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `reviews542`
--

INSERT INTO `reviews542` (`ID`, `Name`, `Location`, `ProductID`, `Rating`, `Review`) VALUES
(1, 'Gary', 'London', 10001, 5, 'Absolutely love it! Great product!'),
(2, 'Lauren', 'Manchester', 10001, 3, 'Awesome piece of gear, but I think the price is maybe a little too steep'),
(3, 'Steve', 'Liverpool', 10002, 4, 'Cant get enough of this - super fun!'),
(4, 'Freya', 'Scotland', 10002, 3, 'Good price and decent ease of use!'),
(5, 'Josh', 'Hackney', 10003, 5, 'Best piece of gear I have bought in a long while! A+!'),
(6, 'Lauren', 'Manchester', 10003, 4, 'So fun! So easy!'),
(7, 'Steve', 'Yorkshire', 10004, 4, 'Really enjoying this beauty'),
(8, 'Freya', 'Derby', 10004, 1, 'Too steep a learning curve; not a fan!'),
(9, 'Gary', 'London', 10005, 5, 'Absolutely love it! Great product!'),
(10, 'Lauren', 'Manchester', 10005, 3, 'Awesome piece of gear, but I think the price is maybe a little too steep'),
(11, 'Steve', 'Liverpool', 10006, 4, 'Cant get enough of this - super fun!'),
(12, 'Freya', 'Scotland', 10006, 3, 'Good price and decent ease of use!'),
(13, 'Josh', 'Hackney', 10007, 5, 'Best piece of gear I have bought in a long while! A+!'),
(14, 'Lauren', 'Manchester', 10007, 4, 'So fun! So easy!'),
(15, 'Steve', 'Yorkshire', 10008, 4, 'Really enjoying this beauty'),
(16, 'Freya', 'Derby', 10008, 1, 'Too steep a learning curve; not a fan!'),
(17, 'Gary', 'London', 10009, 5, 'Absolutely love it! Great product!'),
(18, 'Lauren', 'Manchester', 10009, 3, 'Awesome piece of gear, but I think the price is maybe a little too steep'),
(19, 'Steve', 'Liverpool', 10010, 4, 'Cant get enough of this - super fun!'),
(20, 'Freya', 'Scotland', 10010, 3, 'Good price and decent ease of use!'),
(21, 'Josh', 'Hackney', 10011, 5, 'Best piece of gear I have bought in a long while! A+!'),
(22, 'Lauren', 'Manchester', 10011, 4, 'So fun! So easy!'),
(23, 'Steve', 'Yorkshire', 10012, 4, 'Really enjoying this beauty'),
(24, 'Freya', 'Derby', 10012, 1, 'Too steep a learning curve; not a fan!'),
(25, 'Gary', 'London', 10013, 5, 'Absolutely love it! Great product!'),
(26, 'Lauren', 'Manchester', 10013, 3, 'Awesome piece of gear, but I think the price is maybe a little too steep'),
(27, 'Steve', 'Liverpool', 10014, 4, 'Cant get enough of this - super fun!'),
(28, 'Freya', 'Scotland', 10014, 3, 'Good price and decent ease of use!'),
(29, 'Josh', 'Hackney', 10015, 5, 'Best piece of gear I have bought in a long while! A+!'),
(30, 'Lauren', 'Manchester', 10015, 4, 'So fun! So easy!'),
(31, 'Steve', 'Yorkshire', 10016, 4, 'Really enjoying this beauty'),
(32, 'Freya', 'Derby', 10016, 1, 'Too steep a learning curve; not a fan!'),
(33, 'Gary', 'London', 10017, 5, 'Absolutely love it! Great product!'),
(34, 'Lauren', 'Manchester', 10017, 3, 'Awesome piece of gear, but I think the price is maybe a little too steep'),
(35, 'Steve', 'Liverpool', 10018, 4, 'Cant get enough of this - super fun!'),
(36, 'Freya', 'Scotland', 10018, 3, 'Good price and decent ease of use!'),
(37, 'Josh', 'Hackney', 10019, 5, 'Best piece of gear I have bought in a long while! A+!'),
(38, 'Lauren', 'Manchester', 10019, 4, 'So fun! So easy!'),
(39, 'Steve', 'Yorkshire', 10020, 4, 'Really enjoying this beauty'),
(40, 'Freya', 'Derby', 10020, 1, 'Too steep a learning curve; not a fan!'),
(41, 'Gary', 'London', 10021, 5, 'Absolutely love it! Great product!'),
(42, 'Lauren', 'Manchester', 10021, 3, 'Awesome piece of gear, but I think the price is maybe a little too steep'),
(43, 'Steve', 'Liverpool', 10022, 4, 'Cant get enough of this - super fun!'),
(44, 'Freya', 'Scotland', 10022, 3, 'Good price and decent ease of use!'),
(45, 'Josh', 'Hackney', 10023, 5, 'Best piece of gear I have bought in a long while! A+!'),
(46, 'Lauren', 'Manchester', 10023, 4, 'So fun! So easy!'),
(47, 'Steve', 'Yorkshire', 10024, 4, 'Really enjoying this beauty'),
(48, 'Freya', 'Derby', 10024, 1, 'Too steep a learning curve; not a fan!');

-- --------------------------------------------------------

--
-- Table structure for table `sales542`
--

CREATE TABLE IF NOT EXISTS `sales542` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Customer_ID` int(11) NOT NULL,
  `DateOfSale` datetime NOT NULL,
  `Product_ID` int(5) NOT NULL,
  `Quantity` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Product_ID` (`Product_ID`),
  KEY `Customer_ID` (`Customer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10018 ;

--
-- Dumping data for table `sales542`
--

INSERT INTO `sales542` (`ID`, `Customer_ID`, `DateOfSale`, `Product_ID`, `Quantity`) VALUES
(10001, 10002, '2018-03-14 18:43:02', 10010, 1),
(10002, 10001, '2018-03-18 18:43:02', 10004, 2),
(10003, 10001, '2018-03-20 18:43:02', 10023, 1),
(10004, 10004, '2018-03-22 18:43:02', 10019, 3),
(10005, 10003, '2018-03-28 18:43:02', 10011, 1),
(10014, 10005, '2018-04-06 02:23:17', 10017, 1),
(10015, 10005, '2018-04-06 02:23:17', 10001, 1),
(10016, 10005, '2018-04-06 02:24:18', 10005, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `products_Categories` (`ID`);

--
-- Constraints for table `reviews542`
--
ALTER TABLE `reviews542`
  ADD CONSTRAINT `reviews542_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`);

--
-- Constraints for table `sales542`
--
ALTER TABLE `sales542`
  ADD CONSTRAINT `sales542_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `sales542_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
