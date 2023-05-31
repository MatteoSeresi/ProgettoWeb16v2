<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    const DESCPROD = 'Sed lacus. Donec lectus.';

    public function run() {

        DB::table('companies')->insert([
            ['id' => 1, 'P_Iva' => '12345678910', 'Ragione_Sociale' => 'Coal', 'Localizzazione' => 'Via Ugo Foscolo', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'coal.png', 'civico' => '10', 'citta'=>'Porto San Giorgio','cap'=>'63822','tel'=>'5372578920', 'email'=>'info@coal.it'],
            ['id' => 2, 'P_Iva' => '11121314151', 'Ragione_Sociale' => 'Crai', 'Localizzazione' => 'Viale della Carriera', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'crai.png','civico' => '90', 'citta'=>'Fermo','cap'=>'63900','tel'=>'5372578920', 'email'=>'info@crai.it'],
            ['id' => 3, 'P_Iva' => '61718192021', 'Ragione_Sociale' => 'Oasi', 'Localizzazione' => 'Via Solferino', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'oasi.png','civico' => '2', 'citta'=>'Porto San Giorgio','cap'=>'63822','tel'=>'5372578920', 'email'=>'info@oasi.it'],
            ['id' => 4, 'P_Iva' => '22232425262', 'Ragione_Sociale' => 'Simply', 'Localizzazione' => 'Borgo Trieste', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'simply.png','civico' => '69', 'citta'=>'Petritoli','cap'=>'63848','tel'=>'5372578920', 'email'=>'info@simply.it'],
            ['id' => 5, 'P_Iva' => '72829303132', 'Ragione_Sociale' => 'Lidl', 'Localizzazione' => 'Via Trentino', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'lidl.png','civico' => '2', 'citta'=>'Porto Sant Elpidio','cap'=>'63821','tel'=>'5372578920', 'email'=>'info@lidl.it'],
            ['id' => 6, 'P_Iva' => '33343536373', 'Ragione_Sociale' => 'Eurospin', 'Localizzazione' => 'Via Pompeiana', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'eurospin.png','civico' => '41', 'citta'=>'Porto San Giorgio','cap'=>'63822','tel'=>'5372578920', 'email'=>'info@eurospin.it'],
        ]);

        DB::table('users')->insert([
            ['id' => 1, 'username' => 'useruser', 'password' => Hash::make('ciaociao'), 'name' => 'Franco', 'surname' => 'Rossi', 'genere' => 'Uomo', 'role' => 'user', 'email' => 'franco@rossi.it', 'telefono' => '3333102759', 'data_nascita' => '1945/10/05'],
            ['id' => 2, 'username' => 'staffstaff', 'password' => Hash::make('Yg4Xzxjb'), 'name' => 'Adele', 'surname' => 'Bianchi', 'genere' => 'Donna', 'role' => 'staff', 'email' => 'adele@bianchi.it', 'telefono' => '3663102759', 'data_nascita' => '1994/08/10'],
            ['id' => 3, 'username' => 'adminadmin', 'password' => Hash::make('Yg4Xzxjb'), 'name' => 'LeBron', 'surname' => 'James', 'genere' => 'Uomo', 'role' => 'admin', 'email' => 'lebron@james.it', 'telefono' => '3493102759', 'data_nascita' => '2001/11/22'],
        ]);

       DB::table('offers')->insert([
            ['ID_Offerta' => 1, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '1945/10/05', 'Immagine' => 'coup_5.png', 'ID_Azienda' => 2],
            ['ID_Offerta' => 2, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '2024/10/05', 'Immagine' => 'coup_15.png', 'ID_Azienda' => 1],
            ['ID_Offerta' => 3, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '2047/10/05', 'Immagine' => 'coup_20.png', 'ID_Azienda' => 4],
            ['ID_Offerta' => 4, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '2000/10/05', 'Immagine' => 'coup_30.png', 'ID_Azienda' => 1],
            ['ID_Offerta' => 5, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '1492/10/12', 'Immagine' => 'coup_50.png', 'ID_Azienda' => 5],
            ['ID_Offerta' => 6, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '1789/07/14', 'Immagine' => 'coup_60.png', 'ID_Azienda' => 6],
        ]);

        DB::table('faqs')->insert([
            ['id' => 1, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 2, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 3, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 4, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 5, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 6, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
        ]);

        DB::table('coupon')->insert([
            
        ]);
    }

}
