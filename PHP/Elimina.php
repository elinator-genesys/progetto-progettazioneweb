<?php
$dbhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tonci_635715';

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if(isset($_POST['idSfidaT'])){
    $idSfida = $_POST['idSfidaT'];
    
    $sql = "DELETE FROM Sfide WHERE id = '$idSfida'";
    mysqli_query($conn, $sql);
    header('Location: PrenotaCampoTennis.php');
}
else if(isset($_POST['idSfidaP'])){
    $idSfida = $_POST['idSfidaP'];
    
    $sql = "DELETE FROM Sfide WHERE id = '$idSfida'";
    mysqli_query($conn, $sql);
    header('Location: PrenotaCampoPadel.php');
}
else {
    $idSfida = $_POST['idSfida'];
    
    $sql = "DELETE FROM Sfide WHERE id = '$idSfida'";
    mysqli_query($conn, $sql);
    header('Location: Sfida.php');
}
mysqli_close($conn);
?>