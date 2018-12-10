<form action="index.php?uc=information&action=benevoles" method=post>

<p><H1>Liste des benevoles</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
                <td>Nom :</td>
                <td>Prénom :</td>
                <td>Diplôme:</td>
            </tr> 
        <?php
		
        foreach( $benevoles as $benevole)
        {
            $num = $benevole['IDINTERVENANT'];
            $nom = $benevole['NOMINTERVENANT'];
            $prenom = $benevole['PRENOMINTERVENANT'];
            $diplome = $benevole['DIPLOME'];
            $couthoraire = $benevole['COUTHORAIRE'];
            $rolesabic = $benevole['ROLESABIC'];
            ?>
            <tr>    
                <td width=150><?php echo $nom ?></a></td>
                <td width=150><?php echo $prenom ?></td>
                <td width=300><?php echo $diplome ?></td>
                <?php 
                ?>
				
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>
    </form>
