/*function valida() {
	// Variabili associate ai campi del modulo
	var Titolo = document.invio.Titolo.value;
	var Immagine = document.invio.Immagine.value;
	var AltImmagine = document.invio.AltImmagine.value;
	var Testo = document.invio.Testo.value;

	if((Titolo == "") || (Titolo == "undefined")) {
		document.getElementById('errorTitle').innerHTML='Titolo non valido!';
		document.invio.Titolo.focus();
		return false;
	}

	if((Immagine == "") || (Immagine == "undefined")) {
		alert("Reinserire l'immagine");
		document.invio.Immagine.focus();
		return false;
	}

	if((AltImmagine == "") || (AltImmagine == "undefined")) {
		document.getElementById('errorAltImmage').innerHTML='Alt Immagine non valido!';
		document.invio.AltImmagine.focus();
		return false;
	}

	if((Testo == "") || (Testo == "undefined")) {
		document.getElementById('errorText').innerHTML='Testo non valido!';
		document.invio.Testo.focus();
		return false;
	}

	/*else {
		document.invio.action = "NuovoCommento.php";
		document.invio.submit();
	} */

	/*if(document.getElementById('Titolo').value=="") {
		document.getElementById('errorTitle').innerHTML='Titolo non valido!';
		document.getElementById('Titolo').focus();
		return false;
	}
}*/

var dettagli_form = {

    "Titolo" : ["Titolo", /\w{2,20}$/, "Titolo non valido!"],
    "Immagine" : ["Immagine", /?????/, "Immagine non valida!"],
    "AltImmagine" : ["AltImmagine", /([a-zA-Z])(\ )([a-zA-Z]){2,20}$/, "AltImmagine non valido!"],
    "Testo" : ["Testo", /([a-zA-Z])(\ )([a-zA-Z]){2,20}$/, "Testo non valido"]
};

function campoDefault(input) {
    input.className = "default-text";
    input.value = dettagli_form[input.id][0];
}

function campoPerInput(input) {
    if(input.value == dettagli_form[input.id][0]) {
        input.value = "";
        input.className = "";
    }
}

function caricamento() {
    for(var key in dettagli_form) {
        var input = document.getElementById(key);
        campoDefault(input);
        input.onfocus = function() {campoPerInput(this);};
    }
}

function mostraErrore(input) {
    var p = input.parentNode; //lo span che contiene l'input
    var elemento = document.createElement("strong"); //è la sezione errore
    elemento.className = "errori"; // per il css
    elemento.appendChild(document.createTextNode(dettagli_form[input.id][2])); //contenuto sezione errore
    p.appendChild(elemento); //aggiungi un nuovo figlio allo span, collegato subito dopo input
}

function validazioneCampo(input) {

    var parent = input.parentNode; //se c'è già il messaggio d'errore lo cancello!!
    if(parent.children.length == 2) { //se lo span ha due figli (quindi l'errore)
        parent.removeChild(parent.children[1]); //rimuovo il secondo figlio(l'errore)
    }

    var regex = dettagli_form[input.id][1];  //espressione regolare in posizione 1 dell'array
    var text = input.value;
    if (text.search(regex) != 0) { //controllo la poszione di regex all'interno di text, se inizia all'inizio mi da 0 se no mi da un'altra posizione e quindi non vabene
        mostraErrore(input);
        return false;
    }
    else {
        return true;
    }
}

function validateForm() {
    var corretto = true;
    for (var key in dettagli_form) {
        var input = document.getElementById(key);
        var risultato = validazioneCampo(input);
        corretto = corretto && risultato;
    }
    return corrretto;
}