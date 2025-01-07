<?php
session_start();
if(isset($_SESSION['idTarget']))
    $target = $_SESSION['idTarget'];
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title>Circolo Tennis "Il Sombrero" - Home</title> 
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta name = "author" content = "Elia Tonci">
        <meta name = "generator" content = "VSCode">
        <meta name = "keywords" content = "Tennis">

        <link rel = "stylesheet" type = "text/css" href = "../CSS/Home.css">
    </head>
    <body>
        <div id = "titolo">
            <h1>HOMEPAGE</h1>
        </div>
        <div id = "up">
            <div class = "right">
                <img src = "../IMG/iconaracchettaTennis.png" alt = "">
                <a href = "PrenotaCampoTennis.php">
                    <p>Tennis</p>
                </a>
            </div>
            <div class = "left">
                <img src = "../IMG/iconaRacchettaPadel.png" alt = "">
                <a href = "PrenotaCampoPadel.php">  
                    <p>Padel</p>
                </a>
            </div>
        </div>
        <div id = "mid">
            <div class = "right">
                <img src = "../IMG/iconamaestro.png" alt = "">
                <a href = "PrenotaLezioneTennis.php">
                    <p>Prenota Lezione</p>
                </a>
            </div>
            <div class = "left">
                <img src = "../IMG/iconasfida.png" alt = "">
                <a href = "Sfida.php">  
                    <p>Sfida Qualcuno</p>
                </a>
            </div>
        </div>
        <div id = "down">
            <div class = "right">
                <img src = "../IMG/iconaUtente.png" alt = "">
                <a href = "Profilo.php">     
                    <p>Profilo Personale</p>
                </a>
            </div>
            <div class = "left">
                <img src = "../IMG/iconaRicerca.png" alt = "">
                <a href = "CercaUtente.php">
                    <p>Cerca Utente</p>
                </a>
            </div>
        </div>
        <footer>
            <div id = "guida">
                <a href = "../Guida.html">Guida</a>
            </div>
        </footer>
    </body>
</html>