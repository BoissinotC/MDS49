<form action="index.php?uc=information&action=stageq" method=post>
<p><H1>Liste des Stages</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
            <td>Id Session :</td>
            <td>Date début :</td>
            <td>Date Fin :</td>
            <td>Id Stage : </td>
            <td>Hebergement:</td>
            </tr> 
        <?php
		
        foreach( $lesStages as $unStage)
        {
            $idSession = $unStage['IDSESSION'];
            $dateDebut = $unStage['DATEDEBUT'];
            $dateFin = $unStage['DATEFIN'];
            $idStage = $unStage['IDSTAGE'];
            $hebergement = $unStage['NOMHEBERGEMENT'];
            ?>
            <tr>
                <td width=150><?php echo $idSession ?></a></td>
                <td width=150><?php echo $dateDebut ?></td>
                <td width=300><?php echo $dateFin ?></td>
                <td width=300><?php echo $idStage ?></td>
                <td width=200><?php echo $hebergement ?></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>
</form>
