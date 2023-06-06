<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon'; // Nome della tabella nel database
    protected $fillable = ['codice']; // Elenco delle colonne che possono essere assegnate in modo massivo
    public $timestamps = false;

    public function getCheck($id_utente, $id_offerta, $id_aznd)
    {
        $check = Coupon::where('id_user', $id_utente)
                        ->where('id_offerta', $id_offerta)
                        ->where('id_azienda', $id_aznd)
                        ->exists();
        if($check){
            return true;
        }else{
            return false;
        }
    }

    public function getNumCoup()
    {
        $numCoup = Coupon::count();

        return $numCoup;
    }

    public function getNumCoupProm($id_offerta)
    {
        $numCoupProm = Coupon::where('id_offerta', $id_offerta)->count();

        return $numCoupProm;
    }

    public function getNumCoupUtente($id_utente)
    {
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