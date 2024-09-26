-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 05:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviebookingwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `movie_name` varchar(200) DEFAULT NULL,
  `movie_date` varchar(100) DEFAULT NULL,
  `movie_time` varchar(100) DEFAULT NULL,
  `reserved_seats` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `movie_name`, `movie_date`, `movie_time`, `reserved_seats`) VALUES
(7, 'KILLERS OF THE FLOWER MOON', '2023-10-03', '10:00 AM', 'B8,C10'),
(24, 'PAW PATROL', '2023-10-01', '10:00 AM', 'A1,A2,A3'),
(25, 'PAW PATROL', '2023-10-01', '', 'A5,B5,C5,D5'),
(26, 'PAW PATROL', '2023-10-01', '10:00 AM', 'B4,B5,C4,C5,D5'),
(27, 'PAW PATROL', '<br />\r\n<b>Warning</b>:  Undefined array key ', '10:00 AM', 'A5'),
(28, 'PAW PATROL', '2023-10-01', '10:00 AM', 'A5'),
(29, 'PAW PATROL', '2023-10-02', '07:00 PM', 'A6,A7,E10'),
(30, 'KILLERS OF THE FLOWER MOON', '2023-10-02', '10:00 AM', 'A6,A7'),
(31, 'PAW PATROL', '2023-10-01', '10:00 AM', 'A4'),
(32, 'PAW PATROL', '2023-10-02', '07:00 PM', 'A8');

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `cast_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `main_actor` varchar(200) NOT NULL,
  `main_character` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`cast_id`, `movie_id`, `main_actor`, `main_character`) VALUES
(1, 1, 'Brice Gonzalez', 'Tot'),
(2, 1, 'Kim Kardashian', 'Delores'),
(3, 1, 'Will Brisbin', 'Ryder'),
(4, 1, 'Mckenna Grace', 'Skye'),
(5, 1, 'Lilly Bartlam', 'Skye'),
(6, 1, 'Taraji P. Henson', 'Victoria Vance'),
(7, 2, 'Cillian Murphy', 'J. Robert Oppenheimer'),
(8, 2, 'Florence Pugh', 'Jean Tatlock'),
(9, 2, 'Robert Downey', 'Lewis Strauss'),
(10, 2, 'Emily Blunt', 'Kitty Oppenheimer'),
(11, 2, 'Matt Damon', 'Gen. Leslie Groves'),
(12, 2, 'Rami Malek', 'David L. Hill'),
(13, 3, 'Camila Cabello', 'Viva'),
(14, 3, 'Justin Timberlake', 'Branch'),
(15, 3, 'Anna Kendrick', 'Poppy'),
(16, 3, 'Troye Sivan', 'Floyd'),
(17, 3, 'RuPaul', 'Miss Maxine'),
(18, 3, 'Walt Dohrn', 'Cloud Guy'),
(19, 4, 'Leonardo DiCaprio', 'Ernest Burkhart'),
(20, 4, 'Lily Gladstone', 'Mollie Burkhart'),
(21, 4, 'Jesse Plemons', 'Tom White'),
(22, 4, 'Robert De Niro', 'William Hale'),
(23, 4, 'Brendan Fraser', 'W. S. Hamilton'),
(24, 4, 'Louis Cancelmi', 'Kelsie Morrison'),
(25, 5, 'Park Seo-joon', 'Yan D\' Aladna'),
(26, 5, 'Brie Larson', 'Carol Danvers'),
(27, 5, 'Iman Vellani', 'Ms Marvel'),
(28, 5, 'Teyonah Parris', 'Monica Rambeau'),
(29, 5, 'Zawe Ashton', 'Dar-Benn'),
(30, 5, 'Gemma Chan', 'Minn-Erva');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `movie_id`, `genre`) VALUES
(1, 1, 'Animation'),
(2, 1, 'Action'),
(3, 1, 'Adventure'),
(4, 2, 'Biography'),
(5, 2, 'Drama'),
(6, 2, 'History'),
(7, 3, 'Animation'),
(8, 3, 'Adventure'),
(9, 3, 'Comedy'),
(10, 4, 'Crime'),
(11, 4, 'Drama'),
(12, 4, 'History'),
(13, 5, 'Action'),
(14, 5, 'Adventure'),
(15, 5, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(50) DEFAULT NULL,
  `movie_image` varchar(200) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `cast` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_image`, `description`, `cast`) VALUES
(1, 'PAW PATROL', 'moviesmallimages/pawpatrol.png', 'The PAW Patrol pups magically gain superpowers after a meteor strikes Adventure City. However, things take a turn for the worse when Humdinger and a mad scientist steal their powers and turn themselves into supervillains. As the team springs into action to save the city, Skye soon learns that even the smallest pup can make the biggest difference.', 'Iain Armitage as Chase, Marsai Martin as Liberty, Ron Pardo as Mayor Humdinger, Will Brisbin as Ryder, Keegan Hedley as Rubble, Yara Shahidi as Kendra Wilson, Kim Kardashian as Delores, Randall Park as Gus, Dax Shepard as Cale, Tyler Perry as Gus\'s Trash Truck, Jimmy Kimmel as Marty Muckraker.'),
(2, 'OPPENHEIMER', 'moviesmallimages/oppenheimer.png', 'During World War II, Lt. Gen. Leslie Groves Jr. appoints physicist J. Robert Oppenheimer to work on the top-secret Manhattan Project. Oppenheimer and a team of scientists spend years developing and designing the atomic bomb. Their work comes to fruition on July 16, 1945, as they witness the world\'s first nuclear explosion, forever changing the course of history.', 'Cillian Murphy, Florence Pugh, Robert Downey Jr., Emily Blut, Matt Damon, Gary Oldman, Jack Quiad, Devon Bostick, Rami Malek, Josh Hartnett, Josh Peck, Casey Affleck, Matthias Schweighofer, David Dstmalchian, Tom Conti.'),
(3, 'TROLLS BAND TOGETHER', 'moviesmallimages/trolls.png', 'Poppy discovers that Branch and his four brothers were once part of her favorite boy band. When one of his siblings, Floyd, gets kidnapped by a pair of nefarious villains, Branch and Poppy embark on a harrowing and emotional journey to reunite the other brothers and rescue Floyd from a fate even worse than pop culture obscurity.', 'Anna Kendrick., Justin Timberlake., Camila Cabello., Eric André, Amy Schumer., Andrew Rannells., Troye Sivan., Daveed Diggs, Kid Cudi, Zosia Mamet, Zooey Deschanel, Christoper Mintz, RuPaul Charles, Aino Jawo, Caroline Hjelt, Kenan Thompson.'),
(4, 'KILLERS OF THE FLOWER MOON', 'moviesmallimages/killersoftheflowermoon.png', 'Based on David Grann\'s broadly lauded best-selling book, \"Killers of the Flower Moon\" is set in 1920s Oklahoma and depicts the serial murder of members of the oil-wealthy Osage Nation, a string of brutal crimes that came to be known as the Reign of Terror.', 'Leonardo DiCaprio, Martin ScorsesE, Lily Gladstone, Jesse Plemons, Robert De Niro, Brendan Fraser, Louis Cancelmi, Laryy Sellers, Sturgill Simpson, Jason Isbell, Jack White, John Lithgow, Tatanks Means, Janae Collins, Tantoo Cardinal'),
(5, 'THE MARVELS', 'moviesmallimages/the marvels.png', 'Carol Danvers, aka Captain Marvel, has reclaimed her identity from the tyrannical Kree and taken revenge on the Supreme Intelligence. However, unintended consequences see her shouldering the burden of a destabilized universe. When her duties send her to an anomalous wormhole linked to a Kree revolutionary, her powers become entangled with two other superheroes to form the Marvels.', 'Park Seo joon, Brie Larson, Iman Vellani, Teyonah Parris, Zawe Ashton, Mckenna Grace, Lashana Lynch, Gemma Chan, Samuel Jackson, Ben Mendelsohn, Jude Law, Cobie Smulders, Mohan Kapoor, Randall Park, Shamier Anderson, Tony McCarthy.');

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `show_time_id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `movie_name` varchar(200) NOT NULL,
  `start_time` varchar(200) NOT NULL,
  `movie_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`show_time_id`, `movie_id`, `movie_name`, `start_time`, `movie_date`) VALUES
(1, 1, 'PAW PATROL', '10:00 AM', '2023-10-01'),
(2, 1, 'PAW PATROL', '04:00 PM', '2023-10-01'),
(3, 2, 'OPPENHEIMER', '02:00 PM', '2023-10-01'),
(4, 3, 'TROLLS BAND TOGETHER', '07:00 PM', '2023-10-01'),
(5, 4, 'KILLERS OF THE FLOWER MOON', '10:00 AM', '2023-10-02'),
(6, 5, 'THE MARVELS', '04:00 PM', '2023-10-02'),
(7, 2, 'OPPENHEIMER', '02:00 PM', '2023-10-02'),
(8, 1, 'PAW PATROL', '07:00 PM', '2023-10-02'),
(9, 4, 'KILLERS OF THE FLOWER MOON', '10:00 AM', '2023-10-03'),
(10, 5, 'THE MARVELS', '04:00 PM', '2023-10-03'),
(11, 2, 'OPPENHEIMER', '02:00 PM', '2023-10-03'),
(12, 3, 'TROLLS BAND TOGETHER', '07:00 PM', '2023-10-03'),
(13, 3, 'TROLLS BAND TOGETHER', '10:00 AM', '2023-10-04'),
(14, 5, 'THE MARVELS', '04:00 PM', '2023-10-04'),
(15, 2, 'OPPENHEIMER', '02:00 PM', '2023-10-04'),
(16, 1, 'PAW PATROL', '07:00 PM', '2023-10-04'),
(17, 4, 'KILLERS OF THE FLOWER MOON', '10:00 AM', '2023-10-05'),
(18, 5, 'THE MARVELS', '04:00 PM', '2023-10-05'),
(19, 1, 'PAW PATROL', '02:00 PM', '2023-10-05'),
(20, 3, 'TROLLS BAND TOGETHER', '07:00 PM', '2023-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `director` varchar(200) NOT NULL,
  `producer` varchar(200) NOT NULL,
  `writer` varchar(200) NOT NULL,
  `music` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `movie_id`, `director`, `producer`, `writer`, `music`) VALUES
(1, 1, 'Cal Brunker', 'Spin Master Entertainment', 'Bob Barlen', 'Pinar Toprak'),
(2, 2, 'Christopher Nolan', 'Thomas Hayslip', 'Christopher Nolan', 'Ludwig Göransson'),
(3, 3, 'Walt Dohrn, Tim Heitz', 'Dannie Festa', 'Jonathan Aibel, Glenn Berger', 'Theodore Shapiro'),
(4, 4, 'Martin Scorsese', 'John Atwood', 'Martin Scorsese, Eric Roth, David Grann', 'Robbie Robertson'),
(5, 5, 'Nia DaCosta', 'Victoria Alonso', 'Nia DaCosta, Megan McDonnell', 'Laura Karpman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`cast_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`show_time_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `cast_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cast`
--
ALTER TABLE `cast`
  ADD CONSTRAINT `cast_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `genres`
--
ALTER TABLE `genres`
  ADD CONSTRAINT `genres_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
