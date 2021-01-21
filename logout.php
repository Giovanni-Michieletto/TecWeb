<?php
    session_start();

    include "scraping.php";

    $_SESSION['logged']=false;

    header("Location: Home.php",TRUE);
    
?>