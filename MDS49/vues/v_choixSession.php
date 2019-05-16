<form action="index.php?uc=information&action=planning" method=post>
    <h2>Liste des sessions</h2>
    <div align="center">
		<p>Sélectionnez la session :</p><br />
    	<select id="idsession" name="idsession" size="5">
<?php 
			foreach( $lesSessions as $session) 
			{
				echo '<option value="'.$session['IDSESSION'].'">'.$session['DATEDEBUT'].' : '.$session['DATEFIN'].'</option>';
			}
?>
    	</select>
        <br><br>
        <input type="submit" name="Confirmer" value="Confirmer">
    </div>
</form>