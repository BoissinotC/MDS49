<!doctype html>
<html>
    <head>
        <title>Suppression d'un lieu d'hebergement</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
   <p><h1>Lieu d'hebergement supprime :</h1></p><BR/>
	<form action="index.php?uc=lieux&action=confirmSuppLieux&num=<?php echo $num ;?>" method="post">
   
		<table>
		<tbody>
			<tr><td>Nom Hebergement</td><td><?php echo $unLieu['NOMHEBERGEMENT'];?></td></tr>
			<tr><td>Adresse</td><td><?php echo $unLieu['ADRESSEHEBER'];?></td></tr>	
			<tr><td>Code postal</td><td><?php echo $unLieu['CODEPOSTALHEBER'];?></td></tr>	
			<tr><td>Cout</td><td><?php echo $unLieu['COUTHEBER'];?></td></tr>
			<tr><td>Capacite</td><td><?php echo $unLieu['CAPACITEHEBER']; ?></td></tr>			
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Confirmer la suppression">
	</form>
 
	
	</body>
</html>