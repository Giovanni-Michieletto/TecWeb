<?php

function update($page,$table,$ID) {

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

    }
    
    return $page;

}   
?>