<?php

use App\Apartment;
use App\Message;
use App\Payment;
use App\Service;
use App\Sponsor;
use App\Statistic;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $userNameList=[
            'Mario',
            'Francesca',
            'Andrea',
            'Marcello',
            'Alessandro'
        ];
        $userSurnameList=[
            'Rossi',
            'Bianchi',
            'Fabbri',
            'Marcellini',
            'Settembrini'
        ];
        $userImgList=[
            'https://www.w3schools.com/howto/img_avatar.png',
            'https://www.w3schools.com/howto/img_avatar2.png',
            'https://www.w3schools.com/w3images/avatar2.png',
            'https://teachingandlearning.schulich.yorku.ca/wp-content/uploads/2019/10/avatar6.png',
            'https://storage.jewheart.com/content/users/avatars/3595/avatar_3595_500.jpg?1558627791'
        ];
        $userDateList=[
            '1989/12/06',
            '1990/03/26',
            '1992/06/29',
            '1996/04/30',
            '1998/03/14'
        ];
        $userEmailList=[
            'mario.rossi@libero.it',
            'francesca.bianchi@alice.it',
            'andrea.fabbri@studio.unibo.it',
            'marcello.marcellini@alice.it',
            'alessandro.settembrini@gmail.com'
        ];
        for($i=0; $i<5; $i++){
            $user=new User();
            $user->name = $userNameList[$i];
            $user->surname = $userSurnameList[$i];
            $user->img_path = $userImgList[$i];
            $user->date_of_birth = $userDateList[$i];
            $user->email = $userEmailList[$i];
            $user->password = Hash::make($faker->password());
            $user->save();
        }
        
        $userObj=new User();
        $userObj->name = 'Andrea';
        $userObj->surname = 'Calzolari';
        $userObj->img_path = 'https://lh3.googleusercontent.com/proxy/fgCnqkNF5DsJ4YmDJKlo5pypkT9Lt1AQokGEusbAalDTkMFWKfi07MIbZ_JF_npNob1YuKVsdubHpI5T8HGF3UZPWf8rXy4mLyYxzo6HZ2-Xd0RdKNblr285Bs-EHT8';
        $userObj->date_of_birth = '1980/02/02';
        $userObj->email = 'andreacalzolari@live.it';
        $userObj->password = '$2y$10$GucQhVApDtnNFGjO9snLUeXMQo1NwU6p60V6Xs6DHAJzD.MBpqyZW';// ciccio1234
        $userObj->save();
        
        $serviceList=[
            'Wi-fi',
            'Riscaldamento',
            'Condizionatore',
            'Piscina',
            'Parcheggio auto',
            'Animali ammessi',
            'Tv',
            'Giardino',
            'Cucina',
            'Lavanderia',
            'Cassaforte',
            'Palestra',
            'Vista mare',
            'Centro città',
        ];
        $serviceIDList=[];
        
        foreach($serviceList as $service){
            $serviceObject= new Service();
            $serviceObject->title=$service;
            $serviceObject->save();
            $serviceIDList[]=$serviceObject->id;
        }

        $apartmentDescriptionList=[
            "Stylish and cosy basement studio located in Via Marsala in the heart of Bologna historic city centre. The studio is located in a renovated historic building. The studio has original stone ceilings, a duble bed, kitchenette and bathroom.
            Elegante e accogliente monolocale seminterrato situato in Via Marsala nel cuore del centro storico di Bologna. Il monolocale si trova in un palazzo storico ristrutturato. Lo studio ha soffitti in pietra originali, letto matrimoniale, angolo cottura e bagno.
            Lo spazio
            The 32 sq m studio is newly renovated and located in the basement floor of an historic building. The design is simple, modern and stylish. This is a basement floor so the amount of natural light is limited, but there are two windows (one in the studio and one in the bathroom).
            Read carefully: being a basement apartment, the mobile telephone line does not work. You will have at your disposal a very fast wi-fi with which you can work, communicate, surf, chat, watch movies or videos and use all your apps.
            Il monolocale di 32 mq è stato recentemente ristrutturato e si trova al piano seminterrato di un palazzo storico. Il design è semplice, moderno ed elegante. Si tratta di un piano seminterrato quindi la quantità di luce naturale è limitata, ma ci sono due finestre (una in studio e una in bagno).
            Leggere con attenzione: essendo un appartamento al piano seminterrato la linea telefonica mobile non funziona. Avrete a vostra disposizione un wi-fi velocissimo con cui potrete lavorare, comunicare, navigare, chattare, vedere film o video e utilizzare tutte le vostre app.",
            "Piccolo monolocale appena ristrutturato al quarto piano (senza ascensore) nel cuore della zona Liberty di Milano, a due passi dalla fermata di Porta Venezia M1. Comodo divano letto, TV, WiFi, doccia ed aria condizionata.
            L'appartamento è situato al quarto piano SENZA ascensore.
            Altre cose da tenere a mente
            Usiamo un sistema di self check in direttamente presso l'abitazione. Vi invieremo un link per effettuare il check in on line (da fare TASSATIVAMENTE entro le 19 del giorno precedente l'arrivo) e riceverete le istruzioni circa 24 ore prima dell'arrivo.",
            "La casa è situata in un podere adiacente ai parchi nazionali delle colline metallifere. A solo 1 Km dal paese di Montieri si affaccia su una vallata di boschi che comprende parte del senese. Il silenzio della natura circonda l'abitazione.
            Lo spazio
            L'alloggio è composto da 3 piani: al piano superiore c'è una camera con un letto matrimoniale e uno singolo; al piano centrale c'è una camera con letto a castello e il bagno; al piano inferiore c'è la cucina e la zona giorno. Terrazzo privato.
            Accesso per gli ospiti
            Gli ospiti sono liberi di girare in tutto il podere. A loro disposizione piscina con lettini e ombrelloni, e pergola toscana con vista panoramica.",
            "Ca Beo (URB120), casa 5 locali 300 m2 su 2 piani. Arredamento curato e accogliente: soggiorno con camino e TV. Uscita sulla terrazza. 1 camera con 1 letto doppio. Sala da pranzo con tavolo da pranzo. Cucina (forno, lavastoviglie, 5 fuochi, congelatore) con...
            Lo spazio
            ... tavolo da pranzo. Uscita sulla terrazza. Bagno/WC. Piano superiore: (scala senza ringhiera) 2 camere, ogni camera con 1 letto doppio e climatizzazione. Bagno/WC, doccia/WC. Riscaldamento a gas. Pavimenti in parquet. 2 terrazze coperta. Mobili da terrazza, sedie a sdraio. Bella vista panoramica sulla campagna. A disposizione: lavatrice, ferro da stiro. Internet (Wireless LAN [WLAN], gratis). Prego notare: casa per non fumatori. Il corrimano della galleria è alto 85 cm.
            
            I servizi aggiuntivi (opzionali) possono essere soggetti a costi extra pagabili in loco. Vi preghiamo di leggere la sezione “regole della casa” per i dettagli.
            Non esitate a contattarci in caso di domande. Grazie.
            Casa Ca Beo, piacevole, rustica, indipendente. A 5 km dal centro di Urbino, a 45 km dal centro di San Marino, posizione elevata, a 45 km dal mare, immerso nel verde. Per uso privato: terreno 4'000 m2 con piante e alberi, prato. Accesso 300 m di strada (strada non asfaltata). Box. Negozio 5 km, supermercato 5 km, spiaggia sabbiosa Fano 45 km, piscina 8 km. Il proprietario non accetta gruppi di giovani.
            Lo Short lets di Luigi Proietti, è un loft (una ex stalla) adibita a locazione turistica breve, non imprenditoriale.
            A Roma ma in piena campagna nei pressi della via Aurelia, dista soli 20 Km da San Pietro; 15 dal mare; 30 dall'Aeroporto di Fiumicino; 25 da Cerveteri; 58 dal porto di Civitavecchia; 28 dai laghi; 5 dall' Oasi Lipu di Castel Di Guido; 10 dal GRA.
            Parcheggio e giardino privato, lavatrice, Wfi, Tv.
            Lo spazio
            Immersa nella quiete della campagna romana, all'interno di una azienda agricola, il loft rappresenta un'autentica domus anghelos, uno spazio paradisiaco che si affaccia sopra un boschetto. Le ampie finestre lasciano penetrare il verde e l'azzurro circostanti. All'interno, un ampio salone è predisposto per la zona pranzo, relax e due zone letto.
            All'esterno è possibile mangiare nella veranda o nel giardino, in parte ombrato da alberi da fico.
            Accesso per gli ospiti
            Gli ospiti potranno accedere in ogni parte della casa e visitare l'azienda agricola. Per coloro che hanno particolari problemi di allergia, facciamo presente che nell'azienda agricola sono presenti diversi animali, compresi cani e gatti.",
            "Situato nel centro di Atene, a meno di 700 m dal Teatro Nazionale della Grecia e a meno di 1 km da Piazza Omonia, il Connect Suites offre sistemazioni con WiFi gratuito e area salotto.

            Tutte le unità sono dotate di aria condizionata, TV a schermo piatto, soggiorno con divano, angolo cottura ben attrezzato con zona pranzo e bagno privato con doccia, asciugacapelli e set di cortesia. Per una maggiore comodità, la struttura fornisce asciugamani e lenzuola a un costo aggiuntivo.
            
            Tra i luoghi d'interesse nelle vicinanze dell'aparthotel figurano il Museo Archeologico Nazionale di Atene, Piazza Monastiraki e il Technopolis (Gazi). L'Aeroporto più vicino è Elefthérios Venizelos, a 21 km da Connect Suites, e la struttura offre un servizio di navetta aeroportuale a pagamento.",
            "L'appartamento indipendente al piano terra della villa con piscina, è ad uso esclusivo dei clienti. Può ospitare un unico gruppo familiare o di amici alla volta.
            Incastonata nel verde dei Monti Cimini, consente di raggiungere facilmente i sentieri per gli amanti del trekking e della Mountain-bike. Situata a solo 1 km da Bagnaia, caratteristico paesino medioevale di Viterbo, gode di un ottima posizione anche per chi vuole visitare Villa Lante, Palazzo Farnese, il Parco dei Mostri, lago di Vico..
            Lo spazio
            Di fronte l’appartamento c’è il giardino ad uso esclusivo degli ospiti, in oltre i clienti potranno muoversi liberamente per l’intero podere condividendo gli spazi con la famiglia. Potranno godere della vista mozzafiato dei Monti che coronano il podere, osservare gli animali rispettando i loro spazi e il loro benessere, potranno accedere alla piscina e utilizzare il barbecue e le attrezzature messe a disposizione.
            Accesso per gli ospiti
            I clienti saranno dotati delle chiavi per poter entrare ed uscire liberamente dal cancello della proprietà e per accedere all’appartamento.
            Altre cose da tenere a mente
            Di fronte all’ingresso della villa partono vari sentieri nel bosco per gli amanti del trekking o della mountain-bike. È possibile anche praticare il bird watching  o avvistare altri esemplari di fauna selvatica. A due chilometri gli appassionati della storia e delle bellezze architettoniche potranno visitare la famosa Villa Lante e il giardino delle Peonie più grande d’Europa.",
            "Situato nel centro di Atene, a meno di 1 km da Piazza Monastiraki e a 11 minuti a piedi da Piazza Omonia, il Philosofia Athens Suites offre sistemazioni con WiFi gratuito e area salotto.

            Tutte le unità sono dotate di aria condizionata e alcune dispongono di TV a schermo piatto, lavatrice, bollitore e cucina.
            
            Tra i luoghi di interesse nelle vicinanze figurano l'Università di Atene - Edificio Centrale, il Teatro Nazionale della Grecia e la zona dello shopping di via Ermou. L'Aeroporto più vicino è Elefthérios Venizelos, a 20 km da Philosofia Athens Suites.",
            "Appartamento nuovo, confortevole, in una villa signorile con giardino panoramico. Composto da un ampio e luminoso soggiorno living con angolo cottura, da una spaziosa camera da letto matrimoniale e da un bagno con finestra. Si affaccia sul terrazzo panoramico e sul giardino privato. È possibile attrezzare altri due posti letto per bambini o uno per adulti. Raggiungibile soltanto in auto, a 5 minuti da Ivrea e dall’autostrada per Torino, Aosta e Milano. È dotato di antifurto e di posto auto.
            Lo spazio
            L'alloggio è ben arredato e dispone di tutti i servizi necessari. La sua caratteristica è quella di essere indipendente, in un luogo tranquillo e di poter usufruire di spazi esterni (portico, giardino) che renderanno il soggiorno piacevole e rilassante. È possibile attrezzare altri due posti letto per bambini in soggiorno o uno per adulti. Nella camera si può aggiungere un lettino per bambini piccoli. L'alloggio è adatto a persone singole, coppie, famiglie, per vacanza o per soggiorni di lavoro.
            Altre cose da tenere a mente
            La posizione permette di utilizzare la permanenza sia per godere di alcuni giorni di riposo e di svago, sia di una pausa durante un viaggio lungo senza allontanarsi dalle vie di comunicazione, vista la comodità di accesso all'autostrada per Aosta, Milano, Torino o Genova. Nel paese, a pochi minuti dall'appartamento, si trova il Castello di Parella, magnifica residenza magnificamente restaurata e circondata da un parco e da interessanti botteghe. Nel circondario si potrà inoltre scoprire un territorio ricco di aspetti geologici- naturalistici e di storia quali il parco del Gran Paradiso e le dimore Sabaude.",
            "Villa Alba, casa 4 locali 130 m2 su 2 piani. Arredamento confortevole e antico: sala da pranzo grande, aperta con TV (satellite). Uscita sulla veranda. 1 camera con 2 letti. Cucina aperta (4 punti cottura, forno, forno a microonde). Doccia/bidè/WC. Piano s...
            Lo spazio
            ...uperiore: 1 camera con 1 letto doppio (160 cm, lunghezza 190 cm). 1 camera con 1 letto doppio (160 cm, lunghezza 190 cm). Bagno/bidè/WC. Barbecue. Vista panoramica sulla campagna. A disposizione: lavatrice, seggiolone, letto per bambini. Internet (Wireless LAN [WLAN], gratis). Adatto alle famiglie.
            
            I servizi aggiuntivi (opzionali) possono essere soggetti a costi extra pagabili in loco. Vi preghiamo di leggere la sezione “regole della casa” per i dettagli.
            Non esitate a contattarci in caso di domande. Grazie.
            La casa, completamente ristrutturata da un ex fienile, è situata nelle colline del Chianti a breve distanza da San Gimignano, famosa per le sue torri medievali. Villa Alba, indipendente. A 3 km dal centro di San Gimignano, a 31 km dal centro di Volterra, a 45 km dal centro di Siena, posizione tranquilla, soleggiata, immerso nel verde. Per uso privato: giardino 500 m2 (recintato), piscina (11 x 6 m, profondità 140 cm, 14.05.-08.10.). Doccia esterna, mobili da giardino, barbecue. Accesso fino alla casa (800 m strada non asfaltata). Parcheggio nella proprietà. Supermercato 3 km, ristorante 3 km. Campo da golf (18 buche) 22 km. Attrazioni nelle vicinanze: Certaldo 12 km, Colle Val d'Elsa 17 km, Monteriggioni 29 km, Castellina in Chianti 36 km, Radda in Chianti, Greve in Chianti 44 km, Firenze 56 km.",
            "Incantevole e spazioso appartamento che ospita 2 persone con grande agio ed è dotato di ogni tipo di comfort, tra cui un ampio terrazzo arredato e un posto auto coperto assegnato. L'alloggio è ubicato in posizione esclusiva: trovandosi in una strada secondaria che interseca C.so San Maurizio, offre infatti la possibilità di soggiornare in un'oasi di tranquillità, ma al tempo stesso di essere a soli 250 metri dalla centralissima P.za Vittorio Veneto, da cui poter esplorare comodamente la città.
            Lo spazio
            L'alloggio di 85 mq si trova al primo piano di uno stabile con ascensore ed è composto come segue:
            - Ampia area living di 50mq dotata di TV e zona pranzo di 20 mq. L'angolo cottura è attrezzato con piano cottura a gas, frigorifero, congelatore, lavastoviglie, moka, bollitore elettrico, tostapane, spremiagrumi, forno tradizionale combinato con microonde
            - Camera da letto con letto matrimoniale, guardaroba e ventilatore a soffitto
            - Toilette con wc, bidet e doccia in muratura
            - Terrazzo di 20mq dotato di copertura retrattile e attrezzato con tavolino, divanetto e due poltrone
            Disponibile un posto auto assegnato in cortile, coperto da tettoia.
            Ulteriori servizi a disposizione degli ospiti: WIFI ILLIMITATO, riscaldamento autonomo con caldaia, lavatrice, asciugatrice, zanzariere, stendino, ferro e asse da stiro.
            
            Asciugamani e biancheria letto inclusi (con cambi facoltativi a pagamento).
            N.B. In caso di soggiorni lunghi (superiori ai 30 giorni) la biancheria verrà ritirata ogni massimo 15 giorni dall'impresa di pulizia.
            Una volta ritirata l'ospite potrà scegliere:
            -di utilizzare la propria;
            -la sostituzione, in questo caso c'è un costo di 15€ per un set matrimoniale, per ogni ulteriore set 8€.",
            "Situato nel centro di Atene, a meno di 700 m da Piazza Omonia e a meno di 1 km da Piazza Monastiraki, l'Athens City Center Apartments offre sistemazioni con WiFi gratuito e area salotto.

            Tutte le sistemazioni sono dotate di bagno privato con doccia, aria condizionata, TV a schermo piatto e forno a microonde. A disposizione anche un frigorifero, un bollitore e una macchina da caffè.
            
            Ogni mattina vi attende una colazione continentale.
            
            L'Athens City Center Apartments dista 1,3 km dal Teatro Nazionale della Grecia e 1,4 km dal Gazi - Technopoli. L'Aeroporto più vicino è quello di Atene-Elefthérios Venizélos, a 20 km.",
            "Podere Casidote, casa 6 locali 115 m2 su 2 piani. Luminoso, arredamento accogliente: 1 camera con 1 letto doppio. Uscita sul giardino. 2 camere, ogni camera con 2 letti. Uscita sul giardino. 1 camera con 1 letto. Uscita sul giardino. Cucina abitabile (forn...
            Lo spazio
            ...ello a gas, 4 fuochi, bollitore elettrico) con tavolo da pranzo. Uscita sulla terrazza. Bagno/bidè/WC, doccia/bidè/WC. Riscaldamento a gas. Piano superiore: cucina abitabile (lavastoviglie, fornello a gas, 4 fuochi, bollitore elettrico, macchina del caffè elettrica) con camino e tavolo da pranzo. Uscita sulla terrazza. Doccia/bidè/WC. Riscaldamento a gas. 2 terrazze coperta, patio. Barbecue, sedie a sdraio, ripostiglio. Vista panoramica. A disposizione: lavatrice, letto per bambini. Prego notare: appartamento per non fumatori. 2 animali/cani permessi.
            
            I servizi aggiuntivi (opzionali) possono essere soggetti a costi extra pagabili in loco. Vi preghiamo di leggere la sezione “regole della casa” per i dettagli.
            Non esitate a contattarci in caso di domande. Grazie.
            Casa di campagna Podere Casidote, indipendente, circondata da prati e campi. A 3 km dal centro di Montieri, a 20 km dal centro di Massa Marittima, in collina, a 40 km dal mare. Per uso privato: terreno incolto 3'000 m2 con fiori e alberi. Accesso (800 m strada non asfaltata). Parcheggio nella proprietà. Negozio 3 km, spiaggia sabbiosa Follonica 40 km, lago balneabile Accesa 30 km. Sentieri per passeggiate vicino alla casa 10 m. Attrazioni nelle vicinanze: Giardino dei Suoni 11 km.",
           "Una piccola casa,arredata interamente in legno naturale,con un letto matrimoniale e un letto a castello ,camino e forno a legna . Un giardino attrezzato con barbeque , lettini e divani con accesso privato al lago.
           Lo spazio
           Una casa con giardino privato e recintato attrezzato con barbeque e lettini da cui si può accedere al lago per fare i bagni. Arredata in stile naturale , ha una camera con un letto matrimoniale e 2 originali letti a castello costruiti sopra . In sala un divano che può diventare un comodo letto.Cucina attrezzata , camino e forno a legna. CIR 09704-CNI-00019
           Accesso per gli ospiti
           Comodo parcheggio privato gratuito.",
            "Situato nel centro di Atene, a soli 10 minuti a piedi dal Museo dell'Acropoli, l'Athens Residence Apartments è un complesso di appartamenti elegantemente arredati con connessione Wi-Fi gratuita. La struttura dista 100 m dalla Collina di Filopappos e pochi passi da ristoranti e bar.

            Caratterizzati da pavimenti in parquet e colori tenui, gli appartamenti dispongono di aria condizionata, zona giorno e angolo cottura con frigorifero, tostapane, fornelli e macchina da caffè. Inoltre, comprendono un bagno moderno con doccia, set di cortesia e pantofole. Alcune sistemazioni vantano l'accesso a un cortile, a una terrazza e/o a un balcone. Asciugamani e lenzuola sono inclusi.
            
            In loco potrete usufruire di un servizio di noleggio biciclette, e la zona è rinomata per il ciclismo e l'escursionismo. L'Athens Residence Apartments dista 400 m dalla stazione della metropolitana Syngrou Fix e 700 m dal Museo Nazionale d'Arte Contemporanea. L'Aeroporto più vicino è quello di Atene-Elefthérios Venizélos, a 40 km.
            
            Questa zona di Atene è una delle preferite dai nostri ospiti, in base alle recensioni indipendenti.",
            "Questo ampio bilocale offre tutte le comodità che servono alle famiglie che viaggiano. Un letto matrimoniale e due divani trasformabili in letto, offrono fino a 6 posti letto. La casa è dotata di biancheria, asciugamani, stoviglie, elettrodomestici, per garantire il massimo comfort agli ospiti. L’appartamento è situato a 15 minuti a piedi dalla centralissima Piazza Statuto e Stazione Porta Susa ed a 3 minuti dal Parco della Pellerina. Comoda alla Metropolitana ed alle linee dei mezzi 13 e 71.
            Lo spazio
            L’alloggio è costituito da un disimpegno all’ingresso, un soggiorno con angolo cucina, tavolo per sei persone, divano letto e tv; una seconda camera completa di letto matrimoniale, armadio guardaroba e secondo divano letto; un bagno completo di finestra, lavabo, doccia, WC e bidet. Sono presenti tutti gli elettrodomestici principali come lavatrice, forno a microonde, macchina caffè Nespresso, piano cottura a induzione con cappa aspirante. Posate, piatti, pentole, asciugamani, lenzuola, coperte, etc..., completano la dotazione di questo appartamento.",
            "Appartamento nuovo, confortevole, in una villa signorile con giardino panoramico. Composto da un ampio e luminoso soggiorno living con angolo cottura, da una spaziosa camera da letto matrimoniale e da un bagno con finestra. Si affaccia sul terrazzo panoramico e sul giardino privato. È possibile attrezzare altri due posti letto per bambini o uno per adulti. Raggiungibile soltanto in auto, a 5 minuti da Ivrea e dall’autostrada per Torino, Aosta e Milano. È dotato di antifurto e di posto auto.
            Lo spazio
            L'alloggio è ben arredato e dispone di tutti i servizi necessari. La sua caratteristica è quella di essere indipendente, in un luogo tranquillo e di poter usufruire di spazi esterni (portico, giardino) che renderanno il soggiorno piacevole e rilassante. È possibile attrezzare altri due posti letto per bambini in soggiorno o uno per adulti. Nella camera si può aggiungere un lettino per bambini piccoli. L'alloggio è adatto a persone singole, coppie, famiglie, per vacanza o per soggiorni di lavoro.
            Altre cose da tenere a mente
            La posizione permette di utilizzare la permanenza sia per godere di alcuni giorni di riposo e di svago, sia di una pausa durante un viaggio lungo senza allontanarsi dalle vie di comunicazione, vista la comodità di accesso all'autostrada per Aosta, Milano, Torino o Genova. Nel paese, a pochi minuti dall'appartamento, si trova il Castello di Parella, magnifica residenza magnificamente restaurata e circondata da un parco e da interessanti botteghe. Nel circondario si potrà inoltre scoprire un territorio ricco di aspetti geologici- naturalistici e di storia quali il parco del Gran Paradiso e le dimore Sabaude.
            Informazioni su questo spazio
            Véritable nid douillet, tout a été pensé pour votre confort. Un lieu cosy, aménagé par Marie avec des matériaux naturels et bruts. La salle de bain séparée permet détente et relaxation. La terrasse vous permet de profiter d'un bon moment avec votre lecture préférée, de prendre votre petit-déjeuner ou de passer une bonne soirée à la douceur du brasero.
            Lo spazio
            Le plaisir de la cabane avec tout le confort et la chaleur du foyer.
            Accesso per gli ospiti
            Un parking est à votre disposition à 30 m de la cabane. Vous aurez aussi la possibilité si vous le désirez de ranger vos vélos au garage .",
            "Il loft Quadrilatero si compone di un grande open space, disegnato in stile moderno e industriale da un importante architetto italiano. Si accede ad esso attraverso un ingresso di ringhiera verde e tipico delle antiche case torinesi. (L’androne di accesso è pulito, ma a differenza della facciata, non restaurato. Non fatevi spaventare!!). L’intero appartamento riceve un sacco di luce solare grazie alla sua doppia esposizione ed è molto accogliente di notte.
            La cucina è perfettamente equipaggiata con tutto ció che serve per cucinare.
            La camera da letto principale è composta da un letto tondo comodissimo (diametro 2 metri), una cabina armadio molto spaziosa ed un vecchio pianoforte che vi invitiamo a suonare (ma solo dalle 9 del mattino alle 22 della sera). La camera da letto è divisa dal resto della casa da una pesante tenda, in tutto identica a quelle dei palcoscenici teatrali.
            L’altra camera da letto è composta da un divano letto matrimoniale ed ha la sua propria porta, cosa che consente maggiore privacy. (NB questa camera dá direttamente sulla strada e nei fine settimana si possono sentire le chiacchiere delle persone che passeggiano per il quartiere. Nel caso abbiate problemi ad addormentarvi vi invitiamo ad utilizzare il futón posto nell’open space o a tenere in considerazione questo fatto al momento della prenotazione)
            Esiste anche la possibilitá di accedere ad un piccolo solaio equipaggiato di una chaise long. È l’ideale se volete concedervi un po’ di relax o per leggere un libro. Puó accedervi solo una persona alla volta ed ha un’altezza di solo un metro, per cui attenti alla testa!!
            Repubblica1bis Luxury Apartment è un elegante appartamento situato nella famosa piazza della Repubblica, nel pieno centro storico di Torino. Il palazzo fu progettato nel ‘700 dal famoso architetto Filippo Juvarra.
            Da qui è possibile raggiungere comodamente a piedi tutte le maggiori attrazioni della città. L'appartamento è stato finemente ristrutturato, ripristinando i soffitti a cassettone originali e mixando un arredamento contemporaneo accostato a pezzi di antiquariato.
            Lo spazio
            L'alloggio, la cui superficie è di 150 mq, è stato recentemente ristrutturato esaltando i particolari d'epoca, ed è situato al terzo piano, raggiungibile anche tramite ascensore. L'alloggio dispone di un ingresso, 2 ampie camere da letto matrimoniali, 2 bagni (uno con doccia e uno con vasca), una cucina, uno splendido salone con camino di 45 mq, con divano letto matrimoniale. Nel caso ci fossero bambini piccoli, potranno essere forniti i lettini su richiesta.
            Gli ospiti potranno usufruire di connessione internet Wi-Fi in ogni stanza. Verranno fornite lenzuola e 3 asciugamani (doccia, lavabo, bidet) per ciascun ospite. La cucina nuova è completamente attrezzata con forno, lavastoviglie, stoviglie, pentole e macchinetta del caffè Nespresso. E’ presente l’aria condizionata in ogni stanza. Inoltre, sono disponibili una lavatrice, asse e ferro da stiro e stendibiancheria. E' presente una TV nel salone.
            Casa Ada è un appartamento luminoso, fresco e accogliente situato in una tranquilla zona residenziale nella parte alta di Lecco, ai piedi del Resegone. Ideale per chi ricerca il contatto con la natura, pur restando in un contesto urbano. Dalla casa partono sentieri adatti a famiglie e a chi ama la montagna e gli spazi aperti. La casa, appena rinnovata, è anche una soluzione ottimale per lavoratori a distanza, in remote working, in cerca di pace e di una fuga dalla città
            Lo spazio
            L'appartamento si trova al secondo piano di una piccola palazzina con ascensore. E' composto da un soggiorno con due poltrone letto adatte a ragazzi (stile tatami), Smart TV con Netflix e DVD, stereo CD, desk per pc, wi-fi, una cucina completamente equipaggiata, una camera matrimoniale con balcone (o su richiesta con due letti singoli) un bagno con ampia doccia e angolo lavanderia.
            Per famiglie con bimbi piccoli è disponibile un lettino da campeggio e un seggiolone.
            L'appartamento è completo di dotazione biancheria letto e bagno.
            Per gli ospiti che arrivano in auto è possibile parcheggiare liberamente sotto casa o nel garage privato",
            "La stanza è sita in un ampio appartamento a sua volta ubicato in uno storico palazzo del dopoguerra: centralissimo, a 50 metri dalla stazione centrale, dalle linee metropolitane e dalla linea Circumvesuviana. Dall'appartamento sono anche facilmente raggiungibili le linee Cumana e Circumflegrea.
            Lo spazio
            Una stanza finemente arredata, che ho attrezzato in risposta alle esigenze che io stesso, a seguito dei miei numerosi viaggi,ho riscontrato.
            Accesso per gli ospiti
            Gli ospiti possono usufruire, oltre che della loro stanza, anche di tutti i servizi disponibili in casa, incluso il bagno condiviso con me e con gli altri ospiti.
            Altre cose da tenere a mente
            La mia casa è una risorsa e al contempo una grande opportunità per chi la sceglie, sarò lieto di assistere i miei ospiti al meglio!
            Non dovrebbe nemmeno essere specificato, ma lo faccio per chiarezza: LGBT benvenuti a casa mia!
            Le zone comuni dell’appartamento sono sorvegliate da telecamere per la reciproca tutela e sicurezza.",
            "Nuovissimo accogliente bilocale di 65 mq con doppio balcone, perfetto per 2 persone, situato al 1° piano di uno stabile con ascensore. L'appartamento si trova a soli 250mt dalla fermata della metro M1 De Angeli, all'interno dell'elegante quartiere Marghera/De Angeli, ricco di ristoranti, gelaterie, negozi di abbigliamento e bar. Nelle vicinanze sono presenti la farmacia De Angeli aperta h24, la Feltrinelli e Mondadori Store. L'alloggio fa parte di un condominio signorile con portiere.
            Lo spazio
            SONO CONSENTITI SOGGIORNI DI MEDIA/LUNGA DURATA CON CONTRATTO DI LOCAZIONE TURISTICA O TRANSITORIO FINO A 1 ANNO
            
            Lo spazio interno è così organizzato:
            - SOGGIORNO con smart TV, divano eventualmente utilizzabile come terzo posto letto e da segnalare in fase di prenotazione, tavolo da pranzo;
            - CUCINA con frigorifero, congelatore, lavastoviglie, forno tradizionale, microonde, bollitore elettrico e moka. Piccolo balcone;
            - CAMERA DA LETTO con letto matrimoniale, guardaroba, TV e ampio terrazzo;
            - BAGNO con bidet e box doccia.
            
            Ulteriori servizi a disposizione degli ospiti: WIFI, A/C con split in soggiorno, riscaldamento, lavatrice, ferro e asse da stiro.",
            "Una piccola casa,arredata interamente in legno naturale,con un letto matrimoniale e un letto a castello ,camino e forno a legna . Un giardino attrezzato con barbeque , lettini e divani con accesso privato al lago.
            Lo spazio
            Una casa con giardino privato e recintato attrezzato con barbeque e lettini da cui si può accedere al lago per fare i bagni. Arredata in stile naturale , ha una camera con un letto matrimoniale e 2 originali letti a castello costruiti sopra . In sala un divano che può diventare un comodo letto.Cucina attrezzata , camino e forno a legna. CIR 09704-CNI-00019
            Accesso per gli ospiti
            Comodo parcheggio privato gratuito.",
            "Splendido appartamento situato nel cuore del centro storico di Palermo, può ospitare fino a 4 persone ed è composto da cucina, living spazioso con divano letto matrimoniale , camera da letto matrimoniale e due bagni con doccia. Arredamento moderno, connessione wi-fi, TV LED 32, finestre insonorizzate, riscaldamento, frigo, cucina e bagno attrezzati, biancheria da letto e da bagno. L'appartamento si trova al primo piano, ASCENSORE.
            Lo spazio
            L'appartamento si trova al centro storico della città, posizione unica per vivere al meglio Palermo. A pochi passi si trova il mercato di Ballarò dove è possibile comprare pesce, semenze e spezie, frutta e verdura fresca ma anche provare il tipico street food palermitano! Di giorno sarà impossibile non perdersi nelle vie antiche di Palermo e ammirare le meraviglie che la città nasconde! Il tourist information è a pochi passi dalla proprietà se volete organizzare qualche gita fuori porta! Inoltre la stazione dei treni e degli autobus è a pochi passi dall'appartamento!
            Accesso per gli ospiti
            Gli ospiti avranno accesso all'intera proprietà.",

        ];
        $apartmentAddressList=[
            "Via Roma 261, Palermo, PA",
            "Via Antonio Mongitore, 4, 90134 Palermo PA",
            "Via Schiavo Michele, 90134 Palermo PA",
            "Via Aleardo Aleardi, 78, 30172 Venezia VE",
            "Via Cappuccina, 30172 Venezia VE",
            "Via Goffredo Mameli, 20129 Milano MI",
            "Via Marcona, 20129 Milano MI",
            "Via Gallia, 00183 Roma RM",
            "Via Iberia, 16, 00183 Roma RM",
            "Piazza Epiro, 15-11, 00183 Roma RM",
            "Via Pietro Ravanas, 70123 Bari BA",
            "Via Principe Amedeo, 70122 Bari BA",
            "Via Giovanni Bovio, 38, 70123 Bari BA",
            "Via Angelo Inganni, 40, 20147 Milano MI",
            "Corso Vercelli, 22, 20145 Milano MI",
            "V.le Berengario, 15, 20149 Milano MI",
            "Rio Terà dei Pensieri, 328, 30135 Venezia VE",
            "Calle Larga dei Bari, 1223, 30135 Venezia VE",
            "Corte Coppo, 4346/a, 30124 Venezia VE",
            "Viale Regina Margherita, 316, 00161 Roma RM",
        ];
        $apartmentTitleList=[
            "Stylish basement studio in Bologna City Centre",
            "PrimoPiano - Melzo Flat",
            "Podere Rachele - Casa Ghiandaia",
            "Casa Das Areias",
            "Casa immersa nel verde con piscina",
            "Lunattico 48 central station",
            "Lussuoso appartamento in centro storico",
            "TREVI Sweet Suite",
            "Alzarti la mattina con una vista fantastica",
            "Sweet home on the Lake of Como",
            "Ca` Beo (URB120) for 6 persons.",
            "CASA MOTOM: rifugio urbano per famiglie in viaggio",
            "Casetta con fantastica vista lago!",
            "La Casa all'Oliveto",
            "Aurora, raffinata e romantica suite",
            "Moderno zona isola/corso Como",
            "Appartamento sui Navigli",
            "Soggiorna nel cuore di Atene",
            "Acropolis & Lycavettus View Roof House",
            "Calm apartment near Panathenaic Stadium",
            "Sweet one bedroom apartment",
            "Museum of Modern Art Private Double Room",

        ];
        $apartmentImgList=[
            'https://images.pexels.com/photos/2111768/pexels-photo-2111768.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/1450363/pexels-photo-1450363.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/276554/pexels-photo-276554.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/6775268/pexels-photo-6775268.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/2850347/pexels-photo-2850347.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/6077368/pexels-photo-6077368.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/4846461/pexels-photo-4846461.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/1668860/pexels-photo-1668860.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/6527069/pexels-photo-6527069.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/259588/pexels-photo-259588.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/208736/pexels-photo-208736.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/4846461/pexels-photo-4846461.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/65225/boat-house-cottage-waters-lake-65225.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/1612351/pexels-photo-1612351.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/7227621/pexels-photo-7227621.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/1571459/pexels-photo-1571459.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
            'https://images.pexels.com/photos/460695/pexels-photo-460695.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
            'https://images.pexels.com/photos/2724748/pexels-photo-2724748.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/8134848/pexels-photo-8134848.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
            'https://images.pexels.com/photos/6585598/pexels-photo-6585598.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
            'https://images.pexels.com/photos/2506990/pexels-photo-2506990.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        ];
        $apartmentLongitudeList=[
            13.36286,
            13.35764,
            13.36067,
            12.24017,
            12.23751,
            9.21315,
            9.20954,
            12.50376,
            12.50551,
            12.50379,
            16.85847,
            16.86127,
            16.85889,
            9.12581,
            9.16122,
            9.15169,
            12.31737,
            12.32566,
            12.33525,
            12.51171
        ];
        $apartmentLatitudeList=[
            38.11847,
            38.11074,
            38.11062,
            45.48717,
            45.48524,
            45.46365,
            45.46405,
            41.88171,
            41.87964,
            41.87915,
            41.12193,
            41.12250,
            41.12291,
            45.45146,
            45.46650,
            45.47914,
            45.43600,
            45.44107,
            45.43510,
            41.90916
        ];
        
        for($x=0; $x<17; $x++){
            $apartment = new Apartment();
            $apartment->user_id=rand(1,5);
            $apartment->description=$apartmentDescriptionList[$x];
            $apartment->rooms_num=rand(5,8);
            $apartment->beds_num=rand(1,3);
            $apartment->bath_num=rand(1,2);
            $apartment->meters_size=rand(80,500);
            $apartment->address=$apartmentAddressList[$x];
            $apartment->title=$apartmentTitleList[$x];
            $apartment->visible=true;
            $apartment->img_path=$apartmentImgList[$x];
            $apartment->price_night=rand(80,200);
            $apartment->longitude=$apartmentLongitudeList[$x];
            $apartment->latitude=$apartmentLatitudeList[$x];

            $randServiceKeys = array_rand($serviceIDList, 5);
            $service1=$serviceIDList[$randServiceKeys[0]];
            $service2=$serviceIDList[$randServiceKeys[1]];
            $service3=$serviceIDList[$randServiceKeys[2]];
            $service4=$serviceIDList[$randServiceKeys[3]];
            $service5=$serviceIDList[$randServiceKeys[4]];

            $apartment->save();

            $apartment->service()->attach($service1);
            $apartment->service()->attach($service2);
            $apartment->service()->attach($service3);
            $apartment->service()->attach($service4);
            $apartment->service()->attach($service5);

        }

        for($z=17; $z<20; $z++){
            $apartment = new Apartment();
            $apartment->user_id=6;
            $apartment->description=$apartmentDescriptionList[$z];
            $apartment->rooms_num=rand(5,8);
            $apartment->beds_num=rand(1,3);
            $apartment->bath_num=rand(1,2);
            $apartment->meters_size=rand(80,500);
            $apartment->address=$apartmentAddressList[$z];
            $apartment->title=$apartmentTitleList[$z];
            $apartment->visible=true;
            $apartment->img_path=$apartmentImgList[$z];
            $apartment->price_night=rand(80,200);
            $apartment->longitude=$apartmentLongitudeList[$z];
            $apartment->latitude=$apartmentLatitudeList[$z];

            $randServiceKeys = array_rand($serviceIDList, 5);
            $service1=$serviceIDList[$randServiceKeys[0]];
            $service2=$serviceIDList[$randServiceKeys[1]];
            $service3=$serviceIDList[$randServiceKeys[2]];
            $service4=$serviceIDList[$randServiceKeys[3]];
            $service5=$serviceIDList[$randServiceKeys[4]];

            $apartment->save();

            $apartment->service()->attach($service1);
            $apartment->service()->attach($service2);
            $apartment->service()->attach($service3);
            $apartment->service()->attach($service4);
            $apartment->service()->attach($service5);
        }

        $messagesNameList=[
            'Marco',
            'Sebastian',
            'Mariapia',
            'Gianluca',
            'Gianluigi'
        ];



        $messagesMailList=[
            'marco@marco.it',
            'sebastian@sebastian.it',
            'mariapia@mariapia.it',
            'gianluca@gianluca.it',
            'gianluigi@gianluigi.it',
        ];
        $messagesTextList=[
            "Salve! Vorrei delle informazioni su questo appartamento, come la posso contattare?",
            "Salve, gradirei avere informazioni in merito al suo meraviglioso appartamento! Mi piace molto la Scandinavia e non vedo l'ora di passare lì le mie vacanze",
            "Buongiorno, volevo chiederLe, l'appartamento ha il riscaldamento autonomo o centralizzato?",
            "Ciao, volevo chiederle se l'appartamento è disponibile per Pasqua, grazie in anticipo",
            "Buonasera, per curiosità chi dovrebbe pagare i costi di riparazione in caso di danni?"
        ];

        for($y=0; $y<5; $y++){
            $message=new Message();
            $message->apartment_id=rand(18,20);
            $message->full_name=$messagesNameList[$y];
            $message->email=$messagesMailList[$y];
            $message->text=$messagesTextList[$y];
            $message->save();
        }

        $sponsorNameList=[
            'Bronzo',
            'Argento',
            'Oro',
        ];
        $sponsorPriceList=[
            2.99,
            5.99,
            9.99,
        ];
        $sponsorHourList=[
            24,
            72,
            144,
        ];
        for($r=0;$r<3;$r++){
            $sponsor=new Sponsor();
            $sponsor->name=$sponsorNameList[$r];
            $sponsor->hours=$sponsorHourList[$r];
            $sponsor->cost=$sponsorPriceList[$r];
            $sponsor->save();
        }

        for($s=0;$s<4;$s++){
            $payment=new Payment();
            $payment->apartment_id=rand(1,20);
            $payment->sponsor_id=rand(1,3);
            $payment->status=true;
            $payment->expire_date='2999/12/31';
            $payment->total=Sponsor::find($payment->sponsor_id)->cost;
            $payment->save();
        };

        for($a=0;$a<5;$a++) {
            $statistic = new Statistic();
            $statistic->guest_ip = $faker->localIpv4();
            $statistic->apartment_id = 18;
            $statistic->save();
        }
    }
}
