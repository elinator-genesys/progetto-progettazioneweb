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

$nomeUtente = $_POST['nomeUtenteLog'];
$password = $_POST['passwordLog'];

$sql = "SELECT * FROM Utenti WHERE nomeUtente='$nomeUtente'";
$result = mysqli_query($conn, $sql);


if($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['pass'])) {
        $_SESSION['idTarget'] = $row['id'];
        header('Location: Index.php');
        exit;
    } 
    else {
        header('Location: RegLog.php?errore=1');
        exit();
    }
} 
else {
    header('Location: RegLog.php?errore=2');
    exit;
}

mysqli_close($conn);
?>