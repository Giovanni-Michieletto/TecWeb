<?php
    $page = file_get_contents('singolo.html');


    $TitoloCard = '';
    $Testo = '';
    $Immagine = '';

    $TitoloCard = $_GET['Titolo'];

    require_once "dbConnection.php";

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();

    if($connection) {
        $listNews = $dbAccess->getNews();

        foreach ($listNews as $news) {
            if($TitoloCard == $news['Titolo']) {
                $Immagine .= '<img src="data:charset=utf-8;base64, ' . $news['Immagine'] . '" alt="' . $news['AltImmagine'] . '" />';
                $Testo = $news['Testo'];
            }
        }
    }
    $page = str_replace("<Titolo />", $TitoloCard, $page);
    $page = str_replace("<Immagine />", $Immagine, $page);
    $page = str_replace("<Testo />", $Testo, $page);

    echo $page;
?>