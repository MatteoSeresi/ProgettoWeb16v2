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
            ['id' => 1, 'P_Iva' => '12345678910', 'Ragione_Sociale' => 'Coal', 'Localizzazione' => 'Daje Roma Dajeeee 10', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'lebron.jpg'],
            ['id' => 2, 'P_Iva' => '11121314151', 'Ragione_Sociale' => 'Crai', 'Localizzazione' => 'Evviva Gesu 33', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'lebron.jpg'],
            ['id' => 3, 'P_Iva' => '61718192021', 'Ragione_Sociale' => 'Oasi', 'Localizzazione' => 'Piazza Roma 5', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'lebron.jpg'],
            ['id' => 4, 'P_Iva' => '22232425262', 'Ragione_Sociale' => 'Simply', 'Localizzazione' => 'Via Gianfranco 3', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'lebron.jpg'],
            ['id' => 5, 'P_Iva' => '72829303132', 'Ragione_Sociale' => 'Lidl', 'Localizzazione' => 'Via Gigio 14', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'lebron.jpg'],
            ['id' => 6, 'P_Iva' => '33343536373', 'Ragione_Sociale' => 'Eurospin', 'Localizzazione' => 'Via Franco 12', 'Descrizione' => 'Lorem Ipsum', 'Logo' => 'lebron.jpg'],
        ]);

        DB::table('users')->insert([
            ['id' => 1, 'username' => 'useruser', 'password' => Hash::make('ciao'), 'name' => 'Franco', 'surname' => 'Rossi', 'genere' => 'Uomo', 'role' => 'user', 'email' => 'franco@rossi.it', 'telefono' => '3333102759', 'data_nascita' => '1945/10/05'],
            ['id' => 2, 'username' => 'staffstaff', 'password' => Hash::make('ciao'), 'name' => 'Adele', 'surname' => 'Bianchi', 'genere' => 'Donna', 'role' => 'staff', 'email' => 'adele@bianchi.it', 'telefono' => '3663102759', 'data_nascita' => '1994/08/10'],
            ['id' => 3, 'username' => 'adminadmin', 'password' => Hash::make('ciao'), 'name' => 'LeBron', 'surname' => 'James', 'genere' => 'Uomo', 'role' => 'admin', 'email' => 'lebron@james.it', 'telefono' => '3493102759', 'data_nascita' => '2001/11/22'],
        ]);

       DB::table('offers')->insert([
            ['ID_Offerta' => 1, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '1945/10/05', 'Immagine' => 'lebron.jpg', 'ID_Azienda' => 2],
            ['ID_Offerta' => 2, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '2024/10/05', 'Immagine' => 'lebron.jpg', 'ID_Azienda' => 1],
            ['ID_Offerta' => 3, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '2047/10/05', 'Immagine' => 'lebron.jpg', 'ID_Azienda' => 4],
            ['ID_Offerta' => 4, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '2000/10/05', 'Immagine' => 'coup.jpg', 'ID_Azienda' => 1],
            ['ID_Offerta' => 5, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '1492/10/12', 'Immagine' => 'lebron.jpg', 'ID_Azienda' => 5],
            ['ID_Offerta' => 6, 'Nome' => 'Coupon', 'Descrizione' => self::DESCPROD, 'Scadenza' => '1789/07/14', 'Immagine' => 'lebron.jpg', 'ID_Azienda' => 6],
        ]);

        DB::table('faqs')->insert([
            ['id' => 1, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 2, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 3, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 4, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 5, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
            ['id' => 6, 'Domanda' => 'Consectetur adipisci elit, sed eiusmod tempor incidunt?', 'Risposta' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit'],
        ]);
    }

}
