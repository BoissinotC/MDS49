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
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=MDS49';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
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

	public function getLesBenevoles()
	{
		$req="select * from intervenant where rolesabic = 'B' ";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function insertionDonnees($nom,$prenom,$dateNaissance,$sexe,$adresse,$ville,$telephone,$email,$etudesSuivies,$disciplineSport,$clubLicencie,$adresseClub,$sessionDepart,$membreBureau,$membreEquipeTech,$animationJeune,$detailAnimationJeune,$organisationClub,$fonctionOrganisateurClub,$motivationsInscription,$nomTuteur,$prenomTuteur,$formationTuteur,$adresseTuteur,$mailTuteur)
	{
		$idClubSaisiFormulaire = "select IDCLUB Where NOMCLUB='$clubLicencie'";		
		$idClubSaisi = PdoMDS49::$monPdoMDS49->query($idClubSaisiFormulaire);

		$insertionExpe = "insert into expeassos (MEMBRECOMITEDIRECTEUR, MEMBREEQUIPETECH, FAIREANIMJEUNE, DETAILSOUIANIM, PARTICIPEORGACLUB, DETAILSORGACLUB) values('$membreBureau', '$membreEquipeTech', '$animationJeune', '$detailAnimationJeune', '$organisationClub', '$fonctionOrganisateurClub') ";		
		$insertonExperience = PdoMDS49::$monPdoMDS49->exec($insertionExpe);

		$idExpe = "select IDEXPE FROM expeassos Where MEMBRECOMITEDIRECTEUR='$membreBureau'
			AND MEMBREEQUIPETECH='$membreEquipeTech'
			AND FAIREANIMJEUNE='$animationJeune'
			AND DETAILSOUIANIM='$detailAnimationJeune'
			AND PARTICIPEORGACLUB='$organisationClub'
			AND DETAILSORGACLUB='$fonctionOrganisateurClub'";		
		$idExperience = PdoMDS49::$monPdoMDS49->query($idExpe);

		$idVilleEntree = "select IDVILLE FROM ville Where NOMVILLE='$ville'";		
		$idVille = PdoMDS49::$monPdoMDS49->query($idVilleEntree);

		$idTuteurChercher = "select IDTUTEUR FROM tuteur Where NOMTUTEUR='$nomTuteur'
			AND PRENOMTUTEUR='$prenomTuteur'";	
		$idTuteur = PdoMDS49::$monPdoMDS49->query($idTuteurChercher);

		$insertionFinale = "insert into inscits (IDCLUB, IDEXPE, IDVILLE, IDTUTEUR, NOMINSCRIT, PRENOMINSCRIT, SEXE, ADRESSEINSCRIT, DATENAISSANCE, TELPERSO, MAILPERSO, ETUDES, SPORTPRATIQUE, MOTIVINSCRIPTION) values('$idClubSaisi', '$idExperience', '$idVille', '$idTuteur', '$nom', '$prenom', '$sexe', '$adresse', '$dateNaissance', '$telephone', '$email', '$etudesSuivies', '$disciplineSport', '$motivationsInscription') ";
		$insertionFinaleExe = PdoMDS49::$monPdoMDS49->exec($insertionFinale);

		/*$laLigne = $res->fetch();
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
		*/
	
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
		if( ( !empty($username)) && (!empty($password)) )
		{
        // Prepare a select statement
        	$sql = ("SELECT compte.IDINSCRIT, MAILPERSO, MDPMD5 FROM compte INNER JOIN inscrits ON compte.IDINSCRIT = inscrits.IDINSCRIT WHERE MAILPERSO = :username") ;
            
	        if($stmt = $pdo->prepare($sql))
	        {
	            // Bind variables to the prepared statement as parameters
	            $stmt->bindParam("username", $param_username, PDO::PARAM_STR);
	            
	           
	            
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
	                        $hashed_password = $row["MDPMD5"];
	                        if(password_verify($password, $hashed_password))
	                        {
	                            
                            
	                            // Store data in session variables
	                            $_SESSION["loggedin"] = true;
	                            $_SESSION["compte.IDINSCRIT"] = $id;
	                            $_SESSION["MAILPERSO"] = $username;                            
	                           

	                            // Redirect user to welcome page
	                            header("location: index.php");	
								

	                        } else{
	                            // Display an error message if password is not valid
	                            $password_err = "The password you entered was not valid.";
	                        }
	                    }
	                } else{
	                    // Display an error message if username doesn't exist
	                    $username_err = "No account found with that username.";
	                }
	            } else{
	                echo "Oops! Something went wrong. Please try again later.";
	            }
	        }
        
				
		}
	}	
}
?>
