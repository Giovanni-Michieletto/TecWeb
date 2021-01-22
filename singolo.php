<?php
    session_start();

    $table = $_GET['table'];
    $ID = $_GET['ID'];

    $page = file_get_contents('singolo.html');

    include 'scraping.php';

    $Titolo = '';
    $Testo = '';
    $Immagine = '';

    /*______CREAZIONE CONTENUTO______*/
    require_once "dbConnection.php";

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();

    if($connection) {
        $list = $dbAccess->getFile($table);

        foreach ($list as $cell) {
            if($ID == $cell['ID']) {
                $Titolo = $cell['Titolo'];
                $Immagine .= '<img src="' . $cell['Immagine'] . '" alt="' . $cell['AltImmagine'] . '" />';
                $Testo = $cell['Testo'];
            }
        }
    }
    else {
        $Titolo = "<h2>Errore di collegamento al database</h2>";
    }

    $page = buildHTML($page,'',$_SESSION['logged']);
    $page =  str_replace("<percorso />",$table.' » '.$Titolo,$page);
    $page = str_replace("<titolo />", $Titolo, $page);
    $page = str_replace("<immagine />", $Immagine, $page);
    $page = str_replace("<testo />", $Testo, $page);
    $page =  str_replace("<tornasu />",'singolo.php?table=' . $table . '&ID=' . $ID,$page);  

    echo $page;

?>