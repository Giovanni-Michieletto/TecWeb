<?php
    session_start();
    $table = $_GET['table'];

    $page = file_get_contents('view.html');
    
    include 'scraping.php';

    $page = footer($page,$_SESSION['logged']);

    if($_GET['ID']) {
        $string = '<script> window.alert(Eliminazione riuscita); </script>';
        $page = str_replace('<myScript />',$string,$page);
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
                        $definition .= '<div class="t-cont">';
                            $definition .= '<h3>' . $cell['Titolo'] . '</h3>';
                        $definition .= '</div>';
                        $definition .= '<div class="img-cont">';
                            $definition .= '<img src="' . $cell['Immagine'] . '" alt="' . $cell['AltImmagine'] . '"/>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-body">';
                            $definition .= '<p class="card-text">' . $anteprima . '</p>';
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
        $definition = "<h3>Errore di collegamento al database</h3>";
    }


    $page = str_replace("<titlePage />",$table,$page);   
    $page = str_replace("<percorso />",$table,$page);   
    $page =  str_replace("<list />",$definition,$page);
    $page = buildHTML($page,$table,$_SESSION['logged']);
    echo $page;
    
?>