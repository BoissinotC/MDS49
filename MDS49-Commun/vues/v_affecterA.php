<!DOCTYPE html>
<html>
<head>
	<title>Affectation Animateur</title>
</head>
<body>
	<form action="index.php?uc=gestion&action=confirmAffectationA" method=post>
    <h2>Liste des activites</h2>
    <div align="center">
		<p />Sélectionnez l'activité :<p /><br />
    	<select id="activite" name="activite" size="5">
<?php 
			foreach($listeActivite as $activite) 
			{
				echo '<option value="'.$activite['idActivite'].'">'.$activite['idActivite'].' : '.$activite['competenceRequise'].' : '.$activite['libelleActivite'].'</option>';
			}
		
?>
    	</select>
    	<br><br>
    	<p />Sélectionnez un animateur :<p /><br />
    	<select id="animateur" name="animateur" size="5">
<?php 
			foreach( $listeAnimateur as $animateur) 
			{
				echo '<option value="'.$animateur['IDINTERVENANT'].'">'.$animateur['NOMINTERVENANT'].' : '.$animateur['PRENOMINTERVENANT'].' '.$animateur['COMPETENCE'].' '.$animateur['COUTHORAIRE'] .'</option>';
			}
?>
    	</select>
    <br><br>
    	<input type="submit" value = "Valider l'affectation" /> 
 </form>
</body>
</html>