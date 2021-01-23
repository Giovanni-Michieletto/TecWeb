<?php 

    session_start();

    $page = file_get_contents('Home.html');

    include 'scraping.php';

    if(empty($_SESSION['logged'])) {
    	$_SESSION['logged'] = false;
    }

    if($_SESSION['logged'] == false) {
        $page =  str_replace("<percorso />",'Home',$page);  
    }
    else {
        $page =  str_replace("<percorso />",' Admin » Home',$page);
    }  
    $page = buildHTML($page,'Home',$_SESSION['logged']);

    echo $page;

?>