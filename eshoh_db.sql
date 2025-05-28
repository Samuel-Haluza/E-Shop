-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 28.Máj 2025, 11:24
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `eshop_db`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `subject`) VALUES
(1, 'Livia', 'lkelebercova@ukf.sk', 'Moja sprava', ''),
(2, 'a', 'kelebercova24@gmail.com', '<script>\r\nalert(\'hello\');\r\n', ''),
(3, 'Ide to ???', 'samuel.haluza2@gmail.com', 'asdasdad', 'Dufam ze to die'),
(4, 'sadasdasdad', 'asdasda@gmail.com', 'adsasdasdasd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created_at`) VALUES
(2, 'Tepláková bunda Z.N.E. Full-Zip Hooded', 'Nahoď sa do tejto teplákovej bundy adidas a naplno sa sústreď. Je vyrobená z hrejivého trojvrstvového dvojitého úpletu, ktorý udržiava teplo pri pokožke, a vďaka kapucni ti v prípade potreby umožní odrezať okolitý svet a venovať sa len sebe. Vždy keď budeš mať pred sebou nový deň, matná gumená potlač s logom 3 Bar ti pripomenie, že tak ako celá komunita, šport máš v krvi.', 54.00, 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/d87cc8c00e334227af675b92c9d8fd13_9366/Teplakova_bunda_Z.N.E._Full-Zip_Hooded_Siva_JF2450_25_model.jpg', '2025-05-19 12:10:44'),
(3, 'Tenisky Adizero Adios Pro AMiGO 2025 4', 'Overená ako najúspešnejšia obuv na svete, rada Adizero Adios Pro predstavuje vrchol bežeckej obuvi Adizero. Adios Pro 4 je určená pre rýchlych bežcov, ktorí chcú zažiť ešte väčšiu rýchlosť – s vylepšenými funkciami navrhnutými na optimalizáciu efektivity behu. Naše ENERGYRODS 2.0 naplnené uhlíkom, poskytujú plynulý prechod z päty na špičku, pre svižný a efektívny rytmus. V medzipodrážke nový bod zhybu zlepšuje bežeckú efektivitu. Dvojitá vrstva našej špičkovej ultraľahkej peny LIGHTSTRIKE PRO zabezpečuje odpruženie pri každom rýchlom kroku a pomôže ti udržať si energiu aj na dlhej trati. ', 250.00, 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/5e9301374cba477a8baaed8050504553_9366/Tenisky_Adizero_Adios_Pro_4_tyrkysova_JR1251_01_00_standard.jpg', '2025-05-19 12:12:07'),
(4, 'Dres Real Madrid 24/25 Away Kids 2025', 'Upriamujeme pozornosť na vzostup novej futbalovej generácie. Tento juniorský hosťovský dres adidas je inšpirovaný skvostnými výkonmi Realu Madrid, a preto sa vyznačuje žiarivooranžovým dizajnom s abstraktným motívom evokujúcim hviezdy. Zdobia ho tmavomodré detaily, ako napríklad vyšívaný erb klubu, a vďaka absorpčnej úprave AEROREADY pomáha fanúšikom byť v top forme. Tento produkt je vyrobený zo 100 % recyklovaných materiálov. Opätovné využitie materiálov nám pomáha redukovať odpad, menej sa spoliehať na vyčerpateľné zdroje a znižovať uhlíkovú stopu produktov, ktoré vyrábam', 75.00, 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/b8e538d54a05499698a4f6aca426db7f_9366/Dres_Real_Madrid_24-25_Away_Kids_oranzova_IT5177_25_model.jpg', '2025-05-19 12:13:36'),
(5, 'Tenisky Samba OG GRANT TURISMO', 'Najnovšia verzia kultových tenisiek adidas Samba OG je tu, aby zanechala dojem. Majú výrazný neprehliadnuteľný energický dizajn s geparďou potlačou, zvrškom z chĺpkovitej kože, extra koženými detailmi a farebnou podšívkou. Debutovali v 50. rokoch ako indoorový futbalový model, no odvtedy si vytvorili úplne novú identitu.', 110.00, 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/2b4aae1dcee04c3d8ad2b080ad5675fb_9366/Tenisky_Samba_OG_cierna_JI2734_01_standard.jpg', '2025-05-19 12:14:37'),
(6, 'Mikina s kapucňou Neuclassics 2025', 'Klasická pohodlná mikina adidas v modernom štýle. Má voľný strih, takže sa perfektne hodí na lenivé večery či výjazd do mesta, a vďaka vrúbkovaným manžetám a prispôsobiteľnej kapucni ti zabezpečí extra pohodlie. Na rukáve sa jej vynímajú kultové 3 prúžky v žiarivých farbách. V tejto trendovej mikine s kapucňou sa prenesieš do štýlu značky adidas Originals.', 75.00, 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/af184a4792814568b58879776f59959f_9366/Mikina_s_kapucnou_Neuclassics_fialova_IW5614_21_model.jpg', '2025-05-19 12:17:22');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(5, 'admin', 'admin@example.com', '$2y$10$D70SoY/KX7O0w2w/CJi97.JbqCJ1dwTP6F.w24sMBVFlrxSF8gSCC', 0, '2025-04-28 21:30:33'),
(6, 'user', 'user@example.com', '$2y$10$G2GzEDQtlA.32.FFiNyV1.uMgAxdD7jmm40jdNKFVrSSodTqLp2q2', 1, '2025-04-28 21:30:49'),
(7, 'User', 'samuel.haluza@student.ukf.cz', '$2y$10$NQRiAzsmM9EiGNqqqzADQuLf2wjGyjhkXTO5GazUYkxvZeOays6D6', 1, '2025-05-19 12:02:00'),
(8, 'User', 'samuel.haluza@student.ukf.cz', '$2y$10$yXXrWMM./lTT.zTqFpt9u.YK1.OgRptQz5w3FbfvXuR1DT7CTrmRu', 1, '2025-05-19 12:19:50'),
(13, 'User', 'asdasda@gmail.com', '$2y$10$F1Isoo8FcASGpL3/QUPdse8nxvzJ7IZtwv2pJYgfbYiPPx5Q/3Usm', 1, '2025-05-27 10:10:26');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
