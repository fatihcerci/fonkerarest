-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Haz 2022, 22:16:25
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `fonkera`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `status` bit(1) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `title` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `status`, `name`, `surname`, `title`, `phone`, `email`) VALUES
('62b20c48515bf', b'1', 'Meryem', 'Çerçi', 'Prof.Dr. Meryem Çerçi', '0(507) 916 9176', 'mery@mery.com'),
('62b2124fc610e', b'1', 'Admin', 'Kullanıcısı', 'admin', '0(554) 409 2278', 'aaaaa@example.com'),
('62b2181b9d509', b'1', 'Fatih', 'Çerçi', 'Prof. Dr. Fatih Çerçi', '0(554) 409 2278', 'fatih@chercy.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
