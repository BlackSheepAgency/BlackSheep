-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 21 Novembre 2014 à 22:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blacksheep`
--

-- --------------------------------------------------------

--
-- Structure de la table `affiches`
--

CREATE TABLE IF NOT EXISTS `affiches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `affiches`
--

INSERT INTO `affiches` (`id`, `name`, `description`, `url`) VALUES
(2, '', 'kygukuylkui', 'img/affiches/affiche1.jpg'),
(3, '', 'uiluilului', 'img/affiches/affiche2.png'),
(4, '', 'uluiluiluilu', 'img/affiches/affiche3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `caps`
--

CREATE TABLE IF NOT EXISTS `caps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `validated` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `caps`
--

INSERT INTO `caps` (`id`, `text`, `validated`, `author`, `picture`) VALUES
(1, 'Cap de faire du shopping avec ta grand-mère ?', 1, 'Admin', 'img/cap/shopping.png'),
(4, 'Cap de faire du foot avec ton papy ?', 1, 'Admin', 'img/cap/foot.png'),
(5, 'Cap de regarder le dernier clip de Nicki Minaj avec un de tes grands-parents ?', 1, 'Admin', 'img/cap/shopping.png'),
(6, 'Cap de prendre un selfie avec ta grand-mère ?', 0, 'Admin', 'img/cap/mamie.png'),
(7, 'Cap d''apprendre à ton papy comment jouer à Candy Crush ?', 0, 'Admin', ''),
(8, 'Cap de jouer à Call of Duty avec ton papy ?', 0, 'Admin', ''),
(9, 'Cap de t’incruster dans une partie de pétanque avec des vieux ?', 0, 'Admin', 'img/cap/petanque.png'),
(10, 'Cap d’aider une personne âgée à porter ses courses ?', 0, 'Admin', ''),
(11, 'Cap d’être bénévole une journée en maison de retraite ?', 0, 'Admin', ''),
(12, 'Cap de faire un don sur “les petits frères des pauvres” ?', 0, 'Admin', ''),
(13, 'Cap de manger un McDo avec tes grands-parents ?', 0, 'Admin', 'img/cap/mcdo.png'),
(14, 'Cap de faire du skateboard avec ton papy ?', 0, 'Admin', 'img/cap/skate.png');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `validated` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `author`, `message`, `url`, `type`, `validated`) VALUES
(1, 'Michaël Vast', 'Y''a un compte twitter d''ouvert ? je follow #FF toussa', 'https://www.facebook.com/602780313159165/posts/603507573086439', 'facebook', 0),
(2, 'commedesgosses', 'Et toi, c''est quand la dernière fois que tu as fait du shopping avec ta grand-mère ? #commedesgosses http://t.co/EeMWZNsNfK', 'http://t.co/5t7MQ1MAUx', 'tweet', 0),
(3, 'Phee', 'Ce soir, avec papy on va s''amuser #commedesgosses :D', 'http://t.co/deXTnJGjwt', 'tweet', 0),
(4, 'Lorang Noémie', 'Ce week-end j''emmène papy en soirée ! :p\n#Commedesgosses http://t.co/Jyj8iwO8vo', 'no_url', 'tweet', 0),
(5, 'Angeline', 'Mon bonheur les courses avec Julien #CommeDesGosses #BroBFF', 'no_url', 'tweet', 0),
(6, '« sergilla;', 'au zénith. madameforesti on t''attend!! #impatiente #commedesgosses http://t.co/kVOGdGUJHI', 'no_url', 'tweet', 0),
(7, 'Barranco Guillaume', 'RT @MichaelDVast: #CommeDesGosses projet de mes copains sûrs de SRC contre l''isolement des personnes agées\nhttp://t.co/GTJgIZ2AKZ\n\nLIKE htt…', 'http://t.co/00eULDORaF', 'tweet', 0),
(8, 'Laëtitia Costagliola', 'RT @CommeDesGosses: Comme des gosses se lance !  Tu seras de nouveau ami avec tes grands-parents ! #commedesgosses', 'no_url', 'tweet', 0),
(9, 'Michaël Vast', 'RT @CommeDesGosses: Comme des gosses se lance !  Tu seras de nouveau ami avec tes grands-parents ! #commedesgosses', 'http://t.co/Pvw3wMKGSr', 'tweet', 0),
(10, 'Comme des Gosses', 'Comme des gosses se lance !  Tu seras de nouveau ami avec tes grands-parents ! #commedesgosses', 'http://t.co/5t7MQ1MAUx', 'tweet', 0),
(11, 'Julien Walch', 'RT @MichaelDVast: #CommeDesGosses projet de mes copains sûrs de SRC contre l''isolement des personnes agées\nhttp://t.co/GTJgIZ2AKZ\n\nLIKE htt…', 'http://t.co/3U6m50rtrT', 'tweet', 0),
(12, 'Michaël Vast', '#CommeDesGosses projet de mes copains sûrs de SRC contre l''isolement des personnes agées\nhttp://t.co/GTJgIZ2AKZ\n\nLIKE http://t.co/kUowyYjlSD', 'http://t.co/Pvw3wMKGSr', 'tweet', 0);

-- --------------------------------------------------------

--
-- Structure de la table `pseudos`
--

CREATE TABLE IF NOT EXISTS `pseudos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `pseudos`
--

INSERT INTO `pseudos` (`id`, `name`) VALUES
(1, 'Koko'),
(2, 'Gear'),
(3, 'jolui');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `publications`
--

INSERT INTO `publications` (`id`, `pseudo`, `comment`, `picture`) VALUES
(1, 'Gear', 'J''ai trop kiffé ma race faire ce Défi, Cap ma biche !', 'img/cap_Gear.jpg'),
(2, 'Koko', 'Trop eaaaaaaaasyyyyyyyy !', 'img/cap_Koko.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
