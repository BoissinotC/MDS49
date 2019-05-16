<?php 
function envoyerMail($adresseMail)
{
$mail = '$adresseMail'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Hey mon ami !";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \" \"<$adresseMail>".$passage_ligne;
$header.= "Reply-to: \" \" <$adresseMail>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
}
function envoyerMail() {
    // Plusieurs destinataires
    $to  = 'paulroussel144@gmail.com'; // notez la virgule
    // Sujet
    $subject = 'Calendrier des personnes que j ai baise en Août';
    // message
    $message = '
    <html>
     <head>
      <title>Calendrier des personnes que j ai baise en Août</title>
     </head>
     <body>
      <p>Voici les personnes que j\'ai ken au mois d\'Août !</p>
      <table>
       <tr>
        <th>Personne</th><th>Jour</th><th>Mois</th><th>Année</th>
       </tr>
       <tr>
        <td>Josiane</td><td>3</td><td>Août</td><td>1970</td>
       </tr>
       <tr>
        <td>Emma</td><td>26</td><td>Août</td><td>1973</td>
       </tr>
      </table>
     </body>
    </html>
    ';
     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
     // En-têtes additionnels
    $headers[] = 'To: Paul <paulroussel144@gmail.com>';
    $headers[] = 'From: Paul <paulroussel144@gmail.com>';
    $headers[] = 'Cc: paulroussel144@gmail.com';
    $headers[] = 'Bcc: paulroussel144@gmail.com';
     // Envoi
    mail($to, $subject, $message, implode("\r\n", $headers));
}
*/
function envoyerMail() {
$header="MIME-Version: 1.0\r\n";
$header ='From: Paul <paulroussel144@gmail.com>';
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
$message='
<html>
	<body>
		<div align="center">
			<img src="http://www.primfx.com/mailing/banniere.png"/>
			<br />
			J\'ai envoyé ce mail avec PHP !
			<br />
			<img src="http://www.primfx.com/mailing/separation.png"/>
		</div>
	</body>
</html>
';
mail("rousselpaul9@gmail.com", "Salut tout le monde !", $message, $header);
}
?>