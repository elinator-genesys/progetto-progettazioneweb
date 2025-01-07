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
$orario = $_POST['orario'];
if(isset($_POST['data'])){
    $data = $_POST['data'];
    $dataCorrente = date('Y-m-d');
    if($data <= $dataCorrente){
        header('Location: PrenotaLezioneTennis.php?errore=1');
        exit;
    }
    $sql = "SELECT COUNT(*) FROM PrenotazioniLezioniSingole WHERE giorno = '$data' AND orario = '$orario'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numPrenotazioni = $row['COUNT(*)'];
    if($numPrenotazioni != 0){
        header('Location: PrenotaLezioneTennis.php?errore=2');
        exit;
    }
    else {
        $sql = "INSERT INTO PrenotazioniLezioniSingole(idUtente, giorno, orario) VALUES ('$idUtente', '$data', '$orario')";
        mysqli_query($conn, $sql);
    }
    mysqli_free_result($result);
}
else if(isset($_POST['giorno'])){
    $giorno = $_POST['giorno'];
    $dataCorrente = date('Y-m-d');
    if($giorno <= $dataCorrente){
        header('Location: PrenotaLezioneTennis.php?errore=1');
        exit;
    }

    $sql = "SELECT COUNT(*) FROM PrenotazioniLezioniGruppo WHERE giorno = '$giorno' AND orario = '$orario'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $numeroPartecipanti = $row['COUNT(*)'];
    
    mysqli_free_result($result);
    $sql = "SELECT COUNT(*) FROM PrenotazioniLezioniGruppo WHERE idUtente = '$idUtente' AND giorno = '$giorno' AND orario = '$orario'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $prenotato = $row['COUNT(*)'];
    if($prenotato != 0){
        header('Location: PrenotaLezioneTennis.php?errore=3');
        exit;
    }

    if($numeroPartecipanti >= 4){
        header('Location: PrenotaLezioneTennis.php?errore=4');
        exit;
    }
    else{
        $sql = "INSERT INTO PrenotazioniLezioniGruppo(idUtente, giorno, orario) VALUES ('$idUtente', '$giorno', '$orario')";
        mysqli_query($conn, $sql);
    }
}

header('Location: PrenotaLezioneTennis.php?successo=1');
mysqli_close($conn);
exit;
?>