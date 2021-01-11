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

            $Username = base64_encode($Username);       //codifica di nome e password per dare una parvenza di sicurezza
            $User = explode('=="',$Username);           //metto in base64 e ci tolgo gli == alla fine per non far capire che è base64
            $Username = $User[0];

            $Password = base64_encode($Password);       //idem qua
            $Pass = explode('=="',$Password);
            $Password = $Pass[0];

            $Login = $dbAccess->getLogin();                 //Fare funzione getLogin() in dbAccess e tabella in database

            if($Login['Username']==$Username && $Login['Password']==$Password) {
                $page = file_get_contents('admin.html');                            //fare pagina admin.html
            }
            else {
                $message = '<div><p style="color:red;">Username o password non corretti</p></div>';
                $page = str_replace('<message />', $message, $page);
            }
        }
        else {
            $message = '<div><p style="color:red;">Errore di connessione al database</p></div>';
            $page = str_replace('<message />', $message, $page);
        }
        
    }

    echo $page;
?>


/*da modificare:
- base64_decode --> md5()
- file_get_contents -->header(location: ....)
- decidere se mettere solo username come id o fare chiave primaria multipla con user e pw
per il resto mi sembra perfetto
*/