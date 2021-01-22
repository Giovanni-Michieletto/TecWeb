function campoDefault(input, text) {
    input.className = "default-text";
    input.value = text;
}

function campoPerInput(input, text) {
    if(input.value == text) {
        input.value = "";
        input.className = "";
    }
}

function placeholderForm() {
    var Id = ["Titolo", "AltImmagine", "Testo"];

    for(var i = 0; i < Id.length; i++) {
        var input = document.getElementById(Id[i]);

        if(Id[i] == "Titolo") {
            var text = "Titolo"
            campoDefault(input, text);
            input.onfocus = function () {campoPerInput(input, text);}
        }

        if(Id[i] == "AltImmagine") {
            var text = "Descrizione immagine"
            campoDefault(input, text);
            input.onfocus = function () {campoPerInput(input, text);}
        }

        if(Id[i] == "Testo") {
            var text = "Testo"
            campoDefault(input, text);
            input.onfocus = function () {campoPerInput(input, text);}
        }
    }
}

function placeholderLogin() {
    var Id = ["Username", "Password"];

    for(var i = 0; i < Id.length; i++) {
        var input = document.getElementById(Id[i]);

        if(Id[i] == "Username") {
            var text = "Inserire username"
            campoDefault(input, text);
            input.onfocus = function() {campoPerInput(input, text);}
        }

        if(Id[i] == "Password") {
            var text = "Inserire password"
            campoDefault(input, text);
            input.onfocus = function() {campoPerInput(input, text);}
        }
    }

    //if(input = .onfocus)
}

function placeholderSearch() {
    var input = document.getElementById("cerca");
    var text = "Cosa cerchi?"
    campoDefault(input, text);
    input.onfocus = function() {campoPerInput(this, text);}
}

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
            if(input.value.search(/\w{1,50}/) != 0) {
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
            if(input.value.search(/\w{1,50}/) != 0) {
                var errormsg = "Inserire un AltImmagine!";
                showError(input, errormsg);
                validation = false;
            }
        }

        if(Id[i] == "Testo") {
            if(input.value.search(/\w+/) != 0) {
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

function validateAdmin() {
    var validation = true;

    if(!document.getElementById("Notizie").checked && !document.getElementById("Commenti").checked && !document.getElementById("Articoli").checked && !document.getElementById("Associazioni").checked) {
        var input = document.getElementById("js");

        var parent = input.parentNode; //se c'è già il messaggio d'errore lo cancello!!
        if(parent.children.length == 2) { //se lo span ha due figli (quindi l'errore)
            parent.removeChild(parent.children[1]); //rimuovo il secondo figlio(l'errore)
        }

        var errormsg = "Selezionare un'opzione!";
        showError(input, errormsg);
        validation = false;
    }

    return validation;
}