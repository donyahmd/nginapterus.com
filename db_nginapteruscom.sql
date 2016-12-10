-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2016 at 04:58 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nginapteruscom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(12) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `tgl_login` date NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_buat` date NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `terakhir_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `username`, `password`, `tgl_buat`, `ip_address`, `terakhir_login`) VALUES
(1, 'donyahmd', '21232f297a57a5a743894a0e4a801fc3', '2016-11-01', '192.168.1.245', '2016-12-10 15:53:10'),
(2, 'gx_trouble', 'e00cf25ad42683b3df678c61f42c6bda', '2016-11-02', '235.123.10.12', '2016-11-18 06:38:08'),
(12, 'donyamddd', '21232f297a57a5a743894a0e4a801fc3', '2016-11-09', '192.12', '2016-11-23 00:53:25'),
(13, 'donyahmddd', '21232f297a57a5a743894a0e4a801fc3', '2016-11-09', '192.nginapterus', '2016-11-23 00:54:35'),
(15, 'donyamdd', 'b693ee2c172f37de57d8de9c0376a9e7', '2016-11-09', '192.nginapterus', '2016-11-23 00:55:03'),
(16, 'mamam', 'huahua', '2016-11-23', '192.nginapterus', '2016-11-23 00:56:28'),
(17, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-11-23', '192.nginapterus', '2016-11-23 00:58:24'),
(19, 'admindd', '21232f297a57a5a743894a0e4a801fc3', '2016-11-23', '192.nginapterus', '2016-11-23 01:13:54'),
(20, '1', 'c4ca4238a0b923820dcc509a6f75849b', '2016-11-23', '192.nginapterus', '2016-11-23 01:01:50'),
(31, '$username', '$password', '2016-11-23', '192.nginapterus', '2016-11-23 01:20:02'),
(38, 'adawd', '0cc175b9c0f1b6a831c399e269772661', '2016-11-23', '192.nginapterus', '2016-11-23 01:23:32'),
(39, 'ferry', '202cb962ac59075b964b07152d234b70', '2016-12-09', '192.nginapterus', '2016-12-09 00:42:48'),
(41, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', '2016-12-10', '192.nginapterus', '2016-12-10 08:09:20'),
(43, 'tes1', '28b662d883b6d76fd96e4ddc5e9ba780', '2016-12-10', '192.nginapterus', '2016-12-10 08:12:18'),
(47, 'dwaa', '7815696ecbf1c96e6894b779456d330e', '2016-12-10', '192.nginapterus', '2016-12-10 08:35:41'),
(51, '$usernaawdme', '$password', '2016-12-10', '192.nginapterus', '2016-12-10 08:51:13'),
(54, '$usern22awdme', '$password', '2016-12-10', '192.nginapterus', '2016-12-10 08:52:00'),
(55, 'testlagi1', '569ef72642be0fadd711d6a468d68ee1', '2016-12-10', '192.nginapterus', '2016-12-10 08:56:32'),
(56, 'testbuatuserotomatis', 'ad0390d05082d65fb528335760e618ed', '2016-12-10', '192.nginapterus', '2016-12-10 09:30:55'),
(57, 'lol', '9cdfb439c7876e703e307864c9167a15', '2016-12-10', '192.nginapterus', '2016-12-10 15:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_host`
--

CREATE TABLE `tbl_booking_host` (
  `id_order` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_host` int(12) NOT NULL,
  `tgl_checkin` date NOT NULL,
  `tgl_checkout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar_host`
--

CREATE TABLE `tbl_gambar_host` (
  `id_gambar_host` int(12) NOT NULL,
  `id_host` int(12) NOT NULL,
  `gambar_host` varchar(255) NOT NULL,
  `url_gambar_host` varchar(255) NOT NULL,
  `alt_gambar_host` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gambar_host`
--

INSERT INTO `tbl_gambar_host` (`id_gambar_host`, `id_host`, `gambar_host`, `url_gambar_host`, `alt_gambar_host`) VALUES
(1, 1, 'kost.jpg', 'user/donyahmd/1/', 'kost contoh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_host`
--

CREATE TABLE `tbl_host` (
  `id_host` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_host` varchar(255) NOT NULL,
  `harga_host` int(25) NOT NULL,
  `tgl_publish_host` date NOT NULL,
  `deskripsi_host` text NOT NULL,
  `fasilitas_host` varchar(255) NOT NULL,
  `alamat_host` text NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `tipe_host` varchar(255) NOT NULL,
  `negara_host` varchar(255) NOT NULL,
  `rating` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_host`
--

INSERT INTO `tbl_host` (`id_host`, `username`, `nama_host`, `harga_host`, `tgl_publish_host`, `deskripsi_host`, `fasilitas_host`, `alamat_host`, `lat`, `lng`, `tipe_host`, `negara_host`, `rating`) VALUES
(1, 'donyahmd', 'Cozy Homestay', 450000, '2016-11-01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora veniam beatae, aspernatur aut architecto, obcaecati, delectus in optio id repellendus molestiae, amet soluta natus fugiat nisi nihil at debitis mollitia.', 'AC, SPA, TV, WIFI', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora veniam beatae, aspernatur aut architecto, obcaecati, delectus in optio id repellendus molestiae, amet soluta natus fugiat nisi nihil at debitis mollitia.', -0.488549, 117.156662, 'Home Stay', 'INDONESIA', 4),
(2, 'donyahmd', 'Anggur Homestay', 250000, '2016-11-01', 'awawadjdwajlwdjlwadjl\r\ndwoaawdawdawdawdawd\r\nawdwadawdawdawd', 'AC, PAM', 'Jl. Anggur', -0.474882, 117.140594, 'Home Stay', 'Indonesia', 2),
(3, 'gx_trouble', 'Hotel Bamboo', 505000, '2016-11-03', 'awdkandwagdauyhdshdab\r\nrfgdgdgfdggrdgbe', 'AC, PAM', 'dawjdawskdakldhakdhakdh', -0.501433, 117.138596, 'Hotel', 'INDONESIA', 5),
(4, 'donyahmd', 'Rizal Asrama', 125000, '2016-11-09', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', -0.496175, 117.164658, 'Asrama', 'INDONESIA', 1),
(5, 'donyahmd', 'C2015 Host', 999000, '2016-11-08', 'dahbjdnk', 'awdawd', 'wadad', -0.466969, 117.177048, 'Rumah', 'INDONESIA', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar_host`
--

CREATE TABLE `tbl_komentar_host` (
  `id_komentar` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_host` int(12) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komentar_host`
--

INSERT INTO `tbl_komentar_host` (`id_komentar`, `username`, `id_host`, `isi_komentar`, `tgl_dibuat`) VALUES
(1, 'donyahmd', 2, 'komentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentarkomentar', '2016-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `username` varchar(255) NOT NULL,
  `nik_ktp_pengguna` varchar(255) DEFAULT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `foto_ava` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `verifikasi` int(12) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `tgl_diedit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`username`, `nik_ktp_pengguna`, `nama_pengguna`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `alamat`, `pekerjaan`, `kewarganegaraan`, `foto_ava`, `foto_ktp`, `verifikasi`, `tgl_dibuat`, `tgl_diedit`) VALUES
('donyahmd', '6472052511960004', 'DONI AHMAD', '082251614616', 'SAMARINDA', '1996-11-25', 'JL. LAMBUNG MANGKURAT GG.3 BLOK B NO.29A RT.25 KELURAHAN PELITA KECAMATAN SAMARINDA ILIR', 'MAHASISWA', 'INDONESIA', '1.jpg', '6472052511960004-doniahmad.jpg', 1, '2016-08-16', '2016-11-02'),
('gx_trouble', '9999999999', 'Arif Dwi', '', 'SAMARINDA', '1997-07-03', 'AUWHDAKJDNAWDHJDWHJNAWJDADAKJAFESJFENFEJ\r\nWEWFJNEWFNWFJWENFKJWENFWEK', 'MAHASISWA', 'INDONESIA', '2.jpg', 'arif-dwi-ktp.jpg', 0, '2016-11-03', '0000-00-00'),
('lol', NULL, '', '', '', '0000-00-00', '', '', '', NULL, NULL, 0, '0000-00-00', '0000-00-00'),
('testbuatuserotomatis', NULL, '', '', '', '0000-00-00', '', '', '', NULL, NULL, 0, '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_booking_host`
--
ALTER TABLE `tbl_booking_host`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pengguna` (`username`),
  ADD KEY `id_host` (`id_host`);

--
-- Indexes for table `tbl_gambar_host`
--
ALTER TABLE `tbl_gambar_host`
  ADD PRIMARY KEY (`id_gambar_host`),
  ADD KEY `id_host` (`id_host`);

--
-- Indexes for table `tbl_host`
--
ALTER TABLE `tbl_host`
  ADD PRIMARY KEY (`id_host`),
  ADD KEY `id_pengguna` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tbl_komentar_host`
--
ALTER TABLE `tbl_komentar_host`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pengguna` (`username`),
  ADD KEY `id_host` (`id_host`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `ktp_pengguna` (`nik_ktp_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tbl_booking_host`
--
ALTER TABLE `tbl_booking_host`
  MODIFY `id_order` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_gambar_host`
--
ALTER TABLE `tbl_gambar_host`
  MODIFY `id_gambar_host` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_host`
--
ALTER TABLE `tbl_host`
  MODIFY `id_host` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_komentar_host`
--
ALTER TABLE `tbl_komentar_host`
  MODIFY `id_komentar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking_host`
--
ALTER TABLE `tbl_booking_host`
  ADD CONSTRAINT `tbl_booking_host_ibfk_1` FOREIGN KEY (`id_host`) REFERENCES `tbl_host` (`id_host`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_booking_host_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tbl_pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_gambar_host`
--
ALTER TABLE `tbl_gambar_host`
  ADD CONSTRAINT `tbl_gambar_host_ibfk_1` FOREIGN KEY (`id_host`) REFERENCES `tbl_host` (`id_host`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_host`
--
ALTER TABLE `tbl_host`
  ADD CONSTRAINT `tbl_host_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_komentar_host`
--
ALTER TABLE `tbl_komentar_host`
  ADD CONSTRAINT `tbl_komentar_host_ibfk_1` FOREIGN KEY (`id_host`) REFERENCES `tbl_host` (`id_host`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_komentar_host_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tbl_pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD CONSTRAINT `tbl_pengguna_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tbl_akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
