<?php
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }

    include 'scraping.php';

    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    if($_GET['ID']) {
        $ID = $_GET['ID'];
    }

    $page = file_get_contents('blankForm.html');

    $page = buildHTML($page,'',$_SESSION['logged']);
    $page = str_replace('<titlePage />', 'Inserimento '.$table, $page);


    if(isset($_POST['admin'])){
        header("Location: Admin.php");
    }

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
        $directory = "./upload/";
        $path = pathinfo($file);
        $filename = $path['filename'];
        $filename = preg_replace("[^A-Za-z0-9 ]","",$filename);
        $ext = $path['extension'];
        $Immagine = $directory . $filename . "." . $ext;

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
            move_uploaded_file($_FILES['Immagine']['tmp_name'],$Immagine);
            if($_SESSION['action']=="modifica") {
                $insertion = $dbAccess->updateFile($table,$Titolo,$Immagine,$AltImmagine,$Testo,$ID);
            }
            else {
                $insertion = $dbAccess->insertFile($table,$Titolo,$Immagine,$AltImmagine,$Testo);
            }
            
            if($insertion == true) {
                $page = insertForm($page,$Titolo,$Immagine,$AltImmagine,$Testo,$table);
                }
            else {
                $message = 'Errore nell\'inserimento';
                $page = sostitute($page,'',$message,$Titolo,$AltImmagine,$Testo);
                $page = buildForm($page,$table,$ID,$_SESSION['action']);
            }
        }
        else {
            $page = sostitute($page,'',$message,$Titolo,$AltImmagine,$Testo);
            $page = buildForm($page,$table,$ID,$_SESSION['action']);
        }
    }

    echo $page;

?>