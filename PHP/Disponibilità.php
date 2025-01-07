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

        <link rel = "stylesheet" type = "text/css" href = "../CSS/Disponibilità.css">
    </head>
    <body>
        <div id = "titolo">
            <h1>Disponibilità Campi</h1>
            <h3>Seleziona i campi ai quali vuoi cambiare la disponibilità</h3>
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
                <form action = "Disponibilità.php" method = "post" id = "campi">
                    <div class = "r">
                        <label for = "campo1">Campo 1</label>
                        <label><input type="radio" name="campo1" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo1" value="0"> Non Disponibile</label>
                    </div>
                    <div class = "r">
                        <label for = "campo2">Campo 2</label>
                        <label><input type="radio" name="campo2" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo2" value="0"> Non Disponibile</label>
                    </div>
                    <div class = "r">
                        <label for = "campo3">Campo 3</label>
                        <label><input type="radio" name="campo3" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo3" value="0"> Non Disponibile</label>
                    </div>
                    <div class = "r">
                        <label for = "campo4">Campo 4</label>
                        <label><input type="radio" name="campo4" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo4" value="0"> Non Disponibile</label>
                    </div>
                    <div class = "r">
                        <label for = "campo5">Campo 5</label>
                        <label><input type="radio" name="campo5" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo5" value="0"> Non Disponibile</label>
                    </div>
                    <div class = "r">
                        <label for = "campo6">Campo 6</label>
                        <label><input type="radio" name="campo6" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo6" value="0"> Non Disponibile</label>
                    </div>
                    <div class = "r">
                        <label for = "campo7">Campo 7</label>
                        <label><input type="radio" name="campo7" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo7" value="0"> Non Disponibile</label>
                    </div>
                    <div class = "r">
                        <label for = "campo8">Campo 8</label>
                        <label><input type="radio" name="campo8" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo8" value="0"> Non Disponibile</label>
                    </div>
                    <div class = "r">
                        <label for = "campo9">Campo 9</label>
                        <label><input type="radio" name="campo9" value="1"> Disponibile</label>
                        <label><input type="radio" name="campo9" value="0"> Non Disponibile</label>
                    </div>
                    <button type = submit>Salva</button>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
    $dbhost = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'tonci_635715';

    $conn = mysqli_connect($dbhost, $username, $password, $dbname);

    if(!$conn){
        die('Connessione al database fallita: ' . mysqli_connect_error());
    }

    if (isset($_POST['campo1'])) {
        $disponibile = $_POST['campo1'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 1";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['campo2'])) {
        $disponibile = $_POST['campo2'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 2";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['campo3'])) {
        $disponibile = $_POST['campo3'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 3";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['campo4'])) {
        $disponibile = $_POST['campo4'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 4";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['campo5'])) {
        $disponibile = $_POST['campo5'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 5";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['campo6'])) {
        $disponibile = $_POST['campo6'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 6";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['campo7'])) {
        $disponibile = $_POST['campo7'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 7";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['campo8'])) {
        $disponibile = $_POST['campo8'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 8";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['campo9'])) {
        $disponibile = $_POST['campo9'];
        $sql = "UPDATE Campi SET disponibile = $disponibile WHERE numero = 9";
        mysqli_query($conn, $sql);
    }

    mysqli_close($conn);
?>