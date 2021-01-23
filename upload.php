<?php
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }
    
    include 'scraping.php';

    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    if(!empty($_GET['ID'])) {
        $ID = $_GET['ID'];
    }
    else {
        $ID = "";
    }

    $tableArray = ['Articoli','Associazioni','Vangeli','Eventi'];
    $titleArray = ['Articolo','Associazione','Vangelo','Evento'];
    for ($i=0;$i<4;++$i){
        if($table==$titleArray[$i]) {
            $title = $table;
            $table = $tableArray[$i];
        }
    }

    $page = file_get_contents('blankForm.html');

    $page = buildHTML($page,'',$_SESSION['logged']);
    $page = str_replace('<titlePage />', 'Inserimento '.$title, $page);
    if($_SESSION['action'] =="Nuovo" && $title="Associazione") {
        $page =  str_replace("<percorso />",' Admin » Nuova '.$title,$page);
    }
    else {
        $page =  str_replace("<percorso />",' Admin » ' .$_SESSION['action'].' '.$title,$page);
    }


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
        $file = preg_replace("/[^A-Za-z0-9.]/", '', $file);
        $directory = $_SERVER['DOCUMENT_ROOT'] . '/TecWeb/upload/' . $table . '/';
        $dir = './upload/' . $table . '/';
        $ImmagineUpload = $directory . $file;
        $Immagine = $dir . $file;

        //VERIFICA DOPPIONI
        $error = true;
        if($list) {
            foreach ($list as $cell) {
                if($ID != $cell['ID']) {
                    $array = exists($page,$error,$Titolo,$Immagine,$AltImmagine,$Testo,$cell);
                    $error = $array[0];
                    $page = $array[1];    
                }
            }
        }
            
        if($error == true) {
            move_uploaded_file($_FILES['Immagine']['tmp_name'],$ImmagineUpload);

            if($_SESSION['action']=="Modifica") {
                $insertion = $dbAccess->updateFile($table,$Titolo,$Immagine,$AltImmagine,$Testo,$ID);
            }
            else {
                $insertion = $dbAccess->insertFile($table,$Titolo,$Immagine,$AltImmagine,$Testo);
            }
            
            if($insertion == true) {
                $page = insertForm($page,$Titolo,$Immagine,$AltImmagine,$Testo,$table);
                $_SESSION['action'] = '';
                }
            else {
                $message = '<strong class="errori">Errore nell\'inserimento</strong>';
                $page = sostitute($page,'',$message,$Titolo,$AltImmagine,$Testo);
                $page = buildForm($page,$table,$ID,$_SESSION['action']);
            }
        }
        else {
            $page = sostitute($page,'', '',$Titolo,$AltImmagine,$Testo);
            $page = buildForm($page,$table,$ID,$_SESSION['action']);
        }
    }

    echo $page;

?>