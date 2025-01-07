<?php
session_start();
if(!isset($_SESSION['idTarget']))
    header('Location: RegLog.php');
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title>Circolo Tennis "Il Sombrero" - Sfida Qualcuno</title>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta name = "author" content = "Elia Tonci">
        <meta name = "generator" content = "VSCode">
        <meta name = "keywords" content = "Tennis">

        <link rel = "stylesheet" type = "text/css" href = "../CSS/Sfida.css">
    </head>
    <body>
        <h1 id = "titolo">Sfida Qualcuno</h1>
        <div id = "container">
            <div id = "indice">
                <h3 id = "indiceTitolo">Indice</h3>
                <ul>
                    <li><a href = "Index.php">HomePage</a></li>
                    <li><a href = "PrenotaCampoTennis.php">Tennis</a></li>
                    <li><a href = "PrenotaCampoPadel.php">Padel</a></li>
                    <li><a href = "PrenotaLezioneTennis.php">Prenota Lezione</a></li>
                    <li><a href = "Profilo.php">Profilo Personale</a></li>
                    <li><a href = "CercaUtente.php">Cerca Utente</a></li>
                </ul>
            </div>
            <div id = "sfide">
                <form action = "SfidaGiocatore.php" method = "post" id = "lanciaSfida">
                    <h3>Lancia una Nuova Sfida</h3>
                    <div class = "r">
                        <p>Inserisci il nome utente del giocatore che vuoi sfidare</p>
                    </div>
                    <div class = "r">
                        <input type = "text" id = "giocatoreDaSfidare" name = "giocatoreDaSfidare"><button id = "sfida" type = "submit">Sfida</button>
                    </div>
                    <?php
                        if (isset($_GET['errore']) && $_GET['errore'] == '1') {
                            echo "<p style='color:red;' style='font-weight:bold;'>Nome Utente inesistente</p>";
                        }
                        if (isset($_GET['successo']) && $_GET['successo'] == '1') {
                            echo "<p style='color:green;' style='font-weight:bold;' style='font-size:large;'>Sfida Lanciata!</p>";
                        }
                    ?>
                </form>
                <div id = "sfideLanciate">
                    <h3>Stato Sfide Lanciate</h3>
                    <table id = "lanciate"></table>
                </div>
                <div id = "sfideRicevute">
                    <h3>Sfide Ricevute</h3>
                    <table id = "ricevute"></table>
                </div>
            </div>
        </div>

        <script src = "../JS/Sfida.js"></script>
    </body>
</html>