const tabellaRicevute = document.getElementById("ricevute");
const tabellaLanciate = document.getElementById("lanciate");

fetch('StatoSfide.php')
    .then(function(response) {
        if (response.ok) {
            return response.json();
        } 
        else {
            throw new Error('Errore nella richiesta.');
        }
    })
    .then(function(sfide) {
        sfide.forEach(function(sfida) {
            if (sfida[0] == "") {
                if(sfida[2] == "IN ATTESA"){
                    var riga = document.createElement("tr");
                    riga.innerHTML = "<td>" + sfida[1] + "</td>" + "<td>" + sfida[2] + "</td>";
                    tabellaLanciate.appendChild(riga);
                }
                else if (sfida[2] == "ACCETTATA") {
                    var riga = document.createElement("tr");
                    riga.innerHTML = "<td>" + sfida[1] + "</td>" + "<td>" + sfida[2] + "</td>";
                    tabellaLanciate.appendChild(riga);

                    var casellaTennis = document.createElement("td");
                    var formT = document.createElement("form");
                    formT.setAttribute("action", "Elimina.php");
                    formT.setAttribute("method", "post");
                    var prenotaCampoTennis = document.createElement("button");
                    prenotaCampoTennis.className = "bottoneElimina";
                    prenotaCampoTennis.innerText = "Tennis";
                    prenotaCampoTennis.type = "submit";
                    formT.appendChild(prenotaCampoTennis);
                    var idSfidaT = document.createElement("input");
                    idSfidaT.setAttribute("type", "hidden");
                    idSfidaT.setAttribute("name", "idSfidaT");
                    idSfidaT.setAttribute("value", sfida[3]);
                    formT.appendChild(idSfidaT);
                    casellaTennis.appendChild(formT);
                    riga.appendChild(casellaTennis);

                    var casellaPadel = document.createElement("td");
                    var formP = document.createElement("form");
                    formP.setAttribute("action", "Elimina.php");
                    formP.setAttribute("method", "post");
                    var prenotaCampoPadel = document.createElement("button");
                    prenotaCampoPadel.className = "bottoneElimina";
                    prenotaCampoPadel.innerText = "Padel";
                    prenotaCampoPadel.type = "submit";
                    formP.appendChild(prenotaCampoPadel);
                    var idSfidaP = document.createElement("input");
                    idSfidaP.setAttribute("type", "hidden");
                    idSfidaP.setAttribute("name", "idSfidaP");
                    idSfidaP.setAttribute("value", sfida[3]);
                    formP.appendChild(idSfidaP);
                    casellaPadel.appendChild(formP);
                    riga.appendChild(casellaPadel);
                }
                else {
                    var riga = document.createElement("tr");
                    riga.innerHTML = "<td>" + sfida[1] + "</td>" + "<td>" + sfida[2] + "</td>";
                    tabellaLanciate.appendChild(riga);

                    var casellaElimina = document.createElement("td");
                    casellaElimina.setAttribute("colspan", 2);
                    var formE = document.createElement("form");
                    formE.setAttribute("action", "Elimina.php");
                    formE.setAttribute("method", "post");
                    var eliminaSfida = document.createElement("button");
                    eliminaSfida.className = "bottoneElimina";
                    eliminaSfida.innerText = "Elimina";
                    eliminaSfida.type = "submit";
                    formE.appendChild(eliminaSfida);
                    var idSfida = document.createElement("input");
                    idSfida.setAttribute("type", "hidden");
                    idSfida.setAttribute("name", "idSfida");
                    idSfida.setAttribute("value", sfida[3]);
                    formE.appendChild(idSfida);
                    casellaElimina.appendChild(formE);
                    riga.appendChild(casellaElimina);
                }
            } 
            else if (sfida[1] == "") {
                if (sfida[2] == "IN ATTESA") {
                    var riga1 = document.createElement("tr");
                    riga1.innerHTML = "<td>" + sfida[0] + "</td>";
                    var bottoneAccetta = document.createElement("button");
                    bottoneAccetta.setAttribute("class", "bottoneAccetta");
                    bottoneAccetta.innerText = "Accetta";
                    bottoneAccetta.onclick = function () {
                        aggiornaStatoSfida(sfida[3], "ACCETTATA");
                        tabellaRicevute.removeChild(riga1);
                    };
                    
                    var casellaA = document.createElement("td");
                    casellaA.appendChild(bottoneAccetta);
                    riga1.appendChild(casellaA);
                    var bottoneRifiuta = document.createElement("button");
                    bottoneRifiuta.setAttribute("class", "bottoneRifiuta");
                    bottoneRifiuta.innerText = "Rifiuta";
                    bottoneRifiuta.onclick = function () {
                        aggiornaStatoSfida(sfida[3], "RIFIUTATA");
                        tabellaRicevute.removeChild(riga1);
                    };

                    var casellaR = document.createElement("td");
                    casellaR.appendChild(bottoneRifiuta);
                    riga1.appendChild(casellaR);
                    tabellaRicevute.appendChild(riga1);
                }
            }
        });
    })
    .catch(function(error) {
        console.error(error);
    });

function aggiornaStatoSfida(idSfida, nuovoStato){
    const params = '?idSfida=' + idSfida + '&nuovoStato=' + nuovoStato;
    fetch("AggiornaSfida.php" + params)
        .then(function(response) {
            if(!response.ok){
                throw new Error("Errore nella richiesta");
            }
        })
        .catch(function(error){
            console.error(error);
        });
}