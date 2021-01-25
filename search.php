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
            $definition .= '<h2>'.$table.'</h2>';
            $list = $dbAccess->getFile($table); 
            if($list) {
                foreach($list as $cell){
                    if(strpos(strtolower($cell['Titolo']),strtolower($cerca))!=false){
                        $find=true; 
                        $definition .= '<a href="singolo.php?table=' . $table . '&amp;ID=' . $cell['ID'].'"><dl> <dt> <h3>'.$cell['Titolo'].'</h3> </dt> <dd>'.substr($cell['Testo'],0,100).'...</dd> </dl></a>';
                    } 
                    else if(strpos(strtolower($cell['Testo']),strtolower($cerca))!=false){
                        $find=true;
                        $definition .= '<a href="singolo.php?table=' . $table . '&amp;ID=' . $cell['ID'].'"><dl> <dt> <h3>'.$cell['Titolo'].'</h3> </dt> <dd>'.substr($cell['Testo'],strpos($cell['Testo'],$cerca),100).'...</dd> </dl> </a>';
                    }
                } 
            }
            if($find==false){
                $definition .= '<p>Nessuna ricorrenza trovata</p>'; 
            }
        } 
        if(strpos(strtolower($home),strtolower($cerca))!=false){
            $definition .= '<a href="index.php">';
            $definition .= '<h2>Home</h2>';
            $definition .= '<p>...'.substr($cell['Testo'],strpos($home,$cerca),100).'...</p>';
            $definition .= '</a>';
        }
        else {
            $definition .= '<h2>Home</h2>';
            $definition .= '<p>Nessuna ricorrenza trovata</p>';
        }
        if(strpos(strtolower($storia),strtolower($cerca))!=false){
            $definition .= '<a href="Storia.php">';
            $definition .= '<h2>Storia</h2>';
            $definition .= '<p>...'.substr($cell['Testo'],strpos($home,$cerca),150).'...</p>';
            $definition .= '</a>'; 
        }
        else {
            $definition .= '<h2>Storia</h2>';
            $definition .= '<p>Nessuna ricorrenza trovata</p>';
        }
        $definition .='</div>';
    } 
    $page=str_replace('<list />',$definition,$page);
    $page=buildHTML($page, "", $_SESSION['logged']);
    $page =  str_replace("<titolo />",'<h1>Risultati della ricerca per: "'.$cerca.'"</h1>',$page); 
    echo $page;
?>