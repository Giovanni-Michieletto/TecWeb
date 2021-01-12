<?php
    $session = $_GET['session'];
    if ($session!="modifica") {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');

    $table = $_GET['table'];
    $ID = $_GET['ID'];
    
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

        require_once "dbConnection.php"; 

        $dbAccess = new DBAccess();

        $connection = $dbAccess->openDBConnection();

        if($connection) {
                
            $list = $dbAccess->getFile($table);

            foreach ($list as $cell) {
                if($ID == $cell['ID']) {
                    $Img = $cell['Immagine'];
                }
            }
            if( strlen($Titolo)!=0 && (strlen($Immagine)!=0 || strlen($Img)!=0) && strlen($AltImmagine)!=0 && strlen($Testo)!=0 ) {

                if(strlen($Immagine)==0) {
                    $imgContent = $Img;
                }
                else {
                    $imgContent = base64_encode(file_get_contents($_FILES['Immagine']['tmp_name'])); 
                }

                //$list = $dbAccess->getFile($table);

                foreach ($list as $cell) {
                    if($ID != $cell['ID']) {
                        if($Titolo == $cell['Titolo']) {
                            $errorTitle = 'Titolo gia esistente';
                        }
                        if($imgContent == $cell['Immagine']) {
                            $errorImage = 'Immagine gia esistente';
                        }
                        if($AltImmagine == $cell['AltImmagine']) {
                            $errorAlt = 'AltImmagine gia esistente';
                        }
                        if($Testo == $cell['Testo']) {
                            $errorText = 'Testo gia esistente';
                        }
                    }
                }

                if( strlen($errorTitle)==0 && strlen($errorImage)==0 && strlen($errorAlt)==0 && strlen($errorText)==0 ) {
                    
                    if($session=="modifica") {
                        $insertion = $dbAccess->updateFile($table,$Titolo,$imgContent,$AltImmagine,$Testo,$ID);
                    }
                    else {
                        $insertion = $dbAccess->insertFile($table,$Titolo,$imgContent,$AltImmagine,$Testo);
                    }
                    if($insertion == true) {
                        $message = '<div id="conferma"><h1>Inserimento andato a buon fine</h1></div>';
                        $end = 'readonly';
                        $stringToreplace = '<input type="file" id="Immagine" accept="image/*" name="Immagine"/>';
                        $newString = '<img style="width:80%; height:80%;" src="data:charset=utf-8;base64, ' . $imgContent . '"/>';
                        $page = str_replace($stringToreplace,$newString,$page);
                        $page = str_replace('action=""','action="admin.php?session=TRUE"',$page);
                        $page = str_replace('name="submit">','>Torna alla home amministratore',$page);
                    }
                    else {
                        $message = '<div id="conferma"><p>Errore nell\'inserimento</p></div>';
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

    $page = str_replace('action=""','action="new.php?table='.$table.'"',$page);

    $page = str_replace('<h1 />', '<h1>Inserimento '.$table.'</h1>', $page);

    if($session=="modifica") {
        $page = str_replace('name="submit">','name="submit">Modifica',$page);
    }
    else {
        $page = str_replace('name="submit">','name="submit">Inserisci',$page);

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