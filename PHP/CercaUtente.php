<?php
session_start();
if(!isset($_SESSION['idTarget']))
    header('Location: RegLog.php');
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title>Circolo Tennis "Il Sombrero" - Cerca Utente</title>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta name = "author" content = "Elia Tonci">
        <meta name = "generator" content = "VSCode">
        <meta name = "keywords" content = "Tennis">

        <link rel = "stylesheet" type = "text/css" href = "../CSS/CercaUtente.css">
    </head>
    <body>
        <div id = "titolo">
            <h1>Cerca Utente</h1>
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
                    <li><a href = "Profilo.php">Profilo Personale</a></li>
                </ul>
            </div>
            <div id = "cercaUtente">
                <p id = "filtri" onclick = "filtri()">Filtri</p>
                <div id = containerFiltri>
                    <div class = "r">
                        <label for = "cercaNome">Nome</label><input type = "text" id = "cercaNome" name = "nome">
                    </div>
                    <div class = "r">
                        <label for = "cercaCognome">Cognome</label><input type = "text" id = "cercaCognome" name = "cognome">
                    </div>
                    <div class = "r">
                        <label for = "cercaNomeUtente">Nome Utente</label><input type = "text" id = "cercaNomeUtente" name = "nomeUtente">
                    </div>
                    <div class = "r">
                        <label for = "livello">Livello</label>
                        <select id = "livello" name = "livello">
                            <option value = "">-Seleziona-</option>
                            <option value = "Principiante">Principiante</option>
                            <option value = "Intermedio">Intermedio</option>
                            <option value = "Esperto">Esperto</option>
                        </select>
                    </div>
                </div>
                <table id = "tabellaUtenti"></table>
                <button id = "cerca" type = "button">Cerca</button>
            </div>
        </div>

        <script src = "../JS/CercaUtente.js"></script>
    </body>
</html>