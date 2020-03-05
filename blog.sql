-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 mars 2020 à 15:35
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  `titre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`, `titre`) VALUES
(1, 'Mon enfant, ma soeur,\r\nSonge Ã  la douceur\r\nD\'aller lÃ -bas vivre ensemble !\r\nAimer Ã  loisir,\r\nAimer et mourir\r\nAu pays qui te ressemble !\r\nLes soleils mouillÃ©s\r\nDe ces ciels brouillÃ©s\r\nPour mon esprit ont les charmes\r\nSi mystÃ©rieux\r\nDe tes traÃ®tres yeux,\r\nBrillant Ã  travers leurs larmes.\r\n\r\nLÃ , tout n\'est qu\'ordre et beautÃ©,\r\nLuxe, calme et voluptÃ©.\r\n\r\nDes meubles luisants,\r\nPolis par les ans,\r\nDÃ©coreraient notre chambre ;\r\nLes plus rares fleurs\r\nMÃªlant leurs odeurs\r\nAux vagues senteurs de l\'ambre,\r\nLes riches plafonds,\r\nLes miroirs profonds,\r\nLa splendeur orientale,\r\nTout y parlerait\r\nÃ€ l\'Ã¢me en secret\r\nSa douce langue natale.\r\n\r\nLÃ , tout n\'est qu\'ordre et beautÃ©,\r\nLuxe, calme et voluptÃ©.\r\n\r\nVois sur ces canaux\r\nDormir ces vaisseaux\r\nDont l\'humeur est vagabonde ;\r\nC\'est pour assouvir\r\nTon moindre dÃ©sir\r\nQu\'ils viennent du bout du monde.\r\n- Les soleils couchants\r\nRevÃªtent les champs,\r\nLes canaux, la ville entiÃ¨re,\r\nD\'hyacinthe et d\'or ;\r\nLe monde s\'endort\r\nDans une chaude lumiÃ¨re.\r\n\r\nLÃ , tout n\'est qu\'ordre et beautÃ©,\r\nLuxe, calme et voluptÃ©.', 13, 4, '2020-01-16 05:12:00', 'L\'invitation au voyage'),
(10, 'J\'ai plus de souvenirs que si j\'avais mille ans.\r\n\r\nUn gros meuble Ã  tiroirs encombrÃ© de bilans,\r\nDe vers, de billets doux, de procÃ¨s, de romances,\r\nAvec de lourds cheveux roulÃ©s dans des quittances,\r\nCache moins de secrets que mon triste cerveau.\r\nC\'est une pyramide, un immense caveau,\r\nQui contient plus de morts que la fosse commune.\r\n- Je suis un cimetiÃ¨re abhorrÃ© de la lune,\r\nOÃ¹ comme des remords se traÃ®nent de longs vers\r\nQui s\'acharnent toujours sur mes morts les plus chers.\r\nJe suis un vieux boudoir plein de roses fanÃ©es,\r\nOÃ¹ gÃ®t tout un fouillis de modes surannÃ©es,\r\nOÃ¹ les pastels plaintifs et les pÃ¢les Boucher,\r\nSeuls, respirent l\'odeur d\'un flacon dÃ©bouchÃ©.\r\n\r\nRien n\'Ã©gale en longueur les boiteuses journÃ©es,\r\nQuand sous les lourds flocons des neigeuses annÃ©es\r\nL\'ennui, fruit de la morose incuriositÃ©,\r\nPrend les proportions de l\'immortalitÃ©.\r\n- DÃ©sormais tu n\'es plus, Ã´ matiÃ¨re vivante!\r\nQu\'un granit entourÃ© d\'une vague Ã©pouvante,\r\nAssoupi dans le fond d\'un Sahara brumeux;\r\nUn vieux sphinx ignorÃ© du monde insoucieux,\r\nOubliÃ© sur la carte, et dont l\'humeur farouche\r\nNe chante qu\'aux rayons du soleil qui se couche.', 13, 3, '2020-03-01 00:27:14', 'Spleen II'),
(11, 'Il est amer et doux, pendant les nuits d\'hiver,\r\nD\'Ã©couter, prÃ¨s du feu qui palpite et qui fume,\r\nLes souvenirs lointains lentement s\'Ã©lever\r\nAu bruit des carillons qui chantent dans la brume.\r\n\r\nBienheureuse la cloche au gosier vigoureux\r\nQui, malgrÃ© sa vieillesse, alerte et bien portante,\r\nJette fidÃ¨lement son cri religieux,\r\nAinsi qu\'un vieux soldat qui veille sous la tente!\r\n\r\nMoi, mon Ã¢me est fÃªlÃ©e, et lorsqu\'en ses ennuis\r\nElle veut de ses chants peupler l\'air froid des nuits,\r\nIl arrive souvent que sa voix affaiblie\r\n\r\nSemble le rÃ¢le Ã©pais d\'un blessÃ© qu\'on oublie\r\nAu bord d\'un lac de sang, sous un grand tas de morts,\r\nEt qui meurt, sans bouger, dans d\'immenses efforts.', 13, 1, '2020-03-01 00:28:30', 'La cloche fÃ©lÃ©e'),
(9, 'PluviÃ´se, irritÃ© contre la ville entiÃ¨re,\r\nDe son urne Ã  grands flots verse un froid tÃ©nÃ©breux\r\nAux pÃ¢les habitants du voisin cimetiÃ¨re\r\nEt la mortalitÃ© sur les faubourgs brumeux.\r\n\r\nMon chat sur le carreau cherchant une litiÃ¨re\r\nAgite sans repos son corps maigre et galeux;\r\nL\'Ã¢me d\'un vieux poÃ¨te erre dans la gouttiÃ¨re\r\nAvec la triste voix d\'un fantÃ´me frileux.\r\n\r\nLe bourdon se lamente, et la bÃ»che enfumÃ©e\r\nAccompagne en fausset la pendule enrhumÃ©e,\r\nCependant qu\'en un jeu plein de sales parfums,\r\n\r\nHÃ©ritage fatal d\'une vieille hydropique,\r\nLe beau valet de cÅ“ur et la dame de pique\r\nCausent sinistrement de leurs amours dÃ©funts.', 13, 3, '2020-03-01 00:26:20', 'Spleen I'),
(7, 'Je suis belle, Ã´ mortels! comme un rÃªve de pierre,\r\nEt mon sein, oÃ¹ chacun s\'est meurtri tour Ã  tour,\r\nEst fait pour inspirer au poÃ¨te un amour\r\nEternel et muet ainsi que la matiÃ¨re.\r\n\r\nJe trÃ´ne dans l\'azur comme un sphinx incompris;\r\nJ\'unis un cÅ“ur de neige Ã  la blancheur des cygnes;\r\nJe hais le mouvement qui dÃ©place les lignes,\r\nEt jamais je ne pleure et jamais je ne ris.\r\n\r\nLes poÃ¨tes, devant mes grandes attitudes,\r\nQue j\'ai l\'air d\'emprunter aux plus fiers monuments,\r\nConsumeront leurs jours en d\'austÃ¨res Ã©tudes;\r\nCar j\'ai, pour fasciner ces dociles amants,\r\nDe purs miroirs qui font toutes choses plus belles:\r\nMes yeux, mes larges yeux aux clartÃ©s Ã©ternelles!', 13, 1, '2020-03-01 00:23:49', 'La beautÃ©e'),
(30, 'sdascdsxcdsdc', 14, 3, '2020-03-05 15:25:48', 'adwda'),
(23, 'La Nature est un temple oÃ¹ de vivants piliers\r\nLaissent parfois sortir de confuses paroles;\r\nL\'homme y passe Ã  travers des forÃªts de symboles\r\nQui l\'observent avec des regards familiers.\r\n\r\nComme de longs Ã©chos qui de loin se confondent\r\nDans une tÃ©nÃ©breuse et profonde unitÃ©,\r\nVaste comme la nuit et comme la clartÃ©,\r\nLes parfums, les couleurs et les sons se rÃ©pondent.\r\n\r\nIl est des parfums frais comme des chairs d\'enfants,\r\nDoux comme les hautbois, verts comme les prairies,\r\n- Et d\'autres, corrompus, riches et triomphants,\r\nAyant l\'expansion des choses infinies,\r\nComme l\'ambre, le musc, le benjoin et l\'encens\r\nQui chantent les transports de l\'esprit et des sens.', 13, 4, '2020-03-01 15:16:48', 'Correspondance'),
(24, 'Au-dessus des Ã©tangs, au-dessus des vallÃ©es,\r\nDes montagnes, des bois, des nuages, des mers,\r\nPar delÃ  le soleil, par delÃ  les Ã©thers,\r\nPar delÃ  les confins des sphÃ¨res Ã©toilÃ©es,\r\n\r\nMon esprit, tu te meus avec agilitÃ©,\r\nEt, comme un bon nageur qui se pÃ¢me dans l\'onde,\r\nTu sillonnes gaiement l\'immensitÃ© profonde\r\nAvec une indicible et mÃ¢le voluptÃ©.\r\n\r\nEnvole-toi bien loin de ces miasmes morbides;\r\nVa te purifier dans l\'air supÃ©rieur,\r\nEt bois, comme une pure et divine liqueur,\r\nLe feu clair qui remplit les espaces limpides.\r\n\r\nDerriÃ¨re les ennuis et les vastes chagrins\r\nQui chargent de leur poids l\'existence brumeuse,\r\nHeureux celui qui peut d\'une aile vigoureuse\r\nS\'Ã©lancer vers les champs lumineux et sereins;\r\n\r\nCelui dont les pensers, comme des alouettes,\r\nVers les cieux le matin prennent un libre essor,\r\n- Qui plane sur la vie, et comprend sans effort\r\nLe langage des fleurs et des choses muettes!', 13, 3, '2020-03-13 14:15:00', 'ElÃ©vation'),
(25, 'Je suis comme le roi d\'un pays pluvieux,\r\nRiche, mais impuissant, jeune et pourtant trÃ¨s-vieux,\r\nQui, de ses prÃ©cepteurs mÃ©prisant les courbettes,\r\nS\'ennuie avec ses chiens comme avec d\'autres bÃªtes.\r\nRien ne peut l\'Ã©gayer, ni gibier, ni faucon,\r\nNi son peuple mourant en face du balcon.\r\nDu bouffon favori la grotesque ballade\r\nNe distrait plus le front de ce cruel malade;\r\nSon lit fleurdelisÃ© se transforme en tombeau,\r\nEt les dames d\'atour, pour qui tout prince est beau,\r\nNe savent plus trouver d\'impudique toilette\r\nPour tirer un souris de ce jeune squelette.\r\nLe savant qui lui fait de l\'or n\'a jamais pu\r\nDe son Ãªtre extirper l\'Ã©lÃ©ment corrompu,\r\nEt dans ces bains de sang qui des Romains nous viennent,\r\nEt dont sur leurs vieux jours les puissants se souviennent,\r\nIl n\'a su rÃ©chauffer ce cadavre hÃ©bÃ©tÃ©\r\nOÃ¹ coule au lieu de sang l\'eau verte du LÃ©thÃ©.', 13, 5, '2020-03-01 15:19:52', 'Spleen III'),
(26, 'Quand le ciel bas et lourd pÃ¨se comme un couvercle\r\nSur l\'esprit gÃ©missant en proie aux longs ennuis,\r\nEt que de l\'horizon embrassant tout le cercle\r\nIl nous verse un jour noir plus triste que les nuits;\r\n\r\nQuand la terre est changÃ©e en un cachot humide,\r\nOÃ¹ l\'EspÃ©rance, comme une chauve-souris,\r\nS\'en va battant les murs de son aile timide\r\nEt se cognant la tÃªte Ã  des plafonds pourris;\r\n\r\nQuand la pluie Ã©talant ses immenses traÃ®nÃ©es\r\nD\'une vaste prison imite les barreaux,\r\nEt qu\'un peuple muet d\'infÃ¢mes araignÃ©es\r\nVient tendre ses filets au fond de nos cerveaux,\r\n\r\nDes cloches tout Ã  coup sautent avec furie\r\nEt lancent vers le ciel un affreux hurlement,\r\nAinsi que des esprits errants et sans patrie\r\nQui se mettent Ã  geindre opiniÃ¢trement.\r\n\r\n- Et de longs corbillards, sans tambours ni musique,\r\nDÃ©filent lentement dans mon Ã¢me; l\'Espoir,\r\nVaincu, pleure, et l\'Angoisse atroce, despotique,\r\nSur mon crÃ¢ne inclinÃ© plante son drapeau noir.', 13, 5, '2020-02-29 11:12:00', 'Spleen IV'),
(29, 'O toison, moutonnant jusque sur l\'encolure!\r\nO boucles! O parfum chargÃ© de nonchaloir!\r\nExtase! Pour peupler ce soir l\'alcÃ´ve obscure\r\nDes souvenirs dormant dans cette chevelure,\r\nJe la veux agiter dans l\'air comme un mouchoir!\r\n\r\nLa langoureuse Asie et la brÃ»lante Afrique,\r\nTout un monde lointain, absent, presque dÃ©funt,\r\nVit dans les profondeurs, forÃªt aromatique!\r\nComme d\'autres esprits voguent sur la musique,\r\nLe mien, Ã´ mon amour! nage sur ton parfum.\r\nJ\'irai lÃ -bas oÃ¹ l\'arbre et l\'homme, pleins de sÃ¨ve,\r\nSe pÃ¢ment longuement sous l\'ardeur des climats;\r\nFortes tresses, soyez la houle qui m\'enlÃ¨ve!\r\nTu contiens, mer d\'Ã©bÃ¨ne, un Ã©blouissant rÃªve\r\nDe voiles, de rameurs, de flammes et de mÃ¢ts:\r\n\r\nUn port retentissant oÃ¹ mon Ã¢me peut boire\r\nA grands flots le parfum, le son et la couleur;\r\nOÃ¹ les vaisseaux, glissant dans l\'or et dans la moire,\r\nOuvrent leurs vastes bras pour embrasser la gloire\r\nD\'un ciel pur oÃ¹ frÃ©mit l\'Ã©ternelle chaleur.\r\n\r\nJe plongerai ma tÃªte amoureuse d\'ivresse\r\nDans ce noir ocÃ©an oÃ¹ l\'autre est enfermÃ©;\r\nEt mon esprit subtil que le roulis caresse\r\nSaura vous retrouver, Ã´ fÃ©conde paresse!\r\nInfinis bercements du loisir embaumÃ©!\r\n\r\nCheveux bleus, pavillon de tÃ©nÃ¨bres tendues,\r\nVous me rendez l\'azur du ciel immense et rond;\r\nSur les bords duvetÃ©s de vos mÃ¨ches tordues\r\nJe m\'enivre ardemment des senteurs confondues\r\nDe l\'huile de coco, du musc et du goudron.\r\n\r\nLongtemps! toujours! ma main dans ta criniÃ¨re lourde\r\nSÃ¨mera le rubis, la perle et le saphir,\r\nAfin qu\'Ã  mon dÃ©sir tu ne sois jamais sourde!\r\nN\'es-tu pas l\'oasis oÃ¹ je rÃªve, et la gourde\r\nOÃ¹ je hume Ã  longs traits le vin du souvenir?', 13, 16, '2020-03-05 15:14:30', 'La chevelure');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(16, 'Romantique'),
(3, 'Futuriste'),
(4, 'Metaphysique'),
(5, 'Inconcevable'),
(6, 'Langues mortes'),
(12, 'ExpÃ©rimental'),
(15, 'DÃ©passÃ©'),
(14, 'Renaissance');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'A quel age a t\'il écrit tout ca ?', 9, 13, '2020-03-04 10:19:14'),
(2, 'La joie des souvenires d\'hivers', 11, 13, '2020-03-04 10:38:58'),
(4, 'Je ;laisse un commentaire', 8, 13, '2020-03-04 12:47:16');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateurs'),
(42, 'moderateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`, `avatar`) VALUES
(1, 'Le lion du Roi de la jungle', 'trahi', 'trahi@email.yahoo.com', 1, 'Images/avatars/1.png'),
(2, 'le malfrat du roi des rats', 'grouik', 'grouik@email.com', 1337, 'Images/avatars/2.png'),
(3, 'Le lanceur  pot de fleur', 'J\'adore', 'monEmail@email.com', 42, 'Images/avatars/3.png'),
(4, 'La chanteuse de loire et meuse', 'Lalalalaaaa', 'Lalala@monem;ail.mail', 42, 'Images/avatars/4.png'),
(5, 'Azefortwo', '$2y$10$jtPF08e/hDz0iAs4l2Qsee6d3ePUgv0bKK.5NGMKSNUHTLiTXGCYS', 'Azefortwo@protonmail.com', 1337, 'Images/avatars/5.png'),
(13, 'admin', '$2y$10$4SLN6Z3eamYUZlBlidiSsOWlQnMd/m6FkaJDDWZFFG/N9Z6.JwmgW', 'admin', 1337, 'Images/avatars/6.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
