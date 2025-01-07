<?php
session_start();
if(!isset($_SESSION['idTarget']))
    header('Location: RegLog.php');
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title>Circolo Tennis "Il Sombrero" - Padel</title>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta name = "author" content = "Elia Tonci">
        <meta name = "generator" content = "VSCode">
        <meta name = "keywords" content = "Tennis">

        <link rel = "stylesheet" type = "text/css" href = "../CSS/PrenotaCampoTennis.css">
    </head>
    <body>
        <div id = "titolo">
            <?php
            if (isset($_GET['errore']) && $_GET['errore'] == '2') {
                echo "<p style='color:red;' style='font-weight:bold;'>Puoi prenotare per giorni successivi al corrente</p>";
            }
            else if (isset($_GET['errore']) && $_GET['errore'] == '3') {
                echo "<p style='color:red;' style='font-weight:bold;'>Campo al momento non disponibile</p>";
            }
            else if (isset($_GET['errore']) && $_GET['errore'] == '4') {
                echo "<p style='color:red;' style='font-weight:bold;'>Campo già prenotato per questo orario</p>";
            }
            else if (isset($_GET['successo'])){
                echo "<p style='color:green;' style='font-weight:bold;'>Campo prenotato correttamente</p>";
            }
            ?>
            <h1>Padel</h1><br>
            <h3>Seleziona il campo che vuoi prenotare</h3>
        </div>
        <div id = "container">
            <div id = "indice">
                <h3 id = "indiceTitolo">Indice</h3>
                <ul>
                    <li><a href = "Index.php">HomePage</a></li>
                    <li><a href = "PrenotaCampoTennis.php">Tennis</a></li>
                    <li><a href = "PrenotaLezioneTennis.php">Prenota Lezione</a></li>
                    <li><a href = "Sfida.php">Sfida Qualcuno</a></li>
                    <li><a href = "Profilo.php">Profilo Personale</a></li>
                    <li><a href = "CercaUtente.php">Cerca Utente</a></li>
                </ul>
            </div>
            <div id = "right">
                <div id = "up">
                        <h2>Campi Esterni</h2>
                        <div id = "campiEsterni">
                            <div class = "campo" onclick = "sceltaCampo(7)" >
                                <img src = "../IMG/campoPadel.png" alt = "">
                                <p>Campo 1</p>
                            </div>
                            <div class = "campo" onclick="sceltaCampo(8)">
                                <img src = "../IMG/campoPadel.png" alt = "">
                                <p>Campo 2</p>
                            </div>
                        </div>
                </div>
                <div id = "down">
                    <h2>Campi Coperti</h2>
                    <div id = "campiCoperti">
                        <div class = "campo" onclick = "sceltaCampo(9)">
                            <img src = "../IMG/campoPadel.png" alt = "">
                            <p>Campo 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id = "popup" class = "popup">
            <span class = "chiudi" onclick = "chiudiPopup()">&times;</span>
            <form id = "prenotazione" action = "PrenotazioneCampo.php?tennis=0" method = "post">
                <input type = "hidden" id = "campoSelezionato" name = "campoSelezionato" value = "">
                <div class = "r">
                    <label for = "data">Data</label><input type = "date" id = "data" name = "data" required>
                </div>
                <div class = "r">
                    <label for = "orario">Orario</label>
                    <select id = "orario" name = "orario">
                        <option value = "09:00:00">09:00/10:00</option>
                        <option value = "10:00:00">10:00/11:00</option>
                        <option value = "11:00:00">11:00/12:00</option>
                        <option value = "12:00:00">12:00/13:00</option>
                        <option value = "13:00:00">13:00/14:00</option>
                        <option value = "14:00:00">14:00/15:00</option>
                        <option value = "15:00:00">15:00/16:00</option>
                        <option value = "16:00:00">16:00/17:00</option>
                        <option value = "17:00:00">17:00/18:00</option>
                        <option value = "18:00:00">18:00/19:00</option>
                        <option value = "19:00:00">19:00/20:00</option>
                        <option value = "20:00:00">20:00/21:00</option>
                        <option value = "21:00:00">21:00/22:00</option>
                    </select>
                </div>
                <button type = "submit" id = "prenota">Prenota</button>
            </form>
        </div>
        
        <script src = "../JS/PrenotaCampo.js"></script>
    </body>
</html>