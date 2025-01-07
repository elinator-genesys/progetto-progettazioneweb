var mostraP = 0;

document.getElementById("prenotazioni").addEventListener("click", function() {
    if (mostraP == 0) {
        const tabella = document.getElementById("tabellaPrenotazioni");
        svuotaTabella(tabella);
        mostraP = 1;
        const riga0 = document.createElement("tr");
        const top1 = document.createElement("th");
        top1.textContent = "Campo";
        riga0.appendChild(top1);
        const top2 = document.createElement("th");
        top2.textContent = "Giorno";
        riga0.appendChild(top2);
        const top3 = document.createElement("th");
        top3.textContent = "Orario";
        riga0.appendChild(top3);
        tabella.appendChild(riga0);
        
        fetch("PrenotazioniUtente.php")
            .then(function(response) {
                if (!response.ok) {
                    throw new Error("Errore nella richiesta.");
                }
                return response.json();
            })
            .then(function(prenotazioni) {
                prenotazioni.forEach(function(prenotazione) {
                    const tr = document.createElement("tr");
                    tr.innerHTML = "<td>" + prenotazione.nome + "</td>" + "<td>" + prenotazione.giorno + "</td>" + "<td>" + prenotazione.orario + "</td>";
                    tabella.appendChild(tr);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    } 
    else {
        const tabella = document.getElementById("tabellaPrenotazioni");
        svuotaTabella(tabella);
        mostraP = 0;
    }
});

document.getElementById('logout').addEventListener("click", function() {
    fetch("Logout.php")
        .then(function(response) {
            if (!response.ok) {
                throw new Error("Errore nella richiesta.");
            }
            window.location.href = "Index.php";
        })
        .catch(function(error) {
            console.error(error);
        });
});

function svuotaTabella(tabella) {
    while (tabella.firstChild) {
        tabella.removeChild(tabella.firstChild);
    }
}