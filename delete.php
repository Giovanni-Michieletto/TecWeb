<?php
    require_once "dbConnection.php"; 
    include 'scraping.php';
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }
    if(isset($_POST['admin'])){
        header("Location: Admin.php");
    }
    $ID = $_GET['ID'];
    $table = $_GET['table'];
    $page = file_get_contents('blankForm.html');
    $tableArray = ['Articoli','Associazioni','Vangeli','Eventi'];
    $titleArray = ['Articolo','Associazione','Vangelo','Evento'];
    for ($i=0;$i<4;++$i){
        if($table==$titleArray[$i]) {
            $title = $table;
            $table = $tableArray[$i];
        }
    }
    $dbAccess = new DBAccess();
    $connection = $dbAccess->openDBConnection(); 
    if($connection) {
        $insertion = $dbAccess->deleteFile($table,$ID);
        if($insertion == true) {
            $message = '<a class="successo" href="#bottone" tabindex="1">Eliminazione andata a buon fine!</a>';
            $page = deleted($page);
            $page = buildHTML($page,'',$_SESSION['logged']);
            $_SESSION['action'] = '';
        }
        else {
            $message = '<strong class="errori">Errore nell\'eliminazione</strong>';
            $page = buildForm($page,$table,$ID,$_SESSION['action']);
        }
        $page = str_replace('<message id="message"/> ',$message,$page);
    }
    $page = footer($page,$_SESSION['logged']);
    $page = str_replace('<titlePage />', 'Eliminazione '.$table, $page);
    $page =  str_replace("<percorso />",' Admin » ' .$_SESSION['action'].' '.$table,$page);
    echo $page;
?>