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
			$nomF=$_REQUEST['nom'];
			$prenomF=$_REQUEST['prenom'];
			$dateNaissanceF=$_REQUEST['dateNaissance'];
			$sexeF=$_REQUEST['sexe'];
			$adresseF=$_REQUEST['adresse'];
			$villeF=$_REQUEST['ville'];
			$telephoneF=$_REQUEST['telephone'];
			$emailF=$_REQUEST['email'];
			$etudesSuiviesF=$_REQUEST['etudesSuivies'];
			$disciplineSportF=$_REQUEST['disciplineSport'];
			$clubLicencieF=$_REQUEST['clubLicencie'];
			$adresseClubF=$_REQUEST['adresseClub'];
			$sessionDepartF=$_REQUEST['sessionDepart'];
			$membreBureauF=$_REQUEST['membreBureau'];
			$membreEquipeTechF=$_REQUEST['membreEquipeTech'];
			$animationJeuneF=$_REQUEST['animationJeune'];
			$detailAnimationJeuneF=$_REQUEST['detailAnimationJeune'];
			$organisationClubF=$_REQUEST['organisationClub'];
			$fonctionOrganisateurClubF=$_REQUEST['fonctionOrganisateurClub'];
			$motivationsInscriptionF=$_REQUEST['motivationsInscription'];
			$nomTuteurF=$_REQUEST['nomTuteur'];
			$prenomTuteurF=$_REQUEST['prenomTuteur'];
			$formationTuteurF=$_REQUEST['formationTuteur'];
			$adresseTuteurF=$_REQUEST['adresseTuteur'];
			$mailTuteurF=$_REQUEST['mailTuteur'];

			$msgErreurs=getErreursSaisieDemande($nomF,$prenomF,$dateNaissanceF,$sexeF,$adresseF,$villeF,$telephoneF,$emailF,$etudesSuiviesF,$disciplineSportF,$clubLicencieF,$adresseClubF,$sessionDepartF,$animationJeuneF,$detailAnimationJeuneF,$organisationClubF,$fonctionOrganisateurClubF,$motivationsInscriptionF,$nomTuteurF,$prenomTuteurF,$formationTuteurF,$adresseTuteurF,$mailTuteurF);
			include ("vues/v_erreurs.php");

		if(empty($msgErreurs))
		{	
			include("vues/v_validationFormulaire.php");
			$pdo->insertionDonnees($nomF,$prenomF,$dateNaissanceF,$sexeF,$adresseF,$villeF,$telephoneF,$emailF,$etudesSuiviesF,$disciplineSportF,$clubLicencieF,$adresseClubF,$sessionDepartF,$membreBureauF,$membreEquipeTechF,$animationJeuneF,$detailAnimationJeuneF,$organisationClubF,$fonctionOrganisateurClubF,$motivationsInscriptionF,$nomTuteurF,$prenomTuteurF,$formationTuteurF,$adresseTuteurF,$mailTuteurF);
			break;
		}
	}
}
?>