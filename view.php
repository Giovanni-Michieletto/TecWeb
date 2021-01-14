<?php

    $session = $_GET['session'];
    $table = $_GET['table'];

    $page = file_get_contents('view.html');

    /*______CREAZIONE MENU, PERCORSO E TITOLO______*/
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
                $Anteprima = substr($cell['Testo'],0,150) . " ...";
                $definition .= '<div class="card">';
                        if($session=="elimina") {
                            $definition .= '<a href="delete.php?session=' . $session . '&table=' . $table . '&ID=' . $cell['ID'] . '">';
                        }
                        else if($session=="modifica"){
                            $definition .= '<a href="update.php?session=' . $session . '&table=' . $table . '&ID=' . $cell['ID'] . '">';
                        }
                        else {
                            $definition .= '<a href="singolo.php? ID=' . $cell['ID']. '&table=' . $table . '">';
                        }
                        $definition .= '<div class="t-cont">';
                            $definition .= '<h3>' . $cell['Titolo'] . '</h3>';
                        $definition .= '</div>';
                        $definition .= '<div class="img-cont">';
                            $definition .= '<img src="data:charset=utf-8;base64, ' . $cell['Immagine'] . '" alt="' . $cell['AltImmagine'] . '"/>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-body">';
                            $definition .= '<p class="card-text">' . $Anteprima . '</p>';
                        $definition .= '</div>';
                    $definition .= '</a>'; 
                $definition .= '</div>';
            }
        }
        else {
            $definition = "<h3>Nessuna file presente</h3>";  
        } 
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