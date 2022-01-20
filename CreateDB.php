<?php
//https://www.w3schools.com/php/php_mysql_intro.asp

$servername = "localhost";//127.0.0.1
$username = "root";
$password = "";
$dbName="Palestra";


//CREO IL DATABASE


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE DATABASE IF NOT EXISTS Palestra";
if (mysqli_query($conn, $sql)) {
  echo "Database -Palestra- created successfully";
} else {
  echo "Error creating database -Palestra- : " . mysqli_error($conn);
}


//CREO LE TABELLE


$conn = new mysqli($servername, $username, $password, $dbName);

// sql to create table CLIENTE
$sql = "CREATE TABLE IF NOT EXISTS Cliente (
  idCliente INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(30) NOT NULL,
  Cognome VARCHAR(30) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  Username VARCHAR(30) NOT NULL,
  Sesso VARCHAR(30),
  Password VARCHAR(250),
  DataNascita VARCHAR(30),
  Cellulare VARCHAR(30)
  )";
if (mysqli_query($conn, $sql)) {
  echo "Table -Cliente- created successfully";
} else {
  echo "Error creating table -Cliente- : " . mysqli_error($conn);
}


// sql to create table ABBONAMENTO
$sql = "CREATE TABLE IF NOT EXISTS Abbonamento (
  idAbbonamento INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  idCliente INT(6) UNSIGNED,
  FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente),
  DataInizio VARCHAR(30) NOT NULL,
  DataFine VARCHAR(30) NOT NULL,
  CostoTot VARCHAR(50) NOT NULL
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table -Abbonamento- created successfully";
} else {
  echo "Error creating table -Abbonamento- : " . mysqli_error($conn);
}


// sql ro create table SERVIZIO
$sql = "CREATE TABLE IF NOT EXISTS Servizio (
  idServizio INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(30) NOT NULL,
  Costo VARCHAR(30) NOT NULL
  )";
  
if (mysqli_query($conn, $sql)) {
  echo "Table -Servizio- created successfully";
} else {
  echo "Error creating table -Servizio- : " . mysqli_error($conn);
}


// sql to create table ServizioAbbonamento
$sql = "CREATE TABLE IF NOT EXISTS ServizioAbbonamento (
  idAbbonamento INT(6) UNSIGNED,
  FOREIGN KEY (idAbbonamento) REFERENCES Abbonamento(idAbbonamento),
  idServizio INT(6) UNSIGNED,
  FOREIGN KEY (idServizio) REFERENCES Servizio(idServizio)
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table -ServizioAbbonamento- created successfully";
} else {
  echo "Error creating table -ServizioAbbonamento- : " . mysqli_error($conn);
}

mysqli_close($conn);
?>