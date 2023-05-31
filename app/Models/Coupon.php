<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon'; // Nome della tabella nel database
    protected $fillable = ['codice']; // Elenco delle colonne che possono essere assegnate in modo massivo

    public $timestamps = false;

    public function getCoupon($id)
    {
        return Coupon::where('id', $id)->first();
    }

    //Relazione One-To-One con Offerta
    public function couponOfferta()
    {
        return $this->belongsTo(Offer::class, 'ID_offerta', 'id_coupon');
    }

    //Relazione One-To-One con Utente
    public function couponUser()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }
} 