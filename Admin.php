<?php
    session_start();
    
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }
    
    include 'scraping.php';

    $page = file_get_contents('Admin.html');

    //javascript per controllo bottoni
    
    
    $page = buildHTML($page,'Admin',$_SESSION['logged']);

    echo $page;
?>