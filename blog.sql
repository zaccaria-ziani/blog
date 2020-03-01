-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2020 at 12:20 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateurs`, `id_categorie`, `date`) VALUES
(1, 'Souvent, pour s\'amuser, les hommes d\'équipage\r\nPrennent des albatros, vastes oiseaux des mers,\r\nQui suivent, indolents compagnons de voyage,\r\nLe navire glissant sur les gouffres amers.\r\n\r\nA peine les ont-ils déposés sur les planches,\r\nQue ces rois de l\'azur, maladroits et honteux,\r\nLaissent piteusement leurs grandes ailes blanches\r\nComme des avirons traîner à côté d\'eux.\r\n\r\nCe voyageur ailé, comme il est gauche et veule!\r\nLui, naguère si beau, qu\'il est comique et laid!\r\nL\'un agace son bec avec un brûle-gueule,\r\nL\'autre mime, en boitant, l\'infirme qui volait!\r\nLe Poète est semblable au prince des nuées\r\nQui hante la tempête et se rit de l\'archer;\r\nExilé sur le sol au milieu des huées,\r\nSes ailes de géant l\'empêchent de marcher.', 4, 1, '2020-02-20 05:12:09'),
(2, 'La Nature est un temple où de vivants piliers\r\nLaissent parfois sortir de confuses paroles;\r\nL\'homme y passe à travers des forêts de symboles\r\nQui l\'observent avec des regards familiers.\r\n\r\nComme de longs échos qui de loin se confondent\r\nDans une ténébreuse et profonde unité,\r\nVaste comme la nuit et comme la clarté,\r\nLes parfums, les couleurs et les sons se répondent.\r\n\r\nIl est des parfums frais comme des chairs d\'enfants,\r\nDoux comme les hautbois, verts comme les prairies,\r\n- Et d\'autres, corrompus, riches et triomphants,\r\nAyant l\'expansion des choses infinies,\r\nComme l\'ambre, le musc, le benjoin et l\'encens\r\nQui chantent les transports de l\'esprit et des sens.', 3, 2, '2020-02-13 09:17:38'),
(3, 'Je suis belle, ô mortels! comme un rêve de pierre,\r\nEt mon sein, où chacun s\'est meurtri tour à tour,\r\nEst fait pour inspirer au poète un amour\r\nEternel et muet ainsi que la matière.\r\n\r\nJe trône dans l\'azur comme un sphinx incompris;\r\nJ\'unis un cœur de neige à la blancheur des cygnes;\r\nJe hais le mouvement qui déplace les lignes,\r\nEt jamais je ne pleure et jamais je ne ris.\r\n\r\nLes poètes, devant mes grandes attitudes,\r\nQue j\'ai l\'air d\'emprunter aux plus fiers monuments,\r\nConsumeront leurs jours en d\'austères études;\r\nCar j\'ai, pour fasciner ces dociles amants,\r\nDe purs miroirs qui font toutes choses plus belles:\r\nMes yeux, mes larges yeux aux clartés éternelles!', 3, 3, '2020-02-19 07:12:12'),
(4, 'O toison, moutonnant jusque sur l\'encolure!\r\nO boucles! O parfum chargé de nonchaloir!\r\nExtase! Pour peupler ce soir l\'alcôve obscure\r\nDes souvenirs dormant dans cette chevelure,\r\nJe la veux agiter dans l\'air comme un mouchoir!\r\n\r\nLa langoureuse Asie et la brûlante Afrique,\r\nTout un monde lointain, absent, presque défunt,\r\nVit dans les profondeurs, forêt aromatique!\r\nComme d\'autres esprits voguent sur la musique,\r\nLe mien, ô mon amour! nage sur ton parfum.\r\nJ\'irai là-bas où l\'arbre et l\'homme, pleins de sève,\r\nSe pâment longuement sous l\'ardeur des climats;\r\nFortes tresses, soyez la houle qui m\'enlève!\r\nTu contiens, mer d\'ébène, un éblouissant rêve\r\nDe voiles, de rameurs, de flammes et de mâts:\r\n\r\nUn port retentissant où mon âme peut boire\r\nA grands flots le parfum, le son et la couleur;\r\nOù les vaisseaux, glissant dans l\'or et dans la moire,\r\nOuvrent leurs vastes bras pour embrasser la gloire\r\nD\'un ciel pur où frémit l\'éternelle chaleur.\r\n\r\nJe plongerai ma tête amoureuse d\'ivresse\r\nDans ce noir océan où l\'autre est enfermé;\r\nEt mon esprit subtil que le roulis caresse\r\nSaura vous retrouver, ô féconde paresse!\r\nInfinis bercements du loisir embaumé!\r\n\r\nCheveux bleus, pavillon de ténèbres tendues,\r\nVous me rendez l\'azur du ciel immense et rond;\r\nSur les bords duvetés de vos mèches tordues\r\nJe m\'enivre ardemment des senteurs confondues\r\nDe l\'huile de coco, du musc et du goudron.\r\n\r\nLongtemps! toujours! ma main dans ta crinière lourde\r\nSèmera le rubis, la perle et le saphir,\r\nAfin qu\'à mon désir tu ne sois jamais sourde!\r\nN\'es-tu pas l\'oasis où je rêve, et la gourde\r\nOù je hume à longs traits le vin du souvenir?', 2, 4, '2020-02-19 12:00:24');

) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'FPS'),
(2, 'RPG'),
(3, 'Meuporg'),
(4, 'Platformer');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateurs'),
(42, 'moderateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`, `avatar`) VALUES
(1, 'Le lion du Roi de la jungle', 'trahi', 'trahi@email.yahoo.com', 1, 'Images/avatars/1.png'),
(2, 'le malfrat du roi des rats', 'grouik', 'grouik@email.com', 1337, 'Images/avatars/2.png'),
(3, 'Le lanceur de pot de fleur', 'J\'adore', 'monEmail@email.com', 42, 'Images/avatars/3.png'),
(4, 'La chanteuse de Loire-et-Meuse', 'lalalala', 'monEmail@email.com', 42, 'Images/avatars/4.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
