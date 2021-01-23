<?php 
    include 'scraping.php';
    session_start();
    $page = file_get_contents('Storia.html');
    $page = buildHTML($page,'Storia',$_SESSION['logged']);
    echo $page;
?>