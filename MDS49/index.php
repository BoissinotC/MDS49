<?php
require_once("util/class.pdoMDS49.inc.php");
include("vues/v_entete.php") ;
include("vues/v_menuHorizontal.php") ;

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = pdoMDS49::getPdoMDS49();	 
switch($uc)
{
	case 'information':
		{include("controleurs/c_Information.php");break;}
	case 'gestion' :
		{include("controleurs/c_creationClient.php");break;}
	case 'stage':
		{include("controleurs/c_supprimerClient.php"); break;}
	case 'modifClient':
		{include("controleurs/c_modifierClient.php");break;}
}
?>