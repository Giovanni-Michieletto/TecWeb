<?php

   require_once "dbConnection.php";

   $page=file_get_contents('associazioni.html');

   $dbAccess = new DBAccess();
   $connection = $dbAccess->openDBConnection();

   if($connection) {

      $listAssociation = $dbAccess->getAssociation(); //da fare !
      $definition="";
      
      if($listAssociation){

         foreach($listAssociation as $association){
            $Anteprima = substr($association['Testo'],0,150). " ...";
            $definition .= '<div class="card">';
               $definition .= '<div class="t-cont">';
                  $definition .= '<h3>' . $association['Titolo'] .'</h3>';
               $definition .= '</div>';
               $definition .= '<div class="img-cont">';
                     $definition .= '<img src="data:charset=utf-8;base64, ' . $association['Immagine'] . '" alt="' . $association['AltImmagine'] . '"/>';
                 $definition .= '</div>';
                 $definition .= '<div class="card-body">';
                     $definition .= '<p class="card-text">' . $Anteprima . '</p>';
                 $definition .= '</div>';
            $definition .= '</div>'; 
         }
      }else{
         $definition="<p>Nessuna Associazione presente</p>";
      }

      echo str_replace("<listAssotiation />", $definition, $page);
   }

?>