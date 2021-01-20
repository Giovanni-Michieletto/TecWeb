<?php

    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');

    include 'scraping.php';
    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    if($_GET['ID']) {
        echo build($page,$table,$_GET['ID'],$_SESSION['action']);
    }
    else {
        echo build($page,$table,'',$_SESSION['action']);
    }
    
?>