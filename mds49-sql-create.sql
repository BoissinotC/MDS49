DROP DATABASE IF EXISTS MDS49;
CREATE DATABASE IF NOT EXISTS MDS49;
USE MDS49;

# -----------------------------------------------------------------------------
#       TABLE : LIEUHEBERGEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LIEUHEBERGEMENT
 (
   IDHEBERGEMENT INTEGER NOT NULL  ,
   IDVILLE INTEGER NULL  ,
   ADRESSEHEBER CHAR(32) NOT NULL  ,
   CODEPOSTALHEBER CHAR(5) NOT NULL  ,
   NOMHEBERGEMENT CHAR(50) NOT NULL  ,
   COUTHEBER DECIMAL(10,2) NOT NULL  ,
   CAPACITEHEBER INTEGER NOT NULL  
   , PRIMARY KEY (IDHEBERGEMENT) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lieuhebergement`
--

INSERT INTO `LIEUHEBERGEMENT` (`IDHEBERGEMENT`, `ADRESSEHEBER`, `CODEPOSTALHEBER`, `NOMHEBERGEMENT`, `COUTHEBER`, `CAPACITEHEBER`) VALUES
(1, 'Avenue des Sables', '49300', 'Hotel Ibis Cholet', '57.00', 120),
(2, 'Rue de la POissonnerie', '49100', 'Hotel Ibis Angers Centre', '60.00', 210),
(3, '108 Boulevars Jourdan', '75014', 'Ideal Hotel Design', '49.00', 200),
(4, '4 rue Coutellerie', '13002', 'Residhotel Vieux Port', '43.00', 230),
(5, '18 rue Bellecoriedre', '69002', 'le Républik Hotel', '65.00', 250),
(6,'3 Allée Baco', '44000', 'Hotel Ibis Nantes Centre', '57.00', 170);

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE LIEUHEBERGEMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_LIEUHEBERGEMENT_VILLE
     ON LIEUHEBERGEMENT (IDVILLE ASC);

# -----------------------------------------------------------------------------
#       TABLE : STAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STAGE
 (
   IDSTAGE INTEGER NOT NULL  
   , PRIMARY KEY (IDSTAGE) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `STAGE` (`IDSTAGE`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

# -----------------------------------------------------------------------------
#       TABLE : EXPEASSOS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EXPEASSOS
 (
   IDEXPE INTEGER NOT NULL  ,
   MEMBRECOMITEDIRECTEUR CHAR(1) NOT NULL  ,
   MEMBREEQUIPETECH CHAR(1) NOT NULL  ,
   FAIREANIMJEUNE CHAR(1) NOT NULL  ,
   DETAILSOUIANIM CHAR(100) NULL  ,
   PARTICIPEORGACLUB CHAR(1) NOT NULL  ,
   DETAILSORGACLUB CHAR(100) NULL  
   , PRIMARY KEY (IDEXPE) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `expeassos`
--

INSERT INTO `EXPEASSOS` (`IDEXPE`, `MEMBRECOMITEDIRECTEUR`, `MEMBREEQUIPETECH`, `FAIREANIMJEUNE`, `DETAILSOUIANIM`, `PARTICIPEORGACLUB`, `DETAILSORGACLUB`) VALUES
(1, 'O', 'N', 'N', '', 'N', ''),
(2, 'N', 'O', 'O', 'Foot', 'N', ''),
(3, 'N', 'N', 'N', '', 'N', '');


# -----------------------------------------------------------------------------
#       TABLE : VILLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VILLE
 (
   IDVILLE INTEGER NOT NULL  ,
   NOMVILLE CHAR(32) NOT NULL  ,
   CODEPOSTALVILLE CHAR(5) NOT NULL  
   , PRIMARY KEY (IDVILLE) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `VILLE` (`IDVILLE`, `NOMVILLE`, `CODEPOSTALVILLE`) VALUES
(1, 'Cholet', '49300'),
(2, 'Angers', '49100'),
(3, 'Paris', '75000'),
(4, 'Marseille', '13000'),
(5, 'Lyon', '69000'),
(6, 'Nantes', '44000');


# -----------------------------------------------------------------------------
#       TABLE : SESSION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SESSION
 (
   IDSESSION INTEGER NOT NULL  ,
   DATEDEBUT date NOT NULL ,
   DATEFIN date NOT NULL ,
   IDSTAGE INTEGER NOT NULL  ,
   IDHEBERGEMENT INTEGER NOT NULL  
   , PRIMARY KEY (IDSESSION) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `SESSION`
--

INSERT INTO `SESSION` (`IDSESSION`, `DATEDEBUT`, `DATEFIN`, `IDSTAGE`, `IDHEBERGEMENT`) VALUES
(1,'2018-10-06','2018-10-08', 1,1),
(2,'2018-06-23', '2018-06-25', 2,2),
(3,'2018-11-05', '2018-11-07', 3,3),
(4,'2018-08-19', '2018-08-21', 4,4),
(5,'2018-09-15', '2018-09-17', 5,5),
(6,'2018-07-21', '2018-07-23', 6,6);



# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE SESSION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_SESSION_STAGE
     ON SESSION (IDSTAGE ASC);

CREATE  INDEX I_FK_SESSION_LIEUHEBERGEMENT
     ON SESSION (IDHEBERGEMENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMPETENCE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPETENCE
 (
   IDSPE INTEGER NOT NULL  ,
   LIBELLE CHAR(50) NOT NULL  
   , PRIMARY KEY (IDSPE) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `COMPETENCE`
--

INSERT INTO `COMPETENCE` (`IDSPE`, `LIBELLE`) VALUES
(1, 'Formation Football'),
(2, 'Formation Basketball'),
(3, 'Formation Gymanastique'),
(4, 'Formation Handball');

# -----------------------------------------------------------------------------
#       TABLE : JURY
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS JURY
 (
   IDJURY INTEGER NOT NULL  
   , PRIMARY KEY (IDJURY) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jury`
--

INSERT INTO `JURY` (`IDJURY`) VALUES
(1),
(2),
(3),
(4),
(5);


# -----------------------------------------------------------------------------
#       TABLE : INTERVENANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INTERVENANT
 (
   IDINTERVENANT INTEGER NOT NULL  ,
   NOMINTERVENANT CHAR(32) NOT NULL  ,
   PRENOMINTERVENANT CHAR(32) NOT NULL  ,
   DIPLOME CHAR(32) NULL  ,
   COUTHORAIRE DECIMAL(10,2) NOT NULL  ,
   ROLESABIC CHAR(1) NOT NULL  
   , PRIMARY KEY (IDINTERVENANT) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `INTERVENANT` (`IDINTERVENANT`, `NOMINTERVENANT`, `PRENOMINTERVENANT`, `DIPLOME`, `COUTHORAIRE`, `ROLESABIC`) VALUES
(1, 'Kou', 'Jean-Claude',  'BAC ES', '10.00', 'A'),
(2, 'Kante', 'Raphael', 'BAC S', '0.00', 'B'),
(3, 'Fiche', 'Tyson', 'BAC ES', '11.00', 'I'),
(4, 'De Colo', 'Louis', 'BAC L', '12.00', 'A'),
(5, 'Dupont', 'Pierre', 'BAC S', '10.00', 'A');

# -----------------------------------------------------------------------------
#       TABLE : CLUB
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLUB
 (
   IDCLUB INTEGER NOT NULL  ,
   IDVILLE INTEGER NULL  ,
   NOMCLUB CHAR(32) NOT NULL  ,
   ADRESSECLUB CHAR(40) NOT NULL  
   , PRIMARY KEY (IDCLUB) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;


 --
-- Déchargement des données de la table `club`
--

INSERT INTO `CLUB` (`IDCLUB`,`IDVILLE`, `NOMCLUB`, `ADRESSECLUB` ) VALUES
(1,1, 'Foot formation', '3 rue des pruneaux'),
(2,2, 'K-sports', '5 boulevard des oranges' ),
(3,3, 'Aquasport','6 rue des carottes' ),
(4,4, 'Club des cactus','7 avenue des chiens');

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CLUB
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CLUB_VILLE
     ON CLUB (IDVILLE ASC);

# -----------------------------------------------------------------------------
#       TABLE : ACTIVITE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ACTIVITE
 (
   IDACTIVITE INTEGER NOT NULL  ,
   LIBELLEACTIVITE CHAR(32) NOT NULL  ,
   COMPETENCEREQUISE CHAR(32) NOT NULL  
   , PRIMARY KEY (IDACTIVITE) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Déchargement des données de la table `activite`
--


INSERT INTO `ACTIVITE` (`IDACTIVITE`, `LIBELLEACTIVITE`, `COMPETENCEREQUISE`) VALUES
(1, 'FOOTBALL','a'),
(2, 'NATATION','b'),
(3, 'KARATE','c' ),
(4, 'HANDBALL','d' ),
(5, 'BASKET','e' ),
(6, 'GYMNASTIQUE','f' );


# -----------------------------------------------------------------------------
#       TABLE : TUTEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TUTEUR
 (
   IDTUTEUR INTEGER NOT NULL  ,
   NOMTUTEUR CHAR(32) NOT NULL  ,
   PRENOMTUTEUR CHAR(32) NOT NULL  ,
   FORMATIONTUTEUR CHAR(50) NOT NULL  ,
   ADRESSETUTEUR CHAR(50) NOT NULL  
   , PRIMARY KEY (IDTUTEUR) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tuteur`
--

INSERT INTO `TUTEUR` (`IDTUTEUR`, `NOMTUTEUR`, `PRENOMTUTEUR`, `FORMATIONTUTEUR`, `ADRESSETUTEUR`) VALUES
(1, 'Jean', 'Louis', 'BLA', '33 rue de Oubliettes'),
(2, 'Fabrice', 'De La Montaginere', 'BLA', '35 rue de Loius'),
(3, 'Theo', 'Ricou', 'BLA', '25 rue National'),
(4, 'Loris', 'Bale', 'BLA', '5 rue de la Vendée');

# -----------------------------------------------------------------------------
#       TABLE : COMPTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPTE
 (
   ID INTEGER NOT NULL  ,
   IDINSCRIT INTEGER NOT NULL  ,
   MDPMD5 VARCHAR(32) NOT NULL  
   , PRIMARY KEY (ID) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPTE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPTE_INSCRITS
     ON COMPTE (IDINSCRIT ASC);

# -----------------------------------------------------------------------------
#       TABLE : INSCRITS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INSCRITS
 (
   IDINSCRIT INTEGER NOT NULL  ,
   IDCLUB INTEGER NOT NULL  ,
   IDEXPE INTEGER NOT NULL  ,
   IDVILLE INTEGER NULL  ,
   IDTUTEUR INTEGER NOT NULL  ,
   NOMINSCRIT CHAR(32) NOT NULL  ,
   PRENOMINSCRIT CHAR(32) NOT NULL  ,
   SEXE CHAR(1) NOT NULL  ,
   ADRESSEINSCRIT CHAR(50) NOT NULL  ,
   DATENAISSANCE DATE NOT NULL  ,
   TELPERSO CHAR(10) NOT NULL  ,
   MAILPERSO CHAR(50) NOT NULL  ,
   ETUDES CHAR(50) NOT NULL  ,
   SPORTPRATIQUE CHAR(32) NOT NULL  ,
   MOTIVINSCRIPTION CHAR(150) NOT NULL  
   , PRIMARY KEY (IDINSCRIT) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Déchargement des données de la table `inscrits`
--

INSERT INTO `INSCRITS` (`IDINSCRIT`, `IDCLUB`, `IDEXPE`,`IDVILLE`, `IDTUTEUR`, `NOMINSCRIT`, `PRENOMINSCRIT`, `SEXE`, `ADRESSEINSCRIT`, `DATENAISSANCE`, `TELPERSO`, `MAILPERSO`, `ETUDES`, `SPORTPRATIQUE`, `MOTIVINSCRIPTION`) VALUES
(1, 1, 1,1, 1, 'Elhacoumo', 'Bastien', 'H', 'Avenue de la Lune', '1994-12-12', '0605040302', 'BastienCoulum@gmail.com', 'BAC S', 'Equitation', 'Passioné par le sport'),
(2, 2, 2,2, 2, 'Goulet', 'Hubert', 'H', 'Avenue du Papa', '1980-01-01', '0604080907', 'GouletHubert@gmail.com', 'BAC S', 'Golf', 'Passion pour le sport individuel'),
(3, 3, 3,3, 3, 'Melissandre', 'Jouet', 'F', 'Avenue du Tigre', '1990-11-01', '0606985907', 'MelissandreJouet@gmail.com', 'BAC ES', 'Natation', 'Passion pour les sports d\'eau'),
(4, 4, 3,4, 4, 'Pelouse', 'René', 'H', '6 rue des jardiniers', '2000-06-16', '0658764169', 'çapoussemal@gmail.com', 'Médecine', 'GYMNASTIQUE', 'Pour le travail'),
(5, 3, 2,2, 2, 'Paraskeva', 'Brenda', 'F', '6 rue des coquelicots', '1995-02-14', '0645987456', 'brendaparaskeva@gmail.com', 'Arts', 'EQUITATION', 'Trouver un copain');


# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE INSCRITS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_INSCRITS_CLUB
     ON INSCRITS (IDCLUB ASC);

CREATE  INDEX I_FK_INSCRITS_EXPEASSOS
     ON INSCRITS (IDEXPE ASC);

CREATE  INDEX I_FK_INSCRITS_VILLE
     ON INSCRITS (IDVILLE ASC);

CREATE  INDEX I_FK_INSCRITS_TUTEUR
     ON INSCRITS (IDTUTEUR ASC);

# -----------------------------------------------------------------------------
#       TABLE : HORAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS HORAIRE
 (
   IDACTIVITE INTEGER NOT NULL  ,
   IDSESSION INTEGER NOT NULL  ,
   HEUREDEBUT TIME NOT NULL  ,
   HEUREFIN TIME NOT NULL  
   , PRIMARY KEY (IDACTIVITE,IDSESSION) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `HORAIRE` (`IDACTIVITE`, `IDSESSION`, `HEUREDEBUT`, `HEUREFIN`) VALUES
(1, 1, '12:25:00', '16:30:00'),
(2, 3, '14:00:00', '17:00:00'),
(3, 4, '15:30:25', '18:25:00'),
(4, 5, '10:00:00', '15:00:00'),
(5, 2, '15:00:00', '18:00:00'),
(6, 6, '08:00:00', '12:00:00');

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE HORAIRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_HORAIRE_ACTIVITE
     ON HORAIRE (IDACTIVITE ASC);

CREATE  INDEX I_FK_HORAIRE_SESSION
     ON HORAIRE (IDSESSION ASC);

# -----------------------------------------------------------------------------
#       TABLE : FAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FAIRE
 (
   IDACTIVITE INTEGER NOT NULL  ,
   IDINTERVENANT INTEGER NOT NULL  
   , PRIMARY KEY (IDACTIVITE,IDINTERVENANT) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faire`
--

INSERT INTO `FAIRE` (`IDACTIVITE`, `IDINTERVENANT`) VALUES
(1, 2),
(2, 5),
(3, 1),
(4, 3),
(5, 4);
# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FAIRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_FAIRE_ACTIVITE
     ON FAIRE (IDACTIVITE ASC);

CREATE  INDEX I_FK_FAIRE_INTERVENANT
     ON FAIRE (IDINTERVENANT ASC);

# -----------------------------------------------------------------------------
#       TABLE : EVALUATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EVALUATION
 (
   IDJURY INTEGER NOT NULL  ,
   IDINSCRIT INTEGER NOT NULL  ,
   RESULTEVAL CHAR(32) NOT NULL  
   , PRIMARY KEY (IDJURY,IDINSCRIT) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `EVALUATION` (`IDJURY`, `IDINSCRIT`, `RESULTEVAL`) VALUES
(1, 1, 'FAVORABLE'),
(2, 3, 'ECHOUE'),
(3, 4, 'ECHOUE'),
(4, 5, 'FAVORABLE'),
(5, 2, 'FAVORABLE');


# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EVALUATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EVALUATION_JURY
     ON EVALUATION (IDJURY ASC);

CREATE  INDEX I_FK_EVALUATION_INSCRITS
     ON EVALUATION (IDINSCRIT ASC);

# -----------------------------------------------------------------------------
#       TABLE : INSCRIPTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INSCRIPTION
 (
   IDSESSION INTEGER NOT NULL  ,
   IDINSCRIT INTEGER NOT NULL  
   , PRIMARY KEY (IDSESSION,IDINSCRIT) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `INSCRIPTION` (`IDSESSION`, `IDINSCRIT`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE INSCRIPTION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_INSCRIPTION_SESSION
     ON INSCRIPTION (IDSESSION ASC);

CREATE  INDEX I_FK_INSCRIPTION_INSCRITS
     ON INSCRIPTION (IDINSCRIT ASC);

# -----------------------------------------------------------------------------
#       TABLE : TALENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TALENT
 (
   IDSPE INTEGER NOT NULL  ,
   IDINTERVENANT INTEGER NOT NULL  
   , PRIMARY KEY (IDSPE,IDINTERVENANT) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

 INSERT INTO `talent`(`IDSPE`, `IDINTERVENANT`) VALUES 
(1,1),
(2,2),
(3,3),
(4,4),
(4,5);



# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE TALENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_TALENT_COMPETENCE
     ON TALENT (IDSPE ASC);

CREATE  INDEX I_FK_TALENT_INTERVENANT
     ON TALENT (IDINTERVENANT ASC);

# -----------------------------------------------------------------------------
#       TABLE : JUGER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS JUGER
 (
   IDINTERVENANT INTEGER NOT NULL  ,
   IDJURY INTEGER NOT NULL  
   , PRIMARY KEY (IDINTERVENANT,IDJURY) 
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `juger`
--

INSERT INTO `juger` (`IDINTERVENANT`, `IDJURY`) VALUES
(1, 2),
(2, 1),
(3, 4),
(4, 5),
(5, 3);

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE JUGER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_JUGER_INTERVENANT
     ON JUGER (IDINTERVENANT ASC);

CREATE  INDEX I_FK_JUGER_JURY
     ON JUGER (IDJURY ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE LIEUHEBERGEMENT 
  ADD FOREIGN KEY FK_LIEUHEBERGEMENT_VILLE (IDVILLE)
      REFERENCES VILLE (IDVILLE) ;


ALTER TABLE SESSION 
  ADD FOREIGN KEY FK_SESSION_STAGE (IDSTAGE)
      REFERENCES STAGE (IDSTAGE) ;


ALTER TABLE SESSION 
  ADD FOREIGN KEY FK_SESSION_LIEUHEBERGEMENT (IDHEBERGEMENT)
      REFERENCES LIEUHEBERGEMENT (IDHEBERGEMENT) ;


ALTER TABLE CLUB 
  ADD FOREIGN KEY FK_CLUB_VILLE (IDVILLE)
      REFERENCES VILLE (IDVILLE) ;


ALTER TABLE COMPTE 
  ADD FOREIGN KEY FK_COMPTE_INSCRITS (IDINSCRIT)
      REFERENCES INSCRITS (IDINSCRIT) ;


ALTER TABLE INSCRITS 
  ADD FOREIGN KEY FK_INSCRITS_CLUB (IDCLUB)
      REFERENCES CLUB (IDCLUB) ;


ALTER TABLE INSCRITS 
  ADD FOREIGN KEY FK_INSCRITS_EXPEASSOS (IDEXPE)
      REFERENCES EXPEASSOS (IDEXPE) ;


ALTER TABLE INSCRITS 
  ADD FOREIGN KEY FK_INSCRITS_VILLE (IDVILLE)
      REFERENCES VILLE (IDVILLE) ;


ALTER TABLE INSCRITS 
  ADD FOREIGN KEY FK_INSCRITS_TUTEUR (IDTUTEUR)
      REFERENCES TUTEUR (IDTUTEUR) ;


ALTER TABLE HORAIRE 
  ADD FOREIGN KEY FK_HORAIRE_ACTIVITE (IDACTIVITE)
      REFERENCES ACTIVITE (IDACTIVITE) ;


ALTER TABLE HORAIRE 
  ADD FOREIGN KEY FK_HORAIRE_SESSION (IDSESSION)
      REFERENCES SESSION (IDSESSION) ;


ALTER TABLE FAIRE 
  ADD FOREIGN KEY FK_FAIRE_ACTIVITE (IDACTIVITE)
      REFERENCES ACTIVITE (IDACTIVITE) ;


ALTER TABLE FAIRE 
  ADD FOREIGN KEY FK_FAIRE_INTERVENANT (IDINTERVENANT)
      REFERENCES INTERVENANT (IDINTERVENANT) ;


ALTER TABLE EVALUATION 
  ADD FOREIGN KEY FK_EVALUATION_JURY (IDJURY)
      REFERENCES JURY (IDJURY) ;


ALTER TABLE EVALUATION 
  ADD FOREIGN KEY FK_EVALUATION_INSCRITS (IDINSCRIT)
      REFERENCES INSCRITS (IDINSCRIT) ;


ALTER TABLE INSCRIPTION 
  ADD FOREIGN KEY FK_INSCRIPTION_SESSION (IDSESSION)
      REFERENCES SESSION (IDSESSION) ;


ALTER TABLE INSCRIPTION 
  ADD FOREIGN KEY FK_INSCRIPTION_INSCRITS (IDINSCRIT)
      REFERENCES INSCRITS (IDINSCRIT) ;


ALTER TABLE TALENT 
  ADD FOREIGN KEY FK_TALENT_COMPETENCE (IDSPE)
      REFERENCES COMPETENCE (IDSPE) ;


ALTER TABLE TALENT 
  ADD FOREIGN KEY FK_TALENT_INTERVENANT (IDINTERVENANT)
      REFERENCES INTERVENANT (IDINTERVENANT) ;


ALTER TABLE JUGER 
  ADD FOREIGN KEY FK_JUGER_INTERVENANT (IDINTERVENANT)
      REFERENCES INTERVENANT (IDINTERVENANT) ;


ALTER TABLE JUGER 
  ADD FOREIGN KEY FK_JUGER_JURY (IDJURY)
      REFERENCES JURY (IDJURY) ;
