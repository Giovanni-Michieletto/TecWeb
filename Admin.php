<?php
    include 'scraping.php';
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }
    $_SESSION['action'] = '';
    $page = file_get_contents('Admin.html');    
    $page = buildHTML($page,'Admin',$_SESSION['logged']);
    echo $page;
?>