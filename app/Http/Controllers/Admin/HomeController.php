<?php

namespace App\Http\Controllers\Admin;
use App\{SuratMasuk,SuratKeluar};
use Illuminate\Support\Facades\Auth;
class HomeController
{
    public function index()
    {
        $masukCount = SuratMasuk::count();
        $keluarCount = SuratKeluar::count();
        $role = Auth::user()->roles->first()->title;
        $auth_name = Auth::user()->name;
        if ($role == 'penerima'){
            $masukCount = SuratMasuk::where('penerima', $auth_name)->count(); 
        }
        // return $masukCount;
        return view('home',compact('masukCount','keluarCount'));
    }
}
