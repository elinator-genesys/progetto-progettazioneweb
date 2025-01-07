function sceltaCampo(numeroCampo){
    document.getElementById("campoSelezionato").value = numeroCampo;
    document.getElementById("popup").style.display = "block";
}

function chiudiPopup() {
    document.getElementById("popup").style.display = "none";
}