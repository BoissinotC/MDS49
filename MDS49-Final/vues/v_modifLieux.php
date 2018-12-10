<!doctype html>
<html>
    <head>
        <title>Modification d'un lieu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
   <p><h1>Lieu :</h1></p><BR/>
	<form action="index.php?uc=lieux&action=confirmModifLieux&num=<?php echo $num ;?>" method="post">
   
		<table>
		<tbody>
			<tr><td>Nom Hebergement</td><td><input type="text" name="TNomHebergement" value="<?php echo $unLieu['NOMHEBERGEMENT'];?>"/></td></tr>
			<tr><td>Adresse</td><td><input type="text" name="TAdresse" value="<?php echo $unLieu['ADRESSEHEBER'];?>"/></td></tr>	
			<tr><td>Code postal</td><td><input type="text" name="TCodepostal" value="<?php echo $unLieu['CODEPOSTALHEBER'];?>"/></td></tr>	
			<tr><td>Cout </td><td><input type="text" name="TCout" value="<?php echo $unLieu['COUTHEBER'];?>"/></td></tr>	
			<tr><td>Capacite</td><td><input type="text" name="TCapacite" value="<?php echo $unLieu['CAPACITEHEBER'];?>"/></td></tr>			
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Confirmer la modification">
	</form>
 
	
	</body>
</html>