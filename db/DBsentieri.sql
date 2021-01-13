--
-- Struttura tabella Articoli
--
CREATE TABLE Articoli (
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine longblob NOT NULL,
    AltImmagine varchar(150) NOT NULL,
    Testo TEXT NOT NULL,
    PRIMARY KEY (ID)
);


--
-- Struttura tabella Notizie
--
CREATE TABLE Notizie (
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine longblob NOT NULL,
    AltImmagine varchar(150) DEFAULT NULL,
    Testo text NOT NULL,
    PRIMARY KEY (ID)
);



--
-- Struttura tabella Commenti
--
CREATE TABLE Commenti (
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine longblob NOT NULL,
    AltImmagine varchar(150) DEFAULT NULL,
    Testo text NOT NULL,
    PRIMARY KEY (ID)
);


--
-- Struttura tabella Associazioni
--
CREATE TABLE Associazioni(
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine longblob NOT NULL,
    AltImmagine VARCHAR(150) DEFAULT NULL,
    Testo text NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE Login (
    Username VARCHAR(150) NOT NULL,
    Password VARCHAR(150) NOT NULL,
    PRIMARY KEY (Username, Password)
);
INSERT INTO Login (Username, Password) VALUES 
("21232f297a57a5a743894a0e4a801fc3","21232f297a57a5a743894a0e4a801fc3");