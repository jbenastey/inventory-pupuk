-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2019 pada 15.47
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_faktur`
--

CREATE TABLE `barang_faktur` (
  `faktur_id` varchar(10) NOT NULL,
  `faktur_tanggal` date NOT NULL,
  `faktur_total` int(11) NOT NULL,
  `faktur_supplier` int(11) DEFAULT NULL,
  `faktur_status` enum('valid_kepala','valid_sekretaris','valid_supplier') DEFAULT NULL,
  `faktur_created_by` int(11) NOT NULL,
  `faktur_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_faktur`
--

INSERT INTO `barang_faktur` (`faktur_id`, `faktur_tanggal`, `faktur_total`, `faktur_supplier`, `faktur_status`, `faktur_created_by`, `faktur_date_created`) VALUES
('INV-42918', '2019-10-30', 9000, 2, 'valid_supplier', 9, '2019-10-30 20:41:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_faktur_detail`
--

CREATE TABLE `barang_faktur_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_faktur_id` varchar(10) DEFAULT NULL,
  `detail_pupuk_id` int(11) NOT NULL,
  `detail_jumlah` int(11) NOT NULL,
  `detail_total` int(11) NOT NULL,
  `detail_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_faktur_detail`
--

INSERT INTO `barang_faktur_detail` (`detail_id`, `detail_faktur_id`, `detail_pupuk_id`, `detail_jumlah`, `detail_total`, `detail_date_created`) VALUES
(6, 'INV-42918', 5, 3, 3000, '2019-10-30 20:39:22'),
(7, 'INV-42918', 6, 3, 6000, '2019-10-30 20:39:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_kategori`
--

CREATE TABLE `barang_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_created_by` int(11) NOT NULL,
  `kategori_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_kategori`
--

INSERT INTO `barang_kategori` (`kategori_id`, `kategori_nama`, `kategori_created_by`, `kategori_date_created`) VALUES
(2, 'Urea', 1, '2019-10-28 01:55:33'),
(3, 'SP-36', 1, '2019-10-28 10:59:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `masuk_id` int(11) NOT NULL,
  `masuk_pupuk_id` int(11) NOT NULL,
  `masuk_jumlah` int(11) NOT NULL,
  `masuk_tanggal` date NOT NULL,
  `masuk_created_by` int(11) NOT NULL,
  `masuk_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`masuk_id`, `masuk_pupuk_id`, `masuk_jumlah`, `masuk_tanggal`, `masuk_created_by`, `masuk_date_created`) VALUES
(4, 5, 2, '2019-10-16', 5, '2019-10-30 09:28:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_pengguna`
--

CREATE TABLE `barang_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('admin','admin supplier','admin gudang','kepala kantor','kepala supplier','sekretaris') NOT NULL,
  `pengguna_created_by` int(11) NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_pengguna`
--

INSERT INTO `barang_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `pengguna_created_by`, `pengguna_date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 0, '2019-10-27 20:17:43'),
(5, 'admin_supplier_a', '21232f297a57a5a743894a0e4a801fc3', 'admin supplier', 1, '2019-10-29 09:21:59'),
(6, 'kepala_kantor', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala kantor', 1, '2019-10-29 09:44:47'),
(9, 'admin_gudang', '21232f297a57a5a743894a0e4a801fc3', 'admin gudang', 1, '2019-10-30 00:03:18'),
(10, 'kepala_supplier_a', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala supplier', 1, '2019-10-30 01:06:09'),
(11, 'kepala_supplier_b', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala supplier', 1, '2019-10-30 01:06:24'),
(12, 'sekretaris_a', 'ce1023b227de5c34b98c470cda4699bb', 'sekretaris', 1, '2019-10-30 01:24:58'),
(13, 'admin_supplier_b', '21232f297a57a5a743894a0e4a801fc3', 'admin supplier', 1, '2019-10-30 20:33:27'),
(14, 'sekretaris_b', 'ce1023b227de5c34b98c470cda4699bb', 'sekretaris', 1, '2019-10-30 20:33:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_pupuk`
--

CREATE TABLE `barang_pupuk` (
  `pupuk_id` int(11) NOT NULL,
  `pupuk_kategori_id` int(11) NOT NULL,
  `pupuk_nama` varchar(255) NOT NULL,
  `pupuk_stok` int(11) NOT NULL,
  `pupuk_harga` int(11) NOT NULL,
  `pupuk_created_by` int(11) NOT NULL,
  `pupuk_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_pupuk`
--

INSERT INTO `barang_pupuk` (`pupuk_id`, `pupuk_kategori_id`, `pupuk_nama`, `pupuk_stok`, `pupuk_harga`, `pupuk_created_by`, `pupuk_date_created`) VALUES
(5, 3, 'Pupuk Kandang', 8, 1000, 5, '2019-10-30 09:27:14'),
(6, 3, 'Pupuk Kompos', 5, 2000, 5, '2019-10-30 09:40:23'),
(7, 3, 'Pupuk Kambing', 22, 3000, 13, '2019-10-30 21:24:18'),
(8, 2, 'Pupuk Kucing', 12, 2000, 13, '2019-10-30 21:24:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_supplier`
--

CREATE TABLE `barang_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(255) NOT NULL,
  `supplier_alamat` text NOT NULL,
  `supplier_kepala_id` int(11) DEFAULT NULL,
  `supplier_admin_id` int(11) DEFAULT '0',
  `supplier_sekretaris_id` int(11) DEFAULT NULL,
  `supplier_created_by` int(11) NOT NULL,
  `supplier_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_supplier`
--

INSERT INTO `barang_supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_kepala_id`, `supplier_admin_id`, `supplier_sekretaris_id`, `supplier_created_by`, `supplier_date_created`) VALUES
(2, 'Supplier A', 'Kubang Raya', 10, 5, 12, 1, '2019-10-29 09:43:03'),
(3, 'Supplier B', 'disana juga', 11, 13, 14, 1, '2019-10-30 00:25:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_faktur`
--
ALTER TABLE `barang_faktur`
  ADD PRIMARY KEY (`faktur_id`);

--
-- Indeks untuk tabel `barang_faktur_detail`
--
ALTER TABLE `barang_faktur_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `barang_kategori`
--
ALTER TABLE `barang_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`masuk_id`);

--
-- Indeks untuk tabel `barang_pengguna`
--
ALTER TABLE `barang_pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD UNIQUE KEY `pengguna_username` (`pengguna_username`);

--
-- Indeks untuk tabel `barang_pupuk`
--
ALTER TABLE `barang_pupuk`
  ADD PRIMARY KEY (`pupuk_id`);

--
-- Indeks untuk tabel `barang_supplier`
--
ALTER TABLE `barang_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_faktur_detail`
--
ALTER TABLE `barang_faktur_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `barang_kategori`
--
ALTER TABLE `barang_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `masuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang_pengguna`
--
ALTER TABLE `barang_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `barang_pupuk`
--
ALTER TABLE `barang_pupuk`
  MODIFY `pupuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `barang_supplier`
--
ALTER TABLE `barang_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
