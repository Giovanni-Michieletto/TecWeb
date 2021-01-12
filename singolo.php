<?php
    
    $Titolo = $_GET['Titolo'];
    $session = $_GET['session'];

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
            if($Titolo == $cell['Titolo']) {
                $Immagine .= '<img src="data:charset=utf-8;base64, ' . $cell['Immagine'] . '" alt="' . $cell['AltImmagine'] . '" />';
                $Testo = $cell['Testo'];
            }
        }
    }

    if($session=="modifica") {
        header('Location: nuovoForm.php?',TRUE);
    }
    else {
    $page = str_replace("<Titolo />", $Titolo, $page);
    $page = str_replace("<Immagine />", $Immagine, $page);
    $page = str_replace("<Testo />", $Testo, $page);
    echo $page;
    }
?>