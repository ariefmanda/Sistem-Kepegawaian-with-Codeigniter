-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2017 at 08:40 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegawai_sm`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `idKaryawan` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `statusAkun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `idKaryawan`, `username`, `password`, `level`, `email`, `statusAkun`) VALUES
(28, 17, 'arief manda', 'wkQFdO7yoibCe8pXKkG6RyxyLl7ZoPNkWE4tjnxna0E=', 'admin', 'arief.manda57@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anak`
--

CREATE TABLE `tbl_anak` (
  `idAnak` int(10) NOT NULL,
  `idKaryawan` int(6) NOT NULL,
  `namaAnak` varchar(30) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `tglLahir` date NOT NULL,
  `umur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anak`
--

INSERT INTO `tbl_anak` (`idAnak`, `idKaryawan`, `namaAnak`, `jenisKelamin`, `tglLahir`, `umur`) VALUES
(1, 17, 'Alex', 'Laki-laki', '2017-08-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aspek`
--

CREATE TABLE `tbl_aspek` (
  `id_aspek` int(11) NOT NULL,
  `aspek` varchar(100) NOT NULL,
  `prosentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aspek`
--

INSERT INTO `tbl_aspek` (`id_aspek`, `aspek`, `prosentase`) VALUES
(1, 'Kecerdasan', 20),
(2, 'Sikap Kerja', 30),
(3, 'Perilaku', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bobot`
--

CREATE TABLE `tbl_bobot` (
  `selisih` tinyint(3) NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bobot`
--

INSERT INTO `tbl_bobot` (`selisih`, `bobot`, `keterangan`) VALUES
(0, 5, 'Tidak ada  selisih (kompetensi,sesuai dgn yang dibutuhkan)'),
(1, 4.5, 'Kompetensi individu kelebihan 1 tingkat'),
(-1, 4, 'Kompetensi individu kekurangan 1 tingkat'),
(2, 3.5, 'Kompetensi individu kelebihan 2 tingkat'),
(-2, 3, 'Kompetensi individu kekurangan 2 tingkat'),
(3, 2.5, 'Kompetensi individu kelebihan 3 tingkat'),
(-3, 2, 'Kompetensi individu kekurangan 3 tingkat'),
(4, 1.5, 'Kompetensi individu kelebihan 4 tingkat'),
(-4, 1, 'Kompetensi individu kekurangan 4 tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `idCuti` int(6) NOT NULL,
  `idKaryawan` int(6) NOT NULL,
  `mulaiCuti` date NOT NULL,
  `jumlahHari` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `proses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `idDept` int(11) NOT NULL,
  `idOrg` int(11) NOT NULL,
  `namaDept` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`idDept`, `idOrg`, `namaDept`) VALUES
(3, 6, 'Departemen HRD'),
(4, 6, 'Departemen periklanan'),
(5, 6, 'Departemen Cetak'),
(6, 6, 'Departemen IT'),
(7, 6, 'Departemen Marketing'),
(8, 7, 'Departemen Cetak'),
(9, 7, 'Departemen Periklanan'),
(10, 7, 'Departemen HRD'),
(11, 7, 'Departemen Wartawan'),
(12, 7, 'Departemen IT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faktor`
--

CREATE TABLE `tbl_faktor` (
  `id_faktor` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `faktor` varchar(100) NOT NULL,
  `nilai` tinyint(3) NOT NULL,
  `kelompok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faktor`
--

INSERT INTO `tbl_faktor` (`id_faktor`, `id_aspek`, `faktor`, `nilai`, `kelompok`) VALUES
(45, 1, 'Antisipasi', 3, 'core'),
(46, 1, 'Potensi Kecerdasan', 4, 'secondary'),
(47, 2, 'Energi Psikis', 3, 'core'),
(48, 2, 'Ketelitian dan Tanggung jawab', 4, 'core'),
(49, 2, 'Kehati-hatian', 2, 'secondary'),
(50, 2, 'Pengendalian Perasaan', 3, 'secondary'),
(51, 2, 'Dorongan berprestasi', 3, 'core'),
(52, 2, 'Vitalitas Perencanaan', 5, 'secondary'),
(53, 3, 'Kekuasaan (Dominance)', 3, 'core'),
(54, 3, 'Pengaruh (Influence)', 3, 'core'),
(55, 3, 'Keteguhan Hati (Steadiness)', 4, 'secondary'),
(56, 3, 'Pemenuhan (Compliance)', 5, 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_akhir`
--

CREATE TABLE `tbl_hasil_akhir` (
  `id_akhir` int(11) NOT NULL,
  `idKaryawan` int(6) NOT NULL,
  `hasil_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `idJabatan` int(6) NOT NULL,
  `idDept` int(6) NOT NULL,
  `namaJabatan` varchar(50) NOT NULL,
  `kodeJabatan` varchar(5) NOT NULL,
  `skorMinM` float NOT NULL,
  `skorMinL` float NOT NULL,
  `skorMinC` float NOT NULL,
  `skorMinO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`idJabatan`, `idDept`, `namaJabatan`, `kodeJabatan`, `skorMinM`, `skorMinL`, `skorMinC`, `skorMinO`) VALUES
(10, 3, 'Direktur', '', 0, 0, 0, 0),
(11, 3, 'Staff', '', 0, 0, 0, 0),
(12, 4, 'Manager', '', 0, 0, 0, 0),
(13, 4, 'Staff', '', 0, 0, 0, 0),
(14, 5, 'Manager', '', 0, 0, 0, 0),
(15, 5, 'Staff', '', 0, 0, 0, 0),
(16, 6, 'Manager Utama', '', 0, 0, 0, 0),
(17, 6, 'Manager SDM', '', 0, 0, 0, 0),
(18, 6, 'Staff', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `idJurusan` smallint(6) NOT NULL,
  `idPendidikan` smallint(6) NOT NULL,
  `namaJurusan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `idKaryawan` int(6) NOT NULL,
  `idGrade` varchar(18) DEFAULT NULL,
  `idPercobaan` varchar(7) DEFAULT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `namaPanggil` varchar(50) NOT NULL,
  `tmpLahir` varchar(50) NOT NULL,
  `tglLahir` varchar(12) NOT NULL,
  `usia` int(4) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  `eMail` varchar(100) NOT NULL,
  `telpRumah` varchar(20) NOT NULL,
  `handphone` varchar(15) NOT NULL,
  `tipeIdentitas` varchar(10) NOT NULL,
  `noIdentitas` varchar(50) NOT NULL,
  `golDarah` varchar(5) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `statusMenikah` varchar(20) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `statusKerja` varchar(30) NOT NULL,
  `namaFoto` text NOT NULL,
  `namaAyah` varchar(30) DEFAULT NULL,
  `namaIbu` varchar(30) DEFAULT NULL,
  `alamatOrtu` varchar(50) DEFAULT NULL,
  `kotaOrtu` varchar(50) DEFAULT NULL,
  `provOrtu` varchar(50) DEFAULT NULL,
  `kodeposOrtu` varchar(50) DEFAULT NULL,
  `telpOrtu` varchar(50) DEFAULT NULL,
  `namaPasangan` varchar(50) DEFAULT NULL,
  `jumlahAnak` smallint(6) NOT NULL,
  `namaAyahMertua` varchar(30) DEFAULT NULL,
  `namaIbuMertua` varchar(30) DEFAULT NULL,
  `alamatMertua` varchar(50) DEFAULT NULL,
  `kotaMertua` varchar(50) DEFAULT NULL,
  `provinsiMertua` varchar(50) DEFAULT NULL,
  `kodeposMertua` varchar(10) DEFAULT NULL,
  `telpMertua` varchar(20) DEFAULT NULL,
  `lainLain` varchar(1000) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `contohBlob` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`idKaryawan`, `idGrade`, `idPercobaan`, `namaLengkap`, `namaPanggil`, `tmpLahir`, `tglLahir`, `usia`, `alamat`, `kota`, `propinsi`, `eMail`, `telpRumah`, `handphone`, `tipeIdentitas`, `noIdentitas`, `golDarah`, `agama`, `kodepos`, `statusMenikah`, `jenisKelamin`, `statusKerja`, `namaFoto`, `namaAyah`, `namaIbu`, `alamatOrtu`, `kotaOrtu`, `provOrtu`, `kodeposOrtu`, `telpOrtu`, `namaPasangan`, `jumlahAnak`, `namaAyahMertua`, `namaIbuMertua`, `alamatMertua`, `kotaMertua`, `provinsiMertua`, `kodeposMertua`, `telpMertua`, `lainLain`, `password`, `contohBlob`) VALUES
(17, NULL, NULL, 'arief manda', 'arief', 'medan', '2017-08-14', 0, 'jalan pandanaran semarang', 'semarang', 'Jawa Tengah', 'arief.manda57@gmail.com', '', '085362007971', 'KTP', '878392748324', 'A', 'Islam', '50134', 'Belum Menikah', 'Laki-laki', 'aktif', 'logo_sm.png', 'a', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', NULL, '', 0x89504e470d0a1a0a0000000d49484452000000a60000008808060000006d2e903100000159694343504943432050726f66696c650000289163606052492c28c861616060c8cd2b290a72775288888c5260bfcfc0c5c0c7c0cbc0c16099985c5ce01810e00354c200a351c1b76b0c8c20fab22ec8aca7bbf966a4ef753bebbdcf256faf74e90c4cf528802b25b5381948ff01e2d4e482a2120606c614205bb9bca400c4ee00b2458a808e02b2e780d8e910f606103b09c23e02561312e40c64df00b215923312816630fe00b2759290c4d391d8507b4180db25b3b82027b15221c098806bc90025a9152520da39bfa0b228333da344c111184aa90a9e79c97a3a0a460686a60c0ca03087a8fe1c080e4b46b13308b1e6fb0c0cb6fbffffffbf1b21e6b59f8161a33930f87622c4342c181804b919184eec2c482c4a040b310331535a1a03c3276078f1063030086f6360e0fc539c666c049667e471626060bdf7ffff67350606f6c90c0c7f27fcffff7bd1ffff7f170335df61603890070047ff679b408e3f5d0000000970485973000016250000162501495224f00000019d69545874584d4c3a636f6d2e61646f62652e786d7000000000003c783a786d706d65746120786d6c6e733a783d2261646f62653a6e733a6d6574612f2220783a786d70746b3d22584d5020436f726520352e342e30223e0a2020203c7264663a52444620786d6c6e733a7264663d22687474703a2f2f7777772e77332e6f72672f313939392f30322f32322d7264662d73796e7461782d6e7323223e0a2020202020203c7264663a4465736372697074696f6e207264663a61626f75743d22220a202020202020202020202020786d6c6e733a657869663d22687474703a2f2f6e732e61646f62652e636f6d2f657869662f312e302f223e0a2020202020202020203c657869663a506978656c5844696d656e73696f6e3e3136363c2f657869663a506978656c5844696d656e73696f6e3e0a2020202020202020203c657869663a506978656c5944696d656e73696f6e3e3133363c2f657869663a506978656c5944696d656e73696f6e3e0a2020202020203c2f7264663a4465736372697074696f6e3e0a2020203c2f7264663a5244463e0a3c2f783a786d706d6574613e0aaf031d240000001c69444f5400000002000000000000004400000028000000440000004400000d3a48ecfe5300000d06494441547801ec5c6954545712e675d340005905d91483a001e33246d468448d310941c6189d11a349c6f58c443d8943703726d1714b262e631299e312741435184504891a77115414c595485014599a66dfe9eef154bda7be4e3fded20bed9ccb8fae5775abea56d7fda8be5b37959797a7b5227f24031696018a00d3c2468484031920c02440b0c80c10605ae4b090a0083009062c3203049816392c2428024c82018bcc0001a6450e0b098a009360c0223340806991c3428222c02418b0c80c10605ae4b090a0083009062c3203049816392c2428024c236340abc5cb5a05852af07ceb6e118b3e7c540e7cb1b20a6845551dd0fa8626a0cc8b4c46c1a383bd1d502707a47e3eaec0fb79230d7ad10bf8de211d81ba3adb037dde5f08308d3c820498c6492801a68179bc915b081e4e66dc017a36331768a9aada40cfd2ccfd7ddb83e1d0815d810e7b3518a8b7a7b334876d6445806960e209300d4c2087390126476274c56ab50644c7cede04ba3fed32d0bbf74a74552d92efdbb333c4352e321468cf609c935a64b08f8322c014383204980213652435024c9e449eb98073c62d096740f36131aeaa79cc2cbe3924c80762fcf8a3d7810676f6b4a898093079868300932741266a26c0d449ac525503926fe2d28066e5dcd3d1f8ff6299fdd288e1bde08d4d8d1a0cd4ce56d1a66f94005327fd049804983a90685bf678fa6d0860c3d6a3406beb1a450544296c405f6687272f94355d71283cc1d16a70556fd5d20c7a9a063cf1d1d2bca8ce4ca8ece7ed06de17ce8a001ad0c9c384bd71bb261593ce0d012626820093fb9f45500b455722b95c0efad6d6d62c3ba65d43572ae6a850ad56835e4b4b0bd0f8c4734077eecf60d9eb32b2171c4064e381ab59850b9eb0289cf0cc5a6e63ab6b2288573736805e536519d0e60aa44da50f81d7d2ed829c195149618d798d8d0e07af61fdf024c9885db4eaeab9ad980cf008305b1d5fc98d04983ca9b353c840c301ff81ad6c1d9c80b76de78c9614b6f3b8f943736d3dce216fe63e80b62bd7f3819eceb80534fb513d5085a73fd0f1237b039df356105063bfccda71155c66dd56b25c37aaf064a9aee02ec85bcaf0b6124b4902d3bd5b27b0fa79cb6712acf94d4a4b4b41a9a6067739f82dd81a165f3109300930d9903533475562257050d742cf2e013d802a5c3b983912ecaeb21e57cfc9d91857931aef594e1a8495c6d841edbd8873cab507707780cb7f7375053455e75e03aaae6057582e3b5d794cf49f41347dc208dd26a3f04a25c6555d2ded9695c5544c024c02cc67ff23da0e98253867b2cdbf08f1b8878d056aeb1df86c7c6dfe5c5e8737cb8f5cc78fd4bf86fa9924a6e22a9cf38ef9fa2cf8a72fc2f3f655f7281f746aef6005b552e36e039f615ac2625079b1a369cec8552abcc15f5959c9178ade76024cbd69792a24c07c9a0b314fcf0d30a9069c6b50e9bbe1fdd959e39ccd63fc12e0650afc4e8b98376f0edd43578ba11b7adbd4ea9d1ea69df3466dc4fdd482229c6b0b7d8f2d7598dfcaab68afa1795dfbae5d701f36397ebe6e9351f98a0a9c0b97974bbb8d65b68a4980296cdc0930314f260726558837bea953dba0471b0f9ca379fd6d25f094359e31633896f7ba68df0d082abc2756ca4181ee260d72c3d13cf09f70325f523f9a669c135764a783bdba0ae77a8cb39953c2e171f6e4771891496855157e0bb4ac0c4fb2c4764280c99331024c9e0471345b2c30a95c3c8396a52740e8940dce21bda3bf03dedab96d6ead70e491531cbe1a6faeaf7a1ff7557bfad1274e9c1686356417e02a363aee92418e34f4ada58acb18bf9adeff4cde8e73cbae0138d734a893568c99131fe604a81555bd4d26ab9804987af3cd2b24c0c414191f9805b89f26fff53ff42068803abdfe015097b0285a6ed9e476119ef14ede980981eefc6400507f777b9306ceec5fbebdea34f453538b2750523b5537e1fea8d3231c975fe263a5ba126557575707fac5c5b8ab21caf8b132012647c60830391223506c31c0a4aaf16c5496f44f0cbd0557879402ef29fafe633bc8657678af51e0fbe354abcd39056d35d947803617e26a56538b73b4352dc3409e63db17a8bb33c611e0e5087c882fde521a148837b6833aa01c1a1fbf6c3e83dff5d99286275407e7bd064d6e0ee27611980ac8ec8332fef928b3e83a7eb9884f5550fb987e38a79f138973653e23357d8f552e93767babbebe1eba282a9216bfd12a2601a6fea126c06c2b606a710e294bfd1646862afd9d354276dd4281f71cbf942517cdd0ffc12509e8a7e18efe556bb6da135cafb4c239add07ebc3c70eef86ea82f981ccbc1b951ee7ddc8f3bb1142bb0428edfe111eaf746219ec884f8b4136a027a69f4d9fc970939a2ecb89437fd1d3f395ea63f29b8f418f9a90cdc7f0eeb1fcc884451a50af3564ddfcc1765fc58d9f08a4980d96ace0930cb5acd0f57a3c1c0a47e3b0fbe656777e8edc369f8872077193c4e6fbb506155c60150ad488dd36ba2d562259badc155bfd2ca38fb7436367875fef8e2217afbe513ee385f002a130774e45365b5d736aa810f5f817369357d1f94a5248071a5e7d6c9318304683f5559f1ef7dc0cc9ff9de53a188a7c2223c716aac6fa3db450498ad8f1601a6998149d1f7fea8c4253032543dce297487c96d2cee9b39be2cade230fe4a762f83c7869b7806ccc8199aaec633f8f556865566c61f439d9d70159ef219aeca19b950ba2ae50ea84e1cd809a8af8b9d5053d09bba250be8cddff1b68e28e3c7caa306625e62c3bb8a328dfc7025e8efdf86e3277675aea47f1f34f312ee9f06077a8bea5ff2473901a6b03c13609a1b983c734b66d8dcc72d844787e0818c48122d4bd90876b599297aede7b6bc0bf2fb5417bded52853e9eb8efba77567f492e961dc46f5df6efe206f6234270d740a8b3f873f7417553ea6f424d587aeba7f601fe157f17969c8b292bc713af81910b40e5e2e1d540db398aabf4cc6fca2f598d6b8fe80f705783ab5f5db9f48a4980a99b4bbd3c01a69981293bf4350c04a5ccd73b208cd06d4c0c3c3af610f71fc3d833b4b9ec013c16fd301ba8b619cf804bb52f003f5b33835615b7cf481b7192a04e4ed0b66d1aee03722a72343027386e0e0ad010fbbdf47c651dd84d5887bb1f1cddfc41dcce11e7c6a9b13837167af294f4cb05f015f3453cd04b696b808aad984c400322f036d37fd74f0311f3eb724c3b17955c310930b952ca9613609a0b9835b8612a4ffc9c3d021c9cd310dc57741926ee2486c39d55e3039cb329f7e2aa71b7aa03a8265abdc5656290bc4f3777b0df30b197243f7376e1e45f5583155e6ae58da0bf3d5951897ef88219dadb0b54968f09e15365b5c72ec33b0dfb5333416e68c5ecfbf65cf0b3721eee8776f11736c7165f3109305903c9c710609a0998d4ed333016b2f3097c6302ed369df0acd56b32ce4905190950d2d2b7970e9fbf09da1bd2ab8156563509b016ae12d60b2bf28ab1dd851b3da339737b3670d7f2f0db824717e17eaed83377664a20f4b6d182bf60bc11f477959e09a9d5c7d7462d82f612256e8c1b5a31878d5d0afe468de889f4cd3f01e57b115d310930f952ca6e27c05c0a09313d304fe36a4d96877310f630e8e37095ec3d7b13342adcf0f68e3e4d43646a8d16cc4fd0bf96f65326fee4cab5bb2a9033d7cfc4f611d11fe35d30b29b5853d09fb2196f41ddcac70af4ddf45740deaba3b8ef0e1db8fc08ec56efc34f08ae6098d537737fd4d55ed8fdd13b054a703932ea0b96ebf4e415c0bbbb3ab2e44219e604c9d70b7737e6ce0817642abe6212600a4a2ca34480898b549303537e7015e65c85b7669801e0a376c1af828ae7389cc3f0e91babfd41793db8da7b012be8e12cac3c42bf4b337e6867b09f393c405248ef7f8f9f2cf70af14465d29b78323575b0bf287fcc6f1bbdb7e66cab76fe3e58d976cee8d7aa9e6ee30fc95740f4af159b594d2712b182fa78e1c915ab51001335632d68d554e3fbdff0d504015612ee6312600acaeb1325024c330153963017924e35d63e49be9807b7d19f82ba63af37c498194db799bed7b8e7029e24c59fbc07be6b6af4afe6a7870742fb47f4ed20b1818c598f273645a57882d33dc0055cc44dc2336cb1fe467d9b0e264a157e12e8da470de90ca2596f88abf051ab8f805dd6812496cb5f7fc2fd6a3feff62cb950666accf7a07a293b0fe8beb86841a6a2e798049882f2fa448900d34cc094ff38f349d2253dc8acc1acfd789c6bda07e1778224f93282517d13de145f77f42e784b3e8f959459c5c78c7e09e4a3fbf848ea2df21b9c13aa2af0c44641ffa6fc9185d2f633bf4cc293afb40b857ae3117b9ba8a41ae38afc3c15fc95671c63f94dfa711ef02f054adb4df9f4f3ad607fe86816d094f84f80f2ddef145d31093021af825f08309f176032434a574e97f06920710a1dc9b4b4294da7f73d17efce8138e68fc693abe1c11e92e21abefc14d83534b4b0ecd74ec11390d0ceae2c391f9372ad185496efb9ce52b5b595037f64411850b98c62b57331bb32f11362ddde2ba0a23a97c652fd796b2cf0ddbb7664c985328b56ed02d53d49e78026c67d0cd4d1deb65517e6af984c3804989009024c06106cfa3f000000ffff7989a0d300000cdb49444154ed5d6954145716b6bb015954248a8aa86050c665c625ae18773312f72cc7251a4d62cc713ba07332c735639271348ec631ae6734312e11c70dc6e8242a7189a818778dc60d591451415cd86968ba47bf5b8f431755dd554d75c38ccf1ffdd5bbefdefb5edffab8fdb62a75494949966a2afe1936450ada661556f655ab376b0fa53a43a601dd7cfded1b395123213d17de738d2660fb26b51d6aadc7a7476067365b87794cdfa6904fe943a8d479dad342a88e581a6f65d23eb40ecaabc6b6b592db2b4cde74112a17aedc053e8e3f6065f2dd6aba1f5dda35b3922b2d2c5afd6fa87ebbf53070cbf28f80fe756ada74a1e3c4948e0f2726c5e57f8698fa6db3d0639d91328af46d755caa73f380b14f87fe40dfeea380869a7e8e3bad80657e5109acbd3d0caabc14975086ecfd19654cb17168902f441b26741057292a0f587c1c7ad93945c009af87003f783548917dae91bed7c02fe2a05f9895057c7afa9095fda6151128877508b5922b2dacdeb81faacbbffe0118bd6e2ab08677759b2e54674c4e4c9bf12cade4c4a450b88e983f7c8916759929a537c1a9170637b8f76ad11558a3c3eb546eda8e9ad5e908abd86776218d4d072ca08c24ee9ec140fdfe696e2f545577d78b556c96a745fd8afab3d73381eb267504b60eac65d38e55fe78391d970b76fc06343e7908ccbe409998e9ad594463c2d77ab4612255b871e7cfd05ff85534f0c7cdd38106bdedefab3e63726222b0f63e38312942ae23e68928b4a8bb75d2debd716a7d966f13f83fd66e067044a786c0ba356c8f5d9cdaa932cee566cf655470b9702c65a25ea175c55536cbdf1cbb8dfa6d02c6ceee89b25ee10fc88c1d57a07fe2720630ff5e3230ef3acdd25178f6b172c1785c86f7a6551326578a31fb4e4175fe3f7602638431a63d7bf5199313d35e4c51cf89496172193175b77e418bfa135b14dd20672b8d2b998c26cc061f60ff0e01c0a9fd5e06fa79d32c1f05177e24a4e7a1b5f75751c6906b7a70d74054cd1ef43b391549f9e9e4279047c5a702978f5136066493b27061366e1466e75937285316a551e6648d2efae45d5cbe35a00b13a9c29fe22e417ff9babdc095f3c728b2579d31393115c5b51a2726c5c965c4b4e43f458b6e3bff22dc218bb23be524ad4f4c83e13951679d716af8b843be58c8246d1bd3baa193ba51ceede5bbb42e3869edb972756505f5eb7aa118332dacacd8ee756131edbcc59c4f83eee82e8dedda3c573896f0087ab336532663468f4e1dc4a5392f8789809ffe790470cc9b3dace44a0bf1e76e4075f3765a1f9d3979802253d519931353515cab7162529c5c464c765bf4fb96e1529791c8449582bb4a7e8f76a3ab854bb6efe949eba0dba7d118c955b3763606fcd3b71724fb2516eef8b81b4481b53dc55536cb2c737a2a5c07fdfcfbebf0177bf61ed0544063e127276325db9933fd6dc8df1fde5bb2de9ef0d76bb47a70388e7e3986f55736bb579d31594738315924a4911393e2e27262ea92e92f401fb741faceb848fad04263b448f364a145e985bc0fc3692f797cf72097f4ecd035da4999b7f5b2a2f6a60da531f2884e344b5764a442c9224c05d81e7b4e2eedb1e7dea6316041e255496f111f0e843c62bcb2b1a1d849f29d7488129352802141f5c42a926587332627a6643c4b859c98140ad713d342b3427dcce7d4835c9aed95de19175fcc34bd8916efe868fd52dcfcd0b04610cd1ce8d82919b13f7be5bd97ee4365d1ae6bf65451dfb9a53f70d9e83f28d257ab74f10eada64cfdfa3c4c2d420a7d248c2d2d85f9922e278eeb0ff9c7138748d6db13663ea6597e96b017af57b835e578c6e4c4b4794f3831293c2e2726bb2bba149a75ea8fae67a24ac19325941157541b29d9fef46134861bded139633871a33bced0fae2f23d348613d78bcb6cf5207636ad171a146616b11fb9f2d2fd09a88a39413b45050f0873af9e953381fcbd91bd81732369766e5359a2d258540ce9bdb4bb12b5f22287332673c989c922618d9c98148f4a2326bb1dfa836b70a94b939eddf9741e44f51eb44e97778e4e365b847534e6c751b45868361e691e051799d5e8b411db59d93a85d63195aef739da0f66b729fe0e2ed7edbbc5448a70c58457a0d721a8b6227da54a6f7c7512aa190f69ddf231dbe9b113ffb70787c1ee8bd9a3953625a9979c9c2c29971356386332c79c982c12849c98d6f1a83462966e55ee59443d123d13546ffc62c83d9bb4065a4cb48e967ff30ccaf9d7e8e4b43189f670cd7959e447e5e725737d58c4864e03ce1bd602e85fb3ba4a4f15535f73843244d46175996254af60341cf19af4ea82da5e890f93e4a6d02a414112ed00d9f33734bc1354be9c37ce9eaacdfadbb76907c86ca6d51c9bcacf2a35cb989c98d6a1e6c4b48e47a511b3b41bc2deb97eff0a88f40603b0d1ec9d409df00c4fa9becc8529eb216a8c693781a6a7b42e58929f4d16c546a0deb326d0eda50640cfe0b654aee4e7d297eca359f06ee1bc243aa5e0233890be4fd424ca540a4c6caaac3d9a82fa6fa269f69d75fe18e90bcb7d368d9f55b2677dd8b33ff6f4e5ea53536915c06432c9a958c935cb98a55e3931110a4ecc5246e0a2f289c9fa73879ee2f34aa5bfd406efce67352f04fe750f8de10e9ca1533c4abf347be873efacee30a9e809fc77569c809ff3dfef01caedf0c8f5efd5ce3446dfb06caa9c8a22795a1aadeb1615d1dcc29e91f61993b5c889894870621221aa0e310582fa79d0fa62edc06041f262c09ce8dff0458f5ea4d3356abff59ce1ad6132a80dad32a8b5bf9f5500937ea316024dd9b457aed64fa7f6cd6112b52a52ada995fefdfb3447282c2cb492cb159c97318516393139319f53a1ca113320200014f5f4a41d1f81af551ed2b369d65fbf9663eb9fe23765a8fdc27ddad32ac3dfde6aa5d614fadfed39059cfff78a3dcddaa2399d41d8b371a643fd60460f1e3cc06541016572269743a7674c4ecc4cb9d8db947362aa7c3fa6cd6896a9d409d3cba0a0204859b98c4a95ba6427bcff7994766aba85bc84fe39fa74e5471be8dce3d524c7c676b56a7aa0fd7d336876ae3658632357c2e4d4395a07566bcff44382e9176f5fd41c2672083332e88d1f7979b4576fcf89d332262322272627e673125619621a841d9f060d68ace4e14119c0de5f8aabeb2fa73c42934b62295326a6d2ced296c8ae9037f5f776a84b63d79e815dd25d3ac1ed909367467f14de2ce229f37e4e4bce13b8366708eba5c28e4ed4ae38c84d25caf6a6e5fa171850075547767d26a7a2489e9949439a9c1c65f1705ac6e4c4e4c42ccbd82a43ccb29d7a7ecd66e5dede9481bcbcbca0e2aa4c5a6c2a417b077ebe08dcf59f5f80f167ae03ddfd692c552384d60f7dfc6a43ce862428a8f82812de442c7ef7ba0a1792aac5b974ea2a378176d64c4f1c9b5c493a9710b267747cbcad5755223ee807ed3e612d24acca8bd833460ccb6b584b9c9631ad9be1c414c7c3d13227a6a3915369c77ef259e664e8eeee0e4f6e6ef4260dbdf0065a7106637f812525941119b23d59864623ad4baedf4663afed7be9a7b65c7785d504f77af46c9077a310a878f8d22cbd9cbe9305ec4dbff9a98968c994493b284e6e56d6fdf851b44a30727067591d2d2a5c9631e53acb89291719927362da8ecfff4d2dcbb04bd61ec0773a745cfa1925f117d67bf940e4e1df10e8eee74fe55a7e40bdbb63ab0e254594c98bb31ec34fd1531a331665d0691c8b51d94e098c9df0c1c69813c7f482f737c25f71422be55d567ac62cdf25e74a3831d5c59713535dbc2aaccd08ba393a1ebeb6eea6bd65471deb848cc9326be9497dbd815c9a690c6c292e42d92cbcf9c262a2e7ae1d6dd75976ee6ed4ef195306a0899e9d439dd594a4df172e63b2287062b248482327a6745c5c2e3d72f206da5cb9e120302f9fc67e2eef482537d82880561fe6460c424f5e6e4263695777eb85cd98e240736252443831c5cca822e5ccc7f47f642e5d47b3f6f357e879e82ad23dcdbbc1263783fab681ef09eff4047a56a77564cd1b54e890674c51a0383139314594a89ac513676fa163ebff750c98964ea779aa666f95f7aa55735a8f9dfa5e5f18350baea7dcd8059a3c63da093227a69d0039a99a135361604bcc1668b29da2dd072ea09c789b4e662b7453696a1ddb04a3ed91433a01dbb46c5c697d51d23027a692283dd3e1c45418288dd438312b18c8ab0974723ceed44d783a7e9ade59f45078f77805ddab360f0aa4ffc5b77737daa9e913d6123e02eaf9aaf65599069c98158c3e276605032863ce8929131847c56cab33f51e9d16ba9ef800ae18a6dda7597d7a6636e44fb3f3810585b487ceda65eb8bece4782d1f3a41dea8219d666a1440d8bc293d53d5ae158d19fd7c1d7b4689b55b55901353e33bc189a94d403931b58923f7a271043831350e2877a74d043831b58923f7a271043831350e2877a74d043831b58923f7a271043831350e2877a74d043831b58923f7a271043831350e2877a74d043831b58923f7a271043831350e2877a74d043831b58923f7a271043831350e2877a74d04fe0b1c6a8ca3db1b81c60000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karypendidikan`
--

CREATE TABLE `tbl_karypendidikan` (
  `idKaryawan` int(11) NOT NULL,
  `idKaryPend` int(10) NOT NULL,
  `namaSekolah` varchar(20) NOT NULL,
  `tingkatPend` varchar(10) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `program` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `Graduate` varchar(10) NOT NULL,
  `thnTamat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karypendidikan`
--

INSERT INTO `tbl_karypendidikan` (`idKaryawan`, `idKaryPend`, `namaSekolah`, `tingkatPend`, `jurusan`, `program`, `kota`, `Graduate`, `thnTamat`) VALUES
(17, 1, 'Sma 2', 'sma', 'ipa', '', 'Medan', '75,7', '2017-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karypendidikannf`
--

CREATE TABLE `tbl_karypendidikannf` (
  `idKaryawan` varchar(15) NOT NULL,
  `idKaryPendNF` smallint(6) NOT NULL,
  `judulKursus` varchar(50) DEFAULT NULL,
  `penyelenggara` varchar(50) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `durasi` smallint(6) DEFAULT NULL,
  `thnSertifikat` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karypendidikannf`
--

INSERT INTO `tbl_karypendidikannf` (`idKaryawan`, `idKaryPendNF`, `judulKursus`, `penyelenggara`, `kota`, `durasi`, `thnSertifikat`) VALUES
('17', 0, 'CCNA', 'Cisco', 'semarang', 3, '2017-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karypenghargaan`
--

CREATE TABLE `tbl_karypenghargaan` (
  `idKaryawan` varchar(15) NOT NULL,
  `idKaryPenghargaan` smallint(6) NOT NULL,
  `namaPenghargaan` varchar(255) DEFAULT NULL,
  `penyelenggara` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `tahun` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karypenghargaan`
--

INSERT INTO `tbl_karypenghargaan` (`idKaryawan`, `idKaryPenghargaan`, `namaPenghargaan`, `penyelenggara`, `kota`, `tahun`) VALUES
('17', 0, 'Karyawan Terbaik', 'Tabloid Cempaka', 'semarang', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karypengkerja`
--

CREATE TABLE `tbl_karypengkerja` (
  `idKaryawan` varchar(15) NOT NULL,
  `idKaryPengKerja` smallint(6) NOT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `JabatanTerakhir` varchar(35) DEFAULT NULL,
  `GajiTerakhir` double DEFAULT NULL,
  `MasaKerja` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karypengkerja`
--

INSERT INTO `tbl_karypengkerja` (`idKaryawan`, `idKaryPengKerja`, `perusahaan`, `kota`, `JabatanTerakhir`, `GajiTerakhir`, `MasaKerja`) VALUES
('17', 0, 'Suara Merdeka', 'Semarang', 'IT staff', 3200000, '1 tahun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karypengorg`
--

CREATE TABLE `tbl_karypengorg` (
  `idKaryawan` varchar(15) NOT NULL,
  `idKaryPengOrg` smallint(6) NOT NULL,
  `Organisasi` varchar(255) DEFAULT NULL,
  `posisiTerakhir` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `thnKeluar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karypengorg`
--

INSERT INTO `tbl_karypengorg` (`idKaryawan`, `idKaryPengOrg`, `Organisasi`, `posisiTerakhir`, `kota`, `thnKeluar`) VALUES
('17', 0, 'SCA', 'Dewan Penasehat', 'Semarang', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karypengtugas`
--

CREATE TABLE `tbl_karypengtugas` (
  `idKaryawan` varchar(15) NOT NULL,
  `idKaryPengTugas` smallint(6) NOT NULL,
  `namaPerusahaan` varchar(255) DEFAULT NULL,
  `Kegiatan` varchar(255) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `tahun` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karypengtugas`
--

INSERT INTO `tbl_karypengtugas` (`idKaryawan`, `idKaryPengTugas`, `namaPerusahaan`, `Kegiatan`, `kota`, `tahun`) VALUES
('17', 0, 'Tabloid Cempaka', 'Staff IT', 'Semarang', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyrefkeluarga`
--

CREATE TABLE `tbl_karyrefkeluarga` (
  `idKaryawan` varchar(15) NOT NULL,
  `idKaryRefKeluarga` smallint(6) NOT NULL,
  `namaRef` varchar(50) DEFAULT NULL,
  `relasi` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyrefkeluarga`
--

INSERT INTO `tbl_karyrefkeluarga` (`idKaryawan`, `idKaryRefKeluarga`, `namaRef`, `relasi`, `alamat`, `telp`) VALUES
('17', 1, 'Devi', 'Sepupu', 'jalan gurami Semarang', '0811111112');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karytrainseminar`
--

CREATE TABLE `tbl_karytrainseminar` (
  `idKaryawan` varchar(15) NOT NULL,
  `idKaryTrainSeminar` smallint(6) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penyelenggara` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `hasil` varchar(30) DEFAULT NULL,
  `thn_seminar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karytrainseminar`
--

INSERT INTO `tbl_karytrainseminar` (`idKaryawan`, `idKaryTrainSeminar`, `judul`, `penyelenggara`, `kota`, `hasil`, `thn_seminar`) VALUES
('17', 1, '1', '1', '1', '1', '2017-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok`
--

CREATE TABLE `tbl_kelompok` (
  `nama_kelompok` enum('core','secondary','','') NOT NULL,
  `prosentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelompok`
--

INSERT INTO `tbl_kelompok` (`nama_kelompok`, `prosentase`) VALUES
('core', 60),
('secondary', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `idOrg` int(6) NOT NULL,
  `namaOrg` varchar(50) NOT NULL,
  `alamatOrg` varchar(50) DEFAULT NULL,
  `kategori` varchar(1) DEFAULT NULL,
  `induk` varchar(10) DEFAULT NULL,
  `idBU` varchar(10) DEFAULT NULL,
  `idDept` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`idOrg`, `namaOrg`, `alamatOrg`, `kategori`, `induk`, `idBU`, `idDept`) VALUES
(6, 'Suara Merdeka Press', 'Jalan Pandanaran', NULL, NULL, NULL, NULL),
(7, 'Tabloid Cempaka', 'Jalan Merak', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `idPekerjaan` int(6) NOT NULL,
  `idKaryawan` int(6) NOT NULL,
  `idOrg` int(6) NOT NULL,
  `idJabatan` int(6) NOT NULL,
  `idDept` int(11) NOT NULL,
  `tglMasuk` date NOT NULL,
  `alasanMasuk` varchar(100) NOT NULL,
  `tglKeluar` date NOT NULL,
  `alasanKeluar` varchar(100) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`idPekerjaan`, `idKaryawan`, `idOrg`, `idJabatan`, `idDept`, `tglMasuk`, `alasanMasuk`, `tglKeluar`, `alasanKeluar`, `catatan`) VALUES
(15, 17, 6, 12, 4, '2017-08-22', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skala`
--

CREATE TABLE `tbl_skala` (
  `id_skala` tinyint(3) NOT NULL,
  `skala` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skala`
--

INSERT INTO `tbl_skala` (`id_skala`, `skala`) VALUES
(1, 'Sangat Kurang'),
(2, 'Kurang'),
(3, 'Cukup'),
(4, 'Baik'),
(5, 'Sangat baik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `idKaryawan` int(11) NOT NULL,
  `id_faktor` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  ADD PRIMARY KEY (`idAnak`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  ADD PRIMARY KEY (`selisih`);

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`idCuti`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`idDept`),
  ADD KEY `idOrg` (`idOrg`);

--
-- Indexes for table `tbl_faktor`
--
ALTER TABLE `tbl_faktor`
  ADD PRIMARY KEY (`id_faktor`),
  ADD KEY `id_aspek` (`id_aspek`);

--
-- Indexes for table `tbl_hasil_akhir`
--
ALTER TABLE `tbl_hasil_akhir`
  ADD PRIMARY KEY (`id_akhir`),
  ADD KEY `idKaryawan` (`idKaryawan`),
  ADD KEY `hasil_akhir` (`hasil_akhir`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`idJabatan`),
  ADD KEY `idOrg` (`idDept`),
  ADD KEY `idOrg_2` (`idDept`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`idJurusan`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`idKaryawan`);

--
-- Indexes for table `tbl_karypendidikan`
--
ALTER TABLE `tbl_karypendidikan`
  ADD PRIMARY KEY (`idKaryPend`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_karypendidikannf`
--
ALTER TABLE `tbl_karypendidikannf`
  ADD PRIMARY KEY (`idKaryPendNF`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_karypenghargaan`
--
ALTER TABLE `tbl_karypenghargaan`
  ADD PRIMARY KEY (`idKaryPenghargaan`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_karypengkerja`
--
ALTER TABLE `tbl_karypengkerja`
  ADD PRIMARY KEY (`idKaryPengKerja`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_karypengorg`
--
ALTER TABLE `tbl_karypengorg`
  ADD PRIMARY KEY (`idKaryPengOrg`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_karypengtugas`
--
ALTER TABLE `tbl_karypengtugas`
  ADD PRIMARY KEY (`idKaryPengTugas`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_karyrefkeluarga`
--
ALTER TABLE `tbl_karyrefkeluarga`
  ADD PRIMARY KEY (`idKaryRefKeluarga`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_karytrainseminar`
--
ALTER TABLE `tbl_karytrainseminar`
  ADD PRIMARY KEY (`idKaryTrainSeminar`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- Indexes for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`idOrg`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`idPekerjaan`),
  ADD KEY `idKaryawan` (`idKaryawan`),
  ADD KEY `idOrg` (`idOrg`),
  ADD KEY `idJabatan` (`idJabatan`),
  ADD KEY `idDept` (`idDept`);

--
-- Indexes for table `tbl_skala`
--
ALTER TABLE `tbl_skala`
  ADD PRIMARY KEY (`id_skala`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD KEY `idKaryawan` (`idKaryawan`),
  ADD KEY `id_faktor` (`id_faktor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  MODIFY `idAnak` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `idCuti` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `idDept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_faktor`
--
ALTER TABLE `tbl_faktor`
  MODIFY `id_faktor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_hasil_akhir`
--
ALTER TABLE `tbl_hasil_akhir`
  MODIFY `id_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `idJabatan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `idKaryawan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_karypendidikan`
--
ALTER TABLE `tbl_karypendidikan`
  MODIFY `idKaryPend` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_karyrefkeluarga`
--
ALTER TABLE `tbl_karyrefkeluarga`
  MODIFY `idKaryRefKeluarga` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_karytrainseminar`
--
ALTER TABLE `tbl_karytrainseminar`
  MODIFY `idKaryTrainSeminar` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `idOrg` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `idPekerjaan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_skala`
--
ALTER TABLE `tbl_skala`
  MODIFY `id_skala` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idKaryawan`) REFERENCES `tbl_karyawan` (`idKaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  ADD CONSTRAINT `tbl_anak_ibfk_1` FOREIGN KEY (`idKaryawan`) REFERENCES `tbl_karyawan` (`idKaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD CONSTRAINT `tbl_cuti_ibfk_1` FOREIGN KEY (`idKaryawan`) REFERENCES `tbl_karyawan` (`idKaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD CONSTRAINT `tbl_departemen_ibfk_1` FOREIGN KEY (`idOrg`) REFERENCES `tbl_organisasi` (`idOrg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_faktor`
--
ALTER TABLE `tbl_faktor`
  ADD CONSTRAINT `tbl_faktor_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `tbl_aspek` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_hasil_akhir`
--
ALTER TABLE `tbl_hasil_akhir`
  ADD CONSTRAINT `tbl_hasil_akhir_ibfk_1` FOREIGN KEY (`idKaryawan`) REFERENCES `tbl_karyawan` (`idKaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD CONSTRAINT `tbl_jabatan_ibfk_1` FOREIGN KEY (`idDept`) REFERENCES `tbl_departemen` (`idDept`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_karypendidikan`
--
ALTER TABLE `tbl_karypendidikan`
  ADD CONSTRAINT `tbl_karypendidikan_ibfk_1` FOREIGN KEY (`idKaryawan`) REFERENCES `tbl_karyawan` (`idKaryawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD CONSTRAINT `tbl_pekerjaan_ibfk_1` FOREIGN KEY (`idJabatan`) REFERENCES `tbl_jabatan` (`idJabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pekerjaan_ibfk_2` FOREIGN KEY (`idOrg`) REFERENCES `tbl_organisasi` (`idOrg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pekerjaan_ibfk_3` FOREIGN KEY (`idKaryawan`) REFERENCES `tbl_karyawan` (`idKaryawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pekerjaan_ibfk_4` FOREIGN KEY (`idDept`) REFERENCES `tbl_departemen` (`idDept`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD CONSTRAINT `tbl_test_ibfk_1` FOREIGN KEY (`idKaryawan`) REFERENCES `tbl_karyawan` (`idKaryawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_test_ibfk_2` FOREIGN KEY (`id_faktor`) REFERENCES `tbl_faktor` (`id_faktor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
