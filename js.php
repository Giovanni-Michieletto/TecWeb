<?php
    session_start();
    $bool = $_GET['bool'];
    $_SESSION['js'] = $bool;
    header('Location: login.html',TRUE);
?>