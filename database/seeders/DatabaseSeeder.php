<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run() {

        DB::table('companies')->insert([
            ['id' => 1, 'P_Iva' => '12345678910', 'Ragione_Sociale' => 'Coal', 'Localizzazione' => 'Via Ugo Foscolo', 'Descrizione' => 'Un supermercato di quartiere con vasta selezione di prodotti freschi e servizio cordiale', 'Logo' => 'coal.png', 'civico' => '10', 'citta'=>'Porto San Giorgio','cap'=>'63822','tel'=>'5372578920', 'email'=>'info@coal.it'],
            ['id' => 2, 'P_Iva' => '11121314151', 'Ragione_Sociale' => 'Crai', 'Localizzazione' => 'Viale della Carriera', 'Descrizione' => 'Supermercato con tecnologie all\'avanguardia e reparti specializzati per offrire un\'esperienza di spesa unica', 'Logo' => 'crai.png','civico' => '90', 'citta'=>'Fermo','cap'=>'63900','tel'=>'5372578920', 'email'=>'info@crai.it'],
            ['id' => 3, 'P_Iva' => '61718192021', 'Ragione_Sociale' => 'Oasi', 'Localizzazione' => 'Via Solferino', 'Descrizione' => 'Supermercato di qualità con prodotti locali e biologici per una spesa sana e sostenibile', 'Logo' => 'oasi.png','civico' => '2', 'citta'=>'Porto San Giorgio','cap'=>'63822','tel'=>'5372578920', 'email'=>'info@oasi.it'],
            ['id' => 4, 'P_Iva' => '22232425262', 'Ragione_Sociale' => 'Simply', 'Localizzazione' => 'Borgo Trieste', 'Descrizione' => 'Catena di supermercati con esperienza pluriennale, offrendo prodotti di alta qualità a prezzi accessibili', 'Logo' => 'simply.png','civico' => '69', 'citta'=>'Petritoli','cap'=>'63848','tel'=>'5372578920', 'email'=>'info@simply.it'],
            ['id' => 5, 'P_Iva' => '72829303132', 'Ragione_Sociale' => 'Lidl', 'Localizzazione' => 'Via Trentino', 'Descrizione' => 'Supermercato innovativo con servizio di consegna a domicilio e opzioni di shopping online per comodità e praticità', 'Logo' => 'lidl.png','civico' => '2', 'citta'=>'Porto Sant Elpidio','cap'=>'63821','tel'=>'5372578920', 'email'=>'info@lidl.it'],
            ['id' => 6, 'P_Iva' => '33343536373', 'Ragione_Sociale' => 'Eurospin', 'Localizzazione' => 'Via Pompeiana', 'Descrizione' => 'Supermercato conveniente con prezzi competitivi e assortimento completo per tutte le esigenze alimentari', 'Logo' => 'eurospin.png','civico' => '41', 'citta'=>'Porto San Giorgio','cap'=>'63822','tel'=>'5372578920', 'email'=>'info@eurospin.it'],
        ]);

        DB::table('users')->insert([
            ['id' => 1, 'username' => 'useruser', 'password' => Hash::make('Yg4Xzxjb'), 'name' => 'Franco', 'surname' => 'Rossi', 'genere' => 'Uomo', 'role' => 'user', 'email' => 'franco@rossi.it', 'telefono' => '3333102759', 'data_nascita' => '1945/10/05'],
            ['id' => 2, 'username' => 'staffstaff', 'password' => Hash::make('Yg4Xzxjb'), 'name' => 'Adele', 'surname' => 'Bianchi', 'genere' => 'Donna', 'role' => 'staff', 'email' => 'adele@bianchi.it', 'telefono' => '3663102759', 'data_nascita' => '1994/08/10'],
            ['id' => 3, 'username' => 'adminadmin', 'password' => Hash::make('Yg4Xzxjb'), 'name' => 'Marco', 'surname' => 'Verdi', 'genere' => 'Uomo', 'role' => 'admin', 'email' => 'marco@verdi.it', 'telefono' => '3493102759', 'data_nascita' => '2001/11/22'],
        ]);

       DB::table('offers')->insert([
            ['ID_Offerta' => 1, 'Nome' => 'ScontoSeciale', 'Descrizione' => 'Sconto su una selezione di prodotti alimentari freschi', 'Scadenza' => '2021/10/05', 'Immagine' => 'coup_5.png', 'ID_Azienda' => 2],
            ['ID_Offerta' => 2, 'Nome' => 'OffertaImperdibile', 'Descrizione' => 'Risparmia sull\'acquisto di generi alimentari biologici.', 'Scadenza' => '2024/10/05', 'Immagine' => 'coup_15.png', 'ID_Azienda' => 1],
            ['ID_Offerta' => 3, 'Nome' => 'RisparmiaOra', 'Descrizione' => 'Coupon per uno sconto su tutti i latticini e formaggi', 'Scadenza' => '2047/10/05', 'Immagine' => 'coup_20.png', 'ID_Azienda' => 4],
            ['ID_Offerta' => 4, 'Nome' => 'CouponEsclusivo', 'Descrizione' => 'Offerta speciale: risparmia sull\'intero reparto di prodotti da forno', 'Scadenza' => '2023/01/05', 'Immagine' => 'coup_30.png', 'ID_Azienda' => 1],
            ['ID_Offerta' => 5, 'Nome' => 'PrompFlash', 'Descrizione' => 'Coupon valido su frutta e verdura di stagione', 'Scadenza' => '2022/10/12', 'Immagine' => 'coup_50.png', 'ID_Azienda' => 5],
            ['ID_Offerta' => 6, 'Nome' => 'AcquistoIntelligente', 'Descrizione' => 'Risparmia sull\'acquisto di frutta biologica', 'Scadenza' => '2023/12/14', 'Immagine' => 'coup_60.png', 'ID_Azienda' => 6],
        ]);

        DB::table('faqs')->insert([
            ['id' => 1, 'Domanda' => 'Di che cosa tratta il sito?', 'Risposta' => 'Il sito offre la pubblicizzazione di offerte promozionali per prodotti e servizi, con la possibilità di emettere coupon.'],
            ['id' => 2, 'Domanda' => 'Come posso ottenere un coupon?', 'Risposta' => 'Bisogna essere registrati al sito, andare nella sezione catalogo e generare il coupon desiderato. Il cuopn generato sarà una pagina con un codice da dover stampare e presentare in negozio.'],
            ['id' => 3, 'Domanda' => 'Come posso modificare i miei dati?', 'Risposta' => 'Nella tua area utente premi il bottone con la matita e aprirà la form di modifica dei dati.'],
            ['id' => 4, 'Domanda' => 'Come posso ottenere assistenza tecnica?', 'Risposta' => 'Nella sezione contattaci puoi inviare una mail ad un contatto per segnalare problemi o fare domande.'],
        ]);
    }

}
