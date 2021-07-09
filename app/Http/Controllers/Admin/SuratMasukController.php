<?php

namespace App\Http\Controllers\Admin;

use App\{SuratMasuk,Kategori};
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surats = SuratMasuk::simplePaginate(5);
        return view('admin.surats.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all()->pluck('nama','id')->prepend('Pilih kategori','');
        return view('admin.surats.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
        ]);
        $path = $request->file('lampiran')->store('public/lampiran');
        SuratMasuk::create(['lampiran'=> $path,
                            'tgl_surat' => $request->get('tgl_surat'),
                            'no_surat' => $request->get('no_surat'),
                            'pengirim' => $request->get('pengirim'),
                            'hal' => $request->get('hal'),
                            'kategori_id' => $request->get('kategori_id'),
                            'user_id' => Auth::id()]);
        return redirect()->route('admin.suratmasuks.index')->with('message','Input Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasuk $suratMasuk, $id)
    {
        $surat = SuratMasuk::find($id);
        return view('admin.surats.show',compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasuk $suratMasuk, $id)
    {
        $surat = SuratMasuk::findOrFail($id);
        $kategoris = Kategori::all()->pluck('nama','id')->prepend('Pilih kategori','');
        return view('admin.surats.edit',compact('surat','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratMasuk $suratMasuk, $id)
    {   
        $surat = SuratMasuk::find($id);
        if($request->hasFile('lampiran')){
            $path = $request->file('lampiran')->store('public/lampiran');
            $lampiran = $path;
        }else {
            $lampiran = $surat->lampiran;
        }


        $surat->update([
                            'lampiran'=> $lampiran,
                            'tgl_surat' => $request->get('tgl_surat'),
                            'no_surat' => $request->get('no_surat'),
                            'pengirim' => $request->get('pengirim'),
                            'hal' => $request->get('hal'),
                            'kategori_id' => $request->get('kategori_id'),
                            'user_id' => Auth::id()
        ]);

        return redirect()->route('admin.suratmasuks.index')->with('message','Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratMasuk $suratMasuk, $id)
    {
       $surat = SuratMasuk::findOrFail($id);
       $surat->delete();

       return back();
    }
}
