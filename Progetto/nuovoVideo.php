<?php

    $page=file_get_contents('nuovoVideoForm.html');

    $message = '';
    $Link = '';

    $end = '';

    $errorTitle = '';
    $errorLink = '';

    if(isset($_POST['submit'])) {

        $Titolo = $_POST['Titolo'];
        $Link = $_POST['Link'];

        if(strlen($Titolo)!=0 && strlen($Link)!=0) {
            
            if(strpos($Link,"src")!=false) {
                echo $extract[0]  . '       extract0 <br>';
                echo $extract[1]  . '       extract1 <br>';
                $extract = explode('src="',$Link);
                $extract = explode('"',$extract[1]);
                $Link = $extract[0];
            }

            require_once "dbConnection.php";
            $dbAccess = new DBAccess();

            $connection = $dbAccess->openDBConnection();

            if($connection) {

                $listVideos = $dbAccess->getVideos();

                foreach ($listVideos as $video) {
                    if($Titolo == $video['Titolo']) {
                        $errorTitle = 'Titolo gia esistente';
                    }
                    if($Link == $video['Link']) {
                        $errorLink = 'Link gia esistente';
                    }
                }
                if( strlen($errorTitle)==0 && strlen($errorLink)==0) {

                    $insertion = $dbAccess->insertVideo($Titolo,$Link);
                
                    if($insertion == true) {
                        $message = '<div id="conferma"><h1>Video inserito correttamente</h1></div>';
                        $end = 'readonly';
                        $page = str_replace('<textarea id="Link" rows="5" cols="200" placeholder="Link" name="Link"></textarea>','<iframe width="560" height="315" src="' . $Link  . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',$page);
                        $page = str_replace('action="nuovoVideo.php"','action="nuovoVideoForm.html"',$page);
                        $page = str_replace('>Inserisci<','>Nuovo form di inserimento<',$page);                }
                    else {
                        $message = '<div id="conferma"><p>Errore nell\'inserimento del Video</p></div>';

                }
                }
            }
        }
        else {
            if(strlen($Titolo)==0) {
                $errorTitle = 'Titolo troppo corto';
            }
            if(strlen($Link)==0) {
                $errorLink = 'Link troppo corto';
            }
        }
    }

    $page = str_replace('<errorTitle />','<p style="color:red;">' . $errorTitle .'</p>', $page);
    $page = str_replace('<errorLink />','<p style="color:red;">' . $errorLink .'</p>', $page);

    $page = str_replace('<message />', $message, $page);
    $page = str_replace('name="Titolo"', 'name="Titolo" ' . $end .' value="'.$Titolo.'"', $page);
    $page = str_replace('name="Link">', 'name="Link" ' . $end . '>' .$Link, $page);

    echo $page;
?>