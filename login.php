<?php

    $page = file_get_contents('login.html');            

    $message = '';

    echo "login.php <br>";
    if(isset($_POST['submit'])) {

        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
                
        require_once "dbConnection.php"; 

        $dbAccess = new DBAccess();

        $connection = $dbAccess->openDBConnection();

        if($connection) {

            echo "connesso <br>";
            $Username = md5($Username);
            $Password = md5($Password); 

            $Login = $dbAccess->getLogin();                 

            if($Login['Username']==$Username && $Login['Password']==$Password) {
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