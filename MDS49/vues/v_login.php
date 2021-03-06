<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Entrez vos informations confidentielles pour vous connecter.</p>
        <form action="index.php?uc=identifier&action=confirmConnecter" method="post" align="center">
            <div class="form-group">
                <label>Username</label>
                <input type="email" name="username" class="form-control">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Vous n'avez pas encore de compte ? <a href="index.php?uc=identifier&action=inscrire">Inscrivez-vous</a>.</p>
        </form>
    </div>
</body>
</html>