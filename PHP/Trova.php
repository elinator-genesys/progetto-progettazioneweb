<?php
session_start();

$dbhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tonci_635715';

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if(!$conn){
    die('Connessione al database fallita: ' . mysqli_connect_error());
}

$idUtente = $_SESSION['idTarget'];
$sql = "SELECT nomeUtente, email, livello FROM Utenti WHERE id <> '$idUtente' AND nomeUtente <> 'admin'";

if(isset($_GET['nome']) && $_GET['nome'] != "")
    $sql .= " AND nome = '" . $_GET['nome'] . "'";

if(isset($_GET['cognome']) && $_GET['cognome'] != "")
    $sql .= " AND cognome = '" . $_GET['cognome'] . "'";

if(isset($_GET['nomeUtente']) && $_GET['nomeUtente'] != "")
    $sql .= " AND nomeUtente = '" . $_GET['nomeUtente'] . "'";

if(isset($_GET['livello']) && $_GET['livello'] != ""){
        $sql .= " AND livello = '" . $_GET['livello'] . "'";
}
$result = mysqli_query($conn, $sql);

if($result){
    $utenti = array();
    while($row = mysqli_fetch_assoc($result)){
        $utenti[] = $row;
    }
    echo json_encode($utenti);
}
else{
    echo json_encode(array());
}

mysqli_close($conn);
?>