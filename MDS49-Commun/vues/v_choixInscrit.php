
<form action="index.php?uc=gestion&action=evalStagiaire" method=post>
    <h2>Liste des stagiaire</h2>
    <div align="center">
		<p>Sélectionnez le stagiaire :</p><br />
    	<select id="inscrit" name="inscrit" size="5">
<?php 
			foreach( $lesInscrits as $inscrit) 
			{
				echo '<option value="'.$inscrit['IDINSCRIT'].'">'.$inscrit['NOMINSCRIT'].' '.$inscrit['PRENOMINSCRIT'].' : '.$inscrit['SPORTPRATIQUE'].' : '.$inscrit['NOMCLUB'].'</option>';
			}
?>
    	</select>

    	<br><br><br><br>
    	Evaluation du stagiaire : <input type="radio" id="FAVORABLE" name="avisEval" value="FAVORABLE"
         checked><label for="huey">Favorable</label> <input type="radio" id="DEFAVORABLE" name="avisEval"><label for="huey">Defavorable</label>
        <br><br><br><br>

        Jury numero : <input type="text" name="valueJury" size="1">
        <br><br><br><br>
        <input type="submit" name="Confirmer" value="Confirmer">
    </div>
</form>

