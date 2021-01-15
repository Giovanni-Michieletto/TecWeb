function validate() {

    var Id = ["Titolo", "Immagine", "AltImmagine", "Testo"];
    var validation = true;

    for(var i = 0; i < Id.length; i++) {

        var input = document.getElementById(Id[i]);

        var parent = input.parentNode; //se c'è già il messaggio d'errore lo cancello!!
        if(parent.children.length == 2) { //se lo span ha due figli (quindi l'errore)
            parent.removeChild(parent.children[1]); //rimuovo il secondo figlio(l'errore)
        } 

        if(Id[i] == "Titolo") {
            if(input.value.search(/\w{1,50}$/) != 0) {
                var errormsg = "Inserire un titolo!";
                showError(input, errormsg);
                validation = false;
            }
        }

        if(Id[i] == "Immagine") {
            if(input.files.length == 0) {
                var errormsg = "Inserire un'immagine!";
                showError(input, errormsg);
                validation = false;
            }
        }

        if(Id[i] == "AltImmagine") {
            if(input.value.search(/\w{2,50}$/) != 0) {
                var errormsg = "Inserire un AltImmagine!";
                showError(input, errormsg);
                validation = false;
            }
        }

        if(Id[i] == "Testo") {
            if(input.value.search(/\w{2,50}$/) != 0) {
                var errormsg = "Inserire un testo!";
                showError(input, errormsg);
                validation =  false;
            }
        }
    }

    return validation;
}

function showError(input, errormsg) {
    var p = input.parentNode; //lo span che contiene l'input
    var elemento = document.createElement("strong"); //è la sezione errore
    elemento.className = "errori"; // per il css
    elemento.appendChild(document.createTextNode(errormsg)); //contenuto sezione errore
    p.appendChild(elemento); //aggiungi un nuovo figlio allo span, collegato subito dopo input
}