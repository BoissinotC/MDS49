<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application MDS49
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
*/

class PdoMDS49
{   		
      	private static $serveur='mysql:host=db672809222.db.1and1.com';
      	private static $bdd='dbname=db672809222';   		
      	private static $user='dbo672809222' ;    		
      	private static $mdp='BMw1234*CEMP' ;	
		private static $monPdo;
		private static $monPdoMDS49 = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoMDS49::$monPdo = new PDO(PdoMDS49::$serveur.';'.PdoMDS49::$bdd, PdoMDS49::$user, PdoMDS49::$mdp); 
			PdoMDS49::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct()
	{
		PdoMDS49::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoMDS49 = PdoMDS49::getPdoMDS49();
 * @return l'unique objet de la classe PdoMDS49
 */
	public  static function getPdoMDS49()
	{
		if(PdoMDS49::$monPdoMDS49 == null)
		{
			PdoMDS49::$monPdoMDS49= new PdoMDS49();
		}
		return PdoMDS49::$monPdoMDS49;  
	}
/**
 * Retourne toutes les catégories sous forme d'un tableau associatif
 *
 * @return le tableau associatif des catégories 
*/
	public function getLesUtilisateurs()
	{
		$req = "select * from categorie";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 * 
 * @param $idCategorie 
 * @return un tableau associatif  
*/

	public function getLesProduitsDeCategorie($idCategorie)
	{
	    $req="select * from produit where idCategorie = '$idCategorie'";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
/**
 * Retourne les produits concernés par le tableau des idProduits passée en argument
 *
 * @param $desIdProduit tableau d'idProduits
 * @return un tableau associatif 
*/
	public function getLesProduitsDuTableau($desIdProduit)
	{
		$nbProduits = count($desIdProduit);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($desIdProduit as $unIdProduit)
			{
				$req = "select * from produit where id = '$unIdProduit'";
				$res = PdoMDS49::$monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			}
		}
		return $lesProduits;
	}

/**
 * Crée une commande 
 *
 * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
 * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
 * tableau d'idProduit passé en paramètre
 * @param $nom 
 * @param $rue
 * @param $cp
 * @param $ville
 * @param $mail
 * @param $lesIdProduit
 
*/
	public function creerCommande($nom,$rue,$cp,$ville,$mail, $lesIdProduit )
	{
		$req = "select max(id) as maxi from commande";
		
		$res = PdoMDS49::$monPdo->query($req);
		$laLigne = $res->fetch();
		$maxi = $laLigne['maxi'] ;
		$maxi++;
		$idCommande = $maxi;
		
		$date = date('Y/m/d');
		$req = "insert into commande values ('$idCommande','$date','$nom','$rue','$cp','$ville','$mail')";
		//echo $req."<br>";
		$res = PdoMDS49::$monPdo->exec($req);
		foreach($lesIdProduit as $unIdProduit)
		{
			$req = "insert into contenir values ('$idCommande','$unIdProduit')";
			
			$res = PdoMDS49::$monPdo->exec($req);
		}

	}


	public function seConnecter ($username,$password) 
	{
		if( (!empty($username)) && !empty($password)) 
		{
        // Prepare a select statement

			//$passhash = md5($password);
        	$sql = ("SELECT compte.IDINSCRIT, MAILPERSO, MDPMD5 FROM compte INNER JOIN inscrits ON compte.IDINSCRIT = inscrits.IDINSCRIT WHERE MAILPERSO = :username") ;
            
	        if($stmt = PdoMDS49::$monPdo->prepare($sql))
	        {
	            // Bind variables to the prepared statement as parameters
	            $stmt->bindValue("username", $username, PDO::PARAM_STR);
	            //$stmt->bindValue("passhash", $passhash, PDO::PARAM_STR);
	            
	           
	            
	             // Attempt to execute the prepared statement
	            if($stmt->execute())
	            {
	                // Check if username exists, if yes then verify password
	                if($stmt->rowCount() == 1)
	                {
	                    if($row = $stmt->fetch())
	                    {
	                        $id = $row["id"];
	                        $username = $row["MAILPERSO"];
	                        //$hashed_password = $row["MDPMD5"];

	                            
                            
	                            // Store data in session variables
	                            $_SESSION["loggedin"] = true;
	                            $_SESSION["compte.IDINSCRIT"] = $id;
	                            $_SESSION["MAILPERSO"] = $username;                            
	                           

	                            // Redirect user to welcome page
	                            header("location: index.php");	
								


	                    }
	                } else{
	                    // Display an error message if username doesn't exist
	                    $username_err = "No account found with that username.";
	                    echo $username_err;
	                }
	            } else{
	                echo "Oops! Something went wrong. Please try again later.";
	            }
	        }
        
				
		}
	}

	public function affectionIntervenant($idActivite, $idIntervenant)
	{
		$req = PdoMDS49::$monPdo->prepare("INSERT INTO FAIRE (idActivite, idIntervenant) VALUES (:VidActivite, :VidIntervenant)");
		$req->bindValue('VidActivite', $idActivite);
		$req->bindValue('VidIntervenant', $idIntervenant);
		$req->execute();
	}

	public function getLesActivites() 
	{
		$req = "SELECT idActivite, libelleActivite, competenceRequise FROM ACTIVITE";
		$res = PdoMDS49::$monPdo->query($req);
		$listeActivite = $res->fetchAll();
		return $listeActivite;
	}

	public function getLesBenevoles() 
	{
		$req = "SELECT * FROM INTERVENANT WHERE ROLESABIC = 'B' OR ROLESABIC = 'C' ORDER BY IDINTERVENANT";
		$res = PdoMDS49::$monPdo->query($req);
		$lesBenevoles = $res->fetchAll();
		return $lesBenevoles;
	}

	public function getLesAnimateurs() 
	{
		$req = "SELECT * FROM INTERVENANT WHERE ROLESABIC = 'A' ORDER BY IDINTERVENANT";
		$res = PdoMDS49::$monPdo->query($req);
		$lesAnimateurs = $res->fetchAll();
		return $lesAnimateurs;
	}

	public function getLesIntervenants() 
	{
		$req = "SELECT * FROM INTERVENANT WHERE ROLESABIC = 'I' ORDER BY IDINTERVENANT";
		$res = PdoMDS49::$monPdo->query($req);
		$lesIntervenants = $res->fetchAll();
		return $lesIntervenants;
	}

	public function getLesInscrits() 
	{
		$req = "SELECT inscrits.IDINSCRIT, inscrits.NOMINSCRIT, inscrits.PRENOMINSCRIT, inscrits.TELPERSO, inscrits.MAILPERSO, inscrits.SPORTPRATIQUE, ville.NOMVILLE, club.NOMCLUB FROM inscrits INNER JOIN ville ON ville.idVille = inscrits.idVille INNER JOIN club ON club.idClub = inscrits.idClub ORDER BY inscrits.idInscrit";

		$res = PdoMDS49::$monPdo->query($req);
		$lesInscrits = $res->fetchAll();
		return $lesInscrits;
	}

	public function choixInscritEval($inscrit, $valueEvalInscrit, $idJury)
	{
		$req = PdoMDS49::$monPdo->prepare("INSERT INTO evalution VALUES (:VidJury, :VidInscrit, :VresultEval)");
		$req->bindValue('VidJury', $idJury);
		$req->bindValue('VidInscrit', $inscrit);
		$req->bindValue('VresultEval', $valueEvalInscrit);
		$req->execute();
	}

	public function getLesHebergements()
	{
		$req = "SELECT lieuhebergement.`IDHEBERGEMENT`, lieuhebergement.`ADRESSEHEBER`, lieuhebergement.`CODEPOSTALHEBER`, lieuhebergement.`NOMHEBERGEMENT`, lieuhebergement.`COUTHEBER`, lieuhebergement.`CAPACITEHEBER`, ville.NOMVILLE FROM `lieuhebergement` INNER JOIN ville on lieuhebergement.IDVILLE = ville.IDVILLE";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getLesStages()
	{
		$req = "select session.IDSESSION, session.DATEDEBUT, session.DATEFIN, session.IDSTAGE, lieuhebergement.NOMHEBERGEMENT from session INNER JOIN lieuhebergement on session.IDHEBERGEMENT = lieuhebergement.IDHEBERGEMENT";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}	

	public function insertionDonnees($nom,$prenom,$dateNaissance,$sexe,$adresse,$ville,$telephone,$email,$etudesSuivies,$disciplineSport,$clubLicencie,$adresseClub,$sessionDepart,$membreBureau,$membreEquipeTech,$animationJeune,$detailAnimationJeune,$organisationClub,$fonctionOrganisateurClub,$motivationsInscription,$nomTuteur,$prenomTuteur,$formationTuteur,$adresseTuteur,$mailTuteur)
	{
		$idClubSaisiFormulaire = "SELECT IDCLUB FROM club Where NOMCLUB='$clubLicencie'";		
		$brutIdClubSaisi = PdoMDS49::$monPdo->query($idClubSaisiFormulaire);
		$idClubSaisi = $brutIdClubSaisi->fetch();

		$insertionExpe = "insert into expeassos (MEMBRECOMITEDIRECTEUR, MEMBREEQUIPETECH, FAIREANIMJEUNE, DETAILSOUIANIM, PARTICIPEORGACLUB, DETAILSORGACLUB) values('$membreBureau', '$membreEquipeTech', '$animationJeune', '$detailAnimationJeune', '$organisationClub', '$fonctionOrganisateurClub') ";		
		$insertonExperience = PdoMDS49::$monPdo->exec($insertionExpe);

		$idExpe = "select IDEXPE FROM expeassos Where MEMBRECOMITEDIRECTEUR='$membreBureau'
			AND MEMBREEQUIPETECH='$membreEquipeTech'
			AND FAIREANIMJEUNE='$animationJeune'
			AND DETAILSOUIANIM='$detailAnimationJeune'
			AND PARTICIPEORGACLUB='$organisationClub'
			AND DETAILSORGACLUB='$fonctionOrganisateurClub' LIMIT 1";		
		$brutIdExperience = PdoMDS49::$monPdo->query($idExpe);
		$insertionFinaleExe = $brutIdExperience->fetch();

		$idVilleEntree = "select IDVILLE FROM ville Where NOMVILLE='$ville'";		
		$brutIdVille = PdoMDS49::$monPdo->query($idVilleEntree);
		$idVille = $brutIdVille->fetch();

		$idTuteurChercher = "select IDTUTEUR FROM tuteur Where NOMTUTEUR='$nomTuteur'
			AND PRENOMTUTEUR='$prenomTuteur'";	
		$brutResult_idTuteurChercher = PdoMDS49::$monPdo->query($idTuteurChercher);
		$idTuteurtrouve = $brutResult_idTuteurChercher->fetch();

		$insertionFinale = "insert into inscrits (IDCLUB, IDEXPE, IDVILLE, IDTUTEUR, NOMINSCRIT, PRENOMINSCRIT, SEXE, ADRESSEINSCRIT, DATENAISSANCE, TELPERSO, MAILPERSO, ETUDES, SPORTPRATIQUE, MOTIVINSCRIPTION) values('".$idClubSaisi['IDCLUB']."', '".$insertionFinaleExe['IDEXPE']."', '".$idVille['IDVILLE']."', '".$idTuteurtrouve['IDTUTEUR']."', '$nom', '$prenom', '$sexe', '$adresse', '$dateNaissance', '$telephone', '$email', '$etudesSuivies', '$disciplineSport', '$motivationsInscription') ";
		$brutInsertionFinaleExe = PdoMDS49::$monPdo->exec($insertionFinale);
	
	}
	
	public function nouveauCompte($email, $mdp)
	{
		$insertionCompte = "insert into COMPTE (MAILCOMPTE, MDPMD5) values('$email', '$mdp') ";		
		$insererCompte = PdoMDS49::$monPdo->exec($insertionCompte);
	}	
}
?>
