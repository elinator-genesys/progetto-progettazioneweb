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

$idUtente = $_SESSION['idTarget'];
$dataCorrente = date('Y-m-d');

$sql = "SELECT nome, giorno, orario FROM PrenotazioniCampi INNER JOIN Campi ON numeroCampo = numero WHERE idUtente = '$idUtente'";
$result = mysqli_query($conn, $sql);

if($result){
    $prenotazioni = array();
    while($row = mysqli_fetch_assoc($result)){
        if($row['giorno'] < $dataCorrente)
            continue;
        $prenotazioni[] = $row;
    }
    echo json_encode($prenotazioni);
}
else {
    echo json_encode(array());
}

mysqli_close($conn);
?>