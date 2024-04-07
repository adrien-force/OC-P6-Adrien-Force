-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 07, 2024 at 07:59 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TomTroc`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author` varchar(64) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `owner_id` int(64) NOT NULL,
  `availability` varchar(64) NOT NULL DEFAULT 'disponible',
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `description`, `owner_id`, `availability`, `picture`) VALUES
(3, 'Eragon', 'Christopher Paolini', 'In this epic fantasy novel, readers are whisked away to the mystical world of Alagaësia, where dragons soar the skies and magic pulses through the land. Eragon, a young farm boy, discovers a mysterious blue stone that turns out to be a dragon egg. His life takes an unexpected turn as he becomes a Dragon Rider, embarking on a journey filled with adventure, danger, and self-discovery. With rich world-building, intricate plot twists, and memorable characters, \"Eragon\" is a captivating tale that will enchant readers of all ages.', 1, 'disponible', 'ressources/assets/dummyDataAssets/eragon.jpg'),
(4, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 'The fourth installment in the beloved Harry Potter series takes readers deeper into the wizarding world as Harry navigates the challenges of the Triwizard Tournament. Alongside his friends Ron and Hermione, Harry faces thrilling tasks, dark forces, and the emergence of Voldemort\'s return. With Rowling\'s trademark wit, intricate plot development, and the exploration of themes like friendship, courage, and sacrifice, \"Harry Potter and the Goblet of Fire\" is a spellbinding adventure that continues to captivate readers worldwide.', 1, 'disponible', 'ressources/assets/dummyDataAssets/harrypotter.jpg'),
(5, 'To Kill a Mockingbird', 'Harper Lee', 'Set in the racially-charged atmosphere of 1930s Alabama, \"To Kill a Mockingbird\" follows the moral journey of young Scout Finch as she learns about empathy, justice, and the complexities of human nature. Through the lens of Scout\'s father, Atticus Finch, a lawyer defending an innocent black man accused of rape, the novel confronts themes of racism, prejudice, and the loss of innocence. Harper Lee\'s timeless masterpiece is a poignant exploration of compassion and integrity that continues to resonate with readers today.', 1, 'disponible', 'ressources/assets/dummyDataAssets/tokillamockingbird.jpg'),
(6, 'Will', 'Will Smith', 'In this intimate and inspiring autobiography, Will Smith takes readers on a journey through his remarkable life, from his humble beginnings in Philadelphia to becoming one of Hollywood\'s most iconic stars. With candid storytelling and heartfelt reflections, Smith shares the highs and lows of his career, his personal struggles, and the principles that have guided him to success. \"Will\" is a compelling testament to resilience, ambition, and the power of self-belief.', 1, 'disponible', 'ressources/assets/dummyDataAssets/will.png'),
(7, 'The Lord of the Rings: The Two Towers', 'J.R.R. Tolkien', 'Continuing the epic saga of Middle-earth, \"The Two Towers\" transports readers to a world on the brink of war. Frodo and Sam continue their perilous journey to destroy the One Ring, while Aragorn, Legolas, and Gimli face battles against the forces of darkness. With its immersive world-building, epic battles, and themes of friendship and sacrifice, Tolkien\'s masterpiece continues to enthrall readers with its timeless tale of heroism and redemption.', 1, 'disponible', 'ressources/assets/dummyDataAssets/lotr.jpg'),
(8, 'Misery', 'Stephen King', 'In this chilling psychological thriller, acclaimed author Stephen King explores the dark and twisted mind of Annie Wilkes, a deranged fan who holds her favorite author, Paul Sheldon, captive after a car accident. As Paul struggles to escape Annie\'s clutches, he finds himself trapped in a nightmare of psychological torment and physical torture. With its intense suspense and masterful storytelling, \"Misery\" is a gripping tale that will keep readers on the edge of their seats until the very end.', 1, 'disponible', 'ressources/assets/dummyDataAssets/jessie.jpg'),
(9, 'Biochemistry 6th Edition', 'Jeremy M. Berg, John L. Tymoczko, Lubert Stryer', 'This comprehensive textbook offers a thorough examination of the molecular foundations of life, delving into the structure, function, and regulation of biological molecules. From the intricacies of protein folding to the pathways of cellular metabolism, \"Biochemistry\" provides students with a comprehensive understanding of the biochemical processes that underpin living organisms. With clear explanations, vivid illustrations, and updated content, this edition is an indispensable resource for students and researchers alike.', 1, 'disponible', 'ressources/assets/dummyDataAssets/biochimistry.jpg'),
(10, 'I, Robot', 'Isaac Asimov', 'In this groundbreaking collection of short stories, Isaac Asimov explores the relationship between humanity and artificial intelligence through the lens of his iconic Three Laws of Robotics. From robots designed for household chores to those capable of complex decision-making, each story presents thought-provoking scenarios that raise questions about ethics, technology, and the nature of consciousness. \"I, Robot\" is a timeless classic that continues to influence the science fiction genre to this day.', 1, 'disponible', 'ressources/assets/dummyDataAssets/irobot.jpg'),
(11, 'Foundation\'s Edge', 'Isaac Asimov', 'Continuing the epic saga of his Foundation series, Isaac Asimov takes readers on a thrilling journey across the galaxy as Hari Seldon\'s plan for the preservation of civilization faces new challenges. With political intrigue, philosophical dilemmas, and the enigmatic presence of the Second Foundation, \"Foundation\'s Edge\" is a masterful blend of science fiction and speculative fiction that explores the complexities of human history and the quest for knowledge.', 1, 'disponible', 'ressources/assets/dummyDataAssets/foundationsedge.jpg'),
(12, 'The Bro Code', 'Barney Stinson (with Matt Kuhn)', 'Inspired by the popular television series \"How I Met Your Mother,\" \"The Bro Code\" is a humorous guidebook to the unwritten rules of male friendship, as narrated by the legendary Barney Stinson. Filled with tongue-in-cheek advice, hilarious anecdotes, and Barney\'s trademark wit, this book is a must-read for fans of the show and anyone seeking a lighthearted take on the complexities of bromance.', 1, 'disponible', 'ressources/assets/dummyDataAssets/brocode.jpg'),
(13, 'PHP and MySQL for Dummies', 'Janet Valade', 'Designed for beginners, \"PHP and MySQL for Dummies\" is a user-friendly guide to web development with two of the most popular programming languages. From setting up a development environment to creating dynamic web applications, this book provides step-by-step instructions, practical examples, and troubleshooting tips to help readers master the fundamentals of PHP and MySQL. Whether you\'re a complete novice or looking to expand your programming skills, this book is an invaluable resource for anyone interested in web development.', 1, 'disponible', 'ressources/assets/dummyDataAssets/phpdummies.jpg'),
(14, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 'In \"Clean Code,\" renowned software expert Robert C. Martin presents a set of principles and practices for writing clean, maintainable, and efficient code. From naming conventions to code structure to refactoring techniques, Martin offers practical advice and real-world examples to help programmers improve their coding skills and produce higher-quality software. Whether you\'re a novice developer or a seasoned professional, \"Clean Code\" is an essential guide for anyone striving to write better code and build better software.', 1, 'disponible', 'ressources/assets/dummyDataAssets/cleancode.png'),
(15, 'The Perks of Being a Wallflower', 'Stephen Chbosky', 'Narrated through a series of letters, \"The Perks of Being a Wallflower\" follows the emotional journey of Charlie, a shy and introspective teenager navigating the complexities of high school life. As Charlie grapples with issues of identity, friendship, and love, he finds solace and understanding in the company of his new friends, Sam and Patrick. With its raw honesty, poignant storytelling, and relatable characters, Stephen Chbosky\'s coming-of-age novel captures the universal struggles of adolescence with sensitivity and compassion.', 1, 'disponible', 'ressources/assets/dummyDataAssets/perkofbeingawallflower.jpg'),
(16, 'Everything is F*cked: A Book About Hope', 'Mark Manson', 'In this thought-provoking exploration of human nature, bestselling author Mark Manson examines the paradoxes of modern life and the search for meaning in a world filled with chaos and uncertainty. Drawing on psychology, philosophy, and his own experiences, Manson challenges readers to confront their beliefs and redefine their values in order to find hope in a seemingly hopeless world. With his trademark blend of humor, insight, and candor, \"Everything is F*cked\" offers a refreshing perspective on the pursuit of happiness and the resilience of the human spirit.', 1, 'disponible', 'ressources/assets/dummyDataAssets/everythingisf.jpg'),
(17, 'Jessie', 'Stephen King', 'In this chilling psychological thriller, acclaimed author Stephen King explores the dark and twisted mind of Annie Wilkes, a deranged fan who holds her favorite author, Paul Sheldon, captive after a car accident. As Paul struggles to escape Annie\'s clutches, he finds himself trapped in a nightmare of psychological torment and physical torture. With its intense suspense and masterful storytelling, \"Jessie\" is a gripping tale that will keep readers on the edge of their seats until the very end.', 1, 'disponible', 'ressources/assets/dummyDataAssets/jessie.jpg'),
(18, 'Subtle Art of Not Giving a F*ck', 'Mark Manson', 'In \"The Subtle Art of Not Giving a F*ck,\" Mark Manson challenges conventional self-help advice by urging readers to embrace discomfort and embrace life\'s inevitable struggles. Through candid anecdotes and practical wisdom, Manson argues that true happiness comes not from avoiding pain or seeking constant positivity, but from accepting our limitations and focusing on what truly matters. With its irreverent humor and refreshing honesty, \"The Subtle Art of Not Giving a F*ck\" offers a bold and refreshing perspective on the pursuit of happiness.', 1, 'disponible', 'ressources/assets/dummyDataAssets/subleart.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(32) NOT NULL,
  `picture` varchar(128) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `signUpDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `picture`, `email`, `signUpDate`) VALUES
(1, 'Admin', '$2y$10$5NWpwYVwCP42MXmiWdWVGeKPSXTpdEXdabcLHdgilQDD919f5.D8i', 'admin', 'ressources/assets/logoTT.png', 'adrien@icloud.com', '2022-04-02 00:00:00'),
(2, 'TestUserPseudo', '$2y$10$fNOdxdoTN9Zxnqbw/OPnZeWEM1I6WbZOYbyLe5g8y16rlED8GTluG', 'user', 'ressources/assets/default.png', 'test@gmail.com', NULL),
(3, 'test2', '$2y$10$XnDsv6iGujhry5t2hf2qweqXofXDQeCjDeb4R5iY7JmM2vKtYQ1bW', 'user', 'ressources/assets/default.png', 'test2@gmail.com', NULL),
(4, 'admin2', '$2y$10$BjSnG89qegO72ss/QhyPgukeu3Y0epjfprE/zxtF5u9wBZ9mVB5Wu', 'user', 'ressources/assets/default.png', 'admin@gmail.com', NULL),
(5, 'test3', '$2y$10$o.9iQsr9zBE0FN1gqHi5yeglfAHKmOEdcL9e529vWElXOP8XWjTJG', 'user', 'ressources/assets/default.png', 'test3@gmail.com', '2024-01-01 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
