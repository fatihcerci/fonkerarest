-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Tem 2022, 11:04:05
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `emails_sent`
--

CREATE TABLE `emails_sent` (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `from` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `content` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `is_sent` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `emails_sent`
--

INSERT INTO `emails_sent` (`id`, `created_time`, `from`, `to`, `subject`, `content`, `is_sent`) VALUES
('62dcfe31856e0', '2022-07-24 11:09:21', 'fonkera@lenorabilisim.com', 'melike.sbp@gmail.com', 'Şifreniz Güncellendi', '\r\n<!doctype html>\r\n<html lang=\"en-US\">\r\n\r\n<head>\r\n    <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\" />\r\n    <style type=\"text/css\">\r\n        a:hover {text-decoration: underline !important;}\r\n    </style>\r\n</head>\r\n\r\n<body marginheight=\"0\" topmargin=\"0\" marginwidth=\"0\" style=\"margin: 0px; background-color: #f2f3f8;\" leftmargin=\"0\">\r\n    <!--100% body table-->\r\n    <table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#f2f3f8\"\r\n        style=\"@import url(https://fonts.googleapis.com/css2?family=Montserrat&display=swap); font-family: \'Montserrat\', sans-serif;\">\r\n        <tr>\r\n            <td>\r\n                <table style=\"background-color: #f2f3f8; max-width:470px;  margin:0 auto;\" width=\"100%\" border=\"0\"\r\n                    align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                    <tr>\r\n                        <td style=\"height:80px;\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>\r\n                            <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"\r\n                                style=\"max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);\">\r\n                                <tr>\r\n                                    <td style=\"height:20px;\">&nbsp;</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td style=\"padding:0 0px;\">\r\n										<h1 style=\"color:#1e1e2d; font-weight:400; margin:0;font-size:28px;\">Şifreniz Güncellendi</h1>\r\n										<span\r\n                                            style=\"display:inline-block; vertical-align:middle; margin:12px 0 26px; border-bottom:1px solid #cecece; width:250px;\"></span>\r\n										<p style=\"color:#455056; font-size:15px;line-height:20px; margin:0;\">\r\n                                            Aşağıdaki şifre ile uygulamaya giriş yapabilirsiniz.\r\n                                        </p>\r\n										\r\n										<h1 style=\"background:#6610f2;text-decoration:none !important; margin-top:25px; color:#fff;font-size:22px;padding:10px 22px;min-width:150px;display:inline-block;border-radius:10px;\">\r\n											123456\r\n										</h1>\r\n										\r\n                                        \r\n                                    </td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td style=\"height:40px;\">&nbsp;</td>\r\n                                </tr>\r\n                            </table>\r\n                        </td>\r\n                    <tr>\r\n                        <td style=\"height:20px;\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style=\"height:80px;\">&nbsp;</td>\r\n                    </tr>\r\n                </table>\r\n            </td>\r\n        </tr>\r\n    </table>\r\n    <!--/100% body table-->\r\n</body>\r\n\r\n</html>', b'0'),
('62dcfe3726bb7', '2022-07-24 11:09:27', 'fonkera@lenorabilisim.com', 'melike.sbp@gmail.com', 'Şifreniz Güncellendi', '\r\n<!doctype html>\r\n<html lang=\"en-US\">\r\n\r\n<head>\r\n    <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\" />\r\n    <style type=\"text/css\">\r\n        a:hover {text-decoration: underline !important;}\r\n    </style>\r\n</head>\r\n\r\n<body marginheight=\"0\" topmargin=\"0\" marginwidth=\"0\" style=\"margin: 0px; background-color: #f2f3f8;\" leftmargin=\"0\">\r\n    <!--100% body table-->\r\n    <table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#f2f3f8\"\r\n        style=\"@import url(https://fonts.googleapis.com/css2?family=Montserrat&display=swap); font-family: \'Montserrat\', sans-serif;\">\r\n        <tr>\r\n            <td>\r\n                <table style=\"background-color: #f2f3f8; max-width:470px;  margin:0 auto;\" width=\"100%\" border=\"0\"\r\n                    align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                    <tr>\r\n                        <td style=\"height:80px;\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>\r\n                            <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"\r\n                                style=\"max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);\">\r\n                                <tr>\r\n                                    <td style=\"height:20px;\">&nbsp;</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td style=\"padding:0 0px;\">\r\n										<h1 style=\"color:#1e1e2d; font-weight:400; margin:0;font-size:28px;\">Şifreniz Güncellendi</h1>\r\n										<span\r\n                                            style=\"display:inline-block; vertical-align:middle; margin:12px 0 26px; border-bottom:1px solid #cecece; width:250px;\"></span>\r\n										<p style=\"color:#455056; font-size:15px;line-height:20px; margin:0;\">\r\n                                            Aşağıdaki şifre ile uygulamaya giriş yapabilirsiniz.\r\n                                        </p>\r\n										\r\n										<h1 style=\"background:#6610f2;text-decoration:none !important; margin-top:25px; color:#fff;font-size:22px;padding:10px 22px;min-width:150px;display:inline-block;border-radius:10px;\">\r\n											123456\r\n										</h1>\r\n										\r\n                                        \r\n                                    </td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td style=\"height:40px;\">&nbsp;</td>\r\n                                </tr>\r\n                            </table>\r\n                        </td>\r\n                    <tr>\r\n                        <td style=\"height:20px;\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style=\"height:80px;\">&nbsp;</td>\r\n                    </tr>\r\n                </table>\r\n            </td>\r\n        </tr>\r\n    </table>\r\n    <!--/100% body table-->\r\n</body>\r\n\r\n</html>', b'0'),
('62dd03c895adf', '2022-07-24 11:33:12', 'fonkera@lenorabilisim.com', 'melike.sbp@gmail.com', 'Şifreniz Güncellendi', '\r\n<!doctype html>\r\n<html lang=\"en-US\">\r\n\r\n<head>\r\n    <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\" />\r\n    <style type=\"text/css\">\r\n        a:hover {text-decoration: underline !important;}\r\n    </style>\r\n</head>\r\n\r\n<body marginheight=\"0\" topmargin=\"0\" marginwidth=\"0\" style=\"margin: 0px; background-color: #f2f3f8;\" leftmargin=\"0\">\r\n    <!--100% body table-->\r\n    <table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#f2f3f8\"\r\n        style=\"@import url(https://fonts.googleapis.com/css2?family=Montserrat&display=swap); font-family: \'Montserrat\', sans-serif;\">\r\n        <tr>\r\n            <td>\r\n                <table style=\"background-color: #f2f3f8; max-width:470px;  margin:0 auto;\" width=\"100%\" border=\"0\"\r\n                    align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                    <tr>\r\n                        <td style=\"height:80px;\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>\r\n                            <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"\r\n                                style=\"max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);\">\r\n                                <tr>\r\n                                    <td style=\"height:20px;\">&nbsp;</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td style=\"padding:0 0px;\">\r\n										<h1 style=\"color:#1e1e2d; font-weight:400; margin:0;font-size:28px;\">Şifreniz Güncellendi</h1>\r\n										<span\r\n                                            style=\"display:inline-block; vertical-align:middle; margin:12px 0 26px; border-bottom:1px solid #cecece; width:250px;\"></span>\r\n										<p style=\"color:#455056; font-size:15px;line-height:20px; margin:0;\">\r\n                                            Aşağıdaki şifre ile uygulamaya giriş yapabilirsiniz.\r\n                                        </p>\r\n										\r\n										<h1 style=\"background:#6610f2;text-decoration:none !important; margin-top:25px; color:#fff;font-size:22px;padding:10px 22px;min-width:150px;display:inline-block;border-radius:10px;\">\r\n											123456\r\n										</h1>\r\n										\r\n                                        \r\n                                    </td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td style=\"height:40px;\">&nbsp;</td>\r\n                                </tr>\r\n                            </table>\r\n                        </td>\r\n                    <tr>\r\n                        <td style=\"height:20px;\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style=\"height:80px;\">&nbsp;</td>\r\n                    </tr>\r\n                </table>\r\n            </td>\r\n        </tr>\r\n    </table>\r\n    <!--/100% body table-->\r\n</body>\r\n\r\n</html>', b'0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_settings`
--

CREATE TABLE `email_settings` (
  `id` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `status` bit(1) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `creator_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `last_updater_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `protocol` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `server` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `account` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `email_settings`
--

INSERT INTO `email_settings` (`id`, `status`, `created_time`, `creator_id`, `last_updated`, `last_updater_id`, `protocol`, `server`, `port`, `account`, `password`, `from`, `to`, `title`) VALUES
('62b5ee6899d98', b'0', '2022-07-23 14:09:54', NULL, '2022-07-23 14:40:32', NULL, 'smtp', 'smtp.office365.com', '587', 'fonkera.dev@hotmail.com', 'fonkera2022xxx', 'fonkera.dev@hotmail.com', 'fonkera.dev@hotmail.com', 'FONKERA DEV'),
('62b5ee6899d99', b'1', '2022-06-24 20:03:36', NULL, '2022-07-11 00:15:41', NULL, 'smtp', 'mail.lenorabilisim.com', '587', 'fonkera@lenorabilisim.com', '1enoraBi1isiM', 'fonkera@lenorabilisim.com', 'fonkera@lenorabilisim.com', 'FONKERA');

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
('62b3650c1216b', b'1', '2022-06-22 21:53:00', NULL, '2022-06-24 19:27:29', NULL, 'Grup 2', 'gr2 desc', '0(312) 312 5555', 'grup@example.com', 'adresssssss'),
('62b37dfaec6a7', b'1', '2022-06-22 23:39:22', NULL, '2022-06-24 20:32:23', NULL, 'Grup 1', 'gr1 desc', '0(507) 155 5555', '55555@example.com', 'asdasdasdasdasdas');

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
('62b368a1c4476', b'1', '2022-06-22 22:08:17', NULL, '2022-06-23 22:51:44', NULL, 'Role 1 ', 'Role 1 description'),
('62b38fef0cdbd', b'1', '2022-06-23 00:55:59', NULL, '2022-06-23 22:51:46', NULL, 'Role 2', 'Role açıklamaaaaaaa');

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
  `group_id` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `status`, `created_time`, `creator_id`, `last_updated`, `last_updater_id`, `tckn`, `name`, `surname`, `title`, `birthdate`, `phone`, `email`, `description`, `profile_image_url`, `last_login_time`, `role_id`, `group_id`, `password`) VALUES
('62dbc9c9511a4', b'1', '2022-07-23 13:13:29', NULL, '2022-07-24 11:32:54', '62dbc9c9511a4', '37927282684', 'Fatih', 'Çerçi', 'Prof.Dr.Fatih Çerçi', '1995-09-10', '0(507) 216 5824', 'fatihcerci001@gmail.com', NULL, NULL, '2022-07-24 11:45:11', '62b368a1c4476', '62b37dfaec6a7', 'e10adc3949ba59abbe56e057f20f883e'),
('62dbe36f8f18a', b'1', '2022-07-23 15:02:55', NULL, '2022-07-24 11:33:12', '62dbc9c9511a4', '15755272756', 'Meryem', 'Çerçi', 'Dr.Meryem Çerçi', '1996-03-03', '0(507) 916 9176', 'melike.sbp@gmail.com', NULL, NULL, NULL, '62b38fef0cdbd', '62b37dfaec6a7', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_session`
--

CREATE TABLE `user_session` (
  `token` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `expiration_time` datetime NOT NULL,
  `user_id` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

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
-- Tablo için indeksler `emails_sent`
--
ALTER TABLE `emails_sent`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

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

--
-- Tablo için indeksler `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
