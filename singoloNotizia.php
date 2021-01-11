<?php
    
    $ID = $_GET['ID'];
    $session = $_GET['session'];

    $page = file_get_contents('singolo.html');

    $Titolo = '';
    $Testo = '';
    $Immagine = '';

    

    require_once "dbConnection.php";

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();

    if($connection) {
        $listNews = $dbAccess->getNews();

        foreach ($listNews as $news) {
            if($ID == $news['ID']) {
                $Immagine .= '<img src="data:charset=utf-8;base64, ' . $news['Immagine'] . '" alt="' . $news['AltImmagine'] . '" />';
                $Testo = $news['Testo'];
            }
        }
    }

    if($session=="modifica") {
        header('Location: nuovoNotizia.php?',TRUE);
    }
    else {
    $page = str_replace("<Titolo />", $Titolo, $page);
    $page = str_replace("<Immagine />", $Immagine, $page);
    $page = str_replace("<Testo />", $Testo, $page);
    echo $page;
    }
?>