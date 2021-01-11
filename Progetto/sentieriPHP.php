<?php
    require_once "dbConnection.php";    //chiama file dbConnection.php per la connessione al database

    $page = file_get_contents('sentieri.html');  //nome pagina del sentiero

    $dbAccess = new DBAccess();          //classe definita in dbConnection.php
    $connection = $dbAccess->openDBConnection();    //Richiede collegamneto utilizzando una funzione del file dbConnection.php
    
    if($connection) {
        $listArticles = $dbAccess->getArticles();   //Richiede articoli utilizzando una funzione del file dbConnection.php
        $definition = "";

        if ($listArticles) {        //creo la parte di articoli in html


            $num = 6;

            foreach ($listArticles as $article) {

                if($num == 0) {
                    break;
                }

                $Anteprima = substr($article['Testo'],0,150) . " ...";   //prende primi 100 caratteri


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
                
                $num -= 1;
            
            }
        }
        else {
            $definition = "<p>Nessun articolo presente</p>";    //se ho il DB vuoto mostro un messaggio
        }

        echo str_replace("<listArticles />",$definition,$page); //rimpiazzo la parte vuota che ho scritto in html con quella generata in php*/
    }
?>