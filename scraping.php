<?php
//INSERISCE TITOLO, ALT E TEST
function sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo) {
    $page = str_replace('<message id="message"/>', $message, $page);
    $page = str_replace('name="Titolo"', 'name="Titolo" ' . $end .' value="'.$Titolo.'"', $page);
    $page = str_replace('name="AltImmagine"', 'name="AltImmagine" ' . $end .' value="'.$AltImmagine.'"', $page);
    $page = str_replace('name="Testo">', 'name="Testo" ' . $end . '>' .$Testo, $page);
    return $page;
}

//CONTROLLA DOPPIONI
function exists($page,$error,$Titolo,$imgContent,$AltImmagine,$Testo,$cell) {
    if($Titolo == $cell['Titolo']) {
        $page = str_replace('<errorTitle />','<a class="errori" href="#Titolo" >Titolo già esistente!</a>', $page);
        $error = false;
    }
    if($imgContent == $cell['Immagine']) {
        $page = str_replace('<errorImage />', '<a class="errori" href="#Immagine" >Immagine già esistente!</a>', $page);
        $error = false;
    }
    if($AltImmagine == $cell['AltImmagine']) {
        $page = str_replace('<errorAlt />','<a class="errori" href="#AltImmagine" >AltImmagine già esistente!</a>', $page);
        $error = false;
    }
    if($Testo == $cell['Testo']) {
        $page = str_replace('<errorText />','<a class="errori" href="#Testo" >Testo già esistente!</a>', $page);
        $error = false;
    }
    return array($error,$page);
}

//INSERISCE IMMAGINE IN CASO DI NUOVO INSERIMENTO E POI CHIAMA SOSTITUTE()
function insertForm($page,$Titolo,$Immagine,$AltImmagine,$Testo,$table) {
    $message = '<a class="successo" href="#bottone" >Inserimento andato a buon fine!</a>';
    $page = str_replace('<titlePage />', 'Inserimento '.$table, $page);
    $end = 'readonly';
    $stringToreplace = '<input type="file" id="Immagine" accept="image/*" name="Immagine" title="Immagine" />';
    $newString = '<img style="width:80%; height:80%;" src="' . $Immagine . '"/>';
    $page = str_replace($stringToreplace,$newString,$page);
    $page = str_replace('<action />','Admin.php',$page);
    $page = str_replace('name="submit"','name="admin"',$page);
    $page = str_replace('<buttonName />','Torna alla home amministratore',$page);
    return sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo);
}

//INSERISCE IMMAGINE IN CASO DI MODIFICA E POI CHIAMA SOSTITUTE()
function updateForm($page,$Titolo,$Immagine,$AltImmagine,$Testo) {
    $page = str_replace('<errorImage />', '<img style="width:80%; height:80%;" src="' . $Immagine . '"/>',$page);
    return sostitute($page,'','',$Titolo,$AltImmagine,$Testo);
}

//INSERISCE IMMAGINE IN CASO DI ELIMINAZIONE E POI CHIAMA SOSTITUTE()
function deleteForm($page,$Titolo,$Immagine,$AltImmagine,$Testo) {
    $end = 'readonly';
    $stringToreplace = '<input type="file" id="Immagine" accept="image/*" name="Immagine" title="Immagine" />';
    $String = '<img style="width:80%; height:80%;" src="' . $Immagine . '"/>';
    $page = str_replace($stringToreplace,$String,$page);
    return sostitute($page,$end,'',$Titolo,$AltImmagine,$Testo);
}

//COSTRUISCE FORM DOPO ELIMINAZIONE
function deleted($page) {
    $page = str_replace('<action />','Admin.php',$page);
    $page = str_replace('name="submit"','name="admin"',$page);
    $page = str_replace('<buttonName />','Torna alla home amministratore',$page);
    $page = str_replace('<img src="./db/img/deco.svg" alt=""/>','',$page);
    $page = str_replace('<label for="Titolo">Titolo*: </label>','',$page);
    $page = str_replace('<input type="text" id="Titolo" name="Titolo" />','',$page);
    $page = str_replace('<label for="Immagine">Immagine*: </label>','',$page);
    $page = str_replace('<input type="file" id="Immagine" accept="image/*" name="Immagine" title="Immagine" />','',$page);
    $page = str_replace('<label for="AltImmagine"><abbr title="Descrizione necessaria per permettere agli utenti non vedenti di percepire il contesto dell\'Immagine">Descrizione immagine*:</abbr></label>','',$page);
    $page = str_replace('<input type="text" name="AltImmagine" id="AltImmagine" />','',$page);
    $page = str_replace('<label for="Testo">Testo*: </label>','',$page);
    $page = str_replace('<textarea id="Testo" rows="30" cols="100" name="Testo"></textarea>','',$page);
    $page = str_replace ('<message id="message"/>','<a class="successo" href="#bottone">Eliminazione andata a buon fine!</a>',$page);
    return $page;
}

//COMPILA I FORM DATO IL LORO ID
function compile($page,$table,$ID,$session) {
    require_once "dbConnection.php"; 
    $dbAccess = new DBAccess();
    $connection = $dbAccess->openDBConnection();            
    if($connection) {
        $list = $dbAccess->getFile($table); 
        if($list) {
            foreach ($list as $cell) {
                if($ID == $cell['ID']) {
                    $Titolo = $cell['Titolo'];
                    $Immagine = $cell['Immagine'];
                    $AltImmagine = $cell['AltImmagine'];
                    $Testo = $cell['Testo'];
                    $_SESSION['image'] = $Immagine;
                }
            }
        }
        if($session=="Modifica") {
            $page = updateForm($page,$Titolo,$Immagine,$AltImmagine,$Testo);
        }
        else {
            $page = deleteForm($page,$Titolo,$Immagine,$AltImmagine,$Testo);
        }
    }
    return $page;
}   

//COSTRUISCE I FORM
function buildForm($page,$title,$ID,$session) {
    $table = $title;
    $tableArray = ['Articoli','Associazioni','Vangeli','Eventi'];
    $titleArray = ['Articolo','Associazione','Vangelo','Evento'];
    for ($i=0;$i<4;++$i){
        if($title==$titleArray[$i]) {
            $table = $tableArray[$i];
        }
    }
    if($session =="Modifica") {
        $page = str_replace('<buttonName />','Modifica',$page);
        $page = str_replace('<titlePage />', 'Modifica '.$title, $page);
        $page = compile($page,$table,$ID,$session);
        $page = str_replace('<action />','upload.php?table='.$title.'&ID='.$ID,$page);
    }
    else if($session =="Elimina") {
        $page = str_replace('<buttonName />','Elimina',$page);
        $page = str_replace('<titlePage />', 'Elimina '.$title, $page);
        $page = compile($page,$table,$ID,$session);
        $page = str_replace('<action />','delete.php?table='.$title.'&ID='.$ID,$page);
    }
    else {
        $page = str_replace('<titlePage />', 'Inserimento '.$title, $page);
        $page = str_replace('<buttonName />','Inserisci',$page);
        $page = str_replace('<action />','upload.php?table='.$title,$page);
    }
    return $page;
}

//COSTRUISCE IL FOOTER
function footer($page,$session) {
    if($session==true) {
        $page = str_replace('<admin />','<a href="logout.php">Logout</a>',$page);
    }
    else {
        $page = str_replace('<admin />','<a href="login.html">Login Amministratore</a>',$page);
    }
    return $page;
}

//COSTRUISCE IL MENU
function menu($page,$table,$session) {
    $menu='<ul class="links" title="Menù" >';
    $tabelle=['Home','Articoli','Associazioni','Vangeli','Eventi','Storia'];
    foreach($tabelle as $li) {
        if($li == $table) {
            $menu .= '<li class="notlink">'.$li.'</li>';
        }
        else if($li == 'Home' || $li == 'Storia') {
            $menu .= '<li><a href="'.$li.'.php">'.$li.'</a></li>';
        }
        else {
            $menu .= '<li><a href="view.php?table='.$li.'">'.$li.'</a></li>';
        }
    }
    if($session==true) {
        if($table == 'Admin') {
            $menu .= '<li class="notlink">Admin</li>';
        }
        else {
            $menu .= '<li><a href="Admin.php">Admin</a></li>';
        }
    }
    $menu .= '</ul>';
    $page =  str_replace("<menu />",$menu,$page);
    return $page;
}

//COSTRUISCE SEARCH
function search($page) {
    $search = '<form method="post" action="search.php">';
        $search .= '<fieldset class="form">';
            $search .= '<div class="textbutton">';
                $search .= '<input type="text" id="cerca" name="cerca" title="Cosa cerchi?"/>';
                $search .= '<input type="submit" class="cerca" name="submit" value="Cerca" title="Cerca"/>';
            $search .= '</div>';
        $search .= '</fieldset>';
    $search .= '</form>';
    $page =  str_replace("<search />",$search,$page);
    return $page;
}

//COSTRUISCE LINK HEADER
function headerLink($page) {
    $link = '<a class="hiddenHelp" href="#menu">Vai al menù</a>';
    $link .= '<a class="hiddenHelp" href="#search">Vai alla barra di ricerca</a>';
    $link .= '<a class="hiddenHelp" href="#content">Vai al contenuto</a>';
    $page =  str_replace("<link />",$link,$page);
    return $page;
}

//USATA PER CHIAMARE MENU E FOOTER
function buildHTML($page,$table,$session) {
    $page = menu($page,$table,$session);
    $page = footer($page,$session);
    $page = search($page);
    $page = headerLink($page);
    return $page;
}
?>