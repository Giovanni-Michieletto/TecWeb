<?php
    session_start();
    
    $cerca = $_POST['cerca'];

    $page = file_get_contents('view.html');
    $home= file_get_contents('Home.html'); 
    $storia=file_get_contents('storia.html'); 

    include 'scraping.php';

    $page = footer($page,$_SESSION['logged']);

    /*______CREAZIONE CARD______*/

    require_once "dbConnection.php";

    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection();

    $tabelle=['Articoli','Associazioni','Vangeli','Eventi'];

    if($connection)  {

        $definition = '<div id="list">';
        foreach ($tabelle as $table){
            $find=false;
            $definition .= '<h3>'.$table.'</h3>';
            $list = $dbAccess->getFile($table); 
            if($list) {
                foreach($list as $cell){
                    if(strpos($cell['Titolo'],$cerca)!=false){
                        $find=true; 
                        $definition .= '<dl> <dt>'.$cell['Titolo'].'</dt> <dd>'.substr($cell['Testo'],0,100).'...</dd> </dl>';
                    } 
                    else if(strpos($cell['Testo'],$cerca)!=false){
                        $find=true;
                        $definition .= '<dl> <dt>'.$cell['Titolo'].'</dt> <dd>'.substr($cell['Testo'],strpos($cell['Testo'],$cerca),100).'...</dd> </dl>';
                    }
                } 
            }
            if($find==false){
                $definition .= '<p>Nessuna ricorrenza trovata</p>'; 
            }
        } 
        if(strpos($home,$cerca)!=false){
            $definition .= '<h3>Home</h3>';
            $definition .= '<p>'.substr($cell['Testo'],strpos($home,$cerca),100).'</p>';
        }
        else {
            $definition .= '<h3>Home</h3>';
            $definition .= '<p>Nessuna ricorrenza trovata</p>';
        }
        if(strpos($storia,$cerca)!=false){
            $definition .= '<h3>Storia</h3>';
            $definition .= '<p>'.substr($cell['Testo'],strpos($home,$cerca),100).'</p>'; 
        }
        else {
            $definition .= '<h3>Storia</h3>';
            $definition .= '<p>Nessuna ricorrenza trovata</p>';
        }
    } 

    $page=str_replace('<list />',$definition,$page);

    $page=buildHTML($page, "", $_SESSION['logged']);
    $page =  str_replace("<percorso />",'Pagina di ricerca',$page);
    $page =  str_replace("<titolo />",'Risultati ricerca',$page); 


    echo $page;
    
?>