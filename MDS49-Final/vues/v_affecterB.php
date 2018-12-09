<!DOCTYPE html>
<html>
<head>
	<title>Affectation Bénévole</title>
</head>
<body>
	<form action="index.php?uc=gestion&action=confirmAffectationB" method=post>
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
    	<p />Sélectionnez un bénévole :<p /><br />
    	<select id="benevole" name="benevole" size="5">
<?php 
			foreach( $listeBenevole as $benevole) 
			{
				echo '<option value="'.$benevole['IDINTERVENANT'].'">'.$benevole['NOMINTERVENANT'].' : '.$benevole['PRENOMINTERVENANT'].' '.$benevole['COMPETENCE'].'</option>';
			}
?>
    	</select><br><br>
    	<input type="submit" value = "Valider l'affectation" /> 
 </form>
</body>
</html>