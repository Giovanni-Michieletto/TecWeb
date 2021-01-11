<?php
    class DBAccess {

        //Da inserire i valori
        private const HOST = "localhost";
        private const USERNAME = "root";
        private const PASSWORD = "";
        private const NAME = "DBsentieri";

        private $connection;

        //Funzione di connessione
        public function openDBConnection() {
            $this->connection = mysqli_connect(DBAccess::HOST, DBAccess::USERNAME, DBAccess::PASSWORD, DBAccess::NAME);
            if (mysqli_error($this->connection)) {
                die("Connessione non riuscita. Errore: " . mysqli_errno($this->connection));
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
        private function getFile($table) {
            $querySelect = "SELECT * FROM $table ORDER BY ID DESC";
            $queryResult = mysqli_query($this->connection, $querySelect);
            if (!$queryResult || mysqli_num_rows($queryResult)==0) {
                return null;
            }
            else {
                $list = array();
                if($table=="VideoConvento"){                       //caso video
                    while($row = mysqli_fetch_assoc($queryResult)) {
                        $cell = array(
                            "Titolo" => $row["Titolo"],
                            "Link" => $row["Link"],
                        );
                        array_push($list,$cell);
                    }
                }
                else {                                                  //caso notizie e commenti e articoli
                    while($row = mysqli_fetch_assoc($queryResult)) {
                        $cell = array(
                            "Titolo" => $row["Titolo"],
                            "Immagine" => $row["Immagine"],
                            "AltImmagine" => $row["AltImmagine"],
                            "Testo" => $row["Testo"],
                        );
                        array_push($list,$cell);
                    }
                }
                return $list;
            }
        }

        //Funzione per l'inserimento dei dati
        private function insertFile($table,$value) {
            $queryInsert = "INSERT INTO $table VALUES $value";
            $queryResult = mysqli_query($this->connection,$queryInsert);
            if(mysqli_affected_rows($this->connection) > 0) {
                return true;
            }
            else {
                return false;
            }
        }


        //
        //ARTICOLI
        //
        public function getArticles() {
            $table = "ArticoliSentiero";
            return $this->getFile($table);
        }
        public function insertArticle($Titolo,$Immagine,$AltImmagine,$Testo) {
            $table = "ArticoliSentiero(Titolo,Immagine,AltImmagine,Testo)";
            $value = "(\"$Titolo\",\"$Immagine\",\"$AltImmagine\",\"$Testo\")";
            return $this->insertFile($table,$value);
        }
        
        
        //
        // NOTIZIE
        //
        public function getNews() {
            $table = "NotizieConvento";
            return $this->getFile($table);
        }
        public function insertNews($Titolo,$Immagine,$AltImmagine,$Testo) {
            $table ="NotizieConvento(Titolo,Immagine,AltImmagine,Testo)";
            $value ="(\"$Titolo\",\"$Immagine\",\"$AltImmagine\",\"$Testo\")";
            return $this->insertFile($table,$value);
        }


        //
        // COMMENTI
        //
        public function getComments() {
            $table = "CommentiConvento";
            return $this->getFile($table);
        }
        public function insertComments($Titolo,$Immagine,$AltImmagine,$Testo) {
            $table ="CommentiConvento(Titolo,Immagine,AltImmagine,Testo)";
            $value ="(\"$Titolo\",\"$Immagine\",\"$AltImmagine\",\"$Testo\")";
            return $this->insertFile($table,$value);
        }


        //
        // VIDEO
        //
        public function getVideos() {
            $table = "VideoConvento";
            return $this->getFile($table);
        }
        public function insertVideo($Titolo,$Link) {
            $table ="VideoConvento(Titolo,Link)";
            $value ="(\"$Titolo\",\"$Link\")";
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




        //
        // LOGIN
        //
        public function getLogin() {
            $querySelect = 'SELECT * FROM "Login"';
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
    }

?>