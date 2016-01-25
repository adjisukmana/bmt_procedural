-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2016 at 09:49 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

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

CREATE TABLE IF NOT EXISTS `data_anggota` (
  `id` int(10) NOT NULL,
  `no_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `penghasilan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_rumah` varchar(50) NOT NULL,
  `pinjaman` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kelancaran` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`id`, `no_anggota`, `nama_anggota`, `penghasilan`, `status`, `status_rumah`, `pinjaman`, `pekerjaan`, `kelancaran`) VALUES
(1, '1', 'Adji', 'low', 'menikah', 'pribadi', 'tinggi', 'pns', 'Ya'),
(2, '2', 'Sukmana', 'high', 'menikah', 'sewa', 'tinggi', 'swasta', 'Tidak'),
(3, '3', 'Eka', 'low', 'menikah', 'pribadi', 'tinggi', 'pedagang', 'Tidak'),
(4, '4', 'Adji', 'low', 'menikah', 'sewa', 'tinggi', 'buruh', 'Tidak'),
(5, '5', 'Sukmana', 'low', 'belum', 'pribadi', 'rendah', 'pns', 'Tidak'),
(6, '6', 'Eka', 'high', 'belum', 'sewa', 'rendah', 'swasta', 'Ya'),
(7, '7', 'Adji', 'low', 'belum', 'pribadi', 'rendah', 'pedagang', 'Ya'),
(8, '8', 'Sukmana', 'low', 'belum', 'sewa', 'rendah', 'buruh', 'Ya'),
(9, '9', 'Eka', 'high', 'belum', 'pribadi', 'sedang', 'pns', 'Tidak'),
(10, '10', 'Adji', 'high', 'belum', 'sewa', 'sedang', 'swasta', 'Ya'),
(11, '11', 'Sukmana', 'high', 'menikah', 'pribadi', 'sedang', 'pedagang', 'Ya'),
(12, '12', 'Eka', 'low', 'belum', 'sewa', 'sedang', 'pedagang', 'Tidak'),
(13, '13', 'Adji', 'low', 'belum', 'pribadi', 'sedang', 'buruh', 'Tidak'),
(14, '14', 'Sukmana', 'low', 'menikah', 'sewa', 'sedang', 'pns', 'Tidak'),
(15, '15', 'Eka', 'low', 'belum', 'sewa', 'sedang', 'swasta', 'Ya'),
(16, '16', 'Adji', 'low', 'belum', 'pribadi', 'sedang', 'pedagang', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `data_prediksi`
--

CREATE TABLE IF NOT EXISTS `data_prediksi` (
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `data_variabel_prediksi` (
  `id` int(5) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `iterasi_c45` (
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
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iterasi_c45`
--

INSERT INTO `iterasi_c45` (`id`, `iterasi`, `atribut_gain_ratio_max`, `atribut`, `nilai_atribut`, `jml_kasus_total`, `jml_laris`, `jml_tdk_laris`, `entropy`, `inf_gain`, `split_info`, `gain_ratio`) VALUES
(1, '1', 'pinjaman', 'Total', 'Total', '16', '8', '8', '1', '', '', '0'),
(2, '2', 'pinjaman', 'penghasilan', 'low', '11', '5', '6', '0.994', '0.0132', '0.896', '0.0147'),
(3, '3', 'pinjaman', 'penghasilan', 'high', '5', '3', '2', '0.971', '0.0132', '0.896', '0.0147'),
(4, '4', 'pinjaman', 'status', 'menikah', '6', '2', '4', '0.9183', '0.0488', '0.9544', '0.0511'),
(5, '5', 'pinjaman', 'status', 'belum', '10', '6', '4', '0.971', '0.0488', '0.9544', '0.0511'),
(6, '6', 'pinjaman', 'status_rumah', 'pribadi', '8', '4', '4', '1', '0', '1', '0'),
(7, '7', 'pinjaman', 'status_rumah', 'sewa', '8', '4', '4', '1', '0', '1', '0'),
(8, '8', 'pinjaman', 'pinjaman', 'tinggi', '4', '1', '3', '0.8113', '0.0943', '1.5', '0.0629'),
(9, '9', 'pinjaman', 'pinjaman', 'rendah', '4', '3', '1', '0.8113', '0.0943', '1.5', '0.0629'),
(10, '10', 'pinjaman', 'pinjaman', 'sedang', '8', '4', '4', '1', '0.0943', '1.5', '0.0629'),
(11, '11', 'pinjaman', 'pekerjaan', 'pns', '4', '1', '3', '0.8113', '0.1187', '1.9772', '0.06'),
(12, '12', 'pinjaman', 'pekerjaan', 'swasta', '4', '3', '1', '0.8113', '0.1187', '1.9772', '0.06'),
(13, '13', 'pinjaman', 'pekerjaan', 'pedagang', '5', '3', '2', '0.971', '0.1187', '1.9772', '0.06'),
(14, '14', 'pinjaman', 'pekerjaan', 'buruh', '3', '1', '2', '0.9183', '0.1187', '1.9772', '0.06'),
(15, '1', 'pekerjaan', 'Total', 'Total', '4', '1', '3', '0.8113', '', '', '0'),
(16, '2', 'pekerjaan', 'penghasilan', 'low', '3', '1', '2', '0.9183', '0.1226', '0.8113', '0.1511'),
(17, '3', 'pekerjaan', 'penghasilan', 'high', '1', '0', '1', '0', '0.1226', '0.8113', '0.1511'),
(18, '4', 'pekerjaan', 'status', 'menikah', '4', '1', '3', '0.8113', '0', '0', '0'),
(19, '5', 'pekerjaan', 'status', 'belum', '0', '0', '0', '0', '0', '0', '0'),
(20, '6', 'pekerjaan', 'status_rumah', 'pribadi', '2', '1', '1', '1', '0.3113', '1', '0.3113'),
(21, '7', 'pekerjaan', 'status_rumah', 'sewa', '2', '0', '2', '0', '0.3113', '1', '0.3113'),
(22, '8', 'pekerjaan', 'pekerjaan', 'pns', '1', '1', '0', '0', '0.8113', '2', '0.4057'),
(23, '9', 'pekerjaan', 'pekerjaan', 'swasta', '1', '0', '1', '0', '0.8113', '2', '0.4057'),
(24, '10', 'pekerjaan', 'pekerjaan', 'pedagang', '1', '0', '1', '0', '0.8113', '2', '0.4057'),
(25, '11', 'pekerjaan', 'pekerjaan', 'buruh', '1', '0', '1', '0', '0.8113', '2', '0.4057'),
(26, '1', 'status_rumah', 'Total', 'Total', '4', '3', '1', '0.8113', '', '', '0'),
(27, '2', 'status_rumah', 'penghasilan', 'low', '3', '2', '1', '0.9183', '0.1226', '0.8113', '0.1511'),
(28, '3', 'status_rumah', 'penghasilan', 'high', '1', '1', '0', '0', '0.1226', '0.8113', '0.1511'),
(29, '4', 'status_rumah', 'status', 'menikah', '0', '0', '0', '0', '0', '0', '0'),
(30, '5', 'status_rumah', 'status_rumah', 'pribadi', '2', '1', '1', '1', '0.8113', '0.5', '1.6226'),
(31, '6', 'status_rumah', 'status', 'belum', '4', '3', '1', '0.8113', '0', '0', '0'),
(32, '7', 'status_rumah', 'status_rumah', 'sewa', '2', '2', '0', '0', '0.8113', '0.5', '1.6226'),
(33, '8', 'status_rumah', 'pekerjaan', 'pns', '1', '0', '1', '0', '0.8113', '2', '0.4057'),
(34, '9', 'status_rumah', 'pekerjaan', 'swasta', '1', '1', '0', '0', '0.8113', '2', '0.4057'),
(35, '10', 'status_rumah', 'pekerjaan', 'pedagang', '1', '1', '0', '0', '0.8113', '2', '0.4057'),
(36, '11', 'status_rumah', 'pekerjaan', 'buruh', '1', '1', '0', '0', '0.8113', '2', '0.4057'),
(37, '1', 'pekerjaan', 'Total', 'Total', '8', '4', '4', '1', '', '', '0'),
(38, '2', 'pekerjaan', 'penghasilan', 'low', '5', '2', '3', '0.971', '0.0488', '0.9544', '0.0511'),
(39, '3', 'pekerjaan', 'penghasilan', 'high', '3', '2', '1', '0.9183', '0.0488', '0.9544', '0.0511'),
(40, '4', 'pekerjaan', 'status', 'menikah', '2', '1', '1', '1', '0', '0.8113', '0'),
(41, '5', 'pekerjaan', 'status', 'belum', '6', '3', '3', '1', '0', '0.8113', '0'),
(42, '6', 'pekerjaan', 'status_rumah', 'pribadi', '4', '2', '2', '1', '0', '1', '0'),
(43, '7', 'pekerjaan', 'status_rumah', 'sewa', '4', '2', '2', '1', '0', '1', '0'),
(44, '8', 'pekerjaan', 'pekerjaan', 'pns', '2', '0', '2', '0', '0.6556', '1.9056', '0.344'),
(45, '9', 'pekerjaan', 'pekerjaan', 'swasta', '2', '2', '0', '0', '0.6556', '1.9056', '0.344'),
(46, '10', 'pekerjaan', 'pekerjaan', 'pedagang', '3', '2', '1', '0.9183', '0.6556', '1.9056', '0.344'),
(47, '11', 'pekerjaan', 'pekerjaan', 'buruh', '1', '0', '1', '0', '0.6556', '1.9056', '0.344'),
(48, '1', 'status_rumah', 'Total', 'Total', '3', '2', '1', '0.9183', '', '', '0'),
(49, '2', 'status_rumah', 'penghasilan', 'low', '2', '1', '1', '1', '0.2516', '0.9183', '0.274'),
(50, '3', 'status_rumah', 'penghasilan', 'high', '1', '1', '0', '0', '0.2516', '0.9183', '0.274'),
(51, '4', 'status_rumah', 'status', 'menikah', '1', '1', '0', '0', '0.2516', '0.9183', '0.274'),
(52, '5', 'status_rumah', 'status', 'belum', '2', '1', '1', '1', '0.2516', '0.9183', '0.274'),
(53, '6', 'status_rumah', 'status_rumah', 'pribadi', '2', '2', '0', '0', '0.9183', '0.9183', '1'),
(54, '7', 'status_rumah', 'status_rumah', 'sewa', '1', '0', '1', '0', '0.9183', '0.9183', '1');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `username`, `password`) VALUES
(3, 'adji', '35ca873f3d7296b2d3e3043fc5d6a70a');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_c45`
--

CREATE TABLE IF NOT EXISTS `perhitungan_c45` (
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perhitungan_c45`
--

INSERT INTO `perhitungan_c45` (`id`, `variabel`, `nilai_variabel`, `jml_kasus_kelancaran`, `jml_kasus_tidak`, `jml_kasus_ya`, `entropy`, `inf_gain`, `inf_gain_temp`, `split_info`, `split_info_temp`, `gain_ratio`) VALUES
(1, 'Total', 'Total', '3', '1', '2', '0.9183', '', '', '', '', '0'),
(2, 'penghasilan', 'low', '2', '1', '1', '1', '0.2516', '-0.6666666', '0.9183', '-0.3899750', '0.274'),
(3, 'penghasilan', 'high', '1', '0', '1', '0', '0.2516', '0', '0.9183', '-0.5283208', '0.274'),
(4, 'status', 'menikah', '1', '0', '1', '0', '0.2516', '0', '0.9183', '-0.5283208', '0.274'),
(5, 'status', 'belum', '2', '1', '1', '1', '0.2516', '-0.6666666', '0.9183', '-0.3899750', '0.274'),
(6, 'status_rumah', 'pribadi', '2', '0', '2', '0', '0.9183', '0', '0.9183', '-0.3899750', '1'),
(7, 'status_rumah', 'sewa', '1', '1', '0', '0', '0.9183', '0', '0.9183', '-0.5283208', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pohon_keputusan`
--

CREATE TABLE IF NOT EXISTS `pohon_keputusan` (
  `id` int(5) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL,
  `id_parent` char(5) NOT NULL,
  `jml_kasus_tidak` varchar(5) NOT NULL,
  `jml_kasus_ya` varchar(5) NOT NULL,
  `kelancaran` varchar(50) NOT NULL,
  `diproses` varchar(10) NOT NULL,
  `kondisi_variabel` varchar(200) NOT NULL,
  `looping_kondisi` varchar(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pohon_keputusan`
--

INSERT INTO `pohon_keputusan` (`id`, `variabel`, `nilai_variabel`, `id_parent`, `jml_kasus_tidak`, `jml_kasus_ya`, `kelancaran`, `diproses`, `kondisi_variabel`, `looping_kondisi`) VALUES
(1, 'pinjaman', 'tinggi', '0', '3', '1', 'Tidak', 'Sudah', 'AND pinjaman = ~tinggi~', 'Belum'),
(2, 'pinjaman', 'rendah', '0', '1', '3', 'Ya', 'Sudah', 'AND pinjaman = ~rendah~', 'Belum'),
(3, 'pinjaman', 'sedang', '0', '4', '4', '', 'Sudah', 'AND pinjaman = ~sedang~', 'Belum'),
(11, 'pekerjaan', 'swasta', '3', '0', '2', 'Ya', 'Belum', 'AND pinjaman = ~sedang~ AND pekerjaan = ~swasta~', 'Sudah'),
(10, 'pekerjaan', 'pns', '3', '2', '0', 'Tidak', 'Belum', 'AND pinjaman = ~sedang~ AND pekerjaan = ~pns~', 'Sudah'),
(12, 'pekerjaan', 'pedagang', '3', '1', '2', '?', 'Sudah', 'AND pinjaman = ~sedang~ AND pekerjaan = ~pedagang~', 'Sudah'),
(13, 'pekerjaan', 'buruh', '3', '1', '0', 'Tidak', 'Belum', 'AND pinjaman = ~sedang~ AND pekerjaan = ~buruh~', 'Sudah'),
(14, 'status_rumah', 'pribadi', '12', '0', '2', 'Ya', 'Belum', 'AND pinjaman = ~sedang~ AND pekerjaan = ~pedagang~ AND status_rumah = ~pribadi~', 'Sudah'),
(15, 'status_rumah', 'sewa', '12', '1', '0', 'Tidak', 'Belum', 'AND pinjaman = ~sedang~ AND pekerjaan = ~pedagang~ AND status_rumah = ~sewa~', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `rule_pohon_keputusan`
--

CREATE TABLE IF NOT EXISTS `rule_pohon_keputusan` (
  `id` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL,
  `rule` varchar(200) NOT NULL,
  `kelancaran` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule_pohon_keputusan`
--

INSERT INTO `rule_pohon_keputusan` (`id`, `id_parent`, `rule`, `kelancaran`) VALUES
(1, 0, 'pinjaman == tinggi', 'Tidak'),
(2, 0, 'pinjaman == rendah', 'Ya'),
(3, 0, 'pinjaman == sedang', ''),
(4, 0, 'pinjaman == sedang AND pekerjaan == swasta', 'Ya'),
(5, 0, 'pinjaman == sedang AND pekerjaan == pns', 'Tidak'),
(7, 0, 'pinjaman == sedang AND pekerjaan == pedagang AND status_rumah == pribadi', 'Ya'),
(8, 0, 'pinjaman == sedang AND pekerjaan == pedagang AND status_rumah == sewa', 'Tidak'),
(9, 0, 'pinjaman == sedang AND pekerjaan == buruh', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `rule_prediksi`
--

CREATE TABLE IF NOT EXISTS `rule_prediksi` (
  `id` int(5) NOT NULL,
  `id_rule` int(5) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL,
  `kelancaran` varchar(50) NOT NULL,
  `cocok` varchar(50) NOT NULL,
  `pohon` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule_prediksi`
--

INSERT INTO `rule_prediksi` (`id`, `id_rule`, `variabel`, `nilai_variabel`, `kelancaran`, `cocok`, `pohon`) VALUES
(1, 1, 'pinjaman', 'tinggi', 'Tidak', '', 'C45'),
(2, 2, 'pinjaman', 'rendah', 'Ya', '', 'C45'),
(3, 3, 'pinjaman', 'sedang', '', '', 'C45'),
(4, 4, 'pinjaman', 'sedang', 'Ya', '', 'C45'),
(5, 4, 'pekerjaan', 'swasta', 'Ya', '', 'C45'),
(6, 5, 'pinjaman', 'sedang', 'Tidak', '', 'C45'),
(7, 5, 'pekerjaan', 'pns', 'Tidak', '', 'C45'),
(8, 7, 'pinjaman', 'sedang', 'Ya', '', 'C45'),
(9, 7, 'pekerjaan', 'pedagang', 'Ya', '', 'C45'),
(10, 7, 'status_rumah', 'pribadi', 'Ya', '', 'C45'),
(11, 8, 'pinjaman', 'sedang', 'Tidak', '', 'C45'),
(12, 8, 'pekerjaan', 'pedagang', 'Tidak', '', 'C45'),
(13, 8, 'status_rumah', 'sewa', 'Tidak', '', 'C45'),
(14, 9, 'pinjaman', 'sedang', 'Tidak', '', 'C45'),
(15, 9, 'pekerjaan', 'buruh', 'Tidak', '', 'C45');

-- --------------------------------------------------------

--
-- Table structure for table `variabel`
--

CREATE TABLE IF NOT EXISTS `variabel` (
  `id` int(5) NOT NULL,
  `variabel` varchar(50) NOT NULL,
  `nilai_variabel` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variabel`
--

INSERT INTO `variabel` (`id`, `variabel`, `nilai_variabel`) VALUES
(1, 'kelancaran', 'kelancaran'),
(2, 'penghasilan', 'low'),
(3, 'penghasilan', 'high'),
(4, 'status', 'menikah'),
(5, 'status', 'belum'),
(6, 'status_rumah', 'pribadi'),
(7, 'status_rumah', 'sewa');

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `data_prediksi`
--
ALTER TABLE `data_prediksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `data_variabel_prediksi`
--
ALTER TABLE `data_variabel_prediksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `iterasi_c45`
--
ALTER TABLE `iterasi_c45`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perhitungan_c45`
--
ALTER TABLE `perhitungan_c45`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pohon_keputusan`
--
ALTER TABLE `pohon_keputusan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rule_pohon_keputusan`
--
ALTER TABLE `rule_pohon_keputusan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rule_prediksi`
--
ALTER TABLE `rule_prediksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
