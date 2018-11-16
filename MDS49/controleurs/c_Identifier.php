<?php 

$action = $_REQUEST['action'];
switch ($action) {
	case 'seConnecter':{
		// Check if the user is already logged in, if yes then redirect him to welcome page

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
	}
 
		
		
 
		// Define variables and initialize with empty values
		$username = $password = "";
		$username_err = $password_err = "";
 
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
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT compte.IDINSCRIT, MAILPERSO, MDPMD5 FROM users INNER JOIN inscrit ON compte.IDINSCRIT = inscrits.IDINSCRIT WHERE MAILPERSO = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["MAILPERSO"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["MAILPERSO"];
                        $hashed_password = $row["MDPMD5"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["compte.IDINSCRIT"] = $id;
                            $_SESSION["MAILPERSO"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
    	}
    
    	// Close connection
    	unset($pdo);
	}
		include("vues/v_login.php");
		break;
	}
	case 'confirmConnecter ':{
	//requête pour vérifier si l'utilisateur est déjà dans la base de données

	// si il y est le connecter

	//sinon message erreur (non inscrit ou mot de passe erronné)

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
