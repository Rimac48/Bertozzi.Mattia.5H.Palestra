<?php
    include "CreateDB.php";

    include "dbConnection.php";

    $cookie_name = "Utente";
    //setcookie($cookie_name, "", time());

    //se il cookie c'è loggo con quei dati direttamente
    if(isset($_COOKIE[$cookie_name])){header('Location: Login.php');}
    
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>Log in</title>
 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <script src="Script/scriptLogin.js"> </script>
    <link rel="stylesheet" href="Css/styleLogin.css" type="text/css"/>

</head>
<body>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form id="FormLogin" name="FormLogin" method="POST" action="Login.php">
        
        <h3>Log in</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Username o Email" id="username" name="Username" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="Password" required>

        <input class="login" value="Log in" type="submit" onclick="EffettuaLogin()">
        <div class="social">
          <div class="go"><a target="_blank" href="RecuperoPsw.html">Recupera Psw</a></div>
          <div class="fb"><a target="_blank" href="Registrazione.html">Sign up</a></div>
        </div>
        
    </form>

</body>
</html>
