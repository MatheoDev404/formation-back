-- phpMyAdmin SQL Dump

-- version 4.5.1

-- http://www.phpmyadmin.net

--

-- Client :  127.0.0.1

-- Généré le :  Jeu 05 Janvier 2017 à 09:27

-- Version du serveur :  10.1.19-MariaDB

-- Version de PHP :  5.5.38



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";





/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;



--

-- Base de données :  `entreprise`

--



-- --------------------------------------------------------



--

-- Structure de la table `employe`

--



CREATE TABLE `employe` (

  `id` int(10) UNSIGNED NOT NULL,

  `prenom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

  `service` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

  `date_embauche` date NOT NULL,

  `salaire` int(10) UNSIGNED NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--

-- Contenu de la table `employe`

--



INSERT INTO `employe` (`id`, `prenom`, `nom`, `service`, `date_embauche`, `salaire`) VALUES

(1, 'Julien', 'Anest', 'informatique', '2016-05-03', 3000),

(3, 'Jean', 'Laborde', 'commercial', '2016-10-11', 4000),

(6, 'Thomas', 'Winter', 'comptabilité', '2016-07-10', 3500),

(7, 'Guillaume', 'Miller', 'informatique', '2017-01-01', 4500),

(8, 'Damien', 'Durand', 'commercial', '2016-11-06', 6000),

(9, 'Nathalie', 'Martin', 'informatique', '2016-09-04', 2800),

(10, 'Marc', 'Grand', 'commercial', '2016-08-07', 6000),

(11, 'Bernard', 'Topas', 'Comptabilite', '2016-01-01', 4000),

(12, 'Céline', 'Borde', 'commercial', '2016-05-04', 5000);



--





--

-- AUTO_INCREMENT pour la table `employe`

--

ALTER TABLE `employe`

  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;