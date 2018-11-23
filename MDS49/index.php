<?php
session_start();
require_once("util/class.pdoMDS49.inc.php");
include("vues/v_entete.php") ;
include("vues/v_menuHorizontal.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: v_login.php");
    exit;
}

if (!isset($_REQUEST['uc']))
		$uc = 'accueil';
else 
		$uc = $_REQUEST['uc'];

$pdo = pdoMDS49::getPdoMDS49();
switch ($uc) {
	case 'accueil': {

	}
	
	case 'identifier':
	{include ("controleurs/c_Identifier.php");
		break;}
	}
?>

