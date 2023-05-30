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

    public function couponOfferta()
    {
        return $this->belongsTo(Offer::class, 'ID_offerta', 'id_coupon');
    }

    public function couponUser()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }
    // Altre proprietà e metodi del modello...
} 