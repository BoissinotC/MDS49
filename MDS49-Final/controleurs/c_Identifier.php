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
            header("location: index.php");
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
                header("index.php?uc=identifier&action=seConnecter");
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

        header('Location: index.php');
    }

	case 'inscrire':{

        include("vues/v_inscrire.php");
        break;
    }

    case 'confirmerInscrire' :{
        //test des erreurs
        // Le message
        $message = "Line 1\r\nLine 2\r\nLine 3";

        // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
        $message = wordwrap($message, 70, "\r\n");

        // Envoi du mail
        mail('rousselp@saintemarie-cholet.eu', 'Mon Sujet', $message);
        //insertion dans la base de données
        break;
    }
}



?>
