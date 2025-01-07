<!DOCTYPE html>
<html lang = "it">
    <head>
        <meta charset = "utf-8">
        <title>Circolo Tennis "Il Sombrero"</title>
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta name = "author" content = "Elia Tonci">
        <meta name = "generator" content = "VSCode">
        <meta name = "keywords" content = "Tennis">

        <link rel="stylesheet" type="text/css" href="../CSS/RegLog.css">        
    </head>
    <body>
        <div id = "titolo">
            <h1>Circolo Tennis "Il Sombrero"</h1>
        </div>
        <div id = "up">
            <form action = "Registrazione.php" method = "post" id = "registrazione">
                <div class = "r">
                    <h3>Registrati</h3>
                </div>
                <div class = "r">
                    <label for = "nomeReg">Nome*</label><input type = "text" id = "nomeReg" name = "nomeReg" pattern = "^[A-Z][a-z]+(?:\s?[a-z]+)?$" required>
                </div>
                <div class = "r">
                    <label for = "cognomeReg">Cognome*</label><input type = "text" id = "cognomeReg" name = "cognomeReg" pattern = "^[A-Z][a-z]+(?:\s?[a-z]+)?$" required>
                </div>
                <div class = "r">
                    <label for = "emailReg">E-mail</label><input type = "email" id = "emailReg" name = "emailReg" required>
                </div>
                <div class = "r">
                    <label for = "nomeUtenteReg">Nome Utente</label><input type = "text" id = "nomeUtenteReg" name = "nomeUtenteReg" required>
                </div>
                <div class = "r">
                    <label for = "passwordReg">Password**</label><input type = "password" id = "passwordReg" name = "passwordReg" pattern = "^(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$" required>
                </div>
                <button id = "registra" type = "submit">Registra</button>
                <p id = "controlloNomeCognome">*Nome e cognome devono iniziare per maiuscola.</p>
                <p id = "controlloPassword">**La password deve contenere almeno una lettera<br>maiuscola, una minuscola e un carattere speciale,<br>e deve essere lunga almeno 8 caratteri.</p>
                <?php
                if (isset($_GET['errore']) && $_GET['errore'] == '3') {
                    echo "<p style='color:red;' style='font-weight:bold;'>Nome Utente già in utilizzo</p>";
                }
                else if (isset($_GET['errore']) && $_GET['errore'] == '4') {
                    echo "<p style='color:red;' style='font-weight:bold;'>Email già in utilizzo</p>";
                }
                ?>
            </form>
        </div>
        <p>--- oppure ---</p>
        <div id = "down">
            <form action = "Login.php" method = "post" id = "login">
                <div class = "r">
                    <h3>Accedi</h3>
                </div>
                <div class = "r">
                    <label for = "nomeUtenteLog">Nome Utente</label><input type = "text" id = "nomeUtenteLog" name = "nomeUtenteLog" required>
                </div>
                <div class = "r">
                    <label for = "passwordLog">Password</label><input type = "password" id = "passwordLog" name = "passwordLog" required>
                </div>
                <button id = "accedi" type = "submit">Accedi</button>
                <?php
                    if (isset($_GET['errore']) && $_GET['errore'] == '1') {
                        echo "<p style='color:red;' style='font-weight:bold;'>Dati non corretti</p>";
                    }
                    else if (isset($_GET['errore']) && $_GET['errore'] == '2') {
                        echo "<p style='color:red;' style='font-weight:bold;'>Nome Utente inesistente</p>";
                    }
                ?>
            </form>
        </div>        
    </body>
</html>
