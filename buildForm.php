<?php
    include 'scraping.php';
    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    $ID = $_GET['ID'];
    $session = $_GET['session'];

    if ($session!="modifica" && $session!=true) {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');

    echo build($page,$table,$ID,$session);
    
?>