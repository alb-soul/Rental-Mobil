-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Jan 2023 pada 13.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Rental_RIPA`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Karyawan`
--

CREATE TABLE `Karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(20) DEFAULT NULL,
  `jabatan` enum('Promoter','Kasir') DEFAULT NULL,
  `alamat_karyawan` varchar(30) DEFAULT NULL,
  `no_hp_karyawan` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Karyawan`
--

INSERT INTO `Karyawan` (`id_karyawan`, `nama_karyawan`, `jabatan`, `alamat_karyawan`, `no_hp_karyawan`) VALUES
(1, 'Rudi San', 'Kasir', 'Sungai Buluh', '086754389121'),
(2, 'Wahyudi', 'Promoter', 'Tapus Muara', '085564909808'),
(3, 'Budi Rar', 'Promoter', 'Tapus Muara', '087775463491'),
(4, 'Nande nande', 'Kasir', 'Polder', '084349173492'),
(5, 'Yor Forger', 'Kasir', 'Sungai Buluh', '089581347221'),
(6, 'Sukiman', 'Promoter', 'Loksado', '081347290167'),
(7, 'Loid Yora', 'Promoter', 'Hambuku', '089347822264');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Mobil`
--

CREATE TABLE `Mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(20) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Mobil`
--

INSERT INTO `Mobil` (`id_mobil`, `nama_mobil`, `harga_sewa`) VALUES
(1, 'Avanza S3', 58000),
(2, 'Xenia Xpred', 50000),
(3, 'Avanza G22', 60000),
(4, 'Honda Jazz', 48000),
(5, 'BMW Silv', 70000),
(6, 'Mitsubishi Ftren', 53000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Peminjam`
--

CREATE TABLE `Peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama_peminjam` varchar(30) DEFAULT NULL,
  `alamat_peminjam` varchar(30) DEFAULT NULL,
  `no_hp_peminjam` varchar(30) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Peminjam`
--

INSERT INTO `Peminjam` (`id_peminjam`, `nama_peminjam`, `alamat_peminjam`, `no_hp_peminjam`, `id_karyawan`) VALUES
(1, 'Imamuddin Al Mustaqim', 'Pangkalan Sari, Alabio', '0895635551158', 1),
(3, 'Sedih dan seduh', 'kalbar', '081347778211', 1),
(5, 'Romyu Sega', 'Jakarta Selatan', '0899761234', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Penyewaan`
--

CREATE TABLE `Penyewaan` (
  `id_penyewaan` int(11) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `tgl_akhir_sewa` date DEFAULT NULL,
  `id_peminjam` int(11) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `status` enum('Kembali','Belum Kembali') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Penyewaan`
--

INSERT INTO `Penyewaan` (`id_penyewaan`, `tgl_transaksi`, `tgl_akhir_sewa`, `id_peminjam`, `id_mobil`, `status`) VALUES
(1, '2023-01-13', '2023-01-20', 1, 5, 'Kembali'),
(3, '2023-01-18', '2023-01-22', 3, 1, 'Kembali'),
(5, '2023-01-17', '2023-01-29', 5, 4, 'Belum Kembali');

--
-- Trigger `Penyewaan`
--
DELIMITER $$
CREATE TRIGGER `after_cancelled` AFTER DELETE ON `Penyewaan` FOR EACH ROW BEGIN
delete from Peminjam WHERE
Peminjam.id_peminjam = old.id_peminjam;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Karyawan`
--
ALTER TABLE `Karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `Mobil`
--
ALTER TABLE `Mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `Peminjam`
--
ALTER TABLE `Peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `Penyewaan`
--
ALTER TABLE `Penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`),
  ADD KEY `id_peminjam` (`id_peminjam`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Karyawan`
--
ALTER TABLE `Karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `Mobil`
--
ALTER TABLE `Mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `Peminjam`
--
ALTER TABLE `Peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `Penyewaan`
--
ALTER TABLE `Penyewaan`
  MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Peminjam`
--
ALTER TABLE `Peminjam`
  ADD CONSTRAINT `Peminjam_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `Karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `Penyewaan`
--
ALTER TABLE `Penyewaan`
  ADD CONSTRAINT `Penyewaan_ibfk_1` FOREIGN KEY (`id_peminjam`) REFERENCES `Peminjam` (`id_peminjam`),
  ADD CONSTRAINT `Penyewaan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `Mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
