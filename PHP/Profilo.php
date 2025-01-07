<?php
session_start();
if(!isset($_SESSION['idTarget']))
    header('Location: RegLog.php');

$dbhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'tonci_635715';

$conn = mysqli_connect($dbhost, $username, $password, $dbname);

$target = $_SESSION['idTarget'];
$sql = "SELECT id, nome, cognome, nomeUtente, telefono, email, livello FROM Utenti WHERE id = '$target'";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $nome = $row['nome'];
        $cognome = $row['cognome'];
        $nomeUtente = $row['nomeUtente'];
        $tel = $row['telefono'];
        $email = $row['email'];
        $livello = $row['livello'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title>Circolo Tennis "Il Sombrero" - Profilo</title>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta name = "author" content = "Elia Tonci">
        <meta name = "generator" content = "VSCode">
        <meta name = "keywords" content = "Tennis">

        <link rel = "stylesheet" type = "text/css" href = "../CSS/Profilo.css">
    </head>
    <body>
        <div id = "titolo">
            <h1>Profilo Personale</h1>
        </div>
        <div id = "container">
            <div id = "indice">
                <h3 id = "indiceTitolo">Indice</h3>
                <ul>
                    <li><a href = "Index.php">HomePage</a></li>
                    <li><a href = "PrenotaCampoTennis.php">Tennis</a></li>
                    <li><a href = "PrenotaCampoPadel.php">Padel</a></li>
                    <li><a href = "PrenotaLezioneTennis.php">Prenota Lezione</a></li>
                    <li><a href = "Sfida.php">Sfida Qualcuno</a></li>
                    <li><a href = "CercaUtente.php">Cerca Utente</a></li>
                </ul>
            </div>
            <div id = "right">
                <form action = "AggiornaProfilo.php" method = "post" id = "profilo">
                    <h3>Profilo Utente</h3>
                    <input type = "hidden" name = "idTarget" value = "<?php echo $target; ?>">
                    <div class = "r">
                        <label for = "nomeIn">Nome</label><input type = "text" id = "nomeIn" name = "nomeIn" pattern = "^[A-Z][a-z]+$" required value = "<?php echo $nome; ?>">
                        <label for = "livello" class = "label-livello">Livello: </label>
                        <select id = "livello" name = "livello">
                            <option value = "">-Seleziona-</option>
                            <option value = "Principiante">Principiante</option>
                            <option value = "Intermedio">Intermedio</option>
                            <option value = "Esperto">Esperto</option>
                        </select>
                    </div>
                    <div class = "r">
                        <label for = "cognomeIn">Cognome</label><input type = "text" id = "cognomeIn" name = "cognomeIn" pattern = "^[A-Z][a-z]+$" required value = "<?php echo $cognome; ?>">
                    </div>
                    <div class = "r">
                        <label for = "nomeUtenteIn">Nome Utente</label><input type = "text" id = "nomeUtenteIn" name = "nomeUtenteIn" value = "<?php echo $nomeUtente; ?>">
                    </div>
                    <div class = "r">
                        <label for = "emailIn">E-mail</label><input type = "email" id = "emailIn" name = "emailIn" value = "<?php echo $email; ?>">
                        <label for = "telefonoIn">Telefono</label><input type = "text" id = "telefonoIn" name = "telefonoIn" pattern = "^\d{10}$" value = "<?php echo $tel; ?>">
                    </div>
                    <button id = "salva" type = "submit">Salva</button>
                    <button id = "prenotazioni" type = "button">Prenotazioni</button>
                    <button id = "logout" type = "button">Logout</button>
                    <?php
                        if ($target == 1) {
                            echo '<button id="disponibilita" type="button" onclick="window.location.href=\'Disponibilità.php\'">Disponibilità</button>';
                        }
                    ?>
                </form>
                <table id = "tabellaPrenotazioni"></table>
            </div>
        </div>

        <script src = "../JS/Profilo.js"></script>
    </body>
</html>