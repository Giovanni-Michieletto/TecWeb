<?php
    class DBAccess {

        //Da inserire i valori
        private const HOST = "localhost";
        private const USERNAME = "root";
        private const PASSWORD = "";
        private const NAME = "convento";

        private $connection;

        //Funzione di connessione
        public function openDBConnection() {
            $this->connection = mysqli_connect(DBAccess::HOST, DBAccess::USERNAME, DBAccess::PASSWORD, DBAccess::NAME);
            if (mysqli_error($this->connection)) {
                return false;
            }
            else {
                return true;
            }
        }

        //Funzione che chiude il collegamento
        public function closeDBConnection() {
            //da fare
        }

        //Funzione generale di estrazione dati
        public function getFile($table) {
            $querySelect = "SELECT * FROM $table ORDER BY ID DESC";
            $queryResult = mysqli_query($this->connection, $querySelect);
            if (!$queryResult || mysqli_num_rows($queryResult)==0) {
                return null;
            }
            else {
                $list = array();
                while($row = mysqli_fetch_assoc($queryResult)) {
                    $cell = array(
                        "ID" => $row["ID"],
                        "Titolo" => $row["Titolo"],
                        "Immagine" => $row["Immagine"],
                        "AltImmagine" => $row["AltImmagine"],
                        "Testo" => $row["Testo"],
                    );
                    array_push($list,$cell);
                    }
                return $list;
            }
        }

        //Funzione per l'inserimento dei dati
        public function insertFile($table,$Titolo,$Immagine,$AltImmagine,$Testo) {
            $table .= "(Titolo,Immagine,AltImmagine,Testo)";
            $value ="(\"$Titolo\",\"$Immagine\",\"$AltImmagine\",\"$Testo\")";
            $queryInsert = "INSERT INTO $table VALUES $value";
            $queryResult = mysqli_query($this->connection,$queryInsert);
            if(mysqli_affected_rows($this->connection) > 0) {
                return true;
            }
            else {
                return false;
            }
        }



        //Funzione modifica dati
        public function updateFile($table,$Titolo,$Immagine,$AltImmagine,$Testo,$ID) {
            $queryInsert = "UPDATE $table SET Titolo=\"$Titolo\", Immagine=\"$Immagine\", AltImmagine=\"$AltImmagine\", Testo=\"$Testo\" WHERE $table . ID=\"$ID\"";
            $queryResult = mysqli_query($this->connection,$queryInsert);
            if(mysqli_affected_rows($this->connection) > 0) {
                return true;
            }
            else {
                return false;
            }
        }


        //Funzione elimina dati
        public function deleteFile($table,$ID) {
            $queryInsert = "DELETE FROM $table WHERE $table . ID=\"$ID\"";
            $queryResult = mysqli_query($this->connection,$queryInsert);
            if(mysqli_affected_rows($this->connection) > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        //
        // LOGIN
        //
        public function getLogin() {
            $querySelect = 'SELECT * FROM Login';
            $queryResult = mysqli_query($this->connection, $querySelect);
            if (!$queryResult || mysqli_num_rows($queryResult)==0) {
                return null;
            }
            else {
                while($row = mysqli_fetch_assoc($queryResult)) {
                    $cell = array(
                        "Username" => $row["Username"],
                        "Password" => $row["Password"],
                    );
                }
                return $cell;
            }
        }




        /*
        //
        //ARTICOLI
        //
        public function getArticles() {
            $table = "Articoli";
            return $this->getFile($table);
        }
        public function insertArticle($Titolo,$Immagine,$AltImmagine,$Testo) {
            $table = "Articoli(Titolo,Immagine,AltImmagine,Testo)";
            $value = "(\"$Titolo\",\"$Immagine\",\"$AltImmagine\",\"$Testo\")";
            return $this->insertFile($table,$value);
        }
        
        
        //
        // NOTIZIE
        //
        public function getNews() {
            $table = "Notizie";
            return $this->getFile($table);
        }
        public function insertNews($Titolo,$Immagine,$AltImmagine,$Testo) {
            $table ="Notizie(Titolo,Immagine,AltImmagine,Testo)";
            $value ="(\"$Titolo\",\"$Immagine\",\"$AltImmagine\",\"$Testo\")";
            return $this->insertFile($table,$value);
        }


        //
        // COMMENTI
        //
        public function getComments() {
            $table = "Commenti";
            return $this->getFile($table);
        }
        public function insertComments($Titolo,$Immagine,$AltImmagine,$Testo) {
            $table ="Commenti(Titolo,Immagine,AltImmagine,Testo)";
            $value ="(\"$Titolo\",\"$Immagine\",\"$AltImmagine\",\"$Testo\")";
            return $this->insertFile($table,$value);
        }


        //=====================
        //=====ASSOCIAZIONI====
        //=====================
        public function getAssociation(){
            $table = "Associazioni";
            return $this->getFile($table);
        }
        public function insertAssociation($Titolo,$Immagine,$AltImmagine,$Testo){
            $table = "Associazioni(Titolo,Immagine,AltImmagine,Testo)";
            $value= "(\"$Titolo\",\"$Immagine\",\"$AltImmagine\",\"$Testo\")";
            return $this->insertFile($table,$value);
        }
        */



        
    }

?>