<?php

    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }

    $table = $_GET['table'];

    $page = file_get_contents('blankForm.html');

    include 'scraping.php';

    $page = footer($page,$_SESSION['logged']);
    $page =  str_replace("<percorso />",$_SESSION['action'].' '.$table,$page);
    $page =  str_replace("<abort />",'<a href="Admin.php">Annulla operazione</a>',$page);

    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    if(!empty($_GET['ID'])) {
        $page =  buildForm($page,$table,$_GET['ID'],$_SESSION['action']);
    }
    else {
        $page = buildForm($page,$table,'',$_SESSION['action']);

    }
    echo $page;
    
?>