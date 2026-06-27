-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2026 at 09:09 PM
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
-- Database: `w3coderschool-movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_links`
--

CREATE TABLE `book_links` (
  `id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_links`
--

INSERT INTO `book_links` (`id`, `platform_id`, `movie_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2024-10-26 10:37:18', '2024-10-26 10:37:18'),
(2, 1, 2, NULL, '2024-10-26 14:24:06', '2024-10-26 14:24:06'),
(3, 1, 3, NULL, '2024-10-27 23:13:30', '2024-10-27 23:13:30'),
(4, 1, 4, NULL, '2024-11-03 15:18:55', '2024-11-03 15:18:55'),
(5, 1, 5, NULL, '2024-11-03 15:41:42', '2024-11-03 15:41:42'),
(6, 1, 6, NULL, '2024-11-03 16:21:45', '2024-11-03 16:21:45'),
(7, 1, 7, NULL, '2024-11-03 16:37:06', '2024-11-03 16:37:06'),
(8, 2, 8, 'https://in.bookmyshow.com/movies/moana-2/ET00387901', '2024-11-30 17:23:26', '2024-11-30 17:23:26'),
(9, 1, 9, NULL, '2024-11-30 17:33:01', '2024-11-30 17:33:01'),
(10, 1, 10, NULL, '2024-11-30 17:37:25', '2024-11-30 17:37:25'),
(11, 1, 11, NULL, '2024-11-30 17:42:43', '2024-11-30 17:42:43'),
(12, 1, 12, NULL, '2024-11-30 17:47:36', '2024-11-30 17:47:36'),
(13, 1, 13, NULL, '2024-11-30 17:54:09', '2024-11-30 17:54:09'),
(14, 1, 14, NULL, '2024-11-30 18:03:48', '2024-11-30 18:03:48'),
(15, 1, 15, NULL, '2024-11-30 18:19:26', '2024-11-30 18:19:26'),
(16, 1, 16, NULL, '2024-11-30 20:39:31', '2024-11-30 20:39:31'),
(17, 1, 17, NULL, '2024-11-30 20:52:34', '2024-11-30 20:52:34'),
(18, 1, 18, NULL, '2024-11-30 20:59:59', '2024-11-30 20:59:59'),
(19, 1, 19, NULL, '2024-11-30 21:04:28', '2024-11-30 21:04:28'),
(20, 1, 20, NULL, '2024-11-30 23:39:15', '2024-11-30 23:39:15'),
(21, 1, 21, NULL, '2024-11-30 23:46:59', '2024-11-30 23:46:59'),
(22, 3, 22, NULL, '2024-11-30 23:54:37', '2024-11-30 23:54:37'),
(23, 1, 23, NULL, '2024-12-01 00:09:18', '2024-12-01 00:09:18'),
(24, 1, 24, NULL, '2024-12-02 18:50:39', '2024-12-02 18:50:39'),
(25, 1, 25, NULL, '2024-12-06 22:12:11', '2024-12-06 22:12:11'),
(26, 1, 26, NULL, '2024-12-24 18:58:32', '2024-12-24 18:58:32'),
(27, 1, 27, NULL, '2024-12-25 16:13:43', '2024-12-25 16:13:43'),
(28, 1, 28, NULL, '2024-12-25 16:32:36', '2024-12-25 16:32:36'),
(29, 1, 29, NULL, '2024-12-26 09:46:14', '2024-12-26 09:46:14'),
(30, 1, 30, NULL, '2024-12-26 09:47:09', '2024-12-26 09:47:09'),
(31, 1, 31, NULL, '2024-12-26 09:49:04', '2024-12-26 09:49:04'),
(32, 1, 32, NULL, '2024-12-26 09:50:19', '2024-12-26 09:50:19'),
(33, 1, 33, NULL, '2024-12-26 09:51:14', '2024-12-26 09:51:14'),
(34, 1, 34, NULL, '2024-12-26 09:53:59', '2024-12-26 09:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url_name` varchar(100) NOT NULL DEFAULT 'hindi',
  `ordering` int(11) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `url_name`, `ordering`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Hindi Movies', 'hindi', 1, 1, '2023-09-16 09:20:13', '2023-09-16 09:20:13'),
(2, 'English Movies', 'english', 2, 1, '2023-09-16 09:20:13', '2023-09-17 09:55:10'),
(3, 'Tamil Movies', 'tamil', 3, 1, '2023-09-16 09:20:13', '2023-09-17 09:55:16'),
(4, 'Telgu Movies', 'telgu', 4, 1, '2023-09-16 09:20:13', '2023-09-17 09:55:41'),
(5, 'Bangla Movies', 'bangla', 5, 1, '2023-09-16 09:20:35', '2023-09-17 09:55:48'),
(6, 'Web Series', 'web-series', 6, 1, '2023-09-16 09:20:35', '2023-09-17 09:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Action', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(2, 'Fantasy', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(3, 'Adventure', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(4, 'Animated', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(5, 'Horror (and Supernatural)', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(6, 'Biopic', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(7, 'Comedy', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(8, 'Romance', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(9, 'Crime', 1, '2023-09-16 09:27:48', '2024-10-26 06:50:28'),
(10, 'Cult', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(11, 'Sport', 1, '2023-09-16 09:27:48', '2024-10-26 06:47:58'),
(12, 'Disaster', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(13, 'Suspense-Thriller', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(14, 'Drama', 1, '2023-09-16 09:27:48', '2024-10-26 06:44:57'),
(15, 'War', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(16, 'Melo-dramas', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(17, 'Western', 1, '2023-09-16 09:27:48', '2023-09-16 09:27:48'),
(18, 'Sci-Fi', 1, '2024-10-26 06:33:35', '2024-10-26 06:33:35'),
(19, 'Mystery', 1, '2024-10-26 06:43:47', '2024-10-26 06:43:47'),
(20, 'Thriller', 1, '2024-10-26 06:44:24', '2024-10-26 06:44:24'),
(21, 'Horror', 1, '2024-10-26 06:49:09', '2024-10-26 06:49:09'),
(22, 'History', 1, '2024-10-26 06:51:14', '2024-10-26 06:51:14'),
(23, 'Musical', 1, '2024-10-26 06:53:00', '2024-10-26 06:53:00'),
(24, 'Animation', 1, '2024-10-26 06:53:33', '2024-10-26 06:53:33'),
(25, 'Documentary', 1, '2024-10-26 06:54:04', '2024-10-26 06:54:04'),
(26, 'Biography', 1, '2024-10-26 06:57:52', '2024-10-26 06:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Hindi', 1, '2023-09-16 07:45:30', '2023-09-16 07:45:30'),
(2, 'English', 1, '2023-09-16 08:53:28', '2023-09-16 08:53:28'),
(3, 'Marathi', 1, '2023-09-16 08:53:28', '2023-09-16 08:53:28'),
(4, 'French', 1, '2023-09-16 08:53:28', '2023-09-16 08:53:28'),
(5, 'Bangla', 1, '2023-09-16 08:53:28', '2023-09-16 08:55:04'),
(6, 'Bhojpuri', 1, '2023-09-16 08:53:28', '2023-09-16 08:53:28'),
(7, 'Tamil', 1, '2023-09-16 08:54:44', '2023-09-16 08:54:44'),
(8, 'Telgu', 1, '2023-09-16 08:54:44', '2023-09-16 08:54:44'),
(9, 'Urdu', 1, '2023-09-16 08:55:52', '2023-09-16 08:55:52'),
(10, 'Malayalam', 1, '2024-10-26 06:35:06', '2024-10-26 06:35:06'),
(11, 'Kannada', 1, '2024-10-26 06:35:26', '2024-10-26 06:35:26'),
(12, 'Spanish', 1, '2024-10-26 06:46:01', '2024-10-26 06:46:01'),
(13, 'Portuguese', 1, '2024-10-26 06:46:01', '2024-10-26 06:46:01'),
(14, 'Polish', 1, '2024-10-26 06:46:50', '2024-10-26 06:46:50'),
(15, 'Thai', 1, '2024-10-26 06:46:50', '2024-10-26 06:46:50'),
(16, 'Italian', 1, '2024-10-26 06:55:01', '2024-10-26 06:55:01'),
(17, 'Japanese', 1, '2024-10-26 06:56:18', '2024-10-26 06:56:18'),
(18, 'Turkish', 1, '2024-10-26 06:56:18', '2024-10-26 06:56:18'),
(19, 'Dutch', 1, '2024-10-26 06:56:54', '2024-10-26 06:56:54'),
(20, 'Indonesian', 1, '2024-10-26 06:58:57', '2024-10-26 06:58:57'),
(21, 'Ukrainian', 1, '2024-10-26 06:58:57', '2024-10-26 06:58:57'),
(22, 'Hungarian', 1, '2024-10-26 06:59:32', '2024-10-26 06:59:32'),
(23, 'Czech', 1, '2024-10-26 06:59:32', '2024-10-26 06:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `url_name` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `canonical_tag` varchar(255) DEFAULT NULL,
  `poster_image` varchar(255) DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `casts` text DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `seasion` varchar(255) DEFAULT NULL,
  `audience_type` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  `cinematography` varchar(255) DEFAULT NULL,
  `music` varchar(255) DEFAULT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `production` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `is_draft` tinyint(4) DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `pageview` bigint(20) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL COMMENT '	0->in progress, 1->complete	',
  `release_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `label`, `category_id`, `url_name`, `meta_title`, `meta_description`, `meta_keyword`, `canonical_tag`, `poster_image`, `hero_image`, `casts`, `director`, `duration`, `seasion`, `audience_type`, `writer`, `cinematography`, `music`, `producer`, `production`, `certificate`, `is_draft`, `is_active`, `pageview`, `status`, `release_date`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kalki 2898 AD', 'Kalki 2898 AD: Release Date, Trailer, Songs, Cast', NULL, 1, 'kalki-2898-ad-movie-2024', 'Kalki 2898 AD Movie (2024) | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Kalki 2898 AD Movie: Find Kalki 2898 AD movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'kalki, kalki 2898 ad, kalki 2898 ad, kalki 2898 ad cast, kalki 2898 ad director, kalki 2898 ad trailer, kalki 2898 ad teaser', 'movies/view/kalki-2898-ad-movie-2024', NULL, 'movies_image/file_1729919238.webp', 'Prabhas, Amitabh Bachchan, Deepika Padukone, Disha Patani, Kamal Haasan', 'Nag Ashwin', '03:01:00', NULL, '13+', 'Nag Ashwin', 'Dani Sanchez-Lopez, Djordje Stojiljkovic', 'Mickey J. Meyer, Santhosh Narayanan', 'C. Aswani Dutt, Swapna Dutt, Priyanka Dutt', 'Vyjayanthi Movies', NULL, 0, 1, 8, 1, '2024-06-27 00:00:00', 2, '2024-10-26 10:06:51', '2024-12-13 20:27:35', NULL),
(2, 'The Miranda Brothers', 'The Miranda Brothers: Release Date, Trailer, Songs, Cast', NULL, 1, 'the-miranda-brothers-movie-2024', 'The Miranda Brothers Movie (2024) | Release Date, Review, Cast, Trailer, Watch Online at Jio Cinema - w3coderschool', 'Kalki 2898 AD Movie: Find Kalki 2898 AD movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'the miranda brothers, the miranda brothers movie, the miranda brothers cast, the miranda brothers director', 'movies/view/the-miranda-brothers-movie-2024', NULL, 'movies_image/file_1729934155.webp', 'Harshvardhan Rane, Jeniffer Piccinato, Meezaan Jafri, Rahul Dev, Sahher Bambba, Sanjay Suri, Naved Jaffrey, Manasi Joshi Roy, Nikhil Chinappa', 'Sanjay Gupta', NULL, NULL, NULL, 'Sameer Hafiz', 'Shikhar Bhatnagar', NULL, 'Anuradha Gupta, Sanjay Gupta', 'White Feather Films', NULL, 0, 1, 12, 1, '2024-10-25 00:00:00', 2, '2024-10-26 14:16:51', '2024-12-06 18:16:23', NULL),
(3, 'Navras Katha Collage', 'Navras Katha Collage: Release Date, Trailer, Songs, Cast', NULL, 1, 'navras-katha-collage-movie-2024', 'Navras Katha Collage Movie (2024) | Release Date, Review, Cast, and Trailer - w3coderschool', 'Navras Katha Collage Movie: Find Navras Katha Collage movie release date, cast, trailer, review, duration on w3coderschool', 'navras katha collage, navras katha collage cast, navras katha collage director, navras katha collage trailer, navras katha collage poster', 'movies/view/navras-katha-collage-movie-2024', NULL, 'movies_image/file_1730051010.webp', 'Alka Amin, Ram Awana, Sheeba Chaddha, Shaji Chaudhary, Dolphin Dubey, Praveen Hingonia, Swar Hingonia, Amardeep Jha, Shriya Jha, Alka Badola Kaushal', 'Praveen Hingonia', '02:23:00', NULL, NULL, 'Praveen Hingonia', 'Rupam Chetiapatra', 'Asif Chandwani', 'Praveen Hingonia, Skh Patel', 'Swardhrupad Productions', 'A', 0, 1, 8, 1, '2024-10-25 00:00:00', 2, '2024-10-27 22:51:26', '2024-12-23 12:36:18', NULL),
(4, 'Do Patti', 'Do Patti: Release Date, Trailer, Songs, Cast', NULL, 1, 'do-patti-movie-2024', 'Do Patti Movie (2024) | Release Date, Review, Cast, Trailer, Watch Online at Netflix - w3coderschool', 'Do Patti Movie: Find Do Patti movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'do patti, do patti trailer, do patti cast, do patti movie, do patti songs, do patti images, do patti poster, do patti plot, kriti sanon new movie', 'movies/view/do-patti-movie-2024', NULL, 'movies_image/file_1730627335.webp', 'Kajol Devgan, Kriti Sanon, Shaheer Sheikh, Tanvi Azmi, Sood Riitu', 'Shashanka Chaturvedi', '02:07:00', NULL, '16+', 'Kanika Dhillon', 'Mart Ratassepp', 'Anurag Saikia, Sachet Tandon, Parampara Thakur', 'Kriti Sanon, Kanika Dhillon', 'Blue Butterfly Films, Katha pictures', NULL, 0, 1, 7, 1, '2024-10-25 00:00:00', 2, '2024-11-03 14:56:51', '2024-12-06 17:00:17', NULL),
(5, 'Singham Again', 'Singham Again: Release Date, Trailer, Songs, Cast', NULL, 1, 'singham-again-movie-2024', 'Singham Again Movie (2024) | Release Date, Review, Cast, Trailer, Watch at theater- w3coderschool', 'Singham Again Movie: Find Kalki 2898 AD movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'singham again, singham again 2024, singham again movie, singham again cast, release date', 'movies/view/singham-again-movie-2024', NULL, 'movies_image/file_1730628702.webp', 'Deepika Padukone, Akshay Kumar, Kareena Kapoor, Ranveer Singh, Ajay Devgn, Tiger Shroff, Jakie Shroff, Arjun Kapoor, Shweta Tiwari', 'Rohit Shetty', '02:24:00', NULL, NULL, 'Abhijeet Khuman, Anusha Nandakumar, Yunus Sajawal, Sandeep Saket, Rohit Shetty, Kshitij Patwardhan', 'Girish Kant, Raza Hussain Mehta', 'Ravi Basrur, Thaman S', 'Jyoti Deshpande, Ajay Devgn, Rohit Shetty', 'Jio Studios, Ajay Devgn Ffilms, Bollygrad Productions', 'U/A', 0, 1, 5, 1, '2024-11-01 00:00:00', 2, '2024-11-03 15:26:27', '2024-12-23 12:43:00', NULL),
(6, 'Dhadak 2', 'Dhadak 2: Release Date, Trailer, Songs, Cast', NULL, 1, 'dhadak-2-movie-2024', 'Dhadak 2 Movie (2024) | Release Date, Review, Cast, Trailer, Watch at theater - w3coderschool', 'Dhadak 2 Movie: Find Dhadak 2 movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'dhadak 2, dhadak 2 2024, dhadak 2 movie, dhadak 2 cast, dhadak 2 release date, dhadak 2 director', 'movies/view/dhadak-2-movie-2024', NULL, 'movies_image/file_1730631105.webp', 'Triptii Dimri, Siddhant Chaturvedi, Saad Bilgrami', 'Shazia Iqbal', NULL, NULL, NULL, 'Rahuk Badwelkar, Shazia Iqbal', 'Sylvester Fonseca', NULL, 'Karan Johar, Umesh Kr Bansal, Hiroo Yash Johar, Apoorva Mehta, Meenu Aroraa, Somen Mishra', 'Zee Studios, Dharma Productions, Cloud 9 Pictures', NULL, 0, 1, 17, 1, '2024-11-22 00:00:00', 2, '2024-11-03 16:09:50', '2024-12-23 13:57:17', NULL),
(7, 'Suswagatam Khushaamadeed', 'Suswagatam Khushaamadeed: Release Date, Trailer, Songs, Cast', NULL, 1, 'suswagatam-khushaamadeed-movie-2024', 'Suswagatam Khushaamadeed Movie (2024) | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Suswagatam Khushaamadeed Movie: Find Suswagatam Khushaamadeed movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'suswagatam khushaamadeed, suswagatam khushaamadeed 2024, suswagatam khushaamadeed cast, suswagatam khushaamadeed release date, suswagatam khushaamadeed director, suswagatam khushaamadeed song', 'movies/view/suswagatam-khushaamadeed-movie-2024', NULL, 'movies_image/file_1730632026.webp', 'Pulkit Samrat, Isabelle Kaif, Arun Bali, Mani Rishi Chadha, Rajkumar Kanojia, Meghna Malik, Shruti Panwar, Prashant Singh Shaurya, Priyanka Singh, Rituraj Singh, Mehul Surana, Sahil Vaid', 'Dhiraj Kumar', NULL, NULL, NULL, 'Dhiraj Kumar', 'Attar Singh Saini', 'Amol Shrivastava, Abhishek Talented', 'Sharvan Agarwal, Dhiraj Kumar, Vaseem Qureshi', 'Insite India, Yellow Ant Productions', NULL, 0, 1, 11, 1, '2024-11-22 00:00:00', 2, '2024-11-03 16:29:26', '2024-12-23 12:35:38', NULL),
(8, 'Moana 2', 'Moana 2: Release Date, Trailer, Songs, Cast', NULL, 2, 'moana-2-movie-2024', 'Moana 2 Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Moana 2 Movie: Find Moana 2 movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Moana 2,Moana 2 cast,Moana 2 director,Moana 2 trailer,Moana 2 ad teaser', 'movies/view/moana-2-movie-2024', NULL, 'movies_image/file_1732967606.jpg', 'Auli\'i Cravalho, Dwayne Johnson, Hualālai Chung, Rose Matafeo, David Fane, Awhimai Fraser, Khaleesi Lambert-Tsuda, Temuera Morrison, Nicole Scherzinger, Rachel House, Gerald Ramsey, Alan Tudyk, Jemaine Clement, Tofiga Fepulea\'i, Tiana Johnson, Jasmine Johnson, Ata Maivia Johnson, Bryson Chun, Noemi Josefina Flores, Setarosa Tuitasi-Ledoux, Bentley Pupuhi-Fernandez', 'David G. Derrick Jr.', '01:40:00', NULL, NULL, 'Jared Bush, Dana Ledoux Miller', NULL, 'Mark Mancina, Opetaia Foa\'i', 'Christina Chen, Yvett Merino Flores', 'Walt Disney Pictures, Walt Disney Animation Studios, Walt Disney Animation Studios', 'U', 0, 1, 4, 1, '2024-11-27 00:00:00', 2, '2024-11-30 15:04:10', '2024-12-05 22:02:19', NULL),
(9, 'The World According to Kaleb - On Tour', 'The World According to Kaleb - On Tour: Release Date, Trailer, Songs, Cast', NULL, 2, 'the-world-according-to-kaleb-on-tour-movie-2024', 'The World According to Kaleb - On Tour Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'The World According to Kaleb - On Tour Movie: Find The World According to Kaleb - On Tour movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'The World According to Kaleb - On Tour,The World According to Kaleb - On Tour cast,The World According to Kaleb - On Tour director,The World According to Kaleb - On Tour trailer,The World According to Kaleb - On Tour ad teaser', 'movies/view/the-world-according-to-kaleb-on-tour-movie-2024', NULL, 'movies_image/file_1732968181.jpg', 'Kaleb Cooper', 'Abigail Dankwa', '01:07:00', NULL, '18+', NULL, NULL, NULL, NULL, 'Expectation Entertainment', NULL, 0, 1, 18, 1, '2024-11-28 00:00:00', 2, '2024-11-30 17:30:47', '2024-12-23 12:21:52', NULL),
(10, 'Blitz', 'Blitz: Release Date, Trailer, Songs, Cast', NULL, 2, 'blitz-movie-2024', 'Blitz Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Blitz Movie: Find Blitz movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Blitz,Blitz cast,Blitz director,Blitz trailer,Blitz ad teaser', 'movies/view/blitz-movie-2024', NULL, 'movies_image/file_1732968445.jpg', 'Elliott Heffernan, Saoirse Ronan, Harris Dickinson, Benjamin Clémentine, Kathy Burke, Paul Weller, Stephen Graham, Leigh Gill, Mica Ricketts, CJ Beckford, Alex Jennings, Joshua McGuire, Hayley Squires, Erin Kellyman, Sally Messham, Josef Altin, Sandra Huggett, Thea Achillea, Grahame Fox, David Kirkbride, Tommy Daley, Thomas Aitch, Charlie Hodson-Prior, Fraser Holmes, Gavi Singh Chera, Gerard Monaco, Max Gold, Matt Bardock, Lizzie Hopley, Heather Craney, Christopher Chung, Patrick Buckley, Linton Kwesi Johnson, John Mackay, Adam Somner, Liam Smith, Sue Maund, Steve Paget, Jonathan Kemp, Jim Conway, Charlie Irwin, Rufus Bateman, Mickey McAnulty, Lacey Leigh Payne, Blake Williams, Isaac Highams, Tony Turner, Jack Shalloo, Shaun Mason, Lisa Ronaghan, Janet Greaves, Grace Boyle, Gracie Cochrane, Ciara Baxendale, Anne Bird, Jack Bence, Tom Padley, Lizzie Roper, Tim Treloar, David Moorst, Kenny Fullwood, Jonathan Dryden Taylor, Robert Whitelock, Dominic Coleman, Bryony Hannah, Jay Simpson, Ella Dunlop, Johanna Allitt, Neal Barry, Andrew Caley, Calum Callaghan, Jem Wall, Gary Bates, Oengus MacNamara, Will Atiomo, Andrea Gordon, Ben Felton, Natasha Arancini, Alicia Grace Turrell, Natalie Quarry, Duncan Airlie James, Heather Coombs, Sandra Huggett, Ben Fox, John Cummins, Florence Dobson, Nancy Sullivan, Mark Field, Lucy Russell, Alexandra Afryea, Pierre Bergman, Gianni Calchetti, Stuart Cooke, Nigel Finnissy, Jean-Pascal Heynemand, Ty Hurley, Tim Faraday, Cache Thake', 'Steve McQueen', '02:00:00', NULL, '13+', 'Steve McQueen', 'Yorick Le Saux', 'Hans Zimmer', 'Tim Bevan, Steve McQueen, Yariv Milchan, Eric Fellner, Arnon Milchan, Anita Overland, Michael Schaefer, Adam Somner', 'Working Title Films, New Regency Pictures, Lammas Park', 'U/A', 0, 1, 6, 1, '2024-11-01 00:00:00', 2, '2024-11-30 17:34:52', '2024-12-23 12:41:18', NULL),
(11, 'Bread & Roses', 'Bread & Roses: Release Date, Trailer, Songs, Cast', NULL, 2, 'bread-&-roses-movie-2024', 'Bread & Roses Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Bread & Roses Movie: Find Bread & Roses movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Bread & Roses,Bread & Roses cast,Bread & Roses director,Bread & Roses trailer,Bread & Roses ad teaser', 'movies/view/bread-&-roses-movie-2024', NULL, 'movies_image/file_1732968763.jpg', NULL, 'Sahra Mani', '01:30:00', NULL, '14+', NULL, 'Abdul Sami Murtaza', 'Masoud Sekhavat Doust', 'Jennifer Lawrence, Justine Ciarrocchi, Sahra Mani', 'Excellent Cadaver, Eyan Foundation, Extracurricular', NULL, 0, 1, 7, 1, '2024-11-22 00:00:00', 2, '2024-11-30 17:40:44', '2024-12-05 22:02:07', NULL),
(12, 'Vaa Vaathiyaar', 'Vaa Vaathiyaar: Release Date, Trailer, Songs, Cast', NULL, 3, 'vaa-vaathiyaar-movie-2025', 'Vaa Vaathiyaar Movie  | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Vaa Vaathiyaar Movie: Find Vaa Vaathiyaar movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Vaa Vaathiyaar,Vaa Vaathiyaar cast,Vaa Vaathiyaar director,Vaa Vaathiyaar trailer,Vaa Vaathiyaar ad teaser', 'movies/view/vaa-vaathiyaar-movie-2025', NULL, 'movies_image/file_1732969056.jpg', 'Karthi, Krithi Shetty, Sathyaraj, Anandaraj, Rajkiran, Karunakaran, G. M. Sundar, Madhur Mittal', 'Nalan Kumarasamy', '00:00:00', NULL, NULL, 'Nalan Kumarasamy', 'George C. Williams', 'Santhosh Narayanan', 'K. E. Gnanavelraja', 'Studio Green', NULL, 0, 1, 6, 1, NULL, 2, '2024-11-30 17:44:50', '2024-12-23 12:36:25', NULL),
(13, 'Kantara Chapter 1', 'Kantara Chapter 1: Release Date, Trailer, Songs, Cast', NULL, 3, 'kantara-chapter-1-movie-2025', 'Kantara Chapter 1 Movie 2025 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Kantara Chapter 1 Movie: Find Kantara Chapter 1 movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Kantara Chapter 1,Kantara Chapter 1 cast,Kantara Chapter 1 director,Kantara Chapter 1 trailer,Kantara Chapter 1 ad teaser', 'movies/view/kantara-chapter-1-movie-2025', NULL, 'movies_image/file_1732969449.jpg', 'Rishab Shetty, Achyuth Kumar, Sapthami Gowda, Sriram Reddy Polasane, Manasi Sudhir, Shine Shetty', 'Rishab Shetty', '00:00:00', NULL, NULL, 'Rishab Shetty', 'Arvind Kashyap', 'B. Ajaneesh Loknath', 'Vijay Kiragandur', 'Hombale Films', NULL, 0, 1, 12, 1, '2025-10-02 00:00:00', 2, '2024-11-30 17:50:03', '2024-12-22 01:51:35', NULL),
(14, 'Chhatrapati Shivaji Maharaj', 'Chhatrapati Shivaji Maharaj: Release Date, Trailer, Songs, Cast', NULL, 3, 'chhatrapati-shivaji-maharaj-movie-2026', 'Chhatrapati Shivaji Maharaj Movie 2026 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Chhatrapati Shivaji Maharaj Movie: Find Chhatrapati Shivaji Maharaj movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Chhatrapati Shivaji Maharaj,Chhatrapati Shivaji Maharaj cast,Chhatrapati Shivaji Maharaj director,Chhatrapati Shivaji Maharaj trailer,Chhatrapati Shivaji Maharaj ad teaser', 'movies/view/chhatrapati-shivaji-maharaj-movie-2026', NULL, 'movies_image/file_1732970028.jpg', 'Shahid Kapoor', 'Amit Rai', '00:00:00', NULL, NULL, NULL, 'Aseem Bajaj', NULL, 'Ashwin Varde, Rajesh Bahl, Dil Raju, Vipul D. Shah', 'Immerso Studios, Legend Studios presentation', NULL, 0, 1, 13, 1, '2026-01-23 00:00:00', 2, '2024-11-30 18:00:34', '2024-12-21 23:39:41', NULL),
(15, 'Anel Meley Pani Thuli', 'Anel Meley Pani Thuli: Release Date, Trailer, Songs, Cast', NULL, 3, 'anel-meley-pani-thuli-movie-2022', 'Anel Meley Pani Thuli Movie 2022 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Anel Meley Pani Thuli Movie: Find Anel Meley Pani Thuli movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Anel Meley Pani Thuli,Anel Meley Pani Thuli cast,Anel Meley Pani Thuli director,Anel Meley Pani Thuli trailer,Anel Meley Pani Thuli ad teaser', 'movies/view/anel-meley-pani-thuli-movie-2022', NULL, 'movies_image/file_1732970966.jpg', 'Andrea Jeremiah, Aadhav Kannadasan, N. Azhagamperumal, Ilavarasu, Anupama Kumar, Lovelyn Chandrasekhar, Viji Chandrasekhar, Nithin George, \'Jeeva\' Ravi, Dr. Vidhya Borgia, Muthu Nagu, Geetha Kailasam', 'R Kaiser Anand', '01:59:00', NULL, NULL, 'R Kaiser Anand', 'R. Velraj', 'Santhosh Narayanan', 'Vetrimaaran', 'Grassroot Film Company', NULL, 0, 1, 6, 1, '2022-11-18 00:00:00', 2, '2024-11-30 18:16:54', '2024-12-20 00:25:50', NULL),
(16, 'Mechanic Rocky', 'Mechanic Rocky: Release Date, Trailer, Songs, Cast', NULL, 4, 'mechanic-rocky-movie-2024', 'Mechanic Rocky Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Mechanic Rocky Movie: Find Mechanic Rocky movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Mechanic Rocky,Mechanic Rocky cast,Mechanic Rocky director,Mechanic Rocky trailer,Mechanic Rocky ad teaser', 'movies/view/mechanic-rocky-movie-2024', NULL, 'movies_image/file_1732979409.jpg', 'Shraddha Srinath, Sunil, Vishwak Sen, Raghu Ram, V.K. Naresh, Meenaakshi Chaudhary, Harsha Vardhan, Hyper Aadi, Viva Harsha', 'Ravi Teja Mullapudi', '02:36:00', NULL, NULL, 'Ravi Teja Mullapudi', 'Manojh Katasani', 'Jakes Bejoy', 'Ram Talluri', 'SRT Entertainments', 'U/A', 0, 1, 5, 1, '2024-11-22 00:00:00', 2, '2024-11-30 20:36:43', '2024-12-15 15:35:40', NULL),
(17, 'Zebra', 'Zebra: Release Date, Trailer, Songs, Cast', NULL, 4, 'zebra-movie-2024', 'Zebra Movie  | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Zebra Movie: Find Zebra movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Zebra,Zebra cast,Zebra director,Zebra trailer,Zebra ad teaser', 'movies/view/zebra-movie-2024', NULL, 'movies_image/file_1732980154.jpg', 'Satyadev Kancharana, Dhananjaya, Sathyaraj, Priya Bhavani Shankar, Amrutha Iyengar, Sunil, Jeniffer Piccinato, Satya, Suresh Chandra Menon, Mahadevan, Kalyani Natarajan', 'Eashvar Karthic', '02:44:00', NULL, NULL, 'Eashvar Karthic', 'Sathya Ponmar', 'Ravi Basrur', 'Bala Sundaram, S. N. Reddy, Dinesh Sundaram', 'Old Town Pictures, Padmaja Films', NULL, 0, 1, 37, 1, '2024-11-22 00:00:00', 2, '2024-11-30 20:46:50', '2024-12-23 12:05:37', NULL),
(18, 'Matka', 'Matka: Release Date, Trailer, Songs, Cast', NULL, 4, 'matka-movie-2024', 'Matka Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Matka Movie: Find Matka movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Matka,Matka cast,Matka director,Matka trailer,Matka ad teaser', 'movies/view/matka-movie-2024', NULL, 'movies_image/file_1732980662.jpg', 'Varun Tej, Nora Fatehi, Meenakshi Chowdary, Naveen Chandra, Kannada Kishore, Ajay Ghosh, Mime Gopi, Roopa lakshmi, Vijayrama Raju, Jagadeesh, Raj Thirandas', 'Karuna Kumar', '02:39:00', NULL, '16+', 'Karuna Kumar', 'A. Kishore Kumar', 'G. V. Prakash Kumar', 'Dr. Vijender Reddy Teegala, Rajani Talluri', 'Vyra Entertainments, SRT Entertainments', 'U/A', 0, 1, 15, 1, '2024-11-14 00:00:00', 2, '2024-11-30 20:56:25', '2024-12-23 12:43:55', NULL),
(28, 'Pushpa 2 - The Rule', 'Pushpa 2 - The Rule: Release Date, Trailer, Songs, Cast', 'Crime, Action, Thriller', 1, 'pushpa-2---the-rule-movie-2024', 'Pushpa 2 - The Rule Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Pushpa 2 - The Rule Movie: Find Pushpa 2 - The Rule movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Pushpa 2 - The Rule,Pushpa 2 - The Rule cast,Pushpa 2 - The Rule director,Pushpa 2 - The Rule trailer,Pushpa 2 - The Rule ad teaser', 'movies/view/pushpa-2---the-rule-movie-2024', NULL, NULL, 'Allu Arjun, Rashmika Mandanna, Fahadh Faasil, Jagadeesh Bandari, Rao Ramesh, Sunil Varma, Anasuya Bharadwaj, Ajay, Kalpalatha, Pavani Karanam, Shri Tej, Brahmaji, Jagapati Babu, Tarak Ponnappa, Adithya Menon, Divi Vadthya, Adukalam Naren, Saurabh Sachdeva, Dhananjay, Mime Gopi, Satya, Sreeleela, Moyen Uddin', 'Sukumar', '03:18:00', 'https://image.tmdb.org/t/p/w500/1T21FblunT0y8fz7YaW8JMYgUKm.jpg', NULL, 'Sukumar, Sukumar', 'Mirosław Kuba Brożek', 'Devi Sri Prasad, Sam C S', 'Naveen Yerneni, Y. Ravi Shankar', 'Mythri Movie Makers, Sukumar Writings', NULL, 0, 1, 8, 1, '2024-12-04 00:00:00', 2, '2024-12-25 16:27:57', '2024-12-25 17:11:12', NULL),
(29, 'Christmas Eve in Miller’s Point', 'Christmas Eve in Miller’s Point: Release Date, Trailer, Songs, Cast', 'Drama, Comedy', 2, 'christmas-eve-in-miller’s-point-movie-2024', 'Christmas Eve in Miller’s Point Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Christmas Eve in Miller’s Point Movie: Find Christmas Eve in Miller’s Point movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Christmas Eve in Miller’s Point,Christmas Eve in Miller’s Point cast,Christmas Eve in Miller’s Point director,Christmas Eve in Miller’s Point trailer,Christmas Eve in Miller’s Point ad teaser', 'movies/view/christmas-eve-in-miller’s-point-movie-2024', NULL, NULL, 'Matilda Fleming, Maria Dizzia, Ben Shenkman, Francesca Scorsese, Elsie Fisher, Michael Cera, Gregg Turkington, Sawyer Spielberg, Chris Lazzaro, Leo Chan, JoJo Cincinnati, Lev Cameron, Caveh Zahedi, Courtney Warner, Gregory Falatek, Laura Wernette, Aristotle Georgeson, Brittany Hughes, Shane Fleming, Delancey Shapiro, Julianna Wohlrab, Tony Savino, Tyler Diamond, Brendan Burt, Jordan Barringer, Ava Francesca Renne, Austin Lago, Grege Morris, Maria Carucci, Derek Trendz, Laura Robards, Lee Hervey, Anastasia Arcese, Anthony Martinelli-Maggio, Jax Terry, Billy Mcshane, Liam Mijares, Emily Morgan Marcello, Cameron Veintidos, Joyitha Mandal, Keon Mosley, Justin Longo, John J. Trischetti Jr., Simone Mijares, Daniel Hudson, Jackson Mijares, Mary Reistetter, Steve Alleva, Pavel Banzaraktsaev, Nathan Dapaah, Travis Maffei, Sean Carr, Ollie Hellerman, Justin H. Smith, Kona Davis, Steve Plati, Jon LeVert, Lisa LoCicero', 'Tyler Taormina', '01:47:00', 'https://image.tmdb.org/t/p/w500/tJ5q6TbdRtoXDqXdkbg4aGGLLkC.jpg', NULL, 'Eric Berger, Tyler Taormina', 'Carson Lund', NULL, 'Tyler Taormina, Eric Berger, Krista Minto, Duncan Sullivan, Kim Dai, David Entin, Michael Jeffrey Davis, Oliver Toy, Kevin Anton, David Croley Broyles, Calogero Carucci, Michael J. Reistetter, Michael Cera, Rob Rice', 'Omnes Films, Dweck Productions, Crypto Castle Productions, Puente Films, Parsifal Pictures, NOIZ Entertainment', NULL, 0, 1, 0, 1, '2024-11-08 00:00:00', 2, '2024-12-26 09:45:46', '2024-12-26 09:46:14', NULL),
(30, 'Zero Se Restart', 'Zero Se Restart: Release Date, Trailer, Songs, Cast', 'Documentary', 1, 'zero-se-restart-movie-2024', 'Zero Se Restart Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Zero Se Restart Movie: Find Zero Se Restart movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Zero Se Restart,Zero Se Restart cast,Zero Se Restart director,Zero Se Restart trailer,Zero Se Restart ad teaser', 'movies/view/zero-se-restart-movie-2024', NULL, NULL, 'Vidhu Vinod Chopra, Vikrant Massey, Anant Joshi, Medha Shankr', 'Jaskunwar Kohli', '01:13:00', 'https://image.tmdb.org/t/p/w500/9bq3meyvTnXt4t2aF11ZH4f9ii9.jpg', NULL, NULL, NULL, NULL, 'Vidhu Vinod Chopra', 'Vinod Chopra Films', NULL, 0, 1, 8, 1, '2024-12-13 00:00:00', 2, '2024-12-26 09:46:58', '2024-12-26 10:21:40', NULL),
(31, 'Agni', 'Agni: Release Date, Trailer, Songs, Cast', 'Action, Drama, Thriller', 1, 'agni-movie-2024', 'Agni Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Agni Movie: Find Agni movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Agni,Agni cast,Agni director,Agni trailer,Agni ad teaser', 'movies/view/agni-movie-2024', NULL, NULL, 'Pratik Gandhi, Divyendu Sharma, Jitendra Joshi, Sai Tamhankar, Saiyami Kher, Udit Arora, Kabir Shah, Pramod Pathak, Kundan Roy, Sakhi Gokhale, Jaywant Wadkar, Anant Jog, Nitin Dhongade', 'Rahul Dholakia', '02:02:00', 'https://image.tmdb.org/t/p/w500/zx3UOe5rZ7uH5lMs3JxEMU0nNXB.jpg', NULL, 'Rahul Dholakia', NULL, NULL, 'Farhan Akhtar, Ritesh Sidhwani', 'Excel Entertainment, Amazon MGM Studios', NULL, 0, 1, 0, 1, '2024-12-06 00:00:00', 2, '2024-12-26 09:48:32', '2024-12-26 09:49:56', NULL),
(32, 'Chhaava', 'Chhaava: Release Date, Trailer, Songs, Cast', 'Drama, History', 1, 'chhaava-movie-2025', 'Chhaava Movie 2025 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Chhaava Movie: Find Chhaava movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Chhaava,Chhaava cast,Chhaava director,Chhaava trailer,Chhaava ad teaser', 'movies/view/chhaava-movie-2025', NULL, NULL, 'Vicky Kaushal, Rashmika Mandanna, Akshaye Khanna, Ashutosh Rana, Divya Dutta, Pradeep Ram Singh Rawat, Vineet Kumar Singh, Neil Bhoopalam, Santosh Juvekar, Rajiv Kachroo, Ashish Pathode', 'Laxman Utekar', '00:00:00', 'https://image.tmdb.org/t/p/w500/9F4lPRLjfBjsu0zjWNOZQMa8a4V.jpg', NULL, 'Rishi Virmani', NULL, 'A.R. Rahman', 'Dinesh Vijan', 'Maddock Films', NULL, 0, 1, 0, 1, '2025-02-14 00:00:00', 2, '2024-12-26 09:49:59', '2024-12-26 09:50:24', NULL),
(33, 'Despatch', 'Despatch: Release Date, Trailer, Songs, Cast', 'Drama, Thriller', 1, 'despatch-movie-2024', 'Despatch Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Despatch Movie: Find Despatch movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Despatch,Despatch cast,Despatch director,Despatch trailer,Despatch ad teaser', 'movies/view/despatch-movie-2024', NULL, NULL, 'Manoj Bajpayee, Shahana Goswami, Archita Agarwal, Anand Alkunte, Mamik Singh, Riju Bajaj, Veena Mehta, Rii Sen, Kabir Sadanand', 'Kanu Behl', '02:31:00', 'https://image.tmdb.org/t/p/w500/rZKdw7utYMMwI6E2KIeox7G5kKF.jpg', NULL, 'Ishani Banerjee, Kanu Behl', 'Siddharth Diwan', NULL, 'Ronnie Screwvala', 'RSVP Movies', NULL, 0, 1, 0, 1, '2024-10-19 00:00:00', 2, '2024-12-26 09:50:55', '2024-12-26 09:51:14', NULL),
(34, 'Lucky Baskhar', 'Lucky Baskhar: Release Date, Trailer, Songs, Cast', 'Drama, Thriller, Crime', 4, 'lucky-baskhar-movie-2024', 'Lucky Baskhar Movie 2024 | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - w3coderschool', 'Lucky Baskhar Movie: Find Lucky Baskhar movie release date, cast, trailer, review, critics rating, duration on w3coderschool', 'Lucky Baskhar,Lucky Baskhar cast,Lucky Baskhar director,Lucky Baskhar trailer,Lucky Baskhar ad teaser', 'movies/view/lucky-baskhar-movie-2024', NULL, NULL, 'Dulquer Salmaan, Meenakshi Chaudhary, Rajkumar Kasireddy, Ramki, Maganti Srinath, Sai Kumar, Sachin Khedekar, Tinnu Anand, Gayatri Bhargavi, Sivannarayana Naripeddi, Rithvik, Sudha, Micky Makhija, Charan Lakkaraju, Ananya Sharma, Surya Srinivas, Raghu Babu, Hyper Adhi, Mahesh Achanta, Maanasa Chaudhary', 'Venky Atluri', '02:28:00', 'https://image.tmdb.org/t/p/w500/a47JQFl9L7VDa79tEvnTOJe0rPa.jpg', NULL, 'Venky Atluri', 'Nimish Ravi', 'G. V. Prakash Kumar', 'Sai Soujanya, Suryadevara Naga Vamsi', 'Sithara Entertainments, Fortune Four Cinemas, Srikara Studios', NULL, 0, 1, 0, 1, '2024-10-30 00:00:00', 2, '2024-12-26 09:51:51', '2024-12-26 09:53:59', NULL),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, NULL, 2, '2025-03-22 11:02:15', '2025-03-22 11:02:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_attachments`
--

CREATE TABLE `movie_attachments` (
  `id` int(11) NOT NULL,
  `file` text NOT NULL,
  `file_type` int(11) NOT NULL DEFAULT 1 COMMENT '	1->image, 2->gif, 3->video	',
  `movie_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_attachments`
--

INSERT INTO `movie_attachments` (`id`, `file`, `file_type`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 'movie_attachments/file_1729920860.webp', 1, 1, '2024-10-26 11:04:20', '2024-10-26 11:04:20'),
(2, 'movie_attachments/file_1729921842.svg', 1, 1, '2024-10-26 11:20:42', '2024-10-26 11:20:42'),
(3, 'movie_attachments/file_1729934174.webp', 1, 2, '2024-10-26 14:46:14', '2024-10-26 14:46:14'),
(4, 'movie_attachments/file_1730050872.webp', 1, 3, '2024-10-27 23:11:12', '2024-10-27 23:11:12'),
(5, 'movie_attachments/file_1730626624.webp', 1, 4, '2024-11-03 15:07:04', '2024-11-03 15:07:04'),
(6, 'movie_attachments/file_1730628272.webp', 1, 5, '2024-11-03 15:34:32', '2024-11-03 15:34:32'),
(7, 'movie_attachments/file_1730630856.webp', 1, 6, '2024-11-03 16:17:36', '2024-11-03 16:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `movie_contents`
--

CREATE TABLE `movie_contents` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_contents`
--

INSERT INTO `movie_contents` (`id`, `movie_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, '<h2>About Kalki 2898 AD Movie (2024)</h2>\r\n<p>Experience an epic sci-fi drama featuring top stars Deepika Padukone, Amitabh Bachchan, and Prabhas in lead roles. Directed by National Award-winner Nag Ashwin, this movie marks the first on-screen collaboration between Padukone and Prabhas.</p>\r\n<h2>Kalki 2898 AD Movie (2024) Trailer</h2>\r\n<p><a title=\"Kalki 2898 AD Trailer (2024)\" href=\"https://youtu.be/kQDd1AhGIHk?si=nys3b2sGi8oqn5nJ\" target=\"_blank\" rel=\"noopener\"><img src=\"../../../movie_attachments/file_1729920860.webp\" alt=\"Kalki 2898 AD\" width=\"1200\" height=\"675\" /></a></p>\r\n<h2>Kalki 2898 AD Movie (2024) Songs</h2>\r\n<div class=\"table-responsive\">\r\n<table>\r\n<thead>\r\n<tr>\r\n<th>S.No</th>\r\n<th>Title</th>\r\n<th>Artist</th>\r\n<th>Duration</th>\r\n<th>Watch</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>1</td>\r\n<td>The Great War</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:08</td>\r\n<td><a title=\"The Great War\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td>Ashwa Curse</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>0:54</td>\r\n<td><a title=\"Ashwa Curse\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>Keshava Madhava</td>\r\n<td>Amitabh Bachchan</td>\r\n<td>1:30</td>\r\n<td><a title=\"Keshava Madhava\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>Pursuit of Life</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>0:58</td>\r\n<td><a title=\"Pursuit of Life\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>5</td>\r\n<td>A World Of Treasures</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>2:38</td>\r\n<td><a title=\"A World Of Treasures\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>6</td>\r\n<td>Manas</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:10</td>\r\n<td><a title=\"Manas\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>7</td>\r\n<td>Complex Tour</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:20</td>\r\n<td><a title=\"Complex Tour\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>8</td>\r\n<td>Puttinavaniki</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:32</td>\r\n<td><a title=\"Puttinavaniki\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>9</td>\r\n<td>SUM 80</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:17</td>\r\n<td><a title=\"SUM 80\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>10</td>\r\n<td>Extraction</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:17</td>\r\n<td><a title=\"Extraction\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>11</td>\r\n<td>Yashkin</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>2:16</td>\r\n<td><a title=\"Yashkin\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>12</td>\r\n<td>The Child Within</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:58</td>\r\n<td><a title=\"The Child Within\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>13</td>\r\n<td>Hey Chintoo</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>0:52</td>\r\n<td><a title=\"Hey Chintoo\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>14</td>\r\n<td>Boy From Kasi</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:06</td>\r\n<td><a title=\"Boy From Kasi\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>15</td>\r\n<td>Where Is My Rent ?</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>0:51</td>\r\n<td><a title=\"Where Is My Rent ?\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>16</td>\r\n<td>Ashwathama</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>2:24</td>\r\n<td><a title=\"Ashwathama\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>17</td>\r\n<td>The Escape</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>0:40</td>\r\n<td><a title=\"The Escape\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>18</td>\r\n<td>Kyra</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>2:18</td>\r\n<td><a title=\"Kyra\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>19</td>\r\n<td>Lullaby</td>\r\n<td>Dhee</td>\r\n<td>1:07</td>\r\n<td><a title=\"Lullaby\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>20</td>\r\n<td>Meeting Mother</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:18</td>\r\n<td><a title=\"Meeting Mother\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>21</td>\r\n<td>Fist Fight</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>3:33</td>\r\n<td><a title=\"Fist Fight\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>22</td>\r\n<td>Bujji Theme</td>\r\n<td>Priya Ragu</td>\r\n<td>0:46</td>\r\n<td><a title=\"Bujji Theme\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>23</td>\r\n<td>Never Lost a Fight</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:17</td>\r\n<td><a title=\"Never Lost a Fight\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>24</td>\r\n<td>Shambala Rain</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>2:35</td>\r\n<td><a title=\"Shambala Rain\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>25</td>\r\n<td>Shambala</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>2:21</td>\r\n<td><a title=\"Shambala\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>26</td>\r\n<td>Ashwa Vs Ashwa</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:06</td>\r\n<td><a title=\"Ashwa Vs Ashwa\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>27</td>\r\n<td>Only Death Wins in War</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>2:18</td>\r\n<td><a title=\"Only Death Wins in War\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>28</td>\r\n<td>Final Flight</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>2:16</td>\r\n<td><a title=\"Final Flight\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>29</td>\r\n<td>Hero</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>1:40</td>\r\n<td><a title=\"Hero\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr>\r\n<td>30</td>\r\n<td>Veera Dheera</td>\r\n<td>Santhosh Narayanan</td>\r\n<td>4:05</td>\r\n<td><a title=\"Veera Dheera\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '2024-10-26 10:37:18', '2024-10-26 12:46:01'),
(2, 2, '<h2>About The Miranda Brothers Movie (2024)</h2>\r\n<p>Two brothers, one story - Football in their hearts, vengeance in their souls!</p>\r\n<h2>The Miranda Brothers Movie (2024) Trailer</h2>\r\n<p><a title=\"The Miranda Brothers Movie (2024) Trailer\" href=\"https://youtu.be/jvKeVRjEUQs\" target=\"_blank\" rel=\"noopener\"><img src=\"../../../movie_attachments/file_1729934174.webp\" alt=\"The Miranda Brothers Movie\" width=\"1200\" height=\"675\" /></a></p>\r\n<h2>The Miranda Brothers Movie (2024) Songs</h2>\r\n<div class=\"table-responsive\">\r\n<table>\r\n<thead>\r\n<tr>\r\n<th>S.No</th>\r\n<th>Title</th>\r\n<th>Artist</th>\r\n<th>Duration</th>\r\n<th>Watch</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>1</td>\r\n<td>Be My Mehbooba</td>\r\n<td>Darshan Raval, Neeti Mohan</td>\r\n<td>2:15</td>\r\n<td><a title=\"Be My Mehbooba\" href=\"https://www.youtube.com/watch?v=kqh6TPrt9QE\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Bade Miyan Chote Miyan - Title Track Song\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '2024-10-26 14:24:06', '2024-10-26 14:46:41'),
(3, 3, '<h2>About Navras Katha Collage Movie (2024)</h2>\r\n<p>This is a touching look at the navras, the nine basic emotions of life. Emotions like joy, sadness, anger, wonder, and more are carefully woven together to capture what it truly means to be human.</p>\r\n<h2>Navras Katha Collage Movie (2024) Trailer</h2>\r\n<p><a title=\"Navras Katha Collage Movie (2024) Trailer\" href=\"https://youtu.be/jSRBK1ZS4Ko\" target=\"_blank\" rel=\"noopener\"><img src=\"../../../movie_attachments/file_1730050872.webp\" alt=\"Navras Katha Collage Movie\" width=\"1200\" height=\"675\" /></a></p>', '2024-10-27 23:13:30', '2024-10-27 23:13:30'),
(4, 4, '<h2>About Do Patti Movie (2024)</h2>\r\n<p>We\'ve all met men who act one way and claim another. They abuse their wives, harass women, assert power, and still call themselves feminists who &ldquo;respect women.&rdquo; They don&rsquo;t deny their behavior, blaming victims or mocking them instead. These men, compensating for their own insecurities, exist in all parts of society</p>\r\n<h2>Do Patti Movie (2024) Trailer</h2>\r\n<p><a title=\"Do Patti Movie (2024) Trailer\" href=\"https://youtu.be/b6Z_RYC8IAQ\" target=\"_blank\" rel=\"noopener\"><img src=\"../../../movie_attachments/file_1730626624.webp\" alt=\"Do Patti Movie (2024) Trailer\" width=\"1200\" height=\"675\" /></a></p>\r\n<h2>Do Patti (2024) Songs</h2>\r\n<div class=\"table-responsive\">\r\n<table style=\"width: 32.5397%; height: 108px;\">\r\n<thead>\r\n<tr style=\"height: 18px;\">\r\n<th style=\"width: 9.87805%; height: 18px;\">S.No</th>\r\n<th style=\"width: 18.5637%; height: 18px;\">Title</th>\r\n<th style=\"width: 36.8022%; height: 18px;\">Artist</th>\r\n<th style=\"width: 17.8252%; height: 18px;\">Duration</th>\r\n<th style=\"width: 12.8489%; height: 18px;\">Watch</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr style=\"height: 36px;\">\r\n<td style=\"width: 9.87805%; height: 36px;\">1</td>\r\n<td style=\"width: 18.5637%; height: 36px;\">Raanjhan</td>\r\n<td style=\"width: 36.8022%; height: 36px;\">Parampara Tandon</td>\r\n<td style=\"width: 17.8252%; height: 36px;\">2:39</td>\r\n<td style=\"width: 12.8489%; height: 36px;\"><a title=\"Do Patti (2024) Songs - Raanjhan\" href=\"https://youtu.be/UCTzqlcar18\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Do Patti (2024) Songs - Raanjhan\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr style=\"height: 36px;\">\r\n<td style=\"width: 9.87805%; height: 36px;\">2</td>\r\n<td style=\"width: 18.5637%; height: 36px;\">Akhiyaan De Kol</td>\r\n<td style=\"width: 36.8022%; height: 36px;\">Shilpa Rao</td>\r\n<td style=\"width: 17.8252%; height: 36px;\">2:33</td>\r\n<td style=\"width: 12.8489%; height: 36px;\"><a title=\"Do Patti (2024) Songs - Akhiyaan De kol\" href=\"https://youtu.be/hz8wnxRxB6k\" target=\"_blank\" rel=\"noopener\"><img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Do Patti (2024) Songs - Akhiyaan De kol\" width=\"24\" height=\"24\" /></a></td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 9.87805%; height: 18px;\">3</td>\r\n<td style=\"width: 18.5637%; height: 18px;\">Jaadu</td>\r\n<td style=\"width: 36.8022%; height: 18px;\">Sachet Tandon</td>\r\n<td style=\"width: 17.8252%; height: 18px;\"><span style=\"color: #595959; font-family: Titillium, sans-serif; font-size: 15px; text-align: center; background-color: #ffffff;\">2:21</span></td>\r\n<td style=\"width: 12.8489%; height: 18px;\"><a title=\"Do Patti (2024) Songs - Jaadu\" href=\"https://youtu.be/feiYsmCE52c\" target=\"_blank\" rel=\"noopener\"><img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Do Patti (2024) Songs - Jaadu\" width=\"24\" height=\"24\" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '2024-11-03 15:18:55', '2024-11-03 15:18:55'),
(5, 5, '<h2>About Singham Again Movie (2024)</h2>\r\n<p>The third Singham movie stars Ajay Devgn, Akshay Kumar, Ranveer Singh, and Deepika Padukone.</p>\r\n<h2>Singham Again Movie (2024) Trailer</h2>\r\n<p><a title=\"Singham Again (2024) Trailer\" href=\"https://youtu.be/MD7v0-igVIM\" target=\"_blank\" rel=\"noopener\"><img src=\"../../../movie_attachments/file_1730628272.webp\" alt=\"Singham Again (2024) Trailer\" width=\"1200\" height=\"675\" /></a></p>\r\n<h2>Singham Again Movie (2024) Songs</h2>\r\n<div class=\"table-responsive\">\r\n<table style=\"width: 34.2152%; height: 78px;\">\r\n<thead>\r\n<tr style=\"height: 18px;\">\r\n<th style=\"width: 9.39433%; height: 18px;\">S.No</th>\r\n<th style=\"width: 27.7415%; height: 18px;\">Title</th>\r\n<th style=\"width: 29.8067%; height: 18px;\">Artist</th>\r\n<th style=\"width: 16.9523%; height: 18px;\">Duration</th>\r\n<th style=\"width: 12.2197%; height: 18px;\">Watch</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr style=\"height: 36px;\">\r\n<td style=\"width: 9.39433%; height: 36px;\">1</td>\r\n<td style=\"width: 27.7415%; height: 36px;\">Singham Again</td>\r\n<td style=\"width: 29.8067%; height: 36px;\">Santhosh Venky</td>\r\n<td style=\"width: 16.9523%; height: 36px;\">2:04</td>\r\n<td style=\"width: 12.2197%; height: 36px;\"><a title=\"Singham Again Movie (2024) Songs - Singham Again\" href=\"https://www.youtube.com/watch?v=kqh6TPrt9QE\" target=\"_blank\" rel=\"noopener\"> <img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Singham Again Movie (2024) Songs - Singham Again\" width=\"24\" height=\"24\" /> </a></td>\r\n</tr>\r\n<tr style=\"height: 24px;\">\r\n<td style=\"width: 9.39433%; height: 24px;\">2</td>\r\n<td style=\"width: 27.7415%; height: 24px;\">Jai Bajrangbali</td>\r\n<td style=\"width: 29.8067%; height: 24px;\">Srikrishna, Kareemullah, Arun Koundinya, Chaitu Satsangi, Sri Sai Charan, Sudhanshu, Ritesh G Rao, Saatvik G Rao, Prudhvi Chandra, Lakshmi Naidu, Adviteeya, Sruthi Ranjani, Pranati, Aishwarya Daruri, Sahithi Chaganti, Maneesha Pandranki, Shruthika, Lakshmi Meghana, Nadapriya Vagdevi</td>\r\n<td style=\"width: 16.9523%; height: 24px;\">2:37</td>\r\n<td style=\"width: 12.2197%; height: 24px;\"><a title=\"Singham Again Movie (2024) Songs - Jai Bajrangbali\" href=\"https://youtu.be/l_2ya_REWbk\" target=\"_blank\" rel=\"noopener\"><img style=\"display: block; margin-inline: auto;\" src=\"../../../movie_attachments/file_1729921842.svg\" alt=\"Singham Again Movie (2024) Songs - Jai Bajrangbali\" width=\"24\" height=\"24\" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '2024-11-03 15:41:42', '2024-11-03 15:45:22'),
(6, 6, '<h2>About Dhadak 2 Movie (2024)</h2>\r\n<p>It follows two lovers, Siddhant Chaturvedi and Triptii Dimri, who face challenges due to their big class difference.</p>\r\n<h2>Dhadak 2 Movie (2024) Trailer</h2>\r\n<p><a title=\"Dhadak 2 (2024) Trailer\" href=\"https://youtu.be/iSOAOvIozDQ\" target=\"_blank\" rel=\"noopener\"><img src=\"../../../movie_attachments/file_1730630856.webp\" alt=\"Dhadak 2 (2024) Trailer\" width=\"1200\" height=\"675\" /></a></p>', '2024-11-03 16:21:45', '2024-11-03 16:21:45'),
(7, 7, '<h2>About Suswagatam Khushaamadeed Movie (2024)</h2>\r\n<p>A Hindi romantic drama starring Isabelle Kaif and Pulkit Samrat in the main roles.</p>', '2024-11-03 16:37:06', '2024-11-03 16:37:06'),
(8, 8, '<h2>About Moana 2 Movie 2024</h2>\r\n<p><strong>Moana 2</strong> is a 1 hour and 40 minutes Animation, Adventure, Family, Comedy film directed by David G. Derrick Jr. and written by Jared Bush, Dana Ledoux Miller. Produced by Christina Chen, Yvett Merino Flores under the banners of Walt Disney Pictures, Walt Disney Animation Studios, Walt Disney Animation Studios, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Auli\'i Cravalho as Moana (voice)</li>\r\n<li>Dwayne Johnson as Maui (voice)</li>\r\n<li>Hualālai Chung as Moni (voice)</li>\r\n<li>Rose Matafeo as Loto (voice)</li>\r\n<li>David Fane as Kele (voice)</li>\r\n<li>Awhimai Fraser as Matangi (voice)</li>\r\n<li>Khaleesi Lambert-Tsuda as Simea (voice)</li>\r\n<li>Temuera Morrison as Chief Tui (voice)</li>\r\n<li>Nicole Scherzinger as Sina (voice)</li>\r\n<li>Rachel House as Gramma Tala (voice)</li>\r\n<li>Gerald Ramsey as Tautai Vasa (voice)</li>\r\n<li>Alan Tudyk as Hei Hei (voice)</li>\r\n<li>Jemaine Clement as Tamatoa (voice)</li>\r\n<li>Tofiga Fepulea\'i as Nalo (voice)</li>\r\n<li>Tiana Johnson as Moanabe (voice)</li>\r\n<li>Jasmine Johnson as Moanabe (voice)</li>\r\n<li>Ata Maivia Johnson as Villager (voice)</li>\r\n<li>Bryson Chun as Additional Voices (voice)</li>\r\n<li>Noemi Josefina Flores as Additional Voices (voice)</li>\r\n<li>Setarosa Tuitasi-Ledoux as Additional Voices (voice)</li>\r\n</ul>\r\n<p>With music by Mark Mancina, Opetaia Foa\'i, and cinematography by ,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>After receiving an unexpected call from her wayfinding ancestors, Moana journeys alongside Maui and a new crew to the far seas of Oceania and into dangerous, long-lost waters for an adventure unlike anything she\'s ever faced.</p>\r\n<p>Country : <strong>Canada, United States of America</strong></p>\r\n<p>Release Date : <strong>2024-11-27</strong></p>\r\n<p>Rating : <strong>7.035 / 10</strong></p>\r\n<h2>Moana 2 Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/tElnmtQ6yz1PjN1kePNl8yMSb59.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/jucn2CMjsraKDGUJ9eAfm3ZqvMI.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/6cXqnUlCklzV52kqyn3EEqDonyM.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/4oYaZcYovt34sd60X2IL0ayg2js.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/gBp4DWiyl7sUMKPBDVM4MyVTuIV.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-11-30 17:23:26', '2024-11-30 17:23:26'),
(9, 9, '<h2>About The World According to Kaleb - On Tour Movie 2024</h2>\r\n<p><strong>The World According to Kaleb - On Tour</strong> is a 1 hour and 7 minutes Comedy film directed by Abigail Dankwa and written by . Produced by under the banners of Expectation Entertainment, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Kaleb Cooper as</li>\r\n</ul>\r\n<p>With music by , and cinematography by ,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>Filmed live at the Cheltenham Everyman Theatre, this special captures Kaleb Cooper\'s humorous takes on farming, life, and his unique perspectives on British culture.</p>\r\n<p>Country : <strong>United Kingdom</strong></p>\r\n<p>Release Date : <strong>2024-11-28</strong></p>\r\n<p>Rating :</p>\r\n<h2>The World According to Kaleb - On Tour Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/zvbC0RhXeI9deBtGuzF5Z3bXWSV.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/c5rfgBFwUzac4lZq3NNziOy8g1X.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-11-30 17:33:01', '2024-11-30 17:33:01'),
(10, 10, '<h2>About Blitz Movie 2024</h2>\r\n<p><strong>Blitz</strong> is a War, Drama, History film directed by Steve McQueen and written by Steve McQueen. Produced by Tim Bevan, Steve McQueen, Yariv Milchan, Eric Fellner, Arnon Milchan, Anita Overland, Michael Schaefer, Adam Somner under the banners of Working Title Films, New Regency Pictures, Lammas Park, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Elliott Heffernan as George</li>\r\n<li>Saoirse Ronan as Rita</li>\r\n<li>Harris Dickinson as Jack</li>\r\n<li>Benjamin Cl&eacute;mentine as Ife</li>\r\n<li>Kathy Burke as Beryl</li>\r\n<li>Paul Weller as Gerald</li>\r\n<li>Stephen Graham as Albert</li>\r\n<li>Leigh Gill as Michael Davies</li>\r\n<li>Mica Ricketts as Jess</li>\r\n<li>CJ Beckford as Marcus</li>\r\n<li>Alex Jennings as Victor Smythe</li>\r\n<li>Joshua McGuire as Clive</li>\r\n<li>Hayley Squires as Tilda</li>\r\n<li>Erin Kellyman as Doris</li>\r\n<li>Sally Messham as Agnes</li>\r\n<li>Josef Altin as Harvey</li>\r\n<li>Sandra Huggett as Sarah</li>\r\n<li>Thea Achillea as Cathy</li>\r\n<li>Grahame Fox as Eric</li>\r\n<li>David Kirkbride as Frank</li>\r\n</ul>\r\n<p>With music by Hans Zimmer, and cinematography by Yorick Le Saux,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>In World War II London, nine-year-old George is evacuated to the countryside by his mother, Rita, to escape the bombings. Defiant and determined to return to his family, George embarks on an epic, perilous journey back home as Rita searches for him.</p>\r\n<p>Country : <strong>United Kingdom, United States of America</strong></p>\r\n<p>Release Date : <strong>2024-11-01</strong></p>\r\n<p>Rating : <strong>5.4 / 10</strong></p>\r\n<h2>Blitz Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/4eMqcuVITc6iY25rRApqRFGr5VP.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/2pd3YSXz47UD9Nlg2UrNmiNY7AE.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/D4HoVxKYwVgKHy0pmQjysJk2XZ.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/t0KDZof34xe6UKLGfIm2D8GucEu.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/qMucrLpJPcpoyVX5fMUik205QYE.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-11-30 17:37:25', '2024-11-30 17:37:25'),
(11, 11, '<h2>About Bread &amp; Roses Movie 2024</h2>\r\n<p><strong>Bread &amp; Roses</strong> is a 1 hour and 30 minutes Documentary film directed by Sahra Mani and written by . Produced by Jennifer Lawrence, Justine Ciarrocchi, Sahra Mani under the banners of Excellent Cadaver, Eyan Foundation, Extracurricular, the movie features an ensemble cast led by</p>\r\n<p>With music by Masoud Sekhavat Doust, and cinematography by Abdul Sami Murtaza,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>In the wake of the Taliban\'s return to power, a group of Kabul women lead a revolutionary fight for their rights&mdash;and their lives.</p>\r\n<p>Country : <strong>United States of America</strong></p>\r\n<p>Release Date : <strong>2024-11-22</strong></p>\r\n<p>Rating : <strong>7.7 / 10</strong></p>\r\n<h2>Bread &amp; Roses Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/c8StFjZLcGGXwGBFUFS2sbBL5ko.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/rTCIv1G3SsoUQVsqBVTmke6R5MH.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/xx6ocXUTsE1JYlOMoo8qM33zirA.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/4qyAzvJfXMHWSc0XYYU4JxZzcU6.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/kwNq2WlctXAxAMD66jAO4Sm3rV3.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-11-30 17:42:43', '2024-11-30 17:42:43'),
(12, 12, '<h2>About Vaa Vaathiyaar Movie</h2>\r\n<p><strong>Vaa Vaathiyaar</strong> is a Drama, Comedy film directed by Nalan Kumarasamy and written by Nalan Kumarasamy. Produced by K. E. Gnanavelraja under the banners of Studio Green, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Karthi as</li>\r\n<li>Krithi Shetty as</li>\r\n<li>Sathyaraj as</li>\r\n<li>G. M. Sundar as</li>\r\n<li>Rajkiran as</li>\r\n</ul>\r\n<p>With music by Santhosh Narayanan, and cinematography by George C. Williams,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>A fanatic fan of legendary actor MGR raises his grandson like a reincarnation of MGR. But does he grow like MGR? What happens when he grows differently, which is in conflict with the ideals of his grandfather?</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>Release Soon</strong></p>\r\n<p>Rating :</p>\r\n<h2>Vaa Vaathiyaar Photos</h2>\r\n<div class=\"row all-movie-photos\">&nbsp;</div>', '2024-11-30 17:47:36', '2024-11-30 17:47:36'),
(13, 13, '<h2>About Kantara Chapter 1 Movie 2025</h2>\r\n<p><strong>Kantara Chapter 1</strong> is a Action, Thriller film directed by Rishab Shetty and written by Rishab Shetty. Produced by Vijay Kiragandur under the banners of Hombale Films, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Rishab Shetty as</li>\r\n</ul>\r\n<p>With music by B. Ajaneesh Loknath, and cinematography by Arvind Kashyap,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>Prequel to 2022 box-office blockbuster film Kantara. Scheduled to release by late 2024 (Exact date yet to be announced).</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2025-10-02</strong></p>\r\n<p>Rating :</p>\r\n<h2>Kantara Chapter 1 Photos</h2>\r\n<div class=\"row all-movie-photos\">&nbsp;</div>', '2024-11-30 17:54:09', '2024-11-30 17:54:09'),
(14, 14, '<h2>About Chhatrapati Shivaji Maharaj Movie 2026</h2>\r\n<p><strong>Chhatrapati Shivaji Maharaj</strong> is a film directed by Amit Rai and written by . Produced by Ashwin Varde, Rajesh Bahl, Dil Raju, Vipul D. Shah under the banners of , the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Shahid Kapoor as</li>\r\n</ul>\r\n<p>With music by , and cinematography by ,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>Chhatrapati Shivaji Maharaj</p>\r\n<p>Country :</p>\r\n<p>Release Date : <strong>2026-01-23</strong></p>\r\n<p>Rating :</p>\r\n<h2>Chhatrapati Shivaji Maharaj Photos</h2>\r\n<div class=\"row all-movie-photos\">&nbsp;</div>', '2024-11-30 18:03:48', '2024-11-30 18:03:48'),
(15, 15, '<h2>About Anel Meley Pani Thuli Movie 2022</h2>\r\n<p><strong>Anel Meley Pani Thuli</strong> is a 1 hour and 59 minutes Drama, Thriller film directed by R Kaiser Anand and written by R Kaiser Anand. Produced by Vetrimaaran under the banners of Grassroot Film Company, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Andrea Jeremiah as Mathi</li>\r\n<li>Aadhav Kannadasan as Sharan</li>\r\n<li>N. Azhagamperumal as S.I. Thillai Nayagam</li>\r\n<li>Ilavarasu as Munusamy</li>\r\n<li>Anupama Kumar as Inspector Maragatham</li>\r\n<li>Lovelyn Chandrasekhar as Anitha</li>\r\n<li>Viji Chandrasekhar as Magistrate</li>\r\n<li>Nithin George as S.I. George</li>\r\n<li>\'Jeeva\' Ravi as Sharan\'s Father</li>\r\n<li>Dr. Vidhya Borgia as Sharan\'s Mother</li>\r\n<li>Muthu Nagu as Mathi Father</li>\r\n<li>Geetha Kailasam as Anitha\'s Mother</li>\r\n</ul>\r\n<p>With music by Santhosh Narayanan, and cinematography by R. Velraj,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>After being sexually assaulted, a woman realises that the perpetrators are people in power. Battling mental agony, she is now forced to fight social stigma.</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2022-11-18</strong></p>\r\n<p>Rating :</p>\r\n<h2>Anel Meley Pani Thuli Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/XPyqaanPEhebjhw72zRHq9ijvo.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/ojtnGJbx2UpakXN0RFInlW7hysg.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/lTsv3YytiLKO5zx3AVqKkfnjIWt.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/diefXNsu5IDrJa0y6oaBLMTe6Dr.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-11-30 18:19:26', '2024-11-30 18:19:26'),
(16, 16, '<h2>About Mechanic Rocky Movie 2024</h2>\r\n<p><strong>Mechanic Rocky</strong> is a film directed by Ravi Teja Mullapudi and written by Ravi Teja Mullapudi. Produced by Ram Talluri under the banners of SRT Entertainments, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Vishwak Sen as</li>\r\n<li>Meenakshi Chaudhary as</li>\r\n<li>Shraddha Srinath as</li>\r\n<li>Sunil Varma as</li>\r\n<li>Naresh as</li>\r\n<li>Hyper Adhi as</li>\r\n<li>Viva Harsha as</li>\r\n<li>Harshavardhan as</li>\r\n</ul>\r\n<p>With music by Jakes Bejoy, and cinematography by Manojh Katasani,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>No overview</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2024-11-22</strong></p>\r\n<p>Rating :</p>\r\n<h2>Mechanic Rocky Photos</h2>\r\n<div class=\"row all-movie-photos\">&nbsp;</div>', '2024-11-30 20:39:31', '2024-11-30 20:39:31'),
(17, 17, '<h2>About Zebra Movie</h2>\r\n<p><strong>Zebra</strong> is a 2 hours and 44 minutes film directed by and written by . Produced by under the banners of , the movie features an ensemble cast led by</p>\r\n<p>With music by , and cinematography by ,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>Banking on Survival is a gripping tale of love, sacrifice, and the fine line between right and wrong.</p>\r\n<p>Country :</p>\r\n<p>Release Date : <strong>Release Soon</strong></p>\r\n<p>Rating :</p>\r\n<h2>Zebra Photos</h2>\r\n<div class=\"row all-movie-photos\">&nbsp;</div>', '2024-11-30 20:52:34', '2024-11-30 20:52:34'),
(18, 18, '<h2>About Matka Movie 2024</h2>\r\n<p><strong>Matka</strong> is a 2 hours and 39 minutes Action, Crime film directed by Karuna Kumar and written by Karuna Kumar. Produced by Dr. Vijender Reddy Teegala, Rajani Talluri under the banners of Vyra Entertainments, SRT Entertainments, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Varun Tej as</li>\r\n<li>Meenakshi Chaudhary as</li>\r\n<li>Nora Fatehi as</li>\r\n<li>Naveen Chandra as</li>\r\n<li>Ajay Ghosh as</li>\r\n<li>Mime Gopi as</li>\r\n<li>V. S. Roopa Lakshmi as</li>\r\n<li>Raj Tirandasu as</li>\r\n<li>Jagadeesh Bandari as</li>\r\n</ul>\r\n<p>With music by G. V. Prakash Kumar, and cinematography by A. Kishore Kumar,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>Set between the years 1958 and 1982, Matka tells the story of Vasu, who rises from poverty to create a powerful gambling empire in India, ultimately leading the nation into a battle with the government. Based on real events, the tale explores themes of love, moral choices, and the consequences of ambition.</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2024-11-14</strong></p>\r\n<p>Rating : <strong>5.7 / 10</strong></p>\r\n<h2>Matka Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/kyVcNF6GRthdiT4oZn5XgJtl0F7.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-11-30 20:59:59', '2024-11-30 20:59:59'),
(28, 28, '<h2>About Pushpa 2 - The Rule Movie 2024</h2>\r\n<p><strong>Pushpa 2 - The Rule</strong> is a 3 hours and 18 minutes Crime, Action, Thriller film directed by Sukumar and written by Sukumar, Sukumar. Produced by Naveen Yerneni, Y. Ravi Shankar under the banners of Mythri Movie Makers, Sukumar Writings, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Allu Arjun as Pushpa Raj</li>\r\n<li>Rashmika Mandanna as Srivalli</li>\r\n<li>Fahadh Faasil as Bhanwar Singh Shekhawat</li>\r\n<li>Jagadeesh Bandari as Kesava</li>\r\n<li>Rao Ramesh as Bhumireddy Siddappa Naidu</li>\r\n<li>Sunil Varma as Mangalam Srinu</li>\r\n<li>Anasuya Bharadwaj as Dakshayani</li>\r\n<li>Ajay as Molleti Mohan Raj</li>\r\n<li>Kalpalatha as Parvathamma</li>\r\n<li>Pavani Karanam as Molleti Kaveri</li>\r\n<li>Shri Tej as Molleti Dharma Raj</li>\r\n<li>Brahmaji as SI Kupparaj</li>\r\n<li>Jagapati Babu as Sri Kogatam Veera Pratap D</li>\r\n<li>Tarak Ponnappa as Bugga Reddy</li>\r\n<li>Adithya Menon as Subba Reddy</li>\r\n<li>Divi Vadthya as News Reporter</li>\r\n<li>Adukalam Naren as C.M</li>\r\n<li>Saurabh Sachdeva as Dealer from Dubai</li>\r\n<li>Dhananjay as Jolly Reddy</li>\r\n<li>Mime Gopi as Chennai Murugan</li>\r\n</ul>\r\n<p>With music by Devi Sri Prasad, Sam C S, and cinematography by Mirosław Kuba Brożek,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>Pushpa struggles to sustain his sandalwood smuggling business in the face of tough opposition from the police, led by Shekhawat.</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2024-12-04</strong></p>\r\n<p>Rating : <strong>7.1 / 10</strong></p>\r\n<h2>Pushpa 2 - The Rule Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/keC82cQ8q0ZHthrbvzWq04kGnbv.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/5nEyyLkElpD7zkqh41aSkTCchcc.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/7yOQdP5GhOekZWpA0jYjlNHDcu.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/gQlkhESuP0nzSc6WoC2RuYUpD0c.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/4bE8DnqnhYDLXmprXoScLREWCvp.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-12-25 16:32:36', '2024-12-25 16:32:36'),
(29, 29, '<h2>About Christmas Eve in Miller&rsquo;s Point Movie 2024</h2>\r\n<p><strong>Christmas Eve in Miller&rsquo;s Point</strong> is a 1 hour and 47 minutes Drama, Comedy film directed by Tyler Taormina and written by Eric Berger, Tyler Taormina. Produced by Tyler Taormina, Eric Berger, Krista Minto, Duncan Sullivan, Kim Dai, David Entin, Michael Jeffrey Davis, Oliver Toy, Kevin Anton, David Croley Broyles, Calogero Carucci, Michael J. Reistetter, Michael Cera, Rob Rice under the banners of Omnes Films, Dweck Productions, Crypto Castle Productions, Puente Films, Parsifal Pictures, NOIZ Entertainment, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Matilda Fleming as Emily</li>\r\n<li>Maria Dizzia as Kathleen</li>\r\n<li>Ben Shenkman as Lenny</li>\r\n<li>Francesca Scorsese as Michelle</li>\r\n<li>Elsie Fisher as Lynn</li>\r\n<li>Michael Cera as Officer Gibson</li>\r\n<li>Gregg Turkington as Sergeant Brooks</li>\r\n<li>Sawyer Spielberg as Splint</li>\r\n<li>Chris Lazzaro as Cousin Bruce</li>\r\n<li>Leo Chan as Ty</li>\r\n<li>JoJo Cincinnati as Isabelle</li>\r\n<li>Lev Cameron as Greg Falk</li>\r\n<li>Caveh Zahedi as Burl</li>\r\n<li>Courtney Warner as Stressed Woman</li>\r\n<li>Gregory Falatek as Tim</li>\r\n<li>Laura Wernette as Mrs. Mott</li>\r\n<li>Aristotle Georgeson as The Heckler</li>\r\n<li>Brittany Hughes as Sue</li>\r\n<li>Shane Fleming as Geek</li>\r\n<li>Delancey Shapiro as Frankie</li>\r\n</ul>\r\n<p>With music by , and cinematography by Carson Lund,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>A rambunctious extended family descends upon their small Long Island hometown for the holidays where hijinks, generational squabbles, and family traditions ensue.</p>\r\n<p>Country : <strong>United States of America</strong></p>\r\n<p>Release Date : <strong>2024-11-08</strong></p>\r\n<p>Rating : <strong>5.4 / 10</strong></p>\r\n<h2>Christmas Eve in Miller&rsquo;s Point Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/z8kXJSpl6dy1merK77LMQksg2sS.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/ez9jT6FIaAopUXRlb2kYV6mWn7g.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/36K5bEE8TLezoHI0J0L3tiEoqQP.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/wccoRPuoqVhlV83xO67g915tJla.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/vvEuevij4nxUcDqIyw3J4MlEQCS.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-12-26 09:46:14', '2024-12-26 09:46:14'),
(30, 30, '<h2>About Zero Se Restart Movie 2024</h2>\r\n<p><strong>Zero Se Restart</strong> is a 1 hour and 13 minutes Documentary film directed by Jaskunwar Kohli and written by . Produced by Vidhu Vinod Chopra under the banners of Vinod Chopra Films, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Vidhu Vinod Chopra as Self</li>\r\n<li>Vikrant Massey as Self</li>\r\n<li>Anant Joshi as Self</li>\r\n<li>Medha Shankr as Self</li>\r\n</ul>\r\n<p>With music by , and cinematography by ,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>Delves into the making of the 2023 superhit film \"12th Fail.\"</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2024-12-13</strong></p>\r\n<p>Rating :</p>\r\n<h2>Zero Se Restart Photos</h2>\r\n<div class=\"row all-movie-photos\">&nbsp;</div>', '2024-12-26 09:47:09', '2024-12-26 09:47:09'),
(31, 31, '<h2>About Agni Movie 2024</h2>\r\n<p><strong>Agni</strong> is a 2 hours and 2 minutes Action, Drama, Thriller film directed by Rahul Dholakia and written by Rahul Dholakia. Produced by Farhan Akhtar, Ritesh Sidhwani under the banners of Excel Entertainment, Amazon MGM Studios, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Pratik Gandhi as Vitthal Rao Surve</li>\r\n<li>Divyendu Sharma as Samit Sawant</li>\r\n<li>Jitendra Joshi as Mahadev Nigade</li>\r\n<li>Sai Tamhankar as Rukmini Surve</li>\r\n<li>Saiyami Kher as Avni Purohit</li>\r\n<li>Udit Arora as Jazz Castellano</li>\r\n<li>Kabir Shah as Amar \"Amya\" Surve</li>\r\n<li>Pramod Pathak as Pankaj Mishra</li>\r\n<li>Kundan Roy as Nakul Ingle</li>\r\n<li>Sakhi Gokhale as Sayali Sawant</li>\r\n<li>Jaywant Wadkar as Ganphule</li>\r\n<li>Anant Jog as Deputy CM</li>\r\n<li>Nitin Dhongade as Bittoo</li>\r\n</ul>\r\n<p>With music by , and cinematography by ,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>In a city plagued by a strange rise in fires, fireman Vithal and his policeman brother-in-law Samit reluctantly team up to solve the escalating crisis. Battling personal conflicts, they race against time to crack the case and save Mumbai.</p>\r\n<p>Country : <strong>India, United States of America</strong></p>\r\n<p>Release Date : <strong>2024-12-06</strong></p>\r\n<p>Rating : <strong>5 / 10</strong></p>\r\n<h2>Agni Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/ey0MV3MzQnDQmonzKqHxnjCGrze.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/qM6YwyZ1WR73qS42iftxVgvYpFE.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/1l2p9OejBzPFnTQ73SHSIhQnpWk.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/rpAkvTk7MLd8sjQldxb8t3jZVsk.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/83YOQFSAtxjwQD8JBQZSDmY9Yve.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-12-26 09:49:04', '2024-12-26 09:49:04'),
(32, 32, '<h2>About Chhaava Movie 2025</h2>\r\n<p><strong>Chhaava</strong> is a Drama, History film directed by Laxman Utekar and written by Rishi Virmani. Produced by Dinesh Vijan under the banners of Maddock Films, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Vicky Kaushal as Chhatrapati Sambhaji Maharaj</li>\r\n<li>Rashmika Mandanna as Yesubai Bhonsale</li>\r\n<li>Akshaye Khanna as Aurangzeb</li>\r\n<li>Ashutosh Rana as Sarsenapati Hambirao Mohite</li>\r\n<li>Divya Dutta as Soyarabai</li>\r\n<li>Pradeep Ram Singh Rawat as Yesaji Kank</li>\r\n<li>Vineet Kumar Singh as</li>\r\n<li>Neil Bhoopalam as</li>\r\n<li>Santosh Juvekar as</li>\r\n<li>Rajiv Kachroo as Mujtaba</li>\r\n<li>Ashish Pathode as Antaji</li>\r\n</ul>\r\n<p>With music by A.R. Rahman, and cinematography by ,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>A biopic of Maratha warrior Chhatrapati Sambhaji Maharaj.</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2025-02-14</strong></p>\r\n<p>Rating :</p>\r\n<h2>Chhaava Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/k9yv9ITsJdPuhjkFd9xTqxrPrMn.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-12-26 09:50:19', '2024-12-26 09:50:19'),
(33, 33, '<h2>About Despatch Movie 2024</h2>\r\n<p><strong>Despatch</strong> is a 2 hours and 31 minutes Drama, Thriller film directed by Kanu Behl and written by Ishani Banerjee, Kanu Behl. Produced by Ronnie Screwvala under the banners of RSVP Movies, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Manoj Bajpayee as Joy Deb</li>\r\n<li>Shahana Goswami as Shweta Varma</li>\r\n<li>Archita Agarwal as Prerna Prakash</li>\r\n<li>Anand Alkunte as SI Bhonsle</li>\r\n<li>Mamik Singh as Silva</li>\r\n<li>Riju Bajaj as Tarun Khaitan</li>\r\n<li>Veena Mehta as Joy\'s Mother</li>\r\n<li>Rii Sen as Noori Rai</li>\r\n<li>Kabir Sadanand as Wadhwa</li>\r\n</ul>\r\n<p>With music by , and cinematography by Siddharth Diwan,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>Determined to break the next big story and refashion his complicated personal life, Joy embarks on a relentless odyssey through the heart and gut of Mumbai.</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2024-10-19</strong></p>\r\n<p>Rating : <strong>3 / 10</strong></p>\r\n<h2>Despatch Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/oB32GF3qJx5ta8BZdUrex80OafI.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/y4eA7NRzNkQssbhdRH0WxTFQ9y5.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/g448aRROaNAB1Ca7jIkbasWALwT.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/ycdAK4wGcgW1unlhcVGGZjvUJw6.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/5xwFSFudxC59chmX1gIWDZjmAzi.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-12-26 09:51:14', '2024-12-26 09:51:14');
INSERT INTO `movie_contents` (`id`, `movie_id`, `content`, `created_at`, `updated_at`) VALUES
(34, 34, '<h2>About Lucky Baskhar Movie 2024</h2>\r\n<p><strong>Lucky Baskhar</strong> is a 2 hours and 28 minutes Drama, Thriller, Crime film directed by Venky Atluri and written by Venky Atluri. Produced by Sai Soujanya, Suryadevara Naga Vamsi under the banners of Sithara Entertainments, Fortune Four Cinemas, Srikara Studios, the movie features an ensemble cast led by</p>\r\n<ul>\r\n<li>Dulquer Salmaan as Baskhar Kumar</li>\r\n<li>Meenakshi Chaudhary as Sumathi Kumar</li>\r\n<li>Rajkumar Kasireddy as Samba</li>\r\n<li>Ramki as Anthony</li>\r\n<li>Maganti Srinath as Suraj</li>\r\n<li>Sai Kumar as CBI Officer Lakshman</li>\r\n<li>Sachin Khedekar as Vinod Bhosle</li>\r\n<li>Tinnu Anand as Rajveer Lokhande</li>\r\n<li>Gayatri Bhargavi as Latha</li>\r\n<li>Sivannarayana Naripeddi as Narayana</li>\r\n<li>Rithvik as Karthik</li>\r\n<li>Sudha as Sumathi\'s Mother</li>\r\n<li>Micky Makhija as Himanshu Roy</li>\r\n<li>Charan Lakkaraju as Bhaskar\'s Brother</li>\r\n<li>Ananya Sharma as Bhaskar\'s Sister</li>\r\n<li>Surya Srinivas as Sandeep Chatterjee</li>\r\n<li>Raghu Babu as Beggar</li>\r\n<li>Hyper Adhi as Small time Businessman</li>\r\n<li>Mahesh Achanta as Worker at Share Market</li>\r\n<li>Maanasa Chaudhary as Mona</li>\r\n</ul>\r\n<p>With music by G. V. Prakash Kumar, and cinematography by Nimish Ravi,</p>\r\n<p><strong>Overview</strong></p>\r\n<p>A cash-strapped bank cashier embarks on a risky investment scheme and soon gets drawn into the murky world of money laundering.</p>\r\n<p>Country : <strong>India</strong></p>\r\n<p>Release Date : <strong>2024-10-30</strong></p>\r\n<p>Rating : <strong>7.8 / 10</strong></p>\r\n<h2>Lucky Baskhar Photos</h2>\r\n<div class=\"row all-movie-photos\">\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/mjg6Z4IZOGvcLUgNCPuow22wTvm.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/q8UyN4XhpmChtneZXdZ8fktQka6.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/apuaqNKhpOxWd2FZvnrscgANcnI.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/gMmJQyLW1qTkixs9jL9RpcJ37Sx.jpg\" alt=\"Screenshot\" /></div>\r\n<div class=\"col-md-6 mt-4\"><img src=\"https://image.tmdb.org/t/p/w500/vC9eBlDk0hn1v5uw619RzLvGo3Q.jpg\" alt=\"Screenshot\" /></div>\r\n</div>', '2024-12-26 09:53:59', '2024-12-26 09:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `movie_dubbeds`
--

CREATE TABLE `movie_dubbeds` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_dubbeds`
--

INSERT INTO `movie_dubbeds` (`id`, `language_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2024-10-26 05:07:18', '2024-10-26 05:07:18'),
(2, 10, 1, '2024-10-26 06:37:02', '2024-10-26 06:37:02'),
(3, 11, 1, '2024-10-26 06:37:02', '2024-10-26 06:37:02'),
(4, 2, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(5, 7, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(6, 8, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(7, 12, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(8, 13, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(9, 14, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(10, 15, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(11, 1, 8, '2024-11-30 11:53:26', '2024-11-30 11:53:26'),
(12, 1, 18, '2024-11-30 15:29:59', '2024-11-30 15:29:59'),
(13, 7, 18, '2024-11-30 15:29:59', '2024-11-30 15:29:59'),
(14, 10, 18, '2024-11-30 15:29:59', '2024-11-30 15:29:59'),
(15, 11, 18, '2024-11-30 15:29:59', '2024-11-30 15:29:59'),
(16, 1, 19, '2024-11-30 15:34:28', '2024-11-30 15:34:28'),
(17, 7, 19, '2024-11-30 15:34:28', '2024-11-30 15:34:28'),
(18, 10, 19, '2024-11-30 15:34:28', '2024-11-30 15:34:28'),
(19, 1, 25, '2024-12-06 16:47:15', '2024-12-06 16:47:15'),
(20, 5, 25, '2024-12-06 16:47:15', '2024-12-06 16:47:15'),
(21, 7, 25, '2024-12-06 16:47:15', '2024-12-06 16:47:15'),
(22, 10, 25, '2024-12-06 16:47:15', '2024-12-06 16:47:15'),
(23, 11, 25, '2024-12-06 16:47:15', '2024-12-06 16:47:15'),
(24, 1, 27, '2024-12-25 16:16:07', '2024-12-25 16:16:07'),
(25, 2, 27, '2024-12-25 16:16:07', '2024-12-25 16:16:07'),
(26, 8, 27, '2024-12-25 16:16:07', '2024-12-25 16:16:07'),
(27, 1, 34, '2024-12-26 09:53:59', '2024-12-26 09:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`id`, `genre_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-10-26 05:07:18', '2024-10-26 05:07:18'),
(2, 18, 1, '2024-10-26 06:37:02', '2024-10-26 06:37:02'),
(3, 1, 2, '2024-10-26 08:54:06', '2024-10-26 08:54:06'),
(4, 11, 2, '2024-10-26 08:54:06', '2024-10-26 08:54:06'),
(5, 20, 2, '2024-10-26 08:54:06', '2024-10-26 08:54:06'),
(6, 14, 3, '2024-10-27 17:43:30', '2024-10-27 17:43:30'),
(7, 14, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(8, 19, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(9, 20, 4, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(10, 1, 5, '2024-11-03 10:11:42', '2024-11-03 10:11:42'),
(11, 14, 5, '2024-11-03 10:11:42', '2024-11-03 10:11:42'),
(12, 8, 6, '2024-11-03 10:51:45', '2024-11-03 10:51:45'),
(13, 7, 7, '2024-11-03 11:07:06', '2024-11-03 11:07:06'),
(14, 8, 7, '2024-11-03 11:07:06', '2024-11-03 11:07:06'),
(15, 3, 8, '2024-11-30 11:53:26', '2024-11-30 11:53:26'),
(16, 7, 8, '2024-11-30 11:53:26', '2024-11-30 11:53:26'),
(17, 24, 8, '2024-11-30 11:53:26', '2024-11-30 11:53:26'),
(18, 7, 9, '2024-11-30 12:03:01', '2024-11-30 12:03:01'),
(19, 14, 10, '2024-11-30 12:07:25', '2024-11-30 12:07:25'),
(20, 15, 10, '2024-11-30 12:07:25', '2024-11-30 12:07:25'),
(21, 22, 10, '2024-11-30 12:07:25', '2024-11-30 12:07:25'),
(22, 25, 11, '2024-11-30 12:12:43', '2024-11-30 12:12:43'),
(23, 14, 12, '2024-11-30 12:17:36', '2024-11-30 12:17:36'),
(24, 1, 13, '2024-11-30 12:24:09', '2024-11-30 12:24:09'),
(25, 20, 13, '2024-11-30 12:24:09', '2024-11-30 12:24:09'),
(26, 26, 14, '2024-11-30 12:33:48', '2024-11-30 12:33:48'),
(27, 14, 15, '2024-11-30 12:49:26', '2024-11-30 12:49:26'),
(28, 1, 16, '2024-11-30 15:09:31', '2024-11-30 15:09:31'),
(29, 7, 16, '2024-11-30 15:09:31', '2024-11-30 15:09:31'),
(30, 14, 16, '2024-11-30 15:09:31', '2024-11-30 15:09:31'),
(31, 9, 17, '2024-11-30 15:22:34', '2024-11-30 15:22:34'),
(32, 20, 17, '2024-11-30 15:22:34', '2024-11-30 15:22:34'),
(33, 1, 18, '2024-11-30 15:29:59', '2024-11-30 15:29:59'),
(34, 20, 18, '2024-11-30 15:29:59', '2024-11-30 15:29:59'),
(35, 9, 19, '2024-11-30 15:34:28', '2024-11-30 15:34:28'),
(36, 14, 19, '2024-11-30 15:34:28', '2024-11-30 15:34:28'),
(37, 20, 19, '2024-11-30 15:34:28', '2024-11-30 15:34:28'),
(38, 14, 20, '2024-11-30 18:09:15', '2024-11-30 18:09:15'),
(39, 20, 20, '2024-11-30 18:09:15', '2024-11-30 18:09:15'),
(40, 1, 21, '2024-11-30 18:16:59', '2024-11-30 18:16:59'),
(41, 14, 21, '2024-11-30 18:16:59', '2024-11-30 18:16:59'),
(42, 22, 21, '2024-11-30 18:16:59', '2024-11-30 18:16:59'),
(43, 1, 22, '2024-11-30 18:24:37', '2024-11-30 18:24:37'),
(44, 14, 22, '2024-11-30 18:24:37', '2024-11-30 18:24:37'),
(45, 14, 23, '2024-11-30 18:39:18', '2024-11-30 18:39:18'),
(46, 7, 24, '2024-12-02 13:20:39', '2024-12-02 13:20:39'),
(47, 14, 24, '2024-12-02 13:20:39', '2024-12-02 13:20:39'),
(48, 1, 25, '2024-12-06 16:42:11', '2024-12-06 16:42:11'),
(49, 9, 25, '2024-12-06 16:42:11', '2024-12-06 16:42:11'),
(50, 14, 25, '2024-12-06 16:42:11', '2024-12-06 16:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `movie_languages`
--

CREATE TABLE `movie_languages` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_languages`
--

INSERT INTO `movie_languages` (`id`, `language_id`, `movie_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-10-26 05:07:18', '2024-10-26 05:07:18'),
(2, 8, 1, 1, '2024-10-26 05:07:18', '2024-10-26 05:07:18'),
(3, 1, 2, 1, '2024-10-26 08:54:06', '2024-10-26 08:54:06'),
(4, 1, 3, 1, '2024-10-27 17:43:30', '2024-10-27 17:43:30'),
(5, 1, 4, 1, '2024-11-03 09:48:55', '2024-11-03 09:48:55'),
(6, 1, 5, 1, '2024-11-03 10:11:42', '2024-11-03 10:11:42'),
(7, 1, 6, 1, '2024-11-03 10:51:45', '2024-11-03 10:51:45'),
(8, 1, 7, 1, '2024-11-03 11:07:06', '2024-11-03 11:07:06'),
(9, 2, 8, 1, '2024-11-30 11:53:26', '2024-11-30 11:53:26'),
(10, 2, 9, 1, '2024-11-30 12:03:01', '2024-11-30 12:03:01'),
(11, 2, 10, 1, '2024-11-30 12:07:25', '2024-11-30 12:07:25'),
(12, 2, 11, 1, '2024-11-30 12:12:43', '2024-11-30 12:12:43'),
(13, 7, 12, 1, '2024-11-30 12:17:36', '2024-11-30 12:17:36'),
(14, 1, 13, 1, '2024-11-30 12:24:09', '2024-11-30 12:24:09'),
(15, 2, 13, 1, '2024-11-30 12:24:09', '2024-11-30 12:24:09'),
(16, 5, 13, 1, '2024-11-30 12:24:09', '2024-11-30 12:24:09'),
(17, 7, 13, 1, '2024-11-30 12:24:09', '2024-11-30 12:24:09'),
(18, 10, 13, 1, '2024-11-30 12:24:09', '2024-11-30 12:24:09'),
(19, 11, 13, 1, '2024-11-30 12:24:09', '2024-11-30 12:24:09'),
(20, 1, 14, 1, '2024-11-30 12:33:48', '2024-11-30 12:33:48'),
(21, 2, 14, 1, '2024-11-30 12:33:48', '2024-11-30 12:33:48'),
(22, 3, 14, 1, '2024-11-30 12:33:48', '2024-11-30 12:33:48'),
(23, 7, 14, 1, '2024-11-30 12:33:48', '2024-11-30 12:33:48'),
(24, 8, 14, 1, '2024-11-30 12:33:48', '2024-11-30 12:33:48'),
(25, 11, 14, 1, '2024-11-30 12:33:48', '2024-11-30 12:33:48'),
(26, 7, 15, 1, '2024-11-30 12:49:26', '2024-11-30 12:49:26'),
(27, 8, 16, 1, '2024-11-30 15:09:31', '2024-11-30 15:09:31'),
(28, 8, 17, 1, '2024-11-30 15:22:34', '2024-11-30 15:22:34'),
(29, 8, 18, 1, '2024-11-30 15:29:59', '2024-11-30 15:29:59'),
(30, 8, 19, 1, '2024-11-30 15:34:28', '2024-11-30 15:34:28'),
(31, 1, 20, 1, '2024-11-30 18:09:15', '2024-11-30 18:09:15'),
(32, 1, 21, 1, '2024-11-30 18:16:59', '2024-11-30 18:16:59'),
(33, 1, 22, 1, '2024-11-30 18:24:37', '2024-11-30 18:24:37'),
(34, 1, 23, 1, '2024-11-30 18:39:18', '2024-11-30 18:39:18'),
(35, 2, 24, 1, '2024-12-02 13:20:39', '2024-12-02 13:20:39'),
(41, 8, 25, 1, '2024-12-06 16:47:15', '2024-12-06 16:47:15'),
(42, 1, 27, 1, '2024-12-25 16:16:07', '2024-12-25 16:16:07'),
(43, 1, 28, 1, '2024-12-25 16:36:13', '2024-12-25 16:36:13'),
(44, 2, 29, 1, '2024-12-26 09:46:14', '2024-12-26 09:46:14'),
(45, 1, 31, 1, '2024-12-26 09:49:04', '2024-12-26 09:49:04'),
(46, 1, 32, 1, '2024-12-26 09:50:19', '2024-12-26 09:50:19'),
(47, 1, 33, 1, '2024-12-26 09:51:14', '2024-12-26 09:51:14'),
(48, 1, 34, 1, '2024-12-26 09:53:59', '2024-12-26 09:53:59'),
(49, 8, 34, 1, '2024-12-26 09:53:59', '2024-12-26 09:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `id` bigint(20) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`id`, `movie_id`, `location`, `category`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, '2024-10-26 11:57:40', '2024-10-26 11:57:40'),
(2, 1, NULL, NULL, '2024-10-26 12:07:04', '2024-10-26 12:07:04'),
(3, 1, NULL, NULL, '2024-10-26 12:09:16', '2024-10-26 12:09:16'),
(4, 1, NULL, NULL, '2024-10-26 12:10:15', '2024-10-26 12:10:15'),
(5, 1, NULL, NULL, '2024-10-26 12:10:36', '2024-10-26 12:10:36'),
(6, 1, NULL, NULL, '2024-10-26 12:12:01', '2024-10-26 12:12:01'),
(7, 1, NULL, NULL, '2024-10-26 12:12:01', '2024-10-26 12:12:01'),
(8, 1, NULL, NULL, '2024-10-26 12:33:13', '2024-10-26 12:33:13'),
(9, 1, NULL, NULL, '2024-10-26 12:33:13', '2024-10-26 12:33:13'),
(10, 1, NULL, NULL, '2024-10-26 12:46:10', '2024-10-26 12:46:10'),
(11, 1, NULL, NULL, '2024-10-26 12:57:50', '2024-10-26 12:57:50'),
(12, 1, NULL, NULL, '2024-10-26 13:01:24', '2024-10-26 13:01:24'),
(13, 1, NULL, NULL, '2024-10-26 13:02:08', '2024-10-26 13:02:08'),
(14, 1, NULL, NULL, '2024-10-26 13:02:09', '2024-10-26 13:02:09'),
(15, 1, NULL, NULL, '2024-10-26 13:02:27', '2024-10-26 13:02:27'),
(16, 1, NULL, NULL, '2024-10-26 13:03:49', '2024-10-26 13:03:49'),
(17, 1, NULL, NULL, '2024-10-26 13:08:05', '2024-10-26 13:08:05'),
(18, 1, NULL, NULL, '2024-10-26 13:08:22', '2024-10-26 13:08:22'),
(19, 1, NULL, NULL, '2024-10-26 13:08:37', '2024-10-26 13:08:37'),
(20, 1, NULL, NULL, '2024-10-26 13:09:02', '2024-10-26 13:09:02'),
(21, 1, NULL, NULL, '2024-10-26 13:09:21', '2024-10-26 13:09:21'),
(22, 1, NULL, NULL, '2024-10-26 13:14:28', '2024-10-26 13:14:28'),
(23, 1, NULL, NULL, '2024-10-26 13:14:33', '2024-10-26 13:14:33'),
(24, 1, NULL, NULL, '2024-10-26 13:16:31', '2024-10-26 13:16:31'),
(25, 1, NULL, NULL, '2024-10-26 13:20:46', '2024-10-26 13:20:46'),
(26, 1, NULL, NULL, '2024-10-26 13:21:26', '2024-10-26 13:21:26'),
(27, 1, NULL, NULL, '2024-10-26 13:21:33', '2024-10-26 13:21:33'),
(28, 1, NULL, NULL, '2024-10-26 13:21:46', '2024-10-26 13:21:46'),
(29, 1, NULL, NULL, '2024-10-26 13:30:30', '2024-10-26 13:30:30'),
(30, 1, NULL, NULL, '2024-10-26 14:36:29', '2024-10-26 14:36:29'),
(31, 2, NULL, NULL, '2024-10-26 14:48:01', '2024-10-26 14:48:01'),
(32, 1, NULL, NULL, '2024-10-26 16:50:55', '2024-10-26 16:50:55'),
(33, 2, NULL, NULL, '2024-10-27 01:13:09', '2024-10-27 01:13:09'),
(34, 2, NULL, NULL, '2024-10-27 01:13:44', '2024-10-27 01:13:44'),
(35, 2, NULL, NULL, '2024-10-27 01:13:45', '2024-10-27 01:13:45'),
(36, 2, NULL, NULL, '2024-10-27 01:18:40', '2024-10-27 01:18:40'),
(37, 2, NULL, NULL, '2024-10-27 01:18:45', '2024-10-27 01:18:45'),
(38, 2, NULL, NULL, '2024-10-27 01:22:27', '2024-10-27 01:22:27'),
(39, 2, NULL, NULL, '2024-10-27 01:36:09', '2024-10-27 01:36:09'),
(40, 2, NULL, NULL, '2024-10-27 01:36:14', '2024-10-27 01:36:14'),
(41, 2, NULL, NULL, '2024-10-27 01:36:18', '2024-10-27 01:36:18'),
(42, 2, NULL, NULL, '2024-10-27 01:36:29', '2024-10-27 01:36:29'),
(43, 2, NULL, NULL, '2024-10-27 01:37:09', '2024-10-27 01:37:09'),
(44, 1, NULL, NULL, '2024-10-27 19:33:32', '2024-10-27 19:33:32'),
(45, 2, NULL, NULL, '2024-10-27 19:33:33', '2024-10-27 19:33:33'),
(46, 3, NULL, NULL, '2024-10-27 23:13:45', '2024-10-27 23:13:45'),
(47, 3, NULL, NULL, '2024-10-27 23:14:03', '2024-10-27 23:14:03'),
(48, 3, NULL, NULL, '2024-10-27 23:14:06', '2024-10-27 23:14:06'),
(49, 3, NULL, NULL, '2024-10-27 23:15:23', '2024-10-27 23:15:23'),
(50, 3, NULL, NULL, '2024-10-27 23:15:24', '2024-10-27 23:15:24'),
(51, 3, NULL, NULL, '2024-10-28 02:05:44', '2024-10-28 02:05:44'),
(52, 2, NULL, NULL, '2024-10-28 02:07:06', '2024-10-28 02:07:06'),
(53, 1, NULL, NULL, '2024-10-28 02:07:09', '2024-10-28 02:07:09'),
(54, 2, NULL, NULL, '2024-10-28 02:44:56', '2024-10-28 02:44:56'),
(55, 3, NULL, NULL, '2024-10-28 02:44:59', '2024-10-28 02:44:59'),
(56, 1, NULL, NULL, '2024-10-28 02:44:59', '2024-10-28 02:44:59'),
(57, 1, NULL, NULL, '2024-10-28 03:07:55', '2024-10-28 03:07:55'),
(58, 2, NULL, NULL, '2024-10-28 03:08:27', '2024-10-28 03:08:27'),
(59, 3, NULL, NULL, '2024-10-28 03:08:38', '2024-10-28 03:08:38'),
(60, 2, NULL, NULL, '2024-10-28 03:24:22', '2024-10-28 03:24:22'),
(61, 3, NULL, NULL, '2024-10-28 03:25:52', '2024-10-28 03:25:52'),
(62, 1, NULL, NULL, '2024-10-28 03:26:26', '2024-10-28 03:26:26'),
(63, 2, NULL, NULL, '2024-10-28 03:43:42', '2024-10-28 03:43:42'),
(64, 1, NULL, NULL, '2024-10-28 03:56:27', '2024-10-28 03:56:27'),
(65, 3, NULL, NULL, '2024-10-28 08:00:58', '2024-10-28 08:00:58'),
(66, 3, NULL, NULL, '2024-10-28 08:37:34', '2024-10-28 08:37:34'),
(67, 2, NULL, NULL, '2024-11-02 16:19:06', '2024-11-02 16:19:06'),
(68, 2, NULL, NULL, '2024-11-02 16:33:34', '2024-11-02 16:33:34'),
(69, 2, NULL, NULL, '2024-11-02 16:45:01', '2024-11-02 16:45:01'),
(70, 2, NULL, NULL, '2024-11-02 16:49:07', '2024-11-02 16:49:07'),
(71, 2, NULL, NULL, '2024-11-02 16:50:11', '2024-11-02 16:50:11'),
(72, 2, NULL, NULL, '2024-11-02 16:50:18', '2024-11-02 16:50:18'),
(73, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(74, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(75, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(76, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(77, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(78, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(79, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(80, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(81, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(82, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(83, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(84, 2, NULL, NULL, '2024-11-02 16:50:50', '2024-11-02 16:50:50'),
(85, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(86, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(87, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(88, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(89, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(90, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(91, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(92, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(93, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(94, 2, NULL, NULL, '2024-11-02 16:50:51', '2024-11-02 16:50:51'),
(95, 2, NULL, NULL, '2024-11-02 16:50:52', '2024-11-02 16:50:52'),
(96, 2, NULL, NULL, '2024-11-02 16:50:52', '2024-11-02 16:50:52'),
(97, 3, NULL, NULL, '2024-11-02 22:59:59', '2024-11-02 22:59:59'),
(98, 4, NULL, NULL, '2024-11-03 15:19:18', '2024-11-03 15:19:18'),
(99, 4, NULL, NULL, '2024-11-03 15:21:13', '2024-11-03 15:21:13'),
(100, 4, NULL, NULL, '2024-11-03 15:21:14', '2024-11-03 15:21:14'),
(101, 5, NULL, NULL, '2024-11-03 15:44:45', '2024-11-03 15:44:45'),
(102, 4, NULL, NULL, '2024-11-03 16:09:39', '2024-11-03 16:09:39'),
(103, 4, NULL, NULL, '2024-11-03 16:09:40', '2024-11-03 16:09:40'),
(104, 5, NULL, NULL, '2024-11-03 16:24:10', '2024-11-03 16:24:10'),
(105, 5, NULL, NULL, '2024-11-03 16:24:10', '2024-11-03 16:24:10'),
(106, 6, NULL, NULL, '2024-11-03 16:25:36', '2024-11-03 16:25:36'),
(107, 5, NULL, NULL, '2024-11-03 16:33:46', '2024-11-03 16:33:46'),
(108, 6, NULL, NULL, '2024-11-03 16:53:39', '2024-11-03 16:53:39'),
(109, 6, NULL, NULL, '2024-11-03 16:53:52', '2024-11-03 16:53:52'),
(110, 6, NULL, NULL, '2024-11-03 16:53:52', '2024-11-03 16:53:52'),
(111, 7, NULL, NULL, '2024-11-03 16:53:54', '2024-11-03 16:53:54'),
(112, 7, NULL, NULL, '2024-11-03 16:54:24', '2024-11-03 16:54:24'),
(113, 7, NULL, NULL, '2024-11-03 16:54:24', '2024-11-03 16:54:24'),
(114, 4, NULL, NULL, '2024-11-03 21:31:43', '2024-11-03 21:31:43'),
(115, 7, NULL, NULL, '2024-11-03 21:31:44', '2024-11-03 21:31:44'),
(116, 6, NULL, NULL, '2024-11-03 21:31:44', '2024-11-03 21:31:44'),
(117, 7, NULL, NULL, '2024-11-03 21:36:59', '2024-11-03 21:36:59'),
(118, 2, NULL, NULL, '2024-11-03 21:51:16', '2024-11-03 21:51:16'),
(119, 2, NULL, NULL, '2024-11-03 22:05:35', '2024-11-03 22:05:35'),
(120, 6, NULL, NULL, '2024-11-04 01:45:04', '2024-11-04 01:45:04'),
(121, 5, NULL, NULL, '2024-11-04 03:37:57', '2024-11-04 03:37:57'),
(122, 7, NULL, NULL, '2024-11-04 05:34:54', '2024-11-04 05:34:54'),
(123, 5, NULL, NULL, '2024-11-04 12:38:44', '2024-11-04 12:38:44'),
(124, 4, NULL, NULL, '2024-11-04 12:38:45', '2024-11-04 12:38:45'),
(125, 7, NULL, NULL, '2024-11-04 12:38:46', '2024-11-04 12:38:46'),
(126, 6, NULL, NULL, '2024-11-04 12:39:00', '2024-11-04 12:39:00'),
(127, 5, NULL, NULL, '2024-11-04 14:28:34', '2024-11-04 14:28:34'),
(128, 5, NULL, NULL, '2024-11-04 14:28:50', '2024-11-04 14:28:50'),
(129, 3, NULL, NULL, '2024-11-04 17:57:59', '2024-11-04 17:57:59'),
(130, 1, NULL, NULL, '2024-11-04 20:52:00', '2024-11-04 20:52:00'),
(131, 4, NULL, NULL, '2024-11-05 01:54:33', '2024-11-05 01:54:33'),
(132, 4, NULL, NULL, '2024-11-05 12:46:14', '2024-11-05 12:46:14'),
(133, 6, NULL, NULL, '2024-11-07 05:46:42', '2024-11-07 05:46:42'),
(134, 2, NULL, NULL, '2024-11-07 11:24:22', '2024-11-07 11:24:22'),
(135, 7, NULL, NULL, '2024-11-07 11:29:28', '2024-11-07 11:29:28'),
(136, 3, NULL, NULL, '2024-11-07 11:29:40', '2024-11-07 11:29:40'),
(137, 1, NULL, NULL, '2024-11-07 19:49:09', '2024-11-07 19:49:09'),
(138, 4, NULL, NULL, '2024-11-08 06:27:18', '2024-11-08 06:27:18'),
(139, 5, NULL, NULL, '2024-11-08 17:46:57', '2024-11-08 17:46:57'),
(140, 4, NULL, NULL, '2024-11-08 19:11:29', '2024-11-08 19:11:29'),
(141, 7, NULL, NULL, '2024-11-08 19:12:10', '2024-11-08 19:12:10'),
(142, 4, NULL, NULL, '2024-11-09 18:41:17', '2024-11-09 18:41:17'),
(143, 7, NULL, NULL, '2024-11-09 20:38:47', '2024-11-09 20:38:47'),
(144, 4, NULL, NULL, '2024-11-09 23:17:47', '2024-11-09 23:17:47'),
(145, 3, NULL, NULL, '2024-11-10 06:03:29', '2024-11-10 06:03:29'),
(146, 4, NULL, NULL, '2024-11-12 20:31:37', '2024-11-12 20:31:37'),
(147, 4, NULL, NULL, '2024-11-12 20:31:43', '2024-11-12 20:31:43'),
(148, 5, NULL, NULL, '2024-11-13 07:37:22', '2024-11-13 07:37:22'),
(149, 3, NULL, NULL, '2024-11-13 15:57:53', '2024-11-13 15:57:53'),
(150, 2, NULL, NULL, '2024-11-14 17:10:58', '2024-11-14 17:10:58'),
(151, 2, NULL, NULL, '2024-11-14 23:55:05', '2024-11-14 23:55:05'),
(152, 2, NULL, NULL, '2024-11-15 21:53:18', '2024-11-15 21:53:18'),
(153, 4, NULL, NULL, '2024-11-21 09:08:20', '2024-11-21 09:08:20'),
(154, 4, NULL, NULL, '2024-11-21 09:08:35', '2024-11-21 09:08:35'),
(155, 6, NULL, NULL, '2024-11-21 15:42:08', '2024-11-21 15:42:08'),
(156, 1, NULL, NULL, '2024-11-22 07:12:00', '2024-11-22 07:12:00'),
(157, 1, NULL, NULL, '2024-11-22 22:45:56', '2024-11-22 22:45:56'),
(158, 3, NULL, NULL, '2024-11-23 01:01:16', '2024-11-23 01:01:16'),
(159, 2, NULL, NULL, '2024-11-24 12:44:09', '2024-11-24 12:44:09'),
(160, 2, NULL, NULL, '2024-11-24 18:20:09', '2024-11-24 18:20:09'),
(161, 7, NULL, NULL, '2024-11-26 03:20:46', '2024-11-26 03:20:46'),
(162, 4, NULL, NULL, '2024-11-26 10:53:26', '2024-11-26 10:53:26'),
(163, 1, NULL, NULL, '2024-11-27 02:06:00', '2024-11-27 02:06:00'),
(164, 6, NULL, NULL, '2024-11-28 18:32:49', '2024-11-28 18:32:49'),
(165, 1, NULL, NULL, '2024-11-28 23:34:27', '2024-11-28 23:34:27'),
(166, 1, NULL, NULL, '2024-11-29 00:06:51', '2024-11-29 00:06:51'),
(167, 7, NULL, NULL, '2024-11-29 00:08:30', '2024-11-29 00:08:30'),
(168, 6, NULL, NULL, '2024-11-29 23:52:22', '2024-11-29 23:52:22'),
(169, 6, NULL, NULL, '2024-11-30 00:05:47', '2024-11-30 00:05:47'),
(170, 6, NULL, NULL, '2024-11-30 14:45:17', '2024-11-30 14:45:17'),
(171, 4, NULL, NULL, '2024-11-30 14:47:17', '2024-11-30 14:47:17'),
(172, 1, NULL, NULL, '2024-11-30 14:49:07', '2024-11-30 14:49:07'),
(173, 2, NULL, NULL, '2024-11-30 14:50:54', '2024-11-30 14:50:54'),
(174, 7, NULL, NULL, '2024-11-30 15:44:20', '2024-11-30 15:44:20'),
(175, 6, NULL, NULL, '2024-11-30 16:04:55', '2024-11-30 16:04:55'),
(176, 3, NULL, NULL, '2024-11-30 16:32:09', '2024-11-30 16:32:09'),
(177, 5, NULL, NULL, '2024-11-30 16:33:59', '2024-11-30 16:33:59'),
(178, 7, NULL, NULL, '2024-11-30 16:35:58', '2024-11-30 16:35:58'),
(179, 6, NULL, NULL, '2024-11-30 17:08:11', '2024-11-30 17:08:11'),
(180, 8, NULL, NULL, '2024-11-30 17:24:01', '2024-11-30 17:24:01'),
(181, 8, NULL, NULL, '2024-11-30 17:29:29', '2024-11-30 17:29:29'),
(182, 9, NULL, NULL, '2024-11-30 17:33:21', '2024-11-30 17:33:21'),
(183, 10, NULL, NULL, '2024-11-30 17:39:02', '2024-11-30 17:39:02'),
(184, 11, NULL, NULL, '2024-11-30 17:43:38', '2024-11-30 17:43:38'),
(185, 12, NULL, NULL, '2024-11-30 17:47:45', '2024-11-30 17:47:45'),
(186, 12, NULL, NULL, '2024-11-30 17:48:22', '2024-11-30 17:48:22'),
(187, 13, NULL, NULL, '2024-11-30 18:00:13', '2024-11-30 18:00:13'),
(188, 14, NULL, NULL, '2024-11-30 18:15:12', '2024-11-30 18:15:12'),
(189, 15, NULL, NULL, '2024-11-30 18:19:34', '2024-11-30 18:19:34'),
(190, 16, NULL, NULL, '2024-11-30 20:39:41', '2024-11-30 20:39:41'),
(191, 16, NULL, NULL, '2024-11-30 20:40:49', '2024-11-30 20:40:49'),
(192, 17, NULL, NULL, '2024-11-30 20:54:23', '2024-11-30 20:54:23'),
(193, 17, NULL, NULL, '2024-11-30 20:54:34', '2024-11-30 20:54:34'),
(194, 18, NULL, NULL, '2024-11-30 21:00:43', '2024-11-30 21:00:43'),
(195, 18, NULL, NULL, '2024-11-30 21:01:11', '2024-11-30 21:01:11'),
(196, 19, NULL, NULL, '2024-11-30 21:05:33', '2024-11-30 21:05:33'),
(197, 13, NULL, NULL, '2024-11-30 21:08:38', '2024-11-30 21:08:38'),
(198, 6, NULL, NULL, '2024-11-30 21:21:15', '2024-11-30 21:21:15'),
(199, 8, NULL, NULL, '2024-11-30 22:07:15', '2024-11-30 22:07:15'),
(200, 9, NULL, NULL, '2024-11-30 23:06:07', '2024-11-30 23:06:07'),
(201, 9, NULL, NULL, '2024-11-30 23:06:08', '2024-11-30 23:06:08'),
(202, 19, NULL, NULL, '2024-11-30 23:10:50', '2024-11-30 23:10:50'),
(203, 19, NULL, NULL, '2024-11-30 23:10:51', '2024-11-30 23:10:51'),
(204, 18, NULL, NULL, '2024-11-30 23:11:32', '2024-11-30 23:11:32'),
(205, 18, NULL, NULL, '2024-11-30 23:11:32', '2024-11-30 23:11:32'),
(206, 17, NULL, NULL, '2024-11-30 23:12:06', '2024-11-30 23:12:06'),
(207, 17, NULL, NULL, '2024-11-30 23:12:06', '2024-11-30 23:12:06'),
(208, 16, NULL, NULL, '2024-11-30 23:12:49', '2024-11-30 23:12:49'),
(209, 16, NULL, NULL, '2024-11-30 23:12:49', '2024-11-30 23:12:49'),
(210, 15, NULL, NULL, '2024-11-30 23:13:38', '2024-11-30 23:13:38'),
(211, 15, NULL, NULL, '2024-11-30 23:13:38', '2024-11-30 23:13:38'),
(212, 14, NULL, NULL, '2024-11-30 23:14:28', '2024-11-30 23:14:28'),
(213, 14, NULL, NULL, '2024-11-30 23:14:28', '2024-11-30 23:14:28'),
(214, 14, NULL, NULL, '2024-11-30 23:14:32', '2024-11-30 23:14:32'),
(215, 13, NULL, NULL, '2024-11-30 23:15:04', '2024-11-30 23:15:04'),
(216, 13, NULL, NULL, '2024-11-30 23:15:04', '2024-11-30 23:15:04'),
(217, 12, NULL, NULL, '2024-11-30 23:15:29', '2024-11-30 23:15:29'),
(218, 12, NULL, NULL, '2024-11-30 23:15:29', '2024-11-30 23:15:29'),
(219, 11, NULL, NULL, '2024-11-30 23:15:56', '2024-11-30 23:15:56'),
(220, 11, NULL, NULL, '2024-11-30 23:15:56', '2024-11-30 23:15:56'),
(221, 10, NULL, NULL, '2024-11-30 23:16:21', '2024-11-30 23:16:21'),
(222, 10, NULL, NULL, '2024-11-30 23:16:21', '2024-11-30 23:16:21'),
(223, 9, NULL, NULL, '2024-11-30 23:17:16', '2024-11-30 23:17:16'),
(224, 9, NULL, NULL, '2024-11-30 23:17:17', '2024-11-30 23:17:17'),
(225, 20, NULL, NULL, '2024-11-30 23:40:29', '2024-11-30 23:40:29'),
(226, 15, NULL, NULL, '2024-11-30 23:42:16', '2024-11-30 23:42:16'),
(227, 19, NULL, NULL, '2024-11-30 23:48:23', '2024-11-30 23:48:23'),
(228, 21, NULL, NULL, '2024-11-30 23:49:01', '2024-11-30 23:49:01'),
(229, 22, NULL, NULL, '2024-11-30 23:58:16', '2024-11-30 23:58:16'),
(230, 23, NULL, NULL, '2024-12-01 00:10:01', '2024-12-01 00:10:01'),
(231, 23, NULL, NULL, '2024-12-01 00:12:14', '2024-12-01 00:12:14'),
(232, 18, NULL, NULL, '2024-12-01 00:36:23', '2024-12-01 00:36:23'),
(233, 23, NULL, NULL, '2024-12-01 00:41:59', '2024-12-01 00:41:59'),
(234, 23, NULL, NULL, '2024-12-01 00:41:59', '2024-12-01 00:41:59'),
(235, 22, NULL, NULL, '2024-12-01 00:42:37', '2024-12-01 00:42:37'),
(236, 22, NULL, NULL, '2024-12-01 00:42:38', '2024-12-01 00:42:38'),
(237, 13, NULL, NULL, '2024-12-01 00:55:14', '2024-12-01 00:55:14'),
(238, 23, NULL, NULL, '2024-12-01 01:05:16', '2024-12-01 01:05:16'),
(239, 17, NULL, NULL, '2024-12-01 02:47:20', '2024-12-01 02:47:20'),
(240, 11, NULL, NULL, '2024-12-01 03:11:29', '2024-12-01 03:11:29'),
(241, 10, NULL, NULL, '2024-12-01 05:02:27', '2024-12-01 05:02:27'),
(242, 9, NULL, NULL, '2024-12-01 06:45:24', '2024-12-01 06:45:24'),
(243, 3, NULL, NULL, '2024-12-01 09:50:29', '2024-12-01 09:50:29'),
(244, 14, NULL, NULL, '2024-12-01 10:32:49', '2024-12-01 10:32:49'),
(245, 21, NULL, NULL, '2024-12-01 15:01:57', '2024-12-01 15:01:57'),
(246, 20, NULL, NULL, '2024-12-01 16:06:01', '2024-12-01 16:06:01'),
(247, 9, NULL, NULL, '2024-12-01 18:01:00', '2024-12-01 18:01:00'),
(248, 11, NULL, NULL, '2024-12-01 19:12:43', '2024-12-01 19:12:43'),
(249, 2, NULL, NULL, '2024-12-01 21:01:33', '2024-12-01 21:01:33'),
(250, 19, NULL, NULL, '2024-12-01 22:51:19', '2024-12-01 22:51:19'),
(251, 5, NULL, NULL, '2024-12-02 15:59:45', '2024-12-02 15:59:45'),
(252, 7, NULL, NULL, '2024-12-02 16:58:21', '2024-12-02 16:58:21'),
(253, 24, NULL, NULL, '2024-12-02 18:50:50', '2024-12-02 18:50:50'),
(254, 24, NULL, NULL, '2024-12-02 18:51:50', '2024-12-02 18:51:50'),
(255, 24, NULL, NULL, '2024-12-02 18:52:35', '2024-12-02 18:52:35'),
(256, 24, NULL, NULL, '2024-12-02 18:52:35', '2024-12-02 18:52:35'),
(257, 3, NULL, NULL, '2024-12-02 20:41:07', '2024-12-02 20:41:07'),
(258, 2, NULL, NULL, '2024-12-02 21:04:27', '2024-12-02 21:04:27'),
(259, 24, NULL, NULL, '2024-12-02 22:46:38', '2024-12-02 22:46:38'),
(260, 2, NULL, NULL, '2024-12-03 00:13:44', '2024-12-03 00:13:44'),
(261, 2, NULL, NULL, '2024-12-03 00:13:44', '2024-12-03 00:13:44'),
(262, 2, NULL, NULL, '2024-12-03 06:03:43', '2024-12-03 06:03:43'),
(263, 19, NULL, NULL, '2024-12-04 16:40:30', '2024-12-04 16:40:30'),
(264, 11, NULL, NULL, '2024-12-05 13:39:23', '2024-12-05 13:39:23'),
(265, 13, NULL, NULL, '2024-12-05 21:38:11', '2024-12-05 21:38:11'),
(266, 3, NULL, NULL, '2024-12-05 21:40:59', '2024-12-05 21:40:59'),
(267, 2, NULL, NULL, '2024-12-05 21:41:03', '2024-12-05 21:41:03'),
(268, 7, NULL, NULL, '2024-12-05 21:42:11', '2024-12-05 21:42:11'),
(269, 14, NULL, NULL, '2024-12-05 21:47:11', '2024-12-05 21:47:11'),
(270, 23, NULL, NULL, '2024-12-05 21:50:11', '2024-12-05 21:50:11'),
(271, 1, NULL, NULL, '2024-12-05 21:55:15', '2024-12-05 21:55:15'),
(272, 5, NULL, NULL, '2024-12-05 21:55:19', '2024-12-05 21:55:19'),
(273, 9, NULL, NULL, '2024-12-05 21:57:59', '2024-12-05 21:57:59'),
(274, 20, NULL, NULL, '2024-12-05 21:59:11', '2024-12-05 21:59:11'),
(275, 4, NULL, NULL, '2024-12-05 21:59:15', '2024-12-05 21:59:15'),
(276, 6, NULL, NULL, '2024-12-05 21:59:19', '2024-12-05 21:59:19'),
(277, 21, NULL, NULL, '2024-12-05 22:00:57', '2024-12-05 22:00:57'),
(278, 22, NULL, NULL, '2024-12-05 22:01:23', '2024-12-05 22:01:23'),
(279, 11, NULL, NULL, '2024-12-05 22:02:07', '2024-12-05 22:02:07'),
(280, 24, NULL, NULL, '2024-12-05 22:02:11', '2024-12-05 22:02:11'),
(281, 10, NULL, NULL, '2024-12-05 22:02:15', '2024-12-05 22:02:15'),
(282, 8, NULL, NULL, '2024-12-05 22:02:19', '2024-12-05 22:02:19'),
(283, 16, NULL, NULL, '2024-12-05 22:04:07', '2024-12-05 22:04:07'),
(284, 19, NULL, NULL, '2024-12-05 22:04:11', '2024-12-05 22:04:11'),
(285, 18, NULL, NULL, '2024-12-05 22:04:15', '2024-12-05 22:04:15'),
(286, 17, NULL, NULL, '2024-12-05 22:04:19', '2024-12-05 22:04:19'),
(287, 15, NULL, NULL, '2024-12-05 22:04:35', '2024-12-05 22:04:35'),
(288, 12, NULL, NULL, '2024-12-05 22:04:39', '2024-12-05 22:04:39'),
(289, 4, NULL, NULL, '2024-12-05 22:18:08', '2024-12-05 22:18:08'),
(290, 6, NULL, NULL, '2024-12-06 13:35:41', '2024-12-06 13:35:41'),
(291, 19, NULL, NULL, '2024-12-06 14:54:09', '2024-12-06 14:54:09'),
(292, 21, NULL, NULL, '2024-12-06 15:16:47', '2024-12-06 15:16:47'),
(293, 14, NULL, NULL, '2024-12-06 15:17:00', '2024-12-06 15:17:00'),
(294, 20, NULL, NULL, '2024-12-06 15:17:16', '2024-12-06 15:17:16'),
(295, 6, NULL, NULL, '2024-12-06 15:17:33', '2024-12-06 15:17:33'),
(296, 13, NULL, NULL, '2024-12-06 15:17:49', '2024-12-06 15:17:49'),
(297, 2, NULL, NULL, '2024-12-06 15:18:03', '2024-12-06 15:18:03'),
(298, 9, NULL, NULL, '2024-12-06 15:18:17', '2024-12-06 15:18:17'),
(299, 4, NULL, NULL, '2024-12-06 17:00:17', '2024-12-06 17:00:17'),
(300, 21, NULL, NULL, '2024-12-06 18:14:51', '2024-12-06 18:14:51'),
(301, 6, NULL, NULL, '2024-12-06 18:15:06', '2024-12-06 18:15:06'),
(302, 20, NULL, NULL, '2024-12-06 18:15:21', '2024-12-06 18:15:21'),
(303, 19, NULL, NULL, '2024-12-06 18:15:37', '2024-12-06 18:15:37'),
(304, 13, NULL, NULL, '2024-12-06 18:15:52', '2024-12-06 18:15:52'),
(305, 2, NULL, NULL, '2024-12-06 18:16:23', '2024-12-06 18:16:23'),
(306, 14, NULL, NULL, '2024-12-06 18:19:07', '2024-12-06 18:19:07'),
(307, 9, NULL, NULL, '2024-12-06 18:20:23', '2024-12-06 18:20:23'),
(308, 17, NULL, NULL, '2024-12-06 19:47:41', '2024-12-06 19:47:41'),
(309, 17, NULL, NULL, '2024-12-06 19:47:47', '2024-12-06 19:47:47'),
(310, 17, NULL, NULL, '2024-12-06 19:47:47', '2024-12-06 19:47:47'),
(311, 17, NULL, NULL, '2024-12-06 19:47:47', '2024-12-06 19:47:47'),
(312, 17, NULL, NULL, '2024-12-06 19:47:48', '2024-12-06 19:47:48'),
(313, 17, NULL, NULL, '2024-12-06 19:47:49', '2024-12-06 19:47:49'),
(314, 17, NULL, NULL, '2024-12-06 19:47:50', '2024-12-06 19:47:50'),
(315, 17, NULL, NULL, '2024-12-06 19:52:46', '2024-12-06 19:52:46'),
(316, 17, NULL, NULL, '2024-12-06 19:52:56', '2024-12-06 19:52:56'),
(317, 17, NULL, NULL, '2024-12-06 20:49:15', '2024-12-06 20:49:15'),
(318, 17, NULL, NULL, '2024-12-06 20:49:17', '2024-12-06 20:49:17'),
(319, 17, NULL, NULL, '2024-12-06 20:49:33', '2024-12-06 20:49:33'),
(320, 17, NULL, NULL, '2024-12-06 20:49:50', '2024-12-06 20:49:50'),
(321, 17, NULL, NULL, '2024-12-06 21:04:38', '2024-12-06 21:04:38'),
(322, 17, NULL, NULL, '2024-12-06 22:08:47', '2024-12-06 22:08:47'),
(323, 25, NULL, NULL, '2024-12-06 22:13:53', '2024-12-06 22:13:53'),
(324, 25, NULL, NULL, '2024-12-06 22:13:53', '2024-12-06 22:13:53'),
(325, 25, NULL, NULL, '2024-12-06 22:14:53', '2024-12-06 22:14:53'),
(326, 25, NULL, NULL, '2024-12-06 22:15:07', '2024-12-06 22:15:07'),
(327, 25, NULL, NULL, '2024-12-06 22:46:47', '2024-12-06 22:46:47'),
(328, 18, NULL, NULL, '2024-12-07 00:02:48', '2024-12-07 00:02:48'),
(329, 9, NULL, NULL, '2024-12-07 04:54:40', '2024-12-07 04:54:40'),
(330, 17, NULL, NULL, '2024-12-07 09:15:54', '2024-12-07 09:15:54'),
(331, 12, NULL, NULL, '2024-12-07 09:49:21', '2024-12-07 09:49:21'),
(332, 19, NULL, NULL, '2024-12-07 10:44:56', '2024-12-07 10:44:56'),
(333, 7, NULL, NULL, '2024-12-07 12:02:47', '2024-12-07 12:02:47'),
(334, 17, NULL, NULL, '2024-12-07 14:37:56', '2024-12-07 14:37:56'),
(335, 14, NULL, NULL, '2024-12-07 15:56:17', '2024-12-07 15:56:17'),
(336, 13, NULL, NULL, '2024-12-07 16:15:46', '2024-12-07 16:15:46'),
(337, 23, NULL, NULL, '2024-12-07 19:52:55', '2024-12-07 19:52:55'),
(338, 19, NULL, NULL, '2024-12-07 21:18:21', '2024-12-07 21:18:21'),
(339, 17, NULL, NULL, '2024-12-07 23:27:55', '2024-12-07 23:27:55'),
(340, 5, NULL, NULL, '2024-12-07 23:33:28', '2024-12-07 23:33:28'),
(341, 17, NULL, NULL, '2024-12-08 00:35:53', '2024-12-08 00:35:53'),
(342, 6, NULL, NULL, '2024-12-08 10:39:07', '2024-12-08 10:39:07'),
(343, 9, NULL, NULL, '2024-12-08 14:20:24', '2024-12-08 14:20:24'),
(344, 17, NULL, NULL, '2024-12-08 14:49:56', '2024-12-08 14:49:56'),
(345, 6, NULL, NULL, '2024-12-08 21:48:23', '2024-12-08 21:48:23'),
(346, 18, NULL, NULL, '2024-12-09 05:58:48', '2024-12-09 05:58:48'),
(347, 18, NULL, NULL, '2024-12-09 11:32:32', '2024-12-09 11:32:32'),
(348, 18, NULL, NULL, '2024-12-09 15:33:26', '2024-12-09 15:33:26'),
(349, 18, NULL, NULL, '2024-12-09 16:34:12', '2024-12-09 16:34:12'),
(350, 19, NULL, NULL, '2024-12-09 19:59:00', '2024-12-09 19:59:00'),
(351, 17, NULL, NULL, '2024-12-09 21:15:03', '2024-12-09 21:15:03'),
(352, 18, NULL, NULL, '2024-12-10 10:58:36', '2024-12-10 10:58:36'),
(353, 13, NULL, NULL, '2024-12-10 13:37:12', '2024-12-10 13:37:12'),
(354, 19, NULL, NULL, '2024-12-10 16:31:31', '2024-12-10 16:31:31'),
(355, 7, NULL, NULL, '2024-12-10 18:25:12', '2024-12-10 18:25:12'),
(356, 14, NULL, NULL, '2024-12-10 20:22:12', '2024-12-10 20:22:12'),
(357, 9, NULL, NULL, '2024-12-10 21:41:43', '2024-12-10 21:41:43'),
(358, 7, NULL, NULL, '2024-12-10 21:46:46', '2024-12-10 21:46:46'),
(359, 18, NULL, NULL, '2024-12-11 05:35:06', '2024-12-11 05:35:06'),
(360, 9, NULL, NULL, '2024-12-11 10:24:20', '2024-12-11 10:24:20'),
(361, 19, NULL, NULL, '2024-12-11 23:30:03', '2024-12-11 23:30:03'),
(362, 17, NULL, NULL, '2024-12-11 23:53:19', '2024-12-11 23:53:19'),
(363, 17, NULL, NULL, '2024-12-12 00:39:06', '2024-12-12 00:39:06'),
(364, 17, NULL, NULL, '2024-12-12 00:39:26', '2024-12-12 00:39:26'),
(365, 13, NULL, NULL, '2024-12-12 08:12:09', '2024-12-12 08:12:09'),
(366, 17, NULL, NULL, '2024-12-12 16:00:03', '2024-12-12 16:00:03'),
(367, 14, NULL, NULL, '2024-12-12 21:50:45', '2024-12-12 21:50:45'),
(368, 20, NULL, NULL, '2024-12-13 01:58:11', '2024-12-13 01:58:11'),
(369, 1, NULL, NULL, '2024-12-13 20:27:35', '2024-12-13 20:27:35'),
(370, 23, NULL, NULL, '2024-12-13 22:19:27', '2024-12-13 22:19:27'),
(371, 19, NULL, NULL, '2024-12-14 16:17:42', '2024-12-14 16:17:42'),
(372, 21, NULL, NULL, '2024-12-14 17:51:05', '2024-12-14 17:51:05'),
(373, 3, NULL, NULL, '2024-12-14 18:28:13', '2024-12-14 18:28:13'),
(374, 16, NULL, NULL, '2024-12-15 15:35:40', '2024-12-15 15:35:40'),
(375, 18, NULL, NULL, '2024-12-15 19:28:41', '2024-12-15 19:28:41'),
(376, 23, NULL, NULL, '2024-12-15 20:00:56', '2024-12-15 20:00:56'),
(377, 17, NULL, NULL, '2024-12-16 06:23:56', '2024-12-16 06:23:56'),
(378, 7, NULL, NULL, '2024-12-16 09:59:26', '2024-12-16 09:59:26'),
(379, 23, NULL, NULL, '2024-12-18 00:13:48', '2024-12-18 00:13:48'),
(380, 17, NULL, NULL, '2024-12-18 08:35:40', '2024-12-18 08:35:40'),
(381, 9, NULL, NULL, '2024-12-18 15:20:59', '2024-12-18 15:20:59'),
(382, 17, NULL, NULL, '2024-12-19 13:27:05', '2024-12-19 13:27:05'),
(383, 15, NULL, NULL, '2024-12-20 00:25:50', '2024-12-20 00:25:50'),
(384, 17, NULL, NULL, '2024-12-20 05:34:45', '2024-12-20 05:34:45'),
(385, 3, NULL, NULL, '2024-12-20 14:45:10', '2024-12-20 14:45:10'),
(386, 19, NULL, NULL, '2024-12-21 21:54:50', '2024-12-21 21:54:50'),
(387, 21, NULL, NULL, '2024-12-21 21:59:47', '2024-12-21 21:59:47'),
(388, 14, NULL, NULL, '2024-12-21 21:59:50', '2024-12-21 21:59:50'),
(389, 6, NULL, NULL, '2024-12-21 21:59:52', '2024-12-21 21:59:52'),
(390, 13, NULL, NULL, '2024-12-21 21:59:56', '2024-12-21 21:59:56'),
(391, 9, NULL, NULL, '2024-12-21 21:59:59', '2024-12-21 21:59:59'),
(392, 17, NULL, NULL, '2024-12-21 22:00:01', '2024-12-21 22:00:01'),
(393, 14, NULL, NULL, '2024-12-21 23:39:41', '2024-12-21 23:39:41'),
(394, 17, NULL, NULL, '2024-12-22 01:50:46', '2024-12-22 01:50:46'),
(395, 21, NULL, NULL, '2024-12-22 01:50:58', '2024-12-22 01:50:58'),
(396, 6, NULL, NULL, '2024-12-22 01:51:10', '2024-12-22 01:51:10'),
(397, 19, NULL, NULL, '2024-12-22 01:51:23', '2024-12-22 01:51:23'),
(398, 13, NULL, NULL, '2024-12-22 01:51:35', '2024-12-22 01:51:35'),
(399, 9, NULL, NULL, '2024-12-22 01:55:07', '2024-12-22 01:55:07'),
(400, 22, NULL, NULL, '2024-12-22 04:27:46', '2024-12-22 04:27:46'),
(401, 19, NULL, NULL, '2024-12-22 09:40:44', '2024-12-22 09:40:44'),
(402, 17, NULL, NULL, '2024-12-23 12:05:37', '2024-12-23 12:05:37'),
(403, 20, NULL, NULL, '2024-12-23 12:18:24', '2024-12-23 12:18:24'),
(404, 9, NULL, NULL, '2024-12-23 12:21:52', '2024-12-23 12:21:52'),
(405, 7, NULL, NULL, '2024-12-23 12:35:38', '2024-12-23 12:35:38'),
(406, 3, NULL, NULL, '2024-12-23 12:36:18', '2024-12-23 12:36:18'),
(407, 12, NULL, NULL, '2024-12-23 12:36:25', '2024-12-23 12:36:25'),
(408, 10, NULL, NULL, '2024-12-23 12:41:18', '2024-12-23 12:41:18'),
(409, 25, NULL, NULL, '2024-12-23 12:42:43', '2024-12-23 12:42:43'),
(410, 5, NULL, NULL, '2024-12-23 12:43:00', '2024-12-23 12:43:00'),
(411, 18, NULL, NULL, '2024-12-23 12:43:55', '2024-12-23 12:43:55'),
(412, 6, NULL, NULL, '2024-12-23 13:57:17', '2024-12-23 13:57:17'),
(413, 22, NULL, NULL, '2024-12-24 20:56:40', '2024-12-24 20:56:40'),
(414, 26, NULL, NULL, '2024-12-24 18:58:45', '2024-12-24 18:58:45'),
(415, 25, NULL, NULL, '2024-12-24 18:59:23', '2024-12-24 18:59:23'),
(416, 26, NULL, NULL, '2024-12-24 18:59:57', '2024-12-24 18:59:57'),
(417, 20, NULL, NULL, '2024-12-25 16:11:08', '2024-12-25 16:11:08'),
(418, 25, NULL, NULL, '2024-12-25 16:11:21', '2024-12-25 16:11:21'),
(419, 25, NULL, NULL, '2024-12-25 16:13:02', '2024-12-25 16:13:02'),
(420, 27, NULL, NULL, '2024-12-25 16:17:22', '2024-12-25 16:17:22'),
(421, 27, NULL, NULL, '2024-12-25 16:17:46', '2024-12-25 16:17:46'),
(422, 27, NULL, NULL, '2024-12-25 16:20:32', '2024-12-25 16:20:32'),
(423, 28, NULL, NULL, '2024-12-25 16:32:41', '2024-12-25 16:32:41'),
(424, 28, NULL, NULL, '2024-12-25 16:33:57', '2024-12-25 16:33:57'),
(425, 28, NULL, NULL, '2024-12-25 16:35:30', '2024-12-25 16:35:30'),
(426, 28, NULL, NULL, '2024-12-25 16:36:00', '2024-12-25 16:36:00'),
(427, 28, NULL, NULL, '2024-12-25 16:36:17', '2024-12-25 16:36:17'),
(428, 28, NULL, NULL, '2024-12-25 16:45:13', '2024-12-25 16:45:13'),
(429, 28, NULL, NULL, '2024-12-25 17:10:14', '2024-12-25 17:10:14'),
(430, 28, NULL, NULL, '2024-12-25 17:11:12', '2024-12-25 17:11:12'),
(431, 24, NULL, NULL, '2024-12-26 09:45:31', '2024-12-26 09:45:31'),
(432, 23, NULL, NULL, '2024-12-26 09:46:38', '2024-12-26 09:46:38'),
(433, 30, NULL, NULL, '2024-12-26 10:13:50', '2024-12-26 10:13:50'),
(434, 30, NULL, NULL, '2024-12-26 10:16:51', '2024-12-26 10:16:51'),
(435, 30, NULL, NULL, '2024-12-26 10:17:44', '2024-12-26 10:17:44'),
(436, 30, NULL, NULL, '2024-12-26 10:18:06', '2024-12-26 10:18:06'),
(437, 30, NULL, NULL, '2024-12-26 10:19:01', '2024-12-26 10:19:01'),
(438, 30, NULL, NULL, '2024-12-26 10:19:55', '2024-12-26 10:19:55'),
(439, 30, NULL, NULL, '2024-12-26 10:20:26', '2024-12-26 10:20:26'),
(440, 30, NULL, NULL, '2024-12-26 10:21:40', '2024-12-26 10:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`id`, `name`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Netflix', 'https://www.w3coderschool.com/movie_attachments/file_1695060397.jpg', 1, '2023-09-16 14:12:00', '2024-10-22 18:10:06'),
(2, 'BookMyShow', 'https://www.w3coderschool.com/movie_attachments/file_1695060060.webp', 1, '2023-09-16 14:40:11', '2024-10-22 18:10:20'),
(3, 'Prime Video', 'https://www.w3coderschool.com/movie_attachments/file_1695060648.webp', 1, '2023-09-18 18:12:53', '2024-10-22 18:11:01'),
(4, 'Zee 5', 'https://www.w3coderschool.com/movie_attachments/file_1695060834.webp', 1, '2023-09-18 18:14:16', '2024-10-22 18:10:28'),
(5, 'Jio Cinema', 'https://www.w3coderschool.com/movie_attachments/file_1695060897.webp', 1, '2023-09-18 18:16:26', '2024-10-22 18:10:44'),
(6, 'Disney Hotstar', 'https://www.w3coderschool.com/movie_attachments/file_1695061028.webp', 1, '2023-09-18 18:18:44', '2024-10-22 18:10:36'),
(7, 'MX player', 'https://www.w3coderschool.com/movie_attachments/file_1695061175.webp', 1, '2023-09-18 18:19:57', '2024-10-22 18:10:51'),
(8, 'Youtube', 'https://www.w3coderschool.com/movie_attachments/file_1695061241.webp', 1, '2023-09-18 18:21:14', '2024-10-22 18:11:07'),
(9, 'Voot', 'https://www.w3coderschool.com/movie_attachments/file_1695061305.webp', 1, '2023-09-18 18:22:46', '2024-10-22 18:11:24'),
(10, 'amazon Mini TV', 'https://www.w3coderschool.com/movie_attachments/file_1695061665.avif', 1, '2023-09-18 18:29:19', '2024-10-22 18:11:16'),
(11, 'Alt', 'https://www.w3coderschool.com/movie_attachments/file_1695061770.avif', 1, '2023-09-18 18:30:35', '2024-10-22 18:11:39'),
(12, 'Apple TV +', 'https://www.w3coderschool.com/movie_attachments/file_1699783555.webp', 1, '2023-11-12 10:06:08', '2024-10-22 18:11:32'),
(13, 'Coming Soon', 'https://www.w3coderschool.com/movie_attachments/file_1707161220.svg', 1, '2024-02-05 19:30:47', '2024-10-22 18:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `watch_links`
--

CREATE TABLE `watch_links` (
  `id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watch_links`
--

INSERT INTO `watch_links` (`id`, `platform_id`, `movie_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'https://www.primevideo.com/detail/0KQU5V0T0FGF8L5L368NKW6INT', '2024-10-26 10:37:18', '2024-10-26 10:37:18'),
(2, 5, 2, 'https://www.jiocinema.com/movies/the-miranda-brothers/4043354', '2024-10-26 14:24:06', '2024-10-26 14:24:06'),
(3, 2, 3, 'https://in.bookmyshow.com/movies/navras-katha-collage/ET00412742', '2024-10-27 23:13:30', '2024-10-27 23:13:30'),
(4, 1, 4, 'https://www.netflix.com/in/title/81681817', '2024-11-03 15:18:55', '2024-11-03 15:18:55'),
(5, 2, 5, 'https://in.bookmyshow.com/national-capital-region-ncr/movies/singham-again/ET00354858', '2024-11-03 15:41:42', '2024-11-03 15:41:42'),
(6, 2, 6, NULL, '2024-11-03 16:21:45', '2024-11-03 16:38:04'),
(7, 2, 7, NULL, '2024-11-03 16:37:06', '2024-11-03 16:37:06'),
(8, 2, 8, 'https://in.bookmyshow.com/movies/moana-2/ET00387901', '2024-11-30 17:23:26', '2024-11-30 17:23:26'),
(9, 3, 9, 'https://www.primevideo.com/detail/0M0TK271V8OODDGNO7UP1SW921', '2024-11-30 17:33:01', '2024-11-30 17:38:13'),
(10, 12, 10, 'https://tv.apple.com/in/movie/blitz/umc.cmc.1ivowfwigmx4dmfii3xekmoaq', '2024-11-30 17:37:25', '2024-11-30 17:37:25'),
(11, 12, 11, 'https://tv.apple.com/us/movie/bread--roses/umc.cmc.76dp605jvw9didum9xrra5hvc', '2024-11-30 17:42:43', '2024-11-30 17:42:43'),
(12, 13, 12, NULL, '2024-11-30 17:47:36', '2024-11-30 17:47:36'),
(13, 13, 13, NULL, '2024-11-30 17:54:09', '2024-11-30 17:54:09'),
(14, 13, 14, NULL, '2024-11-30 18:03:48', '2024-11-30 18:03:48'),
(15, 7, 15, 'https://www.sonyliv.com/movies/anel-meley-pani-thuli-tamil-1000196104', '2024-11-30 18:19:26', '2024-11-30 18:19:26'),
(16, 2, 16, 'https://in.bookmyshow.com/movies/mechanic-rocky/ET00405685', '2024-11-30 20:39:31', '2024-11-30 20:39:31'),
(17, 2, 17, 'https://in.bookmyshow.com/movies/zebra/ET00412304', '2024-11-30 20:52:34', '2024-11-30 20:52:34'),
(18, 13, 18, NULL, '2024-11-30 20:59:59', '2024-11-30 20:59:59'),
(19, 1, 19, 'https://www.netflix.com/in/title/81902035', '2024-11-30 21:04:28', '2024-11-30 21:04:28'),
(20, 4, 20, 'https://www.zee5.com/movies/details/despatch/0-0-1z5658028', '2024-11-30 23:39:15', '2024-11-30 23:39:15'),
(21, 13, 21, NULL, '2024-11-30 23:46:59', '2024-11-30 23:46:59'),
(22, 3, 22, NULL, '2024-11-30 23:54:37', '2024-11-30 23:58:00'),
(23, 13, 23, NULL, '2024-12-01 00:09:18', '2024-12-01 00:09:18'),
(24, 2, 24, 'https://in.bookmyshow.com/movies/christmas-eve-in-millers-point/ET00417677', '2024-12-02 18:50:39', '2024-12-02 18:50:39'),
(25, 2, 25, 'https://in.bookmyshow.com/movies/pushpa-2-the-rule/ET00356724', '2024-12-06 22:12:11', '2024-12-06 22:12:11'),
(26, 1, 26, NULL, '2024-12-24 18:58:32', '2024-12-25 00:28:32'),
(27, 1, 27, NULL, '2024-12-25 16:13:43', '2024-12-25 21:43:43'),
(28, 1, 28, NULL, '2024-12-25 16:32:36', '2024-12-25 22:02:36'),
(29, 1, 29, NULL, '2024-12-26 09:46:14', '2024-12-26 15:16:14'),
(30, 1, 30, NULL, '2024-12-26 09:47:09', '2024-12-26 15:17:09'),
(31, 1, 31, NULL, '2024-12-26 09:49:04', '2024-12-26 15:19:04'),
(32, 1, 32, NULL, '2024-12-26 09:50:19', '2024-12-26 15:20:19'),
(33, 1, 33, NULL, '2024-12-26 09:51:14', '2024-12-26 15:21:14'),
(34, 1, 34, NULL, '2024-12-26 09:53:59', '2024-12-26 15:23:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_links`
--
ALTER TABLE `book_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_attachments`
--
ALTER TABLE `movie_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_contents`
--
ALTER TABLE `movie_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_dubbeds`
--
ALTER TABLE `movie_dubbeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_languages`
--
ALTER TABLE `movie_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch_links`
--
ALTER TABLE `watch_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_links`
--
ALTER TABLE `book_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `movie_attachments`
--
ALTER TABLE `movie_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movie_contents`
--
ALTER TABLE `movie_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `movie_dubbeds`
--
ALTER TABLE `movie_dubbeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `movie_languages`
--
ALTER TABLE `movie_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `watch_links`
--
ALTER TABLE `watch_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
