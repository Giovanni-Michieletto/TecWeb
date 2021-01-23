<?php
    session_start();
    $table = $_GET['table'];

    $page = file_get_contents('view.html');
    
    include 'scraping.php';

    if(empty($_SESSION['action'])) {
        $_SESSION['action'] = "";
    }

    if(empty($_SESSION['logged'])) {
        $_SESSION['logged'] = false;
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
                        if($_SESSION['logged']==true) {
                            if($_SESSION['action']=="Elimina" || $_SESSION['action']=="Modifica") {
                                $definition .= '<a href="buildForm.php?table=' . $table . '&ID=' . $cell['ID'] . '">';
                            }else {
                                $definition .= '<a href="singolo.php?table=' . $table . '&ID=' . $cell['ID'].'">';
                            }
                        }
                        else {
                            $definition .= '<a href="singolo.php?table=' . $table . '&ID=' . $cell['ID'].'">';
                        }
                        $definition .= '<div class="card-title">';
                            $definition .= '<h3>' . $cell['Titolo'] . '</h3>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-img">';
                            $definition .= '<img src="' . $cell['Immagine'] . '" alt="' . $cell['AltImmagine'] . '"/>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-text">';
                            $definition .= '<p>' . $anteprima . '</p>';
                            // class="card-text"
                        $definition .= '</div>';
                    $definition .= '</a>'; 
                $definition .= '</div>';
            }
        }
        else {
            $definition = "<p>Nessuna file presente</p>";  
        } 
    }
    else {
        $definition = '<strong class="errori">Errore di collegamento al database</strong>';
    }


    $page = str_replace("<titlePage />",$table,$page);
    $page =  str_replace("<percorso />",$_SESSION['action'].' '.$table,$page);  
    $page =  str_replace("<tornasu />","view.php?table=$table",$page);  
    $page =  str_replace("<list />",$definition,$page);
    if($_SESSION['action']=="Modifica" || $_SESSION['action']=="Elimina") {
        $page =  str_replace("<abort />",'<a href="Admin.php">Annulla operazione</a>',$page);
        $page = footer($page,$_SESSION['logged']);
    }
    else {
        $page = buildHTML($page,$table,$_SESSION['logged']);
    }
    echo $page;
    
?>