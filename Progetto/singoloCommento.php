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
        $listComments = $dbAccess->getComments();

        foreach ($listComments as $comment) {
            if($TitoloCard == $comment['Titolo']) {
                $Immagine .= '<img src="' . $comment['Immagine'] . '" alt="' . $comment['AltImmagine'] . '" />';
            	$Testo = $comment['Testo'];
            }
        }
    }
    $page = str_replace("<Titolo />", $TitoloCard, $page);
    $page = str_replace("<Immagine />", $Immagine, $page);
    $page = str_replace("<Testo />", $Testo, $page);

    echo $page;
?>