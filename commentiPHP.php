<?php

    require_once "dbConnection.php";

    $page = file_get_contents('commenti.html');

    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 

    if($connection) {

        $listComments = $dbAccess->getComments();  

        $definition = "";

        if ($listComments) {        
            foreach ($listComments as $comment) {
     			$Anteprima = substr($comment['Testo'],0,150) . " ...";  
                 $definition .= '<div class="card">';
                 $definition .= '<a href="singoloCommento.php?Titolo=' . $comment['Titolo'] .'">';
                $definition .= '<div class="t-cont">';
                $definition .= '<h3>' . $comment['Titolo'] . '</h3>';
                $definition .= '</div>';
                $definition .= '<div class="img-cont">';
                $definition .= '<img src="data:charset=utf-8;base64, ' . $comment['Immagine'] . '" alt="' . $comment['AltImmagine'] . '"/>';
                $definition .= '</div>';
                $definition .= '<div class="card-body">';
                $definition .= '<p class="card-text">' . $Anteprima . '</p>';
                $definition .= '</div>';
                $definition .= '</a>'; 
                $definition .= '</div>';
            }
        }
        else {
            $definition = "<p>Nessun commento presente</p>";  
        }

        echo str_replace("<listComments />",$definition,$page); 
    }
    
?>