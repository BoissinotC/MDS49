    <form action="index.php?uc=information&action=hebergements" method="post">
        <p><H1>Liste des Hebergements</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
            <td>Id Hebergement :</td>
            <td>Adresse :</td>
            <td>Code Postal  :</td>
            <td>Nom :</td>
            <td>Coût Hebergement :</td>
            <td>Capacité  :</td>
            <td>Ville  :</td>
            </tr> 
        <?php
		
        foreach( $lesHebergements as $unHebergement)
        {
            $idhebergement = $unHebergement['IDHEBERGEMENT'];
            $adresseH = $unHebergement['ADRESSEHEBER'];
            $codePostalH = $unHebergement['CODEPOSTALHEBER'];
            $nomH = $unHebergement['NOMHEBERGEMENT'];
            $coutH = $unHebergement['COUTHEBER'];
            $capacitH = $unHebergement['CAPACITEHEBER'];
            $nomV = $unHebergement['NOMVILLE'];
            ?>
            <tr>
                <td width=150><?php echo $idhebergement ?></a></td>
                <td width=150><?php echo $adresseH ?></td>
                <td width=100><?php echo $codePostalH ?></td>
                <td width=200><?php echo $nomH ?></td>
                <td width=200><?php echo $coutH ?></td>
                <td width=200><?php echo $capacitH ?></td>
                <td width=200><?php echo $nomV ?></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

    </form>