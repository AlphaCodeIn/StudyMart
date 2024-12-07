-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 05:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studymart`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `upload_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `author`, `description`, `file_name`, `is_approved`, `user_id`, `subject`, `thumbnail_path`, `upload_at`) VALUES
(117, 'React Notes', 'alpha', 'nothing', '91a1f388f23664dc645374d35d942b59.pdf', 1, 1, 'react', '/project/StudyMart/uploads/thumbnails/91a1f388f23664dc645374d35d942b59.png', '2024-12-06 03:06:55'),
(118, 'MongoDb Notes ', 'nothing', 'nothing', '9d23a9d69251718bb3d2ff8b49c2348b.pdf', 1, 1, 'MongoDB', '/project/StudyMart/uploads/thumbnails/9d23a9d69251718bb3d2ff8b49c2348b.png', '2024-12-06 03:07:42'),
(119, 'LInux', 'nothing', 'nothing', '5fb96e383bd376d18d6638e1138d87c3.pdf', 1, 1, 'linux', '/project/StudyMart/uploads/thumbnails/5fb96e383bd376d18d6638e1138d87c3.jpg', '2024-12-06 03:08:11'),
(120, 'Bash Programming', 'nothing', 'nothing', 'f12a42a73284faf6caedeb0c4fe01d23.docx', 1, 1, 'Bash', '/project/StudyMart/uploads/thumbnails/f12a42a73284faf6caedeb0c4fe01d23.jpg', '2024-12-06 03:08:46'),
(121, '.NET Notes', 'nothing', 'nothing', '0f0079d3476ad2ffb22555b7159eac60.pdf', 1, 1, '.NEt', '/project/StudyMart/uploads/thumbnails/0f0079d3476ad2ffb22555b7159eac60.jpg', '2024-12-06 03:09:15'),
(122, 'html,css,js', 'nothing', 'nothing', '86caa27d6c5962848cf4a7646755d12d.pdf', 1, 1, 'web development', '/project/StudyMart/uploads/thumbnails/86caa27d6c5962848cf4a7646755d12d.png', '2024-12-06 03:10:02'),
(123, 'PHP notes', 'nothing', 'nothing', '5e2c7344f31705e0be753bfdc9f83610.pdf', 1, 1, 'php', '/project/StudyMart/uploads/thumbnails/5e2c7344f31705e0be753bfdc9f83610.jpg', '2024-12-06 03:10:27'),
(124, 'C language Notes', 'alpha1', 'nothing', 'ac93000e8585f4e9c204f80ac82a637f.pdf', 1, 1, 'C langualge', '/project/StudyMart/uploads/thumbnails/ac93000e8585f4e9c204f80ac82a637f.png', '2024-12-06 03:11:08'),
(125, 'C++ Short Notes', 'nothing', 'nothing', 'e30c2d1b2d1b2d7265fb514962802c64.docx', 1, 1, 'C++', '/project/StudyMart/uploads/thumbnails/e30c2d1b2d1b2d7265fb514962802c64.jpg', '2024-12-06 03:11:52'),
(126, 'Python Notes', 'nothing', 'nothing', '5a36d329f6f0b549ca65dde5a4641bfd.docx', 1, 1, 'Python', '/project/StudyMart/uploads/thumbnails/5a36d329f6f0b549ca65dde5a4641bfd.jpg', '2024-12-06 03:12:27'),
(127, 'C ++ ', 'nothing', 'nothing', '2fdb78448d60a8906019b26c5d9f2cc7.pdf', 1, 1, 'C ++ ', '/project/StudyMart/uploads/thumbnails/2fdb78448d60a8906019b26c5d9f2cc7.jpg', '2024-12-06 03:12:57'),
(128, 'Python Trick Notes', 'nothing', 'nothing', 'd9b4b788bc012996994098866a00c943.pdf', 1, 1, 'python', '/project/StudyMart/uploads/thumbnails/d9b4b788bc012996994098866a00c943.jpg', '2024-12-06 03:13:48'),
(129, 'Software Notes', 'lucky also alpha', 'se notes', '22da70db46d8897c078a0c47e96b1064.pdf', 1, 1, 'SE', '/project/StudyMart/uploads/thumbnails/22da70db46d8897c078a0c47e96b1064.jpg', '2024-12-06 03:18:45'),
(130, 'Cyber Security Notes', 'alpha', 'Cyber Security Notes', '88e55071c079eb6c673e6bf17da33e02.pdf', 1, 1, 'Cyber Security', '/project/StudyMart/uploads/thumbnails/88e55071c079eb6c673e6bf17da33e02.jpg', '2024-12-06 03:19:33'),
(131, 'Data Science', 'alpha', 'Cyber Security Notes', 'eafb89f6878246062fb843b2e5370f81.docx', 1, 1, 'Data Science', '/project/StudyMart/uploads/thumbnails/eafb89f6878246062fb843b2e5370f81.jpg', '2024-12-06 03:20:10'),
(132, 'Artificial Intelligengce Notes', 'alpha AI', 'Artificial Intelligengce Notes', '5701b654e02f27ce023159fde5664488.pdf', 1, 1, 'AI', '/project/StudyMart/uploads/thumbnails/5701b654e02f27ce023159fde5664488.jpg', '2024-12-06 03:22:54'),
(133, 'java notes', 'lucky', 'this is ', 'f723265e92327ec008cba6c1d515fe92.pdf', 1, 4, 'java', '/project/StudyMart/uploads/thumbnails/f723265e92327ec008cba6c1d515fe92.jpg', '2024-12-06 13:28:56'),
(134, 'java', 'admin', 'hello ', 'da6eee3cf7a4c2874adffe0dc3a8365a.pdf', 1, 1, 'java', '/project/StudyMart/uploads/thumbnails/da6eee3cf7a4c2874adffe0dc3a8365a.png', '2024-12-06 13:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `question_papers`
--

CREATE TABLE `question_papers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `subject` varchar(100) NOT NULL,
  `university_college` varchar(255) DEFAULT NULL,
  `upload_at` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `file_name` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_papers`
--

INSERT INTO `question_papers` (`id`, `title`, `description`, `subject`, `university_college`, `upload_at`, `user_id`, `is_approved`, `file_name`, `year`, `thumbnail_path`) VALUES
(22, 'Math Question Papper', 'math', 'math', 'hbse', '2024-12-06 09:23:02', 1, 1, '8b21137ab2ee5096f039a0258c4ba043.pdf', '2024', '/project/StudyMart/uploads/thumbnails/8b21137ab2ee5096f039a0258c4ba043.png'),
(23, 'Biology  neet pyq', 'Biology neet ', 'BIOLOGY', 'CBSE', '2024-12-06 09:26:48', 1, 1, '14d7d5812cee72b6398193de8e60c8fd.pdf', '2022', '/project/StudyMart/uploads/thumbnails/14d7d5812cee72b6398193de8e60c8fd.jpg'),
(24, 'BCA (common entrance test)', 'BCA', 'C language', 'dcrust', '2024-12-06 09:31:37', 1, 1, '48356015dde891f0fb79eec8d8572208.pdf', '2024', '/project/StudyMart/uploads/thumbnails/48356015dde891f0fb79eec8d8572208.jpg'),
(25, 'pyq of neet physics', 'neet physics', 'physics', 'medical college ', '2024-12-06 09:36:27', 1, 1, 'ec29041c45eb655ce348320d3e1d825c.pdf', '2022', '/project/StudyMart/uploads/thumbnails/ec29041c45eb655ce348320d3e1d825c.jpg'),
(26, 'Math Question Papper', 'math', 'math', 'hbse', '2024-12-06 09:39:41', 1, 1, 'aaf7e0ef00e5ee3b726b97f7de7c0130.pdf', '2024', '/project/StudyMart/uploads/thumbnails/aaf7e0ef00e5ee3b726b97f7de7c0130.png'),
(27, 'Pyq of NEET chem.', 'Chemistry', 'Chemistry', 'medical college', '2024-12-06 09:40:39', 1, 1, '15eb7816b015a4edfea423b46bd8e21f.pdf', '2022', '/project/StudyMart/uploads/thumbnails/15eb7816b015a4edfea423b46bd8e21f.jpg'),
(28, 'jee mains maths pyq.', 'maths', 'maths ', 'engeeniring college ', '2024-12-06 09:43:26', 1, 1, '00960cf4f7d68e4d6901736679e8bbfe.pdf', '2022', '/project/StudyMart/uploads/thumbnails/00960cf4f7d68e4d6901736679e8bbfe.jpg'),
(29, 'DBMS pyq', 'DBMS', 'DBMS', 'dcrust', '2024-12-06 09:45:56', 1, 1, '30a49166f45a1e2933689447d9cbff90.pdf', '2024', '/project/StudyMart/uploads/thumbnails/30a49166f45a1e2933689447d9cbff90.png'),
(30, 'nimcet maths', 'maths', 'maths', 'university', '2024-12-06 10:16:02', 1, 1, 'f59ca0835eeeae56c42a652185470bc4.pdf', '2023', '/project/StudyMart/uploads/thumbnails/f59ca0835eeeae56c42a652185470bc4.png'),
(31, 'NIMCET maths pyq.', 'maths', 'maths ', 'nimcet', '2024-12-06 10:19:40', 1, 1, '103b6672182ebf521427a1cfe37f43ec.pdf', '2023', '/project/StudyMart/uploads/thumbnails/103b6672182ebf521427a1cfe37f43ec.png'),
(32, 'BBA PYQ ', 'BBA PYQ', 'BBA', 'BBA', '2024-12-06 10:21:34', 1, 1, '0f64bc2e7b3d7ffc755a915f45bdb25a.pdf', '2022', '/project/StudyMart/uploads/thumbnails/0f64bc2e7b3d7ffc755a915f45bdb25a.jpg'),
(33, 'DBMS question paper', 'DBMS', 'DBMS', 'dcrust', '2024-12-06 10:25:15', 1, 1, '2b89427a46245d960e55f6fff782f9cd.pdf', '2024', '/project/StudyMart/uploads/thumbnails/2b89427a46245d960e55f6fff782f9cd.png'),
(34, 'neet pyq.', 'neet', 'NEET', 'MEDICAL COLLEGE', '2024-12-06 10:26:49', 1, 1, '40cc868e92833ec8138d25f18076ed15.pdf', '2024', '/project/StudyMart/uploads/thumbnails/40cc868e92833ec8138d25f18076ed15.png'),
(35, 'C++ question pPER', 'C++', 'C++', 'dcrust', '2024-12-06 10:28:35', 1, 1, '2a00d4d33edc602d7f23d99922c1cfd5.pdf', '2023', '/project/StudyMart/uploads/thumbnails/2a00d4d33edc602d7f23d99922c1cfd5.png'),
(36, 'Data Structure question paper', 'Data Structure', 'data structure', 'dcrust', '2024-12-06 10:30:28', 1, 1, 'b3f84d7f7676cf1c9cbc9888f893518b.pdf', '2024', '/project/StudyMart/uploads/thumbnails/b3f84d7f7676cf1c9cbc9888f893518b.jpg'),
(37, 'data structure pyq', 'data structure', 'data structure', 'dcrust', '2024-12-06 10:31:52', 1, 1, '7e872d3da4ce6ac1419728d85eaeecfb.pdf', '2024', '/project/StudyMart/uploads/thumbnails/7e872d3da4ce6ac1419728d85eaeecfb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`id`, `full_name`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$j3/BnkiPqWd5eEDuNKuw9uI91Ykmq5.tY7nJUqWhVrfwNKL6mXYSq', 'admin'),
(2, 'lucky chauhan', 'alpha', 'alpja@gmail.com', '$2y$10$2qNVgvmTqI3KVN7vzSux8.7kq6bzqEmCANKlXEpYUxqOskyJuNdQG', 'user'),
(3, 'alpha2', 'alpha2', 'aajsjsjj@gmail.com', '$2y$10$upz3eoRBnEZhDm/mAmLhueYyYKPZbX6kE07M1w4wauLNorUbWw.gO', 'user'),
(4, 'alpha', 'abc', 'alpaha@gmail.com', '$2y$10$A.q0bP5QAjIRS53Q1NaxauOS6aCx8mBVbvIPseZoD9qTKQwfcXeOe', 'user'),
(6, 'abcd', 'abcd', 'abcd@gmail.com', '$2y$10$gN80aaahW2Iwhx8yJ1p6qeKGwBauSTsMTmS3lZgO1q//AVMI1vLE.', 'user'),
(7, 'alpha', 'alpha123', 'alpha123@gmail.com', '$2y$10$wa7YU7y4OgDxrc5paSVJIuuz8e31t2xZiu4MlfkAGihoPX2bDXIw2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question_papers`
--
ALTER TABLE `question_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `question_papers`
--
ALTER TABLE `question_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registered_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
