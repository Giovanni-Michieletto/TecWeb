<?php
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }
    
    include 'scraping.php';

    $page = file_get_contents('Admin.html');

    
    $table = $_POST['table'];
    $_SESSION['action'] = $_POST['action'];

    //javascript per controllo bottoni
    if(isset($_POST['submit'])) {
        if($error) {
            if($_SESSION['action']=="Nuovo") {
                header('Location: buildForm.php?table='.$table,TRUE);
            }
            else {
                header('Location: view.php?table='.$table,TRUE);
            }
        }
    }
    
    $page = buildHTML($page,'Admin',$_SESSION['logged']);

    echo $page;
?>