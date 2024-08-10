-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 11 Haz 2024, 09:41:51
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
-- Tablo için tablo yapısı `kelime`
--

CREATE TABLE `kelime` (
  `id` int(10) NOT NULL,
  `sira` int(255) DEFAULT NULL,
  `durum` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `baslik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yer` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `kelime`
--

INSERT INTO `kelime` (`id`, `sira`, `durum`, `baslik`, `url`, `yer`) VALUES
(239, 0, '', 'Fiyatı', 'fiyati', 2),
(240, NULL, '', 'Fiyatları', 'fiyatlari', 2),
(238, NULL, '', 'Teknik Servis', 'teknik_servis', 2),
(236, 0, '1', 'Bakımı', 'bakimi', 2),
(237, 0, '1', 'Tamir ve Bakımı', 'tamir_ve_bakimi', 2),
(235, 0, '1', 'Tamiri', 'tamiri', 2),
(234, 2, '1', 'Yetkili Servis', 'yetkili_servis', 2),
(233, 1, '1', 'Satış', 'satis', 2),
(242, NULL, '', 'İşitme Cihazı', 'isitme_cihazi', 1),
(243, NULL, '', 'İşitme Cihazları', 'isitme_cihazlari', 1),
(244, NULL, '', 'Kulak İçi İşitme Cihazı', 'kulak_ici_isitme_cihazlari', 1),
(245, NULL, '', 'Kulak Cihazı', 'kulak_cihazi', 2),
(246, NULL, '', 'Kulak İçi İşitme Cihazları', 'kulak_ici_isitme_cihazi', 2),
(247, NULL, '', 'işitme Kaybı', 'isitme_kaybi', 2),
(248, NULL, '', 'İşitme Kaybı Dereceleri', 'isitme_kaybi_dereceleri', 2),
(249, NULL, '', 'Tek Kulak İşitme Cihazı ', 'tek_kulak_isitme_cihazi', 2),
(250, NULL, '', 'Tek Kulak İşitme Cihazları', 'tek_kulak_isitme_cihazlari', 2),
(251, NULL, '', 'Kulak Cihazı', 'kulak_cihazi', 2),
(252, NULL, '', 'İşitme Cihazı Pili', 'isitme_cihazi_pili', 2),
(253, NULL, '', 'Emeklilere İşitme Cihazı Fiyatları', 'emeklilere_isitme_cihazi_fiyatlari', 0),
(254, NULL, '', 'İşitme Cihazları Satıcısı', 'isitme_cihazlari_saticisi', 0),
(255, NULL, '', 'Kulak Pili', 'kulak_pili', 0),
(256, NULL, '', 'Kulaklık Pili', 'kulaklik_pili', 0),
(257, NULL, '', 'Duymayı Güçlendirme', 'duymayi_guclendirme', 0),
(258, NULL, '', 'Sgk İşitme Cihazı Fiyatları', 'sgk_isitme_cihazi_fiyatlari', 0),
(259, NULL, '', 'Son Teknoloji İşitme Cihazları', 'son_teknoloji_isitme_cihazlari', 0),
(260, NULL, '', 'Görünmez İşitme Cihazı', 'gorunmez_isitme_cihazi', 0),
(261, NULL, '', 'İşitme Cihazı Bluetooth', 'isitme_cihazi_bluetooth', 0),
(262, NULL, '', 'Su Geçirmez İşitme Cihazı', 'su_gecirmez_isitme_cihazi', 0),
(263, NULL, '', 'Su Geçirmez İşitme Cihazları', 'su_gecirmez_isitme_cihazlari', 0),
(264, NULL, '', 'Dip Kanal İçi İşitme Cihazı', 'dip_kanal_ici_isitme_cihazi', 0),
(265, NULL, '', 'Dip Kanal İçi İşitme Cihazları', 'dip_kanal_ici_isitme_cihazlari', 0),
(266, NULL, '', 'İşitme Cihazı Teknik Servis', 'isitme_cihazi_teknik_servis', 0),
(267, NULL, '', 'İşitme Cihazları Teknik Servis', 'isitme_cihazlari_teknik_servis', 0),
(268, NULL, '', 'Kulak Duyma Cihazı', 'kulak_duyma_cihazi', 0),
(269, NULL, '', 'Kulak Duyma Cihazları', 'kulak_duyma_cihazlari', 0),
(270, NULL, '', 'İşitme Testi', 'isitme_testi', 0),
(271, NULL, '', 'Duyma Testi', 'duyma_testi', 0),
(272, NULL, '', 'İşitme Testi Fiyatı', 'isitme_testi_fiyat', 0),
(273, NULL, '', 'İşitme Testi Fiyatları', 'isitme_testi_fiyatlari', 0),
(274, NULL, '', 'İşitme Cihazı Modelleri', 'isitme_cihazi_modelleri', 0),
(275, NULL, '', 'işitme testi ücreti', 'isitme_testi_ucreti', 0),
(276, NULL, '', 'bluetoothlu işitme cihazı', 'bluetoothlu_isitme_cihazi', 0),
(277, NULL, '', 'bluetoothlu işitme cihazları', 'bluetoothlu_isitme_cihazlari', 0),
(278, NULL, '', 'işitme cihazı hortum değişimi', 'isitme_cihazi_hortum_degisimi', 0),
(279, NULL, '', 'duymayanlara kulaklık', 'duymayanlara_kulaklik', 0),
(280, NULL, '', 'en küçük işitme cihazı', 'en_kucuk_isitme_cihazi', 0),
(281, NULL, '', 'ses işitme cihazları', 'ses_isitme_cihazlari', 0),
(282, NULL, '', 'kulak implantı', 'kulak_implanti', 0),
(283, NULL, '', 'işitme cihazı yedek parçaları', 'isitme_cihazi_yedek_parcalari', 0),
(284, NULL, '', 'işitme cihazları yedek parça', 'isitme_cihazi_yedek_parca', 0),
(285, NULL, '', 'işitme cihazı yedek parça satışı', 'isitme_cihazi_yedek_parca_satisi', 0),
(286, NULL, '', 'işitme cihazı yedek parça fiyatı', 'isitme_cihazi_yedek_parca_fiyati', 0),
(287, NULL, '', 'işitme cihazı tamiri', 'isitme_cihazi_tamiri', 0),
(288, NULL, '', 'işitme cihazı tamir ve bakımı', 'isitme_cihazi_tamir_ve_bakimi', 0),
(289, NULL, '', 'işitme cihazı teknik servisi', 'isitme_cihazi_teknik_servisi', 0),
(290, NULL, '', 'işitme cihazı devlet desteği', 'isitme_cihazi_devlet_destegi', 0),
(291, NULL, '', 'işitme cihazı sgk desteği', 'isitme_cihazi_sgk_destegi', 0),
(292, NULL, '', 'işitme cihazı satıcısı', 'isitme_cihazi_saticisi', 0),
(293, NULL, '', 'işitme cihazları satıcısı', 'isitme_cihazlari_saticisi', 0),
(294, NULL, '', 'biyonik kulak', 'biyonik_kulak', 0),
(296, NULL, '1', 'işitme cihazları en iyisi hangisi', 'isitme_cihazlari_en_iyisi_hangisi', 0),
(297, 0, '1', 'Görünmez İşitme Cihazları', 'gorunmez_isitme_cihazlari', 0),
(298, 0, '1', 'Su Geçirmez İşitme Cihazı Fiyatı', 'su_gecirmez_isitme_cihazi_fiyati', 0),
(299, 0, '1', 'Su Geçirmez İşitme Cihazları Fiyatı', 'su_gecirmez_isitme_cihazlari_fiyati', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kelime`
--
ALTER TABLE `kelime`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Index 1` (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kelime`
--
ALTER TABLE `kelime`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
