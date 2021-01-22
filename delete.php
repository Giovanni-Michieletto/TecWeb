<?php
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }

    $ID = $_GET['ID'];
    $table = $_GET['table'];
    
    require_once "dbConnection.php"; 

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();            

    if($connection) {
        $insertion = $dbAccess->deleteFile($table,$ID);
    }

    header('Location: Admin.php', TRUE);
?>