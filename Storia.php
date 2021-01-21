<?php 

    session_start();
    $page = file_get_contents('Storia.html');

    include 'scraping.php';

    $page = buildHTML($page,'Storia',$_SESSION['logged']);
    echo $page;

?>