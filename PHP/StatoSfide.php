<?php
session_start();

$dbhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tonci_635715';

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if (!$conn) {
    die("Connessione al database fallita: " . mysqli_connect_error());
}

$idUtente = $_SESSION['idTarget'];
$sql = "SELECT id, idSfidante, idDestinatario, stato FROM Sfide WHERE idSfidante = '$idUtente' OR idDestinatario = '$idUtente'";
$result = mysqli_query($conn, $sql);
if($result){
    $sfida = array();
    while($row = mysqli_fetch_assoc($result)){
        $idDestinatario = $row['idDestinatario'];
        $idSfidante = $row['idSfidante'];
        $stato = $row['stato'];
        $idSfida = $row['id'];
        if($idSfidante == $idUtente) {
            $sql = "SELECT nomeUtente FROM Utenti WHERE id = '$idDestinatario'";
            $result2 = mysqli_query($conn, $sql);
            $row2 = $result2->fetch_assoc();
            $destinatario = $row2['nomeUtente'];
            $sfidante = "";
        }
        else if($idDestinatario == $idUtente) {
            $sql = "SELECT nomeUtente FROM Utenti WHERE id = '$idSfidante'";
            $result2 = mysqli_query($conn, $sql);
            $row2 = $result2->fetch_assoc();
            $sfidante = $row2['nomeUtente'];
            $destinatario = "";
        }
        $sfida[] = array($sfidante, $destinatario, $stato, $idSfida);
    }
    echo json_encode($sfida);
}
else {
    echo json_encode(array());
}

mysqli_close($conn);
?>