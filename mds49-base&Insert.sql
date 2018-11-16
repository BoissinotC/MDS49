DROP DATABASE IF EXISTS MDS49;
CREATE DATABASE IF NOT EXISTS MDS49;
USE MDS49; 
--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `idActivite` int(5) NOT NULL,
  `libelleActivite` char(32) NOT NULL,
  PRIMARY KEY (`idActivite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`idActivite`, `libelleActivite`) VALUES
(1, 'FOOTBALL'),
(2, 'NATATION'),
(3, 'KARATE'),
(4, 'HANDBALL'),
(5, 'BASKET'),
(6, 'GYMNASTIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `idClub` int(3) NOT NULL,
  `nomClub` char(32) NOT NULL,
  `adresseClub` char(40) NOT NULL,
  `idVille` int(3) NOT NULL,
  PRIMARY KEY (`idClub`),
  KEY `club_ville` (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`idClub`, `nomClub`, `adresseClub`, `idVille`) VALUES
(1, 'Foot formation', '3 rue des pruneaux', 1),
(2, 'K-sports', '5 boulevard des oranges', 2),
(3, 'Aquasport', '6 rue des carottes', 3),
(4, 'Club des cactus', '7 avenue des chiens', 4);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `IDINSCRIT` int(5) NOT NULL,
  `MDPMD5` varchar(32) NOT NULL,
  PRIMARY KEY (`IDINSCRIT`),
  KEY `I_FK_COMPTE_INSCRITS` (`IDINSCRIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `idJury` int(2) NOT NULL,
  `IDINSCRIT` int(3) NOT NULL,
  `RESULTEVAL` char(32) NOT NULL,
  PRIMARY KEY (`idJury`,`IDINSCRIT`),
  KEY `I_FK_EVALUATION_JURY` (`idJury`),
  KEY `I_FK_EVALUATION_INSCRITS` (`IDINSCRIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`idJury`, `IDINSCRIT`, `RESULTEVAL`) VALUES
(1, 1, 'FAVORABLE'),
(2, 3, 'ECHOUE'),
(3, 4, 'ECHOUE'),
(4, 5, 'FAVORABLE'),
(5, 2, 'FAVORABLE');

-- --------------------------------------------------------

--
-- Structure de la table `expeassos`
--

DROP TABLE IF EXISTS `expeassos`;
CREATE TABLE IF NOT EXISTS `expeassos` (
  `idExpe` int(3) NOT NULL,
  `membreComiteDirecteur` char(1) NOT NULL,
  `membreEquipeTech` char(1) NOT NULL,
  `faireAnimJeune` char(1) NOT NULL,
  `detailsOuiAnim` char(100) DEFAULT NULL,
  `participeOrgaClub` char(1) NOT NULL,
  `detailsOrgaClub` char(100) DEFAULT NULL,
  PRIMARY KEY (`idExpe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `expeassos`
--

INSERT INTO `expeassos` (`idExpe`, `membreComiteDirecteur`, `membreEquipeTech`, `faireAnimJeune`, `detailsOuiAnim`, `participeOrgaClub`, `detailsOrgaClub`) VALUES
(1, 'O', 'N', 'N', '', 'N', ''),
(2, 'N', 'O', 'O', 'Foot', 'N', ''),
(3, 'N', 'N', 'N', '', 'N', '');

-- --------------------------------------------------------

--
-- Structure de la table `faire`
--

DROP TABLE IF EXISTS `faire`;
CREATE TABLE IF NOT EXISTS `faire` (
  `idActivite` int(5) NOT NULL,
  `idIntervenant` int(3) NOT NULL,
  PRIMARY KEY (`idActivite`,`idIntervenant`),
  KEY `I_FK_FAIRE_ACTIVITE` (`idActivite`),
  KEY `I_FK_FAIRE_INTERVENANT` (`idIntervenant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faire`
--

INSERT INTO `faire` (`idActivite`, `idIntervenant`) VALUES
(1, 2),
(2, 5),
(3, 1),
(4, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `habiter`
--

DROP TABLE IF EXISTS `habiter`;
CREATE TABLE IF NOT EXISTS `habiter` (
  `IDINSCRIT` int(3) NOT NULL,
  `idVille` int(3) NOT NULL,
  PRIMARY KEY (`IDINSCRIT`,`idVille`),
  KEY `I_FK_HABITER_INSCRITS` (`IDINSCRIT`),
  KEY `I_FK_HABITER_VILLE` (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `habiter`
--

INSERT INTO `habiter` (`IDINSCRIT`, `idVille`) VALUES
(1, 2),
(2, 1),
(3, 5),
(4, 4),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

DROP TABLE IF EXISTS `horaire`;
CREATE TABLE IF NOT EXISTS `horaire` (
  `idActivite` int(5) NOT NULL,
  `idStage` int(2) NOT NULL,
  `HEUREDEBUT` time NOT NULL,
  `HEUREFIN` time NOT NULL,
  PRIMARY KEY (`idActivite`,`idStage`),
  KEY `I_FK_HORAIRE_ACTIVITE` (`idActivite`),
  KEY `I_FK_HORAIRE_STAGE` (`idStage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`idActivite`, `idStage`, `HEUREDEBUT`, `HEUREFIN`) VALUES
(1, 1, '12:25:00', '16:30:00'),
(2, 3, '14:00:00', '17:00:00'),
(3, 4, '15:30:25', '18:25:00'),
(4, 5, '10:00:00', '15:00:00'),
(5, 2, '15:00:00', '18:00:00'),
(6, 6, '08:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `idStage` int(2) NOT NULL,
  `IDINSCRIT` int(3) NOT NULL,
  PRIMARY KEY (`idStage`,`IDINSCRIT`),
  KEY `I_FK_INSCRIPTION_STAGE` (`idStage`),
  KEY `I_FK_INSCRIPTION_INSCRITS` (`IDINSCRIT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`idStage`, `IDINSCRIT`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

DROP TABLE IF EXISTS `inscrits`;
CREATE TABLE IF NOT EXISTS `inscrits` (
  `IDINSCRIT` int(5) NOT NULL,
  `idClub` int(3) NOT NULL,
  `idExpe` int(3) NOT NULL,
  `idTuteur` int(5) NOT NULL,
  `NOMINSCRIT` char(32) NOT NULL,
  `PRENOMINSCRIT` char(32) NOT NULL,
  `SEXE` char(1) NOT NULL,
  `ADRESSEINSCRIT` char(50) NOT NULL,
  `DATENAISSANCE` date NOT NULL,
  `TELPERSO` char(10) NOT NULL,
  `MAILPERSO` char(50) NOT NULL,
  `ETUDES` char(50) NOT NULL,
  `SPORTPRATIQUE` char(32) NOT NULL,
  `MOTIVINSCRIPTION` char(150) NOT NULL,
  PRIMARY KEY (`IDINSCRIT`),
  KEY `I_FK_INSCRITS_CLUB` (`idClub`),
  KEY `I_FK_INSCRITS_EXPEASSOS` (`idExpe`),
  KEY `I_FK_INSCRITS_TUTEUR` (`idTuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscrits`
--

INSERT INTO `inscrits` (`IDINSCRIT`, `idClub`, `idExpe`, `idTuteur`, `NOMINSCRIT`, `PRENOMINSCRIT`, `SEXE`, `ADRESSEINSCRIT`, `DATENAISSANCE`, `TELPERSO`, `MAILPERSO`, `ETUDES`, `SPORTPRATIQUE`, `MOTIVINSCRIPTION`) VALUES
(1, 1, 1, 1, 'Elhacoumo', 'Bastien', 'G', 'Avenue de la Lune', '1994-12-12', '0605040302', 'BastienCoulum@gmail.com', 'BAC S', 'Equitation', 'Passioné par le sport'),
(2, 2, 2, 2, 'Goulet', 'Hubert', 'G', 'Avenue du Papa', '1980-01-01', '0604080907', 'GouletHubert@gmail.com', 'BAC S', 'Golf', 'Passion pour le sport individuel'),
(3, 3, 3, 3, 'Melissandre', 'Jouet', 'F', 'Avenue du Tigre', '1990-11-01', '0606985907', 'MelissandreJouet@gmail.com', 'BAC ES', 'Natation', 'Passion pour les sports d\'eau'),
(4, 4, 3, 4, 'Pelouse', 'René', 'H', '6 rue des jardiniers', '2000-06-16', '0658764169', 'çapoussemal@gmail.com', 'Médecine', 'GYMNASTIQUE', 'Pour le travail'),
(5, 3, 2, 2, 'Paraskeva', 'Brenda', 'F', '6 rue des coquelicots', '1995-02-14', '0645987456', 'brendaparaskeva@gmail.com', 'Arts', 'EQUITATION', 'Trouver un copain');

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

DROP TABLE IF EXISTS `intervenant`;
CREATE TABLE IF NOT EXISTS `intervenant` (
  `idIntervenant` int(3) NOT NULL,
  `idSpe` int(2) NOT NULL,
  `nomIntervenant` char(32) NOT NULL,
  `prenomIntervenant` char(32) NOT NULL,
  `competence` char(32) DEFAULT NULL,
  `diplome` char(32) DEFAULT NULL,
  `coutHoraire` decimal(10,2) NOT NULL,
  `rolesABIC` char(1) NOT NULL,
  PRIMARY KEY (`idIntervenant`),
  KEY `I_FK_INTERVENANT_SPECIALITE` (`idSpe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`idIntervenant`, `idSpe`, `nomIntervenant`, `prenomIntervenant`, `competence`, `diplome`, `coutHoraire`, `rolesABIC`) VALUES
(1, 1, 'Kou', 'Jean-Claude', 'Professionnel', 'BAC ES', '10.00', 'A'),
(2, 2, 'Kante', 'Raphael', 'Professionnel', 'BAC S', '9.00', 'B'),
(3, 3, 'Fiche', 'Tyson', 'Professionnel', 'BAC ES', '11.00', 'I'),
(4, 4, 'De Colo', 'Louis', 'Professionnel', 'BAC L', '12.00', 'A'),
(5, 1, 'Dupont', 'Pierre', 'Professionnel', 'BAC S', '10.00', 'A');

-- --------------------------------------------------------

--
-- Structure de la table `juger`
--

DROP TABLE IF EXISTS `juger`;
CREATE TABLE IF NOT EXISTS `juger` (
  `idIntervenant` int(3) NOT NULL,
  `idJury` int(2) NOT NULL,
  PRIMARY KEY (`idIntervenant`,`idJury`),
  KEY `I_FK_JUGER_INTERVENANT` (`idIntervenant`),
  KEY `I_FK_JUGER_JURY` (`idJury`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `juger`
--

INSERT INTO `juger` (`idIntervenant`, `idJury`) VALUES
(1, 2),
(2, 1),
(3, 4),
(4, 5),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `jury`
--

DROP TABLE IF EXISTS `jury`;
CREATE TABLE IF NOT EXISTS `jury` (
  `idJury` int(2) NOT NULL,
  PRIMARY KEY (`idJury`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jury`
--

INSERT INTO `jury` (`idJury`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Structure de la table `lieuhebergement`
--

DROP TABLE IF EXISTS `lieuhebergement`;
CREATE TABLE IF NOT EXISTS `lieuhebergement` (
  `idHebergement` int(2) NOT NULL,
  `adresseHeber` char(32) NOT NULL,
  `codePostalHeber` char(5) NOT NULL,
  `nomHebergement` char(50) NOT NULL,
  `coutHeber` decimal(10,2) NOT NULL,
  `capaciteHeber` int(3) NOT NULL,
  PRIMARY KEY (`idHebergement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lieuhebergement`
--

INSERT INTO `lieuhebergement` (`idHebergement`, `adresseHeber`, `codePostalHeber`, `nomHebergement`, `coutHeber`, `capaciteHeber`) VALUES
(1, 'Avenue des Sables', '49300', 'Hotel Ibis Cholet', '57.00', 120),
(2, 'Rue de la POissonnerie', '49100', 'Hotel Ibis Angers Centre', '60.00', 210),
(3, '108 Boulevars Jourdan', '75014', 'Ideal Hotel Design', '49.00', 200),
(4, '4 rue Coutellerie', '13002', 'Residhotel Vieux Port', '43.00', 230),
(5, '18 rue Bellecoriedre', '69002', 'le Républik Hotel', '65.00', 250),
(6, '3 Allée Baco', '44000', 'Hotel Ibis Nantes Centre', '57.00', 170);

-- --------------------------------------------------------

--
-- Structure de la table `positionner`
--

DROP TABLE IF EXISTS `positionner`;
CREATE TABLE IF NOT EXISTS `positionner` (
  `idHebergement` int(2) NOT NULL,
  `idVille` int(3) NOT NULL,
  PRIMARY KEY (`idHebergement`,`idVille`),
  KEY `I_FK_POSITIONNER_LIEUHEBERGEMENT` (`idHebergement`),
  KEY `I_FK_POSITIONNER_VILLE` (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `positionner`
--

INSERT INTO `positionner` (`idHebergement`, `idVille`) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `idSpe` int(2) NOT NULL,
  `libelle` char(50) NOT NULL,
  PRIMARY KEY (`idSpe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`idSpe`, `libelle`) VALUES
(1, 'Formation Football'),
(2, 'Formation Basketball'),
(3, 'Formation Gymanastique'),
(4, 'Formation Handball');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `idStage` int(2) NOT NULL,
  `idHebergement` int(2) DEFAULT NULL,
  `annulation` char(1) NOT NULL,
  PRIMARY KEY (`idStage`),
  KEY `I_FK_STAGE_LIEUHEBERGEMENT` (`idHebergement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`idStage`, `idHebergement`, `annulation`) VALUES
(1, 1, 'O'),
(2, 2, 'N'),
(3, 3, 'N'),
(4, 4, 'O'),
(5, 5, 'O'),
(6, 6, 'O');

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

DROP TABLE IF EXISTS `tuteur`;
CREATE TABLE IF NOT EXISTS `tuteur` (
  `idTuteur` int(5) NOT NULL,
  `nomTuteur` char(32) NOT NULL,
  `prenomTuteur` char(32) NOT NULL,
  `formationTuteur` char(50) NOT NULL,
  `adresseTuteur` char(50) NOT NULL,
  PRIMARY KEY (`idTuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tuteur`
--

INSERT INTO `tuteur` (`idTuteur`, `nomTuteur`, `prenomTuteur`, `formationTuteur`, `adresseTuteur`) VALUES
(1, 'Jean', 'Louis', 'BLA', '33 rue de Oubliettes'),
(2, 'Fabrice', 'De La Montaginere', 'BLA', '35 rue de Loius'),
(3, 'Theo', 'Ricou', 'BLA', '25 rue National'),
(4, 'Loris', 'Bale', 'BLA', '5 rue de la Vendée');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int(3) NOT NULL,
  `nomVille` char(32) NOT NULL,
  `codePostalVille` char(5) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`idVille`, `nomVille`, `codePostalVille`) VALUES
(1, 'Cholet', '49300'),
(2, 'Angers', '49100'),
(3, 'Paris', '75000'),
(4, 'Marseille', '13000'),
(5, 'Lyon', '69000'),
(6, 'Nantes', '44000');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ville` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`IDINSCRIT`) REFERENCES `inscrits` (`IDINSCRIT`);

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`idJury`) REFERENCES `jury` (`idJury`),
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`IDINSCRIT`) REFERENCES `inscrits` (`IDINSCRIT`);

--
-- Contraintes pour la table `faire`
--
ALTER TABLE `faire`
  ADD CONSTRAINT `faire_ibfk_1` FOREIGN KEY (`idActivite`) REFERENCES `activite` (`idActivite`),
  ADD CONSTRAINT `faire_ibfk_2` FOREIGN KEY (`idIntervenant`) REFERENCES `intervenant` (`idIntervenant`);

--
-- Contraintes pour la table `habiter`
--
ALTER TABLE `habiter`
  ADD CONSTRAINT `habiter_ibfk_1` FOREIGN KEY (`IDINSCRIT`) REFERENCES `inscrits` (`IDINSCRIT`),
  ADD CONSTRAINT `habiter_ibfk_2` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `horaire_ibfk_1` FOREIGN KEY (`idActivite`) REFERENCES `activite` (`idActivite`),
  ADD CONSTRAINT `horaire_ibfk_2` FOREIGN KEY (`idStage`) REFERENCES `stage` (`idStage`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`idStage`) REFERENCES `stage` (`idStage`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`IDINSCRIT`) REFERENCES `inscrits` (`IDINSCRIT`);

--
-- Contraintes pour la table `inscrits`
--
ALTER TABLE `inscrits`
  ADD CONSTRAINT `inscrits_ibfk_1` FOREIGN KEY (`idClub`) REFERENCES `club` (`idClub`),
  ADD CONSTRAINT `inscrits_ibfk_2` FOREIGN KEY (`idExpe`) REFERENCES `expeassos` (`idExpe`),
  ADD CONSTRAINT `inscrits_ibfk_3` FOREIGN KEY (`idTuteur`) REFERENCES `tuteur` (`idTuteur`);

--
-- Contraintes pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD CONSTRAINT `intervenant_ibfk_1` FOREIGN KEY (`idSpe`) REFERENCES `specialite` (`idSpe`);

--
-- Contraintes pour la table `juger`
--
ALTER TABLE `juger`
  ADD CONSTRAINT `juger_ibfk_1` FOREIGN KEY (`idIntervenant`) REFERENCES `intervenant` (`idIntervenant`),
  ADD CONSTRAINT `juger_ibfk_2` FOREIGN KEY (`idJury`) REFERENCES `jury` (`idJury`);

--
-- Contraintes pour la table `positionner`
--
ALTER TABLE `positionner`
  ADD CONSTRAINT `positionner_ibfk_1` FOREIGN KEY (`idHebergement`) REFERENCES `lieuhebergement` (`idHebergement`),
  ADD CONSTRAINT `positionner_ibfk_2` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`idHebergement`) REFERENCES `lieuhebergement` (`idHebergement`);
COMMIT;
