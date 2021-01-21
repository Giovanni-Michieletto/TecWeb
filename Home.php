<?php 

    session_start();

    $page = file_get_contents('Home.html');

    include 'scraping.php';

    $page = buildHTML($page,'Home',$_SESSION['logged']);

    echo $page;

?>