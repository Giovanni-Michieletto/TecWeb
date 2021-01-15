function input() {

    var Id = ["Titolo", "Immagine", "AltImmagine", "Testo"];
    var result = true;

    for(var i = 0; i < Id.length; i++) {

        var input = document.getElementById(Id[i]);

        var parent = input.parentNode; //se c'è già il messaggio d'errore lo cancello!!
        if(parent.children.length == 2) { //se lo span ha due figli (quindi l'errore)
            parent.removeChild(parent.children[1]); //rimuovo il secondo figlio(l'errore)
        } 

        if(Id[i] == "Titolo") {
            if(input.value.search(/\w{2,20}$/) != 0) {
                var errore = "Titolo errato!";
                mostraErrore(input, errore);
                result = false;
            }
        }
/*
        if(Id[i] == "Immagine") {
            if(input.value.search(/\w{2,20}$/) != 0) {
                var errore = "Immagine errata!";
                mostraErrore(input, errore);
                result = false;
            }
        }
*/
        if(Id[i] == "AltImmagine") {
            if(input.value.search(/\w{2,20}$/) != 0) {
                var errore = "AltImmagine errato!";
                mostraErrore(input, errore);
                result = false;
            }
        }

        if(Id[i] == "Testo") {
            if(input.value.search(/\w{2,20}$/) != 0) {
                var errore = "Testo errato!";
                mostraErrore(input, errore);
                result =  false;
            }
        }
    }

    return result;
}

function mostraErrore(input, errore) {
    var p = input.parentNode; //lo span che contiene l'input
    var elemento = document.createElement("strong"); //è la sezione errore
    elemento.className = "errori"; // per il css
    elemento.appendChild(document.createTextNode(errore)); //contenuto sezione errore
    p.appendChild(elemento); //aggiungi un nuovo figlio allo span, collegato subito dopo input
}