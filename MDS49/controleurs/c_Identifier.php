<?php 

$action = $_REQUEST['action'];
switch ($action) {
	case 'seConnecter':{

		
		include("vues/v_connecter.php");
		break;
	}
	case 'confirmConnecter :'{
	//requête pour vérifier si l'utilisateur est déjà dans la base de données

	// si il y est le connecter

	//sinon message erreur (non inscrit ou mot de passe erronné)

	}

	case 'Inscrire :'{

		include("vues/v_inscrire.php");

	}

	case 'confirmerInscrire'{
		//test des erreurs

		//insertion dans la base de données
	}
}



?>
