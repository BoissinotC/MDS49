<nav>
    <ul>
        <li class="accueil"><a href="index.php">Accueil</a>
        </li>
        <li class="information"><a>Information</a>
        <ul class="submenu">
            <li><a href="index.php?uc=information&action=hebergements">Hébergements</a></li>
            <li><a href="index.php?uc=information&action=intervenants">Intervenants</a></li>
            <li><a href="index.php?uc=information&action=animateurs">Animateurs</a></li>
            <li><a href="index.php?uc=information&action=benevoles">Bénévoles</a></li>
            <li><a href="index.php?uc=information&action=stage">Stages</a></li>
            <li><a href="index.php?uc=information&action=session">Planning</a></li>
        </ul>
        </li>
        <?php if(!isset($_SESSION["TYPECOMPTE"]) || ($_SESSION["TYPECOMPTE"]) != "ADMIN" )
        { header("Location : http://gr03.sio-cholet.fr/index.php");} else { ?>
        <li class="gestion"><a>Gestion</a>
        <ul class="submenu">
            <li><a href="index.php?uc=lieux&action=voirLieux">Lieux d'hébergements</a></li>
            <li><a href="index.php?uc=gestion&action=affecterIntervenant">Intervenants</a></li>
            <li><a href="index.php?uc=gestion&action=affecterAnimateur">Animateurs</a></li>
            <li><a href="index.php?uc=gestion&action=affecterBenevole">Bénévoles</a></li>
            <li><a href="index.php?uc=gestion&action=choixInscrit">Évaluation du Stagiaire</a></li>
        </ul>
        </li>
        <?php } ?> 
        <?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true)
        { ?>
            <li class="identification"><a href="index.php?uc=identifier&action=seConnecter">S'identifier</a></li> <?php 
        } 
        else 
        { ?>

            <li class="stage"><a href="index.php?uc=stage&action=demandeStage">Stage</a></li> 
            <li class="identification"><a href="index.php?uc=identifier&action=seDeconnecter">Deconnexion</a></li>
        <?php } ?>

        </ul>
</nav>