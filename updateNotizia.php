<?php

    $page = file_get_contents('nuovoNotiziaForm.html');

    $ID = $_GET['ID'];
    $session = $_GET['session'];
    
    require_once "dbConnection.php"; 

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();     

    $listNews = $dbAccess->getNews();        

    if($connection) {

        foreach ($listNews as $news) {
            if($ID == $news['ID']) {
                $Titolo = $news['Titolo'];
                $Immagine = $news['Immagine'];
                $AltImmagine = $news['AltImmagine'];
                $Testo = $news['Testo'];
            }
        }
        
        $newString = 'name="Immagine"/> <img style="width:80%; height:80%;" src="data:charset=utf-8;base64, ' . $Immagine . '"/>';
        $page = str_replace('$name="Immagine"/>',$newString,$page);
        $page = str_replace('action="nuovoNotizia.php"','action="nuovoNotizia.php"',$page);
        $page = str_replace('>Inserisci<','>Modifica<',$page);

    }

    $page = str_replace('name="Titolo"', 'name="Titolo" value="'.$Titolo.'"', $page);
    $page = str_replace('name="AltImmagine"', 'name="AltImmagine" value="'.$AltImmagine.'"', $page);
    $page = str_replace('name="Testo">', 'name="Testo">' .$Testo, $page);

    echo $page;
?>