-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 04:01 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbminingx`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_anggota`
--

CREATE TABLE `data_anggota` (
  `id` int(10) NOT NULL,
  `no_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `penghasilan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_rumah` varchar(50) NOT NULL,
  `pinjaman` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kelancaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`id`, `no_anggota`, `nama_anggota`, `penghasilan`, `status`, `status_rumah`, `pinjaman`, `pekerjaan`, `kelancaran`) VALUES
(1, '1;Ya;Adji;Low;Pegawai Negeri Sipil;Tinggi;Menikah;', '', '', '', '', '', '', ''),
(2, '2;Tidak;Sukmana;High;Pegawai Swasta;Tinggi;Menikah', '', '', '', '', '', '', ''),
(3, '3;Tidak;Eka;Low;Pedagang;Tinggi;Menikah;Milik Prib', '', '', '', '', '', '', ''),
(4, '4;Tidak;Adji;Low;Buruh;Tinggi;Menikah;Sewa', '', '', '', '', '', '', ''),
(5, '5;Tidak;Sukmana;Low;Pegawai Negeri Sipil;Rendah;Be', '', '', '', '', '', '', ''),
(6, '6;Ya;Eka;High;Pegawai Swasta;Rendah;Belum Menikah;', '', '', '', '', '', '', ''),
(7, '7;Ya;Adji;Low;Pedagang;Rendah;Belum Menikah;Milik ', '', '', '', '', '', '', ''),
(8, '8;Ya;Sukmana;Low;Buruh;Rendah;Belum Menikah;Sewa', '', '', '', '', '', '', ''),
(9, '9;Tidak;Eka;High;Pegawai Negeri Sipil;Sedang;Belum', '', '', '', '', '', '', ''),
(10, '10;Ya;Adji;High;Pegawai Swasta;Sedang;Belum Menika', '', '', '', '', '', '', ''),
(11, '11;Ya;Sukmana;High;Pedagang;Sedang;Menikah;Milik P', '', '', '', '', '', '', ''),
(12, '12;Tidak;Eka;Low;Pedagang;Sedang;Belum Menikah;Sew', '', '', '', '', '', '', ''),
(13, '13;Tidak;Adji;Low;Buruh;Sedang;Belum Menikah;Milik', '', '', '', '', '', '', ''),
(14, '14;Tidak;Sukmana;Low;Pegawai Negeri Sipil;Sedang;M', '', '', '', '', '', '', ''),
(15, '15;Ya;Eka;Low;Pegawai Swasta;Sedang;Belum Menikah;', '', '', '', '', '', '', ''),
(16, '16;Ya;Adji;Low;Pedagang;Sedang;Belum Menikah;Milik', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_prediksi`
--

CREATE TABLE `data_prediksi` (
  `id` int(10) NOT NULL,
  `no_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `penghasilan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_rumah` varchar(50) NOT NULL,
  `pinjaman` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `keputusan_c45` varchar(50) NOT NULL,
  `id_rule_c45` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_prediksi`
--

INSERT INTO `data_prediksi` (`id`, `no_anggota`, `nama_anggota`, `penghasilan`, `status`, `status_rumah`, `pinjaman`, `pekerjaan`, `keputusan_c45`, `id_rule_c45`) VALUES
(1, '1', '1', '>=4jt', 'menikah', 'pribadi', '>4jt', 'pns', 'Ya', 1),
(2, '2', '2', 'high', 'menikah', 'pribadi', 'tinggi', 'pns', 'Tidak', 1),
(3, '3', '3', 'low', 'menikah', 'pribadi', 'sedang', 'pns', 'Tidak', 4),
(4, '4', '4', 'high', 'belum menikah', 'pribadi', 'tinggi', 'pedagang', 'Tidak', 1),
(5, '5', '5', 'high', 'menikah', 'pribadi', 'sedang', 'pns', 'Ya', 5),
(6, '6', '6', 'low', 'menikah', 'pribadi', 'rendah', 'pns', 'Ya', 2),
(7, '7', '7', 'low', 'menikah', 'pribadi', 'sedang', 'pns', 'Tidak', 4),
(8, '8', '8', 'low', 'menikah', 'pribadi', 'rendah', 'swasta', 'Ya', 2),
(9, '', '', 'low', 'menikah', 'pribadi', 'rendah', 'pns', 'Ya', 2),
(10, '17', 'Gushairon Fadli', 'low', 'menikah', 'pribadi', 'rendah', 'swasta', 'Ya', 2),
(11, '18', 'Gushairon Fadli', 'low', 'menikah', 'sewa', 'rendah', 'pedagang', 'Ya', 2),
(12, '12', '12', 'low', 'menikah', 'sewa', 'tinggi', 'pns', 'Tidak', 1),
(13, '13', '13', 'low', 'menikah', 'pribadi', 'sedang', 'pns', 'Tidak', 5),
(14, '14', '14', 'low', 'belum', 'pribadi', 'sedang', 'swasta', 'Ya', 4),
(15, '15', '15', 'low', 'belum', 'pribadi', 'sedang', 'pedagang', 'Ya', 7),
(16, '16', '16', 'high', 'menikah', 'pribadi', 'rendah', 'swasta', 'Ya', 2),
(17, '123', '123', 'high', 'menikah', 'pribadi', 'rendah', 'swasta', 'Ya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_variabel_prediksi`
--

CREATE TABLE `data_variabel_prediksi` (
  `id` int(5) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_variabel_prediksi`
--

INSERT INTO `data_variabel_prediksi` (`id`, `variabel`, `nilai_variabel`) VALUES
(1, 'pinjaman', 'rendah'),
(2, 'pekerjaan', 'swasta'),
(3, 'status_rumah', 'pribadi');

-- --------------------------------------------------------

--
-- Table structure for table `iterasi_c45`
--

CREATE TABLE `iterasi_c45` (
  `id` int(11) NOT NULL,
  `iterasi` varchar(3) NOT NULL,
  `atribut_gain_ratio_max` varchar(255) NOT NULL,
  `atribut` varchar(100) NOT NULL,
  `nilai_atribut` varchar(100) NOT NULL,
  `jml_kasus_total` varchar(5) NOT NULL,
  `jml_laris` varchar(5) NOT NULL,
  `jml_tdk_laris` varchar(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `inf_gain` varchar(10) NOT NULL,
  `split_info` varchar(10) NOT NULL,
  `gain_ratio` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iterasi_c45`
--

INSERT INTO `iterasi_c45` (`id`, `iterasi`, `atribut_gain_ratio_max`, `atribut`, `nilai_atribut`, `jml_kasus_total`, `jml_laris`, `jml_tdk_laris`, `entropy`, `inf_gain`, `split_info`, `gain_ratio`) VALUES
(1, '1', 'karakter', 'Total', 'Total', '16', '8', '8', '1', '', '', '0'),
(2, '2', 'karakter', 'penghasilan', 'low', '11', '5', '6', '0.994', '0.0132', '0.896', '0.0147'),
(3, '3', 'karakter', 'penghasilan', 'high', '5', '3', '2', '0.971', '0.0132', '0.896', '0.0147'),
(4, '4', 'karakter', 'pekerjaan', 'pns', '4', '1', '3', '0.8113', '0.1187', '1.9772', '0.06'),
(5, '5', 'karakter', 'pekerjaan', 'pedagang', '5', '3', '2', '0.971', '0.1187', '1.9772', '0.06'),
(6, '6', 'karakter', 'pekerjaan', 'swasta', '4', '3', '1', '0.8113', '0.1187', '1.9772', '0.06'),
(7, '7', 'karakter', 'pekerjaan', 'buruh', '3', '1', '2', '0.9183', '0.1187', '1.9772', '0.06'),
(8, '8', 'karakter', 'pinjaman', 'rendah', '4', '3', '1', '0.8113', '0.0943', '1.5', '0.0629'),
(9, '9', 'karakter', 'pinjaman', 'sedang', '8', '4', '4', '1', '0.0943', '1.5', '0.0629'),
(10, '10', 'karakter', 'pinjaman', 'tinggi', '4', '1', '3', '0.8113', '0.0943', '1.5', '0.0629'),
(11, '11', 'karakter', 'status', 'menikah', '6', '2', '4', '0.9183', '0.0488', '0.9544', '0.0511'),
(12, '12', 'karakter', 'status', 'belum', '10', '6', '4', '0.971', '0.0488', '0.9544', '0.0511'),
(13, '13', 'karakter', 'status_rumah', 'pribadi', '8', '4', '4', '1', '0', '1', '0'),
(14, '14', 'karakter', 'status_rumah', 'sewa', '8', '4', '4', '1', '0', '1', '0'),
(15, '15', 'karakter', 'karakter', 'baik', '10', '6', '4', '0.971', '0.1431', '1.2988', '0.1102'),
(16, '16', 'karakter', 'karakter', 'cukup', '4', '2', '2', '1', '0.1431', '1.2988', '0.1102'),
(17, '17', 'karakter', 'karakter', 'kurang_baik', '2', '0', '2', '0', '0.1431', '1.2988', '0.1102'),
(18, '1', 'status', 'Total', 'Total', '10', '6', '4', '0.971', '', '', '0'),
(19, '2', 'status', 'penghasilan', 'low', '6', '4', '2', '0.9183', '0.02', '0.971', '0.0206'),
(20, '3', 'status', 'penghasilan', 'high', '4', '2', '2', '1', '0.02', '0.971', '0.0206'),
(21, '4', 'status', 'pekerjaan', 'pns', '3', '1', '2', '0.9183', '0.22', '1.971', '0.1116'),
(22, '5', 'status', 'pekerjaan', 'pedagang', '2', '2', '0', '0', '0.22', '1.971', '0.1116'),
(23, '6', 'status', 'pekerjaan', 'swasta', '3', '2', '1', '0.9183', '0.22', '1.971', '0.1116'),
(24, '7', 'status', 'pekerjaan', 'buruh', '2', '1', '1', '1', '0.22', '1.971', '0.1116'),
(25, '8', 'status', 'pinjaman', 'rendah', '2', '2', '0', '0', '0.21', '1.4855', '0.1414'),
(26, '9', 'status', 'pinjaman', 'sedang', '5', '3', '2', '0.971', '0.21', '1.4855', '0.1414'),
(27, '10', 'status', 'status', 'menikah', '5', '2', '3', '0.971', '0.6101', '0.5', '1.2202'),
(28, '11', 'status', 'pinjaman', 'tinggi', '3', '1', '2', '0.9183', '0.21', '1.4855', '0.1414'),
(29, '12', 'status', 'status', 'belum', '5', '4', '1', '0.7219', '0.6101', '0.5', '1.2202'),
(30, '13', 'status', 'status_rumah', 'pribadi', '4', '3', '1', '0.8113', '0.0465', '0.971', '0.0479'),
(31, '14', 'status', 'status_rumah', 'sewa', '6', '3', '3', '1', '0.0465', '0.971', '0.0479'),
(32, '1', 'status_rumah', 'Total', 'Total', '5', '2', '3', '0.971', '', '', '0'),
(33, '2', 'status_rumah', 'penghasilan', 'low', '3', '1', '2', '0.9183', '0.02', '0.971', '0.0206'),
(34, '3', 'status_rumah', 'penghasilan', 'high', '2', '1', '1', '1', '0.02', '0.971', '0.0206'),
(35, '4', 'status_rumah', 'pekerjaan', 'pns', '2', '1', '1', '1', '0.571', '1.9219', '0.2971'),
(36, '5', 'status_rumah', 'pekerjaan', 'pedagang', '1', '1', '0', '0', '0.571', '1.9219', '0.2971'),
(37, '6', 'status_rumah', 'pekerjaan', 'swasta', '1', '0', '1', '0', '0.571', '1.9219', '0.2971'),
(38, '7', 'status_rumah', 'pekerjaan', 'buruh', '1', '0', '1', '0', '0.571', '1.9219', '0.2971'),
(39, '8', 'status_rumah', 'pinjaman', 'rendah', '0', '0', '0', '0', '0.02', '0.971', '0.0206'),
(40, '9', 'status_rumah', 'pinjaman', 'sedang', '2', '1', '1', '1', '0.02', '0.971', '0.0206'),
(41, '10', 'status_rumah', 'pinjaman', 'tinggi', '3', '1', '2', '0.9183', '0.02', '0.971', '0.0206'),
(42, '11', 'status_rumah', 'status_rumah', 'pribadi', '2', '2', '0', '0', '0.971', '0.971', '1'),
(43, '12', 'status_rumah', 'status_rumah', 'sewa', '3', '0', '3', '0', '0.971', '0.971', '1'),
(44, '1', 'pekerjaan', 'Total', 'Total', '5', '4', '1', '0.7219', '', '', '0'),
(45, '2', 'pekerjaan', 'penghasilan', 'low', '3', '3', '0', '0', '0.3219', '0.971', '0.3315'),
(46, '3', 'pekerjaan', 'penghasilan', 'high', '2', '1', '1', '1', '0.3219', '0.971', '0.3315'),
(47, '4', 'pekerjaan', 'pekerjaan', 'pns', '1', '0', '1', '0', '0.7219', '1.9219', '0.3756'),
(48, '5', 'pekerjaan', 'pekerjaan', 'pedagang', '1', '1', '0', '0', '0.7219', '1.9219', '0.3756'),
(49, '6', 'pekerjaan', 'pekerjaan', 'swasta', '2', '2', '0', '0', '0.7219', '1.9219', '0.3756'),
(50, '7', 'pekerjaan', 'pekerjaan', 'buruh', '1', '1', '0', '0', '0.7219', '1.9219', '0.3756'),
(51, '8', 'pekerjaan', 'pinjaman', 'rendah', '2', '2', '0', '0', '0.1709', '0.971', '0.176'),
(52, '9', 'pekerjaan', 'pinjaman', 'sedang', '3', '2', '1', '0.9183', '0.1709', '0.971', '0.176'),
(53, '10', 'pekerjaan', 'pinjaman', 'tinggi', '0', '0', '0', '0', '0.1709', '0.971', '0.176'),
(54, '11', 'pekerjaan', 'status_rumah', 'pribadi', '2', '1', '1', '1', '0.3219', '0.971', '0.3315'),
(55, '12', 'pekerjaan', 'status_rumah', 'sewa', '3', '3', '0', '0', '0.3219', '0.971', '0.3315'),
(56, '1', 'penghasilan', 'Total', 'Total', '4', '2', '2', '1', '', '', '0'),
(57, '2', 'penghasilan', 'penghasilan', 'low', '3', '1', '2', '0.9183', '0.3113', '0.8113', '0.3837'),
(58, '3', 'penghasilan', 'penghasilan', 'high', '1', '1', '0', '0', '0.3113', '0.8113', '0.3837'),
(59, '4', 'penghasilan', 'pekerjaan', 'pns', '0', '0', '0', '0', '0.5', '1.5', '0.3333'),
(60, '5', 'penghasilan', 'pekerjaan', 'pedagang', '2', '1', '1', '1', '0.5', '1.5', '0.3333'),
(61, '6', 'penghasilan', 'pekerjaan', 'swasta', '1', '1', '0', '0', '0.5', '1.5', '0.3333'),
(62, '7', 'penghasilan', 'pekerjaan', 'buruh', '1', '0', '1', '0', '0.5', '1.5', '0.3333'),
(63, '8', 'penghasilan', 'pinjaman', 'rendah', '1', '1', '0', '0', '0.5', '1.5', '0.3333'),
(64, '9', 'penghasilan', 'pinjaman', 'sedang', '2', '1', '1', '1', '0.5', '1.5', '0.3333'),
(65, '10', 'penghasilan', 'pinjaman', 'tinggi', '1', '0', '1', '0', '0.5', '1.5', '0.3333'),
(66, '11', 'penghasilan', 'status', 'menikah', '1', '0', '1', '0', '0.3113', '0.8113', '0.3837'),
(67, '12', 'penghasilan', 'status', 'belum', '3', '2', '1', '0.9183', '0.3113', '0.8113', '0.3837'),
(68, '13', 'penghasilan', 'status_rumah', 'pribadi', '3', '1', '2', '0.9183', '0.3113', '0.8113', '0.3837'),
(69, '14', 'penghasilan', 'status_rumah', 'sewa', '1', '1', '0', '0', '0.3113', '0.8113', '0.3837'),
(70, '1', 'pekerjaan', 'Total', 'Total', '3', '1', '2', '0.9183', '', '', '0'),
(71, '2', 'pekerjaan', 'pekerjaan', 'pns', '0', '0', '0', '0', '0.2516', '0.9183', '0.274'),
(72, '3', 'pekerjaan', 'pekerjaan', 'pedagang', '2', '1', '1', '1', '0.2516', '0.9183', '0.274'),
(73, '4', 'pekerjaan', 'pekerjaan', 'swasta', '0', '0', '0', '0', '0.2516', '0.9183', '0.274'),
(74, '5', 'pekerjaan', 'pekerjaan', 'buruh', '1', '0', '1', '0', '0.2516', '0.9183', '0.274'),
(75, '6', 'pekerjaan', 'pinjaman', 'rendah', '0', '0', '0', '0', '0.2516', '0.9183', '0.274'),
(76, '7', 'pekerjaan', 'pinjaman', 'sedang', '2', '1', '1', '1', '0.2516', '0.9183', '0.274'),
(77, '8', 'pekerjaan', 'pinjaman', 'tinggi', '1', '0', '1', '0', '0.2516', '0.9183', '0.274'),
(78, '9', 'pekerjaan', 'status', 'menikah', '1', '0', '1', '0', '0.2516', '0.9183', '0.274'),
(79, '10', 'pekerjaan', 'status', 'belum', '2', '1', '1', '1', '0.2516', '0.9183', '0.274'),
(80, '11', 'pekerjaan', 'status_rumah', 'pribadi', '3', '1', '2', '0.9183', '0', '0', '0'),
(81, '12', 'pekerjaan', 'status_rumah', 'sewa', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `photo_karyawan` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_karyawan` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `photo_karyawan`, `username`, `password`, `status_karyawan`) VALUES
(3, 'Adji Sukmanas', 'bing_style_wallpaper_by_brebenel_silviu-d6osz6o.jpg', 'adji', '35ca873f3d7296b2d3e3043fc5d6a70a', '2'),
(4, 'Gushairon Fadli', 'photo.jpg', 'Gushairon', 'f6959b3f579afd3abbf5350d363478f8', '2'),
(5, 'Gushairon Fadli', 'cZ9YV.jpg', 'jdv', '8613a32882541c4efd9fd2cf8081ae69', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `kelancaran` enum('Ya','Tidak') NOT NULL,
  `nasabah_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `kelancaran`, `nasabah_name`) VALUES
(1, 'Ya', 'Adji'),
(2, 'Tidak', 'Sukmana'),
(3, 'Tidak', 'Eka'),
(4, 'Tidak', 'Adji'),
(5, 'Tidak', 'Sukmana'),
(6, 'Ya', 'Eka'),
(7, 'Ya', 'Adji'),
(8, 'Ya', 'Sukmana'),
(9, 'Tidak', 'Eka'),
(10, 'Ya', 'Adji'),
(11, 'Ya', 'Sukmana'),
(12, 'Tidak', 'Eka'),
(13, 'Tidak', 'Adji'),
(14, 'Tidak', 'Sukmana'),
(15, 'Ya', 'Eka'),
(16, 'Ya', 'Adji');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah_variable`
--

CREATE TABLE `nasabah_variable` (
  `id_nasabah` int(11) NOT NULL,
  `id_variable` int(11) NOT NULL,
  `id_variable_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah_variable`
--

INSERT INTO `nasabah_variable` (`id_nasabah`, `id_variable`, `id_variable_value`) VALUES
(1, 1, 1),
(1, 2, 3),
(1, 3, 9),
(1, 4, 10),
(1, 5, 12),
(1, 6, 14),
(2, 1, 2),
(2, 2, 5),
(2, 3, 9),
(2, 4, 10),
(2, 5, 13),
(2, 6, 14),
(3, 1, 1),
(3, 2, 4),
(3, 3, 9),
(3, 4, 10),
(3, 5, 12),
(3, 6, 15),
(4, 1, 1),
(4, 2, 6),
(4, 3, 9),
(4, 4, 10),
(4, 5, 13),
(4, 6, 14),
(5, 1, 1),
(5, 2, 3),
(5, 3, 7),
(5, 4, 11),
(5, 5, 12),
(5, 6, 16),
(6, 1, 2),
(6, 2, 5),
(6, 3, 7),
(6, 4, 11),
(6, 5, 13),
(6, 6, 15),
(7, 1, 1),
(7, 2, 4),
(7, 3, 7),
(7, 4, 11),
(7, 5, 12),
(7, 6, 14),
(8, 1, 1),
(8, 2, 6),
(8, 3, 7),
(8, 4, 11),
(8, 5, 13),
(8, 6, 14),
(9, 1, 2),
(9, 2, 3),
(9, 3, 8),
(9, 4, 11),
(9, 5, 12),
(9, 6, 14),
(10, 1, 2),
(10, 2, 5),
(10, 3, 8),
(10, 4, 11),
(10, 5, 13),
(10, 6, 14),
(11, 1, 2),
(11, 2, 4),
(11, 3, 8),
(11, 4, 10),
(11, 5, 12),
(11, 6, 14),
(12, 1, 1),
(12, 2, 4),
(12, 3, 8),
(12, 4, 11),
(12, 5, 13),
(12, 6, 16),
(13, 1, 1),
(13, 2, 6),
(13, 3, 8),
(13, 4, 11),
(13, 5, 12),
(13, 6, 15),
(14, 1, 1),
(14, 2, 3),
(14, 3, 8),
(14, 4, 10),
(14, 5, 13),
(14, 6, 14),
(15, 1, 1),
(15, 2, 5),
(15, 3, 8),
(15, 4, 11),
(15, 5, 13),
(15, 6, 14),
(16, 1, 1),
(16, 2, 4),
(16, 3, 8),
(16, 4, 11),
(16, 5, 12),
(16, 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_c45`
--

CREATE TABLE `perhitungan_c45` (
  `id` int(10) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL,
  `jml_kasus_kelancaran` varchar(5) NOT NULL,
  `jml_kasus_tidak` varchar(5) NOT NULL,
  `jml_kasus_ya` varchar(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `inf_gain` varchar(10) NOT NULL,
  `inf_gain_temp` varchar(10) NOT NULL,
  `split_info` varchar(10) NOT NULL,
  `split_info_temp` varchar(10) NOT NULL,
  `gain_ratio` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perhitungan_c45`
--

INSERT INTO `perhitungan_c45` (`id`, `variabel`, `nilai_variabel`, `jml_kasus_kelancaran`, `jml_kasus_tidak`, `jml_kasus_ya`, `entropy`, `inf_gain`, `inf_gain_temp`, `split_info`, `split_info_temp`, `gain_ratio`) VALUES
(1, 'Total', 'Total', '3', '2', '1', '0.9183', '', '', '', '', '0'),
(2, 'pekerjaan', 'pns', '0', '0', '0', '0', '0.2516', '0', '0.9183', '', '0.274'),
(3, 'pekerjaan', 'pedagang', '2', '1', '1', '1', '0.2516', '-0.6666666', '0.9183', '-0.3899750', '0.274'),
(4, 'pekerjaan', 'swasta', '0', '0', '0', '0', '0.2516', '0', '0.9183', '', '0.274'),
(5, 'pekerjaan', 'buruh', '1', '1', '0', '0', '0.2516', '0', '0.9183', '-0.5283208', '0.274'),
(6, 'pinjaman', 'rendah', '0', '0', '0', '0', '0.2516', '0', '0.9183', '', '0.274'),
(7, 'pinjaman', 'sedang', '2', '1', '1', '1', '0.2516', '-0.6666666', '0.9183', '-0.3899750', '0.274'),
(8, 'pinjaman', 'tinggi', '1', '1', '0', '0', '0.2516', '0', '0.9183', '-0.5283208', '0.274'),
(9, 'status', 'menikah', '1', '1', '0', '0', '0.2516', '0', '0.9183', '-0.5283208', '0.274'),
(10, 'status', 'belum', '2', '1', '1', '1', '0.2516', '-0.6666666', '0.9183', '-0.3899750', '0.274'),
(11, 'status_rumah', 'pribadi', '3', '2', '1', '0.9183', '0', '-0.9183', '0', '0', '0'),
(12, 'status_rumah', 'sewa', '0', '0', '0', '0', '0', '0', '0', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pohon_keputusan`
--

CREATE TABLE `pohon_keputusan` (
  `id` int(5) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL,
  `id_parent` char(5) NOT NULL,
  `jml_kasus_tidak` varchar(5) NOT NULL,
  `jml_kasus_ya` varchar(5) NOT NULL,
  `kelancaran` varchar(50) NOT NULL,
  `diproses` varchar(10) NOT NULL,
  `kondisi_variabel` varchar(200) NOT NULL,
  `dynamic_variable` varchar(500) NOT NULL,
  `looping_kondisi` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pohon_keputusan`
--

INSERT INTO `pohon_keputusan` (`id`, `variabel`, `nilai_variabel`, `id_parent`, `jml_kasus_tidak`, `jml_kasus_ya`, `kelancaran`, `diproses`, `kondisi_variabel`, `dynamic_variable`, `looping_kondisi`) VALUES
(1, 'karakter', 'baik', '0', '4', '6', '?', 'Sudah', 'AND karakter = ~baik~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~baik~)', 'Belum'),
(2, 'karakter', 'cukup', '0', '2', '2', '', 'Sudah', 'AND karakter = ~cukup~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~cukup~)', 'Belum'),
(3, 'karakter', 'kurang_baik', '0', '2', '0', 'Tidak', 'Belum', 'AND karakter = ~kurang_baik~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~kurang_baik~)', 'Belum'),
(4, 'status', 'menikah', '1', '3', '2', '?', 'Sudah', 'AND karakter = ~baik~ AND status = ~menikah~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~baik~) OR ( v.variable_name = ~status~ AND vv.variable_value_name = ~menikah~)', 'Sudah'),
(5, 'status', 'belum', '1', '1', '4', 'Ya', 'Sudah', 'AND karakter = ~baik~ AND status = ~belum~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~baik~) OR ( v.variable_name = ~status~ AND vv.variable_value_name = ~belum~)', 'Sudah'),
(6, 'status_rumah', 'pribadi', '4', '0', '2', 'Ya', 'Belum', 'AND karakter = ~baik~ AND status = ~menikah~ AND status_rumah = ~pribadi~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~baik~) OR ( v.variable_name = ~status~ AND vv.variable_value_name = ~menikah~) OR ( v.variable_name = ~status_rumah~ AND vv.variable_value_name = ~pribadi~)', 'Sudah'),
(7, 'status_rumah', 'sewa', '4', '3', '0', 'Tidak', 'Belum', 'AND karakter = ~baik~ AND status = ~menikah~ AND status_rumah = ~sewa~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~baik~) OR ( v.variable_name = ~status~ AND vv.variable_value_name = ~menikah~) OR ( v.variable_name = ~status_rumah~ AND vv.variable_value_name = ~sewa~)', 'Sudah'),
(13, 'penghasilan', 'high', '2', '0', '1', 'Ya', 'Belum', 'AND karakter = ~cukup~ AND penghasilan = ~high~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~cukup~) OR ( v.variable_name = ~penghasilan~ AND vv.variable_value_name = ~high~)', 'Sudah'),
(12, 'penghasilan', 'low', '2', '2', '1', 'Tidak', 'Sudah', 'AND karakter = ~cukup~ AND penghasilan = ~low~', '(v.variable_name = ~karakter~ AND vv.variable_value_name = ~cukup~) OR ( v.variable_name = ~penghasilan~ AND vv.variable_value_name = ~low~)', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `rule_pohon_keputusan`
--

CREATE TABLE `rule_pohon_keputusan` (
  `id` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL,
  `rule` varchar(200) NOT NULL,
  `kelancaran` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule_pohon_keputusan`
--

INSERT INTO `rule_pohon_keputusan` (`id`, `id_parent`, `rule`, `kelancaran`) VALUES
(3, 0, 'karakter == baik AND status == menikah AND status_rumah == pribadi', 'Ya'),
(4, 0, 'karakter == baik AND status == menikah AND status_rumah == sewa', 'Tidak'),
(5, 0, 'karakter == baik AND status == belum', 'Ya'),
(6, 0, 'karakter == cukup', ''),
(7, 0, 'karakter == cukup AND penghasilan == high', 'Ya'),
(8, 0, 'karakter == cukup AND penghasilan == low', 'Tidak'),
(9, 0, 'karakter == kurang_baik', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `rule_prediksi`
--

CREATE TABLE `rule_prediksi` (
  `id` int(5) NOT NULL,
  `id_rule` int(5) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL,
  `kelancaran` varchar(50) NOT NULL,
  `cocok` varchar(50) NOT NULL,
  `pohon` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule_prediksi`
--

INSERT INTO `rule_prediksi` (`id`, `id_rule`, `variabel`, `nilai_variabel`, `kelancaran`, `cocok`, `pohon`) VALUES
(1, 3, 'karakter', 'baik', 'Ya', '', 'C45'),
(2, 3, 'status', 'menikah', 'Ya', '', 'C45'),
(3, 3, 'status_rumah', 'pribadi', 'Ya', '', 'C45'),
(4, 4, 'karakter', 'baik', 'Tidak', '', 'C45'),
(5, 4, 'status', 'menikah', 'Tidak', '', 'C45'),
(6, 4, 'status_rumah', 'sewa', 'Tidak', '', 'C45'),
(7, 5, 'karakter', 'baik', 'Ya', '', 'C45'),
(8, 5, 'status', 'belum', 'Ya', '', 'C45'),
(9, 6, 'karakter', 'cukup', '', '', 'C45'),
(10, 7, 'karakter', 'cukup', 'Ya', '', 'C45'),
(11, 7, 'penghasilan', 'high', 'Ya', '', 'C45'),
(12, 8, 'karakter', 'cukup', 'Tidak', '', 'C45'),
(13, 8, 'penghasilan', 'low', 'Tidak', '', 'C45'),
(14, 9, 'karakter', 'kurang_baik', 'Tidak', '', 'C45');

-- --------------------------------------------------------

--
-- Table structure for table `rule_variabel`
--

CREATE TABLE `rule_variabel` (
  `id` int(5) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule_variabel`
--

INSERT INTO `rule_variabel` (`id`, `variabel`, `nilai_variabel`) VALUES
(1, 'kelancaran', 'kelancaran'),
(4, 'pekerjaan', 'pns'),
(5, 'pekerjaan', 'pedagang'),
(6, 'pekerjaan', 'swasta'),
(7, 'pekerjaan', 'buruh'),
(8, 'pinjaman', 'rendah'),
(9, 'pinjaman', 'sedang'),
(10, 'pinjaman', 'tinggi'),
(11, 'status', 'menikah'),
(12, 'status', 'belum'),
(13, 'status_rumah', 'pribadi'),
(14, 'status_rumah', 'sewa');

-- --------------------------------------------------------

--
-- Table structure for table `variable`
--

CREATE TABLE `variable` (
  `id_variable` int(11) NOT NULL,
  `variable_name` varchar(50) NOT NULL,
  `variable_alias` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variable`
--

INSERT INTO `variable` (`id_variable`, `variable_name`, `variable_alias`) VALUES
(1, 'penghasilan', 'Penghasilan'),
(2, 'pekerjaan', 'Pekerjaan'),
(3, 'pinjaman', 'Pinjaman'),
(4, 'status', 'Status Perkawinan'),
(5, 'status_rumah', 'Status Rumah'),
(6, 'karakter', 'Karakter');

-- --------------------------------------------------------

--
-- Table structure for table `variable_value`
--

CREATE TABLE `variable_value` (
  `id_variable_value` int(11) NOT NULL,
  `id_variable` int(11) NOT NULL,
  `variable_value_transformation` varchar(50) NOT NULL,
  `variable_value_name` varchar(50) NOT NULL,
  `variable_value_alias` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variable_value`
--

INSERT INTO `variable_value` (`id_variable_value`, `id_variable`, `variable_value_transformation`, `variable_value_name`, `variable_value_alias`) VALUES
(1, 1, '<2000000', 'low', 'Low'),
(2, 1, '>=2000000', 'high', 'High'),
(3, 2, 'Pegawai Negeri Sipil', 'pns', 'Pegawai Negeri Sipil'),
(4, 2, 'Pedagang', 'pedagang', 'Pedagang'),
(5, 2, 'Pegawai Swasta', 'swasta', 'Pegawai Swasta'),
(6, 2, 'Buruh', 'buruh', 'Buruh'),
(7, 3, '<1000000', 'rendah', 'Rendah'),
(8, 3, '1000000-5000000', 'sedang', 'Sedang'),
(9, 3, '>5000000', 'tinggi', 'Tinggi'),
(10, 4, 'Menikah', 'menikah', 'Menikah'),
(11, 4, 'Belum Menikah', 'belum', 'Belum Menikah'),
(12, 5, 'Milik Pribadi', 'pribadi', 'Milik Pribadi'),
(13, 5, 'Sewa', 'sewa', 'Sewa'),
(14, 6, 'Baik', 'baik', 'Baik'),
(15, 6, 'Cukup', 'cukup', 'Cukup'),
(16, 6, 'Kurang Baik', 'kurang_baik', 'Kurang Baik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_prediksi`
--
ALTER TABLE `data_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_variabel_prediksi`
--
ALTER TABLE `data_variabel_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iterasi_c45`
--
ALTER TABLE `iterasi_c45`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`),
  ADD KEY `id_nasabah` (`id_nasabah`);

--
-- Indexes for table `nasabah_variable`
--
ALTER TABLE `nasabah_variable`
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_variable` (`id_variable`),
  ADD KEY `id_variable_value` (`id_variable_value`);

--
-- Indexes for table `perhitungan_c45`
--
ALTER TABLE `perhitungan_c45`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pohon_keputusan`
--
ALTER TABLE `pohon_keputusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule_pohon_keputusan`
--
ALTER TABLE `rule_pohon_keputusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule_prediksi`
--
ALTER TABLE `rule_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule_variabel`
--
ALTER TABLE `rule_variabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variable`
--
ALTER TABLE `variable`
  ADD PRIMARY KEY (`id_variable`);

--
-- Indexes for table `variable_value`
--
ALTER TABLE `variable_value`
  ADD PRIMARY KEY (`id_variable_value`),
  ADD KEY `id_variable` (`id_variable`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `data_prediksi`
--
ALTER TABLE `data_prediksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `data_variabel_prediksi`
--
ALTER TABLE `data_variabel_prediksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `iterasi_c45`
--
ALTER TABLE `iterasi_c45`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perhitungan_c45`
--
ALTER TABLE `perhitungan_c45`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pohon_keputusan`
--
ALTER TABLE `pohon_keputusan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rule_pohon_keputusan`
--
ALTER TABLE `rule_pohon_keputusan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rule_prediksi`
--
ALTER TABLE `rule_prediksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rule_variabel`
--
ALTER TABLE `rule_variabel`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `nasabah_variable`
--
ALTER TABLE `nasabah_variable`
  ADD CONSTRAINT `nasabah_variable_ibfk_1` FOREIGN KEY (`id_variable`) REFERENCES `variable` (`id_variable`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nasabah_variable_ibfk_2` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nasabah_variable_ibfk_3` FOREIGN KEY (`id_variable_value`) REFERENCES `variable_value` (`id_variable_value`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `variable_value`
--
ALTER TABLE `variable_value`
  ADD CONSTRAINT `variable_value_ibfk_1` FOREIGN KEY (`id_variable`) REFERENCES `variable` (`id_variable`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
