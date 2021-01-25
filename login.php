<?php
    session_start();
    require_once "dbConnection.php"; 
    $page = file_get_contents('login.html');            
    $message = '';
    if(isset($_POST['submit'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $dbAccess = new DBAccess();
        $connection = $dbAccess->openDBConnection();
        if($connection) {
            $Username = md5($Username);
            $Password = md5($Password); 
            $Login = $dbAccess->getLogin();                 
            if($Login['Username']==$Username && $Login['Password']==$Password) {
                $_SESSION['logged'] = true;
                header('Location: Admin.php',TRUE);
            }
            else {
                $message = ' class="errori">Username o password non corretti!';
                $page = str_replace('>Inserire utente e password', $message, $page);
                echo $page;
            }
        }
        else {
            $message = ' class="errori">Errore di connessione al database';
            $page = str_replace('>Inserire utente e password', $message, $page);
            echo $page;
        }
    }
?>