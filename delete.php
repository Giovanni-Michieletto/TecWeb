<?php
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');

    include 'scraping.php';

    $ID = $_GET['ID'];
    $table = $_GET['table'];

    $page = footer($page,$_SESSION['logged']);
    $page = str_replace('<titlePage />', 'Eliminazione '.$table, $page);
    $page =  str_replace("<percorso />",$_SESSION['action'].' '.$table,$page);

    if(isset($_POST['admin'])){
        header("Location: Admin.php");
    }
    
    require_once "dbConnection.php"; 

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();            

    if($connection) {
        $insertion = $dbAccess->deleteFile($table,$ID);
        if($insertion == true) {
            $message = 'Eliminazione andata a buon fine';
            $page = deleted($page);
            $page = buildHTML($page,'',$_SESSION['logged']);
            $_SESSION['action'] = '';
        }
        else {
            $message = '<strong class="errori">Errore nell\'eliminazione</strong>';
            $page = buildForm($page,$table,$ID,$_SESSION['action']);
        }
        $page = str_replace('<message />',$message,$page);
    }

    echo $page;

?>