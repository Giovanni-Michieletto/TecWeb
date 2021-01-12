<?php

    $page = file_get_contents('login.html');            //fare pagina Login.html con i form

    $message = '';

    if(isset($_POST['submit'])) {

        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
                
        require_once "dbConnection.php"; 

        $dbAccess = new DBAccess();

        $connection = $dbAccess->openDBConnection();

        if($connection) {

            $Username = md5($Username);
            $Password = md5($Password); 

            $Login = $dbAccess->getLogin();                 

            if($Login['Username']==$Username && $Login['Password']==$Password) {
                //$page = file_get_contents('Amministration_home.html'); 
                header('Location: admin.php?session=true',TRUE);
            }
            else {
                $message = '<div><p style="color:red;">Username o password non corretti</p></div>';
                $page = str_replace('<message />', $message, $page);
                echo $page;
            }
        }
        else {
            $message = '<div><p style="color:red;">Errore di connessione al database</p></div>';
            $page = str_replace('<message />', $message, $page);
            echo $page;
        }
        
    }
?>