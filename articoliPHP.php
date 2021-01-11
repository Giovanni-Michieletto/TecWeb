<?php

    require_once "dbConnection.php";

    $page = file_get_contents('articoli.html');

    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 

    if($connection) {

        $listArticles = $dbAccess->getArticles();  

        $definition = "";

        if ($listArticles) {    
            
            foreach ($listArticles as $article) {
     			$Anteprima = substr($article['Testo'],0,150) . " ...";  
                $definition .= '<div class="sentieri-card">';
                    $definition .= '<a href="singoloArticolo.php? Titolo=' . $article['Titolo'] .'">';
                        $definition .= '<div class="t-cont">';
                            $definition .= '<h3>' . $article['Titolo'] . '</h3>';
                        $definition .= '</div>';
                        $definition .= '<div class="img-cont">';
                            $definition .= '<img src="data:charset=utf-8;base64, ' . $article['Immagine'] . '" alt="' . $article['AltImmagine'] . '"/>';
                        $definition .= '</div>';
                        $definition .= '<div class="text-cont">';
                            $definition .= '<p>' . $Anteprima . '</p>';
                        $definition .= '</div>';
                    $definition .= '</a>'; 
                $definition .= '</div>';
            }
        }
        else {
            $definition = "<p>Nessun articolo presente</p>";  
        }

        echo str_replace("<listArticles />",$definition,$page); 
    }
    
?>