-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 05, 2019 at 03:08 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey_answers`
--

CREATE TABLE `survey_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey_answers`
--

INSERT INTO `survey_answers` (`id`, `question_id`, `answer`) VALUES
(1, 1, 'alicorn'),
(2, 4, 'luna'),
(3, 6, 'SCW'),
(4, 7, 'opal'),
(5, 10, 'QSX'),
(6, 1, 'alicorn'),
(7, 4, 'luna'),
(8, 6, 'SCW'),
(9, 7, 'opal'),
(10, 10, 'QSX');

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `type` varchar(11) NOT NULL,
  `answers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`id`, `question`, `type`, `answers`) VALUES
(1, 'What\'s your favorite pony type?\r\n', 'mc', 'Alicorn,Earth Pony,Pegasus,Unicorn,Sea Pony,Zebra'),
(4, 'Who\'s your favorite princess?', 'mc', 'Luna,Celestia,Cadance,Twilight'),
(6, 'Which character do you want to see more of?', 'text', ''),
(7, 'Who\'s your favorite pet?', 'mc', 'Opal,Owloysius,Angel,Tank,Gummy,Winona'),
(10, 'What\'s your favorite MLP fanfic?', 'text', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey_answers`
--
ALTER TABLE `survey_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey_answers`
--
ALTER TABLE `survey_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
