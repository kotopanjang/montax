-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 01:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spt_v3`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `kode_bank` int(25) NOT NULL,
  `nama_bank` varchar(300) NOT NULL,
  `jenis` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`kode_bank`, `nama_bank`, `jenis`) VALUES
(2, 'BANK RAKYAT INDONESIA', 'BANK UMUM PERSERO'),
(8, 'BANK MANDIRI', 'BANK UMUM PERSERO'),
(9, 'BANK NEGARA', 'BANK UMUM PERSERO'),
(200, 'BANK TABUNGAN NEGARA', 'BANK UMUM PERSERO'),
(11, 'BANK DANAMON INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(13, 'BANK PERMATA', 'BANK UMUM SWASTA NASIONAL'),
(14, 'BANK CENTRAL ASIA', 'BANK UMUM SWASTA NASIONAL'),
(16, 'BANK MAYBANK INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(19, 'PAN INDONESIA BANK', 'BANK UMUM SWASTA NASIONAL'),
(22, 'BANK CIMB NIAGA', 'BANK UMUM SWASTA NASIONAL'),
(23, 'BANK UOB INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(28, 'BANK OCBC NISP', 'BANK UMUM SWASTA NASIONAL'),
(37, 'BANK ARTHA GRAHA INTERNASIONAL', 'BANK UMUM SWASTA NASIONAL'),
(76, 'BANK BUMI ARTA', 'BANK UMUM SWASTA NASIONAL'),
(87, 'BANK HSBC INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(95, 'BANK JTRUST INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(97, 'BANK MAYAPADA INTERNATIONAL', 'BANK UMUM SWASTA NASIONAL'),
(146, 'BANK OF INDIA INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(147, 'BANK MUAMALAT INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(151, 'BANK MESTIKA DHARMA', 'BANK UMUM SWASTA NASIONAL'),
(152, 'BANK SHINHAN INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(153, 'BANK SINARMAS', 'BANK UMUM SWASTA NASIONAL'),
(157, 'BANK MASPION INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(161, 'BANK GANESHA', 'BANK UMUM SWASTA NASIONAL'),
(164, 'BANK ICBC INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(167, 'BANK QNB INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(212, 'BANK WOORI SAUDARA INDONESIA 1906', 'BANK UMUM SWASTA NASIONAL'),
(426, 'BANK MEGA', 'BANK UMUM SWASTA NASIONAL'),
(441, 'BANK KB BUKOPIN', 'BANK UMUM SWASTA NASIONAL'),
(451, 'BANK SYARIAH INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(484, 'BANK KEB HANA INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(485, 'BANK MNC INTERNASIONAL', 'BANK UMUM SWASTA NASIONAL'),
(494, 'BANK RAYA INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(498, 'BANK SBI INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(506, 'BANK MEGA SYARIAH', 'BANK UMUM SWASTA NASIONAL'),
(555, 'BANK INDEX SELINDO', 'BANK UMUM SWASTA NASIONAL'),
(553, 'BANK MAYORA', 'BANK UMUM SWASTA NASIONAL'),
(36, 'BANK CHINA CONSTRUCTION BANK INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(46, 'BANK DBS INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(47, 'BANK RESONA PERDANIA', 'BANK UMUM SWASTA NASIONAL'),
(48, 'BANK MIZUHO INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(54, 'BANK CAPITAL INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(57, 'BANK BNP PARIBAS INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(61, 'BANK ANZ INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(945, 'BANK IBK INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(947, 'BANK ALADIN SYARIAH', 'BANK UMUM SWASTA NASIONAL'),
(949, 'BANK CTBC INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(950, 'BANK COMMONWEALTH', 'BANK UMUM SWASTA NASIONAL'),
(213, 'BANK BTPN', 'BANK UMUM SWASTA NASIONAL'),
(405, 'BANK VICTORIA SYARIAH', 'BANK UMUM SWASTA NASIONAL'),
(425, 'BANK JABAR BANTEN SYARIAH', 'BANK UMUM SWASTA NASIONAL'),
(459, 'BANK BISNIS INTERNASIONAL', 'BANK UMUM SWASTA NASIONAL'),
(472, 'BANK JASA JAKARTA', 'BANK UMUM SWASTA NASIONAL'),
(490, 'BANK NEO COMMERCE', 'BANK UMUM SWASTA NASIONAL'),
(501, 'BANK DIGITAL BCA', 'BANK UMUM SWASTA NASIONAL'),
(503, 'BANK NATIONALNOBU', 'BANK UMUM SWASTA NASIONAL'),
(513, 'BANK INA PERDANA', 'BANK UMUM SWASTA NASIONAL'),
(517, 'BANK PANIN DUBAI SYARIAH', 'BANK UMUM SWASTA NASIONAL'),
(520, 'PRIMA MASTER BANK', 'BANK UMUM SWASTA NASIONAL'),
(521, 'BANK KB BUKOPIN SYARIAH', 'BANK UMUM SWASTA NASIONAL'),
(523, 'BANK SAHABAT SAMPOERNA', 'BANK UMUM SWASTA NASIONAL'),
(526, 'BANK OKE INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(531, 'BANK AMAR INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(535, 'BANK SEABANK INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(536, 'BANK BCA SYARIAH', 'BANK UMUM SWASTA NASIONAL'),
(542, 'BANK JAGO TBK', 'BANK UMUM SWASTA NASIONAL'),
(547, 'BANK BTPN SYARIAH', 'BANK UMUM SWASTA NASIONAL'),
(548, 'BANK MULTIARTA SENTOSA', 'BANK UMUM SWASTA NASIONAL'),
(562, 'BANK FAMA INTERNASIONAL', 'BANK UMUM SWASTA NASIONAL'),
(564, 'BANK MANDIRI TASPEN', 'BANK UMUM SWASTA NASIONAL'),
(566, 'BANK VICTORIA INTERNATIONAL', 'BANK UMUM SWASTA NASIONAL'),
(567, 'ALLO BANK INDONESIA', 'BANK UMUM SWASTA NASIONAL'),
(110, 'PT BPD JAWA BARAT DAN BANTEN', 'BANK PEMBANGUNAN DAERAH'),
(111, 'PT BPD DKI', 'BANK PEMBANGUNAN DAERAH'),
(112, 'PT BPD DAERAH ISTIMEWA YOGYAKARTA', 'BANK PEMBANGUNAN DAERAH'),
(113, 'PT BPD JAWA TENGAH', 'BANK PEMBANGUNAN DAERAH'),
(114, 'PT BPD JAWA TIMUR', 'BANK PEMBANGUNAN DAERAH'),
(115, 'PT BPD JAMBI', 'BANK PEMBANGUNAN DAERAH'),
(116, 'PT BANK ACEH SYARIAH', 'BANK PEMBANGUNAN DAERAH'),
(117, 'PT BPD SUMATERA UTARA', 'BANK PEMBANGUNAN DAERAH'),
(118, 'PT BANK NAGARI', 'BANK PEMBANGUNAN DAERAH'),
(119, 'PT BPD RIAU KEPRI', 'BANK PEMBANGUNAN DAERAH'),
(120, 'PT BPD SUMATERA SELATAN DAN BANGKA BELITUNG', 'BANK PEMBANGUNAN DAERAH'),
(121, 'PT BPD LAMPUNG', 'BANK PEMBANGUNAN DAERAH'),
(122, 'PT BPD KALIMANTAN SELATAN', 'BANK PEMBANGUNAN DAERAH'),
(123, 'PT BPD KALIMANTAN BARAT', 'BANK PEMBANGUNAN DAERAH'),
(124, 'PT BPD KALIMANTAN TIMUR DAN KALIMANTAN UTARA', 'BANK PEMBANGUNAN DAERAH'),
(125, 'PT BPD KALIMANTAN TENGAH', 'BANK PEMBANGUNAN DAERAH'),
(126, 'PT BPD SULAWESI SELATAN DAN SULAWESI BARAT', 'BANK PEMBANGUNAN DAERAH'),
(127, 'PT BPD SULAWESI UTARA DAN GORONTALO', 'BANK PEMBANGUNAN DAERAH'),
(128, 'PT BANK NTB SYARIAH', 'BANK PEMBANGUNAN DAERAH'),
(129, 'PT BPD BALI', 'BANK PEMBANGUNAN DAERAH'),
(130, 'PT BPD NUSA TENGGARA TIMUR', 'BANK PEMBANGUNAN DAERAH'),
(131, 'PT BPD MALUKU DAN MALUKU UTARA', 'BANK PEMBANGUNAN DAERAH'),
(132, 'PT BPD PAPUA', 'BANK PEMBANGUNAN DAERAH'),
(133, 'PT BPD BENGKULU', 'BANK PEMBANGUNAN DAERAH'),
(134, 'PT BPD SULAWESI TENGAH', 'BANK PEMBANGUNAN DAERAH'),
(135, 'PT BPD SULAWESI TENGGARA', 'BANK PEMBANGUNAN DAERAH'),
(137, 'PT BPD BANTEN', 'BANK PEMBANGUNAN DAERAH'),
(31, 'CITIBANK N.A.', 'KANTOR CABANG BANK YANG BERKEDUDUKAN DI LUAR NEGERI'),
(32, 'JP MORGAN CHASE BANK NA', 'KANTOR CABANG BANK YANG BERKEDUDUKAN DI LUAR NEGERI'),
(33, 'BANK OF AMERICA N.A', 'KANTOR CABANG BANK YANG BERKEDUDUKAN DI LUAR NEGERI'),
(40, 'BANGKOK BANK PCL', 'KANTOR CABANG BANK YANG BERKEDUDUKAN DI LUAR NEGERI'),
(42, 'MUFG BANK LTD', 'KANTOR CABANG BANK YANG BERKEDUDUKAN DI LUAR NEGERI'),
(50, 'STANDARD CHARTERED BANK', 'KANTOR CABANG BANK YANG BERKEDUDUKAN DI LUAR NEGERI'),
(67, 'DEUTSCHE BANK AG', 'KANTOR CABANG BANK YANG BERKEDUDUKAN DI LUAR NEGERI'),
(69, 'BANK OF CHINA (HONG KONG) LIMITED CABANG JAKARTA', 'KANTOR CABANG BANK YANG BERKEDUDUKAN DI LUAR NEGERI');

-- --------------------------------------------------------

--
-- Table structure for table `budgeting`
--

CREATE TABLE `budgeting` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Nomor_Perkiraan` int(11) NOT NULL,
  `Sub_Nomor_Perkiraan` int(11) NOT NULL,
  `Start_Berlaku` date DEFAULT NULL,
  `Exp_Berlaku` date DEFAULT NULL,
  `Jumlah_Budget` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budgeting`
--

INSERT INTO `budgeting` (`ID_Record`, `ID_WP`, `Nomor_Perkiraan`, `Sub_Nomor_Perkiraan`, `Start_Berlaku`, `Exp_Berlaku`, `Jumlah_Budget`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, 6001, 600101, '2022-04-12', NULL, 3000000, '2022-04-12 08:24:47', '2022-04-28 04:31:49', 1),
(2, 6, 6005, 600501, '2022-04-27', NULL, 900000, '2022-04-28 03:32:29', '2022-04-28 04:32:19', 1),
(3, 6, 6007, 600702, '2022-04-28', NULL, 600000, '2022-04-28 03:32:44', '2022-04-28 04:31:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bukti_potong`
--

CREATE TABLE `bukti_potong` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Jenis_Pajak` varchar(30) NOT NULL,
  `NPWP_Pemotong` varchar(30) NOT NULL,
  `Nama_Pemotong` varchar(100) NOT NULL,
  `Nomor_Bukti_Pemotongan` varchar(30) NOT NULL,
  `Tanggal_Bukti_Pemotongan` date NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukti_potong`
--

INSERT INTO `bukti_potong` (`ID_Record`, `ID_WP`, `Jenis_Pajak`, `NPWP_Pemotong`, `Nama_Pemotong`, `Nomor_Bukti_Pemotongan`, `Tanggal_Bukti_Pemotongan`, `Jumlah`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, 'Pasal 23/26', '11111111111', 'Kantor Baru', '9999999999', '2022-03-31', 2000000, '2022-04-01 07:08:38', '2022-04-01 08:32:20', 1),
(2, 6, 'Pasal 22', '123123', 'Kantor Kemanasaja', '7489279', '2022-04-01', 350000, '2022-04-01 07:20:00', '2022-04-01 08:43:21', 0),
(3, 6, 'Pasal 21', '123123', 'aaaa', '777777', '2022-04-01', 8888, '2022-04-01 08:37:26', '2022-04-01 08:42:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `Nomor_Perkiraan` int(11) NOT NULL,
  `Jenis` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coa`
--

INSERT INTO `coa` (`Nomor_Perkiraan`, `Jenis`, `Nama`) VALUES
(4001, 'Penghasilan Utama', 'Gaji'),
(1001, 'Tidak Termasuk Penghasilan yang Dikenakan PPh Final', 'Bunga'),
(1002, 'Tidak Termasuk Penghasilan yang Dikenakan PPh Final', 'Royalti'),
(1003, 'Tidak Termasuk Penghasilan yang Dikenakan PPh Final', 'Sewa'),
(1004, 'Tidak Termasuk Penghasilan yang Dikenakan PPh Final', 'Penghargaan dan Hadiah'),
(1005, 'Tidak Termasuk Penghasilan yang Dikenakan PPh Final', 'Keuntungan dari Penjualan/ Pengalihan Harta'),
(1006, 'Tidak Termasuk Penghasilan yang Dikenakan PPh Final', 'Penghasilan Lainnya'),
(2001, 'Penghasilan yang Tidak Termasuk Objek Pajak', 'Bantuan/Sumbangan/Hibah'),
(2002, 'Penghasilan yang Tidak Termasuk Objek Pajak', 'Warisan'),
(2003, 'Penghasilan yang Tidak Termasuk Objek Pajak', 'Bagian Laba Anggota Perseroan Komanditer Tidak Atas Saham, Peresekutuan, Perkumpulan, Firma, Kongsi'),
(2004, 'Penghasilan yang Tidak Termasuk Objek Pajak', 'Klaim Asuransi Kesehatan, Kecelakaan, Jiwa, Dwiguna, Beasiswa'),
(2005, 'Penghasilan yang Tidak Termasuk Objek Pajak', 'Beasiswa'),
(2006, 'Penghasilan yang Tidak Termasuk Objek Pajak', 'Penghasilan Lainnya yang Tidak Termasuk Objek Pajak'),
(3001, 'Penghasilan yang Dikenakan PPh Final', 'Bunga Deposito, Tabungan, Diskonto SBI, Surat Berharga Negara (SBN)'),
(3002, 'Penghasilan yang Dikenakan PPh Final', 'Bunga/Diskonto Obligasi'),
(3003, 'Penghasilan yang Dikenakan PPh Final', 'Penjualan Saham'),
(3004, 'Penghasilan yang Dikenakan PPh Final', 'Hadiah Undian'),
(3005, 'Penghasilan yang Dikenakan PPh Final', 'Pesangon, Tunjangan Hari Tua dan Tebusan Pensiun yang Dibayarkan Sekaligus'),
(3006, 'Penghasilan yang Dikenakan PPh Final', 'Honorarium atas Beban APBN/APBD'),
(3007, 'Penghasilan yang Dikenakan PPh Final', 'Pengalihan Hak Atas Tanah dan/atau Bangunan'),
(3008, 'Penghasilan yang Dikenakan PPh Final', 'Sewa Atas Tanah dan/atau Bangunan'),
(3009, 'Penghasilan yang Dikenakan PPh Final', 'Bangunan yang Diterima Dalam Rangka Bangun Guna Serah'),
(3010, 'Penghasilan yang Dikenakan PPh Final', 'Bunga Simpanan yang Dibayarkan Oleh Koperasi Kepada Anggota Koperasi'),
(3011, 'Penghasilan yang Dikenakan PPh Final', 'Penghasilan dari Transaksi Derivatif'),
(3012, 'Penghasilan yang Dikenakan PPh Final', 'Deviden'),
(3013, 'Penghasilan yang Dikenakan PPh Final', 'Penghasilan Istri Dari Satu Pemberi Kerja'),
(6001, 'Pengeluaran', 'Biaya Hidup'),
(6002, 'Pengeluaran', 'Biaya Operasional'),
(6003, 'Pengeluaran', 'Biaya Pendidikan'),
(6004, 'Pengeluaran', 'Biaya Kesehatan'),
(6005, 'Pengeluaran', 'Tagihan'),
(6006, 'Pengeluaran', 'Biaya Insidentil'),
(6007, 'Pengeluaran', 'Biaya Entertainment'),
(6008, 'Pengeluaran', 'Biaya Sosial'),
(6011, 'Pengeluaran', 'Pengeluaran Lain'),
(7001, 'Sumber Dana', 'Bank'),
(7002, 'Sumber Dana', 'Kas'),
(7003, 'Sumber Dana', 'Kartu Kredit'),
(7004, 'Sumber Dana', 'Pinjaman'),
(8001, 'Kode Harta', 'Kas dan Setara Kas'),
(8002, 'Kode Harta', 'Piutang'),
(8003, 'Kode Harta', 'Investasi'),
(8004, 'Kode Harta', 'Alat Transportasi'),
(8005, 'Kode Harta', 'Harta Bergerak Lainnya'),
(8006, 'Kode Harta', 'Harta Tidak Bergerak'),
(6009, 'Pengeluaran', 'Deposit RDN'),
(6010, 'Pengeluaran', 'Pembayaran Pajak'),
(5001, 'Pencairan Dana RDN', 'RDN Withdraw'),
(3014, 'Penghasilan yang Dikenakan PPh Final', 'Penghasilan Lain yang Dikenakan Pajak Final dan/atau Bersifat Final');

-- --------------------------------------------------------

--
-- Table structure for table `coa_sub`
--

CREATE TABLE `coa_sub` (
  `ID` bigint(20) NOT NULL,
  `Nomor_Perkiraan` int(11) NOT NULL,
  `Nama` varchar(300) NOT NULL,
  `Created_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coa_sub`
--

INSERT INTO `coa_sub` (`ID`, `Nomor_Perkiraan`, `Nama`, `Created_by`) VALUES
(100101, 1001, 'Premium', NULL),
(100102, 1001, 'Diskonto', NULL),
(100201, 1002, 'Royalti Pengarang', NULL),
(100202, 1002, 'Hak Paten', NULL),
(100203, 1002, 'Merek Dagang', NULL),
(100301, 1003, 'Sewa Pemakaian Mobil', NULL),
(100302, 1003, 'Sewa Alat-alat Berat', NULL),
(100303, 1003, 'Sewa lainnya selain Tanah/Bangunan', NULL),
(100401, 1004, 'Hadiah Perlombaan', NULL),
(100402, 1004, 'Penghargaan atas Suatu Prestasi', NULL),
(100403, 1004, 'Hadiah/ Penghargaan lainnya yang tidak diundi', NULL),
(100501, 1005, 'Keuntungan pengalihan harta kepada perseroan/persekutuan/badan sebagai pengganti saham/ penyertaan modal', NULL),
(100502, 1005, 'Keuntungan pengalihan harta berupa hibah, bantuan, atau sumbangan kecuali kepada keluarga dan badan sosial', NULL),
(100503, 1005, 'Keuntungan penjualan harta pribadi', NULL),
(100601, 1006, 'Keuntungan pembebasan hutang', NULL),
(100602, 1006, 'Penerimaan dari piutang yang dihapuskan', NULL),
(100603, 1006, 'Keuntungan atas Penjualan Mata Uang Asing', NULL),
(100604, 1006, 'Penghasilan dari anak yang belum dewasa', NULL),
(100605, 1006, 'Penghasilan dari anak angkat yang belum dewasa', NULL),
(200101, 2001, 'Bantuan', NULL),
(200102, 2001, 'Sumbangan', NULL),
(200103, 2001, 'Hibah', NULL),
(200201, 2002, 'Warisan', NULL),
(200301, 2003, 'Laba anggota perseroan komanditar yang modalnya tidak terbagi atas saham, persekutuan, firma dan kongsi', NULL),
(200401, 2004, 'Santunan dari Perusahaan Asuransi', NULL),
(200402, 2004, 'Polis Asuransi Kesehatan', NULL),
(200403, 2004, 'Polis asuransi Kecelakaan', NULL),
(200404, 2004, 'Polis asuransi Jiwa', NULL),
(200405, 2004, 'Polis Asuransi Dwiguna', NULL),
(200406, 2004, 'Polis Asuransi Beasiswa', NULL),
(200501, 2005, 'Beasiswa Dalam Negeri', NULL),
(200502, 2005, 'Beasiswa Luar Negeri', NULL),
(200601, 2006, 'Penghasilan Lainnya yang tidak termasuk objek pajak', NULL),
(400101, 4001, 'Gaji', NULL),
(600101, 6001, 'Makanan', NULL),
(600102, 6001, 'Sembako', NULL),
(600103, 6001, 'Listrik Deddy', '6'),
(600501, 6005, 'Listrik', NULL),
(600502, 6005, 'Air', NULL),
(600503, 6005, 'Internet', NULL),
(600504, 6005, 'Pulsa', NULL),
(600505, 6005, 'Paket Data', NULL),
(600506, 6005, 'Uang Elektronik', NULL),
(600507, 6005, 'Tagihan Kartu Kredit', NULL),
(600508, 6005, 'Gas PGN', NULL),
(600701, 6007, 'Voucher Game', NULL),
(600702, 6007, 'Streaming', NULL),
(600703, 6007, 'Hobi', NULL),
(600801, 6008, 'Donasi', NULL),
(600802, 6008, 'Zakat', NULL),
(601101, 6011, 'Pengeluaran Anak', NULL),
(601102, 6011, 'Pengeluaran Pribadi', NULL),
(3001001, 3001, 'Bunga Deposito', NULL),
(3001002, 3001, 'Bunga Tabungan', NULL),
(3001003, 3001, 'Bunga SBI (Sertifikat Bank Indonesia)', NULL),
(3001004, 3001, 'Bunga SBN (Surat Berharga Negara)', NULL),
(3002001, 3002, 'Bunga Obligasi', NULL),
(3003001, 3003, 'Keuntungan transaksi penjualan saham', NULL),
(3004001, 3004, 'Hadiah Undian', NULL),
(3005001, 3005, 'Uang Pesangon', NULL),
(3005002, 3005, 'Jaminan Hari Tua', NULL),
(3005003, 3005, 'Tunjangan Hari Tua', NULL),
(3005004, 3005, 'Manfaat Pensiun (Tebusan Pensiun yang Dibayar Sekaligus)', NULL),
(3006001, 3006, 'Honorarium Atas Beban APBN', NULL),
(3006002, 3006, 'Honorarium Atas Beban APBD', NULL),
(3007001, 3007, 'Pengalihan hak atas Tanah', NULL),
(3007002, 3007, 'Pengalihan hak atas Bangunan', NULL),
(3008001, 3008, 'Sewa Tanah', NULL),
(3008002, 3008, 'Sewa Rumah', NULL),
(3008003, 3008, 'Sewa Rumah Susun', NULL),
(3008004, 3008, 'Sewa Apartemen', NULL),
(3008005, 3008, 'Sewa Kondominium', NULL),
(3008006, 3008, 'Sewa Gedung', NULL),
(3008007, 3008, 'Sewa Perkantoran', NULL),
(3008008, 3008, 'Sewa Ruangan', NULL),
(3008009, 3008, 'Sewa Ruko', NULL),
(3008010, 3008, 'Sewa Gudang', NULL),
(3009001, 3009, 'Bangunan yang diterima dalam rangka Bangun Guna Serah', NULL),
(3010001, 3010, 'Bunga Simpanan Koperasi', NULL),
(3011001, 3010, 'Penghasilan Dari Transaksi Derivatif', NULL),
(3012001, 3012, 'Deviden atas Saham', NULL),
(3013001, 3013, 'Penghasilan Isteri dari Satu Pemberi Kerja', NULL),
(3014002, 3014, 'Penghasilan Lain yang Dikenakan Pajak Final dan/atau Bersifat Final', NULL),
(5001001, 5001, 'Pencairan Dana RDN', NULL),
(6009001, 6009, 'Deposit Dana RDN', NULL),
(6010001, 6010, 'Pembayaran Pajak Penghasilan Global', NULL),
(6010002, 6010, 'Pembayaran Pajak Penghasilan Angsuran', NULL),
(8001011, 8001, 'Uang Tunai', NULL),
(8001012, 8001, 'Tabungan', NULL),
(8001013, 8001, 'Giro', NULL),
(8001014, 8001, 'Deposito', NULL),
(8001019, 8001, 'Setara Kas Lainnya', NULL),
(8002021, 8002, 'Piutang', NULL),
(8002022, 8002, 'Piutang Afiliasi', NULL),
(8002029, 8002, 'Piutang Lainnya', NULL),
(8003031, 8003, 'Saham yang dibeli untuk dijual kembali', NULL),
(8003032, 8003, 'Saham', NULL),
(8003033, 8003, 'Obligasi Perusahaan', NULL),
(8003034, 8003, 'Obligasi Pemerintah Indonesia (Obligasi Ritel Indonesia atau ORI, surat berharga syariah negara, dll)', NULL),
(8003035, 8003, 'Surat Utang Lainnya', NULL),
(8003036, 8003, 'Reksadana', NULL),
(8003037, 8003, 'Instrumen Derivatif (right, warran, kontrak berjangka, opsi, dll)', NULL),
(8003038, 8003, 'penyertaan modal dalam perusahaan lain yang tidak atas saham meliputi penyertaan modal pada CV, Firma, dan sejenisnya', NULL),
(8003039, 8003, 'Investasi lainnya', NULL),
(8004041, 8004, 'Sepeda', NULL),
(8004042, 8004, 'Sepeda motor', NULL),
(8004043, 8004, 'Mobil', NULL),
(8004049, 8004, 'Alat transportasi lainnya', NULL),
(8005051, 8005, 'Logam Mulia (emas batangan, emas perhiasan, platina batangan, platina perhiasan, logam mulia lainnya)', NULL),
(8005052, 8005, 'Batu Mulia (intan, berlian, batu mulia lainnya)', NULL),
(8005053, 8005, 'Barang-barang seni dan antik (barang-barang seni, barang-barang antik)', NULL),
(8005054, 8005, 'Kapal pesiar, pesawat terbang, helikopter, jetski, peralatan olahraga khusus', NULL),
(8005055, 8005, 'Peralatan elektronik, furnitur', NULL),
(8005059, 8005, 'Harta bergerak lainnya', NULL),
(8006061, 8006, 'Tanah dan/atau bangunan untuk tempat tinggal.', NULL),
(8006062, 8006, 'Tanah dan/atau bangunan untuk usaha (toko, pabrik, gudang, dan sejenisnya)', NULL),
(8006063, 8006, 'Tanah atau lahan untuk usaha (lahan pertanian, perkebunan, perikanan darat, dan sejenisnya)', NULL),
(8006069, 8006, 'Harta tidak gerak lainnya', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dana_impian`
--

CREATE TABLE `dana_impian` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Tanggal` date NOT NULL,
  `Tanggal_Pencapaian` date DEFAULT NULL,
  `Jumlah` bigint(20) NOT NULL,
  `Keterangan` varchar(300) NOT NULL,
  `Masuk_Ke` int(30) NOT NULL,
  `Created_at` datetime NOT NULL,
  `Updated_at` datetime DEFAULT NULL,
  `Show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dana_impian`
--

INSERT INTO `dana_impian` (`ID_Record`, `ID_WP`, `Judul`, `Tanggal`, `Tanggal_Pencapaian`, `Jumlah`, `Keterangan`, `Masuk_Ke`, `Created_at`, `Updated_at`, `Show_status`) VALUES
(1, 6, 'Liburan Ke Thailand', '2022-05-18', NULL, 30000000, '-', 0, '2022-05-18 03:24:12', NULL, 1),
(2, 6, 'Liburan Ke Malaysia', '2022-05-18', NULL, 25000000, 'Harus foto di twin tower', 2, '2022-05-18 03:39:24', '2022-05-19 01:23:03', 1),
(3, 6, 'Beli Server Baru', '2022-05-18', NULL, 9000000, '-', 1, '2022-05-18 03:39:42', NULL, 1),
(4, 6, 'liburan menyelam ke lautan', '2022-05-18', '2022-10-20', 7000000, 'laut nusa bali', 0, '2022-05-18 06:46:48', '2022-05-18 06:47:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_wp`
--

CREATE TABLE `data_wp` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Nama_Lengkap` varchar(300) NOT NULL,
  `NIK` varchar(100) DEFAULT NULL,
  `NPWP` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Pekerjaan` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `harta`
--

CREATE TABLE `harta` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Kategori_Harta` int(11) NOT NULL,
  `Kategori_Sub_Harta` int(11) NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `Nilai` bigint(20) NOT NULL,
  `Keterangan` varchar(400) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harta`
--

INSERT INTO `harta` (`ID_Record`, `ID_WP`, `Kategori_Harta`, `Kategori_Sub_Harta`, `Tanggal`, `Nilai`, `Keterangan`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, 8001, 8001011, '2022-01-01', 25000000000, '-', '2022-04-27 08:50:59', '2022-04-27 10:21:18', 1),
(2, 6, 8004, 8004043, '2021-05-25', 450000000, 'masih mulusss', '2022-04-27 08:51:33', '2022-04-27 10:27:53', 1),
(3, 6, 8001, 8001012, '2022-03-25', 1000000000, '-', '2022-04-27 08:52:15', NULL, 1),
(4, 6, 8004, 8004043, '2022-04-28', 400000000, 'Innova Reborn', '2022-04-28 03:13:52', '2022-05-12 01:15:26', 1),
(5, 6, 8005, 8005051, '2022-04-28', 37000000, 'Kalung emas rantai', '2022-04-28 03:14:29', '2022-05-12 01:16:36', 0),
(6, 6, 8005, 8005052, '2022-04-28', 90000000, 'Blue Diamond', '2022-04-28 03:17:05', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `harta_sub`
--

CREATE TABLE `harta_sub` (
  `ID_Record` int(11) NOT NULL,
  `ID_Parent` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Jenis` varchar(300) NOT NULL,
  `Deskripsi` varchar(400) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harta_sub`
--

INSERT INTO `harta_sub` (`ID_Record`, `ID_Parent`, `ID_WP`, `Jenis`, `Deskripsi`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 1, 6, 'Tahun', '2020', '2022-04-27 08:50:59', '2022-04-27 10:21:18', 1),
(2, 2, 6, 'Tahun', '2022', '2022-04-27 08:51:34', '2022-04-27 10:27:53', 1),
(3, 2, 6, 'Merek', 'Toyota', '2022-04-27 08:51:34', '2022-04-27 10:27:53', 1),
(4, 2, 6, 'Jenis', 'Innova Reborn Black Metallic', '2022-04-27 08:51:34', '2022-04-27 10:27:53', 1),
(5, 3, 6, 'Tahun', '-', '2022-04-27 08:52:15', NULL, 1),
(6, 3, 6, 'Negara', '-', '2022-04-27 08:52:15', NULL, 1),
(7, 3, 6, 'Nama Bank', '-', '2022-04-27 08:52:15', NULL, 1),
(8, 3, 6, 'Nomor Rekening', '-', '2022-04-27 08:52:15', NULL, 1),
(9, 4, 6, 'Tahun', '2020', '2022-04-28 03:13:52', '2022-05-12 01:15:26', 1),
(10, 4, 6, 'Merek', 'Toyota', '2022-04-28 03:13:52', '2022-05-12 01:15:26', 1),
(11, 4, 6, 'Jenis', 'Innova Diesel Type V', '2022-04-28 03:13:52', '2022-05-12 01:15:26', 1),
(12, 5, 6, 'Tahun', '2019', '2022-04-28 03:14:29', '2022-05-12 01:16:36', 0),
(13, 6, 6, 'Tahun', '2020', '2022-04-28 03:17:05', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Tanggal_JatuhTempo` date DEFAULT NULL,
  `Jumlah` bigint(20) NOT NULL,
  `Pemberi_Pinjaman` varchar(300) NOT NULL,
  `Alamat` varchar(300) NOT NULL,
  `Keterangan` varchar(300) NOT NULL,
  `Masuk_Ke` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`ID_Record`, `ID_WP`, `Tanggal`, `Tanggal_JatuhTempo`, `Jumlah`, `Pemberi_Pinjaman`, `Alamat`, `Keterangan`, `Masuk_Ke`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, '2022-01-07', '2022-01-10', 300000, 'Pak Doraemon', 'Jakarta', 'hutang 123', '1', '2022-01-25 15:25:55', '2022-04-27 04:51:11', 1),
(2, 6, '2022-01-14', '0000-00-00', 123, 'Minions', 'Jakarta', 'aaaa', '-', '2022-01-25 15:26:11', NULL, 1),
(3, 6, '2022-01-24', '2022-01-29', 100000, 'Tetangga sebelah', 'Jakarta', 'hutang belum exp', '1', '2022-01-25 15:37:56', NULL, 1),
(4, 6, '2022-01-25', '2022-01-25', 123123, 'Tetangga depan', 'Jakarta', 'Hutang Exp Hari ini', '1', '2022-01-25 15:40:47', NULL, 1),
(5, 6, '2022-04-12', '2022-04-30', 70000, 'Thor', 'Jakarta', '-', '-', '2022-04-12 07:51:26', '2022-04-12 07:51:26', 1),
(6, 6, '2022-04-27', NULL, 300000, 'elon', 'Jakarta', 'musk', '-', '2022-04-27 04:48:29', '2022-04-27 04:48:29', 1),
(7, 6, '2022-04-27', NULL, 1231231, 'aaa', 'Jakarta', 'abc', '1', '2022-04-27 04:51:26', '2022-04-27 04:51:26', 0),
(8, 6, '2022-04-27', NULL, 123, 'aaa', 'Jakarta', 'aaa', '-', '2022-04-27 04:53:25', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `ID_Records` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Nama` varchar(300) NOT NULL,
  `NIK` varchar(30) DEFAULT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Hubungan_Keluarga` varchar(100) NOT NULL,
  `Pekerjaan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`ID_Records`, `ID_WP`, `Nama`, `NIK`, `Tanggal_Lahir`, `Hubungan_Keluarga`, `Pekerjaan`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, 'putin', '123123', '2021-11-04', 'Suami', 'Wirausaha', '2022-04-02 03:19:49', '2022-04-02 03:19:49', 1),
(2, 6, 'erick', '3213123', '2022-04-02', 'Anak Kandung', 'Wirausaha', '2022-04-02 03:21:05', '2022-04-02 03:21:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_rdn`
--

CREATE TABLE `mutasi_rdn` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Tipe` varchar(30) NOT NULL,
  `Transfer_Dari` int(11) NOT NULL,
  `Transfer_Ke` int(11) NOT NULL,
  `Jumlah` bigint(20) NOT NULL,
  `Keterangan` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi_rdn`
--

INSERT INTO `mutasi_rdn` (`ID_Record`, `ID_WP`, `Tipe`, `Transfer_Dari`, `Transfer_Ke`, `Jumlah`, `Keterangan`, `created_at`, `updated_at`, `show_status`) VALUES
(2, 6, 'DEPOSIT', 2, 1, 10000000, '-', '2022-05-12 07:41:14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pajak_tarif_ptkp`
--

CREATE TABLE `pajak_tarif_ptkp` (
  `Tahun_Berlaku` varchar(4) NOT NULL,
  `Kode` varchar(9) NOT NULL,
  `Keterangan` varchar(300) NOT NULL,
  `Jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pajak_tarif_ptkp`
--

INSERT INTO `pajak_tarif_ptkp` (`Tahun_Berlaku`, `Kode`, `Keterangan`, `Jumlah`) VALUES
('2013', 'TK/0', 'WP Tidak Kawin Tanpa Tanggungan', 24300000),
('2013', 'TK/1', 'WP Tidak Kawin Punya 1 Tanggungan', 26325000),
('2013', 'TK/2', 'WP Tidak Kawin Punya 2 Tanggungan', 28350000),
('2013', 'TK/3', 'WP Tidak Kawin Punya 3 Tanggungan', 30375000),
('2013', 'K/0', 'WP Kawin Tanpa Tanggungan', 26325000),
('2013', 'K/1', 'WP Kawin Punya 1 Tanggungan', 28350000),
('2013', 'K/2', 'WP Kawin Punya 2 Tanggungan', 30375000),
('2013', 'K/3', 'WP Kawin Punya 3 Tanggungan', 32400000),
('2013', 'K/I/0', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Tanpa Tanggungan', 50625000),
('2013', 'K/I/1', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 1 Tanggungan', 52650000),
('2013', 'K/I/2', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 2 Tanggungan', 54675000),
('2013', 'K/I/3', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 3 Tanggungan', 56700000),
('2015', 'TK/0', 'WP Tidak Kawin Tanpa Tanggungan', 36000000),
('2015', 'TK/1', 'WP Tidak Kawin Punya 1 Tanggungan', 39000000),
('2015', 'TK/2', 'WP Tidak Kawin Punya 2 Tanggungan', 42000000),
('2015', 'TK/3', 'WP Tidak Kawin Punya 3 Tanggungan', 45000000),
('2015', 'K/0', 'WP Kawin Tanpa Tanggungan', 39000000),
('2015', 'K/1', 'WP Kawin Punya 1 Tanggungan', 42000000),
('2015', 'K/2', 'WP Kawin Punya 2 Tanggungan', 45000000),
('2015', 'K/3', 'WP Kawin Punya 3 Tanggungan', 48000000),
('2015', 'K/I/0', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Tanpa Tanggungan', 75000000),
('2015', 'K/I/1', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 1 Tanggungan', 78000000),
('2015', 'K/I/2', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 2 Tanggungan', 81000000),
('2015', 'K/I/3', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 3 Tanggungan', 84000000),
('2016', 'TK/0', 'WP Tidak Kawin Tanpa Tanggungan', 54000000),
('2016', 'TK/1', 'WP Tidak Kawin Punya 1 Tanggungan', 58500000),
('2016', 'TK/2', 'WP Tidak Kawin Punya 2 Tanggungan', 63000000),
('2016', 'TK/3', 'WP Tidak Kawin Punya 3 Tanggungan', 67500000),
('2016', 'K/0', 'WP Kawin Tanpa Tanggungan', 58500000),
('2016', 'K/1', 'WP Kawin Punya 1 Tanggungan', 63000000),
('2016', 'K/2', 'WP Kawin Punya 2 Tanggungan', 67500000),
('2016', 'K/3', 'WP Kawin Punya 3 Tanggungan', 72000000),
('2016', 'K/I/0', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Tanpa Tanggungan', 112500000),
('2016', 'K/I/1', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 1 Tanggungan', 117000000),
('2016', 'K/I/2', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 2 Tanggungan', 121500000),
('2016', 'K/I/3', 'WP Kawin dan Penghasilan Istri digabung Penghasilan Suami Punya 3 Tanggungan', 126000000);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `membership` varchar(30) NOT NULL,
  `start_membership` datetime NOT NULL,
  `exp_membership` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `name`, `email`, `password`, `membership`, `start_membership`, `exp_membership`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 'parents_gold', 'pgold@gmail.com', '$2y$10$e/VV87RhaA/ZxJZlPze8SOYiapLHqfxYhqYaCV1HqCvC2TMwDYROO', 'GOLD', '2022-04-09 03:32:34', '2022-10-09 03:32:34', '2022-04-09 03:32:34', '2022-04-09 03:32:34', 1),
(2, 'parents_platinum', 'pplat@gmail.com', '$2y$10$.VMKiS9gLreVi3wOQlVC5.kQlGPwsD7g0B1iwOTfrGSJZXPiK3sD.', 'PLATINUM', '2022-04-09 03:32:34', '2023-04-09 03:32:34', '2022-04-09 03:32:34', '2022-04-09 03:32:34', 1),
(3, 'parents_free', 'pfree@gmail.com', '$2y$10$D7hgdeE8h727tdttX7VKJOOLULA9FmfnRGoC..wY2GIXif6IJe04C', 'FREE', '2022-04-09 03:50:07', '2022-07-09 03:50:07', '2022-04-09 03:50:07', '2022-04-09 03:50:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Nomor_Perkiraan` int(11) NOT NULL,
  `Sub_Nomor_Perkiraan` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jumlah` bigint(20) NOT NULL,
  `Keterangan` varchar(300) NOT NULL,
  `Masuk_Ke` int(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`ID_Record`, `ID_WP`, `Nomor_Perkiraan`, `Sub_Nomor_Perkiraan`, `Tanggal`, `Jumlah`, `Keterangan`, `Masuk_Ke`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, 4001, 400101, '2021-01-08', 7000000, 'Gaji Januari 2021', 1, '2022-01-20 04:43:50', NULL, 1),
(2, 6, 1004, 100403, '2022-01-21', 1000000, 'Hadiah Perlombaan Best Staff in The Month', 3, '2022-01-20 04:46:50', '2022-02-07 07:31:15', 1),
(3, 6, 4001, 400101, '2021-02-10', 7000000, 'Gaji Februari 2021', 1, '2022-01-20 06:03:18', NULL, 1),
(4, 6, 4001, 400101, '2021-03-12', 7000000, 'Gaji Maret 2021', 1, '2022-01-20 06:08:33', NULL, 1),
(5, 6, 4001, 400101, '2021-04-09', 7000000, 'Gaji Maret 2021', 1, '2022-01-20 06:10:35', NULL, 1),
(6, 6, 4001, 400101, '2021-05-11', 7000000, 'Gaji Mei 2021', 1, '2022-01-20 06:10:49', NULL, 1),
(7, 6, 4001, 400101, '2021-06-10', 7000000, 'Gaji Juni 2021', 1, '2022-01-20 06:11:01', NULL, 1),
(8, 6, 4001, 400101, '2021-07-10', 7000000, 'Gaji Juli 2021', 1, '2022-01-20 06:11:20', NULL, 1),
(9, 6, 4001, 400101, '2021-08-10', 7000000, 'Gaji Agustus 2021', 1, '2022-01-20 06:11:35', NULL, 1),
(10, 6, 4001, 400101, '2021-09-10', 7000000, 'Gaji September 2021', 1, '2022-01-20 06:11:51', NULL, 1),
(11, 6, 4001, 400101, '2021-10-10', 7000000, 'Gaji Oktober 2021', 1, '2022-01-20 06:12:12', NULL, 1),
(12, 6, 4001, 400101, '2021-11-10', 7000000, 'Gaji November 2021', 1, '2022-01-20 06:12:33', NULL, 1),
(13, 6, 4001, 400101, '2021-12-10', 7000000, 'Gaji Desember 2021', 1, '2022-01-20 06:12:51', NULL, 1),
(14, 6, 1002, 100201, '2022-01-24', 4000000, 'Buku Ajaran Baru 2022', 1, '2022-01-24 04:33:34', NULL, 1),
(16, 4, 4001, 400101, '2022-01-10', 6000000, 'Gaji Januari 2022', 4, '2022-01-24 04:37:31', '2022-02-07 07:49:14', 1),
(17, 6, 4001, 400101, '2022-02-10', 7000000, 'Gaji Februari 2022', 1, '2022-01-25 03:51:01', NULL, 1),
(18, 6, 1004, 100401, '2022-02-01', 2500000, 'Perlombaan Imlek 2022', 2, '2022-02-02 04:34:04', NULL, 1),
(19, 6, 1004, 100403, '2022-02-01', 1700000, 'Jackpot Sincia 2022', 1, '2022-02-02 04:34:50', NULL, 1),
(20, 6, 2005, 200502, '2021-12-01', 400000, 'Beasiswa Desember 2021', 1, '2022-02-02 14:52:59', NULL, 1),
(21, 6, 1003, 100301, '2022-02-06', 600000, 'Sewa Mobilio Pak Tono', 2, '2022-02-06 14:12:26', '2022-02-06 14:13:22', 1),
(22, 6, 1006, 100603, '2022-02-07', 300000, '-', 1, '2022-02-07 03:39:12', '2022-04-27 05:59:03', 1),
(23, 6, 4001, 400101, '2022-03-10', 7000000, 'Gaji Maret 2022', 2, '2022-02-07 03:40:07', NULL, 1),
(24, 4, 4001, 400101, '2022-02-07', 6000000, 'Gaji Februari 2022', 4, '2022-02-07 07:48:32', NULL, 1),
(25, 6, 4001, 400101, '2022-04-06', 7000000, 'Gaji April 2022', 1, '2022-04-06 02:31:42', '2022-04-06 02:31:42', 1),
(26, 6, 1004, 100401, '2022-04-12', 2500000, 'Lomba Lari Lari', 1, '2022-04-12 01:19:16', '2022-04-27 06:00:32', 1),
(27, 6, 1004, 100402, '2022-04-12', 1500000, 'Lomba UI/UX PT Cemerlang Berjaya', 1, '2022-04-12 01:20:03', '2022-04-12 01:20:03', 1),
(28, 1, 4001, 400101, '2021-01-01', 3000000, 'Gaji 2021', 5, '2022-04-12 01:44:14', '2022-04-12 01:44:14', 1),
(29, 1, 4001, 400101, '2021-02-01', 3000000, 'Gaji Februari 2021', 5, '2022-04-12 01:44:33', '2022-04-12 01:44:33', 1),
(30, 1, 4001, 400101, '2021-03-12', 3000000, 'Gaji Maret 2021', 5, '2022-04-12 01:44:53', '2022-04-12 01:44:53', 1),
(31, 1, 4001, 400101, '2021-04-12', 3000000, 'Gaji April 2021', 5, '2022-04-12 01:45:09', '2022-04-12 01:45:09', 1),
(32, 1, 4001, 400101, '2021-05-12', 3000000, 'Gaji Mei 2021', 5, '2022-04-12 01:53:06', '2022-04-12 01:53:06', 1),
(33, 1, 4001, 400101, '2021-06-12', 3000000, 'Gaji Juni 2021', 5, '2022-04-12 01:53:22', '2022-04-12 01:53:22', 1),
(34, 1, 4001, 400101, '2021-07-12', 3000000, 'Gaji Juli 2021', 5, '2022-04-12 01:53:35', '2022-04-12 01:53:35', 1),
(35, 1, 4001, 400101, '2021-08-12', 3000000, 'Gaji Agustus 2021', 5, '2022-04-12 01:53:48', '2022-04-12 01:53:48', 1),
(36, 1, 4001, 400101, '2021-09-12', 3000000, 'Gaji September 2021', 5, '2022-04-12 01:53:58', '2022-04-12 01:53:58', 1),
(37, 1, 4001, 400101, '2021-10-12', 3000000, 'Gaji Oktober 2021', 5, '2022-04-12 01:54:10', '2022-04-12 01:54:10', 1),
(38, 1, 4001, 400101, '2021-11-12', 3000000, 'Gaji November 2021', 5, '2022-04-12 01:54:29', '2022-04-12 01:54:29', 1),
(39, 1, 4001, 400101, '2021-12-12', 3000000, 'Gaji Desember 2021', 5, '2022-04-12 01:54:41', '2022-04-12 01:54:41', 1),
(40, 1, 1002, 100201, '2022-04-12', 7000000, 'Royalti Buku Anda Pasti Bisa', 5, '2022-04-12 01:57:28', '2022-04-12 01:57:28', 1),
(41, 1, 1002, 100202, '2022-04-12', 1700000, 'Hak Paten Kemasan Zipper', 6, '2022-04-12 01:58:24', '2022-04-12 01:58:24', 1),
(42, 6, 4001, 400101, '2022-04-27', 7000000, 'Gaji Mei 2022', 1, '2022-04-27 04:52:16', '2022-04-27 04:52:16', 1),
(43, 6, 5001, 5001001, '2022-05-12', 10000000, '-', 1, '2022-05-12 07:13:49', NULL, 1),
(44, 6, 5001, 5001001, '2022-05-12', 10000000, '-', 1, '2022-05-12 07:15:37', NULL, 1),
(45, 6, 1004, 100401, '2022-05-12', 10000000, '-', 2, '2022-05-12 07:20:14', NULL, 1),
(46, 6, 4001, 400101, '2020-01-09', 10000000, '-', 10, '2022-05-12 12:20:15', NULL, 1),
(47, 6, 1002, 100202, '2020-05-12', 3000000, '-', 10, '2022-05-12 12:20:38', NULL, 1),
(48, 6, 4001, 400101, '2022-04-10', 7000000, 'Gaji April 2022', 1, '2022-05-16 01:51:37', NULL, 1),
(49, 6, 4001, 400101, '2022-07-19', 20000000, '-', 1, '2022-05-19 03:29:12', NULL, 1),
(50, 6, 4001, 400101, '2022-10-19', 30000000, '-', 1, '2022-05-19 03:42:34', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Nomor_Perkiraan` int(11) NOT NULL,
  `Sub_Nomor_Perkiraan` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jumlah` bigint(20) NOT NULL,
  `Keterangan` varchar(300) NOT NULL,
  `Sumber_Dana` int(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`ID_Record`, `ID_WP`, `Nomor_Perkiraan`, `Sub_Nomor_Perkiraan`, `Tanggal`, `Jumlah`, `Keterangan`, `Sumber_Dana`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, 6005, 600504, '2022-01-21', 100000, 'Pulsa Telkomsel', 1, '2022-01-25 14:07:04', NULL, 1),
(2, 6, 6009, 600901, '2022-01-22', 250000, 'Mainan di Timezone', 1, '2022-01-25 14:32:14', NULL, 1),
(3, 6, 6005, 600505, '2022-01-24', 70000, 'Paket Combo 25GB', 1, '2022-01-25 14:33:11', NULL, 1),
(4, 6, 6007, 600702, '2022-02-07', 300000, 'VIU', 1, '2022-02-07 07:36:40', NULL, 1),
(5, 6, 6001, 600101, '2022-04-27', 450000, 'All you can eat hahaha', 1, '2022-04-27 05:00:35', '2022-04-27 05:04:59', 1),
(9, 6, 6009, 6009001, '2022-05-12', 10000000, '-', 2, '2022-05-12 07:41:14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reksadana`
--

CREATE TABLE `reksadana` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Action` varchar(30) NOT NULL,
  `Tanggal_Transaksi` date NOT NULL,
  `Nama` varchar(300) NOT NULL,
  `Jenis` varchar(90) NOT NULL,
  `NAB_UP` bigint(20) NOT NULL,
  `Jumlah` bigint(20) NOT NULL,
  `Harga_Total` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rumus_pph_terutang`
--

CREATE TABLE `rumus_pph_terutang` (
  `id` int(11) NOT NULL,
  `kode` varchar(90) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `prosentase` double NOT NULL,
  `batas` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rumus_pph_terutang`
--

INSERT INTO `rumus_pph_terutang` (`id`, `kode`, `nama`, `prosentase`, `batas`) VALUES
(1, '3001', 'Bunga Deposito, Tabungan, Diskonto SBI, Surat Berharga', 0.2, -1),
(2, '3002', 'Bunga/Diskonto Obligasi', 0.15, -1),
(3, '3003', 'Penjualan Saham', 0.1, -1),
(4, '3004', 'Dividen', 0.1, -1),
(5, '3005', 'Hadiah Undian', 0.25, -1),
(6, '3006', 'Pesangon, Tunjangan Hari Tua, Tebusan Pensiun', 0.05, 50000000),
(7, '3006', 'Pesangon, Tunjangan Hari Tua, Tebusan Pensiun', 0.15, 100000000),
(8, '3006', 'Pesangon, Tunjangan Hari Tua, Tebusan Pensiun', 0.25, 500000000),
(9, '3007', 'Honorarium Atas Beban APBN/APBD', 0.15, -1),
(10, '3008', 'Pengalihan Hak Atas Tanah dan/atau Bangunan', 0.05, -1),
(11, '3009', 'Sewa Tanah dan atau Bangunan', 0.1, -1),
(12, '3010', 'Bangunan yang diterima dalam Rangka Bangun Guna Serah', 0.15, -1),
(13, '3011', 'Bunga Simpanan yang dibayarkan oleh Koperasi', 0.1, -1),
(14, '3012', 'Penghasilan dari Transaksi Derivatif', 0.025, -1),
(15, '4001', 'Penghasilan Utama', 0.05, 60000000),
(16, '4001', 'Penghasilan Utama', 0.15, 250000000),
(17, '4001', 'Penghasilan Utama', 0.25, 500000000),
(18, '4001', 'Penghasilan Utama', 0.3, 5000000000),
(19, '4001', 'Penghasilan Utama', 0.35, -1);

-- --------------------------------------------------------

--
-- Table structure for table `saham`
--

CREATE TABLE `saham` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Action` varchar(30) NOT NULL,
  `Tanggal_Transaksi` date NOT NULL,
  `Product` varchar(30) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Harga_Satuan` int(11) NOT NULL,
  `Harga_Total` bigint(20) NOT NULL,
  `Masuk_Ke` int(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saham`
--

INSERT INTO `saham` (`ID_Record`, `ID_WP`, `Action`, `Tanggal_Transaksi`, `Product`, `Jumlah`, `Harga_Satuan`, `Harga_Total`, `Masuk_Ke`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, 'BUY', '2022-05-12', 'BBNI', 10, 6700, 6700000, 1, '2022-05-12 07:48:47', NULL, 1),
(2, 6, 'BUY', '2022-05-14', 'BBNI', 10, 6500, 6500000, 1, '2022-05-20 07:21:42', NULL, 1),
(3, 6, 'BUY', '2022-05-20', 'BBTN', 10, 8000, 8000000, 1, '2022-05-20 07:23:28', NULL, 1),
(4, 6, 'BUY', '2022-05-21', 'SRTG', 10, 4000, 4000000, 2, '2022-05-21 03:12:30', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekuritas`
--

CREATE TABLE `sekuritas` (
  `ID_Records` int(11) NOT NULL,
  `Kode_Sekuritas` varchar(30) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Inisial` varchar(30) DEFAULT NULL,
  `Logo` varchar(300) DEFAULT NULL,
  `Show_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekuritas`
--

INSERT INTO `sekuritas` (`ID_Records`, `Kode_Sekuritas`, `Nama`, `Inisial`, `Logo`, `Show_Status`) VALUES
(1, '1', 'AJAIB', '', '', 1),
(2, '2', 'BAHANA', '', '', 1),
(3, '3', 'BCA SEKURITAS', '', '', 1),
(4, '4', 'BNI SEKURITAS', '', '', 1),
(5, '5', 'CIMB SEKURITAS', '', '', 1),
(6, '6', 'DANAREKSA SEKURITAS', '', '', 1),
(7, '7', 'DHANAWIBAWA', '', '', 1),
(8, '8', 'ERDIKHA SEKURITAS', '', '', 1),
(9, '9', 'FAC SEKURITAS', '', '', 1),
(10, '10', 'HP FINANCIALS', '', '', 1),
(11, '11', 'INDOPREMIER', '', '', 1),
(12, '12', 'INDOSURYA BERSINAR SEKURITAS', '', '', 1),
(13, '13', 'INTI TELADAN SEKURITAS', '', '', 1),
(14, '14', 'JASA UTAMA CAPITAL', '', '', 1),
(15, '15', 'KIWOOM SEKURITAS', '', '', 1),
(16, '16', 'KRESNA SEKURITAS', '', '', 1),
(17, '17', 'MANDIRI SEKURITAS', '', '', 1),
(18, '18', 'MAYBANK SEKURITAS', '', '', 1),
(19, '19', 'MEGACAPITAL SEKURITAS', '', '', 1),
(20, '20', 'MINNA PADI INVESTAMA SEKURITAS', '', '', 1),
(21, '21', 'MIRAE ASEET SEKURITAS', '', '', 1),
(22, '22', 'MNC SEKURITAS', '', '', 1),
(23, '23', 'NH KORINDO SEKURITAS', '', '', 1),
(24, '24', 'NISP SEKURITAS', '', '', 1),
(25, '25', 'OCBC SEKURITAS', '', '', 1),
(26, '26', 'OSO SEKURITAS', '', '', 1),
(27, '27', 'PACIFIC 2000 SEKURITAS', '', '', 1),
(28, '28', 'RELIANCE SEKURITAS', '', '', 1),
(29, '29', 'RHB SEKURITAS', '', '', 1),
(30, '30', 'SAMUEL SEKURITAS', '', '', 1),
(31, '31', 'SINARMAS SEKURITAS', '', '', 1),
(32, '32', 'SUCOR SEKURITAS', '', '', 1),
(33, '33', 'TRIMEGAH SEKURITAS', '', '', 1),
(34, '34', 'UNIVERSAL BROKER INDONESIA SEKURITAS', '', '', 1),
(35, '35', 'UOB SEKURITAS', '', '', 1),
(36, '36', 'VALBURY SEKURITAS', '', '', 1),
(37, '37', 'VICTORIA SEKURITAS', '', '', 1),
(38, '38', 'WANTEG SEKURITAS', '', '', 1),
(39, '39', 'YUANTA SEKURITAS', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Jenis` varchar(300) NOT NULL,
  `Inisial` varchar(300) NOT NULL,
  `No_Rekening` varchar(300) NOT NULL,
  `Nama_Bank` varchar(300) NOT NULL,
  `Pemilik_Rekening` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumber_dana`
--

INSERT INTO `sumber_dana` (`ID_Record`, `ID_WP`, `Jenis`, `Inisial`, `No_Rekening`, `Nama_Bank`, `Pemilik_Rekening`, `created_at`, `updated_at`) VALUES
(1, 6, 'KAS', 'Kas Utama', '-', '-', '-', '2022-02-07 03:14:26', NULL),
(2, 6, 'BANK', 'BCA Kertajaya', '177127888', '14', 'SUSI MULYANI', '2022-02-07 03:17:02', NULL),
(3, 6, 'BANK', 'OCBC Madiun', '127800071777', '28', 'ERICK MARSUDI', '2022-02-07 06:56:28', NULL),
(4, 4, 'KAS', 'Tabungan', '-', '-', '-', '2022-02-07 07:47:53', NULL),
(5, 1, 'KAS', 'Kas Utama', '-', '-', '-', '2022-02-07 07:47:20', NULL),
(6, 1, 'BANK', 'CIMB Sudirman', '237821947201', '22', 'GITA WIRJAWAN', '2022-02-07 07:47:20', NULL),
(7, 5, 'KAS', 'Dana Kas', '-', '-', '-', '2022-04-12 02:56:33', NULL),
(8, 3, 'KAS', 'DANA KAS', '-', '-', '-', '2022-04-12 04:56:57', NULL),
(10, 6, 'BANK', 'BRI MADIUN', '123123789', '2', 'Caca', '2022-05-12 05:36:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sumber_rdn`
--

CREATE TABLE `sumber_rdn` (
  `ID_Record` int(11) NOT NULL,
  `ID_WP` int(11) NOT NULL,
  `Inisial_RDN` varchar(30) NOT NULL,
  `No_Rekening` varchar(30) NOT NULL,
  `Kode_Sekuritas` varchar(30) NOT NULL,
  `Pemilik_Rekening` varchar(90) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumber_rdn`
--

INSERT INTO `sumber_rdn` (`ID_Record`, `ID_WP`, `Inisial_RDN`, `No_Rekening`, `Kode_Sekuritas`, `Pemilik_Rekening`, `created_at`, `updated_at`, `show_status`) VALUES
(1, 6, 'MYIPOT', '123789789', '11', 'VALENCIA', '2022-05-12 07:39:36', NULL, 1),
(2, 6, 'Bions', '72182977', '4', 'Luhut', '2022-05-21 03:11:41', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_parents` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_parents`, `nama_lengkap`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, 1, 'Gita', 'gita_wirjawan@gmail.com', '$2y$10$bVbsFRMA6LEJs67FI2CcBOqSnvkp9hGJtprzSQ1fPPk3zbUjNgN7m', '2022-01-18 13:15:44', '2022-01-18 13:15:44'),
(3, 1, 'gunawan', 'gunawan@gmail.com', '$2y$10$G.fgzKb/gE/vy4/JkiDP0u3T90hBBCA8sl35yP/gqGeOGZ3jbe6Fe', '2022-01-18 13:16:22', '2022-01-18 13:16:22'),
(4, 2, 'tashya', 'tashya@gmail.com', '$2y$10$S0rMN/zyl7bKlnLH7pTAkeyadp0XxvRfeNwGiOiCMosq8ZLOWzz9u', '2022-01-18 13:16:38', '2022-01-18 13:16:38'),
(5, 2, 'piggy', 'piggy@gmail.com', '$2y$10$/t3tK/VoaOuJOjNHeZuDo.ZlgYMfVyMY/stNQF2mXH5A8i5Lx1mzq', '2022-01-18 13:17:00', '2022-01-18 13:17:00'),
(6, 2, 'unicorn', 'unicorn@gmail.com', '$2y$10$ukm97tUJ.AEOHsGhJkwtc.zNW0meK7NqYjO/2QZ.GtwXt05Kxp0Fu', '2022-01-18 13:17:11', '2022-01-18 13:17:11'),
(7, 0, 'user_free', 'pfree@gmail.com', '$2y$10$lEzKwVxGmp6J/FwDywU3yuR52.zNWHCKiUrabOifq1BZgVFlkZkY2', '2022-04-09 03:50:07', '2022-04-09 03:50:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgeting`
--
ALTER TABLE `budgeting`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `bukti_potong`
--
ALTER TABLE `bukti_potong`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `coa_sub`
--
ALTER TABLE `coa_sub`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `dana_impian`
--
ALTER TABLE `dana_impian`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `data_wp`
--
ALTER TABLE `data_wp`
  ADD PRIMARY KEY (`ID_Record`),
  ADD UNIQUE KEY `ID_WP` (`ID_WP`),
  ADD UNIQUE KEY `NIK` (`NIK`);

--
-- Indexes for table `harta`
--
ALTER TABLE `harta`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `harta_sub`
--
ALTER TABLE `harta_sub`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`ID_Records`),
  ADD UNIQUE KEY `NIK` (`NIK`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_rdn`
--
ALTER TABLE `mutasi_rdn`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `reksadana`
--
ALTER TABLE `reksadana`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `rumus_pph_terutang`
--
ALTER TABLE `rumus_pph_terutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saham`
--
ALTER TABLE `saham`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `sekuritas`
--
ALTER TABLE `sekuritas`
  ADD PRIMARY KEY (`ID_Records`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `sumber_rdn`
--
ALTER TABLE `sumber_rdn`
  ADD PRIMARY KEY (`ID_Record`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budgeting`
--
ALTER TABLE `budgeting`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bukti_potong`
--
ALTER TABLE `bukti_potong`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dana_impian`
--
ALTER TABLE `dana_impian`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_wp`
--
ALTER TABLE `data_wp`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harta`
--
ALTER TABLE `harta`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `harta_sub`
--
ALTER TABLE `harta_sub`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `ID_Records` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasi_rdn`
--
ALTER TABLE `mutasi_rdn`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reksadana`
--
ALTER TABLE `reksadana`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rumus_pph_terutang`
--
ALTER TABLE `rumus_pph_terutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `saham`
--
ALTER TABLE `saham`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sekuritas`
--
ALTER TABLE `sekuritas`
  MODIFY `ID_Records` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sumber_rdn`
--
ALTER TABLE `sumber_rdn`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
