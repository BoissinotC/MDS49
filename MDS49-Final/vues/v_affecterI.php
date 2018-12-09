<!DOCTYPE html>
<html>
<head>
	<title>Affectation Intervenant</title>
</head>
<body>
	<form action="index.php?uc=gestion&action=confirmAffectationI" method=post>
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
    	<p />Sélectionnez un intervenant :<p /><br />
    	<select id="intervenant" name="intervenant" size="5">
<?php 
			foreach( $listeIntervenant as $intervenant) 
			{
        		echo '<option value="'.$intervenant['IDINTERVENANT'].'">'.$intervenant['NOMINTERVENANT'].' : '.$intervenant['PRENOMINTERVENANT'].' '.$intervenant['COMPETENCE'].' '.$intervenant['COUTHORAIRE'] .'</option>';
			}
?>
    	</select>
    <div align="center">
    	<input type="submit" value = "Valider l'affectation" /> 
    </div>
 </form>
</body>
</html>