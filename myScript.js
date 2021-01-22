var login = {
    "Username" : ["Inserire username"],
    "Password" : ["Inserire password"]   
};

var form = {
    "Titolo" : ["Titolo"],
    "AltImmagine" : ["Descrizione immagine"],
    "Testo" : ["Testo"]
};

function placeholderForm() {
    for(var key in form) {
        var input = document.getElementById(key);
        input.className = "default-text";
        input.value = form[input.id][0];
        input.onfocus = function() { 
            if(this.value == form[this.id][0]) {
            this.value = "";
            this.className = "";
            }
        };
    }  
}

function placeholderLogin() {
    for(var key in login) {
        var input = document.getElementById(key);
        input.className = "default-text";
        input.value = login[input.id][0];
        input.onfocus = function() { 
            if(this.value == login[this.id][0]) {
            this.value = "";
            this.className = "";
            }
        };
    }
}

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
    var p = input.parentNode;
    var elemento = document.createElement("strong");
    elemento.className = "errori";
    elemento.appendChild(document.createTextNode(errormsg));
    p.appendChild(elemento);
}

function validateAdmin() {
    var validation = true;

    if(!document.getElementById("Notizie").checked && !document.getElementById("Commenti").checked && !document.getElementById("Articoli").checked && !document.getElementById("Associazioni").checked) {
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