<?php

    $session = $_GET['session'];
    $table = $_GET['table'];

    $page = file_get_contents('view.html');

    if($_GET['ID']) {
        echo '<script> window.alert("Eliminazione riuscita"); </script>';
        echo "hey";

        $string = '<script> window.alert(Eliminazione riuscita); </script>';
        $page = str_replace('<myScript />',$string,$page);
    }

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
            $definition = "<p>Nessuna file presente</p>";  
        }
        $page = str_replace("<h2 />",'<h2>'.$table.'</h2>',$page); 
        $page =  str_replace("<list />",$definition,$page); 
        echo $page;
    }
    
?>