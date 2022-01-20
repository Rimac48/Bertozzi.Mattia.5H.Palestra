<?php

    include "dbConnection.php";

    session_start();
    
    //Raccolgo i dati dalla form
    $DataInizio = $_POST['DataInizio'];
    $DataFine = $_POST['DataFine'];

    echo "<h1>RESOCONTO ABBONAMENTO</h1>";
    echo "<h2>Servizi selezionati: </h2>";

    //Prende i servizi selezionati nella forma e la mette nell'array Servizi
    $Servizi = isset($_POST['Servizi']) ? $_POST['Servizi'] : array();

    foreach($Servizi as $Servizio) //Stampo i servizi selezionati
    {
      echo $Servizio . '<br/>';  
    }

    $CostoTot=0;

    //prende il costo dei servizi e li somma al costo totale
    for($i=0;$i<count($Servizi);$i++)
    {
        $sql = " SELECT Costo FROM Servizio WHERE Nome= '".$Servizi[$i]."' ";
        $result = mysqli_query($conn, $sql);
        $result->num_rows;
        $row = $result->fetch_assoc();
        $CostoTot+=(int)$row["Costo"];
    }

    echo "<h4>Costo Totale: ".$CostoTot." €</h4>";

    //inserisce L'abbonamento nel Database degli abbonamenti
    $sql = "INSERT INTO Abbonamento (idCliente,DataInizio,DataFine,CostoTot)
    VALUES('".$_SESSION['idCliente']."', '".$DataInizio."', '".$DataFine."', '".$CostoTot."')";
    mysqli_query($conn, $sql);

    //Prende gli id degli abbonamenti dello stesso cliente 
    $sql = " SELECT idAbbonamento FROM Abbonamento WHERE idCliente= '".$_SESSION['idCliente']."' ";
    $result = mysqli_query($conn, $sql);
    $result->num_rows;
    $row = $result->fetch_assoc();
    $idAbbonamneto=$row["idAbbonamento"];

    //Per gli abbonamenti va poi a riempire l'altra tabella Con i Servizi legati all'abbonamento
    for($i=0;$i<count($Servizi);$i++)
    {
        $sql = " SELECT * FROM Servizio WHERE Nome= '".$Servizi[$i]."' ";
        $result = mysqli_query($conn, $sql);
        $result->num_rows;
        $row = $result->fetch_assoc();

        $sql = "INSERT INTO ServizioAbbonamento (idAbbonamento,idServizio)
        VALUES('".$idAbbonamneto."', '".$row["idServizio"]."')";
        mysqli_query($conn, $sql);
    }


    mysqli_close($conn);
?>