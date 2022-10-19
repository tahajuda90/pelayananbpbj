-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2022 at 08:34 AM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_dprtm` int(36) NOT NULL,
  `nama_dprt` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_dprtm`, `nama_dprt`, `link`) VALUES
(1, 'Penyelenggara LPSE', ''),
(2, 'Bagian Pengadaan Barang Jasa', ''),
(3, 'Advokasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feed` int(36) NOT NULL,
  `id_visit` int(36) NOT NULL,
  `pesan` text NOT NULL,
  `rate` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'pegawai', 'User Pegawai'),
(3, 'pendamping', 'User Pendamping');

-- --------------------------------------------------------

--
-- Table structure for table `guest_type`
--

CREATE TABLE `guest_type` (
  `id_role` int(36) NOT NULL,
  `jenis_tamu` varchar(255) NOT NULL,
  `identitas` varchar(125) NOT NULL,
  `srt` smallint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_type`
--

INSERT INTO `guest_type` (`id_role`, `jenis_tamu`, `identitas`, `srt`) VALUES
(1, 'Non Penyedia', 'NIK / NIP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `perhari`
-- (See below for the actual view)
--
CREATE TABLE `perhari` (
`created_date` timestamp
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_serv` int(36) NOT NULL,
  `id_dprtm` int(36) NOT NULL,
  `id_role` int(36) NOT NULL,
  `service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_serv`, `id_dprtm`, `id_role`, `service`) VALUES
(1, 1, 1, 'Pendaftaran LPSE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$AqgBLUXNsLjiNn3G1jcqaOVzgkDJqbSTk.JrQpFyy7Iwv/PIoNPLm', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1637071112, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'taha', '$2y$10$VUo2YxDZzm7vNIdSHrVFUeUFP690mS.eJmkLHeoWWAuJGAcbqsvfm', 'tahajuda@projek.efm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1627560098, 1627974022, 1, 'taha', 'juga', 'hshsj', '8086060'),
(4, '127.0.0.1', 'taha2', '$2y$10$DCHZ.wZSl0yaqewcpfSI8e3OK.IvrgFPfIYAV7sFTLMcxLKBBsaU.', 'hvakdjvfkaj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1627648339, NULL, 1, 'taha', 'efm', 'efm it', '8086060');

-- --------------------------------------------------------

--
-- Table structure for table `users_department`
--

CREATE TABLE `users_department` (
  `id_ud` int(36) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dprtm` int(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_department`
--

INSERT INTO `users_department` (`id_ud`, `id_user`, `id_dprtm`) VALUES
(14, 4, 1),
(15, 2, 2),
(16, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(9, 1, 1),
(10, 1, 2),
(14, 2, 2),
(13, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id_visit` int(36) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `unik` varchar(255) DEFAULT NULL,
  `role` int(36) NOT NULL,
  `id_dprtm` int(36) DEFAULT NULL,
  `no_identitas` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kelamin` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `keperluan` int(36) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `surat_tugas` varchar(255) DEFAULT NULL,
  `wajah` varchar(255) DEFAULT NULL,
  `done_time` timestamp NULL DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id_visit`, `email`, `unik`, `role`, `id_dprtm`, `no_identitas`, `nama`, `kelamin`, `instansi`, `telepon`, `keperluan`, `keterangan`, `surat_tugas`, `wajah`, `done_time`, `created_date`, `updated_date`) VALUES
(1, 'admin@projek.efm', 'NIK / NIP', 1, NULL, '26491-2-272-10742-1', 'semen tiga roda', 'L', 'kediri', '79274-92', 1, 'agasgaga', NULL, NULL, NULL, '2021-07-31 12:59:56', '2021-07-31 12:59:56'),
(2, 'admin@projek.efm', 'NIK / NIP', 1, 1, '26491-2-272-10742-1', 'semen tiga roda', 'L', 'kediri', '79274-92', 1, 'adgadgagaga', NULL, NULL, NULL, '2021-08-03 12:02:35', '2021-08-03 12:02:35'),
(3, 'admin@projek.efm', 'NIK / NIP', 1, 1, '3982651086530186501', 'semen tiga roda', 'L', 'kediri', '6420640', 1, 'ydffgih;kj;lj;', NULL, NULL, NULL, '2021-08-09 06:33:41', '2021-08-09 06:33:41'),
(4, 'efm.publisher@gmail.com', 'NIK / NIP', 1, 1, '3982651086530186501', 'semen gresik', 'P', 'efm software house', '6420640', 1, 'kgkhdfljgkhl', NULL, NULL, NULL, '2021-08-09 06:34:05', '2021-08-09 06:34:05'),
(5, 'user@lavalite.org', 'NIK / NIP', 1, 1, '26491-2-272-10742-1', 'hdkhdkhclhk', 'L', 'gamvbgiyfudu', '950508580', 1, 'sjdufoutg', NULL, NULL, NULL, '2021-08-09 06:35:14', '2021-08-09 06:35:14'),
(6, '', 'NIK / NIP', 1, 1, '', 'semen tiga roda', NULL, 'kediri', '79274-92', 1, 'ydfufuf;g;kh;h;', NULL, NULL, NULL, '2021-08-09 06:58:20', '2021-08-09 06:58:20'),
(7, '', 'NIK / NIP', 1, 1, '', 'semen tiga roda', NULL, 'kediri', '6420640', 1, ';agfkafh;kashf;aslfj;', NULL, NULL, NULL, '2021-08-09 06:58:52', '2021-08-09 06:58:52'),
(8, '', 'NIK / NIP', 1, 1, '', 'semen tiga roda', NULL, 'efm software house', '6420640', 2, 'lflg;h;j;p', NULL, NULL, NULL, '2021-08-09 07:00:56', '2021-08-13 02:48:19');

-- --------------------------------------------------------

--
-- Structure for view `perhari`
--
DROP TABLE IF EXISTS `perhari`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `perhari`  AS  select `v`.`created_date` AS `created_date`,count(`v`.`created_date`) AS `jumlah` from `visitor` `v` group by `v`.`created_date` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_dprtm`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feed`),
  ADD KEY `kunjungan` (`id_visit`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_type`
--
ALTER TABLE `guest_type`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_serv`),
  ADD KEY `dept` (`id_dprtm`),
  ADD KEY `jenis` (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_department`
--
ALTER TABLE `users_department`
  ADD PRIMARY KEY (`id_ud`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id_visit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_dprtm` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feed` int(36) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guest_type`
--
ALTER TABLE `guest_type`
  MODIFY `id_role` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id_serv` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_department`
--
ALTER TABLE `users_department`
  MODIFY `id_ud` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id_visit` int(36) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `kunjungan` FOREIGN KEY (`id_visit`) REFERENCES `visitor` (`id_visit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `dept` FOREIGN KEY (`id_dprtm`) REFERENCES `department` (`id_dprtm`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jenis` FOREIGN KEY (`id_role`) REFERENCES `guest_type` (`id_role`) ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
