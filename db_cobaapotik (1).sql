-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 06:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cobaapotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

CREATE TABLE IF NOT EXISTS `data_pengunjung` (
  `nik_pengunjung` varchar(255) NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `alamat_pengunjung` text NOT NULL,
  `role_pengunjung` varchar(255) NOT NULL,
  `foto_pengunjung` text NOT NULL,
  `ttl_pengunjung` varchar(255) NOT NULL,
  `jk_pengunjung` varchar(255) NOT NULL,
  PRIMARY KEY (`nik_pengunjung`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`nik_pengunjung`, `nama_pengunjung`, `alamat_pengunjung`, `role_pengunjung`, `foto_pengunjung`, `ttl_pengunjung`, `jk_pengunjung`) VALUES
('162613', 'sumina', 'jl street saja', 'Elder', 'detil_view.PNG', 'mojokerto, 1999-06-23', 'Perempuan'),
('17357413471119', 'Zhakirasakti Desta Kamandaka', 'Ponorogo', 'Member', 'IMG_20160905_183130.jpg', 'Ponorogo, 2000-03-22', 'Laki-laki'),
('6328261298892', 'uvuvwevwevwe', 'ahsdvjhsa dk', 'Elder', 'Setiawan_D__P_.JPG', 'opweurewm, 1983-01-01', 'Laki-laki'),
('76654567655', 'prism', 'dcfvgbhnjmk,', 'Elder', '1487165562825111.jpg', 'sdcvfbgnhmj, 2017-01-01', 'Perempuan'),
('87236486272', 'ajsdbjhasb', 'asdjkasbdjas', 'Elder', '14871655628251.jpg', 'jabsdjhbas, 2017-04-13', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE IF NOT EXISTS `data_petugas` (
  `id_petugas` int(255) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(255) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `role_petugas` varchar(255) NOT NULL,
  `foto_petugas` text NOT NULL,
  `jk_petugas` varchar(255) NOT NULL,
  `ttl_petugas` varchar(255) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `data_petugas`
--

INSERT INTO `data_petugas` (`id_petugas`, `nama_petugas`, `alamat_petugas`, `role_petugas`, `foto_petugas`, `jk_petugas`, `ttl_petugas`) VALUES
(11, 'Prisma Ratnadewi', 'Sidoarjo', 'admin', '14871655628251.jpg', 'Perempuan', 'asbdkj, 2017-04-20'),
(12, 'user', 'user', 'admin', 'kosong.png', 'Laki-laki', 'jaksdnaksj, 2017-04-20'),
(14, 'Fandi Khusnu Pratama', 'Malang', 'super_admin', 'button.PNG', 'Laki-laki', 'Blitar, 2017-01-01'),
(15, 'maulanatito', 'jl street', 'admin', 'detil_controller.PNG', 'Laki-laki', 'mojokerto, 2000-06-12'),
(16, 'Setiawan Dwi P', 'jl. Wijaya Kusuma', 'super_admin', 'monitor-160942_960_720.png', 'Laki-laki', 'Sidoarjo, 1999-11-29'),
(17, 'gallant paradise', 'aklsdjkaskldjl', 'admin', '14802474659221.jpg', 'Laki-laki', 'lumajang, 2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_sehat`
--

CREATE TABLE IF NOT EXISTS `kartu_sehat` (
  `nik_pengunjung` varchar(255) NOT NULL,
  `no_kartu` varchar(255) NOT NULL,
  `faskes_t1` varchar(255) NOT NULL,
  PRIMARY KEY (`nik_pengunjung`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_sehat`
--

INSERT INTO `kartu_sehat` (`nik_pengunjung`, `no_kartu`, `faskes_t1`) VALUES
('162613', '35', 'Klinik Elisa'),
('17357413471119', '00072389290', 'Klinik Sekarpuro'),
('6328261298892', '0008723647', 'ao;jfdsnfskd'),
('76654567655', '980088', 'klinik terdekat'),
('87236486272', '0003475673', 'asjhdjkas');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(255) NOT NULL,
  `id_supplier` int(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `harga_obat` int(255) NOT NULL,
  `role_obat` varchar(255) NOT NULL,
  `stock_obat` int(255) NOT NULL,
  PRIMARY KEY (`id_obat`,`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_supplier`, `nama_obat`, `harga_obat`, `role_obat`, `stock_obat`) VALUES
(894, 2, 'Hufagrip', 5000, 'Bebas', 44),
(3780, 2, 'Panadol', 1500, 'Bebas', 34),
(8390, 3, 'Oskadon', 1000, 'Bebas', 44),
(8459, 1, 'Asamafenamat', 5000, 'Bebas Terbatas', 43),
(9010, 3, 'Paramex', 1500, 'Bebas', 77),
(8999123, 2, 'Lintah Papua', 20000, 'Keras', 468);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_petugas`,`username`),
  UNIQUE KEY `id_petugas` (`id_petugas`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`) VALUES
(11, 'prisma', 'admin'),
(12, 'admin', 'user'),
(14, 'superadmin', 'superadmin'),
(15, 'maulanatito', 'maulanatito'),
(16, '', ''),
(17, 'gallant', 'gallant');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id_suplier` int(255) NOT NULL AUTO_INCREMENT,
  `nama_suplier` varchar(255) NOT NULL,
  `alamat_suplier` text NOT NULL,
  `foto_suplier` text NOT NULL,
  PRIMARY KEY (`id_suplier`,`nama_suplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat_suplier`, `foto_suplier`) VALUES
(1, 'Desta', 'Ponorogo', 'WIN_20170425_19_56_41_Pro.jpg'),
(2, 'Wawan', 'Sidoarjo', 'Setiawan D. P..JPG'),
(3, 'Prisma', 'Jember', '1487165562825.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(255) NOT NULL AUTO_INCREMENT,
  `nik_pengunjung` varchar(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `jumlah_obat` int(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `foto_resep` text NOT NULL,
  `rumah_sakit` text NOT NULL,
  PRIMARY KEY (`id_transaksi`,`nik_pengunjung`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nik_pengunjung`, `nama_obat`, `jumlah_obat`, `total_harga`, `foto_resep`, `rumah_sakit`) VALUES
(2, '835789459835', 'Asamafenamat', 9, '45000', '-', '-'),
(3, '87236486272', 'Asamafenamat', 3, '15000', '-', '-'),
(4, '6328261298892', 'Oskadon', 2, '2000', '-', '-'),
(5, '87236486272', 'Oskadon', 10, '10000', '-', '-'),
(6, '6372762382389', 'Paramex', 0, '-', 'kosong.png', 'Nusa Bangsa'),
(7, '37848949090', 'Oskadon', 0, '-', 'Setiawan_D__P_.JPG', 'Jaya Wijaya'),
(8, '76654567655', 'Hufagrip', 30, '150000', '-', '-'),
(9, '17357413471119', 'Asamafenamat', 8, '40000', '-', '-'),
(10, '2766137462934', 'Oskadon', 1, '1000', '-', '-'),
(11, '162613', 'Lintah Papua', 20, '400000', '-', '-'),
(12, '6328261298892', 'Oskadon', 4, '4000', '-', '-'),
(13, '83973908918', 'Asamafenamat', 20, '100000', '-', '-'),
(14, '8109120921', 'Lintah Papua', 12, '240000', '-', '-'),
(15, '72638729', 'Lintah Papua', 500, '10000000', '-', '-');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
