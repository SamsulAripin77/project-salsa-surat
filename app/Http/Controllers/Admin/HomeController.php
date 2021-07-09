<?php

namespace App\Http\Controllers\Admin;
use App\{SuratMasuk,SuratKeluar};
class HomeController
{
    public function index()
    {
        $masukCount = SuratMasuk::count();
        $keluarCount = SuratKeluar::count();
        return view('home',compact('masukCount','keluarCount'));
    }
}
