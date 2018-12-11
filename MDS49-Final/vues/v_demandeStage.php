<form action="index.php?uc=stage&action=confirmerStage" method="POST">
<p>
    <h1>Identification du/de la candidat(e)</h1><br />
    <table width="500">
		<tbody>
		    <tr><td>Nom : </td><td><input type="text" id="nom" name="nom" /></td></tr>
		    <tr><td>Prénom : </td><td><input type="text" id="prenom" name="prenom" /></td></tr>
		    <tr><td>Date de naissance : </td><td><input type="date" id="dateNaissance" name="dateNaissance" /></td></tr>
		    <tr><td>Sexe : 
		    </td><td><select id="sexe" name="sexe">
		    <option value="H">Homme</option>
		    <option value="F">Femme</option>
			</select></td></tr>
			<tr><td>Ville : </td><td><input type="text" id="ville" name="ville" /></td></tr>
		    <tr><td>Adresse : </td><td><input type="text" id="adresse" name="adresse"/></td></tr>
		    <tr><td>Téléphone : </td><td><input type="text" id="telephone" name="telephone"/></td></tr>
		    <tr><td>E-mail : </td><td><input type="text" id="email" name="email"/></td></tr>
		    <tr><td>Études suivies : </td><td><input type="text" id="etudesSuivies" name="etudesSuivies"/></td></tr>
		    <tr><td>Discipline sportive partiquée : </td><td><input type="text" id="disciplineSport" name="disciplineSport"/></td></tr>
			<tr><td>Dans quel club êtes-vous licencié(e) : </td><td><input type="text" id="clubLicencie" name="clubLicencie"/></td></tr>
			<tr><td>Adresse du Club : </td><td><input type="text" id="adresseClub" name="adresseClub"/></td></tr>
			<tr><td>Session départementale souhaitée : </td><td><input type="text" id="sessionDepart" name="sessionDepart"/></td></tr>
		</tbody>
	</table>
	<br />
	<h1>Expérience associative</h1><br />
	<table width="500">
		<tbody>
			<tr><td>Etes-vous membre d'un comité direteur ou d'un bureau? :
			</td><td><input type="radio" id="membreBureau" name="membreBureau" value="O" checked/> <label for="membreBureau">Oui</label>
			<input type="radio" id="membreBureau" name="membreBureau" value="N" /> <label for="membreBureau">Non</label></td></tr>
			<tr><td>Etes-vous membre d'une équipe technique ? :
			</td><td><input type="radio" id="membreEquipeTech" name="membreEquipeTech" value="O" checked/> <label for="membreEquipeTech">Oui</label>
			<input type="radio" id="membreEquipeTech" name="membreEquipeTech" value="N" /> <label for="membreEquipeTech">Non</label></td></tr>
			<tr><td>Assurez-vous une animation pour les jeunes ? :
			</td><td><input type="radio" id="animationJeune" name="animationJeune" value="O" checked/> <label for="animationJeune">Oui</label>
			<input type="radio" id="animationJeune" name="animationJeune" value="N" /> <label for="animationJeune">Non</label></td></tr>
			<tr><td>Si oui, détaillez : </td><td><input type="text" id="detailAnimationJeune" name="detailAnimationJeune"/></td></tr>
			<tr><td>Participez-vous aux organisations de vote club ? :
			</td><td><input type="radio" id="organisationClub" name="organisationClub" value="O" checked/> <label for="organisationClub">Oui</label>
			<input type="radio" id="organisationClub" name="organisationClub" value="N"/> <label for="organisationClub">Non</label></td></tr>
			<tr><td>Si oui, quelles fonctions occupez-vous ? : </td><td><input type="text" id="fonctionOrganisateurClub" name="fonctionOrganisateurClub" /></td></tr>
			<tr><td>Merci de nous indiquez en quelques lignes les motivations de votre inscription :
			</td><td><input type="text" id="motivationsInscription" name="motivationsInscription"/></td></tr>
		</tbody>
	</table>


	<br />
	<h1>Dans le cadre de la délivrance du CFGA, merci d'indiquer une personne référente (tuteur)</h1><br />
	<table width="350">
		<tbody>
			<tr><td>Nom tuteur : </td><td><input type="text" id="nomTuteur" name="nomTuteur" /></td></tr>
			<tr><td>Prénom tuteur : </td><td><input type="text" id="nomTuteur" name="prenomTuteur" /></td></tr>
			<tr><td>Formation : </td><td><input type="text" id="nomTuteur" name="formationTuteur" /></td></tr>
			<tr><td>Adresse : </td><td><input type="text" id="nomTuteur" name="adresseTuteur" /></td></tr>
			<tr><td>Mail : </td><td><input type="text" id="nomTuteur" name="mailTuteur" /></td></tr>
		</tbody>
	</table>
<br/><br/><br/>
	<input type="submit" value="Valider">

</p>
</form>