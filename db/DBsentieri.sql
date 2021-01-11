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
    Username VARCHAR(150) NOT NULL,
    Password VARCHAR(150) NOT NULL,
    PRIMARY KEY (Username, Password)
);
INSERT INTO Login (Username, Password) VALUES 
("21232f297a57a5a743894a0e4a801fc3","21232f297a57a5a743894a0e4a801fc3");