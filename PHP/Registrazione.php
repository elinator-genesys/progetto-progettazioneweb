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

$nome = $_POST['nomeReg'];
$cognome = $_POST['cognomeReg'];
$email = $_POST['emailReg'];
$nomeUtente = $_POST['nomeUtenteReg'];
$password = password_hash($_POST['passwordReg'], PASSWORD_DEFAULT);

$sql = "SELECT nomeUtente, email FROM Utenti";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    if($row['nomeUtente'] == $nomeUtente){
        header('Location: RegLog.php?errore=3');
        exit;
    }

    if($row['email'] == $email){
        header('Location: RegLog.php?errore=4');
        exit;
    }
}

mysqli_free_result($result);
$sql = "INSERT INTO Utenti(nome, cognome, nomeUtente, email, pass) VALUES ('$nome', '$cognome', '$nomeUtente', '$email', '$password')";

if (mysqli_query($conn, $sql) === TRUE) {
    $sql = "SELECT id FROM Utenti WHERE nome = '$nome' AND cognome = '$cognome' AND nomeUtente = '$nomeUtente'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $idTarget = $row['id'];
        }
    }
    $_SESSION['idTarget'] = $idTarget;
    header('Location: Index.php');
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

mysqli_close($conn);
?>