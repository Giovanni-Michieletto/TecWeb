<?php

    include "scraping.php";

    //PRENDO VARIABILI PASSATE
    $session = $_GET['session'];
    $table = $_GET['table'];
    $ID = $_GET['ID'];

    if ($session!="modifica" && $session!=true) {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');


    //DEFINISCO VARIABILI INTERNE

    $Titolo = $_POST['Titolo'];
    $AltImmagine = $_POST['AltImmagine'];
    $file = $_FILES['Immagine']['name'];
    $Testo = $_POST['Testo'];

    //SE VIENE CLICCATO IL BOTTONE

    require_once "dbConnection.php"; 

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();

    if($connection) {
                
        $list = $dbAccess->getFile($table);
            
        //SETUP IMMAGINE
        $directory = ".../upload/";
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $Immagine = $directory . $filename . "." . $ext;

        //VERIFICA DOPPIONI
        $error = true;
        echo $error . '<br>';
        foreach ($list as $cell) {
            if($ID != $cell['ID']) {
                $array = exists($page,$error,$Titolo,$Immagine,$AltImmagine,$Testo,$cell);
                $error = $array[0];
                if($error==false) {
                    echo 'false <br>';
                }
                else {
                    echo 'true <br>';
                }
                $page = $array[1];    
            }
        }
            
        if($error == true) {
            
            $up = move_uploaded_file($_FILES['Immagine']['tmp_name'],$Immagine);
            if($up==false) {
                echo " up false";
            }
            else {
                echo "up true";
            }
            if($session=="modifica") {
                $insertion = $dbAccess->updateFile($table,$Titolo,$Immagine,$AltImmagine,$Testo,$ID);
            }
            else {
                echo $Immagine . '<br>';
                $insertion = $dbAccess->insertFile($table,$Titolo,$Immagine,$AltImmagine,$Testo);
            }
            
            if($insertion == true) {
                $page = insertForm($page,$Titolo,$Immagine,$AltImmagine,$Testo);
                }
            else {
                $message = 'Errore nell\'inserimento';
            }
        }
        else {
            $page = sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo);
        }
    }

    echo $page;

?>