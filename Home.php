<?php 

    session_start();

    $page = file_get_contents('Home.html');

    include 'scraping.php';

    if(empty($_SESSION['logged'])) {
    	$_SESSION['logged'] = false;
    }

    $page = buildHTML($page,'Home',$_SESSION['logged']);

    echo $page;

?>