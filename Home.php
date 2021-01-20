<?php 

    session_start();
    $page = file_get_contents('Home.html');

    include 'scraping.php';

    echo footer($page,$_SESSION['logged']);

?>