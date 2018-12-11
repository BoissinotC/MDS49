<form action="index.php?uc=information&action=intervenants" method=post>
<p><H1>Liste des intervenants</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
            <td>Prénom :</td>
            <td>Nom :</td>
            <td>Diplôme:</td>
            <td>Coût horaire:</td>
            <td>Rôle :</td>
            </tr> 
        <?php
		
        foreach( $lesIntervenants as $unIntervenant)
        {
            $idIntervenant = $unIntervenant['IDINTERVENANT'];
            $prenom = $unIntervenant['PRENOMINTERVENANT'];
            $nom = $unIntervenant['NOMINTERVENANT'];
            $diplome = $unIntervenant['DIPLOME'];
            $coutHoraire = $unIntervenant['COUTHORAIRE'];
            $role = $unIntervenant['ROLESABIC'];
            ?>
            <tr>
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
    </form>