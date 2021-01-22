<?php

    $session = $_GET['session'];
    $table = $_GET['table'];

    $page = file_get_contents('view.html');

    if($_GET['ID']) {
        $string = '<script> window.alert(Eliminazione riuscita); </script>';
        $page = str_replace('<myScript />',$string,$page);
    }

    /*______CREAZIONE MENU______*/
    $tabelle=['Home','Articoli','Associazioni','Commenti','Notizie','Storia'];
    foreach($tabelle as $li) {
        if($li == $table) {
            $menu .= '<li class="notlink">'.$li.'</li>';
        }
        else if($li == 'Home' || $li == 'Storia') {
            $menu .= '<li><a href="'.$li.'.html">'.$li.'</a></li>';
        }
        else {
            $menu .= '<li><a href="view.php?table='.$li.'">'.$li.'</a></li>';
        }
    }


    /*______CREAZIONE CARD______*/

    require_once "dbConnection.php";

    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 

    if($connection)  {

        $list = $dbAccess->getFile($table);  

        $definition = "";

        if ($list) {        
            foreach ($list as $cell) {
                $anteprima = substr($cell['Testo'],0,150) . " ...";
                $definition .= '<div class="card">';
                        if($session=="elimina") {
                            $definition .= '<a href="delete.php?session=' . $session . '&table=' . $table . '&ID=' . $cell['ID'] . '">';
                        }
                        else if($session=="modifica"){
                            $definition .= '<a href="buildForm.php?session=' . $session . '&table=' . $table . '&ID=' . $cell['ID'] . '">';
                        }
                        else {
                            $definition .= '<a href="singolo.php? ID=' . $cell['ID']. '&table=' . $table . '">';
                        }
                        $definition .= '<div class="card-title">';
                            $definition .= '<h3>' . $cell['Titolo'] . '</h3>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-img">';
                            $definition .= '<img src="' . $cell['Immagine'] . '" alt="' . $cell['AltImmagine'] . '"/>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-text">';
                            $definition .= '<p class="card-text">' . $anteprima . '</p>';
                        $definition .= '</div>';
                    $definition .= '</a>'; 
                $definition .= '</div>';
            }
        }
        else {
            $definition = "<p>Nessuna file presente</p>";  
        }

        $page = str_replace("<titlePage />",$table,$page); 
        $page =  str_replace("<list />",$definition,$page); 
        
        echo $page;
    }
    else {
        $definition = "<h3>Errore di collegamento al database</h3>";
    }

    $page =  str_replace("<menu />",$menu,$page);
    $page =  str_replace("<percorso />",$table,$page);
    $page =  str_replace("<titolo />",$table,$page); 
    $page =  str_replace("<list />",$definition,$page);

    echo $page;
    
?>