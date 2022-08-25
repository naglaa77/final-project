-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 août 2022 à 14:54
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'test1', 'test1@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int NOT NULL,
  `user_phone` int NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, '450.00', 'on_hold', 1, 770347294, 'MARSEILLE', '11 Boulevard Baille', '2022-07-25 13:03:08'),
(2, '300.00', 'on_hold', 1, 455663788, 'Marseille', '11 Boulevard Baille', '2022-07-25 14:04:18'),
(3, '450.00', 'on_hold', 1, 774411, 'Marseille', '11 Boulevard Baille', '2022-07-26 11:23:44'),
(4, '450.00', 'delivered', 1, 885520410, 'msksk', '963wssmkdnasbd', '2022-07-26 11:24:51'),
(5, '450.00', 'on_hold', 1, 852331, 'marseille', '65 dddlsdls', '2022-07-26 11:32:26'),
(6, '450.00', 'on_hold', 1, 770347294, 'MARSEILLE', '11 Boulevard Baille', '2022-07-26 11:36:38'),
(7, '450.00', 'on_hold', 1, 770347294, 'MARSEILLE', '11 Boulevard Baille', '2022-07-26 11:38:46'),
(8, '150.00', 'on_hold', 1, 770347294, 'MARSEILLE', '11 Boulevard Baille', '2022-07-31 20:26:07'),
(9, '310.00', 'not paid', 7, 770347294, 'MARSEILLE', '11 Boulevard Baille', '2022-08-19 06:58:50'),
(10, '150.00', 'not paid', 7, 770347294, 'MARSEILLE', '11 Boulevard Baille', '2022-08-19 07:06:26'),
(11, '610.00', 'on_hold', 8, 770347294, 'MARSEILLE', '11 Boulevard Baille', '2022-08-24 14:44:39');

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int NOT NULL,
  `user_id` int NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 1, '2', 'Green bag', 'featured2.jpeg', '150.00', 1, 1, '2022-07-25 13:03:08'),
(2, 1, '3', 'Black bag', 'featured3.jpeg', '150.00', 2, 1, '2022-07-25 13:03:08'),
(3, 2, '3', 'Black bag', 'featured3.jpeg', '150.00', 2, 1, '2022-07-25 14:04:18'),
(4, 3, '3', 'Black bag', 'featured3.jpeg', '150.00', 2, 1, '2022-07-26 11:23:44'),
(5, 3, '2', 'Green bag', 'featured2.jpeg', '150.00', 1, 1, '2022-07-26 11:23:44'),
(6, 4, '3', 'Black bag', 'featured3.jpeg', '150.00', 2, 1, '2022-07-26 11:24:51'),
(7, 4, '2', 'Green bag', 'featured2.jpeg', '150.00', 1, 1, '2022-07-26 11:24:51'),
(8, 5, '3', 'Black bag', 'featured3.jpeg', '150.00', 3, 1, '2022-07-26 11:32:26'),
(9, 6, '3', 'Black bag', 'featured3.jpeg', '150.00', 3, 1, '2022-07-26 11:36:38'),
(10, 7, '3', 'Black bag', 'featured3.jpeg', '150.00', 3, 1, '2022-07-26 11:38:46'),
(11, 8, '2', 'Green bag', 'featured2.jpeg', '150.00', 1, 1, '2022-07-31 20:26:07'),
(12, 9, '1', 'White Shoes', 'featured1.jpeg', '155.00', 2, 7, '2022-08-19 06:58:50'),
(13, 10, '2', 'Green bag', 'featured2.jpeg', '150.00', 1, 7, '2022-08-19 07:06:26'),
(14, 11, '2', 'Green bag', 'featured2.jpeg', '150.00', 1, 8, '2022-08-24 14:44:39'),
(15, 11, '1', 'White Shoes', 'featured1.jpeg', '155.00', 2, 8, '2022-08-24 14:44:39'),
(16, 11, '3', 'Black bag', 'featured3.jpeg', '150.00', 1, 8, '2022-08-24 14:44:39');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int NOT NULL,
  `product_color` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'White Shoes', 'shoes', 'awesome white bag', 'featured1.jpeg', 'featured1.jpeg', 'featured1.jpeg', 'featured1.jpeg', '155.00', 0, 'white'),
(2, 'Green bag', 'bag', 'awesome green bag', 'featured2.jpeg', 'featured2.jpeg', 'featured2.jpeg', 'featured2.jpeg', '150.00', 0, 'green'),
(3, 'Black bag', 'bag', 'awesome black bag', 'featured3.jpeg', 'featured3.jpeg', 'featured3.jpeg', 'featured3.jpeg', '150.00', 0, 'black'),
(4, 'Blue bag', 'bag', 'awesome blue bag', 'featured4.jpeg', 'featured4.jpeg', 'featured4.jpeg', 'featured4.jpeg', '150.00', 0, 'blue'),
(5, 'Black coat', 'coats', 'black coat for men', 'clothes1.jpeg', 'clothes1.jpeg', 'clothes1.jpeg', 'clothes1.jpeg', '200.00', 0, 'black'),
(6, 'Blue coat', 'coats', 'blue coat for men', 'clothes2.jpeg', 'clothes2.jpeg', 'clothes2.jpeg', 'clothes2.jpeg', '150.00', 0, 'blue'),
(7, 'brown coat', 'coats', 'brown coat for men', 'clothes3.jpeg', 'clothes3.jpeg', 'clothes3.jpeg', 'clothes3.jpeg', '150.00', 0, 'brown'),
(8, 'grey coat', 'coats', 'grey coat for men', 'clothes4.jpeg', 'clothes4.jpeg', 'clothes4.jpeg', 'clothes4.jpeg', '150.00', 0, 'grey');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UX_Constraint` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'sama', 'sama@un.nh', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Naglaa ', 'sama_hap@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'mina', 'mina@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'naglaa', 'noga@yahoo.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
(5, 'naglaa', 'nagla@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'powder', 'asd@hjj.jh', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'naglaa', 'nona@m.nm', '984cefd6d27eb0471fc401a493a4fdff'),
(8, 'test2', 'test2@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
