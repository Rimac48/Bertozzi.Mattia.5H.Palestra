<?php
    //Aggiunge i Servizi al Database

    include "dbConnection.php";

    $sql = "INSERT INTO Servizio (Nome,Costo)
    VALUES('Spa', '50')";
    mysqli_query($conn, $sql);

    $sql = "INSERT INTO Servizio (Nome,Costo)
    VALUES('Sala Pesi', '19')";
    mysqli_query($conn, $sql);

    $sql = "INSERT INTO Servizio (Nome,Costo)
    VALUES('Box', '25')";
    mysqli_query($conn, $sql);

    $sql = "INSERT INTO Servizio (Nome,Costo)
    VALUES('Corso Spinning', '35')";
    mysqli_query($conn, $sql)

    mysqli_close($conn);
?>  