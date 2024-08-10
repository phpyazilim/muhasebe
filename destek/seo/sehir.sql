-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 11 Haz 2024, 09:42:35
-- Sunucu sürümü: 5.7.15-log
-- PHP Sürümü: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `wtrans`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehir`
--

CREATE TABLE `sehir` (
  `id` int(15) NOT NULL,
  `adi` varchar(50) NOT NULL DEFAULT '',
  `goster` enum('1','0') NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `sehir`
--

INSERT INTO `sehir` (`id`, `adi`, `goster`, `url`) VALUES
(1, 'Konya', '1', 'konya'),
(2, 'Konya Merkez', '1', 'konya_merkez'),
(3, 'Konya Meram', '1', 'konya_meram'),
(4, 'Konya Selçuklu', '1', 'konya_selcuklu'),
(5, 'Konya Karatay', '1', 'konya_karatay'),
(6, 'Konya Seydişehir', '1', 'konya_seydisehir'),
(7, 'Konya Beyşehir', '1', 'konya_beysehir'),
(8, 'Konya Karapınar ', '1', 'konya_karapinar'),
(9, 'Konya Akşehir ', '1', 'konya_aksehir'),
(10, 'Karaman ', '1', 'karaman');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `sehir`
--
ALTER TABLE `sehir`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sehir`
--
ALTER TABLE `sehir`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
