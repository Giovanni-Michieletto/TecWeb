--
-- Struttura tabella 'ArticoliSentiero'
--
CREATE TABLE ArticoliSentiero (
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine longblob NOT NULL,
    AltImmagine varchar(150) NOT NULL,
    Testo TEXT NOT NULL,
    PRIMARY KEY (ID)
);




--
-- Struttura tabella 'NotizieConvento'
--
CREATE TABLE NotizieConvento (
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine longblob NOT NULL,
    AltImmagine varchar(150) DEFAULT NULL,
    Testo text NOT NULL,
    PRIMARY KEY (ID)
);



--
-- Struttura tabella 'CommentiConvento'
--
CREATE TABLE CommentiConvento (
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine longblob NOT NULL,
    AltImmagine varchar(150) DEFAULT NULL,
    Testo text NOT NULL,
    PRIMARY KEY (ID)
);


--
-- Struttura tabella 'VideoConvento'
--
CREATE TABLE VideoConvento (
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Link text NOT NULL,
    PRIMARY KEY (ID)
);


CREATE TABLE Associazioni(
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine longblob NOT NULL,
    AltImmagine VARCHAR(150) DEFAULT NULL,
    Testo text NOT NULL,
    PRIMARY KEY (ID)
);


CREATE TABLE Login (
    Username VARCHAR(15) NOT NULL,
    Pass_word VARCHAR(15) NOT NULL,
    PRIMARY KEY (Username, Pass_word)
);
INSERT INTO Login (Username, Pass_word) VALUES 
("SIMONE","CIAO");