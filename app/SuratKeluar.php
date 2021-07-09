<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $guarded = [];

    public function kategoris(){
        return $this->belongsTo('App\Kategori','kategori_id');
    }

    public function users(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
