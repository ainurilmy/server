-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2019 pada 08.16
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videostreaming`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lazday_admin`
--

CREATE TABLE `lazday_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text,
  `updated` datetime DEFAULT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lazday_admin`
--

INSERT INTO `lazday_admin` (`admin_id`, `username`, `password`, `updated`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2018-07-10 18:11:25', '2018-12-26 23:02:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lazday_cat`
--

CREATE TABLE `lazday_cat` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lazday_cat`
--

INSERT INTO `lazday_cat` (`cat_id`, `category`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Rap'),
(4, 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lazday_like`
--

CREATE TABLE `lazday_like` (
  `like_id` bigint(20) NOT NULL,
  `android_id` text NOT NULL,
  `list_id` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lazday_like`
--

INSERT INTO `lazday_like` (`like_id`, `android_id`, `list_id`, `created`, `status`) VALUES
(1, 'cdb4f733a0f1d6c4', '1', '2018-12-20 02:17:48', 'read'),
(2, 'cdb4f733a0f1d6c4', '3', '2018-12-20 02:17:51', 'read'),
(3, 'cdb4f733a0f1d6c4', '6', '2018-12-20 02:18:00', 'read'),
(4, '6bdf16fc1258e07d', '6', '2018-12-20 09:09:18', 'read');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lazday_list`
--

CREATE TABLE `lazday_list` (
  `list_id` bigint(20) NOT NULL,
  `video_id` bigint(20) DEFAULT NULL,
  `title` text NOT NULL,
  `filename` text NOT NULL,
  `view` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lazday_list`
--

INSERT INTO `lazday_list` (`list_id`, `video_id`, `title`, `filename`, `view`, `created`, `updated`) VALUES
(1, 23, 'Sheila On 7 - Betapa (Video Clip)', '201220185c1a94d163c72.mp4', 2, '2018-12-20 01:58:25', '2018-12-20 01:58:25'),
(2, 23, 'Sheila on 7 - Dan', '201220185c1a94edb6ab7.mp4', 1, '2018-12-20 01:58:53', '2018-12-20 01:58:53'),
(3, 23, 'Sheila On 7 - Lapang Dada (Official Music Video)', '201220185c1a94ff3edba.mp4', 0, '2018-12-20 01:59:11', '2018-12-20 01:59:11'),
(4, 25, 'Bondan Prakoso  Fade2Black - Ya Sudahlah (Video Clip)', '201220185c1a95326ea88.mp4', 0, '2018-12-20 02:00:02', '2018-12-20 02:00:02'),
(5, 26, 'ADA Band -  Manusia bodoh', '201220185c1a970bd5fcf.mp4', 0, '2018-12-20 02:07:56', '2018-12-20 02:07:56'),
(6, 21, 'Letto - sandaran hati', '201220185c1a972c77d32.mp4', 6, '2018-12-20 02:08:28', '2018-12-20 02:08:28'),
(7, 24, 'Noah - Separuh aku', '201220185c1a976ca6f65.mp4', 2, '2018-12-20 02:09:32', '2018-12-20 02:09:32'),
(8, 27, 'Andra and the BackBone - Lagi dan lagi', '201220185c1a97fba0bcf.mp4', 1, '2018-12-20 02:11:55', '2018-12-20 02:11:55'),
(9, 23, 'sheila baru', '201220185c1afec4bfd7a.mp4', 0, '2018-12-20 09:30:28', '2018-12-20 09:30:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lazday_user`
--

CREATE TABLE `lazday_user` (
  `user_id` bigint(20) NOT NULL,
  `android_id` text,
  `created` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lazday_user`
--

INSERT INTO `lazday_user` (`user_id`, `android_id`, `created`, `last_login`, `status`) VALUES
(1, '6bdf16fc1258e07d', '2018-12-20 09:05:17', '2018-12-20 09:05:17', 'read');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lazday_video`
--

CREATE TABLE `lazday_video` (
  `video_id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `cover` text NOT NULL,
  `category` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lazday_video`
--

INSERT INTO `lazday_video` (`video_id`, `title`, `summary`, `cover`, `category`, `created`, `updated`) VALUES
(21, 'Letto', 'Letto merupakan sebuah grup musik Indonesia yang pertama kali dibentuk tahun 2004. Grup musik asal Yogyakarta ini beranggotakan Noe (Sabrang Mowo Damar Panuluh, Yogyakarta 10 Juni 1979) sebagai vokalis, Patub (Agus Riyono, Yogyakarta, 2 Agustus 1979) sebagai gitaris, Arian (Ari Prastowo, Bantul, 27 Maret 1979) sebagai bassis, dan Dhedot (Dedi Riyono, Yogyakarta, 23 Januari 1987) sebagai drummer.', '201220185c1a923254b3e.jpg', 'Pop', '2018-12-20 01:47:14', '2018-12-20 02:14:57'),
(23, 'Sheila On 7', 'Sheila On 7 adalah grup musik Indonesia yang berdiri pada 6 Mei 1996 di Yogyakarta.[1] Grup band ini pada awalnya adalah sekumpulan anak-anak sekolah dari beberapa SMA di Yogyakarta.', '201220185c1a932109ae0.jpg', 'Pop, Rock', '2018-12-20 01:51:13', '2018-12-20 02:14:47'),
(24, 'Noah', 'NOAH (sebelumnya bernama Peterpan), adalah sebuah grup musik Pop/Rock alternatif dari Bandung, Indonesia. Grup musik ini dikenal sebagai grup musik terbesar atau paling terkenal di Indonesia, bahkan sedikitnya di dunia. Grup musik ini dibentuk pada tahun 2000 dan terkenal berkat lagunya \"Mimpi Yang Sempurna\".', '201220185c1a9389a9df1.jpg', 'Pop,Rock', '2018-12-20 01:52:57', '2018-12-20 02:14:35'),
(25, 'Bondan Prakoso Fade2Black', 'Bondan Prakoso (lahir di Jakarta, 8 Mei 1984; umur 34 tahun)[1] adalah pemusik Indonesia yang mengawali karier bermusik sebagai penyanyi cilik pada tahun 80-an. Ia mulai dikenal sejak dirilisnya album Si Lumba-lumba (1989). ', '201220185c1a93cd00e25.jpg', 'Rap', '2018-12-20 01:54:05', '2018-12-20 02:14:24'),
(26, 'ADA Band', 'ADA Band adalah sebuah grup musik yang berasal dari Jakarta, Indonesia. Grup ini awalnya didirikan oleh Suriandika Satjadibrata, Ibrahim Imran, Krishna Balagita, Iso Eddy H dan Elif Ritonga. Namun di tengah perjalanan kariernya grup ini mengalami banyak pergantian personel, grup musik yang melejit melalui tembang-tembangnya seperti \"Masih\",', '201220185c1a94475162e.jpg', 'Pop', '2018-12-20 01:56:07', '2018-12-20 02:14:09'),
(27, 'Andra and the BackBone', 'Andra and the BackBone merupakan salah satu grup musik dari Indonesia. Anggotanya berjumlah tiga orang yaitu Dedy, Stevie, dan Andra Junaidi. Grup musik ini dibentuk pada tahun 2007.', '201220185c1a97ba2bbfc.jpg', 'Pop,Rap,Rock', '2018-12-20 02:10:50', '2018-12-20 02:14:02'),
(28, 'here we go', 'jkkgj', 'Backup_of_tugasGayuh.cdr', '', '2018-12-26 23:04:29', '2018-12-26 23:04:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lazday_admin`
--
ALTER TABLE `lazday_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `lazday_cat`
--
ALTER TABLE `lazday_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indeks untuk tabel `lazday_like`
--
ALTER TABLE `lazday_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indeks untuk tabel `lazday_list`
--
ALTER TABLE `lazday_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indeks untuk tabel `lazday_user`
--
ALTER TABLE `lazday_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `lazday_video`
--
ALTER TABLE `lazday_video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lazday_admin`
--
ALTER TABLE `lazday_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lazday_cat`
--
ALTER TABLE `lazday_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lazday_like`
--
ALTER TABLE `lazday_like`
  MODIFY `like_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lazday_list`
--
ALTER TABLE `lazday_list`
  MODIFY `list_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `lazday_user`
--
ALTER TABLE `lazday_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lazday_video`
--
ALTER TABLE `lazday_video`
  MODIFY `video_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
