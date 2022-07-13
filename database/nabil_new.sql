-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 06:20 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nabil_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `kodekeg` varchar(200) NOT NULL,
  `namakeg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kodekeg`, `namakeg`) VALUES
(1340, 'K000001', 'Penyusunan Kisi-Kisi Penilaian'),
(1341, 'K000002', 'Penyusunan Soal Penilaian'),
(1342, 'K000003', 'Telaah Soal Penilaian'),
(1343, 'K000004', 'Analisis Hasil Penilaian'),
(1344, 'K000005', 'Penyusunan Kriteria Kelulusan'),
(1345, 'K000006', 'Tindak Lanjut Hasil Penilaian'),
(1346, 'K000007', 'Penyusunan/Pengembangan Perangkat Penilaian'),
(1347, 'K000008', 'Pengelolaan Kurikulum di Tingkat Satuan Pendidikan'),
(1348, 'K000009', 'Perangkat Kurikulum Tingkat Satuan Pendidikan yang dikembangkan'),
(1349, 'K000010', 'Pelaksanaan Kegiatan Pembelajaran'),
(1350, 'K000011', 'Pembayaran Honor'),
(1351, 'K000012', 'Kegiatan Evaluasi Pembelajaran'),
(1352, 'K000013', 'Kegiatan Evaluasi Pembelajaran dan Ekstrakurikuler'),
(1353, 'K000014', 'Penyelenggaraan Kegiatan Uji Kompetensi Keahlian, Sertifikasi Kompetensi Keahlian dan Uji Kompetensi Kemampuan Bahasa Inggris Berstandar Internasional (Test of English of Internasional Communication/TOEIC)'),
(1354, 'K000015', 'Penyelenggaraan Bursa Kerja Khusus (BKK) SMK, Praktik Kerja Industri (Prakerin) atau Praktik Kerja Lapangan (PKL) di dalam negeri, Pemantauan Kebekerjaan, Pemagangan, dan Lembaga Sertifikasi Profesi P-1'),
(1355, 'K000016', 'Pemberian Makanan Tambahan'),
(1356, 'K000017', 'Kegiatan Supervisi, Monitoring dan Evaluasi'),
(1357, 'K000018', 'Penyelenggaran BKK SMALB, Prakerin atau PKL dan Pemagangan'),
(1358, 'K000019', 'Pembinaan dan Peningkatan Kualitas Pendidik'),
(1359, 'K000020', 'Pembinaan dan Peningkatan Kualitas Tenaga Kependidikan'),
(1360, 'K000021', 'Pengembangan Keprofesian Guru dan Tenaga Kependidikan, serta Pengembangan Manajemen Sekolah'),
(1361, 'K000022', 'Pemeliharaan Sarana dan Prasarana Sekolah'),
(1362, 'K000023', 'Pemeliharaan dan Perbaikan Gedung'),
(1363, 'K000024', 'Pembelian/Perawatan Alat Multi Media Pembelajaran'),
(1364, 'K000025', 'Pengembangan Perpustakaan'),
(1365, 'K000026', 'Pengembangan Manajemen Sekolah'),
(1366, 'K000027', 'Pelaksanaan Kompetensi Sekolah'),
(1367, 'K000028', 'Sistem Penjaminan Mutu Sekolah'),
(1368, 'K000029', 'Pengelolaan Perkantoran'),
(1369, 'K000030', 'Hubungan Masyarakat'),
(1370, 'K000031', 'Pengelolaan Sekolah'),
(1371, 'K000032', 'Pengelolaan Program Pengembangan Diri Siswa'),
(1372, 'K000033', 'Pengelolaan Program Ekstrakurikuler'),
(1373, 'K000034', 'Kegiatan Perlombaan Sekolah'),
(1374, 'K000035', 'Pengembangan Keterampilan Siswa'),
(1375, 'K000036', 'PPDB'),
(1376, 'K000037', 'Kegiatan Pembelajaran dan Ekstrakurikuler'),
(1377, 'K000038', 'Peningkatan Transparansi Dan Akuntabilitas Keuangan Sekolah'),
(1378, 'K000039', 'Rumah Tangga Sekolah, Daya dan Jasa'),
(1379, 'K000040', 'Pelaksanaan Administrasi Keuangan Sekolah'),
(1380, 'K000041', 'Langganan Daya dan Jasa'),
(1381, 'K000042', 'Penyusunan Kisi-Kisi Penilaian Bidang Keahlian Bisnis dan Manajemen'),
(1382, 'K000043', 'Penyusunan Kisi-Kisi Penilaian Bidang Keahlian Pariwisata'),
(1383, 'K000044', 'Penyusunan Kisi-Kisi Penilaian Bidang Keahlian Teknologi'),
(1384, 'K000045', 'Penyusunan Soal Penilaian Bidang Keahlian Bisnis dan Manajemen'),
(1385, 'K000046', 'Penyusunan Soal Penilaian Bidang Keahlian Pariwisata'),
(1386, 'K000047', 'Penyusunan Soal Penilaian Bidang Keahlian Teknologi'),
(1387, 'K000048', 'Telaah Soal Penilaian Bidang Keahlian Bisnis dan Manajemen'),
(1388, 'K000049', 'Telaah Soal Penilaian Bidang Keahlian Pariwisata'),
(1389, 'K000050', 'Telaah Soal Penilaian Bidang Keahlian Teknologi'),
(1390, 'K000051', 'Analisis Hasil Penilaian Bidang Keahlian Bisnis dan Manajemen'),
(1391, 'K000052', 'Analisis Hasil Penilaian Bidang Keahlian Pariwisata'),
(1392, 'K000053', 'Analisis Hasil Penilaian Bidang Keahlian Teknologi'),
(1393, 'K000054', 'Penyusunan Kriteria Kelulusan Bidang Keahlian Bisnis dan Manajemen '),
(1394, 'K000055', 'Penyusunan Kriteria Kelulusan Bidang Keahlian Pariwisata '),
(1395, 'K000056', 'Penyusunan Kriteria Kelulusan Bidang Keahlian Teknologi'),
(1396, 'K000057', 'Tindak Lanjut Hasil Penilaian Bidang Keahlian Bisnis dan Manajemen'),
(1397, 'K000058', 'Tindak Lanjut Hasil Penilaian Bidang Keahlian Pariwisata'),
(1398, 'K000059', 'Tindak Lanjut Hasil Penilaian Bidang Keahlian Teknologi'),
(1399, 'K000060', 'Penyusunan/Pengembangan Perangkat Penilaian Bidang Keahlian Bisnis dan Manajemen'),
(1400, 'K000061', 'Penyusunan/Pengembangan Perangkat Penilaian Bidang Keahlian Pariwisata'),
(1401, 'K000062', 'Penyusunan/Pengembangan Perangkat Penilaian Bidang Keahlian Teknologi'),
(1402, 'K000063', 'Pengelolaan Kurikulum di Tingkat Satuan Pendidikan Bidang Keahlian Bisnis dan Manajemen'),
(1403, 'K000064', 'Pengelolaan Kurikulum di Tingkat Satuan Pendidikan Bidang Keahlian Pariwisata'),
(1404, 'K000065', 'Pengelolaan Kurikulum di Tingkat Satuan Pendidikan Bidang Keahlian Teknologi'),
(1405, 'K000066', 'Perangkat Kurikulum Tingkat Satuan Pendidikan yang dikembangkan Bidang Keahlian Bisnis dan Manajemen'),
(1406, 'K000067', 'Perangkat Kurikulum Tingkat Satuan Pendidikan yang dikembangkan Bidang Keahlian Pariwisata'),
(1407, 'K000068', 'Perangkat Kurikulum Tingkat Satuan Pendidikan yang dikembangkan Bidang Keahlian Teknologi'),
(1408, 'K000069', 'Pelaksanaan Kegiatan Pembelajaran Bidang Keahlian Bisnis dan Manajemen'),
(1409, 'K000070', 'Pelaksanaan Kegiatan Pembelajaran Bidang Keahlian Pariwisata'),
(1410, 'K000071', 'Pelaksanaan Kegiatan Pembelajaran Bidang Keahlian Teknologi'),
(1411, 'K000072', 'Pemeliharaan dan Perbaikan Gedung Bidang Keahlian Teknologi'),
(1412, 'K000073', 'Kegiatan Supervisi, Monitoring dan Evaluasi Bidang Keahlian Bisnis dan Manajemen '),
(1413, 'K000074', 'Kegiatan Supervisi, Monitoring dan Evaluasi Bidang Keahlian Pariwisata '),
(1414, 'K000075', 'Kegiatan Supervisi, Monitoring dan Evaluasi Bidang Keahlian Teknologi '),
(1415, 'K000076', 'Pembinaan dan Peningkatan Kualitas Pendidik Bidang Keahlian Bisnis dan Manajemen'),
(1416, 'K000077', 'Pemeliharaan dan Perbaikan Gedung Bidang Keahlian Bisnis dan Manajemen'),
(1417, 'K000078', 'Pembinaan dan Peningkatan Kualitas Pendidik Bidang Keahlian Pariwisata'),
(1418, 'K000079', 'Pembinaan dan Peningkatan Kualitas Pendidik Bidang Keahlian Teknologi'),
(1419, 'K000080', 'Pembinaan dan Peningkatan Kualitas Tenaga Kependidikan Bidang Keahlian Bisnis dan Manajemen'),
(1420, 'K000081', 'Pembinaan dan Peningkatan Kualitas Tenaga Kependidikan Bidang Keahlian Pariwisata'),
(1421, 'K000082', 'Pembinaan dan Peningkatan Kualitas Tenaga Kependidikan Bidang Keahlian Teknologi'),
(1422, 'K000083', 'Pemeliharaan Sarana dan Prasarana Sekolah Bidang Keahlian Bisnis dan Manajemen'),
(1423, 'K000084', 'Pemeliharaan Sarana dan Prasarana Sekolah Bidang Keahlian Pariwisata'),
(1424, 'K000085', 'Pemeliharaan Sarana dan Prasarana Sekolah Bidang Keahlian Teknologi'),
(1425, 'K000086', 'Pemeliharaan dan Perbaikan Gedung Bidang Keahlian Pariwisata'),
(1426, 'K000087', 'Pengembangan Manajemen Sekolah Bidang Keahlian Bisnis dan Manajemen'),
(1427, 'K000088', 'Pengembangan Manajemen Sekolah Bidang Keahlian Pariwisata'),
(1428, 'K000089', 'Pengembangan Manajemen Sekolah Bidang Keahlian Teknologi'),
(1429, 'K000090', 'Pelaksanaan Kompetensi Sekolah Bidang Keahlian Bisnis dan Manajemen '),
(1430, 'K000091', 'Pelaksanaan Kompetensi Sekolah Bidang Keahlian Pariwisata '),
(1431, 'K000092', 'Pelaksanaan Kompetensi Sekolah Bidang Keahlian Teknologi '),
(1432, 'K000093', 'Sistem Penjaminan Mutu Sekolah Bidang Keahlian Bisnis dan Manajemen'),
(1433, 'K000094', 'Sistem Penjaminan Mutu Sekolah Bidang Keahlian Pariwisata'),
(1434, 'K000095', 'Sistem Penjaminan Mutu Sekolah Bidang Keahlian Teknologi'),
(1435, 'K000096', 'Pengelolaan Perkantoran Bidang Keahlian Bisnis dan Manajemen'),
(1436, 'K000097', 'Pengelolaan Perkantoran Bidang Keahlian Pariwisata'),
(1437, 'K000098', 'Pengelolaan Perkantoran Bidang Keahlian Teknologi'),
(1438, 'K000099', 'Hubungan Masyarakat Bidang Keahlian Bisnis dan Manajemen'),
(1439, 'K000100', 'Hubungan Masyarakat Bidang Keahlian Pariwisata'),
(1440, 'K000101', 'Hubungan Masyarakat Bidang Keahlian Teknologi'),
(1441, 'K000102', 'Pengelolaan Program Pengembangan Diri Siswa Bidang Keahlian Bisnis dan Manajemen '),
(1442, 'K000103', 'Pengelolaan Program Pengembangan Diri Siswa Bidang Keahlian Pariwisata '),
(1443, 'K000104', 'Pengelolaan Program Pengembangan Diri Siswa Bidang Keahlian Teknologi '),
(1444, 'K000105', 'Pengelolaan Program Ekstrakurikuler Bidang Keahlian Bisnis dan Manajemen '),
(1445, 'K000106', 'Pengelolaan Program Ekstrakurikuler Bidang Keahlian Pariwisata '),
(1446, 'K000107', 'Pengelolaan Program Ekstrakurikuler Bidang Keahlian Teknologi '),
(1447, 'K000108', 'Kegiatan Perlombaan Sekolah Bidang Keahlian Bisnis dan Manajemen'),
(1448, 'K000109', 'Kegiatan Perlombaan Sekolah Bidang Keahlian Pariwisata'),
(1449, 'K000110', 'Kegiatan Perlombaan Sekolah Bidang Keahlian Teknologi'),
(1450, 'K000111', 'Pengembangan Keterampilan Siswa Bidang Keahlian Bisnis dan Manajemen'),
(1451, 'K000112', 'Pengembangan Keterampilan Siswa Bidang Keahlian Pariwisata'),
(1452, 'K000113', 'Pengembangan Keterampilan Siswa  Bidang Keahlian Teknologi'),
(1453, 'K000114', 'Peningkatan Transparansi Dan Akuntabilitas Keuangan Sekolah Bidang Keahlian Bisnis dan Manajemen'),
(1454, 'K000115', 'Peningkatan Transparansi Dan Akuntabilitas Keuangan Sekolah Bidang Keahlian Pariwisata'),
(1455, 'K000116', 'Peningkatan Transparansi Dan Akuntabilitas Keuangan Sekolah Bidang Keahlian Teknologi'),
(1456, 'K000117', 'Rumah Tangga Sekolah, Daya dan Jasa Bidang Keahlian Bisnis dan Manajemen'),
(1457, 'K000118', 'Rumah Tangga Sekolah, Daya dan Jasa Bidang Keahlian Pariwisata'),
(1458, 'K000119', 'Rumah Tangga Sekolah, Daya dan Jasa Bidang Keahlian Teknologi'),
(1459, 'K000120', 'Pelaksanaan Administrasi Keuangan Sekolah Bidang Keahlian Bisnis dan Manajemen'),
(1460, 'K000121', 'Pelaksanaan Administrasi Keuangan Sekolah  Bidang Keahlian Pariwisata'),
(1461, 'K000122', 'Pelaksanaan Administrasi Keuangan Sekolah Bidang Keahlian Teknologi'),
(1462, 'K000123', 'Biaya Operasional Pembelajaran'),
(1463, 'K000124', 'Biaya Pendukung'),
(1464, 'K000125', 'Biaya Administrasi dan Lainnya'),
(1465, 'K000126', 'Pembelajaran dan Bermain'),
(1466, 'K000127', 'Kegiatan Pendukung'),
(1467, 'K000128', 'Kegiatan Lainnya'),
(1468, 'K000129', 'Kegiatan Pembelajaran dan Bermain'),
(1469, 'K000130', 'Biaya Operasional Pembelajaran PKBM'),
(1470, 'K000131', 'Biaya Pendukung PKBM'),
(1471, 'K000132', 'Biaya Administrasi dan Lainnya PKBM'),
(1472, 'K000133', 'Kegiatan Sarana Pendukung'),
(1473, 'K000134', 'Kegiatan Sarana Lainnya'),
(1474, 'K000135', 'Penyediaan Fasilitas Akses Rumah Belajar');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `kodepen` varchar(200) NOT NULL,
  `namapen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `kodepen`, `namapen`) VALUES
(2, 'SP000001', 'Standar Penilaian Pendidikan'),
(3, 'SP000002', 'Standar Isi'),
(4, 'SP000003', 'Standar Proses'),
(5, 'SP000004', 'Standar Pembiayaan'),
(6, 'SP000005', 'Standar Pendidik dan Tenaga Kependidikan'),
(7, 'SP000006', 'Standar Sarana dan Prasarana'),
(8, 'SP000007', 'Standar Pengelolaan');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan`
--

CREATE TABLE `perencanaan` (
  `id` int(11) NOT NULL,
  `kodeper` varchar(200) NOT NULL,
  `standar_pendidikan` text NOT NULL,
  `kegiatan` text NOT NULL,
  `subkegiatan` text NOT NULL,
  `program` text NOT NULL,
  `subprogram` text NOT NULL,
  `triwulan` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perencanaan`
--

INSERT INTO `perencanaan` (`id`, `kodeper`, `standar_pendidikan`, `kegiatan`, `subkegiatan`, `program`, `subprogram`, `triwulan`, `subtotal`, `total`, `tanggal`) VALUES
(11, 'PR000001', 'Standar Isi', 'Penyusunan Soal Penilaian', 'Penyusunan soal Penilaian Harian (PH)', 'Pengembangan Standar Proses', 'Pelaksanaan Kegiatan Pembelajaran dan Ekstrakurikuler', 1, 300000, 300000, '2022-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan_uraian`
--

CREATE TABLE `perencanaan_uraian` (
  `id` int(11) NOT NULL,
  `kodeper` varchar(200) NOT NULL,
  `namabarang` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perencanaan_uraian`
--

INSERT INTO `perencanaan_uraian` (`id`, `kodeper`, `namabarang`, `satuan`, `qty`, `harga`, `jumlah`) VALUES
(20, 'PR000001', 'Pot 02 Polos Natamas ( 1 R )', 'pack', 10, 20000, 200000),
(21, 'PR000001', 'Cleansing Normal ( N )', 'dus', 10, 10000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `kodeprog` varchar(200) NOT NULL,
  `namaprog` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `kodeprog`, `namaprog`) VALUES
(137, 'P000001', 'Pengembangan dan implementasi sistem penilaian'),
(138, 'P000002', 'Pengembangan Standar Proses'),
(139, 'P000003', 'Pengembangan pendidik dan tenaga kependidikan'),
(140, 'P000004', 'Pengembangan standar pembiayaan'),
(141, 'P000005', 'Pengembangan Standar Isi'),
(142, 'P000006', 'Pengembangan standar pengelolaan'),
(143, 'P000007', 'Pengembangan sarana dan prasarana sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Bendahara'),
(2, 'Kepala Sekolah'),
(3, 'Pengawas');

-- --------------------------------------------------------

--
-- Table structure for table `subkegiatan`
--

CREATE TABLE `subkegiatan` (
  `id` int(11) NOT NULL,
  `kodekeg` varchar(200) NOT NULL,
  `namasubkeg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkegiatan`
--

INSERT INTO `subkegiatan` (`id`, `kodekeg`, `namasubkeg`) VALUES
(2, 'K000001', 'Penyusunan kisi-kisi Penilaian Harian (PH)'),
(3, 'K000002', 'Penyusunan soal Penilaian Harian (PH)'),
(4, 'K000003', 'Telaah soal Penilaian Tengah Semester (PTS)');

-- --------------------------------------------------------

--
-- Table structure for table `subprogram`
--

CREATE TABLE `subprogram` (
  `id` int(11) NOT NULL,
  `kodeprog` varchar(200) NOT NULL,
  `namasubprog` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subprogram`
--

INSERT INTO `subprogram` (`id`, `kodeprog`, `namasubprog`) VALUES
(16, 'P000001', 'Pelaksanaan Kegiatan Asesmen/Evaluasi Pembelajaran'),
(17, 'P000001', 'Pelaksanaan Kegiatan Pembelajaran dan Ekstrakurikuler'),
(18, 'P000002', 'Pelaksanaan Kegiatan Pembelajaran dan Ekstrakurikuler');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `jkel` char(1) NOT NULL,
  `pembuatan` int(11) NOT NULL,
  `on_off` int(1) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `alamat`, `no_hp`, `tempat_lahir`, `tgl_lahir`, `gambar`, `jkel`, `pembuatan`, `on_off`, `id_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'Muntilan', '123', 'Muntilan', '1997-06-01', 'default.png', 'P', 0, 1, 1),
(2, 'ahmadhusain_98', '7f2df52bbcbb5ebff041ff46506800a9', 'Ahmad Husain', 'Mungkid', '00000', 'Jakarta', '1998-05-02', 'default.png', 'L', 2022, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perencanaan_uraian`
--
ALTER TABLE `perencanaan_uraian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkegiatan`
--
ALTER TABLE `subkegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subprogram`
--
ALTER TABLE `subprogram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2680;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perencanaan`
--
ALTER TABLE `perencanaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `perencanaan_uraian`
--
ALTER TABLE `perencanaan_uraian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1482;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subkegiatan`
--
ALTER TABLE `subkegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1347;

--
-- AUTO_INCREMENT for table `subprogram`
--
ALTER TABLE `subprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1361;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
