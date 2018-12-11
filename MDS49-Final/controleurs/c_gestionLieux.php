<?php
	$action=$_REQUEST['action'];
	switch($action)
	{

		case 'voirLieux' : 
		{
			$lieux = $pdo->getlesHebergements();
			include('vues/v_lieux.php');
			break;
		}

		case 'addLieux' :
		{
			$villes = $pdo->getLesVilles();
			include('vues/v_addlieux.php');
			break;
		}

		case 'confirmAddLieux': 
		{
			$nomHebergement = $_REQUEST['TNomHebergement'];
			$ville = $_REQUEST['TVille'];
			$adresse = $_REQUEST['TAdresse'];
			$codepostal = $_REQUEST['TCodepostal'];
			$cout = $_REQUEST['TCout'];
			$capacite = $_REQUEST['TCapacite'];
			$pdo->creerLieuxHebergement($ville,$adresse,$codepostal,$nomHebergement,$cout,$capacite);
			header('location:http://gr03.sio-cholet.fr/index.php?uc=lieux&action=voirLieux');
			break;


		}

		case 'modifLieux' :
		{
			$num = $_REQUEST['num'];
			$unLieu = $pdo->getUnLieu($num);
			include ("vues/v_modifLieux.php");
			break;
		}

		case 'confirmModifLieux' :
		{
			$num = $_REQUEST['num'];
			$nomHebergement = $_REQUEST['TNomHebergement'];
			$adresse = $_REQUEST['TAdresse'];
			$codepostal = $_REQUEST['TCodepostal'];
			$cout = $_REQUEST['TCout'];
			$capacite = $_REQUEST['TCapacite'];
			$unLieu = $pdo->modifLieuxHebergement($num,$adresse,$codepostal,$nomHebergement,$cout,$capacite);
			header('location:http://gr03.sio-cholet.fr/index.php?uc=lieux&action=voirLieux');
			break;

		}

		case 'suppLieux' : 
		{
			$num = $_REQUEST['num'];
			$unLieu = $pdo->getUnLieu($num);
			include ("vues/v_suppLieux.php");
			break;

		}

		case 'confirmSuppLieux' :
		{
			$num = $_REQUEST['num'];
			$unLieu = $pdo -> supprLieu($num);
			header('location:http://gr03.sio-cholet.fr/index.php?uc=lieux&action=voirLieux');
			break;
		}
	}
?>