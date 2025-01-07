<?php
session_start();

$dbhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tonci_635715';

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if (!$conn) {
    die('Connessione al database fallita: ' . mysqli_connect_error());
}

$idSfida = $_GET['idSfida'];
$nuovoStato = $_GET['nuovoStato'];

$sql = "UPDATE Sfide SET stato = '$nuovoStato' WHERE id = '$idSfida'";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>