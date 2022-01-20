<?php
    //serve unicamente alla connesione al Database

    $servername = "localhost";//127.0.0.1
    $username = "root";
    $password = "";
    $dbName="Palestra";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
?>