<?php
    include 'scraping.php';
    require_once "dbConnection.php"; 
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }
    if(isset($_POST['admin'])){
        header("Location: Admin.php");
    }
    $table = $_GET['table'];
    if(!empty($_GET['ID'])) {
        $ID = $_GET['ID'];
    }
    else {
        $ID = '';
    }
    $Titolo = $_POST['Titolo'];
    $AltImmagine = $_POST['AltImmagine'];
    $Testo = $_POST['Testo'];
    $page = file_get_contents('blankForm.html');
    $tableArray = ['Articoli','Associazioni','Vangeli','Eventi'];
    $titleArray = ['Articolo','Associazione','Vangelo','Evento'];
    $title = $table;
    for ($i=0;$i<4;++$i){
        if($table==$titleArray[$i]) {
            $table = $tableArray[$i];
        }
    }
    if($_SESSION['action']=="Modifica") {
        $page = str_replace('<titlePage />', 'Modifica '.$title, $page);
    }
    else {
        $page = str_replace('<titlePage />', 'Inserimento '.$title, $page);
    }
    if($_SESSION['action'] =="Nuovo" && $title=="Associazione") {
        $page =  str_replace("<percorso />",' Admin » Nuova '.$title,$page);
    }
    else {
        $page =  str_replace("<percorso />",' Admin » ' .$_SESSION['action'].' '.$title,$page);
    }
    $error = true;
    if($_SESSION['js']=="false") {
        $array = noText($page,$error,$Titolo,$file,$AltImmagine,$Testo);
        $error = $array[0];
        $page = $array[1];
    }
    $dbAccess = new DBAccess();
    $connection = $dbAccess->openDBConnection();
    if($connection) {    
        if(empty($_FILES['Immagine']['name']) && $_SESSION['action']=="Modifica") {
            $Immagine = $_SESSION['image'];
            $_SESSION['image'] == '';
            $file = $Immagine;
        }
        else {
            $file = $_FILES['Immagine']['name'];
            $file = preg_replace("/[^A-Za-z0-9.]/", '', $file);
            $directory = $_SERVER['DOCUMENT_ROOT'] . '/TecWeb/upload/' . $table . '/';
            $dir = './upload/' . $table . '/';
            $ImmagineUpload = $directory . $file;
            $Immagine = $dir . $file;
        }
        $list = $dbAccess->getFile($table);
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
            if(!empty($_FILES['Immagine']['name'])) {
                move_uploaded_file($_FILES['Immagine']['tmp_name'],$ImmagineUpload);
            }
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
                $page =  str_replace("<abort />",'<div id="annulla-operazione"> <a>Annulla operazione</a> </div>',$page);
                $page = sostitute($page,'',$message,$Titolo,$AltImmagine,$Testo);
                $page = buildForm($page,$table,$ID,$_SESSION['action']);
            }
        }
        else {
            $page =  str_replace("<abort />",'<a id="annulla-operazione" href="Admin.php">Annulla operazione</a>',$page);
            $page = sostitute($page,'', '',$Titolo,$AltImmagine,$Testo);
            $page = buildForm($page,$table,$ID,$_SESSION['action']);
        }
    }
    $page = buildHTML($page,'',$_SESSION['logged']);
    echo $page;
?>