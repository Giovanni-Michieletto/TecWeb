<?php 

    session_start();
    $page = file_get_contents('Storia.html');

    include 'scraping.php';

    echo footer($page,$_SESSION['logged']);

?>