-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 02 juil. 2024 à 09:33
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(5, 1, 'Vincent', 'vkii@gmail.com', '0789123312', 'Bonjour'),
(7, 1, 'Manassé', 'manassek@gmail.com', '0123230012', 'J\'aime beaucoup les produits'),
(8, 6, 'Fatima', 'touma@gmail.com', '0188669955', 'Bonjour'),
(9, 6, 'Paula', 'Paula@gmail.com', '0899780202', 'Je suis satisfaite des résultats'),
(10, 7, 'koffi', 'koff@gmail.com', '0101223401', 'Bonjour'),
(11, 8, 'marie-nissi', 'marie@gmail.com', '0758160089', 'Bonjour à tous');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `placed_on` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(10, 7, '', '', '', '', 'flat no. ,,,,,', '', '650', '29-Jun-2024', ''),
(11, 8, '', '', '', '', 'flat no. ,,,,,', '', '100', '30-Jun-2024', 'pending'),
(12, 8, 'marie-nissi', '0758160089', 'marie@gmail.com', 'paytm', 'flat no. Deux plateau,riviera,abidjan,cocody,Cote-d\'ivoire,225', '', '380', '30-Jun-2024', 'pending'),
(13, 8, '', '', '', '', 'flat no. ,,,,,', '', '80', '01-Jul-2024', ''),
(14, 9, '', '', '', '', 'flat no. ,,,,,', '', '20', '02-Jul-2024', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_detail` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_detail`, `image`) VALUES
(2, 'Clavier + souris sans fil – Multimedia – Azerty – Numérique', '15 000', 'Catégories : Clavier, Souris', 'c3.png'),
(3, 'CLAVIER GAMER', '20 000', 'Clavier filaire rétro-éclairé arc-en-ciel\r\n\r\nNombre de touches de fonction : 104\r\nType de Keycap : keycap flottant\r\nEffet d’ éclairage : éclairage coloré\r\nTaille du clavier : 438 x 127 x 34mm\r\nNombre de touches de fonction : 3\r\nSouris de jeu Cool\r\n\r\nInterface de souris : le câble USB mesure environ 1,3 mètre de long\r\nTaille de la souris : 128 x 70 x 35mm\r\nBouton : bouton gauche/bouton de molette de défilement/bouton droit\r\nEffet d’ éclairage : effet d’ éclairage respirant coloré\r\nCompatibilité du système :\r\n\r\nWin XP/7/8/10/MAC 10.2 et supérieur\r\n\r\nCatégories : Clavier, Souris', 'c2.png'),
(4, 'Laptop – i5 – 5200U', '380 000 ', 'Processeur : Intel® Core® Processor i5-5200U\r\nfrequence-processeur : 2.2GHz-2.7GHz\r\nmemoire-vive-ram : 8 Go\r\nstockage-principal : 1 To, 128 Go, 256 Go, 512 Go\r\nType stockage : SSD\r\ncarte-graphique	: Intel HD Graphics\r\nresolution-de-lecran : 1920*1080\r\nusb3-0 : x1\r\ncouleur : Argenté\r\nearphone-port : x1\r\nVersion système d\'exploitation : Windows 10 Pro (multilangue)\r\nFamille OS : Windows\r\ntaille-decran : 15,6 pouces\r\nwi-fi : Oui\r\nSortie Vidéo : Mini HDMI\r\nUSB2.0 : x1\r\nclavier-retroeclaire : Oui\r\n\r\nUGS : ND\r\nCatégories : Ordinateur, Portable\r\nÉtiquette : I9', 'c5.png'),
(5, 'Laptop – J4105 – BOUAKE', '250 000', 'Processeur : Intel® Celeron® Processeur J4105\r\n\r\nfrequence-processeur : 1.5GHz-2.5GHz\r\n\r\nmemoire-vive-ram : 6 Go\r\n\r\nstockage-principal : 1 To, 128 Go, 256 Go, 512 Go\r\n\r\ncarte-graphique	: Intel HD Graphics\r\n\r\nclavier-retroeclaire : Non\r\n\r\ncouleur	: Argenté\r\n\r\nearphone-port : x1\r\n\r\nethernet : x1\r\n\r\nmini-hdmi : x1\r\n\r\npave-numerique	: Non\r\n\r\nresolution-de-lecran : 1920*1080\r\n\r\nresolution-webcam : 2.0 MP\r\n\r\nsortie-vga : Non\r\n\r\nVersion système d\'exploitation	: Windows 10 Pro (multilangue)\r\n\r\nEcran tactile : Non\r\n\r\ntaille-decran : 14,1 pouces\r\n\r\nusb3-0 : x2\r\n\r\nwi-fi : Oui\r\n\r\nUGS : ND\r\n\r\nCatégories : Ordinateur, Portable', 'c4.png'),
(6, 'Tablette éducative MTK 6592', '45 000', 'wi-fi : Oui\r\nBatterie - durée : 3000 mAh\r\nCarte SIM : 3G\r\nFamille OS : Android\r\nVersion système d\'exploitation : Android 5.1\r\ncouleur	: Bleu, Rose\r\nmemoire-vive-ram : 1 Go\r\nstockage-principal : 16 Go\r\n\r\nUGS : ND\r\nCatégories : Educative, Tablette\r\nÉtiquettes : Educative, Tablette', 'a1.png'),
(7, 'Ordinateur de bureau tout en un – Q24A 23″ 2To HDD 16Go', '650 000', 'Poids : 8 kg\r\nDimensions : 67 × 24 × 54 cm\r\ntaille-decran : 23,6 pouces\r\nresolution-de-lecran : 1092*1080\r\nCarte mère : H61\r\nProcesseur : Intel® Core™ Processor i7-3470\r\nmemoire-vive-ram : 16 Go\r\nType RAM : DDR3\r\nstockage-principal : 2 To\r\nType stockage : HDD\r\nwi-fi : Oui\r\nBluetooth : Oui\r\nAlimentation : 150 W\r\nFamille OS : Windows\r\nVersion système d\'exploitation : Windows 10\r\nGarantie : 1 an\r\n\r\nCatégories : Bureau, Ordinateur', 'a2.png'),
(10, 'I-DJAN', '400 000 ', 'CPU: Intel® Celeron® Processor N5095 Quad-Core Frequency:2.5GHz-2.9GHz\r\nGPU: Intel HD Graphic\r\nRAM: DDR4 12G\r\nROM: 128G/256G/512G/1T SSD Ø Resolution:1920*1080\r\nI/O Ports: USB3.0*1\r\nType-C*1 Earphone port*1 SD card port*1\r\nScreen Size: 14.1 Inch\r\nOperating System: Windows 10 Pro (Multilingual) Color: Silver/Pink\r\nBacklit Keyboard: ok\r\n\r\n\r\n12G+128G = 400 000 FR\r\n12G+256G = 450 000 FR\r\n12G+512G = 480 000 FR\r\n12G+1T = 500 000 FR', 'ccccccccccccccccc.png'),
(11, 'I-RHOGO', '680 000', 'CPU: Intel® Core® Processor i7-1165G7 Ø Frequency:2.8GHz-4.7GHz\r\nGPU: Intel Iris Xe Graphics\r\nRAM: DDR4 8G/16G\r\nROM: 128G/256G/512G/1T SSD Ø Resolution:1920*1080\r\nI/O Ports: USB3.0*2\r\nUSB2.0*2 Type-C*1 Earphone port*1 SD Card port*1 Mini HDMIt*1\r\nScreen Size: 15.6 Inch\r\nOperating System: Windows 10 Pro (Multilingual) Color: Grey\r\nBacklit keyboard\r\nFingerprint unlock\r\n\r\n8G+128G = 680 000 FR\r\n16G+128G = 800 000 FR\r\n8G+256G = 700 000 FR\r\n16G+256G = 850 000 FR\r\n8G+512G = 750 000 FR\r\n16G+512G = 880 000 FR\r\n8G+1T = 780 000 FR\r\n16G+1T = 900 000 FR', 'ccccc.png'),
(13, 'I-DIALI', '700 000', 'CPU: Intel® Core® Processor i9-9880H Frequency:2.8GHz-4.7GHz\r\nGPU: Intel Intel UHD Graphics\r\nRAM: DDR4 8G/16G\r\nROM: 128G/256G/512G/1T SSD \r\nResolution:1920*1080\r\nI/O Ports: USB3.0*3\r\nType-C*1 RJ45*1\r\nEarphone port*1\r\nMini HDMIt*1 Ø Screen Size: 15.6 Inch\r\nOperating System: Windows 10 Pro (Multilingual) Color: Grey\r\nBacklit keyboard\r\nFingerprint unlock\r\n\r\n8G+128G = 700 000 FR \r\n16G+128G = 900 000 FR\r\n8G+256G = 750 000 FR \r\n16G+256G = 950 000 FR\r\n8G+512G = 800 000 FR \r\n16G+512G = 1 000 000 FR\r\n8G+1T = 850 000 FR \r\n16G+1T = 1 050 000FR', 'ertrgf.png'),
(14, 'I-SAM', '500 000', 'CPU: Intel® Core® Processor i7-6700H \r\nFrequency:2.6GHz-3.6GHz\r\nGPU: Intel HD Graphic\r\nRAM: DDR4 8G/16G\r\nROM: 128G/256G/512G/1T SSD \r\nResolution:1920*1080\r\nI/O Ports: USB3.0*2\r\nUSB2.0*2 Earphone port*1 SD Card port*1 Mini HDMIt*1 RJ45*\r\nScreen Size: 15.6 Inch\r\nOperating System: Windows 10 Pro (Multilingual) \r\nColor: Silver\r\nBacklit keyboard\r\n\r\n\r\n8G+128G = 500 000 FR \r\n16G+128G = 530 000 FR\r\n8G+256G = 530 000 FR \r\n16G+256G = 550 000 FR\r\n8G+512G = 550 000 FR \r\n16G+512G = 580 000 FR\r\n8G+1T = 580 000 FR \r\n16G+1T = 650 000 FR', 'jhj.png'),
(15, 'I-KE', '650 000', 'CPU: Intel® Core® Processor i7-8550U  Frequency:1.8GHz-4GHz\r\nGPU: Intel HD Graphic\r\nRAM: DDR4 8G/16G\r\nROM: 128G/256G/512G/1T SSD  Resolution:1920*1080\r\nI/O Ports: USB3.0*2\r\nUSB2.0*2 Earphone port*1 HDMIt*1\r\nScreen Size: 15.6 Inch\r\nOperating System: Windows 10 Pro (Multilingual) Color: Silver\r\nBacklit Keyboard:ok\r\n\r\n\r\n8G+128G = 650 000 FR\r\n16G+128G = 780 000 FR\r\n8G+256G = 680 000 FR\r\n16G+256G = 800 000 FR\r\n8G+512G = 700 000 FR\r\n16G+512G = 850 000 FR\r\n8G+1T = 750 000 FR\r\n16G+1T = 880 000 FR', 'hhh.png'),
(16, 'I-YAMA', '250 000', 'CPU: Intel® Celeron® Processor J4105 Quad-Core Frequency:1.5GHz-2.5GHz\r\nGPU: Intel HD Graphic\r\nRAM: DDR4 6G\r\nROM: 128G/256G/512G/1T SSD  Resolution:1920*1080\r\nI/O Ports: USB3.0*2\r\nMini HDMI*1\r\nEarphone port*1 Ø Screen Size: 14.1 Inch\r\nOperating System: Windows 10 Pro (Multilingual) Color: Silver\r\n180 degree hinge\r\n\r\n\r\n6G+128G = 250 000 FR\r\n6G+256G = 300 000 FR\r\n6G+512G = 350 000 FR\r\n6G+1 = 400 000 FR', 'hyg.png'),
(17, 'Tablette Android 8Go RAM', '150 000', 'Famille OS = Android\r\nVersion système d\'exploitation = Android 5.1\r\nresolution-webcam = 2MP + 8 MP\r\ncouleur	= OR\r\nmemoire-vive-ram = 8 Go\r\nstockage-principal = 128 Go\r\nType stockage = SD', 'tt.png'),
(18, 'Laptop-i5-8279U', '480 000 ', 'CPU: Intel® Core® Processor i5-8279U  Frequency:2.4GHz-4.1GHz\r\nGPU: Intel HD Graphic\r\nRAM: DDR4 8G/16G\r\nROM: 128G/256G/512G/1T SSD  Resolution:1920*1080\r\nI/O Ports: USB3.0*2\r\nType-C*1 RJ45*1 Earphone port*1 TF Card port*1 Mini HDMIt*1\r\nScreen Size: 15.6 Inch\r\nOperating System: Windows 10 Pro (Multilingual) Color: Silver\r\nMultifunctional touch screen menu bar\r\n180 degree hinge\r\n\r\n8G+128G = 480 000 FR \r\n16G+128G = 650 000 FR\r\n8G+256G = 500 000 FR \r\n16G+256G = 680 000 FR\r\n8G+512G = 580 000 FR \r\n16G+512G = 700 000 FR\r\n8G+1T = 600 000 FR \r\n16G+1T = 750 000 FR', 'image2.png'),
(19, 'Laptop-i5-5200U', '450 000', 'CPU: Intel® Core® Processor i5-5200U  Frequency:2.2GHz-2.7GHz\r\nGPU: Intel HD Graphic\r\nRAM: DDR4 8G\r\nROM: 128G/256G/512G/1T SSD  Resolution:1920*1080\r\nI/O Ports: USB3.0*1\r\nUSB2.0*1 Earphone port*1 Mini HDMIt*1\r\nScreen Size: 15.6 Inch\r\nOperating System: Windows 10 Pro (Multilingual) Color: Silver\r\nBacklit Keyboard:ok\r\n\r\n\r\n8G+128G = 450 000 FR\r\n8G+256G = 480 000 FR\r\n8G+512G = 500 000 FR\r\n8G+1T = 550 000 FR', 'yuu.png'),
(20, 'fff', '12000', 'fmzùrvze', 'ccccccccccccccccc.png');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id` int(255) NOT NULL,
  `thumb1` varchar(255) NOT NULL,
  `thumb2` varchar(255) NOT NULL,
  `thumb3` varchar(255) NOT NULL,
  `thumb4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id`, `thumb1`, `thumb2`, `thumb3`, `thumb4`) VALUES
(1, '8.webp', '9.webp', '10.webp', '11.webp'),
(2, 'product-1-2.png', 'product-1-3.png', 'product-1-6.png', 'product-1-7.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(3, 'mihita', 'mihita.emmanuella@gmail.com', 'nissi1298', 'admin'),
(6, 'mahi', 'mahinazir@gmail.com', '12345', 'utilisateur'),
(7, 'marie-nissi', 'marie@gmail.com', 'hhhh', 'utilisateur'),
(8, 'koffi', 'koff@gmail.com', 'zzzz', 'utilisateur'),
(9, 'S&eacute;phora', 'sepho@gmail.com', '1234', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(1, 9, 11, 'I-RHOGO', '680 000', 'ccccc.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
