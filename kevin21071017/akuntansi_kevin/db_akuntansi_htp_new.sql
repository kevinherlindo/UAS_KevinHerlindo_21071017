-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 09:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akuntansi_htp_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `djurnal`
--

CREATE TABLE `djurnal` (
  `TransaksiID` int(15) NOT NULL,
  `JurnalKode` varchar(15) NOT NULL,
  `NomorPerkiraan` varchar(10) NOT NULL,
  `TanggalTransaksi` varchar(12) NOT NULL,
  `bulan_transaksi` varchar(20) NOT NULL,
  `jenis_transaksi` varchar(15) NOT NULL,
  `Keterangan` text NOT NULL,
  `debet` bigint(20) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `tanggal_posting` varchar(12) NOT NULL,
  `keterangan_posting` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `djurnal`
--

INSERT INTO `djurnal` (`TransaksiID`, `JurnalKode`, `NomorPerkiraan`, `TanggalTransaksi`, `bulan_transaksi`, `jenis_transaksi`, `Keterangan`, `debet`, `kredit`, `tanggal_posting`, `keterangan_posting`, `id_user`) VALUES
(8, 'JU/1', '1111', '2020-04-28', '', 'Jurnal Umum', 'Ivestasi Awal', 50000000, 0, '', '', ''),
(9, 'JU/1', '3', '2020-04-28', '', 'Jurnal Umum', 'Ivestasi Awal', 0, 50000000, '', '', ''),
(10, 'JU/2', '1116', '2020-04-28', '', 'Jurnal Umum', 'Pembelian Perlengkapan', 350000, 0, '', '', ''),
(11, 'JU/2', '1111', '2020-04-28', '', 'Jurnal Umum', 'Pembelian Perlengkapan', 0, 350000, '', '', ''),
(12, 'JU/3', '1316', '2020-04-28', '', 'Jurnal Umum', 'Pembelian Peralatan', 450000, 0, '', '', ''),
(13, 'JU/3', '1111', '2020-04-28', '', 'Jurnal Umum', 'Pembelian Peralatan', 0, 450000, '', '', ''),
(15, 'JU/4', '1314', '2020-04-28', '', 'Jurnal Umum', 'Pembelian Kendaraan', 12500000, 0, '', '', ''),
(16, 'JU/4', '1111', '2020-04-28', '', 'Jurnal Umum', 'Pembelian Kendaraan', 0, 12500000, '', '', ''),
(17, 'JU/5', '1111', '2020-04-28', '', 'Jurnal Umum', 'Pendapatan Jasa', 3500000, 0, '', '', ''),
(18, 'JU/5', '41', '2020-04-28', '', 'Jurnal Umum', 'Pendapatan Jasa', 0, 3500000, '', '', ''),
(19, 'JU/6', '1316', '2020-04-28', '', 'Jurnal Umum', 'Pembelian Peralatan ', 370000, 0, '', '', ''),
(21, 'JU/6', '1111', '2020-04-28', '', 'Jurnal Umum', 'Pembelian Peralatan', 0, 370000, '', '', ''),
(22, 'JU/7', '5218', '2020-04-28', '', 'Jurnal Umum', 'Pembayaran Listrik', 930000, 0, '', '', ''),
(23, 'JU/7', '1111', '2020-04-28', '', 'Jurnal Umum', 'Pembayaran Listrik', 0, 930000, '', '', ''),
(24, 'JU/8', '5211', '2020-04-28', '', 'Jurnal Umum', 'Dibayar Gaji', 2800000, 0, '', '', ''),
(25, 'JU/8', '1111', '2020-04-28', '', 'Jurnal Umum', 'Dibayar Gaji', 0, 2800000, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hjurnal`
--

CREATE TABLE `hjurnal` (
  `NomorJurnal` int(15) NOT NULL,
  `JurnalKode` varchar(15) NOT NULL,
  `TanggalSelesai` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hjurnal`
--

INSERT INTO `hjurnal` (`NomorJurnal`, `JurnalKode`, `TanggalSelesai`) VALUES
(1, 'JU/1', '2020-04-28'),
(2, 'JU/2', '2020-04-28'),
(3, 'JU/3', '2020-04-28'),
(4, 'JU/4', '2020-04-28'),
(5, 'JU/5', '2020-04-28'),
(6, 'JU/6', '2020-04-28'),
(7, 'JU/7', '2020-04-28'),
(8, 'JU/8', '2020-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `Kelompok` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`Kelompok`) VALUES
('Utang'),
('Modal'),
('Pendapatan'),
('Beban');

-- --------------------------------------------------------

--
-- Table structure for table `perkiraan`
--

CREATE TABLE `perkiraan` (
  `PerkiraanID` int(11) NOT NULL,
  `NomorPerkiraan` varchar(6) NOT NULL,
  `NamaPerkiraan` varchar(30) NOT NULL,
  `tipe` varchar(7) NOT NULL,
  `induk` varchar(5) NOT NULL,
  `level` int(6) DEFAULT NULL,
  `Kelompok` varchar(10) NOT NULL,
  `normal` varchar(10) NOT NULL,
  `awal_debet` bigint(20) DEFAULT NULL,
  `awal_kredit` bigint(20) DEFAULT NULL,
  `mut_debet` bigint(20) NOT NULL,
  `mut_kredit` bigint(20) NOT NULL,
  `sisa_debet` bigint(20) NOT NULL,
  `sisa_kredit` bigint(20) NOT NULL,
  `rl_debet` bigint(20) NOT NULL,
  `rl_kredit` bigint(20) NOT NULL,
  `nrc_debet` bigint(20) NOT NULL,
  `nrc_kredit` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perkiraan`
--

INSERT INTO `perkiraan` (`PerkiraanID`, `NomorPerkiraan`, `NamaPerkiraan`, `tipe`, `induk`, `level`, `Kelompok`, `normal`, `awal_debet`, `awal_kredit`, `mut_debet`, `mut_kredit`, `sisa_debet`, `sisa_kredit`, `rl_debet`, `rl_kredit`, `nrc_debet`, `nrc_kredit`) VALUES
(24, '1', 'Aktiva', 'general', '', 1, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, '11', 'Aktiva Lancar', 'general', '1', 2, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, '1111', 'Kas', 'detail', '11', 3, 'aktiva', 'debet', 258713900, 0, 0, 0, 0, 0, 0, 0, 258713900, 0),
(27, '1112', 'Bank', 'detail', '11', 3, 'aktiva', 'debet', 8697460913, 0, 0, 0, 0, 0, 0, 0, 8697460913, 0),
(28, '1113', 'Deposito', 'detail', '11', 3, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, '1114', 'Sikodit', 'detail', '11', 3, 'aktiva', 'debet', 55124575, 0, 0, 0, 0, 0, 0, 0, 55124575, 0),
(30, '1115', 'Piutang Anggota', 'detail', '11', 3, 'aktiva', 'debet', 37945250550, 0, 0, 0, 0, 0, 0, 0, 37945250550, 0),
(31, '1116', 'Perlengkapan', 'detail', '11', 3, 'aktiva', 'debet', 128935350, 0, 0, 0, 0, 0, 0, 0, 128935350, 0),
(32, '1117', 'Biaya Dibayar Dimuka', 'detail', '11', 3, 'aktiva', 'debet', 85258600, 0, 0, 0, 0, 0, 0, 0, 85258600, 0),
(33, '1118', 'Piutang KP Jeruju', 'detail', '11', 3, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, '1119', 'Piutang KP Rasau', 'detail', '11', 3, 'aktiva', 'debet', 3701381284, 0, 0, 0, 0, 0, 0, 0, 3701381284, 0),
(35, '1120', 'Piutang KP Tanjung Hulu', 'detail', '11', 3, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, '1121', 'Piutang KP Kotabaru', 'detail', '11', 3, 'aktiva', 'debet', 539947706, 0, 0, 0, 0, 0, 0, 0, 539947706, 0),
(37, '1122', 'Piutang KP Sungai Raya', 'detail', '11', 3, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, '1123', 'Piutang KP Anjongan', 'detail', '11', 3, 'aktiva', 'debet', 1506607906, 0, 0, 0, 0, 0, 0, 0, 1506607906, 0),
(39, '1124', 'Piutang KP Pakumbang', 'detail', '11', 3, 'aktiva', 'debet', 7779511671, 0, 0, 0, 0, 0, 0, 0, 7779511671, 0),
(40, '1125', 'Piutang KP Simpang Tiga', 'detail', '11', 3, 'aktiva', 'debet', 4821995978, 0, 0, 0, 0, 0, 0, 0, 4821995978, 0),
(41, '12', 'Penyertaan & Investasi', 'general', '1', 2, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, '1211', 'Saham SPD', 'detail', '12', 3, 'aktiva', 'debet', 449950000, 0, 0, 0, 0, 0, 0, 0, 449950000, 0),
(43, '1212', 'Simpanan Cadangan', 'detail', '12', 3, 'aktiva', 'debet', 52693650, 0, 0, 0, 0, 0, 0, 0, 52693650, 0),
(44, '1213', 'Saham Jalinan', 'detail', '12', 3, 'aktiva', 'debet', 177880000, 0, 0, 0, 0, 0, 0, 0, 177880000, 0),
(45, '1214', 'Tabungan Tahapan', 'detail', '12', 3, 'aktiva', 'debet', 100000000, 0, 0, 0, 0, 0, 0, 0, 100000000, 0),
(46, '13', 'Harta Tetap', 'general', '1', 2, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, '1311', 'Tanah', 'detail', '13', 3, 'aktiva', 'debet', 400000000, 0, 0, 0, 0, 0, 0, 0, 400000000, 0),
(48, '1312', 'Gedung', 'detail', '13', 3, 'aktiva', 'debet', 1232711825, 0, 0, 0, 0, 0, 0, 0, 1232711825, 0),
(49, '1313', 'AK Peny Gedung', 'detail', '13', 3, 'aktiva', 'kredit', 0, 195000000, 0, 0, 0, 0, 0, 0, 0, 195000000),
(50, '1314', 'Kendaraan', 'detail', '13', 3, 'aktiva', 'debet', 378700000, 0, 0, 0, 0, 0, 0, 0, 378700000, 0),
(51, '1315', 'AK Peny Kendaraan', 'detail', '13', 3, 'aktiva', 'kredit', 0, 165554500, 0, 0, 0, 0, 0, 0, 0, 165554500),
(52, '1316', 'Peralatan', 'detail', '13', 3, 'aktiva', 'debet', 323268325, 0, 0, 0, 0, 0, 0, 0, 323268325, 0),
(53, '1317', 'AK Peny Peralatan', 'detail', '13', 3, 'aktiva', 'kredit', 0, 194455150, 0, 0, 0, 0, 0, 0, 0, 194455150),
(54, '1318', 'Aktiva Tetap Lain-lain', 'detail', '13', 3, 'aktiva', 'debet', 357149150, 0, 0, 0, 0, 0, 0, 0, 357149150, 0),
(55, '1319', 'AK Peny Tetap Lain-lain', 'detail', '13', 3, 'aktiva', 'kredit', 0, 187397450, 0, 0, 0, 0, 0, 0, 0, 187397450),
(56, '2', 'Hutang', 'general', '', 1, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, '21', 'Hutang Lancar', 'general', '2', 2, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, '2111', 'Hutang SPD', 'detail', '21', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, '2112', 'Taken', 'detail', '21', 3, 'kewajiban', 'kredit', 0, 6182975050, 0, 0, 0, 0, 0, 0, 0, 6182975050),
(60, '2113', 'Sijaka', 'detail', '21', 3, 'kewajiban', 'kredit', 0, 628600000, 0, 0, 0, 0, 0, 0, 0, 628600000),
(61, '22', 'Hutang Jangka Panjang', 'general', '2', 2, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, '2211', 'Tulus', 'detail', '22', 3, 'kewajiban', 'kredit', 0, 1010858200, 0, 0, 0, 0, 0, 0, 0, 1010858200),
(63, '2212', 'Setia', 'detail', '22', 3, 'kewajiban', 'kredit', 0, 3832911725, 0, 0, 0, 0, 0, 0, 0, 3832911725),
(64, '2213', 'Simpanan', 'detail', '22', 3, 'kewajiban', 'kredit', 0, 39667563200, 0, 0, 0, 0, 0, 0, 0, 39667563200),
(65, '2214', 'Tawa', 'detail', '22', 3, 'kewajiban', 'kredit', 0, 232803950, 0, 0, 0, 0, 0, 0, 0, 232803950),
(66, '23', 'Hutang Tak Berbunga', 'general', '2', 2, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, '2311', 'Solkes', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 101851825, 0, 0, 0, 0, 0, 0, 0, 101851825),
(68, '2312', 'Solduka', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 214615000, 0, 0, 0, 0, 0, 0, 0, 214615000),
(69, '2313', 'Bunga Diterima Dimuka', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 3960000, 0, 0, 0, 0, 0, 0, 0, 3960000),
(70, '2314', 'Pri Sejati', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 21931000, 0, 0, 0, 0, 0, 0, 0, 21931000),
(71, '2315', 'Hutang Peng Simpanan', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 778625, 0, 0, 0, 0, 0, 0, 0, 778625),
(72, '2316', 'Hutang Peng Taken', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 42459050, 0, 0, 0, 0, 0, 0, 0, 42459050),
(73, '2317', 'Hutang BJS Saham', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 717439669, 0, 0, 0, 0, 0, 0, 0, 717439669),
(74, '2318', 'Hutang BJP', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 293026214, 0, 0, 0, 0, 0, 0, 0, 293026214),
(75, '2319', 'Hutang Premi Jalinan', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 50317500, 0, 0, 0, 0, 0, 0, 0, 50317500),
(76, '2320', 'Hutang Iuran Solidaritas', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 12511400, 0, 0, 0, 0, 0, 0, 0, 12511400),
(77, '2321', 'Dana Klaim Jalinan', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, '2322', 'Biaya Msh Hrs Dibayar', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 1883600, 0, 0, 0, 0, 0, 0, 0, 1883600),
(79, '2323', 'Hutang KP Jeruju', 'detail', '23', 3, 'aktiva', 'kredit', 0, 1346726169, 0, 0, 0, 0, 0, 0, 0, 1346726169),
(80, '2324', 'Hutang KP Rasau', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, '2325', 'Hutang KP Tanjung Hulu', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 3512397366, 0, 0, 0, 0, 0, 0, 0, 3512397366),
(82, '2326', 'Hutang KP Kotabaru', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, '2327', 'Hutang KP Sungai Raya', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 2707118784, 0, 0, 0, 0, 0, 0, 0, 2707118784),
(84, '2328', 'Hutang KP Anjongan', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, '2329', 'Hutang KP Pakumbang', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, '2330', 'Hutang KP Simpang Tiga', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, '3', 'Modal', 'general', '', 1, 'modal', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, '31', 'Modal Sendiri', 'general', '3', 2, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, '3111', 'Simpanan Pokok', 'detail', '31', 3, 'modal', 'kredit', 0, 545513000, 0, 0, 0, 0, 0, 0, 0, 545513000),
(90, '3112', 'Simpanan Wajib', 'detail', '31', 3, 'modal', 'kredit', 0, 5505177600, 0, 0, 0, 0, 0, 0, 0, 5505177600),
(91, '32', 'Modal Transit', 'general', '3', 2, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, '3211', 'Dana Pendidikan', 'detail', '32', 3, 'modal', 'kredit', 0, 27643750, 0, 0, 0, 0, 0, 0, 0, 27643750),
(93, '3212', 'Dana Pemberdayaan', 'detail', '32', 3, 'modal', 'kredit', 0, 504314575, 0, 0, 0, 0, 0, 0, 0, 504314575),
(94, '3213', 'Dana RAT', 'detail', '32', 3, 'modal', 'kredit', 0, 3170050, 0, 0, 0, 0, 0, 0, 0, 3170050),
(95, '3214', 'Dana Anggota', 'detail', '32', 3, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(96, '3215', 'Dana Pengurus', 'detail', '32', 3, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, '3216', 'Dana Pegawai', 'detail', '32', 3, 'modal', 'kredit', 0, 127345079, 0, 0, 0, 0, 0, 0, 0, 127345079),
(98, '33', 'Modal Lembaga ', 'general', '3', 2, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, '3311', 'Dana Cadangan Umum', 'detail', '33', 3, 'modal', 'kredit', 0, 231256445, 0, 0, 0, 0, 0, 0, 0, 231256445),
(100, '3312', 'Dana Cadangan Risiko', 'detail', '33', 3, 'modal', 'kredit', 0, 946977110, 0, 0, 0, 0, 0, 0, 0, 946977110),
(101, '3313', 'Donasi/Iuran Gedung', 'detail', '33', 3, 'modal', 'kredit', 0, 1116876804, 0, 0, 0, 0, 0, 0, 0, 1116876804),
(102, '3314', 'SHU Tidak Terbagi', 'detail', '33', 3, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, '3315', 'SHU Tahun Berjalan ', 'detail', '33', 3, 'modal', 'debet', 1340868457, 0, 0, 0, 0, 0, 0, 0, 1340868457, 0),
(104, '4', 'Pendapatan', 'general', '', 1, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, '41', 'Pendapatan Usaha', 'general', '4', 2, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, '4111', 'Bunga Piutang Anggota', 'detail', '41', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, '4112', 'Jasa Pelayanan', 'detail', '41', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, '4113', 'Uang Pangkal', 'detail', '41', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(109, '4114', 'Denda', 'detail', '41', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(110, '42', 'Pendapatan Non Usaha', 'general', '4', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(111, '4211', 'Bunga Bank', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, '4212', 'Bunga Deposito', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(113, '4213', 'Bunga Sikodit', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(114, '4214', 'Dividen Saham SPD', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(115, '4215', 'Bunga Simpanan Cadangan', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(116, '4216', 'Dividen Saham Jalinan', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, '4217', 'Bunga Tabungan Tahapan ', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, '4218', 'Pendapatan Lain-lain', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, '5', 'Biaya-biaya', 'general', '', 1, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(120, '51', 'Biaya Modal', 'general', '5', 2, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(121, '5111', 'Bunga Hutang SPD', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(122, '5112', 'Bunga Taken', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(123, '5113', 'Bunga Sijaka', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, '5114', 'BungaTulus', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, '5115', 'Bunga Setia', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, '5116', 'Bunga Simpanan', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, '5117', 'Balas Jasa Simpanan Saham', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, '5118', 'Balas Jasa Pinjaman ', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, '5119', 'Bunga Tawa', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, '52', 'Biaya Operasional', 'general', '5', 2, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, '5211', 'Biaya Pegawai', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, '5212', 'Biaya Rapat', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, '5213', 'Biaya Lembur & Uang Makan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, '5214', 'Biaya Transport Lapangan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, '5215', 'Biaya Premi Jalinan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, '5216', 'Biaya Iuran Solidaritas', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, '5217', 'Biaya Promosi', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, '5218', 'Biaya Listrik, Telpon & Air', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, '5219', 'Biaya ADM & Umum', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, '5220', 'Biaya Perlengkapan ', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, '5221', 'Biaya Peny Gedung', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(142, '5222', 'Biaya Peny Kendaraan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(143, '5223', 'Biaya Peny Peralatan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, '5224', 'Biaya Peny AK Tetap Lain-lain', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(145, '5226', 'Biaya Pajak', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(146, '5227', 'Biaya Asuransi', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(147, '5228', 'Biaya RAT', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(148, '5229', 'Biaya Sewa TP', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akuntansi_history_backup`
--

CREATE TABLE `tabel_akuntansi_history_backup` (
  `id_backup` int(15) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tanggal_backup` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_akuntansi_history_backup`
--

INSERT INTO `tabel_akuntansi_history_backup` (`id_backup`, `nama_file`, `tanggal_backup`, `id_user`) VALUES
(80, '1619493608_backup_data_2021-04-27.sql', '2021-04-27', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akuntansi_history_tutup_buku`
--

CREATE TABLE `tabel_akuntansi_history_tutup_buku` (
  `id_backup` int(15) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `tanggal_backup` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_akuntansi_history_tutup_buku`
--

INSERT INTO `tabel_akuntansi_history_tutup_buku` (`id_backup`, `nama_file`, `tanggal_backup`, `id_user`) VALUES
(38, '1619493716_tutup_buku_2021-04-27.sql', '2021-04-27', '6'),
(39, '1619493726_tutup_buku_2021-04-27.sql', '2021-04-27', '6'),
(40, '1619493733_tutup_buku_2021-04-27.sql', '2021-04-27', '6'),
(41, '1621478857_tutup_buku_2021-05-20.sql', '2021-05-20', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akuntansi_jurnal_keluar`
--

CREATE TABLE `tabel_akuntansi_jurnal_keluar` (
  `nomor_jurnal` int(15) NOT NULL,
  `kode_jurnal` varchar(15) NOT NULL,
  `tanggal_selesai` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akuntansi_jurnal_masuk`
--

CREATE TABLE `tabel_akuntansi_jurnal_masuk` (
  `nomor_jurnal` int(15) NOT NULL,
  `kode_jurnal` varchar(15) NOT NULL,
  `tanggal_selesai` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akuntansi_jurnal_umum`
--

CREATE TABLE `tabel_akuntansi_jurnal_umum` (
  `nomor_jurnal` int(15) NOT NULL,
  `kode_jurnal` varchar(15) NOT NULL,
  `tanggal_selesai` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_akuntansi_jurnal_umum`
--

INSERT INTO `tabel_akuntansi_jurnal_umum` (`nomor_jurnal`, `kode_jurnal`, `tanggal_selesai`) VALUES
(1, 'JU/1', '2021-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akuntansi_master`
--

CREATE TABLE `tabel_akuntansi_master` (
  `id_perkiraan` int(11) NOT NULL,
  `nomor_perkiraan` varchar(6) NOT NULL,
  `nama_perkiraan` varchar(30) NOT NULL,
  `tipe` varchar(7) NOT NULL,
  `induk` varchar(5) NOT NULL,
  `level` int(6) DEFAULT NULL,
  `kelompok` varchar(10) NOT NULL,
  `normal` varchar(10) NOT NULL,
  `awal_debet` bigint(20) DEFAULT NULL,
  `awal_kredit` bigint(20) DEFAULT NULL,
  `mut_debet` bigint(20) NOT NULL,
  `mut_kredit` bigint(20) NOT NULL,
  `sisa_debet` bigint(20) NOT NULL,
  `sisa_kredit` bigint(20) NOT NULL,
  `rl_debet` bigint(20) NOT NULL,
  `rl_kredit` bigint(20) NOT NULL,
  `nrc_debet` bigint(20) NOT NULL,
  `nrc_kredit` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_akuntansi_master`
--

INSERT INTO `tabel_akuntansi_master` (`id_perkiraan`, `nomor_perkiraan`, `nama_perkiraan`, `tipe`, `induk`, `level`, `kelompok`, `normal`, `awal_debet`, `awal_kredit`, `mut_debet`, `mut_kredit`, `sisa_debet`, `sisa_kredit`, `rl_debet`, `rl_kredit`, `nrc_debet`, `nrc_kredit`) VALUES
(24, '1', 'aktiva', 'general', '', 1, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, '11', 'aktiva lancar', 'general', '1', 2, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, '1111', 'kas', 'detail', '11', 3, 'aktiva', 'debet', 258713900, 0, 0, 200000, 0, 0, 0, 0, 258713900, 0),
(27, '1112', 'bank', 'detail', '11', 3, 'aktiva', 'debet', 8697460913, 0, 0, 0, 0, 0, 0, 0, 8697460913, 0),
(28, '1113', 'deposito', 'detail', '11', 3, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, '1114', 'sikodit', 'detail', '11', 3, 'aktiva', 'debet', 55124575, 0, 0, 0, 0, 0, 0, 0, 55124575, 0),
(30, '1115', 'piutang anggota', 'detail', '11', 3, 'aktiva', 'debet', 37945250550, 0, 0, 0, 0, 0, 0, 0, 37945250550, 0),
(31, '1116', 'perlengkapan', 'detail', '11', 3, 'aktiva', 'debet', 128935350, 0, 0, 0, 0, 0, 0, 0, 128935350, 0),
(32, '1117', 'By dibayar dimuka', 'detail', '11', 3, 'aktiva', 'debet', 85258600, 0, 0, 0, 0, 0, 0, 0, 85258600, 0),
(33, '1118', 'piutang kp jeruju', 'detail', '11', 3, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, '1119', 'piutang kp rasau', 'detail', '11', 3, 'aktiva', 'debet', 3701381284, 0, 0, 0, 0, 0, 0, 0, 3701381284, 0),
(35, '1120', 'piutang kp tanjung hulu', 'detail', '11', 3, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, '1121', 'piutang kp kotabaru', 'detail', '11', 3, 'aktiva', 'debet', 539947706, 0, 0, 0, 0, 0, 0, 0, 539947706, 0),
(37, '1122', 'piutang kp sungai raya', 'detail', '11', 3, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, '1123', 'piutang kp anjongan', 'detail', '11', 3, 'aktiva', 'debet', 1506607906, 0, 0, 0, 0, 0, 0, 0, 1506607906, 0),
(39, '1124', 'piutang kp pakumbang', 'detail', '11', 3, 'aktiva', 'debet', 7779511671, 0, 0, 0, 0, 0, 0, 0, 7779511671, 0),
(40, '1125', 'piutang kp simpang tiga', 'detail', '11', 3, 'aktiva', 'debet', 4821995978, 0, 0, 0, 0, 0, 0, 0, 4821995978, 0),
(41, '12', 'penyertaan & investasi', 'general', '1', 2, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, '1211', 'saham spd', 'detail', '12', 3, 'aktiva', 'debet', 449950000, 0, 0, 0, 0, 0, 0, 0, 449950000, 0),
(43, '1212', 'simpanan cadangan', 'detail', '12', 3, 'aktiva', 'debet', 52693650, 0, 0, 0, 0, 0, 0, 0, 52693650, 0),
(44, '1213', 'saham jalinan', 'detail', '12', 3, 'aktiva', 'debet', 177880000, 0, 0, 0, 0, 0, 0, 0, 177880000, 0),
(45, '1214', 'tabungan tahapan', 'detail', '12', 3, 'aktiva', 'debet', 100000000, 0, 0, 0, 0, 0, 0, 0, 100000000, 0),
(46, '13', 'Harta tetap', 'general', '1', 2, 'aktiva', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, '1311', 'tanah', 'detail', '13', 3, 'aktiva', 'debet', 400000000, 0, 0, 0, 0, 0, 0, 0, 400000000, 0),
(48, '1312', 'gedung', 'detail', '13', 3, 'aktiva', 'debet', 1232711825, 0, 0, 0, 0, 0, 0, 0, 1232711825, 0),
(49, '1313', 'ak peny gedung', 'detail', '13', 3, 'aktiva', 'kredit', 0, 195000000, 0, 0, 0, 0, 0, 0, 0, 195000000),
(50, '1314', 'kendaraan', 'detail', '13', 3, 'aktiva', 'debet', 378700000, 0, 200000, 0, 0, 0, 0, 0, 378700000, 0),
(51, '1315', 'ak peny kendaraan', 'detail', '13', 3, 'aktiva', 'kredit', 0, 165554500, 0, 0, 0, 0, 0, 0, 0, 165554500),
(52, '1316', 'peralatan', 'detail', '13', 3, 'aktiva', 'debet', 323268325, 0, 0, 0, 0, 0, 0, 0, 323268325, 0),
(53, '1317', 'ak peny peralatan', 'detail', '13', 3, 'aktiva', 'kredit', 0, 194455150, 0, 0, 0, 0, 0, 0, 0, 194455150),
(54, '1318', 'aktiva tetap lain-lain', 'detail', '13', 3, 'aktiva', 'debet', 357149150, 0, 0, 0, 0, 0, 0, 0, 357149150, 0),
(55, '1319', 'ak peny tetap lain-lain', 'detail', '13', 3, 'aktiva', 'kredit', 0, 187397450, 0, 0, 0, 0, 0, 0, 0, 187397450),
(56, '2', 'hutang', 'general', '', 1, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, '21', 'hutang lancar', 'general', '2', 2, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, '2111', 'hutang spd', 'detail', '21', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, '2112', 'taken', 'detail', '21', 3, 'kewajiban', 'kredit', 0, 6182975050, 0, 0, 0, 0, 0, 0, 0, 6182975050),
(60, '2113', 'sijaka', 'detail', '21', 3, 'kewajiban', 'kredit', 0, 628600000, 0, 0, 0, 0, 0, 0, 0, 628600000),
(61, '22', 'hutang jangka panjang', 'general', '2', 2, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, '2211', 'tulus', 'detail', '22', 3, 'kewajiban', 'kredit', 0, 1010858200, 0, 0, 0, 0, 0, 0, 0, 1010858200),
(63, '2212', 'setia', 'detail', '22', 3, 'kewajiban', 'kredit', 0, 3832911725, 0, 0, 0, 0, 0, 0, 0, 3832911725),
(64, '2213', 'simapan', 'detail', '22', 3, 'kewajiban', 'kredit', 0, 39667563200, 0, 0, 0, 0, 0, 0, 0, 39667563200),
(65, '2214', 'tawa', 'detail', '22', 3, 'kewajiban', 'kredit', 0, 232803950, 0, 0, 0, 0, 0, 0, 0, 232803950),
(66, '23', 'hutang tak berbunga', 'general', '2', 2, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, '2311', 'solkes', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 101851825, 0, 0, 0, 0, 0, 0, 0, 101851825),
(68, '2312', 'solduka', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 214615000, 0, 0, 0, 0, 0, 0, 0, 214615000),
(69, '2313', 'bunga diterima dimuka', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 3960000, 0, 0, 0, 0, 0, 0, 0, 3960000),
(70, '2314', 'pri sejati', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 21931000, 0, 0, 0, 0, 0, 0, 0, 21931000),
(71, '2315', 'hutang peng simpanan', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 778625, 0, 0, 0, 0, 0, 0, 0, 778625),
(72, '2316', 'hutang peng taken', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 42459050, 0, 0, 0, 0, 0, 0, 0, 42459050),
(73, '2317', 'hutang bjs saham', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 717439669, 0, 0, 0, 0, 0, 0, 0, 717439669),
(74, '2318', 'hutang bjp', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 293026214, 0, 0, 0, 0, 0, 0, 0, 293026214),
(75, '2319', 'hutang premi jalinan', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 50317500, 0, 0, 0, 0, 0, 0, 0, 50317500),
(76, '2320', 'hutang iuran solidaritas', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 12511400, 0, 0, 0, 0, 0, 0, 0, 12511400),
(77, '2321', 'dana klaim jalinan', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, '2322', 'by msh hrs dibayar', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 1883600, 0, 0, 0, 0, 0, 0, 0, 1883600),
(79, '2323', 'hutang kp jeruju', 'detail', '23', 3, 'aktiva', 'kredit', 0, 1346726169, 0, 0, 0, 0, 0, 0, 0, 1346726169),
(80, '2324', 'hutang kp rasau', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, '2325', 'hutang kp tanjung hulu', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 3512397366, 0, 0, 0, 0, 0, 0, 0, 3512397366),
(82, '2326', 'hutang kp kotabaru', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, '2327', 'hutang kp sungai raya', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 2707118784, 0, 0, 0, 0, 0, 0, 0, 2707118784),
(84, '2328', 'hutang kp anjongan', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, '2329', 'hutang kp pakumbang', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, '2330', 'hutang kp simpang tiga', 'detail', '23', 3, 'kewajiban', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, '3', 'modal', 'general', '', 1, 'modal', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, '31', 'moda sendiri', 'general', '3', 2, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, '3111', 'simpanan pokok', 'detail', '31', 3, 'modal', 'kredit', 0, 545513000, 0, 0, 0, 0, 0, 0, 0, 545513000),
(90, '3112', 'simpanan wajib', 'detail', '31', 3, 'modal', 'kredit', 0, 5505177600, 0, 0, 0, 0, 0, 0, 0, 5505177600),
(91, '32', 'modal transit', 'general', '3', 2, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, '3211', 'dana pendidikan', 'detail', '32', 3, 'modal', 'kredit', 0, 27643750, 0, 0, 0, 0, 0, 0, 0, 27643750),
(93, '3212', 'dana pemberdayaan', 'detail', '32', 3, 'modal', 'kredit', 0, 504314575, 0, 0, 0, 0, 0, 0, 0, 504314575),
(94, '3213', 'dana rat', 'detail', '32', 3, 'modal', 'kredit', 0, 3170050, 0, 0, 0, 0, 0, 0, 0, 3170050),
(95, '3214', 'dana anggota', 'detail', '32', 3, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(96, '3215', 'dana pengurus', 'detail', '32', 3, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, '3216', 'dana pegawai', 'detail', '32', 3, 'modal', 'kredit', 0, 127345079, 0, 0, 0, 0, 0, 0, 0, 127345079),
(98, '33', 'modal lembaga ', 'general', '3', 2, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, '3311', 'dana cadangan umum', 'detail', '33', 3, 'modal', 'kredit', 0, 231256445, 0, 0, 0, 0, 0, 0, 0, 231256445),
(100, '3312', 'dana cadangan risiko', 'detail', '33', 3, 'modal', 'kredit', 0, 946977110, 0, 0, 0, 0, 0, 0, 0, 946977110),
(101, '3313', 'donasi/iuran gedung', 'detail', '33', 3, 'modal', 'kredit', 0, 1116876804, 0, 0, 0, 0, 0, 0, 0, 1116876804),
(102, '3314', 'shu tidak terbagi', 'detail', '33', 3, 'modal', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, '3315', 'shu tahun berjalan ', 'detail', '33', 3, 'modal', 'debet', 1340868457, 0, 0, 0, 0, 0, 0, 0, 1340868457, 0),
(104, '4', 'pendapatan', 'general', '', 1, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, '41', 'pendapatan usaha', 'general', '4', 2, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, '4111', 'bunga piutang anggota', 'detail', '41', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, '4112', 'jasa pelayanan', 'detail', '41', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, '4113', 'uang pangkal', 'detail', '41', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(109, '4114', 'denda', 'detail', '41', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(110, '42', 'pendapatan non usaha', 'general', '4', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(111, '4211', 'bunga bank', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, '4212', 'bunga deposito', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(113, '4213', 'bunga sikodit', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(114, '4214', 'dividen saham spd', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(115, '4215', 'bunga simpanan cadangan', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(116, '4216', 'dividen saham jalinan', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, '4217', 'bunga tabungan tahapan ', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, '4218', 'pendapatan lain-lain', 'detail', '42', 3, 'pendapatan', 'kredit', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, '5', 'biaya-biaya', 'general', '', 1, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(120, '51', 'biaya modal', 'general', '5', 2, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(121, '5111', 'bunga hutang spd', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(122, '5112', 'bunga taken', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(123, '5113', 'bunga sijaka', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, '5114', 'bunga tulus', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, '5115', 'bunga setia', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, '5116', 'bunga simapan', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, '5117', 'balas jasa simpanan saham', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, '5118', 'balas jasa pinjaman ', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, '5119', 'bunga tawa', 'detail', '51', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, '52', 'biaya operasional', 'general', '5', 2, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, '5211', 'biaya pegawai', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, '5212', 'biaya rapat', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, '5213', 'biaya lembur & uang makan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, '5214', 'biaya transport lapangan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, '5215', 'biaya premi jalinan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, '5216', 'biaya iuran solidaritas', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, '5217', 'biaya promosi', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, '5218', 'biaya listrik, telpon & air', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, '5219', 'biaya adm & umum', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, '5220', 'biaya perlengkapan ', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, '5221', 'biaya peny gedung', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(142, '5222', 'biaya peny kendaraan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(143, '5223', 'biaya peny peralatan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, '5224', 'biaya peny ak tetap lain-lain', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(145, '5226', 'biaya pajak', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(146, '5227', 'biaya asuransi', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(147, '5228', 'biaya rat', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(148, '5229', 'biaya sewa tp', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(149, '5230', 'biaya pendidikan', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(150, '5231', 'biaya cadangan risiko', 'detail', '52', 3, 'biaya', 'debet', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akuntansi_transaksi`
--

CREATE TABLE `tabel_akuntansi_transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `kode_jurnal` varchar(15) NOT NULL,
  `nomor_perkiraan` varchar(10) NOT NULL,
  `tanggal_transaksi` varchar(12) NOT NULL,
  `bulan_transaksi` varchar(20) NOT NULL,
  `jenis_transaksi` varchar(15) NOT NULL,
  `keterangan_transaksi` text NOT NULL,
  `debet` bigint(20) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `tanggal_posting` varchar(12) NOT NULL,
  `keterangan_posting` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_akuntansi_transaksi`
--

INSERT INTO `tabel_akuntansi_transaksi` (`id_transaksi`, `kode_jurnal`, `nomor_perkiraan`, `tanggal_transaksi`, `bulan_transaksi`, `jenis_transaksi`, `keterangan_transaksi`, `debet`, `kredit`, `tanggal_posting`, `keterangan_posting`, `id_user`) VALUES
(1, 'JU/1', '1314', '2021-05-20', '', 'Jurnal Umum', '', 50000, 0, '', 'Post', ''),
(2, 'JU/1', '1111', '2021-05-20', '', 'Jurnal Umum', '', 0, 50000, '', 'Post', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_induk_user`
--

CREATE TABLE `tabel_induk_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nama_lengkap` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `asal_kantor` enum('BKCU','CU') COLLATE latin1_general_ci NOT NULL,
  `kode_cu` varchar(6) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `leveluser` enum('Admin','Supervisor','User') COLLATE latin1_general_ci NOT NULL DEFAULT 'User',
  `divisi` enum('kasir','credit','operasional','akuntansi') COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Yes','No') COLLATE latin1_general_ci NOT NULL DEFAULT 'No',
  `tgldaftar` date DEFAULT NULL,
  `tgllogin` date NOT NULL,
  `statuslogin` enum('Online','Offline') COLLATE latin1_general_ci NOT NULL DEFAULT 'Offline'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tabel_induk_user`
--

INSERT INTO `tabel_induk_user` (`id_user`, `username`, `password`, `nama_lengkap`, `asal_kantor`, `kode_cu`, `email`, `leveluser`, `divisi`, `publish`, `tgldaftar`, `tgllogin`, `statuslogin`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Agus Sumarna', 'CU', '001001', 'sumarna_agus@yahoo.com', 'Admin', '', 'Yes', '2010-07-21', '2018-08-20', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_setup_gl_periode`
--

CREATE TABLE `tabel_setup_gl_periode` (
  `id_periode` int(6) NOT NULL,
  `periode_awal` varchar(50) NOT NULL,
  `periode_akhir` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_setup_gl_periode`
--

INSERT INTO `tabel_setup_gl_periode` (`id_periode`, `periode_awal`, `periode_akhir`) VALUES
(5, '01/01/2011', '31/12/2011');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_setup_gl_perkiraan`
--

CREATE TABLE `tabel_setup_gl_perkiraan` (
  `id_setup` int(3) NOT NULL,
  `aktiva_lancar` varchar(11) NOT NULL,
  `hutang_lancar` varchar(11) NOT NULL,
  `modal_sendiri` varchar(11) NOT NULL,
  `kas` varchar(11) NOT NULL,
  `shu` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_setup_gl_perkiraan`
--

INSERT INTO `tabel_setup_gl_perkiraan` (`id_setup`, `aktiva_lancar`, `hutang_lancar`, `modal_sendiri`, `kas`, `shu`) VALUES
(5, '11', '21', '32', '1111', '3315');

-- --------------------------------------------------------

--
-- Table structure for table `t_periode`
--

CREATE TABLE `t_periode` (
  `Periode` varchar(6) NOT NULL,
  `TanggalMulai` date NOT NULL,
  `TanggalSelesai` date NOT NULL,
  `Keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_periode`
--

INSERT INTO `t_periode` (`Periode`, `TanggalMulai`, `TanggalSelesai`, `Keterangan`) VALUES
('202002', '2020-01-01', '2020-12-31', 'UnPosted'),
('asdfa', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_perkiraan`
--

CREATE TABLE `t_perkiraan` (
  `NomorPerkiraan` varchar(15) NOT NULL,
  `NamaPerkiraan` varchar(45) NOT NULL,
  `Kelompok` varchar(25) NOT NULL,
  `Keterangan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_perkiraan`
--

INSERT INTO `t_perkiraan` (`NomorPerkiraan`, `NamaPerkiraan`, `Kelompok`, `Keterangan`) VALUES
('1001', 'Kas', 'Harta', '-');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(10) NOT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `user_name`, `password`, `level`) VALUES
(1, 'admin', '123', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `djurnal`
--
ALTER TABLE `djurnal`
  ADD PRIMARY KEY (`TransaksiID`),
  ADD KEY `nomor_perkiraan` (`NomorPerkiraan`);

--
-- Indexes for table `hjurnal`
--
ALTER TABLE `hjurnal`
  ADD PRIMARY KEY (`NomorJurnal`);

--
-- Indexes for table `perkiraan`
--
ALTER TABLE `perkiraan`
  ADD PRIMARY KEY (`PerkiraanID`);

--
-- Indexes for table `tabel_akuntansi_history_backup`
--
ALTER TABLE `tabel_akuntansi_history_backup`
  ADD PRIMARY KEY (`id_backup`);

--
-- Indexes for table `tabel_akuntansi_history_tutup_buku`
--
ALTER TABLE `tabel_akuntansi_history_tutup_buku`
  ADD PRIMARY KEY (`id_backup`);

--
-- Indexes for table `tabel_akuntansi_jurnal_keluar`
--
ALTER TABLE `tabel_akuntansi_jurnal_keluar`
  ADD PRIMARY KEY (`nomor_jurnal`);

--
-- Indexes for table `tabel_akuntansi_jurnal_masuk`
--
ALTER TABLE `tabel_akuntansi_jurnal_masuk`
  ADD PRIMARY KEY (`nomor_jurnal`);

--
-- Indexes for table `tabel_akuntansi_jurnal_umum`
--
ALTER TABLE `tabel_akuntansi_jurnal_umum`
  ADD PRIMARY KEY (`nomor_jurnal`);

--
-- Indexes for table `tabel_akuntansi_master`
--
ALTER TABLE `tabel_akuntansi_master`
  ADD PRIMARY KEY (`id_perkiraan`);

--
-- Indexes for table `tabel_akuntansi_transaksi`
--
ALTER TABLE `tabel_akuntansi_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nomor_perkiraan` (`nomor_perkiraan`);

--
-- Indexes for table `tabel_induk_user`
--
ALTER TABLE `tabel_induk_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tabel_setup_gl_periode`
--
ALTER TABLE `tabel_setup_gl_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `tabel_setup_gl_perkiraan`
--
ALTER TABLE `tabel_setup_gl_perkiraan`
  ADD PRIMARY KEY (`id_setup`);

--
-- Indexes for table `t_perkiraan`
--
ALTER TABLE `t_perkiraan`
  ADD PRIMARY KEY (`NomorPerkiraan`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `djurnal`
--
ALTER TABLE `djurnal`
  MODIFY `TransaksiID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `perkiraan`
--
ALTER TABLE `perkiraan`
  MODIFY `PerkiraanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `tabel_akuntansi_history_backup`
--
ALTER TABLE `tabel_akuntansi_history_backup`
  MODIFY `id_backup` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tabel_akuntansi_history_tutup_buku`
--
ALTER TABLE `tabel_akuntansi_history_tutup_buku`
  MODIFY `id_backup` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tabel_akuntansi_master`
--
ALTER TABLE `tabel_akuntansi_master`
  MODIFY `id_perkiraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `tabel_akuntansi_transaksi`
--
ALTER TABLE `tabel_akuntansi_transaksi`
  MODIFY `id_transaksi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_induk_user`
--
ALTER TABLE `tabel_induk_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabel_setup_gl_periode`
--
ALTER TABLE `tabel_setup_gl_periode`
  MODIFY `id_periode` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_setup_gl_perkiraan`
--
ALTER TABLE `tabel_setup_gl_perkiraan`
  MODIFY `id_setup` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
