<?php
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }

    include "scraping.php";

    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    $ID = $_GET['ID'];

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
        $directory = "/opt/lampp/htdocs/TecWeb/testupload/";
        $dir = "/TecWeb/testupload/";
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $ImmagineUpload = $directory . $filename . "." . $ext;
        $Immagine = $dir . $filename . "." . $ext;

        //VERIFICA DOPPIONI
        $error = true;
        foreach ($list as $cell) {
            if($ID != $cell['ID']) {
                $array = exists($page,$error,$Titolo,$Immagine,$AltImmagine,$Testo,$cell);
                $error = $array[0];
                $page = $array[1];    
            }
        }
            
        if($error == true) {
            move_uploaded_file($_FILES['Immagine']['tmp_name'],$ImmagineUpload);
            if($_SESSION['action']=="modifica") {
                $insertion = $dbAccess->updateFile($table,$Titolo,$Immagine,$AltImmagine,$Testo,$ID);
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
        else {
            $page = sostitute($page,'',$message,$Titolo,$AltImmagine,$Testo);
        }
    }

    $page = build($page,$table,$ID,'');

    
    echo $page;

?>