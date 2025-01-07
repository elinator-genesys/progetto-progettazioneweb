<?php
session_start();
$dbhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tonci_635715';

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$idTarget = $_SESSION['idTarget'];
$nome = $_POST['nomeIn'];
$cognome = $_POST['cognomeIn'];
$nomeUtente = $_POST['nomeUtenteIn'];
$email = $_POST['emailIn'];
$telefono = $_POST['telefonoIn'];
if($_POST['livello'] == ''){
    $livello = 'Principiante';
}
else {
    $livello = $_POST['livello'];
}

$sql = "UPDATE Utenti SET nome = '$nome', cognome = '$cognome', nomeUtente = '$nomeUtente', email = '$email', telefono = '$telefono', livello = '$livello' WHERE id = $idTarget";

if (mysqli_query($conn, $sql) === TRUE) {
    header('Location: Profilo.php');
    exit;
} 
else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

mysqli_close($conn);
?>