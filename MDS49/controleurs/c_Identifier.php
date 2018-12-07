<?php 

$action = $_REQUEST['action'];

switch($action) {
	case 'seConnecter':{

    include("vues/v_login.php");
    break;
    }
	
		
	
	case 'confirmConnecter ':{
	//requête pour vérifier si l'utilisateur est déjà dans la base de données

        // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    }
 
    // Define variables and initialize with empty values
        $username = "";
        $password = "";
        $username_err = "";
        $password_err = "";
 
        // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
            
    $connecter=$pdo->seConnecter($username,$password);
        // Close statement
        unset($stmt);
        }
    
        // Close connection
        unset($pdo);
        break;

	}

	case 'Inscrire ':{

		include("vues/v_inscrire.php");

	}

	case 'confirmerInscrire' :{
		//test des erreurs

		//insertion dans la base de données
	}
}



?>
