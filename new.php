<?php
    $session = $_GET['session'];
    if ($session!="modifica" && $session!=true) {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');

    require_once "scrapping.php";

    $page = build($page,$table,$session);

    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    $ID = $_GET['ID'];
    
    //DEFINISCO VARIABILI INTERNE
    $Titolo = '';
    $Immagine = '';
    $AltImmagine = '';
    $Testo = '';

    //SE VIENE CLICCATO IL BOTTONE
    if(isset($_POST['submit'])) {


        $Titolo = $_POST['Titolo'];
        $AltImmagine = $_POST['AltImmagine'];
        $file = $_FILES['Immagine']['name'];
        $Testo = $_POST['Testo'];

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
                    $insertion = $dbAccess->insertFile($table,$Titolo,$imgContent,$AltImmagine,$Testo);
                }
                
                if($insertion == true) {
                    $page = insert($page,$Titolo,$imgContent,$AltImmagine,$Testo);
                    }
                else {
                    $message = 'Errore nell\'inserimento';
                }
            }
        }
    }
    
    $page = sostitute($page,$end,$message,$Titolo,$AltImmagine,$Testo);

    echo $page;

?>