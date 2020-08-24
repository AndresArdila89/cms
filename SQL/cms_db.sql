-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 03:29 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Javascript'),
(5, 'PHP'),
(17, 'LARAVEL'),
(20, 'Bootstrap 4'),
(21, 'OOP'),
(22, 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 10, 'andres ardila ', 'andresardila@me.com', 'This is just an example ', 'approved', '2020-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 2, 'SCRUMFIT FIRST POST', 'ANDRES ARDILA ', '2020-05-26', 'images/congelado.png', 'try 999', 'andres, scrumfit , colombia', 0, 'public'),
(10, 21, 'let see how it works ', 'andres ardila', '2020-07-10', 'images/feliz.png', 'this post contains nothing ......', 'andres , farra , celebracion', 4, 'public'),
(11, 20, 'updaate', 'adf', '2020-07-10', 'images/triste.png', '    hkdshjlidasfjlfagds', 'adf', 4, 'sdfdsf'),
(12, 5, 'MTB', 'Andres', '2020-08-20', 'images/profile.png', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur rhoncus diam, sit amet posuere enim dignissim ullamcorper. Fusce blandit nunc tincidunt iaculis fringilla. Proin in tortor quis risus fringilla tempor id ut tellus. Morbi tellus nibh, auctor vel nisl sit amet, aliquet molestie diam. Aenean metus lacus, iaculis ut erat non, egestas ornare urna. Sed suscipit, purus ut mollis viverra, ipsum est suscipit mauris, fringilla tincidunt turpis neque ac mi. Praesent consectetur luctus varius. Nullam vitae mi egestas erat sagittis varius. Cras eu dictum ex. In fermentum, dui nec rhoncus commodo, arcu augue condimentum nulla, blandit accumsan lacus ligula sed justo.\r\n\r\nInteger nec feugiat diam, in vulputate tortor. Vestibulum scelerisque nunc sit amet ex gravida eleifend. Maecenas aliquet mi vel ultricies faucibus. Aliquam in ex enim. Phasellus faucibus erat a metus efficitur fermentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque sed blandit dui. Pellentesque commodo sapien ut faucibus elementum. Mauris vestibulum nunc id lacus convallis egestas. Etiam mattis nisl tellus, eget congue nisi dictum eget. Maecenas tempor diam ut mauris efficitur sollicitudin. Suspendisse interdum, elit sit amet luctus vestibulum, orci ex aliquet erat, ac molestie mi lacus sed sapien.\r\n\r\nProin et risus sed neque tincidunt convallis. Sed metus nulla, volutpat quis eros a, sagittis porttitor augue. Praesent ac vestibulum neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam odio nisi, aliquet nec risus eu, tempus consequat nisi. Quisque et posuere justo. Sed sapien ex, lacinia id turpis sed, maximus euismod metus. Pellentesque nunc nunc, porta vel orci ut, scelerisque tincidunt purus. Aliquam erat volutpat.\r\n\r\nIn mauris nunc, commodo eget ipsum vitae, tristique vulputate turpis. Donec mollis consequat dolor in luctus. Integer ut est dolor. Praesent eget turpis rhoncus turpis euismod tincidunt. Nullam feugiat risus finibus ante tincidunt, vitae cursus nunc pellentesque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et libero venenatis, aliquet velit non, egestas mi.', 'mtb', 4, 'public'),
(13, 5, 'hello', 'Andres', '2020-08-21', 'images/tb_1920x1080.jpg', '    asdfdadad', 'mtb', 4, 'public');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
