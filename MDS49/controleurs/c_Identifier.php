<?php 
$action = $_REQUEST['action'];
switch($action) {
    case 'seConnecter':{
 
    include("vues/v_login.php");
    break;
    }
    
        
    
    case 'confirmConnecter':{
       //requête pour vérifier si l'utilisateur est déjà dans la base de données
        // Check if the user is already logged in, if yes then redirect him to welcome page

        $email=$_REQUEST['username'];
        $mdp=$_REQUEST['password'];
        $msgErreurs=getErreursSaisieConnexion($email,$mdp);

        if(empty($msgErreurs)) {

            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
            {
                header("Location: index.php");
                exit;
            }
            else 
            {
                $username_err="";
                $password_err="";
                // Check if username is empty
                if(empty(trim($_REQUEST["username"])))
                {
                    $username_err = "Please enter username.";
                }
                else
                {
                    $username = trim($_REQUEST["username"]);
                }
        
                // Check if password is empty
                if(empty(trim($_REQUEST["password"])))
                {
                    $password_err = "Please enter your password.";
                }
                else
                {
                    $password = trim($_REQUEST["password"]);
                }
        
                // Validate credentials
                
                if($password_err != "" || $username_err != "") 
                {
                    header("Location: index.php?uc=identifier&action=seConnecter");
                    exit;
                }
                else
                {
                    $pdo->seConnecter($username,$password);
                }
                
                ?>
                <script language="javascript">document.location="index.php"</script>
                <?php
                // Close statement
                unset($stmt);
            
            }
            break;
        }
        else{
            foreach($msgErreurs as $erreur)
                {
             ?>     
                  <li><?php echo $erreur ?></li>
            <?php     
                }
        }
        break;
    }
    case 'seDeconnecter':{
        session_destroy();  
        
        ?><script language="javascript">document.location="index.php"</script><?php
        break;
    }
    case 'inscrire':{
        include("vues/v_inscrire.php");
        break;
    }
     case 'confirmerInscrire' :{
        $email=$_REQUEST['emailF'];
        $erreur=getErreursSaisieInscription($email);

        if(empty($erreur)) {            
            $mdp=genererMdp();
            echo "Un email vous a été envoyé dans votre boîte mail avec votre mot de passe.";

            $pdo->nouveauCompte($email, $mdp);

            envoyerMail($email, $mdp);

            break;
        }
        else{
            echo $erreur;
        }
    }
}
?>