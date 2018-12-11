<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'affecterBenevole' : 
		{
			$listeActivite = $pdo->getLesActivites();
			$listeBenevole = $pdo->getLesBenevoles();
			include("vues/v_affecterB.php");
			break;
		}
		case 'confirmAffectationB' : 
		{
			$idIntervenant = $_REQUEST['benevole'];
			$idActivite = $_REQUEST['activite'];
			$pdo->affectionIntervenant($idActivite, $idIntervenant);
			header('Location: index.php?uc=gestion&action=validAffec');
			break;
		}
		case 'affecterAnimateur' :
		{
			$listeActivite = $pdo->getLesActivites();
			$listeAnimateur = $pdo->getLesAnimateurs();
			include("vues/v_affecterA.php");
			break;
		}
		case 'confirmAffectationA' : 
		{
			$idIntervenant = $_REQUEST['animateur'];
			$idActivite = $_REQUEST['activite'];
			$pdo->affectionIntervenant($idActivite, $idIntervenant);
			header('Location: index.php?uc=gestion&action=validAffec');
			break;
		}
		case 'affecterIntervenant' :
		{
			$listeActivite = $pdo->getLesActivites();
			$listeIntervenant = $pdo->getlesIntervenants();
			include("vues/v_affecterI.php");
			break;
		}
		case 'confirmAffectationI' : 
		{
			$idIntervenant = $_REQUEST['intervenant'];
			$idActivite = $_REQUEST['activite'];
			$pdo->affectionIntervenant($idActivite, $idIntervenant);
			header('Location: index.php?uc=gestion&action=validAffec');
			break;
		}
		case 'validAffec' :
		{
			include("vues/v_affectInter.php");
			break;
		}
		case 'choixInscrit' :
		{
			$lesInscrits = $pdo->getLesInscrits();
			include("vues/v_choixInscrit.php");
			break;
		}
		case 'evalStagiaire' : 
		{
			$idJury = $_REQUEST['valueJury'];
			$inscrit = $_REQUEST['inscrit'];
			$valueEvalInscrit = $_REQUEST['avisEval'];
			$pdo->choixInscritEval($inscrit, $valueEvalInscrit, $idJury);
			header("index.php?uc=gestion&action=validEval");
			break;
		}
	}
?>