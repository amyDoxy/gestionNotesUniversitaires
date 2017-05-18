-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 23 Mars 2017 à 06:54
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Gestion_Notes`
--

-- --------------------------------------------------------

--
-- Structure de la table `udm_administrateur_systeme`
--

CREATE TABLE `udm_administrateur_systeme` (
  `id_administrateur_systeme` int(11) NOT NULL,
  `username` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_administrateur_systeme`
--

INSERT INTO `udm_administrateur_systeme` (`id_administrateur_systeme`, `username`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `UDM_batch_module`
--

CREATE TABLE `UDM_batch_module` (
  `id_batch_module` int(11) NOT NULL,
  `nombre_etudiant` int(11) DEFAULT NULL,
  `coeff_module` float(4,2) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `batch` varchar(50) DEFAULT NULL,
  `id_dispensateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `UDM_batch_module`
--

INSERT INTO `UDM_batch_module` (`id_batch_module`, `nombre_etudiant`, `coeff_module`, `id_module`, `batch`, `id_dispensateur`) VALUES
(1, 25, 1.75, 4, 'finance_08_15_01', 2),
(2, 8, 2.50, 1, 'appliedcs_08_15_01', 1),
(3, 15, 3.50, 3, 'finance_08_14_01', 1),
(4, 12, 1.25, 5, 'finance_08_15_01', 2),
(5, 20, 2.00, 5, 'finance_08_15_02', 2),
(6, 7, 2.00, 2, 'appliedcs_08_15_01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `udm_chef_de_departement`
--

CREATE TABLE `udm_chef_de_departement` (
  `id_chef_de_departement` int(11) NOT NULL,
  `id_professeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_chef_de_departement`
--

INSERT INTO `udm_chef_de_departement` (`id_chef_de_departement`, `id_professeur`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `udm_countries`
--

CREATE TABLE `udm_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_countries`
--

INSERT INTO `udm_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People''s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People''s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Structure de la table `udm_departement`
--

CREATE TABLE `udm_departement` (
  `id_departement` int(11) NOT NULL,
  `nom_departement` varchar(100) DEFAULT NULL,
  `faculte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_departement`
--

INSERT INTO `udm_departement` (`id_departement`, `nom_departement`, `faculte`) VALUES
(2, 'Human Resource Management ', 1),
(3, 'Marketing', 1),
(4, 'Banking and Financial Services', 1),
(5, 'Accounting and Finance ', 1),
(6, 'Investment Analysis ', 1),
(7, 'Software Engineering ', 2),
(8, 'Applied Computer Science ', 2),
(9, 'Networking and Database', 2),
(10, 'Web and Multimedia', 2),
(11, 'Electromechanical and Automation Engineering', 3),
(12, ' Civil Engineering ', 3),
(13, 'Electrical Engineering and Automation ', 3),
(14, 'Facilities Management of Hotels and Real Estates \r\n', 3),
(15, 'Electrotechnics and Renewable Energy', 3),
(16, 'Facilities Management of Hotels and Real Estates ', 3),
(17, 'Maintenance, Diagnosis and Rehabilitation of Built Civil Engineering Heritage', 3);

-- --------------------------------------------------------

--
-- Structure de la table `UDM_etudiant`
--

CREATE TABLE `UDM_etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `type` enum('temps plein','temps partiel') DEFAULT NULL,
  `universitaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `UDM_etudiant`
--

INSERT INTO `UDM_etudiant` (`id_etudiant`, `type`, `universitaire`) VALUES
(1, 'temps plein', 14);

-- --------------------------------------------------------

--
-- Structure de la table `UDM_evaluation`
--

CREATE TABLE `UDM_evaluation` (
  `id_evaluation` int(11) NOT NULL,
  `libelle_evaluation` varchar(50) DEFAULT NULL,
  `coeff_evaluation` float(4,2) DEFAULT NULL,
  `cotation_evaluation` int(10) UNSIGNED NOT NULL,
  `date_evaluation` datetime DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `type_eval` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `UDM_evaluation`
--

INSERT INTO `UDM_evaluation` (`id_evaluation`, `libelle_evaluation`, `coeff_evaluation`, `cotation_evaluation`, `date_evaluation`, `id_module`, `type_eval`) VALUES
(1, 'TD1', 1.50, 40, '2017-03-23 00:00:00', 6, 'TD'),
(30, 'TD-Calculus 1', 2.00, 10, '0000-00-00 00:00:00', 1, 'TD'),
(40, 'DS SE 1', 2.00, 15, '2017-04-17 00:00:00', NULL, 'DS'),
(41, 'DS SE 1', 2.00, 15, '2017-04-17 00:00:00', NULL, 'DS'),
(42, 'DS SE 1', 2.00, 15, '2017-04-17 00:00:00', NULL, 'DS');

-- --------------------------------------------------------

--
-- Structure de la table `udm_faculte`
--

CREATE TABLE `udm_faculte` (
  `id_faculte` int(11) NOT NULL,
  `nom_faculte` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_faculte`
--

INSERT INTO `udm_faculte` (`id_faculte`, `nom_faculte`) VALUES
(1, 'Faculte de Business et de Gestion'),
(2, 'Faculte des technologies de l information et de communication'),
(3, 'Faculte de developpement durable et d ingeniorat');

-- --------------------------------------------------------

--
-- Structure de la table `udm_infosutilisateur`
--

CREATE TABLE `udm_infosutilisateur` (
  `id_infosUtilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(30) DEFAULT NULL,
  `prenom_utilisateur` varchar(30) DEFAULT NULL,
  `deuxieme_prenom_utilisateur` varchar(30) DEFAULT NULL,
  `email_utilisateur` varchar(255) DEFAULT NULL,
  `statut` int(11) NOT NULL,
  `num_telephone` varchar(20) DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `pays_origine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_infosutilisateur`
--

INSERT INTO `udm_infosutilisateur` (`id_infosUtilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `deuxieme_prenom_utilisateur`, `email_utilisateur`, `statut`, `num_telephone`, `adresse`, `ville`, `region`, `pays_origine`) VALUES
(3, 'admin', 'admin', '', 'admin@gmail.com', 5, '0123456', 'ABCDE', 'FGH', 5, 140),
(4, 'Muhimpundu', 'Amy', 'Doxy', 'amydoxy@udm.ac.mu', 1, '5702343245', 'Rue B', 'Ville A', 6, 35),
(6, 'Mootoo', 'Albert', 'Noel', 'albert.noel@udm.ac.mu', 2, '8931', 'Rue X', 'Ville B', 2, 140),
(7, 'LeGrand', 'Norbert', NULL, 'norbert.legrand@udm.ac.mu', 3, '72398', 'Rue C', 'Ville Z', 5, 140),
(10, 'Rolley', 'Annie', NULL, 'annie.rolley@udm.ac.mu', 4, '35478', 'Rue s', 'Ville M', 7, 140);

-- --------------------------------------------------------

--
-- Structure de la table `udm_module`
--

CREATE TABLE `udm_module` (
  `id_module` int(11) NOT NULL,
  `libelle_module` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_module`
--

INSERT INTO `udm_module` (`id_module`, `libelle_module`) VALUES
(1, 'Systeme d''exploitation'),
(2, 'Algebre lineaire'),
(3, 'Macroeconomics'),
(4, 'Calculus and Optimisation'),
(5, 'Probability and Probability Distributions');

-- --------------------------------------------------------

--
-- Structure de la table `udm_notes`
--

CREATE TABLE `udm_notes` (
  `id_notes` int(11) NOT NULL,
  `points` float(6,2) UNSIGNED DEFAULT NULL,
  `id_evaluation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `udm_professeur`
--

CREATE TABLE `udm_professeur` (
  `id_professeur` int(11) NOT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `specialite` varchar(50) DEFAULT NULL,
  `universitaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_professeur`
--

INSERT INTO `udm_professeur` (`id_professeur`, `grade`, `specialite`, `universitaire`) VALUES
(1, 'PhD', 'Financial Services', 15),
(2, 'M2', 'Banking', 13);

-- --------------------------------------------------------

--
-- Structure de la table `udm_profileUtilisateur`
--

CREATE TABLE `udm_profileUtilisateur` (
  `username` char(10) NOT NULL,
  `motDePasse` varchar(32) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `id_infosUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_profileUtilisateur`
--

INSERT INTO `udm_profileUtilisateur` (`username`, `motDePasse`, `active`, `id_infosUtilisateur`) VALUES
('admin', 'c93ccd78b2076528346216b3b2f701e6', 1, 3),
('albertnoel', '2a420861a8927df7ac3d3f0ccd00166a', 1, 6),
('amy', '005b0dcf5d01311dbfae314cc8f6a10f', 1, 4),
('annie', '387257245b4854224db641688729090f', 0, 10),
('norbert', 'f36ccab6a663e5e045ae3b4b8c11fd1d', 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `UDM_programme`
--

CREATE TABLE `UDM_programme` (
  `id_programme` int(11) NOT NULL,
  `intitule_programme` varchar(100) DEFAULT NULL,
  `cursus` varchar(30) DEFAULT NULL,
  `titre` varchar(30) DEFAULT NULL,
  `dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `UDM_programme`
--

INSERT INTO `UDM_programme` (`id_programme`, `intitule_programme`, `cursus`, `titre`, `dept`) VALUES
(1, 'Civil Engineering', 'licence', 'BEng.', 12),
(2, 'Civil Engineering', 'licence', 'BSc.', 12);

-- --------------------------------------------------------

--
-- Structure de la table `udm_region`
--

CREATE TABLE `udm_region` (
  `id_region` int(11) NOT NULL,
  `region_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_region`
--

INSERT INTO `udm_region` (`id_region`, `region_name`) VALUES
(1, 'Rivière Noire'),
(2, 'Flacq'),
(3, 'Grand Port'),
(4, 'Moka'),
(5, 'Pamplemousses'),
(6, 'Plaines Wilhems'),
(7, 'Port Louis'),
(8, 'Rivière du Rempart'),
(9, 'Savanne'),
(10, 'Rodrigues');

-- --------------------------------------------------------

--
-- Structure de la table `udm_secretaire`
--

CREATE TABLE `udm_secretaire` (
  `id_secretaire` int(11) NOT NULL,
  `username` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_secretaire`
--

INSERT INTO `udm_secretaire` (`id_secretaire`, `username`) VALUES
(1, 'annie');

-- --------------------------------------------------------

--
-- Structure de la table `UDM_semestre`
--

CREATE TABLE `UDM_semestre` (
  `id_semestre` varchar(10) NOT NULL,
  `libelle_semestre` varchar(100) DEFAULT NULL,
  `annee` date DEFAULT NULL,
  `programme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `udm_statut`
--

CREATE TABLE `udm_statut` (
  `id_statut` int(11) NOT NULL,
  `libelle_statut` enum('etudiant','professeur','chef de departement','secretaire','admin','autre') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_statut`
--

INSERT INTO `udm_statut` (`id_statut`, `libelle_statut`) VALUES
(1, 'etudiant'),
(2, 'professeur'),
(3, 'chef de departement'),
(4, 'secretaire'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `UDM_type_evaluation`
--

CREATE TABLE `UDM_type_evaluation` (
  `type_code` varchar(4) NOT NULL,
  `nom_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `UDM_type_evaluation`
--

INSERT INTO `UDM_type_evaluation` (`type_code`, `nom_type`) VALUES
('DS', 'Devoir surveille'),
('TD', 'Travail dirige'),
('TP', 'Travail Pratique');

-- --------------------------------------------------------

--
-- Structure de la table `udm_universitaire`
--

CREATE TABLE `udm_universitaire` (
  `id_universitaire` int(11) NOT NULL,
  `username` char(10) DEFAULT NULL,
  `departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `udm_universitaire`
--

INSERT INTO `udm_universitaire` (`id_universitaire`, `username`, `departement`) VALUES
(13, 'albertnoel', 4),
(14, 'amy', 4),
(15, 'norbert', 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `udm_administrateur_systeme`
--
ALTER TABLE `udm_administrateur_systeme`
  ADD PRIMARY KEY (`id_administrateur_systeme`),
  ADD KEY `username` (`username`);

--
-- Index pour la table `UDM_batch_module`
--
ALTER TABLE `UDM_batch_module`
  ADD PRIMARY KEY (`id_batch_module`),
  ADD KEY `batch` (`batch`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_dispensateur` (`id_dispensateur`);

--
-- Index pour la table `udm_chef_de_departement`
--
ALTER TABLE `udm_chef_de_departement`
  ADD PRIMARY KEY (`id_chef_de_departement`),
  ADD KEY `id_professeur` (`id_professeur`);

--
-- Index pour la table `udm_countries`
--
ALTER TABLE `udm_countries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `udm_departement`
--
ALTER TABLE `udm_departement`
  ADD PRIMARY KEY (`id_departement`),
  ADD KEY `faculte` (`faculte`);

--
-- Index pour la table `UDM_etudiant`
--
ALTER TABLE `UDM_etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `universitaire` (`universitaire`);

--
-- Index pour la table `UDM_evaluation`
--
ALTER TABLE `UDM_evaluation`
  ADD PRIMARY KEY (`id_evaluation`),
  ADD KEY `id_cours` (`id_module`),
  ADD KEY `udm_evaluation_ibfk_2` (`type_eval`);

--
-- Index pour la table `udm_faculte`
--
ALTER TABLE `udm_faculte`
  ADD PRIMARY KEY (`id_faculte`);

--
-- Index pour la table `udm_infosutilisateur`
--
ALTER TABLE `udm_infosutilisateur`
  ADD PRIMARY KEY (`id_infosUtilisateur`),
  ADD KEY `statut` (`statut`),
  ADD KEY `region` (`region`),
  ADD KEY `pays_origine` (`pays_origine`);

--
-- Index pour la table `udm_module`
--
ALTER TABLE `udm_module`
  ADD PRIMARY KEY (`id_module`);

--
-- Index pour la table `udm_notes`
--
ALTER TABLE `udm_notes`
  ADD PRIMARY KEY (`id_notes`),
  ADD KEY `id_evaluation` (`id_evaluation`);

--
-- Index pour la table `udm_professeur`
--
ALTER TABLE `udm_professeur`
  ADD PRIMARY KEY (`id_professeur`),
  ADD KEY `universitaire` (`universitaire`);

--
-- Index pour la table `udm_profileUtilisateur`
--
ALTER TABLE `udm_profileUtilisateur`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_infosUtilisateur` (`id_infosUtilisateur`);

--
-- Index pour la table `UDM_programme`
--
ALTER TABLE `UDM_programme`
  ADD PRIMARY KEY (`id_programme`),
  ADD KEY `dept` (`dept`);

--
-- Index pour la table `udm_region`
--
ALTER TABLE `udm_region`
  ADD PRIMARY KEY (`id_region`);

--
-- Index pour la table `udm_secretaire`
--
ALTER TABLE `udm_secretaire`
  ADD PRIMARY KEY (`id_secretaire`),
  ADD KEY `username` (`username`);

--
-- Index pour la table `UDM_semestre`
--
ALTER TABLE `UDM_semestre`
  ADD PRIMARY KEY (`id_semestre`),
  ADD KEY `programme` (`programme`);

--
-- Index pour la table `udm_statut`
--
ALTER TABLE `udm_statut`
  ADD PRIMARY KEY (`id_statut`);

--
-- Index pour la table `UDM_type_evaluation`
--
ALTER TABLE `UDM_type_evaluation`
  ADD PRIMARY KEY (`type_code`);

--
-- Index pour la table `udm_universitaire`
--
ALTER TABLE `udm_universitaire`
  ADD PRIMARY KEY (`id_universitaire`),
  ADD KEY `departement` (`departement`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `udm_administrateur_systeme`
--
ALTER TABLE `udm_administrateur_systeme`
  MODIFY `id_administrateur_systeme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `UDM_batch_module`
--
ALTER TABLE `UDM_batch_module`
  MODIFY `id_batch_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `udm_chef_de_departement`
--
ALTER TABLE `udm_chef_de_departement`
  MODIFY `id_chef_de_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `udm_countries`
--
ALTER TABLE `udm_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT pour la table `udm_departement`
--
ALTER TABLE `udm_departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `UDM_etudiant`
--
ALTER TABLE `UDM_etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `UDM_evaluation`
--
ALTER TABLE `UDM_evaluation`
  MODIFY `id_evaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `udm_faculte`
--
ALTER TABLE `udm_faculte`
  MODIFY `id_faculte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `udm_infosutilisateur`
--
ALTER TABLE `udm_infosutilisateur`
  MODIFY `id_infosUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `udm_module`
--
ALTER TABLE `udm_module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `udm_notes`
--
ALTER TABLE `udm_notes`
  MODIFY `id_notes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `udm_professeur`
--
ALTER TABLE `udm_professeur`
  MODIFY `id_professeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `UDM_programme`
--
ALTER TABLE `UDM_programme`
  MODIFY `id_programme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `udm_region`
--
ALTER TABLE `udm_region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `udm_secretaire`
--
ALTER TABLE `udm_secretaire`
  MODIFY `id_secretaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `udm_statut`
--
ALTER TABLE `udm_statut`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `udm_universitaire`
--
ALTER TABLE `udm_universitaire`
  MODIFY `id_universitaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `udm_administrateur_systeme`
--
ALTER TABLE `udm_administrateur_systeme`
  ADD CONSTRAINT `udm_administrateur_systeme_ibfk_1` FOREIGN KEY (`username`) REFERENCES `udm_profileutilisateur` (`username`);

--
-- Contraintes pour la table `UDM_batch_module`
--
ALTER TABLE `UDM_batch_module`
  ADD CONSTRAINT `udm_batch_module_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `UDM_module` (`id_module`),
  ADD CONSTRAINT `udm_batch_module_ibfk_3` FOREIGN KEY (`id_dispensateur`) REFERENCES `udm_professeur` (`id_professeur`);

--
-- Contraintes pour la table `udm_chef_de_departement`
--
ALTER TABLE `udm_chef_de_departement`
  ADD CONSTRAINT `udm_chef_de_departement_ibfk_1` FOREIGN KEY (`id_professeur`) REFERENCES `udm_professeur` (`id_professeur`);

--
-- Contraintes pour la table `udm_departement`
--
ALTER TABLE `udm_departement`
  ADD CONSTRAINT `udm_departement_ibfk_1` FOREIGN KEY (`faculte`) REFERENCES `udm_faculte` (`id_faculte`);

--
-- Contraintes pour la table `UDM_etudiant`
--
ALTER TABLE `UDM_etudiant`
  ADD CONSTRAINT `udm_etudiant_ibfk_1` FOREIGN KEY (`universitaire`) REFERENCES `udm_universitaire` (`id_universitaire`);

--
-- Contraintes pour la table `UDM_evaluation`
--
ALTER TABLE `UDM_evaluation`
  ADD CONSTRAINT `udm_evaluation_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `UDM_batch_module` (`id_batch_module`),
  ADD CONSTRAINT `udm_evaluation_ibfk_2` FOREIGN KEY (`type_eval`) REFERENCES `UDM_type_evaluation` (`type_code`);

--
-- Contraintes pour la table `udm_infosutilisateur`
--
ALTER TABLE `udm_infosutilisateur`
  ADD CONSTRAINT `udm_infosutilisateur_ibfk_1` FOREIGN KEY (`statut`) REFERENCES `udm_statut` (`id_statut`),
  ADD CONSTRAINT `udm_infosutilisateur_ibfk_2` FOREIGN KEY (`region`) REFERENCES `udm_region` (`id_region`),
  ADD CONSTRAINT `udm_infosutilisateur_ibfk_3` FOREIGN KEY (`pays_origine`) REFERENCES `udm_countries` (`id`);

--
-- Contraintes pour la table `udm_notes`
--
ALTER TABLE `udm_notes`
  ADD CONSTRAINT `udm_notes_ibfk_1` FOREIGN KEY (`id_evaluation`) REFERENCES `udm_evaluation` (`id_evaluation`);

--
-- Contraintes pour la table `udm_professeur`
--
ALTER TABLE `udm_professeur`
  ADD CONSTRAINT `udm_professeur_ibfk_1` FOREIGN KEY (`universitaire`) REFERENCES `udm_universitaire` (`id_universitaire`);

--
-- Contraintes pour la table `udm_profileUtilisateur`
--
ALTER TABLE `udm_profileUtilisateur`
  ADD CONSTRAINT `udm_profileutilisateur_ibfk_1` FOREIGN KEY (`id_infosUtilisateur`) REFERENCES `udm_infosutilisateur` (`id_infosUtilisateur`);

--
-- Contraintes pour la table `UDM_programme`
--
ALTER TABLE `UDM_programme`
  ADD CONSTRAINT `udm_programme_ibfk_1` FOREIGN KEY (`dept`) REFERENCES `udm_departement` (`id_departement`);

--
-- Contraintes pour la table `udm_secretaire`
--
ALTER TABLE `udm_secretaire`
  ADD CONSTRAINT `udm_secretaire_ibfk_1` FOREIGN KEY (`username`) REFERENCES `udm_profileUtilisateur` (`username`);

--
-- Contraintes pour la table `UDM_semestre`
--
ALTER TABLE `UDM_semestre`
  ADD CONSTRAINT `udm_semestre_ibfk_1` FOREIGN KEY (`programme`) REFERENCES `UDM_programme` (`id_programme`);

--
-- Contraintes pour la table `udm_universitaire`
--
ALTER TABLE `udm_universitaire`
  ADD CONSTRAINT `udm_universitaire_ibfk_1` FOREIGN KEY (`departement`) REFERENCES `udm_departement` (`id_departement`),
  ADD CONSTRAINT `udm_universitaire_ibfk_2` FOREIGN KEY (`username`) REFERENCES `udm_profileutilisateur` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
