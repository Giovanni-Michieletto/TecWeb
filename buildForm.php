<?php
    include 'scraping.php';
    session_start();
    if($_SESSION['logged']!=true) {
        header('Location: login.html',TRUE);
    }
    if(empty($_GET['table'])) {
        header('Location: Admin.php?message=false',TRUE);
    }
    else {
        $table = $_GET['table'];
    }
    $page = file_get_contents('blankForm.html');
    if($_SESSION['action'] =="Nuovo" && $title="Associazione") {
        $page =  str_replace("<percorso />",' Admin » Nuova '.$table,$page);
    }
    else {
        $page =  str_replace("<percorso />",' Admin » ' .$_SESSION['action'].' '.$table,$page);
    }
    if(!empty($_GET['ID'])) {
        $page =  buildForm($page,$table,$_GET['ID'],$_SESSION['action']);
    }
    else {
        $page = buildForm($page,$table,'',$_SESSION['action']);
    }
    if($_SESSION['action']=="Modifica") {
        $page = str_replace('validate()','validateUpdate()',$page);
    }
    $page =  str_replace("<abort />",'<a id="annulla-operazione" href="Admin.php">Annulla operazione</a>',$page);
    $page =  str_replace("<tornadietro />",'<i class="fas fa-angle-double-left"></i>',$page);
    $page = footer($page,$_SESSION['logged']);
    $page = str_replace('<link />','',$page);   
    $page = str_replace('<menu />','',$page);  
    $page = str_replace('<search />','',$page); 
    $page = str_replace('<errorTitle />','',$page); 
    $page = str_replace('<errorAlt />','',$page); 
    $page = str_replace('<errorText />','',$page); 
    echo $page;
    
?>