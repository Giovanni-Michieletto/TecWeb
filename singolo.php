<?php
    session_start();

    $table = $_GET['table'];
    $ID = $_GET['ID'];

    $page = file_get_contents('singolo.html');

    include 'scraping.php';

    $Titolo = '';
    $Testo = '';
    $Immagine = '';

    /*______CREAZIONE MENU______*/
    $tabelle=['Home','Articoli','Associazioni','Commenti','Notizie','Storia'];
    foreach($tabelle as $li) {
        if($li == $table) {
            $menu .= '<li class="notlink">'.$li.'</li>';
        }
        else if($li == 'Home' || $li == 'Storia') {
            $menu .= '<li><a href="'.$li.'.html">'.$li.'</a></li>';
        }
        else {
            $menu .= '<li><a href="view.php?table='.$li.'">'.$li.'</a></li>';
        }
    }

    /*______CREAZIONE CONTENUTO______*/
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
    else {
        $Titolo = "<h2>Errore di collegamento al database</h2>";
    }

    $page = buildHTML($page,$table,$_SESSION['logged']);
    $page =  str_replace("<percorso />",$table.' » '.$Titolo,$page);
    $page = str_replace("<titolo />", $Titolo, $page);
    $page = str_replace("<immagine />", $Immagine, $page);
    $page = str_replace("<testo />", $Testo, $page);

    echo $page;

?>