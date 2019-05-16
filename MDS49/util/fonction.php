<?php 
function envoyerMail($adresseMail,$mdp)
{
  $message='Voici votre mot de passe : ';
  $lienSite='<br /> <br /> Lien du site : http://gr03.sio-cholet.fr/index.php?uc=identifier&action=seConnecter';
  $message .= $mdp;
  $message .= $lienSite;

  // Envoi du mail
  mail($adresseMail, 'Inscription Site', $message, "Content-type: text/html");
  //insertion dans la base de données
}

function genererMdp()
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < 8; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}

function getErreursSaisieDemande($nom,$prenom,$dateNaissance,$sexe,$adresse,$ville,$telephone,$email,$etudesSuivies,$disciplineSport,$clubLicencie,$adresseClub,$sessionDepart,$animationJeune,$detailAnimationJeune,$organisationClub,$fonctionOrganisateurClub,$motivationsInscription,$nomTuteur,$prenomTuteur,$formationTuteur,$adresseTuteur,$mailTuteur)
{
	$lesErreurs = array();
	if($nom=="")
	{
		$lesErreurs[]="Il faut saisir le champ nom";
	}
	if($prenom=="")
	{
		$lesErreurs[]="Il faut saisir le champ prenom";
	}
	if($dateNaissance=="")
	{
		$lesErreurs[]="Il faut saisir le champ date de naissance";
	}
	if($sexe=="")
	{
		$lesErreurs[]="Il faut saisir le champ sexe";
	}
	if($adresse=="")
	{
		$lesErreurs[]="Il faut saisir le champ adresse";
	}
	if($ville=="")
	{
		$lesErreurs[]="Il faut saisir le champ ville";
	}
	if($telephone=="")
	{
		$lesErreurs[]="Il faut saisir le champ telephone";
	}
	if($email=="")
	{
		$lesErreurs[]="Il faut saisir le champ email";
	}
	if($etudesSuivies=="")
	{
		$lesErreurs[]="Il faut saisir le champ etude suivie";
	}
	if($disciplineSport=="")
	{
		$lesErreurs[]="Il faut saisir le champ discipline sportive";
	}
	if($clubLicencie=="")
	{
		$lesErreurs[]="Il faut saisir le champ le club ou vous etes licencie";
	}
	if($adresseClub=="")
	{
		$lesErreurs[]="Il faut saisir le champ adresse du club";
	}
	if($sessionDepart=="")
	{
		$lesErreurs[]="Il faut saisir le champ session depart";
	}
	if ($animationJeune=='O') {		
		if($detailAnimationJeune=="")
		{
			$lesErreurs[]="Il faut saisir le champ details animation des jeunes";
		}
	}
	if ($organisationClub=='O') {			
		if($fonctionOrganisateurClub=="")
		{
			$lesErreurs[]="Il faut saisir le champ fonction de l'organisateur du club";
		}
	}
	if($motivationsInscription=="")
	{
		$lesErreurs[]="Il faut saisir le champ motivation de l'inscription";
	}
	if($nomTuteur=="")
	{
		$lesErreurs[]="Il faut saisir le champ nom du tuteur";
	}
	if($prenomTuteur=="")
	{
		$lesErreurs[]="Il faut saisir le champ prenom du tuteur";
	}
	if($formationTuteur=="")
	{
		$lesErreurs[]="Il faut saisir le champ formation du tuteur";
	}
	if($adresseTuteur=="")
	{
		$lesErreurs[]="Il faut saisir le champ adresse du tuteur";
	}
	if($mailTuteur=="")
	{
		$lesErreurs[]="Il faut saisir le champ mail du tuteur";
	}
	return $lesErreurs;
}

function getErreursSaisieInscription($adresseMail)
{
	$lesErreurs = array();
	if($adresseMail=="")
	{
		$lesErreurs="Veuillez saisir une adresse mail";
	}
	return $lesErreurs;
}

function getErreursSaisieConnexion($adresseMail,$mdp)
{
	$lesErreurs = array();
	if($adresseMail=="")
	{
		$lesErreurs[]="Veuillez saisir une adresse mail";
	}
	if($mdp=="")
	{
		$lesErreurs[]="Veuillez saisir un mot de passe";
	}
	return $lesErreurs;
}


?>