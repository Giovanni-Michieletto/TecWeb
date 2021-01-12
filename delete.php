<?php
    $session = $_GET['session'];
    if ($session!="elimina") {
        header('Location: login.html',TRUE);
    }

    $page = file_get_contents('blankForm.html');

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
        
        $page = str_replace('name="Titolo"', 'name="Titolo" readonly value="'.$Titolo.'"', $page);
        $stringToreplace = '<input type="file" id="Immagine" accept="image/*" name="Immagine"/>';
        $newString = '<img style="width:80%; height:80%;" src="data:charset=utf-8;base64, ' . $Immagine . '"/>';
        $page = str_replace($stringToreplace,$newString,$page);
        $page = str_replace('name="AltImmagine"', 'name="AltImmagine" readonly value="'.$AltImmagine.'"', $page);
        $page = str_replace('name="Testo">', 'name="Testo" readonly>' .$Testo, $page);

        //$page = str_replace('action=""','action="view.php?session='.$session.'&table='.$table.'"',$page);
        $page = str_replace('name="submit">','name="submit">Elimina',$page);

        if(isset($_POST['submit'])) {
            $insertion = $dbAccess->deleteFile($table,$ID);
            header('Location: view.php?session='.$session.'&table='.$table, TRUE);
        }
    }

    $page = str_replace('<h1 />', '<h1>Elimina '.$table.'</h1>', $page);

    echo $page;
?>