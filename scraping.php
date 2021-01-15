<?php

function sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo) {

    $page = str_replace('<message />', $message, $page);

    $page = str_replace('name="Titolo"', 'name="Titolo" ' . $end .' value="'.$Titolo.'"', $page);
    $page = str_replace('name="AltImmagine"', 'name="AltImmagine" ' . $end .' value="'.$AltImmagine.'"', $page);
    $page = str_replace('name="Testo">', 'name="Testo" ' . $end . '>' .$Testo, $page);

    return $page;
}

function exists($page,$error,$Titolo,$imgContent,$AltImmagine,$Testo,$cell) {
    if($Titolo == $cell['Titolo']) {
        $page = str_replace('<errorTitle />','<p style="color:red;">Titolo gia esistente</p>', $page);
        $error = false;
    }
    if($imgContent == $cell['Immagine']) {
        $page = str_replace('<errorImage />', '<p style="color:red;">Immagine gia esistente</p>', $page);
        $error = false;
    }
    if($AltImmagine == $cell['AltImmagine']) {
        $page = str_replace('<errorAlt />','<p style="color:red;">AltImmagine gia esistente</p>', $page);
        $error = false;
    }
    if($Testo == $cell['Testo']) {
        $page = str_replace('<errorText />','<p style="color:red;">Testo gia esistente</p>', $page);
        $error = false;
    }
    return $error;
}

function insert($page,$Titolo,$Immagine,$AltImmagine,$Testo) {
    $message = 'Inserimento andato a buon fine';
    $end = 'readonly';
    $stringToreplace = '<input type="file" id="Immagine" accept="image/*" name="Immagine"/>';
    $newString = '<img style="width:80%; height:80%;" src="' . $Immagine . '"/>';
    $page = str_replace($stringToreplace,$newString,$page);
    $page = str_replace('<action />','admin.php?session=true',$page);
    $page = str_replace('<buttonName />','Torna alla home amministratore',$page);

    return sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo);
}

function build($page,$table,$session) {
    $page = str_replace('<titlePage />', '<h1>Inserimento '.$table.'</h1>', $page);
    $page = str_replace('<action />','new.php?session=true&table='.$table,$page);
    if($session=="modifica") {
        $page = str_replace('<buttonName />','Modifica',$page);
    }
    else {
        $page = str_replace('<buttonName />','Inserisci',$page);
    }
    return $page;
}

?>