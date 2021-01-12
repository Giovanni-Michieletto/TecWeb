<?php
    $session = $_GET['session'];
    if ($session!="modifica") {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('nuovoForm.html');

    $ID = $_GET['ID'];
    $table = $_GET['table'];
    
    require_once "dbConnection.php"; 

    $dbAccess = new DBAccess();

    $connection = $dbAccess->openDBConnection();            

    if($connection) {
        $list = $dbAccess->getFile($table); 

        foreach ($list as $cell) {
            if($ID == $cell['ID']) {
                $Titolo = $cell['Titolo'];
                $Immagine = $cell['Immagine'];
                $AltImmagine = $cell['AltImmagine'];
                $Testo = $cell['Testo'];
            }
        }
        
        $page = str_replace('name="Titolo"', 'name="Titolo" value="'.$Titolo.'"', $page);
        $page = str_replace('<errorImage />', '<img style="width:80%; height:80%;" src="data:charset=utf-8;base64, ' . $Immagine . '"/>',$page);
        $page = str_replace('name="AltImmagine"', 'name="AltImmagine" value="'.$AltImmagine.'"', $page);
        $page = str_replace('name="Testo">', 'name="Testo">' .$Testo, $page);

        $page = str_replace('action="nuovoNotizia.php"','action="nuovoForm.php?Img='.$Immagine.'&table='.$table.'$ID='.$ID.'&session=modifica"',$page);
        $page = str_replace('>Inserisci<','>Modifica<',$page);

    }

    $page = str_replace('<h1 />', '<h1>Modifica '.$table.'</h1>', $page);

    echo $page;
?>