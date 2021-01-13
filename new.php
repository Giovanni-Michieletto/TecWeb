<?php
    $session = $_GET['session'];
    if ($session!="modifica" && $session!=true) {
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

            if($list) {
                foreach ($list as $cell) {
                    if($ID == $cell['ID']) {
                        $Img = $cell['Immagine'];
                    }
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
                $error = true;
                foreach ($list as $cell) {
                    if($ID != $cell['ID']) {
                        if($Titolo == $cell['Titolo']) {
                            $page = str_replace('<errorTitle />','<p style="color:red;">Titolo gia esistente</p>', $page);
                            $error = false;
                        }
                        if($imgContent == $cell['Immagine']) {
                            $page = str_replace('<errorImage />', '<p style="color:red;">Immagine gia esistente</p>', $page);
                            $error = false;
                        }
                        if($AltImmagine == $cell['AltImmagine']) {
                            $page = str_replace('<errorAlt />','<p style="color:red;">AltImmagine gia esistente</p>', $page);
                            $error = false;
                        }
                        if($Testo == $cell['Testo']) {
                            $page = str_replace('<errorText />','<p style="color:red;">Testo gia esistente</p>', $page);
                            $error = false;
                        }
                    }
                }

                if($error == true) {
                    
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
    }

    $page = str_replace('action=""','action="new.php?session=true&table='.$table.'"',$page);

    $page = str_replace('<h1 />', '<h1>Inserimento '.$table.'</h1>', $page);

    if($session=="modifica") {
        $page = str_replace('onsubmit="valida()">','onsubmit="valida()">Modifica',$page);
    }
    else {
        $page = str_replace('onsubmit="valida()">','onsubmit="valida()">Inserisci',$page);
    }
    
    
    
    
    $page = str_replace('<message />', $message, $page);

    $page = str_replace('name="Titolo"', 'name="Titolo" ' . $end .' value="'.$Titolo.'"', $page);
    $page = str_replace('name="AltImmagine"', 'name="AltImmagine" ' . $end .' value="'.$AltImmagine.'"', $page);
    $page = str_replace('name="Testo">', 'name="Testo" ' . $end . '>' .$Testo, $page);

    echo $page;
?>