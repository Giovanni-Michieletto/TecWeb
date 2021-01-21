<?php

    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }

    $table = $_GET['table'];

    $page = file_get_contents('blankForm.html');

    include 'scraping.php';

    $page = buildHTML($page,'',$_SESSION['logged']);
    
    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    if($_GET['ID']) {
        $page =  buildForm($page,$table,$_GET['ID'],$_SESSION['action']);
    }
    else {
        $page = buildForm($page,$table,'',$_SESSION['action']);

    }
    echo $page;
    
?>