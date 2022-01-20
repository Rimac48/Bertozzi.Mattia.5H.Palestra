<?php
    include "dbConnection.php";

    //dati cliente
    $Nome = $_POST['Nome'];
    $Cognome = $_POST['Cognome'];
    $Email = $_POST['Email'];
    $ConfermaEmail = $_POST['ConfermaEmail'];
    $Username = $_POST['Username'];
    //$Password = md5($_POST['Password']);
    $Password = $_POST['Password'];
    $ConfermaPassword = $_POST['ConfermaPassword'];
    $DataNascita = $_POST['DataNascita'];
    $Sesso = $_POST['Sesso'];
    $Cellulare = $_POST['Cellulare'];

    $sql = " SELECT * FROM Cliente WHERE Username= '".$Username."' ";
    $result = mysqli_query($conn, $sql);//conterrà tutte le email dei clienti

    //controllo se l'utente è gia registrato
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        die("il nome utente inserito è gia presente");
    }

    // $sql = "INSERT INTO Cliente (Nome,Cognome,Email,ConfermaEmail,Username,Sesso,Password,ConfermaPassword,DataNascita,Cellulare)
    // VALUES('".$Nome."', '".$Cognome."', '".$Email."', '".$ConfermaEmail."', '".$Username."', '".$Sesso."', '".$Password."', '".$ConfermaPassword."', '".$DataNascita."', '".$Cellulare."')";
    
    //altrimenti lo registra nel database
    $sql = "INSERT INTO Cliente (Nome,Cognome,Email,Username,Sesso,Password,DataNascita,Cellulare)
    VALUES('".$Nome."', '".$Cognome."', '".$Email."', '".$Username."', '".$Sesso."', '".md5($Password)."', '".$DataNascita."', '".$Cellulare."')";

    //echo($sql);

    if (mysqli_query($conn,$sql)) {
      echo "<h1>Registrazione avvenuta con successo!</h1> ";
    } else {
      echo "<h1>Error: ". $sql ." ". $conn->error ."</h1> ";
    }

    mysqli_close($conn);
    die();       
?>