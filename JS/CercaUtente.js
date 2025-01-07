document.getElementById("cerca").addEventListener("click", function(){
    const tabella = document.getElementById("tabellaUtenti");
    svuotaTabella(tabella);
    
    const riga0 = document.createElement("tr");
    const top1 = document.createElement("th");
    top1.textContent = "Nome Utente";
    riga0.appendChild(top1);
    const top2 = document.createElement("th");
    top2.textContent = "Email";
    riga0.appendChild(top2);
    const top3 = document.createElement("th");
    top3.textContent = "Livello";
    riga0.appendChild(top3);
    tabella.appendChild(riga0);

    const nome = document.getElementById("cercaNome").value;
    const cognome = document.getElementById("cercaCognome").value;
    const nomeUtente = document.getElementById("cercaNomeUtente").value;
    const livello = document.getElementById("livello").value;
    
    const params = "?nome=" + nome + "&cognome=" + cognome + "&nomeUtente=" + nomeUtente + "&livello=" + livello;

    fetch("Trova.php" + params)
        .then(function(response){
            if(response.ok){
                return response.json();
            } 
            else {
                throw new Error("Errore nella richiesta");
            }
        })
        .then(function(utenti){
            utenti.forEach(function(utente){
                var riga = document.createElement("tr");
                riga.innerHTML = "<td>" + utente.nomeUtente + "</td>" + "<td>" + utente.email + "</td>" + "<td>" + utente.livello + "</td>";
                tabella.appendChild(riga);
            });
        })
        .catch(function(error){
            console.error(error);
        });
});

function svuotaTabella(tabella){
    while(tabella.firstChild){
        tabella.removeChild(tabella.firstChild);
    }
}