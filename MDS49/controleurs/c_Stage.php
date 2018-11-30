<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'demandeStage':
	{
		include("vues/v_demandeStage.php");
		break;
	}
	case 'confirmerStage':
	{
		break;
	}
}


?>


