<?php
    include 'scraping.php';
    require_once "dbConnection.php";
    session_start();
    $table = $_GET['table'];
    $ID = $_GET['ID'];
    if(empty($_SESSION['logged'])) {
        $_SESSION['logged'] = false;
    }
    $page = file_get_contents('singolo.html');
    $Titolo = '';
    $Testo = '';
    $Immagine = '';
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
    if($_SESSION['logged'] == false) {
        $page =  str_replace("<percorso />",$table.' » '.$Titolo,$page);  
    }
    else {
        $page =  str_replace("<percorso />",' Admin » ' .$table.' » '.$Titolo,$page);
    }  
    $page = buildHTML($page,'',$_SESSION['logged']);
    $page =  str_replace("<percorso />",$table.' » '.$Titolo,$page);
    $page = str_replace("<titolo />", $Titolo, $page);
    $page = str_replace("<immagine />", $Immagine, $page);
    $page = str_replace("<testo />", $Testo, $page);
    echo $page;
?>