<?php

    require_once "dbConnection.php";

    $page = file_get_contents('video.html');

    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 

    if($connection) {

        $listVideos = $dbAccess->getVideos();  

        $definition = "";

        if ($listVideos) {        
            foreach ($listVideos as $video) {
                 $definition .= '<div class="card-video">';
                //  $definition .= '<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">';
                     $definition .= '<iframe width="260" height="145" src="' . $video['Link'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                //  $definition .= '</div>';
             $definition .= '</div>';  
            }
        }
        else {
            $definition = "<p>Nessun video presente</p>";  
        }

        echo str_replace("<listVideos />",$definition,$page); 
    }
    
?>