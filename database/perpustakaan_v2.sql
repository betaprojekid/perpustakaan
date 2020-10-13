-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2020 at 12:19 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `prodi_id`, `nim`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jk`, `created_at`) VALUES
(1, 1, '9613013535', 'Reina Cruickshank', ' binjai', '2005-06-07', 'perempuan', '2020-10-11 10:08:03'),
(2, 2, '5159653922', 'Lazaro Ferry', 'deli serdang', '1971-08-31', 'perempuan', '2020-09-18 23:57:10'),
(3, 3, '7434966660', 'Gregorio Reynolds', ' binjai', '1987-11-26', 'perempuan', '2020-09-18 15:50:04'),
(4, 4, '0902394133', 'Shad Kuvalis', 'medan', '1991-07-24', 'perempuan', '2020-09-17 07:00:16'),
(5, 5, '3799266716', 'Dr. Gerardo Murphy', ' binjai', '2007-03-23', 'perempuan', '2020-09-24 20:04:49'),
(6, 1, '1736877531', 'Cortney Hegmann Sr.', 'medan', '1995-08-03', 'laki-laki', '2020-10-04 17:47:36'),
(7, 2, '6642149284', 'Arthur Sanford', 'deli serdang', '2017-06-17', 'perempuan', '2020-09-20 02:28:38'),
(8, 3, '5076093934', 'Dr. Karina Boehm', 'deli serdang', '1970-07-24', 'perempuan', '2020-09-30 07:49:58'),
(9, 4, '5525569003', 'Raheem Wisozk', 'deli serdang', '2002-05-09', 'laki-laki', '2020-10-05 14:05:06'),
(10, 5, '7928204729', 'Helene Pacocha', ' binjai', '1974-06-08', 'laki-laki', '2020-10-03 00:26:21'),
(11, 1, '4518741772', 'Mr. Elijah Ullrich', 'medan', '1970-09-09', 'perempuan', '2020-09-26 01:05:59'),
(12, 2, '6780009565', 'Enid Green', 'medan', '2000-04-03', 'perempuan', '2020-09-16 17:51:03'),
(13, 3, '4746239732', 'Prof. Shayna Littel III', 'medan', '2004-08-29', 'perempuan', '2020-09-25 04:17:09'),
(14, 4, '2279294414', 'Melvina Berge', 'deli serdang', '2018-12-07', 'perempuan', '2020-09-17 18:54:21'),
(15, 5, '3317264950', 'Prof. Gus Monahan DDS', ' binjai', '2003-11-20', 'laki-laki', '2020-09-18 21:49:45'),
(16, 1, '1094859368', 'Ansley Little', ' binjai', '2017-03-04', 'perempuan', '2020-09-22 22:24:11'),
(17, 2, '9577002869', 'Amy Roob', 'deli serdang', '1980-02-08', 'perempuan', '2020-10-13 09:23:26'),
(18, 3, '8204330665', 'Dante Brown', 'medan', '2018-11-04', 'laki-laki', '2020-09-25 13:43:30'),
(19, 4, '2207125033', 'Aurore Bartell Jr.', 'deli serdang', '1978-12-02', 'laki-laki', '2020-09-24 11:50:10'),
(20, 5, '8676445681', 'Dr. Mackenzie Douglas PhD', ' binjai', '1992-02-24', 'laki-laki', '2020-10-13 06:35:16'),
(21, 1, '9464206965', 'Mr. Wilford Goodwin', 'deli serdang', '2015-06-01', 'laki-laki', '2020-09-26 04:33:16'),
(22, 2, '8075636546', 'Maryse Haley', ' binjai', '1995-11-30', 'perempuan', '2020-10-06 05:14:13'),
(23, 3, '4938874888', 'Jimmie Johnston', 'deli serdang', '2016-12-03', 'perempuan', '2020-09-22 22:53:31'),
(24, 4, '9177417575', 'Francesco Ebert', 'deli serdang', '1971-02-27', 'perempuan', '2020-09-25 13:17:48'),
(25, 5, '5656867200', 'Kacey Barton', 'medan', '2007-02-14', 'perempuan', '2020-09-20 10:39:39'),
(26, 1, '9898337073', 'Anabel Rogahn I', 'medan', '1970-10-14', 'laki-laki', '2020-10-09 06:16:54'),
(27, 2, '7448524521', 'Hank Olson', 'medan', '2016-12-06', 'perempuan', '2020-10-07 02:15:03'),
(28, 3, '4977685923', 'Mrs. Ollie Schaden', 'deli serdang', '2002-05-28', 'laki-laki', '2020-10-06 22:39:19'),
(29, 4, '4074872997', 'Neoma Reilly', 'deli serdang', '1990-01-25', 'perempuan', '2020-09-13 14:29:46'),
(30, 5, '6395305827', 'Zelda Jacobi', ' binjai', '2008-10-20', 'laki-laki', '2020-10-07 09:53:59'),
(31, 1, '0437527670', 'Dustin Russel', 'medan', '1986-03-26', 'perempuan', '2020-09-28 05:57:49'),
(32, 2, '7393822318', 'Marisol Carter II', 'deli serdang', '2004-08-15', 'laki-laki', '2020-09-19 22:52:53'),
(33, 3, '3192670173', 'Miss Gretchen Cassin', 'medan', '1994-12-07', 'laki-laki', '2020-10-02 06:53:52'),
(34, 4, '1125701810', 'Jerry Buckridge', 'deli serdang', '2017-09-21', 'laki-laki', '2020-10-09 15:53:02'),
(35, 5, '3971731451', 'Dr. Muriel Fay', ' binjai', '2011-02-06', 'laki-laki', '2020-10-04 23:02:25'),
(36, 1, '2194118932', 'Prof. Charles Dare PhD', 'medan', '1990-01-20', 'perempuan', '2020-09-18 16:23:52'),
(37, 2, '1266276724', 'Trinity Hegmann', 'medan', '2019-08-31', 'perempuan', '2020-09-23 02:44:17'),
(38, 3, '8176577019', 'Dr. Miller Wiza', ' binjai', '1988-05-26', 'perempuan', '2020-09-28 16:12:14'),
(39, 4, '5512417547', 'Drew Sanford', 'deli serdang', '1995-08-27', 'perempuan', '2020-10-06 23:35:38'),
(40, 5, '4002020235', 'Leonor Marquardt', ' binjai', '1973-02-15', 'laki-laki', '2020-09-20 19:06:27'),
(41, 1, '6588912505', 'Miss Shanna Considine', 'medan', '1998-11-04', 'perempuan', '2020-09-22 12:32:20'),
(42, 2, '3910982421', 'Kaylin Harber II', 'deli serdang', '1983-07-31', 'laki-laki', '2020-10-12 22:29:16'),
(43, 3, '7230635016', 'Mr. Benedict Lind I', 'medan', '1975-07-30', 'perempuan', '2020-09-20 20:10:20'),
(44, 4, '8102312504', 'Ivah Bergnaum', 'deli serdang', '2020-07-21', 'perempuan', '2020-09-25 14:09:59'),
(45, 5, '1438245466', 'Jena Flatley', ' binjai', '2001-03-24', 'laki-laki', '2020-09-16 00:58:22'),
(46, 1, '4753047010', 'Armani Lemke V', ' binjai', '2006-12-09', 'perempuan', '2020-09-30 22:25:33'),
(47, 2, '5155342345', 'Miss Anabel Doyle DVM', 'deli serdang', '1999-07-21', 'perempuan', '2020-09-20 15:49:28'),
(48, 3, '9464836007', 'Dr. Julien Koch III', 'medan', '1983-06-01', 'perempuan', '2020-09-22 16:34:43'),
(49, 4, '3084882295', 'Ms. Shemar Lubowitz', ' binjai', '1978-04-07', 'laki-laki', '2020-10-09 16:46:10'),
(50, 5, '9392173522', 'Pearlie Donnelly V', 'medan', '2013-02-12', 'perempuan', '2020-09-18 15:08:42'),
(51, 1, '0935442197', 'Miss Bonnie Greenfelder DVM', 'medan', '2012-02-07', 'perempuan', '2020-09-24 02:42:31'),
(52, 2, '5128747406', 'Prof. Keshawn Mosciski II', 'deli serdang', '1983-11-23', 'laki-laki', '2020-09-22 04:26:11'),
(53, 3, '6773870602', 'Mr. Elmo Leuschke V', 'medan', '1989-04-18', 'laki-laki', '2020-10-02 00:50:49'),
(54, 4, '1704036710', 'Prof. Lew Kub Sr.', 'medan', '1991-09-29', 'laki-laki', '2020-09-23 23:21:08'),
(55, 5, '7307668165', 'Ms. Betsy Lubowitz', ' binjai', '1997-07-11', 'laki-laki', '2020-10-01 04:40:07'),
(56, 1, '7477257634', 'Prof. Jannie Mueller MD', 'deli serdang', '1975-12-28', 'perempuan', '2020-09-18 21:52:11'),
(57, 2, '6888959817', 'Evie Bailey', 'deli serdang', '1993-08-31', 'perempuan', '2020-10-09 09:05:46'),
(58, 3, '0533573883', 'Mr. Randy Rippin', 'deli serdang', '1986-10-14', 'perempuan', '2020-10-05 15:21:33'),
(59, 4, '2729395634', 'Rolando Price', 'medan', '2015-01-10', 'perempuan', '2020-10-01 06:28:56'),
(60, 5, '6001881756', 'Ms. Ruby Carroll', 'medan', '1983-08-30', 'laki-laki', '2020-09-16 16:41:21'),
(61, 1, '4254266146', 'Helga Jacobs', ' binjai', '1994-05-06', 'perempuan', '2020-09-28 01:32:24'),
(62, 2, '5842740971', 'Ms. Concepcion Schroeder', ' binjai', '2003-11-26', 'perempuan', '2020-10-01 01:39:48'),
(63, 3, '4112789719', 'Damon Wilkinson V', 'deli serdang', '1987-02-26', 'laki-laki', '2020-10-01 03:53:22'),
(64, 4, '5066606088', 'Dr. Hiram Greenholt Jr.', ' binjai', '1987-10-06', 'laki-laki', '2020-09-18 06:02:14'),
(65, 5, '6686959911', 'Lonzo Wiza', 'medan', '2010-05-01', 'perempuan', '2020-09-14 13:59:14'),
(66, 1, '7729946061', 'Mr. Anastacio Feeney', 'deli serdang', '1993-04-16', 'perempuan', '2020-09-30 20:13:02'),
(67, 2, '0807545927', 'Ilene Gutkowski III', ' binjai', '1983-08-12', 'perempuan', '2020-09-20 19:02:54'),
(68, 3, '4666486483', 'Eve Schuppe', 'deli serdang', '1985-04-26', 'perempuan', '2020-09-27 19:13:30'),
(69, 4, '2364759441', 'Dr. Ned Monahan', 'medan', '1984-08-29', 'perempuan', '2020-10-02 02:32:07'),
(70, 5, '6624723297', 'Otto Ward', 'medan', '2001-04-17', 'laki-laki', '2020-09-15 11:13:37'),
(71, 1, '2275450966', 'Noble Runolfsdottir', ' binjai', '1975-06-27', 'laki-laki', '2020-10-03 19:26:55'),
(72, 2, '1640333691', 'Chyna Jast', ' binjai', '1981-04-10', 'perempuan', '2020-10-10 04:36:49'),
(73, 3, '4900247133', 'Bart Volkman', 'medan', '2016-08-10', 'laki-laki', '2020-09-13 20:09:15'),
(74, 4, '8744926755', 'Freddie Oberbrunner', 'deli serdang', '2007-06-09', 'laki-laki', '2020-09-16 18:23:42'),
(75, 5, '3735867963', 'Eduardo Little II', ' binjai', '2018-02-28', 'laki-laki', '2020-09-25 00:49:16'),
(76, 1, '9482048164', 'Danyka Langworth', ' binjai', '2007-12-17', 'perempuan', '2020-09-14 05:20:22'),
(77, 2, '9142348687', 'Patsy Ernser', ' binjai', '1980-11-12', 'laki-laki', '2020-09-29 15:35:22'),
(78, 3, '8374754512', 'Layla Stracke', 'medan', '1978-05-24', 'laki-laki', '2020-10-13 07:12:34'),
(79, 4, '8467309856', 'Alexandrine O\'Hara', ' binjai', '1998-02-07', 'laki-laki', '2020-09-22 20:39:45'),
(80, 5, '9530268329', 'Brian Davis', 'deli serdang', '1994-06-05', 'perempuan', '2020-09-23 12:56:29'),
(81, 1, '9493258039', 'Liliane Donnelly', 'deli serdang', '2003-11-22', 'perempuan', '2020-09-17 13:35:58'),
(82, 2, '8037849547', 'Estevan Kirlin', 'medan', '2013-03-25', 'laki-laki', '2020-10-02 01:14:10'),
(83, 3, '0372514090', 'Prof. Cornell Pollich', 'medan', '1981-07-26', 'laki-laki', '2020-09-18 20:57:21'),
(84, 4, '2083830232', 'Prof. Kaden Murazik PhD', ' binjai', '1991-11-30', 'perempuan', '2020-09-18 09:26:58'),
(85, 5, '6437714331', 'Alysha Goodwin III', 'deli serdang', '1988-06-16', 'laki-laki', '2020-10-03 11:46:13'),
(86, 1, '1400091952', 'Miss Kaycee Howe', ' binjai', '1999-07-18', 'laki-laki', '2020-10-04 05:54:43'),
(87, 2, '2578313387', 'Samantha Beier', ' binjai', '2014-10-07', 'perempuan', '2020-09-29 08:21:55'),
(88, 3, '8819081220', 'Tyler Trantow', ' binjai', '1997-02-16', 'perempuan', '2020-09-30 00:14:56'),
(89, 4, '6810047825', 'Ramiro Jacobi', 'medan', '1970-10-15', 'laki-laki', '2020-10-10 06:01:45'),
(90, 5, '0568496536', 'Elton Roob', 'medan', '2009-01-13', 'perempuan', '2020-10-09 10:04:57'),
(91, 1, '8253073955', 'Jayne Stehr', 'deli serdang', '1991-09-02', 'perempuan', '2020-10-11 21:45:23'),
(92, 2, '4510308438', 'Lorine Nienow PhD', ' binjai', '1990-11-27', 'laki-laki', '2020-10-09 19:34:19'),
(93, 3, '5598265759', 'Mrs. Joy Roob V', 'medan', '1978-04-01', 'perempuan', '2020-10-05 01:31:51'),
(94, 4, '2754955712', 'Faustino Fisher', 'medan', '1992-10-24', 'perempuan', '2020-09-17 21:47:12'),
(95, 5, '1998522390', 'Ms. Tina Fisher V', ' binjai', '2019-05-20', 'perempuan', '2020-09-14 15:34:17'),
(96, 1, '5499323188', 'Sally Emmerich', ' binjai', '2002-06-29', 'perempuan', '2020-09-18 20:52:38'),
(97, 2, '6372301614', 'Trever Rutherford', ' binjai', '2002-10-31', 'perempuan', '2020-10-12 23:56:07'),
(98, 3, '4005959384', 'Sidney Casper', 'deli serdang', '1974-12-18', 'laki-laki', '2020-09-29 20:33:22'),
(99, 4, '0569994049', 'Nina Quigley', 'medan', '2008-09-17', 'laki-laki', '2020-09-24 07:21:01'),
(100, 5, '6010383266', 'Mrs. Ocie Johnson I', ' binjai', '2016-01-24', 'laki-laki', '2020-09-30 01:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `lokasi_buku_id` int(11) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kategori_id`, `lokasi_buku_id`, `kode_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '23702', 'Ullam nihil vero aspernatur ad voluptas reiciendis rerum.', 'Emmy Macejkovic', 'PLC', 1988, '1160-78-76', 4, '2020-02-12 15:44:48', '2020-09-03 07:45:29'),
(2, 2, 2, '52637', 'Aliquid dolor maxime nihil vitae eligendi.', 'Prof. Sabryna Grady MD', 'LLC', 1981, '5363-91-77', 3, '2020-03-26 20:39:56', '2020-05-23 17:13:14'),
(3, 3, 3, '48543', 'Vel iusto qui nulla ut excepturi omnis.', 'Robb Davis', 'LLC', 2006, '2077-62-24', 1, '2020-03-14 03:00:28', '2020-08-19 11:32:21'),
(4, 4, 4, '40261', 'Eos adipisci omnis esse sit.', 'June Wehner', 'and Sons', 1995, '3961-83-66', 3, '2019-11-10 13:08:23', '2019-12-14 18:17:56'),
(5, 5, 5, '05088', 'Laborum quia similique ullam cum odit.', 'Dr. Bella Nikolaus II', 'LLC', 1990, '9029-38-19', 5, '2020-09-13 04:46:57', '2019-10-15 23:06:28'),
(6, 6, 1, '87786', 'Ad est cupiditate quidem libero facilis ut autem.', 'Alvah Corkery DDS', 'PLC', 2009, '0582-65-33', 3, '2020-07-08 18:52:42', '2020-05-01 11:55:56'),
(7, 7, 2, '55091', 'Ut commodi quia distinctio illo rem assumenda facilis sunt.', 'Everette McGlynn', 'PLC', 1986, '4205-54-82', 7, '2020-05-26 12:12:20', '2020-03-27 00:44:49'),
(8, 8, 3, '73773', 'Non dolor omnis sint reprehenderit corrupti.', 'Kaycee Lockman', 'PLC', 1971, '1047-49-75', 2, '2020-06-09 17:11:09', '2019-12-28 17:11:29'),
(9, 9, 4, '10670', 'Omnis delectus natus atque explicabo.', 'Raleigh Goodwin', 'Group', 1997, '1897-42-42', 7, '2020-07-13 11:31:36', '2020-10-12 13:27:06'),
(10, 10, 5, '08259', 'Deserunt sunt quis facilis ut voluptas dolorem cum unde.', 'Prof. Harmony Blanda V', 'Inc', 2020, '1462-33-30', 3, '2019-12-11 12:42:15', '2020-04-24 22:33:04'),
(11, 11, 1, '31837', 'Velit nihil qui voluptatem et sit harum rerum.', 'Justen Kiehn', 'LLC', 1989, '0950-12-42', 2, '2020-02-05 23:14:47', '2020-04-07 18:33:43'),
(12, 12, 2, '46273', 'Impedit ut molestiae quaerat dolores eveniet.', 'Darian Sporer Sr.', 'LLC', 2005, '4440-31-23', 8, '2019-12-28 20:19:04', '2019-11-14 05:27:02'),
(13, 1, 3, '50352', 'In voluptatem delectus ducimus quaerat.', 'Mrs. Hortense Metz', 'Group', 1997, '2059-99-14', 4, '2020-03-18 23:37:41', '2020-08-27 00:16:39'),
(14, 2, 4, '66195', 'Itaque dignissimos vel omnis aut rerum modi ab.', 'Mr. Bradley Cummerata Jr.', 'PLC', 1975, '1355-40-05', 3, '2020-03-21 11:37:31', '2020-09-24 01:44:31'),
(15, 3, 5, '14700', 'Tempora reprehenderit dolores debitis sunt ut.', 'Dr. Electa Bartoletti Sr.', 'LLC', 2014, '6328-69-74', 5, '2020-07-07 08:03:15', '2019-10-20 04:49:01'),
(16, 4, 1, '78053', 'Maiores voluptatum et modi eligendi voluptatem.', 'Josephine Moore', 'Group', 1982, '4748-61-09', 1, '2019-10-20 01:53:47', '2020-03-21 07:12:50'),
(17, 5, 2, '95265', 'Voluptates ipsa laborum facere fugit veritatis.', 'Jerrold Kshlerin', 'Ltd', 2000, '5528-89-01', 6, '2019-11-15 04:20:01', '2020-09-23 13:31:41'),
(18, 6, 3, '60254', 'Possimus porro quia commodi.', 'Maya Schultz', 'Ltd', 1983, '3332-86-24', 1, '2019-12-08 21:40:10', '2020-01-10 22:21:39'),
(19, 7, 4, '49212', 'Dolore sit et aperiam qui.', 'Norberto Considine Jr.', 'Ltd', 1994, '0625-26-08', 2, '2020-05-22 16:13:30', '2020-07-27 17:40:53'),
(20, 8, 5, '76144', 'Iusto corrupti quod illo ut voluptatem.', 'Gertrude Bartell MD', 'Ltd', 2014, '8450-10-87', 7, '2020-09-09 12:15:29', '2019-11-07 07:59:05'),
(21, 9, 1, '43743', 'Occaecati nisi iusto autem saepe vitae eaque.', 'Alta Ruecker', 'Inc', 1991, '4965-43-22', 9, '2019-11-18 06:22:29', '2020-03-15 08:58:27'),
(22, 10, 2, '61283', 'Earum voluptatem soluta quibusdam laboriosam vel labore quia sed.', 'Cortney Lynch', 'Ltd', 2014, '1692-72-35', 7, '2020-10-10 09:03:44', '2020-01-28 10:49:19'),
(23, 11, 3, '56838', 'Eos occaecati quod hic molestiae sed sed.', 'Ms. Janae Lockman V', 'Ltd', 1978, '2708-00-71', 4, '2019-11-07 05:40:16', '2020-06-02 04:33:45'),
(24, 12, 4, '82432', 'Eos nostrum qui sunt.', 'Miss Briana Yost DDS', 'Group', 2015, '0251-92-65', 1, '2019-12-23 20:30:53', '2020-07-19 18:59:51'),
(25, 1, 5, '34493', 'Aperiam quis distinctio incidunt cupiditate possimus.', 'Mrs. Liliana Morissette', 'PLC', 1973, '0472-05-22', 5, '2020-04-16 01:16:12', '2020-09-15 06:15:49'),
(26, 2, 1, '21048', 'Odio beatae consequatur quo voluptatum et.', 'Prof. Rex Weissnat Jr.', 'and Sons', 1975, '5089-32-29', 5, '2019-11-02 05:29:59', '2020-05-04 18:53:51'),
(27, 3, 2, '05065', 'Quasi sapiente velit ea doloribus.', 'Mr. Elbert Collins IV', 'PLC', 2008, '7603-51-06', 4, '2020-05-16 11:35:45', '2020-08-27 04:39:39'),
(28, 4, 3, '68084', 'Quia non at qui et.', 'Dr. Urban Glover V', 'and Sons', 1990, '7728-29-08', 7, '2019-10-21 21:25:06', '2020-01-19 03:31:11'),
(29, 5, 4, '73818', 'Eum odio veritatis architecto aut ipsa non.', 'Everardo Anderson MD', 'Inc', 2014, '0590-66-72', 2, '2020-09-19 17:02:24', '2020-02-20 08:50:55'),
(30, 6, 5, '27370', 'Ipsum accusantium unde est quam maiores et.', 'Clara Balistreri', 'Ltd', 1984, '5095-74-31', 7, '2020-03-17 03:29:19', '2020-05-27 06:16:33'),
(31, 7, 1, '74568', 'Ducimus voluptas dicta quam iusto quo ipsum.', 'Miss Nayeli McKenzie IV', 'LLC', 1995, '7135-77-73', 5, '2020-05-19 07:21:19', '2020-07-22 12:14:14'),
(32, 8, 2, '71717', 'Modi in soluta ullam ea velit est.', 'Marco Daugherty', 'and Sons', 2004, '3179-57-14', 1, '2020-06-04 20:00:42', '2020-05-05 06:36:26'),
(33, 9, 3, '54579', 'Consequatur ex quas praesentium beatae corporis sit voluptates.', 'Dr. Toni Hansen', 'and Sons', 1972, '2091-54-19', 1, '2020-08-10 15:52:04', '2020-03-05 10:48:00'),
(34, 10, 4, '35064', 'Eum voluptatem commodi rem cum.', 'Niko Lindgren', 'PLC', 1998, '8320-72-78', 9, '2020-01-15 19:04:15', '2019-10-19 21:21:20'),
(35, 11, 5, '16553', 'Quis consequuntur velit facilis nam.', 'Brionna Toy', 'Group', 2009, '0311-11-80', 2, '2020-06-15 07:19:07', '2020-07-18 21:57:45'),
(36, 12, 1, '54575', 'Deserunt laborum nostrum earum neque.', 'Prof. Walter Haag MD', 'and Sons', 2002, '7436-91-51', 4, '2020-03-13 03:50:02', '2020-04-13 10:27:46'),
(37, 1, 2, '09065', 'Inventore accusantium vitae quo.', 'Dayne Kihn', 'LLC', 2010, '4987-60-81', 2, '2019-10-20 12:28:18', '2019-11-29 23:08:31'),
(38, 2, 3, '93371', 'Perferendis eveniet sequi consequatur voluptas ex et est.', 'Rowan Braun', 'Ltd', 2007, '9739-06-69', 7, '2020-01-20 10:16:53', '2019-10-16 21:57:13'),
(39, 3, 4, '34322', 'Inventore distinctio provident error et mollitia nobis.', 'Dr. Francesca O\'Kon', 'and Sons', 1972, '6442-91-44', 4, '2019-11-23 19:41:30', '2020-04-09 23:02:25'),
(40, 4, 5, '12794', 'Vel officia repudiandae sint quo.', 'Christine Swaniawski MD', 'LLC', 2016, '3870-51-98', 2, '2020-04-14 06:38:29', '2020-04-29 03:57:51'),
(41, 5, 1, '34345', 'Error incidunt incidunt perferendis.', 'Harold DuBuque', 'Group', 2007, '8611-72-12', 5, '2020-02-09 03:47:51', '2020-07-07 12:20:57'),
(42, 6, 2, '14546', 'Et ut aut illum recusandae.', 'Addison Rutherford', 'and Sons', 1994, '4568-25-28', 6, '2019-11-14 09:39:07', '2020-01-05 04:05:05'),
(43, 7, 3, '37344', 'Aspernatur reiciendis quia asperiores nihil expedita et neque omnis.', 'Kody Sanford', 'Group', 2016, '6954-65-06', 4, '2020-07-03 00:23:54', '2020-03-21 04:49:16'),
(44, 8, 4, '88012', 'Distinctio repellat quos quo et nesciunt earum excepturi.', 'Mr. Sigurd Wolf MD', 'PLC', 2020, '4338-01-35', 7, '2020-08-15 05:00:25', '2020-06-27 22:02:07'),
(45, 9, 5, '09375', 'In officiis tempora quis.', 'Bernardo Goyette', 'PLC', 2018, '0904-48-16', 5, '2020-01-06 23:01:36', '2019-10-23 00:44:34'),
(46, 10, 1, '27407', 'Et ut aspernatur consequuntur fuga voluptatum ut.', 'Peter Rau PhD', 'and Sons', 2020, '7086-59-56', 5, '2020-04-02 00:26:21', '2020-01-25 05:23:44'),
(47, 11, 2, '35988', 'Consequatur corporis in blanditiis totam.', 'Johan Jacobson PhD', 'and Sons', 1976, '5180-71-28', 2, '2020-02-24 08:56:58', '2020-06-09 14:40:12'),
(48, 12, 3, '65048', 'Tempora impedit amet sit dicta ad ducimus.', 'Dr. Agnes Jerde', 'PLC', 1980, '0150-06-69', 5, '2020-07-15 14:40:00', '2020-06-27 21:56:40'),
(49, 1, 4, '74685', 'Delectus dolorem vel cupiditate nulla.', 'Agnes Douglas', 'LLC', 2010, '8358-12-05', 2, '2020-09-21 23:34:32', '2019-12-17 04:05:57'),
(50, 2, 5, '22916', 'Facere aut quidem quibusdam distinctio.', 'Mr. Hyman Wehner I', 'PLC', 1981, '5988-30-26', 3, '2019-12-17 15:32:27', '2020-06-23 23:03:18'),
(51, 3, 1, '40666', 'Perspiciatis consequatur culpa officiis possimus dolorum harum quisquam.', 'Alanis Rosenbaum', 'LLC', 2007, '6684-08-98', 1, '2020-08-29 09:44:33', '2020-09-23 20:38:33'),
(52, 4, 2, '97091', 'Qui expedita repellendus qui enim enim.', 'Kitty Beier', 'and Sons', 2020, '6963-94-31', 8, '2020-05-01 19:14:27', '2020-05-10 07:24:22'),
(53, 5, 3, '65073', 'Ea odio dolor enim at aspernatur.', 'Linnie Schmeler', 'PLC', 2003, '0327-83-85', 8, '2020-01-26 23:12:44', '2020-09-16 03:13:11'),
(54, 6, 4, '79631', 'Provident ut facere ad voluptatem dicta eum.', 'Dr. Novella Daugherty', 'Inc', 2017, '3334-17-17', 5, '2020-01-17 03:30:35', '2020-08-26 04:46:12'),
(55, 7, 5, '12487', 'Consequuntur et eveniet cum suscipit.', 'Kenny Steuber', 'Group', 2020, '4108-01-91', 2, '2020-02-17 09:51:06', '2020-04-22 20:38:41'),
(56, 8, 1, '97745', 'Excepturi accusantium qui blanditiis quia dolor esse hic natus.', 'Kane Veum', 'Ltd', 1982, '3968-81-54', 3, '2020-03-27 03:35:46', '2020-03-25 13:15:12'),
(57, 9, 2, '15345', 'Dolores sit vel molestiae veritatis maiores itaque.', 'Dr. Mark Terry III', 'LLC', 1995, '8754-17-85', 4, '2020-05-03 11:16:12', '2020-02-11 00:59:17'),
(58, 10, 3, '35970', 'Blanditiis placeat harum eum tempora aut et.', 'Dr. Kennedy Lueilwitz', 'Group', 2013, '9851-08-59', 5, '2019-11-10 07:58:55', '2020-03-06 02:22:37'),
(59, 11, 4, '05339', 'Et aut ducimus labore harum adipisci deleniti.', 'Prof. Aaron Gleichner', 'Ltd', 2010, '8705-01-65', 2, '2020-06-06 00:18:08', '2019-12-20 03:19:37'),
(60, 12, 5, '57729', 'Totam voluptatem occaecati voluptatum sunt doloremque laboriosam autem.', 'Prof. Luigi Powlowski I', 'LLC', 1985, '8191-29-49', 6, '2020-06-01 21:21:55', '2020-04-30 17:48:27'),
(61, 1, 1, '48548', 'Accusantium sint similique iure quae eveniet sapiente quibusdam.', 'Prof. Giovani Shanahan I', 'and Sons', 1982, '3418-79-54', 3, '2019-12-27 03:42:30', '2020-06-29 18:44:42'),
(62, 2, 2, '93691', 'Est consequatur harum a rerum fugit expedita.', 'Marilyne Schmeler Sr.', 'LLC', 2004, '1130-53-00', 8, '2020-04-21 22:10:07', '2020-03-02 16:00:38'),
(63, 3, 3, '32058', 'Et blanditiis officia qui dolores nobis.', 'Kaylah Moore', 'Inc', 2002, '3786-58-73', 9, '2020-05-19 08:19:43', '2020-09-03 02:36:37'),
(64, 4, 4, '53630', 'A sint veniam similique consequatur ipsa fuga sint illo.', 'Emelia O\'Keefe I', 'and Sons', 2013, '3641-19-10', 5, '2019-12-15 07:30:14', '2020-05-22 16:16:09'),
(65, 5, 5, '31528', 'A architecto commodi labore.', 'Wayne O\'Connell', 'LLC', 2003, '4154-49-29', 7, '2020-03-12 10:01:11', '2019-12-30 20:39:17'),
(66, 6, 1, '77975', 'Est qui fuga at est.', 'Prof. Zoila Emard', 'Ltd', 2005, '7043-05-73', 6, '2020-08-30 04:54:25', '2020-01-02 19:45:20'),
(67, 7, 2, '37297', 'Id et quas repellat aut pariatur sit tempora aut.', 'Cydney Torphy', 'LLC', 1981, '0922-47-86', 6, '2019-11-10 15:42:39', '2020-06-28 12:37:51'),
(68, 8, 3, '91195', 'Assumenda et similique ut ea quos voluptatum est.', 'Melyssa Kub', 'Inc', 2010, '5102-10-54', 6, '2020-08-19 03:36:43', '2020-08-27 13:35:48'),
(69, 9, 4, '98889', 'Cumque aperiam occaecati eius dolor.', 'Aaliyah Stracke', 'Group', 2003, '8826-78-90', 9, '2020-07-16 00:01:38', '2020-02-13 19:56:27'),
(70, 10, 5, '10571', 'Sint tempora suscipit nulla quisquam dolores quia.', 'Ali Schaden Jr.', 'Ltd', 2001, '3285-41-58', 2, '2019-11-01 10:53:01', '2020-06-21 06:19:45'),
(71, 11, 1, '58103', 'Assumenda at sit error asperiores velit amet repellat.', 'Miss Kayli Borer', 'Inc', 2007, '9902-95-52', 5, '2020-02-02 06:12:47', '2020-02-02 04:31:55'),
(72, 12, 2, '78534', 'Quia repellat ducimus aut unde voluptatem.', 'Kenneth Satterfield', 'and Sons', 1973, '8118-15-69', 3, '2019-11-25 09:10:34', '2020-03-14 18:42:54'),
(73, 1, 3, '87065', 'Vero distinctio ut labore aspernatur quidem sed.', 'Halie Yost', 'PLC', 1986, '5560-59-26', 4, '2020-02-09 20:50:20', '2020-10-09 23:52:47'),
(74, 2, 4, '32426', 'Veniam tenetur vel at reiciendis nihil molestias.', 'Aubree Carroll', 'PLC', 1970, '7404-16-32', 5, '2020-06-08 10:50:37', '2019-10-22 19:25:07'),
(75, 3, 5, '16500', 'Illo nulla et tempora.', 'Reba Ullrich V', 'Inc', 2007, '3150-77-61', 7, '2020-08-01 03:38:56', '2020-10-03 14:13:45'),
(76, 4, 1, '97502', 'Aut consequuntur facilis beatae quasi soluta molestiae.', 'Piper Bernhard', 'Group', 2008, '9483-14-45', 9, '2020-01-05 10:14:25', '2019-10-23 22:50:21'),
(77, 5, 2, '46699', 'Eius deserunt qui nulla ad quis excepturi aut ratione.', 'Dr. Jeff Kuvalis', 'and Sons', 2011, '2156-06-99', 2, '2019-12-04 02:58:19', '2020-09-12 01:38:22'),
(78, 6, 3, '24469', 'Occaecati ut quia quia aut corporis et sint.', 'Reese Lehner', 'Ltd', 1970, '7384-16-49', 5, '2020-01-13 17:10:39', '2020-02-15 19:32:42'),
(79, 7, 4, '43585', 'Quasi aut nobis voluptatem sint corrupti quo provident.', 'Bonita Hane DVM', 'PLC', 1983, '5012-39-99', 5, '2020-07-06 04:23:18', '2020-06-08 14:57:39'),
(80, 8, 5, '89277', 'Sunt tempore reprehenderit et officiis.', 'Wyman Zemlak', 'and Sons', 1976, '6896-64-81', 9, '2019-10-26 09:04:17', '2019-11-09 06:59:24'),
(81, 9, 1, '20096', 'Mollitia dolor tempore necessitatibus sint.', 'Prof. Camden Glover', 'LLC', 2008, '1238-95-88', 9, '2020-08-25 19:23:03', '2020-02-09 22:07:28'),
(82, 10, 2, '60221', 'Inventore et eos reiciendis non perspiciatis.', 'Dr. Delilah Breitenberg I', 'Ltd', 2001, '9871-75-36', 8, '2019-12-11 20:24:54', '2020-06-28 13:20:24'),
(83, 11, 3, '41573', 'Porro voluptates expedita laudantium quo.', 'Fletcher Quigley', 'Group', 1997, '7602-44-28', 9, '2019-12-13 17:13:53', '2020-08-19 11:20:35'),
(84, 12, 4, '01750', 'Nam architecto voluptates quasi voluptates ipsa repellendus.', 'Fritz Pfannerstill Jr.', 'LLC', 1971, '3877-52-03', 7, '2019-12-10 12:40:33', '2020-03-25 13:45:11'),
(85, 1, 5, '34572', 'Iusto eos sint vel commodi id recusandae autem.', 'Dr. Frida Mann IV', 'LLC', 1991, '2235-86-61', 8, '2020-04-28 00:12:01', '2020-08-24 16:16:47'),
(86, 2, 1, '86421', 'Reiciendis nisi laudantium aut et et amet non dolor.', 'Ernest Zieme', 'LLC', 2013, '7820-32-93', 2, '2020-02-01 13:09:00', '2020-08-24 21:45:57'),
(87, 3, 2, '49547', 'Labore veniam aliquid recusandae eum aspernatur doloribus.', 'Prof. Gino Veum DDS', 'PLC', 1972, '3505-19-82', 5, '2020-02-03 19:17:48', '2020-06-10 14:45:58'),
(88, 4, 3, '74893', 'Et autem modi ut tempore impedit in facere.', 'Katheryn Wolf', 'Group', 2001, '8707-24-77', 4, '2020-05-28 08:20:56', '2019-10-20 21:23:40'),
(89, 5, 4, '13014', 'Odio neque molestiae corporis sunt dolore illo molestiae.', 'Kobe Strosin', 'LLC', 2002, '0362-97-48', 6, '2020-02-11 01:57:18', '2020-02-24 12:39:07'),
(90, 6, 5, '96696', 'Beatae consequatur odio tempore.', 'Miss Lessie Rowe', 'and Sons', 1995, '9545-75-23', 3, '2020-05-23 20:00:07', '2019-12-12 09:37:21'),
(91, 7, 1, '21570', 'Doloremque ipsum laborum fugit ullam.', 'Davon Schulist', 'LLC', 1978, '9093-86-78', 5, '2019-10-21 11:55:51', '2020-03-31 13:52:27'),
(92, 8, 2, '23671', 'Quia sequi id molestiae delectus.', 'Randall Parker DDS', 'PLC', 1993, '1328-74-92', 2, '2020-10-12 15:03:29', '2019-11-02 23:53:30'),
(93, 9, 3, '57176', 'Animi ea est recusandae.', 'Madyson Lindgren', 'Inc', 1975, '3460-53-28', 5, '2019-10-17 12:16:34', '2020-06-20 13:02:06'),
(94, 10, 4, '66729', 'Autem velit ea atque aspernatur amet temporibus.', 'Dr. Robbie Schumm', 'LLC', 1998, '7775-95-35', 4, '2020-02-26 08:42:03', '2020-03-13 01:39:02'),
(95, 11, 5, '08560', 'Ad aliquid consequatur id vitae et.', 'Mr. Bradley Conroy IV', 'Group', 2015, '2248-04-61', 4, '2020-08-16 20:15:42', '2020-01-21 03:32:52'),
(96, 12, 1, '13328', 'Sapiente quas vero et excepturi.', 'Arne O\'Connell', 'PLC', 1978, '7596-73-69', 2, '2019-12-19 20:39:45', '2020-06-19 08:57:14'),
(97, 1, 2, '12308', 'Alias ea cupiditate corporis sit.', 'Dr. Favian Parker', 'PLC', 2000, '4770-44-11', 3, '2020-02-05 23:41:06', '2020-04-11 04:05:52'),
(98, 2, 3, '23107', 'Reiciendis sit magni nihil accusamus et.', 'Josie Wiza', 'and Sons', 2011, '8858-63-81', 8, '2019-11-21 04:57:28', '2020-07-14 08:41:28'),
(99, 3, 4, '33839', 'Consequuntur assumenda autem in.', 'Niko Blick', 'and Sons', 2003, '2181-70-49', 4, '2020-04-18 07:13:12', '2020-04-09 10:04:14'),
(100, 4, 5, '54724', 'Quia iure totam numquam natus.', 'Minnie Hettinger', 'Inc', 2013, '7259-34-14', 9, '2020-03-31 11:12:02', '2020-07-09 00:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `created_at`) VALUES
(1, 'Bahasa Indonesia', '2020-10-13 16:22:34'),
(2, 'Bahasa Inggris', '2020-10-13 16:22:34'),
(3, 'Nover', '2020-10-13 16:22:34'),
(4, 'Seni', '2020-10-13 16:22:34'),
(5, 'Teknik', '2020-10-13 16:22:34'),
(6, 'Bisnis', '2020-10-13 16:22:34'),
(7, 'Ekonomi', '2020-10-13 16:22:34'),
(8, 'Sejarah', '2020-10-13 16:22:34'),
(9, 'Agama Islam', '2020-10-13 16:22:34'),
(10, 'Hukum', '2020-10-13 16:22:34'),
(11, 'Majalah', '2020-10-13 16:22:34'),
(12, 'Pengembangan Diri', '2020-10-13 16:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_buku`
--

CREATE TABLE `lokasi_buku` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi_buku`
--

INSERT INTO `lokasi_buku` (`id`, `kode`, `lokasi`, `created_at`) VALUES
(1, 'R1', 'Rak 1', '2020-10-13 16:25:38'),
(2, 'R2', 'Rak 2', '2020-10-13 16:25:38'),
(3, 'R3', 'Rak 3', '2020-10-13 16:25:38'),
(4, 'R4', 'Rak 4', '2020-10-13 16:25:38'),
(5, 'R5', 'Rak 5', '2020-10-13 16:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `kode`, `prodi`, `created_at`) VALUES
(1, 'SI', 'Sistem Informasi', '2020-10-13 16:24:48'),
(2, 'TI', 'Teknik Informatika', '2020-10-13 16:24:48'),
(3, 'EK', 'Ekonomi', '2020-10-13 16:24:48'),
(4, 'BI', 'Bisnis', '2020-10-13 16:24:48'),
(5, 'Pend', 'Pendidikan', '2020-10-13 16:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('pinjam','kembali') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','staff') NOT NULL,
  `aktif` enum('y','n') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `password`, `level`, `aktif`, `created_at`) VALUES
(1, 'admin', 'administrator', 'admin@mail.com', '25d55ad283aa400af464c76d713c07ad', 'admin', 'y', '2020-10-13 16:10:01'),
(2, 'staff', 'staff', 'staff@mail.com', '25d55ad283aa400af464c76d713c07ad', 'staff', 'y', '2020-10-13 17:19:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `nim_2` (`nim`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `kode_buku_2` (`kode_buku`),
  ADD KEY `isbn_2` (`isbn`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_buku`
--
ALTER TABLE `lokasi_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `kode_2` (`kode`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `kode_2` (`kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email_2` (`email`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lokasi_buku`
--
ALTER TABLE `lokasi_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
