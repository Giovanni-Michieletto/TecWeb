<?php
    include 'scraping.php';
    require_once "dbConnection.php";
    session_start();
    $table = $_GET['table'];
    $page = file_get_contents('view.html');
    if(empty($_SESSION['action'])) {
        $_SESSION['action'] = "";
    }
    if(empty($_SESSION['logged'])) {
        $_SESSION['logged'] = false;
    }
    $title=$table;
    $tableArray = ['Articoli','Associazioni','Vangeli','Eventi'];
    $titleArray = ['Articolo','Associazione','Vangelo','Evento'];
    for ($i=0;$i<4;++$i){
        if($table==$titleArray[$i]) {
            $table = $tableArray[$i];
        }
    }
    $dbAccess = new DBAccess();          
    $connection = $dbAccess->openDBConnection(); 
    if($connection)  {
        $list = $dbAccess->getFile($table);  
        $definition = "";
        if ($list) {        
            foreach ($list as $cell) {
                $anteprima = substr($cell['Testo'],0,150) . " ...";
                $definition .= '<div class="card">';
                        if($_SESSION['logged']==true) {
                            if($_SESSION['action']=="Elimina" || $_SESSION['action']=="Modifica") {
                                $definition .= '<a href="buildForm.php?table=' . $title . '&ID=' . $cell['ID'] . '">';
                            }else {
                                $definition .= '<a href="singolo.php?table=' . $table . '&ID=' . $cell['ID'].'">';
                            }
                        }
                        else {
                            $definition .= '<a href="singolo.php?table=' . $table . '&ID=' . $cell['ID'].'">';
                        }
                        $definition .= '<div class="card-title">';
                            $definition .= '<h3>' . $cell['Titolo'] . '</h3>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-img">';
                            $definition .= '<img src="' . $cell['Immagine'] . '" alt="' . $cell['AltImmagine'] . '"/>';
                        $definition .= '</div>';
                        $definition .= '<div class="card-text">';
                            $definition .= '<p>' . $anteprima . '</p>';
                            // class="card-text"
                        $definition .= '</div>';
                    $definition .= '</a>'; 
                $definition .= '</div>';
            }
        }
        else {
            $definition = '<p class="no-file">Nessun file presente</p>';  
        } 
    }
    else {
        $definition = '<strong tabindex="1" class="errori">Errore di collegamento al database</strong>';
    }
    if($_SESSION['logged'] == false) {
        $page =  str_replace("<percorso />",$_SESSION['action'].' '.$title,$page);  
    }
    else {
        $page =  str_replace("<percorso />",' Admin » ' .$_SESSION['action'].' '.$title,$page);
    }  
    $page =  str_replace("<tornasu />","view.php?table=$title",$page);  
    $page =  str_replace("<list />",$definition,$page);
    if($_SESSION['action']=="Modifica" || $_SESSION['action']=="Elimina") {
        $page =  str_replace("<abort />",'<a class="hide" href="Admin.php">Annulla operazione</a>',$page);
        $page = str_replace("<titlePage />",'Seleziona '.$title,$page);
        $page = footer($page,$_SESSION['logged']);
    }
    else {
        $page = str_replace("<titlePage />",$title,$page);
        $page = buildHTML($page,$table,$_SESSION['logged']);
    }
    echo $page;
?>