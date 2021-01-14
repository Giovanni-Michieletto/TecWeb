<?php
    
    $table = $_GET['table'];
    $ID = $_GET['ID'];

    $page = file_get_contents('singolo.html');

    $Titolo = '';
    $Testo = '';
    $Immagine = '';

    

    require_once "dbConnection.php";

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();

    if($connection) {
        $list = $dbAccess->getFile($table);

        foreach ($list as $cell) {
            if($ID == $cell['ID']) {
                $Titolo = $cell['Titolo'];
                $Immagine .= '<img src="data:charset=utf-8;base64, ' . $cell['Immagine'] . '" alt="' . $cell['AltImmagine'] . '" />';
                $Testo = $cell['Testo'];
            }
        }
    }

    if($session=="modifica") {
        header('Location: new.php?',TRUE);
    }
    else {
    $page = str_replace("<titolo />", $Titolo, $page);
    $page = str_replace("<immagine />", $Immagine, $page);
    $page = str_replace("<testo />", $Testo, $page);
    echo $page;
    }
?>