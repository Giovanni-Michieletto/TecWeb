<?php
    $session = $_GET['session'];
    $ID = $_GET['ID'];
    $table = $_GET['table'];

    if ($session!="modifica") {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');

    require_once "dbConnection.php"; 
    require_once "scrapping.php";

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();            

    if($connection) {
        $list = $dbAccess->getFile($table); 

        foreach ($list as $cell) {
            if($ID == $cell['ID']) {
                $Titolo = $cell['Titolo'];
                $Immagine = $cell['Immagine'];
                $AltImmagine = $cell['AltImmagine'];
                $Testo = $cell['Testo'];
            }
        }
        
        $page = updateForm($page,$Titolo,$Immagine,$AltImmagine,$Testo);

        $page = buildHTML($page,$table,$session);

    }
    
    echo $page;
?>