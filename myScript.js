
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
                showError(input, errormsg);
                parent.children[1].setAttribute("tabindex", "1");
                validation = false;
            }
        }

        if(Id[i] == "Immagine") {
            if(input.files.length == 0) {
                var errormsg = "Inserire un'immagine!";
                showError(input, errormsg);
                parent.children[1].setAttribute("tabindex", "2");
                validation = false;
            }
        }

        if(Id[i] == "AltImmagine") {
            if(input.value.search(/\w{1,50}/) != 0) {
                var errormsg = "Inserire un AltImmagine!";
                showError(input, errormsg);
                parent.children[1].setAttribute("tabindex", "3");
                validation = false;
            }
        }

        if(Id[i] == "Testo") {
            if(input.value.search(/\w+/) != 0) {
                var errormsg = "Inserire un testo!";
                showError(input, errormsg);
                parent.children[1].setAttribute("tabindex", "4");
                validation =  false;
            }
        }
    }

    /*if(validation==false) {
        var input = document.getElementById("Bottone");
        var parent = input.parentNode;

        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]); 
        }

        var errormsg = "Inserimento errato!";
        showError(input, errormsg);
        return validation;
    }*/

    return validation;
}

function showError(input, errormsg) {
    var p = input.parentNode;
    var elemento = document.createElement("strong");
    elemento.className = "errori";
    elemento.appendChild(document.createTextNode(errormsg));
    p.appendChild(elemento);
}

function validateAdmin() {
    var validation = true;

    if(!document.getElementById("Eventi").checked && !document.getElementById("Vangeli").checked && !document.getElementById("Articoli").checked && !document.getElementById("Associazioni").checked) {
        var input = document.getElementById("js");
        var parent = input.parentNode; 
        
        if(parent.children.length == 2) { 
            parent.removeChild(parent.children[1]);
        }

        var errormsg = "Selezionare un'opzione!";
        showError(input, errormsg);
        validation = false;
    }

    return validation;
}