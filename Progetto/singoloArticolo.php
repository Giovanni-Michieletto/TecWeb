<?php
	$page = file_get_contents('singoloSentieri.html');


	$TitoloCard = '';
    $Testo = '';
    $Immagine = '';

    $TitoloCard = $_GET['Titolo'];

    require_once "dbConnection.php";

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();

	if($connection) {
        $listArticles = $dbAccess->getArticles();

        foreach ($listArticles as $article) {
            if($TitoloCard == $article['Titolo']) {
                $Immagine .= '<img src="data:charset=utf-8;base64, ' . $article['Immagine'] . '" alt="' . $article['AltImmagine'] . '" />';
            	$Testo = $article['Testo'];
            }
        }
    }
    $page = str_replace("<Titolo />", $TitoloCard, $page);
    $page = str_replace("<Immagine />", $Immagine, $page);
    $page = str_replace("<Testo />", $Testo, $page);

    echo $page;
?>