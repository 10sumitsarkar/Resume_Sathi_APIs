-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 05:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ResumeSathi`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(50) NOT NULL,
  `article_type` int(20) DEFAULT 1,
  `article_title` varchar(255) DEFAULT NULL,
  `url_name` varchar(255) DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `meta_description` varchar(250) DEFAULT NULL,
  `meta_keyword` longtext DEFAULT NULL,
  `canonical_tag` varchar(250) DEFAULT NULL,
  `language_id` int(11) DEFAULT 1,
  `hero_image` varchar(255) DEFAULT NULL,
  `pageview` int(255) NOT NULL DEFAULT 0,
  `created_by` int(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_draft` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `article_attachments`
--

CREATE TABLE `article_attachments` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_type` int(11) NOT NULL DEFAULT 1 COMMENT '1->image, 2->gif, 3->video',
  `article_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `id` int(50) NOT NULL,
  `article_name` varchar(50) NOT NULL,
  `url_name` varchar(20) NOT NULL,
  `article_description` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `article_name`, `url_name`, `article_description`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'web-articles', 'You can learn many type of web development related articles here', '2021-09-12 17:33:33', '2021-11-19 12:00:38'),
(2, 'Technology', 'tech-articles', 'You can read many types of technology related articles here', '2021-09-12 17:33:33', '2021-11-19 12:05:38'),
(3, 'Our Blogs', 'blog-articles', 'You can read many types of blogging tips and trick related articles here', '2021-09-12 17:33:33', '2021-11-19 12:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `article_contents`
--

CREATE TABLE `article_contents` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `article_views`
--

CREATE TABLE `article_views` (
  `id` int(255) NOT NULL,
  `article_type` int(100) NOT NULL,
  `article_id` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fname`, `lname`, `phone`, `email`, `message`, `created_at`, `deleted_at`) VALUES
(1, 'sumit', 'sarkar', '+919123161793', '10sumitsarkar@gmail.com', 'hiii', '2021-10-06 17:11:00', NULL),
(2, 'Brenda', 'Reynolds', '787-289-2380', 'BRogers12@gmail.com', 'I was looking at your website and noticed it appears the word \"lastest\" is spelled wrong.  I had similar problems on my site until someone mentioned it to me and I also now use software from SpellPerfect.com to keep my site error free.', '2021-10-06 20:38:32', NULL),
(3, 'Delmas', 'Oyibo', '+2347038231108', 'dmocapital@gmail.com', 'I will like to work with your organisation. Thank you!', '2021-10-15 06:08:32', NULL),
(4, 'Anjum', 'shaista', '9708632876', 'anjumshaista024@gmail.com', 'I have some queries.', '2021-10-17 14:04:23', NULL),
(5, 'Bernadette', 'Swift', '908-766-9040', 'bernadette.swift0@outlook.com', 'Here\'s are 21 highly successful passive income strategies with zero upfront investment. Get the free guide here: https://cutt.ly/kRA9GgC', '2021-10-29 19:32:11', NULL),
(6, 'Caitlyn', 'Dambrosio', '0681 742 13 99', 'laok.duhoky4@disdraplo.com', 'Here\'s a way to get more buyers to your website: www.thefreestuffblog.xyz', '2021-10-29 23:58:17', NULL),
(7, 'Nicole', 'Sandes', '0379 3025183', 'sandes.nicole@msn.com', 'Seen your listing on www.shinynewad.xyz, are you still offering the $25 discount?', '2021-11-02 02:17:55', NULL),
(8, 'Yuwail', 'Zaisha', '923045433457', 'yuwailzaisha9@gmail.com', 'Full stack web developer', '2021-11-02 10:32:06', NULL),
(9, 'Adrienne', 'Adrienne', '0399 8041195', 'adrienne.smalls@gmail.com', 'Hey there \r\n \r\nBody Revolution - Medico Postura™ Body Posture Corrector\r\nImprove Your Posture INSTANTLY!\r\n\r\nGet it while it\'s still 60% OFF!  FREE Worldwide Shipping!\r\n\r\nGet yours here: medicopostura.com\r\n \r\nBest regards, \r\n \r\nAdrienne\r\nResumeSathi Online Tutorials', '2021-11-05 03:22:23', NULL),
(10, 'Hilda', 'Hilda', '(02) 6115 0159', 'info@bemultimediahost.com', 'Hi \r\n\r\nDo you have time to brush your dog\'s teeth every day?\r\n\r\nLet your dog clean his own teeth with our dog dental care brushing stick. Made of eco-friendly natural rubber, this toothbrush is sturdy. The soft design is safe for your dogs\' gums and helps to clean their teeth and protect them from oral diseases and dental decay. \r\n\r\nAct Now And Receive A Special Discount!\r\n\r\nClick here: https://dogcare.center\r\n\r\nKind Regards, \r\n \r\nHilda', '2021-11-09 16:10:04', NULL),
(11, 'Rickey', 'Rickey', '06-26937713', 'rickey.loe81@yahoo.com', 'Morning \r\n \r\nPawSafer™ CAN SAFELY TRIM YOUR DOG\'S NAILS IN NO TIME FROM HOME.\r\n\r\nGet it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: pawsafer.shop\r\n \r\nKind Regards, \r\n \r\nRickey', '2021-11-20 22:19:43', NULL),
(12, 'Ira', 'Schuster', '972-426-5079', 'schuster.ira@gmail.com', 'Want permanent free backlinks? Here is a list of high traffic sites that accept free ad postings: https://26uf.short.gy/sites-that-accept-free-ads', '2021-11-21 23:52:35', NULL),
(13, 'Gary', 'Gary', '079 2899 3377', 'comino.gary42@gmail.com', 'Full Body Resistance Band Kit - The best and cheapest athletic gear available on the market today.\r\n \r\nDo a full body workout from the comfort of your home. You don\'t even need a gym anymore! \r\n\r\nSave 50% OFF + FREE Worldwide Shipping\r\n\r\nShop Now: https://ametathletics.store\r\n\r\nKind Regards,\r\n\r\nGary', '2021-11-24 13:13:56', NULL),
(14, 'Curtis', 'Wymer', '06211 13 53 04', 'info@londoncoffeefestival.com', 'Thanks for attending one of our past events!\r\n\r\nAs a member, we will give you exclusive deals and offers from our partners which are not available to the public.\r\n\r\nWe will be sending you a few special offers every single day for the next year.\r\n\r\nOur partner: https://www.maxprog.com\r\n\r\nKind regards\r\n\r\nAllegra Events Limited\r\n106 Arlington Road\r\nCamden Town, London\r\nNW1 7HP\r\nUnited Kingdom\r\nRegistered in England No. 6754003\r\nTel: +44(0)20 7691 8800', '2021-11-25 07:52:33', NULL),
(15, 'Marcella', 'Marcella', '(07) 4070 4326', 'info@wik-frombork.pl', 'Hello there \r\n\r\nThe New Powerful LED Flashlight is The Perfect Flashlight For Any Situation!\r\n\r\nThe 3,000 Lumens & Adjustable Zoom gives you the wide field of view and brightness other flashlights don’t have.\r\n\r\n50% OFF + Free Shipping!  Get it Now: https://linterna.shop\r\n\r\nTo your success, \r\n\r\nMarcella', '2021-11-26 12:48:34', NULL),
(16, 'Koby', 'Bergstrom', '964 73 064', 'info@londoncoffeefestival.com', 'Thanks for attending one of our past events!\r\n\r\nAs a member, we will give you exclusive deals and offers from our partners which are not available to the public.\r\n\r\nWe will be sending you a few special offers every single day for the next year.\r\n\r\nOur partner: https://glockeasymail.com\r\n\r\nKind regards\r\n\r\nAllegra Events Limited\r\n106 Arlington Road\r\nCamden Town, London\r\nNW1 7HP\r\nUnited Kingdom\r\nRegistered in England No. 6754003\r\nTel: +44(0)20 7691 8800', '2021-11-27 10:06:34', NULL),
(17, 'Silvia', 'Puig', '06-59843558', 'puig.silvia@yahoo.com', 'Want to improve your website\'s look and feel for free? Check out some of these free wordpress plugins: https://cutt.ly/nRdeCLH', '2021-11-27 17:13:28', NULL),
(18, 'Alan', 'Alan', '60-44-81-57', 'info@two2tango.info', 'Morning \r\n\r\nDon\'t you hate carrying a big bulky backpack when you are only going out for the day? This high quality shoulder bag solves that problem. \r\nCarry enough without bogging yourself down! Perfect for that fishing trip or day hike!\r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nBuy now: https://fashionbag.sale\r\n\r\nBest Wishes, \r\n\r\nAlan', '2021-11-29 16:29:56', NULL),
(19, 'Casey', 'Casey', '421 3648', 'casey@steuerberaterinhamburg.de', 'Hands Free Automatic Toothpaste Dispenser\r\n\r\nThis is A 5 Star Product. With this you will brush your mouth with ease and style. Even your children would love to brush 3 Times daily!\r\n\r\nFREE Worldwide Shipping for a LIMITED Time\r\n\r\nBuy now: https://ecocoshop.online\r\n\r\nTo your success,\r\n\r\nCasey', '2021-12-02 21:40:20', NULL),
(20, 'Terrell', 'Terrell', '(08) 8390 0349', 'terrell.beyers@gmail.com', 'We always struggled to pack before a trip. What to bring, how many or how much of it, etc...\r\nSo we have created this Foldable Travel Bag. It\'s Just So Versatile!\r\n\r\n. Easy to Fold and Unfold\r\n. Large Storage Space\r\n. Portable + Waterproof\r\n\r\n60% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time!\r\n\r\nBuy now: https://ifashiononline.shop\r\n\r\nKind Regards,\r\n\r\nTerrell', '2021-12-04 23:31:46', NULL),
(21, 'Shanna', 'Game', '(02) 9731 7116', 'info@londoncoffeefestival.com', 'Thanks for attending one of our past events!\r\n\r\nAs a member, we will give you exclusive deals and offers from our partners which are not available to the public.\r\n\r\nWe will be sending you a few special offers every single day for the next year.\r\n\r\nOur partner: https://www.dnb.co.uk\r\n\r\nKind regards\r\n\r\nAllegra Events Limited\r\n106 Arlington Road\r\nCamden Town, London\r\nNW1 7HP\r\nUnited Kingdom\r\nRegistered in England No. 6754003\r\nTel: +44(0)20 7691 8800', '2021-12-06 07:35:23', NULL),
(22, 'Emile', 'Emile', '(08) 8374 1672', 'whitney.emile10@gmail.com', 'Biggest Ever Sale NOW! \r\n50% OFF On Us! With this Soft Durable Pet Padded Mattress\r\n☑ 2x More Durable, Soft & Sustainable with high quality polyester materials\r\n☑ Easier to Wash \r\n☑ 30 Days Money Back Guarantee \r\n\r\nBuy now: petmattress.store\r\n\r\nAll the best, \r\nEmile', '2021-12-09 06:34:15', NULL),
(23, 'Elba', 'Elba', '04.62.97.01.09', 'elba@tjddzz.com', 'Good day \r\n\r\nAre you Scrambling while opening Jars, Bottles, and Cans? ������\r\n\r\nThis Jar Opener Takes The Strain & Frustration Out Of Opening Jars & Bottles!  Never Struggle with opening a jar again!\r\n\r\nClick Now & GET 50% OFF → https://kitchenopener.biz\r\n\r\nBest Wishes, \r\nElba', '2021-12-11 13:37:04', NULL),
(24, 'Lin', 'Bowens', '01.49.68.94.61', 'mahemoud@cakk.us', 'Automatic ad submission to thousands of ad sites every month. Submit your ad now: https://goolnk.com/ErzLE5', '2021-12-11 21:58:12', NULL),
(25, 'Deloras', 'Deloras', '02657 39 29 26', 'deloras@kgonk.com', 'Christmas Best Gift! Free Shipping!  We offer 90% OFF for the OnTheGo Tote!\r\n\r\nClick To See More Surprises: https://onthegotote.shop\r\n\r\nRegards, \r\nDeloras', '2021-12-13 23:50:05', NULL),
(26, 'Ima', 'Agee', '315-785-5370', 'info@londoncoffeefestival.com', 'Thanks for attending one of our past events!\r\n\r\nAs a member, we will give you exclusive deals and offers from our partners which are not available to the public.\r\n\r\nWe will be sending you a few special offers every single day for the next year.\r\n\r\nOur partner: https://www.sendinblue.com\r\n\r\nKind regards\r\n\r\nAllegra Events Limited\r\n106 Arlington Road\r\nCamden Town, London\r\nNW1 7HP\r\nUnited Kingdom\r\nRegistered in England No. 6754003\r\nTel: +44(0)20 7691 8800', '2021-12-14 07:49:05', NULL),
(27, 'Miriam', 'Miriam', '079 8812 7852', 'info@ResumeSathi.com', 'World\'s Best Neck Massager Get it Now 50% OFF + Free Shipping!\r\n\r\nWellness Enthusiasts! There has never been a better time to take care of your neck pain! \r\nOur clinical-grade TENS technology will ensure you have neck relief in as little as 20 minutes.\r\n\r\nGet Yours: hineck.online\r\n\r\nTo your success, \r\nMiriam\r\n\r\nResumeSathi Online Tutorials', '2021-12-16 11:57:45', NULL),
(28, 'Denise', 'Denise', '06-86032362', 'knutson@ResumeSathi.com', 'Hello\r\n\r\nOur Medical-Grade Toenail Clippers is the safest and especially recommended for those with troubles with winding nails, hard nails, two nails, nail cracks, deep nails, thickened nails etc..\r\n\r\nGet yours: thepodiatrist.store\r\n\r\nTo your success,\r\n\r\nDenise', '2021-12-18 02:29:56', NULL),
(29, 'Phoebe', 'Brunton', '(03) 5340 2151', 'info@londoncoffeefestival.com', 'Thanks for attending one of our past events!\r\n\r\nAs a member, we will give you exclusive deals and offers from our partners which are not available to the public.\r\n\r\nWe will be sending you a few special offers every single day for the next year.\r\n\r\nOur partner: https://www.marketingdatalists.co.uk\r\n\r\nKind regards\r\n\r\nAllegra Events Limited\r\n106 Arlington Road\r\nCamden Town, London\r\nNW1 7HP\r\nUnited Kingdom\r\nRegistered in England No. 6754003\r\nTel: +44(0)20 7691 8800', '2021-12-20 08:19:46', NULL),
(30, 'Byron', 'Byron', '06831 51 95 92', 'info@simpleklean383.online', 'SUPPER PROMOTION =>> Buy 2 get 1 free + 50% OFF\r\n\r\nSimpleKlean™ Groove Cleaning Brush IN MODEL 2021!  PP material handle, scouring brush head, good cleaning power. \r\nSimpleKlean™ can clear the door and window slides and gaps, etc., convenient and effortless.\r\nSuitable for multiple scenes, daily household cleaning, easy and effortless.\r\n\r\nGet Yours: simpleklean.online\r\n\r\nMany Thanks, \r\nByron\r\n\r\nResumeSathi Online Tutorials', '2021-12-20 19:06:51', NULL),
(31, 'Kylie', 'Hart', '089 70 61 27', 'kyliehartila@yahoo.com', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a \'dofollow\' backlink to ResumeSathi.com from our website that has a Moz Domain Authority of 50?\r\n\r\nWe charge just $30 (USD) to be paid via Paypal, card, or Payoneer. This is a one-time fee, so there are no extra charges and the link is permanent.\r\n\r\nIf you\'d like to know more about the site, please reply to this email and we can discuss further.\r\n\r\nKind Regards,\r\nKylie', '2021-12-22 15:50:44', NULL),
(32, 'Jamey', 'Jamey', '0650 922 52 59', 'jamey.molloy36@googlemail.com', 'New Multifunction Anti-theft Waterproof Sling Bag\r\n\r\nThe best ever SUPER Sling Bag: Drop-proof/Anti-theft/Scratch-resistant/USB Charging\r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nBuy now: fashiondaily.online\r\n\r\nMany Thanks, \r\n\r\nJamey\r\nResumeSathi Online Tutorials', '2021-12-23 17:10:37', NULL),
(33, 'Kristian', 'Kristian', '925-212-2430', 'kristian@ResumeSathi.com', 'New Multifunction Waterproof Backpack\r\n\r\nThe best ever SUPER Backpack: Drop-proof/Scratch-resistant/USB Charging/Large capacity storage\r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nBuy now: https://thebackpack.sale\r\n\r\nHave a great time, \r\n\r\nKristian', '2021-12-26 00:06:01', NULL),
(34, 'Sophia', 'Scott', '9043558989', 'graziani.alexandria@hotmail.com', 'Sophia sent you 2 messages yesterday. She is online now.\r\nClick the link below to view the message and reply to her.\r\n\r\nhttps://sexlovers.club/chat/SophiaScott/', '2021-12-26 20:02:07', NULL),
(35, 'Dillon', 'Dillon', '06743 57 50 18', 'dillon@ResumeSathi.com', 'EASE YOUR PAIN IN 10 MINUTES EFFORTLESSLY\r\n\r\nBe Free from Neck Pain\r\nTry NeckFlexer & Relieve Neck Pain Effortlessly In 10 Min!\r\nSave 50% OFF + FREE Worldwide Shipping\r\n\r\nShop Now: neckflexer.online\r\n\r\nMerry Christmas and happy new year!\r\n\r\nDillon \r\nResumeSathi Online Tutorials', '2021-12-28 23:40:53', NULL),
(36, 'Jeff', 'Jeff', '60 631 94 12', 'info@ResumeSathi.com', 'Good day \r\n \r\nDefrost frozen foods in minutes safely and naturally with our THAW KING™. \r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED \r\n\r\nBuy now: thawking.store\r\n \r\nCheers, \r\n \r\nJeff', '2021-12-30 22:23:30', NULL),
(37, 'Forbes', 'Blog', '9043558989', 'elvia.burger@msn.com', 'Christmas special prizes from Forbes.\r\n\r\nHurry up\r\n\r\nhttps://offers.forbes.blog/offers', '2021-12-31 11:44:28', NULL),
(38, 'Kelly', 'Davis', '252-844-2290', 'davis994@hotmail.com', 'In case you didn\'t realize, the word \"lastest\" on your site is spelled incorrectly.  I had similar issues on my website which hurt my credibility until someone pointed it out and I discovered some of the services like SpellHelper.com or SpellingCheck.com which help with these type of issues.', '2021-12-31 18:53:29', NULL),
(39, 'Joanne', 'Joanne', '0660 540 65 76', 'joanne.mcgrath@gmail.com', 'Do you have time to brush your dog\'s teeth every day?\r\n\r\nLet your dog clean his own teeth with our dog dental care brushing stick. Made of eco-friendly natural rubber, this toothbrush is sturdy. The soft design is safe for your dogs\' gums and helps to clean their teeth and protect them from oral diseases and dental decay. \r\n\r\nAct Now And Receive A Special Discount!\r\n\r\nClick here: https://dogcare.center\r\n\r\nThank You, \r\n \r\nJoanne', '2022-01-02 01:41:39', NULL),
(40, 'Horny', 'Shriya', '9043558989', 'mercedes.malley@hotmail.com', 'Horny Shriya sent you 2 messages yesterday. She is online now.\r\nClick the link below to view the message and reply to her.\r\n\r\nhttps://sexlovers.club/chat/HornyShriya/', '2022-01-04 11:26:35', NULL),
(41, 'Alecia', 'Alecia', '966 77 067', 'stein.alecia@gmail.com', 'Good day \r\n \r\nCAREDOGBEST™ - Personalized Dog Harness. All sizes from XS to XXL.  Easy ON/OFF in just 2 seconds.  LIFETIME WARRANTY.\r\n\r\nClick here: https://caredogbest.com\r\n \r\nKind Regards, \r\n \r\nAlecia\r\nResumeSathi Online Tutorials', '2022-01-05 01:55:36', NULL),
(42, 'Angelo', 'Primm', '448 70 750', 'info@londoncoffeefestival.com', 'Thanks for attending one of our past events!\r\n\r\nAs a member, we will give you exclusive deals and offers from our partners which are not available to the public.\r\n\r\nWe will be sending you a few special offers every single day for the next year.\r\n\r\nOur partner: https://www.sexydressoutlet.com\r\n\r\nKind regards\r\n\r\nAllegra Events Limited\r\n106 Arlington Road\r\nCamden Town, London\r\nNW1 7HP\r\nUnited Kingdom\r\nRegistered in England No. 6754003\r\nTel: +44(0)20 7691 8800', '2022-01-08 07:24:50', NULL),
(43, 'Freeman', 'Freeman', '02.65.65.39.33', 'mawson.freeman74@hotmail.com', '50% OFF + FREE SHIPPING!\r\n\r\nIntroducing the Most Comfortable Headphones in the World! Seemlessly listen to your favorite music.\r\n\r\nShop Here: iheadphone.online\r\n\r\nThe Best, \r\n \r\nFreeman', '2022-01-08 08:08:39', NULL),
(44, 'Pamala', 'Pamala', '03475 51 03 17', 'pamala@ResumeSathi.com', 'Biggest Ever Sale NOW! \r\n\r\n50% OFF On Us! With this Soft Durable Pet Padded Mattress\r\n1. 2x More Durable, Soft & Sustainable with high quality polyester materials\r\n2. Easier to Wash \r\n3. 30 Days Money Back Guarantee \r\n\r\nBuy now: petmattress.store\r\n\r\nRegards, \r\nPamala', '2022-01-10 23:43:25', NULL),
(45, 'Carroll', 'Mosier', '06-97054244', 'carroll.mosier@hotmail.com', 'Hi\r\n\r\nMy name is Carroll Mosier and I am writing to you from Creating Better Days\r\n\r\nI would be most appreciative if you and your team at ResumeSathi.com could nominate our company to be featured in in this article for 2022: \r\n\r\nhttps://shopgiejo.com/cbd/12-best-cbd-affiliate-programs-for-2021/\r\n\r\nRegards\r\n\r\nHUGS\r\n\r\nCarroll Mosier\r\nNetherlands, GR, Winschoten, 9672 Ap, Industrieweg 91,', '2022-01-11 16:29:43', NULL),
(46, 'Alina', 'Alina', '574-270-1389', 'vandevelde.alina@gmail.com', 'Good day \r\n \r\nPawSafer™ Can Safely Trim Your Dog\'S Nails In No Time From Home.\r\n\r\nGet it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: https://pawsafer.shop\r\n \r\nBest Wishes, \r\n \r\nAlina', '2022-01-12 18:54:42', NULL),
(47, 'Malissa', 'Crain', '69 609 57 84', 'crain.malissa@hotmail.com', 'You have a really great website. Let\'s connect: \r\nhttps://youtu.be/wveq63n0ZBk', '2022-01-14 08:03:47', NULL),
(48, 'Horny', 'Shriya', '9043558989', 'sackett.florentina@gmail.com', 'Horny Shriya sent you 2 messages yesterday. She is online now.\r\nClick the link below to view the message and reply to her.\r\n\r\nhttps://sexlovers.club/chat/HornyShriya/', '2022-01-14 14:57:12', NULL),
(49, 'Phillis', 'Phillis', '426 86 054', 'info@majorettes-de-chartres.fr', 'Hey there \r\n\r\nDon\'t you hate carrying a big bulky backpack when you are only going out for the day? This high quality shoulder bag solves that problem. \r\nCarry enough without bogging yourself down! Perfect for that fishing trip or day hike!\r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nBuy now: https://fashionbag.sale\r\n\r\nAll the best, \r\n\r\nPhillis', '2022-01-15 04:15:43', NULL),
(50, 'Horny', 'Shriya', '9043558989', 'christen.warner1@outlook.com', 'Horny Shriya sent you 2 messages yesterday. She is online now.\r\nClick the link below to view the message and reply to her.\r\n\r\nhttps://sexlovers.club/chat/HornyShriya/', '2022-01-16 01:43:51', NULL),
(51, 'Armand', 'Vazquez', '05.56.04.55.25', 'armand.vazquez@googlemail.com', 'A Mind-Blowing Website:\r\n\r\nhttps://youtu.be/r1OaDkqAvlE', '2022-01-18 12:57:33', NULL),
(52, 'Michaela', 'Michaela', '0328 3439934', 'info@antjemiksch.de', 'Good Morning \r\n\r\nThe New Powerful LED Flashlight is The Perfect Flashlight For Any Situation!\r\n\r\nThe 3,000 Lumens & Adjustable Zoom gives you the wide field of view and brightness other flashlights don’t have.\r\n\r\n50% OFF + Free Shipping!  Get it Now: linterna.store\r\n\r\nBest regards, \r\n\r\nMichaela', '2022-01-19 05:13:33', NULL),
(53, 'Horny', 'Shriya', '9043558989', 'monica.ogren@hotmail.com', 'Horny Shriya sent you 2 pics yesterday. She is online now.\r\nClick the link below to view the message and reply to her.\r\n\r\nhttps://sexlovers.club/chat/HornyShriya/', '2022-01-23 08:42:31', NULL),
(54, 'Serena', 'Kauffman', '580-955-5965', 'kauffman.serena@gmail.com', 'Would you personally recommend: Liquid Honey Tincture 1000MG by JUSTCBD and 1000mg Delta 8 Gummies Sour Burst by JUST DELTA.\r\n\r\nI am struggling to find the official site!\r\n\r\nThanks! xx', '2022-01-25 11:47:28', NULL),
(55, 'Trisha', 'Fantl', '(03) 8285 0751', 'fantl.trisha@outlook.com', 'BREAKING! Portable CO2 meters could be used to help fight coronavirus transmission, experts say\r\n\r\nClick here to learn more\r\n\r\nhttps://bit.ly/co2-monitor', '2022-01-26 05:31:32', NULL),
(56, 'Bryant', 'Laplante', '618-787-5686', 'bryant.laplante@gmail.com', 'Hi\r\n\r\nMy name is Bryant Laplante and I am writing to you from Sunday Scaries\r\n\r\nI would be most appreciative if you and your team at ResumeSathi.com could nominate our company to be featured in in this article for 2022: \r\n\r\nhttps://shopgiejo.com/cbd/best-cbd-vapes/\r\n\r\nRegards\r\n\r\nRoxy Pets\r\n\r\nBryant Laplante\r\nUnited States, IL, Dubois, 62831, 2119 Carter Street,', '2022-01-27 06:25:46', NULL),
(57, 'Manie', 'Calloway', '218-219-1493', '4mfarhani42@suppm.site', 'Congrats on your new site, get it listed here for free and we\'ll start sending people to your site https://1mdr.short.gy/submit-your-site', '2022-02-02 02:09:31', NULL),
(58, 'Sherryl', 'Milford', '(65) 7581-7438', 'milford.sherryl84@gmail.com', 'Have you tried CBD Honey Sticks 100 Pack by JUSTCBD?', '2022-02-02 06:38:01', NULL),
(59, 'Clarence', 'Goe', '077 1042 1660', 'bs.eh5@freeallapp.com', 'Submit your site to over 1000 advertising websites for free now https://1mdr.short.gy/submityoursite', '2022-02-05 04:18:07', NULL),
(60, 'Ernest', 'Frierson', '01.97.41.17.15', 'frierson.ernest77@outlook.com', 'I called you 2 times. WHy didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://sexlovers.club/', '2022-02-09 15:42:28', NULL),
(61, 'Kylie', 'Hart', '0297-9861956', 'kyliehartila@yahoo.com', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a \'dofollow\' backlink to ResumeSathi.com from our website that has a Moz Domain Authority of 50?\r\n\r\nWe charge just $50 (USD) to be paid via Paypal, card, or Payoneer. This is a one-time fee, so there are no extra charges and the link is permanent.\r\n\r\nIf you\'d like to know more about the site, please reply to this email and we can discuss further.\r\n\r\nKind Regards,\r\nKylie', '2022-02-10 13:07:56', NULL),
(62, 'Lucia', 'Benedict', '(07) 3135 7112', 'lucia.benedict@gmail.com', 'I called you 2 times. WHy didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://sexlovers.club/', '2022-02-11 11:30:43', NULL),
(63, 'Kandace', 'Hutchison', '078 1541 0473', 'httt-2012c@gmailwe.com', 'Add your site to 1000 business directories with one click here-> https://bit.ly/submit-your-site-now', '2022-02-12 02:14:59', NULL),
(64, 'Joellen', 'Lohr', '0486-6915006', 'lohr.joellen@gmail.com', 'Give your new site a boost, submit your site now to our free directory and start getting more clients https://bit.ly/submityourwebsite', '2022-02-13 07:42:27', NULL),
(65, 'Brenda', 'Sands', '713-236-3038', 'brenda.sands@gmail.com', 'The world\'s best fantasy sex game is here.\r\n\r\nYou will never find such an amazing sex game anywhere.\r\n\r\nClick here to start playing.\r\n\r\nhttps://sexlovers.club/game/play', '2022-02-13 11:42:48', NULL),
(66, 'Ilene', 'Grammer', '04282 52 98 64', 'ilene.grammer37@gmail.com', 'Where can I order: CBD Vape OG by JUSTCBD and Delta 8 THC Cartridges by JUST DELTA.\r\n\r\nNobody has them! :(\r\n\r\nThanks! xx', '2022-02-14 11:04:02', NULL),
(67, 'Fern', 'Faulk', '(02) 4017 5574', 'fern.faulk@gmail.com', 'I called you 2 times. WHy didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://sexlovers.club/', '2022-02-15 13:28:00', NULL),
(68, 'Hiram', 'Levay', '(03) 5319 0737', 'bormart@yahoo.com', 'Do you know where I can find this software : \r\n\r\nhttps://free-email-scraper69258.collectblogs.com/53021717/cbt-email-extractor-and-web-scraper-software\r\n\r\nThanks\r\n\r\nHiram Levay', '2022-02-16 07:39:42', NULL),
(69, 'Marylin', 'Mccool', '406-855-8876', 'mccool.marylin@gmail.com', 'I called you 2 times. WHy didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://sexlovers.club/', '2022-02-16 21:07:12', NULL),
(70, 'Concepcion', 'Newcomer', '0381 8228208', 'newcomer.concepcion@gmail.com', 'Hi\r\n\r\nMy name is Concepcion Newcomer and I am writing to you from Hempzilla\r\n\r\nI would be most appreciative if you and your team at ResumeSathi.com could nominate our company to be featured in in this article for 2022: \r\n\r\nhttps://shopgiejo.com/cbd/best-cbd-topical/\r\n\r\nRegards\r\n\r\nZIZI Snaps\r\n\r\nConcepcion Newcomer\r\nItaly, AV, Morra De Sanctis, 83040, Via Licola Patria 144,', '2022-02-19 06:50:32', NULL),
(71, 'Robbie', 'Robbie', '26-36-05-56', 'robbie.wieck@hotmail.com', 'New Multifunction Anti-theft Waterproof Sling Bag\r\n\r\nThe best ever SUPER Sling Bag: Drop-proof/Anti-theft/Scratch-resistant/USB Charging\r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nBuy now: fashiondaily.online\r\n\r\nCheers, \r\n\r\nRobbie\r\nResumeSathi Online Tutorials', '2022-02-21 15:59:31', NULL),
(72, 'Shawn', 'Heilman', '719-371-2407', 'heilman.shawn@googlemail.com', 'I called you 2 times. WHy didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://sexlovers.club/', '2022-02-23 15:17:22', NULL),
(73, 'Jefferey', 'Munro', '01.00.44.29.20', 'munro.jefferey@msn.com', 'Submit your site to over 35 advertising websites for free now https://bit.ly/submityourwebsite', '2022-02-23 16:29:05', NULL),
(74, 'Marcella', 'Looney', '530-897-1395', 'looney.marcella@gmail.com', 'Give your new site a boost, submit your site now to our free directory and start getting more clients https://bit.ly/submityourwebsite', '2022-02-28 07:40:06', NULL),
(75, 'Roma', 'Town', '0311 1845369', 'inna@reddogbluekat.com', 'Do you know the official site for this software : \n\nhttps://bestseotoolsu.blogs-service.com/37620718/cbt-email-extractor-and-web-scraper-software\n\nThanks in advance\n\nRoma Town', '2022-03-07 10:10:06', NULL),
(76, 'Rufus', 'Toussaint', '04.21.89.38.34', 'rufus.toussaint@yahoo.com', 'Not sure if you could help me to find a store that sells: CBD Vape Cookies by JUSTCBD and Delta 8 Disposables 6 Pack Pineapple Express by JUST DELTA.\r\n\r\nI am dying to try it out :)\r\n\r\nThanks x', '2022-03-10 09:10:27', NULL),
(77, 'Rueben', 'Fairchild', '0676 419 51 39', 'uahmed.money.100b@gmailup.com', 'Free submission of your new website to over 1000 business directories here https://1mdr.short.gy/submityoursite', '2022-03-11 06:22:54', NULL),
(78, 'Margarette', 'Margarette', '424 6504', 'info@ResumeSathi.com', 'Hello there \n \nBody Revolution - Medico Postura™ Body Posture Corrector\nImprove Your Posture INSTANTLY!\n\nGet it while it\'s still 60% OFF!  FREE Worldwide Shipping!\n\nGet yours here: https://medicopostura.com\n \nAll the best, \n \nMargarette\nResumeSathi Online Tutorials', '2022-03-14 19:15:28', NULL),
(79, 'Florida', 'Castleberry', '05824 29 02 57', 'wmahmoudfikry6@contactare.com', 'Submit your site to over 1000 directories all with one click here> https://1mdr.short.gy/submityoursite', '2022-03-16 05:15:22', NULL),
(80, 'Lida', 'Diesendorf', '(02) 6137 2881', '5mouafa@polostar.me', 'Good job on the new site! Now go ahead and submit it to our free directory here https://1mdr.short.gy/submityoursite', '2022-03-21 06:50:16', NULL),
(81, 'Abel', 'Guest', '0496 54 69 18', 'info@londoncoffeefestival.com', 'Thanks for attending one of our past events!\r\n\r\nAs a member, we will give you exclusive deals and offers from our partners which are not available to the public.\r\n\r\nWe will be sending you a few special offers every single day for the next year.\r\n\r\nOur partner: https://sexybee.co.uk\r\n\r\nKind regards\r\n\r\nAllegra Events Limited\r\n106 Arlington Road\r\nCamden Town, London\r\nNW1 7HP\r\nUnited Kingdom\r\nRegistered in England No. 6754003\r\nTel: +44(0)20 7691 8800', '2022-03-22 11:45:41', NULL),
(82, 'Shanice', 'Mesa', '(19) 8657-9938', 'info@prolabs.mu', 'I want to buy this software but cannot find the official site. Can you help?: \r\n\r\nhttps://web-scraping24566.bloginwi.com/41922274/cbt-mass-email-sender-desktop-software\r\n\r\nThanks\r\n\r\nShanice Mesa', '2022-03-27 01:22:21', NULL),
(83, 'Kina', 'Tiemann', '0318 5716690', '4mfarhani42@suppm.site', 'I was wondering if you wanted to submit your new site to our free business directory? https://1mdr.short.gy/submityoursite', '2022-03-28 19:11:11', NULL),
(84, 'Kellee', 'Sandridge', '08331 90 97 81', 'sandridge.kellee@gmail.com', 'I called you 2 times. Why didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://telegra.ph/Chat-With-Me-04-02', '2022-04-02 11:40:33', NULL),
(85, 'Tonja', 'Hawes', '077 3653 9730', 'hawes.tonja@outlook.com', 'I called you 2 times. Why didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://sexlovers.club/', '2022-04-08 14:17:37', NULL),
(86, 'Caleb', 'Willcock', '982 09 940', 'mahemoud@cakk.us', 'Give your new site a boost, submit your site now to our free directory and start getting more clients https://1mdr.short.gy/submityoursite', '2022-04-08 15:44:30', NULL),
(87, 'Emerson', 'Emerson', '02663 83 19 72', 'emerson.emmer@msn.com', 'New Multifunction Waterproof Backpack\r\n\r\nThe best ever SUPER Backpack: Drop-proof/Scratch-resistant/USB Charging/Large capacity storage\r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time\r\n\r\nBuy now: https://thebackpack.sale\r\n\r\nHave a great time, \r\n\r\nEmerson', '2022-04-10 02:32:49', NULL),
(88, 'Shoshana', 'Urbina', '(08) 8304 1298', 'shoshana.urbina@msn.com', 'I called you 2 times. Why didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://live-sex-chat.club/', '2022-04-13 05:29:44', NULL),
(89, 'Tara', 'Tara', '417-891-2168', 'tararaymond@gmail.com', 'Hello there \r\n \r\nPawSafer™ Can Safely Trim Your Dog\'S Nails In No Time From Home.\r\n\r\nGet it while it\'s still 50% OFF + FREE Shipping\r\n\r\nBuy here: https://pawsafer.shop\r\n \r\nHave a great time, \r\n \r\nTara', '2022-04-15 08:02:46', NULL),
(90, 'Carla', 'Carrell', '514-245-2076', 'ddana-car@polccat.com', 'Submit your site to over 1000 advertising websites for free now https://1mdr.short.gy/submityoursite', '2022-04-16 04:14:57', NULL),
(91, 'Hulda', 'Messerly', '0345 2319329', 'hulda.messerly79@gmail.com', 'I called you 2 times. Why didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://live-sex-chat.club/', '2022-04-18 22:18:22', NULL),
(92, 'Izetta', 'Grinder', '(03) 6207 7195', 'izetta.grinder@hotmail.com', 'I called you 2 times. Why didn\'t you pick up? I\'m horny.. Please call me.\r\n\r\nI\'m online. You can chat with me by clicking this link.\r\n\r\nhttps://live-sex-chat.club/', '2022-04-24 02:13:24', NULL),
(93, 'Luther', 'Tibbs', '01.08.87.79.12', 'tibbs.luther71@gmail.com', 'https://youtu.be/IhKwFdKE1-o\r\nhttps://youtu.be/yawGzfa2ubM\r\nhttps://youtu.be/gzXnr3dh2mI\r\nhttps://youtu.be/T5pOmzavoOQ\r\nhttps://youtu.be/8ypZ-rP3e7c\r\nhttps://youtu.be/JiFzQAJ_uH8\r\nhttps://youtu.be/SoN6eDqEyJw\r\nhttps://youtu.be/yxHPtMZiJcc\r\nhttps://youtu.be/F-XaRKhdA90\r\nhttps://youtu.be/oe_iBOU-rU8\r\nhttps://youtu.be/wcIxZNMyjlw', '2022-04-25 06:01:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(50) NOT NULL,
  `course_type` int(11) NOT NULL,
  `topic_name` varchar(255) DEFAULT NULL,
  `url_name` varchar(255) DEFAULT NULL,
  `meta_keyword` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `canonical_tag` varchar(255) DEFAULT NULL,
  `pageview` int(255) NOT NULL DEFAULT 0,
  `hero_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_draft` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_type`, `topic_name`, `url_name`, `meta_keyword`, `meta_title`, `meta_description`, `canonical_tag`, `pageview`, `hero_image`, `is_active`, `is_draft`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 1, '2022-05-22 13:46:31', '2022-05-22 13:46:31', NULL),
(3, 4, 'Introduction to Hypertext Markup Language | HTML', 'html-tutorial/introduction-to-html', 'Introduction to Hypertext Markup Language | HTML', 'Introduction to Hypertext Markup Language | HTML', 'Introduction to Hypertext Markup Language | HTML', 'courses//html-tutorial/introduction-to-html', 0, 'courses_image/pexels-albert-nunez-88630.jpg', 1, 1, 1, '2022-05-22 13:46:51', '2022-05-29 15:48:55', NULL),
(4, 1, 'HTML basic tags', 'html-basic-tags', 'HTML basic tags', 'HTML basic tags tags', 'HTML basic tags tags', 'courses//html-basic-tags', 0, 'courses_image/pexels-mike-100653.jpg', 1, 0, 1, '2022-05-22 14:07:49', '2022-05-29 15:48:37', NULL),
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, 1, 1, '2022-05-29 06:01:33', '2022-05-29 06:01:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_attachments`
--

CREATE TABLE `course_attachments` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_type` int(11) NOT NULL DEFAULT 1 COMMENT '1->image, 2->gif, 3->video\r\n',
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` int(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_url` varchar(100) NOT NULL,
  `course_image` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `course_name`, `course_url`, `course_image`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by`) VALUES
(1, 'HTML 5', 'html-tutorial', 'html.jpg', 'Html is a hyper text markup language.Which is use to create structure of web page.', '2021-09-26 08:26:24', '2022-02-20 04:49:31', NULL, 1),
(2, 'CSS', 'css-tutorial', 'css.jpg', 'Cascading Style Sheets (CSS) is a markup language which is use to styling web pages.', '2021-09-26 08:48:05', '2021-11-19 04:12:46', NULL, 1),
(3, 'JavaScript', 'js-tutorial', 'js.jpg', 'JavaScript is the most popular programming language for the web in the world.', '2021-10-03 09:24:24', '2021-10-03 09:45:18', NULL, 2),
(4, 'MySql', 'mysql-tutorial', 'sql.jpg', 'SQL is a standard language for Relational Database System (RDS).', '2021-10-03 09:26:32', '2021-10-03 09:45:23', NULL, 2),
(5, 'PHP', 'php-tutorial', 'php.jpg', 'PHP is a server scripting language,PHP is a powerful tool for making dynamic web pages.', '2021-10-03 09:27:14', '2021-10-03 09:45:28', NULL, 2),
(6, 'Laravel', 'laravel-tutorial', 'laravel.jpg', 'Laravel is an open-source framework of PHP.Laravel is easy to understand.', '2021-10-03 09:28:08', '2021-10-03 09:45:33', NULL, 2),
(8, 'Bootstrap', 'bootstrap', 'PicsArt_11-24-10.55.28-min.jpg', 'Bootstrap is popular framework of HTML, CSS and JavaScript for developing responsive websites.', '2021-11-24 05:18:00', '2021-11-24 10:38:29', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_contents`
--

CREATE TABLE `course_contents` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_views`
--

CREATE TABLE `course_views` (
  `id` int(255) NOT NULL,
  `course_id` int(10) NOT NULL,
  `topic_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes_views`
--

CREATE TABLE `notes_views` (
  `id` int(255) NOT NULL,
  `pageview` int(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes_views`
--

INSERT INTO `notes_views` (`id`, `pageview`, `created_at`, `updated_at`) VALUES
(1, 1027, '2021-10-14 19:56:42', '2022-04-25 23:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `programing_languages`
--

CREATE TABLE `programing_languages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programing_languages`
--

INSERT INTO `programing_languages` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'PHP', NULL, '2022-05-08 16:38:03', '2022-05-08 16:50:38'),
(2, 'JavaScript', NULL, '2022-05-08 16:38:03', '2022-05-08 16:38:03'),
(3, 'HTML', NULL, '2022-05-08 16:38:03', '2022-05-08 16:50:46'),
(4, 'Laravel', NULL, '2022-05-08 16:38:03', '2022-05-08 16:38:03'),
(5, 'MySQL', NULL, '2022-05-08 16:38:03', '2022-05-08 16:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `sitemap` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitemap`, `created_at`, `updated_at`) VALUES
(1, 'xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\r\n      xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\r\n      xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\r\n            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\r\n<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->\r\n\r\n\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>1.00</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/all_tech_articles</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/services</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/about</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/contact</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/html_tutorial/introduction-to-html</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/css_tutorial/introduction-to-css</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/javascript_tutorial/introduction-to-javascript</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/introduction-to-sql</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/php_tutorial/introduction-to-php</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/laravel_tutorial/introduction-to-laravel</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/web_development/google-logo-using-html-and-css</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/web_development/what-is-htaccess-file-and-how-to-use-it</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/web_development/most-important-html-interview-questions</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/web_development/what-is-git-and-github</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/web_development/road-map-for-web-development</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/all_web_development_articles</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/how-to-convert-a-website-into-a-android-app</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/full-and-free-seo-crash-course</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/what-is-blog</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/is-your-adsense-approval-rejecting-repeatedly</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/biggest-blogging-mistake-blogger-make</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/10-step-to-start-blogging-in-2021</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/tips-to-promote-your-blog</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/network-marketing</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/blog/all-about-robotstxt</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/all_blogging_tips_and_trick</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/what-is-server-and-types-of-server</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/computer-network-full-course</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/5g-technology</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/what-is-blockchain-technology</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/build-pc-with-respberry-pi-under-7000</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/5g-in-india</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/how-to-speedup-computer-or-laptop</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/pubg-ban-in-india-pubg-mobile-india-official</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/how-to-find-stolen-laptop-or-computer</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/what-is-linux</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/disclaimer</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/refund_policy</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/term_and_condition</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/privacy</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.80</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/tech_articles/lattepanda</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/html_tutorial/html-basic-tags</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/css_tutorial/css-selectors</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/css_tutorial/css-color-property</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/javascript_tutorial/javascript-placement</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-database</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-table</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-warnings</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-keys</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-where-clause</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-between-operator</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-logical-operators</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-like-operator</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-refining-data</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-aggregate-function</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-crud-operations</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-functions</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-date-time-data-type</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/sql_tutorial/sql-joins</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/php_tutorial/php-comments</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/php_tutorial/php-echo-and-print-statements</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/php_tutorial/php-variables</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/laravel_tutorial/laravel-installation</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/laravel_tutorial/laravel-folder-structure</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/web_development/php-crud-operations</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/html/pdf-html-notes-w3schools</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/css/pdf-css-notes-w3schools</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>\r\n<url>\r\n  <loc>https://www.ResumeSathi.com/mysql/pdf-sql-notes-w3schools</loc>\r\n  <lastmod>2021-07-16T08:26:38+00:00</lastmod>\r\n  <priority>0.64</priority>\r\n</url>', '2021-10-03 16:48:13', '2021-10-03 17:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(255) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mazeedullahn@gmail.com', '2021-10-15 02:17:07', '2021-10-15 20:58:24', NULL),
(2, 'etayb82@gmail.com', '2021-10-15 04:11:15', '2021-10-15 20:58:30', NULL),
(3, 'Rishukumarnrd123@gmail.com', '2021-10-15 06:48:05', '2021-10-15 20:58:33', NULL),
(4, 'seyabroghani8@gmail.com', '2021-10-15 08:18:38', '2021-10-15 20:58:36', NULL),
(5, 'kghtet1112@gmail.com', '2021-10-15 14:30:32', '2021-10-15 20:58:39', NULL),
(6, 'Amboakiva12@gmail.com', '2021-10-16 00:37:49', '2021-10-15 20:58:43', NULL),
(9, 'mahipathiakhila@gmail.com', '2021-10-16 10:21:10', '2021-10-16 10:21:10', NULL),
(10, 'muhammadbilal16160@gmail.com', '2021-10-16 15:31:53', '2021-10-16 15:31:53', NULL),
(11, 'aashy925@gmail.com', '2021-10-16 20:21:21', '2021-10-16 20:21:21', NULL),
(12, 'usulor33@gmail.com', '2021-10-17 04:45:34', '2021-10-17 04:45:34', NULL),
(13, 'deynitu1998@gmail.com', '2021-10-17 12:06:59', '2021-10-17 12:06:59', NULL),
(14, 'abdiabdullahi893@yahoo.com', '2021-10-17 18:57:38', '2021-10-17 18:57:38', NULL),
(15, 'anjumshaista024@gmail.com', '2021-10-17 19:17:30', '2021-10-17 19:17:30', NULL),
(16, 'wuldemijak1997@gmail.com', '2021-10-17 20:52:39', '2021-10-17 20:52:39', NULL),
(17, 'ephhab3@gmail.com', '2021-10-18 08:14:22', '2021-10-18 08:14:22', NULL),
(18, 'bizorene@gmail.com', '2021-10-19 11:06:52', '2021-10-19 11:06:52', NULL),
(19, 'bounthone21@hotmail.com', '2021-10-20 10:17:05', '2021-10-20 10:17:05', NULL),
(20, 'areenaajmal17@gmail.com', '2021-10-21 04:33:29', '2021-10-21 04:33:29', NULL),
(21, 'akgonlinejob@gmail.com', '2021-10-21 14:24:51', '2021-10-21 14:24:51', NULL),
(22, 'benfoued689@gmail.com', '2021-10-22 06:34:50', '2021-10-22 06:34:50', NULL),
(23, 'tienvantran5@gmail.com', '2021-10-22 12:44:30', '2021-10-22 12:44:30', NULL),
(24, 'sahbiramzi72@gmail.com', '2021-10-22 15:31:56', '2021-10-22 15:31:56', NULL),
(25, 'm.xsin04@gmail.com', '2021-10-31 12:10:11', '2021-10-31 12:10:11', NULL),
(26, 'amanzai333@gmail.com', '2021-10-31 13:38:45', '2021-10-31 13:38:45', NULL),
(27, 'jannatkhakhi567@gmail.com', '2021-11-01 09:38:02', '2021-11-01 09:38:02', NULL),
(28, 'asad03181961559@gmail.com', '2021-11-02 04:10:51', '2021-11-02 04:10:51', NULL),
(29, 'claudensengi73@gmail.com', '2021-11-03 13:25:25', '2021-11-03 13:25:25', NULL),
(30, 'manishgautammg7@gmail.com', '2021-11-15 21:25:11', '2021-11-15 21:25:11', NULL),
(32, 'auwalharuna216@gmail.com', '2021-12-07 14:08:44', '2021-12-07 14:08:44', NULL),
(33, 'abdulbari.h1395@gmail.com', '2021-12-07 17:07:33', '2021-12-07 17:07:33', NULL),
(34, 'bikashoffici@gmail.com', '2021-12-07 19:04:08', '2021-12-07 19:04:08', NULL),
(38, 'hariomprajapati9029@gmail.com', '2022-02-21 08:44:23', '2022-02-21 08:44:23', NULL),
(43, '10sumitsarkar@gmail.com', '2022-03-18 02:42:49', '2022-03-18 02:42:49', NULL),
(44, 'seseaishmeai449@gmail.com', '2022-03-18 12:27:31', '2022-03-18 12:27:31', NULL),
(45, 'sesayishmeali449@gmail.com', '2022-03-18 12:28:01', '2022-03-18 12:28:01', NULL),
(46, 'rakolivier04@gmail.com', '2022-03-18 14:00:31', '2022-03-18 14:00:31', NULL),
(47, 'a.wadia83@gmail.com', '2022-03-19 03:17:01', '2022-03-19 03:17:01', NULL),
(48, 'vinothkumarsuseela@gmail.com', '2022-03-19 10:45:35', '2022-03-19 10:45:35', NULL),
(49, 'Toluayo977@gmail.com', '2022-03-19 14:56:58', '2022-03-19 14:56:58', NULL),
(50, 'deynitu1999@gmail.com', '2022-03-31 08:58:10', '2022-03-31 08:58:10', NULL),
(51, 'dheerajprajapati2199@gmail.com', '2022-04-01 00:04:36', '2022-04-01 00:04:36', NULL),
(52, 'm.shikha1506@gmail.com', '2022-04-01 03:21:08', '2022-04-01 03:21:08', NULL),
(53, 'taphambodj250@gmail.com', '2022-04-07 10:22:26', '2022-04-07 10:22:26', NULL),
(54, 'kikomekojohnbaptist.jr@gmail.com', '2022-04-17 12:48:33', '2022-04-17 12:48:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `age` varchar(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `profile_image` varchar(50) DEFAULT NULL,
  `background_image` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile`, `birth_date`, `age`, `gender`, `profile_image`, `background_image`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Hariom', 'Prajapati', 'hariomprajapati9029@gmail.com', '8840860841', '08/01/1999', '23', 'male', 'Hariom.jpg', NULL, '$2y$10$bYZQa9b3Wba4PsEprFPSY.Rc8.T8EFjIbRcFcJiXvCmmuFHY7kJ5e', 1, '2021-09-12 13:19:51', '2022-05-15 00:58:33'),
(2, 'Sumit Dey', 'Sarkar', '10sumitsarkar@gmail.com', '9123161793', '01/03/1999', '23', 'male', 'sumit.jpeg', NULL, '$2y$10$bYZQa9b3Wba4PsEprFPSY.Rc8.T8EFjIbRcFcJiXvCmmuFHY7kJ5e', 1, '2021-09-12 13:19:51', '2022-05-15 00:54:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_attachments`
--
ALTER TABLE `article_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_contents`
--
ALTER TABLE `article_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_views`
--
ALTER TABLE `article_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_attachments`
--
ALTER TABLE `course_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_contents`
--
ALTER TABLE `course_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_views`
--
ALTER TABLE `course_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes_views`
--
ALTER TABLE `notes_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programing_languages`
--
ALTER TABLE `programing_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_attachments`
--
ALTER TABLE `article_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `article_contents`
--
ALTER TABLE `article_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_views`
--
ALTER TABLE `article_views`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_attachments`
--
ALTER TABLE `course_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_contents`
--
ALTER TABLE `course_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_views`
--
ALTER TABLE `course_views`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes_views`
--
ALTER TABLE `notes_views`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programing_languages`
--
ALTER TABLE `programing_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
