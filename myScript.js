/*function valida() {
	// Variabili associate ai campi del modulo
	var Titolo = document.getElementById("Titolo");
	var Immagine = document.getElementById("Immagine");
	var AltImmagine = document.getElementById("AltImmagine");
	var Testo = document.getElementById("Testo");

	if(Titolo.value == "") {
        alert("Titolo non valido!");    
		return false;
	}

	if(!Immagine.value) {
		alert("Reinserire l'immagine");
		return false;
	}

	if(AltImmagine.value == "") {
		alert("ALT non valido!");
		return false;
	}

	if(Testo.value == "") {
		alert("Testo non valido!");
		return false;
    }
    
	else {
		document.form.action = "new.php";
		document.form.submit();
	} 
} */

/*var dettagli_form = {
    "Titolo" : new Array("Titolooooo", /\w{2,20}$/, "Titolo non valido!"),
    "Immagine" : new Array("Immagineeeeee", /?????/, "Immagine non valida!"),
    "AltImmagine" : new Array("AltImmagineeeee", /([a-zA-Z])(\ )([a-zA-Z]){2,20}$/, "AltImmagine non valido!"),
    "Testo" : new Array("Testooooooo", /([a-zA-Z])(\ )([a-zA-Z]){2,20}$/, "Testo non valido")
};*/

var Titolo = new Array("Titolooooo", /\w{2,20}$/, "Titolo non valido!");
var Immagine = new Array("Immagineeeeee", /?????/, "Immagine non valida!");
var AltImmagine = new Array("AltImmagineeeee", /([a-zA-Z])(\ )([a-zA-Z]){2,20}$/, "AltImmagine non valido!");
var Testo = new Array("Testooooooo", /([a-zA-Z])(\ )([a-zA-Z]){2,20}$/, "Testo non valido");

var dettagli_form = new Array(Titolo, Immagine, AltImmagine, Testo);

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
    
    var prova = ["o","i","dsf"];
    for (var key in dettagli_form) {
        alert("Titolo non valido!"); 
        var input = document.getElementById(key);
        var risultato = validazioneCampo(input);
        corretto = corretto && risultato;
    }
    return corretto;
}
