-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 25 jan. 2023 à 22:27
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `conciergerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `cartefidelite`
--

DROP TABLE IF EXISTS `cartefidelite`;
CREATE TABLE IF NOT EXISTS `cartefidelite` (
  `id_carte` bigint NOT NULL AUTO_INCREMENT,
  `membership` varchar(50) NOT NULL,
  `dateAdhesion` date NOT NULL,
  `id_points` bigint NOT NULL,
  PRIMARY KEY (`id_carte`),
  KEY `id_points` (`id_points`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cartefidelite`
--

INSERT INTO `cartefidelite` (`id_carte`, `membership`, `dateAdhesion`, `id_points`) VALUES
(2, 'Premium', '0000-00-00', 0),
(3, 'Junior', '2022-02-02', 50);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `codeClient` bigint NOT NULL AUTO_INCREMENT,
  `nameClient` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` bigint DEFAULT NULL,
  `compteFacebook` varchar(50) DEFAULT NULL,
  `compteiIstagram` varchar(50) DEFAULT NULL,
  `id_carte` bigint NOT NULL,
  PRIMARY KEY (`codeClient`),
  KEY `id_carte` (`id_carte`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`codeClient`, `nameClient`, `adresse`, `email`, `tel`, `compteFacebook`, `compteiIstagram`, `id_carte`) VALUES
(5, 'Eben', '22 Av BATR', 'EBEN@GMAIL', 122355487, 'Facebook@Eben', 'Instagram@Eben', 2),
(6, '', '', '', 4785693214, 'Facebook@Joel', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `noCommande` bigint NOT NULL AUTO_INCREMENT,
  `quantite` bigint NOT NULL,
  `dateCommande` date NOT NULL,
  `codeClient` bigint NOT NULL,
  PRIMARY KEY (`noCommande`),
  KEY `codeClient` (`codeClient`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`noCommande`, `quantite`, `dateCommande`, `codeClient`) VALUES
(1, 145, '2022-05-05', 5),
(4, 10, '2022-01-12', 5),
(5, 50, '2022-02-16', 5),
(6, 20, '2023-03-28', 6),
(7, 47, '2022-04-11', 5),
(8, 10, '2022-01-12', 5),
(9, 50, '2022-02-16', 5),
(10, 20, '2023-03-28', 6),
(11, 47, '2022-04-11', 5);

-- --------------------------------------------------------

--
-- Structure de la table `commandeproduit`
--

DROP TABLE IF EXISTS `commandeproduit`;
CREATE TABLE IF NOT EXISTS `commandeproduit` (
  `codeProduit` bigint NOT NULL,
  `noCommande` int DEFAULT NULL,
  KEY `noCommande` (`noCommande`),
  KEY `codeProduit` (`codeProduit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandeproduit`
--

INSERT INTO `commandeproduit` (`codeProduit`, `noCommande`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `idFacture` bigint NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idFacture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `idLivraison` bigint NOT NULL AUTO_INCREMENT,
  `adresseLiv` varchar(50) NOT NULL,
  `statusLiv` varchar(50) NOT NULL,
  `statusProd` varchar(50) NOT NULL,
  `fraisLiv` bigint NOT NULL,
  `fraisSev` bigint NOT NULL,
  `dispatchedDate` date NOT NULL,
  `dateLiv` date NOT NULL,
  `noCommande` bigint NOT NULL,
  PRIMARY KEY (`idLivraison`),
  KEY `noCommande` (`noCommande`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`idLivraison`, `adresseLiv`, `statusLiv`, `statusProd`, `fraisLiv`, `fraisSev`, `dispatchedDate`, `dateLiv`, `noCommande`) VALUES
(1, '22 Av Bart', 'En Cours', 'In Stock', 40, 10, '2022-04-05', '2022-06-06', 1);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `idPaiement` bigint NOT NULL AUTO_INCREMENT,
  `modePaiement` varchar(50) NOT NULL,
  `datePaiement` date NOT NULL,
  PRIMARY KEY (`idPaiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id_points` bigint NOT NULL AUTO_INCREMENT,
  `nombre` int NOT NULL,
  `date_expiration` date NOT NULL,
  `cumul` int NOT NULL,
  PRIMARY KEY (`id_points`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `codeProduit` bigint NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(50) NOT NULL,
  `typeProduit` varchar(50) NOT NULL,
  `prixUnitaire` bigint NOT NULL,
  `pointProduit` bigint NOT NULL,
  PRIMARY KEY (`codeProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`codeProduit`, `nomProduit`, `typeProduit`, `prixUnitaire`, `pointProduit`) VALUES
(1, 'AZZARO', 'Parfum', 3500, 50),
(2, 'CERAVE', 'LOTION', 56, 10);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromo` bigint NOT NULL AUTO_INCREMENT,
  `pourcentage` int NOT NULL,
  `dateValide` date NOT NULL,
  PRIMARY KEY (`idPromo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `regles`
--

DROP TABLE IF EXISTS `regles`;
CREATE TABLE IF NOT EXISTS `regles` (
  `id_regle` bigint NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `valeur` int NOT NULL,
  `nombre_point` int NOT NULL,
  PRIMARY KEY (`id_regle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `idStock` bigint NOT NULL AUTO_INCREMENT,
  `quantiteProduit` bigint NOT NULL,
  `available` tinyint(1) NOT NULL,
  PRIMARY KEY (`idStock`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cartefidelite`
--
ALTER TABLE `cartefidelite`
  ADD CONSTRAINT `cartefidelite_ibfk_1` FOREIGN KEY (`id_points`) REFERENCES `points` (`id_points`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_carte`) REFERENCES `cartefidelite` (`id_carte`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`codeClient`) REFERENCES `client` (`codeClient`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`noCommande`) REFERENCES `commande` (`noCommande`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
