<?php
session_start();
if(!isset($_SESSION['idTarget']))
    header('Location: RegLog.php');
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title>Circolo Tennis "Il Sombrero" - Prenota Lezione</title>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta name = "author" content = "Elia Tonci">
        <meta name = "generator" content = "VSCode">
        <meta name = "keywords" content = "Tennis">

        <link rel = "stylesheet" type = "text/css" href = "../CSS/PrenotaLezioneTennis.css">        
    </head>
    <body>
        <div id = "titolo">
            <?php
            if (isset($_GET['errore']) && $_GET['errore'] == '1') {
                echo "<p style='color:red;' style='font-weight:bold;'>Puoi prenotare per giorni successivi al corrente</p>";
            }
            else if (isset($_GET['errore']) && $_GET['errore'] == '2') {
                echo "<p style='color:red;' style='font-weight:bold;'>Orario già occupato</p>";
            }
            else if (isset($_GET['errore']) && $_GET['errore'] == '3') {
                echo "<p style='color:red;' style='font-weight:bold;'>Hai già prenotato questa lezione</p>";
            }
            else if (isset($_GET['errore']) && $_GET['errore'] == '4') {
                echo "<p style='color:red;' style='font-weight:bold;'>Corso già pieno</p>";
            }
            else if (isset($_GET['successo'])){
                echo "<p style='color:green;' style='font-weight:bold;'>Lezione prenotata correttamente</p>";
            }
            ?>
            <h1>Prenota una Lezione</h1>
        </div>
        <div id = "container">
            <div id = "indice">
                <h3 id = "indiceTitolo">Indice</h3>
                <ul>
                    <li><a href = "Index.php">HomePage</a></li>
                    <li><a href = "PrenotaCampoTennis.php">Tennis</a></li>
                    <li><a href = "PrenotaCampoPadel.php">Padel</a></li>
                    <li><a href = "Sfida.php">Sfida Qualcuno</a></li>
                    <li><a href = "Profilo.php">Profilo Personale</a></li>
                    <li><a href = "CercaUtente.php">Cerca Utente</a></li>
                </ul>
            </div>
            <div id = right>
                <div id = "up">
                    <h2>Seleziona il tipo di lezione che vuoi prenotare</h2>
                    <div id = "tipologie">
                        <div class = "lezione" onclick = sceltaLezioneSingola()>
                            <img src = "../IMG/iconaSingolo.png" alt = "">
                            <p>Lezione Privata</p>
                        </div>
                        <div class = "lezione" onclick = "sceltaLezioneGruppo()">
                            <img src = "../IMG/iconaGruppo.png" alt = "">
                            <p>Lezione di Gruppo</p>
                        </div>
                    </div>
                </div>
                <form action = "PrenotazioneLezione.php" method = "post" id = "down"></form>
            </div>
        </div>

        <script src = "../JS/PrenotaLezioneTennis.js"></script>
    </body>
</html>