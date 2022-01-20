<?php
    include "dbConnection.php";

    session_start();

    $cookie_name = "Utente"; //nome del cookie

    if(!isset($_COOKIE[$cookie_name]))//se non è settato prendo i valore della form
    {
        $UsernameLogin = $_POST['Username'];
        $PasswordLogin = md5($_POST['Password']);
    }
    else //prendo i valori del cookie
    {
        $Dati=explode(";",$_COOKIE[$cookie_name]);
        
        $UsernameLogin=$Dati[0];
        $PasswordLogin=$Dati[1];
    }
    
    echo $UsernameLogin;
    echo $PasswordLogin;

    if($UsernameLogin=="Admin" && $PasswordLogin== md5("Admin") )
    {
        header('Location: Admin.html');
    }

    $sql = " SELECT * FROM Cliente WHERE Email= '".$UsernameLogin."' 
        AND Password= '".$PasswordLogin."' ";

    $result = mysqli_query($conn, $sql);

    //se l'utente esiste
    if(mysqli_num_rows($result)>0)
    {
        $user=mysqli_fetch_assoc($result);

        $_SESSION['idCliente']=$user['idCliente'];

        //echo "benvenuto ".$user["Nome"];

        if(!isset($_COOKIE[$cookie_name]))//se non è settato a questo punto lo creo
        {
            $cookie_value= $UsernameLogin.";".$PasswordLogin;
            setcookie($cookie_name,$cookie_value,time()+50); // 5 min
        }
        header('Location: GestioneUtente.html');//porto alla pagina di gestione avendo loggato
    }
    else
    {
        echo "credenziali errate";
    }

    mysqli_close($conn);
?>  