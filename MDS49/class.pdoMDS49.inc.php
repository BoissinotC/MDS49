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
		try {
    		PdoMDS49::$monPdo = new PDO(PdoMDS49::$serveur.';'.PdoMDS49::$bdd, PdoMDS49::$user, PdoMDS49::$mdp); 
			PdoMDS49::$monPdo->query("SET CHARACTER SET utf8");
		}
		catch (PDOException $e){
		echo $e->getMessage();
		exit;
		}
	}
	public function _destruct(){
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
	public function getLesAnimateurs()
	{
		$req = "select * from INTERVENANT WHERE ROLESABIC = 'A'";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
		public function getLesBenevoles()
	{
		$req="select * from INTERVENANT where ROLESABIC = 'B' ";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function getLesHebergements()
	{
		$req = "SELECT LIEUHEBERGEMENT.`IDHEBERGEMENT`, LIEUHEBERGEMENT.`ADRESSEHEBER`, LIEUHEBERGEMENT.`CODEPOSTALHEBER`, LIEUHEBERGEMENT.`NOMHEBERGEMENT`, LIEUHEBERGEMENT.`COUTHEBER`, LIEUHEBERGEMENT.`CAPACITEHEBER`, VILLE.NOMVILLE FROM `LIEUHEBERGEMENT` INNER JOIN VILLE on LIEUHEBERGEMENT.IDVILLE = VILLE.IDVILLE";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getLesStages()
	{
		$req = "select SESSION.IDSESSION, SESSION.DATEDEBUT, SESSION.DATEFIN, SESSION.IDSTAGE, LIEUHEBERGEMENT.NOMHEBERGEMENT from SESSION INNER JOIN LIEUHEBERGEMENT on SESSION.IDHEBERGEMENT = LIEUHEBERGEMENT.IDHEBERGEMENT";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
		public function getLesIntervenants()
	{
		$req = "select * from INTERVENANT ";
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


	public function seConnecter ($username,$password) 
	{
		if( (!empty($username)) && !empty($password)) 
		{
        // Prepare a select statement

			//$passhash = md5($password);
        	$sql = ("SELECT compte.IDINSCRIT, MAILPERSO, MDPMD5 FROM compte INNER JOIN inscrits ON compte.IDINSCRIT = inscrits.IDINSCRIT WHERE MAILPERSO = :username LIMIT 1") ;
            
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

}
?>