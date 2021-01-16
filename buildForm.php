<?php

    //PRENDO VARIABILI PASSATE
    $table = $_GET['table'];
    $ID = $_GET['ID'];
    $session = $_GET['session'];

    if ($session!="modifica" && $session!=true) {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');
    
    if($session =="modifica") {
        require_once  "update.php";
        $page = str_replace('<buttonName />','Modifica',$page);
        $page = str_replace('<buttonName />', 'Modifica '.$table, $page);
        $page = str_replace('<action />','upload.php?session=modifica&table='.$table.'&ID='.$ID,$page);
        $page = update($page,$table,$ID);
    }
    else {
        $page = str_replace('<titlePage />', 'Inserimento '.$table, $page);
        $page = str_replace('<buttonName />','Inserisci',$page);
        $page = str_replace('<action />','upload.php?session=true&table='.$table,$page);
    }
    
    echo $page;
    
?>