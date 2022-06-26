-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Haz 2022, 00:05:28
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
-- Tablo için tablo yapısı `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_turkish_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ci_sessions`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `groups`
--

CREATE TABLE `groups` (
  `id` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `status` bit(1) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `creator_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `last_updater_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `groups`
--

INSERT INTO `groups` (`id`, `status`, `created_time`, `creator_id`, `last_updated`, `last_updater_id`, `name`, `description`, `phone`, `email`, `address`) VALUES
('62b3650c1216b', b'1', '2022-06-22 21:53:00', NULL, '2022-06-23 00:12:00', NULL, 'Mehmet', 'Mehmet', '0(312) 312 5555', 'grup@example.com', 'adresssssss'),
('62b37dfaec6a7', b'1', '2022-06-22 23:39:22', NULL, '2022-06-23 00:11:53', NULL, 'Ahmet', 'Ahmet', '0(507) 155 5555', '55555@example.com', 'asdasdasdasdasdas');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `status` bit(1) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `creator_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `last_updater_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `status`, `created_time`, `creator_id`, `last_updated`, `last_updater_id`, `name`, `description`) VALUES
('62b368a1c4476', b'1', '2022-06-22 22:08:17', NULL, '2022-06-22 22:09:07', NULL, 'Role 1 ', 'Role 1 description'),
('62b38fef0cdbd', b'1', '2022-06-23 00:55:59', NULL, '2022-06-23 00:56:03', NULL, 'Role 2', 'Role açıklamaaaaaaa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `status` bit(1) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `creator_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `last_updater_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tckn` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `title` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `profile_image_url` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `role_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `group_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `status`, `created_time`, `creator_id`, `last_updated`, `last_updater_id`, `tckn`, `name`, `surname`, `title`, `birthdate`, `phone`, `email`, `description`, `profile_image_url`, `last_login_time`, `role_id`, `group_id`) VALUES
('62b36cdc4f725', b'1', '2022-06-22 22:26:20', NULL, '2022-06-22 22:42:09', NULL, '37927282684', 'Fatih', 'Çerçi', 'aaaa', '1995-09-10', '0(507) 216 5824', 'aaa@example.com', NULL, NULL, NULL, '62b368a1c4476', '62b3650c1216b'),
('62b3708cd32bb', b'1', '2022-06-22 22:42:04', NULL, '2022-06-23 00:56:38', NULL, '37927282684', 'Fatih', 'Çerçi', 'Dr. Fatih Çerçi', '1995-09-10', '0(507) 216 5824', 'fatihcerci@example.com', NULL, NULL, NULL, '62b38fef0cdbd', '62b37dfaec6a7'),
('62b391f0cb78d', b'1', '2022-06-23 01:04:32', NULL, NULL, NULL, '11111111111', 'SA', 'AS', 'ASAS', '2022-06-09', '0(554) 409 2278', 'chercy@gmail.com', NULL, NULL, NULL, '62b38fef0cdbd', '62b3650c1216b');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Tablo için indeksler `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
