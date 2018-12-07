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

}
?>