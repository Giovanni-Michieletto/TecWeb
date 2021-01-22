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
-- Struttura tabella Eventi
--
CREATE TABLE Eventi (
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
("Gruppo scout", ".\upload\scout.jpg", "foto del gruppo scout", "Il gruppo Scout nasce nel 1953 per iniziativa di Giancarlo che, dopo aver creto le prime tre squadriglie maschili, fonda il Clan. Il distintivo è composto di una Torre di colore giallo-oro in campo rosso, da portare sulla tasca destra dell’uniforme. Due pattuglie formano il clan: la pattuglia con a capo Gianni e componenti Duilio, Gianni e Flavio e la pattuglia con a capo Mario e componenti Cesco, Eugenio e Pino.
L’anno successivo, in modo totalmente indipendente, lo scautismo si arricchisce anche della presenza di alcune coraggiose ragazze, che, capitanate da Caterina e Ada e organizzate in due squadriglie, costituiscono il primo Riparto femminile AGI con assistente Don Luigi. Il gruppo maschile e il gruppo femminile, AGI e ASCI, coerentemente con la realtà del tempo, portano avanti attività distinte e rigorosamente separate con solo occasionali momenti di contatto. Dopo alterne vicende e numerosi momenti di difficoltà, nel 1974 le due associazioni si riuniscono e nasce cosi l'AGESCI.
Nel 1982 si svolge il primo San Giorgio. 700 scout, provenienti da tutti i paesi della zona, si danno appuntamento e piantano le tende invadendo per 2 giorni il posto. Gli anni successivi segnano il progressivo affermarsi della realtà scautistica e nel 1985 nasce il primo branco seguito di li a poco, data la grande richiesta di accedere all'esperienza scout, dal nuovo Branco.
Negli anni '90 si fa strada la consapevolezza di far parte di una comunità più grande. Si intensificano così i rapporti i genitori, con le altre associazioni parrocchiali e alcuni capi escono dal guscio per cominciare a ricoprire incarichi a livello zonale. La Comunità Capi, riprende in mano il Progetto del Capo, cercando ancora una volta di ripensare al ruolo di educatore, inteso come persona che nel servizio trova le motivazioni e gli strumenti per una propria maturazione e progressione personale.
Nel 2003, il gruppo partecipa al campo nazionale per esploratori e guide. Lo scautismo è ormai una realtà radicata nel territorio e l'associazione continua ad essere un punto di riferimento per l'educazione dei cittadini di domani."); 
 
 INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Gruppo ACR", ".\upload\acr.jpg", "foto del gruppo ACR", "L’ACR è la proposta educativa che rende possibile anche ai ragazzi di vivere l’Azione Cattolica, credendo nella loro capacità di essere protagonisti della propria crescita e di essere apostoli tra i coetanei. L’ACR si rivolge alle ragazze a ai ragazzi dai 6 ai 14 anni che sono chiamati a farne parte attraverso una scelta libera e personale. Nel gruppo i ragazzi sperimentano l’amicizia e trovano lo spazio per valorizzare a pieno i loro doni nell’incontro con gli altri e con la persona di Gesù.
L’Acr è un’esperienza associativa, il ragazzo sceglie di starci con un’adesione personale, condividendo una regola di vita comune a tutta l’AC incentrata sulla preghiera, la condivisione e il servizio.
L’ACR vive l’appartenenza associativa all’Azione cattolica seguendo gli itinerari proposti per i tre archi di età (6-8; 9-11; 12-14), partecipando agli appuntamenti diocesani e alla vita unitaria dell’associazione insieme a giovani e adulti. 
L’ACR vive la sua appartenenza alla Chiesa nella concretezza della vita della parrocchia e della diocesi. Il cammino di fede proposto e realizzato nel gruppo ACR è un itinerario di Iniziazione Cristiana, aiuta cioè ciascun ragazzo a prepararsi all’incontro personale con Cristo nei sacramenti, nella vita di Chiesa, nel servizio ai fratelli, nella scoperta e risposta alla propria vocazione
Accompagnare i più piccoli ad aprirsi a Dio con meraviglia e semplicità è il primo compito di un’educazione della fede basata soprattutto sul saper suscitare in loro gli atteggiamenti dell’ascolto e della fiducia, della gratitudine e della generosità, della festa e del perdono. Non è certamente troppo presto per educarli a fare piccole scelte, in riferimento alle prime nozioni di bene e di male. L’Azione Cattolica riserva anche ai piccolissimi una specifica attenzione educativa. Ciò avviene, in primo luogo, sostenendo l’azione formativa e di annuncio dei genitori – fin dalla preparazione al battesimo dei figli – affinché siano per loro i testimoni teneri e forti dell’amore di Dio e rivelino la bellezza della sua presenza. Ad essi spetta, infatti, il far risuonare per la prima volta nella vita dei figli il nome di Gesù. La proposta associativa comprende, inoltre, l’accompagnamento graduale nella vita della comunità, anche attraverso percorsi di preghiera da vivere in famiglia, l’educazione al dono di sé, la fedeltà a piccoli impegni quotidiani.
I bambini e i ragazzi vivono l’età dei primi perché, della scoperta del mondo, dei primi incontri con gli altri. Varie esperienze contribuiscono ad allargare le loro conoscenze, che attingono a fonti sempre più varie e numerose che in passato. Oggi i ragazzi sanno più cose, eppure sono spesso indotti ad un atteggiamento passivo di fronte alla molteplicità di informazioni che ricevono, e che è difficile per loro assumere criticamente. Tutto ciò fa sì che alcune tappe evolutive siano vissute precocemente, mentre altri aspetti della personalità maturino con maggiore fatica. I confini fra le tappe evolutive sono più sfumati e le età si presentano con caratteri diversi rispetto al passato. I cambiamenti relativi alla preadolescenza, sempre più anticipata e sempre meno caratterizzata come tale, sono un segnale di questa evoluzione.
La crescita nella fede, inoltre, non sempre avviene con quella linearità che caratterizzava l’iniziazione cristiana fino ad alcuni anni fa. L’esperienza associativa spesso rappresenta il primo incontro dei ragazzi con il Vangelo, che essi vivono nell’apertura dell’anima al fascino per la persona di Gesù. "); 

INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Catechismo", ".\upload\catechismo.jpg", "foto del gruppo di catechismo", "Il percorso di catechesi segue le indicazioni diocesane che ci apprestiamo a ripercorrere l’antico ordine dei sacramenti. La cresima torna ad essere la conferma che ognuno dà alla scelta di seguire il Cristo, e la comunione il punto di arrivo del cammino di iniziazione che ci unisce a Gesù Cristo per divenire ogni giorno, domenica dopo domenica,  sempre più cristiani.
Le tappe di questi due sacramenti non sono più legate al percorso scolastico e all’età anagrafica, ma prevedono un percorso di tre anni, da fare insieme alle famiglie, che ne condividano il cammino, a qualsiasi età si decida di iniziare!
Quindi concretamente l’Unità Pastoralepropone a chi vuole completare il cammino per diventare cristiani un percorso in 4 anni e poi 4 (2+2) di accompagnamento alla vita cristiana ( detta anche Mistagogia termine che si potrebbe tradurre in: Vivere i sacramenti o con i sacramenti ricevuti la vita quotidiana).
I sacramenti sono all’interno del percorso dei tre anni e necessitano del cammino completo per essere quello che sono.. cioè tappe e momenti speciali di accompagnamento alla vita della fede. Da soli slegati al percorso non hanno alcun senso. E’, per fare un esempio concreto , come se portassimo un ciclista in macchina a tagliare i traguardi delle tappe  percorrendo solo gli ultimi 100 metri di ogni tappa.. con la pretesa che sia un ciclista!");
 
 INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Grest", ".\upload\grest.jpg", "foto del grest", "La parola Grest significa, letteralmente, “GRuppo ESTivo” ed è la “versione” estiva dell’oratorio dedicata ai più piccoli. 
Si, perchè il Grest è parte dell’oratorio che durante l’estate non va in vacanza, ma esce all’aperto nelle piazze e nei parchi delle nostre Parrocchie.
Il Grest si svolge all’inizio dell’estate e coinvolge i bambini delle elementari che per due settimane si ritrovano a giocare, ballare, danzare, ridere, pregare, cantare mangiare… condividendo un’esperienza significativa di vita e amicizia insieme a Gesù.
Tutto questo però non sarebbe possibile se non ci fossero gli animatori!
Il gruppo animatori è composto da ragazzi, dai 14 in su, che si mettono al servizio dei più piccoli non solo per le due settimane in cui si svolge il Grest ma spendendosi nei mesi e settimane precedenti per ideare, creare e organizzare i giochi e le varie attività di animazione.
La preparazione del Grest è per gli animatori un momento di crescita personale, in cui mettersi in gioco e tirar fuori i propri talenti per poi donarli agli altri.
Ogni anno il Grest ha un tema diverso che da l’impronta ai giochi, alle canzoni (bans) e a tutte le attività di animazione e che guida i bambini alla scoperta della Parola di Dio rendendola concreta a vicina alle esperienze che facciamo insieme al Grest.
Quest’anno il Grest 2016 si svolgerà dal 12 al 25 giugno. Inizierà con la partecipazione di animatori, bambini e genitori alla messa domenicale e proseguirà con l’animazione settimanale dal lunedì al venerdì, dalle 16.00 alle 19.00."); 

 INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Gruppo Giovani Accolti", ".\upload\disabili.jpg", "foto del gruppo dei giovani accolti", "La parrocchia, attraverso dei volontari, svolge un servizio di assistenza a ragazzi e adulti diversamente abili. Il gruppo è nato più di venti anni fa per dare ai ragazzi che frequentano i gruppi di catechesi e, più in generale, alla realtà parrocchiale, la possibilità di vivere un’esperienza pratica di carità e di solidarietà.
Il gruppo fornisce un’opportunità di crescita sia per i soggetti disabili, sia per gli operatori: al centro dell’attività c’è la persona portatrice di handicap con i suoi problemi, le sue difficoltà, ma anche le sue ricchezze e le sue risorse inaspettate; abbiamo anche lo scopo, però, di educare gli assistenti al servizio gratuito, dando loro la possibilità di approfondire la propria fede e la propria formazione.
Sono circa una ventina le persone (portatori di diversi tipi di handicap fisici e psichici, per i quali è necessario personalizzare i percorsi) seguite dagli operatori; diverse sono le attività che vengono svolte, dalla catechesi alle attività manuali, dal gioco ai momenti di preghiera; tutto con l’unico scopo di farli sentire pienamente inseriti nella comunità umana e cristiana.
Gli operatori volontari sono una trentina (sia giovani che adulti, ma tutti con alle spalle un cammino di fede), che, con impegno e sacrificio, sono riusciti a creare con i diversamente abili un rapporto di amicizia che li gratifica e li ripaga abbondantemente del servizio svolto. Ricordiamo che possono aderire ragazzi ed adulti di età non inferiore ai 18 anni, che desiderino mettersi a servizio ed assistere ragazzi portatori di handicap, con serietà e disponibilità.");

INSERT INTO Associazioni(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Associazione dei ciechi", ".\upload\ciechi.jpg", "foto del gruppo dell'associazione ciechi","Il gruppo dei ciechi è un'associazione di fedeli, ciechi e vedenti, per il servizio all'uomo, alle persone associate, alle comunità ecclesiali e alle comunità civili.
Quanti vi aderiscono, vedenti e non vedenti, si impegnano a maturare un rapporto consapevole e responsabile con la cecità, con il non vedere in ascolto della parola di Dio e seguendo l'insegnamento della dottrina sociale della Chiesa Cattolica. Si radunano nei gruppi diocesani che sono luoghi di incontro, di formazione, di azione sociale sul territorio ove si sperimentano relazioni di reciprocità, di fraternità e di condivisione.
Tutti gli associati si pongono al servizio gli uni degli altri e si impegnano ad essere fermento di comunità ospitali, accoglienti e aperte alle differenze promuovendo e diffondendo una cultura dei diritti, di partecipazione e di inclusione. Si pongono, in particolare, al servizio di quanti si trovano in situazioni di svantaggio a motivo della cecità o di altra disabilità in Italia e soprattutto nei Paesi più poveri del Sud del mondo.
I fedeli dell'associazione dei ciechi si impegnano a collaborare alla missione apostolica della Chiesa nella evangelizzazione della fragilità dell'uomo contribuendo a porre in atto orientamenti pastorali e teologici che favoriscano il superamento del pietismo e dell'assistenzialismo. Vogliono essere testimoni della chiamata universale alla santità per tutti gli uomini in ogni condizione fisica, psichica e sensoriale, anche dei disabili.");

INSERT INTO Commenti(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Dal Vangelo secondo Giovanni (1,35-42)",".\upload\gesu1.jpg","foto di gesù mentre chiama i primi discepoli", "In quel tempo Giovanni stava con due dei suoi discepoli e, fissando lo
sguardo su Gesù che passava, disse: «Ecco l’agnello di Dio!». E i suoi due discepoli, sentendolo parlare così, seguirono Gesù.
Gesù allora si voltò e, osservando che essi lo seguivano, disse loro: «Checosa cercate?». Gli risposero: «Rabbì – che, tradotto, significa maestro –, dove dimori?». Disse loro: «Venite e vedrete». Andarono dunque e videro dove egli dimorava e quel giorno rimasero con lui; erano circa le quattro del
pomeriggio. Uno dei due che avevano udito le parole di Giovanni e lo avevano seguito, era Andrea, fratello di Simon Pietro. Egli incontrò per primo
suo fratello Simone e gli disse: «Abbiamo trovato il Messia» – che si traduce Cristo – e lo condusse da Gesù. Fissando lo sguardo su di lui, Gesù disse:
«Tu sei Simone, il figlio di Giovanni; sarai chiamato Cefa» – che significa Pietro.


Il Vangelo di oggi narra la chiamata dei primi discepoli. Questa volta è Giovanni il Battista ad essere una buona guida che indirizza a Dio, infatti quando vede Gesù lo indica ai
suoi due discepoli come l’Agnello di Dio invitandoli a seguirLo. Anche noi, quando è il
momento di scelte importanti, come può esserlo il percorso di fede, abbiamo bisogno
di qualcuno che ha già avuto esperienza e ci aiuti a capire. «Che cosa cercate?» chiede
subito Gesù, e ancora oggi rivolge a noi questa domanda per capire se veramente desideriamo e siamo pronti a seguirlo. Gesù bisogna cercarlo, perché Egli sa aspettare e si
concede a chi lo cerca nell’intimo del proprio cuore, con consapevolezza ed in piena
libertà. «Dove dimori?» i due discepoli desiderano sapere dove abita il Maestro, per
poter stare con Lui. È vero, quando si sta bene con una persona si desidera abitare con
lei per condividere tutto, perché la lontananza può disorientare. E il Signore noi lo possiamo trovare nel silenzio, nella preghiera, nella meditazione della Parola di Dio, nella
frequenza ai Sacramenti, nell’aiuto al prossimo… «Venite e vedrete» risponde Gesù e
invita i due discepoli ad unirsi a Lui. Quell’incontro con Gesù suscita una gioia talmente grande che essi si ricordano perfino l’ora: erano circa le quattro del pomeriggio. Solo
l’incontro personale con Gesù, in quell’ora precisa che Dio conosce, può dare senso
alla nostra vita e farci diventare suoi testimoni credibili e questo significa che, dopo
aver trovato Cristo, dobbiamo sentire l’impegno e la gioia di farlo conoscere ad altri
fratelli. È un cammino che richiede libertà interiore, forza, costanza, che dura tutta la
vita, ma che parte da una chiamata, dall’iniziativa di Dio"); 

INSERT INTO Commenti(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Dal Vangelo secondo Marco (1,7-11) ",".\upload\gesu2.jpg", "foto del battesimo di Gesù ", "In quel tempo, Giovanni proclamava: «Viene dopo di me colui che è
più forte di me: io non sono degno di chinarmi per slegare i lacci dei suoi sandali. Io vi ho battezzato con acqua, ma egli vi battezzerà in
Spirito Santo». Ed ecco, in quei giorni, Gesù venne da Nazareth di Galilea e fu battezzato nel Giordano da Giovanni. E, subito, uscendo dall’acqua, vide squarciarsi i cieli e lo Spirito discendere verso di lui come una colomba.
E venne una voce dal cielo: «Tu sei il Figlio mio, l’amato: in te ho posto il mio compiacimento».


Oggi, solennità del Battesimo del Signore, termina il ciclo del Natale. Giovanni nel deserto predicava un battesimo di conversione per il perdono dei
peccati. La gente andava a sentirlo e si faceva battezzare da lui nel fiume Giordano. Si presentò anche Gesù per essere battezzato. Nel periodo natalizio Gesù si è manifestato ai pastori e ai Magi. Lì nel Giordano
abbiamo un'ulteriore manifestazione della divinità di Gesù, si aprirono i cieli e si udì la voce del Padre: “Tu sei il Figlio mio prediletto nel quale mi sono compiaciuto”. Dio ha avuto tutta l'eternità per riflettere, ma per presentarsi a noi e salvarci ha scelto questo modo scandaloso di mettersi in fila con i peccatori. E' Dio
stesso che rivela chi è Gesù, Suo Figlio diletto. Una rivelazione questa non solo per Giovanni e gli Ebrei ma anche per noi. In questo modo Gesù inizia il suo ministero: non grandi discorsi ma un'azione vera, uno stile che guiderà tutta la sua
vita. E Gesù si manifesta a noi ogni giorno: nella Chiesa, nella preghiera, nei fratelli, nel Battesimo che abbiamo ricevuto e ci ha fatto figli dello stesso Padre.
Il Battesimo è la porta d'ingresso nel Vangelo. Chi non passa per qui rimane intrappolato nelle proprie attese religiose e non conosce Dio e il Suo dono.
Oggi ci chiediamo: Riconosco la Sua presenza, il Suo Amore nella mia vita? Vivo un vero rapporto filiale con Dio?"); 

INSERT INTO Commenti(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Dal Vangelo secondo Giovanni (1,1-18)",".\upload\gesu3.jpg", "foto di gesù","In principio era il Verbo, e il Verbo era presso Dio e il Verbo era Dio.
Egli era, in principio, presso Dio: tutto è stato fatto per mezzo di lui e senza di lui nulla è stato fatto di ciò che esiste. In lui era la vita e la vita era la luce degli uomini; la luce splende nelle tenebre e le tenebre non l’hanno vinta.
Venne un uomo mandato da Dio: il suo nome era Giovanni. Egli venne come testimone per dare testimonianza alla luce, perché tutti credessero per mezzo di lui.
 Non era lui la luce, ma doveva dare testimonianza alla luce.
Veniva nel mondo la luce vera, quella che illumina ogni uomo. Era nel
mondo e il mondo è stato fatto per mezzo di lui; eppure il mondo non lo
ha riconosciuto. Venne fra i suoi, e i suoi non lo hanno accolto. A quanti
però lo hanno accolto ha dato potere di diventare figli di Dio: a quelli che
credono nel suo nome, i quali, non da sangue né da volere di carne né da
volere di uomo, ma da Dio sono stati generati. E il Verbo si fece carne e
venne ad abitare in mezzo a noi; e noi abbiamo contemplato la sua gloria,
gloria come del Figlio unigenito che viene dal Padre, pieno di grazia e di
verità. Giovanni gli dà testimonianza e proclama: «Era di lui che io dissi:
Colui che viene dopo di me è avanti a me, perché era prima di me». Dalla
sua pienezza noi tutti abbiamo ricevuto: grazia su grazia. Perché la Legge
fu data per mezzo di Mosè, la grazia e la verità vennero per mezzo di Gesù
Cristo. Dio, nessuno lo ha mai visto: il Figlio unigenito, che è Dio ed è nel
seno del Padre, è lui che lo ha rivelato.


Vegliate! Questa l’esortazione del Padrone di Casa a tutti noi, in questa prima dome− nica di Avvento.
In prima battuta la parola “vegliare” richiama lo stare svegli di notte. In realtà il vegliare sta nello stare attenti, avere la coscienza sveglia, una coscienza attenta alla realtà.
Manteniamo viva la coscienza quindi, afinché non assopisca nel sonno e nel torpore delle cose vane, degli affanni e delle preoccupazioni che ogni giorno inondano i nostri pensieri, canalizzando le nostre energie. 
E poi le invidie, le malelingue, il desiderio di autosuficienza, l’orgoglio, il potere. 
Ecco che la coscienza dell’uomo si assopisce, sballottata di qua e di là dalle vanità del mondo, le suggestioni del Nemico attraggono le coscienze. 
”Donaci occhi limpidi, che vincano le torbide sug− gestioni del male” recita l’inno delle Lodi Mattutine, non a caso, al sorgere del giorno la Chiesa universale prega così.
E poi l’evangelista Marco ci racconta del senso del Tempo: “Voi non sapete quando il Padrone di Casa ritornerà”. 
Noi non sappiamo, Ge− sù lo sa bene. Eh, poteva dirlo! Potremmo commentare assieme… Ma Gesù esorta l’uomo a vivere il Dono della Vita Eterna, la Vita piena oggi, domani, sempre. 
Ecco che alla logica meritocratica delle nostre coscienze “se sarò buono, mi meriterò la salvez− za”, si contrappone la logica dell’Amore “tu sei già salvo, il Signore vuole la Salvezza di tutti, tutti” anche i nemici si, anche i diversi, si! Che rivoluzione antropologica, che liberazione dei cuori! Sta a noi, vegliare o assopirci, a nostra libera scelta. Il senso del Tempo: “nessuno sa se sarà alla sera o alla mezzano1e o al canto del gallo o al matti− no”, con questa coscienza il nostro arrabattarsi quotidiano avrebbe una dimensione diversa. 
Il Padrone di Casa ha dato ai suoi servi “il potere, a ciascuno il suo compito”. Ecco che il Tempo di Avvento diventa Tempo di Dono, se vissuto nella “veglia”. 
Alcuni strumenti che ci possono aiutare nel rimanere svegli, veglianti? Le opere buone alle quali ciascuno di noi è chiamato, l’Ascolto quotidiano ed assiduo della Parola, la confi− denza con quel Padrone di Casa che non ha egoisticamente tenuto tutto per sé, ma  ha “lasciato ai suoi servi la propria casa e dato loro il potere.”.
Sentiamoci amati in tutto questo, viviamo il Dono di questo Tempo, donato, regalato, in ogni istante, in ogni secondo della nostra vita nell’attesa, vigilante, del Suo ritorno.");



INSERT INTO Commenti(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Dal Vangelo secondo Matteo (25,1-13) ",".\upload\gesu4.jpg", "foto di gesù con una luce in mano", "In quel tempo, Gesù disse ai suoi discepoli questa parabola:
«Il regno dei cieli sarà simile a dieci vergini che presero le loro lampade e uscirono incontro allo sposo. Cinque di esse erano stolte e cinque sagge; le stolte
presero le loro lampade, ma non presero con sé l’olio; le sagge invece, insieme
alle loro lampade, presero anche l’olio in piccoli vasi. Poiché lo sposo tardava,
si assopirono tutte e si addormentarono.
A mezzanotte si alzò un grido: “Ecco lo sposo! Andategli incontro!”. Allora
tutte quelle vergini si destarono e prepararono le loro lampade. Le stolte dissero alle sagge: “Dateci un po’ del vostro olio, perché le nostre lampade si spengono”. Le sagge risposero: “No, perché non venga a mancare a noi e a voi; andate piuttosto dai venditori e compratevene”.
Ora, mentre quelle andavano a comprare l’olio, arrivò lo sposo e le vergini che
erano pronte entrarono con lui alle nozze, e la porta fu chiusa. Più tardi arrivarono anche le altre vergini e incominciarono a dire: “Signore, signore, aprici!”.
Ma egli rispose: “In verità io vi dico: non vi conosco”.
Vegliate dunque, perché non sapete né il giorno né l’ora».


STOLTEZZA e SAGGEZZA: non c'è alternativa. La differenza consiste nel prepararsi o meno all'incontro con il Signore, prendendo con sé l'olio. Prendere con
sé l'olio significa essere preparati. TUTTE le vergini si addormentano; TUTTE le
vergini si svegliano al grido di “ECCO LO SPOSO”; solo ALCUNE sono pronte.
Ecco il significato di essere saggi e prudenti: non aspettare l'ultimo momento
della nostra vita per collaborare con la Grazia di Dio.
La lampada è il simbolo della FEDE che è data a tutti; l'olio il simbolo della CARITA' che alimenta, rende feconda e credibile la luce della fede.
La condizione per essere pronti all'incontro con il Signore non è soltanto la
fede, ma una vita cristiana ricca di amore e carità per il prossimo, una vita che
ci rende tranquilli nell'attendere lo sposo. Se ci lasciamo guidare da ciò che ci
appare più comodo, dalla ricerca dei nostri interessi, la nostra vita diventa sterile, incapace di dare vita agli altri; se invece siamo vigilanti e cerchiamo di
compiere il bene, con gesti di amore, di condivisione, di servizio al prossimo in
difficoltà, possiamo restare tranquilli mentre attendiamo la venuta dello sposo: il Signore potrà venire in qualsiasi momento e anche il sonno della morte
non ci spaventa perchè abbiamo la riserva di olio accumulata con la carità
operata ogni giorno."); 


INSERT INTO Commenti(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Dal Vangelo secondo Matteo (25,31-46) ",".\upload\gesu5.jpg", "foto di gesù pastore","Gesù disse ai suoi discepoli: «Quando il Figlio dell'uomo verrà nella sua
gloria, e tutti gli angeli con lui, siederà sul trono della sua gloria. Davanti a
lui verranno radunati tutti i popoli. Egli separerà gli uni dagli altri, come il
pastore separa le pecore dalle capre, e porrà le pecore alla sua destra e le
capre alla sinistra. Allora il re dirà a quelli che saranno alla sua destra: Venite, benedetti del Padre mio, ricevete in eredità il regno preparato per voi
fin dalla creazione del mondo, perché ho avuto fame e mi avete dato da
mangiare, ho avuto sete e mi avete dato da bere, ero straniero e mi avete
accolto, nudo e mi avete vestito, malato e mi avete visitato, ero in carcere e
siete venuti a trovarmi. Allora i giusti risponderanno: Signore, quando ti
abbiamo visto affamato e ti abbiamo dato da mangiare, o assetato e ti abbiamo dato da bere? [...] E il re risponderà loro: In verità io vi dico: tutto
quello che avete fatto a uno solo di questi miei fratelli più piccoli, l'avete
fatto a me [...]



Cristo è re, di un regno di “verità e di vita, di santità e grazia, di giustizia, d’amore
e di pace”. Che razza di regno è??
Per comprenderlo ci viene in aiuto il profeta Ezechiele. Cristo è un re-pastore che
si prende cura delle sue pecore, cerca quelle perdute, cura quelle malate... le nutre
conducendole su ottimi pascoli.
Cristo, ci ricorda S.Paolo, è il re che dona all’uomo, ad ogni uomo la vita nella Resurrezione. L’evangelista Matteo ci narra di come sarà il giudizio alla fine di questo tempo, e come Cristo Re ci giudicherà: il giudizio sarà sulla carità.
Paolo VI così affermava: “Se davvero la nostra carità tende a imitare quella sconfinata e divina di Gesù, Gesù è presente! La nostra carità diventa segno, segno di
Cristo. Tutti abbiamo una certa capacità di fare della nostra Chiesa un segno; un
segno di Cristo; di rendere così presente Cristo nel nostro tempo e nel nostro ambiente [...] il momento della verità è il momento in cui sono messi alla prova e verificati sistemi educativi e formativi, nonché la cultura, l’educazione, la civiltà stessa, perché niente di tutto questo varrebbe se non è animato dalla carità e se non
porta, nel momento decisivo, alla carità: al bicchier d’acqua all’assetato, all’alloggio al senza tetto, al pane all’affamato, all’atto concreto cioè, sul quale – secondo
la pagina del vangelo di Matteo – saremo un giorno giudicati.” ");  

INSERT INTO Commenti(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Dal Vangelo secondo Matteo (25,31-46) ",".\upload\gesu6.jpg", "foto della distribuzione dei talenti", "In quel tempo, Gesù disse ai suoi discepoli questa parabola: «Avverrà come a
un uomo che, partendo per un viaggio, chiamò i suoi servi e consegnò loro i
suoi beni. A uno diede cinque talenti, a un altro due, a un altro uno, secondo le
capacità di ciascuno; poi partì.
Dopo molto tempo il padrone di quei servi tornò e volle regolare i conti con
loro. Si presentò colui che aveva ricevuto cinque talenti e ne portò altri cinque,
dicendo: Signore, mi hai consegnato cinque talenti; ecco, ne ho guadagnati altri
cinque. Bene, servo buono e fedele - gli disse il suo padrone -, sei stato fedele
nel poco, ti darò potere su molto; prendi parte alla gioia del tuo padrone».


Questa parabola, detta dei talenti, chiude il ciclo delle tre parabole sulla vigilanza.
Per Matteo “vigilare” in attesa del ritorno del Signore vuol dire utilizzare il tempo
che ci è dato compiendo il bene, facendo il miglior uso possibile dei doni ricevuti,
che sono sia quelli naturali, ma anche il Vangelo, la Chiesa, i Sacramenti, la famiglia, il creato... Siamo chiamati a moltiplicare i talenti per la missione che Dio ci
ha affidato, mettendoli a servizio degli altri e ciò richiede impegno, dedizione, perseveranza, disponibilità. In questo modo, nella fedele semplicità di tutti i giorni,
noi possiamo dare gloria al Signore e diventare piccole fiammelle capaci di illuminare il cammino dei fratelli che ci vivono accanto. Comprendiamo bene che l’incontro con il Signore non si può improvvisare, ma va preparato da una fede operosa e creativa, impegnata nella carità, fiduciosa nel Dio della Vita, che ci ricolma di
doni per la nostra gioia, senza alcun interesse da parte sua. La Parabola dei Talenti
ci ricorda che il Regno dei Cieli è un dono, però è anche una responsabilità e dobbiamo amare la vita non con le parole ma con le opere e senza timore, come ha fatto Gesù che si è donato per noi. Ci aiuta l’atteggiamento premuroso dei primi due
servi che hanno accolto i doni ricevuti fino a raddoppiarne il valore e a loro Dio ha
permesso di partecipare alla Sua gioia. Se invece ci troviamo difettosi come il terzo
servo, coltiviamo la certezza che, se ci presenteremo a Dio con le mani vuote, ma
con infinita fiducia in Lui, Egli ci accoglierà e ci dirà: “Vieni, non perché hai moltiplicato i talenti, ma perché hai saputo confidare nella mia Misericordia”. Perché
Dio si fida di noi! E questo è per tutti; non deludiamolo, ma ricambiamo fiducia
con fiducia! La Vergine Maria, che ha accolto il dono più prezioso, Gesù in persona, e l’ha offerto all’umanità con cuore umile e generoso, ci aiuti ad essere servi
buoni e fedeli per partecipare alla gioia del nostro Signore."); 

INSERT INTO Eventi(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Prima messa di Don Michele",".\upload\messa.jpg","foto prima messa di Don Michele", "Carissimi fratelli e sorelle,
è con grande gioia che oggi celebriamo la S.Messa assieme al nostro novello presbitero Don Michele.
Rivolgo un cordiale saluto al Rettore del Seminario Arcivescovile Don Salvatore e a tutta la comunità del seminario che ha custodito e fatta maturare la vocazione di Michele.
Un saluto alla sua famiglia che oggi gioisce assieme a tutta la Chiesa per questo fausto giorno e un caro saluto alla comunità che si riunisce nella nostra parrocchia che oggi vede un suo figlio salire questi gradini dell’altare per offrire il divin sacrificio.
Parlare del sacerdozio cattolico oggi è estremamente difficile, la nuova comprensione della Scrittura, ha messo in crisi il modello di sacerdozio che fino a qualche decennio fa viveva nelle nostre comunità. Il sacerdote era designato come mediatore tra Dio e gli uomini, ed elevato quasi ad altezza celeste, dato che con le sue mani presenta a Dio il sacrificio della Chiesa.
Ma l’autocomprensione della Chiesa delle origini, come si può cogliere nelle lettere del Nuovo Testamento non parla affatto del potere rituale del sacerdote, mentre questo aspetto sarà preponderante nel corso della storia ecclesiastica. Inoltre l’insieme della tradizione neotestamentaria, specialmente a partire dalla lettera agli Ebrei, ha condizionato molto la concezione del sacerdozio, qui nasce quella nuova coscienza che sta alla base dell’atteggiamento di tutto il Nuovo Testamento riguardo l’ambito del culto.");


INSERT INTO Eventi(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Messa delle ceneri",".\upload\ceneri.jpg","foto messa delle ceneri", " E fu così che in Chiesa tornammo, comunitariamente, a riviver il memoriale della morte e risurrezione del Cristo.
Ci tornammo a sera del diciotto di maggio, un lunedì.
Con le mascherine a celar emozioni di svariate nature, col gel igienizzante a far da comitato accoglienza proprio sul sagrato, con le rotonde targhettine a indicar il posto legalmente buono per prender posto, un gran bel numero di parrocchiani di don Nuccio Cannizzaro non ha resistito al richiamo della fame.
E si, perché a sera di quel nove di marzo, sempre un lunedì, ci ritrovammo assaliti da una grave fame di pane: ci veniva spiegato che per contrastare il diffondersi del coronavirus dovevamo isolarci, star distanti l’uno dall’altro, evitare qualsivoglia evento contemplante un umano assembramento, Messe comprese.
Oggi, diciotto di maggio, col coronavirus forse svilito dall’insolita uniforme italica capacità di starsene per un congruo tempo ognuno a casuccia propria, eccoci far capolino all’ombra del campanile di San Giorgio: alle ore diciannove eccoci a riascoltar il suono della campanella.
Preceduto da due ministranti, anche loro mascherinizzati, don Nuccio raggiunge l’Altare, percorrendo la via più breve, immettendosi proprio dalla porticina che lega l’Altare alla sagrestia: forse, anche per il Don, tanta era la voglia di tornar coi suoi parrocchiani al Cenacolo.
È innegabile che un cardiaco sussulto ha scosso un po’ tutti.
E quando l’inconfondibile cannizzariana voce ha pronunciato quel … “Nel nome del Padre, del Figlio, dello Spirito Santo…” una decisa, pesante, convinta carezza di gratitudine il cuor nostro ha lasciato che scivolasse lungo le gote della Madonna della Consolazione: grazie, Avvocata Consolatrice, per averci così maternamente custoditi…
Don Nuccio, liturgicamente parlando, celebra la Messa propria di San Giovanni Paolo II, proprio nel giorno in cui l’intero globo terrestre ne ricorda il centesimo compleanno.
"); 

INSERT INTO Eventi(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Festa di San Giorgio",".\upload\sangiorgio.jpg","foto di San Giorgio", "È strana la Festa di San Giorgio ai tempi del Covid-19.
È graziosa la Cappellina che, a Villa Bethania Christi, fa da Tabernacolo alla Celebrazione Eucaristica nella memoria di San Giorgio, Patrono della comunità parrocchiale nonché dell’intero territorio cittadino.
A presiedere è il parroco, Don Nuccio.
Insieme con lui sta Mons. Antonino, Decano del Capitolo Metropolitano; con loro stanno le Figlie di Maria Santissima, custodi dell’Istituto e presenza reale di quel carisma nato dall’intreccio tra lo Spirito Santo e Padre Vittorio e Suor Maria.
Alla meditazione omiletica don Nuccio attacca sottolineando che “San Giorgio è, per certi versi, il Santo Pasquale”
Nella prima lettura, “tratta dagli Atti degli Apostoli, gli Apostoli affermano: noi siamo testimoni, insieme allo Spirito Santo, primo testimone, siamo testimoni della Risurrezione del Cristo… Noi, testimoni, cioè martiri… Poiché, in greco, testimone è martire: San Giorgio, dunque, venerato come Megalomartire, s’inserisce a pieno titolo nel tempo pasquale… E la festa di San Giorgio è una festa pasquale. E Reggio, avendolo elevato a suo Patrono, è una Città pasquale.” "); 


INSERT INTO Eventi(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Domenica della Divina Misericordia.",".\upload\misericordia.jpg","foto della messa della domenica di mesericordia", "Oggi celebriamo la domenica della fede, il frutto della risurrezione di Cristo è la nascita della Chiesa. I fondamenti su cui poggia questa costruzione spirituale sono: l’insegnamento degli Apostoli, ossia la Didachè, la Comunione, l’Agape, l’Eucaristia, la Fractio Panis. Il tutto centrato sul dono dello Spirito Santo.
Chiunque crede nella risurrezione di Cristo, allora avrà certamente fede anche nella propria risurrezione. Gesù agli Apostoli mostra i segni della sua risurrezione, le mani e i piedi, il costato.
Ma per credere nella sua risurrezione, agli Apostoli non è sufficiente il vedere, hanno bisogno di altro, ecco perchè Gesù alita, soffia “Enèfusesen” su di loro il suo Spirito, conferendo a ognuno di loro la potenza della sua stessa risurrezione. Ma più della risurrezione dai morti, il dono di Gesù conferisce agli Apostoli e per loro alla Chiesa, il dono della risurrezione nello Spirito di Dio, siamo davanti ad una nuova creazione.
Questo alitare, soffiare, ci richiama ad Adamo, a Gen. 2,21 con il soffio di Dio, Adamo viene creato.
Qui con il soffio di Cristo gli Apostoli e noi con loro, veniamo ri-creati. La prima era una creazione fisica, per la vita terrena, destinata alla morte, la seconda è per la creazione spirituale, per una vita eterna. Gli Apostoli ricevendo il soffio di Cristo, cioè lo Spirito Santo, ricevono quel soffio creativo che rimane nella Chiesa, sorgente di creazione spirituale per la vita eterna!
La nuova creazione per noi cristiani, nasce già dai sacramenti: dal battesimo che la fa esistere, dalla cresima che la incrementa, dall’ eucaristia che la alimenta. La vita spirituale è iniziata dopo quella fisica, ma questa lentamente è destinata a finire e a cedere il passo poco alla volta a quella spirituale.
Ricevere lo Spirito Santo, dono del Risorto, non è un fatto automatico ma dipende dal grado di preparazione, dal desiderio espresso dalla singola persona. La nostra natura umana riceve il dono della vita eterna e il dono della risurrezione in base al desiderio, alla volontà espressa dall’anima, dalla mente e dal cuore. In altri termini, il dono della vita eterna dipende da noi, non è uguale per tutti.
Quelli che credono e gioiscono nella risurrezione del Signore, ricevono lo spirito della risurrezione. La gioia allora diventa il segno, l’icona, la dimostrazione più grande della nostra prontezza, della volontà e dell’amore a vivere assieme a Cristo la vita pasquale.
Questo tuttavia è un dono che si riceve, non si distribuisce a domicilio, Cristo non è un venditore ambulante che distribuisce lo Spirito Santo a domicilio. Il dono dello Spirito di Cristo risorto, che ci permette di vincere la morte, ci farà superare tutti i limiti della condizione umana e ci darà la vita eterna, la vita stessa di Dio, si distribuisce gratuitamente ogni domenica nella celebrazione eucaristica. Nessuno può ricevere lo Spirito Santo stando seduto comodamente a casa sua. Nè stando davanti al televisore a vedere la messa. Tommaso ce lo insegna. Lui non era presente quando Gesù è apparso il giorno di Pasqua tra i discepoli, e per questo non ha ricevuto lo Spirito Santo in quella circostanza.
Come ci insegnano i Padri della Chiesa, nella messa domenicale si distribuisce il farmaco dell’immortalità, perchè mangiando il corpo di Cristo e bevendo il suo sangue, noi riceviamo la vita di Dio in noi, lo Spirito Santo datore di vita. Quando finirà questa quarantena forzata, ognuno di noi corra in chiesa a chiedere il sacramento del perdono e riceva la santa comunione eucaristica, perchè solo cosi potrà sconfiggere il male, ogni male, sia fisico che spirituale.
Oggi, festa della Divina Misericordia, la Chiesa celebra il grande amore del Signore per noi, il 22 febbraio 1931 suor Faustina, in una visione contemplava Gesù risorto che chiedeva di istituire proprio in questo giorno la festa. Il grande Giovanni Paolo II il 1992 esaudiva questo desiderio e dichiarava la domenica ottava di Pasqua, festa della Divina Misericordia."); 



INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Donne protagoniste",".\upload\donne.jpg", "foto delle donne che partecipano alla Chiesa", "È sotto gli occhi di tutti che nella vita delle parrocchie le protagoniste sono le
donne e le nostre comunità non fanno eccezione: nel catechismo, nel servizio dei
lettori, come ministri della Comunione ai malati o durante le Messe, per non
parlare della partecipazione alle Messe stesse. Qualche scalpore ha quindi
suscitato un piccolo documento del Papa, che però getta le basi per un
“processo” davvero innovativo, il titolo è “Spiritus Domini”. Poco più di una
pagina per modificare addirittura il Codice di Diritto Canonico e ammettere
“stabilmente mediante il rito liturgico stabilito, ai ministeri di lettori ed accoliti” i
laici, uomini e donne che abbiano l’età e le doti necessarie. Forse non tutti sanno
che questi servizi finora sono sempre stati “straordinari”. Quelli “ordinari” erano
invece solo per i candidati al sacerdozio! Ora invece, ecco la piccola grande
rivoluzione - che in un sol colpo salta 2 “steccati” -, diventano accessibili
stabilmente per tutti i laici (primo steccato) e sia a uomini, ma soprattutto a
donne (secondo e davvero alto steccato). Credo davvero che si sia aperto un
cammino che porterà tanto bene nella Chiesa, anche se per ora non abbiamo
ancora la chiara percezione di come esattamente sarà e come e dove avverrà.
Saranno i Vescovi che dovranno stabilire percorsi formativi e riti per avere questi
ministeri stabili di lettore e accolito (servizio all’eucaristia). Un mio sogno: che un
giorno ad eleggere il Papa possa esserci una assemblea di uomini e donne."); 

INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Un nuovo anno: due vaccini",".\upload\pandemia.jpg", "foto della Chiesa durante la pandemia", "Riprendiamo il cammino, ogni anno lo facciamo, ma quest’anno c’è un motivo
particolare che a tutti sta a cuore. È il desiderio e la speranza che la pandemia
possa essere sconfitta. Come ci ha ricordato il Presidente della Repubblica, nel
suo discorso di fine anno, e anche il Papa, è dovere morale di tutti (salvo motivi
gravi) partecipare alla vaccinazione per contribuire ad uscire dalla crisi, per
salvaguardare la nostra e l’altrui salute (del corpo). Umanamente e
cristianamente dubbi su questo dovere morale non mi pare proprio debbano
esserci: siamo in “guerra” e dobbiamo tutti essere disponibili a sacrificarci per un
bene più grande.
Per noi cristiani però ci deve essere, anche e prima, un altro motivo importante
nel riprendere il cammino, anch’esso comporta un “vaccino” necessario: la Fede!
Nutrire e alimentare la fede, con i Sacramenti, la Parola, la Carità, la vita
fraterna, è l’altro vaccino che ci permette di non perdere la Salvezza, la “salute
dell’anima”. Anche qui occorre disponibilità e risposta. Il Signore ci offre la sua
Misericordia grande, in questi giorni la stiamo celebrando in tanti modi, ma essa
chiede sempre il nostro “si” convinto e fedele. Il nuovo anno è un’altra possibilità
che ci viene donata per camminare con il Signore: Non perdiamola!"); 


INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Grazie",".\upload\grazie.jpg", "foto di una suora andata in Africa per aiutare", "Tanti i motivi per dire grazie in questi giorni. GRAZIE per l’anno che finisce, certo
duro, difficile, brutto, ma come cristiani crediamo che in ogni attimo c’è la
presenza di Dio provvidente dove cercare i suoi segni di bene. GRAZIE per tutti i
medici, gli infermieri, gli operatori sanitari, le forze dell’ordine, gli amministratori
e i volontari di tante sigle e realtà che in questi mesi si sono prodigati spesso oltre
ogni sforzo per aiutare tutti i malati. GRAZIE per i tanti volontari della parrocchia
che in quest’anno e in questi giorni si sono prodigati nella liturgia, nell’educazione,
nella carità perché il messaggio di Gesù potesse continuare ad essere annunciato.
GRAZIE per tutte le famiglie, nel giorno della festa della Santa Famiglia, perché
siete resistenti e resilienti, accoglienti e generose, sostenete i piccoli e gli anziani
e finite sui giornali solo quando le cose vanno male. In particolare: GRAZIE per le
10 famiglie che hanno preparato il pranzo di Natale per 15 persone o situazioni di
solitudine o altra emarginazione donando un sorriso. GRAZIE alle 26 famiglie che
hanno battezzato i loro bambini quest’anno. GRAZIE alle 4 nuove famiglie nate dai
matrimoni celebrati quest’anno. GRAZIE anche ai giovani che convivono, è pur
sempre amore: spero che presto possano sentire il desiderio di ricevere la Grazia
del Matrimonio cristiano.");  

INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Fraternizzare",".\upload\natale.jpg", "foto di una mascherina appesa all'albero di Natale", "In questo strano Natale, vogliamo proporre questa ultima parola come
sintesi di questa festa così cara, ma anche così bistrattata. Ci
mancheranno amici e parenti, ma non deve mancarci GESU’ che a noi
cristiani ricorda come siamo TUTTI FRATELLI suoi e quindi tra di noi. Un
grande dono, un grande compito. Come credenti facciamo tesoro di
questo “strano” Natale per mettere Lui al centro senza distrazioni o
nostalgie di ciò che con il Natale centra poco. Un po’ di preghiera insieme,
dopo la Messa o della sera o del giorno (non tutti la sera!), dopo esserci
confessati (ampie le occasioni nonostante le restrizioni), e una telefonata
a nonni, genitori e/o parenti più o meno lontani, un segno di carità magari
con un vicino di casa: un dolce condiviso, un biglietto di augri o un
semplice saluto alla finestra. E sarà comunque Natale, e sarà di più Natale.
Buon Natale a tutti, dunque, il Signore doni a tutti gioia, pace e speranza."); 

INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Preparare",".\upload\preparare.jpg", "foto di una famiglia che prepara l'albero di Natale", "Quest’anno le “corse” natalizie a PREPARARE la festa sono notevolmente
rallentate se non interrotte. Preparare i regali, preparare il cenone, le cene
aziendali, le settimane bianche, ecc… Tutto bloccato, tutto o tanto cancellato. Al
di là dei problemi economici non certo secondari, soprattutto per chi lavora in
questi comparti, certo la pandemia ci sta proponendo una brutale battuta
d’arresto a certe corse sfrenate. E tutto cosa ci dice?
Forse siamo inviati a scoprire ciò che vale veramente PREPARARE, che è il nostro
cuore alla venuta-presenza di un Dio-bambino, nascosto, non imposto,
“impotente” non onnipotente. Un Dio che non sbaraglia eserciti e nemmeno
pandemie, perché vuole abitare i cuori, renderli sensibili all’unica energia che
muove il mondo, l’amore, l’unico atteggiamento che ci rende umani, la
fratellanza universale. PREPARIAMO la sua venuta, prepariamoci ad accoglierlo,
preparando certo il presepio, anche l’albero, un po’ di festa e qualche regalo, ma
soprattutto preparando noi stessi, a questa presenza: questo si fa solo facendo
posto a qualcuno che ha bisogno. Allora avremo davvero preparato il Natale!
"); 

INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Attendere",".\upload\avvento.jpg", " foto della Chiesa in periodo di avvento", "L’AVVENTO che inizia è la grande “ri-partenza” che l’anno liturgico della
Chiesa - quel modo di ritmare il tempo nel segno del Vangelo di Gesù, la
Buona Notizia - che siamo invitati, anno dopo anno, a credere e sul cui
ritmo siamo inviatati a vivere. Anche in questo tempo di coronavirus.
ATTENDERE è il verbo che descrive bene la prima pagina che ci viene
proposta. Viene dal Vangelo di MARCO che ci accompagnerà nelle
domeniche fino a novembre del prossimo anno (con qualche eccezione). Il
Signore, è come fosse partito, e spesso noi abbiamo la sensazione di
essere anche soli. Non siamo soli, non siamo abbandonati. Il Signore è
venuto, viene e verrà sempre. Rimettiamoci in cammino. Con fiducia. Con
coraggio. Con la bellezza che l’attesa crea nei nostri cuori e nelle nostre
vite.
"); 


INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Quarantena",".\upload\avvento.jpg", "foto di una Famiglia in quarantena","Pensavamo fosse una parola che non ci avrebbe
mai riguardato, ormai relegata ai libri di storia o
a casi eccezzionali. Invece è diventata d’uso comune, anche il sottoscritto ne sta
facendo le spese. Come molti sapranno, nel mio caso come misura preventiva,
chi è positivo o ha incontrato un positivo al Covid-19 deve sottoporsi anche
volontariamente a questa pratica di sicurezza, isolandosi dal resto della famiglia
e della socialità. È certo una condizione di diagio, che aumenta con l’aumentare
della responsabilità e il diminuire magari dei sostegni familiari o di altro genere.
Certo è diverso per chi la vive da ammalato. Ma proprio per questo è preziosa.
Occorre che tutti prendiamo coscienza di quel grande atto d’amore che è il
rispetto delle regole legate al distanziamento fisico. Siamo entrati in pieno nella
seconda ondata della pandemia e i più fragili (anziani, ma non solo) e i più
esposti (medici, personale sanitario, della sicurezza, ecc…) ne fanno le spese. Un
atto d’amore che tutti, sottolineo tutti, dobbiamo accettare di fare per un bene
più grande, che è il bene dell’altro. Un grande atto cristiano. Vi scongiuro di farlo,
molte persone stanno soffrendo tanto. E per tutti prego e preghiamo!"); 

INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Il nuovo Messale",".\upload\messale.jpg", "foto del nostro messale","inizieremo noi sacerdoti
inizieremo a utilizzare il “nuovo Messale”, dovremo
dire la 3^ edizione italiana del Messale Romano. Nato dalla grande riforma del
Concilio Vaticano II (da latino si era passati alle lingue volgari, ma soprattutto la
Messa diventa “cosa” di tutti), questa è la sua seconda edizione dopo quella del
1983. Ci sono “piccole grandi” modifiche che lo renderanno più vicino alla nostra
lingua e alla nostra sensibilità, senza modificare il “cuore” fondamentale della
Messa-Eucarestia che è incontro reale con Gesù tramite la Parola, il Pane e il
Popolo di Dio, specie i poveri. Si pone in continuità con le precedenti traduzioni,
alcuni testi sono stati rivisti secondo la nuova traduzione italiana della Bibbia
(2007), aggiorna l’elenco dei Santi, ha anche formulari rinnovati, un linguaggio
più inclusivo (es. fratelli e sorelle) e suggerisce di cantare di più. Le risposte fisse
del popolo sono quasi tutte rimaste inalterate per evitare confusioni. I 3 testi con
piccoli-grandi cambiamenti sono: Confesso a Dio onnipotente (...fratelli e sorelle),
Gloria a Dio nell’alto dei cieli (...pace in terra agli uomini, amati dal Signore) e il
Padre nostro (...anche noi li rimettiamo... e non abbandonarci alla tentazione)."); 


INSERT INTO Articoli(Titolo, Immagine, AltImmagine, Testo) VALUES 
("Croci e cimiteri",".\upload\cimitero.jpg", "foto del nostro cimitero","La croce campeggia nei nostri cimiteri, anche se
non è l’unico simbolo presente. A volte viene usata
a sproposito, ma noi sappiamo e vogliamo considerarla per quello che ne ha
fatto il Cristo: segno d’amore, di perdono e misericordia.
Per i nostri defunti innanzitutto, sulle cui tombe andremo a pregare in tanti. La
misericordia è per noi e conoscerà in questo anno speciale, nella forma
dell’indulgenza, una possibilità in più nella durata, che infatti sarà per tutto il
mese di novembre. È certo parola “difficile”, ma basti tradurla con “misericordia”
e tutto diventa più facile e chiaro. Dio, nella sua infinita bontà ci da tante vie per
ricevere la sua misericordia. Questa, come la confessione, ha voluto passasse
attraverso le fragili modalità della Chiesa: anche se non tutto ci è chiaro,
fidiamoci della sua saggezza e Tradizione."); 

















