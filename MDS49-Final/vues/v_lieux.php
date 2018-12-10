<!doctype html>
<html>

<head>
	<title>Liste lieux</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="design.css" />
        
</head>
<body>
    <form action="index.php?uc=lieux&action=addLieux" method="post">
        <p><H1>Liste des lieux d'hebergements</H1><br>

        <table border=3 >
            <tr>
                <td>Nom hebergement</td>
                <td>Ville :</td>
                <td>Adresse :</td>
                <td>Code postal:</td>
                <td>Cout :</td>
                <td>Capacite :</td>
                <td>Modif</td>
                <td>Supp</td>
            </tr>
        <?php
		
        foreach( $lieux as $lieu)
        {
            $num = $lieu['IDHEBERGEMENT'];
            $nomHebergement = $lieu['NOMHEBERGEMENT'];
            $ville = $lieu['NOMVILLE'];
            $adresse = $lieu['ADRESSEHEBER'];
            $codepostal = $lieu['CODEPOSTALHEBER'];
            $cout = $lieu['COUTHEBER'];
            $capaciteHebergement = $lieu['CAPACITEHEBER'];
            
            ?>
            <tr>
                <td width=150><?php echo $nomHebergement ?></td>
                <td width=150><?php echo $ville ?></td>
                <td width=300><?php echo $adresse ?></td>
                <td width=100><?php echo $codepostal?></td>
                <td width=200><?php echo $cout ?></td>
                <td width=150><?php echo $capaciteHebergement ?></td>
                <?php 

                ?>
				<td width=30><a href=index.php?uc=lieux&action=modifLieux&num=<?php echo $num ?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=lieux&action=suppLieux&num=<?php echo $num ?>><img src="images/supp.png" title="Suppr"></a></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

        <input type="submit" value="Créer un nouveau lieu d'hebergement">
    </form>
</body>
</html>
