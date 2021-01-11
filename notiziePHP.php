<?php

    $session = $_GET['session'];

    require_once "dbConnection.php";

    $page = file_get_contents('Notizie.html');

    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 

    if($connection)  {

        $listNews = $dbAccess->getNews();  

        $definition = "";

        if ($listNews) {        
            foreach ($listNews as $news) {
     			$Anteprima = substr($news['Testo'],0,150) . " ...";
                $definition .= '<div class="card">';
                        if($session=="elimina") {
                            //opzione di eliminare
                        }
                        else{
                            $definition .= '<a href="update.php? ID=' . $news['ID'] .' & session=' . $session . '>';
                        }
                        $definition .= '<div class="t-cont">';
                            $definition .= '<h3>' . $news['Titolo'] . '</h3>';
                        $definition .= '</div>';
                        $definition .= '<div class="img-cont">';
                            $definition .= '<img src="data:charset=utf-8;base64, ' . $news['Immagine'] . '" alt="' . $news['AltImmagine'] . '"/>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-body">';
                            $definition .= '<p class="card-text">' . $Anteprima . '</p>';
                        $definition .= '</div>';
                    $definition .= '</a>'; 
                $definition .= '</div>';
            }
        }
        else {
            $definition = "<p>Nessuna notizia presente</p>";  
        }

        echo str_replace("<listNews />",$definition,$page); 
    }
    
?>