<?php
    include 'scraping.php';
    require_once "dbConnection.php";
    session_start();
    $cerca = $_POST['cerca'];
    $page = file_get_contents('search.html');
    $home= file_get_contents('Home.html'); 
    $storia=file_get_contents('storia.html'); 
    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection();
    $tabelle=['Articoli','Associazioni','Vangeli','Eventi'];
    if($connection)  {
        $definition = '<div id="list">';
        foreach ($tabelle as $table){
            $find=false;
            $definition .= '<h1>'.$table.'</h1>';
            $list = $dbAccess->getFile($table); 
            if($list) {
                foreach($list as $cell){
                    if(strpos(strtolower($cell['Titolo']),strtolower($cerca))!=false){
                        $find=true; 
                        $definition .= '<dl> <dt> <h2>'.$cell['Titolo'].'</h2> </dt> <dd>'.substr($cell['Testo'],0,100).'...</dd> </dl>';
                    } 
                    else if(strpos(strtolower($cell['Testo']),strtolower($cerca))!=false){
                        $find=true;
                        $definition .= '<dl> <dt> <h2>'.$cell['Titolo'].'</h2> </dt> <dd>'.substr($cell['Testo'],strpos($cell['Testo'],$cerca),100).'...</dd> </dl>';
                    }
                } 
            }
            if($find==false){
                $definition .= '<p class="dt">Nessuna ricorrenza trovata</p>'; 
            }
        } 
        if(strpos(strtolower($home),strtolower($cerca))!=false){
            $definition .= '<h1>Home</h1>';
            $definition .= '<p class="dt">...'.substr($cell['Testo'],strpos($home,$cerca),100).'...</p>';
        }
        else {
            $definition .= '<h1>Home</h1>';
            $definition .= '<p class="dt">Nessuna ricorrenza trovata</p>';
        }
        if(strpos(strtolower($storia),strtolower($cerca))!=false){
            $definition .= '<h1>Storia</h1>';
            $definition .= '<p class="dt">...'.substr($cell['Testo'],strpos($home,$cerca),150).'...</p>'; 
        }
        else {
            $definition .= '<h1>Storia</h1>';
            $definition .= '<p class="dt">Nessuna ricorrenza trovata</p>';
        }
    } 
    $page=str_replace('<list />',$definition,$page);
    $page=buildHTML($page, "", $_SESSION['logged']);
    $page =  str_replace("<percorso />",'Pagina di ricerca',$page);
    $page =  str_replace("<titolo />",'Risultati ricerca',$page); 
    echo $page;
?>