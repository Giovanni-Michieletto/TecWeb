<?php

    $page = file_get_contents('nuovoNotiziaForm.html');

    $message = '';
    $Titolo = '';
    $Immagine = '';
    $AltImmagine = '';
    $Testo = '';

    $end = '';

    $errorTitle = '';
    $errorImage = '';
    $errorAlt = '';
    $errorText = '';

    if(isset($_POST['submit'])) {

        $Titolo = $_POST['Titolo'];
        $AltImmagine = $_POST['AltImmagine'];
        $Immagine = $_FILES['Immagine']['name'];
        $Testo = $_POST['Testo'];
                
        if( strlen($Titolo)!=0 && strlen($Immagine)!=0 && strlen($AltImmagine)!=0 && strlen($Testo)!=0 ) {

            require_once "dbConnection.php"; 

            $dbAccess = new DBAccess();

            $connection = $dbAccess->openDBConnection();

            $imgContent = base64_encode(file_get_contents($_FILES['Immagine']['tmp_name'])); 

            if($connection) {

                $listNews = $dbAccess->getNews();

                foreach ($listNews as $news) {
                    if($Titolo == $news['Titolo']) {
                        $errorTitle = 'Titolo gia esistente';
                    }
                    if($imgContent == $news['Immagine']) {
                        $errorImage = 'Immagine gia esistente';
                    }
                    if($AltImmagine == $news['AltImmagine']) {
                        $errorAlt = 'AltImmagine gia esistente';
                    }
                    if($Testo == $news['Testo']) {
                        $errorText = 'Testo gia esistente';
                    }
                }

                if( strlen($errorTitle)==0 && strlen($errorImage)==0 && strlen($errorAlt)==0 && strlen($errorText)==0 ) {
                    
                    $insertion = $dbAccess->insertNews($Titolo,$imgContent,$AltImmagine,$Testo);
                
                    if($insertion == true) {
                        $message = '<div id="conferma"><h1>Notizia inserita correttamente</h1></div>';
                        $end = 'readonly';
                        $stringToreplace = '<input type="file" id="Immagine" accept="image/*" name="Immagine"/>';
                        $newString = '<img style="width:80%; height:80%;" src="data:charset=utf-8;base64, ' . $imgContent . '"/>';
                        $page = str_replace($stringToreplace,$newString,$page);
                        $page = str_replace('action="nuovoNotizia.php"','action="nuovoNotiziaForm.html"',$page);
                        $page = str_replace('>Inserisci<','>Nuovo form di inserimento<',$page);
                    }
                    else {
                        $message = '<div id="conferma"><p>Errore nell\'inserimento della notiza</p></div>';
                }
                }
            }
        }
        else {
            if(strlen($Titolo)==0) {
                $errorTitle = 'Titolo troppo corto';
            }
            if(strlen($errorImage)==0){
                $errorImage  = 'Reinserire immagine';
            }
            if(strlen($AltImmagine) == 0) {
                $errorAlt = 'Alt Immagine troppo corto';
            }
            if(strlen($Testo)==0) {
                $errorText = 'Testo troppo corto';
            }
        }
    }

    $page = str_replace('<errorTitle />','<p style="color:red;">' . $errorTitle . '</p>', $page);
    $page = str_replace('<errorImage />', '<p style="color:red;">' . $errorImage . '</p>', $page);
    $page = str_replace('<errorAlt />','<p style="color:red;">' . $errorAlt . '</p>', $page);
    $page = str_replace('<errorText />','<p style="color:red;">' . $errorText . '</p>', $page);
    
    $page = str_replace('<message />', $message, $page);

    $page = str_replace('name="Titolo"', 'name="Titolo" ' . $end .' value="'.$Titolo.'"', $page);
    $page = str_replace('name="AltImmagine"', 'name="AltImmagine" ' . $end .' value="'.$AltImmagine.'"', $page);
    $page = str_replace('name="Testo">', 'name="Testo" ' . $end . '>' .$Testo, $page);

    echo $page;
?>