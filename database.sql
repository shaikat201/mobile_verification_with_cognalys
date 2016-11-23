-- phpMyAdmin SQL Dump
-- For Support : support@himanshusofttech.com
-- --------------------------------------------------------

--
-- Table structure for table `mobileverifier_data`
--
CREATE TABLE IF NOT EXISTS `mobileverifier_data` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `mobile_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify` tinyint(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

