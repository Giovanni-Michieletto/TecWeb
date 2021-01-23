<?php
    include "scraping.php";
    session_start();
    $_SESSION['logged']=false;
    header("Location: Home.php",TRUE);
?>