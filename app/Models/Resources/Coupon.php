<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon'; // Nome della tabella nel database
    protected $fillable = ['codice']; // Elenco delle colonne che possono essere assegnate in modo massivo
    public $timestamps = false;

//CHECK PER VERIFICARE CHE IL COUPON ESISTA GIA'
    public function getCheck($id_utente, $id_offerta){
        $check = Coupon::where('id_user', $id_utente)
                        ->where('id_offerta', $id_offerta)
                        ->exists();
        if($check){
            return true;
        }else{
            return false;
        }
    }

//NUMERO DEI COUPON GENERATI IN TUTTO
    public function getNumCoup(){
        $numCoup = Coupon::count();
        return $numCoup;
    }
//NUMERO COUPON GENERATI IN BASE ALL'OFFERTA
    public function getNumCoupProm($id_offerta){
        $numCoupProm = Coupon::where('id_offerta', $id_offerta)->count();
        return $numCoupProm;
    }
//NUMERO COUPON GENERATI IN BASE ALL'UTENTE
    public function getNumCoupUtente($id_utente){
        $numCoupUtente = Coupon::where('id_user', $id_utente)->count();
        return $numCoupUtente;
    }

//Relazione One-To-One con Offerta
    public function couponOfferta()
    {
        return $this->belongsTo(Offer::class, 'ID_offerta', 'id_offerta');
    }

//Relazione One-To-One con Utente
    public function couponUser()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }
} 