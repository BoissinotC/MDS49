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
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
        {
            header("Location: http://gr03.sio-cholet.fr/index.php");
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
                header("Location: http://gr03.sio-cholet.fr/index.php?uc=identifier&action=seConnecter");
                exit;
            }
            else
            {
                $pdo->seConnecter($username,$password);
            }
            
            // Close statement
            unset($stmt);
        
        }
        break;
    }
    case 'seDeconnecter':{
        session_destroy();  
        header('Location: http://gr03.sio-cholet.fr/index.php');
        exit;
        break;
    }
    case 'inscrire':{
        include("vues/v_inscrire.php");
        break;
    }
     case 'confirmerInscrire' :{
        $email=$_REQUEST['emailF'];
        $mdp=genererMdp();
        echo "Un email vous a été envoyé dans votre boîte mail avec votre nouveau mot de passe.";

        $pdo->nouveauCompte($email, $mdp);

        envoyerMail($email, $mdp);

        break;
    }
}
?>