<p><H1>Planning</H1></p><br>

        <table border=3 cellspacing=1 >
            <tr>
                <td>Activité :</td>
                <td>Heure Debut :</td>
                <td>Heure Fin :</td>
                <td>Jour :</td>
            </tr> 
        <?php
		
        foreach( $planning as $plann)
        {
            $activitelib = $plann['LIBELLEACTIVITE'];
            $heureDebut = $plann['HEUREDEBUT'];
            $heureFin = $plann['HEUREFIN'];
            $jourderoule = $plann['JOUR_DEROULER'];
            ?>
            <tr>
                <td width=150><?php echo $activitelib ?></a></td>
                <td width=150><?php echo $heureDebut ?></a></td>
                <td width=150><?php echo $heureFin ?></td>
                <td width=300>Jour <?php echo $jourderoule ?></td>
                <?php 
                ?>
				
            </tr>
            <?php 
        }
        ?>
        </table>
