<nav>
    <ul>
        <li class="accueil"><a href="index.php">Accueil</a>
        </li>
        <li class="information"><a href="#">Information</a>
        <ul class="submenu">
            <li><a href="#">Hébergements</a></li>
            <li><a href="#">Intervenants</a></li>
            <li><a href="#">Animateurs</a></li>
            <li><a href="index.php?uc=information&action=voirBenevoles">Bénévoles</a></li>
            <li><a href="#">Stages</a></li>
        </ul>
        </li>
        <li class="gestion"><a href="#">Gestion</a>
        <ul class="submenu">
            <li><a href="#">Lieux d'hébergements</a></li>
            <li><a href="#">Inervenants</a></li>
            <li><a href="#">Animateurs</a></li>
            <li><a href="#">Bénévoles</a></li>
            <li><a href="#">Évaluation du Stagiaire</a></li>
            <li><a href="#">Gestion Stages</a></li>
            <li><a href="#">Gestion Planning</a></li>
        </ul>
        </li>
        <li class="stage"><a href="index.php?uc=stage&action=demandeStage">Stage</a></li> 
        <?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){?>
        <li class="identification"><a href="index.php?uc=identifier&action=seConnecter">S'identifier</a></li> <?php } else { ?>
        <li class="identification"><a href="index.php?uc=identifier&action=seDeconnecter">Deconnexion</a></li> <?php } ?>

        </ul>
</nav>