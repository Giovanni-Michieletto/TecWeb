<?php
    
    include "scraping.php";

    session_destroy();

    header("Location: Home.php",TRUE);
    
?>