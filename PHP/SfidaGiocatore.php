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
if(isset($_POST['giocatoreDaSfidare'])){
    $destinatario = $_POST['giocatoreDaSfidare'];

    $sql = "SELECT id, COUNT(*) FROM Utenti WHERE nomeUtente = '$destinatario'";
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($result);
    if($row['COUNT(*)'] == 0){
        header('Location: Sfida.php?errore=1');
        exit;
    }
    else {
        $idDestinatario = $row['id'];
        if($idUtente == $idDestinatario){
            header('Location: Sfida.php');
            exit;
        }
        $sql = "INSERT INTO Sfide(idSfidante, idDestinatario) VALUES ('$idUtente', '$idDestinatario')";
        mysqli_query($conn, $sql);
        header('Location: Sfida.php?successo=1');
        exit;
    }
}
else {
    header('Location: Sfida.php');
    exit;
}

mysqli_close($conn);
?>