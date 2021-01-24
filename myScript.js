
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

function removeHeader() {
    var header = document.getElementById("header");
    var height = document.getElementById("image-header").offsetHeight;
    if(window.pageYOffset>=height) {
        header.style.display='unset';
    }
    if(window.pageYOffset<=height) {
        header.style.display='';
    }
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
                showErrorStrong(input, errormsg);
                parent.children[1].setAttribute("tabindex", "2");
                parent.children[0].setAttribute("tabindex", "3");
                validation = false;
            }
        }

        if(Id[i] == "Immagine") {
            if(input.files.length == 0) {
                var errormsg = "Inserire un'immagine!";
                showErrorStrong(input, errormsg);
                parent.children[1].setAttribute("tabindex", "4");
                parent.children[0].setAttribute("tabindex", "5");
                validation = false;
            }
        }

        if(Id[i] == "AltImmagine") {
            if(input.value.search(/\w{1,50}/) != 0) {
                var errormsg = "Inserire un AltImmagine!";
                showErrorStrong(input, errormsg);
                parent.children[1].setAttribute("tabindex", "6");
                parent.children[0].setAttribute("tabindex", "7");
                validation = false;
            }
        }

        if(Id[i] == "Testo") {
            if(input.value.search(/\w+/) != 0) {
                var errormsg = "Inserire un testo!";
                showErrorStrong(input, errormsg);
                parent.children[1].setAttribute("tabindex", "8");
                parent.children[0].setAttribute("tabindex", "9");
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

        showErrorStrong(message, errore);
        parent.children[1].setAttribute("tabindex", "1");      
    } 

    if(validation==false) {
        var input = document.getElementById("bottone");
        var errormsg = "Rilevati errori!";

        var parent = input.parentNode;
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        } 

        showErrorLink(input, errormsg);
        parent.children[1].setAttribute("href", "#message");
    }

   /* if(validation==false) {
        var error = ["bottone", "message"];

        for(var i = 0; i < error.length; i++) {
        var input = document.getElementById(error[i]);

        var parent = input.parentNode;
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        } 

        if(error[i] == "message") {
            var errormsg = "Errore nell'inserimento!";
            showErrorStrong(input, errormsg);
        }
        
        if(error[i] == "bottone") {
            var errormsg = "Rilevati errori!";
            showErrorLink(input, errormsg);
            parent.children[1].setAttribute("href", "#message");
        }

        
       // <a class="hiddenHelp" href="#menu">Vai al menù</a>
    } */

    return validation;
}

function showErrorLink(input, errormsg) {
    var p = input.parentNode;
    var elemento = document.createElement("a");
    elemento.className = "hiddenHelp";
    elemento.appendChild(document.createTextNode(errormsg));
    p.appendChild(elemento);
}

function showErrorStrong(input, errormsg) {
    var p = input.parentNode;
    var elemento = document.createElement("strong");
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
        showErrorStrong(input, errormsg);
        parent.children[1].setAttribute("id", "error");
        parent.children[1].setAttribute("tabindex", "1");
        parent.children[0].setAttribute("tabindex", "2");

        validation = false;
    }

    if(validation==false) {
        var button = document.getElementById("bottone");
        var errormsg = "Rilevati errori!";

        var parent = button.parentNode;
        if(parent.children.length == 4) { 
            parent.removeChild(parent.children[3]); 
        } 

        showErrorLink(button, errormsg);
        parent.children[3].setAttribute("href", "#error");
    }

    return validation;
}