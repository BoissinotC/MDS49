<?php 
$action = $_REQUEST['action'];
switch ($action) {
	case 'animateurs':
	{
		$lesAnimateurs = $pdo->getLesAnimateurs();
		include("vues/v_animateur.php");
		break;
	}
	case 'benevoles':{
		$benevoles = $pdo->getLesBenevoles();
			include ("vues/v_benevoles.php");
			break;
	}
	case 'hebergements':{
		$lesHebergements = $pdo->getLesHebergements();
		include("vues/v_hebergements.php");
		break;
	}
	case 'stage':{
		$lesStages = $pdo->getLesStages();
		include("vues/v_stage.php");
		break;
	}
	case 'intervenants':{
		$lesIntervenants = $pdo->getLesIntervenants();
		include("vues/v_intervenants.php");
		break;
	}

	case 'session' :
	{
		$lesSessions = $pdo->getSession();
		include("vues/v_choixSession.php");
		break;
	}

	case 'planning' : 
	{
		$idsession = $_REQUEST['idsession'];
		$planning = $pdo->getPlanning($idsession);
		include("vues/v_planning.php");
		break;
	}
}
?>