<!doctype html>
<html>
    <head>
        <title>Creation d'un nouveau lieu</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="style.css" rel="stylesheet" type="text/css" /> 

    </head>
	
	
   <body>
   <p><h1>Nouveau lieu cree :</h1></p><BR/>
	<form action="index.php?uc=lieux&action=confirmAddLieux" method="post">
   
		<table>
		<tbody>
			<tr><td>NomHebergement</td><td><input type="text" name="TNomHebergement" size=20></td></tr>
			<tr><td>Ville </td><td>
			<select name="TVille">
				<?php foreach( $villes as $ville)
				{
					echo "<option value='".$ville['IDVILLE']."'>".$ville['NOMVILLE']."</option>";
				} ?>
				
			</select>
				</td></tr>	
			<tr><td>Adresse</td><td><input type="text" name="TAdresse" size=20></td></tr>	
			<tr><td>Code postal</td><td><input type="number" step="1" min="10000" max="99999" name="TCodepostal" size=5></td></tr>	
			<tr><td>Cout</td><td><input type="number" step="0.01" name="TCout" size=20></td></tr>
			<tr><td>Capacite</td><td><input type="number" step="1" name="TCapacite" size=20></td></tr>		
		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>