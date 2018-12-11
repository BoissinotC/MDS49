<?php 
function envoyerMail($adresseMail, $mdp)
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


?>