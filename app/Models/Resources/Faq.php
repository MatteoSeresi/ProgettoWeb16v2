<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $primaryKey = 'id';
    protected $fillable = ['Domanda'];
    public $timestamps = false;

    public function getFaq()
    {
        return Faq::select()->get();
    }
}