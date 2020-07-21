-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2019 pada 18.24
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `asijamu`
--
CREATE DATABASE IF NOT EXISTS `asijamu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `asijamu`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `alamat`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Kampung Kolam Rp4 Blok C-17\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokeditor`
--

CREATE TABLE IF NOT EXISTS `tbl_dokeditor` (
  `id_dokeditor` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `file_editor` varchar(550) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokeditor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tbl_dokeditor`
--

INSERT INTO `tbl_dokeditor` (`id_dokeditor`, `id_journal`, `id_users`, `file_editor`, `waktu`) VALUES
(3, 35, 8, '20190613-Permohonan Perubahan Nama Email1.pdf', '2019-06-13 18:03:54'),
(4, 41, 10, '20190614-desain background mantap keren banget hijau.pdf', '2019-06-14 08:28:34'),
(5, 43, 8, '20190620-Lampiran.pdf', '2019-06-20 18:01:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokins`
--

CREATE TABLE IF NOT EXISTS `tbl_dokins` (
  `id_instrument` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `file_insresearch` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_instrument`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_dokins`
--

INSERT INTO `tbl_dokins` (`id_instrument`, `id_journal`, `id_dosen`, `file_insresearch`, `waktu`) VALUES
(1, 35, 9, '20190524-Tulisan Ida Penggunaan Media Massa di Nias Utara.doc', '2019-05-24 15:29:45'),
(3, 36, 9, '20190524-SURAT KETERANGAN.docx', '2019-05-24 17:57:15'),
(4, 35, 9, '20190531-Entreprenuer.pdf', '2019-05-31 11:15:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokpeda`
--

CREATE TABLE IF NOT EXISTS `tbl_dokpeda` (
  `id_dokpeda` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `file_peda` varchar(550) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokpeda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `tbl_dokpeda`
--

INSERT INTO `tbl_dokpeda` (`id_dokpeda`, `id_journal`, `id_dosen`, `file_peda`, `waktu`) VALUES
(11, 35, 9, '20190611-N O T A   DINAS 2018.docx', '2019-06-11 21:13:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokreseminar`
--

CREATE TABLE IF NOT EXISTS `tbl_dokreseminar` (
  `id_dokreseminar` int(2) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `file_dokreseminar` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokreseminar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_dokreseminar`
--

INSERT INTO `tbl_dokreseminar` (`id_dokreseminar`, `id_journal`, `id_dosen`, `file_dokreseminar`, `waktu`) VALUES
(2, 35, 9, '20190611-daftar SMK TIK Pontianak.pdf', '2019-06-11 16:31:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokresevalap`
--

CREATE TABLE IF NOT EXISTS `tbl_dokresevalap` (
  `id_dokresevalap` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `file_evalap` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokresevalap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `tbl_dokresevalap`
--

INSERT INTO `tbl_dokresevalap` (`id_dokresevalap`, `id_journal`, `id_dosen`, `file_evalap`, `waktu`) VALUES
(12, 35, 9, '20190611-daftar SMK TIK Pontianak.pdf', '2019-06-11 20:41:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokresevapub`
--

CREATE TABLE IF NOT EXISTS `tbl_dokresevapub` (
  `id_dokresevapub` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `file_evapub` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokresevapub`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_dokresevapub`
--

INSERT INTO `tbl_dokresevapub` (`id_dokresevapub`, `id_journal`, `id_dosen`, `file_evapub`, `waktu`) VALUES
(1, 35, 9, '20190611-daftar SMK TIK Pontianak.pdf', '2019-06-11 21:00:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokrespro`
--

CREATE TABLE IF NOT EXISTS `tbl_dokrespro` (
  `id_dokpro` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `file_dokpro` varchar(550) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokpro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_dokrespro`
--

INSERT INTO `tbl_dokrespro` (`id_dokpro`, `id_journal`, `id_dosen`, `file_dokpro`, `waktu`) VALUES
(2, 35, 9, '20190531-Surat DTS UINSU.pdf', '2019-05-31 10:45:09'),
(3, 43, 9, '20190620-Pak Komda.pdf', '2019-06-20 18:16:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokrev`
--

CREATE TABLE IF NOT EXISTS `tbl_dokrev` (
  `id_dokrev` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `file_review` varchar(550) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokrev`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_dokrev`
--

INSERT INTO `tbl_dokrev` (`id_dokrev`, `id_journal`, `id_users`, `file_review`, `waktu`) VALUES
(1, 43, 6, '20190620-Pak Komda.pdf', '2019-06-20 18:03:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokrevimlap`
--

CREATE TABLE IF NOT EXISTS `tbl_dokrevimlap` (
  `id_dokrevimlap` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `file_revimlap` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokrevimlap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_dokrevimlap`
--

INSERT INTO `tbl_dokrevimlap` (`id_dokrevimlap`, `id_journal`, `id_users`, `file_revimlap`, `waktu`) VALUES
(1, 35, 6, '20190613-SURAT-PERNYATAAN-PENJAGA-TAHANAN-UMUM.doc', '2019-06-13 15:07:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokrevimpeda`
--

CREATE TABLE IF NOT EXISTS `tbl_dokrevimpeda` (
  `id_dokrevimpeda` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `file_revimpeda` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokrevimpeda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_dokrevimpeda`
--

INSERT INTO `tbl_dokrevimpeda` (`id_dokrevimpeda`, `id_journal`, `id_users`, `file_revimpeda`, `waktu`) VALUES
(1, 35, 6, '20190613-WhatsApp Image 2019-05-13 at 13.12.45.jpeg', '2019-06-13 14:33:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen`
--

CREATE TABLE IF NOT EXISTS `tbl_dokumen` (
  `id_dokumen` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `filee` varchar(550) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`id_dokumen`, `id_journal`, `id_dosen`, `filee`, `waktu`) VALUES
(17, 35, 9, '20190524-3. bagian dari buku.pdf', '2019-05-24 16:56:47'),
(18, 36, 9, '20190524-Tulisan Ida Penggunaan Media Massa di Nias Utara.doc', '2019-05-24 17:18:21'),
(21, 35, 9, '20190531-Surat Permohonan DTS.pdf', '2019-05-31 10:19:37'),
(22, 35, 9, '20190531-scan0001.pdf', '2019-05-31 10:35:52'),
(23, 35, 9, '20190531-Permohonan Keynote Speech.pdf', '2019-05-31 10:37:14'),
(24, 41, 9, '20190614-desain background mantap keren banget hijau.pdf', '2019-06-14 08:23:25'),
(25, 43, 9, '20190620-Lampiran.docx', '2019-06-20 17:32:45'),
(26, 44, 9, '20190620-Pak Kadri.pdf', '2019-06-20 17:36:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE IF NOT EXISTS `tbl_dosen` (
  `id_dosen` int(5) NOT NULL AUTO_INCREMENT,
  `unama` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `akses` enum('Aktif','Non Aktif') NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `unama`, `password`, `nama`, `email`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telpon`, `akses`) VALUES
(10, 'okto och', 'dc2f4ef676263fe9dde73a9ae6299258', 'Oktolina', 'okto001@kominfo.go.id', 'Tombak 31', 'Balikpapan', '1979-10-14', 'Perempuan', '081361514844', 'Aktif'),
(11, 'moh', '827ccb0eea8a706c4c34a16891f84e7b', 'Moh. Muttaqin', 'mohm001@kominfo.go.id', 'Medan', 'Aceh', '1975-11-10', 'Laki-laki', '082180086279', 'Aktif'),
(9, 'fachri', '827ccb0eea8a706c4c34a16891f84e7b', 'Fachri Siregar', 'regarfcahri@gmail.com', 'Jl. Perhubungan Medan', 'Medan', '1991-06-08', 'Laki-laki', '082180086279', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ins_review`
--

CREATE TABLE IF NOT EXISTS `tbl_ins_review` (
  `id_insrev` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `file_insrev` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_insrev`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_ins_review`
--

INSERT INTO `tbl_ins_review` (`id_insrev`, `id_journal`, `id_users`, `file_insrev`, `waktu`) VALUES
(1, 35, 6, '20190613-Unpab03122018.pdf', '2019-06-13 11:57:28'),
(2, 35, 6, '20190613-539621002.pdf', '2019-06-13 12:19:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_journal`
--

CREATE TABLE IF NOT EXISTS `tbl_journal` (
  `id_journal` int(5) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(5) NOT NULL,
  `id_metode` int(5) NOT NULL,
  `penilai_eksternal` varchar(50) NOT NULL,
  `penilai_internal` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `abstrak` text NOT NULL,
  `tujuan_penelitian` text NOT NULL,
  `metode` text NOT NULL,
  `latar_belakang` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `review` int(2) NOT NULL,
  `editor` int(2) NOT NULL,
  `acc` int(2) NOT NULL,
  `acc_resolahdata` int(2) NOT NULL,
  `acc_reslap` int(2) NOT NULL,
  `acc_reseminar` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `view` int(5) NOT NULL,
  `waktu_kirim` datetime NOT NULL,
  PRIMARY KEY (`id_journal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `tbl_journal`
--

INSERT INTO `tbl_journal` (`id_journal`, `id_dosen`, `id_metode`, `penilai_eksternal`, `penilai_internal`, `judul`, `abstrak`, `tujuan_penelitian`, `metode`, `latar_belakang`, `file`, `review`, `editor`, `acc`, `acc_resolahdata`, `acc_reslap`, `acc_reseminar`, `status`, `view`, `waktu_kirim`) VALUES
(43, 9, 0, 'Prof. Dr. Yusnadi', 'Tristania', 'asdad', 'asdasd', 'asdad', 'asdda', 'asdads', '', 1, 1, 0, 0, 0, 0, 0, 1, '2019-06-20 17:32:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_journal_note`
--

CREATE TABLE IF NOT EXISTS `tbl_journal_note` (
  `id_journal_note` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `catatan` text NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_journal_note`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data untuk tabel `tbl_journal_note`
--

INSERT INTO `tbl_journal_note` (`id_journal_note`, `id_journal`, `id_users`, `catatan`, `waktu`) VALUES
(69, 10, 8, 'hgdhgdhgd', '2019-04-05 10:03:25'),
(70, 10, 6, 'gryryruy', '2019-04-05 10:08:33'),
(71, 22, 9, 'asadada', '2019-05-06 15:11:00'),
(72, 22, 6, 'sada', '2019-05-06 15:15:16'),
(73, 22, 6, 'SISTEM KOMUNIKASI PERINGATAN DINI PENCEGAHAN KEBAKARAN HUTAN DAN LAHAN DI PROVINSI RIAU', '2019-05-06 15:17:19'),
(74, 22, 6, 'adssad', '2019-05-07 09:21:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_metode_penelitian`
--

CREATE TABLE IF NOT EXISTS `tbl_metode_penelitian` (
  `id_metode` int(5) NOT NULL AUTO_INCREMENT,
  `metode_penelitian` varchar(250) NOT NULL,
  PRIMARY KEY (`id_metode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_metode_penelitian`
--

INSERT INTO `tbl_metode_penelitian` (`id_metode`, `metode_penelitian`) VALUES
(1, 'Kualitatif'),
(2, 'Kuantitatif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reslap`
--

CREATE TABLE IF NOT EXISTS `tbl_reslap` (
  `id_reslap` int(2) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_dosen` int(5) NOT NULL,
  `file_reslap` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_reslap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_reslap`
--

INSERT INTO `tbl_reslap` (`id_reslap`, `id_journal`, `id_dosen`, `file_reslap`, `waktu`) VALUES
(3, 35, 9, '20190611-daftar SMK TIK Pontianak.pdf', '2019-06-11 16:29:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_resolahdata`
--

CREATE TABLE IF NOT EXISTS `tbl_resolahdata` (
  `id_resolah` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `file_olah` varchar(550) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_resolah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_resolahdata`
--

INSERT INTO `tbl_resolahdata` (`id_resolah`, `id_journal`, `id_users`, `file_olah`, `waktu`) VALUES
(4, 35, 9, '20190611-daftar SMK TIK Pontianak.pdf', '2019-06-11 16:29:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_seminarprop`
--

CREATE TABLE IF NOT EXISTS `tbl_seminarprop` (
  `id_seminarprop` int(5) NOT NULL AUTO_INCREMENT,
  `id_journal` int(5) NOT NULL,
  `id_users` int(5) NOT NULL,
  `file_seminarprop` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_seminarprop`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_seminarprop`
--

INSERT INTO `tbl_seminarprop` (`id_seminarprop`, `id_journal`, `id_users`, `file_seminarprop`, `waktu`) VALUES
(1, 43, 8, '20190620-daftar SMK TIK Pontianak.pdf', '2019-06-20 23:19:44'),
(2, 43, 8, '20190620-sk nur hasanah.jpg', '2019-06-20 23:22:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_users` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `level` enum('reviewer','editor','pembaca') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `password`, `nama_lengkap`, `email`, `no_telpon`, `jenis_kelamin`, `alamat_lengkap`, `level`) VALUES
(6, 'Yusnadi', '827ccb0eea8a706c4c34a16891f84e7b', 'Prof. Dr. Yusnadi', '', '082180086279', 'Laki-laki', 'Jl.Veteran', 'reviewer'),
(8, 'Tristania', '827ccb0eea8a706c4c34a16891f84e7b', 'Tristania', '', '082180086279', 'Perempuan', 'Jl. Karya', 'editor'),
(10, 'Oktolina', '827ccb0eea8a706c4c34a16891f84e7b', 'Oktolina Simatupang', 'okto001@kominfo.go.id', '082180086279', 'Perempuan', 'JL. Helvet', 'editor'),
(11, 'Syukur Kholil', '827ccb0eea8a706c4c34a16891f84e7b', 'Prof. Dr. Syukur Kholil', 'syukur@gmail.com', '082180086279', 'Laki-laki', 'Jl. Pancing', 'reviewer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
