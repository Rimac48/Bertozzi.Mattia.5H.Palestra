<?php
    session_start();
    session_destroy();
    setcookie("Utente","",time()-4000);
    header("Location: Index.php");
?>