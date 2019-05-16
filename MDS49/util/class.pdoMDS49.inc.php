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
 	public function getUnLieu($num){
		$req = "SELECT * FROM LIEUHEBERGEMENT INNER JOIN VILLE ON LIEUHEBERGEMENT.IDVILLE = VILLE.IDVILLE WHERE IDHEBERGEMENT= $num";
		$res = PdoMDS49::$monPdo->query($req);
		$laligne = $res->fetch();
		return $laligne;
	}

	public function getLesVILLEs(){
		$req="SELECT IDVILLE,NOMVILLE FROM VILLE";
		$res = PdoMDS49::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function creerLieuxHebergement($VILLE,$adresse,$codepostal,$nomHebergement,$cout,$capacite){
		$req = "INSERT INTO `LIEUHEBERGEMENT`(`IDVILLE`, `ADRESSEHEBER`, `CODEPOSTALHEBER`, `NOMHEBERGEMENT`, `COUTHEBER`, `CAPACITEHEBER`) VALUES (
		'$VILLE','$adresse','$codepostal','$nomHebergement','$cout','$capacite')";
		$res = PdoMDS49::$monPdo->exec($req);
	}
	public function modifLieuxHebergement($num,$adresse,$codepostal,$nomHebergement,$cout,$capacite){
		$res = PdoMDS49::$monPdo-> prepare ('UPDATE LIEUHEBERGEMENT SET ADRESSEHEBER = :ADRESSEHEBER, CODEPOSTALHEBER = :CODEPOSTALHEBER, NOMHEBERGEMENT = :NOMHEBERGEMENT, COUTHEBER = :COUTHEBER, CAPACITEHEBER = :CAPACITEHEBER WHERE IDHEBERGEMENT = :IDHEBERGEMENT');
		$res-> bindValue('IDHEBERGEMENT',$num);
		$res-> bindValue('ADRESSEHEBER',$adresse,PDO::PARAM_STR);
		$res-> bindValue('CODEPOSTALHEBER',$codepostal,PDO::PARAM_STR);
		$res-> bindValue('NOMHEBERGEMENT',$nomHebergement,PDO::PARAM_STR);
		$res-> bindValue('COUTHEBER',$cout,PDO::PARAM_STR);
		$res-> bindValue('CAPACITEHEBER',$capacite,PDO::PARAM_INT);
		$res-> execute();
	}
	public function supprLieu($num){
		$res = PdoMDS49::$monPdo -> prepare ('DELETE FROM LIEUHEBERGEMENT WHERE IDHEBERGEMENT = :IDHEBERGEMENT');
		$res-> bindValue('IDHEBERGEMENT',$num);
		$res-> execute();
	}
 
	public function seConnecter ($username,$password) 
	{
		if( (!empty($username)) && !empty($password)) 
		{
        // Prepare a select statement
			//$passhash = md5($password);
        	$sql = ("SELECT MAILCOMPTE, MDPMD5, TYPECOMPTE FROM COMPTE  WHERE MAILCOMPTE = :MAILCOMPTE AND MDPMD5 = :MDPMD5") ;
            
	        if($stmt = PdoMDS49::$monPdo->prepare($sql))
	        {
	            // Bind variables to the prepared statement as parameters
	            $stmt->bindValue("MAILCOMPTE", $username, PDO::PARAM_STR);
	            $stmt->bindValue("MDPMD5", $password, PDO::PARAM_STR);
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
	                        $username = $row["MAILCOMPTE"];
	                        //$hashed_password = $row["MDPMD5"];
	                            
                            
	                            // Store data in session variables
	                            $_SESSION["loggedin"] = true;
	                            $_SESSION["MAILCOMPTE"] = $username; 
	                            $_SESSION["TYPECOMPTE"] = $row["TYPECOMPTE"];
	                           
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
	public function getLesINSCRITS() 
	{
		$req = "SELECT INSCRITS.IDINSCRIT, INSCRITS.NOMINSCRIT, INSCRITS.PRENOMINSCRIT, INSCRITS.TELPERSO, INSCRITS.MAILPERSO, INSCRITS.SPORTPRATIQUE, VILLE.NOMVILLE, CLUB.NOMCLUB FROM INSCRITS INNER JOIN VILLE ON VILLE.idVILLE = INSCRITS.idVILLE INNER JOIN CLUB ON CLUB.idCLUB = INSCRITS.idCLUB ORDER BY INSCRITS.idInscrit";
		$res = PdoMDS49::$monPdo->query($req);
		$lesINSCRITS = $res->fetch();
		return $lesINSCRITS;
	}
	public function choixInscritEval($inscrit, $valueEvalInscrit, $idJury)
	{
		$req = PdoMDS49::$monPdo->prepare("INSERT INTO EVALUATION VALUES (:VidJury, :VidInscrit, :VresultEval)");
		$req->bindValue('VidJury', $idJury);
		$req->bindValue('VidInscrit', $inscrit);
		$req->bindValue('VresultEval', $valueEvalInscrit);
		$req->execute();
	}
	public function getLesHebergements()
	{
		$req = "SELECT LIEUHEBERGEMENT.`IDHEBERGEMENT`, LIEUHEBERGEMENT.`ADRESSEHEBER`, LIEUHEBERGEMENT.`CODEPOSTALHEBER`, LIEUHEBERGEMENT.`NOMHEBERGEMENT`, LIEUHEBERGEMENT.`COUTHEBER`, LIEUHEBERGEMENT.`CAPACITEHEBER`, VILLE.NOMVILLE FROM `LIEUHEBERGEMENT` INNER JOIN VILLE on LIEUHEBERGEMENT.IDVILLE = VILLE.IDVILLE";
		$res = PdoMDS49::$monPdo->query($req);
		$lesHebergements = $res->fetchAll();
		return $lesHebergements;
	}
	
	public function getLesStages()
	{
		$req = "SELECT SESSION.IDSESSION, SESSION.DATEDEBUT, SESSION.DATEFIN, SESSION.IDSTAGE, LIEUHEBERGEMENT.NOMHEBERGEMENT FROM SESSION INNER JOIN LIEUHEBERGEMENT on SESSION.IDHEBERGEMENT = LIEUHEBERGEMENT.IDHEBERGEMENT";
		$res = PdoMDS49::$monPdo->query($req);
		$lesStages = $res->fetchAll();
		return $lesStages;
	}	
	public function insertionDonnees($nom,$prenom,$dateNaissance,$sexe,$adresse,$VILLE,$telephone,$email,$etudesSuivies,$disciplineSport,$CLUBLicencie,$adresseCLUB,$sessionDepart,$membreBureau,$membreEquipeTech,$animationJeune,$detailAnimationJeune,$organisationCLUB,$fonctionOrganisateurCLUB,$motivationsInscription,$nomTUTEUR,$prenomTUTEUR,$formationTUTEUR,$adresseTUTEUR,$mailTUTEUR)
	{
		$idCLUBSaisiFormulaire = "SELECT IDCLUB FROM CLUB Where NOMCLUB='$CLUBLicencie'";		
		$brutIdCLUBSaisi = PdoMDS49::$monPdo->query($idCLUBSaisiFormulaire);
		$idCLUBSaisi = $brutIdCLUBSaisi->fetch();
		$insertionExpe = "insert into EXPEASSOS (MEMBRECOMITEDIRECTEUR, MEMBREEQUIPETECH, FAIREANIMJEUNE, DETAILSOUIANIM, PARTICIPEORGACLUB, DETAILSORGACLUB) values('$membreBureau', '$membreEquipeTech', '$animationJeune', '$detailAnimationJeune', '$organisationCLUB', '$fonctionOrganisateurCLUB') ";		
		$insertonExperience = PdoMDS49::$monPdo->exec($insertionExpe);
		$idExpe = "select IDEXPE FROM EXPEASSOS Where MEMBRECOMITEDIRECTEUR='$membreBureau'
			AND MEMBREEQUIPETECH='$membreEquipeTech'
			AND FAIREANIMJEUNE='$animationJeune'
			AND DETAILSOUIANIM='$detailAnimationJeune'
			AND PARTICIPEORGACLUB='$organisationCLUB'
			AND DETAILSORGACLUB='$fonctionOrganisateurCLUB' LIMIT 1";		
		$brutIdExperience = PdoMDS49::$monPdo->query($idExpe);
		$insertionFinaleExe = $brutIdExperience->fetch();
		$idVILLEEntree = "select IDVILLE FROM VILLE Where NOMVILLE='$VILLE'";		
		$brutIdVILLE = PdoMDS49::$monPdo->query($idVILLEEntree);
		$idVILLE = $brutIdVILLE->fetch();
		$idTUTEURChercher = "select IDTUTEUR FROM TUTEUR Where NOMTUTEUR='$nomTUTEUR'
			AND PRENOMTUTEUR='$prenomTUTEUR'";	
		$brutResult_idTUTEURChercher = PdoMDS49::$monPdo->query($idTUTEURChercher);
		$idTUTEURtrouve = $brutResult_idTUTEURChercher->fetch();
		$insertionFinale = "insert into INSCRITS (IDCLUB, IDEXPE, IDVILLE, IDTUTEUR, NOMINSCRIT, PRENOMINSCRIT, SEXE, ADRESSEINSCRIT, DATENAISSANCE, TELPERSO, MAILPERSO, ETUDES, SPORTPRATIQUE, MOTIVINSCRIPTION) values('".$idCLUBSaisi['IDCLUB']."', '".$insertionFinaleExe['IDEXPE']."', '".$idVILLE['IDVILLE']."', '".$idTUTEURtrouve['IDTUTEUR']."', '$nom', '$prenom', '$sexe', '$adresse', '$dateNaissance', '$telephone', '$email', '$etudesSuivies', '$disciplineSport', '$motivationsInscription') ";
		$brutInsertionFinaleExe = PdoMDS49::$monPdo->exec($insertionFinale);
	
	}
	
	public function nouveauCompte($email, $mdp)
	{
		$insertionCompte = "insert into COMPTE (MAILCOMPTE, MDPMD5) values('$email', '$mdp') ";		
		$insererCompte = PdoMDS49::$monPdo->exec($insertionCompte);
	}	


	public function getSession() 
	{
		$req = "SELECT * FROM SESSION";
		$res = PdoMDS49::$monPdo->query($req);
		$lesSessions = $res->fetchAll();
		return $lesSessions;
	}

	public function getPlanning() 
	{
		$req = "SELECT LIBELLEACTIVITE, HEUREDEBUT, HEUREFIN, JOUR_DEROULER FROM HORAIRE INNER JOIN ACTIVITE ON ACTIVITE.IDACTIVITE = HORAIRE.IDACTIVITE ORDER BY JOUR_DEROULER, HEUREDEBUT";
		$res = PdoMDS49::$monPdo->query($req);
		$lesActs = $res->fetchAll();
		return $lesActs;
	}
}
?>
