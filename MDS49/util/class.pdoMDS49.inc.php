﻿<?php
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
}
?>