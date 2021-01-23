<?php
    class DBAccess {
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
            $list = $this->getFile($table);
            foreach ($list as $cell) {
                if($ID == $cell['ID']) {
                    $directory = $_SERVER['DOCUMENT_ROOT'] . str_replace('./','/TecWeb/',$cell['Immagine']);
                }
            }
            unlink($directory);
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
            $list = $this->getFile($table);
            foreach ($list as $cell) {
                if($ID == $cell['ID']) {
                    $directory = $_SERVER['DOCUMENT_ROOT'] . str_replace('./','/TecWeb/',$cell['Immagine']);
                }
            }
            unlink($directory);
            $queryInsert = "DELETE FROM $table WHERE $table . ID=\"$ID\"";
            $queryResult = mysqli_query($this->connection,$queryInsert);
            if(mysqli_affected_rows($this->connection) > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        // Login
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
    }
?>