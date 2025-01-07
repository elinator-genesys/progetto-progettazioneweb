var attivoG = 0;
var attivoS = 0;

function sceltaLezioneSingola(){
    if(attivoS == 1){
        const contenitore = document.getElementById("down");
        svuotaCampo(contenitore);
        attivoS = 0;
    }
    else{
        if(attivoG)
            attivoG = 0;
        attivoS = 1;
        const contenitore = document.getElementById("down");
        svuotaCampo(contenitore);
        contenitore.style.border = "solid black 2px";
        contenitore.style.padding = "1em";

        const testo = document.createElement("p");
        testo.innerText = "Selezionare il giorno e l'orario della lezione";
        contenitore.appendChild(testo);

        const riga1 = document.createElement("div");
        riga1.setAttribute("class", "r");
        const etichetta1 = document.createElement("label");
        etichetta1.setAttribute("for", "data");
        etichetta1.innerText = "Data";
        riga1.appendChild(etichetta1);
        const data = document.createElement("input");
        data.setAttribute("id", "data");
        data.setAttribute("type", "date");
        data.setAttribute("name", "data");
        riga1.appendChild(data);

        const etichetta2 = document.createElement("label");
        etichetta2.setAttribute("for", "data");
        etichetta2.innerText = "Orario";
        riga1.appendChild(etichetta2);
        const orario = document.createElement("select");
        orario.setAttribute("id", "orario");
        orario.setAttribute("name", "orario");
        const orario1 = document.createElement("option");
        orario1.value = "13:00:00";
        orario1.innerText = "13:00/14:00";
        orario.appendChild(orario1);
        const orario2 = document.createElement("option");
        orario2.value = "14:00:00";
        orario2.innerText = "14:00/15:00";
        orario.appendChild(orario2);
        const orario3 = document.createElement("option");
        orario3.value = "15:00:00";
        orario3.innerText = "15:00/16:00";
        orario.appendChild(orario3);
        const orario4 = document.createElement("option");
        orario4.value = "16:00:00";
        orario4.innerText = "16:00/17:00";
        orario.appendChild(orario4);
        const orario5 = document.createElement("option");
        orario5.value = "17:00:00";
        orario5.innerText = "17:00/18:00";
        orario.appendChild(orario5);
        const orario6 = document.createElement("option");
        orario6.value = "18:00:00";
        orario6.innerText = "18:00/19:00";
        orario.appendChild(orario6);
        const orario7 = document.createElement("option");
        orario7.value = "19:00:00";
        orario7.innerText = "19:00/20:00";
        orario.appendChild(orario7);
        const orario8 = document.createElement("option");
        orario8.value = "20:00:00";
        orario8.innerText = "20:00/21:00";
        orario.appendChild(orario8);
        const orario9 = document.createElement("option");
        orario9.value = "21:00:00";
        orario9.innerText = "21:00/22:00";
        orario.appendChild(orario9);
        riga1.appendChild(orario);

        const bottone = document.createElement("button");
        bottone.setAttribute("type", "submit");
        bottone.setAttribute("id", "prenota");
        bottone.innerText = "Prenota";
        contenitore.appendChild(riga1);
        contenitore.appendChild(bottone);
    }
}

function sceltaLezioneGruppo(){
    if(attivoG == 1){
        const contenitore = document.getElementById("down");
        svuotaCampo(contenitore);
        attivoG = 0;
    }
    else{
        if(attivoS)
            attivoS = 0;
        attivoG = 1;
        const contenitore = document.getElementById("down");
        svuotaCampo(contenitore);
        contenitore.style.border = "solid black 2px";
        contenitore.style.padding = "1em";

        const testo = document.createElement("p");
        testo.innerText = "Selezionare il giorno e l'orario del corso al quale si vuole partecipare";
        contenitore.appendChild(testo);

        const riga1 = document.createElement("div");
        riga1.setAttribute("class", "r");
        const etichetta1 = document.createElement("label");
        etichetta1.setAttribute("for", "giorno");
        etichetta1.innerText = "Giorno";
        riga1.appendChild(etichetta1);
        const giorno = document.createElement("input");
        giorno.setAttribute("id", "giorno");
        giorno.setAttribute("type", "date");
        giorno.setAttribute("name", "giorno");
        riga1.appendChild(giorno);

        const etichetta2 = document.createElement("label");
        etichetta2.setAttribute("for", "data");
        etichetta2.innerText = "Orario";
        riga1.appendChild(etichetta2);
        const orario = document.createElement("select");
        orario.setAttribute("id", "orario");
        orario.setAttribute("name", "orario");
        const orario0 = document.createElement("option");
        orario0.value = "18:00:00";
        orario0.innerText = "18:00/19:00";
        orario.appendChild(orario0);
        const orario1 = document.createElement("option");
        orario1.value = "19:00:00";
        orario1.innerText = "19:00/20:00";
        orario.appendChild(orario1);
        const orario2 = document.createElement("option");
        orario2.value = "20:00:00";
        orario2.innerText = "20:00/21:00";
        orario.appendChild(orario2);
        const orario3 = document.createElement("option");
        orario3.value = "21:00:00";
        orario3.innerText = "21:00/22:00";
        orario.appendChild(orario3);
        riga1.appendChild(orario);

        const bottone = document.createElement("button");
        bottone.setAttribute("type", "submit");
        bottone.setAttribute("id", "prenota");
        bottone.innerText = "Prenota";
        contenitore.appendChild(riga1);
        contenitore.appendChild(bottone);
    }
}

function svuotaCampo(contenitore){
    while(contenitore.firstChild){
        contenitore.removeChild(contenitore.firstChild);
    }
    contenitore.style.border = "none";
    contenitore.style.padding = "0em";
}