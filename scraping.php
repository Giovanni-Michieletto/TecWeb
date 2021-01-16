<?php

//INSERISCE TITOLO, ALT E TEST
function sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo) {
    echo 'sostitute <br>';
    $page = str_replace('<message />', $message, $page);
    $page = str_replace('name="Titolo"', 'name="Titolo" ' . $end .' value="'.$Titolo.'"', $page);
    $page = str_replace('name="AltImmagine"', 'name="AltImmagine" ' . $end .' value="'.$AltImmagine.'"', $page);
    $page = str_replace('name="Testo">', 'name="Testo" ' . $end . '>' .$Testo, $page);
    return $page;
}


//CONTROLLA DOPPIONI
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
    echo "error=".$error. '<br>';
    return array($error,$page);
}


//INSERISCE IMMAGINE IN CASO DI NUOVO INSERIMeNTO E POI CHIAMA SOSTITUTE()
function insertForm($page,$Titolo,$Immagine,$AltImmagine,$Testo) {
    echo "inertForm <br>";
    $message = 'Inserimento andato a buon fine';
    $end = 'readonly';
    $stringToreplace = '<input type="file" id="Immagine" accept="image/*" name="Immagine"/>';
    $newString = '<img style="width:80%; height:80%;" src="' . $Immagine . '"/>';
    $page = str_replace($stringToreplace,$newString,$page);
    $page = str_replace('<action />','admin.php?session=true',$page);
    $page = str_replace('<buttonName />','Torna alla home amministratore',$page);
    return sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo);
}


//INSERISCE IMMAGINE IN CASO DI MODIFICA E POI CHIAMA SOSTITUTE()
function updateForm($page,$Titolo,$Immagine,$AltImmagine,$Testo) {
    $page = str_replace('<errorImage />', '<img style="width:80%; height:80%;" src="' . $Immagine . '"/>',$page);
    return sostitute($page,'','',$Titolo,$AltImmagine,$Testo);
}

?>