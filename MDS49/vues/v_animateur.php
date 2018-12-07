    <form action="index.php?uc=information&action=vAnimateur" method="post">
        <p><H1>Liste des Animateurs</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
            <td>Id Intervenant :</td>
            <td>Prénom :</td>
            <td>Nom :</td>
            <td>Diplôme:</td>
            <td>Coût horaire:</td>
            <td>Rôle :</td>
            </tr> 
        <?php
		
        foreach( $lesAnimateurs as $unAnimateurs)
        {
            $idIntervenant = $unAnimateurs['IDINTERVENANT'];
            $prenom = $unAnimateurs['PRENOMINTERVENANT'];
            $nom = $unAnimateurs['NOMINTERVENANT'];
            $diplome = $unAnimateurs['DIPLOME'];
            $coutHoraire = $unAnimateurs['COUTHORAIRE'];
            $role = $unAnimateurs['ROLESABIC'];
            ?>
            <tr>
                <td width=150><?php echo $idIntervenant ?></a></td>
                <td width=150><?php echo $prenom ?></td>
                <td width=300><?php echo $nom ?></td>
                <td width=100><?php echo $diplome ?></td>
                <td width=200><?php echo $coutHoraire ?></td>
                <td width=200><?php echo $role ?></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

        <input type="submit" value="créer un nouveau client">
    </form>