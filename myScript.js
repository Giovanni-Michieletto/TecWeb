
function placeholderSearch() {
    var input = document.getElementById("cerca");
    input.className = "default-text";
    input.value = "Cosa cerchi?";
    input.onfocus = function() { 
        if(this.value == input.value) {
        this.value = "";
        this.className = "";
        }
    };
}

function validate() {
    var Id = ["Titolo", "Immagine", "AltImmagine", "Testo"];
    var validation = true;
    for(var i = 0; i < Id.length; i++) {
        var input = document.getElementById(Id[i]);
        var parent = input.parentNode;
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        } 
        if(Id[i] == "Titolo") {
            if(input.value.search(/\w{1,50}/) != 0) {
                var errormsg = "Inserire un titolo!";
                showErrorLink(input, errormsg);
                parent.children[1].setAttribute("tabindex", "2");
                parent.children[0].setAttribute("tabindex", "3");
                parent.children[1].setAttribute("href", "#Titolo");
                validation = false;
            }
        }
        if(Id[i] == "Immagine") {
            if(input.files.length == 0) {
                var errormsg = "Inserire un'immagine!";
                showErrorLink(input, errormsg);
                parent.children[1].setAttribute("tabindex", "4");
                parent.children[0].setAttribute("tabindex", "5");
                parent.children[1].setAttribute("href", "#Immagine");
                validation = false;
            }
        }
        if(Id[i] == "AltImmagine") {
            if(input.value.search(/\w{1,50}/) != 0) {
                var errormsg = "Inserire un AltImmagine!";
                showErrorLink(input, errormsg);
                parent.children[1].setAttribute("tabindex", "6");
                parent.children[0].setAttribute("tabindex", "7");
                parent.children[1].setAttribute("href", "#AltImmagine");
                validation = false;
            }
        }
        if(Id[i] == "Testo") {
            if(input.value.search(/\w+/) != 0) {
                var errormsg = "Inserire un testo!";
                showErrorLink(input, errormsg);
                parent.children[1].setAttribute("tabindex", "8");
                parent.children[0].setAttribute("tabindex", "9");
                parent.children[1].setAttribute("href", "#Testo");
                validation =  false;
            }
        }
    }
    if(validation==false) {
        var errore = "Errore nell'inserimento!";
        var message = document.getElementById("message");
        var parent = message.parentNode;
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        }
        showErrorLink(message, errore);
        parent.children[1].setAttribute("tabindex", "1");  
        parent.children[1].setAttribute("class", "erroresingolo");    
    } 
    if(validation==false) {
        var input = document.getElementById("bottone");
        var errormsg = "Rilevati errori!";
        var parent = input.parentNode;
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        } 
        showErrorLinkNascosti(input, errormsg);
        parent.children[1].setAttribute("href", "#message");
    }
    return validation;
}

function validateUpdate() {
    var Id = ["Titolo", "AltImmagine", "Testo"];
    var validation = true;
    for(var i = 0; i < Id.length; i++) {
        var input = document.getElementById(Id[i]);
        var parent = input.parentNode;
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        } 
        if(Id[i] == "Titolo") {
            if(input.value.search(/\w{1,50}/) != 0) {
                var errormsg = "Inserire un titolo!";
                showErrorLink(input, errormsg);
                parent.children[1].setAttribute("tabindex", "2");
                parent.children[0].setAttribute("tabindex", "3");
                validation = false;
            }
        }
        if(Id[i] == "AltImmagine") {
            if(input.value.search(/\w{1,50}/) != 0) {
                var errormsg = "Inserire un AltImmagine!";
                showErrorLink(input, errormsg);
                parent.children[1].setAttribute("tabindex", "4");
                parent.children[0].setAttribute("tabindex", "5");
                validation = false;
            }
        }
        if(Id[i] == "Testo") {
            if(input.value.search(/\w+/) != 0) {
                var errormsg = "Inserire un testo!";
                showErrorLink(input, errormsg);
                parent.children[1].setAttribute("tabindex", "6");
                parent.children[0].setAttribute("tabindex", "7");
                validation =  false;
            }
        }
    }
    if(validation==false) {
        var errore = "Errore nell'inserimento!";
        var message = document.getElementById("message");
        var parent = message.parentNode;
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        }
        showErrorLink(message, errore);
        parent.children[1].setAttribute("tabindex", "1");
        parent.children[1].setAttribute("class", "erroresingolo");    
    } 
    if(validation==false) {
        var input = document.getElementById("bottone");
        var errormsg = "Rilevati errori!";
        var parent = input.parentNode;
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        } 
        showErrorLinkNascosti(input, errormsg);
        parent.children[1].setAttribute("href", "#message");
    }
    return validation;
}

function showErrorLinkNascosti(input, errormsg) {
    var p = input.parentNode;
    var elemento = document.createElement("a");
    elemento.className = "hiddenHelp";
    elemento.appendChild(document.createTextNode(errormsg));
    p.appendChild(elemento);
}

function showErrorLink(input, errormsg) {
    var p = input.parentNode;
    var elemento = document.createElement("a");
    elemento.className = "errori";
    elemento.appendChild(document.createTextNode(errormsg));
    p.appendChild(elemento);
}

function validateAdmin() {
    var validation = true;
    if(!document.getElementById("Evento").checked && !document.getElementById("Vangelo").checked && !document.getElementById("Articolo").checked && !document.getElementById("Associazione").checked) {
        var input = document.getElementById("js");
        var parent = input.parentNode; 
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]);
        }
        var errormsg = "Errore, selezionare un'opzione!";
        showErrorLink(input, errormsg);
        validation = false;
    }
    if(validation==false) { 
        var button = document.getElementById("bottone");
        var errormsg = "Errore, selezionare un'opzione!";
        var parent = button.parentNode;
        if(parent.children.length == 4) { 
            parent.removeChild(parent.children[3]); 
        } 
        showErrorLinkNascosti(button, errormsg);
        parent.children[3].setAttribute("href", "#Evento");
    }
    return validation;
}