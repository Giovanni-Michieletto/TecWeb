--
-- Struttura tabella Articoli
--
CREATE TABLE Articoli (
    ID int NOT NULL AUTO_INCREMENT,
    Titolo text NOT NULL,
    Immagine text NOT NULL,
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
    Immagine text NOT NULL,
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
    Immagine text NOT NULL,
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
    Immagine text NOT NULL,
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


INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Gruppo scout Santa Maria del Cengio", ".\upload\scout.jpg", "foto del gruppo scout", "Il gruppo Scout nasce nel 1953 per iniziativa di Giancarlo che, dopo aver creto le prime tre squadriglie maschili, fonda il Clan. Il distintivo è composto di una Torre di colore giallo-oro in campo rosso, da portare sulla tasca destra dell’uniforme. Due pattuglie formano il clan: la pattuglia con a capo Gianni e componenti Duilio, Gianni e Flavio e la pattuglia con a capo Mario e componenti Cesco, Eugenio e Pino.
L’anno successivo, in modo totalmente indipendente, lo scautismo si arricchisce anche della presenza di alcune coraggiose ragazze, che, capitanate da Caterina e Ada e organizzate in due squadriglie, costituiscono il primo Riparto femminile AGI con assistente Don Luigi. Il gruppo maschile e il gruppo femminile, AGI e ASCI, coerentemente con la realtà del tempo, portano avanti attività distinte e rigorosamente separate con solo occasionali momenti di contatto. Dopo alterne vicende e numerosi momenti di difficoltà, nel 1974 le due associazioni si riuniscono e nasce cosi l'AGESCI.
Nel 1982 si svolge il primo San Giorgio. 700 scout, provenienti da tutti i paesi della zona, si danno appuntamento e piantano le tende invadendo per 2 giorni il posto. Gli anni successivi segnano il progressivo affermarsi della realtà scautistica e nel 1985 nasce il primo branco seguito di li a poco, data la grande richiesta di accedere all'esperienza scout, dal nuovo Branco.
Negli anni '90 si fa strada la consapevolezza di far parte di una comunità più grande. Si intensificano così i rapporti i genitori, con le altre associazioni parrocchiali e alcuni capi escono dal guscio per cominciare a ricoprire incarichi a livello zonale. La Comunità Capi, riprende in mano il Progetto del Capo, cercando ancora una volta di ripensare al ruolo di educatore, inteso come persona che nel servizio trova le motivazioni e gli strumenti per una propria maturazione e progressione personale.
Nel 2003, il gruppo partecipa al campo nazionale per esploratori e guide. Lo scautismo è ormai una realtà radicata nel territorio e l'associazione continua ad essere un punto di riferimento per l'educazione dei cittadini di domani."); 
 
 INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Gruppo ACR Santa Maria del Cengio", ".\upload\acr.jpg", "foto del gruppo ACR", "L’ACR è la proposta educativa che rende possibile anche ai ragazzi di vivere l’Azione Cattolica, credendo nella loro capacità di essere protagonisti della propria crescita e di essere apostoli tra i coetanei. L’ACR si rivolge alle ragazze a ai ragazzi dai 6 ai 14 anni che sono chiamati a farne parte attraverso una scelta libera e personale. Nel gruppo i ragazzi sperimentano l’amicizia e trovano lo spazio per valorizzare a pieno i loro doni nell’incontro con gli altri e con la persona di Gesù.
L’Acr è un’esperienza associativa, il ragazzo sceglie di starci con un’adesione personale, condividendo una regola di vita comune a tutta l’AC incentrata sulla preghiera, la condivisione e il servizio.
L’ACR vive l’appartenenza associativa all’Azione cattolica seguendo gli itinerari proposti per i tre archi di età (6-8; 9-11; 12-14), partecipando agli appuntamenti diocesani e alla vita unitaria dell’associazione insieme a giovani e adulti. 
L’ACR vive la sua appartenenza alla Chiesa nella concretezza della vita della parrocchia e della diocesi. Il cammino di fede proposto e realizzato nel gruppo ACR è un itinerario di Iniziazione Cristiana, aiuta cioè ciascun ragazzo a prepararsi all’incontro personale con Cristo nei sacramenti, nella vita di Chiesa, nel servizio ai fratelli, nella scoperta e risposta alla propria vocazione
Accompagnare i più piccoli ad aprirsi a Dio con meraviglia e semplicità è il primo compito di un’educazione della fede basata soprattutto sul saper suscitare in loro gli atteggiamenti dell’ascolto e della fiducia, della gratitudine e della generosità, della festa e del perdono. Non è certamente troppo presto per educarli a fare piccole scelte, in riferimento alle prime nozioni di bene e di male. L’Azione Cattolica riserva anche ai piccolissimi una specifica attenzione educativa. Ciò avviene, in primo luogo, sostenendo l’azione formativa e di annuncio dei genitori – fin dalla preparazione al battesimo dei figli – affinché siano per loro i testimoni teneri e forti dell’amore di Dio e rivelino la bellezza della sua presenza. Ad essi spetta, infatti, il far risuonare per la prima volta nella vita dei figli il nome di Gesù. La proposta associativa comprende, inoltre, l’accompagnamento graduale nella vita della comunità, anche attraverso percorsi di preghiera da vivere in famiglia, l’educazione al dono di sé, la fedeltà a piccoli impegni quotidiani.
I bambini e i ragazzi vivono l’età dei primi perché, della scoperta del mondo, dei primi incontri con gli altri. Varie esperienze contribuiscono ad allargare le loro conoscenze, che attingono a fonti sempre più varie e numerose che in passato. Oggi i ragazzi sanno più cose, eppure sono spesso indotti ad un atteggiamento passivo di fronte alla molteplicità di informazioni che ricevono, e che è difficile per loro assumere criticamente. Tutto ciò fa sì che alcune tappe evolutive siano vissute precocemente, mentre altri aspetti della personalità maturino con maggiore fatica. I confini fra le tappe evolutive sono più sfumati e le età si presentano con caratteri diversi rispetto al passato. I cambiamenti relativi alla preadolescenza, sempre più anticipata e sempre meno caratterizzata come tale, sono un segnale di questa evoluzione.
La crescita nella fede, inoltre, non sempre avviene con quella linearità che caratterizzava l’iniziazione cristiana fino ad alcuni anni fa. L’esperienza associativa spesso rappresenta il primo incontro dei ragazzi con il Vangelo, che essi vivono nell’apertura dell’anima al fascino per la persona di Gesù. "); 

INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Catechismo Santa Maria del Cengio", ".\upload\catechismo.jpg", "foto del gruppo di catechismo", "Il percorso di catechesi segue le indicazioni diocesane che ci apprestiamo a ripercorrere l’antico ordine dei sacramenti. La cresima torna ad essere la conferma che ognuno dà alla scelta di seguire il Cristo, e la comunione il punto di arrivo del cammino di iniziazione che ci unisce a Gesù Cristo per divenire ogni giorno, domenica dopo domenica,  sempre più cristiani.
Le tappe di questi due sacramenti non sono più legate al percorso scolastico e all’età anagrafica, ma prevedono un percorso di tre anni, da fare insieme alle famiglie, che ne condividano il cammino, a qualsiasi età si decida di iniziare!
Quindi concretamente l’Unità Pastoralepropone a chi vuole completare il cammino per diventare cristiani un percorso in 4 anni e poi 4 (2+2) di accompagnamento alla vita cristiana ( detta anche Mistagogia termine che si potrebbe tradurre in: Vivere i sacramenti o con i sacramenti ricevuti la vita quotidiana).
I sacramenti sono all’interno del percorso dei tre anni e necessitano del cammino completo per essere quello che sono.. cioè tappe e momenti speciali di accompagnamento alla vita della fede. Da soli slegati al percorso non hanno alcun senso. E’, per fare un esempio concreto , come se portassimo un ciclista in macchina a tagliare i traguardi delle tappe  percorrendo solo gli ultimi 100 metri di ogni tappa.. con la pretesa che sia un ciclista!");
 
 INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Grest Santa Maria del Cengio", ".\upload\gest.jpg", "foto del grest", "La parola Grest significa, letteralmente, “GRuppo ESTivo” ed è la “versione” estiva dell’oratorio dedicata ai più piccoli. 
Si, perchè il Grest è parte dell’oratorio che durante l’estate non va in vacanza, ma esce all’aperto nelle piazze e nei parchi delle nostre Parrocchie.
Il Grest si svolge all’inizio dell’estate e coinvolge i bambini delle elementari che per due settimane si ritrovano a giocare, ballare, danzare, ridere, pregare, cantare mangiare… condividendo un’esperienza significativa di vita e amicizia insieme a Gesù.
Tutto questo però non sarebbe possibile se non ci fossero gli animatori!
Il gruppo animatori è composto da ragazzi, dai 14 in su, che si mettono al servizio dei più piccoli non solo per le due settimane in cui si svolge il Grest ma spendendosi nei mesi e settimane precedenti per ideare, creare e organizzare i giochi e le varie attività di animazione.
La preparazione del Grest è per gli animatori un momento di crescita personale, in cui mettersi in gioco e tirar fuori i propri talenti per poi donarli agli altri.
Ogni anno il Grest ha un tema diverso che da l’impronta ai giochi, alle canzoni (bans) e a tutte le attività di animazione e che guida i bambini alla scoperta della Parola di Dio rendendola concreta a vicina alle esperienze che facciamo insieme al Grest.
Quest’anno il Grest 2016 si svolgerà dal 12 al 25 giugno. Inizierà con la partecipazione di animatori, bambini e genitori alla messa domenicale e proseguirà con l’animazione settimanale dal lunedì al venerdì, dalle 16.00 alle 19.00."); 

 INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Gruppo Giovani Accolti Santa Maria del Cengio", ".\upload\disabili.jpg", "foto del gruppo dei giovani accolti", "La parrocchia, attraverso dei volontari, svolge un servizio di assistenza a ragazzi e adulti diversamente abili. Il gruppo è nato più di venti anni fa per dare ai ragazzi che frequentano i gruppi di catechesi e, più in generale, alla realtà parrocchiale, la possibilità di vivere un’esperienza pratica di carità e di solidarietà.
Il gruppo fornisce un’opportunità di crescita sia per i soggetti disabili, sia per gli operatori: al centro dell’attività c’è la persona portatrice di handicap con i suoi problemi, le sue difficoltà, ma anche le sue ricchezze e le sue risorse inaspettate; abbiamo anche lo scopo, però, di educare gli assistenti al servizio gratuito, dando loro la possibilità di approfondire la propria fede e la propria formazione.
Sono circa una ventina le persone (portatori di diversi tipi di handicap fisici e psichici, per i quali è necessario personalizzare i percorsi) seguite dagli operatori; diverse sono le attività che vengono svolte, dalla catechesi alle attività manuali, dal gioco ai momenti di preghiera; tutto con l’unico scopo di farli sentire pienamente inseriti nella comunità umana e cristiana.
Gli operatori volontari sono una trentina (sia giovani che adulti, ma tutti con alle spalle un cammino di fede), che, con impegno e sacrificio, sono riusciti a creare con i diversamente abili un rapporto di amicizia che li gratifica e li ripaga abbondantemente del servizio svolto. Ricordiamo che possono aderire ragazzi ed adulti di età non inferiore ai 18 anni, che desiderino mettersi a servizio ed assistere ragazzi portatori di handicap, con serietà e disponibilità.");

INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Associazione dei ciechi Santa Maria del Cengio", ".\upload\ciechi.jpg", "foto del gruppo dell'associazione ciechi","Il gruppo dei ciechi è un'associazione di fedeli, ciechi e vedenti, per il servizio all'uomo, alle persone associate, alle comunità ecclesiali e alle comunità civili.
Quanti vi aderiscono, vedenti e non vedenti, si impegnano a maturare un rapporto consapevole e responsabile con la cecità, con il non vedere in ascolto della parola di Dio e seguendo l'insegnamento della dottrina sociale della Chiesa Cattolica. Si radunano nei gruppi diocesani che sono luoghi di incontro, di formazione, di azione sociale sul territorio ove si sperimentano relazioni di reciprocità, di fraternità e di condivisione.
Tutti gli associati si pongono al servizio gli uni degli altri e si impegnano ad essere fermento di comunità ospitali, accoglienti e aperte alle differenze promuovendo e diffondendo una cultura dei diritti, di partecipazione e di inclusione. Si pongono, in particolare, al servizio di quanti si trovano in situazioni di svantaggio a motivo della cecità o di altra disabilità in Italia e soprattutto nei Paesi più poveri del Sud del mondo.
I fedeli dell'associazione dei ciechi si impegnano a collaborare alla missione apostolica della Chiesa nella evangelizzazione della fragilità dell'uomo contribuendo a porre in atto orientamenti pastorali e teologici che favoriscano il superamento del pietismo e dell'assistenzialismo. Vogliono essere testimoni della chiamata universale alla santità per tutti gli uomini in ogni condizione fisica, psichica e sensoriale, anche dei disabili.");