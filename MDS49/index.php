<?php
session_start();
require_once("util/class.pdoMDS49.inc.php");
require_once("util/fonction.php");
include("vues/v_entete.php") ;
include("vues/v_menuHorizontal.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("index.php?uc=identifier&action=seConnecter");
}
if (!isset($_REQUEST['uc']))
{
		$uc = 'accueil';
}
else 
{
		$uc = $_REQUEST['uc'];
}

$pdo = pdoMDS49::getPdoMDS49();


switch ($uc) {
	case 'accueil': 
	{
		include("vues/v_accueil.php");
		break;
	}
	
	case 'identifier':
	{	
		include ("controleurs/c_Identifier.php");
		break;
	}

	case 'information' :
	{
		include ("controleurs/c_Information.php");
		break;
	}

	case 'gestion' :
	{
		include("controleurs/c_gestion.php");
		break;
	}

	case 'stage':
	{
		include ("controleurs/c_Stage.php");
		break;
	}
	
	case 'lieux':
	{
		include ("controleurs/c_gestionLieux.php");
		break;
	}	
}

?>
