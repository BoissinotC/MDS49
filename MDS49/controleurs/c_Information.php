<?php 
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'voirBenevoles' :
		{
			$benevoles = $pdo->getLesBenevoles();
			include ("vues/v_Benevoles.php");
		}




	}









?>