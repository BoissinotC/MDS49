<form action="index.php?uc=stage&action=confirmerStage method="post">
<p>
    <h1>Identification du/de la candidat(e)</h1><br />
    <table width="500">
		<tbody>
		    <tr><td>Nom : </td><td><input type="text" name="nom" /></td></tr>
		    <tr><td>Prénom : </td><td><input type="text" name="prenom" /></td></tr>
		    <tr><td>Date de naissance : </td><td><input type="date" name="dateNaissance" /></td></tr>
		    <tr><td>Sexe : 
		    </td><td><select name="sexe">
		    <option value="H">Masculin</option>
		    <option value="F">Féminin</option>
			</select></td></tr>
			<tr><td>Ville : </td><td><input type="text" name="ville" /></td></tr>
		    <tr><td>Adresse : </td><td><input type="text" name="adresse" /></td></tr>
		    <tr><td>Téléphone : </td><td><input type="text" name="telephone" /></td></tr>
		    <tr><td>E-mail : </td><td><input type="text" name="email" /></td></tr>
		    <tr><td>Études suivies : </td><td><input type="text" name="etudesSuivies" /></td></tr>
		    <tr><td>Discipline sportive partiquée : </td><td><input type="text" name="disciplineSport" /></td></tr>
			<tr><td>Dans quel club êtes-vous licencié(e) : </td><td><input type="text" name="clubLicencie" /></td></tr>
			<tr><td>Adresse du Club : </td><td><input type="text" name="adresseClub" /></td></tr>
			<tr><td>Session départementale souhaitée : </td><td><input type="text" name="sessionDepart" /></td></tr>
		</tbody>
	</table>
	<br />
	<h1>Expérience associative</h1><br />
	<table width="500">
		<tbody>
			<tr><td>Etes-vous membre d'un comité direteur ou d'un bureau? :
			</td><td><input type="radio" name="membreBureau" id="O" checked="checked" /> <label for="oui">Oui</label>
			<input type="radio" name="membreBureau" id="N" /> <label for="non">Non</label></td></tr>
			<tr><td>Etes-vous membre d'une équipe technique ? :
			</td><td><input type="radio" name="membreEquipeTech" name="O" id="O" checked="checked" /> <label for="oui">Oui</label>
			<input type="radio" name="membreEquipeTech" name="N" id="N" /> <label for="non">Non</label></td></tr>
			<tr><td>Assurez-vous une animation pour les jeunes ? :
			</td><td><input type="radio" name="animationJeune" name="O" id="O" checked="checked" /> <label for="oui">Oui</label>
			<input type="radio" name="animationJeune" name="N" id="N" /> <label for="non">Non</label></td></tr>
			<tr><td>Si oui, détaillez : </td><td><input type="text" name="detailAnimationJeune" /></td></tr>
			<tr><td>Participez-vous aux organisations de vote club ? :
			</td><td><input type="radio" name="organisationClub" name="O" id="O" checked="checked" /> <label for="oui">Oui</label>
			<input type="radio" name="organisationClub" name="N" id="N" /> <label for="non">Non</label></td></tr>
			<tr><td>Si oui, quelles fonctions occupez-vous ? : </td><td><input type="text" name="fonctionOrganisateurClub" /></td></tr>
			<tr><td>Merci de nous indiquez en quelques lignes les motivations de votre inscription :
			</td><td><input type="text" name="motivationsInscription" /></td></tr>
		</tbody>
	</table>


	<br />
	<h1>Dans le cadre de la délivrance du CFGA, merci d'indiquer une personne référente (tuteur)</h1><br />
	<table width="350">
		<tbody>
			<tr><td>Nom tuteur : </td><td><input type="text" name="nomTuteur" /></td></tr>
			<tr><td>Prénom tuteur : </td><td><input type="text" name="prenomTuteur" /></td></tr>
			<tr><td>Formation : </td><td><input type="text" name="formationTuteur" /></td></tr>
			<tr><td>Adresse : </td><td><input type="text" name="adresseTuteur" /></td></tr>
			<tr><td>Mail : </td><td><input type="text" name="mailTuteur" /></td></tr>
		</tbody>
	</table>
<br/><br/><br/>
	<input type="submit" value="Valider">

</p>
</form>
