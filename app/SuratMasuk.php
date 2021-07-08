<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $guarded = [];

    public function kategoris(){
        return $this->hasMany(Kategori::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
