<?php
session_start();

// Connessione al database
$dbhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tonci_635715';

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

// Controlla la connessione
if (!$conn) {
    die('Connessione al database fallita: ' . mysqli_connect_error());
}

$idUtente = $_SESSION['idTarget'];
$numeroCampo = $_POST['campoSelezionato'];
$giorno = $_POST['data'];
$orario = $_POST['orario'];

$dataCorrente = date('Y-m-d');

if($giorno <= $dataCorrente){
    if($_GET['tennis']==1){
        header('Location: PrenotaCampoTennis.php?errore=2');
    }
    else{
        header('Location: PrenotaCampoPadel.php?errore=2');
    }
    exit;
}

$sql = "SELECT disponibile FROM Campi WHERE numero = '$numeroCampo'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$disponibile = $row['disponibile'];
if($disponibile == 0){
    if($_GET['tennis']==1){
        header('Location: PrenotaCampoTennis.php?errore=3');
    }
    else {
        header('Location: PrenotaCampoPadel.php?errore=3');
    }
    exit;
}

mysqli_free_result($result);
$sql = "SELECT COUNT(*) FROM PrenotazioniCampi WHERE numeroCampo = '$numeroCampo' AND giorno = '$giorno' AND orario = '$orario'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$numPrenotazioni = $row['COUNT(*)'];
if($numPrenotazioni != 0){
    if($_GET['tennis']==1){
        header('Location: PrenotaCampoTennis.php?errore=4');
    }
    else {
        header('Location: PrenotaCampoPadel.php?errore=4');
    }
    exit;
}
else{
    $sql2 = "INSERT INTO PrenotazioniCampi(idUtente, numeroCampo, giorno, orario) VALUES ('$idUtente', '$numeroCampo', '$giorno', '$orario')";
    $conn->query($sql2);
}

if($_GET['tennis']==1){
        header('Location: PrenotaCampoTennis.php?successo=1');
}
else {
    header('Location: PrenotaCampoPadel.php?successo=1');
}
mysqli_close($conn);
exit;
?>