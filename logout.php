<?php
    include "scraping.php";

    session_destroy();
    $page = file_get_contents('Home.html');
    echo footer($page);
?>