<?php

    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    //$ID = $_GET['ID'];
    $session = $_GET['session'];

    if ($session!="modifica" && $session!=true) {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');

    echo "page" . '<br>';

    //DEFINISCO VARIABILI INTERNE

    $Titolo = $_POST['Titolo'];
    $AltImmagine = $_POST['AltImmagine'];
    $file = $_FILES['Immagine']['name'];
    $Testo = $_POST['Testo'];

    //SE VIENE CLICCATO IL BOTTONE
    if($_POST['submit']==true) {

        echo 'submit <br>';
        

        require_once "dbConnection.php"; 

        $dbAccess = new DBAccess();

        $connection = $dbAccess->openDBConnection();

        if($connection) {
                
            $list = $dbAccess->getFile($table);

            if($list) {
                foreach ($list as $cell) {
                    if($ID == $cell['ID']) {
                        $Img = $cell['Immagine'];
                    }
                }
            }
            
            //SETUP IMMAGINE
            $directory = "db/img/";
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $Immagine = $directory . $filename . "." . $ext;

            //VERIFICA DOPPIONI
            $error = true;
            foreach ($list as $cell) {
                if($ID != $cell['ID']) {
                    $error = exists($page,$error,$Titolo,$Immagine,$AltImmagine,$Testo,$cell);    
                }
            }
            
            if($error == true) {
                
                if($session=="modifica") {
                    $insertion = $dbAccess->updateFile($table,$Titolo,$imgContent,$AltImmagine,$Testo,$ID);
                }
                else {
                    $insertion = $dbAccess->insertFile($table,$Titolo,$Immagine,$AltImmagine,$Testo);
                }
                
                if($insertion == true) {
                    $page = insertForm($page,$Titolo,$Immagine,$AltImmagine,$Testo);
                    }
                else {
                    $message = 'Errore nell\'inserimento';
                }
            }
        }
    }
    
    echo 'non submit <br>';

    include "scraping.php";

    $page = buildHTML($page,$table,$session,'');

    $page = sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo);

    echo $page;

?>